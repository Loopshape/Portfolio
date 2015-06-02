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
tx_rnbase::load('tx_t3socials_trigger_IMessageBuilder');
tx_rnbase::load('tx_t3socials_models_Message');

/**
 * Message Builder für einen Record
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
abstract class tx_t3socials_trigger_MessageBuilder
	implements tx_t3socials_trigger_IMessageBuilder {

	/**
	 * Triger Konfiguration
	 *
	 * @var tx_t3socials_models_TriggerConfig
	 */
	private $trigger = NULL;

	/**
	 * Erzeugt eine generische Nachricht für den versand über die Netzwerke.
	 * Muss von der Kindklasse überschrieben werden, um die Message zu füllen!
	 *
	 * @param tx_t3socials_models_Message $message
	 * @param tx_t3socials_models_Base $model
	 * @return tx_t3socials_models_IMessage
	 */
	abstract protected function buildMessage(
		tx_t3socials_models_Message $message,
		tx_t3socials_models_Base $model
	);

	/**
	 * Erzeugt eine generische Nachricht für den versand über die Netzwerke.
	 *
	 * @param tx_t3socials_models_Base $model
	 * @return tx_t3socials_models_IMessage
	 */
	public function buildGenericMessage(
		tx_t3socials_models_Base $model
	) {
		$type = $this->hasTrigger() ? $this->getTrigger()->getTriggerId() : NULL;
		$message = $this->makeMessage($type);
		return $this->buildMessage($message, $model);
	}

	/**
	 * Liefert eine Instanz des Objekts
	 *
	 * @param array|string $messageType
	 * @return tx_t3socials_models_Message
	 */
	protected function makeMessage($messageType = NULL) {
		$messageType = empty($messageType) ? 'default' : $messageType;
		return tx_t3socials_models_Message::getInstance($messageType);
	}

	/**
	 * Spezielle Netzwerk und Triggerabhängige Dinge durchführen.
	 *
	 * @param tx_t3socials_models_IMessage &$message
	 * @param tx_t3socials_models_Network $network
	 * @param tx_t3socials_models_TriggerConfig $trigger
	 * @return void
	 */
	public function prepareMessageForNetwork(
		tx_t3socials_models_IMessage $message,
		tx_t3socials_models_Network $network,
		tx_t3socials_models_TriggerConfig $trigger
	) {
		$confId = $network->getNetwork() . '.' . $trigger->getTriggerId() . '.';
		$message->setUrl($network->getConfigData($confId . 'message.url'));
	}

	/**
	 * Liefert den aktuellen Trigger.
	 *
	 * @return tx_t3socials_models_TriggerConfig|null $trigger
	 */
	public function hasTrigger() {
		return $this->trigger instanceof tx_t3socials_models_TriggerConfig;
	}

	/**
	 * Setzt den aktuellen Trigger.
	 *
	 * @param tx_t3socials_models_TriggerConfig $trigger
	 * @return void
	 */
	public function setTrigger(
		tx_t3socials_models_TriggerConfig $trigger
	) {
		$this->trigger = $trigger;
	}

	/**
	 * Liefert den aktuellen Trigger.
	 *
	 * @return tx_t3socials_models_TriggerConfig|null $trigger
	 */
	public function getTrigger() {
		return $this->trigger;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/trigger/class.tx_t3socials_trigger_MessageBuilder.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/trigger/class.tx_t3socials_trigger_MessageBuilder.php']);
}
