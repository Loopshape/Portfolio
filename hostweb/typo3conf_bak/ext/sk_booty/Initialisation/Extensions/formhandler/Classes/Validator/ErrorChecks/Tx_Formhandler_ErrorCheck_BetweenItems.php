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
 * $Id: Tx_Formhandler_ErrorCheck_BetweenItems.php 62904 2012-05-28 17:04:44Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that a specified field is an array and has an item count between two specified values
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_BetweenItems extends Tx_Formhandler_AbstractErrorCheck {

	public function init($gp, $settings) {
		parent::init($gp, $settings);
		$this->mandatoryParameters = array('minValue', 'maxValue');
	}

	public function check() {
		$checkFailed = '';
		$min = intval($this->utilityFuncs->getSingle($this->settings['params'], 'minValue'));
		$max = intval($this->utilityFuncs->getSingle($this->settings['params'], 'maxValue'));
		$removeEmptyValues = $this->utilityFuncs->getSingle($this->settings['params'], 'removeEmptyValues');
		if (isset($this->gp[$this->formFieldName]) && is_array($this->gp[$this->formFieldName])) {
			$valuesArray = $this->gp[$this->formFieldName];
			if (intval($removeEmptyValues) === 1) {
				foreach($valuesArray as $key => $fieldName) {
					if (empty($fieldName)) {
						unset($valuesArray[$key]);
					}
				}
			}
			if (count($valuesArray) < $min || count($valuesArray) > $min) {
				$checkFailed = $this->getCheckFailed();
			}
		} elseif($min > 0) {
			$checkFailed = $this->getCheckFailed();
		}
		return $checkFailed;
	}

}
?>