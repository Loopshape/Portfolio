<?php

class tx_ch_grr {

    var $pObj;		// Is set to a reference to the parent object, "pi1/class.indexedsearch.php"

    /**
     * Get search result rows / data from database. Returned as data in array.
     *
     * @param	array		Search word array
     * @return	array		False if no result, otherwise an array with keys for first row, result rows and total number of results found.
     */
    function getResultRows($sWArr)	{

        // Getting SQL result pointer:
        $GLOBALS['TT']->push('Searching result');        
      
        $res = $this->pObj->getResultRows_SQLpointer($sWArr);
        $GLOBALS['TT']->pull();

        // Organize and process result:
        if ($res) {

            // Get some variables:			
            $count = $GLOBALS['TYPO3_DB']->sql_num_rows($res);			
            $pointer = t3lib_div::intInRange($this->pObj->piVars['pointer'],0,floor($count/$this->pObj->piVars['results']));
            
            // Initialize result accumulation variables:
            $c = 0;
            $grouping_phashes = array();	// Used to filter out duplicates.
            $grouping_chashes = array();	// Used to filter out duplicates BASED ON cHash.
            $firstRow = Array();		// Will hold the first row in result - used to calculate relative hit-ratings.
            $resultRows = Array();	        // Will hold the results rows for display.

            // Now, traverse result and put the rows to be displayed into an array
            // Each row should be a the fields from 'ISEC.*, IP.*' combined + artificial fields "show_resume" (boolean) and "result_number" (counter)
            while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{               
                // Set first row:
                if (!$c) {
                    $firstRow = $row;
                }    
                $row['show_resume'] = $this->pObj->checkResume($row);	// Tells whether we can link directly to a document or not (depends on possible right problems)
                $phashGr = !in_array($row['phash_grouping'], $grouping_phashes);
                $chashGr = !in_array($row['contentHash'].'.'.$row['data_page_id'], $grouping_chashes);                        
                if ($phashGr && $chashGr) {                    
                    if ($row['show_resume']) {	                                        // Only if the resume may be shown are we going to filter out duplicates...
                        if (!$this->pObj->multiplePagesType($row['item_type'])) {     	        // Only on documents which are not multiple pages documents
                            $grouping_phashes[] = $row['phash_grouping'];
                        }                        
                        $grouping_chashes[] = $row['contentHash'].'.'.$row['data_page_id'];
                        $c++;
                        // All rows for display is put into resultRows[]
                        if ($c > $pointer * $this->pObj->piVars['results'] && ($c-1) < ($pointer+1)*$this->pObj->piVars['results']) {
                            $row['result_number'] = $c;
                            $resultRows[] = $row;                    
                        }                        
                    } else {
                        $count--;
                    }
                } else {
                    $count--;
                }
            }

            return array(   'resultRows' => $resultRows,
                            'firstRow' => $firstRow,
                            'count' => $count
                        );
                        
        } else {	        // No results found:
            return FALSE;
        }
    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.tx_ch_grr.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_is_templates/pi1/class.tx_ch_grr.php']);
}
?>