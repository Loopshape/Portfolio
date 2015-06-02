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
 * @author	Robert Lemke <robert@typo3.org>
 */

class tx_rlmpfiledevlog_testcase extends tx_t3unit_testcase {

	protected $WSDLURI;
	protected $SOAPServiceURI;

	public function __construct ($name) {
		parent::__construct ($name);
	}
	
	public function test_log() {
		
			// Change log file name to our own file:
		$staticConf = unserialize ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rlmp_filedevlog']);
		$savedLogDirAndFileName = $staticConf['logDirAndFilename'];
		$staticConf['logDirAndFilename'] = 't3unit-devlog.log';
		$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rlmp_filedevlog'] = serialize ($staticConf);

			// Send a message to the devlog:
		@unlink (PATH_site.'t3unit-devlog.log');			
		$message = 'T3Unit Test Message'.microtime();
		t3lib_div::devLog($message, 'rlmp_filedevlog', 2, array ('testkey'=>'testvalue'));
		
			// Check if the message was logged:
		self::assertTrue (@is_file (PATH_site.'t3unit-devlog.log'), 'Log file t3unit-devlog.log not found!'); 
		$content = file_get_contents (PATH_site.'t3unit-devlog.log');
 		$stringFound = (strstr ($content, $message)); 
		self::assertTrue ((strlen($stringFound) > 0), 'Didn\'t find the test string in the log file!');

			// Restore original log file name:
		$staticConf['logDirAndFilename'] = $savedLogDirAndFileName;
		$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rlmp_filedevlog'] = serialize ($staticConf);
		@unlink (PATH_site.'t3unit-devlog.log');			
	}
		
}

?>