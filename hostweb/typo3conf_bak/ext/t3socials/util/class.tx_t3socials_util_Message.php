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

/**
 * Util für Nachrichten
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_util_Message {


	/**
	 * Erzeugt eine Flash Message
	 *
	 * @param string|array $message
	 * @return void
	 */
	public static function showFlashMessage($message) {
		$msg = '';
		$title = 'T3 SOCIALS';
		$severity = t3lib_FlashMessage::OK;
		// Wichtig, damit Meldungen auch nach einem redirect noch ausgegeben werden!
		$store = TRUE;
		// wir haben eine erweiterte konfiguration
		if (is_array($message)) {
			$msg = empty($message['message']) ? $msg : $message['message'];
			$title = empty($message['title']) ? $title : $message['title'];
			$severity = empty($message['severity']) ? $severity : $message['severity'];
			$store = empty($message['storeinsession']) ? $store : (bool) $message['storeinsession'];
		}
		// wir haben eine status naachricht
		elseif($message instanceof tx_t3socials_models_State) {
			$title = 'T3 SOCIALS';
			$msg = $message->getMessage();
			$severity = t3lib_FlashMessage::NOTICE;
			if ($message->isStateSuccess()) {
				$severity = $message->getState() === tx_t3socials_models_State::STATE_INFO
					? t3lib_FlashMessage::INFO : t3lib_FlashMessage::OK;
			} elseif ($message->isStateFailure()) {
				$severity = t3lib_FlashMessage::WARNING;
				if ($message->getErrorCode()) {
					$title .= ' - Error (' . $message->getErrorCode() . '):';
				}
			}
		}
		// wir haben nur eine meldung
		else {
			$msg = $message;
			$title = 'Message';
		}
		self::addMessage($msg, $title, $severity, $store);
	}

	/**
	 * Sendet eine Flash Nachricht.
	 *
	 * @param string $message
	 * @param string $title
	 * @param int $severity
	 * @param boolean $storeInSession
	 * @return void
	 */
	private static function addMessage(
		$message, $title = '',
		$severity = 0, $storeInSession = FALSE
	) {
		$message = tx_rnbase::makeInstance(
			't3lib_FlashMessage',
			$message,
			$title,
			$severity,
			$storeInSession
		);

		t3lib_FlashMessageQueue::addMessage($message);
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/util/class.tx_t3socials_util_Message.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/util/class.tx_t3socials_util_Message.php']);
}