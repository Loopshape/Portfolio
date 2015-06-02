<?php

namespace SGalinski\dfContentslide\Ajax;

/***************************************************************
 *  Copyright notice
 *
 *  (c) sgalinski Internet Services
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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\Html\RteHtmlParser;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

if (!defined('PATH_typo3conf')) {
	die('Could not access this script directly!');
}

require_once(PATH_typo3 . 'contrib/RemoveXSS/RemoveXSS.php');

/**
 * Loads and renders the bodytext from a given record id with all required
 * transformations. Note that the class does not require a valid page and
 * always assumes zero as page id value.
 */
class LoadContent {
	/**
	 * @var string
	 */
	protected $content = '';

	/**
	 * Controlling method
	 *
	 * @return void
	 */
	public function main() {
		$this->initTSFE();

		$parameters = GeneralUtility::_GP('df_contentslide');
		$content = $this->getTextByRecordId($parameters['id']);
		$this->content = $this->transformContentByRteConfiguration($content);

		if (ExtensionManagementUtility::isLoaded('content_replacer')) {
			$extensionPath = ExtensionManagementUtility::extPath('content_replacer');
			require_once($extensionPath . 'Classes/Controller/class.tx_contentreplacer_controller_main.php');

			/** @var $contentReplacer tx_contentreplacer_controller_Main */
			$contentReplacer = GeneralUtility::makeInstance('tx_contentreplacer_controller_Main');
			$this->content = $contentReplacer->main($this->content);
		}
	}

	/**
	 * Prints the content
	 *
	 * @return void
	 */
	public function printContent() {
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');

		echo '<div class="dfcontentslide-content">
			<div class="dfcontentslide-contentSub">' . \RemoveXSS::process($this->content) . '</div>
		</div>';
	}

	/**
	 * Initializes the TSFE object
	 *
	 * @return void
	 */
	protected function initTSFE() {
		if (!is_object($GLOBALS['TSFE'])) {
			/** @var TypoScriptFrontendController $tsfe */
			$tsfe = $GLOBALS['TSFE'] = GeneralUtility::makeInstance(
				'tslib_fe', $GLOBALS['TYPO3_CONF_VARS'], 0, 0, TRUE
			);
			$tsfe->initFEuser();
			$tsfe->fetch_the_id();
			$tsfe->getPageAndRootline();
			$tsfe->initTemplate();
			$tsfe->forceTemplateParsing = 1;
			$tsfe->getConfigArray();
			$tsfe->includeTCA();
			$tsfe->newCObj();
		}
	}

	/**
	 * Returns the bodytext of the record identified by the given uid
	 *
	 * @param int $id
	 * @return string
	 */
	protected function getTextByRecordId($id) {
		/** @var $db DatabaseConnection */
		$enableFields = $GLOBALS['TSFE']->sys_page->enableFields('tt_content');
		$db = $GLOBALS['TYPO3_DB'];
		$row = $db->exec_SELECTgetSingleRow(
			'bodytext',
			'tt_content',
			'uid = ' . intval($id) . $enableFields
		);

		return $row['bodytext'];
	}

	/**
	 * Processes the given text with the rte transformations
	 *
	 * @param string $content
	 * @return string
	 */
	protected function transformContentByRteConfiguration($content) {
		$RTEsetup = array();
		$RTEtypeVal = BackendUtility::getTCAtypeValue('tt_content', array());
		$thisConfig = BackendUtility::RTEsetup($RTEsetup['properties'], 'tt_content', 'bodytext', $RTEtypeVal);

		$specConf['rte_transform']['parameters'] = array(
			'flag=rte_enabled',
			'mode=ts_css-ts_links'
		);

		/** @var $parsehtml_proc RteHtmlParser */
		$parsehtml_proc = GeneralUtility::makeInstance('t3lib_parsehtml_proc');
		return $parsehtml_proc->RTE_transform($content, $specConf, 'rte', $thisConfig);
	}
}

/** @var $object LoadContent */
$object = GeneralUtility::makeInstance('SGalinski\dfContentslide\Ajax\LoadContent');
$object->main();
$object->printContent();

?>