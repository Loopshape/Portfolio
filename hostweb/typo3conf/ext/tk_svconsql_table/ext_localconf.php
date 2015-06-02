<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_tksvconsqltable_pi1.php', '_pi1', 'list_type', 0);

// Get TYPO3 version
if (class_exists('\TYPO3\CMS\Core\Utility\VersionNumberUtility')) {
	$t3version = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version);
} else {
	if (class_exists('t3lib_utility_VersionNumber')) {
		$t3version = t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version);
	} else {
		$t3version = t3lib_div::int_from_ver(TYPO3_version);
	}
}

// caching framework configuration
if ($t3version < 4006000) {
	if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$_EXTKEY])) {

		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$_EXTKEY] = array(
			'frontend' => 't3lib_cache_frontend_StringFrontend',
			'backend' => 't3lib_cache_backend_DbBackend',
			'options' => array(
				'cacheTable' => 'tx_tksvconsqltable_cache',
				'tagsTable' => 'tx_tksvconsqltable_cache_tags',
			)
		);
	}
} else {
	if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY])) {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY] = array(
			'frontend' => 't3lib_cache_frontend_StringFrontend',
			'backend' => 't3lib_cache_backend_DbBackend',
			'options' => array()
		);
	}
}
?>