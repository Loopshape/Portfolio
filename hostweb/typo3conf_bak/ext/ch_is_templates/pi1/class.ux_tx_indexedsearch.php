<?php

class ux_tx_indexedsearch extends tx_indexedsearch {

    /**
     * Main function, called from TypoScript as a USER_INT object.
     *
     * @param	string		Content input, ignore (just put blank string)
     * @param	array		TypoScript configuration of the plugin!
     * @return	string		HTML code for the search form / result display.
     */
    function main($content, $conf)    {
        // Initialize:
        $this->conf = $conf;
        $this->pi_loadLL();
        $this->pi_setPiVarDefaults();
        $this->prefixId = 'tx_indexedsearch';

        // Initialize the indexer-class - just to use a few function (for making hashes)
        $this->indexerObj = t3lib_div::makeInstance('tx_indexedsearch_indexer');

        // Initialize:
        $this->initialize();

        # Init Template    
        $this->templateCode = $this->cObj->fileResource($this->conf["templateFile"]);
        $template = array();

        # Get the parts out of the template for viewing
        $template["total"] = $this->cObj->getSubpart($this->templateCode,"###MAIN###");        
        
        // Do search:
        // If there were any search words entered...
        if (is_array($this->sWArr))	{
                $content = $this->doSearch($this->sWArr);
        }

        // Finally compile all the content, form, messages and results:
        $markerArray['###SEARCHFORM###'] = $this->makeSearchForm($this->optValues);        
        $markerArray['###SEARCHFORM###'] = $this->cObj->substituteMarker($markerArray['###SEARCHFORM###'],'###PREFIXID###',$this->prefixId);
        $markerArray['###RULES###'] = $this->printRules();
        $markerArray['###HITS###'] = $content;
        
        # Create the whole table
        $content = $this->cObj->substituteMarkerArrayCached($template["total"],$markerArray);
        
        return $this->pi_wrapInBaseClass($content);
    }



    /**
     * Returns a results browser
     *
     * @param	boolean		Show result count
     * @param	string		String appended to "displaying results..." notice.
     * @param	string		String appended after section "displaying results..."
     * @return	string		HTML output
     */
    function pi_list_browseresults($showResultCount=1,$addString='',$addPart='') {
    
        # Init Template    
        $this->templateCode = $this->cObj->fileResource($this->conf["templateFile"]);
        $template = array();

        # Get the parts out of the template for viewing
        $template["total"] = $this->cObj->getSubpart($this->templateCode,"###PAGEBROWSER###");        
        $template["item"] = $this->cObj->getSubpart($template["total"],"###LIST_ITEM###");        

        // Initializing variables:
        $pointer=$this->piVars['pointer'];
        $count=$this->internal['res_count'];
        $results_at_a_time = t3lib_div::intInRange($this->internal['results_at_a_time'],1,1000);
        $maxPages = t3lib_div::intInRange($this->internal['maxPages'],1,100);
        $max = t3lib_div::intInRange(ceil($count/$results_at_a_time),1,$maxPages);
        $pointer=intval($pointer);
        $links=array();

        $markerArray['###PBSTYLE###'] = $this->pi_classParam('browsebox');
        
        // Make browse-table/links:
        if ($pointer>0)	{        
            $markerArray['###PREVIOUS###'] = $this->makePointerSelector_link($this->pi_getLL('pi_list_browseresults_prev','< Previous',1),$pointer-1,-1);            
        } else {
            $markerArray['###PREVIOUS###'] = '';
        }
        
        $content_item = '';
        for($a=0;$a<$max;$a++)	{
            if ($pointer+$a <= ceil($count/$results_at_a_time)-1) {
                $markerArray['###LISTSTYLE###'] = $pointer==$a?$this->pi_classParam('browsebox-SCell'):'';
                $markerArray['###MIDDLE###'] = $this->makePointerSelector_link(trim($this->pi_getLL('pi_list_browseresults_page','Page',1).' '.($pointer+$a+1)),$pointer+$a,-1);
                $content_item .= $this->cObj->substituteMarkerArrayCached($template["item"],$markerArray);        
            }
        }
        
        if ($pointer<ceil($count/$results_at_a_time)-1)	{
            $markerArray['###NEXT###'] = $this->makePointerSelector_link($this->pi_getLL('pi_list_browseresults_next','Next >',1),$pointer+1,-1);
        } else {
            $markerArray['###NEXT###'] = '';
        }

        $pR1 = $pointer*$results_at_a_time+1;
        $pR2 = $pointer*$results_at_a_time+$results_at_a_time;

        if ($showResultCount) {
            $markerArray['###SHOWRESULTCOUNT###'] =  sprintf(
                                                            str_replace('###SPAN_BEGIN###',
                                                                        '<span'.$this->pi_classParam('browsebox-strong').'>',
                                                                        $this->pi_getLL('pi_list_browseresults_displays','Displaying results ###SPAN_BEGIN###%s to %s</span> out of ###SPAN_BEGIN###%s</span>')
                                                                        ),
                                                            $pR1,
                                                            min(array($this->internal['res_count'],$pR2)),
                                                            $this->internal['res_count']
                                                            ).$addString.$addPart;
        } else {        
            $markerArray['###SHOWRESULTCOUNT###'] = '';
        }
        $subpartArray = array();
        $subpartArray['###CONTENT###'] = $content_item;
        $content = $this->cObj->substituteMarkerArrayCached($template["total"],$markerArray, $subpartArray);
        return $content;
    }



