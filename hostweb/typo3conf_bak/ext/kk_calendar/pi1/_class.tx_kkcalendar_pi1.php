<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Kurt Kunig <kurt.kunig@kupix.de>
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

// wg. V6.2  require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Calendar (KK)' for the 'kk_calendar' extension.
 *
 * @author	Kurt Kunig <kurt.kunig@kupix.de>
 * @package	TYPO3
 * @subpackage	tx_kkcalendar
 */
class tx_kkcalendar_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_kkcalendar_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_kkcalendar_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'kk_calendar';	// The extension key.
   var $extPath       = 'typo3conf/ext/kk_calendar/';
	var $extUploadFolder = 'uploads/tx_kkcalendar/';
	var $defaultTemplate	 = 'calendar_template_table.html';
	var $pi_checkCHash = true;

   var $config = array();
   var $categories = Array();

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		global $TSFE,$LANG;
		$this->conf = $conf; // Storing configuration as a member var
		$this->pi_loadLL(); // Loading language-labels
		$this->pi_setPiVarDefaults(); // Set default piVars from TS

		$this->debug = $this->conf['debug'];

		// test if language version available
		// Die im Backend definierten Sprachen laden und
		// die Handhabung für Übersetzungen ermitteln.
		$lres = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'sys_language', '1=1' . $this->cObj->enableFields('sys_language'));
		$this->langArr = array();
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($lres)) {
		    $this->langArr[$row['uid']] = $row;
		}

		// get sys_language_mode
		$this->sys_language_mode = $this->conf['sys_language_mode']?$this->conf['sys_language_mode']:$GLOBALS['TSFE']->sys_language_mode;

		$langUID = $TSFE->config['config']['sys_language_uid'];
		// if config.sys_language_uid is not set, $langUID = 0
		if(empty($langUID)){
			$langUID = '0';
		}

      if ($this->debug) {
         print '<h2>Start kk_calendar</h2>';
         print '<h6>$conf=<br>';
         print_r ($this->conf);
         print '</h6>';
      }

      $content='';
      $markerArray = array();

      // *************************************
      // *** flexform Integration / getting values:
      // *************************************
		$this->pi_initPIflexform(); // Init and get the flexform data of the plugin

   	// Template settings
		$templateflex_file = trim($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'template_file', 'sDEF'));
      $templateflex_file = $templateflex_file ? $this->extUploadFolder.$templateflex_file : $this->conf['templateFile'];
      if (empty($templateflex_file) || $templateflex_file == '') {
         $templateflex_file = $this->extPath . $this->defaultTemplate;
      }
      if ($this->debug) {
         print '<p style="color:#f0f;">';
         print "Default-Template=$this->defaultTemplate";
         print "<br>this->extPath=$this->extPath";
         print "<br>templateflex_file=$templateflex_file";
         print '</p>';
      }
		$this->templateCode = $this->cObj->fileResource($templateflex_file);
		if (empty($this->templateCode)) return '<p style="color:red; background:white; font-weight:bold; padding:3px;">'.$this->pi_getLL('errNoTemplate').'</p>';


      // load all FLEXFORM data fields into variables for further use:
		$this->showCats = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'showCats', 'sDEF');
		$this->maxAge = intval($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'maxAge', 'sDEF'));
      $this->config['maxAge'] = $this->maxAge > 0 ? $this->maxAge : intval($this->conf['maxAge']);
      $this->maxDatesInView = intval($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'maxDatesInView', 'sDEF'));
      $this->config['maxDatesInView'] = $this->maxDatesInView > 0 ? $this->maxDatesInView : 100000;
   	$this->cal_type = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cal_type', 'sDEF');
      $this->noEntryMessage = trim($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'noEntryMessage', 'sDEF'));

      $ffCatSelection = trim($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'categorySelection', 'sDEF'));
		$this->config['categorySelection'] = $ffCatSelection ? $ffCatSelection : trim($this->conf['categorySelection']);

      if ($this->debug) {
         print '<p style="color:#a0f;">';
         print "maxAge=$this->maxAge";
         print "<br>maxDatesInView=$this->maxDatesInView";
         print "<br>this->showCats=$this->showCats";
         print "<br>this->cal_type=$this->cal_type";
         print "<br>this->conf['categorySelection']=$this->conf['categorySelection']";
         print '</p>';
      }


      // *************************************
      // *** getting configuration values:
      // *************************************
 		// getting configuration values:
   	$this->config['pid_list'] = trim($this->cObj->stdWrap($this->conf['pid_list'],$this->conf['pid_list.']));
   	$this->config['pid_list'] = $this->config[pid_list] ? $this->config['pid_list'] : $this->conf['global_calendarItems_pid'];
   	$this->config['pid_list'] = $this->config[pid_list] ? $this->config['pid_list'] : $GLOBALS['TSFE']->id;
   	$this->config['recursive'] = $this->cObj->stdWrap($this->conf['recursive'],$this->conf['recursive.']);


  		// If the current record should be displayed.
   	$this->config['displayCurrentRecord'] = $this->conf['displayCurrentRecord'];

      if ($this->debug > 1) {
         print '<h6 style="color:blue;">$GLOBALS[TSFE]->id='.$GLOBALS['TSFE']->id.'<br>$conf=<br>';
         print_r ($this->config);
         print '</h6>';
      }

   	// Fetching catagories:
    	$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_kkcalendar_cat', '1=1'.$this->cObj->enableFields('tx_kkcalendar_cat'));
		$num = $GLOBALS['TYPO3_DB']->sql_num_rows($res);

   	while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{
   		$this->categories[$row['uid']] = $row['title'];
   	}
	   if ($this->debug) {
         print '<p style="color:#a2a;">$this->categories=<br>';
         print_r ($this->categories);
         print '</p>';
      }

  		// making query:
   	$selectConf = Array();
   	if ($this->config[recursive])	{		// get pid-list if recursivity is enabled
   		$pid_list_arr = explode(',',$this->config[pid_list]);
   		$orig_pids = $this->config[pid_list];
   		$this->config[pid_list]='';
   		while(list(,$val)=each($pid_list_arr))	{
   			$this->config[pid_list].=$this->cObj->getTreeList($val,intval($this->config['recursive']));
   		}
   		$this->config[pid_list].=$orig_pids;
   	}

   	$selectConf['pidInList'] = $this->config[pid_list];
   	$selectConf['orderBy'] = 'date,time';
   	$selectConf['where'] = '1';

		if($this->cal_type != '') {
			$selectConf['where'] .= ' AND tx_kkcalendar_entries.type = ' . $this->cal_type;
		}
   	if ($this->config['maxAge'])	{
   		$selectConf['where'] .= ' AND date > '.(time()-(3600 * 24 * $this->config['maxAge']));
   	}
		if($this->config['categorySelection'] != '' && $this->config['categorySelection'] != '0') {
			$selectConf['where'] .= ' AND tx_kkcalendar_entries.category IN (' .$this->config['categorySelection']. ')';
		}

   	if ($this->config['maxDatesInView'])	{
   		$selectConf['max'] = $this->config['maxDatesInView'];
   	}

	   if ($this->debug) {
         print '<p style="color:#e40;">selectConf=<br>';
         print_r ($selectConf);
         print '<br>config[maxDatesInView]='.$this->config['maxDatesInView'].'</p>';
      }

   	// performing query:
    	$res = $this->cObj->exec_getQuery('tx_kkcalendar_entries',$selectConf);
  		$num = $GLOBALS['TYPO3_DB']->sql_num_rows($res);

      if ($this->debug) print '<h4 style="color:#e40;">Number of records selected ($num) ='.$num.'</h4>';

      if ($num <= 0) {
         if ($this->noEntryMessage == '') {
            return '<div class="kk_calendar"><p class="noentry">'.$this->pi_getLL('noEntryMessage').'</p></div>';
         } else {
            return '<div class="kk_calendar"><p class="noentry">'.$this->noEntryMessage.'</p></div>';
         }
      }

      // traversing the data.
   	while($this->config['displayCurrentRecord'] || $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{
   		if ($this->config['displayCurrentRecord'])	{ $row = $this->data; }

         $iMaxDatesInView++;

   	   if ($this->debug) print '<h4 style="color:#e40;">$row[type] >>> '.$row[type].'</h4>';

	   	// config a template:
      	switch(intval($row[type])) {
            case 1:
            $this->template['template'] = $this->cObj->getSubpart($this->templateCode,'###TEMPLATE_CALENDAR###');
            break;
            case 2:
            $this->template['template'] = $this->cObj->getSubpart($this->templateCode,'###TEMPLATE_TODO###');
            break;
            default:
            $this->template['template'] = $this->cObj->getSubpart($this->templateCode,'###TEMPLATE_CALENDAR###');
            break;
         }
   	   if ($this->debug) print '<h4 style="color:#e40;">template[template] >>> '.$this->template['template'].'</h4>';

         $this->template['listItem'] = $this->cObj->getSubpart($this->template['template'],'###TABLE_CONTENT###');
         $this->template['dateContent'] = $this->cObj->getSubpart($this->template['template'],'###DATE_CONTENT###');
         //  Text-Marker füllen, generell ALLE, die im Template stehen!
         $this->fillTextMarker($markerArray);

         // read and build the possible transfer Array for WOTA-Marker:
         $array = explode(',', $this->conf['trans']);
     	   if ($this->debug) {
            print '<h4 style="color:#f94;">';
            print 'this->conf[trans]=<br>';
            print_r ($this->conf['trans']);
     	      print '</h4>';
         }
         $trans = array();
         while(list($i, $key) = each($array)) {
            $aa = explode('=>', $key);
            $trans[trim($aa[0])] = trim($aa[1]);
         }
     	   if ($this->debug) {
            print '<h4 style="color:#fa5;">';
            print 'trans (nach Aufbau in while)=<br>';
            print_r ($trans);
     	      print '</h4>';
         }
 			// Insering date header:
 			$markerArray['###TYPE###'] = $this->pi_getLL('tx_kkcalendar_entries.type.I.'.trim($row[type]));
 			if ($this->conf['shortYear']) {
   		    $markerArray['###DATE###'] = date('d.m.y',$row[date]);
         } else {
   		    $markerArray['###DATE###'] = date('d.m.Y',$row[date]);
   		}
   		$markerArray['###DATETEXT###'] = trim($row[datetext]);
   		if ($this->conf['shortWeekday']) {
   		    $kk = date('D',$row[date]);
         } else {
   		    $kk = date('l',$row[date]);
         }
     	   if ($this->debug) {
            print '<h4 style="color:#fa5;">kk='.$kk.'<br>';
            print 'trans[kk]=<br>';
            print_r ($trans[$kk]);
     	      print '###WOTA### = '.str_replace($kk, $trans[$kk], $kk).'</h4>';
         }
   		$markerArray['###WOTA###'] = str_replace($kk, $trans[$kk], $kk);
   		$markerArray['###CALWEEK###'] = date('W',$row[date]);
   		$markerArray['###PRIORITY###'] = $this->pi_getLL('tx_kkcalendar_entries.priority.I.'.trim($row[priority]));
   		$markerArray['###CATEGORY###'] = $this->categories[$row['category']];
   		$title = $row[title];
  			if ($this->conf['parseFunc.']) {
   				$title = $this->cObj->parseFunc($title, $this->conf['parseFunc.']);
   			}
   		$markerArray['###RESPONSIBLE###'] = trim($row[responsible]);
   		$markerArray['###WORKGROUP###'] = trim($row[workgroup]);
   		$markerArray['###WEEK###'] = trim($row[week]);
   		$markerArray['###COMPLETE###'] = $this->pi_getLL('tx_kkcalendar_entries.complete.'.trim($row[complete]));

   		$markerArray['###HEADER###'] = $title;
//       link verarbeiten und setzen auf Ziel:
         $this->config['aTagParams'] = $row[atagparams] ? $row[atagparams] : $this->conf['aTagParams'];
         $markerArray['###LINK###'] = $this->createLink($row[link]);
   		if ($markerArray['###LINK###'] == '') $markerArray['###TEXT_LINK###'] = '';

   		if ($markerArray['###CATEGORY###'] == '') $markerArray['###TEXT_CATEGORY###'] = '';
   		if ($markerArray['###CALWEEK###'] == '') $markerArray['###TEXT_CALWEEK###'] = '';
   		if ($markerArray['###COMPLETE###'] == '') $markerArray['###TEXT_COMPLETE###'] = '';
   		if ($markerArray['###WEEK###'] == '') $markerArray['###TEXT_WEEK###'] = '';
   		if ($markerArray['###WORKGROUP###'] == '') $markerArray['###TEXT_WORKGROUP###'] = '';
   		if ($markerArray['###RESPONSIBLE###'] == '') $markerArray['###TEXT_RESPONSIBLE###'] = '';

         if ($this->debug > 1) {
            print '<h6 style="color:#963;">$markerArray=<br>';
            print_r ($markerArray);
            print '</h6>';
         }
      
   		$parts = explode(chr(10).'---'.chr(10), str_replace(chr(13),'',$row[note]));
   		$date_item = '';
   		while(list(,$pcon)=each($parts))	{
   			$pcon = trim($pcon);             
   			$pcon_arr = explode(chr(10),$pcon,2);
   			$theTime = '';
   			$hP=explode(' ',$pcon_arr[0],2);
//   			if (ereg('[^0-9,.:;-]',$hP[0]))	{
   			if (preg_match('[^0-9,.:;-]',$hP[0]))	{
   				$title = trim($pcon_arr[0]);
   			} else {
   				$title = trim($hP[1]);
   				$theTime = trim($hP[0]);
   			}
   			if ($this->conf['parseFunc.']) {
   				$title = $this->cObj->parseFunc($title,$this->conf['parseFunc.']);
   				$pcon_arr[1] = $this->cObj->parseFunc($pcon_arr[1],$this->conf['parseFunc.']);
   			}

   			$theContent = '<span class="kkc_title">'.$title.'</span><br />'.nl2br($pcon_arr[1]);

  				// Insering date header:
//   			$tConf['workOnSubpart'] = 'DATE_CONTENT';
   			$markerArray['###TIME###'] = $theTime;
      		$markerArray['###CONTENT###'] = $theContent;

      		$date_item .= $this->cObj->substituteMarkerArrayCached($this->template['dateContent'], $markerArray, $filesize);
   		}
   		$subpartArray['###DATE_CONTENT###'] = $date_item;
     		$content_item .= $this->cObj->substituteMarkerArrayCached($this->template['listItem'], $markerArray, $subpartArray);

   		$this->cObj->lastChanged($row[tstamp]);
   		if ($this->config['displayCurrentRecord'])	{break;}	// Must exit forcibly or we'll have an eternal loop.
   	}
  		$subpartArray['###TABLE_CONTENT###'] = $content_item;
      $content .= $this->cObj->substituteMarkerArrayCached($this->template['template'], $markerArray, $subpartArray);

		return $content;
	} // end function main


	/**
	 * replace all possible textmarkers:
	 * call by ref: &
	 * @param	string	$markerArray: self-explanatory	 *
	*/
	function fillTextMarker(&$markerArray){
      // find first position of a TEXT_marker and the full length of the string
      $i = strpos($this->template['template'], '###TEXT_', 0);
      $l = strlen($this->template['template']);

      // no TEXT_marker!? go back
      if ($i == false) return;

      // build an array with the TEXT-Markers in and separate the markers key-word
      while ($i < $l AND $i > 1) {
         $k = strpos($this->template['template'], '###', $i+1);
         $s = substr ($this->template['template'], $i+8, $k-$i-8);
         $textmarker_arrayl[$x++] = $s;
         $i = strpos($this->template['template'], '###TEXT_', $k+3);
      }
      $textmarker_array = array_unique($textmarker_arrayl);
      // and now, replace them with content out of the locallang.xml:
      foreach ($textmarker_array as $tt) {
         $mi = '###TEXT_' . $tt . '###';
         $LLi = 'txt' . $tt;
         $markerArray[$mi] = $this->pi_getLL($LLi);
         $markerArray[$mi] = str_replace('\n', '<br />', $markerArray[$mi]);
      }

      if ($this->debug) {
         print '<div style="color:#484;">Textmarker:<br />';
         print_r ($markerArray);
         print '</div>';
      }
		return;
	} // end function fillTextMarker
	
	
	
	/**
	 * creates the link-statement when a link is set in the cal-entry item:
	 * returns: complete <a href"..." >name</a>
	 * @param	integer	$linkId = UID of a CObject
	*/
	function createLink($linkId){

  		if ($this->debug) print '<h6 style="color:#ad2121;">$linkId = '.$linkId.'</h6>';

      $pagepath = '';
      if ($this->conf['realUrlUsed']) {
//       SELECT 'pagepath' FROM 'tx_realurl_pathcache' inner join tt_content ON tt_content.pid = tx_realurl_pathcache.page_id where tt_content.uid = $linkId;
         $from = 'tx_realurl_pathcache inner join tt_content ON tt_content.pid = tx_realurl_pathcache.page_id';
   		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('pagepath', $from, 'tt_content.uid = '.$linkId);
   		if ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) $pagepath = trim($row['pagepath']);
   		if ($this->debug) print '<h6 style="color:#ad2121;">$pagepath = '.$pagepath.'</h6>';
   		$GLOBALS['TYPO3_DB']->sql_free_result($res);
      }

      $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('pid, header', 'tt_content', 'tt_content.uid = '.$linkId);

      $linkstring = '';
		if ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
         $linkstring = '<a '.$this->config['aTagParams'].' href="';
         if ($this->conf['realUrlUsed'] && $pagepath != '') {
			   $linkstring .= $pagepath . '#c' . $linkId;
			} else {
			   $linkstring .= 'index.php?id='. $row['pid'] . '#c' . $linkId;
         }
         $linkstring .= '">'.$row['header'].'</a>';
		}

		$GLOBALS['TYPO3_DB']->sql_free_result($res);

  	   if ($this->debug) print '<h6 style="color:#ad2121;">$linkstring => '.$linkstring.'</h6>';

      return $linkstring;
   } // end of function "createLink"


} // end of class

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/kk_calendar/pi1/class.tx_kkcalendar_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/kk_calendar/pi1/class.tx_kkcalendar_pi1.php']);
}

?>
