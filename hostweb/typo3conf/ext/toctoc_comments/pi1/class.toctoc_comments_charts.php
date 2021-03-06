<?php
/***************************************************************
*  Copyright notice
*
* (c) 2012 - 2015 Gisele Wendl <gisele.wendl@toctoc.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
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
/**
 * class.toctoc_comments_charts.php
 *
 * AJAX Social Network Components
 *
 * @author Gisele Wendl <gisele.wendl@toctoc.ch>
 *
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   56: class toctoc_comments_charts extends toctoc_comment_lib
 *   65:     public function topratings ($conf, $pObj, $fromusercenterid = 0)
 *
 * TOTAL FUNCTIONS: 1
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */


/**
 * AJAX Social Network Components
 *
 * @author Gisele Wendl <gisele.wendl@toctoc.ch>
 * @package TYPO3
 * @subpackage toctoc_comments
 */
class toctoc_comments_charts extends toctoc_comment_lib {
	/**
 * generation of top ratings
 *
 * @param	[type]		$conf: ...
 * @param	[type]		$pObj: ...
 * @param	[type]		$fromusercenterid: ...
 * @return	string		...
 */
	public function topratings ($conf, $pObj, $fromusercenterid = 0) {
		$this->cObj = t3lib_div::makeInstance('tslib_cObj');
		$this->cObj->start('', '');
		$siteRelPath = $this->locationHeaderUrlsubDir() . t3lib_extMgm::siteRelPath('toctoc_comments');
		if (version_compare(TYPO3_version, '4.6', '<')) {
			$tmpint = t3lib_div::testInt($conf['storagePid']);
		} else {
			$tmpint = t3lib_utility_Math::canBeInterpretedAsInteger($conf['storagePid']);
		}

		$pidcond='';
		if ($tmpint) {
			$conf['storagePid'] = intval($conf['storagePid']);
			$pidcond = 'deleted=0 AND pid='. $conf['storagePid'] . ' AND ';
		} else {
			$conf['storagePid'] = $GLOBALS['TYPO3_DB']->cleanIntList($conf['storagePid']);
			$pidcond = 'deleted=0 AND pid IN (' . $conf['storagePid'] . ') AND ';
		}

		$pidonlycond = ($tmpint ?
		'pid=' . $conf['storagePid'] : 'pid IN (' . $conf['storagePid'] . ')');
		$restrictor = $pidcond;
		$feusersql = '';
		$feusersort = '';
		$feusergroupby = '';
		$shownbritemsinusercenter=0;
		if ($fromusercenterid != 0) {
			$shownbritemsinusercenter = intval($conf['userCenter.']['commentsPerUCList']);
			$conf['topRatings.']['topRatingsMode']=$fromusercenterid-1;
			$conf['topRatings.']['RatingsDays']=$conf['userCenter.']['maxItemAgeUCList'];
			$conf['topRatings.']['RatedItemsListCount']=$conf['userCenter.']['maxItemsPerUCList'];
			$conf['topRatings.']['NumberOfVotesRequired']=0.5;
			$conf['topRatings.']['AlignResultsWithMaxVotesAndAvgVote'] = 0;
			$conf['topRatings.']['showMinimumVotesinTitle'] = 0;
			$conf['topRatings.']['showAlignCommentinTitle'] = 0;
			$conf['topRatings.']['showCountTopViewsLastView'] = 0;
			$pidonlycond = '';
			$restrictor = 'deleted=0 AND ';
			$restrictor .= 'toctoc_commentsfeuser_feuser=' . $GLOBALS['TSFE']->fe_user->user['uid'] . ' AND ';

			if ($fromusercenterid == 2) {
				$feusergroupby = ', isreview, (CASE WHEN tstampmyrating = 0 THEN tstamp ELSE tstampmyrating END), toctoc_commentsfeuser_feuser';

				$feusersort = '(CASE WHEN tstampmyrating = 0 THEN tstamp ELSE tstampmyrating END) DESC, ';
				$feusersql = ', isreview AS isreview, toctoc_commentsfeuser_feuser AS toctoc_commentsfeuser_feuser,
						(CASE WHEN tstampmyrating = 0 THEN tstamp ELSE tstampmyrating END) AS ratedate';
				$restrictor .= 'isreview<>1 AND ';
			} else {
				$feusergroupby = ', (CASE WHEN tstampidislike = 0 THEN CASE WHEN tstampilike = 0 THEN tstamp ELSE tstampilike END ELSE tstampidislike END), toctoc_commentsfeuser_feuser';

				$feusersort = '(CASE WHEN tstampidislike = 0 THEN CASE WHEN tstampilike = 0 THEN tstamp ELSE tstampilike END ELSE tstampidislike END) DESC, ';
				$feusersql = ', toctoc_commentsfeuser_feuser AS toctoc_commentsfeuser_feuser,
						(CASE WHEN tstampidislike = 0 THEN CASE WHEN tstampilike = 0 THEN tstamp ELSE tstampilike END ELSE tstampidislike END) AS ratedate';
			}

		}

		$daysago=$conf['topRatings.']['RatingsDays'];
		$limitrows=$conf['topRatings.']['RatedItemsListCount'];
		$displayfields='';
		//specs: $displayfields = 'titlepart1 titlepart2, longertext, linktoimage';
		$show_uid='showUid';
		$debug='';
		if ($conf['topRatings.']['topRatingsrestrictToExternalPrefix'] == 'custom') {
			if ($conf['topRatings.']['topRatingsExternalPrefix']!='') {
				//then we have mismach between $this->conf['externalPrefix'] and the record
				$where = 'uid=' . $conf['topRatings.']['topRatingsExternalPrefix'] .'';
				$rowsrf = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
						'tx_toctoc_comments_prefixtotable.pi1_key AS pi1_key, tx_toctoc_comments_prefixtotable.pi1_table AS pi1_table,
						show_uid as show_uid, displayfields As displayfields, topratingsdetailpage As topratingsdetailpage,
						topratingsimagesfolder AS topratingsimagesfolder',
						'tx_toctoc_comments_prefixtotable',
						$where,
						'',
						'',
						''
				);
				if (count($rowsrf)>0) {
					$externaltable=$rowsrf[0]['pi1_table'];
					$conf['topRatings.']['topRatingsExternalPrefix']=$rowsrf[0]['pi1_key'];

					$displayfields=$rowsrf[0]['displayfields'];
					if ($displayfields=='') {
						$displayfields='title - description';
					}

					if ($rowsrf[0]['show_uid']!='') {
						$show_uid=$rowsrf[0]['show_uid'];
					}

				}

				if ($externaltable=='pages') {
					$externaltable='tt_content';
				}

				$restrictor='reference LIKE "'.$externaltable.'%" AND ' .  $pidcond;
			}

		} elseif ($conf['topRatings.']['topRatingsrestrictToExternalPrefix'] == 'comments') {
			$restrictor='reference LIKE "tx_toctoc_comments_comments%" AND ' .  $pidcond;
			$mmtable='tx_toctoc_comments_comments';
			$externaltable=$mmtable;
			$conf['topRatings.']['topRatingsExternalPrefix']=$mmtable;

		} elseif ($conf['topRatings.']['topRatingsrestrictToExternalPrefix'] == 'content') {
			$restrictor='reference LIKE "tt_conten%" AND ' .  $pidcond;
			$mmtable='tt_content';
			$externaltable=$mmtable;
			$conf['topRatings.']['topRatingsExternalPrefix']=$mmtable;
		} else {
			$conf['topRatings.']['topRatingsExternalPrefix']='';
			$mmtabletoexternalprefix=TRUE;
		}

		if (intval($conf['topRatings.']['NumberOfVotesRequired'])>1) {
			$numberofvotesrequired=intval($conf['topRatings.']['NumberOfVotesRequired']);
		} else {
			$numberofvotesrequired=1;
		}

		$datesince=time()-(86400*$daysago);
		$addonsqlforoldratings = ' CASE WHEN tstampmyrating = 0 THEN CASE WHEN tstamp > '.$datesince.' THEN 1 ELSE 0 END ELSE 0 END ';
		$addonsqlforoldviews = ' CASE WHEN tstampseen = 0 THEN CASE WHEN tstamp > '.$datesince.' THEN 1 ELSE 0 END ELSE 0 END ';
		$addonsqlforoldactivities = '
				CASE WHEN tstampseen = 0 THEN
					CASE WHEN tstampmyrating > '.$datesince.' THEN
						1
					ELSE
						CASE WHEN tstampilike > '.$datesince.' THEN
							1
						ELSE
							CASE WHEN tstamp > '.$datesince.' THEN
								1
							ELSE
								0
							END
						END
					END
				ELSE
				 	0
				END';

