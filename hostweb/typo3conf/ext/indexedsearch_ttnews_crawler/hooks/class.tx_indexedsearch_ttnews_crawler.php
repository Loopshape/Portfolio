<?php
/** @define "PATH_t3lib" "../../../../t3lib/" */
/** @define "t3lib_extMgm::extPath('tt_news')" "../../tt_news" */
/** @define "t3lib_extMgm::extPath('indexed_search')" "../../../../typo3/sysext/indexed_search" */

// load the indexed_search crawler-module
require_once(t3lib_extMgm::extPath('indexed_search') . 'class.crawler.php');

// Load TYPOSCRIPT in this backend-module
require_once (PATH_t3lib . 'class.t3lib_page.php');
require_once (PATH_t3lib . 'class.t3lib_tstemplate.php');
require_once (PATH_t3lib . 'class.t3lib_tsparser_ext.php');

// Load tt_news to generate the real tt_news-links
require_once t3lib_extMgm::extPath('tt_news') . 'pi/class.tx_ttnews.php';


/**
 * Index search crawler for tt_news entries
 *
 * @package TYPO3
 * @subpackage tx_indexedsearch_ttnews_crawler
 * @author	Simon Schick <simonsimcity@gmail.com>
 */
class tx_indexedsearch_ttnews_crawler extends tx_indexedsearch_crawler {

	/**
	 * Important for gathering the list of updated news from the DataHandler. If you have other records included in a
	 * news-record, it may get's updated after the tt_news record has got it's update. We gather the update-requests
	 * for news-records and update the search-index after all records in this request are updated.
	 * This is specially important when using extensions like tx_indexedsearch_rendered_ttnews, where the real rendered
	 * content is added to the index, and rgnewsce, that adds tt_content to the content in a news-article. The
	 * tt_content data-set is, as it's implemented in the DataHandler, saved after the tt_news record is saved.
	 * @var array
	 */
	private $indexSingleNewsRecordCalls = array();

	private $globalConfig;

	private static $linkParams;

	/**
	 * @var tx_ttnews
	 */
	private static $tx_ttnews;

	/**
	 * This function returs the whole TypoScript-Setup array
	 *
	 * @param $pageId int
	 * @return array
	 */
	private function loadTS($pageId) {
		/** @var $TSFE tslib_fe */
		/** @var $TT t3lib_timeTrack */
		global $TSFE, $TT;

		// needed by some extensions like realURL
		$TT = t3lib_div::makeInstance('t3lib_timeTrack');

		$TSFE = t3lib_div::makeInstance('tslib_fe', array(), $pageId, 0);
		$TSFE->sys_page = t3lib_div::makeInstance('t3lib_pageSelect');
		$TSFE->rootLine = $TSFE->sys_page->getRootLine($pageId);
		$TSFE->initTemplate();
		$TSFE->getConfigArray();

		return $TSFE->tmpl->setup;
	}


	/**
	 * Function is called when an indexing session starts according to the time intervals set for the indexing configuration.
	 *
	 * @return	string		Return a text string for the first, initiating queue entry for the crawler.
	 */
	function initMessage() {
		return 'Start of news Indexing session!';
	}

	/**
	 * This will do two things:
	 * 1) Carry out actual indexing of content (one or more items)
	 * 2) Add one or more new entries into the crawlers queue so we are called again (another instance) for further indexing in the session (optional of course, if all indexing is done, we add no new entries)
	 *
	 * @param array $cfgRec         Indexing Configuration Record (the record which holds the information that lead to this indexing session...)
	 * @param array $session_data   Session data variable. Passed by reference. Changed content is saved and passed back upon next instance in the session.
	 * @param array $params         Params array from the queue entry.
	 * @param object $pObj          Parent Object (from "indexed_search" extension)
	 * @return void
	 */
	function indexOperation($cfgRec, &$session_data, $params, &$pObj) {

		// Init session data array if not already:
		if (!is_array($session_data)) {
			$session_data = array(
				'uid' => 0
			);
		}

		// Init:
		$pid = intval($cfgRec['alternative_source_pid']) ? intval($cfgRec['alternative_source_pid']) : $cfgRec['pid'];
		$numberOfRecords = $cfgRec['recordsbatch'] ? t3lib_div::intInRange($cfgRec['recordsbatch'], 1) : 250;
		$this->globalConfig = $this->loadTS($cfgRec['pid']);

		// Get root line:
		$rl = $this->getUidRootLineForClosestTemplate($cfgRec['pid']);

		// Select
		$recs = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'*',
			'tt_news',
			'pid = ' . intval($pid) . '
				AND uid > ' . intval($session_data['uid']) .
				t3lib_BEfunc::deleteClause('tt_news') .
				t3lib_BEfunc::BEenableFields('tt_news'),
			'',
			'uid',
			$numberOfRecords
		);

		$indexingCatSelection = $this->getIndexingCategorySelection(t3lib_div::trimExplode(',', $cfgRec['news_categoryselection']), $cfgRec['news_usesubcategories']);

