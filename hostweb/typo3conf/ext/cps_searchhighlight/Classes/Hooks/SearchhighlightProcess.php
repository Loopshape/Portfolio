<?php

namespace CPSIT\CpsSearchhighlight\Hooks;

	/***************************************************************
	*  Copyright notice
	*
	*  (c) 2014 Roman Ott (ott@cps-it.de)
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
	* Post-processing hook for tslib/class.tslib_fe.php
	*
	* Highlight every search word that is submitted with the rerferer
	* from a search engine or within typo3 from indexed search.
	*
	* $Id$
	*
	* @author Roman Ott <ott@cps-it.de>
	*/

	class SearchHighlightProcess {
	
		var $conf;
		var $pObj;
	
		/**
		* This method is called by the hook at tslib/class.tslib_fe.php
		*/
		function main(&$content,$pObj) {
			//Get conf
			$this->conf = $pObj->tmpl->setup['plugin.']['tx_cpssearchhighlight.'];
			$this->pObj = $pObj;

			//get swords as an array
			$swords[] = array();
			$swords = $this->getSwords();

			//highlight, if any swords were found
			if(sizeof($swords) > 0) {
				//search and replace only in html body
				$position_head_body = strpos($content['pObj']->content,'<body');
				$length_of_body_tag = strpos(substr($content['pObj']->content,$position_head_body),'>') + 1;
				$html_head = substr($content['pObj']->content,0,$position_head_body+$length_of_body_tag);
				$html_body = substr($content['pObj']->content,strlen($html_head));
				
				//hightlight
				$html_body = $this->replace($swords,$html_body);

				$content['pObj']->content = $html_head . $html_body;
			}
		}

		/**
		* Wraps <span>|</span> around a found search word.
		*/
		function replace($keywords_array,$page_body) {
			//Runs from 1 to numberofcolors
			$sword_number = 1;
		
			foreach($keywords_array as $keyword) {
				//take care of charset
				$keyword = $this->utf8_to_currentCharset($keyword);
				
				//wrap keyword with span-element
				$replace_regex = '#(\>(((?>([^><]+|(?R)))*)\<))#se';
				
				if($this->conf['differentcolors']) {
					$replace_replace = "preg_replace('#\b(" . $keyword . ")\b#i', '<span class=\"tx-cpssearchhighlight-sword-".$sword_number."\">\\\\1</span>', '\\0')";
				} else {
					$replace_replace = "preg_replace('#\b(" . $keyword . ")\b#i', '<span class=\"tx-cpssearchhighlight-sword-1\">\\\\1</span>', '\\0')";
				}
				
				$replace_subject = '>' . $page_body . '<';
				$substr = preg_replace($replace_regex, $replace_replace,$replace_subject);
				$subject = substr($substr,1,-1);
				$page_body = str_replace('\"', '"',$subject);
				
				$sword_number++;
				if($sword_number > $this->conf['numberofcolors']) $sword_number = 1;
			}
			
			return $page_body;
			
		}
		
		
		/**
		* Filters an array for htmlspecialchars, all html tags, single and double quotes.
		*/
		function filterArray(&$item1, $key) {
			$item1 = htmlspecialchars(strip_tags(str_replace('\'', '', $item1)));
		}
			
		/**
		* Retrieves the search words
		* (a) from indexed search
		* (b) from search engine referer
		*/
		function getSwords() {
					
			//after retrieving the keywords from the http request and referrer, this will contain all the keywords
			$keyword_array = array();
						
			//(a1) sWords by indexed search links
			$request_keyword_array = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('sword_list') ? \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('sword_list') : array();

			//(a2) sWords from other extensions
			if($this->conf['sword_array']) {
				$tmpSwordString = $this->pObj->cObj->cObjGetSingle($this->conf['sword_array'],$this->conf['sword_array.']);
				$swordArray = explode(',', $tmpSwordString);
				$request_keyword_array = array_merge($request_keyword_array,$swordArray);
			}

			//Filter input
			$callback = array();
			$callback[] = &$this;
			$callback[] = filterArray;
			array_walk($request_keyword_array, $callback);
			
			//(b) by HTTP_REFERER (http://www.ilovejackdaniels.com/php/google-style-keyword-highlighting/)
			$referer_keyword_array = array();
			
			//Filter input
			array_walk($referer_keyword_array, $callback);

			if(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_REFERER') != '') {

				$referer_keywords = "";
				$referer_url = urldecode(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_REFERER'));
				// Google
				if(preg_match("/www\.google/i",$referer_url)) {
					preg_match("'(\?|&)q=(.*?)(&|$)'si", " $referer_url ", $referer_keywords);
				}
				// AllTheWeb
				if(preg_match("/www\.alltheweb/i",$referer_url)) {
					preg_match("'(\?|&)q=(.*?)(&|$)'si", " $referer_url ", $referer_keywords);
				}
				// MSN
				if(preg_match("/search\.msn/i",$referer_url)) {
					preg_match("'(\?|&)q=(.*?)(&|$)'si", " $referer_url ", $referer_keywords);
				}
				// Yahoo
				if((preg_match("/yahoo\.com/i",$referer_url)) or (preg_match("/search\.yahoo/i",$referer_url))) {
					preg_match("'(\?|&)p=(.*?)(&|$)'si", " $referer_url ", $referer_keywords);
				}
				// Looksmart
				if(preg_match("/looksmart\.com/i",$referer_url)) {
					preg_match("'(\?|&)qt=(.*?)(&|$)'si", " $referer_url ", $referer_keywords);
				}

				if(($referer_keywords[2] != '') && ($referer_keywords[2] != ' ')) {
					$referer_keywords = preg_replace('/"|\'/', '', $referer_keywords[2]); // remove quotes
					$referer_keyword_array = preg_split("/[\s,\+\.]+/",$referer_keywords); // create keyword array
				}
			
			}
			
			//put keywords from http request and referrer together
			$temp_array = array_merge($referer_keyword_array,$request_keyword_array);
			
			//test keyword array for min keyword length
			if(count($temp_array) > 0) {
				
				//check every keyword for a minimum length
				foreach($temp_array as $keyword) {
					if(strlen($keyword) >= $this->conf['minkeywordlength']) array_push($keyword_array,$keyword);
				}
				
				return $keyword_array;
				
			} else {
				//there were no keywords
				return null;
			}
			
		}

		/**
		 * Converts the input string from utf-8 to the backend charset.
		 * (taken from EXT:indexed_search/pi/class.tx_indexedsearch.php)
		 * @param	string		String to convert (utf-8)
		 * @return	string		Converted string (backend charset if different from utf-8)
		 */
		function utf8_to_currentCharset($str)	{
			return $GLOBALS['TSFE']->csConv($str,'utf-8');
		}
	
		
	}
?>