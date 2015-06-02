<?php

class ux_tx_indexedsearch extends tx_indexedsearch {


	/**
	 * Initialize internal variables, especially selector box values for the search form and search words
	 *
	 * @return	void
	 */
	function initialize()	{
		global $TYPO3_CONF_VARS;
		
			// Initialize external document parsers for icon display and other soft operations
		if (is_array($TYPO3_CONF_VARS['EXTCONF']['indexed_search']['external_parsers']))	{
			foreach ($TYPO3_CONF_VARS['EXTCONF']['indexed_search']['external_parsers'] as $extension => $_objRef)	{
				$this->external_parsers[$extension] = &t3lib_div::getUserObj($_objRef);

					// Init parser and if it returns false, unset its entry again:
				if (!$this->external_parsers[$extension]->softInit($extension))	{
					unset($this->external_parsers[$extension]);
				}
			}
		}
			// Init lexer (used to post-processing of search words)
		$lexerObjRef = $TYPO3_CONF_VARS['EXTCONF']['indexed_search']['lexer'] ?
						$TYPO3_CONF_VARS['EXTCONF']['indexed_search']['lexer'] :
						'EXT:indexed_search/class.lexer.php:&tx_indexedsearch_lexer';
		$this->lexerObj = &t3lib_div::getUserObj($lexerObjRef);

			// If "_sections" is set, this value overrides any existing value.
		if ($this->piVars['_sections'])		$this->piVars['sections'] = $this->piVars['_sections'];

			// If "_sections" is set, this value overrides any existing value.
		if ($this->piVars['_freeIndexUid']!=='_')		$this->piVars['freeIndexUid'] = $this->piVars['_freeIndexUid'];

			// Add previous search words to current
		if ($this->piVars['sword_prev_include'] && $this->piVars['sword_prev'])	{
			$this->piVars['sword'] = trim($this->piVars['sword_prev']).' '.$this->piVars['sword'];
		}

		$this->piVars['results'] = t3lib_div::intInRange($this->piVars['results'],1,100000,$this->defaultResultNumber);

			// Selector-box values defined here:
		$this->optValues = Array(
			'type' => Array(
				'0' => $this->pi_getLL('opt_type_0'),
				'1' => $this->pi_getLL('opt_type_1'),
				'2' => $this->pi_getLL('opt_type_2'),
				'3' => $this->pi_getLL('opt_type_3'),
				'10' => $this->pi_getLL('opt_type_10'),
				'20' => $this->pi_getLL('opt_type_20'),
			),
			'defOp' => Array(
				'0' => $this->pi_getLL('opt_defOp_0'),
				'1' => $this->pi_getLL('opt_defOp_1'),
			),
			'sections' => Array(
				'0' => $this->pi_getLL('opt_sections_0'),
				'-1' => $this->pi_getLL('opt_sections_-1'),
				'-2' => $this->pi_getLL('opt_sections_-2'),
				'-3' => $this->pi_getLL('opt_sections_-3'),
				// Here values like "rl1_" and "rl2_" + a rootlevel 1/2 id can be added to perform searches in rootlevel 1+2 specifically. The id-values can even be commaseparated. Eg. "rl1_1,2" would search for stuff inside pages on menu-level 1 which has the uid's 1 and 2.
			),
			'freeIndexUid' => Array(
				'-1' => $this->pi_getLL('opt_freeIndexUid_-1'),
				'-2' => $this->pi_getLL('opt_freeIndexUid_-2'),
				'0' => $this->pi_getLL('opt_freeIndexUid_0'),
			),
			'media' => Array(
				'-1' => $this->pi_getLL('opt_media_-1'),
				'0' => $this->pi_getLL('opt_media_0'),
				'-2' => $this->pi_getLL('opt_media_-2'),
			),
			'order' => Array(
				'rank_flag' => $this->pi_getLL('opt_order_rank_flag'),
				'rank_freq' => $this->pi_getLL('opt_order_rank_freq'),
				'rank_first' => $this->pi_getLL('opt_order_rank_first'),
				'rank_count' => $this->pi_getLL('opt_order_rank_count'),
				'mtime' => $this->pi_getLL('opt_order_mtime'),
				'title' => $this->pi_getLL('opt_order_title'),
				'crdate' => $this->pi_getLL('opt_order_crdate'),
			),
			'group' => Array (
				'sections' => $this->pi_getLL('opt_group_sections'),
				'flat' => $this->pi_getLL('opt_group_flat'),
			),
			'lang' => Array (
				-1 => $this->pi_getLL('opt_lang_-1'),
				0 => $this->conf['defaultLanguageLabel']?$this->conf['defaultLanguageLabel']:$this->pi_getLL('opt_lang_0'),
			),
			'desc' => Array (
				'0' => $this->pi_getLL('opt_desc_0'),
				'1' => $this->pi_getLL('opt_desc_1'),
			),
			'results' => Array (
				'10' => '10',
				'20' => '20',
				'50' => '50',
				'100' => '100',
			)
		);

			// Free Index Uid:
		if ($this->conf['search.']['defaultFreeIndexUidList'])	{
			$uidList = t3lib_div::intExplode(',', $this->conf['search.']['defaultFreeIndexUidList']);
			$indexCfgRecords = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid,title','index_config','uid IN ('.implode(',',$uidList).')'.$this->cObj->enableFields('index_config'),'','','','uid');

			foreach ($uidList as $uidValue)	{
				if (is_array($indexCfgRecords[$uidValue]))	{
					$this->optValues['freeIndexUid'][$uidValue] = $indexCfgRecords[$uidValue]['title'];
				}
			}
		}


			// Add media to search in:
		if (strlen(trim($this->conf['search.']['mediaList'])))	{
			$mediaList = implode(',', t3lib_div::trimExplode(',', $this->conf['search.']['mediaList'], 1));
		}
		foreach ($this->external_parsers as $extension => $obj)	{
				// Skip unwanted extensions
			if ($mediaList && !t3lib_div::inList($mediaList, $extension))	{ continue; }

			if ($name = $obj->searchTypeMediaTitle($extension))	{
				$this->optValues['media'][$extension] = $this->pi_getLL('opt_sections_'.$extension,$name);
			}
		}

			// Add operators for various languages
			// Converts the operators to UTF-8 and lowercase
		$this->operator_translate_table[] = Array($GLOBALS['TSFE']->csConvObj->conv_case('utf-8',$GLOBALS['TSFE']->csConvObj->utf8_encode($this->pi_getLL('local_operator_AND'), $GLOBALS['TSFE']->renderCharset),'toLower') , 'AND');
		$this->operator_translate_table[] = Array($GLOBALS['TSFE']->csConvObj->conv_case('utf-8',$GLOBALS['TSFE']->csConvObj->utf8_encode($this->pi_getLL('local_operator_OR'), $GLOBALS['TSFE']->renderCharset),'toLower') , 'OR');
		$this->operator_translate_table[] = Array($GLOBALS['TSFE']->csConvObj->conv_case('utf-8',$GLOBALS['TSFE']->csConvObj->utf8_encode($this->pi_getLL('local_operator_NOT'), $GLOBALS['TSFE']->renderCharset),'toLower') , 'AND NOT');

			// This is the id of the site root. This value may be a commalist of integer (prepared for this)
		$this->wholeSiteIdList = intval($GLOBALS['TSFE']->config['rootLine'][0]['uid']);

			// Creating levels for section menu:
			// This selects the first and secondary menus for the "sections" selector - so we can search in sections and sub sections.
		if ($this->conf['show.']['L1sections'])	{
			$firstLevelMenu = $this->getMenu($this->wholeSiteIdList);
			while(list($kk,$mR) = each($firstLevelMenu))	{
				if ($mR['doktype']!=5)	{
					$this->optValues['sections']['rl1_'.$mR['uid']] = trim($this->pi_getLL('opt_RL1').' '.$mR['title']);
					if ($this->conf['show.']['L2sections'])	{
						$secondLevelMenu = $this->getMenu($mR['uid']);
						while(list($kk2,$mR2) = each($secondLevelMenu))	{
							if ($mR['doktype']!=5)	{
								$this->optValues['sections']['rl2_'.$mR2['uid']] = trim($this->pi_getLL('opt_RL2').' '.$mR2['title']);
							} else unset($secondLevelMenu[$kk2]);
						}
						$this->optValues['sections']['rl2_'.implode(',',array_keys($secondLevelMenu))] = $this->pi_getLL('opt_RL2ALL');
					}
				} else unset($firstLevelMenu[$kk]);
			}
			$this->optValues['sections']['rl1_'.implode(',',array_keys($firstLevelMenu))] = $this->pi_getLL('opt_RL1ALL');
		}

			// Setting the list of root PIDs for the search. Notice, these page IDs MUST have a TypoScript template with root flag on them! Basically this list is used to select on the "rl0" field and page ids are registered as "rl0" only if a TypoScript template record with root flag is there.
			// This happens AFTER the use of $this->wholeSiteIdList above because the above will then fetch the menu for the CURRENT site - regardless of this kind of searching here. Thus a general search will lookup in the WHOLE database while a specific section search will take the current sections...
		if ($this->conf['search.']['rootPidList'])	{
			$this->wholeSiteIdList = implode(',',t3lib_div::intExplode(',',$this->conf['search.']['rootPidList']));
		}

			// Load the template
		$this->templateCode = $this->cObj->fileResource($this->conf['templateFile']);

			// Add search languages:
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'sys_language', '1=1'.$this->cObj->enableFields('sys_language'));
		while($lR = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{
			$this->optValues['lang'][$lR['uid']] = $lR['title'];
		}
			// Calling hook for modification of initialized content
		if ($hookObj = &$this->hookRequest('initialize_postProc'))	{
			$hookObj->initialize_postProc();
		}

			// Default values set:
			// Setting first values in optValues as default values IF there is not corresponding piVar value set already.
		foreach ($this->optValues as $kk => $vv)	{
			if (!isset($this->piVars[$kk]))	{
				reset($vv);
				$this->piVars[$kk] = key($vv);
			}
		}

			// Blind selectors:
		if (is_array($this->conf['blind.']))	{
			foreach ($this->conf['blind.'] as $kk => $vv)	{
				if (is_array($vv))	{
					foreach ($vv as $kkk => $vvv)	{
						if (!is_array($vvv) && $vvv && is_array($this->optValues[substr($kk,0,-1)]))	{
							unset($this->optValues[substr($kk,0,-1)][$kkk]);
						}
					}
				} elseif ($vv) {	// If value is not set, unset the option array.
					unset($this->optValues[$kk]);
				}
			}
		}

			// This gets the search-words into the $sWArr:
		$this->sWArr = $this->getSearchWords($this->piVars['defOp']);
	}


