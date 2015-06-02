<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2014 W. Rotschek <typo3@dev-null.at>
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
 * Plugin 'Source Code Highlighter' for the 'dev_null_geshi' extension.
 *
 * Class that adds the wizard icon.
 *
 * @author	Wolfgang Rotschek <typo3@dev-null.at>
 */
class tx_devnullgeshi_pi1_wizicon {
	
	const KEY = 'dev_null_geshi';

	function proc($wizardItems)	{
		$wizardItems["plugins_tx_devnullgeshi_pi1"] = array(
			'icon'			=> \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(self::KEY).'pi1/ce_wiz.gif',
			'title'			=> $GLOBALS['LANG']->sL('LLL:EXT:dev_null_geshi/Resources/Private/Language/locallang_be.xml:pi1_title'),
			'description'	=> $GLOBALS['LANG']->sL('LLL:EXT:dev_null_geshi/Resources/Private/Language/locallang_be.xml:pi1_plus_wiz_description'),
			'params'		=> '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=' . self::KEY . '_pi1'
		);

		return $wizardItems;
	}
	
}

?>