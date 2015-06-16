<?php
/***************************************************************
*  Copyright notice
*
 * (c) 2014 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
 * All rights reserved
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
unset($MCONF);
require_once 'conf.php';
require_once $BACK_PATH . 'init.php';
require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
if (!tx_rnbase_util_TYPO3::isTYPO62OrHigher()) {
	require_once $BACK_PATH . 'template.php';
}


$LANG->includeLLFile('EXT:t3socials/mod/locallang.xml');
// This checks permissions and exits if the users has no permission for entry.
$BE_USER->modAccess($MCONF, 1);
// DEFAULT initialization of a module [END]

tx_rnbase::load('tx_rnbase_configurations');
tx_rnbase::load('tx_rnbase_mod_BaseModule');
tx_rnbase::load('tx_t3socials_mod_util_Template');
tx_rnbase::load('tx_t3socials_mod_util_Message');

/**
 * Backend Modul für t3socials
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Rene Nitzsche <rene@system25.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class  tx_t3socials_mod_Module
	extends tx_rnbase_mod_BaseModule {

	/**
	 * Method to get the extension key
	 *
	 * @return	string Extension key
	 */
	public function getExtensionKey() {
		return 't3socials';
	}

	/**
	 * Method to set the tabs for the mainmenu
	 * Umstellung von SelectBox auf Menu
	 *
	 * @return array
	 */
	protected function getFuncMenu() {
		$mainmenu = $this->getFormTool()->showTabMenu($this->getPid(), 'function', $this->getName(), $this->MOD_MENU['function']);
		return $mainmenu['menu'];
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/index.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/index.php']);
}

// Make instance:
$SOBE = t3lib_div::makeInstance('tx_t3socials_mod_Module');
$SOBE->init();

// Include files?
foreach ($SOBE->include_once as $incFile) {
	require_once $incFile;
}

$SOBE->main();
$SOBE->printContent();
