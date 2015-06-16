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
tx_rnbase::load('tx_t3socials_network_Connection');
tx_rnbase::load('tx_t3socials_network_hybridauth_Interface');
tx_rnbase::load('tx_rnbase_util_Logger');


/**
 * Basisklasse einer HybridAuth Verbindung
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
abstract class tx_t3socials_network_hybridauth_Connection
	extends tx_t3socials_network_Connection
		implements tx_t3socials_network_hybridauth_Interface {

	/**
	 * @var Hybrid_Providers_Twitter
	 */
	private $provider = NULL;

	/**
	 * Liefert die Provider ID für HybridAuth.
	 *
	 * @return string
	 */
	protected function getHybridAuthProviderId() {
		return $this->getNetworkConfig()->getHybridAuthProviderName();
	}

	/**
	 * Liefert die Konfiguration für HybridAuth.
	 *
	 * @return array
	 */
	public function getHybridAuthConfig() {
		$network = $this->getNetwork();
		if (!$network instanceof tx_t3socials_models_Network) {
			throw new Exception('Missing network. The network has to be inject into the connection!');
		}
		$config = array (
			'enabled' => TRUE,
			'networkUid' => $network->getUid(),
			'keys' => array(
				'key' => $network->getUsername(),
				'secret' => $network->getPassword(),
			)
		);
		$accessToken = $this->getConfigData('access_token');
		$accessTokenSecret = $this->getConfigData('access_token_secret');
		if ($accessToken && $accessTokenSecret) {
			$config['keys']['access_token'] = $accessToken;
			$config['keys']['access_token_secret'] = $accessTokenSecret;
		}
		return $config;
	}


	/**
	 * Liefert den HybridAuth Provider
	 *
	 * @return Hybrid_Provider_Adapter
	 */
	public function getProvider() {
		if (is_null($this->provider)) {
			tx_rnbase::load('tx_t3socials_network_HybridAuth');
			$this->provider = tx_t3socials_network_HybridAuth::getProvider(
				$this->getHybridAuthProviderId(),
				$this->getHybridAuthConfig()
			);
		}
		return $this->provider;
	}

	/**
	 * Post data on Twitter using Curl.
	 *
	 * @param string $message
	 * @return void
	 */
	public function setUserStatus($message) {
		$provider = $this->getProvider();
		try {
			$provider->setUserStatus($message);
		} catch (Exception $e) {
			// try to catch error from responce
			$last = $provider->api()->last_response;
			if ($last && $last->error) {
				$e = new Exception('HybridAuth: ' . $last->error, NULL, $e);
			}
			throw $e;
		}

		tx_rnbase_util_Logger::info(
			'Status was posted to "' . $this->getHybridAuthProviderId() . '"!',
			't3socials',
			array(
				'status' => $message,
				'account' => $this->getNetwork()->getName() . '(' . $this->getNetwork()->getUid() . ')'
			)
		);
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/hybridauth/class.tx_t3socials_network_hybridauth_Connection.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/hybridauth/class.tx_t3socials_network_hybridauth_Connection.php']
	);
}
