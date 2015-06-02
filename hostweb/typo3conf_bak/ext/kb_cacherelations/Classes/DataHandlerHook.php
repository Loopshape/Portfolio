<?php
namespace ThinkopenAt\KbCacherelations;

/***************************************************************
*  Copyright notice
*
*  (c) 2006-2015 Bernhard Kraft (kraftb@kraftb.at)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * Clear cache on related pages change
 *
 * @author	Bernhard Kraft <kraftb@kraftb.at>
 */
class DataHandlerHook implements \TYPO3\CMS\Core\SingletonInterface {
	protected $lockFile = 'typo3temp/cache.lock';
	protected $pagesChanged = FALSE;
	protected $page = FALSE;
	protected $cache = array();
	protected $emptyCache = array(
		'expandCache' => array(),
		'cacheSubPages' => array(),
		'cachePages' => array(),
		'tstamp' => 0,
	);
	protected $cacheHash = '';

	public function __construct() {
		$this->page = GeneralUtility::makeInstance('TYPO3\CMS\Frontend\Page\PageRepository');
		$this->cacheHash = md5(__CLASS__);
		$this->lockFD = fopen(PATH_site . $this->lockFile, 'wb');
	}
	
	
	/**********************************************************
	 * HOOK METHODS
	 *
	 * These methods are hooks which get called from within DataHandler
	 **********************************************************/
	
	/*
	 * This is a hook method called from an instance of DataHandler
	 * It checks if some records have been deleted
	 * and wheter to clear cached pages because of this (if configured via TSconfig)
	 *
	 * @param string $command: The operation which has been performed
	 * @param string $table: The table upon which the above status/operation has been performed
	 * @param int $id: The id of the record upon which action has been performed
	 * @param int $value: An additional value usually required for move/copy to specify the target page
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler: The DataHandler instance from which this hook got called
	 * @return void
	 */
	public function processCmdmap_preProcess($command, $table, $id, $value, \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler) {
		$affectedItem = -1;
		$affectedParent = -1;
		switch ($command) {
			case 'delete':
				$affectedItem = $id;
				$rec = BackendUtility::getRecord($table, $id);
				$affectedParent  = $rec['pid'];
			break;
			case 'localize':
			case 'version':
			case 'move':
			case 'copy':
				return;
			break;
		}
		if (($affectedItem>=0) || ($affectedParent>=0)) {
			$this->clearAffectedCache($affectedItem, $affectedParent, $table, $dataHandler);
		}
	}

	/*
	 * This is a hook method called from an instance of DataHandler
	 * It checks if some records have been copied/moved/versionized/localized
	 * and wheter to clear cached pages because of this (if configured via TSconfig)
	 *
	 * @param string $command: The operation which has been performed
	 * @param string $table: The table upon which the above status/operation has been performed
	 * @param int $id: The id of the record upon which action has been performed
	 * @param int $value: For "move" operation this defines the target page uid a record got moved to. For "copy" ... UNKNOWN. ToDo.
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler: The DataHandler instance from which this hook got called
	 * @return void
	 */
	public function processCmdmap_postProcess($command, $table, $id, $value, \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler) {
		$affectedItem = -1;
		$affectedParent = -1;
		switch ($command) {
			case 'localize':
			case 'version':
				$affectedItem = $id;
				$rec = BackendUtility::getRecord($table, $id);
				$affectedParent  = $rec['pid'];
			break;
			case 'move':
				$affectedItem = $id;
				$affectedParent = $this->getParentFromPointer($value);
			break;
			case 'copy':
				$affectedItem = $dataHandler->copyMappingArray[$table][$id];
				$affectedParent = $this->getParentFromPointer($value);
			break;
			case 'delete':
				return;
			break;
		}
		if (($affectedItem>=0) || ($affectedParent>=0)) {
			$this->clearAffectedCache($affectedItem, $affectedParent, $table, $dataHandler);
		}
	}