	/**
	 * Compiles the HTML display of the incoming array of result rows.
	 *
	 * @param	array		Search words array (for display of text describing what was searched for)
	 * @param	array		Array with result rows, count, first row.
	 * @param	integer		Pointer to which indexing configuration you want to search in. -1 means no filtering. 0 means only regular indexed content.
	 * @return	string		HTML content to display result.
	 */

	function getDisplayResults($sWArr, $resData, $freeIndexUid=-1)	{
			// Perform display of result rows array:
			$noResultsWrap = explode('|',$this->conf['noResultsWrap']);
			$searchedForWrap = explode('|',$this->conf['searchedForWrap']);
			$searchedForWordWrap = explode('|',$this->conf['searchedForWordWrap ']);
		if ($resData)	{
			$GLOBALS['TT']->push('Display Final result');

				// Set first selected row (for calculation of ranking later)
			$this->firstRow = $resData['firstRow'];

				// Result display here:
			$rowcontent = '';
			$rowcontent.= $this->compileResult($resData['resultRows'], $freeIndexUid);

				// Browsing box:
			if ($resData['count'])	{
				$this->internal['res_count'] = $resData['count'];
				$this->internal['results_at_a_time'] = $this->piVars['results'];
				$this->internal['maxPages'] = t3lib_div::intInRange($this->conf['search.']['page_links'],1,100,10);
				$this->internal['pagefloat'] = $this->conf['pageBrowser.']['pagefloat'];
				$this->internal['showFirstLast'] = $this->conf['pageBrowser.']['showFirstLast'];
				$this->internal['showRange'] = $this->conf['pageBrowser.']['showRange'];
				$this->internal['dontLinkActivePage'] = $this->conf['pageBrowser.']['dontLinkActivePage'];
				$addString = ($resData['count']&&$this->piVars['group']=='sections'&&$freeIndexUid<=0 ? ' '.sprintf($this->pi_getLL(count($this->resultSections)>1?'inNsections':'inNsection'),count($this->resultSections)):'');
				$pointerName = 'pointer';
			
				if (!$this->conf['pageBrowser.']['showPBrowserText']) {
					$this->LOCAL_LANG[$this->LLkey]['pi_list_browseresults_page'] = '';
				}			

				$wrapArrFields = explode(',', 'disabledLinkWrap,inactiveLinkWrap,activeLinkWrap,browseLinksWrap,showResultsWrap,showResultsNumbersWrap,browseBoxWrap');
				$wrapArr = array();
				foreach($wrapArrFields as $key) {
					if ($this->conf['pageBrowser.'][$key]) {
						$wrapArr[$key] = $this->conf['pageBrowser.'][$key];
					}
				}

				if ($wrapArr['showResultsNumbersWrap'] && strpos($this->LOCAL_LANG[$this->LLkey]['pi_list_browseresults_displays'],'%s')) {
					$this->LOCAL_LANG[$this->LLkey]['pi_list_browseresults_displays'] = $this->LOCAL_LANG[$this->LLkey]['pi_list_browseresults_displays_advanced'];
				}

				$this->pi_alwaysPrev = $this->conf['pageBrowser.']['alwaysPrev'];

				$pi_isOnlyFieldsArr = explode(',',$this->pi_isOnlyFields);
				$highestVal = 0;
				foreach ($pi_isOnlyFieldsArr as $k => $v) {
					if ($this->piVars[$v] > $highestVal) {
						$highestVal = $this->piVars[$v];
					}
				}
				$this->pi_lowerThan = $highestVal+1;

				$browseBox1 = $this->pi_list_browseresults(1, $addString,$wrapArr, $pointerName, $this->conf['pageBrowser.']['hscText']);
				$browseBox2 = $this->pi_list_browseresults(0, $addString,$wrapArr, $pointerName, $this->conf['pageBrowser.']['hscText']);
			}
			
			if ($resData['count'])	{
				$content = $browseBox1.$rowcontent.$browseBox2;
			} else {
				$content = $noResultsWrap[0].$this->pi_classParam('noresults').'>'.$this->pi_getLL('noResults','',1).$noResultsWrap[1];
			}

			$GLOBALS['TT']->pull();
		} else {
			$content.=$noResultsWrap[0].$this->pi_classParam('noresults').'>'.$this->pi_getLL('noResults','',1).$noResultsWrap[1];
		}

		$what = $this->tellUsWhatIsSeachedFor($sWArr).
				(substr($this->piVars['sections'],0,2)=='rl'?' '.$this->pi_getLL('inSection','',1).' "'.substr($this->getPathFromPageId(substr($this->piVars['sections'],4)),1).'"':'');
		$what = $searchedForWrap[0].$this->pi_classParam('whatis').'>'.$this->cObj->stdWrap($what, $this->conf['whatis_stdWrap.']).$searchedForWrap[1];
		$content = $what.$content;
		return $content;
	}
	

