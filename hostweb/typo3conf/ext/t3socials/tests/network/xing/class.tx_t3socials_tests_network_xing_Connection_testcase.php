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
tx_rnbase::load('tx_t3socials_tests_network_Connection_testcase');
/**
 * Xing Connection Test
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_tests
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_tests_network_xing_Connection_testcase
	extends tx_t3socials_tests_network_Connection_testcase {



	/**
	 * returns object of network
	 *
	 * @return array|tx_t3socials_models_Network
	 */
	protected function getNetwork() {
		return tx_rnbase::makeInstance(
			'tx_t3socials_models_Network',
			array(
				'name' => 'XING',
				'network' => 'xing',
				'username' => '',
				'password' => '',
				'config' => 'xing {
   access_token =
   access_token_secret =
}',
			)
		);
	}

	/**
	 * returns classname or object of connection
	 *
	 * @return string|tx_t3socials_network_Connection
	 */
	protected function getConnection() {
		return 'tx_t3socials_network_xing_Connection';
	}

	/**
	 * returns classname or object of connection
	 *
	 * @return string|array string with message or array with post data
	 */
	protected function getBuiltMessage() {
		return 'Überschrift' . CRLF . CRLF .
			'Intro.' . CRLF .
			'Enthält bevorzugten Text.' . CRLF .
			'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. ' .
			'Aenean commodo ligula eget dolor. Aenean massa. ' .
			'Cum sociis natoque penatibus et magnis dis parturient montes, ' .
			'nascetur ridiculus mus. Donec quam felis, ultricies nec, ' .
			'pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. ' .
			'Donec pede justo, fringilla vel, ...' . CRLF . CRLF .
			'http://www.dmk-ebusiness.de/';
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/network/xing/class.tx_t3socials_tests_network_xing_Connection_testcase.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/network/xing/class.tx_t3socials_tests_network_xing_Connection_testcase.php']);
}
