<?php
use Elastica\Document;
use Elastica\Bulk\Action;
use Elastica\Query;
use Elastica\ResultSet;
use Elastica\Response;
use Elastica\Result;
/**
 * 	@package tx_mksearch
 *  @subpackage tx_mksearch_tests
 *  @author Hannes Bochmann
 *
 *  Copyright notice
 *
 *  (c) 2011 Hannes Bochmann <dev@dmk-ebusiness.de>
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
 */
require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
tx_rnbase::load('tx_mksearch_tests_Testcase');
tx_rnbase::load('tx_mksearch_service_engine_ElasticSearch');
tx_rnbase::load('tx_mksearch_model_internal_Index');

/**
 *
 * @package tx_mksearch
 * @subpackage tx_mksearch_tests
 * @author Hannes Bochmann <hannes.bochmann@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_mksearch_tests_service_engine_ElasticSearch_testcase
	extends tx_mksearch_tests_Testcase
{
	/**
	 * @group unit
	 */
	public function testGetElasticIndex() {
		$service  = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');
		$indexName = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'indexName'
		);
		$indexName->setAccessible(TRUE);
		$indexName->setValue($service, 'unknown');
		$elasticaClient = $this->callInaccessibleMethod(
			$service, 'getElasticaIndex', array()
		);

		$this->assertInstanceOf(
			'\\Elastica\\Index', $elasticaClient, 'Client hat falsche Klasse'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetLogger() {
		$loggerClass = $this->callInaccessibleMethod(
			tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch'),
			'getLogger'
		);

		$this->assertEquals(
				'tx_rnbase_util_Logger', $loggerClass, 'falsche Logger-Klasse'
		);
	}

	/**
	 * @group unit
	 * @dataProvider getServerStatus
	 */
	public function testIsServerAvailable($returnCode, $expectedReturn) {
		$status = $this->getMock(
			'stdClass', array('getServerStatus')
		);
		$status->expects($this->once())
			->method('getServerStatus')
			->will($this->returnValue(array('status' => $returnCode)));

		$client = $this->getMock(
			'stdClass', array('getStatus')
		);
		$client->expects($this->once())
			->method('getStatus')
			->will($this->returnValue($status));

		$index = $this->getMock(
			'stdClass', array('getClient')
		);
		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$this->assertEquals(
			$expectedReturn,
			$this->callInaccessibleMethod($service, 'isServerAvailable'),
			'falscher return Wert'
		);
	}

	/**
	 * @return multitype:multitype:number boolean
	 */
	public function getServerStatus() {
		return array(
			array(200, TRUE),
			array(300, FALSE),
		);
	}

	/**
	 * @group unit
	 */
	public function testInitElasticSearchConnectionSetsIndexPropertyCreatesIndexIfNotExistsAndOpensIndex() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('getElasticaIndex', 'isServerAvailable', 'getLogger')
		);

		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->returnValue(TRUE));

		$credentials = array('someCredentials');
		$index = $this->getMock('stdClass', array('open', 'exists', 'create'));
		$index->expects($this->once())
			->method('open');
		$index->expects($this->once())
			->method('exists')
			->will($this->returnValue(TRUE));
		$index->expects($this->never())
			->method('create');

		$service->expects($this->once())
			->method('getElasticaIndex')
			->with($credentials)
			->will($this->returnValue($index));

		$indexProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'index'
		);
		$indexProperty->setAccessible(TRUE);

		$this->callInaccessibleMethod(
			$service, 'initElasticSearchConnection', $credentials
		);

		$this->assertEquals(
			$index, $indexProperty ->getValue($service), 'index property falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testInitElasticSearchConnectionSetsIndexPropertyCreatesIndexNotIfExistsAndOpensIndex() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('getElasticaIndex', 'isServerAvailable', 'getLogger')
		);

		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->returnValue(TRUE));

		$credentials = array('someCredentials');
		$index = $this->getMock('stdClass', array('open', 'exists', 'create'));
		$index->expects($this->once())
			->method('open');
		$index->expects($this->once())
			->method('exists')
			->will($this->returnValue(FALSE));
		$index->expects($this->once())
			->method('create');

		$service->expects($this->once())
			->method('getElasticaIndex')
			->with($credentials)
			->will($this->returnValue($index));

		$indexProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'index'
		);
		$indexProperty->setAccessible(TRUE);

		$this->callInaccessibleMethod(
			$service, 'initElasticSearchConnection', $credentials
		);

		$this->assertEquals(
			$index, $indexProperty ->getValue($service), 'index property falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testInitElasticSearchConnectionCallsLoggerNotIfServerAvailable() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('getElasticaIndex', 'isServerAvailable', 'getLogger')
		);

		$index = $this->getMock('stdClass', array('open', 'exists', 'create'));
		$service->expects($this->once())
			->method('getElasticaIndex')
			->will($this->returnValue($index));

		$service->expects($this->never())
			->method('getLogger');

		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->returnValue(TRUE));

		$this->callInaccessibleMethod(
			$service, 'initElasticSearchConnection', array()
		);
	}

	/**
	 * @group unit
	 * @expectedException Elastica\Exception\ClientException
	 * @expectedExceptionMessage ElasticSearch service not responding.
	 */
	public function testInitElasticSearchConnectionThrowsExceptionAndLogsErrorIfServerNotAvailable() {
		$service = $this->getMock(
				'tx_mksearch_service_engine_ElasticSearch',
				array('getElasticaIndex', 'isServerAvailable', 'getLogger')
		);

		$credentials = array('someCredentials');
		$logger = $this->getMockClass('tx_rnbase_util_Logger', array('fatal'));
		$logger::staticExpects($this->once())
			->method('fatal')
			->with(
				'ElasticSearch service not responding.', 'mksearch',
				array($credentials)
			);

		$service->expects($this->once())
			->method('getLogger')
			->will($this->returnValue($logger));

		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->returnValue(FALSE));

		$index = $this->getMock('stdClass', array('open', 'exists', 'create'));
		$service->expects($this->once())
			->method('getElasticaIndex')
			->will($this->returnValue($index));

		$this->callInaccessibleMethod(
			$service, 'initElasticSearchConnection', $credentials
		);
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaCredentialsFromCredentialsStringSetsInitialCredentialsStringToProperty() {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');
		$this->callInaccessibleMethod(
			$service,
			'getElasticaCredentialsFromCredentialsString', 'index;1,2,3,4'
		);
		$credentialsStringProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'credentialsString'
		);
		$credentialsStringProperty->setAccessible(TRUE);
		$this->assertEquals(
			'index;1,2,3,4',
			$credentialsStringProperty->getValue($service),
			'property falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaCredentialsFromCredentialsStringSetsIndexNameProperty() {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');
		$this->callInaccessibleMethod(
			$service,
			'getElasticaCredentialsFromCredentialsString', 'index;1,2,3,4'
		);
		$indexNameProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'indexName'
		);
		$indexNameProperty->setAccessible(TRUE);
		$this->assertEquals(
			'index',
			$indexNameProperty->getValue($service),
			'property falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaCredentialsFromCredentialsStringForSingleServerConfiguration() {
		$this->assertEquals(
			array(
				'servers' => array(
					array(
						'host' => 1,
						'port' => 2,
						'path' => 3,
					),
				)
			),
			$this->callInaccessibleMethod(
				tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch'),
				'getElasticaCredentialsFromCredentialsString', 'index;1,2,3,4'
			),
			'Konfig falsch für Elastica gebaut'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaCredentialsFromCredentialsStringIfTrailingSemikolon() {
		$this->assertEquals(
			array(
				'servers' => array(
					array(
						'host' => 1,
						'port' => 2,
						'path' => 3,
					),
				)
			),
			$this->callInaccessibleMethod(
				tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch'),
				'getElasticaCredentialsFromCredentialsString', 'index;1,2,3,4;'
			),
			'Konfig falsch für Elastica gebaut'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaCredentialsFromCredentialsStringForClusterSetupConfiguration() {
		$this->assertEquals(
			array(
				'servers' => array(
					array(
						'host' => 1,
						'port' => 2,
						'path' => 3,
					),
					array(
						'host' => 5,
						'port' => 6,
						'path' => 7,
					),
				)
			),
			$this->callInaccessibleMethod(
				tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch'),
				'getElasticaCredentialsFromCredentialsString', 'index;1,2,3,4;5,6,7,8'
			),
			'Konfig falsch für Elastica gebaut'
		);
	}

	/**
	 * @group unit
	 */
	public function testOpenIndex() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array(
				'getElasticaCredentialsFromCredentialsString',
				'initElasticSearchConnection'
			)
		);
		$index = $this->getMock(
			'tx_mksearch_model_internal_Index',
			array('getCredentialString'),
			array(array())
		);
		$index->expects($this->once())
			->method('getCredentialString')
			->will($this->returnValue('credentialsString'));

		$service->expects($this->once())
			->method('getElasticaCredentialsFromCredentialsString')
			->with('credentialsString')
			->will($this->returnValue(array('credentialsForElastica')));

		$service->expects($this->once())
			->method('initElasticSearchConnection')
			->with(array('credentialsForElastica'));

		$service->openIndex($index);
	}

	/**
	 * @group unit
	 */
	public function testGetIndex() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('openIndex')
		);
		$indexModelProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'mksearchIndexModel'
		);
		$indexModelProperty->setAccessible(TRUE);
		$indexModel = tx_rnbase::makeInstance('tx_mksearch_model_internal_Index', array());
		$indexModelProperty->setValue($service, $indexModel);

		$service->expects($this->once())
			->method('openIndex')
			->with($indexModel);

		$index = $service->getIndex();
	}

	/**
	 * @group unit
	 */
	public function testGetIndexIfIndexAlreadySet() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('openIndex')
		);
		$indexProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'index'
		);
		$indexProperty->setAccessible(TRUE);
		$indexProperty->setValue($service, new stdClass());

		$service->expects($this->never())
			->method('openIndex');

		$service->getIndex();
	}

	/**
	 * @group unit
	 */
	public function testSetIndexModel() {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');

		$indexModel = tx_rnbase::makeInstance('tx_mksearch_model_internal_Index', array());
		$service->setIndexModel($indexModel);

		$indexModelProperty = new ReflectionProperty(
				'tx_mksearch_service_engine_ElasticSearch', 'mksearchIndexModel'
		);
		$indexModelProperty->setAccessible(TRUE);
		$this->assertSame(
			$indexModel, $indexModelProperty->getValue($service),
			'indexModel falsch gesetzt'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetStatusWhenServerIsAvailable() {
		$response = $this->getMock(
			'stdClass', array('getQueryTime')
		);
		$response->expects($this->once())
			->method('getQueryTime')
			->will($this->returnValue(123));

		$status = $this->getMock(
			'stdClass', array('getResponse')
		);
		$status->expects($this->once())
			->method('getResponse')
			->will($this->returnValue($response));

		$client = $this->getMock(
			'stdClass', array('getStatus')
		);
		$client->expects($this->once())
			->method('getStatus')
			->will($this->returnValue($status));

		$index = $this->getMock(
			'stdClass', array('getClient')
		);
		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex', 'isServerAvailable')
		);

		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->returnValue(TRUE));

		$status = $service->getStatus();

		$this->assertEquals(1, $status->getStatus(), 'Status falsch');
		$this->assertEquals(
			'Up and running (Ping time: 123 ms)', $status->getMessage(), 'Message falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetStatusWhenServerIsNotAvailable() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('isServerAvailable')
		);
		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->returnValue(FALSE));

		$status = $service->getStatus();

		$this->assertEquals(-1, $status->getStatus(), 'Status falsch');
		$this->assertEquals(
			'Down. Maybe not started?', $status->getMessage(), 'Message falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testGetStatusWhenIsServerAvailableThrowsException() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('isServerAvailable')
		);
		$service->expects($this->once())
			->method('isServerAvailable')
			->will($this->throwException(
				tx_rnbase::makeInstance('Exception', 'Verbindung fehlgeschlagen')
			));

		$credentialsStringProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'credentialsString'
		);
		$credentialsStringProperty->setAccessible(TRUE);
		$credentialsStringProperty->setValue($service, '1,2,3,4');

		$status = $service->getStatus();

		$this->assertEquals(-1, $status->getStatus(), 'Status falsch');
		$this->assertEquals(
			'Error connecting ElasticSearch: Verbindung fehlgeschlagen. Credentials: 1,2,3,4',
			$status->getMessage(),
			'Message falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testIndexExists() {
		$status = $this->getMock(
			'stdClass', array('indexExists')
		);
		$status->expects($this->once())
			->method('indexExists')
			->with('indexName')
			->will($this->returnValue(TRUE));

		$client = $this->getMock(
			'stdClass', array('getStatus')
		);
		$client->expects($this->once())
			->method('getStatus')
			->will($this->returnValue($status));

		$index = $this->getMock(
			'stdClass', array('getClient')
		);
		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$this->assertTrue(
			$service->indexExists('indexName'),
			'falscher return Wert'
		);
	}

	/**
	 * @group unit
	 */
	public function testDeleteIndex() {
		$index = $this->getMock(
			'stdClass', array('delete')
		);
		$index->expects($this->once())
			->method('delete');

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$service->deleteIndex();
	}

	/**
	 * @group unit
	 */
	public function testDeleteIndexIfNameGiven() {
		$index = $this->getMock(
			'stdClass', array('delete', 'getClient')
		);
		$index->expects($this->once())
			->method('delete');

		$client = $this->getMock(
			'stdClass', array('getIndex')
		);
		$client->expects($this->once())
			->method('getIndex')
			->with('indexName')
			->will($this->returnValue($index));

		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$service->deleteIndex('indexName');
	}

	/**
	 * @group unit
	 */
	public function testOptimizeIndex() {
		$index = $this->getMock(
			'stdClass', array('optimize')
		);
		$index->expects($this->once())
			->method('optimize');

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$service->optimizeIndex();
	}

	/**
	 * @group unit
	 */
	public function testMakeIndexDocInstance() {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');
		$docInstance = $service->makeIndexDocInstance('mksearch', 'tt_content');

		$this->assertInstanceOf(
			'tx_mksearch_model_IndexerDocumentBase', $docInstance,
			'docInstance hat falsche Klasse'
		);

		$extKey = new ReflectionProperty(
			'tx_mksearch_model_IndexerDocumentBase', 'extKey'
		);
		$extKey->setAccessible(TRUE);
		$this->assertEquals(
			'mksearch', $extKey->getValue($docInstance)->getValue(), 'extKey falsch'
		);

		$contentType = new ReflectionProperty(
			'tx_mksearch_model_IndexerDocumentBase', 'contentType'
		);
		$contentType->setAccessible(TRUE);
		$this->assertEquals(
			'tt_content', $contentType->getValue($docInstance)->getValue(), 'contentType falsch'
		);

		$fieldClass = new ReflectionProperty(
			'tx_mksearch_model_IndexerDocumentBase', 'fieldClass'
		);
		$fieldClass->setAccessible(TRUE);
		$this->assertEquals(
			'tx_mksearch_model_IndexerFieldBase', $fieldClass->getValue($docInstance),
			'fieldClass falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testIndexUpdateCallsIndexNew() {
		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('indexNew')
		);
		$doc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase',
			'mksearch', 'tt_content',
			'tx_mksearch_model_IndexerFieldBase'
		);
		$service->expects($this->once())
			->method('indexNew')
			->with($doc)
			->will($this->returnValue(TRUE));

		$this->assertTrue($service->indexUpdate($doc));
	}

	/**
	 * @group unit
	 */
	public function testGetOpenIndexName() {
		$service  = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');
		$indexName = new ReflectionProperty(
				'tx_mksearch_service_engine_ElasticSearch', 'indexName'
		);
		$indexName->setAccessible(TRUE);
		$indexName->setValue($service, 'unknown');

		$this->assertEquals('unknown', $service->getOpenIndexName());
	}

	/**
	 * @group unit
	 */
	public function testCloseIndex() {
		$index = $this->getMock(
			'stdClass', array('close')
		);
		$index->expects($this->once())
			->method('close')
			->will($this->returnValue(TRUE));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$service->closeIndex();

		$indexProperty = new ReflectionProperty(
			'tx_mksearch_service_engine_ElasticSearch', 'index'
		);
		$indexProperty->setAccessible(TRUE);

		$this->assertNull(
			$indexProperty->getValue($service),
			'index property nicht auf NULL gesetzt'
		);
	}

	/**
	 * @group unit
	 */
	public function testIndexNew() {
		/* @var $doc tx_mksearch_model_IndexerDocumentBase */
		$doc = tx_rnbase::makeInstance(
			'tx_mksearch_model_IndexerDocumentBase',
			'mksearch', 'tt_content',
			'tx_mksearch_model_IndexerFieldBase'
		);
		$doc->setUid(123);
		$doc->addField('first_field', 'flat value');
		$doc->addField('second_field', array('multi', 'value'));

		$index = $this->getMock(
			'stdClass', array('addDocuments')
		);

		$elasticaDocument = new Document(
			'123',
			array(
				'content_ident_s' => 'mksearch.tt_content',
				'first_field' => 'flat value',
				'second_field' => array('multi', 'value'),
				'extKey' =>'mksearch',
				'contentType' =>'tt_content',
				'uid' => 123
			)
		);
		$elasticaDocument->setType('mksearch:tt_content');
		$response = $this->getMock(
			'stdClass', array('isOk')
		);
		$response->expects($this->once())
			->method('isOk')
			->will($this->returnValue(TRUE));
		$index->expects($this->once())
			->method('addDocuments')
			->with(array($elasticaDocument))
			->will($this->returnValue($response));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$this->assertTrue($service->indexNew($doc));
	}

	/**
	 * @group unit
	 */
	public function testIndexDeleteByContentUid() {
		$index = $this->getMock(
			'stdClass', array('deleteDocuments')
		);

		$elasticaDocument = new Document('123');
		$elasticaDocument->setType('mksearch:tt_content');
		$response = $this->getMock(
			'stdClass', array('isOk')
		);
		$response->expects($this->once())
			->method('isOk')
			->will($this->returnValue(TRUE));
		$index->expects($this->once())
			->method('deleteDocuments')
			->with(array($elasticaDocument))
			->will($this->returnValue($response));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));

		$this->assertTrue($service->indexDeleteByContentUid(
			123, 'mksearch', 'tt_content'
		));
	}

	/**
	 * @group unit
	 * @expectedException RuntimeException
	 * @expectedExceptionMessage ohoh
	 */
	public function testSearchThrowsRuntimeExceptionIfElasticaThrowsException() {
		$exception = new Exception('ohoh');

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->once())
			->method('getIndex')
			->will($this->throwException($exception));

		$service->search();
	}

	/**
	 * @group unit
	 * @expectedException RuntimeException
	 * @expectedExceptionMessage Exception caught from ElasticSearch: Error requesting ElasticSearch. HTTP status: 201; Path: pfad; Query: query
	 */
	public function testSearchThrowsRuntimeExceptionIfResponseHttpStatusIsNot200() {
		$response = $this->getMock(
			'stdClass', array('getStatus')
		);
		$response->expects($this->once())
			->method('getStatus')
			->will($this->returnValue(201));

		$searchResult = $this->getMock(
			'\\Elastica\\ResultSet', array('getResponse'), array(), '', FALSE
		);
		$searchResult->expects($this->once())
			->method('getResponse')
			->will($this->returnValue($response));

		$index = $this->getMock(
			'stdClass', array('search', 'getClient')
		);
		$index->expects($this->once())
			->method('search')
			->will($this->returnValue($searchResult));

		$lastRequest = $this->getMock(
			'stdClass', array('getPath', 'getQuery')
		);
		$lastRequest->expects($this->once())
			->method('getPath')
			->will($this->returnValue('pfad'));
		$lastRequest->expects($this->once())
			->method('getQuery')
			->will($this->returnValue('query'));
		$client = $this->getMock(
			'stdClass', array('getLastRequest')
		);
		$client->expects($this->once())
			->method('getLastRequest')
			->will($this->returnValue($lastRequest));

		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$service->expects($this->any())
			->method('getIndex')
			->will($this->returnValue($index));

		$service->search();
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaQuery() {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');

		$fields['term'] = 'test term';
		$elasticaQuery = $this->callInaccessibleMethod($service, 'getElasticaQuery', $fields, array());

		$expectedQuery = array('query_string' => array('query' => 'test term'));
		$this->assertEquals($expectedQuery, $elasticaQuery->getQuery(), 'query falsch');
	}

	/**
	 * @group unit
	 */
	public function testGetElasticaQueryHandlesSorting() {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');

		$fields['term'] = 'test term';
		$elasticaQuery = $this->callInaccessibleMethod(
			$service, 'getElasticaQuery', $fields, array('sort' => 'uid desc')
		);

		$expectedSort = array(0 => array('uid' => array('order' => 'desc')));
		$this->assertEquals($expectedSort, $elasticaQuery->getParam('sort'), 'sort falsch');
	}

	/**
	 * @group unit
	 * @dataProvider getOptionsForElastica
	 */
	public function testGetOptionsForElastica($initialOption, $expectedMappedOption) {
		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');

		$options = array($initialOption => 'test value');
		$mappedOptions = $this->callInaccessibleMethod(
			$service, 'getOptionsForElastica', $options
		);

		$expectedMappedOptions = array();
		if ($expectedMappedOption !== NULL) {
			$expectedMappedOptions = array($expectedMappedOption => 'test value');
		}
		$this->assertEquals(
			$expectedMappedOptions, $mappedOptions,
			'option ' . $initialOption . ' falsch gemapped'
		);
	}

	/**
	 *
	 * @return multitype:multitype:string  multitype:string NULL
	 */
	public function getOptionsForElastica() {
		return array(
			array('search_type', 'search_type'),
			array('debug', 'explain'),
			array('limit', 'limit'),
			array('offset', 'from'),
			array('unknown', NULL),
		);
	}

	/**
	 * @group unit
	 */
	public function testGetItemsFromSearchResult() {
		$searchResult = ResultSet::create(new Response(''), Query::create(''));
		$resultProperty = new ReflectionProperty('\\Elastica\\ResultSet', '_results');
		$results = array(
			0 => new Result(array('_source' => array('title' => 'hit data one'))),
			1 => new Result(array('_source' => array('title' => 'hit data two'))),
		);
		$resultProperty->setAccessible(TRUE);
		$resultProperty->setValue($searchResult, $results);

		$service = tx_rnbase::makeInstance('tx_mksearch_service_engine_ElasticSearch');

		$searchHits = $this->callInaccessibleMethod(
			$service, 'getItemsFromSearchResult', $searchResult
		);

		$expectedSearchHits = array(
			0 =>tx_rnbase::makeInstance(
				'tx_mksearch_model_SearchHit', array('title' => 'hit data one')
			),
			1 =>tx_rnbase::makeInstance(
				'tx_mksearch_model_SearchHit', array('title' => 'hit data two')
			),
		);

		$this->assertEquals(
			$expectedSearchHits, $searchHits,
			'die search hits wurden nicht richtig erstellt'
		);
	}

	/**
	 * @group unit
	 */
	public function testSearchWithValidSearchResult() {
		$lastRequest = $this->getMock(
			'stdClass', array('getPath', 'getQuery')
		);
		$lastRequest->expects($this->once())
			->method('getPath')
			->will($this->returnValue('pfad'));
		$lastRequest->expects($this->once())
			->method('getQuery')
			->will($this->returnValue('query'));
		$client = $this->getMock(
			'stdClass', array('getLastRequest')
		);
		$client->expects($this->once())
			->method('getLastRequest')
			->will($this->returnValue($lastRequest));

		$index = $this->getMock(
			'stdClass', array('search', 'getClient')
		);
		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array(
				'getIndex', 'getElasticaQuery', 'getOptionsForElastica',
				'checkResponseOfSearchResult', 'getItemsFromSearchResult'
			)
		);
		$service->expects($this->any())
			->method('getIndex')
			->will($this->returnValue($index));

		$fields = array('fields');
		$options = array('options');
		$service->expects($this->once())
			->method('getElasticaQuery')
			->with($fields, $options)
			->will($this->returnValue('elastica query'));
		$service->expects($this->once())
			->method('getOptionsForElastica')
			->with($options)
			->will($this->returnValue(123));

		$response = $this->getMock('\\Elastica\\Response',array('getError'), array(''));
		$response->expects($this->any())
			->method('getError')
			->will($this->returnValue('es gab einen Fehler'));

		$searchResult = ResultSet::create($response, Query::create(''));

		$totalHits = new ReflectionProperty('\\Elastica\\ResultSet', '_totalHits');
		$totalHits->setAccessible(TRUE);
		$totalHits->setValue($searchResult, 123);

		$totalTime = new ReflectionProperty('\\Elastica\\ResultSet', '_took');
		$totalTime->setAccessible(TRUE);
		$totalTime->setValue($searchResult, 456);

		$index->expects($this->once())
			->method('search')
			->with('elastica query', 123)
			->will($this->returnValue($searchResult));

		$service->expects($this->once())
			->method('checkResponseOfSearchResult')
			->with($searchResult);

		$service->expects($this->once())
			->method('getItemsFromSearchResult')
			->with($searchResult)
			->will($this->returnValue(array('search results')));

		$result = $service->search($fields, $options);

		$this->assertEquals(array('search results'), $result['items'], 'items falsch');
		$this->assertEquals('pfad', $result['searchUrl'], 'searchUrl falsch');
		$this->assertEquals('query', $result['searchQuery'], 'searchQuery falsch');
		$this->assertContains(
			' ms', $result['searchTime'], 'searchTime enthält nicht die Einheit'
		);
		$this->assertNotNull(
			str_replace('ms', '', $result['searchTime']),
			'searchTime enthält keine Millisekunden Angabe'
		);
		$this->assertEquals('456 ms', $result['queryTime'], 'queryTime falsch');
		$this->assertEquals(123, $result['numFound'], 'searchQuery falsch');
		$this->assertEquals(
			'es gab einen Fehler', $result['error'], 'error falsch'
		);
	}

	/**
	 * @group unit
	 */
	public function testSearchPrintsNoDebugIfNotSetInOptions() {
		$this->expectOutputString('');

		$lastRequest = $this->getMock(
			'stdClass', array('getPath', 'getQuery')
		);
		$client = $this->getMock(
			'stdClass', array('getLastRequest')
		);
		$client->expects($this->once())
			->method('getLastRequest')
			->will($this->returnValue($lastRequest));

		$index = $this->getMock(
			'stdClass', array('search', 'getClient')
		);
		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array(
				'getIndex', 'getElasticaQuery', 'getOptionsForElastica',
				'checkResponseOfSearchResult', 'getItemsFromSearchResult'
			)
		);
		$service->expects($this->any())
			->method('getIndex')
			->will($this->returnValue($index));

		$fields = array('fields');
		$options = array('options');

		$searchResult = ResultSet::create(new Response(''), Query::create(''));

		$index->expects($this->once())
			->method('search')
			->will($this->returnValue($searchResult));

		$service->search($fields, $options);
	}

	/**
	 * @group unit
	 */
	public function testSearchPrintsDebugIfSetInOptions() {
		// es reicht zu prüfen ob einige Teile des Debug vorhanden sind
		// "s" modifier, damit auf der CLI alle Zeilen in Betracht gezogen werden. Sonst
		// wird nur die Zeile genommen, mit dem ersten Treffer.
		$regularExpression = 	'/.*(tx_mksearch_service_engine_ElasticSearch\:\:search).*(Line).*' .
								'(options).*(debug).*(result).*(searchQuery).*/s';
		$this->expectOutputRegex($regularExpression);

		$lastRequest = $this->getMock(
			'stdClass', array('getPath', 'getQuery')
		);
		$client = $this->getMock(
			'stdClass', array('getLastRequest')
		);
		$client->expects($this->once())
			->method('getLastRequest')
			->will($this->returnValue($lastRequest));

		$index = $this->getMock(
			'stdClass', array('search', 'getClient')
		);
		$index->expects($this->once())
			->method('getClient')
			->will($this->returnValue($client));

		$service = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array(
				'getIndex', 'getElasticaQuery', 'getOptionsForElastica',
				'checkResponseOfSearchResult', 'getItemsFromSearchResult'
			)
		);
		$service->expects($this->any())
			->method('getIndex')
			->will($this->returnValue($index));

		$fields = array('fields');
		$options = array('debug' => TRUE);

		$searchResult = ResultSet::create(new Response(''), Query::create(''));

		$index->expects($this->once())
			->method('search')
			->will($this->returnValue($searchResult));

		$service->search($fields, $options);
	}
}