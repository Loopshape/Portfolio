<?php
/***************************************************************
*  Copyright notice
*
 * (c) 2014 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
 * All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
tx_rnbase::load('tx_t3socials_models_Base');

/**
 * Model einer netzwerk Konfiguration
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_models
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_models_NetworkConfig
	extends tx_t3socials_models_Base {

	/**
	 * Inits the model instance either with uid or a complete data record.
	 * As the result the instance should be completly loaded.
	 *
	 * @param mixed $rowOrUid
	 * @return void
	 */
	public function init($rowOrUid) {
		// wir haben bereits einen record
		if (is_array($rowOrUid)) {
			$this->uid = isset($rowOrUid['uid']) ? $rowOrUid['uid'] : $rowOrUid['provider_id'];
			$this->record = $rowOrUid;
		}
		// wir haben nur eine uid
		else {
			$this->uid = $rowOrUid;
			$this->record = array();
		}
		$this->initConfig();
	}

	/**
	 * Initialisiert die Konfiguration für das Netzwerk.
	 *
	 * @return void
	 */
	protected function initConfig() {
		if (!$this->hasProperty('provider_id')) {
			$this->setProperty('provider_id', NULL);
		}
		if (!$this->hasProperty('hybridauth_provider')) {
			$this->setProperty('hybridauth_provider', NULL);
		}
		if (!$this->hasProperty('connector')) {
			$this->setProperty('connector', NULL);
		}
		if (!$this->hasProperty('communicator')) {
			$this->setProperty('communicator', NULL);
		}
		if (!$this->hasProperty('description')) {
			$this->setProperty('description',
				'Please enter the customer key into the field "Username"' .
				' and the customer secret into the field "Password".' . CRLF .
				' ###MORE###' . CRLF .
				' To authenticate with a specific account, you have to ' .
				' put the customer token in the fields "access_token" and' .
				' "access_token_secret" of the Configuration.' . CRLF .
				' You can go to the T3Socials User Tools to autehtificate.' . CRLF .
				' A customer end get the tokens from there.' . CRLF
			);
		}
		if (!$this->hasProperty('default_configuration')) {
			$this->setProperty('default_configuration',
				$this->getProviderId() . ' {' .
					'	access_token = ' . CRLF .
					'	access_token_secret =' . CRLF .
				'}'
			);
		}
	}

	/**
	 * Liefert die Provider ID.
	 *
	 * @return string
	 */
	public function getProviderId() {
		return $this->uid;
	}

	/**
	 * Liefert den Übersetzten Tirel der Provider ID.
	 *
	 * @return string
	 */
	public function getProviderTitle() {
		return tx_t3socials_network_Config::translateNetwork($this->getProviderId());
	}

	/**
	 * Liefert die Provider-Name für HybridAuth.
	 *
	 * @return string
	 */
	public function getHybridAuthProviderName() {
		return $this->getProperty('hybridauth_provider');
	}

	/**
	 * Liefert die Beschreibung
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->getProperty('description');
	}

	/**
	 * Liefert die Default TS Konfiguration.
	 *
	 * @return string
	 */
	public function getDefaultConfiguration() {
		return $this->getProperty('default_configuration');
	}

	/**
	 * Liefert den Klassenname des Connectors.
	 *
	 * @return string
	 */
	public function getConnectorClass() {
		return $this->getProperty('connector');
	}

	/**
	 * Liefert den Klassenname des Cominicators.
	 *
	 * @return string
	 */
	public function getCommunicatorClass() {
		return $this->getProperty('communicator');
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_NetworkConfig.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_NetworkConfig.php']);
}
