<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types'][$_EXTKEY.'_pi1']['showitem']='CType;;4;button;1-1-1, header;;3;;2-2-2';


t3lib_extMgm::addPlugin(Array('LLL:EXT:nxindexedsearch/locallang_db.xml:tt_content.CType_pi1', $_EXTKEY.'_pi1'),'CType');

if (TYPO3_MODE=="BE") {
    t3lib_extMgm::addModule("tools","txnxindexedsearchM1","",t3lib_extMgm::extPath($_EXTKEY)."mod1/");
}

/*
$TCA["tx_nxindexedsearch_sources"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_sources',		
		'label' => 'uid',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		"default_sortby" => "ORDER BY crdate",	
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_nxindexedsearch_sources.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "datasource_table, datasource_category",
	)
);

$TCA["tx_nxindexedsearch_searchindex"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchindex',		
		'label' => 'uid',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		"default_sortby" => "ORDER BY crdate",	
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_nxindexedsearch_searchindex.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "word_uid, occurence_count, datasource",
	)
);

$TCA["tx_nxindexedsearch_searchwords"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchwords',		
		'label' => 'uid',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		"default_sortby" => "ORDER BY crdate",	
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_nxindexedsearch_searchwords.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "searchword, split_offset",
	)
);

$TCA["tx_nxindexedsearch_searchtime"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchtime',		
		'label' => 'uid',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		"default_sortby" => "ORDER BY crdate",	
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_nxindexedsearch_searchtime.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "source_uid, document_uid",
	)
);
*/
?>