	/*
	 * This is a hook method called from an instance of DataHandler
	 * It checks if some records have been changed and wheter to clear cached pages (when configured via TSconfig)
	 *
	 * @param string $status: The operation which has been performed
	 * @param string $table: The table upon which the above status/operation has been performed
	 * @param int/string $id: The id of the record upon which action has been performed. Can be a "NEW1234..." like string in the case of "new" operation.
	 * @param array $fieldArray: The list of fields which have been updated for the given record
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler: The DataHandler instance from which this hook got called
	 * @return void
	 */
	public function processDatamap_afterDatabaseOperations($status, $table, $id, array $fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler) {
		$affectedItem = 0;
		$affectedParent = 0;
		switch ($status) {
			case 'new':
				$affectedItem = $dataHandler->substNEWwithIDs[$id];
				$affectedParent  = $fieldArray['pid'];
			break;
			case 'update':
				$affectedItem = $id;
				$rec = BackendUtility::getRecord($table, $id);
				$affectedParent  = $rec['pid'];
			break;
			default:
				echo 'Invalid datamap operation for related cache-clear extension !<br>'.chr(10);
			break;
		}
		if (($affectedItem>=0) || ($affectedParent>=0)) {
			$this->clearAffectedCache($affectedItem, $affectedParent, $table, $dataHandler);
		}
	}

	/*
	 * This is a hook method called from an instance of TCEmain
	 * It gets called directly after a record has been moved.
	 * This hook takes care of clearing the caches of the page from which a record got moved away.
	 *
	 * @param string $table: The table upon which the above status/operation has been performed
	 * @param int $id: The id of the record which got moved
	 * @param int $destPid: The page to which the record got moved
	 * @param array $moveRec: The record which got moved (containint the original PID)
	 * @param array $updateFields: The fields of the record which got updated.
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler: The DataHandler instance from which this hook got called
	 * @return void
	 */
	public function moveRecord_firstElementPostProcess($table, $uid, $destPid, array $moveRec, array $updateFields, \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler) {
		if ($destPid != $moveRec['pid']) {
				// Clear the cache here only when the record got moved to a different page.
				// Else clearing the cache once (processCmdmap_postProcess) will be sufficient.
			$this->clearAffectedCache($uid, $moveRec['pid'], $table, $dataHandler);
		}
	}

	/*
	 * This is a hook method called from an instance of TCEmain
	 * It gets called directly after a record has been moved.
	 * This hook takes care of clearing the caches of the page from which a record got moved away.
	 *
	 * @param string $table: The table upon which the above status/operation has been performed
	 * @param int $id: The id of the record which got moved
	 * @param int $destPid: The page to which the record got moved
	 * @param int $origDestPid: The original target pointer (will be negative in most cases)
	 * @param array $moveRec: The record which got moved (containint the original PID)
	 * @param array $updateFields: The fields of the record which got updated.
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler: The DataHandler instance from which this hook got called
	 * @return void
	 */
	public function moveRecord_afterAnotherElementPostProcess($table, $uid, $destPid, $origDestPid, array $moveRec, array $updateFields, \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler) {
		if ($destPid != $moveRec['pid']) {
				// Clear the cache here only when the record got moved to a different page.
				// Else clearing the cache once (processCmdmap_postProcess) will be sufficient.
			$this->clearAffectedCache($uid, $moveRec['pid'], $table, $dataHandler);
		}
	}



	/**********************************************************
	 * PROCESSING METHODS
	 *
	 * These methods take care of clearing the cache of configured pages when
	 * an element got modified/copied/moved/versionized/localized
	 **********************************************************/