		$okdatelikes='(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *
						(CASE WHEN ilike = 0 AND idislike=0 THEN 0 ELSE 1 END) *
						(CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
						(CASE WHEN tstampilike > '.$datesince.' THEN
							1
						ELSE
						      	CASE WHEN tstampilike = 0 THEN
						           	CASE WHEN tstampidislike > '.$datesince.'  THEN
						           		1
						           	ELSE
						                     CASE WHEN tstamp > '.$datesince.' THEN
						                     	1
						                     ELSE
						                     	0
						                     END
						             END
						      ELSE 0 END
						END)';

		$i=0;
		$rowsmerged=array();
		$maxvotesfound=0;
		$sumnbrvotesfound=0;
		$sumvotingfound=0;
		$sumlikecountfound=0;
		if ($conf['topRatings.']['topRatingsMode']==0){

			$querymerged='SELECT DISTINCT MAX(CASE WHEN pagetstampilike = 0 THEN pagetstampidislike ELSE pagetstampilike END) as pageid,
					reference As ref, ' .
					$okdatelikes . ' as okdate,
					sum(ilike)-sum(idislike) as sumilike,
					sum(ilike)+sum(idislike) as nbrvotes,
					'. $conf['ratings.']['maxValue'] . '*((sum(ilike)-sum(idislike))/(sum(ilike)+sum(idislike))) as sumilikedislikevote,
					min(pid) AS pid, min(deleted) AS deleted'. $feusersql . '
					FROM tx_toctoc_comments_feuser_mm
					GROUP BY reference, ' . $okdatelikes . $feusergroupby . ' HAVING ' . $restrictor . 'okdate>0  AND nbrvotes>= ' . $numberofvotesrequired
					. ' ORDER BY '.$feusersort.'okdate DESC, sumilike DESC, nbrvotes, ref';
			$resultmerged1= $GLOBALS['TYPO3_DB']->sql_query($querymerged);
			while ($rowsmerged1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1)) {
				// reorder fields

				$rowsmerged[$i]['likecount'] = round($rowsmerged1['sumilike'], 1);
				$rowsmerged[$i]['nbrvotes'] = $rowsmerged1['nbrvotes'];
				$rowsmerged[$i]['voting'] = round($rowsmerged1['sumilikedislikevote'], 1);
				$rowsmerged[$i]['ref'] = $rowsmerged1['ref'];
				$rowsmerged[$i]['pageid'] = $rowsmerged1['pageid'];
				$rowsmerged[$i]['sumilikedislike'] = $rowsmerged1['sumilike'];
				$rowsmerged[$i]['sumilikedislikevote'] = $rowsmerged1['sumilikedislikevote'];
				if ($fromusercenterid != 0) {
					$rowsmerged[$i]['ratedate'] = $rowsmerged1['ratedate'];
				}
				if ($rowsmerged[$i]['nbrvotes'] > $maxvotesfound) {
					$maxvotesfound=$rowsmerged[$i]['nbrvotes'];
				}

				$sumnbrvotesfound= $sumnbrvotesfound+$rowsmerged1['nbrvotes'];
				$sumlikecountfound = $sumlikecountfound+($rowsmerged1['sumilikedislikevote']);

				 $sumvotingfound= $sumvotingfound+($rowsmerged1['sumilikedislikevote']);
				$i++;
			}

		} elseif ($conf['topRatings.']['topRatingsMode']==1){
			$querymerged='SELECT DISTINCT MIN(pagetstampmyrating) as pageid,
					reference As ref,
					(CASE WHEN myrating = 0 THEN 0 ELSE 1 END) *(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *(CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN tstampmyrating > '.
					$datesince.' THEN 1 ELSE' . $addonsqlforoldratings .'END) as okdate,
					sum(myrating)/' . $conf['ratings.']['maxValue'] . ' as sumilikedislike,
					count(uid) as nbrvotes,
					avg(myrating) as sumilikedislikevote,
					min(pid) AS pid, min(deleted) AS deleted'. $feusersql . '
					FROM tx_toctoc_comments_feuser_mm
					GROUP BY reference,
					(CASE WHEN myrating = 0 THEN 0 ELSE 1 END) *(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) * (CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN tstampmyrating > '.
					$datesince.' THEN 1 ELSE' . $addonsqlforoldratings .'END)' . $feusergroupby . '
					HAVING ' . $restrictor . 'okdate>0  AND nbrvotes>= ' . $numberofvotesrequired
					. ' ORDER BY '.$feusersort.'okdate DESC, sumilikedislikevote DESC, nbrvotes DESC, ref';
			$resultmerged1= $GLOBALS['TYPO3_DB']->sql_query($querymerged);
			while ($rowsmerged1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1)) {
				// reorder fields
				$rowsmerged[$i]['voting'] = round($rowsmerged1['sumilikedislikevote'], 1);
				$rowsmerged[$i]['nbrvotes'] = $rowsmerged1['nbrvotes'];
				$rowsmerged[$i]['likecount'] = round($rowsmerged1['sumilikedislike'], 1);
				$rowsmerged[$i]['ref'] = $rowsmerged1['ref'];
				$rowsmerged[$i]['pageid'] = $rowsmerged1['pageid'];
				$rowsmerged[$i]['sumilikedislike'] = $rowsmerged1['sumilikedislike'];
				$rowsmerged[$i]['sumilikedislikevote'] = $rowsmerged1['sumilikedislikevote'];
				if ($fromusercenterid != 0) {
					$rowsmerged[$i]['ratedate'] = $rowsmerged1['ratedate'];
				}
				if ($rowsmerged[$i]['nbrvotes'] > $maxvotesfound) {
					$maxvotesfound=$rowsmerged[$i]['nbrvotes'];
				}

				$sumnbrvotesfound= $sumnbrvotesfound+$rowsmerged1['nbrvotes'];
				$sumvotingfound = $sumvotingfound+($rowsmerged1['sumilikedislikevote']);

				$sumlikecountfound = $sumlikecountfound+$rowsmerged1['sumilikedislike'];

				$i++;
			}

		} elseif (($conf['topRatings.']['topRatingsMode']==3) || ($conf['topRatings.']['topRatingsMode']==2)){

			$querymerged='(SELECT DISTINCT MIN(pagetstampmyrating) as pageid,
			reference As ref,
			(CASE WHEN myrating = 0 THEN 0 ELSE 1 END) *
			(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *
			(CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
			(CASE WHEN tstampmyrating > '.$datesince.' THEN
					1
					ELSE
			CASE WHEN tstampmyrating = 0 THEN
			CASE WHEN tstamp > '.$datesince.' THEN
					1
					ELSE
					0
					END
					ELSE
					0
					END
					END) as okdate,
					sum(myrating/' . $conf['ratings.']['maxValue'] . ') as sumilikedislike, count(uid) as nbrvotes, avg(myrating) as sumilikedislikevote,
					min(pid) AS pid, min(deleted) AS deleted'. $feusersql . '
					FROM tx_toctoc_comments_feuser_mm
					GROUP BY reference,
					(CASE WHEN myrating = 0 THEN 0 ELSE 1 END) *
					(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN tstampmyrating > '.$datesince.' THEN
							1
							ELSE
					CASE WHEN tstampmyrating = 0 THEN
					CASE WHEN tstamp > '.$datesince.' THEN
							1
							ELSE
							0
							END
							ELSE
							0
							END
							END)'. $feusergroupby . '
							HAVING ' . $restrictor . 'okdate>0
			) UNION (
					SELECT DISTINCT MAX(CASE WHEN pagetstampilike = 0 THEN pagetstampidislike ELSE pagetstampilike END) as pageid,
					reference As ref,
					(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN ilike = 0 AND idislike=0 THEN 0 ELSE 1 END) *
					(CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN tstampilike > '.$datesince.' THEN
							1
							ELSE
					CASE WHEN tstampilike = 0 THEN
					CASE WHEN tstampidislike > '.$datesince.'  THEN
							1
							ELSE
					CASE WHEN tstamp > '.$datesince.' THEN
							1
							ELSE
							0
							END
							END
							ELSE 0 END
							END) as okdate,
					sum(ilike-idislike) as sumilikedislike, count(uid) as nbrvotes, ' . intval($conf['ratings.']['maxValue']) .
					'*(sum(ilike-idislike)/count(uid))  as sumilikedislikevote,
					min(pid) AS pid, min(deleted) AS deleted'. $feusersql . '
					FROM tx_toctoc_comments_feuser_mm
					GROUP BY reference,
					(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN ilike = 0 AND idislike=0 THEN 0 ELSE 1 END) *
					(CASE WHEN reference_scope = 0 THEN 1 ELSE 0 END) *
					(CASE WHEN tstampilike > '.$datesince.' THEN
							1
							ELSE
					CASE WHEN tstampilike = 0 THEN
					CASE WHEN tstampidislike > '.$datesince.'  THEN
							1
							ELSE
					CASE WHEN tstamp > '.$datesince.' THEN
							1
							ELSE
							0
							END
							END
							ELSE 0 END
							END)'. $feusergroupby . '
					HAVING ' . $restrictor . 'okdate>0 )
					order BY '.$feusersort.'okdate DESC, ref, sumilikedislike DESC, nbrvotes, ref';
			$resultmerged= $GLOBALS['TYPO3_DB']->sql_query($querymerged);
			$currentref='';
			$rowsmergedout=array();

			while ($rowsmerged = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged)) {
				// cleanup UNION result, resort and limit to top x

				if ($currentref!=$rowsmerged['ref']) {
					$currentref=$rowsmerged['ref'];
					$rowsmergedout[$i]=$rowsmerged;
					$i++;
				} else {
					$rowsmergedout[$i-1]['sumilikedislikevote'] = ($rowsmergedout[$i-1]['sumilikedislikevote']*$rowsmergedout[$i-1]['nbrvotes']+
							$rowsmerged['sumilikedislikevote']*$rowsmerged['nbrvotes'])/($rowsmergedout[$i-1]['nbrvotes']+$rowsmerged['nbrvotes']);
					$rowsmergedout[$i-1]['nbrvotes'] = $rowsmergedout[$i-1]['nbrvotes']+$rowsmerged['nbrvotes'];
					$rowsmergedout[$i-1]['sumilikedislike'] = $rowsmergedout[$i-1]['sumilikedislike']+$rowsmerged['sumilikedislike'];
					if ($rowsmerged['pageid']>$rowsmergedout[$i-1]['pageid']) {
						$rowsmergedout[$i-1]['pageid']=$rowsmerged['pageid'];
					}

				}

			}

			$iout=0;
			$countrowsmergedout=count($rowsmergedout);
			for ($i=0; $i<$countrowsmergedout; $i++) {
				if ($rowsmergedout[$i]['nbrvotes'] >= $numberofvotesrequired) {
					if ($rowsmergedout[$i]['nbrvotes'] > $maxvotesfound) {
						$maxvotesfound=$rowsmergedout[$i]['nbrvotes'];
					}

					$sumnbrvotesfound= $sumnbrvotesfound+$rowsmergedout[$i]['nbrvotes'];
					$sumvotingfound = $sumvotingfound+($rowsmergedout[$i]['sumilikedislikevote']);

					$sumlikecountfound = $sumlikecountfound+$rowsmergedout[$i]['sumilikedislike'];
					if ($conf['topRatings.']['topRatingsMode']==2){
						$rowsmerged[$iout]['voting'] = round($rowsmergedout[$i]['sumilikedislikevote'], 1);
					} else {
						$rowsmerged[$iout]['likecount'] = round($rowsmergedout[$i]['sumilikedislike'], 1);
					}

					$rowsmerged[$iout]['nbrvotes'] = $rowsmergedout[$i]['nbrvotes'];

					if ($conf['topRatings.']['topRatingsMode']==3){
						$rowsmerged[$iout]['voting'] = round($rowsmergedout[$i]['sumilikedislikevote'], 1);

					} else {
						$rowsmerged[$iout]['likecount'] = round($rowsmergedout[$i]['sumilikedislike'], 1);
					}

					$rowsmerged[$iout]['ref'] = $rowsmergedout[$i]['ref'];
					$rowsmerged[$iout]['pageid'] = $rowsmergedout[$i]['pageid'];
					$rowsmerged[$iout]['sumilikedislike'] = $rowsmergedout[$i]['sumilikedislike'];
					$rowsmerged[$iout]['sumilikedislikevote'] = $rowsmergedout[$i]['sumilikedislikevote'];
					$iout++;
				}

			}

			rsort($rowsmerged);

		} elseif ($conf['topRatings.']['topRatingsMode']==4){
			$querymerged='SELECT DISTINCT MIN(pagetstampseen) as pageid,
					reference As ref,
					(CASE WHEN seen = 0 THEN 0 ELSE 1 END) *(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *(CASE WHEN reference_scope = 0 THEN 1 ELSE 1 END) *
					(CASE WHEN tstampseen > '.$datesince.' THEN 1 ELSE' . $addonsqlforoldviews .'END) as okdate,
					sum(seen) as sumilikedislike,
					count(uid) as nbrvotes,
					min(tstampseen) as firstview,
					max(tstampseen) as lastview,
					sum(seen) as sumilikedislikevote,
					min(pid) AS pid, min(deleted) AS deleted
					FROM tx_toctoc_comments_feuser_mm
					GROUP BY reference, (CASE WHEN seen = 0 THEN 0 ELSE 1 END) *(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *
							(CASE WHEN reference_scope = 0 THEN 1 ELSE 1 END) * (CASE WHEN tstampseen > '.$datesince.' THEN 1 ELSE' . $addonsqlforoldviews .'END)
					HAVING ' . $restrictor . 'okdate>0  AND nbrvotes>= ' . $numberofvotesrequired
					. ' ORDER BY okdate DESC, sumilikedislikevote DESC, nbrvotes DESC, ref';
			$resultmerged1= $GLOBALS['TYPO3_DB']->sql_query($querymerged);
			while ($rowsmerged1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1)) {
				if (substr($rowsmerged1['ref'], 0, 5)=='tt_co') {
						$whereplus=' AND (external_ref_uid="' . $rowsmerged1['ref'] .'")';

				} else {
					$whereplus=' AND (external_ref="' . $rowsmerged1['ref'] .'")';
				}

				$wherecommunity='';
				if (substr($rowsmerged1['ref'], 0, 5) == 'fe_us') {
					$wherecommunity =' AND parentuid=0';
				}

				$tmpwhere=' approved=1 AND ' . $pidonlycond .
						$this->enableFields('tx_toctoc_comments_comments', $pObj) . $whereplus . $wherecommunity . ' AND tstamp > '.$datesince.'';
				$querymergedc='SELECT COUNT(*) AS counter, MIN(tstamp) AS firstcommentview
					FROM tx_toctoc_comments_comments
					WHERE ' . $tmpwhere;

				$resultmerged1c= $GLOBALS['TYPO3_DB']->sql_query($querymergedc);
				while ($rowsmerged1c = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1c)) {
					$commentscounter=intval($rowsmerged1c['counter']);
					$firstcommentview=intval($rowsmerged1c['firstcommentview']);
				}

				$viewscounter=intval($rowsmerged1['sumilikedislikevote']);

				// reorder fields
				$rowsmerged[$i]['voting'] = $viewscounter;
				$rowsmerged[$i]['nbrvotes'] = $rowsmerged1['nbrvotes'];
				$rowsmerged[$i]['likecount'] = $viewscounter;
				$rowsmerged[$i]['ref'] = $rowsmerged1['ref'];
				$rowsmerged[$i]['pageid'] = $rowsmerged1['pageid'];
				$rowsmerged[$i]['sumilikedislike'] = $viewscounter;
				$rowsmerged[$i]['sumilikedislikevote'] = $viewscounter;
				$date=$rowsmerged1['firstview'];
				//compare to date from commentstable

				if (intval($firstcommentview) !=0) {
					if ($firstcommentview<$date)  {
						$date= $firstcommentview;
					}

				}

				// formating found date as specified in conf
				$datefirstview=$date;
				$rowsmerged[$i]['datefirstview'] = '';
				if (intval($date)!=0) {
					if ($conf['advanced.']['dateFormatMode'] == 'strftime') {
						$datefirstview=strftime($conf['advanced.']['dateFormat'], $date);
						if ($datefirstview=='') {
							$datefirstview='strftime format "' . $conf['advanced.']['dateFormat'] . '" is invalid on your system';
						}

					} else {
						$datefirstview=date($conf['advanced.']['dateFormat'], $date);
						if ($datefirstview=='') {
							$datefirstview='date format "' . $conf['advanced.']['dateFormat'] . '" is invalid on your system';
						}

					}

					$lastview='';
					if (($rowsmerged1['lastview']!=0) && ($conf['topRatings.']['showCountTopViewsLastView']==1)) {
						$timebefore=$this->formatDate($rowsmerged1['lastview'], $pObj, FALSE, $conf);
						$timebefore=strtolower(substr($timebefore, 0, 1)) . substr($timebefore, 1);
						$lastview = ', ' . $this->pi_getLLWrap($pObj, 'pi1_template.lastseen', FALSE) . ' ' . $timebefore;
					}

					$rowsmerged[$i]['datefirstview'] = ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.since', FALSE) . ' ' . $datefirstview . $lastview;
				}

				if ($rowsmerged[$i]['nbrvotes'] > $maxvotesfound) {
					$maxvotesfound=$rowsmerged[$i]['nbrvotes'];
				}

				$sumnbrvotesfound= $sumnbrvotesfound+$rowsmerged1['nbrvotes'];
				$sumvotingfound = $sumvotingfound+($viewscounter);

				$sumlikecountfound = $sumlikecountfound+$viewscounter;
				$i++;
			}

			rsort($rowsmerged);
		} elseif ($conf['topRatings.']['topRatingsMode']==5){
			$querymerged='SELECT DISTINCT
					MIN(CASE WHEN pagetstampseen=0 THEN 1377017087 ELSE pagetstampseen END) as pageid,
					MIN(CASE WHEN pagetstampilike=0 THEN 1377017087 ELSE pagetstampilike END) as pageid2,
					MIN(CASE WHEN pagetstampmyrating=0 THEN 1377017087 ELSE pagetstampmyrating END) as pageid3,
					reference As ref,
					(CASE WHEN (seen = 0 AND ilike=0 AND myrating=0) THEN 0 ELSE 1 END) *(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) * (CASE WHEN tstampseen > '.
					$datesince.' THEN 1 ELSE ' . $addonsqlforoldactivities .' END) as okdate,
					sum(seen)+' .
					intval($conf['advanced.']['activityMultiplicatorRating']) .'*(sum(ilike)+sum(idislike)+sum(CASE WHEN myrating>0 THEN 1 ELSE 0 END)) as sumilikedislike,
					count(uid) as nbrvotes,
					min(CASE WHEN tstampseen=0 THEN UNIX_TIMESTAMP() ELSE tstampseen END) as firstview,
					min(CASE WHEN tstampilike THEN UNIX_TIMESTAMP() ELSE tstampilike END) as firstview2,
					min(CASE WHEN tstampmyrating THEN UNIX_TIMESTAMP() ELSE tstampmyrating END) as firstview3,
					min(tstamp) as firstview4,
					max(tstampseen) as lastview,
					max(tstampilike) as lastview2,
					max(tstampmyrating) as lastview3,
					max(tstamp) as lastview4,
					sum(seen) as sumseen,
					sum(seen)+' .
					intval($conf['advanced.']['activityMultiplicatorRating']) .'*(sum(ilike)+sum(idislike)+sum(CASE WHEN myrating>0 THEN 1 ELSE 0 END)) as sumilikedislikevote,
							min(pid) AS pid, min(deleted) AS deleted
					FROM tx_toctoc_comments_feuser_mm
					GROUP BY reference,
							(CASE WHEN (seen = 0 AND ilike=0 AND myrating=0) THEN 0 ELSE 1 END) *(CASE WHEN deleted = 0 THEN 1 ELSE 0 END) *  (CASE WHEN tstampseen > '.
							$datesince.' THEN 1 ELSE ' . $addonsqlforoldactivities .' END)
					HAVING sumseen>0 AND ' . $restrictor . 'okdate>0  AND nbrvotes>= ' . $numberofvotesrequired
					. ' ORDER BY okdate DESC, sumilikedislikevote DESC, nbrvotes DESC, ref';
			$resultmerged1= $GLOBALS['TYPO3_DB']->sql_query($querymerged);
			while ($rowsmerged1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1)) {
				// getting date of first activity
				$date='';
				$date=intval($rowsmerged1['firstview']);
				if (intval($rowsmerged1['firstview2'])>0) {
					if (intval($rowsmerged1['firstview2'])<$date) {
						$date = intval($rowsmerged1['firstview2']);
					}
				}

				if (intval($rowsmerged1['firstview3'])>0) {
					if (intval($rowsmerged1['firstview3'])<$date) {
						$date = intval($rowsmerged1['firstview3']);
					}

				}

				if ((intval($rowsmerged1['firstview4'])>0) && ($date==0)) {
					if (intval($rowsmerged1['firstview4'])<$date) {
						$date = intval($rowsmerged1['firstview4']);
					}

				}

				$lastview='';
				$lastview=intval($rowsmerged1['lastview']);
				if (intval($rowsmerged1['lastview2'])>0) {
					if (intval($rowsmerged1['lastview2'])>$lastview) {
						$lastview = intval($rowsmerged1['lastview2']);
					}

				}

				if (intval($rowsmerged1['lastview3'])>0) {
					if (intval($rowsmerged1['lastview3'])>$lastview) {
						$lastview = intval($rowsmerged1['lastview3']);
					}

				}

				if ((intval($rowsmerged1['lastview4'])>0) && ($lastview==0)) {
					if (intval($rowsmerged1['lastview4'])>$lastview) {
						$lastview = intval($rowsmerged1['lastview4']);
					}

				}

				if (substr($rowsmerged1['ref'], 0, 5)=='tt_co') {
						$whereplus=' AND (external_ref_uid="' . $rowsmerged1['ref'] .'")';

				} else {
					$whereplus=' AND (external_ref="' . $rowsmerged1['ref'] .'")';
				}

				if (str_replace('tx_toctoc_comments_comments_', '', $rowsmerged1['ref']) == $rowsmerged1['ref']){
					$wherecommunity='';
					if (substr($rowsmerged1['ref'], 0, 5) == 'fe_us') {
						$wherecommunity =' AND parentuid=0';
					}

					// counting comments
					$tmpwhere=' approved=1 AND ' . $pidonlycond .
								$this->enableFields('tx_toctoc_comments_comments', $pObj) . $whereplus . $wherecommunity . ' AND tstamp > '.$datesince.'';
					$querymergedc='SELECT COUNT(*) AS counter, MIN(tstamp) AS firstcommentview, MAX(tstamp) AS lastcommentview
						FROM tx_toctoc_comments_comments
						WHERE ' . $tmpwhere;

					$resultmerged1c= $GLOBALS['TYPO3_DB']->sql_query($querymergedc);
					while ($rowsmerged1c = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1c)) {
						$commentscounter=intval($rowsmerged1c['counter']);
						$firstcommentview=intval($rowsmerged1c['firstcommentview']);
						$lastcommentview=intval($rowsmerged1c['lastcommentview']);
					}

					if (intval($lastcommentview)>$lastview) {
						$lastview = $lastcommentview;
					}

				}

				if (str_replace('tx_toctoc_comments_comments_', '', $rowsmerged1['ref']) != $rowsmerged1['ref']){
					// counting subcomments (only for comments)
					$refarr=explode('_', $rowsmerged1['ref']);
					$refid=$refarr[count($refarr)-1];

					$tmpwhere=' parentuid=' .$refid .'  AND approved=1 AND ' . $pidonlycond .
							$this->enableFields('tx_toctoc_comments_comments', $pObj) . $whereplus . ' AND tstamp > '.$datesince.'';
					$querymergedc='SELECT COUNT(*) AS counter, MIN(tstamp) AS firstcommentview, MAX(tstamp) AS lastcommentview
						FROM tx_toctoc_comments_comments
						WHERE ' . $tmpwhere;

					$resultmerged1c= $GLOBALS['TYPO3_DB']->sql_query($querymergedc);
					while ($rowsmerged1c = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultmerged1c)) {
						$commentscounter=intval($rowsmerged1c['counter']);
						$firstcommentview=intval($rowsmerged1c['firstcommentview']);
						$lastcommentview=intval($rowsmerged1c['lastcommentview']);
					}

					if (intval($lastcommentview)>$lastview) {
						$lastview = $lastcommentview;
					}

				}

				$viewscounter=intval($rowsmerged1['sumilikedislikevote'])+intval($conf['advanced.']['activityMultiplicatorComment'])*$commentscounter;
				// reorder fields
				$rowsmerged[$i]['voting'] = $viewscounter;
				$rowsmerged[$i]['nbrvotes'] = $rowsmerged1['nbrvotes'];
				$rowsmerged[$i]['likecount'] = $viewscounter;
				$rowsmerged[$i]['ref'] = $rowsmerged1['ref'];
				if ((intval($rowsmerged1['pageid'])>0) && (intval($rowsmerged1['pageid']) !=1377017087)) {
					$rowsmerged[$i]['pageid'] = $rowsmerged1['pageid'];
				} elseif ((intval($rowsmerged1['pageid2'])>0) && (intval($rowsmerged1['pageid2']) !=1377017087)) {
					$rowsmerged[$i]['pageid'] = $rowsmerged1['pageid2'];

				} elseif ((intval($rowsmerged1['pageid3'])>0) && (intval($rowsmerged1['pageid3']) !=1377017087)) {
					$rowsmerged[$i]['pageid'] = $rowsmerged1['pageid3'];

				}

				$rowsmerged[$i]['sumilikedislike'] = $viewscounter;
				$rowsmerged[$i]['sumilikedislikevote'] = $viewscounter;

				//compare to date from commentstable

				if (intval($firstcommentview) !=0) {
					if ($firstcommentview<$date)  {
						$date= $firstcommentview;
					}

				}

				// formating found date as specified in conf
				$datefirstview=$date;
				$rowsmerged[$i]['datefirstview'] = '';
				if (intval($date)!=0) {
					if ($conf['advanced.']['dateFormatMode'] == 'strftime') {
						$datefirstview=strftime($conf['advanced.']['dateFormat'], $date);
						if ($datefirstview=='') {
							$datefirstview='strftime format "' . $conf['advanced.']['dateFormat'] . '" is invalid on your system';
						}

					} else {
						$datefirstview=date($conf['advanced.']['dateFormat'], $date);
						if ($datefirstview=='') {
							$datefirstview='date format "' . $conf['advanced.']['dateFormat'] . '" is invalid on your system';
						}

					}

					if (($lastview!='') && ($conf['topRatings.']['showCountTopViewsLastView']==1)) {
						$timebefore=$this->formatDate($lastview, $pObj, FALSE, $conf);
						$timebefore=strtolower(substr($timebefore, 0, 1)) . substr($timebefore, 1);
						$lastview = ', ' . $this->pi_getLLWrap($pObj, 'pi1_template.lastactivity', FALSE) . ' ' . $timebefore;
					} else {
						$lastview ='';
					}

					$rowsmerged[$i]['datefirstview'] = ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.since', FALSE) . ' ' . $datefirstview . $lastview;
				}

				if ($rowsmerged[$i]['nbrvotes'] > $maxvotesfound) {
					$maxvotesfound=$rowsmerged[$i]['nbrvotes'];
				}

				$sumnbrvotesfound= $sumnbrvotesfound+$rowsmerged1['nbrvotes'];
				$sumvotingfound = $sumvotingfound+$viewscounter;

				$sumlikecountfound = $sumlikecountfound+$viewscounter;
				$i++;
			}

			rsort($rowsmerged);
		}

		if ($conf['topRatings.']['topRatingsMode']<4){
			if ($conf['topRatings.']['AlignResultsWithMaxVotesAndAvgVote']==1) {
					$rowsmergedout=array();
					$rowsmergedout=$rowsmerged;
					$rowsmerged=array();
					$overallavgvotingfound=(($sumlikecountfound*intval($conf['ratings.']['maxValue'])))/$sumnbrvotesfound;
					$countrowsmergedout2=count($rowsmergedout);
					for ($i=0; $i<$countrowsmergedout2; $i++) {
						if (($conf['topRatings.']['topRatingsMode']==2) || ($conf['topRatings.']['topRatingsMode']==1)){
							$rowsmerged[$i]['voting']=round((($rowsmergedout[$i]['sumilikedislikevote']*$rowsmergedout[$i]['nbrvotes'])+
									($overallavgvotingfound*($maxvotesfound-$rowsmergedout[$i]['nbrvotes'])))/$maxvotesfound, 2);
						} else {
							$rowsmerged[$i]['likecount'] = round((($rowsmergedout[$i]['sumilikedislike'])+
									(($overallavgvotingfound/intval($conf['ratings.']['maxValue']))*($maxvotesfound-$rowsmergedout[$i]['nbrvotes']))), 2);
						}

						$rowsmerged[$i]['nbrvotes'] = $rowsmergedout[$i]['nbrvotes'];
						if ($conf['topRatings.']['topRatingsMode']==3){
							$rowsmerged[$i]['voting']=round((($rowsmergedout[$i]['sumilikedislikevote']*$rowsmergedout[$i]['nbrvotes'])+
									($overallavgvotingfound*($maxvotesfound-$rowsmergedout[$i]['nbrvotes'])))/$maxvotesfound, 2);
						} else {
							$rowsmerged[$i]['likecount'] = round((($rowsmergedout[$i]['sumilikedislike'])+
									(($overallavgvotingfound/intval($conf['ratings.']['maxValue']))*($maxvotesfound-$rowsmergedout[$i]['nbrvotes']))), 2);
						}

						$rowsmerged[$i]['ref'] = $rowsmergedout[$i]['ref'];
						$rowsmerged[$i]['pageid'] = $rowsmergedout[$i]['pageid'];

					}

					rsort($rowsmerged);
			}

		}

		$overallavgvotingfound=round($overallavgvotingfound, 2);
        $this->smiliesPath = str_replace('EXT:toctoc_comments/', $this->locationHeaderUrlsubDir() .
        		t3lib_extMgm::siteRelPath('toctoc_comments'), $conf['smiliePath']);
		$this->smilies = $this->parseSmilieArray($conf['smilies.']);
		// now $rowsmerged contains the data to build the list
		$irank=0;
		if ((count($rowsmerged)>0) && ($rowsmerged[0]['nbrvotes']!='')) {
			$countrowsmergedout3=count($rowsmerged);
			for ($i=0; $i<$countrowsmergedout3; $i++) {
				// from $rowsmerged[$i]['ref'] get the table name and id

				$pageidrecord=$rowsmerged[$i]['ref'];
				// zb tt_news_21
				$prefix=$pageidrecord;
				$posbeforeid = strrpos($pageidrecord, '_')+1;

				$prefix=substr($pageidrecord, 0, $posbeforeid);
				$mmtable=substr($pageidrecord, 0, $posbeforeid-1);
				$refID = substr($pageidrecord, $posbeforeid);
				if (!is_array($_SESSION['prefixes'])) {
					$displayfieldsareset = FALSE;
					$topratingsimagesfolderset = FALSE;
					$_SESSION['prefixes']=array();
					$where = 'deleted=0 ';
					$rowstitle = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
							'tx_toctoc_comments_prefixtotable.pi1_key AS pi1_key, tx_toctoc_comments_prefixtotable.pi1_table AS pi1_table,
								show_uid as show_uid, displayfields As displayfields, topratingsdetailpage As topratingsdetailpage,
							topratingsimagesfolder AS topratingsimagesfolder',
							'tx_toctoc_comments_prefixtotable',
							$where,
							'',
							'',
							''
					);
					$countrowstitle=count($rowstitle);
					for ($j; $j<$countrowstitle; $j++){
						$_SESSION['prefixes'][$rowstitle[$j]['pi1_key']]=$rowstitle[$j];
						if (trim($rowstitle[$j]['displayfields'])!='') {
							$displayfieldsareset = TRUE;
						}

						if (trim($rowstitle[$j]['topratingsimagesfolder'])!='') {
							$topratingsimagesfolderset = TRUE;
						}

					}

					if (($displayfieldsareset==FALSE) || ($topratingsimagesfolderset==FALSE)) {
						// make an initial set of displayfields in the db and reload
						if ($displayfieldsareset==FALSE) {
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='title tstamp image sys_language_uid, short' WHERE pi1_key='tx_ttnews'");
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='title image, subtitle' WHERE pi1_key='tt_products'");
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='full_name start_date photo_main sys_language_uid, biography' WHERE pi1_key='tx_rouge'");
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='full_name start_date photo_main sys_language_uid, biography' WHERE pi1_key='tx_wecstaffdirectory_pi1'");
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='first_name last_name image' WHERE pi1_key='tx_community'");
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='first_name last_name image' WHERE pi1_key='tx_cwtcommunity_pi1'");
							$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET
									displayfields='title teaser tstamp sys_language_uid, bodytext' WHERE pi1_key='tx_news_pi1'");
						}

						if ($topratingsimagesfolderset==FALSE) {
							$ctemp=array();
							if (t3lib_extMgm::isLoaded('tt_news')) {
								$imguploadpath=$conf['advanced.']['FeUserImagePath'];
								$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET topratingsimagesfolder='".
										$imguploadpath."' WHERE pi1_key='tx_ttnews'");
							}

							if (t3lib_extMgm::isLoaded('tt_products')) {
								$ctemp= $this->getDefaultConfig('tt_products');
								$imguploadpath=$ctemp['defaultImageDir'];
								$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET topratingsimagesfolder='".
										$imguploadpath."' WHERE pi1_key='tt_products'");
							}

							if (t3lib_extMgm::isLoaded('wec_staffdirectory')) {
								$ctemp= $this->getDefaultConfig('tx_wecstaffdirectory_pi1');
								$imguploadpath=$ctemp['altImageDir'];
								if (($ctemp['useFEPhoto']==1) || ($imguploadpath=='')){
									$imguploadpath=$conf['advanced.']['FeUserImagePath'];
								}

								$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET topratingsimagesfolder='".
										$imguploadpath."' WHERE pi1_key='tx_rouge'");
								$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET topratingsimagesfolder='".
										$imguploadpath."' WHERE pi1_key='tx_wecstaffdirectory_pi1'");
							}

							if (t3lib_extMgm::isLoaded('community')) {
								$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET topratingsimagesfolder='".
										$conf['advanced.']['FeUserImagePath']."' WHERE pi1_key='tx_community'");
							}

