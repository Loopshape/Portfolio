<?php
/***************************************************************
*  Copyright notice
*  
*  (c) 2002 [^BgTA^] (bgta@bgta.net)
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
 * Plugin 'Source Code Publisher' for the 'source_publisher' extension.
 *
 * @author	[^BgTA^] <bgta@bgta.net>
 */


require_once(PATH_tslib."class.tslib_pibase.php");

class tx_sourcepublisher_pi1 extends tslib_pibase {
	var $prefixId = "tx_sourcepublisher_pi1";		// Same as class name
	var $scriptRelPath = "pi1/class.tx_sourcepublisher_pi1.php";	// Path to this script relative to the extension dir.
	var $extKey = "source_publisher";	// The extension key.
	
	/**
	 * [Put your description here]
	 */
	function main($content,$conf)	{
		$content = "<PRE class=\"pub_source\">\n";
		$file = $this->cObj->data['tx_sourcepublisher_pub_file'];
		$path = 'uploads/tx_sourcepublisher/';

		$content .="<b>Filename:</b> ".$file."\n";
		$content .="<b>Filesize:</b> ".filesize($path.$file)." bytes\n";

		if($code = $this->highlight_php($path.$file)) {
			$content .="<hr>\n<div class=\"code\">";
	
			/*$replaces = array();
			if(preg_match_all("/>([^<]*)</i",chop($code),$reg)) {
				foreach($reg[1] as $match) {
					if(function_exists($match) && !in_array($match,$replaces)) {
					//$content.=$match;
					$replaces[] = $match;

					}
				}
				foreach($replaces as $match) {
					$function = ereg_replace("[_]+","-",$match);
					$code = preg_replace("/>$match</i","><a href=\"http://www.php.net/manual/en/function.$function.php\" target=\"_blank\">$match</a><",$code);
				}
			} */
			
			$code = split("<br />",$code);
			
$pos = 0;
			$result="";
			foreach($code as $line) {
				$result.="<b>$pos:</b>\t| ".chop($line)."\n";
				$pos++;
			}
				
			$content .=$result."\n</div><HR>\n";
		} else {
			$contents .="<FONT color=\"RED\">Can't open file!</FONT>";
		}
		ob_end_clean();
		$content .="</PRE>";
		return($content);
	}
	
	function highlight_php($file){ 
		ob_start();  
		@highlight_file($file);  
		$code = ob_get_contents();  
		ob_end_clean(); 
		$keycol=ini_get("highlight.keyword");  
		$manual="http://www.php.net/manual-lookup.php?lang=es&pattern=";  
		$code=preg_replace('{([\w_]+)(\s*</font>)'.'(\s*<font\s+color="'.$keycol.'">\s*\()}m','<a class="codelink" title="Ver p\xe1gina del manual para $1" href="'.$manual.'$1">$1</a>$2$3', $code);
		return $code;  
	} 

}



if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/source_publisher/pi1/class.tx_sourcepublisher_pi1.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/source_publisher/pi1/class.tx_sourcepublisher_pi1.php"]);
}

?>
