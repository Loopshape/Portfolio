<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Steve Ryan <stever@syntithenai.com>
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
 * Plugin 'Google Search' for the 'googleajaxsearch' extension.
 *
 * @author	Steve Ryan <stever@syntithenai.com>
 */


require_once(PATH_tslib.'class.tslib_pibase.php');

class tx_googleajaxsearch_pi1 extends tslib_pibase {
	var $prefixId = 'tx_googleajaxsearch_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_googleajaxsearch_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey = 'googleajaxsearch';	// The extension key.
	var $pi_checkCHash = TRUE;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content,$conf)	{
		$content='';
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->conf=$this->includeFFConf($this->conf);
		$this->conf=$this->prepareConfiguration($this->conf);
		$GLOBALS['TSFE']->additionalHeaderData[$this->conf['uniqueId']]=$this->renderScript($this->conf['uniqueId'],$this->conf['apiKey'],$this->conf['resultsDOMId'],$this->conf['searchFormDOMId'],$this->conf['brandingDOMId'],$this->conf['siteRestriction'],$this->conf['titleWordRestriction'],$this->conf['urlRestriction'],$this->conf['defaultSearch']);
		$content.=$this->renderSearcher();
		return $this->pi_wrapInBaseClass($content);
	}
	
	/**
	 *   Merge flexform configuration with typoscript template configuration
	 */	
	function includeFFConf($lConf) {
		$this->pi_initPIflexForm(); // Init and get the flexform data of the plugin
		// Assign the flexform data to a local variable for easier access
		$piFlexForm = $this->cObj->data['pi_flexform'];
		// Traverse the entire array based on the language...
		// and assign each configuration option to $lConf array...
		foreach ( $piFlexForm['data'] as $sheet => $data ) {
			foreach ( $data as $lang => $value ) {
				foreach ( $value as $key => $val ) {
					$ffvalue=$this->pi_getFFvalue($piFlexForm, $key, $sheet);
					if (strlen(trim($ffvalue))>0) {
						$lConf[$key] = $ffvalue;
					}
				}
			}
		}
		return $lConf;
	}
	
	/**
	 * Manipulate configuration to be more suitable for direct usage in templates
	 */
	function prepareConfiguration($conf) {
		$contentId=explode(':',$GLOBALS['TSFE']->currentRecord);
		$contentId=$contentId[1];
		if ($contentId>0) { 	
			$uniqueId='ttcontent'.$contentId;
		} else {
			$uniqueId=substr(0,6,md5(rand(time())));
		}
		$conf['uniqueId']=$uniqueId.'_';
		
		// manipulate constants
		// site restriction
		$siteRestriction='';
		if (strlen(trim($conf['ff_siteRestriction']))>0) {
			$siteRestriction=trim($conf['ff_siteRestriction']);
		} else {
			$siteRestriction=trim($conf['siteRestriction']);
		}
		if (strlen(trim($conf['additionalSiteRestriction']))>0) {
			$siteRestriction.=' '.trim($conf['additionalSiteRestriction']);
		}
		if (strlen(trim($siteRestriction))>0) {
			$sr=explode(' ',$siteRestriction);
			$conf['siteRestriction']=implode(' OR ',$sr);
		} else {
			$conf['siteRestriction']='';	
		}
		// title word restrictions
		$titleWordRestriction='';
		if (strlen(trim($conf['ff_titleWordRestriction']))>0) {
			$titleWordRestriction=trim($conf['ff_titleWordRestriction']);
		} else {
			$titleWordRestriction=trim($conf['titleWordRestriction']);
		}
		if (strlen(trim($conf['additionalTitleWordRestriction']))>0) {
			$titleWordRestriction.=' '.trim($conf['additionalTitleWordRestriction']);
		}
		if (strlen(trim($titleWordRestriction))>0) {
			$tr = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $titleWordRestriction, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			$conf['titleWordRestriction']='intitle:'.implode(' intitle:',$tr);
		} else {
			$conf['titleWordRestriction']='';	
		}
		// url restrictions
		$urlRestriction='';
		if (strlen(trim($conf['ff_urlRestriction']))>0) {
			$urlRestriction=trim($conf['ff_urlRestriction']);
		} else {
			$urlRestriction=trim($conf['urlRestriction']);
		}
		if (strlen(trim($conf['additionalUrlRestriction']))>0) {
			$urlRestriction.=' '.trim($conf['additionalUrlRestriction']);
		}
		if (strlen(trim($urlRestriction))>0) {
			$ur = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $urlRestriction, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			$conf['urlRestriction']=' inurl:'.implode(' inurl:',$ur);
		} else {
			$conf['urlRestriction']='';	
		}		
		// link target
		$linkTarget=trim($conf['linkTarget']);
		if (strlen($linkTarget)>0 && ($linkTarget=="self" || $linkTarget=="blank" ||$linkTarget=="top" ||$linkTarget=="parent")) {
			$conf['linkTarget']=
			"a.setAttribute('target','_"
			.strtolower($linkTarget)
			."')\n";	
		} else {
			$conf['linkTarget']='';	
		}
		
		// allocate DOM positions
		$conf['searchResultsDOMAssigned']=false;
		// results
		if (strlen(trim($conf['ff_resultsDOMId']))>0) {
			$conf['resultsDOMId']=$conf['ff_resultsDOMId'];
			$conf['searchResultsDOMAssigned']=true;
		} else if (strlen(trim($conf['resultsDOMId']))>0) {
			$conf['resultsDOMId']=$conf['resultsDOMId'];
			$conf['searchResultsDOMAssigned']=true;
		} else {
			$conf['resultsDOMId']=$conf['uniqueId']."searchresults";
		}
		$conf['brandingDOMId']=$conf['uniqueId'].$this->conf['brandingDOMId'];
		$conf['searchFormDOMId']=$conf['uniqueId'].$this->conf['searchFormDOMId'];
		return $conf;
	}
	
	/**
	 * Render Javascript to enable google ajax search
	 * Allow for search components to be embedded in main layout template
	 */
	function renderSearcher() {
		$content='';
		$content.='<div id="'.$this->conf['brandingDOMId'].'" ></div><br />
			<div id="'.$this->conf['searchFormDOMId'].'"></div>
		';
		if (!$this->conf['searchResultsDOMAssigned'])  {
			$content.='<div id="'.$this->conf['resultsDOMId'].'"></div>';
		}
		return $content;
			
	}
	
	/**
	 * Render Javascript to enable google ajax search
	 */
	function renderScript($uniqueId,$apiKey,$resultsDOMId,$searchFormDOMId,$brandingDOMId,$siteRestriction,$titleWordRestriction,$urlRestriction,$defaultSearch) {
	ob_start();
	include("googlesearchscript.template");
	$content=ob_get_contents();
	ob_end_clean();
	return $content;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/googleajaxsearch/pi1/class.tx_googleajaxsearch_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/googleajaxsearch/pi1/class.tx_googleajaxsearch_pi1.php']);
}

?>