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
tx_rnbase::load('tx_t3socials_network_Connection');

/**
 * Connection Testcase
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_tests
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
abstract class tx_t3socials_tests_network_Connection_testcase
	extends tx_t3socials_tests_BaseTestCase {

	/**
	 * Test getHybridAuthConfig Method
	 *
	 * @group unit
	 * @test
	 *
	 * @return void
	 */
	public function testGetHybridAuthConfig() {
		$connection = $this->getConnectionMock();
		if (!$connection instanceof tx_t3socials_network_hybridauth_Interface) {
			$this->markTestSkipped('Not an HybridAuth connection.');
		}

		$config = $connection->getHybridAuthConfig();

		// has to be enabled for hybridauth
		$this->assertArrayHasKey('enabled', $config);
		$this->assertTrue($config['enabled']);
		// networkid was set to 1 in self::getNetworkMock
		$this->assertArrayHasKey('networkUid', $config);
		$this->assertEquals(1, $config['networkUid']);
		// there has to be an keys config with key and secret
		$this->assertArrayHasKey('keys', $config);
		$this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY, $config['keys']);
		$this->assertArrayHasKey('key', $config['keys']);
		$this->assertArrayHasKey('secret', $config['keys']);
	}

	/**
	 * Test getProvider Method
	 *
	 * @group unit
	 * @test
	 *
	 * @return void
	 */
	public function testGetProvider() {
		$this->markTestIncomplete('Find a way to mock hybrid auth and its thirdparty libs!');
		if (!class_exists('Hybrid_Storage') && headers_sent() && !session_id()) {
			$this->markTestSkipped('HybridAuth calls session_start() but headers already sent and there are no session id.');
		}
		$connection = $this->getConnectionMock();
		if (!$connection instanceof tx_t3socials_network_hybridauth_Interface) {
			$this->markTestSkipped('Not an HybridAuth connection.');
		}

		$provider = $connection->getProvider();

		$this->assertInstanceOf('Hybrid_Provider_Adapter', $provider);
	}

	/**
	 * Test buildStatusMessage Method
	 *
	 * @group unit
	 * @test
	 *
	 * @return void
	 */
	public function testBuildStatusMessage() {
		$connection = $this->getConnectionMock();
		if (!$connection instanceof tx_t3socials_network_Connection) {
			$this->markTestSkipped('Not an basic connection.');
		}
		$message = tx_t3socials_tests_Mock::getMessageMock();
		$status = $this->callInaccessibleMethod(
			$connection,
			'buildStatusMessage',
			$message
		);

		$this->assertEquals($this->getBuiltMessage(), $status);
	}


	/**
	 * returns network data or object of network
	 *
	 * @return array|tx_t3socials_models_Network
	 */
	abstract protected function getNetwork();

	/**
	 * returns classname or object of connection
	 *
	 * @return string|tx_t3socials_network_Connection
	 */
	abstract protected function getConnection();

	/**
	 * Liefert die vom MessageBuilder gebaute Nachricht
	 *
	 * @return string|tx_t3socials_network_Connection
	 */
	abstract protected function getBuiltMessage();


	/**
	 * returns object of network
	 *
	 * @throws Exception
	 * @return tx_t3socials_models_Network
	 */
	protected function getNetworkMock() {
		$network = $this->getNetwork();
		// haben ein network model
		if ($network instanceof tx_t3socials_models_Network) {
			$network->uid = $network->record['uid'] = 1;
			return $network;
		}
		// wir erzeugen ein model
		elseif (is_array($network)) {
			$network['uid'] = 1;
			return tx_rnbase::makeInstance(
				'tx_t3socials_models_Network',
				$network
			);
		}
		throw new Exception(get_class($this) . '->getNetwork() has to return an array with record data or an object instance of tx_t3socials_models_Network');
	}


	/**
	 * returns object of network
	 *
	 * @return tx_t3socials_network_Connection
	 */
	protected function getConnectionMock() {
		$connection = $this->getConnection();
		if (is_string($connection)) {
			$connection = tx_rnbase::makeInstance($connection);
		}
		if (!$connection instanceof tx_t3socials_network_Connection) {
			throw new Exception(get_class($this) . '->getConnection() has to return an string with connection class or an object instance of tx_t3socials_network_Connection');
		}
		$connection->setNetwork($this->getNetworkMock());
		return $connection;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/network/class.tx_t3socials_tests_network_Connection_testcase.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/network/class.tx_t3socials_tests_network_Connection_testcase.php']);
}