	/***************************
	 *
	 * Functions for listing, browsing, searching etc.
	 *
	 **************************/

	/**
	 * Returns a results browser. This means a bar of page numbers plus a "previous" and "next" link. For each entry in the bar the piVars "pointer" will be pointing to the "result page" to show.
	 * Using $this->piVars['pointer'] as pointer to the page to display. Can be overwritten with another string ($pointerName) to make it possible to have more than one pagebrowser on a page)
	 * Using $this->internal['res_count'], $this->internal['results_at_a_time'] and $this->internal['maxPages'] for count number, how many results to show and the max number of pages to include in the browse bar.
	 * Using $this->internal['dontLinkActivePage'] as switch if the active (current) page should be displayed as pure text or as a link to itself
	 * Using $this->internal['showFirstLast'] as switch if the two links named "<< First" and "LAST >>" will be shown and point to the first or last page.
	 * Using $this->internal['pagefloat']: this defines were the current page is shown in the list of pages in the Pagebrowser. If this var is an integer it will be interpreted as position in the list of pages. If its value is the keyword "center" the current page will be shown in the middle of the pagelist.
	 * Using $this->internal['showRange']: this var switches the display of the pagelinks from pagenumbers to ranges f.e.: 1-5 6-10 11-15... instead of 1 2 3...
	 * Using $this->pi_isOnlyFields: this holds a comma-separated list of fieldnames which - if they are among the GETvars - will not disable caching for the page with pagebrowser.
	 *
	 * The third parameter is an array with several wraps for the parts of the pagebrowser. The following elements will be recognized:
	 * disabledLinkWrap, inactiveLinkWrap, activeLinkWrap, browseLinksWrap, showResultsWrap, showResultsNumbersWrap, browseBoxWrap.
	 *
	 * If $wrapArr['showResultsNumbersWrap'] is set, the formatting string is expected to hold template markers (###FROM###, ###TO###, ###OUT_OF###, ###FROM_TO###, ###CURRENT_PAGE###, ###TOTAL_PAGES###)
	 * otherwise the formatting string is expected to hold sprintf-markers (%s) for from, to, outof (in that sequence)
	 *
	 * @param	integer		determines how the results of the pagerowser will be shown. See description below
	 * @param	string		Attributes for the table tag which is wrapped around the table cells containing the browse links
	 * @param	array		Array with elements to overwrite the default $wrapper-array.
	 * @param	string		varname for the pointer.
	 * @param	boolean		enable htmlspecialchars() for the pi_getLL function (set this to FALSE if you want f.e use images instead of text for links like 'previous' and 'next').
	 * @return	string		Output HTML-Table, wrapped in <div>-tags with a class attribute (if $wrapArr is not passed,
	 */
	function pi_list_browseresults($showResultCount=1, $tableParams='', $wrapArr=array(), $pointerName='pointer', $hscText=TRUE)	{

		// example $wrapArr-array how it could be traversed from an extension
		/* $wrapArr = array(
			'browseBoxWrap' => '<div class="browseBoxWrap">|</div>',
			'showResultsWrap' => '<div class="showResultsWrap">|</div>',
			'browseLinksWrap' => '<div class="browseLinksWrap">|</div>',
			'showResultsNumbersWrap' => '<span class="showResultsNumbersWrap">|</span>',
			'disabledLinkWrap' => '<span class="disabledLinkWrap">|</span>',
			'inactiveLinkWrap' => '<span class="inactiveLinkWrap">|</span>',
			'activeLinkWrap' => '<span class="activeLinkWrap">|</span>'
		); */

			// Initializing variables:
		$pointer = intval($this->piVars[$pointerName]);
		$count = intval($this->internal['res_count']);
		$results_at_a_time = t3lib_div::intInRange($this->internal['results_at_a_time'],1,1000);
		$totalPages = ceil($count/$results_at_a_time);
		$maxPages = t3lib_div::intInRange($this->internal['maxPages'],1,100);
		$pi_isOnlyFields = $this->pi_isOnlyFields($this->pi_isOnlyFields);

			// $showResultCount determines how the results of the pagerowser will be shown.
			// If set to 0: only the result-browser will be shown
			//	 		 1: (default) the text "Displaying results..." and the result-browser will be shown.
			//	 		 2: only the text "Displaying results..." will be shown
		$showResultCount = intval($showResultCount);

			// if this is set, two links named "<< First" and "LAST >>" will be shown and point to the very first or last page.
		$showFirstLast = $this->internal['showFirstLast'];

			// if this has a value the "previous" button is always visible (will be forced if "showFirstLast" is set)
		$alwaysPrev = $showFirstLast?1:$this->pi_alwaysPrev;

		if (isset($this->internal['pagefloat'])) {
			if (strtoupper($this->internal['pagefloat']) == 'CENTER') {
				$pagefloat = ceil(($maxPages - 1)/2);
			} else {
				// pagefloat set as integer. 0 = left, value >= $this->internal['maxPages'] = right
				$pagefloat = t3lib_div::intInRange($this->internal['pagefloat'],-1,$maxPages-1);
			}
		} else {
			$pagefloat = -1; // pagefloat disabled
		}

			// default values for "traditional" wrapping with a table. Can be overwritten by vars from $wrapArr
		$wrapper['disabledLinkWrap'] = '<td nowrap="nowrap"><p>|</p></td>';
		$wrapper['inactiveLinkWrap'] = '<td nowrap="nowrap"><p>|</p></td>';
		$wrapper['activeLinkWrap'] = '<td'.$this->pi_classParam('browsebox-SCell').' nowrap="nowrap"><p>|</p></td>';
		$wrapper['browseLinksWrap'] = trim('<table '.$tableParams).'><tr>|</tr></table>';
		$wrapper['showResultsWrap'] = '<p>|</p>';
		$wrapper['browseBoxWrap'] = '
		<!--
			List browsing box:
		-->
		<div '.$this->pi_classParam('browsebox').'>
			|
		</div>';

			// now overwrite all entries in $wrapper which are also in $wrapArr
		$wrapper = array_merge($wrapper,$wrapArr);

		if ($showResultCount != 2) { //show pagebrowser
			if ($pagefloat > -1) {
				$lastPage = min($totalPages,max($pointer+1 + $pagefloat,$maxPages));
				$firstPage = max(0,$lastPage-$maxPages);
			} else {
				$firstPage = 0;
				$lastPage = t3lib_div::intInRange($totalPages,1,$maxPages);
			}
			$links=array();

				// Make browse-table/links:
			if ($showFirstLast) { // Link to first page
				if ($pointer>0)	{
					$links[]=$this->cObj->wrap($this->pi_linkTP_keepPIvars($this->pi_getLL('pi_list_browseresults_first','<< First',$hscText),array($pointerName => null),$pi_isOnlyFields),$wrapper['inactiveLinkWrap']);
				} else {
					$links[]=$this->cObj->wrap($this->pi_getLL('pi_list_browseresults_first','<< First',$hscText),$wrapper['disabledLinkWrap']);
				}
			}
			if ($alwaysPrev>=0)	{ // Link to previous page
				if ($pointer>0)	{
					$links[]=$this->cObj->wrap($this->pi_linkTP_keepPIvars($this->pi_getLL('pi_list_browseresults_prev','< Previous',$hscText),array($pointerName => ($pointer-1?$pointer-1:'')),$pi_isOnlyFields),$wrapper['inactiveLinkWrap']);
				} elseif ($alwaysPrev)	{
					$links[]=$this->cObj->wrap($this->pi_getLL('pi_list_browseresults_prev','< Previous',$hscText),$wrapper['disabledLinkWrap']);
				}
			}
			for($a=$firstPage;$a<$lastPage;$a++)	{ // Links to pages
				if ($this->internal['showRange']) {
					$pageText = (($a*$results_at_a_time)+1).'-'.min($count,(($a+1)*$results_at_a_time));
				} else {
					$pageText = trim($this->pi_getLL('pi_list_browseresults_page','Page',$hscText).' '.($a+1));
				}
				if ($pointer == $a) { // current page
					if ($this->internal['dontLinkActivePage']) {
						$links[] = $this->cObj->wrap($pageText,$wrapper['activeLinkWrap']);
					} else {
						$links[] = $this->cObj->wrap($this->pi_linkTP_keepPIvars($pageText,array($pointerName  => ($a?$a:'')),$pi_isOnlyFields),$wrapper['activeLinkWrap']);
					}
				} else {
					$links[] = $this->cObj->wrap($this->pi_linkTP_keepPIvars($pageText,array($pointerName => ($a?$a:'')),$pi_isOnlyFields),$wrapper['inactiveLinkWrap']);
				}
			}
			if ($pointer<$totalPages-1 || $showFirstLast)	{
				if ($pointer>=$totalPages-1) { // Link to next page
					$links[]=$this->cObj->wrap($this->pi_getLL('pi_list_browseresults_next','Next >',$hscText),$wrapper['disabledLinkWrap']);
				} else {
					$links[]=$this->cObj->wrap($this->pi_linkTP_keepPIvars($this->pi_getLL('pi_list_browseresults_next','Next >',$hscText),array($pointerName => $pointer+1),$pi_isOnlyFields),$wrapper['inactiveLinkWrap']);
				}
			}
			if ($showFirstLast) { // Link to last page
				if ($pointer<$totalPages-1) {
					$links[]=$this->cObj->wrap($this->pi_linkTP_keepPIvars($this->pi_getLL('pi_list_browseresults_last','Last >>',$hscText),array($pointerName => $totalPages-1),$pi_isOnlyFields),$wrapper['inactiveLinkWrap']);
				} else {
					$links[]=$this->cObj->wrap($this->pi_getLL('pi_list_browseresults_last','Last >>',$hscText),$wrapper['disabledLinkWrap']);
				}
			}
			$theLinks = $this->cObj->wrap(implode(chr(10),$links),$wrapper['browseLinksWrap']);
		} else {
			$theLinks = '';
		}

		$pR1 = $pointer*$results_at_a_time+1;
		$pR2 = $pointer*$results_at_a_time+$results_at_a_time;

		if ($showResultCount) {
			if ($wrapper['showResultsNumbersWrap']) {
				// this will render the resultcount in a more flexible way using markers (new in TYPO3 3.8.0).
				// the formatting string is expected to hold template markers (see function header). Example: 'Displaying results ###FROM### to ###TO### out of ###OUT_OF###'

				$markerArray['###FROM###'] = $this->cObj->wrap($this->internal['res_count'] > 0 ? $pR1 : 0,$wrapper['showResultsNumbersWrap']);
				$markerArray['###TO###'] = $this->cObj->wrap(min($this->internal['res_count'],$pR2),$wrapper['showResultsNumbersWrap']);
				$markerArray['###OUT_OF###'] = $this->cObj->wrap($this->internal['res_count'],$wrapper['showResultsNumbersWrap']);
				$markerArray['###FROM_TO###'] = $this->cObj->wrap(($this->internal['res_count'] > 0 ? $pR1 : 0).' '.$this->pi_getLL('pi_list_browseresults_to','to').' '.min($this->internal['res_count'],$pR2),$wrapper['showResultsNumbersWrap']);
				$markerArray['###CURRENT_PAGE###'] = $this->cObj->wrap($pointer+1,$wrapper['showResultsNumbersWrap']);
				$markerArray['###TOTAL_PAGES###'] = $this->cObj->wrap($totalPages,$wrapper['showResultsNumbersWrap']);
				// substitute markers
				$resultCountMsg = $this->cObj->substituteMarkerArray($this->pi_getLL('pi_list_browseresults_displays','Displaying results ###FROM### to ###TO### out of ###OUT_OF###'),$markerArray);
			} else {
				// render the resultcount in the "traditional" way using sprintf
				$resultCountMsg = sprintf(
					str_replace('###SPAN_BEGIN###','<span'.$this->pi_classParam('browsebox-strong').'>',$this->pi_getLL('pi_list_browseresults_displays','Displaying results ###SPAN_BEGIN###%s to %s</span> out of ###SPAN_BEGIN###%s</span>')),
					$count > 0 ? $pR1 : 0,
					min($count,$pR2),
					$count);
			}
			$resultCountMsg = $this->cObj->wrap($resultCountMsg,$wrapper['showResultsWrap']);
		} else {
			$resultCountMsg = '';
		}

		$sTables = $this->cObj->wrap($resultCountMsg.$theLinks,$wrapper['browseBoxWrap']);

		return $sTables;
	}	

	

	
	
