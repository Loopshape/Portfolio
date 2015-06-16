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
tx_rnbase::load('tx_t3socials_network_IConnection');
tx_rnbase::load('tx_rnbase_util_Logger');


/**
 * Basis Connection
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
abstract class tx_t3socials_network_Connection
	implements tx_t3socials_network_IConnection {

	/**
	 * Liefert den Klassennamen der Message Builder Klasse
	 *
	 * @return string
	 */
	abstract protected function getBuilderClass();

	/**
	 * Post data on network
	 *
	 * @param string $message
	 * @return	void
	 */
	abstract public function setUserStatus($message);

	/**
	 * Setzt das zu verwendende Netzwerk-Model.
	 *
	 * @param tx_t3socials_models_Network $network
	 * @return tx_t3socials_network_Connection
	 */
	public function setNetwork(tx_t3socials_models_Network $network) {
		$this->network = $network;
		return $this;
	}
	/**
	 * Returns the network account
	 *
	 * @return tx_t3socials_models_Network
	 */
	public function getNetwork() {
		return $this->network;
	}

	/**
	 * Liest eine Konfiguration aus dem Netzwerk-Model aus.
	 *
	 * @param string $confId
	 * @throws Exception
	 * @return mixed
	 */
	protected function getConfigData($confId) {
		$network = $this->getNetwork();
		if (!$network instanceof tx_t3socials_models_Network) {
			throw new Exception('Missing network. The network has to be inject into the connection!');
		}
		return $network->getConfigData($network->getNetwork() . '.' . $confId);
	}

	/**
	 * Erzeugt aus dem Message Model einen eine Text-Nachricht.
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return string|array string with message or array with post data
	 */
	protected function buildStatusMessage(tx_t3socials_models_IMessage $message) {
		// Diese generische Nachricht muss nun in eine Meldung umgesetzt werden.
		// Das sollte ein MessageBuilder übernehmen.
		// Der muss aber austauschbar sein, damit für spezielle Nachrichten
		// andere Builder konfiguriert werden können.
		$builder = $this->getBuilder($message);
		$status = $builder->build($message);
		return $status;
	}

	/**
	 * Post data to network.
	 *
	 * @param tx_t3socials_models_Message $message
	 * @return null or error message
	 * @return null|string with error
	 */
	public function sendMessage(tx_t3socials_models_IMessage $message) {
		$status = $this->buildStatusMessage($message);
		// den erzeugten Status versenden
		if ($status) {
			$this->setUserStatus($status);
		}
		// wir haben keine nachricht zum versenden.
		else {
			tx_rnbase_util_Logger::warn(
				'Message is empty!',
				't3socials',
				array(
					'status' => $status,
					'message' => (string) $message,
					'builder class' => get_class($builder)
				)
			);
			return 'Message is empty!';
		}
		return NULL;
	}

	/**
	 * Erzeugt einen Message Builder
	 *
	 * @param tx_t3socials_models_Message $message
	 * @return tx_t3socials_network_MessageBuilder
	 */
	protected function getBuilder(tx_t3socials_models_Message $message) {
		$network = $this->getNetwork();
		$class = $this->getConfigData($message->getMessageType() . '.builder');
		$class = $class ? $class : $this->getConfigData('builder');
		$class = $class ? $class : $this->getBuilderClass();
		$builder = tx_rnbase::makeInstance($class);
		if (!$builder instanceof tx_t3socials_network_MessageBuilder) {
			throw new Exception(
				'The builder "' . get_class($builder) .
				'" has to abstract from "tx_t3socials_network_MessageBuilder".'
			);
		}
		return $builder;
	}

	/**
	 * Verify connection is valid
	 *
	 * @return boolean
	 * @TODO: implement verification!
	 */
	public function verify() {
		return TRUE;
	}

	/**
	 * Erzeugt eine Netzwerkkonfiguration.
	 *
	 * @TODO: inject config in tx_t3socials_network_Config::getNetworkConnection
	 *
	 * @return tx_t3socials_models_NetworkConfig
	 */
	public function getNetworkConfig() {
		return tx_t3socials_network_Config::getNetworkConfig($this->getNetwork());
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/class.tx_t3socials_network_Connection.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/class.tx_t3socials_network_Connection.php']);
}
