<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005 Popy (popy.dev@gmail.com)
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
 * Plugin 'Specialized search Engine' for the 'pp_searchengine' extension.
 *
 * @author	Popy <popy.dev@gmail.com>
 */
if (!function_exists('tx_ppsearchengine_pi1_resComp')) {
	/**
	 * Sorting function (used in usort)
	 *
	 * @param array a,$b = the rows to compare
	 * @access public
	 * @return int 
	 */
	function tx_ppsearchengine_pi1_resComp($a,$b) {
		/* Déclarations */

		/* Début */
		if (($a==$b) || (($a['pertinence']==$b['pertinence']) && ($a['title']==$b['title']))) {
			return 0;
		} elseif (
			($a['pertinence']>$b['pertinence']) ||
			(($a['pertinence']==$b['pertinence']) && ($a['count']>$b['count']))
			) {
			return -1;
		} else {
			return 1;
		}
	}
}

require_once(t3lib_extMgm::extPath('pp_lib').'class.tx_pplib.php');

class tx_ppsearchengine_pi1 extends tx_pplib {
	var $prefixId = 'tx_ppsearchengine_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_ppsearchengine_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey = 'pp_searchengine';	// The extension key.
	var $debugOutput=TRUE;
	
	/**
	 * [Put your description here]
	 */
	function main($content,$conf)	{
		//*** initialisation
		global $TYPO3_CONF_VARS;
		$this->extConf=unserialize($TYPO3_CONF_VARS['EXT']['extConf']['pp_searchengine']);
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->currentSearch=array();

		$GLOBALS['PP_SEARCHENGINE_PI1']=&$this;

		$this->conf['config.']['highlight']=$this->cObj->stdWrap($this->conf['config.']['highlight'],$this->conf['config.']['highlight.']);

		if (t3lib_div::_GP('sword')) {
			$this->piVars['sword']=t3lib_div::_GP('sword');
		}

		if ($this->piVars['sword'] || $this->piVars['fromCache']) {
			$content=$this->doSearch();
		}

		return $this->printSearchForm().$content;
	}

	/**
	 *
	 *
	 * @access public
	 * @return string 
	 */
	function printSearchForm() {
		/* Déclarations */
		$mk=array(
			'###url_action###'=>htmlspecialchars($this->cObj->typoLink_URL(array('parameter'=>$GLOBALS['TSFE']->id))),
			'###prefixId###'=>htmlspecialchars($this->prefixId),
			'###engine_options###'=>'',
			'###lang_options###'=>'',
			'###sword_value###' => htmlspecialchars($this->piVars['sword']),
			'###current_select###'=>'',
			'###all_select###'=>'',
			'###default_select###'=>''
			);
	
		/* Début */
		if (is_array($this->conf['engines.'])) {
			foreach ($this->conf['engines.'] as $key=>$val) {
				$value=htmlspecialchars(substr($key,0,strlen($key)-1));
				$mk['###engine_options###'].='<option value="'.$value.'"'.(($value==$this->piVars['engine'])?' selected="selected"':'').'>'.$this->cObj->stdWrap($val['label'],$val['label.']).'</option>';
			}
		}

		$langs=$GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*','sys_language','1'.$this->cObj->enableFields('sys_language'));

		switch ($this->piVars['lang']){
		case 'current':
			$mk['###current_select###']=' selected="selected"';
			break;
		case 'all': 
			$mk['###all_select###']=' selected="selected"';
			break;
		case '0': 
			$mk['###default_select###']=' selected="selected"';
			break;
		}
		if (is_array($langs) && count($langs)) {
			foreach ($langs as $val) {
				$mk['###lang_options###'].='<option value="'.$val['uid'].'"'.(($val['uid']==$this->piVars['lang'])?' selected="selected"':'').'>'.$val['title'].'</option>';
			}
		}

		return '<div class="search_form">'.$this->fastMarkerArray($mk,$this->getSubpart('SEARCH_FORM')).'</div>';
	}

