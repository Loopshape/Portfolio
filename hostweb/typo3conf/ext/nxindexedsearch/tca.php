<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

/*$TCA["tx_nxindexedsearch_sources"] = Array (
	"ctrl" => $TCA["tx_nxindexedsearch_sources"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "datasource_table,datasource_category"
	),
	"feInterface" => $TCA["tx_nxindexedsearch_sources"]["feInterface"],
	"columns" => Array (
		"datasource_table" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_sources.datasource_table",		
			"config" => Array (
				"type" => "input",	
				"size" => "48",	
				"eval" => "trim",
			)
		),
		"datasource_category" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_sources.datasource_category",		
			"config" => Array (
				"type" => "input",	
				"size" => "48",	
				"eval" => "trim",
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "datasource_table;;;;1-1-1, datasource_category")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);



$TCA["tx_nxindexedsearch_searchindex"] = Array (
	"ctrl" => $TCA["tx_nxindexedsearch_searchindex"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "word_uid,occurence_count,datasource"
	),
	"feInterface" => $TCA["tx_nxindexedsearch_searchindex"]["feInterface"],
	"columns" => Array (
		"word_uid" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchindex.word_uid",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"occurence_count" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchindex.occurence_count",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"datasource" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchindex.datasource",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_nxindexedsearch_sources",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,	
				"MM" => "tx_nxindexedsearch_searchindex_datasource_mm",
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "word_uid;;;;1-1-1, occurence_count, datasource")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);



$TCA["tx_nxindexedsearch_searchwords"] = Array (
	"ctrl" => $TCA["tx_nxindexedsearch_searchwords"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "searchword,split_offset"
	),
	"feInterface" => $TCA["tx_nxindexedsearch_searchwords"]["feInterface"],
	"columns" => Array (
		"searchword" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchwords.searchword",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "trim",
			)
		),
		"split_offset" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchwords.split_offset",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "searchword;;;;1-1-1, split_offset")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);



$TCA["tx_nxindexedsearch_searchtime"] = Array (
	"ctrl" => $TCA["tx_nxindexedsearch_searchtime"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "source_uid,document_uid"
	),
	"feInterface" => $TCA["tx_nxindexedsearch_searchtime"]["feInterface"],
	"columns" => Array (
		"source_uid" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchtime.source_uid",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"document_uid" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:nxindexedsearch/locallang_db.xml:tx_nxindexedsearch_searchtime.document_uid",		
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "source_uid;;;;1-1-1, document_uid")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);*/
?>