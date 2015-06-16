<?php

namespace CPSIT\CpsSearchhighlight\Solr\ResultsModifier;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Roman Ott <ott@cps-it.de>
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
 * Provides highlighting of the search words on the document's actual page by
 * adding swords in $resultDocument array.
 *
 *
 * @author	Roman Ott <ott@cps-it.de>
 * @package	TYPO3
 * @subpackage	cps_searchhighlight
 */
class SearchWords implements \Tx_Solr_ResultDocumentModifier {

	/**
	 * Modifies the given result document's array by appending sword parameters as new field
	 * which will result in having the current search terms highlighted on the
	 * target page.
	 *
	 * @param	Tx_Solr_PiResults_ResultsCommand	The search result command
	 * @param	array	$resultDocument The result document's fields as an array
	 * @return	array	The document with fields as array
	 */
	public function modifyResultDocument($resultCommand, array $resultDocument) {
		$searchWords = $resultCommand->getParentPlugin()->getSearch()->getQuery()->getKeywords();
		$searchWords = trim($searchWords);
		$searchWords = \TYPO3\CMS\Core\Utility\GeneralUtility::removeXSS($searchWords);

		if(!empty($searchWords)) {
			// remove quotes from phrase searches - they've been escaped by getCleanUserQuery()
			$searchWords = str_replace('&quot;', '', $searchWords);
			$searchWords = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(' ', $searchWords, TRUE);

			$i = 0;
			$appendix = '&sword_list['.$i.']=' . array_shift($searchWords);

			foreach($searchWords as $word) {
				$i++;
				$appendix .= '&sword_list['.$i.']=' . $word;
			}

			$GLOBALS['TSFE']->register['SWORD_PARAMS'] = $appendix;

			// eventually, replace the document's URL with the one that enables highlighting
			$resultDocument['sword'] = rawurlencode($appendix);

		}

		return $resultDocument;
	}

}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/cps_searchhighlight/Classes/Solr/ResultsModifier/SearchWords.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/cps_searchhighlight/Classes/Solr/ResultsModifier/SearchWords.php']);
}

?>