	/**
	 * Display a result
	 *
	 * @param array $result = details of the result (returned by a search engine)
	 * @param int $count = number of search words (used for calculating pertinece)
	 * @access public
	 * @return string 
	 */
	function printSingleResult($result,$count) {
		/* Déclarations */
	
		/* Début */
		$result['pertinence']=reset(explode('.',(($result['pertinence']/$count)*100)));
		$result['title']=htmlspecialchars($result['title']);
		$result['link']=htmlspecialchars($result['link']);
		$result['engine']=htmlspecialchars($result['engine']);


		$this->internal['currentRow']=$result;

		return $this->rowStdWrap($this->conf['display.']['singleResult'],$this->conf['display.']['singleResult.']);
	}

	/**
	 * Call each registered external engines, merge results, sort them and display them
	 *
	 * @access public
	 * @return string 
	 */
	function doSearch() {
		/* Déclarations */
		$results=array();
		$tTab=array();
		$label='';
		$cacheId=FALSE;
	
		/* Début */

		//*** Loading search params
		$this->currentSearch['swords']=$this->piVars['sword'];
		$this->currentSearch['swordList']=$this->parseSWord($this->currentSearch['swords']);
		$this->currentSearch['engine']=$this->piVars['engine'];
		$this->currentSearch['lang']=($this->piVars['lang']=='current')?$GLOBALS['TSFE']->config['sys_langage_uid']:$this->piVars['lang'];

		if (!(intval($this->piVars['fromCache']) && $fromCache=$this->getFromCache($this->piVars['fromCache']))) {
			$result=array();
			
			if (!is_array($this->conf['engines.']) || !count($this->currentSearch['swordList'])) return FALSE;
			if (trim($this->currentSearch['engine']) && isset($this->conf['engines.'][$this->currentSearch['engine'].'.'])) {
				$val=$this->conf['engines.'][$this->currentSearch['engine'].'.'];
				$label=$this->cObj->stdWrap($val['label'],$val['label.']);
				if (($tTab=$this->callExternalEngine($val)) && is_array($tTab)) {
					foreach ($tTab as $sRes) {
						$sRes['engine']=$label;
						if ($sRes['pertinence']) $results[]=$sRes;
					}
				}
			} else {
				foreach ($this->conf['engines.'] as $key=>$val) {
					if (strpos($key,'.')) {
						$label=$this->cObj->stdWrap($val['label'],$val['label.']);

						if (($tTab=$this->callExternalEngine($val)) && is_array($tTab)) {
							foreach ($tTab as $sRes) {
								$sRes['engine']=$label;
								if ($sRes['pertinence']) $results[]=$sRes;
							}
						} else {
							//Error in engine $label
						}

					}
				}
			}

			usort($results, 'tx_ppsearchengine_pi1_resComp');

			//*** Save result
			$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_ppsearchengine_cache',array('uid'=>'','params'=>serialize($this->currentSearch),'endtime'=>time()+$this->conf['config.']['cacheLifeSpan'],'results'=>serialize($results)));
			$cacheId=$GLOBALS['TYPO3_DB']->sql_insert_id();

		} else {
			list($results,$this->currentSearch)=$fromCache;

			//*** Restore search params (by doing this, the search form will be correctly filled even if they aren't in piVars
			//       Thats why the function printSearchForm is called AFTER this one. Tidy humm ?
			$this->piVars['sword']=$this->currentSearch['swords'];
			$this->piVars['engine']=$this->currentSearch['engine'];
			$this->currentSearch['swordList']=$this->parseSWord($this->currentSearch['swords']);
			$this->piVars['lang']=$this->currentSearch['lang'];
		}

		//*** Count swords
		$count=$this->countRealSwords($this->currentSearch['swordList']);
		if ($nbRes=count($results)) {
			$mk=array();

			$start=intval($this->piVars['pointer'])*$this->conf['config.']['maxResPerPages'];
			if ($start>$nbRes) $start=intval($nbRes/$this->conf['config.']['maxResPerPages'])*$this->conf['config.']['maxResPerPages'];

			$mk['###results###']=$this->fastMarkerArray(
				array(
					'###start###'=>$start+1,
					'###stop###'=>min($nbRes,$start+$this->conf['config.']['maxResPerPages']),
					'###total###'=>$nbRes
					),
				$this->cObj->stdWrap(
					$this->conf['display.']['results'],
					$this->conf['display.']['results.']
					)
				);

			$mk['###pagination###']=$this->getPagination($nbRes,$cacheId);

			$parts=$this->fastMarkerArray($mk,explode('|',$this->conf['display.']['listDisplay']));

			$content.=$parts[0];
			for ($i=$start;($i<$nbRes) && ($i<($start+$this->conf['config.']['maxResPerPages']));$i++) {
				$content.=$this->printSingleResult($results[$i],$count);
			}
			$content.=$parts[1];

		} else {
			$content.=$this->cObj->stdWrap($this->conf['display.']['noresult'],$this->conf['display.']['noresult.']);
		}

		return '<div class="search_results">'.$content.'</div>';
	}

