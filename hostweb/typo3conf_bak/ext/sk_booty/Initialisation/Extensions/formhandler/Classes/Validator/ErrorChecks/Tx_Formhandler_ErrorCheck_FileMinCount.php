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
 * $Id: Tx_Formhandler_ErrorCheck_FileMinCount.php 68656 2012-12-10 15:23:29Z reinhardfuehricht $
 *                                                                        */

/**
 * Abstract class for validators for Formhandler
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	Validator
 */
class Tx_Formhandler_ErrorCheck_FileMinCount extends Tx_Formhandler_AbstractErrorCheck {

	public function init($gp, $settings) {
		parent::init($gp, $settings);
		$this->mandatoryParameters = array('minCount');
	}

	public function check() {
		$checkFailed = '';

		$files = $this->globals->getSession()->get('files');
		$settings = $this->globals->getSession()->get('settings');
		$currentStep = $this->globals->getSession()->get('currentStep');
		$lastStep = $this->globals->getSession()->get('lastStep');
		$minCount = $this->utilityFuncs->getSingle($this->settings['params'], 'minCount');
		if (is_array($files[$this->formFieldName]) &&
			$currentStep > $lastStep) {

			foreach ($_FILES as $idx => $info) {
				if(!is_array($info['name'][$this->formFieldName])) {
					$info['name'][$this->formFieldName] = array($info['name'][$this->formFieldName]);
				}
				if(empty($info['name'][$this->formFieldName][0])) {
					$info['name'][$this->formFieldName] = array();
				}
				if ((count($info['name'][$this->formFieldName]) + count($files[$this->formFieldName])) < $minCount) {
					$checkFailed = $this->getCheckFailed();
				}
			}
		}

		return $checkFailed;
	}

}
?>