<?php
/**
 * Copyright notice
 * 
 * (c) 2008 netlogix GmbH & Co. KG (Stefan.Braune@netlogix.de)
 * All rights reserved
 * 
 * This script is part of the TYPO3 project. The TYPO3 project is 
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * 
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * This copyright notice MUST APPEAR in all copies of the script!
 */

require_once(t3lib_extMgm::extPath('nxindexedsearch') . '/class.tx_nxindexedsearch_util.php');

/**
 * Class for indexing data of any datasource you like. The MySQL table of the datasource must have
 * fields named <code>uid</code>, <code>pid</code> and <code>tstamp</code>. This class is part of
 * the 'nxindexedsearch' extension.
 *
 * @author netlogix GmbH & Co. KG (Stefan Braune) <Stefan.Braune@netlogix.de>
 */
class tx_nxindexedsearch_indexer
{
	private $pluginObject    = null;
	private $dataSourceKey   = "";
	private $indexCategory   = "";
	private $dataSourceId    = 0;
	private $indexingActive  = 0;
	private $pageId          = 0;
	private $pageIds         = array(); // Created by buildPageTree()
	private $indexFields     = array();
	private $fieldConditions = array();
	
	/**
	 * Constructor creates a new indexer for the given datasource (MySQL table which must have the `uid` and `tstamp` fields),
	 * category and page, which will index data from the given field list $indexFields but only those records where all 
	 * field conditions match. The $indexCategory can be any string you like. The field conditions will be conjugated for 
	 * the selection of data records which should be indexed and must follow the scheme <code>fieldName => requiredValue</code>.
	 * If a $pageId unequal zero is provided, then only records from the given page and subpages are indexed (recursively).
	 *
	 * @param object $pluginObject The calling plugin. Needed for access to a cObj instance.
	 * @param string $dataSourceKey
	 * @param string $indexCategory
	 * @param int $pageId
	 * @param array $indexFields
	 * @param array $fieldConditions
	 */
	public function __construct($pluginObject, $dataSourceKey, $indexCategory, $pageId, $indexFields, $fieldConditions = array()) {
		$this->pluginObject    = $pluginObject;
		$this->dataSourceKey   = $dataSourceKey;
		$this->indexCategory   = $indexCategory;
		$this->pageId          = $pageId;
		$this->indexFields     = $indexFields;
		$this->fieldConditions = $fieldConditions;
		
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid, indexing_active', 'tx_nxindexedsearch_sources',
			'source_table = \'' . $this->dataSourceKey . '\' AND source_category = \'' . $this->indexCategory . '\' AND source_page = \'' . $this->pageId . '\'');
		$record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
		$this->dataSourceId = intval($record['uid']);
		$this->indexingActive = intval($record['indexing_active']);
		
