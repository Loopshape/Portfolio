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
tx_rnbase::load('tx_t3socials_tests_BaseTestCase');

/**
 * Message Builder Testcase
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_tests
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_tests_network_MessageBuilder_testcase
	extends tx_t3socials_tests_BaseTestCase {

	/**
	 * Test build Method
	 *
	 * @group unit
	 * @test
	 *
	 * @return void
	 */
	public function testBuild() {
		$builder = $this->getMessageBuilder();
		$message = tx_t3socials_tests_Mock::getMessageMock();
		$status = $builder->build($message);
		$expected  = $message->getHeadline() . CRLF . CRLF;
		$expected .= $message->getIntro() . CRLF . CRLF;
		$expected .= $message->getUrl();
		$this->assertEquals($expected, $status);
	}

	/**
	 * Liefert den Basis Message Builder
	 *
	 * @return tx_t3socials_network_MessageBuilder
	 */
	protected function getMessageBuilder() {
		return tx_rnbase::makeInstance('tx_t3socials_network_MessageBuilder');
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/network/class.tx_t3socials_tests_network_MessageBuilder_testcase.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/network/class.tx_t3socials_tests_network_MessageBuilder_testcase.php']);
}
