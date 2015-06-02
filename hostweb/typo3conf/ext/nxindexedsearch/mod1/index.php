<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Stefan Braune <stefan.braune@netlogix.de>
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
 * Module 'Search Statistics' for the 'nxtest' extension.
 *
 * @author    Stefan Braune <stefan.braune@netlogix.de>
 */



    // DEFAULT initialization of a module [BEGIN]
unset($MCONF);
require ("conf.php");
require ($BACK_PATH."init.php");
require ($BACK_PATH."template.php");
$LANG->includeLLFile("EXT:nxindexedsearch/mod1/locallang.xml");
require_once (PATH_t3lib."class.t3lib_scbase.php");
$BE_USER->modAccess($MCONF,1);    // This checks permissions and exits if the users has no permission for entry.
    // DEFAULT initialization of a module [END]

require_once(t3lib_extMgm::extPath('nxtemplate') . '/class.tx_nxtemplate.php');

require_once(t3lib_extMgm::extPath('nxindexedsearch') . '/class.tx_nxindexedsearch_util.php');

class tx_nxindexedsearch_module1 extends t3lib_SCbase {
    var $pageinfo;
    
    /**
     * The template object.
     * 
     * @var tx_nxview
     */
    var $templateObj;
    
    /**
     * The template code.
     *
     * @var string
     */
    var $templateCode;

    /**
     * Initializes the Module
     * @return    void
     */
    function init()    {
        global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

        parent::init();
        
        $this->templateObj = new tx_nxtemplate();

        /*
        if (t3lib_div::_GP("clear_all_cache"))    {
            $this->include_once[]=PATH_t3lib."class.t3lib_tcemain.php";
        }
        */
    }

    /**
     * Main function of the module. Write the content to $this->content
     * If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
     *
     * @return    [type]        ...
     */
    function main()    {
        global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

        // Access check!
        // The page will show only if there is a valid page and if this page may be viewed by the user
        $this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
        $access = is_array($this->pageinfo) ? 1 : 0;

        if (($this->id && $access) || ($BE_USER->user["admin"] && !$this->id))    {

                // Draw the header.
            $this->doc = t3lib_div::makeInstance("mediumDoc");
            $this->doc->backPath = $BACK_PATH;
            $this->doc->form='<form action="" method="POST">';

                // JavaScript
            $this->doc->JScode = '
                <script language="javascript" type="text/javascript">
                    script_ended = 0;
                    function jumpToUrl(URL)    {
                        document.location = URL;
                    }
                </script>
            ';
            $this->doc->postCode='
                <script language="javascript" type="text/javascript">
                    script_ended = 1;
                    if (top.fsMod) top.fsMod.recentIds["web"] = 0;
                </script>
            ';

            $headerSection = $this->doc->getHeader("pages",$this->pageinfo,$this->pageinfo["_thePath"])."<br />".$LANG->sL("LLL:EXT:lang/locallang_core.xml:labels.path").": ".t3lib_div::fixed_lgd_pre($this->pageinfo["_thePath"],50);

            $this->content.=$this->doc->startPage($LANG->getLL("title"));
            $this->content.=$this->doc->header($LANG->getLL("title"));
            $this->content.=$this->doc->spacer(5);
            $this->content.=$this->doc->section("",$this->doc->funcMenu($headerSection,t3lib_BEfunc::getFuncMenu($this->id,"SET[function]",$this->MOD_SETTINGS["function"],$this->MOD_MENU["function"])));
            $this->content.=$this->doc->divider(5);


            // Render content:
            $this->content.= $this->renderContent();


            // ShortCut
            if ($BE_USER->mayMakeShortcut())    {
                $this->content.=$this->doc->spacer(20).$this->doc->section("",$this->doc->makeShortcutIcon("id",implode(",",array_keys($this->MOD_MENU)),$this->MCONF["name"]));
            }

            $this->content.=$this->doc->spacer(10);
        } else {
                // If no access or if ID == zero

            $this->doc = t3lib_div::makeInstance("mediumDoc");
            $this->doc->backPath = $BACK_PATH;

            $this->content.=$this->doc->startPage($LANG->getLL("title"));
            $this->content.=$this->doc->header($LANG->getLL("title"));
            $this->content.=$this->doc->spacer(5);
            $this->content.=$this->doc->spacer(10);
        }
    }
    
