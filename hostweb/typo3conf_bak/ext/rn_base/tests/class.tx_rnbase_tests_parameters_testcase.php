<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2007-2014 Rene Nitzsche (rene@system25.de)
 *  All rights reserved
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
 * parameters testcase
 *
 * @package tx_rnbase
 * @subpackage tx_rnbase_tests
 * @author Michael Wagner <michael.wagner@dmk-ebusiness.de>
 */
class tx_rnbase_tests_parameters_testcase extends tx_phpunit_testcase {

	public function testGet()
	{
		$params = array(
			'empty' => '',
			'zero' => '0',
			'seven' => '7',
			'hello' => 'hello',
			'NK_world' => 'world',
		);

		/* @var $parameters tx_rnbase_parameters */
		$parameters = tx_rnbase::makeInstance('tx_rnbase_parameters', $params);

		$this->assertEquals('', $parameters->get('empty'));
		$this->assertEquals('0', $parameters->get('zero'));
		$this->assertEquals('7', $parameters->get('seven'));
		$this->assertEquals('hello', $parameters->get('hello'));
		$this->assertEquals('world', $parameters->get('world'));
		$this->assertEquals(NULL, $parameters->get('null'));
	}

	public function testGetInt()
	{
		$params = array(
			'empty' => '',
			'zero' => '0',
			'seven' => '7',
			'hello' => 'hello',
			'NK_world' => 'world',
		);

		/* @var $parameters tx_rnbase_parameters */
		$parameters = tx_rnbase::makeInstance('tx_rnbase_parameters', $params);

		$this->assertEquals(0, $parameters->getInt('empty'));
		$this->assertEquals(0, $parameters->getInt('zero'));
		$this->assertEquals(7, $parameters->getInt('seven'));
		$this->assertEquals(0, $parameters->getInt('hello'));
		$this->assertEquals(0, $parameters->getInt('world'));
		$this->assertEquals(0, $parameters->getInt('null'));
	}

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rn_base/tests/class.tx_rnbase_tests_parameters_testcase.php']) {
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rn_base/tests/class.tx_rnbase_tests_parameters_testcase.php']);
}
