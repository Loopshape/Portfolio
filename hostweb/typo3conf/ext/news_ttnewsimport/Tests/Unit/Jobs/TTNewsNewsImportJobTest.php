<?php
namespace BeechIt\NewsTtnewsimport\Tests\Unit\Jobs;

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Georg Ringer <typo3@ringerge.org>
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
 * Tests for tt_news news import job
 *
 * @package TYPO3
 * @subpackage news_ttnewsimport
 */
class TTNewsNewsImportJobTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * Test getNumberOfRecordsPerRunReturnsExpectedValue
	 *
	 * @test
	 * @return void
	 */
	public function getNumberOfRecordsPerRunReturnsExpectedValue() {
		$jobInstance = new \BeechIt\NewsTtnewsimport\Jobs\TTNewsNewsImportJob();
		$this->assertEquals($jobInstance->getNumberOfRecordsPerRun(), 30);
	}
}