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
tx_rnbase::load('tx_t3socials_mod_handler_HybridAuth');

/**
 * XING Handler
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_mod_handler_Xing
	extends tx_t3socials_mod_handler_HybridAuth {

	/**
	 * liefert die network id. (twitter, xing, ...)
	 *
	 * @return string
	 */
	protected function getNetworkId() {
		return 'xing';
	}

	/**
	 * Liefert alle im Default Formular sichtbaren Felder.
	 *
	 * @return array
	 */
	protected function getVisibleFormFields() {
		return array('message');
	}

	/**
	 * Kann in der Kindklasse überschrieben werden
	 * um die Message anzupassen oder zu validieren.
	 *
	 * @param tx_t3socials_models_Message $message
	 * @return tx_t3socials_models_Message|string with error message
	 */
	protected function prepareMessage(tx_t3socials_models_Message $message) {
		$message = parent::prepareMessage($message);
		if ($message instanceof tx_t3socials_models_Message) {
			$msg = $message->getMessage();
			if (strlen($msg) > 420) {
				$info = 'Meldung zu lang. Sie dürfen maximal 420 Zeichen versenden.<br />';
				$info .= ' Aktuell ' . strlen($msg) . ' Zeichen.';
				return $info;
			}
		}
		return $message;
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_Xing.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_Xing.php']);
}
