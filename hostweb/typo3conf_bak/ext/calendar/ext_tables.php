<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

t3lib_extMgm::allowTableOnStandardPages("tx_calendar_cat");

$TCA["tx_calendar_cat"] = Array (
	"ctrl" => Array (
		"title" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_cat",		
		"label" => "title",	
		"tstamp" => "tstamp",
		"crdate" => "crdate",
		"cruser_id" => "cruser_id",
		"sortby" => "sorting",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_calendar_cat.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, title",
	)
);

t3lib_extMgm::allowTableOnStandardPages("tx_calendar_targetgroup");

$TCA["tx_calendar_targetgroup"] = Array (
	"ctrl" => Array (
		"title" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_targetgroup",		
		"label" => "title",	
		"tstamp" => "tstamp",
		"crdate" => "crdate",
		"cruser_id" => "cruser_id",
		"sortby" => "sorting",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_calendar_targetgroup.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, title",
	)
);

t3lib_extMgm::allowTableOnStandardPages("tx_calendar_organizer");

$TCA["tx_calendar_organizer"] = Array (
	"ctrl" => Array (
		"title" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer",		
		"label" => "title",	
		"tstamp" => "tstamp",
		"crdate" => "crdate",
		"cruser_id" => "cruser_id",
		"sortby" => "sorting",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_calendar_organizer.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, title",
	)
);

t3lib_extMgm::allowTableOnStandardPages("tx_calendar_item");
t3lib_extMgm::addToInsertRecords("tx_calendar_item");

$TCA["tx_calendar_item"] = Array (
	"ctrl" => Array (
		"title" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item",		
		"label" => "title",	
		"tstamp" => "tstamp",
		"crdate" => "crdate",
		"cruser_id" => "cruser_id",
		"default_sortby" => "ORDER BY start_date DESC",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",	
			"starttime" => "starttime",	
			"endtime" => "endtime",	
			"fe_group" => "fe_group",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_calendar_item.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, starttime, endtime, fe_group, title, start_date, start_time, end_date, end_time, descr, category, place, address, moreinfo",
	)
);


t3lib_div::loadTCA("tt_content");
t3lib_extMgm::addTCAcolumns("tt_content", $tempColumns, 1);
$TCA["tt_content"]["types"]["list"]["subtypes_excludelist"][$_EXTKEY."_pi1"]="layout,select_key,pages,recursive";
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY."_pi1"]='pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY."_pi1", 'FILE:EXT:calendar/flexform_ds.xml');

t3lib_extMgm::addPlugin(Array("LLL:EXT:calendar/locallang_db.php:tt_content.list_type", $_EXTKEY."_pi1"),"list_type");

?>
