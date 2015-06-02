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
 * $Id: Tx_Formhandler_ErrorCheck_SimpleCaptcha.php 40269 2010-11-16 15:23:54Z reinhardfuehricht $
 *                                                                        */

/**
 * Validates that the correct image of possible images displayed by the extension "simple_captcha" got selected.
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 * @package	Tx_Formhandler
 * @subpackage	ErrorChecks
 */
class Tx_Formhandler_ErrorCheck_WtCalculatingCaptcha extends Tx_Formhandler_AbstractErrorCheck {

	public function check() {
		$checkFailed = '';
		if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('wt_calculating_captcha')) {

				// include captcha class
			require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('wt_calculating_captcha') . 'class.tx_wtcalculatingcaptcha.php');

				// generate object
			$captcha = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tx_wtcalculatingcaptcha');

				// check if code is correct
			if (!$captcha->correctCode($this->gp[$this->formFieldName])) {
				$checkFailed = $this->getCheckFailed();
			}

			if(!$this->globals->isAjaxMode()) {
				unset($GLOBALS['TSFE']->fe_user->sesData['wt_calculating_captcha_value']);
			}
		}

		return $checkFailed;
	}

}
?>
