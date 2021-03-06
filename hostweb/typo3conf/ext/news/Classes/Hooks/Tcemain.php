<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Hook into tcemain which is used to show preview of news item
 *
 * @package TYPO3
 * @subpackage tx_news
 */
class Tx_News_Hooks_Tcemain {

	/**
	 * Flushes the cache if a news record was edited.
     * This happens on two levels: by UID and by PID.
	 *
	 * @param array $params
	 * @return void
	 */
	public function clearCachePostProc(array $params) {
		if (isset($params['table']) && $params['table'] === 'tx_news_domain_model_news') {
            $cacheTagsToFlush = array();
            if (isset($params['uid'])) {
                $cacheTagsToFlush[] = 'tx_news_uid_' . $params['uid'];
            }
            if (isset($params['uid_page'])) {
                $cacheTagsToFlush[] = 'tx_news_pid_' . $params['uid_page'];
            }

            /** @var $cacheManager \TYPO3\CMS\Core\Cache\CacheManager */
            $cacheManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager');
            foreach ($cacheTagsToFlush as $cacheTag) {
                $cacheManager->getCache('cache_pages')->flushByTag($cacheTag);
                $cacheManager->getCache('cache_pagesection')->flushByTag($cacheTag);
            }
        }
    }

	/**
	 * Generate a different preview link     *
	 * @param string $status status
	 * @param string $table table name
	 * @param integer $recordUid id of the record
	 * @param array $fields fieldArray
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $parentObject parent Object
	 * @return void
	 */
	public function processDatamap_afterDatabaseOperations($status, $table, $recordUid, array $fields, \TYPO3\CMS\Core\DataHandling\DataHandler $parentObject) {
		// Clear category cache
		if ($table === 'sys_category') {
			/** @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface $cache */
			$cache = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')->getCache('cache_news_category');
			$cache->flush();
		}

		// Preview link
		if ($table === 'tx_news_domain_model_news') {

			// direct preview
			if (!is_numeric($recordUid)) {
				$recordUid = $parentObject->substNEWwithIDs[$recordUid];
			}

			if (isset($GLOBALS['_POST']['_savedokview_x']) && !$fields['type']) {
				// If "savedokview" has been pressed and current article has "type" 0 (= normal news article)
				$pagesTsConfig = \TYPO3\CMS\Backend\Utility\BackendUtility::getPagesTSconfig($GLOBALS['_POST']['popViewId']);
				if ($pagesTsConfig['tx_news.']['singlePid']) {
					$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_news_domain_model_news', $recordUid);

					$parameters = array(
						'no_cache' => 1,
						'tx_news_pi1[controller]' => 'News',
						'tx_news_pi1[action]' => 'detail',
						'tx_news_pi1[news_preview]' => $record['uid'],
					);
					if ($record['sys_language_uid'] > 0) {
						if ($record['l10n_parent'] > 0) {
							$parameters['tx_news_pi1[news_preview]'] = $record['l10n_parent'];
						}
						$parameters['L'] = $record['sys_language_uid'];
					}

					$GLOBALS['_POST']['popViewId_addParams'] = \TYPO3\CMS\Core\Utility\GeneralUtility::implodeArrayForUrl('', $parameters, '', FALSE, TRUE);
					$GLOBALS['_POST']['popViewId'] = $pagesTsConfig['tx_news.']['singlePid'];
				}
			}
		}
	}

	/**
	 * Prevent saving of a news record if the editor doesn't have access to all categories of the news recird
	 *
	 * @param array $fieldArray
	 * @param string $table
	 * @param int $id
	 * @param $parentObject \TYPO3\CMS\Core\DataHandling\DataHandler
	 */
	public function processDatamap_preProcessFieldArray(&$fieldArray, $table, $id, $parentObject) {
		if ($table === 'tx_news_domain_model_news') {
			// check permissions of assigned categories
			if (is_int($id) && !$GLOBALS['BE_USER']->isAdmin()) {
				$newsRecord = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($table, $id);
				if (!\Tx_News_Service_AccessControlService::userHasCategoryPermissionsForRecord($newsRecord)) {
					$parentObject->log($table, $id, 2, 0, 1, "processDatamap: Attempt to modify a record from table '%s' without permission. Reason: the record has one or more categories assigned that are not defined in your BE usergroup.", 1, array($table));
					// unset fieldArray to prevent saving of the record
					$fieldArray = array();
				}
			}
		}
	}

	/**
	 * Prevent deleting/moving of a news record if the editor doesn't have access to all categories of the news recird
	 *
	 * @param string $command
	 * @param string $table
	 * @param int $id
	 * @param string $value
	 * @param $parentObject \TYPO3\CMS\Core\DataHandling\DataHandler
	 */
	public function processCmdmap_preProcess($command, &$table, $id, $value, $parentObject) {
		if ($table === 'tx_news_domain_model_news' && !$GLOBALS['BE_USER']->isAdmin() && is_integer($id)) {
			$newsRecord = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($table, $id);
			if (!\Tx_News_Service_AccessControlService::userHasCategoryPermissionsForRecord($newsRecord)) {
				$parentObject->log($table, $id, 2, 0, 1, "processCmdmap: Attempt to " . $command . " a record from table '%s' without permission. Reason: the record has one or more categories assigned that are not defined in the BE usergroup.", 1, array($table));
				// unset table to prevent saving
				$table = '';
			}
		}
	}

}