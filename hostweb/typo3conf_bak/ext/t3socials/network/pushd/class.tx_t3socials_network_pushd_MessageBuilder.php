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
tx_rnbase::load('tx_rnbase_util_Logger');

/**
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Rene Nitzsche <rene@system25.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_pushd_MessageBuilder {
	/**
	 * Creates a push notification from generic message
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @param tx_t3socials_models_Network $account
	 * @param string $confId
	 * @return array with title and msg
	 */
	public function build($message, $account, $confId) {
		$data = array();
		// alle Tags entfernen
		// Wenn ein Intro vorhanden ist, wird dieses bevorzugt.
		$msg = htmlspecialchars_decode(strip_tags(trim(
			$message->getIntro() ? $message->getIntro() : $message->getMessage()
		)), ENT_QUOTES);
		$title = htmlspecialchars_decode(strip_tags(trim($message->getHeadline())), ENT_QUOTES);
		$charsAvailable = 200;
		$msg = self::cropText($msg, $charsAvailable, '...', TRUE);

		$data['title'] = $title;
		$data['msg'] = $msg;
		return $data;
	}

	/**
	 * Crop text. This method is taken from TYPO3 stdWrap
	 *
	 * @param string $text
	 * @param int $chars maximum length of string
	 * @param string $afterstring Something like "..."
	 * @param boolean $crop2space crop on last space character
	 * @return string
	 */
	protected static function cropText($text, $chars, $afterstring, $crop2space) {
		if (strlen($text) < $chars) {
			return $text;
		}
		// Kürzen
		$text = substr($text, 0, ($chars - strlen($afterstring)));
		$truncAt = strrpos($text, ' ');
		$text = ($truncAt && $crop2space) ?
					substr($text, 0, $truncAt) . $afterstring :
					$text . $afterstring;
		return $text;
	}
}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/pushd/class.tx_t3socials_network_pushd_MessageBuilder.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/pushd/class.tx_t3socials_network_pushd_MessageBuilder.php']
	);
}
