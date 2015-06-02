<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Mehdi Guermazi <mehdi.guermazi@medissix.com>
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

// require_once(PATH_tslib . 'class.tslib_pibase.php');

/**
 * Plugin 'Viewer display' for the 'mdx_gdviewer' extension.
 *
 * @author	Mehdi Guermazi <mehdi.guermazi@medissix.com>
 * @package	TYPO3
 * @subpackage	tx_mdxgdviewer
 */
class tx_mdxgdviewer_pi1 extends tslib_pibase {
	public $prefixId      = 'tx_mdxgdviewer_pi1';		// Same as class name
	public $scriptRelPath = 'pi1/class.tx_mdxgdviewer_pi1.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'mdx_gdviewer';	// The extension key.
	public $pi_checkCHash = TRUE;
	
	
	
	/**
	* initializes the flexform and all config options ;-)
	*/
       function init(){
	   $this->pi_initPIflexForm(); // Init and get the flexform data of the plugin
	   $this->lConf = array(); // Setup our storage array...
	   // Assign the flexform data to a local variable for easier access
	   $piFlexForm = $this->cObj->data['pi_flexform'];
	   // Traverse the entire array based on the language...
	   // and assign each configuration option to $this->lConf array...
	   $this->lConf = $this->conf;
	   
	   foreach ( $piFlexForm['data'] as $sheet => $data ) {
	       foreach ( $data as $lang => $value ) {
		   foreach ( $value as $key => $val ) {
		       $this->lConf[$key] = ($this->pi_getFFvalue($piFlexForm, $key, $sheet)!='')?$this->pi_getFFvalue($piFlexForm, $key, $sheet):$this->conf[$key];
		   }
	       }
	   }
	}
	
	/**
	 * The main method of the Plugin.
	 *
	 * @param string $content The Plugin content
	 * @param array $conf The Plugin configuration
	 * @return string The content that is displayed on the website
	 */
	public function main($content, array $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		
		$this->init();
		
		$content = $this->display();
		
		return $this->pi_wrapInBaseClass($content);
	}
	
	public function display(){
		$viewer = $this->lConf;
		
		$viewer['urlFile'] = $this->cObj->typoLink_URL(
				array(
					'parameter' =>   '/'.$viewer['urlFile'],
					'forceAbsoluteUrl' => 1
				)      
			);
		
		$localcObj = t3lib_div::makeInstance('tslib_cObj');
		$localcObj->start($viewer,'viewer');
		
		$content = $localcObj->cObjGetSingle($this->conf['viewer'], $this->conf['viewer.']);
		
		return $content;	
	} 
}



if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/mdx_gdviewer/pi1/class.tx_mdxgdviewer_pi1.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/mdx_gdviewer/pi1/class.tx_mdxgdviewer_pi1.php']);
}

?>