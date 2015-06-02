<?php
class tx_ists_gdr {
	var $pObj;		// Is set to a reference to the parent object, "pi1/class.indexedsearch.php"
	
    /**
     * Compiles the HTML display of the incoming array of result rows.
     *
     * @param   array       Search words array (for display of text describing what was searched for)
     * @param   array       Array with result rows, count, first row.
     * @return  string      HTML content to display result.
     */
    function getDisplayResults($sWArr, $resData)    {
            // Perform display of result rows array:
//print_r($resData);
        if ($resData && $resData['count'] > 0 )   {
            $GLOBALS['TT']->push('Display Final result');

                // Set first selected row (for calculation of ranking later)
            $this->pObj->firstRow = $resData['firstRow'];

                // Result display here:
            $rowcontent = '';
            $rowcontent.= $this->compileResult($resData['resultRows']);

                // Browsing box:
            if ($resData['count'])  {
                $this->pObj->internal['res_count'] = $resData['count'];
                $this->pObj->internal['results_at_a_time'] = $this->pObj->piVars['results'];
                $this->pObj->internal['maxPages'] = t3lib_div::intInRange($this->pObj->conf['search.']['page_links'],1,100,10);
                $addString = ($resData['count']&&$this->pObj->piVars['group']=='sections' ? ' '.sprintf($this->pObj->pi_getLL(count($this->pObj->resultSections)>1?'inNsections':'inNsection'),count($this->pObj->resultSections)):'');
                $browseBox1 = $this->pObj->pi_list_browseresults(1,$addString,$this->pObj->printResultSectionLinks());
                $browseBox2 = $this->pObj->pi_list_browseresults(0);
            }

            // custom Template
            //
            global $TSFE;
            $conf = $this->pObj->conf['customTemplate.'];

            $this->setResultBrowserData( $conf['pagebrowser.'] );

            $what = $this->pObj->tellUsWhatIsSeachedFor($sWArr);
            $this->pObj->cObj->data['whatis'] = $what;
            $this->pObj->cObj->data['uid'] = $TSFE->id;

            $head = $this->pObj->cObj->cObjGetSingle( $conf['head'], $conf['head.'], 'indexsearch head' );
            $foot = $this->pObj->cObj->cObjGetSingle( $conf['foot'], $conf['foot.'], 'indexsearch foot' );
            $content .= $head.$rowcontent.$foot;

            
        } else {
            $_REQUEST["noresults"] = TRUE;
            $content .= $this->pObj->cObj->cObjGetSingle( $this->pObj->conf['customTemplate.']['noResults'], $this->pObj->conf['customTemplate.']['noResults.'], 'indexsearch no results' );
        }

        // Return content:
        return $content;
    }
	
    /**
     * Takes the array with resultrows as input and returns the result-HTML-code
     * Takes the "group" var into account: Makes a "section" or "flat" display.
     *
     * @param   array       Result rows
     * @return  string      HTML
     */
    function compileResult($resultRows) {
        $content = '';

        switch($this->pObj->piVars['group'])  {
            case 'sections':

                $rl2flag = substr($this->pObj->piVars['sections'],0,2)=='rl';
                $sections = array();
                foreach($resultRows as $row)    {
                    $id = $row['rl0'].'-'.$row['rl1'].($rl2flag?'-'.$row['rl2']:'');
                    $sections[$id][] = $row;
                }

                $this->pObj->resultSections = array();

                foreach($sections as $id => $resultRows)    {
                    $rlParts = explode('-',$id);
                    $theId = $rlParts[2] ? $rlParts[2] : ($rlParts[1]?$rlParts[1]:$rlParts[0]);
                    $theRLid = $rlParts[2] ? 'rl2_'.$rlParts[2]:($rlParts[1]?'rl1_'.$rlParts[1]:'0');

                    $sectionName = substr($this->pObj->getPathFromPageId($theId),1);
                    if (!trim($sectionName))    {
                        $sectionTitleLinked = $this->pObj->pi_getLL('unnamedSection','',1).':';
                    } else {
                        $onclick = 'document.'.$this->pObj->prefixId.'[\''.$this->pObj->prefixId.'[_sections]\'].value=\''.$theRLid.'\';document.'.$this->pObj->prefixId.'.submit();return false;';
                        $sectionTitleLinked = '<a onclick="'.htmlspecialchars($onclick).'">'.htmlspecialchars($sectionName).':</a>';
                    }
                    $this->pObj->resultSections[$id] = array($sectionName,count($resultRows));

                        // Add content header:
                    if( ! $this->pObj->conf['customTemplate.']['noSectionHeader']) {
                    	$content.= $this->pObj->makeSectionHeader($id,$sectionTitleLinked,count($resultRows));
                    }
                        // Render result rows:
                    $first_item = -1;
                    foreach($resultRows as $row)    {
                    	if ($first_item == -1) {
                        	$first_item = $row["result_number"];
                    	}
                        $content.= $this->printResultRow($row);
                    }
                }
            break;
            default:    // flat:
                $first_item = -1;
                foreach($resultRows as $row)    {
                    if ($first_item == -1) {
                        $first_item = $row["result_number"];
                    }
                    $content.= $this->printResultRow($row);
                }
            break;
        }
        if( $this->pObj->conf['customTemplate'] ) {
            // Erweiterung für Bildungsportal für Ausgabe über Typoscript-Template..
            // einfCH nur durchleiten...
            $this->pObj->cObj->data['first_item'] = $first_item;
            $retval = $content;
        }

        return $retval;
    }
	
