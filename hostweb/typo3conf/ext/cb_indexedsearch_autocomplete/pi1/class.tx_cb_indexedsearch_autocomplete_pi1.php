<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015 Arun Chandran <arun.c@pitsolutions.com>(Pre Owner: Claus Bruun <claus@clausbruun.dk>)
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

//require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'hook' for the 'cb_indexedsearch_autocomplete' extension.
 *
 * @author    Claus Bruun <claus@clausbruun.dk>
 * @package    TYPO3
 * @subpackage    tx_cb_indexedsearch_autocomplete
 */
 
class tx_cb_indexedsearch_autocomplete_pi1
{
	/**
	 * Hook from indexed_search
	 */
	function initialize_postProc()
	{
		$on_search_page = 1;
		return $this->main($on_search_page);
	}

	/**
	 * Add the Js and stylesheet
	 */
	function main($on_search_page = 0)
	{
		$this->key = 'cb_indexedsearch_autocomplete';

		// alternative labels (waiting for real i18n support)
		$altResultLabel = str_replace("'", "", $GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['altResultLabel']);
		$altResultsLabel = str_replace("'", "", $GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['altResultsLabel']);

		// Should we auto-submit the search form?
		$autoSubmit = intval($GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['autoSubmit']);

		// Which jQuery library should be loaded?
		$jQueryFile = $GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['jQueryFile'];

		// Is jQuery already loaded externally?
		$jQueryLoadedExternally = intval($GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['jQueryLoadedExternally']);

		// Are the CSS definitions already loaded externally?
		$cssLoadedExternally = intval($GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['cssLoadedExternally']);

		// Supprt extension t3query for jQuery loadage
		if (t3lib_extMgm::isLoaded('t3jquery'))
		{
			require_once(t3lib_extMgm::extPath('t3jquery').'class.tx_t3jquery.php');
		}

		// Should we limit the result to a number of suggestions?
		$maxResults = intval($GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['maxResults']);

		// Shall we auto correct the lists width?
		$autoResize = $GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['autoResize'] ? 'true' : 'false';

		// Should we run into jQuery noConflict Method? 
		$noConflictMethod = intval($GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['noConflictMethod']);

		// Do we need this at all pages?
		$onlySearchPage = intval($GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->key . '.']['onlySearchPage']);

		if(intval($on_search_page) == 0 && $onlySearchPage != 0)
		{
			return '';
		}

		// No need to insert twice
		if($GLOBALS[$this->key] != 1)
		{
			$head = '';
			// Include JS
			// load jQuery via t3jquery extension?
			if (T3JQUERY === true)
			{
				tx_t3jquery::addJqJS();
			}
			else if (!$jQueryLoadedExternally)
			{
				//$jquery_filepath = str_replace('EXT:cb_indexedsearch_autocomplete/', t3lib_extMgm::siteRelPath($this->key), $jQueryFile);
				//$head .= "\n" . '<script type="text/javascript" src="' . $jquery_filepath . '"></script>';
			}
			$head .= "\n" . '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath($this->key) . 'res/cb_indexedsearch_autocomplete.js"></script>';

			// Include CSS
			if (!$cssLoadedExternally)
			{
				$head .= "\n" . '<link rel="stylesheet" type="text/css" href="' . t3lib_extMgm::siteRelPath($this->key) . 'res/cb_indexedsearch_autocomplete.css" />';
			}

			// Make rootpage global as we dont have it when we 'eId'. People can tamper with it client side, so we hash it, making it a little harder for them. It does not mean much they will not get access to more pages than they should anyways
			$head .= "\n" . '<script type="text/javascript">' . "\n";
			if ($noConflictMethod > 0)
			{
				$head .= "	jQuery.noConflict();\n";
			}
			$head .= 'var ll='.intval($GLOBALS['TSFE']->sys_language_uid) . ';var sr=' . intval($GLOBALS['TSFE']->config['rootLine'][0]['uid']) . ';var sh="' . t3lib_div::md5int($GLOBALS['TSFE']->config['rootLine'][0]['uid'] . $GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey']) . '";' . "\n";
			$head .= "	var cb_indexsearch_autocomplete = {\n";
			$head .= "		altResultLabel: '$altResultLabel',\n";
			$head .= "		altResultsLabel: '$altResultsLabel',\n";
			$head .= "		autoSubmit: $autoSubmit,\n";
			$head .= "		maxResults: $maxResults,\n";
			$head .= "		autoResize: $autoResize\n";
			$head .= "	};\n";
			$head .= "</script>\n";
			
			$GLOBALS['TSFE']->additionalFooterData['tx_cb_indexedsearch_autocomplete_pi1'] = $head;
			
			// We have been here
			$GLOBALS[$this->key] = 1;
		}
		return '';
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cb_indexedsearch_autocomplete/pi1/class.tx_cb_indexedsearch_autocomplete_pi1.php'])    {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cb_indexedsearch_autocomplete/pi1/class.tx_cb_indexedsearch_autocomplete_pi1.php']);
}

?>