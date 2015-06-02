<?php

$TYPO3_CONF_VARS['EXTCONF']['indexed_search']['crawler']['indexedsearch_ttnews_crawler'] = t3lib_extMgm::extPath($_EXTKEY).'hooks/class.tx_indexedsearch_ttnews_crawler.php:&tx_indexedsearch_ttnews_crawler';
$TYPO3_CONF_VARS['EXTCONF']['tt_news']['getSingleViewLinkHook']['indexedsearch_ttnews_crawler'] = t3lib_extMgm::extPath($_EXTKEY).'hooks/class.tx_indexedsearch_ttnews_crawler.php:&tx_indexedsearch_ttnews_crawler';

// Register with TCEmain:
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['indexedsearch_ttnews_crawler'] = t3lib_extMgm::extPath($_EXTKEY).'hooks/class.tx_indexedsearch_ttnews_crawler.php:&tx_indexedsearch_ttnews_crawler';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['indexedsearch_ttnews_crawler'] = t3lib_extMgm::extPath($_EXTKEY).'hooks/class.tx_indexedsearch_ttnews_crawler.php:&tx_indexedsearch_ttnews_crawler';