    /**
     * This prints a single result row, including a recursive call for subrows.
     *
     * @param   array       Search result row
     * @param   integer     1=Display only header (for sub-rows!), 2=nothing at all
     * @return  string      HTML code
     */
    function printResultRow($row, $headerOnly=0)    {
        // Get template content:
        $tmplContent = $this->pObj->prepareResultRowTemplateData($row, $headerOnly);
	
	$tmplContent['result_number'] = $row['result_number'];

        if ($hookObj = &$this->pObj->hookRequest('printResultRow'))   {
            return $hookObj->printResultRow($row, $headerOnly, $tmplContent);
        } elseif( $this->pObj->conf['customTemplate'] ) {
            // Erweiterung fuer Ausgabe ueber Typoscript-Template..
            $conf = $this->pObj->conf['customTemplate.'];
            // data-Array befuellen
            $this->pObj->cObj->data = array_merge($this->pObj->cObj->data, $tmplContent);
            //$this->pObj->cObj->data['as_special'] = $this->pObj->linkPage($row['data_page_id'],'>> Diese Seite anzeigen',$row,$markUpSwParams);
            $this->pObj->cObj->data['as_special'] = $this->pObj->linkPage($row['data_page_id'],'>> Diese Seite anzeigen',$row,Array());
            

//print_r($this->pObj->cObj->data);
            $this->pObj->cObj->data['page_id'] = $row['page_id'];

            // rendern
            $out = $this->pObj->cObj->cObjGetSingle( $conf['row'], $conf['row.'], 'indexsearch row' );
            return $out;
        }
    }
	
    /*
     * Alternative Funktion für Bildungsportal
     * Um den Browser mit Typoscript erstellen zu können, werden hier die benötigten Werte in
     * das data-Array gefüllt...
     * Vor allem die Leiste mit Links wird hier erzeugt!
     *
     * */
    function setResultBrowserData( $conf = NULL ) {
        // Erst einzelne Variablen setzen
        // pi-Vars
        foreach( $this->pObj->piVars as $name => $value ) {
            $this->pObj->cObj->data[$name] = $value;
        }

        // Anzahl der gefundenen Seiten...
        $this->pObj->cObj->data['res_count'] = $this->pObj->internal['res_count'];

        // dann die Links erzeugen und setzen:

        $results_at_a_time = t3lib_div::intInRange($this->pObj->internal['results_at_a_time'],1,1000);
        $maxPages = t3lib_div::intInRange($this->pObj->internal['maxPages'],1,100);


            // Initializing variables:
        // Zeiger auf die Ergebnisseite
        $pointer=$this->pObj->piVars['pointer'];
        // Anzahl der gefundenen Seiten...
        $count=$this->pObj->internal['res_count'];
        $max = t3lib_div::intInRange(ceil($count/$results_at_a_time),1,$maxPages);
        $pointer=intval($pointer);
        $links=array();

        // Links prev & next

        $browser = '';
        // Make browse-table/links:
        // Zurück:
        if ($pointer>0) {
            $browser .= $this->pObj->cObj->stdWrap($this->makePointerSelector_link($conf['prev'],$pointer-1), $conf['prev.']);
        } else {
            // fawsdadfasdf
            //$browser .= $this->pObj->cObj->stdWrap($conf['prev'], $conf['prev.']);
        }
        // Direktlinks
        for($a=0;$a<$max;$a++)  {
            if( $pointer == $a ) {
                // Aktuell
                $lconf = $conf['aktLink.'] ? $conf['aktLink.'] : $conf['nrLink.'];

                // Todo: Mit Typoscript ein- / ausschaltbar machen!
                if( $a == 0 )  $lconf = '';
                $browser .= $this->pObj->cObj->stdWrap(($a+1), $lconf);
            } else {
                $lconf = $conf['nrLink.'];
                if( $a == 0 )  $lconf = '';
                $browser .= $this->pObj->cObj->stdWrap($this->makePointerSelector_link($a+1,$a), $lconf);
            }
        }
        // Next
        if ($pointer < ceil($count/$results_at_a_time)-1) {
            $browser .= $this->pObj->cObj->stdWrap($this->makePointerSelector_link($conf['next'],$pointer+1), $conf['next.']);
        }

        // stdWrap um alles
        $browser = $this->pObj->cObj->stdWrap($browser, $conf['stdWrap.']);
        if($count/$results_at_a_time > 1) {
            $this->pObj->cObj->data['browser'] = $browser;
        }
    }
	
    function makePointerSelector_link($str,$p)  {
        $onclick = 'document.'.$this->pObj->prefixId.'[\''.$this->pObj->prefixId.'[pointer]\'].value=\''.$p.'\';document.'.$this->pObj->prefixId.'.submit();return false;';
        return '<a href="javascript:" onclick="'.htmlspecialchars($onclick).'" class="suche_seiten">'.$str.'</a>';
    }
	
	/*function makeTitle() {
	
	}*/
	
}
?>