	/**
	 * Return a saved result
	 *
	 * @param int $cacheId = the cache identifier
	 * @access public
	 * @return array or FALSE when no cache to return 
	 */
	function getFromCache($cacheId) {
		/* Déclarations */
		$res=array();
		global $TYPO3_DB;
	
		/* Début */
		$this->flushCache();
		$res=$TYPO3_DB->exec_SELECTgetRows('results,params','tx_ppsearchengine_cache','uid=\''.intval($cacheId).'\' AND endtime>'.time());
		if ($res && is_array($res) && count($res)) {
			$res=reset($res);
			return array(unserialize($res['results']),unserialize($res['params']));
		} else {
			return FALSE;
		}
	}

	/**
	 * Delete all expired cache
	 *
	 * @access public
	 * @return void 
	 */
	function flushCache() {
		/* Déclarations */
		global $TYPO3_DB;
	
		/* Début */
		$TYPO3_DB->exec_DELETEquery('tx_ppsearchengine_cache','endtime<'.time());
		if ($TYPO3_DB->sql_affected_rows()) {
			$TYPO3_DB->sql_query('OPTIMIZE TABLE `tx_ppsearchengine_cache`');
		}
	}

	/**
	 * Build a simple result browser
	 *
	 * @param int $nbRes = number of results
	 * @param int $cacheId = Optionnal : cache identifier (used to set the fromCache param just after saving it)
	 * @access public
	 * @return string 
	 */
	function getPagination($nbRes,$cacheId=FALSE) {
		/* Déclarations */
		$lastPage=intval(($nbRes-1)/$this->conf['config.']['maxResPerPages']);
		$currentPage=t3lib_div::intInRange($this->piVars['pointer'],0,$lastPage);
		$startPage=t3lib_div::intInRange($currentPage-($this->conf['config.']['maxPageLink']/2),0,$lastPage);
		$endPage=t3lib_div::intInRange($startPage+$this->conf['config.']['maxPageLink'],0,$lastPage);
		$content='';
		$conf=array();
	
		/* Début */
		if ($startPage==$endPage) return '';
		if ($cacheId) {
			$conf['fromCache']=$cacheId;
		}

		//*** Go to first page
		if ($startPage>0) {
			$conf['pointer']=0;
			$content.=$this->pi_linkTP_keepPIvars($this->cObj->stdWrap('<<',$this->conf['display.']['pagination.']['first.']),$conf,1).' ... ';
		}
		//*** Go to previous page
		if ($currentPage>0) {
			$conf['pointer']=$currentPage-1;
			$content.=$this->pi_linkTP_keepPIvars($this->cObj->stdWrap('<',$this->conf['display.']['pagination.']['prev.']),$conf,1).' ';
		}

		//*** Go to page n°$i
		for ($i=$startPage;$i<($endPage+1);$i++) {
			$conf['pointer']=$i;
			if ($currentPage==$i) {
				$content.=$this->cObj->stdWrap(($i+1),$this->conf['display.']['pagination.']['current.']).' ';//No link if this is current page
			} elseif ($i<$currentPage) {
				$content.=$this->pi_linkTP_keepPIvars($this->cObj->stdWrap(($i+1),$this->conf['display.']['pagination.']['before.']),$conf,1).' ';
			} else {
				$content.=$this->pi_linkTP_keepPIvars($this->cObj->stdWrap(($i+1),$this->conf['display.']['pagination.']['after.']),$conf,1).' ';
			}
		}

		//*** Go to next page
		if ($currentPage<($lastPage)) {
			$conf['pointer']=$currentPage+1;
			$content.=$this->pi_linkTP_keepPIvars($this->cObj->stdWrap('>',$this->conf['display.']['pagination.']['next.']),$conf,1).' ';
		}
		//*** Go to last page
		if ($endPage<($lastPage)) {
			$conf['pointer']=$lastPage;
			$content.='... '.$this->pi_linkTP_keepPIvars($this->cObj->stdWrap('>>',$this->conf['display.']['pagination.']['last.']),$conf,1);
		}

		return $content;
	}

