<?php

/** 
 * Registering scheduler
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_linkservice_linkrefresh'] = array(
	'extension' => $_EXTKEY,
	'title' => 'Link refresher',
	'description' => 'Traverse and refresh external links.',
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_linkservice_clearlog'] = array(
	'extension' => $_EXTKEY,
	'title' => 'Link log cleaner',
	'description' => 'Clean out stale link refresh log records.',
);


// Enable cache for extension.
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['linkservice'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['linkservice'] = array();
}

// Set cache to use string for frontend.
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['linkservice'] = array(
    'frontend' => 't3lib_cache_frontend_VariableFrontend',
    'backend' => 't3lib_cache_backend_DbBackend',
    'options' => array()
);


