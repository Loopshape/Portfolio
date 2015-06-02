<?php

class tx_ch_gdr {
        
    var $pObj;		// Is set to a reference to the parent object, "pi1/class.indexedsearch.php"
        
    /**
     * Compiles the HTML display of the incoming array of result rows.
     *
     * @param	array		Search words array (for display of text describing what was searched for)
     * @param	array		Array with result rows, count, first row.
     * @return	string		HTML content to display result.
     */
    function getDisplayResults($sWArr, $resData)	{
       
        # Init Template    
        $this->templateCode = $this->pObj->cObj->fileResource($this->pObj->conf["templateFile"]);
        $template = array();

        # Get the parts out of the template for viewing
        $template["total"] = $this->pObj->cObj->getSubpart($this->templateCode,"###GETDISPLAYRESULTS###");                    
        
        // Perform display of result rows array:
        if ($resData)	{
            $GLOBALS['TT']->push('Display Final result');

            // Set first selected row (for calculation of ranking later)
            $this->pObj->firstRow = $this->firstRow = $resData['firstRow'];

            // Result display here:
            $rowcontent = '';
            $rowcontent.= $this->compileResult($resData['resultRows']);

            // Browsing box:
            if ($resData['count'])	{
                $this->pObj->internal['res_count'] = $resData['count'];
                $this->pObj->internal['results_at_a_time'] = $this->pObj->piVars['results'];
                $this->pObj->internal['maxPages'] = t3lib_div::intInRange($this->pObj->conf['search.']['page_links'],1,100,10);
                $addString = ($resData['count']&&$this->pObj->piVars['group']=='sections' ? ' '.sprintf($this->pObj->pi_getLL(count($this->pObj->resultSections)>1?'inNsections':'inNsection'),count($this->pObj->resultSections)):'');
                $browseBox1 = $this->pObj->pi_list_browseresults(1,$addString,$this->printResultSectionLinks());
                $browseBox2 = $this->pObj->pi_list_browseresults(0);
            }

            // Browsing nav, bottom.
            if ($resData['count'])	{
            
                $markerArray['###BROWSEBOX1###'] = $browseBox1;
                $markerArray['###HITS###'] = $rowcontent;        
                $markerArray['###BROWSEBOX2###'] = $browseBox2;               
                
                # Remove no results message
                $template["total"] = $this->pObj->cObj->substituteSubpart($template["total"], '###NORESULTS###', '');
                                
            } else {
        
                $markerArray['###BROWSEBOX1###'] = '';
                $markerArray['###HITS###'] = '';        
                $markerArray['###BROWSEBOX2###'] = ''; 
                
                $markerArray['###NORESULTSSTYLE###'] = $this->pObj->pi_classParam('noresults');
                $markerArray['###NORESULTS###'] = $this->pObj->pi_getLL('noResults','',1);
            }

            $GLOBALS['TT']->pull();
            
        } else {
                
            $markerArray['###BROWSEBOX1###'] = '';
            $markerArray['###HITS###'] = '';        
            $markerArray['###BROWSEBOX2###'] = ''; 
            
            $markerArray['###NORESULTSSTYLE###'] = $this->pObj->pi_classParam('noresults');
            $markerArray['###NORESULTS###'] = $this->pObj->pi_getLL('noResults','',1);      

        }

        // Print a message telling which words we searched for, and in which sections etc.        
        $markerArray['###WHATISSTYLE###'] = $this->pObj->pi_classParam('whatis');
        $markerArray['###WHATISSEARCHEDFOR###'] = $this->pObj->tellUsWhatIsSeachedFor($sWArr).(substr($this->pObj->piVars['sections'],0,2)=='rl'?' '.$this->pObj->pi_getLL('inSection','',1).' "'.substr($this->pObj->getPathFromPageId(substr($this->pObj->piVars['sections'],4)),1).'"':'');
         
        
        $what = $this->pObj->tellUsWhatIsSeachedFor($sWArr).(substr($this->pObj->piVars['sections'],0,2)=='rl'?' '.$this->pObj->pi_getLL('inSection','',1).' "'.substr($this->pObj->getPathFromPageId(substr($this->pObj->piVars['sections'],4)),1).'"':'');
        $what = '<div'.$this->pObj->pi_classParam('whatis').'><p>'.$what.'</p></div>';
    
                
        # Create the whole table
        $content = $this->pObj->cObj->substituteMarkerArrayCached($template["total"],$markerArray, array(), array());        
        
        return $content;
    }
        

