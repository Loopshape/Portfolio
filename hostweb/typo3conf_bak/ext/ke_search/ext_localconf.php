<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

// include filterlist class
include_once(t3lib_extMgm::extPath($_EXTKEY).'/Classes/Backend/class.user_filterlist.php');

// include pageTSconfig.txt
t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ke_search/pageTSconfig.txt">');

// register cli-script
if (TYPO3_MODE=='BE')    {
    $TYPO3_CONF_VARS['SC_OPTIONS']['GLOBAL']['cliKeys'][$_EXTKEY] = array('EXT:' . $_EXTKEY . '/cli/class.cli_kesearch.php','_CLI_kesearch');
}

// add plugin
t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_kesearch_pi1.php', '_pi1', 'list_type', 0);
t3lib_extMgm::addPItoST43($_EXTKEY, 'pi2/class.tx_kesearch_pi2.php', '_pi2', 'list_type', 0);
t3lib_extMgm::addPItoST43($_EXTKEY, 'pi3/class.tx_kesearch_pi3.php', '_pi3', 'list_type', 0);

// use hooks for generation of sortdate values
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['registerAdditionalFields'][] = 'EXT:ke_search/Classes/hooks/class.user_kesearchhooks.php:user_kesearch_sortdate';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['modifyPagesIndexEntry'][] = 'EXT:ke_search/Classes/hooks/class.user_kesearchhooks.php:user_kesearch_sortdate';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['modifyYACIndexEntry'][] = 'EXT:ke_search/Classes/hooks/class.user_kesearchhooks.php:user_kesearch_sortdate';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['modifyDAMIndexEntry'][] = 'EXT:ke_search/Classes/hooks/class.user_kesearchhooks.php:user_kesearch_sortdate';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['modifyContentIndexEntry'][] = 'EXT:ke_search/Classes/hooks/class.user_kesearchhooks.php:user_kesearch_sortdate';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['modifyTemplaVoilaIndexEntry'][] = 'EXT:ke_search/Classes/hooks/class.user_kesearchhooks.php:user_kesearch_sortdate';

// get TYPO3 version number as an integer
if (class_exists('TYPO3\\CMS\\Core\\Utility\\VersionNumberUtility')) {
	define('TYPO3_VERSION_INTEGER', \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version));
} else if (class_exists('t3lib_utility_VersionNumber')) {
	define('TYPO3_VERSION_INTEGER', t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version));
} else {
	define('TYPO3_VERSION_INTEGER', t3lib_div::int_from_ver(TYPO3_version));
}

// add scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_kesearch_indexertask'] = array(
    'extension'        => $_EXTKEY,
    'title'            => 'Indexing process for ke_search',
    'description'      => 'This task updates the ke_search index'
);

?>