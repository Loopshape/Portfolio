<?php

class tx_ch_prr {

    var $pObj;		// Is set to a reference to the parent object, "pi1/class.indexedsearch.php"

    /**
     * This prints a single result row, including a recursive call for subrows.
     *
     * @param	array		Search result row
     * @param	integer		1=Display only header (for sub-rows!), 2=nothing at all
     * @return	string		HTML code
     */
    function printResultRow($row, $headerOnly, $tmplContent) {                   
    
        # Init Template    
        $this->templateCode = $this->pObj->cObj->fileResource($this->pObj->conf["templateFile"]);
        
        $template = array();
        $subpartArray = array();
        
        # Get the parts out of the template for viewing
        $template["total"] = $this->pObj->cObj->getSubpart($this->templateCode,"###PRINTRESULTROW###");
        $template["rs_item"] = $this->pObj->cObj->getSubpart($template["total"],"###RS_ITEM###"); 
        $template["ho_item"] = $this->pObj->cObj->getSubpart($template["total"],"###HO_ITEM###"); 
        $template["sr_title"] = $this->pObj->cObj->getSubpart($template["total"],"###SR_TITLE###"); 
        $template["sr_item"] = $this->pObj->cObj->getSubpart($template["total"],"###SR_ITEM###"); 
        
        $markerArray['###TPARAMS###'] = $this->pObj->conf['tableParams.']['searchRes'];
        $markerArray['###TITLESTYLE###'] = $this->pObj->pi_classParam('title'.$tmplContent['CSSsuffix']);
        $markerArray['###ICONSTYLE###'] = $this->pObj->pi_classParam('title-icon'.$tmplContent['CSSsuffix']);
        $markerArray['###TNUMBERSTYLE###'] = $this->pObj->pi_classParam('title-number'.$tmplContent['CSSsuffix']);
        $markerArray['###TCAPTIONSTYLE###'] = $this->pObj->pi_classParam('title-caption'.$tmplContent['CSSsuffix']);
        $markerArray['###PERCENTSTYLE###'] = $this->pObj->pi_classParam('percent'.$tmplContent['CSSsuffix']);
        
        $markerArray['###ICON###'] = $tmplContent['icon'];
        $markerArray['###RESULTNUMBER###'] = $tmplContent['result_number'];     
        $markerArray['###TITLE###'] = $tmplContent['title'];     
        $markerArray['###RATING###'] = $tmplContent['rating']; 

        // Print the resume-section. If headerOnly is 1, then only the short resume is printed
        if (!$headerOnly) {
            $markerArray['###STYLEDESCRIPTION###'] = $this->pObj->pi_classParam('descr'.$tmplContent['CSSsuffix']);
            $markerArray['###DESCRIPTION###'] = $tmplContent['description'];
            $markerArray['###INFOSTYLE###'] = $this->pObj->pi_classParam('info'.$tmplContent['CSSsuffix']);
            $markerArray['###INFOSTYLE2###'] = $this->pObj->pi_classParam('info'.$tmplContent['CSSsuffix']);
            $markerArray['###SIZE###'] = $tmplContent['size'];
            $markerArray['###CREATED###'] = $tmplContent['created'];
            $markerArray['###MODIFIED###'] = $tmplContent['modified'];
            if ($tmplContent['path']) {
                $markerArray['###PATH###'] = $this->pObj->pi_getLL('res_path','',1).' '.$tmplContent['path'];
            } else {
                $markerArray['###PATH###'] = '';            
            }            
            $markerArray['###PATH###'] = $tmplContent['path'];
            $markerArray['###ACCESS###'] = $tmplContent['access'];
            $markerArray['###LANGUAGE###'] = $tmplContent['language'];
            $content_rs = $this->pObj->cObj->substituteMarkerArrayCached($template["rs_item"], $markerArray, array(), array());        
            $subpartArray["###RESUMSECTION###"] = $content_rs;
            $subpartArray["###HEADERONLY###"] = '';        
        } elseif ($headerOnly==1) {
            $markerArray['###STYLEDESCRIPTION###'] = $this->pObj->pi_classParam('descr'.$tmplContent['CSSsuffix']);
            $markerArray['###DESCRIPTION###'] = $tmplContent['description'];
            $content_ho = $this->pObj->cObj->substituteMarkerArrayCached($template["ho_item"], $markerArray, array(), array());
            $subpartArray["###RESUMSECTION###"] = '';
            $subpartArray["###HEADERONLY###"] = $content_ho;
        }
          
        // If there are subrows (eg. subpages in a PDF-file or if a duplicate page is selected due to user-login (phash_grouping))
        if (is_array($row['_sub'])) {
            if ($this->pObj->multiplePagesType($row['item_type']))	{
                $markerArray['###LOTHERMATCHING###'] = $this->pObj->pi_getLL('res_otherMatching','',1);
                $content_title = $this->pObj->cObj->substituteMarkerArrayCached($template["sr_title"], $markerArray, array(), array());
                $content_sr = '';
                foreach($row['_sub'] as $subRow) {
                    $markerArray['###SUBROW###'] = $this->pObj->printResultRow($subRow,1); 
                    $content_sr .= $this->pObj->cObj->substituteMarkerArrayCached($template["sr_item"], $markerArray, array(), array());
                }
                $subpartArray["###SUBROWTITLE###"] = $content_title;
                $subpartArray["###SUBROWS###"] = $content_sr;
            } else {
                $markerArray['###SUBROW###'] = $this->pObj->pi_getLL('res_otherPageAsWell','',1);
                $content_sr = $this->pObj->cObj->substituteMarkerArrayCached($template["sr_item"], $markerArray, array(), array());
                $subpartArray["###SUBROWTITLE###"] = '';
                $subpartArray["###SUBROWS###"] = $content_sr;
            }
        } else {
            $subpartArray["###SUBROWTITLE###"] = '';
            $subpartArray["###SUBROWS###"] = '';
        }
            
        # Create the whole table
        $content = $this->pObj->cObj->substituteMarkerArrayCached($template["total"],$markerArray, $subpartArray, array());
        
        return $content;
    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.tx_ch_prr.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.tx_ch_prr.php']);
}
?>