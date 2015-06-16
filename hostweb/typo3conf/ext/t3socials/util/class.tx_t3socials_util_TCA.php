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
 * Util Klasse für die TCA
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_util
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_util_TCA {

	/**
	 * Insert default TS configuration of the given indexer
	 *
	 * @param array &$params
	 * @return string
	 */
	public static function insertNetworkDescription(array &$params) {
		if (empty($params['row']['network'])) {
			return '';
		}

		try {
			$config = tx_t3socials_network_Config::getNetworkConfig($params['row']['network']);
		} catch (Exception $e) {
			// No Config found
			return '';
		}
		$desc = $config->getDescription();
		$desc = $GLOBALS['LANG']->sL($desc);
		$desc = nl2br($desc);
		return empty($desc) ? '' :
			'<div class="t3-tceforms-fieldReadOnly" style="width:284px;white-space: normal;">' .
				self::handleMoreLink($desc, $params['row']['uid'] . '_' . $params['row']['network']) .
			'</div>';
	}


	/**
	 * Insert default TS configuration of the given indexer
	 *
	 * @param array &$params
	 * @return string
	 */
	public static function insertNetworkDefaultConfig(array &$params) {
		if (empty($params['row']['network'])) {
			return '';
		}

		try {
			$config = tx_t3socials_network_Config::getNetworkConfig($params['row']['network']);
		} catch (Exception $e) {
			// No Config found
			return '';
		}
		return self::insertBetween($config->getDefaultConfiguration(), $params);
	}

	/**
	 * Fügt Content zwischen HTML ein.
	 *
	 * @param string $content
	 * @param array &$params
	 * @return void
	 */
	private static function insertBetween($content, array &$params) {
		if (
			!(
				isset($params['params']['insertBetween']) && is_array($params['params']['insertBetween'])
				&& !empty($content)
			)
		) {
			return;
		}
		$lpos = strpos($params['item'], $params['params']['insertBetween'][0]);
		if ($lpos === FALSE) {
			return;
		}

		$lpos += strlen($params['params']['insertBetween'][0]);
		$rpos = strrpos($params['item'], $params['params']['insertBetween'][1]);

		if ($rpos === FALSE || $lpos > $rpos) {
			return;
		}

		$between = substr($params['item'], $lpos, $rpos - $lpos);
		if (
			!isset($params['params']['onMatchOnly'])
			|| preg_match($params['params']['onMatchOnly'], $between)
		) {
			$params['item'] = substr($params['item'], 0, $lpos) .
				$content .
				substr($params['item'], $rpos, strlen($params['item']) - $rpos);
		}
	}

	/**
	 * Get content types keys of the given indexer extension
	 *
	 * @param array &$params
	 * @return void
	 */
	public static function getNetworks(array &$params) {
		$networks = tx_t3socials_network_Config::getNewtorkIds();
		// wir sortieren vorher, damit bestehende items nicht mit sortiert werden!
		sort($networks);
		foreach ($networks as $k) {
			$params['items'][] = array(tx_t3socials_network_Config::translateNetwork($k), $k);
		}
	}

	/**
	 * Get content types keys of the given indexer extension
	 *
	 * @param array &$params
	 * @return void
	 */
	public static function getTriggers(array &$params) {
		$networks = tx_t3socials_trigger_Config::getTriggerIds();
		// wir sortieren vorher, damit bestehende items nicht mit sortiert werden!
		sort($networks);
		foreach ($networks as $k) {
			$params['items'][] = array(tx_t3socials_trigger_Config::translateTrigger($k), $k);
		}
	}

	/**
	 * Erstelt aus dem content anhand eines enthaltenen ###MORE### markers.
	 * Eine vorschau, einen Link und einen versteckten Text,
	 * der erst bei klick auf Link ausgegeben wird.
	 *
	 * @param string $content
	 * @param string $htmlid
	 * @return string
	 */
	private static function handleMoreLink($content, $htmlid = 'more') {
		if (strpos($content, '###MORE###') > 0) {
			list($smal, $big) = explode('###MORE###', $content);
			$htmlid = 't3socials_descmore_' . $htmlid;
			$onclick = 'document.getElementById(\'' . $htmlid . '\').style.display = \'block\'; this.style.display = \'none\';';
			$linkStyle  = 'background: url(\'../../typo3/sysext/t3skin/images/arrows/module-menu-right.png\') no-repeat scroll 0 4px;';
			$linkStyle .= 'display: block; padding-left: 10px';
			$moreLink =  '<a href="#" onclick="' . $onclick . '" style="' . $linkStyle . '">more</a>';
			$content  = '<div>';
			$content .= $smal;
			$content .= $moreLink;
			$content .= '</div>';
			$content .= '<div id="' . $htmlid . '" style="display:none;">';
			$content .= $big;
			$content .= '</div>';
		}
		return $content;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/util/class.tx_t3socials_util_TCA.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/util/class.tx_t3socials_util_TCA.php']);
}
