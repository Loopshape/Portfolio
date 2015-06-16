<?php
namespace BeechIt\NewsTtnewsimport\Tests\Service\Import;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Georg Ringer <typo3@ringerge.org>
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
 * Test class for \BeechIt\NewsTtnewsimport\Service\Import\TTNewsNewsDataProviderService
 *
 * @package TYPO3
 * @subpackage news_ttnewsimport
 */
class TTNewsNewsDataProviderServiceTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 * @test
	 * @dataProvider relatedLinksAreParsedCorrectlyDataProvider
	 */
	public function relatedLinksAreParsedCorrectly($given,$expected) {
		$mockTemplateParser = $this->getAccessibleMock('BeechIt\\NewsTtnewsimport\\Service\\Import\\TTNewsNewsDataProviderService', array('dummy'));
		$result = $mockTemplateParser->_call('getRelatedLinks', $given);
		$this->assertEquals($expected, $result);
	}

	/**
	 * Data provider
	 *
	 * @return array
	 */
	public function relatedLinksAreParsedCorrectlyDataProvider() {
		return array(
			'emptyResultGivesEmptyString' => array(
				'', array()
			),
			'simpleLink' => array(
				'<link 123>some text</link>',
				array(
					0 => array('uri' => '123', 'title' => 'some text', 'description' => '')
				)
			),
			'simpleLinkUppercase' => array(
				'<LINK 123>some text</LINK>
				<LINK www.typo3.org>a cool website</LINK>',
				array(
					0 => array('uri' => '123', 'title' => 'some text', 'description' => ''),
					1 => array('uri' => 'www.typo3.org', 'title' => 'a cool website', 'description' => ''),
				)
			),

		);
	}
}