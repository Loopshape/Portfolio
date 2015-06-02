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
 * $Id: Tx_Formhandler_ErrorCheck_Date.php 85284 2014-05-16 08:39:13Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that a specified field's value is a valid date
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_Date extends Tx_Formhandler_AbstractErrorCheck {

	public function init($gp, $settings) {
		parent::init($gp, $settings);
		$this->mandatoryParameters = array('pattern');
	}

	public function check() {
		$checkFailed = '';

		if (isset($this->gp[$this->formFieldName]) && strlen(trim($this->gp[$this->formFieldName])) > 0) {

			// find out separator
			$pattern = $this->utilityFuncs->getSingle($this->settings['params'], 'pattern');
			$upperCaseYearPattern = str_replace('y', 'Y', $this->utilityFuncs->normalizeDatePattern($pattern));
			preg_match('/^[d|m|y]*(.)[d|m|y]*/i', $pattern, $res);
			$sep = $res[1];

			// normalisation of format
			$pattern = $this->utilityFuncs->normalizeDatePattern($pattern, $sep);

			// find out correct positions of "d","m","y"
			$pos1 = strpos($pattern, 'd');
			$pos2 = strpos($pattern, 'm');
			$pos3 = strpos($pattern, 'y');
			$dateCheck = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode($sep, $this->gp[$this->formFieldName]);
			if (sizeof($dateCheck) !== 3) {
				$checkFailed = $this->getCheckFailed();
			} elseif (intval($dateCheck[0]) === 0 || intval($dateCheck[1]) === 0 || intval($dateCheck[2]) === 0) {
				$checkFailed = $this->getCheckFailed();
			} elseif (!checkdate($dateCheck[$pos2], $dateCheck[$pos1], $dateCheck[$pos3])) {
				$checkFailed = $this->getCheckFailed();
			} elseif (strlen($dateCheck[$pos3]) !== 4) {
				$checkFailed = $this->getCheckFailed();
			} elseif (DateTime::createFromFormat($upperCaseYearPattern, $this->gp[$this->formFieldName]) === FALSE) {
				$checkFailed = $this->getCheckFailed();
			}
		}
		return $checkFailed;
	}

}
?>