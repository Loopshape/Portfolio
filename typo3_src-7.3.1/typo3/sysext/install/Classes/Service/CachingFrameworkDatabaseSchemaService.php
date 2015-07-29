<?php
namespace TYPO3\CMS\Install\Service;

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

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Cache\CacheFactory;

/**
 * This service provides the sql schema for the caching framework
 */
class CachingFrameworkDatabaseSchemaService {

	/**
	 * Get schema SQL of required cache framework tables.
	 *
	 * This method needs ext_localconf and ext_tables loaded!
	 *
	 * @return string Cache framework SQL
	 */
	public function getCachingFrameworkRequiredDatabaseSchema() {
		// Use new to circumvent the singleton pattern of CacheManager
		$cacheManager = new CacheManager;
		$cacheManager->setCacheConfigurations($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']);
		// Cache manager needs cache factory. cache factory injects itself to manager in __construct()
		new CacheFactory('production', $cacheManager);

		$tableDefinitions = '';
		foreach ($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'] as $cacheName => $_) {
			$backend = $cacheManager->getCache($cacheName)->getBackend();
			if (method_exists($backend, 'getTableDefinitions')) {
				$tableDefinitions .= LF . $backend->getTableDefinitions();
			}
		}

		return $tableDefinitions;
	}

	/**
	 * A slot method to inject the required caching framework database tables to the
	 * tables definitions string
	 *
	 * @param array $sqlString
	 * @return array
	 */
	public function addCachingFrameworkRequiredDatabaseSchemaToTablesDefinition(array $sqlString) {
		$sqlString[] = $this->getCachingFrameworkRequiredDatabaseSchema();
		return array('sqlString' => $sqlString);
	}

}
