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
tx_rnbase::load('tx_t3socials_network_MessageBuilder');


/**
 * Message Builder für eine Twittermeldung
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Rene Nitzsche <rene@system25.de>
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_twitter_MessageBuilder
	extends tx_t3socials_network_MessageBuilder {

	/**
	 * Liefert den Verbinder zwischen Titel und Content.
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return integer
	 */
	protected function getContentDelimiter(tx_t3socials_models_IMessage $message) {
		return ': ';
	}

	/**
	 * Liefert die Maximale Anzahl an Zeichen für den Inhalt.
	 * 0 = Unlimited
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return integer
	 */
	protected function getMaxContentLength(tx_t3socials_models_IMessage $message) {
		$url = trim($message->getUrl());
		return $url ? 120 : 140;
	}

	/**
	 * Convert HTML to plain text
	 *
	 * Removes HTML tags and HTML comments and converts HTML entities
	 * to their applicable characters.
	 *
	 * @param string $text
	 * @param array $options
	 * @return string Converted string (utf8-encoded)
	 */
	protected function html2plain($text, array $options = array()) {
		// for Twitter remove the linebreaks!
		if (empty($options['lineendings'])) {
			$options['lineendings'] = FALSE;
		}
		return parent::html2plain($text, $options);
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/twitter/class.tx_t3socials_network_twitter_MessageBuilder.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/twitter/class.tx_t3socials_network_twitter_MessageBuilder.php']
	);
}