	/**
	 * Call a single external engine, parse the result and return it
	 *
	 * @param array $conf = configuration of the engine
	 * @param string $sword = search words
	 * @access public
	 * @return array 
	 */
	function callExternalEngine($conf) {
		/* Déclarations */
		$params=array();
	
		/* Début */
		$params['lang']=$this->currentSearch['lang'];
		//*** Parse swords before sending it to the engin if necessary. Else the engine has to do it itself (or not)
		if ($conf['parseSWord']) {
			$params['sword']=$this->currentSearch['swordList'];
		} else {
			$params['sword']=$this->currentSearch['swords'];
		}

		if ($this->extConf['enableHighlight'] && $this->conf['config.']['highlight']) {
			$params['addParams']=t3lib_div::implodeArrayForUrl('sword_list',$this->currentSearch['swordList'],'',1);
		}

		switch ($conf['type']){
		case 'this':
			$meth=$conf['userFunc'];
			$result=$this->$meth($params);
			break;
		case 'URL': 
			$url=$conf['baseUrl'];
			$url.=t3lib_div::implodeArrayForUrl($conf['prefix'],$params,$conf['addParams'],TRUE);
			$result=t3lib_div::getURL($url);
			break;
		case 'simulatePi':
			list($table,$uidList)=explode(':',$conf['record']);
			$conf['cObject.']['searchParams.']=$params;

			//*** If result type is array, then we can merge results from multiple objects
			if (strtolower($conf['returnType'])=='array') {
				$result=array();
				foreach (array_filter(explode(',',$uidList),'intval') as $uid) {
					//*** Check row validity
					if (($row=$this->getSingleRow($uid,$table)) && $this->getPageAccess($row['pid'])) {
						//** Check result validity
						if (is_array($tRes=$this->simulatePi($row,$table,$conf))) {
							//** merging (faster than array_merge)
							foreach ($tRes as $val) {
								$result[]=$val;
							}
						}
					}
				}
			} else {
				if (!$row=$this->getSingleRow($uid,$table)) return FALSE;
				$result=$this->simulatePi($row,$table,$conf);
			}
			break;
		case 'multiplePis':
			$conf['cObject.']['searchParams.']=$params;
			$table=trim($conf['table'])?$conf['table']:'tt_content';
			$where=$conf['where'];

			$result=array();
			foreach ($GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*',$table,$where.$this->cObj->enableFields($table)) as $row) {
				//** Check access                    AND THEN     Check result validity
				if ($this->getPageAccess($row['pid']) && is_array($tRes=$this->simulatePi($row,$table,$conf))) {
					//** merging (faster than array_merge)
					foreach ($tRes as $val) $result[]=$val;
				}
			}
			break;
		case 'object': 
		default:
			$result=t3lib_div::callUserFunction($conf['userFunc'],$params,$this);
			break;
		}

		//*** Here we parse the result
		switch (strtolower($conf['returnType'])){
		case 'array': 
		case '': 
			//** Already an array -> no need to parse
			return $result;
			break;
		case 'serialize':
			//** An external engine in php can return a serialized array :)
			return unserialize($result);
			break;
		default:
			//** If else (like an xml result), you can define a parser
			return $this->callResultParser($conf['returnType'],$conf['returnType.'],$result);
			break;
		}
	}

	/**
	 *
	 *
	 * @param 
	 * @access public
	 * @return void 
	 */
	function callResultParser($type,$config,$result) {
		/* Déclarations */
		$conf=$this->conf['resultParsers.'][$type.'.'];
	
		/* Début */
		if (!isset($this->conf['resultParsers.'][$type.'.'])) {
			return array(); //*** Error !
		} else {
			$conf['additionalConfig.']=$config;
			$conf['data']=$result;

			$res=t3lib_div::callUserFunction($conf['userFunc'],$conf,$this);
			return is_array($res)?$res:array();
		}
	}

