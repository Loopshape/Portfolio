<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

$TCA["tx_calendar_item"] = Array (

	"ctrl" => $TCA["tx_calendar_item"]["ctrl"],
	"feInterface" => $TCA["tx_calendar_item"]["feInterface"],
	"interface" => Array (
		// fix this!
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,title,start_date,start_time,end_date,end_time,descr,category,place,address,moreinfo"
	),
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"starttime" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.starttime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"default" => "0",
				"checkbox" => "0"
			)
		),
		"endtime" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.endtime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0",
				"range" => Array (
					"upper" => mktime(0,0,0,12,31,2020),
					"lower" => mktime(0,0,0,date("m")-1,date("d"),date("Y"))
				)
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.fe_group",
			"config" => Array (
				"type" => "select",	
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.php:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.php:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.php:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "40",	
				"eval" => "required",
			)
		),
		"eventtype" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.eventtype",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.regular", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.recurring", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.exception", 2),
				),
			),
		),
		"start_date" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.start_date",		
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0"
			)
		),
		"start_time" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.start_time",		
			"config" => Array (
				"type" => "input",
				"size" => "12",
				"max" => "20",
				"eval" => "time",
				"default" => "0",
				"checkbox" => "0",
			)
		),
		"end_date" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.end_date",		
			"config" => Array (
				"type" => "input",
				"size" => "12",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0"
			)
		),
		"end_time" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.end_time",		
			"config" => Array (
				"type" => "input",
				"size" => "12",
				"max" => "20",
				"eval" => "time",
				"checkbox" => "0",
				"default" => "0"
			)
		),
		"series_type" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.series_type",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.series_type.daily", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.series_type.weekly", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.series_type.monthly", 2),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.series_type.yearly", 3),
				),
			),
		),
		"rec_daily_type" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.days", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.workdays", 1),
				),
			),
		),
		"repeat_days" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_days",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "1",
			)
		),
		"rec_weekly_type" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.days", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.workdays", 1),
				),
			),
		),
		"organizer_mm" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.organizer_mm",		
			"config" => Array (
				"type" => "select",	
				"foreign_table" => "tx_calendar_organizer",	
				"foreign_table_where" => "AND tx_calendar_organizer.pid=###CURRENT_PID### ORDER BY tx_calendar_organizer.uid",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
				"items" => Array (
					Array("", 0),
				),
			)
		),
		"organizer" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.organizer",		
			"config" => Array (
				"type" => "input",	
				"size" => "40",	
			)
		),
		"organizer_email" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.organizer_email",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "email",
			)
		),
		"organizer_url" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.organizer_url",		
			"config" => Array (
				"type" => "input",		
				"size" => "35",
				"max" => "255",
				"checkbox" => "",
				"eval" => "trim",
				"wizards" => Array(
					"_PADDING" => 2,
					"link" => Array(
						"type" => "popup",
						"title" => "Link",
						"icon" => "link_popup.gif",
						"script" => "browse_links.php?mode=wizard",
						"JSopenParams" => "height=300,width=500,status=0,menubar=0,scrollbars=1"
					)
				)
			)
		),
		"organizer_url_text" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.organizer_url_text",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"teaser" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.teaser",		
			"config" => Array (
				"type" => "text",
				"cols" => "40",	
				"rows" => "3",
			)
		),
		"descr" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.descr",		
			"config" => Array (
				"type" => "text",
				"cols" => "40",
				"rows" => "10",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"category" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.category",		
			"config" => Array (
				"type" => "select",	
				"foreign_table" => "tx_calendar_cat",	
				"foreign_table_where" => "AND tx_calendar_cat.pid=###CURRENT_PID### ORDER BY tx_calendar_cat.uid",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
				"items" => Array (
					Array("", 0),
				),
			)
		),
		"place" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.place",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"address" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.address",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "3",
			)
		),
		"moreinfo" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.moreinfo",		
			"config" => Array (
				"type" => "text",
				"cols" => "40",
				"rows" => "10",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"url" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.url",		
			"config" => Array (
				"type" => "input",		
				"size" => "35",
				"max" => "255",
				"checkbox" => "",
				"eval" => "trim",
				"wizards" => Array(
					"_PADDING" => 2,
					"link" => Array(
						"type" => "popup",
						"title" => "Link",
						"icon" => "link_popup.gif",
						"script" => "browse_links.php?mode=wizard",
						"JSopenParams" => "height=300,width=500,status=0,menubar=0,scrollbars=1"
					)
				)
			)
		),
		"url_text" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.url_text",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.image",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "gif,png,jpeg,jpg",	
				"max_size" => 500,	
				"uploadfolder" => "uploads/tx_calendar",
				"show_thumbs" => 1,	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "title;;2;;1-1-1, eventtype;;2;;3-3-3, category;;;;2-2-2, organizer_mm;;;;4-4-4, organizer;;4, organizer_url;;6, place;;3;;4-4-4, teaser;;;;5-5-5, descr;;;richtext[*]:rte_transform[mode=ts_css|imgpath=uploads/tx_calendar/rte/], moreinfo;;;richtext[*]:rte_transform[mode=ts_css|imgpath=uploads/tx_calendar/rte/], url;;5, image"),
	),
	"palettes" => Array (
		"1"  => Array("showitem" => "hidden,starttime, endtime, fe_group"),
		"2"  => Array("showitem" => "start_date, start_time, end_date, end_time"),
		"3"  => Array("showitem" => "address"),
		"4"  => Array("showitem" => "organizer_email"),
		"5"  => Array("showitem" => "url_text"),
		"6"  => Array("showitem" => "organizer_url_text"),
		"8"  => Array("showitem" => "start_time"),
		"9"  => Array("showitem" => "end_time"),
		"10"  => Array("showitem" => "repeat_days"),

		// Palette for recurring daily, every X days
		"11"	=>	Array("showitem" =>	"repeat_days"),
	)
);

// now build the type 1 (recurring event) array dynamically
$TCA["tx_calendar_item"]["types"]["1"] = Array("showitem" =>
	"title;;2;;1-1-1, eventtype;;2;;1-1-1, series_type;;;;",
);

// category;;;;2-2-2, organizer_mm;;;;4-4-4, organizer;;4, organizer_url;;6, place;;3;;4-4-4, teaser;;;;5-5-5, descr;;;richtext[*]:rte_transform[mode=ts_css|imgpath=uploads/tx_calendar/rte/], moreinfo;;;richtext[*]:rte_transform[mode=ts_css|imgpath=uploads/tx_calendar/rte/], url;;5, image",



?>