		// Traverse:
		if (count($recs)) {
			foreach ($recs as $r) {

				$recordCatSelection = $this->getRecordsCategorySelection($r);
				if ($this->categorySelectionIsPermitted($recordCatSelection, $indexingCatSelection, $cfgRec['news_includenewswithoutcategory'])) {
					// Index single record:
					$this->indexSingleNewsRecord($r, $cfgRec, $rl);
				}

				// Update the UID we last processed:
				$session_data['uid'] = $r['uid'];
			}

			// Finally, set entry for next indexing of batch of records:
			$nparams = array(
				'indexConfigUid' => $cfgRec['uid'],
				'url' => 'News from UID#' . ($r['uid'] + 1) . '-?',
				'procInstructions' => array(
					'[Index Cfg UID#' . $cfgRec['uid'] . ']'
				)
			);
			$pObj->pObj->addQueueEntry_callBack(
				$cfgRec['set_id'],
				$nparams,
				$this->callBack,
				$cfgRec['pid']
			);

		}
	}

	/**
	 * Indexing News Record
	 * This is mostly a hardcopy of indexSingleRecord()
	 *
	 * @param array $r          Record to index
	 * @param array $cfgRec     Configuration Record
	 * @param array|null $rl    Rootline array to relate indexing to
	 * @return void
	 */
	function indexSingleNewsRecord($r, $cfgRec, $rl = NULL) {

		// Load indexer if not yet.
		$this->loadIndexerClass();

		// Init news-object
		if (!isset(self::$tx_ttnews)) {
			self::$tx_ttnews = t3lib_div::makeInstance('tx_ttnews');
			self::$tx_ttnews->cObj = t3lib_div::makeInstance('tslib_cObj');
            self::$tx_ttnews->hObj = new tx_ttnews_helpers(self::$tx_ttnews);
            self::$tx_ttnews->init();
		}
		// reset typoscript configuration
		self::$tx_ttnews->conf = $this->globalConfig['plugin.']['tt_news.'];

		// Init:
		$rl = is_array($rl) ? $rl : $this->getUidRootLineForClosestTemplate($cfgRec['pid']);
		$fieldList = t3lib_div::trimExplode(',', $cfgRec['fieldlist'], 1);
		$languageField = $GLOBALS['TCA']['tt_news']['ctrl']['languageField'];
		$sys_language_uid = $languageField ? $r[$languageField] : 0;

		// (Re)-Indexing a row from a table:
		/** @var tx_indexedsearch_indexer $indexerObj */
		$indexerObj = t3lib_div::makeInstance('tx_indexedsearch_indexer');

		$GETparams = array('tx_ttnews[tt_news]' => $r['uid']);
		self::$tx_ttnews->getSingleViewLink($r['pid'], $r, array(), true);
		foreach (self::$linkParams as $key => $value)
			if ($value !== NULL && $key !== 'tt_news')
				$GETparams['tx_ttnews[' . $key . ']'] = $value;

		self::$linkParams = NULL;

		$indexerObj->backend_initIndexer(
			$cfgRec['pid'],
			0,
			$sys_language_uid,
			'',
			$rl,
			$GETparams,
			$cfgRec['chashcalc'] ? TRUE : FALSE
		);

		$indexerObj->backend_setFreeIndexUid($cfgRec['uid'], $cfgRec['set_id']);
		$indexerObj->forceIndexing = TRUE;

		// hook for manipulating the item-row before the title and the content are added to the index
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexedsearch_ttnews_crawler']['indexSingleNewsRecord'])) {
			foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexedsearch_ttnews_crawler']['indexSingleNewsRecord'] as $_classRef) {
				$_procObj = & t3lib_div::getUserObj($_classRef);
				$r = $_procObj->indexSingleNewsRecord(
					$fieldList,
					$r,
					self::$tx_ttnews);
			}
		}

		$theTitle = $theContent = '';
		foreach ($fieldList as $k => $v) {
			if (!$k) {
				$theTitle = $r[$v];
			} else {
				$theContent .= $r[$v] . ' ';
			}
		}

		// Indexing the record as a page (but with parameters set, see ->backend_setFreeIndexUid())
		$indexerObj->backend_indexAsTYPO3Page(
			strip_tags(str_replace('<', ' <', $theTitle)),
			'',
			'',
			strip_tags(str_replace('<', ' <', $theContent)),
			$GLOBALS['LANG']->charSet, // Requires that
			$r[$GLOBALS['TCA']['tt_news']['ctrl']['tstamp']],
			$r[$GLOBALS['TCA']['tt_news']['ctrl']['crdate']],
			$r['uid']
		);
	}

	public function processDatamap_beforeStart() {
		$this->indexSingleNewsRecordCalls = array();
	}

	/**
	 * TCEmain hook function for on-the-fly indexing of database records
	 * This is mostly a hardcopy of its parent function
	 *
	 * @param string $status    Status "new" or "update"
	 * @param string $table     Table name
	 * @param string $id        Record ID. If new record its a string pointing to index inside t3lib_tcemain::substNEWwithIDs
	 * @param array	$fieldArray Field array of updated fields in the operation
	 * @param object $pObj      Reference to tcemain calling object
	 * @return void
	 */
	public function processDatamap_afterDatabaseOperations($status, $table, $id, $fieldArray, $pObj) {

		// Check if any fields are actually updated:
		if (count($fieldArray)) {

			// Translate new ids.
			if ($status == 'new') {
				$id = $pObj->substNEWwithIDs[$id];

			} elseif ($table == 'pages' && $status == 'update' && ((array_key_exists('hidden', $fieldArray) && $fieldArray['hidden'] == 1) || (array_key_exists('no_search', $fieldArray) && $fieldArray['no_search'] == 1))) {

				// If the page should be hidden or not indexed after update, delete index for this page
				$this->deleteFromIndex($id);
			}
			// Get full record and if exists, search for indexing configurations:
			$currentRecord = t3lib_BEfunc::getRecord($table, $id);

			// overwrite uid-entry because if it's a new entry TYPO3-BE will return the NEW-UID-Hash instead of the real uid which can be found in the db.
			$currentRecord['uid'] = $id;

			if (is_array($currentRecord)) {

				// Select all (not running) indexing configurations of type "record" (1) and which points to this table and is located on the same page as the record or pointing to the right source PID
				$indexingConfigurations = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
					'*',
					'index_config',
					'hidden=0
						AND (starttime=0 OR starttime<=' . $GLOBALS['EXEC_TIME'] . ')
						AND set_id=0
						AND type=\'indexedsearch_ttnews_crawler\'
						AND (
								(alternative_source_pid=0 AND pid=' . intval($currentRecord['pid']) . ')
								OR (alternative_source_pid=' . intval($currentRecord['pid']) . ')
							)
						AND records_indexonchange=1
						' . t3lib_BEfunc::deleteClause('index_config')
				);

				foreach ($indexingConfigurations as $cfgRec) {
					$recordCatSelection = $this->getRecordsCategorySelection($currentRecord);
					$indexingCatSelection = $this->getIndexingCategorySelection(t3lib_div::trimExplode(',', $cfgRec['news_categoryselection']), $cfgRec['news_usesubcategories']);
					if ($this->categorySelectionIsPermitted($recordCatSelection, $indexingCatSelection, $cfgRec['news_includenewswithoutcategory'])) {
						$this->indexSingleNewsRecordCalls[] = array($currentRecord, $cfgRec);
					}
				}
			}
		}
	}

	public function processDatamap_afterAllOperations() {
		foreach($this->indexSingleNewsRecordCalls as $params) {
			list($currentRecord, $cfgRec) = $params;

			$this->globalConfig = $this->loadTS($cfgRec['pid']);
			$this->indexSingleNewsRecord($currentRecord, $cfgRec);
		}
	}

	/**
	 * If this list of categories matches one of these record categories
	 *
	 * @param array $recordCatSelection
	 * @param array $indexingCatSelection
	 * @param boolean $includeNewsWithoutCategory
	 * @return boolean
	 */
	private function categorySelectionIsPermitted($recordCatSelection, $indexingCatSelection, $includeNewsWithoutCategory = false) {

		if ($includeNewsWithoutCategory && empty($recordCatSelection))
			return true;

		foreach ($recordCatSelection as $catSelection) {
			if (in_array($catSelection, $indexingCatSelection)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * return all categories which are related to this news-entry
	 *
	 * @param array $currentRecord
	 * @return array
	 */
	private function getRecordsCategorySelection($currentRecord) {
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			'uid_foreign',
			'tt_news_cat_mm',
			'uid_local=' . $currentRecord['uid'] .
					t3lib_BEfunc::deleteClause('tt_news_cat_mm') .
					t3lib_BEfunc::BEenableFields('tt_news_cat_mm')
		);

		$recordCatSelection = array();
		while (($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))) {
			$recordCatSelection[] = $row['uid_foreign'];
		}

		return $recordCatSelection;
	}

	/**
	 * return all categories which are related to this indexing configuration
	 *
	 * @param array $indexingCatSelection
	 * @param boolean $includeSubCategories
	 * @return array
	 */
	private function getIndexingCategorySelection($indexingCatSelection, $includeSubCategories) {

		$catSelection = $indexingCatSelection;

		if ($includeSubCategories && !empty($catSelection)) {
			$subcats = array_unique(explode(',', tx_ttnews_div::getSubCategories(implode(',', $catSelection), t3lib_BEfunc::BEenableFields('tt_news_cat'))));

			$catSelection = array_merge($catSelection, $subcats);
		}

		return $catSelection;
	}

	/**
	 * Save the linkParams by a tt_news-hook.
	 * Otherwise I have to decode the URL given by the function getSingleViewLink()
	 *
	 * @param array $linkWrap
	 * @param string $url
	 * @param array $params
	 * @param tx_ttnews $cObj
	 * @return void
	 */
	public function processSingleViewLink($linkWrap, $url, $params, $cObj) {
		self::$linkParams = $params['piVarsArray'];
	}
}

?>