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
 * Class for easy usage to the indexed search. This class is part of the 'nxindexedsearch' 
 * extension.
 *
 * @author netlogix GmbH & Co. KG (Stefan Braune) <Stefan.Braune@netlogix.de>
 */
class tx_nxindexedsearch_search
{
	private $pluginObject  = null;
	private $dataSourceKey = "";
	private $dataSourceId  = 0;
	private $indexCategory = "";
	private $pageId        = 0;
	
	/**
	 * Constructor creates a new object for searching in the given datasource (MySQL table which must have the `uid` and `tstamp` fields),
	 * category and page, which is expected to be already indexed. If a $pageId unequal zero is provided, then only records from the given page
	 * and subpages are returned (recursively).
	 *
	 * @param object $pluginObject The calling plugin.
	 * @param string $dataSourceKey
	 * @param string $indexCategory
	 * @param int $pageId
	 */
	public function __construct($pluginObject, $dataSourceKey, $indexCategory, $pageId) {
		$this->pluginObject  = $pluginObject;
		$this->dataSourceKey = $dataSourceKey;
		$this->indexCategory = $indexCategory;
		$this->pageId        = $pageId;
		
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', 'tx_nxindexedsearch_sources',
			'source_table = \'' . $this->dataSourceKey . '\' AND source_category = \'' . $this->indexCategory . '\' AND source_page = \'' . $this->pageId . '\'');
		$record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
		$this->dataSourceId = intval($record['uid']);
	}
	
	/**
	 * Returns search suggestions for the given $searchString in an array.
	 *
	 * @param string $searchString The search string.
	 * @param int $maxSuggestions The maximum amount of suggestions to be returned.
	 * @param int $maxCompositions The maximum amount of compositions or recursive calls of this method.
	 * @return array An array containing all found search suggestions.
	 */
	public function searchSuggestions($searchString, $maxSuggestions = 10, $maxCompositions = 2) {
		if ($maxSuggestions <= 0 || $maxCompositions <= 0) {
			return array();
		}
		
		$searchWords = explode(' ', strtolower($searchString)); //tx_nxindexedsearch_util::splitTransformString($searchString); // returns crappy results
		if (empty($searchWords)) {
			return array();
		}
		
		$lastWord          = array_pop($searchWords);
		$prependString     = implode(' ', $searchWords);
		$maxSuggestions    = abs($maxSuggestions);
		$searchSuggestions = array();
		
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('DISTINCT word_uid, searchword, split_offset',
			'tx_nxindexedsearch_searchindex, tx_nxindexedsearch_searchwords',
			'tx_nxindexedsearch_searchindex.source_uid = \'' . $this->dataSourceId . '\' AND tx_nxindexedsearch_searchindex.word_uid = tx_nxindexedsearch_searchwords.uid AND searchword LIKE \'' . $lastWord . '%\'',
			'', 'usage_count DESC, searchword ASC', $maxSuggestions);
		while (($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
			if ($maxSuggestions <= 0) {
				break;
			}
			
			$searchWord  = $record['searchword'];
			$splitOffset = $record['split_offset'];
		
			if ($splitOffset == 0) {
				$searchSuggestion = trim(sprintf("%s %s", implode(' ', $searchWords), $searchWord));
				$searchSuggestions[] = $searchSuggestion;
				$maxSuggestions --;
			} else if ($splitOffset != 0 && $maxSuggestions > 0) {
				$a = $this->searchSuggestions(
					sprintf("%s %s %s", $prependString, substr($searchWord, 0, $splitOffset), substr($searchWord, $splitOffset)), $maxSuggestions, $maxCompositions - 1);
				$maxSuggestions -= count($a);
				$searchSuggestions = array_merge($searchSuggestions, $a);
			}
		}
		
		return array_unique($searchSuggestions);
	}
	
	/**
	 * Searches for $searchString in the index. The resulting array contains pairs where the keys represents the unique IDs
	 * of the indexed documents and the values represents the relevance or the amount of matches of the search string in
	 * the found document.
	 *
	 * @param string $searchString
	 * @return array
	 */
	public function performSearch($searchString) {
		if ($this->dataSourceId == 0) {
			return array();
		}
		
		$resultSets   = array();
		$searchString = tx_nxindexedsearch_util::transformString($searchString);
		if (empty($searchString)) {
			return array();
		}
			
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('tstamp', 'tx_nxindexedsearch_stats',
			'searchstring = \'' . $searchString . '\'', '', 'tstamp DESC', '1');
		
		$searchWords = explode(' ', $searchString);
		
		foreach ($searchWords as $searchWordIndex => $searchWord) {
			$GLOBALS['TYPO3_DB']->sql_query("
				UPDATE `tx_nxindexedsearch_searchwords`
				SET `usage_count` = `usage_count` + 1
				WHERE `searchword` = '" . $searchWord . "'
			");
			
			$result = $GLOBALS['TYPO3_DB']->sql_query("
				SELECT 
					`searchIndex`.`document_uid`         AS `documentId`,
					SUM(`searchIndex`.`occurence_count`) AS `occurenceCount`
				FROM `tx_nxindexedsearch_searchwords` AS `searchWord`
				LEFT JOIN `tx_nxindexedsearch_searchindex` AS `searchIndex`
				ON
					`searchIndex`.`word_uid`   = `searchWord`.`uid` AND
					`searchIndex`.`source_uid` = '" . $this->dataSourceId . "'
				WHERE `searchWord`.`searchword` LIKE '%" . $searchWord . "%'
				GROUP BY `documentId`
				ORDER BY `occurence_count` DESC
			");
			while (($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
				$resultSets[$searchWordIndex][$record['documentId']] = $record['occurenceCount'];
			}
			
			foreach ($resultSets[0] as $key => $value) {
				if (!isset($resultSets[$searchWordIndex][$key])) {
					unset($resultSets[0][$key]);
				} else {
					$resultSets[0][$key] += $resultSets[$searchWordIndex][$key];
				}
			}
		}
		
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_nxindexedsearch_stats', array(
			'source_uid'   => $this->dataSourceId,
			'searchstring' => $searchString,
			'results'      => count($resultSets[0]),
			'tstamp'       => time()
		));
		
		arsort($resultSets[0]);
		return $resultSets[0];
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/class.tx_nxindexedsearch_search.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/class.tx_nxindexedsearch_search.php']);
}
?>