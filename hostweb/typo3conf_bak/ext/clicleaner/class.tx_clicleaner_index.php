<?php
/***************************************************************
*  Copyright notice
*  
*  (c) 2011 Arnd Messer (typo3@medienagenten.de)
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
 * This class provides the functionality for the tx_clicleaner_index module of the lowlevel_cleaner
 *
 * @author		Arnd Messer (LastName@medienagenten.de)
 * @package		TYPO3
 * @subpackage	tx_clicleaner
 */
class tx_clicleaner_index extends tx_lowlevel_cleaner_core {

	protected $extKey = 'clicleaner';	// The extension key
	protected $tables = 'index_fulltext, index_phash, index_section, index_words, index_rel, index_grlist'; // List of index tables to clear
	protected $result = array(); // The results of the analysis run

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::tx_lowlevel_cleaner_core();

			// Load the language file and set base messages for the lowlevel interface
		$GLOBALS['LANG']->includeLLFile('EXT:' . $this->extKey . '/locallang.xml');

			// Setting up help:
		$this->cli_help['name'] = $GLOBALS['LANG']->getLL('name');
		$this->cli_help['description'] = trim($GLOBALS['LANG']->getLL('description'));
		$this->cli_help['author'] = 'Arnd Messer';

			// Setting up options:
		$this->cli_options[] = array('--index', $GLOBALS['LANG']->getLL('options.index'));
	}

	/**
	 * This method is called by the lowlevel_cleaner script when running without the AUTOFIX option
	 * It just returns a preview of could happen if the script was run for real
	 *
	 * @return	array	Result structure, as expected by the lowlevel_cleaner
	 * @see tx_lowlevel_cleaner_core::cli_main()
	 */
	public function main() {

			// Initialize result array
		$resultArray = array(
			'message' => $this->cli_help['name'] . chr(10) . chr(10) . $this->cli_help['description'],
			'headers' => array(
				'RECORDS_TO_CLEAN' => array(
					$GLOBALS['LANG']->getLL('cleantest.header'), $GLOBALS['LANG']->getLL('cleantest.description'), 1
				)
			),
			'RECORDS_TO_CLEAN' => array()
		);
		
			// schow results for --index
		if(isset($this->cli_args['--index'])) {
			$table = explode(',', $this->tables);
			foreach($table as $key => $val) {
				$val = trim($val);
				$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('COUNT(*) AS total', $val);
				$row = $GLOBALS['TYPO3_DB']->sql_fetch_row($res);
				$message = sprintf($GLOBALS['LANG']->getLL('recordsToDelete'), $val, $row[0]);
				$this->result[$val] = $row[0];
				$resultArray['RECORDS_TO_CLEAN'][] = $message;
			}
		}
		$GLOBALS['TYPO3_DB']->sql_free_result($res);
		
		return $resultArray;
	}

	/**
	 * This method is called by the lowlevel_cleaner script when running *with* the AUTOFIX option
	 * 
	 * @return	void
	 * @see tx_lowlevel_cleaner_core::cli_main()
	 */
	public function main_autofix($resultArray) {
		if(isset($this->cli_args['--index'])) {
			$table = explode(',', $this->tables);
			foreach($table as $key => $val) {	
				$val = trim($val);
				if($this->result[$val] > 0) {
						// print status message
					echo sprintf($GLOBALS['LANG']->getLL('cleaningRecords'), $val) . '(' . $this->result[$val] . ')' . PHP_EOL;
						// TRUNCATE table
					$GLOBALS['TYPO3_DB']->exec_TRUNCATEquery($val);
				}
				else {
						// no records to delete message
					echo sprintf($GLOBALS['LANG']->getLL('noRecordsToDelete'), $val) . PHP_EOL;
				}
			}
		}
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/clicleaner/class.tx_clicleaner_index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/clicleaner/class.tx_clicleaner_index.php']);
}
?>