	/**
	 * Simulate a pi called by a cObj
	 *
	 * @param array $row = the record (typically, a tt_content record wich "contains" a pi !)
	 * @param string $table = the record's table name
	 * @param array $lConf = configuration of the engine
	 * @access public
	 * @return mixed 
	 */
	function simulatePi($row,$table,$lConf) {
		/* Déclarations */
		$cObj=t3lib_div::makeInstance('tslib_cObj');
		$name=trim($lConf['cObject']);
		$conf=$lConf['cObject.'];
	
		/* Début */
		$cObj->start($row,$table);

		//*** Code from tslib_cObj
		// Checking if the COBJ is a reference to another object. (eg. name of 'blabla.blabla = < styles.something')
		if (substr($name,0,1)=='<')	{
			$cF = t3lib_div::makeInstance('t3lib_TSparser');

			// $name and $conf is loaded with the referenced values.
			$old_conf=$conf;
			list($name, $conf) = $cF->getVal(trim(substr($name,1)),$GLOBALS['TSFE']->tmpl->setup);
			if (is_array($old_conf) && count($old_conf))	{
				$conf = $this->arrayMergeRecursive($conf,$old_conf);
			}
		}

		//*** This is not cObj->cObjGetSingle because we must return the result itself !!!
		return $cObj->callUserFunction($conf['userFunc'],$conf,'');
	}

	/******************************************/
	/****** tt_content search functions  ******/
	/******************************************/


	/**
	 *
	 *
	 * @param 
	 * @access public
	 * @return void 
	 */
	function tt_content_search($params) {
		/* Déclarations */
		$rootpage=$this->conf['rootPage']?$this->conf['rootPage']:$GLOBALS['TSFE']->id;
		$pidFullList = $this->pi_getPidList($rootpage,1000);
		$swords=$params['sword'];
		global $TYPO3_DB;
		$res=array();
		$result=array();
		$where='';
	
		/* Début */
		$where.='(';
		$where.='( tt_content.CType=\'header\' AND '.$this->getSearchWhere('tt_content',array('header','subheader'),$swords).')';
		$where.=' OR ((tt_content.CType=\'search\' OR tt_content.CType=\'list\' OR tt_content.CType=\'shortcut\' OR tt_content.CType=\'menu\' OR tt_content.CType=\'login\') AND '.$this->getSearchWhere('tt_content',array('header'),$swords).')';
		$where.=' OR ((tt_content.CType=\'text\' OR tt_content.CType=\'html\' OR tt_content.CType=\'bullets\' OR tt_content.CType=\'table\' OR tt_content.CType=\'multimedia\' OR tt_content.CType=\'mailform\') AND '.$this->getSearchWhere('tt_content',array('header','bodytext'),$swords).')';
		$where.=' OR ( tt_content.CType=\'textpic\' AND '.$this->getSearchWhere('tt_content',array('header','bodytext','imagecaption'),$swords).')';
		$where.=' OR ((tt_content.CType=\'image\' OR tt_content.CType=\'uploads\') AND '.$this->getSearchWhere('tt_content',array('header','imagecaption'),$swords).')';
		$where.=')';

		if ($params['lang']!='all') {
			$where.=' AND tt_content.sys_language_uid IN (-1,'.intval($params['lang']).')';
		}

		//*** Colpos exclusion
		$tArr=array_filter(explode(',',$this->conf['config.']['colposExclude']), 'intval');
		if (count($tArr)) {
			$where.=' AND !(tt_content.colPos IN ('.implode(',',$tArr).'))';
		}

		//*** Page exclusion
		$tArr=array_filter(explode(',',$this->conf['config.']['pageExclude']), 'intval');
		if (count($tArr)) {
			$where.=' AND !(tt_content.pid IN ('.implode(',',$tArr).'))';
		}

		$res=$TYPO3_DB->exec_SELECTgetRows(
			'*',
			'tt_content',
			$where.$this->cObj->enableFields('tt_content')
			);

		if (!$res && $debugOutput) {
			t3lib_div::debug($TYPO3_DB->sql_error(), 'Error SQL !');
		}

		foreach ($res as $val) {
			if ($this->getPageAccess($val['pid'])) $result[]=$this->tt_content_buildResultRow($val,$swords,$params['addParams']);
		}

		return $result;
	}

