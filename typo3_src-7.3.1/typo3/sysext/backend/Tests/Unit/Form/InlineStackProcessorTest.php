<?php
namespace TYPO3\CMS\Backend\Tests\Unit\Form;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Tests\UnitTestCase;
use TYPO3\CMS\Backend\Form\InlineStackProcessor;

/**
 * Test case
 */
class InlineStackProcessorTest extends UnitTestCase {

	/**
	 * @return array
	 */
	public function structureStringIsParsedDataProvider() {
		return array(
			'simple 1-level table structure' => array(
				'data-pageId-childTable',
				array(
					'unstable' => array(
						'table' => 'childTable',
					),
				),
				array()
			),
			'simple 1-level table-uid structure' => array(
				'data-pageId-childTable-childUid',
				array(
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
					),
				),
				array()
			),
			'simple 1-level table-uid-field structure' => array(
				'data-pageId-childTable-childUid-childField',
				array(
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
						'field' => 'childField',
					),
				),
				array(),
			),
			'simple 2-level table structure' => array(
				'data-pageId-parentTable-parentUid-parentField-childTable',
				array(
					'stable' => array(
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-parentTable-parentUid-parentField',
				),
			),
			'simple 2-level table-uid structure' => array(
				'data-pageId-parentTable-parentUid-parentField-childTable-childUid',
				array(
					'stable' => array(
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-parentTable-parentUid-parentField',
				),
			),
			'simple 2-level table-uid-field structure' => array(
				'data-pageId-parentTable-parentUid-parentField-childTable-childUid-childField',
				array(
					'stable' => array(
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
						'field' => 'childField',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-parentTable-parentUid-parentField',
				),
			),
			'simple 3-level table structure' => array(
				'data-pageId-grandParentTable-grandParentUid-grandParentField-parentTable-parentUid-parentField-childTable',
				array(
					'stable' => array(
						array(
							'table' => 'grandParentTable',
							'uid' => 'grandParentUid',
							'field' => 'grandParentField',
						),
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-grandParentTable-grandParentUid-grandParentField-parentTable-parentUid-parentField',
				),
			),
			'simple 3-level table-uid structure' => array(
				'data-pageId-grandParentTable-grandParentUid-grandParentField-parentTable-parentUid-parentField-childTable-childUid',
				array(
					'stable' => array(
						array(
							'table' => 'grandParentTable',
							'uid' => 'grandParentUid',
							'field' => 'grandParentField',
						),
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-grandParentTable-grandParentUid-grandParentField-parentTable-parentUid-parentField',
				),
			),
			'simple 3-level table-uid-field structure' => array(
				'data-pageId-grandParentTable-grandParentUid-grandParentField-parentTable-parentUid-parentField-childTable-childUid-childField',
				array(
					'stable' => array(
						array(
							'table' => 'grandParentTable',
							'uid' => 'grandParentUid',
							'field' => 'grandParentField',
						),
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
						'field' => 'childField',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-grandParentTable-grandParentUid-grandParentField-parentTable-parentUid-parentField',
				),
			),
			'flexform 3-level table-uid structure' => array(
				'data-pageId-grandParentTable-grandParentUid-grandParentField---data---sDEF---lDEF---grandParentFlexForm---vDEF-parentTable-parentUid-parentField-childTable-childUid',
				array(
					'stable' => array(
						array(
							'table' => 'grandParentTable',
							'uid' => 'grandParentUid',
							'field' => 'grandParentField',
							'flexform' => array(
								'data', 'sDEF', 'lDEF', 'grandParentFlexForm', 'vDEF',
							),
						),
						array(
							'table' => 'parentTable',
							'uid' => 'parentUid',
							'field' => 'parentField',
						),
					),
					'unstable' => array(
						'table' => 'childTable',
						'uid' => 'childUid',
					),
				),
				array(
					'form' => 'data[parentTable][parentUid][parentField]',
					'object' => 'data-pageId-grandParentTable-grandParentUid-grandParentField---data---sDEF---lDEF---grandParentFlexForm---vDEF-parentTable-parentUid-parentField',
				),
			),
		);
	}

	/**
	 * @dataProvider structureStringIsParsedDataProvider
	 * @test
	 */
	public function initializeByParsingDomObjectIdStringParsesStructureString($string, array $expectedInlineStructure, array $_) {
		/** @var InlineStackProcessor|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface $subject */
		$subject = $this->getAccessibleMock(InlineStackProcessor::class, array('dummy'));
		$subject->initializeByParsingDomObjectIdString($string, FALSE);
		$structure = $subject->_get('inlineStructure');
		$this->assertEquals($expectedInlineStructure, $structure);
	}

	/**
	 * @dataProvider structureStringIsParsedDataProvider
	 * @test
	 */
	public function getCurrentStructureFormPrefixReturnsExceptedStringAfterInitializationByStructureString($string, array $_, array $expectedFormName) {
		/** @var InlineStackProcessor|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface $subject */
		$subject = new InlineStackProcessor;
		$subject->initializeByParsingDomObjectIdString($string, FALSE);
		$this->assertEquals($expectedFormName['form'], $subject->getCurrentStructureFormPrefix());
	}

	/**
	 * @dataProvider structureStringIsParsedDataProvider
	 * @test
	 */
	public function getCurrentStructureDomObjectIdPrefixReturnsExceptedStringAfterInitializationByStructureString($string, array $_, array $expectedFormName) {
		/** @var InlineStackProcessor|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface $subject */
		$subject = new InlineStackProcessor;
		$subject->initializeByParsingDomObjectIdString($string, FALSE);
		$this->assertEquals($expectedFormName['object'], $subject->getCurrentStructureDomObjectIdPrefix('pageId'));
	}

}
