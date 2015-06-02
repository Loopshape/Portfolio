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
tx_rnbase::load('tx_t3socials_models_NetworkConfig');

/**
 * Facebook Configuration
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_facebook_NetworkConfig
	extends tx_t3socials_models_NetworkConfig {

	/**
	 * Initialisiert die Konfiguration für das Netzwerk.
	 *
	 * @return void
	 */
	protected function initConfig() {
		parent::initConfig();
		$this->setProperty('provider_id', $this->uid = 'facebook');
		$this->setProperty('hybridauth_provider', 'Facebook');
		$this->setProperty('connector', 'tx_t3socials_network_facebook_Connection');
		$this->setProperty('communicator', 'tx_t3socials_mod_handler_Facebook');
		$this->setProperty('description',
			'Please enter the customer key into the field "Username"' .
			' and the customer secret into the field "Password".' . CRLF .
			' ###MORE###' . CRLF .
			' To authenticate with a specific account, you have to ' .
			' put the customer token in the field "access_token"' .
			' of the Configuration.' . CRLF .
			' You can go to the T3Socials User Tools to autehtificate.' . CRLF .
			' A customer end get the token from there.' . CRLF
		);
		$this->setProperty('default_configuration',
			$this->getProviderId() . ' {' .
			'	access_token = ' . CRLF .
			'}'
		);
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/facebook/class.tx_t3socials_network_facebook_Connection.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/facebook/class.tx_t3socials_network_facebook_Connection.php']
	);
}