	/*
	 * This method clears the cache for each affected page as configured via TS-Config
	 *
	 * @param int $affectedItem: The item uid whose fields got changed
	 * @param int $affectedParent: The page on which the changed item resides
	 * @param string $table: The table of the item which was changed ($table:$affectedItem exactly specifies the modified record)
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler: The DataHandler instance from which the hooks get called
	 * @return void
	 */
	protected function clearAffectedCache($affectedItem, $affectedParent, $table, \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler) {
		$this->initCache();
		if ($table == 'pages') {
			$tsConfig = BackendUtility::getPagesTSconfig($affectedItem);
		} else {
			$tsConfig = BackendUtility::getPagesTSconfig($affectedParent);
		}
		$clearCachePages = array();
		if (is_array($tsConfig['plugin.']['kb_cacherelations.'][$table.'.']['pid.'])) {
			$clearCachePages = array_merge($clearCachePages, $this->getAffectedPages($tsConfig['plugin.']['kb_cacherelations.'][$table.'.']['pid.'], $affectedParent, true));
		}
		if (is_array($tsConfig['plugin.']['kb_cacherelations.'][$table.'.']['uid.'])) {
			$clearCachePages = array_merge($clearCachePages, $this->getAffectedPages($tsConfig['plugin.']['kb_cacherelations.'][$table.'.']['uid.'], $affectedItem, ($table=='pages')));
		}
		if (is_array($tsConfig['plugin.']['kb_cacherelations.'][$table.'.']['related.'])) {
			$clearCachePages = array_merge($clearCachePages, $this->getAffectedPagesForRelation($tsConfig['plugin.']['kb_cacherelations.'][$table.'.']['related.'], $table, $affectedItem, $affectedParent));
		}
		$clearCachePages = array_unique($clearCachePages);
		foreach ($clearCachePages as $ccP) {
			if ($ccP) {
				$dataHandler->clear_cacheCmd($ccP);
			}
		}
		$this->updateCache();
		GeneralUtility::sysLog('Record "'.$table.':'.$affectedItem.'" was modified. Cleared cache of pages: '.implode(', ', $clearCachePages), 'kb_cacherelations', 0);
	}


	/*
	 * This method returns all pages whose cache should get cleared depending on relation (sys_refindex) to the
	 * passed record.
	 *
	 * It checks wheter the passed record (table:uid) has been referenced from another page/record
	 * and returns all pages from which it has been referenced
	 * and pages on which an element resides from which the passed record has been referenced.
	 *
	 * @param array $config: An array consisting of configuration items
	 * @param string $table: The table of the record whose references should get checked
	 * @param int $uid: The uid of the record whose references should get checked
	 * @return array All pages whose cache should get cleared
	 */
	protected function getAffectedPagesForRelation(array $config, $table, $uid, $parentPageUid) {
		$uid = intval($uid);
		$clearCachePages = array();

		foreach ($config as $key => $configItem) {
				// Iterate over all configured settings.

				// It can get configured to clear the cache when something is related to"the"Record which has been changed
			if ($configItem['toRecord.']) {
				$relatedPages = $this->getRelatedPages($table, $uid);
				foreach ($relatedPages as $relatedPage) {
					$temp = $this->getAffectedPages_forConfigItem($configItem['toRecord.'], $relatedPage, true);
					$clearCachePages = array_merge($clearCachePages, $temp);
				}
			}
			
				// It can also get configure to clear cache when something is related to"the"RecordsPage
				// (the page on which the modified record is found)
				//
				// This can get used for example to clear the cache of a page which contains a menu/index content
				// element of subpages of some other page, whenever one of those subpages gets modified.
			if ($configItem['toRecordsPage.']) {
				$relatedPages = $this->getRelatedPages('pages', $parentPageUid);
				foreach ($relatedPages as $relatedPage) {
					$temp = $this->getAffectedPages_forConfigItem($configItem['toRecordsPage.'], $relatedPage, true);
					$clearCachePages = array_merge($clearCachePages, $temp);
				}
			}
		}
		return $clearCachePages;
	}


	/*
	 * This method returns all pages whose cache should get cleared.
	 * It checks wheter the passed page uid ($uid) can be found in one of the passed configuration items
	 * and returns the pages which have been configured to get their cache cleared for the processed configuration item.
	 *
	 * The working horse code of this method has been put into a method on its own (getAffectedPages_forConfig).
	 * So this method is merely nothing more than an iterator over the config array and collects the returned result arrays.
	 *
	 * @param array $config: An array consisting of configuration items
	 * @param int $uid: The page which should get looked for
	 * @param bool $allowAffectedRecursive: When a single non "pages" record gets checked it won't be possible to retrieve its sub records. As only pages can have sub records.
	 * @return array All pages whose cache should get cleared
	 */
	protected function getAffectedPages(array $config, $uid, $allowAffectedRecursive = FALSE) {
		$uid = intval($uid);
		$clearCachePages = array();
		foreach ($config as $key => $configItem) {
				// Iterate over all configured settings.

			$clearCachePagesTemp = $this->getAffectedPages_forConfigItem($configItem, $uid, $allowAffectedRecursive);
			$clearCachePages = array_merge($clearCachePages, $clearCachePagesTemp);			
		}
		return $clearCachePages;
	}


