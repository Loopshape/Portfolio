<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2001-2005 Kasper Skaarhoj (kasperYYYY@typo3.com)
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
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/



require_once(PATH_tslib.'class.tslib_pibase.php');
require_once(PATH_tslib.'class.tslib_search.php');
require_once(t3lib_extMgm::extPath('indexed_search').'class.indexer.php');


class ux_tx_indexedsearch extends tx_indexedsearch {

	/***********************************
	 *
	 *	Searching functions (SQL)
	 *
	 ***********************************/

	/**
	 * Returns a COMPLETE list of phash-integers matching the search-result composed of the search-words in the sWArr array.
	 * The list of phash integers are unsorted and should be used for subsequent selection of index_phash records for display of the result.
	 *
	 * @param	array		Search word array
	 * @return	string		List of integers
	 */
	function getPhashList($sWArr)	{
			// Initialize variables:
		$c=0;
		$totalHashList = array();	// This array accumulates the phash-values
		$this->wSelClauses = array();

			// Traverse searchwords; for each, select all phash integers and merge/diff/intersect them with previous word (based on operator)
		foreach($sWArr as $k => $v)	{
			$GLOBALS['TT']->push('SearchWord '.$sWord);

				// Making the query for a single search word based on the search-type
			$sWord = $v['sword'];	// $GLOBALS['TSFE']->csConvObj->conv_case('utf-8',$v['sword'],'toLower');	// lower-case all of them...

			$theType = (string)$this->piVars['type'];
			if (strstr($sWord,' '))	$theType = 20;	// If there are spaces in the search-word, make a full text search instead.
			$res = '';
			$wSel='';

				// Perform search for word:
			switch($theType)	{
				case '1':
					$wSel = "MATCH(IW.baseword) AGAINST('".$GLOBALS['TYPO3_DB']->quoteStr($sWord, 'index_words')."')";
					$res = $this->execPHashListQuery($wSel,' AND is_stopword=0');
				break;
				case '2':
					$wSel = "MATCH(IW.baseword) AGAINST('".$GLOBALS['TYPO3_DB']->quoteStr($sWord, 'index_words')."')";
					$res = $this->execPHashListQuery($wSel,' AND is_stopword=0');
				break;
				case '3':
					$wSel = "MATCH(IW.baseword) AGAINST('".$GLOBALS['TYPO3_DB']->quoteStr($sWord, 'index_words')."')";
					$res = $this->execPHashListQuery($wSel,' AND is_stopword=0');
				break;
				case '10':
					$wSel = 'IW.metaphone = '.$this->indexerObj->metaphone($sWord);
					$res = $this->execPHashListQuery($wSel,' AND is_stopword=0');
				break;
				case '20':
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
								'ISEC.phash',
								'index_section ISEC, index_fulltext IFT',
								'MATCH(IFT.fulltextdata) AGAINST(\'%'.$GLOBALS['TYPO3_DB']->quoteStr($sWord, 'index_fulltext').'%\') AND
									ISEC.phash = IFT.phash
									'.$this->sectionTableWhere(),
								'ISEC.phash'
							);
					$wSel = '1=1';

					if ($this->piVars['type']==20)	$this->piVars['order'] = 'mtime';		// If there is a fulltext search for a sentence there is a likeliness that sorting cannot be done by the rankings from the rel-table (because no relations will exist for the sentence in the word-table). So therefore mtime is used instaed. It is not required, but otherwise some hits may be left out.
				break;
				default:
					$wSel = 'IW.wid = '.$hash = $this->indexerObj->md5inthash($sWord);
					$res = $this->execPHashListQuery($wSel,' AND is_stopword=0');
				break;
			}

				// Accumulate the word-select clauses
			$this->wSelClauses[] = $wSel;

				// If there was a query to do, then select all phash-integers which resulted from this.
			if ($res)	{

					// Get phash list by searching for it:
				$phashList = array();
				while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{
					$phashList[] = $row['phash'];
				}
				$GLOBALS['TYPO3_DB']->sql_free_result($res);

					// Here the phash list are merged with the existing result based on whether we are dealing with OR, NOT or AND operations.
				if ($c) {
					switch($v['oper'])	{
						case 'OR':
							$totalHashList = array_unique(array_merge($phashList,$totalHashList));
						break;
						case 'AND NOT':
							$totalHashList = array_diff($totalHashList,$phashList);
						break;
						default:	// AND...
							$totalHashList = array_intersect($totalHashList,$phashList);
						break;
					}
				} else {
					$totalHashList = $phashList;	// First search
				}
			}

			$GLOBALS['TT']->pull();
			$c++;
		}

		return implode(',',$totalHashList);
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/indexed_search_mysql/class.ux_tx_indexedsearch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/indexed_search_mysql/class.ux_tx_indexedsearch.php']);
}
?>