							if (t3lib_extMgm::isLoaded('cwt_community')) {
								$GLOBALS['TYPO3_DB']->sql_query("UPDATE tx_toctoc_comments_prefixtotable SET topratingsimagesfolder='".
										$conf['advanced.']['FeUserImagePath']."' WHERE pi1_key='tx_cwtcommunity_pi1'");
							}

						}

					}

					$rowstitle = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
								'tx_toctoc_comments_prefixtotable.pi1_key AS pi1_key, tx_toctoc_comments_prefixtotable.pi1_table AS pi1_table,
								show_uid as show_uid, displayfields AS displayfields, topratingsdetailpage AS topratingsdetailpage,
							topratingsimagesfolder AS topratingsimagesfolder',
								'tx_toctoc_comments_prefixtotable',
								$where,
								'',
								'',
								''
					);
					$countrowstitle2=count($rowstitle);
					for ($j=0; $j<$countrowstitle2; $j++){
						$_SESSION['prefixes'][$rowstitle[$j]['pi1_key']]=$rowstitle[$j];
						$_SESSION['prefixes']['tbl' . $rowstitle[$j]['pi1_table']]=$rowstitle[$j];
						if ($rowstitle[$j]['displayfields']!='') {
							$displayfieldsareset = TRUE;
						}

					}

					$_SESSION['prefixes']['tt_content']['pi1_key'] ='';

					$_SESSION['prefixes']['tt_content']['pi1_table'] ='tt_content';
					$_SESSION['prefixes']['tt_content']['displayfields'] = 'header crdate image sys_language_uid, bodytext';
					$_SESSION['prefixes']['tt_content']['show_uid'] = '';
					$_SESSION['prefixes']['tt_content']['topratingsimagesfolder'] = $conf['advanced.']['FeUserImagePath'];
					if (version_compare(TYPO3_version, '4.99', '>')) {
						$_SESSION['prefixes']['tt_content']['topratingsimagesfolder'] = 'fileadmin/_migrated/pics/';
					}

					$_SESSION['prefixes']['tbltt_content']['pi1_table'] ='tt_content';
					$_SESSION['prefixes']['tbltt_content']['pi1_key'] ='tt_content';

					$_SESSION['prefixes']['tx_toctoc_comments_comments']['pi1_key'] ='';
					$_SESSION['prefixes']['tx_toctoc_comments_comments']['pi1_table'] =  'tx_toctoc_comments_comments';
					$_SESSION['prefixes']['tx_toctoc_comments_comments']['displayfields'] =  'firstname lastname crdate, content';
					$_SESSION['prefixes']['tx_toctoc_comments_comments']['show_uid'] = '';

					$_SESSION['prefixes']['tbltx_toctoc_comments_comments']['pi1_table'] ='tx_toctoc_comments_comments';
					$_SESSION['prefixes']['tbltx_toctoc_comments_comments']['pi1_key'] ='tx_toctoc_comments_comments';

				}

				// read from Session or Prefixtotable map the fields
				$rowsmerged[$i]['refID']=$refID;

				if (($conf['topRatings.']['topRatingsExternalPrefix']=='') || ($mmtabletoexternalprefix==TRUE)) {
					$mmtabletoexternalprefix=TRUE;
					$conf['topRatings.']['topRatingsExternalPrefix']=$_SESSION['prefixes']['tbl' . $mmtable]['pi1_key'];
					$debug  .='$$topRatingsExternalPrefix ' . $conf['topRatings.']['topRatingsExternalPrefix'] . '<br />';
				}

				$rowsmerged[$i]['pi1_key']=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['pi1_key'];
				$rowsmerged[$i]['pi1_table']=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['pi1_table'];
				$rowsmerged[$i]['show_uid']=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['show_uid'];
				$rowsmerged[$i]['topratingsdetailpage']=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['topratingsdetailpage'];
				$rowsmerged[$i]['topratingsimagesfolder']=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['topratingsimagesfolder'];

				$where = 'uid=' . $refID . ' ' . $this->enableFields($mmtable, $pObj);
				$sorting = '';
				$addparamforextensionswithoutsyslanguid='';
				If ((strrpos($_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields'], 'sys_language_uid')>0) &&
						($GLOBALS['TSFE']->sys_language_uid>0)) {
					$where = '((uid=' . $refID . ') OR (l18n_parent=' . $refID . ' AND sys_language_uid=' . $GLOBALS['TSFE']->sys_language_uid . ')) '  .
					$this->enableFields($mmtable, $pObj);
					$sorting = 'sys_language_uid DESC';
				}

				If ((strrpos($_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields'], 'sys_language_uid')==0) &&
						($GLOBALS['TSFE']->sys_language_uid>0)) {
					if ($mmtable != 'tx_toctoc_comments_comments') {
						$addparamforextensionswithoutsyslanguid='&L=0';
					}

				}

				$displayfieldsarrexplode1= explode(', ', $_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields']);
				$displayfieldsarrexplode2=array();
				$longtextdisplayfield='';
				if (count($displayfieldsarrexplode1)>1) {
					$longtextdisplayfield=$displayfieldsarrexplode1[1];
					$countdisplayfieldsarrexplode1=count($displayfieldsarrexplode1);
					for ($g=0; $g<$countdisplayfieldsarrexplode1; $g++){
						$displayfieldsarrexplode2 = array_merge($displayfieldsarrexplode2, explode(' ', $displayfieldsarrexplode1[$g]));
					}

					$displayfieldsforselect = implode (', ', $displayfieldsarrexplode2);
				} else {
					$displayfieldsarrexplode2 = explode(' ', $_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields']);
					$displayfieldsforselect = implode (', ', $displayfieldsarrexplode2);
				}

				// Select data from Table
				if ($mmtable=='tt_content') {
					$displayfieldsforselect .= ', uid';
				}

				$rowsdisplay = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
						$displayfieldsforselect,
						$mmtable,
						$where,
						'',
						$sorting,
						''
				);

				$rowsdisplaycompressed = array();
				// Create link text, cropping texts to topRatingsTextCropLength chars max
				if (count($rowsdisplay)>0) {
					if ($mmtable=='tt_content') {
						$tt_contentUid = $rowsdisplay[0]['uid'];
						$syslanid = $rowsdisplay[0]['sys_language_uid'];
					}
					$k=0;
					$rowsdisplaycompressed = array();
					foreach($rowsdisplay[0] as $key=>$val) {
						$tmpdisplayfields=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields'];
						if (($key== 'crdate') || ($key== 'tstamp') || ($key== 'datetime') || ($key== 'start_date')) {
							$rowsdisplaycompressed[4] = $this->formatDate($val, $pObj, FALSE, $conf);
						} elseif ((substr($key, 0, 5)== 'image') || (substr($key, 0, 5)== 'photo') || ($key== 'picture')) {
							if (intval($val) == 0) {
								$rowsdisplaycompressed[3] = $val;
							} else {
								$dataWhereContentPic = 'sys_file_reference.tablenames="tt_content" AND sys_file_reference.uid_foreign=tt_content.uid ' .
														'AND sys_file_reference.deleted=0 AND sys_file_reference.uid_local=sys_file.uid ' .
														'AND sys_file_reference.sys_language_uid=' .$syslanid .' AND tt_content.uid = ' . $tt_contentUid;

								$sqlstr = 'SELECT sys_file_reference.uid, sys_file_reference.uid, sys_file_reference.pid, sys_file_reference.uid_foreign,
											sys_file_reference.uid_local,sys_file.name AS image6, tt_content.image FROM ' .
											'tt_content, sys_file_reference , sys_file WHERE ' . $dataWhereContentPic;
								$resultContentPic = $GLOBALS['TYPO3_DB']->sql_query($sqlstr);
								$rowStats = array();
								$rowStats = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultContentPic);
								if (count($rowStats) >0) {
									if ($rowStats['image6']) {
										$rowsdisplaycompressed[3] = $rowStats['image6'];
									} else {
										$rowsdisplaycompressed[3] = $rowStats[0]['image6'];
									}
								} else {
									$rowsdisplaycompressed[3] = '';
								}

							}
						} elseif ($key== 'sys_language_uid') {
							$rowsdisplaycompressed[2] = $val;
						} elseif ($key== 'uid') {
							$rowsdisplaycompressed[5] = $val;
						} else {
							$rowsdisplaycompressed[$k] = $rowsdisplaycompressed[$k] . ' ' . $val;  //ex.: first_name last_name - this gets concat here
						}

						if (str_replace($key . ' ', '', $tmpdisplayfields)==
								$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields']){
							//not in sequence, the second string has to be started, because the displayfield is not separated by ' ' but by ', '

							if ($rowsdisplaycompressed[$k]==''){
								$rowsdisplaycompressed[$k]=$val;
							}

							$rowsdisplaycompressed[$k]=trim($rowsdisplaycompressed[$k] );
							$k++;
						}

					}

				}

				If (($conf['topRatings.']['topRatingsOriginalLangDisplay']==1) || ($rowsdisplaycompressed[0]=='')) {
					if (count($rowsdisplay)>1) {
						$rowsdisplaycompressedzerosave=$rowsdisplaycompressed[0];
						$rowsdisplaycompressed[0]='';

						// 2 records found, 2nd is language original
						// or if we donm't find vaild title in orgig language
						$k=0;
						foreach($rowsdisplay[1] as $key=>$val) {
							$tmpdisplayfields=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields'];
							if (($key== 'crdate') || ($key== 'tstamp') || ($key== 'datetime') || ($key== 'start_date')) {
								$rowsdisplaycompressed[4] = $this->formatDate($val, $pObj, FALSE, $conf);
							} elseif ((substr($key, 0, 5)== 'image') || (substr($key, 0, 5)== 'photo') || ($key== 'picture')) {
								if (intval($val) == 0) {
									$rowsdisplaycompressed[3] = $val;
								} else {
									$dataWhereContentPic = 'sys_file_reference.tablenames="tt_content" AND sys_file_reference.uid_foreign=tt_content.uid ' .
															'AND sys_file_reference.deleted=0 AND sys_file_reference.uid_local=sys_file.uid ' .
															'AND sys_file_reference.sys_language_uid=' .$syslanid .' AND tt_content.uid = ' . $tt_contentUid;

									$sqlstr = 'SELECT sys_file_reference.uid, sys_file_reference.uid, sys_file_reference.pid, sys_file_reference.uid_foreign,
												sys_file_reference.uid_local,sys_file.name AS image6, tt_content.image FROM ' .
												'tt_content, sys_file_reference , sys_file WHERE ' . $dataWhereContentPic;
									$resultContentPic = $GLOBALS['TYPO3_DB']->sql_query($sqlstr);
									$rowStats = array();
									$rowStats = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resultContentPic);
									if (count($rowStats) >0) {
										if ($rowStats['image6']) {
											$rowsdisplaycompressed[3] = $rowStats['image6'];
										} else {
											$rowsdisplaycompressed[3] = $rowStats[0]['image6'];
										}
									} else {
										$rowsdisplaycompressed[3] = '';
									}

								}
							} elseif ($key== 'sys_language_uid') {
								$rowsdisplaycompressed[2] = $val;
							} elseif ($key== 'uid') {
								$rowsdisplaycompressed[6] = $val;
							} else {
								if ($key!= $longtextdisplayfield) {
									If (($rowsdisplaycompressed[$k]=='') || ($conf['topRatings.']['topRatingsOriginalLangDisplay']==1)) {
										$rowsdisplaycompressed[$k] = $rowsdisplaycompressed[$k] . ' ' . $val;
									}

								}

							}

							if (str_replace($key . ' ', '', $tmpdisplayfields)==
									$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['displayfields']){
								//not in sequence
								if ($rowsdisplaycompressed[$k]==''){
									$rowsdisplaycompressed[$k]=$val;
								}

								$rowsdisplaycompressed[$k]=trim($rowsdisplaycompressed[$k] );
								$k++;
							}

						}

					}

				}

				if (count($rowsdisplay)>0) {
					if ($rowsdisplaycompressed[0]!=''){
						//title
						$text=$rowsdisplaycompressed[0];
						$rowsdisplaycompressed[0]=$text;
					} else {
						$rowsdisplaycompressed[0]='no title';
					}

					if ($rowsdisplaycompressed[1]!=''){
						//long text
						$textdirty=$rowsdisplaycompressed[1];

						$search = array('@<script[^>]*?>.*?</script>@si', // Strip out javascript
								'@<[\/\!]*?[^<>]*?>@si',           // Strip out HTML tags
								'@<style[^>]*?>.*?</style>@siU',   // Strip style tags properly
								'@<![\s\S]*?--[ \t\n\r]*>@',        // Strip multi-line comments including CDATA
						);
						$text = preg_replace($search, '', $textdirty);

						if (strlen($text)>$conf['topRatings.']['TextCropLength']) {
							$bbterminatorarr=array();

							$textcroppedleft = substr($text, 0, $conf['topRatings.']['TextCropLength']);
							$textcroppedright = substr($text, $conf['topRatings.']['TextCropLength']);
							$textcroppedrightarr = explode(' ', $textcroppedright);
							if (count($textcroppedrightarr)>1) {

								$testbblen=strlen($textcroppedleft .$textcroppedrightarr[0]);

								$bbterminatorarr= $this->checkbbcrop($text, $testbblen, $conf, $pObj);

								$textcroppedleft .=$textcroppedrightarr[0] . $bbterminatorarr[0] . '...';
								$text =$textcroppedleft;
							}

						}

						$text = nl2br($this->createLinks($text, $conf));
						$text = $this->replaceSmilies($text, $conf);
						$text =$this->replaceBBs($text, $pObj, $conf, FALSE);
						$text =$this->addleadingspace($text);
						$text = $this->makeemoji($text, $conf, 'topratings');
						$text = str_replace('"> <a', '">&nbsp;<a', $text);

						$rowsdisplaycompressed[1]=$text;
					}

					$text=$rowsdisplaycompressed[0];
					$useCacheHashNeeded = intval($GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFoundOnCHashError']);
					$no_cacheflag = 0;
					if (intval($GLOBALS['TYPO3_CONF_VARS']['FE']['disableNoCacheParameter']) ==0) {
						if ($useCacheHashNeeded == 1) {
							$no_cacheflag = 1;
						}

					}

					$show_uid=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['show_uid'];
					$externalprefix=$conf['topRatings.']['topRatingsExternalPrefix'];
					if ($show_uid=='') {
						$show_uid = 'uid';
					}

					if (strpos($show_uid, '&')===FALSE) {
						$getparamsl = $externalprefix .'[' . $show_uid . ']';
					} else {
						$getparamsl = $show_uid;
					}

					if ($mmtable=='tx_toctoc_comments_comments') {
						//link to comment

						$rowsdisplay = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
								'external_ref, external_prefix, external_ref_uid',
								'tx_toctoc_comments_comments',
								'uid='.$refID,
								'',
								'',
								''
						);
						$additionalurlparamsforrecord='';
						if (count($rowsdisplay)>0) {

							$tmpextref=$rowsdisplay[0]['external_ref'];
							if (str_replace('pages_', '', $tmpextref)!=$rowsdisplay[0]['external_ref']) {
								if ($rowsmerged[$i]['pageid'] ==0) {
									$rowsmerged[$i]['pageid']=intval(str_replace('pages_', '', $tmpextref));
								}

							} else {
								// build url-params for record
								$show_uidtmp=$_SESSION['prefixes'][$rowsdisplay[0]['external_prefix']]['show_uid'];
								if ($show_uidtmp=='') {
									$show_uidtmp='uid';
								}

								$refidtmp=substr($rowsdisplay[0]['external_ref'], 1+strrpos($rowsdisplay[0]['external_ref'], '_'));
								$mmtabletmp=substr($rowsdisplay[0]['external_ref'], 0, strrpos($rowsdisplay[0]['external_ref'], '_'));
								$additionalurlparamsforrecord = '&' . $rowsdisplay[0]['external_prefix'] .'[' . $show_uidtmp . ']=' . $refidtmp;

								// now is that record still online ?
								$rowsmm = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid, pid AS pageid',
										$mmtabletmp,
										'uid =' . $refidtmp . ' ' . $this->enableFields($mmtabletmp, $pObj),
										'',
										'');
								if (count($rowsmm)==0) {
									$rowsmerged[$i]['pageid'] =0;
								} else {
									if ($rowsmerged[$i]['pageid'] ==0) {
										// only for old ratings with no pageid in the stats, we get the page over the content element id from tt_content
										$contentidtmp=substr($rowsdisplay[0]['external_ref_uid'], 1+strrpos($rowsdisplay[0]['external_ref_uid'], '_'));
										$rowspage = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid, pid AS pageid',
												'tt_content',
												'uid =' . $contentidtmp,
												'',
												'');
										if (count($rowspage)>0) {
											$rowsmerged[$i]['pageid']=intval($rowspage[0]['pageid']);
										}

									}

								}

							}

						}

						$paramtl=$rowsmerged[$i]['pageid'].$conf['recentcomments.']['anchorPre'].$refID;
						$params = $additionalurlparamsforrecord . '&' . 'toctoc_comments_pi1[anchor]=' . substr($conf['recentcomments.']['anchorPre'], 1) . $refID;
					} elseif ($mmtable=='tt_content') {
						if ($rowsmerged[$i]['pageid'] ==0) {
							// only for old ratings with no pageid in the stats, we get the page over the content element id from tt_content
							$contentidtmp=substr($rowsdisplay[0]['external_ref_uid'], 1+strrpos($rowsdisplay[0]['external_ref_uid'], '_'));
							$rowspage = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid, pid AS pageid',
									'tt_content',
									'uid =' . $refID,
									'',
									'');
							if (count($rowspage)>0) {
								$rowsmerged[$i]['pageid']=intval($rowspage[0]['pageid']);
							}

						}

						$params = '&L=0';
						//lang params
						if (($rowsdisplaycompressed[2] >0) && ($GLOBALS['TSFE']->sys_language_uid==0)) {
							if ($conf['advanced.']['useMultilingual'] == 1) {
								$params = '&L=' . $rowsdisplaycompressed[2];
							} else {
								$params = '&L=0';
							}

						}

						if (($rowsdisplaycompressed[2] ==0) && ($GLOBALS['TSFE']->sys_language_uid>0)) {
							$params = '&L=0';
						}

						if (($rowsdisplaycompressed[2] >0) && ($GLOBALS['TSFE']->sys_language_uid>0)) {
							$params = '&L=' . $rowsdisplaycompressed[2];
						}

						$paramtl=$rowsmerged[$i]['pageid']. '#tx-tc-cts-att_content_' . $refID;
					} else {
						if (intval($_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['topratingsdetailpage'])!=0) {
							$paramtl=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['topratingsdetailpage'];
							$rowsmerged[$i]['pageid']=$_SESSION['prefixes'][$conf['topRatings.']['topRatingsExternalPrefix']]['topratingsdetailpage'];
						}  else {
							 $paramtl=$rowsmerged[$i]['pageid'];
						}

						$params = '&' . $getparamsl . '=' . $refID .$addparamforextensionswithoutsyslanguid;
					}

					$conflink = array(
							'useCacheHash'     => $useCacheHashNeeded,
							'no_cache'         => $no_cacheflag,
							'parameter'        => $paramtl,
							'additionalParams' => $params,
							'ATagParams' => 'rel="nofollow"',
							'forceAbsoluteUrl' => 1,
					);
					$rowsmerged[$i]['linktext']=$text;
					$text = $this->cObj->typoLink($text, $conflink);
					$text = str_replace('href="', 'href="javascript:recentct(1, \'' . $_SESSION['commentListCount'].$irank . '\', ' .
							$rowsmerged[$i]['pageid'] . ', \'', $text);
					$text = str_replace('" rel="nofollow', '\')" rel="nofollow', $text);

					$rowsdisplaycompressed[0]=$text;
					$rowsmerged[$i]['link']=$rowsdisplaycompressed[0];
					$rowsmerged[$i]['text']=$rowsdisplaycompressed[1];
					$rowsmerged[$i]['language']=$rowsdisplaycompressed[2];
					$rowsmerged[$i]['image']=$rowsdisplaycompressed[3];
					$rowsmerged[$i]['date']=$rowsdisplaycompressed[4];
					$rowsmerged[$i]['isok']=1;
					if (strpos($rowsmerged[$i]['link'], 'href=')==0) {
						$rowsmerged[$i]['isok']=0;
					}

				} else {
					$rowsmerged[$i]['isok']=0;
				}

				$rowsmerged[$i]['rank']=$irank;
				$irank=$irank+$rowsmerged[$i]['isok'];
			}

		}

		$rowsmergedclean= array();
		$i2=0;
		if ((count($rowsmerged)>0) && ($rowsmerged[0]['nbrvotes']!='')) {
			$countrowsmerged=count($rowsmerged);
			for ($i=0; $i<$countrowsmerged; $i++) {
				if ($rowsmerged[$i]['isok']==1) {
					$rowsmergedclean[$i2]=$rowsmerged[$i];
					$i2++;
				}

			}

		}

		$rowsmerged=array();
		$countrowsmergedclean=count($rowsmergedclean);
		for ($i=0; $i<$countrowsmergedclean; $i++) {
			$rowsmerged[$i]=$rowsmergedclean[$i];
		}

		$mofdays='';
		if ($conf['topRatings.']['showMinimumVotesinTitle']==1) {
			$mofdays=', ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_minimumvotesrequired', FALSE).' ' . $numberofvotesrequired;
		}

		$trconfigstr=' '. intval($conf['topRatings.']['RatingsDays']) . ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.timeconv.daysgermann', FALSE) . $mofdays .'.';
		if ($conf['topRatings.']['topRatingsMode']==0){
			$topratings_ilike_vote_desc=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_conf0', FALSE) . $trconfigstr;
		} elseif ($conf['topRatings.']['topRatingsMode']==1){
			$topratings_ilike_vote_desc=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_conf1', FALSE) . $trconfigstr;
		} elseif ($conf['topRatings.']['topRatingsMode']==2){
			$topratings_ilike_vote_desc=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_conf2', FALSE) . $trconfigstr;
		} elseif ($conf['topRatings.']['topRatingsMode']==3){
			$topratings_ilike_vote_desc=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_conf3', FALSE) . $trconfigstr;
		} elseif ($conf['topRatings.']['topRatingsMode']==4){
			$topratings_ilike_vote_desc=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_conf4', FALSE) . $trconfigstr;
		} elseif ($conf['topRatings.']['topRatingsMode']==5){
			$topratings_ilike_vote_desc=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_conf5', FALSE) . $trconfigstr;
		}

		$AlignResultsWithMaxVotesAndAvgVoteText='';
		if ($conf['topRatings.']['topRatingsMode']<4){
			if (($conf['topRatings.']['AlignResultsWithMaxVotesAndAvgVote']==1) && ($conf['topRatings.']['showAlignCommentinTitle']==1)) {

				$topratingsAlignResultsdesc = str_replace('%s', $maxvotesfound, $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_calcalign', FALSE));
				$AlignResultsWithMaxVotesAndAvgVoteText='<br />' . $topratingsAlignResultsdesc . ' ' . round($overallavgvotingfound, 1);
			}

			$text_topratings = str_replace('%s', $conf['topRatings.']['RatedItemsListCount'], $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings', FALSE));
		} else {
			if ($conf['topRatings.']['topRatingsMode']==4){
			$text_topratings = str_replace('%s', $conf['topRatings.']['RatedItemsListCount'], $this->pi_getLLWrap($pObj, 'pi1_template.text_topviews', FALSE));
			} else {
				//5
				$text_topratings .= ' ' . str_replace('%s', $conf['topRatings.']['RatedItemsListCount'],
						$this->pi_getLLWrap($pObj, 'pi1_template.text_topactivities', FALSE));

			}

		}

		if ((trim($conf['topRatings.']['topRatingsrestrictToExternalPrefix'])=='') || (trim($conf['topRatings.']['topRatingsrestrictToExternalPrefix'])=='0')) {
			if ($conf['topRatings.']['topRatingsMode']<4){
				$text_topratings .= ', ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_allratedrecords', FALSE);
			} else {
				$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_allviewedrecords', FALSE);

			}

		} elseif ($conf['topRatings.']['topRatingsrestrictToExternalPrefix']=='content') {
			if ($conf['topRatings.']['topRatingsMode']<4){
				$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_pagecontent', FALSE);
			} else {
				if ($conf['topRatings.']['topRatingsMode']==4){
					$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topviews_pagecontent', FALSE);
				} else {
					//5
					$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topviews_pagecontent', FALSE);
				}

			}

		} elseif ($conf['topRatings.']['topRatingsrestrictToExternalPrefix']=='comments') {

			if ($conf['topRatings.']['topRatingsMode']<4){
				$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_comments', FALSE);
			} else {
				//5
				$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_views_viewcountcomments', FALSE);
			}

		} elseif ($conf['topRatings.']['topRatingsrestrictToExternalPrefix']=='custom') {
			if ($externaltable!='') {
				if ($mmtable=='') {
					$mmtable=$externaltable;
				}

				if ($conf['topRatings.']['topRatingsMode']<4){
					$text_topratings .= ',';
				}

				$text_topratings .= ' '. ucfirst($this->pi_getLLWrap($pObj, 'comments_recent.' . $mmtable .'', FALSE));
			} else {
				if ($conf['topRatings.']['topRatingsMode']<4){
					$text_topratings .= ', ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_allratedrecords', FALSE);
				} else {
					$text_topratings .= ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_allviewedrecords', FALSE);

				}

			}

		} else {
			$text_topratings .= ', Error with topRatingsrestrictToExternalPrefix:' . $conf['topRatings.']['topRatingsrestrictToExternalPrefix'];
		}

		if ((count($rowsmerged) == 0) || ((count($rowsmerged)>0) && ($rowsmerged[0]['nbrvotes']==''))) {

			$template = $this->t3getSubpart($pObj, $pObj->templateCode, '###NO_TOPRATINGS###');
			if ($template) {
				$textprob=$this->pi_getLLWrap($pObj, 'pi1_template.text_no_topratings', FALSE);
				if ($conf['topRatings.']['topRatingsMode']==4){
					$textprob=$this->pi_getLLWrap($pObj, 'pi1_template.text_no_topviews', FALSE);
				}

				if ($conf['topRatings.']['topRatingsMode']==5){
					$textprob=$this->pi_getLLWrap($pObj, 'pi1_template.text_no_topactivity', FALSE);
				}

				$retstr = $this->t3substituteMarkerArray($template, array (
						'###LL_TEXT_NO_TOPRATINGS###' => $textprob,
						'###TOPRATINGS_CONFIG_TITLE###' => $text_topratings. '<br />',
						'###TOPRATINGS_CONFIG_DETAIL###' => $topratings_ilike_vote_desc. '<br />',
						));
				return $retstr;

			}

		}

		$entries = array();
		$template= $this->t3getSubpart($pObj, $pObj->templateCode, '###SINGLE_TOPRATINGS###');
		$usetemplateFileratings= str_replace('/EXT:toctoc_comments', 'typo3conf/ext/toctoc_comments', $conf['ratings.']['ratingsTemplateFile']);
		$usetemplateFileratings= str_replace('EXT:toctoc_comments', 'typo3conf/ext/toctoc_comments', $usetemplateFileratings);
		$templateratings = $this->t3fileResource($pObj, $usetemplateFileratings);
		$okrowsi=0;
		$rank=1;

		foreach ($rowsmerged as $row) {

			$externalprefix=$row['pi1_key'];
			$mmtable=$row['pi1_table'];
			$prefix=$mmtable . '_';
			$refID = $row['refID'];
			$where = $mmtable. '.uid = ' . $refID;
			$ownershipok=1;

			if ($mmtable== 'fe_users') {
				$arr_groupmembers=explode(',', $this->usersGroupmembers($pObj, FALSE, $conf, TRUE));

				$arr_groupmembers=array_flip($arr_groupmembers);
				if (!array_key_exists($refID, $arr_groupmembers))  {
					$ownershipok=0;
				}

			}

			if ($ownershipok==1) {
				$skiprow=FALSE;
				if ($skiprow==FALSE) {

				 	$commentID = $row['refID'];
					if ($prefix == 'tt_content_') {
						$exticon= '/typo3/sysext/cms/ext_icon.gif">';
					} elseif ($prefix == 'tt_news_') {
						$exticon= t3lib_extMgm::siteRelPath('tt_news') . 'ext_icon.gif">';
					} elseif ($prefix == 'tt_products_') {
						$exticon= t3lib_extMgm::siteRelPath('tt_products') . 'ext_icon.gif">';
					} elseif ($prefix == 'tx_wecstaffdirectory_info_') {
						$exticon= t3lib_extMgm::siteRelPath('wec_staffdirectory') .	'ext_icon.gif">';
					} elseif ($prefix == 'fe_users_') {
						$exticon= $this->locationHeaderUrlsubDir() . t3lib_extMgm::siteRelPath('toctoc_comments') . 'res/css/themes/' .
						$conf['theme.']['selectedTheme'] . '/img/usericon.gif">';
						$row['topratingsimagesfolder']=$conf['advanced.']['FeUserImagePath'];
					} else {
						$exticon= $this->locationHeaderUrlsubDir() . t3lib_extMgm::siteRelPath('toctoc_comments') . 'ext_icon.gif">';
					}

					$itemtitle = ucfirst($this->pi_getLLWrap($pObj, 'comments_recent.' . $mmtable .'', FALSE));

					if ($itemtitle !='') {
						$itemtitle='title="' . $itemtitle . '" ';
					}

					$titleimage = '<img class="tx-tc-rcentpic" width="14" height="14" valign="middle" ' . $itemtitle . 'src="' . $exticon;

					$commenttext =$row['text'];

					//picture handling
					$ratingimage='';
					$profileimgclass='tx-tc-trtpic';
					if (count(explode(',', $row['image']))>1) {
						$imgarr=explode(',', $row['image']);
						$row['image']=$imgarr[0];
					}

					if (strpos ($row['topratingsimagesfolder'], '/')>1) {
						//there is a path
						if (trim ($row['image']) != '') {
							//there is an image
							$ratingimage=$row['topratingsimagesfolder'] . $row['image'];
						}

					} else {
						if (strrpos($row['image'], '/')>1) {
							//theres an image with path
							$ratingimage=$row['image'];
						}

					}

					$dirsep=DIRECTORY_SEPARATOR;
					$repstr= str_replace('/', $dirsep, '/typo3conf/ext/toctoc_comments/pi1');

					$txdirname= str_replace('/', DIRECTORY_SEPARATOR, str_replace($repstr, '', dirname(__FILE__)) . $dirsep . $ratingimage);

					$tmpimgstr='';
					$styleheight='';
					$stylemargincontent=0;
					if (file_exists($txdirname)) {
						$userimgsize=$conf['topRatings.']['topratingsimagesize'];
						if ($ratingimage!='') {

							$pObj->cObj = t3lib_div::makeInstance('tslib_cObj');
							$img = array();
							$img['file'] = GIFBUILDER;
							$img['file.']['XY'] = '' . $userimgsize .',' . $userimgsize . '';
							$img['file.']['10'] = IMAGE;
							$img['file.']['10.']['file'] = $ratingimage;
							$img['file.']['10.']['file.']['width'] = $userimgsize .'c';
							$img['file.']['10.']['file.']['height'] = $userimgsize .'c';
							$img['params'] = 'class="' . $profileimgclass . '" title="'.$row['linktext']. '"';
							$tmpimgstr = '<div class="tx-tc-trt-rating-img">'.str_replace($row['linktext'], $pObj->cObj->IMAGE($img), $row['link']) .'</div>';
							$styleheight=' tx-tc-trt-userisz';
							$stylemargincontent = $userimgsize+2*intval($conf['theme.']['boxmodelSpacing']);
							if ($conf['theme.']['selectedBoxmodelkoogled'] == 1) {
								$stylemargincontent = $stylemargincontent - 6;
							}

						}

					}

					if (strpos($row['link'], 'href=')>0) {

						if ($conf['ratings.']['useNumberOfVotes'] != 1) {
							$row['nbrvotes']='';
						} else {
							if ($fromusercenterid == 0) {
								if ($conf['topRatings.']['topRatingsMode']<4){
									if ($row['nbrvotes'] != 1) {
										$row['nbrvotes']='(' . $row['nbrvotes'] . ' ' . $this->pi_getLLWrap($pObj, 'api_rating.votes', FALSE) . ')';
									} else {
										$row['nbrvotes']='(' . $row['nbrvotes'] . ' ' . $this->pi_getLLWrap($pObj, 'api_rating.vote', FALSE) . ')';
									}
								} else {
									if ($conf['topRatings.']['topRatingsMode']==4){
										$row['nbrvotes']=', ' . $row['nbrvotes'] . ' ' . $this->pi_getLLWrap($pObj, 'pi1_template.text_count', FALSE) . ' ' .
										$this->pi_getLLWrap($pObj, 'pi1_template.text_views_viewcount', FALSE) . '';
									} else {
										$row['nbrvotes']='';
									}

								}
							} else {
								$row['nbrvotes']='(' . $this->formatDate($row['ratedate'], $pObj, FALSE, $conf) . ')';
							}

						}

						$subTemplate = $this->t3getSubpart($pObj, $templateratings, '###TEMPLATE_RATING###');
						$voteSub = $this->t3getSubpart($pObj, $templateratings, '###VOTE_LINK_SUB_OVERALLVOTE###');

						$links = '';
						$stepping=1;
						$steppingarr=array();
						$start=1;
						$gap=intval($conf['ratings.']['maxValue'])-intval($conf['ratings.']['minValue']);
						if (($gap>10) || (intval($conf['ratings.']['minValue'])>1)) {
							// no tips stepping to big or minvalue > 1
							$start=-1;
						} elseif  ($gap==10) {
							$stepping='1,1,1,1,1,1,1,1,1,1';
						} elseif  ($gap==9) {
							$stepping='1,1,1,2,1,1,1,1,1';
						} elseif  ($gap==8) {
							$stepping='1,1,1,2,1,1,1,2';
						} elseif  ($gap==7) {
							$stepping='2,2,1,2,1,1,1';
						} elseif  ($gap==6) {
							$stepping='2,2,1,2,2,1';
						} elseif  ($gap==5) {
							$stepping='2,3,2,2,1';
						} elseif  ($gap==4) {
							$stepping='2,3,2,3';
						} elseif  ($gap==3) {
							$stepping='5,2,3';
						} elseif  ($gap==2) {
							$stepping='5,5';
						} elseif  ($gap==1) {
							$stepping='10';
						} elseif  ($gap==0) {
							$stepping='0';
							$start=6;
						}

						$steppingarr=explode(',', $stepping);
						$nextstep=$start;
						for ($i = $conf['ratings.']['minValue']; $i <= $conf['ratings.']['maxValue']; $i++) {
							$refforvote='123';
							$check = '123';
							$apiratingtip='';
							If ($start!=-1) {
								$apiratingtip=$this->pi_getLLWrap($pObj, 'api_tipstar_' . $nextstep, FALSE);
								$nextstep= $nextstep+$steppingarr[($i-intval($conf['ratings.']['minValue']))];
							}

							$links .= $this->t3substituteMarkerArray($voteSub, array(
									'###VALUE###' => $i,
									'###REF###' => $refforvote,
									'###PID###' => $pid,
									'###CID###' => $cid,
									'###APIRATINGTIP###' => $apiratingtip,
									'###CHECK###' => $check,
									'###SITE_REL_PATH###' => $siteRelPath,
							));
						}

						$hidecss ='';
						$markers = array(
								'###HIDECSS###' . $hidecss,
								'###PID###' => $pid,
								'###CID###' => $cid,
								'###HIDEVOTE###' => $strhidevote,
								'###REF###' => htmlspecialchars($refforvote),
								'###TEXT_SUBMITTING###' => $this->pi_getLLWrap($pObj, 'api_submitting', FALSE),
								'###TEXT_ALREADY_RATED###' => $this->pi_getLLWrap($pObj, 'api_already_rated', FALSE),
								'###BAR_WIDTH###' => $this->getBarWidth($row['voting'], $conf),
								'###COMMENT_DATE###' => $commentdatehtml,
								'###RATING###' => $rating_str,
								'###TEXT_RATING_TIP###' => $this->pi_getLLWrap($pObj, 'api_tip', FALSE),
								'###SITE_REL_PATH###' => $siteRelPath,
								'###VOTE_LINKS###' => $links,
								'###MYRATING###' => $myratingtext,
								'###MYILIKE_AREA###' => $mylikeareahtml,
								'###MYILIKE###' => $mylike,
								'###MYIDISLIKE###' => $mydislike,
								'###MYILIKETEXT###' => $mylikehtml,
								'###MYIDISLIKETEXT###' => $mydislikehtml,
								'###MYBAR_WIDTH###' => $myrating_width,
								'###MYBAR_LEFT###'=> $myrating_left,
						);
						$voteingstr= '</div>' . $this->t3substituteMarkerArray($subTemplate, $markers) . '<div class="tx-tc-trt-rating-right">';
						$strdislike='';
						if ($row['likecount']>0) {
							$mylikepic='ilike.png';

						} else {
							$mylikepic='idislike.png';
							$row['likecount']=$row['likecount']*(-1);
							$strdislike='dis';

						}

						$mylikepictitle=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_'.$strdislike.'likes', FALSE);
						if ($conf['topRatings.']['topRatingsMode']==4){
								$mylikepic='icon_views.png';
								$mylikepictitle=ucfirst($this->pi_getLLWrap($pObj, 'pi1_template.text_views_viewcount', FALSE));
						}

						if ($conf['topRatings.']['topRatingsMode']==5){
							$mylikepic='icon_activity.png';
							$mylikepictitle=ucfirst($this->pi_getLLWrap($pObj, 'pi1_template.activities', FALSE));
						}

						$addbr='';
						$mylike= '<img class="tx-tc-trt-rating-like" alt="' . $mylikepictitle . '" title=" ' . $mylikepictitle
						. '" src="' . $this->locationHeaderUrlsubDir() . t3lib_extMgm::siteRelPath('toctoc_comments') . 'res/css/themes/' .
						$conf['theme.']['selectedTheme'] . '/img/' . $mylikepic . '" />';
						$titlelink = $row['link'];
						if ($conf['topRatings.']['topRatingsMode']==0){
							$topratings_ilike_vote= '&nbsp;' . str_replace('tx-tc-trt-rating-like', 'tx-tc-trt-rating-like-only', $mylike) . '<b>'.
							$row['likecount']. '</b> ';
							$addbr='<br />';
							if ($fromusercenterid == 0) {
								$row['nbrvotes']='';
							}
						} elseif ($conf['topRatings.']['topRatingsMode']==1){
							$topratings_ilike_vote=$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_rating', FALSE) . ':&nbsp;' .
							$voteingstr . $row['voting']. ' ';
						} elseif ($conf['topRatings.']['topRatingsMode']==2){
							$topratings_ilike_vote= $this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_rating', FALSE) . ':&nbsp;' .
							$voteingstr . $row['voting'] . '  ' . $this->middotchar . ' ' . $mylike . ' ' . $row['likecount'] . ' ';
						} elseif ($conf['topRatings.']['topRatingsMode']==3){
							$topratings_ilike_vote='&nbsp;' . $mylike . '<b> ' . round($row['likecount'], 1) . '</b> ' . $this->middotchar . ' ' .
							$this->pi_getLLWrap($pObj, 'pi1_template.text_topratings_rating', FALSE) . ':&nbsp;' . $voteingstr . $row['voting'] . ' ';
						} elseif ($conf['topRatings.']['topRatingsMode']==4){
							$topratings_ilike_vote='' . $mylike . '&nbsp;<b> ' . round($row['likecount'], 1) . '</b>' . $row['datefirstview'];
							$addbr='<br class="tx-tc-br-articleview">';
							$row['nbrvotes']='';
						} elseif ($conf['topRatings.']['topRatingsMode']==5){
							//activity
							$topratings_ilike_vote='' . $mylike . '&nbsp;<b> ' . round($row['likecount'], 1) . '</b>' . $row['datefirstview'];
							$addbr='<br class="tx-tc-br-articleview">';

							$row['nbrvotes']='';

						}

						$contenttxt='';

						//margin twice 3px, border 2*1px, width 20px + 8px padding
						$marginratingnumber = $conf['theme.']['boxmodelSpacing']-1;
						$paddingratingnumber = $conf['theme.']['boxmodelSpacing'];

						if ($stylemargincontent==0) {
							$margincontent= ' tx-tc-mrgcntnp-left';
						}
						else {
							$margincontent= ' tx-tc-mrgcnt-left';
						}
						if (trim($row['text']) != '') {
							$contenttxt = '<div class="tx-tc-trt-content' . $margincontent . '">' . $row['text'] . '</div>';
						}

						$rankstyle='';
						if ($rank==1){
							//gold
							$rankstyle=' tx-tc-rank1';
						} elseif ($rank==2){
							//silver
							$rankstyle=' tx-tc-rank2';
						} elseif ($rank==3){
							//bronze
							$rankstyle=' tx-tc-rank3';
						}

						$titletxt='<div class="tx-tc-trt-entry' . $margincontent . '">' . $titleimage . $titlelink . ' &#124; ' .
						$row['date'] . '</div>';

						$markerArray = array(
								'###TOPRATINGS_RANK###' => '<div class="tx-tc-trt-rating'.$rankstyle .'"><div class="tx-tc-trl-rank">' . $rank . '</div></div>',
								'###TOPRATINGS_ILIKE_VOTE###' => $topratings_ilike_vote,
								'###TOPRATINGS_NBRVOTES###' => $row['nbrvotes'],
								'###TOPRATINGS_IMG###' => $tmpimgstr,
								'###LINKTOPRATEDITEM###' => $titletxt,
								'###TOPRATINGS_CONTENT###' => $contenttxt,
								'###RCID###' => $_SESSION['commentListCount'].$okrowsi,
								'###STYLEHEIGHT###' => $styleheight,
								'###ADDBR###' => $addbr
						);

						$entries[] = $this->t3substituteMarkerArray($template, $markerArray);
						$okrowsi++;
						$rank=$rank+1;
					}

					// if not: link did not resolve -> not accessible to user - we skip
				}

				// if not: link did not resolve -> not accessible to user - we skip
			}

			if ($okrowsi>=$conf['topRatings.']['RatedItemsListCount']) {
				break;
			}

		}

		// output the entire plugin
		// Merge
		if (intval($fromusercenterid)==0) {
			$retstr = implode($entries);
		} else {
			$cntentries = count($entries);
			for ($i=0; (($i<$shownbritemsinusercenter) && ($i<$cntentries)); $i++) {
				$retstr .= $entries[$i];
			}

			for ($i=$shownbritemsinusercenter; $i<$cntentries; $i++) {
				$retstrinner .= $entries[$i];
			}

			if ($retstrinner !='') {
				$retstr .= $this->t3substituteMarkerArray($this->t3getSubpart($pObj, $pObj->templateCode, '###USERCENTER_DROPDOWNSHOWMORE###'),
						array(
								'###DROPDOWNID###' => ($fromusercenterid+$fromusercenterid*10),
								'###DROPDOWNTIPTEXT###' => $this->pi_getLLWrap($pObj, 'pi1_template.text_usercenter_showmoreorless', FALSE),
								'###DROPUPORDOWN###' => 'Down',
								'###TITLE###' => $this->pi_getLLWrap($pObj, 'pi1_template.text_usercenter_showmore', FALSE),
								'###CONTENT###' => $retstrinner,

						)
				);
			}

		}

		$subParts = array(
			'###SINGLE_TOPRATINGS###' => $retstr,
		);
		$retstr='';
		$template = $this->t3getSubpart($pObj, $pObj->templateCode, '###TOPRATINGS_LIST###');
		$markers = array(
			'###TOPRATINGS_CONFIG_TITLE###' => $text_topratings . '<br />',
			'###TOPRATINGS_CONFIG_DETAIL###' => $topratings_ilike_vote_desc.$AlignResultsWithMaxVotesAndAvgVoteText. '<br />',
		);

		$retstr = $this->substituteMarkersAndSubparts($template, $markers, $subParts, $pObj);
		return $retstr;

	}

}

if(defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/toctoc_comments/class.toctoc_comments_charts.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/toctoc_comments/class.toctoc_comments_charts.php']);
}
?>