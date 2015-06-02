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

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('dev_null_geshi').'lib/geshi-1.0.8/geshi.php');

/**
 * Plugin 'Source Code Highlighter' for the 'dev_null_geshi' extension.
 *
 * @author	Wolfgang Rotschek <typo3@dev-null.at>
 * @package	TYPO3
 * @subpackage	tx_devnullgeshi
 */
class tx_devnullgeshi_pi1 extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin {
	var $prefixId      = 'tx_devnullgeshi_pi1';
	var $scriptRelPath = 'pi1/class.tx_devnullgeshi_pi1.php';

	var $extKey        = 'dev_null_geshi';
	var $pi_checkCHash = true;

	/**
	 * @var GeSHi
	 */
	var $geshi = null;

	/**
	 * The main method of the Plugin
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $config) {
		// get content
		$this->pi_initPIflexForm();

		$config['content.']['lang'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cLang', 'sVIEW');
		$config['content.']['code'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cCode', 'sVIEW');
		$config['content.']['highlight'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cHighlight', 'sOPTIONS');
		$config['content.']['startnumber'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cStartnumber', 'sOPTIONS');
		
		// init geshi library
		$this->geshi = new GeSHi($config['content.']['code'], $config['content.']['lang']);

		// defaults
		$this->geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
			
		// set highlighted lines
		if ($config['content.']['highlight'] !== '') {
			$this->geshi->highlight_lines_extra(split(',', $config['content.']['highlight']));
		}
		
		// set startnumber
		if (isset($config['content.']['startnumber'])) {
			$this->geshi->start_line_numbers_at($config['content.']['startnumber']);
		}

		// style
		if (isset($config['default.'])) {
			$this->_styleSubjects($config['default.']);
		}
		if (isset($config[$config['content.']['lang'].'.'])) {
			$this->_styleSubjects($config[$config['content.']['lang'].'.']);
		}
	
		// external stylesheets
		if (isset($config['global.']['external']) && $config['global.']['external'] == 0) {
			
			// do not use external style sheets
			
		} else {
			
			// mtness.net modification: I love stylesheets!
			$this->geshi->enable_classes();
			// Echo out the stylesheet for this code block And continue echoing the page
			$this->geshiCSS = '<style type="text/css"><!--'.$this->geshi->get_stylesheet().'--></style>';
			// additional headerdata to include the styles
			$GLOBALS['TSFE']->additionalHeaderData['dev_null_geshi:'.$config['content.']['lang']] = $this->geshiCSS;

		}

		// xhtml compliance
		if (isset($config['global.']['xhtmlcompliant']) && $config['global.']['xhtmlcompliant'] == 1) {
			$this->geshi->set_xhtml_compliance(true);
		}
		
		// check for errors
		if ($this->geshi->error() !== false) {
			// log an error, this happens if the language file is missing or non-readable. Other input
			// specific errors can also occour, eg. if a non-existing container type is set for the engine.
			$GLOBALS['BE_USER']->simplelog($this->geshi->error(), $extKey='dev_null_geshi', 1);
		}
		
		// render
		return $this->pi_wrapInBaseClass($this->geshi->parse_code());
	}

	/**
	 * Style language
	 *
	 * @param array $subjects
	 */
	function _styleSubjects($subjects) {

		// set overall style
		if (isset($subjects['view'])) {
			$this->geshi->set_overall_style($subjects['view'],
				$this->_invertOverwrite($subjects['view.']['overwrite']));
		}
		if (isset($subjects['view.']['container'])) {
			switch(strtolower($subjects['view.']['container'])) {
				case 'none':
					$this->geshi->set_header_type(GESHI_HEADER_NONE);
					break;
				case 'div':
					$this->geshi->set_header_type(GESHI_HEADER_DIV);
					break;
				case 'pre':
				default:
					$this->geshi->set_header_type(GESHI_HEADER_PRE);
					break;
			}
		}
		if (isset($subjects['view.']['tabwidth'])) {
			$this->geshi->set_tab_width(intval($subjects['view.']['tabwidth']));
		}

		// configure linenumbers
		if (isset($subjects['linenumbers'])) {
			$this->geshi->set_line_style($subjects['linenumbers'],
				isset($subjects['linenumbers.']['fancy']) ? $subjects['linenumbers.']['fancy'] : '',
				$this->_invertOverwrite($subjects['linenumbers.']['overwrite']));
		}
		
		// enable / disable linenumbers
		if (isset($subjects['linenumbers.']['enable']))
		{
			$this->geshi->enable_line_numbers($subjects['linenumbers.']['enable']);
		}

		// configure code style
		if (isset($subjects['code'])) {
			$this->geshi->set_code_style($subjects['code'],
				$this->_invertOverwrite($subjects['code.']['overwrite']));
		}

		// configure escape
		if (isset($subjects['escape'])) {
			$this->geshi->set_escape_characters_style($subjects['escape'],
				$this->_invertOverwrite($subjects['escape.']['overwrite']));
		}

		// configure symbols
		if (isset($subjects['symbols'])) {
			$this->geshi->set_symbols_style($subjects['symbols'],
				$this->_invertOverwrite($subjects['symbols.']['overwrite']));
		}

		// configure strings
		if (isset($subjects['strings'])) {
			$this->geshi->set_strings_style($subjects['strings'],
				$this->_invertOverwrite($subjects['strings.']['overwrite']));
		}

		// configure numbers
		if (isset($subjects['numbers'])) {
			$this->geshi->set_numbers_style($subjects['numbers'],
				$this->_invertOverwrite($subjects['numbers.']['overwrite']));
		}

		// configure comment style
		if (isset($subjects['comments.'])) {
			foreach ($subjects['comments.'] as $key => $value) {
				if (strstr($key, '.') == false) {
					$this->geshi->set_comments_style($key, $value, $this->_invertOverwrite($subjects['comments.'][$key.'.']['overwrite']));
				}
			}
		}

		// configure keywords style
		if (isset($subjects['keywords.'])) {
			foreach ($subjects['keywords.'] as $key => $value) {
				if (strstr($key, '.') == false) {
					$this->geshi->set_keyword_group_style($key, $value, $this->_invertOverwrite($subjects['keywords.'][$key.'.']['overwrite']));
				}
			}
		}

		// enable / disable keyword links
		if (isset($subjects['keyword.']['links.']['enable'])) {
			$this->geshi->enable_keyword_links($subjects['keyword.']['links.']['enable']);
		}

		// configure keyword link styles
		if (isset($subjects['keyword.']['links'])) {
			$this->geshi->set_link_styles(GESHI_LINK, $subjects['keyword.']['links']);
		}

		if (isset($subjects['keyword.']['links.']['hover'])) {
			$this->geshi->set_link_styles(GESHI_HOVER, $subjects['keyword.']['links.']['hover']);
		}

		if (isset($subjects['keyword.']['links.']['active'])) {
			$this->geshi->set_link_styles(GESHI_ACTIVE, $subjects['keyword.']['links.']['active']);
		}

		if (isset($subjects['keyword.']['links.']['visited'])) {
			$this->geshi->set_link_styles(GESHI_VISITED, $subjects['keyword.']['links.']['visited']);
		}

		// configure keyword link target
		if (isset($subjects['keyword.']['links.']['target'])) {
			$this->geshi->set_link_target($subjects['keyword.']['links.']['target']);
		}

		// configure method styles
		if (isset($subjects['methods.'])) {
			foreach ($subjects['methods.'] as $key => $value) {
				if (strstr($key, '.') == false) {
					$this->geshi->set_methods_style($key, $value, $this->_invertOverwrite($subjects['methods.'][$key.'.']['overwrite']));
				}
			}
		}
		
	}

	/**
	 * Invert the overwrite parameter given by the user (in GeSHi true = do not overwrite, false = overwrite).
	 * Defaults to false (overwrite).
	 *
	 * @param bool $overwrite
	 * @return bool
	 */
	function _invertOverwrite($overwrite)
	{
		return $overwrite == 0 ? true : false;
	}
}

?>