	/**
	 *
	 *
	 * @param 
	 * @access public
	 * @return void 
	 */
	function tt_content_buildResultRow($val,$swords,$addparams='') {
		/* Déclarations */
		$result=array();
		$words=array();
		$conf=array('parameter'=>$val['pid'],'returnLast'=>'url');
		global $PP_SEARCHENGINE_PI1;
	
		/* Début */
		if (trim($addparams)) {
			$conf['additionalParams']=$addparams;
		}

		
		$result['title']=strip_tags($val['header']);
		if ($val['sys_language_uid']!=-1 && $val['sys_language_uid']!=$GLOBALS['TSFE']->config['sys_language_uid']) $conf['additionalParams'].='&'.(trim($this->conf['config.']['langParam'])?trim($this->conf['config.']['langParam']):'L').'='.$val['sys_language_uid'];
		$result['link']=$this->cObj->typolink('',$conf).'#'.$val['uid'];
		$result['pertinence']=0;

		switch ($val['CType']){
		case 'header': 
			$result['description']=strip_tags($val['subheader']?$val['subheader']:$val['header']);
			list($words,$result['count'])=$PP_SEARCHENGINE_PI1->calculatePertinence(
					array(
						strip_tags($val['header']),
						strip_tags($val['subheader'])
						),
					$swords
					);
			break;
		case 'search': 
		case 'list': 
		case 'shortcut': 
		case 'login': 
			$result['description']='';
			list($words,$result['count'])=$PP_SEARCHENGINE_PI1->calculatePertinence(
					array(
						strip_tags($val['header'])
						),
					$swords
					);
			break;
		case 'text': 
		case 'html': 
		case 'bullets': 
		case 'table': 
		case 'multimedia': 
		case 'mailform': 
			$result['description']=strip_tags($val['bodytext']);
			list($words,$result['count'])=$PP_SEARCHENGINE_PI1->calculatePertinence(
					array(
						strip_tags($val['header']),
						strip_tags($val['bodytext'])
						),
					$swords
					);
			break;
		case 'textpic': 
			$result['description']=strip_tags($val['bodytext']);
			list($words,$result['count'])=$PP_SEARCHENGINE_PI1->calculatePertinence(
					array(
						strip_tags($val['header']),
						strip_tags($val['imagecaption']),
						strip_tags($val['bodytext'])
						),
					$swords
					);
			break;
		case 'image': 
		case 'uploads': 
			$result['description']=strip_tags($val['imagecaption']);
			list($words,$result['count'])=$PP_SEARCHENGINE_PI1->calculatePertinence(
					array(
						strip_tags($val['header']),
						strip_tags($val['imagecaption'])
						),
					$swords
					);
			break;
		}

		$result['pertinence']=count($words);//t3lib_div::debug($words, '$words');
		return $result;
	}


	/******************************************/
	/******         Div funcs            ******/
	/******************************************/


	/**
	 * Return the row $uid in table $table
	 *
	 * @param int $uid = uid of the row
	 * @param string $table = table where to get row
	 * @access public
	 * @return array (or FALSE if not found) 
	 */
	function getSingleRow($uid,$table) {
		/* Déclarations */
		global $TYPO3_DB;
		$res=array();
	
		/* Début */
		if (!$uid || !$table) return FALSE;
		if ($res=$TYPO3_DB->exec_SELECTgetRows('*',$table,$table.'.uid='.$uid.$this->cObj->enableFields($table))) {
			return reset($res);
		} else {
			return FALSE;
		}
	}

	/**
	 * Check if current user can see the page $pid.
	 *
	 * @param int $pid = page uid
	 * @access public
	 * @return boolean 
	 */
	function getPageAccess($pid) {
		/* Déclarations */
		global $TSFE;
		static $cache;
	
		/* Début */
		if (!isset($cache[$pid])) {
			$cache[$pid]=count($TSFE->sys_page->getPage($pid));
		}
		return $cache[$pid];
	}



