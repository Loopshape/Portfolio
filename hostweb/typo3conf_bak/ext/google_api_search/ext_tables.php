<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

## WOP:[pi][1][addType]
t3lib_div::loadTCA("tt_content");
$TCA["tt_content"]["types"]["list"]["subtypes_excludelist"][$_EXTKEY."_pi1"]="layout,select_key";


## WOP:[pi][1][addType]
t3lib_extMgm::addPlugin(Array("LLL:EXT:google_api_search/locallang_db.php:tt_content.list_type", $_EXTKEY."_pi1"),"list_type");


## WOP:[pi][1][plus_wiz]:
if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_googleapisearch_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY)."pi1/class.tx_googleapisearch_pi1_wizicon.php";
?>