    /**
     * Takes the array with resultrows as input and returns the result-HTML-code
     * Takes the "group" var into account: Makes a "section" or "flat" display.
     *
     * @param	array		Result rows
     * @return	string		HTML
     */
    function compileResult($resultRows)	{
        $content = '';

        // Transfer result rows to new variable, performing some mapping of sub-results etc.
        $newResultRows = array();
        foreach($resultRows as $row)	{
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


        switch($this->pObj->piVars['group'])	{
            case 'sections':
                $rl2flag = substr($this->pObj->piVars['sections'],0,2)=='rl';
                $sections = array();
                foreach($resultRows as $row)	{
                        $id = $row['rl0'].'-'.$row['rl1'].($rl2flag?'-'.$row['rl2']:'');
                        $sections[$id][] = $row;
                }

                $this->resultSections = array();

                foreach($sections as $id => $resultRows)	{
                    $rlParts = explode('-',$id);
                    $theId = $rlParts[2] ? $rlParts[2] : ($rlParts[1]?$rlParts[1]:$rlParts[0]);
                    $theRLid = $rlParts[2] ? 'rl2_'.$rlParts[2]:($rlParts[1]?'rl1_'.$rlParts[1]:'0');

                    $sectionName = substr($this->pObj->getPathFromPageId($theId),1);
                    if (!trim($sectionName))	{
                            $sectionTitleLinked = $this->pObj->pi_getLL('unnamedSection','',1).':';
                    } else {
                            $onclick = 'document.'.$this->pObj->prefixId.'[\''.$this->pObj->prefixId.'[_sections]\'].value=\''.$theRLid.'\';document.'.$this->pObj->prefixId.'.submit();return false;';
                            $sectionTitleLinked = '<a href="#" onclick="'.htmlspecialchars($onclick).'">'.htmlspecialchars($sectionName).':</a>';
                    }
                    $this->resultSections[$id] = array($sectionName,count($resultRows));

                    // Add content header:
                    $content.= $this->makeSectionHeader($id,$sectionTitleLinked,count($resultRows));

                    // Render result rows:
                    foreach($resultRows as $row)	{
                            $content.= $this->pObj->printResultRow($row);
                    }
                }
                break;
                default:	
                    // flat:
                    foreach($resultRows as $row)	{
                        $content.= $this->pObj->printResultRow($row);
                    }
                break;
        }
        return '<div'.$this->pObj->pi_classParam('res').'>'.$content.'</div>';
    }


    /**
     * Returns the section header of the search result.
     *
     * @param	string		ID for the section (used for anchor link)
     * @param	string		Section title with linked wrapped around
     * @param	integer		Number of results in section
     * @return	string		HTML output
     */
    function makeSectionHeader($id,$sectionTitleLinked,$countResultRows){
    
        # Init Template    
        $this->templateCode = $this->pObj->cObj->fileResource($this->pObj->conf["templateFile"]);
        $template = array();

        # Get the parts out of the template for viewing
        $template["total"] = $this->pObj->cObj->getSubpart($this->templateCode,"###SECTIONHEADER###");
        
        $markerArray['###STYLESECHEAD###'] = $this->pObj->pi_classParam('secHead');
        $markerArray['###SECHEADANCHOR###'] = md5($id);
        $markerArray['###TPARAMSSECHEAD###'] = $this->pObj->conf['tableParams.']['secHead'];
        $markerArray['###SECHEADTTITLE###'] = $sectionTitleLinked;
        $markerArray['###SECHEADCOUNTER###'] = $countResultRows.' '.$this->pObj->pi_getLL($countResultRows>1?'word_pages':'word_page','',1);
        
        # Create the whole table
        $content = $this->pObj->cObj->substituteMarkerArrayCached($template["total"],$markerArray, array(), array());        
        return $content;           
    }
        
        
    /**
     * Returns the anchor-links to the sections inside the displayed result rows.
     *
     * @return	string
     */
    function printResultSectionLinks()	{   
    
        # Init Template    
        $this->templateCode = $this->pObj->cObj->fileResource($this->pObj->conf["templateFile"]);
        $template = array();

        # Get the parts out of the template for viewing
        $template["total"] = $this->pObj->cObj->getSubpart($this->templateCode,"###SECTIONSLINKS###");
        $template["item"] = $this->pObj->cObj->getSubpart($template["total"],"###LIST_ITEM###");

        if (count($this->resultSections))	{
            $lines = array();                
            $content_item = '';
            
            $markerArray['###STYLESECLINKS###'] = $this->pObj->pi_classParam('sectionlinks');
            
            foreach($this->resultSections as $id => $dat)	{                
                $markerArray['###SECTIONLINK###'] = '<a href="'.htmlspecialchars($GLOBALS['TSFE']->anchorPrefix.'#'.md5($id)).'">'.
                                        htmlspecialchars(trim($dat[0])?trim($dat[0]):$this->pObj->pi_getLL('unnamedSection')).' ('.$dat[1].' '.$this->pObj->pi_getLL($dat[1]>1?'word_pages':'word_page','',1).')'.
                                        '</a>';
                $content_item .=  $this->pObj->cObj->substituteMarkerArrayCached($template["item"], $markerArray, array(), array());
            }
            
            $subpartArray = array();
            $subpartArray['###CONTENT###'] = $this->pObj->cObj->stdWrap($content_item, $this->pObj->conf['sectionlinks_stdWrap.']);
            
            # Create the whole table
            $content = $this->pObj->cObj->substituteMarkerArrayCached($template["total"],$markerArray, $subpartArray, array()); 
            return $content;        
        }
    }
        
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.tx_ch_gdr.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.tx_ch_gdr.php']);
}
?>