	/**
	 *
	 *
	 * @param 
	 * @access public
	 * @return void 
	 */
	function getTransArray() {
		return array(
			'ƒ' => 'f',
			'Š' => 'S',
			'Œ' => 'OE',
			'Ž' => 'Z',
			'™' => 'TM',
			'š' => 's',
			'œ' => 'oe',
			'ž' => 'z',
			'Ÿ' => 'Y',
			'À' => 'A',
			'Á' => 'A',
			'Â' => 'A',
			'Ã' => 'A',
			'Ä' => 'A',
			'Å' => 'A',
			'Æ' => 'AE',
			'Ç' => 'C',
			'È' => 'E',
			'É' => 'E',
			'Ê' => 'E',
			'Ë' => 'E',
			'Ì' => 'I',
			'Í' => 'I',
			'Î' => 'I',
			'Ï' => 'I',
			'Ð' => 'D',
			'Ñ' => 'N',
			'Ò' => 'O',
			'Ó' => 'O',
			'Ô' => 'O',
			'Õ' => 'O',
			'Ö' => 'O',
			'Ø' => 'O',
			'Ù' => 'U',
			'Ú' => 'U',
			'Û' => 'U',
			'Ü' => 'U',
			'Ý' => 'Y',
			'à' => 'a',
			'á' => 'a',
			'â' => 'a',
			'ã' => 'a',
			'ä' => 'a',
			'å' => 'a',
			'æ' => 'ae',
			'ç' => 'c',
			'è' => 'e',
			'é' => 'e',
			'ê' => 'e',
			'ë' => 'e',
			'ì' => 'i',
			'í' => 'i',
			'î' => 'i',
			'ï' => 'i',
			'ñ' => 'n',
			'ò' => 'o',
			'ó' => 'o',
			'ô' => 'o',
			'õ' => 'o',
			'ö' => 'o',
			'ø' => 'o',
			'ù' => 'u',
			'ú' => 'u',
			'û' => 'u',
			'ü' => 'u',
			'ý' => 'y',
			'ÿ' => 'y',
			'ð' => 'd',
			);
	}

	/**
	 * Remove all specials characters by ASCII chars
	 *
	 * @param string $str = string to clean
	 * @access public
	 * @return string 
	 */
	function cleanStr($str) {
		global $PP_SEARCHENGINE_PI1;
		$trans=$PP_SEARCHENGINE_PI1->getTransArray();
		return str_replace(array_keys($trans), array_values($trans), $str);
	}


	/******************************************/
	/******      Search words tools      ******/
	/******************************************/



	/**
	 * Parse the input string to put the search words into an array
	 *   Now it assures that all open parenthesis are closed (and make parsing so easy !)
	 *
	 * @param string $sword = string to parse
	 * @access public
	 * @return void 
	 */
	function parseSWord($sword) {
		/* Déclarations */
		$sword=$this->cleanStr($sword).' '; //Cleaning string. The space added is here to ensure that the last char will be interpreted like the endig of a word
		$words=array();
		$current='';
		$findQuote=FALSE;
		$wordStarted=FALSE;
		$addWord=FALSE;
		$parenthesisCounter=0;
	
		/* Début */
		for ($i=0;$i<strlen($sword);$i++) {
			if ($findQuote) { //If we have find a ", then the current word continues to next " ("foo bar" will be interpreted as one word)
				if ($sword[$i]=='"') {//If we find another ", this is the end of the quotation and so the end of the current word
					$findQuote=FALSE;
					$wordStarted=FALSE;
					$addWord=TRUE;
				} else {//Else we add the current char to the current word
					$current.=$sword[$i];
				}
			} elseif ($wordStarted) { //Else if we have already started to build a word
				if ((trim($sword[$i]) || $sword[$i]==='0') && !in_array($current, array(')','(')) && !in_array($sword[$i], array(')','('))) {
					$current.=$sword[$i]; //If we are not at the end of the word (current char is not a space, not a ( and not a ), we add the current char to the current word
				} else {
					$wordStarted=FALSE;
					$addWord=TRUE;
					//If current char is a '(' or a ')', then we go back in order this char will become another word
					//   So  'aword)' will be interpreted as 2 words ('aword' and ')') insted of just one
					if (in_array($sword[$i], array(')','(')) || in_array($current, array(')','('))) $i--;
				}
			} elseif (trim($sword[$i]) || $sword[$i]==='0') { //Else if no word and no quotation has already started AND we have a char
				if ($sword[$i]=='"') {//If currentchar is a " then we start a quotation
					$findQuote=TRUE;
					$wordStarted=TRUE;
				} else {//Else we start a simple word
					$wordStarted=TRUE;
					$current.=$sword[$i];
				}
			}

			//*** Here we add another word to list
			if ($addWord) {
				if ($current=='(') {
					$parenthesisCounter++;//We count the number of open parenthesis
					$words[]=$current;
				} elseif ($current==')') {
					if ($parenthesisCounter>0) {//Add the coling parenthesis only if one was open !
						$parenthesisCounter--;
						$words[]=$current;
					}
				} elseif (strlen($current)>2) {//The words smaller than 3 chars are not added to list
					$words[]=$current;
				}

				$current='';
				$addWord=FALSE;
			}
		}
		//*** Ensure that open parenthesis are closed !
		if ($parenthesisCounter>0) {
			for ($i=0;$i<$parenthesisCounter;$i++) {
				$words[]=')';
			}
		}
		return $words;
	}


