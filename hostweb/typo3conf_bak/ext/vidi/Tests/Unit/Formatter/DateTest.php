<?php
namespace TYPO3\CMS\Vidi\Formatter;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Fabien Udriot <fabien.udriot@typo3.org>
 *
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

/**
 * Test case for class \TYPO3\CMS\Vidi\Formatter\Date.
 */
class DateTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\CMS\Vidi\Formatter\Date
	 */
	private $subject;

	public function setUp() {
		date_default_timezone_set('GMT');
		$this->subject = new \TYPO3\CMS\Vidi\Formatter\Date();
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'] = 'd.m.Y';
	}

	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function canFormatDate() {
		$foo = $this->subject->format('1351880525');
		$this->assertEquals('02.11.2012', $foo);

	}
}
?>