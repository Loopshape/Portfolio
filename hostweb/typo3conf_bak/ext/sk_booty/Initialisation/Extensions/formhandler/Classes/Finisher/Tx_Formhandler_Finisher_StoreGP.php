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
 * $Id: Tx_Formhandler_Finisher_StoreGP.php 67354 2012-10-22 14:01:36Z reinhardfuehricht $
 *                                                                        */

/**
 * This finisher stores GP to session for further use in other plugins and update session 
 * to not loose changes in gp made by other finishers (e.g. insert_id from Finisher_DB)
 * Automaically called if plugin.Tx_Formhandler.settings.predef.example.storeGP = 1 is set
 * No further configuration.
 *
 * @author Johannes Feustel
 */
class Tx_Formhandler_Finisher_StoreGP extends Tx_Formhandler_AbstractFinisher {

	/**
	 * The main method called by the controller
	 *
	 * @return array The probably modified GET/POST parameters
	 */
	public function process() {

		//store in Session for further use by other plugins
		$this->storeUserGPinSession();

		//update values in session
		$this->updateSession();

		return $this->gp;
	}

	/**
	 * Stores the GP in session.
	 *
	 * @return void
	 */
	protected function storeUserGPinSession() {
		$sessionKey = 'finisher-storegp';
		if($this->settings['sessionKey']) {
			$sessionKey = $this->utilityFuncs->getSingle($this->settings, 'sessionKey');
		}
		$dataToStoreInSession = $this->gp;
		$GLOBALS['TSFE']->fe_user->setKey('ses', $sessionKey, $dataToStoreInSession);
		$GLOBALS['TSFE']->fe_user->storeSessionData();
	}

	/**
	 * Stores $this->gp parameters in SESSION
	 * actually only needed for finisher_submittedok
	 *
	 * @return void
	 */
	protected function updateSession() {

		$newValues = array();

		//set the variables in session
		//no need to seperate steps in finishers, so simply store to step 1
		foreach ($this->gp as $key => $value) {
			$newValues[1][$key] = $value;
		}
		$this->globals->getSession()->set('values', $newValues);
	}

}
?>
