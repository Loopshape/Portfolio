<?php
/***************************************************************
*  Copyright notice
*
*  (c) yyyy Autor (author@mail.com)
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
 * tx_pphighlight class
 *
 * @author	
 */


require_once(t3lib_extMgm::extPath('pp_searchengine').'pi1/class.tx_ppsearchengine_pi1.php');

class tx_pphighlight {

	/**
	 * TCE hook : wrapping search words in the page body into span tags
	 *
	 * @param array $params @see tslib_tce
	 * @param object $ref @see tslib_tce
	 * @access public
	 * @return void 
	 */
	function highlight(&$params,$ref) {
		/* Déclarations */
		global $TYPO3_CONF_VARS;
		$swords=$this->getSwords();
		$bodyStarts=strpos($ref->content, '<body');
		$number=0;
		$extConf=unserialize($TYPO3_CONF_VARS['EXT']['extConf']['pp_searchengine']);
	
		/* Début */
		if ($extConf['enableHighlight'] && count($swords)) {
			$body=substr($params['pObj']->content,$bodyStarts);

			//*** Builds pattern array
			$patterns=array();
			$number=0;
			foreach ($swords as $sword) {
				$classN='search-word'.(($number && $extConf['multipleColors'])?' search-word-'.$number:'');
				//** Pattern => replace
				$patterns[$this->getSWordPattern($sword)]='<span class="'.$classN.'">\\1</span>';
				$number++;
			}

			$open=false; //True when $i is in a tag
			$lastPos=0; //Position of the last '>' (so beginning of the current content-string)
			for ($i=0;$i<strlen($body);$i++) {
				//** Starting tag found, so highlighting in current string
				if (!$open && ($body[$i]=='<')) {
					$open=true;

					//* get the part
					$thePart=substr($body, $lastPos, $i-$lastPos);
					//* Useless to continue if its a blank string
					if (trim($thePart)) {
						$theNewPart=$thePart;

						foreach ($patterns as $pattern=>$replace) {
							$theNewPart=eregi_replace($pattern,$replace,$theNewPart);
						}
						
						//* replaces in body
						$body=substr_replace($body,$theNewPart,$lastPos,strlen($thePart));

						//* the new string may be bigguer/smaler, so we need to displace $i :)
						$i+=strlen($theNewPart)-strlen($thePart);
					}

					
				} elseif ($open && ($body[$i]=='>')) {
					$open=false;
					$lastPos=$i+1;
				}
			}

			$params['pObj']->content=substr($params['pObj']->content, 0,$bodyStarts).$body;
		}
	}

	/**
	 * Build the search pattern for a sword in order to the words with accentued characters be found
	 *
	 * @param string $sword = search word
	 * @access public
	 * @return string 
	 */
	function getSWordPattern($sword) {
		/* Déclarations */
		$trans=tx_ppsearchengine_pi1::getTransArray();
		$chars='';
		$str='';
		$pattern='(';
	
		/* Début */
		for ($i=0;$i<strlen($sword);$i++) {
			$chars='';
			$str='';
			$chars.=$sword[$i];
			if (htmlspecialchars($sword[$i])!=$sword[$i]) {
				$str.='|'.htmlspecialchars($sword[$i]);
			}
			foreach ($trans as $matches=>$cleaned) {

				if (strlen($cleaned)==1) {
					if ($cleaned==$sword[$i]) {
						$chars.=$matches;
					}
					if (htmlspecialchars($matches)!=$matches) {
						$str.='|'.htmlspecialchars($matches);
					}
					if ($sword[$i]==' ') {
						$str.='|&nbsp;';
					}
				} else {
					//*** If a ™ has been found it has be transleted to 'TM', so this is very complex to build a pattern
					//    Maybe it will works with a recursive function to build all patterns ? Good luck :)
				}

			}

			if (trim($str)) {
				$pattern.='(['.$chars.']'.$str.')';
			} else {
				$pattern.='['.$chars.']';
			}
		}

		return $pattern.')';
	}

	/**
	 * Return search words
	 *
	 * @access public
	 * @return array 
	 */
	function getSwords() {
		/* Déclarations */
		$res=t3lib_div::_GP('sword_list');
	
		/* Début */
		if (!is_array($res)) {
			$res=array();
		}

		return $res;
	}
}


global $TYPO3_CONF_VARS;
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pp_searchengine/highlight/class.tx_pphighlight.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pp_searchengine/highlight/class.tx_pphighlight.php']);
}

?>