		if ($this->dataSourceId == 0) {
			$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_nxindexedsearch_sources', array(
				'tstamp'          => time(),
				'source_table'    => $this->dataSourceKey,
				'source_category' => $this->indexCategory,
				'source_page'     => $this->pageId
			));
			$this->dataSourceId = $GLOBALS['TYPO3_DB']->sql_insert_id();
		}
		
		$this->buildPageTree($pageId);
	}
	
	/**
	 * Updates the index defined in the constructor. If only a limited amount of documents should be indexed at once,
	 * bypass a integer parameter specifying the amount of documents (default 100 documents at a time).
	 *
	 * @param int $limitEntries Amount of documents that should be indexed at a time.
	 * @return void
	 */
	public function startIndexing($limitEntries = 100) {
		if ($this->indexingActive) {
			return 0;
		}
		
		$GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_nxindexedsearch_sources', 'uid = \'' . $this->dataSourceId . '\'', array(
			'indexing_active' => 1
		));
		$this->indexingActive = 1;
		
		$concatFieldList = "CONCAT(";
		foreach ($this->indexFields as $fieldName) {
			$concatFieldList .= " `" . $this->dataSourceKey . "`.`" . $fieldName . "`, ' ',";
		}
		$concatFieldList = preg_replace("/, ' ',$/", ')', $concatFieldList);
		
		$whereClause = "";
		foreach ($this->fieldConditions as $fieldName => $fieldValue) {
			$whereClause .= " AND `" . $this->dataSourceKey . "`.`" . $fieldName . "` = '" . $fieldValue . "'";
		}
		
		$wherePages = "";
		if ($this->pageId != 0 && count($this->pageIds) > 0) {
			$wherePages = " AND `" . $this->dataSourceKey . "`.`pid` IN (" . implode(', ', $this->pageIds) . ")";
		}
		
		// Fill the search index with new information.
		$result = $GLOBALS['TYPO3_DB']->sql_query('
			SELECT
				`' . $this->dataSourceKey . '`.`uid` AS `documentId`,
				' . $concatFieldList . '             AS `searchString`,
				`searchTime`.`uid`                   AS `searchTimeId`
			FROM `' . $this->dataSourceKey . '`
			LEFT JOIN `tx_nxindexedsearch_searchtime` AS `searchTime`
			ON
				`searchTime`.`source_uid`   = \'' . $this->dataSourceId . '\' AND
				`searchTime`.`document_uid` = `' . $this->dataSourceKey . '`.`uid`
			WHERE 1
				AND (`searchTime`.`uid` IS NULL OR `' . $this->dataSourceKey . '`.`tstamp` > `searchTime`.`tstamp`)
				AND (1 ' . $this->pluginObject->cObj->enableFields($this->dataSourceKey) . $whereClause . ')
				AND (1 ' . $wherePages . ')
			ORDER BY `' . $this->dataSourceKey . '`.`tstamp` ASC
			' . (intval($limitEntries) < 0 ? '' : 'LIMIT ' . intval($limitEntries)) . ' 
		');
		if (!$result) {
			return 0;
		}
		
		while (($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
			$documentId   = $record['documentId'];
			$searchTimeId = intval($record['searchTimeId']);
		
			if ($searchTimeId > 0) {
				// Document is already indexed. Need re-indexing and remove old index information.
				$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_nxindexedsearch_searchtime',
					'source_uid = \'' . $this->dataSourceId . '\' AND document_uid = \'' . $documentId . '\'');
				$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_nxindexedsearch_searchindex',
					'source_uid = \'' . $this->dataSourceId . '\' AND document_uid = \'' . $documentId . '\'');
			}
			
			$wordList     = tx_nxindexedsearch_util::splitTransformString($record['searchString']);
			$wordListSize = count($wordList);
			$wordsToStore = array();
			for ($i = 0; $i < $wordListSize; $i ++) {
				if (strlen($wordList[$i]) >= 3) {
					$wordUid                = $this->insertWordGetUid(substr($wordList[$i], 0, 32), 0);
					$wordsToStore[$wordUid] = (isset($wordsToStore[$wordUid]) ? $wordsToStore[$wordUid] : 0) + 1;
				} else {
					$longWord = '';
					for ($j = $i; isset($wordList[$j]) && strlen($longWord) < 3; $j ++) {
						$longWord .= $wordList[$j];
					}
					
					if (strlen($longWord) >= 3) {
						$wordUid  = $this->insertWordGetUid(substr($longWord, 0, 32), min(strlen($wordList[$i]), 32));
						$wordsToStore[$wordUid] = (isset($wordsToStore[$wordUid]) ? $wordsToStore[$wordUid] : 0) + 1;
					}
				}
			}
			
			if (count($wordsToStore) > 0) {
				// Store everything from $wordsToStore into tx_nxindexedsearch_searchindex and store the indexing time for this document.
				$valuesString = '';
				foreach ($wordsToStore as $wordUid => $wordCount) {
					$valuesString .= "('" . $this->dataSourceId . "', '" . $documentId . "', '" . $wordUid . "', '" . $wordCount . "', '" . time() . "'),";
				}
				
				$insertWordsQueryString  = 'INSERT `tx_nxindexedsearch_searchindex`
					(`source_uid`, `document_uid`, `word_uid`, `occurence_count`, `tstamp`) VALUES ';
				$insertWordsQueryString .= substr($valuesString, 0, strlen($valuesString) - 1);
				$GLOBALS['TYPO3_DB']->sql_query($insertWordsQueryString);
				
				$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_nxindexedsearch_searchtime', array(
					'tstamp'       => time(),
					'source_uid'   => $this->dataSourceId,
					'document_uid' => $documentId
				));
			}
		}
		
		// Delete unused searchwords.
		$GLOBALS['TYPO3_DB']->sql_query('
			DELETE FROM tx_nxindexedsearch_searchwords
			WHERE uid NOT IN (
				SELECT word_uid
				FROM tx_nxindexedsearch_searchindex
			)
		');
		
		// Delete index information of non-existent or obsolete documents.
		$result = $GLOBALS['TYPO3_DB']->sql_query('
			SELECT
				`searchTime`.`uid`          AS `searchTimeId`,
				`searchTime`.`document_uid` AS `documentId`
			FROM `tx_nxindexedsearch_searchtime` AS `searchTime`
			LEFT JOIN `' . $this->dataSourceKey . '`
			ON
				`searchTime`.`document_uid` = `' . $this->dataSourceKey . '`.`uid`
			WHERE `searchTime`.`source_uid` = \'' . $this->dataSourceId . '\' AND (0
				OR `' . $this->dataSourceKey . '`.`uid` IS NULL
				OR NOT (1 ' . $this->pluginObject->cObj->enableFields($this->dataSourceKey) . $whereClause . ')
				OR NOT (1 ' . $wherePages . ')
			)
		');
		while (($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
			$documentId = intval($record['documentId']);
			
			$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_nxindexedsearch_searchtime',
				'source_uid = \'' . $this->dataSourceId . '\' AND document_uid = \'' . $documentId . '\'');
			$GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_nxindexedsearch_searchindex',
				'source_uid = \'' . $this->dataSourceId . '\' AND document_uid = \'' . $documentId . '\'');
		}
		
		$GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_nxindexedsearch_sources', 'uid = \'' . $this->dataSourceId . '\'', array(
			'indexing_active' => 0
		));
		$this->indexingActive = 0;
	}
	
	/**
	 * Inserts a new search word into the tx_nxindexedsearch_searchwords table if it is not already there. Returns the
	 * unique ID of the word.
	 *
	 * @param string $searchWord
	 * @param int $splitOffset The split offset if the word is composed out of two words.
	 * @return int
	 */
	private function insertWordGetUid($searchWord, $splitOffset) {
		$result  = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', 'tx_nxindexedsearch_searchwords', 'searchword = \'' . $searchWord . '\' AND split_offset = \'' . $splitOffset . '\'', '', '', '1');
		$record  = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
		$wordUid = intval($record['uid']);
		
		if ($wordUid == 0) {
			$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_nxindexedsearch_searchwords', array(
				'tstamp'       => time(),
				'searchword'   => $searchWord,
				'split_offset' => $splitOffset
			));
			$wordUid = $GLOBALS['TYPO3_DB']->sql_insert_id();
		}
	
		return $wordUid;
	}
	
	/**
	 * Builds an array containing the $pageId and all subpages definied in the pages table. The result is stored in
	 * <code>$this->pageIds</code>.
	 *
	 * @param int $pageId
	 */
	private function buildPageTree($pageId) {
		$pageId = intval($pageId);
		if ($pageId == 0) {
			return;
		}
		
		$this->pageIds[] = $pageId;
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', 'pages', 'pid = \'' . $pageId . '\'' . $this->pluginObject->cObj->enableFields('pages'));
		while (($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
			$this->buildPageTree($record['uid']);
		}
		$this->pageIds = array_unique($this->pageIds);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/class.tx_nxindexedsearch_indexer.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/class.tx_nxindexedsearch_indexer.php']);
}
?>