    function renderContent() {
    	global $LANG;
    	
    	$this->templateCode = $this->templateObj->fromResource('statistics.tmpl');
    	$markerArray = array(
    		'###LL_DATASOURCE###'      => $LANG->getLL('datasource'),
    		'###LL_ALL###'             => $LANG->getLL('all'),
    		'###LL_PERIOD###'          => $LANG->getLL('period'),
    		'###LL_SHOW_STATISTICS###' => $LANG->getLL('show_statistics')
    	);
    	
    	$content = '';
    	
    	$dataSources = tx_nxindexedsearch_util::getKnownDataSources();
    	
    	$selectedSourceUid = t3lib_div::_POST('source_uid');
    	$selectedPeriod    = t3lib_div::_POST('period');
    	
    	$content = $this->templateObj->getSubpart('###STATISTICS_FORM###', $this->templateCode);
    	$optionCode = $this->templateObj->getSubpart('###DATASOURCE_OPTION###', $this->templateCode);
    	$datasourceOptions = '';
    	foreach ($dataSources as $sourceUid => $sourceData) {
    		$datasourceOptions .= $this->templateObj->substituteMarkerArray(array(
    			'###DATASOURCE_UID###'      => $sourceUid,
    			'###DATASOURCE_SELECTED###' => $selectedSourceUid == $sourceUid ? 'selected="selected"' : '',
    			'###DATASOURCE_NAME###'     => $sourceData->dataSourceKey,
    			'###DATASOURCE_CATEGORY###' => $sourceData->indexCategory,
    			'###DATASOURCE_PAGE###'     => $sourceData->pageId
    		), $optionCode);
    	}
    	
    	$markerArray['###DATASOURCE_OPTIONS###'] = $datasourceOptions;
    	
    	$optionCode = $this->templateObj->getSubpart('###PERIOD_OPTION###', $this->templateCode);
    	$periodOptions = '';
    	$periods = array(
    		'total_statistics',
    		'today', 'yesterday', 'today_yesterday', 'last_7_days', 'last_30_days', 'this_year', 
    		'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'
    	);
    	foreach ($periods as $period) {
    		$periodOptions .= $this->templateObj->substituteMarkerArray(array(
    			'###PERIOD_KEY###'      => $period,
    			'###PERIOD_SELECTED###' => $selectedPeriod == $period ? 'selected="selected"' : '',
    			'###PERIOD_TEXT###'     => $LANG->getLL($period)
    		), $optionCode);
    	}
    	$markerArray['###PERIOD_OPTIONS###'] = $periodOptions;
    	
    	if (intval($selectedSourceUid) >= 0) {
    		switch ($selectedPeriod) {
    			case 'today':
			    	// Today
			    	$content .= $this->getStatisticsBetween($LANG->getLL('today'),
			    		mktime(0, 0, 0, date("m"), date("d"), date("Y")), time(), intval($selectedSourceUid), 0);
			    	break;
    			case 'yesterday':
    				// Yesterday
			    	$content .= $this->getStatisticsBetween($LANG->getLL('yesterday'),
			    		mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")), mktime(0, 0, 0, date("m"), date("d"), date("Y")), intval($selectedSourceUid), 0);
			    	break;
    			case 'today_yesterday':
				    // Today + Yesterday
				    $content .= $this->getStatisticsBetween($LANG->getLL('today_yesterday'),
				    	mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")), time(), intval($selectedSourceUid), 0);
				    break;
    			case 'last_7_days':
			    	// Last 7 Days
			    	$content .= $this->getStatisticsBetween($LANG->getLL('last_7_days'),
			    		mktime(0, 0, 0, date("m"), date("d") - 7, date("Y")), time(), intval($selectedSourceUid), 0);
			    	break;
    			case 'last_30_days':
			    	// Last 30 Days
			    	$content .= $this->getStatisticsBetween($LANG->getLL('last_30_days'),
			    		mktime(0, 0, 0, date("m"), date("d") - 30, date("Y")), time(), intval($selectedSourceUid), 0);
			    	break;
    			case 'this_year':
			    	// This Year
			    	$content .= $this->getStatisticsBetween($LANG->getLL('this_year'),
			    		mktime(0, 0, 0, 1, 1, date("Y")), time(), intval($selectedSourceUid), 0);
			    	break;
    			case 'january':
    				// Januar
    				$content .= $this->getStatisticsBetween($LANG->getLL('january'),
    					mktime(0, 0, 0, 1, 1, date("Y")), mktime(0, 0, 0, 2, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'february':
    				// February
    				$content .= $this->getStatisticsBetween($LANG->getLL('february'),
    					mktime(0, 0, 0, 2, 1, date("Y")), mktime(0, 0, 0, 3, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'march':
    				// March
    				$content .= $this->getStatisticsBetween($LANG->getLL('march'),
    					mktime(0, 0, 0, 3, 1, date("Y")), mktime(0, 0, 0, 4, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'april':
    				// April
    				$content .= $this->getStatisticsBetween($LANG->getLL('april'),
    					mktime(0, 0, 0, 4, 1, date("Y")), mktime(0, 0, 0, 5, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'may':
    				// May
    				$content .= $this->getStatisticsBetween($LANG->getLL('may'),
    					mktime(0, 0, 0, 5, 1, date("Y")), mktime(0, 0, 0, 6, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'june':
    				// June
    				$content .= $this->getStatisticsBetween($LANG->getLL('june'),
    					mktime(0, 0, 0, 6, 1, date("Y")), mktime(0, 0, 0, 7, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'july':
    				// July
    				$content .= $this->getStatisticsBetween($LANG->getLL('july'),
    					mktime(0, 0, 0, 7, 1, date("Y")), mktime(0, 0, 0, 8, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'august':
    				// August
    				$content .= $this->getStatisticsBetween($LANG->getLL('august'),
    					mktime(0, 0, 0, 8, 1, date("Y")), mktime(0, 0, 0, 9, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'september':
    				// September
    				$content .= $this->getStatisticsBetween($LANG->getLL('september'),
    					mktime(0, 0, 0, 9, 1, date("Y")), mktime(0, 0, 0, 10, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'october':
    				// October
    				$content .= $this->getStatisticsBetween($LANG->getLL('october'),
    					mktime(0, 0, 0, 10, 1, date("Y")), mktime(0, 0, 0, 11, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'november':
    				// November
    				$content .= $this->getStatisticsBetween($LANG->getLL('november'),
    					mktime(0, 0, 0, 11, 1, date("Y")), mktime(0, 0, 0, 12, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'december':
    				// December
    				$content .= $this->getStatisticsBetween($LANG->getLL('december'),
    					mktime(0, 0, 0, 12, 1, date("Y")), mktime(0, 0, 0, 13, 0, date("Y")), intval($selectedSourceUid), 0);
    				break;
    			case 'total_statistics':
    			default:
		    		// Total Statistics
			    	$content .= $this->getStatisticsBetween($LANG->getLL('total_statistics'),
			    		0, time(), intval($selectedSourceUid), 0);
    				break;
    		}
    	}
    	
    	return $this->templateObj->substituteMarkerArray($markerArray, $content);
    }
    
    function getStatisticsBetween($title, $startTimestamp, $endTimestamp, $sourceId, $minResults, $limit = 100) {
    	global $LANG;
    	
    	$templateCode = $this->templateObj->getSubpart('###STATISTICS###', $this->templateCode);
    	
    	$markerArray = array(
    		'###TITLE###'      => $title,
    		'###LL_TERM###'    => $LANG->getLL('term'),
    		'###LL_QUERIES###' => $LANG->getLL('queries'),
    		'###LL_RESULTS###' => $LANG->getLL('results')
    	);
    	
    	$rowCode = $this->templateObj->getSubpart('###STATISTICS_ROW###', $this->templateCode);
    	$statisticsRows = '';
    	$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('searchstring, COUNT(uid) count, SUM(results) / COUNT(uid) as results', 'tx_nxindexedsearch_stats',
    		'tstamp >= \'' . $startTimestamp . '\' AND tstamp <= \'' . $endTimestamp . '\' AND ' . ($sourceId == 0 ? '1' : 'source_uid = \'' . $sourceId . '\''),
    		'searchstring', 'COUNT(uid) DESC');
    	while (($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
    		if ($limit == 0) {
    			break;
    		}
    		
    		if ($row['results'] < $minResults) {
    			continue;
    		}
    		
    		$statisticsRows .= $this->templateObj->substituteMarkerArray(array(
    			'###TERM###'            => $row['searchstring'],
    			'###QUERIES###'         => $row['count'],
    			'###RESULTS_AVERAGE###' => round($row['results'], 1)
    		), $rowCode);
	    	
	    	$limit --;
    	}
    	
    	$markerArray['###STATISTICS_ROWS###'] = $statisticsRows;
    	return $this->templateObj->substituteMarkerArray($markerArray, $templateCode);
    }

    /**
     * Prints out the module HTML
     *
     * @return    void
     */
    function printContent() {
        $this->content.=$this->doc->endPage();
        echo $this->content;
    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/mod1/index.php'])    {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/mod1/index.php']);
}

// Make instance:
$SOBE = t3lib_div::makeInstance('tx_nxindexedsearch_module1');
$SOBE->init();

// Include files?
foreach($SOBE->include_once as $INC_FILE)
	include_once($INC_FILE);

$SOBE->main();
$SOBE->printContent();
?>