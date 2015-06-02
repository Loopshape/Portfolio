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
 * $Id: Tx_Formhandler_AbstractErrorCheck.php 72298 2013-03-06 09:06:14Z reinhardfuehricht $
 *                                                                        */

/**
 * Abstract class for error checks for Formhandler
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
abstract class Tx_Formhandler_AbstractErrorCheck extends Tx_Formhandler_AbstractComponent {

	protected $formFieldName;
	protected $mandatoryParameters = array();

	public function process() {
		
	}

	public function setFormFieldName($name) {
		$this->formFieldName = $name;
	}

	/**
	 * Sets the suitable string for the checkFailed message parsed in view.
	 *
	 * @return string If the check failed, the string contains the name of the failed check plus the parameters and values.
	 */
	abstract public function check();

	/**
	 * Sets the suitable string for the checkFailed message parsed in view.
	 *
	 * @param array $check The parsed check settings
	 * @return string The check failed string
	 */
	protected function getCheckFailed() {
		$checkFailed = $this->settings['check'];
		if (is_array($this->settings['params'])) {
			$checkFailed .= ';';
			foreach ($this->settings['params'] as $key => $value) {
				$checkFailed .= $key . '::' . $this->utilityFuncs->getSingle($this->settings['params'], $key) . ';';
			}
			$checkFailed = substr($checkFailed, 0, (strlen($checkFailed) - 1));
		}
		return $checkFailed;
	}

	public function validateConfig() {
		$valid = TRUE;
		if(!$this->formFieldName) {
			$this->utilityFuncs->throwException('error_checks_form_field_name_missing', $this->settings['check']);
		}

		if(!empty($this->mandatoryParameters)) {
			if(!$this->settings['params']) {
				$this->utilityFuncs->throwException('error_checks_parameters_missing', $this->settings['check'], implode(',', $this->mandatoryParameters));
			}
			foreach($this->mandatoryParameters as $param) {
				if(!isset($this->settings['params'][$param])) {
					$this->utilityFuncs->throwException('error_checks_unsufficient_parameters', $param, $this->settings['check']);
				}
			}
		}
		return $valid;
	}

}
?>
