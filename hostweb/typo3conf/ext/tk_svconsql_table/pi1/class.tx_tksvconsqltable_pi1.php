<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2014 Tomasz Krawczyk <tomasz@typo3.pl>
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
 * Plugin 'Table for Connector SQL' for the 'tk_svconsql_table' extension.
 *
 * @author	Tomasz Krawczyk <tomasz@typo3.pl>
 * @package	TYPO3
 * @subpackage	tx_tksvconsqltable
 */
class tx_tksvconsqltable_pi1 extends tslib_pibase {
	// Same as class name
	public $prefixId      = 'tx_tksvconsqltable_pi1';
	// Path to this script relative to the extension dir.
	public $scriptRelPath = 'pi1/class.tx_tksvconsqltable_pi1.php';
	// The extension key.
	public $extKey        = 'tk_svconsql_table';

	private $formats = Array('string', 'int', 'dec', 'date', 'time');

	private $cacheParams;
	private $fmtParams;
	private $sqlParams;
	private $tableParams;

	private $data;
	private $templates = array();
	protected $cacheInstance;
	private $cacheIdentifier;

	private $arColNames = array();
	private $arColClasses = array();
	private $arRowClasses = array();
	private $arHiddenCols = array();
	private $arColFormats = array();
	private $nCols = 0;
	private $nColClasses = 0;
	private $nRowClasses = 0;
	private $nHiddenCols = 0;
	private $nFormats = 0;
	private $nRows = 0;

	protected function printError($content) {
		$strContent = '<div class="errorMsg">' . $content . '</div>';
		return $this->pi_wrapInBaseClass($strContent);
	}

	protected function getTsConfig() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		$cacheConf = $this->conf['cache.'];
		$this->cacheParams = array(
			'lifetime' => intval($cacheConf['lifetime'])
		);

		$fmtConf = $this->conf['formatting.'];		
		$this->fmtParams = array(
			'dateFormat' => $fmtConf['dateFormat'],
			'timeFormat' => $fmtConf['timeFormat'],
			'decimals' => $fmtConf['decimals'],
			'dec_point' => $fmtConf['dec_point']
		);

		if (strcasecmp($fmtConf['thousands_sep'], 'space') !== 0) {
			$this->fmtParams['thousands_sep'] = $fmtConf['thousands_sep'];
		} else {
			$this->fmtParams['thousands_sep'] = ' ';
		}

		$sqlConf = $this->conf['db.'];
		$this->sqlParams = array(
			'driver' => $sqlConf['driver'],
			'server' => $sqlConf['server'],
			'user' => $sqlConf['user'],
			'password' => $sqlConf['password'],
			'database' => $sqlConf['database'],
			'query' => $sqlConf['query'],
			'init' => $sqlConf['init'],
			'fetchMode' => (strlen($sqlConf['fetchMode']) ? intval($sqlConf['fetchMode']) : 0)
		);

