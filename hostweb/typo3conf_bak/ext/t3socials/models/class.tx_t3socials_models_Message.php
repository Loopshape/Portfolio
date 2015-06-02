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
tx_rnbase::load('tx_t3socials_models_IMessage');

/**
 * A generic message class
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_models
 * @author Rene Nitzsche <rene@system25.de>
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_models_Message
	extends tx_t3socials_models_Base
		implements tx_t3socials_models_IMessage {

	/**
	 * Liefert eine Instanz des Objekts
	 *
	 * @param array|string $messageType
	 * @return tx_t3socials_models_Message
	 */
	public static function getInstance($messageType = 'manually') {
		return tx_rnbase::makeInstance('tx_t3socials_models_Message', $messageType);
	}

	/**
	 * Initialisieren
	 *
	 * @param string|array $rowOrUid message type or array with message data
	 * 		array can contain (message_type, headline, intro, message, url, data)
	 * @return void
	 */
	public function init($rowOrUid) {
		// wir haben einen kompletten record
		if (is_array($rowOrUid)) {
			$this->uid = $rowOrUid['message_type'];
			$this->record = $rowOrUid;
		}
		// wir haben nur den Typ
		elseif (is_string($rowOrUid)) {
			$this->uid = $rowOrUid;
			$this->setMessageType($rowOrUid);
		}

		$messageType = $this->getMessageType();
		if (empty($messageType)) {
			throw new Exception('tx_t3socials_models_Message requires an message type.');
		}
	}


	/**
	 * Liefert den Typ.
	 *
	 * @return string
	 */
	public function getMessageType() {
		return $this->getProperty('message_type');
	}
	/**
	 * SetzSetzt den Typ.
	 *
	 * @param string $value
	 * @return tx_t3socials_models_Message
	 */
	public function setMessageType($value) {
		return $this->setProperty('message_type', $value);
	}

	/**
	 * Liefert die Headline.
	 *
	 * @return string
	 */
	public function getHeadline() {
		return $this->getProperty('headline');
	}
	/**
	 * Setzt die Headline.
	 *
	 * @param string $value
	 * @return tx_t3socials_models_Message
	 */
	public function setHeadline($value) {
		return $this->setProperty('headline', $value);
	}


	/**
	 * Liefert den Introtext.
	 *
	 * @return string
	 */
	public function getIntro() {
		return $this->getProperty('intro');
	}

	/**
	 * Setzt den Introtext.
	 *
	 * @param string $value
	 * @return tx_t3socials_models_Message
	 */
	public function setIntro($value) {
		return $this->setProperty('intro', $value);
	}


	/**
	 * Liefert den Nachrichtentext.
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->getProperty('message');
	}

	/**
	 * Setzt den Nachrichtentext.
	 *
	 * @param string $value
	 * @return tx_t3socials_models_Message
	 */
	public function setMessage($value) {
		return $this->setProperty('message', $value);
	}


	/**
	 * Liefert die URL.
	 *
	 * @return string
	 */
	public function getUrl() {
		return $this->getProperty('url');
	}

	/**
	 * Setzt die URL.
	 *
	 * @param string $value
	 * @return tx_t3socials_models_Message
	 */
	public function setUrl($value) {
		return $this->setProperty('url', $value);
	}


	/**
	 * Liefert die Ursprungsdaten.
	 *
	 * @return mixed
	 */
	public function getData() {
		return $this->getProperty('data');
	}

	/**
	 * Setzt die Ursprungsdaten.
	 *
	 * @param string $value
	 * @return tx_t3socials_models_Message
	 */
	public function setData($value) {
		return $this->setProperty('data', $value);
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_Message.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_Message.php']);
}
