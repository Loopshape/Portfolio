<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Andreas Kiefer (kennziffer.com) <kiefer@kennziffer.com>
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

/**
 * Plugin 'Faceted search - searchbox and filters' for the 'ke_search' extension.
 *
 * @author	Andreas Kiefer (kennziffer.com) <kiefer@kennziffer.com>
 * @package	TYPO3
 * @subpackage	tx_kesearch
 */
class tx_kesearch_pi1 extends tx_kesearch_lib {
	var $scriptRelPath      = 'pi1/class.tx_kesearch_pi1.php';	// Path to this script relative to the extension dir.

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {

		if (TYPO3_VERSION_INTEGER >= 7000000) {
			$this->ms = TYPO3\CMS\Core\Utility\GeneralUtility::milliseconds();
		} else {
			$this->ms = t3lib_div::milliseconds();
		}
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj = 1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!

		// initializes plugin configuration
		$this->init();

		// init domReady action
		$this->initDomReadyAction();

		// add header parts when in searchbox mode
		$this->addHeaderParts();

		// init XAJAX?
		if ($this->conf['renderMethod'] != 'static') {
			if (!t3lib_extMgm::isLoaded('xajax')) {
				return ('<span style="color: red;"><b>ke_search error:</b>"XAJAX" must be installed for this mode.</span>');
			}
			else $this->initXajax();
		}

		// Spinner Image
		if ($this->conf['spinnerImageFile']) {
			$spinnerSrc = $this->conf['spinnerImageFile'];
		} else {
			$spinnerSrc = t3lib_extMgm::siteRelPath($this->extKey).'res/img/spinner.gif';
		}
		$this->spinnerImageFilters = '<img id="kesearch_spinner_filters" src="'.$spinnerSrc.'" alt="'.$this->pi_getLL('loading').'" />';
		$this->spinnerImageResults = '<img id="kesearch_spinner_results" src="'.$spinnerSrc.'" alt="'.$this->pi_getLL('loading').'" />';

		// get javascript onclick actions
		$this->initOnclickActions();



		// hook for initials
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['initials'])) {
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['initials'] as $_classRef) {
				if (TYPO3_VERSION_INTEGER >= 7000000) {
					$_procObj = & TYPO3\CMS\Core\Utility\GeneralUtility::getUserObj($_classRef);
				} else {
					$_procObj = & t3lib_div::getUserObj($_classRef);
				}
				$_procObj->addInitials($this);
			}
		}


		// get content
		$content = $this->getSearchboxContent();
		$subpart = $this->cObj->getSubpart($content, '###SHOW_SPINNER###');
		if($this->conf['renderMethod'] == 'static') {
			$content = $this->cObj->substituteSubpart($content, '###SHOW_SPINNER###', '');
		} else {
			$subpart = $this->cObj->substituteMarker($subpart, '###SPINNER###', $this->spinnerImageFilters);
			$content = $this->cObj->substituteSubpart($content, '###SHOW_SPINNER###', $subpart);
		}
		$content = $this->cObj->substituteMarker($content,'###LOADING###',$this->pi_getLL('loading'));

		
		// hook for additional searchbox markers
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['additionalSearchboxContent'])) {
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['additionalSearchboxContent'] as $_classRef) {
				if (TYPO3_VERSION_INTEGER >= 7000000) {
					$_procObj = & TYPO3\CMS\Core\Utility\GeneralUtility::getUserObj($_classRef);
				} else {
					$_procObj = & t3lib_div::getUserObj($_classRef);
				}
				$_procObj->additionalSearchboxContent($content, $this);
			}
		}
		
		return $this->pi_wrapInBaseClass($content);
	}

}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/ke_search/pi1/class.tx_kesearch_pi1.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/ke_search/pi1/class.tx_kesearch_pi1.php']);
}
?>
