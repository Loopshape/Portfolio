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
 * $Id: Tx_Formhandler_ErrorCheck_NotDefaultValue.php 85286 2014-05-16 08:58:53Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that a specified field doesn't equal a specified default value.
 * This default value could have been set via a PreProcessor.
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_NotDefaultValue extends Tx_Formhandler_AbstractErrorCheck {

	public function init($gp, $settings) {
		parent::init($gp, $settings);
		$this->mandatoryParameters = array('defaultValue');
	}

	public function check() {
		$checkFailed = '';
		if (isset($this->gp[$this->formFieldName]) && strlen(trim($this->gp[$this->formFieldName])) > 0) {
			$defaultValue = $this->utilityFuncs->getSingle($this->settings['params'], 'defaultValue');
			if (strlen($defaultValue) > 0) {
				if (strcmp($defaultValue, $this->gp[$this->formFieldName]) === 0) {
					$checkFailed = $this->getCheckFailed();
				}
			}
		}
		return $checkFailed;
	}

}
?>