	/******************************************/
	/******         Search tools         ******/
	/******************************************/

	/**
	 * Return FALSE if a word should not be interpreted as a search word
	 *
	 * @param string $sword = word to test
	 * @access public
	 * @return boolean
	 */
	function isRealSword($sword) {
		return !in_array(trim($sword),array('OR','AND','(',')'));
	}

	/**
	 * Return the number of search words in the input array (so without parenthesis and operators)
	 *
	 * @param array $swords = search words
	 * @access public
	 * @return int 
	 */
	function countRealSwords($swords) {
		/* Déclarations */
		$count=0;
		global $PP_SEARCHENGINE_PI1;
	
		/* Début */
		foreach ($swords as $val) {
			if ($PP_SEARCHENGINE_PI1->isRealSword($val)) $count++;
		}
		return $count;
	}

	/**
	 * Return the SQL WHERE search condition for the table $tablename, in the fields $fields
	 *   Nowit resolve the parenthesis priority and operators !
	 *
	 * @param string $tablename = table where to search
	 * @param array $fields = fields where to search
	 * @param array $swords = search words
	 * @param int $start = index of the starting search word (used for internal callback, you should not use this)
	 * @access public
	 * @return mixed (string in normal use, array for internal callback) 
	 */
	function getSearchWhere($tablename,$fields,$swords,$start=0) {
		/* Déclarations */
		$operator='';
		$result='';
		$likes=array();
		global $PP_SEARCHENGINE_PI1;
	
		/* Début */
		for ($i=$start;$i<count($swords);$i++) {
			if ($swords[$i]=='AND' || $swords[$i]=='OR') {
				$operator=$swords[$i];
			} elseif ($swords[$i]==')') {
				return array($i,$result);
			} else {
				if ($i!=$start) $result.=($operator)?' '.$operator.' ':' OR ';
				if ($swords[$i]=='(') {
					list($i,$tres)=$PP_SEARCHENGINE_PI1->getSearchWhere($tablename,$fields,$swords,$i+1);
					$result.='('.$tres.')';
				} else {

					$likes=array();
					foreach ($fields as $field) {
						$likes[]='`'.$tablename.'`.`'.$field.'` LIKE \'%'.addslashes($swords[$i]).'%\'';
					}

					$result.='('.implode(' OR ',$likes).')';
				}
				$operator='';
			}
		}

		return $result;
	}

	/**
	 * Returns the search words founds in $row and the number of occurences of theses words
	 *
	 * @param string/array $row = for historical/obscure reasons, it can be an array, but it will be imploded before searching in
	 * @param array $swords = search words
	 * @access public
	 * @return array 
	 */
	function calculatePertinence($row,$swords) {
		/* Déclarations */
		$count=0;
		$words=array();
		$find=FALSE;
		$tempPos=0;
		global $PP_SEARCHENGINE_PI1;
	
		/* Début */
		if (is_array($row)) {
			$where=' '.strtolower($PP_SEARCHENGINE_PI1->cleanStr(implode(' ',$row)));
		} else {
			$where=' '.strtolower($PP_SEARCHENGINE_PI1->cleanStr($row));
		}
		
		foreach ($swords as $word) {
			if ($PP_SEARCHENGINE_PI1->isRealSword($word)) {
				$word=trim(strtolower($PP_SEARCHENGINE_PI1->cleanStr($word)));

				$tempPos=0;
				$find=FALSE;
				while ($tempPos=strpos($where, $word, $tempPos)) {
					$count++;$tempPos++;$find=TRUE;
				}
				if ($find) $words[]=$word;
			}
		}

		return array(array_unique($words),$count);
	}

}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pp_searchengine/pi1/class.tx_ppsearchengine_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pp_searchengine/pi1/class.tx_ppsearchengine_pi1.php']);
}

?>