<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 DMK E-Business GmbH
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
tx_rnbase::load('tx_mksearch_tests_Testcase');

/**
 *
 * @package tx_mksearch
 * @subpackage tx_mksearch_tests
 * @author Hannes Bochmann <hannes.bochmann@dmk-ebusiness.de>
 * @author Michael Wagner <michael.wagner@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_mksearch_tests_indexer_BaseMedia_testcase
	extends tx_mksearch_tests_Testcase {

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataCallsStopIndexing() {
		$indexer = $this->getIndexerMock();

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'test_field_1' => 'test value 1');

		$indexer->expects($this->once())
			->method('stopIndexing')
			->with('tt_content', $sourceRecord, $indexDoc, $options);

		$indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		);
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataReturnsNullIfStopIndexing() {
		$indexer = $this->getIndexerMock();

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'test_field_1' => 'test value 1');

		$indexer->expects($this->once())
			->method('stopIndexing')
			->will($this->returnValue(TRUE));

		$this->assertNull($indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		));
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataReturnsNotNullIfNotStopIndexing() {
		$indexer = $this->getIndexerMock();

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'test_field_1' => 'test value 1');

		$indexer->expects($this->once())
			->method('stopIndexing')
			->will($this->returnValue(FALSE));

		$this->assertNotNull($indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		));
	}

	/**
	 * @group unit
	 */
	public function testGetIndexerUtility() {
		$indexer = $this->getIndexerMock();

		$this->assertInstanceOf(
			'tx_mksearch_util_Indexer',
			$this->callInaccessibleMethod(
				$indexer, 'getIndexerUtility'
			)
		);
	}

	/**
	 * @group unit
	 */
	public function testStopIndexingCallsIndexerUtility() {
		$indexer = $this->getIndexerMock(
			array(
				'getBaseTableName', 'getFileExtension',
				'getFilePath', 'getRelFileName', 'getIndexerUtility'
			)
		);
		$indexerUtility = $this->getMock(
			'tx_mksearch_util_Indexer', array('stopIndexing')
		);

		$tableName = 'some_table';
		$sourceRecord = array('some_record');
		$options = array('some_options');
		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', '', ''
		);
		$indexerUtility->expects($this->once())
			->method('stopIndexing')
			->with($tableName, $sourceRecord, $indexDoc, $options)
			->will($this->returnValue('return'));

		$indexer->expects($this->once())
			->method('getIndexerUtility')
			->will($this->returnValue($indexerUtility));

		$this->assertEquals(
			'return',
			$this->callInaccessibleMethod(
				$indexer, 'stopIndexing', $tableName, $sourceRecord, $indexDoc, $options
			)
		);
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataCallsIsIndexableRecordNotIfRecordIsDeleted() {
		$indexer = $this->getIndexerMock(array(
			'getBaseTableName', 'getFileExtension',
			'getFilePath', 'getRelFileName', 'stopIndexing', 'isIndexableRecord'
		));

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'deleted' => 1);

		$indexer->expects($this->never())
			->method('isIndexableRecord');

		$indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		);
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataCallsIsIndexableRecordNotIfRecordIsHidden() {
		$indexer = $this->getIndexerMock(array(
			'getBaseTableName', 'getFileExtension',
			'getFilePath', 'getRelFileName', 'stopIndexing', 'isIndexableRecord'
		));

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'hidden' => 1);

		$indexer->expects($this->never())
			->method('isIndexableRecord');

		$indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		);
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataSetsDocDeletedIfRecordIsDeleted() {
		$indexer = $this->getIndexerMock(array(
			'getBaseTableName', 'getFileExtension',
			'getFilePath', 'getRelFileName', 'stopIndexing', 'isIndexableRecord'
		));

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'deleted' => 1);


		$indexDoc = $indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		);

		$this->assertTrue($indexDoc->getDeleted());
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataSetsDocDeletedIfRecordIsHidden() {
		$indexer = $this->getIndexerMock(array(
			'getBaseTableName', 'getFileExtension',
			'getFilePath', 'getRelFileName', 'stopIndexing', 'isIndexableRecord'
		));

		$indexDoc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase', 'core', 'tt_content'
		);
		$options = array();
		$sourceRecord = array('uid' => 1, 'hidden' => 1);


		$indexDoc = $indexer->prepareSearchData(
			'tt_content', $sourceRecord, $indexDoc, $options
		);

		$this->assertTrue($indexDoc->getDeleted());
	}

	/**
	 * @param array $mockedMethods
	 * @return Ambigous <PHPUnit_Framework_MockObject_MockObject, tx_mksearch_indexer_BaseMedia>
	 */
	private function getIndexerMock(
		array $mockedMethods = array(
			'getBaseTableName', 'getFileExtension',
			'getFilePath', 'getRelFileName', 'stopIndexing'
		)
	) {
		return $this->getMockForAbstractClass(
			'tx_mksearch_indexer_BaseMedia',
			array(), '', FALSE, FALSE, FALSE, $mockedMethods
		);
	}
}