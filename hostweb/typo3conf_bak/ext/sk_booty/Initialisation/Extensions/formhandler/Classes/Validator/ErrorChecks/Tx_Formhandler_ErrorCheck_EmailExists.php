<?php
/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *
 * $Id: Tx_Formhandler_ErrorCheck_Email.php 50192 2011-07-27 18:42:39Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that a specified field has valid email syntax.
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_EmailExists extends Tx_Formhandler_AbstractErrorCheck {

	public function check() {
		$checkFailed = '';

		// The used function "getmxrr" is not supported on Windows using a PHP version below 5.3.0
		if(version_compare(PHP_VERSION, '5.3.0') < 0 && stristr(PHP_OS, 'win')) {
			$this->utilityFuncs->throwException('error_getmxrr');
		}

		if (isset($this->gp[$this->formFieldName]) && strlen(trim($this->gp[$this->formFieldName])) > 0) {
			$email = $this->gp[$this->formFieldName];
			$hostname = substr($email, strpos($email, '@') + 1);
			$valid = getmxrr($hostname, $mxhosts);
			if($valid) {

				//Sometimes getmxrr returns TRUE, but empty mx hosts.
				$valid = !empty($mxhosts);
			}
			if (!$valid) {
				$checkFailed = $this->getCheckFailed();
			}
		}
		return $checkFailed;
	}

}
?>