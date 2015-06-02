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
tx_rnbase::load('tx_t3socials_tests_Util');

/**
 * Mock Util für Tests
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_tests
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_tests_Mock {

	/**
	 * Liefert ein Message Model
	 *
	 * @return tx_t3socials_models_Message
	 */
	public static function getMessageMock() {
		$lorem = tx_t3socials_tests_Util::getLoremIpsum();
		tx_rnbase::load('tx_t3socials_models_Message');
		return tx_t3socials_models_Message::getInstance(
			array(
				'message_type' => 'manually',
				'headline' => 'Überschrift',
				'intro' => 'Intro.' . CRLF .
						'Enthält bevorzugten Text.' . CRLF . $lorem,
				'message' => 'Message.' . CRLF .
							'Enthält Text, der genutzt wird wenn kein Into existiert.' . CRLF . $lorem,
				'url' => 'http://www.dmk-ebusiness.de/',
				'data' => NULL,
			)
		);
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/class.tx_t3socials_tests_Mock.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/class.tx_t3socials_tests_Mock.php']);
}
