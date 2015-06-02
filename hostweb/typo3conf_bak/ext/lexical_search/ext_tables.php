<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
$tempColumns = Array (
	"tx_lexicalsearch_keywords" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:lexical_search/locallang_db.php:pages.tx_lexicalsearch_keywords",		
		"config" => Array (
			"type" => "input",	
			"size" => "30",	
			"eval" => "trim",
		)
	),
);


t3lib_div::loadTCA("pages");
t3lib_extMgm::addTCAcolumns("pages",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("pages","tx_lexicalsearch_keywords;;;;1-1-1");


t3lib_div::loadTCA("tt_content");
$TCA["tt_content"]["types"]["list"]["subtypes_excludelist"][$_EXTKEY."_pi1"]="pages,recursive,layout,select_key";


t3lib_extMgm::addPlugin(Array("LLL:EXT:lexical_search/locallang_db.php:tt_content.list_type", $_EXTKEY."_pi1"),"list_type");


if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_lexicalsearch_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY)."pi1/class.tx_lexicalsearch_pi1_wizicon.php";
?>