	/**
	 * Takes the array with resultrows as input and returns the result-HTML-code
	 * Takes the "group" var into account: Makes a "section" or "flat" display.
	 *
	 * @param	array		Result rows
	 * @param	integer		Pointer to which indexing configuration you want to search in. -1 means no filtering. 0 means only regular indexed content.
	 * @return	string		HTML
	 */
	function compileResult($resultRows, $freeIndexUid=-1)	{
		$resultsWrap = explode('|',$this->conf['resultsWrap']);
		$content = '';

			// Transfer result rows to new variable, performing some mapping of sub-results etc.
		$newResultRows = array();
		foreach ($resultRows as $row)	{
			$id = md5($row['phash_grouping']);
			if (is_array($newResultRows[$id]))	{
				if (!$newResultRows[$id]['show_resume'] && $row['show_resume'])	{	// swapping:

						// Remove old
					$subrows = $newResultRows[$id]['_sub'];
					unset($newResultRows[$id]['_sub']);
					$subrows[] = $newResultRows[$id];

						// Insert new:
					$newResultRows[$id] = $row;
					$newResultRows[$id]['_sub'] = $subrows;
				} else $newResultRows[$id]['_sub'][] = $row;
			} else {
				$newResultRows[$id] = $row;
			}
		}
		$resultRows = $newResultRows;
		$this->resultSections = array();

		if ($freeIndexUid<=0)	{
			switch($this->piVars['group'])	{
				case 'sections':

					$rl2flag = substr($this->piVars['sections'],0,2)=='rl';
					$sections = array();
					foreach ($resultRows as $row)	{
						$id = $row['rl0'].'-'.$row['rl1'].($rl2flag?'-'.$row['rl2']:'');
						$sections[$id][] = $row;
					}

					$this->resultSections = array();

					foreach ($sections as $id => $resultRows)	{
						$rlParts = explode('-',$id);
						$theId = $rlParts[2] ? $rlParts[2] : ($rlParts[1]?$rlParts[1]:$rlParts[0]);
						$theRLid = $rlParts[2] ? 'rl2_'.$rlParts[2]:($rlParts[1]?'rl1_'.$rlParts[1]:'0');

						$sectionName = $this->getPathFromPageId($theId);
						if ($sectionName{0} == '/') $sectionName = substr($sectionName,1);

						if (!trim($sectionName))	{
							$sectionTitleLinked = $this->pi_getLL('unnamedSection','',1).':';
						} else {
							$onclick = 'document.'.$this->prefixId.'[\''.$this->prefixId.'[_sections]\'].value=\''.$theRLid.'\';document.'.$this->prefixId.'.submit();return false;';
							$sectionTitleLinked = '<a href="#" onclick="'.htmlspecialchars($onclick).'">'.htmlspecialchars($sectionName).':</a>';
						}
						$this->resultSections[$id] = array($sectionName,count($resultRows));

							// Add content header:
						$content.= $this->makeSectionHeader($id,$sectionTitleLinked,count($resultRows));

							// Render result rows:
						foreach ($resultRows as $row)	{
							$content.= $this->printResultRow($row);
						}
					}
				break;
				default:	// flat:
					foreach ($resultRows as $row)	{
						$content.= $this->printResultRow($row);
					}
				break;
			}
		} else {
			foreach ($resultRows as $row)	{
				$content.= $this->printResultRow($row);
			}
		}

		return $resultsWrap[0].$content.$resultsWrap[1];
	}	
	
		

