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
 * $Id: Tx_Formhandler_ErrorCheck_BetweenLength.php 50192 2011-07-27 18:42:39Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that a specified field is a string and has a word count between two specified values
 *
 * @author	Rik Willems <service@metmeer.nl>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_BetweenWordCount extends Tx_Formhandler_AbstractErrorCheck {

	public function init($gp, $settings) {
		parent::init($gp, $settings);
		$this->mandatoryParameters = array('minValue', 'maxValue');
	}

	public function check() {
		$checkFailed = '';
		$min = intval($this->utilityFuncs->getSingle($this->settings['params'], 'minValue'));
		$max = intval($this->utilityFuncs->getSingle($this->settings['params'], 'maxValue'));
		if (isset($this->gp[$this->formFieldName]) &&
			(str_word_count($this->gp[$this->formFieldName]) < intval($min) ||
			str_word_count($this->gp[$this->formFieldName]) > intval($max))) {

			$checkFailed = $this->getCheckFailed();
		}
		return $checkFailed;
	}

}
?>