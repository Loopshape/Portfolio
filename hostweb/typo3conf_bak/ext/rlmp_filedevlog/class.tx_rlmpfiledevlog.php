<?php
/***************************************************************
*  Copyright notice
*  
*  (c) 2005 Robert Lemke (robert@typo3.org)
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
 * devlog function for the 'rlmp_filedevlog' extension.
 *
 * @author	Robert Lemke <robert@typo3.org>
 */




class tx_rlmpfiledevlog {
	var $extKey = 'rlmp_filedevlog';	// The extension key.
	
	/**
	 * Developer log
	 *
	 * $logArr = array('msg'=>$msg, 'extKey'=>$extKey, 'severity'=>$severity, 'dataVar'=>$dataVar);
	 * 'msg'		string		Message (in english).
	 * 'extKey'		string		Extension key (from which extension you are calling the log)
	 * 'severity'	integer		Severity: 0 is info, 1 is notice, 2 is warning, 3 is fatal error, -1 is "OK" message
	 * 'dataVar'	array		Additional data you want to pass to the logger.
	 * 
	 * @param	array		log data array
	 * @return void	 
	 */
	function devLog($logArr)	{
		global $TYPO3_CONF_VARS;

		$staticConf = unserialize ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rlmp_filedevlog']);
		if (!is_array ($staticConf)) return;
		$logDirAndFileName = $staticConf['logDirAndFilename'];
		if (!strlen ($logDirAndFileName)) return;
		
		if (substr ($logDirAndFileName, 0, 1) != '/') $logDirAndFileName = PATH_site . $logDirAndFileName; 

		$severity = array (
			'0'  => 'INFO    ',
			'1'  => 'NOTICE  ',
			'2'  => 'WARNING ',
			'3'  => 'FATAL   ',
			'-1' => 'OK      ',
		);		
		
		$output = strftime ('%y-%m-%d %T', time()). ' ' . $severity[$logArr['severity']] . ' ' . str_pad ($logArr['extKey'], 20). ' '.$logArr['msg'].chr(10);		
		if (!empty($logArr['dataVar'])) {
			$output .= $this->getPrintable ($logArr['dataVar']) . chr(10);	
		}
		if ($fh = @fopen ($logDirAndFileName, 'a')) {
			fputs ($fh, $output);
			fclose ($fh);	
		}		
	}
	
	/**
	 * Returns a suitable form of a variable (be it a string, array, object ...) for logfile output
	 * 
	 * @param	mixed	$var: The variable
	 * @param	integer	$spaces: Number of spaces to add before a line
	 * @return	string	text output
	 */
	function getPrintable($var, $spaces=4) {
		if ($spaces > 100) return;
		$out = '';
		if (is_array ($var)) {
			foreach ($var as $k=>$v) {
				if (is_array ($v)) {
					$out .= str_repeat (' ',$spaces).$k.' => array ('.chr(10).$this->getPrintable($v, $spaces+3).str_repeat (' ',$spaces).')'.chr(10);
				} else {
					if (is_object($v)) {
						$out .= str_repeat (' ',$spaces).$k.' => object: '.get_class ($v).chr(10);
					} else {
						$out .= str_repeat (' ',$spaces).$k.' => '.$v.chr(10);
					}
				}
			}
			return $out;
		} else {
			if (is_object($var)) {
				$out .= str_repeat (' ',$spaces).' [ OBJECT: '.strtoupper(get_class ($var)).' ]:'.chr(10);
				if (is_array (get_object_vars ($var))) {
					foreach (get_object_vars ($var) as $objVarName => $objVarValue) {
						if (is_array ($objVarValue) || is_object ($objVarValue)) {
							$out .= str_repeat (' ',$spaces). $objVarName . ' => '.chr(10);
							$out .= $this->getPrintable ($objVarValue, $spaces+3);
						} else {
							$out .= str_repeat (' ',$spaces). $objVarName . ' => ' .$objVarValue.chr(10);
						}	
					}	
				}
				$out .=chr(10);
			} else {
				$out .= str_repeat (' ',$spaces).'=> '.$var.chr(10);
			}
			return $out;
		}
	}
}

?>