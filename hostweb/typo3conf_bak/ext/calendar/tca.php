<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

$TCA["tx_calendar_cat"] = Array (
	"ctrl" => $TCA["tx_calendar_cat"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,title"
	),
	"feInterface" => $TCA["tx_calendar_cat"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_cat.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_cat.image",		
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
		"0" => Array("showitem" => "hidden;;1;;1-1-1, title;;;;2-2-2, image;;;;3-3-3")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);

$TCA["tx_calendar_targetgroup"] = Array (
	"ctrl" => $TCA["tx_calendar_targetgroup"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,title"
	),
	"feInterface" => $TCA["tx_calendar_cat"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_targetgroup.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_targetgroup.image",		
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
		"0" => Array("showitem" => "hidden;;1;;1-1-1, title;;;;2-2-2, image;;;;3-3-3")
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);


$TCA["tx_calendar_organizer"] = Array (
	"ctrl" => $TCA["tx_calendar_organizer"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,title"
	),
	"feInterface" => $TCA["tx_calendar_organizer"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer.image",		
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
		"email" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer.email",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "email",
			)
		),
		"url" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer.url",		
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
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer.url_text",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_organizer.image",		
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
		"0" => Array("showitem" => "hidden;;1;;1-1-1, title;;;;2-2-2, email;;;;3-3-3, url;;2;;4-4-4, image;;;;5-5-5")
	),
	"palettes" => Array (
		"1" => Array("showitem" => ""),
		"2" => Array("showitem" => "url_text")
	)
);


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
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.recurring_daily", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.recurring_weekly", 2),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.recurring_monthly", 3),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.recurring_yearly", 4),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.type.exception", 5),
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
		"rec_end_date" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_end_date",
			"config" => Array (
				"type" => "input",
				"size" => "12",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0"
			),
		),
		"rec_end_times" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_end_times",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "0",
			)
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
		"repeat_weeks" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_weeks",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "1",
			)
		),
		"repeat_week_monday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_monday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"repeat_week_tuesday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_tuesday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"repeat_week_wednesday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_wednesday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"repeat_week_thursday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_thursday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"repeat_week_friday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_friday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"repeat_week_saturday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_saturday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"repeat_week_sunday" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_week_sunday",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"rec_weekly_type" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_weekly_type",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.days", 0),
					// Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.workdays", 1),
				),
			),
		),
		"rec_monthly_type" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_type",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_type.dayofmonth", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_type.weekdayofmonth", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_type.lastweekdayofmonth", 2),
				),
			),
		),
		"rec_monthly_weekday" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.monday", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.tuesday", 2),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.wednesday", 3),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.thursday", 4),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.friday", 5),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.saturday", 6),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday.sunday", 7),
				),
			),
		),
		"rec_monthly_weekday_no" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_weekday_no",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "1",
				"maximum" => "5",
			)
		),
		"rec_monthly_notfound" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_notfound",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_notfound.thismonth", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_notfound.nextmonth", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_monthly_notfound.nextmonthrepeat", 2),
				),
			),
		),
		"repeat_months" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_months",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "1",
			)
		),
		"rec_yearly_type" => Array (
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_yearly_type",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_yearly_type.givendate", 0),
					// Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.rec_daily_type.workdays", 1),
				),
			),
		),
		"repeat_years" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_years",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "1",
			)
		),
		"repeat_year_month" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.jan", 1),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.feb", 2),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.mar", 3),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.apr", 4),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.may", 5),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.jun", 6),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.jul", 7),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.aug", 8),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.sep", 9),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.oct", 10),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.nov", 11),
					Array("LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_month.dec", 12),
				),
			),
		),
		"repeat_year_day" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.repeat_year_day",		
			"config" => Array (
				"type" => "input",	
				"size" => "2",	
				"eval" => "integer",
				"default" => "1",
			)
		),
		"exception_mm" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.exception_mm",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "db",
				"allowed" => "tx_calendar_item",
				"size" => 1,	
				"minitems" => 1,
				"maxitems" => 1,
			)
		),
		"exception_skip" => Array (		
			"exclude" => 1,	
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.exception_skip",		
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"organizer_mm" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.organizer_mm",		
			"config" => Array (
				"type" => "select",	
				"foreign_table" => "tx_calendar_organizer",	
				"foreign_table_where" => "AND (tx_calendar_organizer.pid=###CURRENT_PID### OR tx_calendar_organizer.pid=###STORAGE_PID###) ORDER BY tx_calendar_organizer.uid",	
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
				"foreign_table_where" => "AND (tx_calendar_cat.pid=###CURRENT_PID### OR tx_calendar_cat.pid=###STORAGE_PID###) ORDER BY tx_calendar_cat.uid",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
				"items" => Array (
					Array("", 0),
				),
			)
		),
		"targetgroup" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:calendar/locallang_db.php:tx_calendar_item.targetgroup",		
			"config" => Array (
				"type" => "select",	
				"foreign_table" => "tx_calendar_targetgroup",	
				"foreign_table_where" => "AND (tx_calendar_targetgroup.pid=###CURRENT_PID### OR tx_calendar_targetgroup.pid=###STORAGE_PID###) ORDER BY tx_calendar_targetgroup.uid",	
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
		"0" => Array(
				"showitem" => "title;;2;;1-1-1, eventtype;;2;;3-3-3",
			),
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
		"12"	=>	Array("showitem" => "repeat_week_monday, repeat_week_tuesday, repeat_week_wednesday, repeat_week_thursday, repeat_week_friday, repeat_week_saturday, repeat_week_sunday"),
		"13"	=>	Array("showitem" =>	"rec_monthly_weekday_no, rec_monthly_weekday, rec_monthly_notfound"),
		"14"	=>	Array("showitem" =>	""), // year's palette
		"15"	=>	Array("showitem" =>	"exception_skip"),
	)
);