	/**
	 * Marks up the search words from $this->sWarr in the $str with a color.
	 *
	 * @param	string		Text in which to find and mark up search words. This text is assumed to be UTF-8 like the search words internally is.
	 * @return	string		Processed content.
	 */
	function markupSWpartsOfString($str)	{
		$searchWordWrap = explode('|',$this->conf['searchWordWrap']);
			// Init:
		$str = str_replace('&nbsp;',' ',t3lib_parsehtml::bidir_htmlspecialchars($str,-1));
		$str = preg_replace('/\s\s+/',' ',$str);
		$swForReg = array();

			// Prepare search words for regex:
		foreach ($this->sWArr as $d)	{
			$swForReg[] = preg_quote($d['sword'],'/');
		}
		$regExString = '('.implode('|',$swForReg).')';

			// Split and combine:
		$parts = preg_split('/'.$regExString.'/i', ' '.$str.' ', 20000, PREG_SPLIT_DELIM_CAPTURE);
// debug($parts,$regExString);
			// Constants:
		$summaryMax = 300;
		$postPreLgd = 60;
		$postPreLgd_offset = 5;
		$divider = ' ... ';

		$occurencies = (count($parts)-1)/2;
		if ($occurencies)	{
			$postPreLgd = t3lib_div::intInRange($summaryMax/$occurencies,$postPreLgd,$summaryMax/2);
		}

			// Variable:
		$summaryLgd = 0;
		$output = array();

			// Shorten in-between strings:
		foreach ($parts as $k => $strP)	{
			if (($k%2)==0)	{

					// Find length of the summary part:
				$strLen = $GLOBALS['TSFE']->csConvObj->strlen('utf-8', $parts[$k]);
				$output[$k] = $parts[$k];

					// Possibly shorten string:
				if (!$k)	{	// First entry at all (only cropped on the frontside)
					if ($strLen > $postPreLgd)	{
						$output[$k] = $divider.ereg_replace('^[^[:space:]]+[[:space:]]','',$GLOBALS['TSFE']->csConvObj->crop('utf-8',$parts[$k],-($postPreLgd-$postPreLgd_offset)));
					}
				} elseif ($summaryLgd > $summaryMax || !isset($parts[$k+1])) {	// In case summary length is exceed OR if there are no more entries at all:
					if ($strLen > $postPreLgd)	{
						$output[$k] = ereg_replace('[[:space:]][^[:space:]]+$','',$GLOBALS['TSFE']->csConvObj->crop('utf-8',$parts[$k],$postPreLgd-$postPreLgd_offset)).$divider;
					}
				} else {	// In-between search words:
					if ($strLen > $postPreLgd*2)	{
						$output[$k] = ereg_replace('[[:space:]][^[:space:]]+$','',$GLOBALS['TSFE']->csConvObj->crop('utf-8',$parts[$k],$postPreLgd-$postPreLgd_offset)).
										$divider.
										ereg_replace('^[^[:space:]]+[[:space:]]','',$GLOBALS['TSFE']->csConvObj->crop('utf-8',$parts[$k],-($postPreLgd-$postPreLgd_offset)));
					}
				}
				$summaryLgd+= $GLOBALS['TSFE']->csConvObj->strlen('utf-8', $output[$k]);;

					// Protect output:
				$output[$k] = htmlspecialchars($output[$k]);

					// If summary lgd is exceed, break the process:
				if ($summaryLgd > $summaryMax)	{
					break;
				}
			} else {
				$summaryLgd+= $GLOBALS['TSFE']->csConvObj->strlen('utf-8',$strP);
				$output[$k] = $searchWordWrap[0].htmlspecialchars($parts[$k]).$searchWordWrap[1];
			}
		}

			// Return result:
		return implode('',$output);
	}		

}
?>