		$tabConf = $this->conf['table.'];
		$this->tableParams = array(
			'templateFile' => $tabConf['templateFile'],
			'border' => $tabConf['border'],
			'cellPadding' => $tabConf['cellPadding'],
			'cellSpacing' => $tabConf['cellSpacing'],
			'class' => $tabConf['class'],
			'caption' => $tabConf['caption'],
			'caption_as_span' => intval($tabConf['caption_as_span']),
			'colNames' => $tabConf['colNames'],
			'colFormats' => $tabConf['colFormats'],
			'hiddenCols' => $tabConf['hiddenCols'],
			'rowClasses' => $tabConf['rowClasses'],
			'colClasses' => $tabConf['colClasses'],
			'captionInFirstCol' => intval($tabConf['captionInFirstCol']),
			'change_col' => intval($tabConf['change_col'])
		);
		return;
	}
	
	protected function getFfConfig() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		// Read FlexForms database values
		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fDriver', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['driver'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fServer', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['server'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fUser', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['user'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fPassword', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['password'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fDatabase', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['database'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fQuery', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['query'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fInit', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['init'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fFetchMode', 'sDEF');
		if (strlen($sTemp))
			$this->sqlParams['fetchMode'] = intval($sTemp);

		// Read FlexForms table values
		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fTemplate', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['templateFile'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fBorder', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['border'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fCellpadding', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['cellPadding'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fCellspacing', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['cellSpacing'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fClass', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['class'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fCaption', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['caption'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fCaptionAsSpan', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['caption_as_span'] = intval($sTemp);

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fColnames', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['colNames'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fColFormats', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['colFormats'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fHiddencols', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['hiddenCols'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fRowclasses', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['rowClasses'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fColclasses', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['colClasses'] = $sTemp;

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fCFirstcol', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['captionInFirstCol'] = intval($sTemp);

		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fChange', 'sTable');
		if (strlen($sTemp))
			$this->tableParams['change_col'] = intval($sTemp);

		// Read Caching values
		$sTemp = $this->pi_getFFvalue( $this->cObj->data['pi_flexform'], 'fLifetime', 'sCache');
		if (strlen($sTemp))
			$this->cacheParams['lifetime'] = intval($sTemp);

		return;
	}
	
	protected function initializeCache() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		if (TYPO3_UseCachingFramework) {
			// page ID & content element ID & language
			$arr = array(
				$GLOBALS['TSFE']->id, 
				$this->cObj->data['uid'], 
				$GLOBALS['TSFE']->sys_language_content
			);
			// unique ID for every content element
			$this->cacheIdentifier = sha1(serialize($arr));

			// $this->cacheParams['lifetime']
			t3lib_cache::initializeCachingFramework();

			// Initialize the cache
			try {
				$this->cacheInstance = $GLOBALS['typo3CacheManager']->getCache($this->extKey);
			}
			catch (t3lib_cache_exception_NoSuchCache $e) {
				// Create the cache
				$this->cacheInstance = $GLOBALS['typo3CacheFactory']->create(
					$this->extKey,
					//'t3lib_cache_frontend_StringFrontend',
					$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$this->extKey]['frontend'],
					$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$this->extKey]['backend'],
					$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$this->extKey]['options']
				);
			}
		}
		return;
	}

	public function init($conf) {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_initPIflexForm();
		$this->pi_loadLL();
		// Configuring so caching is not expected. This value means that no 
		// cHash params are ever set. We do this, because it's a USER_INT object!
		$this->pi_USER_INT_obj = 0;

		// Read TS config
		$this->getTsConfig();

		// Read FlexForms config
		$this->getFfConfig();

		// Load HTML templates
		$this->loadTemplates();

		// Initialize caching framework
		$this->initializeCache();

		if (TYPO3_DLOG) {
			t3lib_div::devLog('SQL parameters', $this->extKey, -1, $this->sqlParams);
			t3lib_div::devLog('Formating parameters', $this->extKey, -1, $this->fmtParams);
			t3lib_div::devLog('Table parameters', $this->extKey, -1, $this->tableParams);
			t3lib_div::devLog('Caching parameters', $this->extKey, -1, $this->cacheParams);
		}
		return;
	}

	protected function formatOutput($sFormatName, $sValue, $iRowNo, $iColNo, $iChange) {

		$sRes = '';
		$strVal = trim($sValue);
		// Hook for custom formatting
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['formatOutputHook'])) {
			foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['formatOutputHook'] as $classRef) {
				$procObj = &t3lib_div::getUserObj($classRef);
				$params = array(
					'FORMAT_NAME' => $sFormatName, 
					'VALUE1' => $sValue, 
					'ROW_NUMBER' => $iRowNo, 
					'COL_NUMBER' => $iColNo, 
					'VALUE2' => $iChange
				);
				return $_procObj->formatOutputProcessor($params, $this->fmtParams);
			}
		}

		switch($sFormatName) {
			case 'int':
				$sRes = number_format( intval($strVal), 0, $this->fmtParams['dec_point'], $this->fmtParams['thousands_sep']);
				break;
				
			case 'dec':
				$sRes = number_format( floatval($strVal),
							$this->fmtParams['decimals'], 
							$this->fmtParams['dec_point'], 
							$this->fmtParams['thousands_sep']
				);
				break;

			case 'date':
				$sRes = date($this->fmtParams['dateFormat'], $strVal);
				break;

			case 'time':
				$sRes = date($this->fmtParams['timeFormat'], $strVal);
				break;

			default:
				switch (strtolower($GLOBALS['TYPO3_CONF_VARS']['SYS']['t3lib_cs_utils'])) {
					case 'mbstring':
						$sRes = mb_convert_encoding($strVal, 'UTF-8');
						break;

					case 'iconv':
						$sRes = iconv($strVal, 'UTF-8');
						break;

					default:
						$sRes = $strVal;
						break;
				}
				$sRes = htmlspecialchars($sRes);
				break;
		};
		
		return $sRes;
	}

	protected function getData() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		// Connect to service
		$services = t3lib_extMgm::findService('connector', 'sql');
		if ($services === FALSE) {
			return $this->printError( $this->pi_getLL('no_svconnector_sql') );
		} else {
			$connector = t3lib_div::makeInstanceService('connector', 'sql');
		}

		// Get data from external database
		$this->data = $connector->fetchArray($this->sqlParams);
		$this->nRows = count($this->data);

		if ($this->nRows > 0) {
			if (TYPO3_DLOG) 
				t3lib_div::devLog('External data', $this->extKey, -1, $this->data);
		} else {
			if (TYPO3_DLOG) 
				t3lib_div::devLog('External data - no records returned', $this->extKey);
			return $this->pi_getLL('no_records');
		}

		return '';
	}

	protected function loadTemplates() {
			
		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		$templateCode = $this->cObj->fileResource($this->tableParams['templateFile']);
		$this->templates['TEMPLATE_TABLE']            = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE###');
		$this->templates['TEMPLATE_TABLE_HEADER']     = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_HEADER###');
		$this->templates['TEMPLATE_TABLE_BODY']       = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_BODY###');
		$this->templates['TEMPLATE_TABLE_FOOTER']     = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_FOOTER###');
		$this->templates['TEMPLATE_TABLE_HEADER_ROW'] = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_HEADER_ROW###');
		$this->templates['TEMPLATE_TABLE_ROW']        = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_ROW###');
		$this->templates['TEMPLATE_TABLE_ROW_ALT']    = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_ROW_ALT###');
		$this->templates['TEMPLATE_TABLE_CELL']       = $this->cObj->getSubpart($templateCode, '###TEMPLATE_TABLE_CELL###');
		$this->templates['TEMPLATE_HEADER_CELL']      = $this->cObj->getSubpart($templateCode, '###TEMPLATE_HEADER_CELL###');		

		return;
	}

	protected function loadTableParameters() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		$this->arColNames   = t3lib_div::trimExplode(',', $this->tableParams['colNames'], FALSE);
		$this->arColClasses = t3lib_div::trimExplode(',', $this->tableParams['colClasses'], FALSE);
		$this->arRowClasses = t3lib_div::trimExplode(',', $this->tableParams['rowClasses'], FALSE);
		$this->arHiddenCols = t3lib_div::trimExplode(',', $this->tableParams['hiddenCols'], TRUE);

		$arTmp = t3lib_div::trimExplode(',', $this->tableParams['colFormats'], FALSE);
		$c = count($arTmp);

		for ($i = 0; $i < $c; $i++) {
			if (in_array($arTmp[$i], $this->formats)) {
				$this->arColFormats[] = strtolower($arTmp[$i]);
			} else {
				$this->arColFormats[] = 'string';
			}
		}

		$this->nCols = count($this->arColNames);		
		$this->nColClasses = count($this->arColClasses);
		$this->nRowClasses = count($this->arRowClasses);
		$this->nHiddenCols = count($this->arHiddenCols);
		$this->nFormats = count($this->arColFormats);

		return;
	}

	protected function checkSqlParameters() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		if ($this->sqlParams['driver'] == '' )
			return $this->pi_getLL('no_db_driver_set');

		if ($this->sqlParams['server'] == '' )
			return $this->pi_getLL('no_db_server_set');

		if ($this->sqlParams['user'] == '' )
			return $this->pi_getLL('no_db_user_set');

		if ($this->sqlParams['password'] == '' )
			return $this->pi_getLL('no_db_password_set');

		if ($this->sqlParams['database'] == '' )
			return $this->pi_getLL('no_db_database_set');

		if ($this->sqlParams['query'] == '' )
			return $this->pi_getLL('no_db_query_set');

		return '';
	}

	protected function checkTableParametrs() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		if ($this->nFormats != $this->nCols)
			return $this->pi_getLL('amount_cols_n_formats');

		if ($this->nColClasses != $this->nCols)
			return $this->pi_getLL('amount_cols_n_col_classes');

		return '';
	}

	public function printTable() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		// Main table parameters
		$markers = array();

		if ($this->tableParams['captionInFirstCol'] == 1) {

			if ($this->tableParams['caption_as_span']) {
				$markers['TABLE_CAPTION1'] = '<span class="caption">' . 
					$this->formatOutput($this->arColFormats[0], $this->data[0][0], 0, 0, 0) . '</span>';
				$markers['TABLE_CAPTION2'] = '';
			} else {
				$markers['TABLE_CAPTION1'] = '';
				$markers['TABLE_CAPTION2'] = '<caption>' . 
					$this->formatOutput($this->arColFormats[0], $this->data[0][0], 0, 0, 0) . '</caption>';
			}
		} elseif ($this->tableParams['caption'] !== '') {

			if ($this->tableParams['caption_as_span']) {
				$markers['TABLE_CAPTION1'] = '<span class="caption">' . strval($this->tableParams['caption']) . '</span>';
				$markers['TABLE_CAPTION2'] = '';
			} else {
				$markers['TABLE_CAPTION1'] = '';
				$markers['TABLE_CAPTION2'] = '<caption>' . strval($this->tableParams['caption']) . '</caption>';
			}
		} else {
			$markers['TABLE_CAPTION1'] = '';
			$markers['TABLE_CAPTION2'] = '';
		}

		if ($this->tableParams['border'] !== '') {
			$markers['TABLE_BORDER'] = ' border="' . intval($this->tableParams['border']) . '"';
		} else {
			$markers['TABLE_BORDER'] = '';
		}

		if ($this->tableParams['cellPadding'] !== '') {
			$markers['TABLE_CELL_PADDING'] = ' cellpadding="' . intval($this->tableParams['cellPadding']) . '"';
		} else {
			$markers['TABLE_CELL_PADDING'] = '';
		}

		if ($this->tableParams['cellSpacing'] !== '') {
			$markers['TABLE_CELL_SPACING'] = ' cellspacing="' . intval($this->tableParams['cellSpacing']) . '"';
		} else {
			$markers['TABLE_CELL_SPACING'] = '';
		}

		if ($this->tableParams['class'] !== '') {
			$markers['TABLE_CLASS'] = ' class="' . strval($this->tableParams['class']) . '"';
		} else {
			$markers['TABLE_CLASS'] = '';
		}

		$content = $this->cObj->substituteMarkerArray($this->templates['TEMPLATE_TABLE'], $markers, '###|###');

		// Table header
		$strRow = '';
		$strCells = '';
		for ($i = 0; $i < $this->nCols; $i++) {
			if ($this->nHiddenCols > 0) {
				if (!in_array($i, $this->arHiddenCols))
					$strCells .= $this->cObj->substituteMarker(
						$this->templates['TEMPLATE_HEADER_CELL'], '###CELL_VALUE###', trim($this->arColNames[$i]));
			} else {
				$strCells .= $this->cObj->substituteMarker(
					$this->templates['TEMPLATE_HEADER_CELL'], '###CELL_VALUE###', trim($this->arColNames[$i]));
			}
		}

		$strRow = $this->cObj->substituteMarker($this->templates['TEMPLATE_TABLE_HEADER_ROW'], '###ROW_CELLS###', $strCells);
		$tableHeader = $this->cObj->substituteMarker($this->templates['TEMPLATE_TABLE_HEADER'], '###HEAD_ROWS###', $strRow);

		// 	Table body
		$strRows = '';
		for ($i = 0; $i < $this->nRows; $i++) {

			$row = $this->data[$i];

			// Get change value
			if ($this->tableParams['change_col'] > 0) {

				if ($row[$this->tableParams['change_col'] - 1] == 0) {
					$iChange = 0;
				} elseif ($row[$this->tableParams['change_col'] - 1] > 0) {
					$iChange = 1;
				} else {
					$iChange = 2;
				}
			}

			$strCells = '';
			foreach ($row as $key => $value) {
				if ($this->nHiddenCols > 0) {
					if (!in_array($key, $this->arHiddenCols)) {
						$markers = array(
							'CELL_CLASS' => (strlen($this->arColClasses[$key])) ? ' class="' . $this->arColClasses[$key] . '"' : '',
							'CELL_VALUE' => $this->formatOutput($this->arColFormats[$key], $value, $i, $key, $iChange)
						);
						$strCells .= $this->cObj->substituteMarkerArray($this->templates['TEMPLATE_TABLE_CELL'], $markers, '###|###');
					}
				} else {
					$markers = array(
						'CELL_CLASS' => (strlen($this->arColClasses[$key])) ? ' class="' . $this->arColClasses[$key] . '"' : '',
						'CELL_VALUE' => $this->formatOutput($this->arColFormats[$key], $value, $i, $key, $iChange)
					);
					$strCells .= $this->cObj->substituteMarkerArray($this->templates['TEMPLATE_TABLE_CELL'], $markers, '###|###');
				}
			}

			$markers = array(
				'ROW_CLASS' => (strlen($this->arRowClasses[$i % $this->nRowClasses])) ? 
					' class="' . $this->arRowClasses[$i % $this->nRowClasses] . '"' : 
					'',
				'ROW_CELLS' => $strCells
			);
			$strRows .= $this->cObj->substituteMarkerArray($this->templates['TEMPLATE_TABLE_ROW'], $markers, '###|###');
		}
		$tableBody .= $this->cObj->substituteMarker($this->templates['TEMPLATE_TABLE_BODY'], '###BODY_ROWS###', $strRows);

		// 	Table footer
		/*
		CELL_CLASS
		CELL_VALUE
		TEMPLATE_TABLE_CELL
		TEMPLATE_TABLE_ROW
		FOOTER_ROWS
		TEMPLATE_TABLE_FOOTER
		*/
		$tableFooter = '';
		
		// Table finalization
		$markers = array(
			'TABLE_HEAD' => $tableHeader,
			'TABLE_BODY' => $tableBody,
			'TABLE_FOOT' => $tableFooter
		);		
		$content = $this->cObj->substituteMarkerArray($content, $markers, '###|###');

		return $content;
	}

	protected function generateTable() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		// Check SQL params
		$strTmp = $this->checkSqlParameters();

		if (strlen($strTmp))
			return $this->pi_wrapInBaseClass($this->printError($strTmp));

		// Load table parameters
		$this->loadTableParameters();

		$strTmp = $this->checkTableParametrs();
		if (strlen($strTmp))
			return $this->pi_wrapInBaseClass($this->printError($strTmp));

		// get data from external database
		$strTmp = $this->getData();
		if (strlen($strTmp))
			return $this->pi_wrapInBaseClass($this->printError($strTmp));

		return $this->pi_wrapInBaseClass($this->printTable());
	}

	protected function getCachedTable() {

		if (TYPO3_DLOG) 
			t3lib_div::devLog(__METHOD__, $this->extKey);

		// If $entry is null, it hasn't been cached. Calculate the value and
		// store it in the cache:
		if (($entry = $this->cacheInstance->get($this->cacheIdentifier)) === FALSE) {

			$entry = $this->generateTable();

			// [calculate lifetime and assigned tags]
			// extKey + content element ID
			$tags = array($this->extKey . '_' . $this->cObj->data['uid']);

			// Save value in cache
			$this->cacheInstance->set($this->cacheIdentifier, $entry, $tags, $this->cacheParams['lifetime']);
		}
		return $entry;
	}

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	public function main($content, $conf) {

		$this->init($conf);

		if (TYPO3_UseCachingFramework) {
			$content = $this->getCachedTable();		
		} else {
			$content = $this->generateTable();
		}

		$content = $this->cObj->stdWrap( $content, $this->conf['stdWrap.'] );

		return $content;
	}
}

if (defined('TYPO3_MODE') && 
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tk_svconsql_table/pi1/class.tx_tksvconsqltable_pi1.php']) {
	require_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tk_svconsql_table/pi1/class.tx_tksvconsqltable_pi1.php']);
}
?>