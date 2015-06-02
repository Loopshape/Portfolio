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
tx_rnbase::load('tx_t3socials_srv_Network');
tx_rnbase::load('tx_t3socials_tests_BaseTestCase');

/**
 * Network Testcase
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_tests
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_tests_srv_Network_testcase
	extends tx_t3socials_tests_BaseTestCase {

	/**
	 * Testet die getByRefererCallsSearchCorrect Methode.
	 *
	 * @param string $trigger
	 * @return void
	 *
	 * @group unit
	 * @test
	 * @dataProvider getByRefererCallsSearchData
	 */
	public function testGetByRefererCallsSearchCorrect($trigger, $autosend) {
		$fields = $options = array();
		$fields['NETWORK.actions'][OP_INSET_INT] = $triggers;
		$fields['NETWORK.autosend'][OP_EQ_INT] = $autosend;

		$service = $this->getMock(
			'tx_t3socials_srv_Network', array('search')
		);
		$service->expects($this->once())
			->method('search')
			->with($fields, $options);

		$service->findAccountsByTriggers($triggers, $autosend);
	}

	/**
	 * Liefert die Daten für den testGetByRefererCallsSearchCorrect testcase.
	 *
	 * @return array
	 */
	public function getByRefererCallsSearchData() {
		return array(
			__LINE__ => array('trigger' => 'tt_news', 'autosend' => 1),
			__LINE__ => array('trigger' => 'tt_news,tt_content', 'autosend' => 0),
			__LINE__ => array('trigger' => array('tt_news', 'tt_content'), 'autosend' => 1),
			__LINE__ => array('trigger' => 'news', 'autosend' => 1),
		);
	}
}