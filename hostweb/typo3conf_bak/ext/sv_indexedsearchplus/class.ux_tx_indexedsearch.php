<?php
    class ux_tx_indexedsearch extends tx_indexedsearch {
	/**
	 * Make final query:
	 * Changes: getTreeList is called with fourth parameter = 1
	 * so that results from protected areas are also shown
	 */
	function makeFinalQuery($list)	{
		$page_join="";
		$page_where="";
		if ($this->join_pages)	{
			$page_join = ",
				pages";
			$page_where = "pages.uid = ISEC.page_id
				".$this->cObj->enableFields("pages")."
				AND pages.no_search=0
				AND pages.doktype<200
			";
		} elseif ($this->wholeSiteIdList>=0) {
			$siteIdNumbers = t3lib_div::intExplode(",",$this->wholeSiteIdList);
			$id_list=array();
			while(list(,$rootId)=each($siteIdNumbers))	{
				$id_list[]=$this->cObj->getTreeList($rootId,9999,0,1,"","").$rootId;
			}
			$page_where = "ISEC.page_id IN (".implode(",",$id_list).")";
		} else {
			$page_where = " 1=1 ";
		}

			// If any of the ranking sortings are selected, we must make a join with the word/rel-table again, because we need to calculate ranking based on all search-words found.
		if (substr($this->piVars["order"],0,5)=="rank_")	{

			switch($this->piVars["order"])	{
				case "rank_flag":	// This gives priority to word-position (max-value) so that words in title, keywords, description counts more than in content.
									// The ordering is refined with the frequency sum as well.
					$grsel = "MAX(IR.flags) AS order_val1, SUM(IR.freq) AS order_val2";
					$orderBy = "ORDER BY order_val1".$this->isDescending().",order_val2".$this->isDescending();
				break;
				case "rank_first":	// Results in average position of search words on page. Must be inversely sorted (low numbers are closer to top)
					$grsel = "AVG(IR.first) AS order_val";
					$orderBy = "ORDER BY order_val".$this->isDescending(1);
				break;
				case "rank_count":	// Number of words found
					$grsel = "SUM(IR.count) AS order_val";
					$orderBy = "ORDER BY order_val".$this->isDescending();
				break;
				default:	// Frequency sum. I'm not sure if this is the best way to do it (make a sum...). Or should it be the average?
					$grsel = "SUM(IR.freq) AS order_val";
					$orderBy = "ORDER BY order_val".$this->isDescending();
				break;
			}

				// So, words are imploded into an OR statement (no "sentence search" should be done here - may deselect results)
			$wordSel="(".implode(" OR ",$this->wSelClauses).") AND ";
			$query = "SELECT STRAIGHT_JOIN ISEC.*, IP.*, ".$grsel." FROM
				index_words AS IW,
				index_rel AS IR,
				index_section AS ISEC,
				index_phash AS IP".$page_join."
				WHERE
				".$wordSel."
				IP.phash IN (".$list.") ".$this->mediaTypeWhere()." ".$this->languageWhere()." AND
				IW.wid=IR.wid AND
				ISEC.phash = IR.phash AND
				IP.phash = IR.phash AND
				".$page_where."
				GROUP BY IP.phash
				".$orderBy;
		} else {	// Otherwise, if sorting are done with the pages table or other fields, there is no need for joining with the rel/word tables:
			$query = "SELECT ISEC.*, IP.* FROM
				index_phash AS IP,
				index_section AS ISEC".$page_join."
				WHERE
				IP.phash IN (".$list.") ".$this->mediaTypeWhere()." ".$this->languageWhere()." AND
				IP.phash = ISEC.phash AND
				".$page_where."
				GROUP BY IP.phash
				";

			switch((string)$this->piVars["order"])	{
				case "rating":
					debug("rating: NOT ACTIVE YET");
				break;
				case "hits":
					debug("rating: NOT ACTIVE YET");
				break;
				case "title":
					$query.=" ORDER BY IP.item_title".$this->isDescending();
				break;
				case "crdate":
					$query.=" ORDER BY IP.item_crdate".$this->isDescending();
				break;
				case "mtime":
					$query.=" ORDER BY IP.item_mtime".$this->isDescending();
				break;
			}
		}

		return $query;
	}



	/**
	 * This prints a single result row, including a recursive call for subrows.
	 * Changes: If link points to result in protected area, user will be redirected
	 * to login page and the page ID of the protected page will be passed to the
	 * login-box as redirect_url parameter
	 */
	function printResultRow($row,$headerOnly=0)	{
		$specRowConf = $this->getSpecialConfigForRow($row);
		$CSSsuffix = $specRowConf["CSSsuffix"]?"-".$specRowConf["CSSsuffix"]:"";

			// If external media, link to the media-file instead.
		if ($row["item_type"])	{
			if ($row["show_resume"])	{	// Can link directly.
				$title = '<a href="'.$row["data_filename"].'">'.$row["result_number"].": ".$this->makeTitle($row).'</a>';
			} else {	// Suspicious, so linking to page instead...
				$copy_row=$row;
				unset($copy_row["cHashParams"]);
				$title = $this->linkPage($row["page_id"],$row["result_number"].": ".$this->makeTitle($row),$copy_row);
			}
		} else {	// Else the page:
			$title = "".$this->linkPage($row["data_page_id"],$row["result_number"].": ".$this->makeTitle($row),$row);
		}

			// Make the header row with title, icon and rating bar.:
		if ($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_indexedsearch.']['loginPID'])	{
			$loginpid = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_indexedsearch.']['loginPID'];
	 		$out.='<tr '.$this->pi_classParam("title".$CSSsuffix).'>
	 			<td width="16">'.$this->makeItemTypeIcon($row["item_type"],"",$specRowConf).'</td>
	 			<td width="95%" nowrap><p><a href="/index.php?id='.$loginpid.'&redirect_url=index.php?id=' . $row["page_id"] . '">'.$title.'</a></p></td>
	 			<td nowrap><p'.$this->pi_classParam("percent".$CSSsuffix).'>'.$this->makeRating($row).'</p></td>
			</tr>';
		}
		else
		{
	 		$out.='<tr '.$this->pi_classParam("title".$CSSsuffix).'>
	 			<td width="16">'.$this->makeItemTypeIcon($row["item_type"],"",$specRowConf).'</td>
	 			<td width="95%" nowrap><p>'.$title.'</p></td>
	 			<td nowrap><p'.$this->pi_classParam("percent".$CSSsuffix).'>'.$this->makeRating($row).'</p></td>
			</tr>';
		}

			// Print the resume-section. If headerOnly is 1, then  only the short resume is printed
		if (!$headerOnly)	{
			$out.='<tr>
				<td></td>
				<td colspan=2'.$this->pi_classParam("descr".$CSSsuffix).'><p>'.$this->makeDescription($row,$this->piVars["extResume"]?0:1).'</p></td>
			</tr>';
			$out.='<tr>
				<td></td>
				<td '.$this->pi_classParam("info".$CSSsuffix).' nowrap><p>'.$this->makeInfo($row).'</p></td>
				<td '.$this->pi_classParam("info".$CSSsuffix).' align="right"><p>'.$this->makeAccessIndication($row["page_id"]).''.$this->makeLanguageIndication($row).'</p></td>
			</tr>';
		} elseif ($headerOnly==1) {
			$out.='<tr>
				<td></td>
				<td colspan=2'.$this->pi_classParam("descr".$CSSsuffix).'><p>'.$this->makeDescription($row,1,180).'</p></td>
			</tr>';
		} elseif ($headerOnly==2) {
			// nothing.
		}

			// If there are subrows (eg. subpages in a PDF-file or if a duplicate page is selected due to user-login (phash_grouping))
		if (is_array($row["_sub"]))	{
			if ($row["item_type"]==2)	{
				$out.='<tr>
					<td></td>
					<td colspan=2><p><BR>'.$this->pi_getLL("res_otherMatching").'<BR><BR></p></td>
				</tr>';

				reset($row["_sub"]);
				while(list(,$subRow)=each($row["_sub"]))	{
					$out.='<tr>
						<td></td>
						<td colspan=2><p>'.$this->printResultRow($subRow,1).'</p></td>
					</tr>';
				}
			} else {
				$out.='<tr>
					<td></td>
					<td colspan=2><p>'.$this->pi_getLL("res_otherPageAsWell").'</p></td>
				</tr>';
			}
		}

		return '<table '.$this->conf["tableParams."]["searchRes"].'>'.$out.'</table><BR>';
	}

}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/sv_indexedsearchplus/class.ux_tx_indexedsearch.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/sv_indexedsearchplus/class.ux_tx_indexedsearch.php"]);
}
?>