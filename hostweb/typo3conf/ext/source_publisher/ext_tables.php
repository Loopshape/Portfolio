<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
$tempColumns = Array (
	"tx_sourcepublisher_pub_file" => Array (		
		"exclude" => 0,		
		"label" => "LLL:EXT:source_publisher/locallang_db.php:tt_content.tx_sourcepublisher_pub_file",		
		"config" => Array (
			"type" => "group",
			"internal_type" => "file",
			"allowed" => "",	
			"disallowed" => "php,php3",	
			"max_size" => 500,	
			"uploadfolder" => "uploads/tx_sourcepublisher",
			"size" => 1,	
			"minitems" => 0,
			"maxitems" => 1,
		)
	),
);


t3lib_div::loadTCA("tt_content");
t3lib_extMgm::addTCAcolumns("tt_content",$tempColumns,1);


t3lib_div::loadTCA("tt_content");
$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]="CType;;4;button;1-1-1, header;;3;;2-2-2, tx_sourcepublisher_pub_file;;;;1-1-1";


t3lib_extMgm::addPlugin(Array("LLL:EXT:source_publisher/locallang_db.php:tt_content.CType", $_EXTKEY."_pi1"),"CType");
?>