$TCA["tx_calendar_item"]["ctrl"]["type"]		=	'eventtype';
$TCA["tx_calendar_item"]["ctrl"]["mainpalette"]		=	'1';
$TCA["tx_calendar_item"]["ctrl"]["canNotCollapse"]	=	'1';
$TCA["tx_calendar_item"]["ctrl"]["requestUpdate"]	=	'rec_daily_type,rec_monthly_type';

// now build the type 1 (recurring event) array dynamically
$TCA["tx_calendar_item"]["types"]["1"] = Array(
		"showitem" => "title;;2;;1-1-1, eventtype;;2;;1-1-1, rec_daily_type;;11;;",
		"subtype_value_field"	=>	"rec_daily_type",
		"subtypes_excludelist"	=>	Array(
							// if "rec_daily_type" == on workdays (subtype 1), don't display repeat_days
							"1"	=>	"repeat_days",
						),
);
$TCA["tx_calendar_item"]["types"]["2"] = Array(
		"showitem" => "title;;2;;1-1-1, eventtype;;2;;1-1-1, repeat_weeks;;12;;",
);
$TCA["tx_calendar_item"]["types"]["3"] = Array(
		"showitem" => "title;;2;;1-1-1, eventtype;;2;;1-1-1, rec_monthly_type;;13;;, repeat_months",
		"subtype_value_field"	=>	"rec_monthly_type",
		"subtypes_excludelist"	=>	Array(
							"0"	=>	"rec_monthly_weekday,rec_monthly_weekday_no,rec_monthly_notfound",
						),
);


$TCA["tx_calendar_item"]["types"]["4"] = Array(
		"showitem" => "title;;2;;1-1-1, eventtype;;2;;1-1-1, rec_yearly_type;;14;;, repeat_years",
);
$TCA["tx_calendar_item"]["types"]["5"] = Array(
		"showitem" => "title;;2;;1-1-1, eventtype;;2;;1-1-1, exception_mm;;15;;",
);

foreach(array("1", "2", "3", "4") as $type) {
	$TCA["tx_calendar_item"]["types"][$type]["showitem"] .= ", rec_end_date;;;;, rec_end_times";
}

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['calendar']);

$organizer = "";
switch ($confArr['externalTables']) {
	case 0:
		$organizer = "organizer_mm;;;;4-4-4, organizer;;4, organizer_url;;6, ";
		break;
	case 1:
		$organizer = "organizer_mm;;;;4-4-4, ";
		break;
	case 2:
		$organizer = "organizer;;4;;4-4-4, organizer_url;;6, ";
		break;
}

foreach(array("0", "1", "2", "3", "4", "5") as $type) {
	$TCA["tx_calendar_item"]["types"][$type]["showitem"] .= ", category;;;;2-2-2, targetgroup;;;;2-2-2, $organizer place;;3;;4-4-4, teaser;;;;5-5-5, descr;;;richtext[*]:rte_transform[mode=ts_css|imgpath=uploads/tx_calendar/rte/], moreinfo;;;richtext[*]:rte_transform[mode=ts_css|imgpath=uploads/tx_calendar/rte/], url;;5, image";

}



?>
