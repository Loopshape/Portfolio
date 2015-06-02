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
 *                                                                        */

/**
 * Finisher to set the currently used language to a set value.
 * Useful if you want to send the admin email in a specific language and do not want to use the language of the user.
 * 
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Finisher_SetLanguage extends Tx_Formhandler_AbstractFinisher {

	/**
	 * The main method called by the controller
	 *
	 * @return array The probably modified GET/POST parameters
	 */
	public function process() {
		if($this->globals->getSession()->get('originalLanguage') === NULL) {
			$this->globals->getSession()->set('originalLanguage', $GLOBALS['TSFE']->lang);
		}
		$languageCode = $this->utilityFuncs->getSingle($this->settings, 'languageCode');
		if($languageCode) {
			$GLOBALS['TSFE']->lang = strtolower($languageCode);
			$this->utilityFuncs->debugMessage('Language set to "' . $GLOBALS['TSFE']->lang . '"!', array(), 1);
		} else {
			$this->utilityFuncs->debugMessage('Unable to set language! Language code set in TypoScript is empty!', array(), 2);
		}
		return $this->gp;
	}

	/**
	 * Method to define whether the config is valid or not. If no, display a warning on the frontend.
	 * The default value is TRUE. This up to the finisher to overload this method
	 *
	 */
	public function validateConfig() {
		$settings = $this->globals->getSettings();
		if(is_array($settings['finishers.'])) {
			$found = FALSE;
			foreach($settings['finishers.'] as $finisherConfig) {
				$currentFinisherClass = $this->utilityFuncs->getPreparedClassName($finisherConfig);
				if($currentFinisherClass === 'Tx_Formhandler_Finisher_RestoreLanguage') {
					$found = TRUE;
				}
			}
			if(!$found) {
				$this->utilityFuncs->throwException('No Finisher_RestoreLanguage found in the TypoScript setup! You have to reset the language to the original value after you changed it using Finisher_SetLanguage');
			}
		}
		return $found;
	}

}
?>