    /**
     * Make search form HTML
     *
     * @param	array		Value/Labels pairs for search form selector boxes.
     * @return	string		Search form HTML
     */
    function makeSearchForm($optValues)	{
    
        # Init Template    
        $this->templateCode = $this->cObj->fileResource($this->conf["templateFile"]);

        $template = array();

        # Get the parts out of the template for viewing
        $template["total"] = $this->cObj->getSubpart($this->templateCode,"###DEFAULTSEARCH###");

        $markerArray['###SEARCHBOXSTYLE###'] = $this->pi_classParam('searchbox');
        $markerArray['###FORM###'] = htmlspecialchars($this->pi_getPageLink($GLOBALS['TSFE']->id,$GLOBALS['TSFE']->sPre));
        $markerArray['###TPARAMS###'] = $this->conf['tableParams.']['searchBox'];
        $markerArray['###LSEARCHFOR###'] = $this->pi_getLL('form_searchFor','',1);
        
        if (!$this->conf['show.']['clearSearchBox']) {
            $markerArray['###SWORD###'] = htmlspecialchars($this->piVars['sword']);
            $markerArray['###SWORDSTYLE###'] = $this->pi_classParam('searchbox-sword');
        } else {
            $markerArray['###SWORD###'] = '';
            $markerArray['###SWORDSTYLE###'] = $this->pi_classParam('searchbox-sword');            
        }
        
        $markerArray['###LSUBMIT###'] = $this->pi_getLL('submit_button_label','',1);
        $markerArray['###SWPCHECKED###'] = $this->piVars['sword_prev_include']?' checked="checked"':'';
        $markerArray['###SUBMITSTYLE###'] = $this->pi_classParam('searchbox-button');

        $markerArray['###SWORD_PREV###'] = htmlspecialchars($this->piVars['sword']);
        $markerArray['###LADDTOCURRENTSEARCH###'] = $this->pi_getLL('makerating_addToCurrentSearch');
    
        // Extended search options:
        if ($this->piVars['ext']) {
            if (is_array($optValues['type']) || is_array($optValues['defOp'])) {        
                $markerArray['###LFORMMATCH###'] = $this->pi_getLL('form_match','',1);
                $markerArray['###TYPE###'] = $this->renderSelectBox($this->prefixId.'[type]',$this->piVars['type'],$optValues['type']);
                $markerArray['###DEFOP###'] = $this->renderSelectBox($this->prefixId.'[defOp]',$this->piVars['defOp'],$optValues['defOp']);
            } else {
                # Remove
                $template["total"] = $this->cObj->substituteSubpart($template["total"], '###MATCH###', '');
            }            
            if (is_array($optValues['media']) || is_array($optValues['lang'])) {    
                $markerArray['###LSEARCHIN###'] = $this->pi_getLL('form_searchIn','',1);
                $markerArray['###MEDIA###'] = $this->renderSelectBox($this->prefixId.'[media]',$this->piVars['media'],$optValues['media']);
                $markerArray['###LANG###'] = $this->renderSelectBox($this->prefixId.'[lang]',$this->piVars['lang'],$optValues['lang']);
            } else {
                # Remove
                $template["total"] = $this->cObj->substituteSubpart($template["total"], '###SEARCHIN###', '');
            }
            if (is_array($optValues['sections'])) {
                $markerArray['###LFROMSECTION###'] = $this->pi_getLL('form_fromSection','',1);
                $markerArray['###SECTION###'] = $this->renderSelectBox($this->prefixId.'[sections]',$this->piVars['sections'],$optValues['sections']);
            } else {
                # Remove
                $template["total"] = $this->cObj->substituteSubpart($template["total"], '###FROMSECTION###', '');
            }
            if (is_array($optValues['order']) || is_array($optValues['desc']) || is_array($optValues['results'])) {
                $markerArray['###LORDERBY###'] = $this->pi_getLL('form_orderBy','',1);
                $markerArray['###ORDER###'] = $this->renderSelectBox($this->prefixId.'[order]',$this->piVars['order'],$optValues['order']);
                $markerArray['###DESC###'] = $this->renderSelectBox($this->prefixId.'[desc]',$this->piVars['desc'],$optValues['desc']);
                $markerArray['###RESULTS###'] = $this->renderSelectBox($this->prefixId.'[results]',$this->piVars['results'],$optValues['results']).$this->pi_getLL('form_atATime','',1);
            } else {
                # Remove
                $template["total"] = $this->cObj->substituteSubpart($template["total"], '###ORDERBY###', '');
            }
            if (is_array($optValues['group']) || !$this->conf['blind.']['extResume']) {
                $markerArray['###LFORMSTYLE###'] = $this->pi_getLL('form_style','',1);
                $markerArray['###GROUP###'] = $this->renderSelectBox($this->prefixId.'[group]',$this->piVars['group'],$optValues['group']);
                if (!$this->conf['blind.']['extResume']) {
                    $markerArray['###EXTENDEDRESUME###'] = '&nbsp; &nbsp;<input type="hidden" name="'.$this->prefixId.'[extResume]" value="0" /><input type="checkbox" value="1" name="'.$this->prefixId.'[extResume]"'.($this->piVars['extResume']?' checked="checked"':'').' />'.$this->pi_getLL('form_extResume','',1);
                } else {
                    $markerArray['###EXTENDEDRESUME###'] = ''; 
                }
            } else {
                # Remove
                $template["total"] = $this->cObj->substituteSubpart($template["total"], '###STYLE###', '');
            }
        } else {
            $template["total"] = $this->cObj->substituteSubpart($template["total"], '###MATCH###', '');
            $template["total"] = $this->cObj->substituteSubpart($template["total"], '###SEARCHIN###', '');
            $template["total"] = $this->cObj->substituteSubpart($template["total"], '###FROMSECTION###', '');
            $template["total"] = $this->cObj->substituteSubpart($template["total"], '###ORDERBY###', '');
            $template["total"] = $this->cObj->substituteSubpart($template["total"], '###STYLE###', '');
        }
    
        if ($this->piVars['ext']) {
            $markerArray['###EXT###'] = '1';
            $markerArray['###ADVANCEDSEARCH###'] = '<a href="'.htmlspecialchars($this->pi_getPageLink($GLOBALS['TSFE']->id,$GLOBALS['TSFE']->sPre,array($this->prefixId.'[ext]'=>0))).'">'.$this->pi_getLL('link_regularSearch','',1).'</a>';
        } else {
            $markerArray['###EXT###'] = '0';
            $markerArray['###ADVANCEDSEARCH###'] = '<a href="'.htmlspecialchars($this->pi_getPageLink($GLOBALS['TSFE']->id,$GLOBALS['TSFE']->sPre,array($this->prefixId.'[ext]'=>1))).'">'.$this->pi_getLL('link_advancedSearch','',1).'</a>';
        }
        
        # Create the whole table
        $content = $this->cObj->substituteMarkerArrayCached($template["total"],$markerArray);
        
        return $content;
        
    }
        
        
    function makeHiddenForm() {
        $temp = '<form action="'.htmlspecialchars($this->pi_getPageLink($GLOBALS['TSFE']->id,$GLOBALS['TSFE']->sPre)).'" method="post" name="'.$this->prefixId.'">
                <input type="hidden" name="'.$this->prefixId.'[sword]" value="'.htmlspecialchars($this->piVars['sword']).'">
                <input type="hidden" name="'.$this->prefixId.'[_sections]" value="0" />
                <input type="hidden" name="'.$this->prefixId.'[pointer]" value="0" />
                </form>';
        return $temp;
    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.ux_tx_indexedsearch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.ux_tx_indexedsearch.php']);
}
?>