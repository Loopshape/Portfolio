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
require_once t3lib_extMgm::extPath('mksearch', 'lib/Apache/Solr/Document.php');
tx_rnbase::load('tx_mksearch_tests_Testcase');
tx_rnbase::load('tx_mksearch_indexer_ttcontent_Normal');

/**
 *
 * @package tx_mksearch
 * @subpackage tx_mksearch_tests
 * @author Hannes Bochmann <hannes.bochmann@dmk-ebusiness.de>
 * @author Michael Wagner <michael.wagner@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_mksearch_tests_indexer_TtContent_testcase
	extends tx_mksearch_tests_Testcase {

	private static function getDefaultOptions(){
		$options = array();
		$options['CType.']['_default_.']['indexedFields.'] = array(
			'bodytext', 'imagecaption' , 'altText', 'titleText'
		);
		return $options;
	}

	/**
	 * @group unit
	 */
	public function testPrepareSearchDataCallsPrepareSearchDataOnActualIndexer() {
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase', 'mksearch', 'test');
		$options = array('options');
		$record = array('record');

		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_TtContent');
		$actualIndexer = $this->getMock('tx_mksearch_indexer_ttcontent_Normal', array('prepareSearchData'));

		$actualIndexer->expects($this->once())
			->method('prepareSearchData')
			->with('tt_content', $record, $indexDoc, $options)
			->will($this->returnValue('return'));

		$actualIndexerProperty = new ReflectionProperty('tx_mksearch_indexer_TtContent', 'actualIndexer');
		$actualIndexerProperty->setAccessible(TRUE);
		$actualIndexerProperty->setValue($indexer, $actualIndexer);

		$this->assertEquals(
			'return',
			$indexer->prepareSearchData('tt_content', $record, $indexDoc, $options)
		);
	}

	/**
	 * @group unit
	 */
	public function test_prepareSearchData_CheckIgnoreContentType() {
		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_TtContent');
		list($extKey, $cType) = $indexer->getContentType();
		//content type correct?
		$this->assertEquals('core',$extKey,'wrong ext key');
		$this->assertEquals('tt_content',$cType,'wrong cType');

		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$record = array('uid'=> 123, 'pid' => 1, 'deleted' => 0, 'hidden' => 0, 'sectionIndex' => 1, 'CType'=>'list', 'header' => 'test');
		$options = self::getDefaultOptions();
		$options['ignoreCTypes.'] = array('search','mailform','login');
		$result = $indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertNotNull($result, 'Null returned for uid '.$record['uid']);

		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = self::getDefaultOptions();
		$options['ignoreCTypes.'] = array('search','mailform','list');
		$result = $indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertNull($result, 'Not Null returned for uid '.$record['uid']);

		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = self::getDefaultOptions();
		$options['ignoreCTypes'] = 'search,mailform,login';
		$result = $indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertNotNull($result, 'Null returned for uid '.$record['uid']);

		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = self::getDefaultOptions();
		$options['ignoreCTypes'] = 'search,mailform,list';
		$result = $indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertNull($result, 'Not Null returned for uid '.$record['uid']);
	}

	/**
	 * @group unit
	 */
	public function test_prepareSearchData_CheckIncludeContentType() {
		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_TtContent');
		list($extKey, $cType) = $indexer->getContentType();

		$record = array('uid'=> 123, 'pid' => 1, 'deleted' => 0, 'hidden' => 0, 'sectionIndex' => 1, 'CType'=>'list', 'header' => 'test');
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = self::getDefaultOptions();
		$options['includeCTypes.'] = array('search','mailform','login');
		$result = $indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertNull($result, 'Not Null returned for uid '.$record['uid'].' when CType not in includeCTypes');

		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = self::getDefaultOptions();
		$options['includeCTypes.'] = array('search','mailform','list');
		$result = $indexer->prepareSearchData('tt_content', $record, $indexDoc, $options);
		$this->assertNotNull($result, 'Null returned for uid '.$record['uid'].' when CType in includeCTypes');

	}
}