	/*
	 * This method returns all pages whose cache should get cleared.
	 * It checks wheter the passed page uid ($uid) can be found in the passed configuration item.
	 *
	 * This method was once contained inside the loop of above method "getAffectedPages" but has been
	 * moved to a method on its own so it can get used by method "getAffectedPagesForRelation"
	 *
	 * @param array $config: An array for ONE configuration item
	 * @param int $uid: The page which should get looked for
	 * @param bool $allowAffectedRecursive: When a single non "pages" record gets checked it won't be possible to retrieve its sub records. As only pages can have sub records.
	 * @return array All pages whose cache should get cleared
	 */
	protected function getAffectedPages_forConfigItem(array $config, $uid, $allowAffectedRecursive = FALSE) {
		$clearCachePages = array();
			// The configuration array contains two keys:
			// 'checkAffected': This key defines for which pages this configuration is valid
			// 'clearCachePages': This key defines the pages of which the cache should get cleared upon match

			// Step #1: Expand the configuration for the pages this configuraion is valid for
			// Get pages for which we do something when they are affected (a record on them got modified)
		if ($allowAffectedRecursive) {
			$checkIfAffected = $this->expandConfiguration($config['checkAffected']);
		} else {
			$checkIfAffected = GeneralUtility::intExplode(',', $config['checkAffected']);
		}

		// Step #2: The second configuration key (clearCachePages) defines the pages of which the cache
		// should get cleared.
		//
		// If the currently processed page ($uid) is found in the array of pages this configuration is valid for,
		// then expand the configuration-string for the pages whose cache should get cleared.
		if (in_array($uid, $checkIfAffected)) {
			// Here care has to be taken as the 2nd configuration key (clearCachePages)
			// can contain a variable "#" which evaluates to the page which is affected.
			// This allows to clear the cache of a page which is affeced (and/or sub/parent pages)
			// This may sound dumb - but the affected page couldn't be really affected but just via
			// a relation to the really affected page.
			$clearConfig = str_replace('#', $uid, $config['clearCachePages']);
			$clearCachePages = $this->expandConfiguration($clearConfig);
		}
		return $clearCachePages;
	}



	/**********************************************************
	 * HELPER METHODS
	 *
	 * Various methods required for working with configuration or pages
	 **********************************************************/

