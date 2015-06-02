<?php
/**
 * 	@package tx_mkkvbb
 *  @subpackage tx_mkkvbb_tests_action
 *  @author Hannes Bochmann
 *
 *  Copyright notice
 *
 *  (c) 2010 Hannes Bochmann <dev@dmk-ebusiness.de>
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
tx_rnbase::load('tx_mksearch_action_ElasticSearch');

/**
 * @package tx_mksearch
 * @subpackage tx_mksearch_tests
 * @author Hannes Bochmann <hannes.bochmann@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_mksearch_tests_action_ElasticSearch_testcase
	extends tx_mksearch_tests_Testcase {

	/**
	 * @group unit
	 */
	public function testHandlePagebrowser(){
		$confId = 'elasticsearch.';
		$configurations = $this->createConfigurations(
			array($confId => array('hit.' => array('pagebrowser.' => array('limit' => 20)))), 
			'mksearch'
		);
		$pluginUid = new ReflectionProperty('tx_rnbase_configurations', 'pluginUid');
		$pluginUid->setAccessible(TRUE);
		$pluginUid->setValue($configurations, 456);
		
		$parameters = tx_rnbase::makeInstance(
			'tx_rnbase_parameters', array('pb-search456-pointer' => 2)
		);
		$viewData = $configurations->getViewData();
		$fields = array();
		$options = array('limit' => 10);
		
		$searchEngine = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$index = $this->getMock('stdClass', array('count'));
		$index->expects($this->once())
			->method('count')
			->will($this->returnValue(123));
		$searchEngine->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));
		
		$action = tx_rnbase::makeInstance('tx_mksearch_action_ElasticSearch');
		$action->handlePageBrowser(
			$parameters, $configurations, $confId, 
			$viewData, $fields, $options, $searchEngine
		);
		
		$this->assertEquals(
			10, $options['limit'], 'limit wurde verändert'
		);
		$this->assertEquals(
			20, $options['offset'], 'offset in options falsch'
		);
		
		$pageBrowser = $viewData->offsetGet('pagebrowser');
		$expectedPagebrowser = tx_rnbase::makeInstance(
			'tx_rnbase_util_PageBrowser', 'search456'
		);
		$expectedPagebrowser->setState($parameters, 123, 10);
		$this->assertEquals(
			$expectedPagebrowser, $pageBrowser, 'pagebrowser falsch konfiguriert'
		);
	}
	
	/**
	 * @group unit
	 */
	public function testHandlePagebrowserWhenPageBrowserIdConfigured(){
		$confId = 'elasticsearch.';
		$configurations = $this->createConfigurations(
			array($confId => array('hit.' => array('pagebrowser.' => array(
				'limit' => 20,
				'pbid' => 'pagebrowserId'
			)))),
			'mksearch'
		);
	
		$parameters = tx_rnbase::makeInstance('tx_rnbase_parameters', array());
		$viewData = $configurations->getViewData();
		$fields = array();
		$options = array('limit' => 10);
	
		$searchEngine = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch', array('getIndex')
		);
		$index = $this->getMock('stdClass', array('count'));
		$index->expects($this->once())
			->method('count')
			->will($this->returnValue(123));
		$searchEngine->expects($this->once())
			->method('getIndex')
			->will($this->returnValue($index));
	
		$action = tx_rnbase::makeInstance('tx_mksearch_action_ElasticSearch');
		$action->handlePageBrowser(
			$parameters, $configurations, $confId,
			$viewData, $fields, $options, $searchEngine
		);
	
		$this->assertEquals(
			10, $options['limit'], 'limit wurde verändert'
		);
		$this->assertEquals(
			0, $options['offset'], 'offset in options falsch'
		);
	
		$pageBrowser = $viewData->offsetGet('pagebrowser');
		$expectedPagebrowser = tx_rnbase::makeInstance(
			'tx_rnbase_util_PageBrowser', 'pagebrowserId'
		);
		$expectedPagebrowser->setState($parameters, 123, 10);
		$this->assertEquals(
			$expectedPagebrowser, $pageBrowser, 'pagebrowser falsch konfiguriert'
		);
	}
	
	/**
	 * @group unit
	 */
	public function testGetSearchSolrAction(){
		$this->assertEquals(
			'tx_mksearch_action_SearchSolr', 
			$this->callInaccessibleMethod(
				tx_rnbase::makeInstance('tx_mksearch_action_ElasticSearch'), 
				'getSearchSolrAction'
			)
		);
	}
	
	/**
	 * @group unit
	 */
	public function testgetServiceRegistry(){
		$this->assertEquals(
			'tx_mksearch_util_ServiceRegistry',
			$this->callInaccessibleMethod(
				tx_rnbase::makeInstance('tx_mksearch_action_ElasticSearch'),
				'getServiceRegistry'
			)
		);
	}
	
	/**
	 * @group unit
	 */
	public function testHandleRequestReturnsNullIfNosearchConfigured(){
		$confId = 'elasticsearch.';
		$configurations = $this->createConfigurations(
			array($confId => array('nosearch' => TRUE)),
			'mksearch'
		);
	
		$parameters = tx_rnbase::makeInstance('tx_rnbase_parameters', array());
		$viewData = $configurations->getViewData();
	
		$action = $this->getMock(
			'tx_mksearch_action_ElasticSearch', 
			array('getSearchSolrAction', 'getServiceRegistry', 'handlePageBrowser')
		);
		$action->expects($this->never())
			->method('getSearchSolrAction');
		$action->expects($this->never())
			->method('getServiceRegistry');
		$action->expects($this->never())
			->method('handlePageBrowser');
		
		$actionReturn = $action->handleRequest($parameters, $configurations, $viewData);
	
		$this->assertFalse(
			$viewData->offsetExists('searchcount'), 
			'doch searchcount in viewdata gesetzt'
		);
		$this->assertFalse(
			$viewData->offsetExists('search'),
			'doch search in viewdata gesetzt'
		);
		$this->assertNull(
			$actionReturn, 'action gibt nicht NULL zurück'
		);
	}
	
	/**
	 * @group unit
	 */
	public function testHandleRequest(){
		$confId = 'elasticsearch.';
		$configurations = $this->createConfigurations(
			array($confId => array(
				'filter.' => array(
					'forceSearch' => TRUE, 
					'class' => 'tx_mksearch_filter_ElasticSearchBase',
					'fields.' => array('term' => 'testterm'),
					'options.' => array('limt' => 123),
				)
			)),
			'mksearch'
		);
	
		$parameters = tx_rnbase::makeInstance('tx_rnbase_parameters', array());
		$viewData = $configurations->getViewData();
	
		$action = $this->getMock(
			'tx_mksearch_action_ElasticSearch',
			array('getSearchSolrAction', 'getServiceRegistry', 'handlePageBrowser')
		);
		$searchSolrAction = $this->getMockClass(
			'tx_mksearch_action_SearchSolr', array('findSearchIndex')
		);
		$index = tx_rnbase::makeInstance('tx_mksearch_model_internal_Index', array());
		$searchSolrAction::staticExpects($this->once())
			->method('findSearchIndex')
			->with($configurations, $confId)
			->will($this->returnValue($index));
		$action->expects($this->once())
			->method('getSearchSolrAction')
			->will($this->returnValue($searchSolrAction));
		
		$serviceRegistry = $this->getMockClass(
			'tx_mksearch_util_ServiceRegistry', array('getSearchEngine')
		);
		$searchEngine = $this->getMock(
			'tx_mksearch_service_engine_ElasticSearch',
			array('openIndex', 'search')
		);
		$searchEngine->expects($this->once())
			->method('openIndex')
			->with($index);
		$searchEngine->expects($this->once())
			->method('search')
			->with(array('term' =>'testterm'), array('limt' => 123), $configurations)
			->will($this->returnValue(
				array('items' => 'search hits', 'numFound' => 987)
			));
		$serviceRegistry::staticExpects($this->once())
			->method('getSearchEngine')
			->with($index)
			->will($this->returnValue($searchEngine));
		$action->expects($this->once())
			->method('getServiceRegistry')
			->will($this->returnValue($serviceRegistry));
		
		$action->expects($this->once())
			->method('handlePageBrowser')
			->with(
				$parameters, $configurations, $confId, $viewData, 
				array('term' =>'testterm'), array('limt' => 123), $searchEngine
			);
	
		$actionReturn = $action->handleRequest($parameters, $configurations, $viewData);
	
		$this->assertEquals(
			'987',
			$viewData->offsetGet('searchcount'),
			'searchcount in viewdata nicht gesetzt'
		);
		$this->assertEquals(
			'search hits',
			$viewData->offsetGet('search'),
			'search in viewdata nicht gesetzt'
		);
		$this->assertNull(
			$actionReturn, 'action gibt nicht NULL zurück'
		);
	}
}