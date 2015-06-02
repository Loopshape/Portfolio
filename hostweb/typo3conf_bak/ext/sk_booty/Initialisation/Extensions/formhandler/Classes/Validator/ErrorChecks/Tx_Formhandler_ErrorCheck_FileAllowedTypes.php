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
 * $Id: Tx_Formhandler_ErrorCheck_FileAllowedTypes.php 85284 2014-05-16 08:39:13Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that an uploaded file via specified field matches one of the given file types
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_FileAllowedTypes extends Tx_Formhandler_AbstractErrorCheck {

	public function init($gp, $settings) {
		parent::init($gp, $settings);
		$this->mandatoryParameters = array('allowedTypes');
	}

	public function check() {
		$checkFailed = '';
		$allowed = $this->utilityFuncs->getSingle($this->settings['params'], 'allowedTypes');
		foreach ($_FILES as $sthg => &$files) {
			if(!is_array($files['name'][$this->formFieldName])) {
				$files['name'][$this->formFieldName] = array($files['name'][$this->formFieldName]);
			}
			foreach($files['name'][$this->formFieldName] as $fileName) {
				if (strlen($fileName) > 0) {
					if ($allowed) {
						$types = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $allowed);
						$fileext = substr($fileName, strrpos($fileName, '.') + 1);
						$fileext = strtolower($fileext);
						if (!in_array($fileext, $types)) {
							unset($files);
							$checkFailed = $this->getCheckFailed();
						}
					}
				}
			}
		}
		return $checkFailed;
	}

}
?>