	/*
	 * This method returns all pages related to the passed record.
	 * 
	 * It checks wheter the passed record (table:uid) has been referenced from another page/record
	 * and returns all pages from which it has been referenced and also pages on which an element resides
	 * from which the passed record has been referenced.
	 *
	 * @param string $table: The table of the record whose references should get checked
	 * @param int $uid: The uid of the record whose references should get checked
	 * @return array All pages whose cache should get cleared
	 */
	protected function getRelatedPages($table, $uid) {
		$quotedTable = $GLOBALS['TYPO3_DB']->fullQuoteStr($table, 'sys_refindex');
		$relatedPages = array();
		$sys_refindex_res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('tablename, recuid', 'sys_refindex', 'deleted=0 AND ref_table=' . $quotedTable . ' AND ref_uid=' . intval($uid));
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($sys_refindex_res)) {
			if ($row['tablename'] == 'pages') {
				$relatedPages[] = $row['recuid'];
			} else {
				$relatedRecord = BackendUtility::getRecord($row['tablename'], $row['recuid']);
				$relatedPages[] = $relatedRecord['pid'];
			}
		}
		return array_unique($relatedPages);
	}


	/*
	 * This method returns all pages configured via one of the configurations strings like "0:*"
	 * You could also say it "expands" the configuration string
	 * More than one configuration string can be put together by using a semicolon (;) to separate them
	 *
	 * Each configuration string is first split by the paragraph symbol "§".
	 * The configuration before the paragraph symbol defines the included pages while the configuration after it
	 * defines the excluded pages.
	 *
	 * The separation between expression by (;) and inclusion (possible exclusion by "§") is handled by this method itself.
	 * Everything else is handled by the methods below.
	 *	 
	 *
	 * Each configuration (before and after the §) can consist of multiple sub-configurations separated by comma (,)
	 * 
	 * Each of the sub configurations get's expanded as following:
	 * This all means simply page 123: "123", "123:0", "123:0:0", "123:-0", "123:-0:*", "123:*:0"
	 *
	 * An expression looke like: "PAGE:TRAVERSAL:COLLECTION"
	 *
	 * The value "0:*:*" means "all pages" (the whole pagetree)
	 *
	 * While something like "0:*:*$" means just all last-level pages (pages having no childs)
	 * It will start from page 0, retrieve all subpages and collect all pages having no childs
	 * Something like "0:*:3$" means just all third-level pages having no childs
	 * 
	 * While something like "0:*:*^" means just all first-level pages (pages having no parent - rootlevel pages)
	 * It will start from page 0, retrieve all subpages and collect just pages having no parent
	 *
	 * An expression like "123:*:*$" means all pages below 123 which have no child (123 itself if it has no childs)
	 * Something like "123:*:*" means page uid "123" AND ALL subpages
	 * An expression like "123:*:*^" won't return any page except 123 if it is a rootpage (has no parent)
	 * The last expression would start at 123, retrieve all subpages and collect just pages having no parent
	 * (which will result in no pages as every retrieved subpages has a parent: 123)
	 * 	 
	 * Another example would be "123:1:*" which would mean page 123 and all direct subpages (but not sub-subpages)
	 * While "123:1:1" would mean only all direct subpages of 123 but not 123 itself (and neither sub-subpages)
	 * While "123:1:*$" would mean only those direct subpages having no childs (or 123 if it has no childs)
	 * While "123:1:1$" would mean only those direct subpages having no childs (exclusive 123)
	 
	 * An expression of "123:-2:2" means the parent parent page of 123
	 * While "123:-2:*" means the page 123 AND its parent page AND its parent parent page
	 * An expression like "123:-*:*^" would mean the root page of the current branch
	 * While an expression like "123:-*:*" would mean the page 123 AND everything down the rootline till the rootpage
	 *
	 *
	 *
	 * So the sub-configuration is first split by ":" where:
	 * The first part designates: The page from which the page tree traversal begins
	 *	This must be a page UID or 0
	 *
	 * The second part defines: In which direction and how deep the page tree get's traversed
	 *	A prefix of "-" meaning to don't retrieve subpages but travel the rootline up to the rootpage
	 *	And then:
	 *	Either an asterix "*" which means to go up or down till not further possible (no childs/parents)
	 *	Or a number which means to go down (or up if prefixed by minus) till the level specified by this number
	 *
	 * And the third part defines: The levels of which the page uid's get collected.
	 *	This is a dot (.) separated list of items from which each item can be built up like:
	 *		Postfixed by a modificator of "$" which means to collect a page only if it has no subpages
	 *		Postfixed by a modificator of "^" which means to collect a page only if it has no parent
	 *		Either an asterix "*" which means to collect any page
	 *		OR a number which means to collect pages only if on the level specified by this number
	 *
	 * ToDo: This is currently not fully implemented ;]
	 *
	 * @param string $pagesConfig: A pages configuration string like mentioned in the examples above
	 * @return array All pages resulting from evaluating the configuration string
	 */
	protected function expandConfiguration($pagesConfig) {
		$pagesConfig = trim($pagesConfig);
		$pagesConfig = preg_replace('/\s/', '', $pagesConfig);
		if ($this->cache['expandCache'][$pagesConfig]) {
			return $this->cache['expandCache'][$pagesConfig];
		}
		$pagesResult = array();
		$configExpressions = GeneralUtility::trimExplode(';', $pagesConfig, 1);
		foreach ($configExpressions as $item) {
				list($include, $exclude) = explode('§', $item, 2);
				$pagesInclude = $this->expandConfigurationList($include);
				$pagesExclude = $this->expandConfigurationList($exclude);
				$pagesResult = array_merge($pagesResult, array_diff($pagesInclude, $pagesExclude));
		}
		$this->cache['expandCache'][$pagesConfig] = $pagesResult;
		return $pagesResult;
	}
	
	/*
	 * This method returns all pages configured via one of the configurations strings like "0:*"
	 * This method handles the splitting of expressions separated by comma (,)
	 *
	 * @param string $expressionList: A list of expressions
	 * @return array All pages resulting from evaluating the expression list
	 */
	protected function expandConfigurationList($expressionList) {
		if ($this->cache['expandCache'][$expressionList]) {
			return $this->cache['expandCache'][$expressionList];
		}
		$pagesResult = array();
		$expressions = explode(',', $expressionList);
		foreach ($expressions as $expressionItem) {
			$pagesResult = array_merge($pagesResult, $this->expandConfigurationExpression($expressionItem));
		}
		
		$this->cache['expandCache'][$expressionList] = $pagesResult;
		return $pagesResult;
	}
	
	/*
	 * This method returns all pages configured via one of the configurations strings like "0:*"
	 * This method handles configuration expressions separated by ":"
	 *
	 * @param string $expressionList: A list of expressions
	 * @return array All pages resulting from evaluating the expression list
	 */
	protected function expandConfigurationExpression($expression) {
		if ($this->cache['expandCache'][$expression]) {
			return $this->cache['expandCache'][$expression];
		}
		$parts = GeneralUtility::trimExplode(':', $expression, 3);
		
			// The page UID from which to start our journey
		$pageUid = intval($parts[0]);

			// The direction into which and how deep to traverse
		$traversal = $parts[1];
		$traversalFunction = 'expandConfiguration_getChilds';
		if (substr($traversal, 0, 1) == '-') {
			$traversalFunction = 'expandConfiguration_getParent';
			$traversal = trim(substr($traversal, 1));
		}
		if ($traversal == '*') {
			$traversal = -1;
		} else {
			$traversal = intval($traversal);
		}

			// Which parts of our journey should get collected		
		$collection = GeneralUtility::trimExplode('.', $parts[2], 1);
		if (!count($collection)) {
				// This takes care when no third parameter has been given
			$collection[] = '0';
		}
		$collectItems = array();
		foreach ($collection as $tmp) {
			if (substr($tmp, -1) === '$') {
				$tmpItem = 'ifNoChild';
				$tmp = substr($tmp, 0, -1);
			} elseif (substr($tmp, -1) === '^') {
				$tmpItem = 'ifNoParent';
				$tmp = substr($tmp, 0, -1);
			} else {
				$tmpItem = 'anyway';
			}
			
			if ($tmp === '*') {
				$tmpLevel = '*';
			} else {
				$tmpLevel = intval($tmp);
			}
			
			if (!is_array($collectItems[$tmpLevel])) {
				$collectItems[$tmpLevel] = array();
			}

			$collectItems[$tmpLevel][$tmpItem] = true;
		}

		$pagesResult = $this->$traversalFunction(array(), $pageUid, $traversal, 0, $collectItems);
		
		$this->cache['expandCache'][$expression] = $pagesResult;
		return $pagesResult;
	}


	/*
	 * This method returns all pages configured via one of the configurations strings like "0:*"
	 * This method traverses the rootline down (gets subpages)
	 *
	 * @param array $currentResult: The variable which hold all results accumulated so far. Will also be the return value.
	 * @param int $currentPage: The UID of the page being collected
	 * @param int $targetLevel: Until which tree level to collect pages
	 * @param int $currentLevel: The current tree level
	 * @param array $collectItems: Specified which items should get collected
	 * @return array The parameter $currentResult" with any additional results accumulated
	 */
	protected function expandConfiguration_getChilds(array $currentResult, $currentPage, $targetLevel, $currentLevel, array $collectItems) {
		if ($this->expandConfiguration_collectPage($collectItems, $currentPage, $currentLevel)) {
			$currentResult[] = $currentPage;	
		}

		if ($targetLevel) {
			$subPages = $this->getSubPages($currentPage);
			foreach ($subPages as $page) {
				// Call this method recursively for every sub page
				$currentResult = $this->expandConfiguration_getChilds($currentResult, $page['uid'], $targetLevel-1, $currentLevel+1, $collectItems);
			}
			return $currentResult;
		} else {
			return $currentResult;
		}				
	}


	/*
	 * This method returns all pages configured via one of the configurations strings like "0:*"
	 * This method traverses the rootline up (gets parents)
	 *
	 * @param array $currentResult: The variable which hold all results accumulated so far. Will also be the return value.
	 * @param int $currentPage: The UID of the page being collected
	 * @param int $targetLevel: Until which tree level to collect pages
	 * @param int $currentLevel: The current tree level
	 * @param array $collectItems: Specified which items should get collected
	 * @return array The parameter $currentResult" with any additional results accumulated
	 */
	protected function expandConfiguration_getParent(array $currentResult, $currentPage, $targetLevel, $currentLevel, array $collectItems) {
		if ($this->expandConfiguration_collectPage($collectItems, $currentPage, $currentLevel)) {
			$currentResult[] = $currentPage;	
		}

		if ($targetLevel) {
			$pageRecord = BackendUtility::getRecord('pages', $currentPage);
// Which variant of the following if gets choosen defines wheter "0" will be added to the list of pages or not.
//			if (is_array($pageRecord)) {
			if (is_array($pageRecord) && $pageRecord['pid']) {
				// Call this method recursively up to the root node
				$currentResult = $this->expandConfiguration_getParent($currentResult, $pageRecord['pid'], $targetLevel-1, $currentLevel+1, $collectItems);
			}
			return $currentResult;
		} else {
			return $currentResult;
		}				
	}


	/*
	 * This method checks wheter a page should get collected for the expanded configuration
	 * The collection config for the current level and for level '*' (if exists) get checked.
	 * True means to collect the page.
	 *
	 * @param array $collectItems: An array containing collect info arrays (see method expandConfiguration_collectPageLevel) for all levels
	 * @param int $pageUid: The uid of the page for which the decision has to be taken
	 * @param int $currentLevel: The level for which the decision has to be taken
	 * @return bool Wheter the passed page should get collected or not.
	 */
	protected function expandConfiguration_collectPage(array $collectItems, $pageUid, $currentLevel) {
		$collect = FALSE;
		if ($tmp = $collectItems[$currentLevel]) {
			$collect |= $this->expandConfiguration_collectPageLevel($tmp, $currentPage);
		}
		if ($tmp = $collectItems['*']) {
			$collect |= $this->expandConfiguration_collectPageLevel($tmp, $currentPage);										
		}
		return $collect;
	}


	/*
	 * This method checks wheter a page at a specific level should get collected for the expanded configuration
	 * Depending on the keys and the status of the page (has childs/parent) true or false gets returned.
	 * True means to collect the page.
	 *
	 * @param array $collectInfo: An array containing the keys 'anyway', 'ifNoChild' or 'ifNoParent'
	 * @param int $pageUid: The uid of the page for which the decision has to be taken
	 * @return boolean Wheter the passed page should get collected or not.
	 */
	protected function expandConfiguration_collectPageLevel(array $collectInfo, $pageUid) {
		if ($collectInfo['anyway']) {
			return TRUE;
		} elseif ($collectInfo['ifNoChild']) {
			if (!$this->expandConfiguration_pageHasChilds($pageUid)) {
				return TRUE;
			}
		} elseif ($collectInfo['ifNoParent']) {
			if (!$this->expandConfiguration_pageHasParent($pageUid)) {
				return TRUE;
			}
		}
		return FALSE;
	}
	
		
	/*
	 * A method for checking wheter the passed page has childs or not
	 *
	 * @param int $pageUid: The uid of the page to check
	 * @return boolean Wheter the page has childs or not
	 */
	function expandConfiguration_pageHasChilds($pageUid) {
		return count($this->getSubPages($pageUid)) ? TRUE : FALSE;
	}


	/*
	 * A method for checking wheter the passed page has a parent or not
	 *
	 * @param int $pageUid: The uid of the page to check
	 * @return boolean Wheter the page has a parent or not
	 */
	function expandConfiguration_pageHasParent($pageUid) {
		$pageRec = $this->getPage($pageUid);
		return $pageRec['pid'] ? TRUE : FALSE;
	}	


	/*
	 * This method returns all subpages to the requested page [cached]
	 *
	 * @param int $pageUid: The page uid of which subpages should get retrieved
	 * @return array The subpages of the requested page
	 */
	function getSubPages($pageUid) {
		if ($this->cache['cacheSubPages'][$pageUid]) {
			return $this->cache['cacheSubPages'][$pageUid];
		}
		return $this->cache['cacheSubPages'][$pageUid] = $this->page->getMenu($pageUid, 'uid');
	}

	/*
	 * This method returns a page record [cached]
	 *
	 * @param int $pageUid: The page uid to retrieve
	 * @return array The page record for the requested page
	 */
	function getPage($pageUid) {
		if ($this->cache['cachePages'][$pageUid]) {
			return $this->cache['cachePages'][$pageUid];
		}
		return $this->cache['cachePages'][$pageUid] = BackendUtility::getRecord('pages', $pageUid);
	}

	/*
	 * This method stores the current cache in the cache_hash table and frees the lock
	 *
	 * @return void
	 */
	function updateCache() {
		// Store/Update our cache to somewhere except if pages have been modified.
		// When pages have been modified invalidate (delete) the current cache.
		if ($this->pagesChanged) {
			$this->cache = false;
		}
		
		BackendUtility::storeHash($this->cacheHash, serialize($this->cache), 'tx_kbcacherelations_CACHE');
		flock($this->lockFD, LOCK_UN);
	}
		
	/*
	 * This method aquires a lock and initializes the cache
	 *
	 * @return void
	 */
	function initCache() {
		flock($this->lockFD, LOCK_EX);

		$this->cache = unserialize(BackendUtility::getHash($this->cacheHash));
		if (!is_array($this->cache) || ($this->cache['tstamp'] < (time()-3600*5))) {
			GeneralUtility::sysLog('Cache not valid. Setting cache to empty', 'kb_cacherelations', 2);
			$this->cache = $this->emptyCache;
			$this->cache['tstamp'] = time();
		}
	}

	/*
	 * The target for a copy/move operation can either be a positive value which means the target is a page
	 * or negative which means to copy/move AFTER the content element (tt_content) with the (absolute) id of the passed value
	 *
	 * @param int $value: The pointer for which to retrieve the target page
	 * @return int The page which is specified by the target pointer
	 */
	function getParentFromPointer($pointer) {
		$pointer = intval($pointer);
		if ($pointer > 0) {
			return $pointer;
		} elseif ($pointer < 0) {
			$rec = BackendUtility::getRecord('tt_content', abs($pointer));
			return $rec['pid'];
		} else {
			return 0;
		}
	}

	/*
	 * This method returns the requested page + all subpages as set via depth
	 * A depth of "1" means all pages directly beneath the passed page uid
	 * A value of -1 means ALL subpages without depth restriction
	 * A value of "0" for depth means to directly return the uid which got passed
	 *
	 * @param int $uid: The page uid which should get retrieved
	 * @param int $depth: How many sublevels should get retrieved
	 * @return array The requested page uids inclusive all subpage uids up to the requested depth
	 */
	 /*
	  * This method shouldn't be needed any more
	  */
/*
	protected function getPagesRecursive($uid, $depth = 0) {
		$ret = array();
		$ret[] = $uid;
		if (!$depth) {
			return $ret;
		}
		if (!is_object($this->page)) {
			$this->page = GeneralUtility::makeInstance('t3lib_pageSelect');
		}
		$pages = $this->page->getMenu($uid, 'uid');
		foreach ($pages as $page) {
			$subret = $this->getPagesRecursive($page['uid'], $depth-1);
			if (count($subret)) {
				$ret = array_merge($ret, $subret);
			}
		}
		return array_unique($ret);
	}
*/

}

