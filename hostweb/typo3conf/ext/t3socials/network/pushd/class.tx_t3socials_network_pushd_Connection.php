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
 * Pushd Connection
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Rene Nitzsche <rene@system25.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_pushd_Connection
	implements tx_t3socials_network_IConnection {

	/**
	 * (non-PHPdoc)
	 *
	 * @see tx_t3socials_network_IConnection::setNetwork()
	 *
	 * @return void
	 */
	public function setNetwork(tx_t3socials_models_Network $network) {
		$this->network = $network;
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
	 * (non-PHPdoc)
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @see tx_t3socials_network_IConnection::sendMessage()
	 * @return null|string with error
	 */
	public function sendMessage(tx_t3socials_models_IMessage $message) {
		$builder = $this->getBuilder($message->getMessageType());
		$data = $builder->build($message, $this->getNetwork(), 'pushd.' . $message->getMessageType() . '.');
		// Der Builder entscheidet, ob etwas verschickt wird.
		if (!$data) {
			return NULL;
		}

		// Der Builder kann einen anderen EventType festlegen
		$event = $message->getMessageType();
		if (isset($data['event']) && $data['event']) {
			$event = $data['event'];
			unset($data['event']);
		}
		// Beim Push beachten wir nur Titel und Message
		$url = $this->getNetwork()->getConfigData('pushd.url');
		$url .= 'event/' . $event;

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, FALSE, $context);
		if ($result === FALSE) {
			$data = $message->getData();
			if (is_object($data) && isset($data->record)) {
				$message->setData($data->record);
			}
			tx_rnbase_util_Logger::fatal('Error sending pushd-message (' . $message->getMessageType() . ')!', 't3socials',
				array('message' => (array) $message, 'options' => $options, 'url' => $url));
			return 'Error sending pushd-message';
		}

		return NULL;
	}

	/**
	 * @param unknown $messageType
	 * @return tx_t3socials_network_pushd_MessageBuilder
	 */
	protected function getBuilder($messageType) {
		$network = $this->getNetwork();
		$builderClass = $network->getConfigData('pushd.' . $messageType . '.builder');
		$builderClass = $builderClass ? $builderClass : 'tx_t3socials_network_pushd_MessageBuilder';
		return tx_rnbase::makeInstance($builderClass);
	}

	/**
	 * (non-PHPdoc)
	 * @see tx_t3socials_network_IConnection::verify()
	 */
	public function verify() {
		return TRUE;
	}

	/**
	 * Liefert statistische Infos zu einem Event
	 * Leider nur die Anzahl der Nachrichten.
	 *
	 * @param string $event
	 * @return boolean
	 */
	public function getEventStatus($event) {
		$url = $this->getNetwork()->getConfigData('pushd.url');
		$url .= 'event/' . $event;
		$result = file_get_contents($url);
		if ($result === FALSE) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/twitter/class.tx_t3socials_network_twitter_Connection.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/twitter/class.tx_t3socials_network_twitter_Connection.php']
	);
}
