<?php
/***************************************************************
*  Copyright notice
*  
*  (c) 2003 Tim Kleigrewe (x27@e27.com)
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is 
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
 * Plugin 'Google API Search' for the 'google_api_search' extension.
 * for private use only!! 
 * @author	Tim Kleigrewe <x27@e27.com> 
 * thanks to: many nice people all over the world; 
 * www.google.com/apis (its a beta project by the way - keep that in mind)
 * and Dietrich Ayala dietrich@ganx4.com / NuSphere Corporation for 
 * the nusoap lib. 
 * have fun  
 */

/**
* Uses the NuSOAP - Web Services Toolkit for PHP
* Copyright (c) 2002 NuSphere Corporation - GNU / GPL
* see nusoap.php file for deatails
*/

/**
* Terms and Conditions for Google Web API Service have to be accepted by ordering your 
* own and private License Key!! Its not the authors fault if you disagree to this 
* terms and conditions and use this script in a non leagal way...
* view http://www.google.com/apis/ for details and to order your license key (required 
* to run this extension)
*/


require_once(PATH_tslib."class.tslib_pibase.php");

class tx_googleapisearch_pi1 extends tslib_pibase {
	var $prefixId = "tx_googleapisearch_pi1";		// Same as class name
	var $scriptRelPath = "pi1/class.tx_googleapisearch_pi1.php";	// Path to this script relative to the extension dir.
	var $extKey = "google_api_search";	// The extension key.
	var $site;
    var $key;

	/**
	 * google up your site
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
	   // debug($conf);
		$content='
			<img src="http://www.google.de/images/google_sm.gif"><br/>
			<form action="'.$this->pi_getPageLink($GLOBALS["TSFE"]->id).'" method="POST">
				<input type="hidden" name="no_cache" value="1">
				<input type="hidden" name="more" value="0">
                <input type="text" name="query" value="'.$GLOBALS["query"].'">
				<input type="submit" name="searchGoogle" value="'.$this->conf["buttonText"].'">
			</form><br>
		';
		
		if(isset($this->conf['site'])&& $this->conf['site']!= ""){ //serch on this site only
       		  $q = $GLOBALS["query"]." site:".$this->conf['site'];
		   }else{
			  $q = $GLOBALS["query"];
		}

        if (isset($this->conf['site']) && $this->conf['site']!=""){    // serach on site only
	            $isSite = " on <b></i>". $this->conf['site']."</i></b>";
			}else{
				$isSite = "";
		} 
        // parameters used by the google api
		$parameters = array(
			'key'=>$this->conf["key"],
			'q' => $q,
			'start' => ((int) $GLOBALS['more']*10),
			'maxResults' => '10',
			'filter' => $this->conf["filter"],
			'restrict' => $this->conf["restrict"],
			'safeSearch' => $this->conf["safeSearch"],
			'lr' => '',
			'ie' => 'latin',
			'oe' => 'latin'
		); // was utf8
 
		if (isset($GLOBALS["query"]) &&  $GLOBALS["query"] != ""){  // do search
			# new SOAPclient using NuSOAP - Web Services Toolkit for PHP
			# Copyright (c) 2002 NuSphere Corporation under GNU/GPL 
			$soapclient = new soapclient('http://api.google.com/GoogleSearch.wsdl', 'wsdl');
       		$results = $soapclient->call('doGoogleSearch',$parameters);
           // debug($results);
			# Results?
       		if ( is_array($results['resultElements']) ) {
				$content .= "Your Google query for <i><b>" . $GLOBALS["query"]."</b></i> ".$isSite. " matched "
 				.$results['estimatedTotalResultsCount'] . " results. Show ".$results['startIndex']." to ".$results['endIndex'];
			 	foreach ( $results['resultElements'] as $result ) {
					$content .= "<p><a href='" . $result['URL'] . "'>" .
								( $result['title'] ? convertUtf8($conf,$result['title']) : 'no title' ) .
								"</a><br />" .
								( $result['snippet'] ? convertUtf8($conf,$result['snippet']) : 'no snippet' ) .
								"<br/><i>".$result['URL']." - size: ".$result['cachedSize']."</i>
								</p>";
				}
				 // more/less results
				if($GLOBALS['more']>=1){ // back results
					$content.= "<a href='index.php?id=".$GLOBALS["TSFE"]->id."&more=".((int)$GLOBALS['more']-1)."&site=".$value."&query=".urlencode($GLOBALS["query"])."&no_cache=1'>prev</a>&nbsp;&nbsp;&nbsp;";
				}
		       	if($results['estimateIsExact']=="false"){ // next results
					$content.= "<a href='index.php?id=".$GLOBALS["TSFE"]->id."&more=".((int)$GLOBALS['more']+1)."&site=".$value."&query=".urlencode($GLOBALS["query"])."&no_cache=1'>next</a>";
					$content.= "<br/>";
				}
			}else{ // no results
				$content.= "<h4>Your query '" . $results["searchQuery"] ."'' returned no results</h4>";
			}
		}
        
        // show help
        if (!$conf["key"] || $conf["key"]==""){
		   $content .= help();
		}
		return $content;
	}
}

/****
* converts the utf-8 results from google to your prefered encoding
****/
function convertUtf8($conf,$text){
    if ($conf["iconv"]!=""){
		$text = iconv("UTF-8",$conf["iconv"],$text);
		return $text;
	}else{ 
		return $text;//$text;
	}
}


function help(){

$help ='

<h1>Install Instructions</h1>
<p>1. Get a licence key from <a href="http://www.google.com/apis/">http://www.google.com/apis/</a> 
  - this is a must! Otherwise you would not get any results.</p>
<p>2. Copy the setup typoscript code from this extension to your template setup and 
  set the &quot;key&quot; var to your new license key from google.<br>e.g.<br><br>
  
  plugin.tx_googleapisearch_pi1.key = YOUR_PERSONALKEY  
  <br><br>
  
  to define a site to search use for example:<br><br>
  plugin.tx_googleapisearch_pi1.site = typo3.org
  
  <br>
  
  </p>
<p>3. It\'s necessary to have &quot;iconv&quot; - loaded and running (google results 
  are utf-8 encoded ) in your php installation. Check <a href="http://de3.php.net/manual/en/ref.iconv.php">http://de3.php.net/manual/en/ref.iconv.php</a> 
  for details.<br>
</p>
<p>4. Insert to your page as &quot;plugin&quot;</p>
<p>Set key= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to see the help again ;-)</p>
<p>This is just an experimantal version extension - go to php source to change layouts 
  and language or wait untill i found the time to built the formating / language 
  settings.<br>
  Script uses the the NuSOAP - Web Services Toolkit for PHP Copyright (c) 
  2002 NuSphere Corporation and  <a href="http://dietrich.ganx4.com/nusoap/">http://dietrich.ganx4.com/nusoap/</a> - GNU / GPL - distributed as NF_nusoap extension<br>
  </p>
<p><b>Keep in mind - Googles Api programm is a free beta service provided by 
  google, and can possibly be stoped, extended or made commercial tomorrow.</b>
  </p>
<p><b>Feel free to report your bugs and comments to <a href="mailto:x27@e27.com">x27@e27.com</a></b></p>
<p>Tim Kleigrewe</p>


';
return $help;

}


if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/google_api_search/pi1/class.tx_googleapisearch_pi1.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/google_api_search/pi1/class.tx_googleapisearch_pi1.php"]);
}

?>