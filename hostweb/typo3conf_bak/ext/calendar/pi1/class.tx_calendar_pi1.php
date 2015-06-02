<?php

/***************************************************************
*  Copyright notice
*  
*  (c) 2004 Alexander Langer <alex@big.endian.de>
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is 
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
* 
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
* 
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/*
 * This code cointains contributions by:
 *	- Martin Klaus <klausm@in.tum.de> (rec_monthly type by given weekday in month)
 *  - Ingo Renner <ingo@ingo-renner.com> (lots of bug fixes and the icon sets)
 *
 * This code is formatted using the PHPEclipse Formatting function.
 */

/** 
 * Plugin 'Extended Calendar' for the 'calendar' extension.
 *
 * @author	Alexander Langer <alex@big.endian.de>
 */
require_once (PATH_tslib."class.tslib_pibase.php");

/* This corrensponds to the values you can set in the backend */
define("CALENDAR_VIEW_MONTH", 0);
define("CALENDAR_VIEW_WEEK", 1);
define("CALENDAR_VIEW_DAY", 2);
define("CALENDAR_VIEW_UPCOMING", 3);
define("CALENDAR_VIEW_EVENT", 4);

/**
 * This function is used in array_sort to sort events of a day by the start of the event 
 */
function sort_events_by_starttime($a, $b) {
	if ($a['start_date'] + $a['start_time'] < $b['start_date'] + $b['start_time'])
		return false;
	else
		return true;
}

/**
 * This is the Frontend Plugin (1) for the extension calendar.
 * A few words about the design of this class.
 * 
 * The plugin is called by main() from Typo3.
 * In main(), some FlexForms configuration is used to decide what viewmode we are in.
 * 
 * Now, one of the displayXXXFirst() functions are called, where XXX is e.g. "Month" or "Day" or "Week" or "Event" etc.
 * Those *First() functions select all the events that are required to display the given timespan from the MySQL
 * tables.  Then those are fed to the displayXXX() function, that are the same that can be used form within Typoscript.
 * 
 * Given that a day is a set of events, a week is a set of days, a month is a set of weeks and a year is always 12 months,
 * it's pretty easy to use only one function for all those display modes.
 * 
 * It should be clear when you see how the months view is rendered.  Start from main() and take a look at the call-path
 * that the extension is taking:
 * 
 * main() -> displayMonthFirst() -> displayMonth() -> For every week, switch to TS to render the "week" TEMPLATE.
 * the "week" TEMPLATE as a DAYS subpart specified, that is a USER function with .userFunc set to displayWeek().
 * displayWeek() then does this:  For every day in this week, switch to TS to render the "day" TEMPLATE.  Now the same
 * happends for the day (.userFunc displayDay() -> ###EVENTS### subpart for each event.
 * Finally, the displayDay() function sets the $data['currentRow'] $row for every event of that day and again calls
 * a Typoscript Content Object to display this event.  The event is a TEMPLATE content object again, and sets a lot
 * of markers.  For example, the ###EVENT_TITLE### marker can then be easily rendered by a TEXT content object with .field set to 'title'
 * 
 * This way this extension uses Typo3's full power to render Typoscript content objects whereever possible.  A lot of users
 * are using GIFBUILDER to render e.g. events. 
 * 
 * This also means, though, that it takes a lot of time to render the extension for a first time, because a month as at least
 * 4 weeks, 30 days, so without any event it is already like 35-40 content objects that are rendered.  Now, with any event a
 * whole lot of default markers are parsed, and since Typo3 doesn't optimize this  and only replaces actually used markers,
 * that ends up like TONS of user objects being rendered.  However, you can truly optimize this by one of this PHP acclerators
 * out there.  Also, if speed is an issue, you can replace the default displayMonth() .userFunc by a self-written of your own that
 * goes down to the events layer w/o the steps week->day.  However, caching fully works with this extension, so speed is usually
 * no big problem.  See the manual for more options.  I really hope to have such a replacement displayMOnth() function
 * available at some time later.
 * 
 * Another noteable thing is that I don't wanted to have the user create tons of template files.  So I just created
 * one template file per view, and the template itself is taken from this main template by selecting the right subparts.
 * This template is then fed back to the makeXXXrow() functions.  If a user don't like this approach, he can of course
 * create a bazillion of template files per week and then just set the TEMPLATE content object to point to that file instead
 * of the TEXT field that is currently being used with .field = TEMPLATE_xxx.
 */
class tx_calendar_pi1 extends tslib_pibase {
	var $prefixId = "tx_calendar_pi1"; // Same as class name
	var $scriptRelPath = "pi1/class.tx_calendar_pi1.php"; // Path to this script relative to the extension dir.
	var $extKey = "calendar"; // The extension key.
	var $dbTable = "tx_calendar_item"; // DB Table that holds our events (used for $row)
	var $allowCaching = true;

	/**
	 * This function is only a wrapper to PHPs strtime() function so that we can use it from Typoscript
	 */
	function strtotime($content, $conf) {
		return strtotime($conf['strtotime'], $content);
	}

	/**
	 * Register class defaults.  Used from the constructor.
	 */
	function initdefaults($content, $conf) {
		/* Save configuration for later use */
		$this->conf = $conf;

		/* Typo3-API init */
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_initPIflexForm(); // Init FlexForm configuration for plugin

		/* I'm not quite sure what this was for, IIRC some Typo3 API stuff */
		$this->internal["currentTable"] = $this->dbTable;

		/*
		 * Where are we suppoed to fetch the items/categories from?
		 * This correstponds to the "STaring Point" one sets in the Typo3 Backend in the Flexforms configuration.
		 * This code is taken from another extension, IIRC tt_news
		 */
		$pid_list = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'pages');
		$pid_list = $pid_list ? implode(t3lib_div :: intExplode(',', $pid_list), ',') : $GLOBALS['TSFE']->id;
		$recursive = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'recursive', 'sDEF');
		/* extend the pid_list by recursive levels */
		$this->SetPidlist($this->pi_getPidList($pid_list, $recursive));

		/* Load our Categories and Targetgroups */
		$this->loadCategories();
		$this->loadTargetgroups();
	}

	/**
	 * The main Frontend Plugin function used by Typo3 to call the plugin.
	 * $content and $conf are the usual arrays.  $conf contains "our" Typoscript code 
	 */
	function main($content, $conf) {
		/* Maybe one specified a Typoscript-Prefix in Flexforms.  go one level into this prefix if so. */
		$conf = $this->toplevelConfig($conf);
		$this->initdefaults($content, $conf);
		$content .= $this->pi_getEditPanel();

		switch ($this->getCurrentView()) {
			case CALENDAR_VIEW_WEEK :
				$content .= $this->displayWeekFirst();
				break;
			case CALENDAR_VIEW_DAY :
				$content .= $this->displayDayFirst();
				break;
			case CALENDAR_VIEW_EVENT :
				$content .= $this->displayEventFirst($this->pi_getRecord($this->dbTable, intval($this->piVars['f1'])), $conf);
				break;
			case CALENDAR_VIEW_UPCOMING :
				$content .= $this->displayUpcomingFirst();
				break;
			case CALENDAR_VIEW_MONTH :
			default :
				$content .= $this->displayMonthFirst();
				break;
		}
		return $this->pi_wrapInBaseClass($content);
	}

	/**
	 * If a typoscript_prefix is specified, use this one and not the "toplevel" Configuration in $conf that
	 * we'd use otherwise.  This is quite useful if you want to render different month views with different
	 * Typoscript setups.
	 */
	function toplevelConfig($conf) {
		/* fetch the prefix.  If it is nonempty, go one level below in the $conf array.  If not, do nothing */
		$TSprefix = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'typoscript_prefix');
		if ($TSprefix != "") {
			$conf = $conf[$TSprefix.'.'];
		}
		return $conf;
	}

	/**
	 * This function fetches all the categories that the plugin is allowed to display into an internal
	 * array, $this->categories.  The configuration is taken from the corresponding Flexforms values
	 * 
	 * Important:  This function is copy&pasted to the corresponding function for targetgroups.
	 * If you fix any bugs here, please also fix them in loadTargetgroups().
	 */
	function loadCategories() {
		/* first get the SELECT Query in another function */
		$query = $this->pi_categoriesUsed("tx_calendar_cat");
		/* select all categories */
		$res = mysql_query($query);
		/* XXX I'm pretty sure we sholuld use Typo3's DB abstraction layer here instead! */
		if (mysql_errno()) {
			die(mysql_error());
		}

		/* First, select the "Category mode" that is specified in the Flexform configuration */
		$catmode = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'categoryMode', 's_category');
		
		/* Now get all those categories that are specified in the FlexForms configuration. */
		$ffcats = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'categorySelection', 's_category');
		
		/* This is a comma-seperated list of the uids of the cateogires, so we first need to split it into an array */
		$ffcatsarray = preg_split("/,/", $ffcats);

		/*
		 * If the Mode is 0, we use all categories, no exception.
		 * Because our Filter functions rely on the uid of the category set in the $this->categories array,
		 * we also need to add a dummy item for those events that have no category assigned and thus defaulting
		 * to the MySQL default value, which is 0.
		 */
		if ($catmode == 0) {
			$this->categories[0] = array ('uid' => 0, 'title' => '[no category]',);
		}

		/* Now, fetch all the categories. */
		/* XXX I'm pretty sure, there's a cool database abstraction layer in Typo3 for the mysql function call */
		while ($row = mysql_fetch_assoc($res)) {
			/*
			 * A few words on the catmodes:
			 * 0 means "include all categores", so we just add them by default
			 * 1 means "Only the selected categores", so we need to look the uid up in the $ffcatsarray and
			 *   we may only include it if it is in that array
			 * 2 means "Dissplay all but those", so we again need to look them up but do NOT include them if they are in this array
			 */
			switch ($catmode) {
				case 0 :
					/* ok, just add it */
					$this->categories[$row["uid"]] = $row;
					break;
				case 1 :
					if (in_array($row['uid'], $ffcatsarray)) {
						$this->categories[$row["uid"]] = $row;
					}
					break;
				case 2 :
					if (!in_array($row['uid'], $ffcatsarray))
						$this->categories[$row["uid"]] = $row;
					break;
			}
		}
	}
	
	
	/**
	 * This does the very same for Targetgroups as loadCateogires() does for Categores, so please see there.
	 */
	function loadTargetgroups() {
		$query = $this->pi_categoriesUsed("tx_calendar_targetgroup");
		$res = mysql_query($query);
		if (mysql_errno()) {
			die(mysql_error());
		}

		$targetmode = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'targetgroupMode', 's_category');
		$fftargets = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'targetgroupSelection', 's_category');
		$fftargetsarray = preg_split("/,/", $fftargets);

		if ($targetmode == 0) {
			$this->targetgroups[0] = array ('uid' => 0, 'title' => '[no targetgroup]',);
		}

		while ($row = mysql_fetch_assoc($res)) {
			switch ($targetmode) {
				case 0 :
					// add all
					$this->targetgroups[$row["uid"]] = $row;
					break;
				case 1 :
					if (in_array($row['uid'], $fftargetsarray)) {
						$this->targetgroups[$row["uid"]] = $row;
					}
					break;
				case 2 :
					if (!in_array($row['uid'], $fftargetsarray))
						$this->targetgroups[$row["uid"]] = $row;
					break;
			}
		}
	}


	/**
	 * I wanted to use this function to improve rendering of the organizers array, but this part of
	 * the code is by far not the slowest, so this is just silly.  But hence the bad name.
	 * 
	 * One should really rename this function and use proper Typo3 API for the creation of the SELECT query.
	 * This way it is just stupid.
	 * A big TODO.
	 */
	function pi_organizersUsed($cat_table) {
		$pidList = $this->getPidlist();
		$query = "SELECT ".$cat_table.".* "."\n"."FROM $cat_table WHERE $cat_table.pid IN ($pidList)".$this->cObj->enableFields($cat_table)."\n";
		return $query;
	}
	
	/**
	 * Same as for pi_organizersUsed.  It's just stupid to have this function.  It's even 1:1 code of the organizers function.
	 * Go away! Big TODO
	 */
	function pi_categoriesUsed($cat_table) {
		// XXX should be modified to return only categories that are really in use.  
		$pidList = $this->getPidlist();
		$query = "SELECT ".$cat_table.".* "."\n"."FROM $cat_table WHERE $cat_table.pid IN ($pidList)".$this->cObj->enableFields($cat_table)."\n";
		return $query;
	}

	/**
	 * From the Typoscript, I somehow need to get access to some of the values one specified in the FlexForms Plugin
	 * configuration, e.g. the pages that one specified for the different views.
	 * As there seems to be no way to access those values from Typoscript directly,
	 * I need to add them to the $currentRow that is used to render the Typoscript output.  There I can access those
	 * values through .field = PAGE_WEEK etc.
	 * 
	 * The array is passed by reference.
	 */
	function setFlexValues(& $ar) {
		// feed extra values into content object
		$ar['PAGE_EVENT'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'event_page');
		$ar['PAGE_DAY'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'day_page');
		$ar['PAGE_WEEK'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'week_page');
		$ar['PAGE_MONTH'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'month_page');
		$ar['PAGE_YEAR'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'year_page');
	}


	/*
	 * Called from main(), we are supposed to display the row $row.
	 * Nothing sepcial to do, just load the template for this view and then set (for indexed search) the the doc-title
	 * to the title of the current row.
	 */
	function displayEventFirst($row, $conf) {
		/* 
		 * Given a $row from main(), $row doesn't contain the template yet.  So we need to load it using
		 * our function for this purpose
		 * */ 
		$template = $this->loadTemplate();
		
		/*
		 * For nice indexed search results, we use the title of this event as the page title
		 * I'm unsure if this works, I have taken this from tt_news *g*
		 */
		if ($row["title"])
			$GLOBALS["TSFE"]->indexedDocTitle = $row["title"];

		/*
		 * ok, everything else is done in the displayEvent() function, so we should just call it.
		 * displayEvent() however expects a Typoscript configuration in $conf that fits to the
		 * event few.  For the "top" event view we need to go down one level into the "displayEvent." configuration
		 * part of the plugin config.
		 */
		return $this->displayEvent($row, $conf['displayEvent.'], $template);
	}


	/**
	 * This function is responsible for rendering an event.  
	 * It is either called from Typoscript to render the current row, or from displayEventFirst().
	 * 
	 * Also, since version 1.1.0 we can fed arbitrary content objects into the calendar.  "calendar" relies
	 * on the field "calendar_object_type" to decide what kind of event this is, and selects the right function
	 * that is called to render the final object based ont he value of this field.
	 * 
	 * XXX I'm unsure if you get PHP errors in the httpd error log as from Typoscrip usually the third parameter isn't set  ???
	 */
	function displayEvent($row, $conf, $template) {
		/*
		 * If this function is used from another Plugin or from anywhere in Typo3,
		 * the calendar_object_type has no value.  But we can be sure it's our own, so
		 * we just set this to "our" type, which is "event".
		 * 
		 * Also, somehow the 'Upcoming' and 'Event' views don't set these values, so in 1.1.0 they didn't work.  Ooops.
		 * This is a workaround and should be fixed proberly in a later version.  This is a TODO.
		 */
		if ($row['calendar_object_type'] == "")
			$row['calendar_object_type'] = "event";
			
		/* Now we need to decide what exactly we are going to render */
		switch ($row['calendar_object_type']) {
			case 'event' :
				/* 
				 * hey, that's us.  First, we need to add some extra fields into the $row objects, that we need
				 * in the Typoscript content object for this event.  Reasons are explained in the description
				 * of setFlexValues(). 
				 */
				$this->setFlexValues($row);
				$row['TEMPLATE_EVENT'] = $template;
				
				/*
				 * In Typoscript, it's actually very hard to calculate the real beginning of the event,
				 * which is start_date + start_time.   So we do this here and call it a new field, event_time.
				 * */
				$row['event_start'] = $row['start_date'] + $row['start_time'];
				/*
				 * The same holds for the end of this event.  However, end_date has specieal meanings here:
				 * end_date == 0 just means, the end_date is the same as the start_date.
				 */
				if ($row['end_date'] > 0)
					$row['event_end'] = $row['end_date'] + $row['end_time'];
				else if ($row['end_time'] > 0)
					$row['event_end'] = $row['start_date'] + $row['end_time'];
				else
					$row['event_end'] = 0;
					
				/* Ok, this is just Typo3 API to render the $row as a Content Object specified in $conf['event']. */
				$eventobj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
				$eventobj->start($row);
				$addevent = $eventobj->cObjGetSingle($conf['event'], $conf['event.']);
				return $addevent;
			default :
				/*
				 * for arbitrary objects, the $conf array has a value that is
				 * of this name (value of calendar_object_type).  We rely on this as being
				 * a Typo3 Content Object as well.  In general, this is no big deal as
				 * ALL Typo3 frontend plugins are called as Typo3 content objects.  For example
				 * in the tt_news case, we can just use the default tt_news USER object which is configured
				 * through Typoscript in our own Typoscript.  Thanks to the power of Typo3's TS, this is really easy.  Wow.
				 * 
				 * What follows is pure Typo3-API:  Create a new content object, set the current row to $row and call it.
				 */
				$tmp = $row['calendar_object_type'];
				$obj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
				$obj->start($row);
				$add = $obj->cObjGetSingle($conf[$tmp], $conf[$tmp.'.']);
				return $add;
		}
	}

	/**
	 * Typoscript wants to see a "row", that is very similar to MySQL result rows, if we want to use its power to
	 * render days within Typoscript with the help of common content objects.
	 *
	 * Unfortunately, we never "selected" a day from any database, so we must simulate mysql_fetch_row() by
	 * just creating an array() with all the fields we will need in the "day" TEMPLATE Content object later.
	 * This is what we do here.
	 * 
	 * Params:  $events is an array of the following form:  $events[<year>][<month][<day][<events], so it basically
	 *     	contains all events of that given day.  Currently it also does contain the events of all the other
	 *     	events the plugin is currently displaying, but this is only my laznyness and you should not rely on this
	 *     	in future versions.
	 * 		
	 * 		$template is the template for this day view, and is put into the TEMPLATE_DAY field, so we can later, in Typoscript,
	 * 			use it by setting the TEMPLATE resource to TEXT and use the .field = TEMPLATE_DAY.
	 * 
	 * 		$daytime is the <seconds since epoch> time for this date, noteably the start-second of this day.
	 * 			This might vary from timezone to timezone, so you shouldn't do any serious calculations with it,
	 * 			but it's used to generate some of the fields here.  As it's only used internally, timezone conflicts
	 * 			won't show up, as we only use it in this function.  However, you really shouldn't start to do
	 * 			anything with it, e.g. calculations or comparisons with the start_date field that is set from the backend.
	 * 			Those values will only be the same if you are in the same timezone as the server, and also
	 * 			Typo3's backend doesn't seem to be 100% daylight savings time clean!
	 * 
	 * 		$currentMonth is basically for the Monthview.  If one renders a month, for alignment it's nice to
	 * 			see the last days of the previous month and the first days of the next month as well.
	 * 			So, if we want to be add an extra CSS marker from Typoscript that checks, if this day is in this
	 * 			month or not, we need to know what month we are currently displaying.
	 *    
	 */
	function makeDayRow($events, $template, $daytime, $currentMonth) {
		$dayrow = array ();
		$dayrow['TEMPLATE_DAY'] = $template;

		$year = date('Y', $daytime);
		$month = date('m', $daytime);
		$day = date('d', $daytime);

		$dayrow['year'] = $year;
		$dayrow['month'] = $month;
		$dayrow['day'] = $day;

		$dayrow['events'] = $events;

		$dayrow['day_time'] = $daytime;
		$dayrow['day_of_week'] = strftime('%u', $daytime);
		$dayrow['pi_flexform'] = $this->cObj->data['pi_flexform'];
		$dayrow['THIS_MONTH'] = $currentMonth;
		$dayrow['TODAY'] = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$dayrow['event_count'] = count($events[$year][$month][$day]);

		$this->setFlexValues($dayrow);

		return $dayrow;
	}

	/**
	 * Called from main(), this means we are going to display a given day, similar to displayEventFirst().
	 */
	function displayDayFirst() {
		/**
		 * Load the template, from a file, from a resource, whatever.
		 */
		$template = $this->loadTemplate();

		/**
		 * In case, we are allowed to switch the date by the GET vars that we are using (specified in flexforms config),
		 * we have to check the three GET vars f1/f2/f3 which hold the <year>/<month>/<day> and adjust the day that we are
		 * going to display accordingly.  If they are not set, we just use the default, which is the "current" day.
		 */
		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f3']))
			$day = intval($this->piVars['f3']);
		else
			$day = date('d');

		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f2']))
			$month = intval($this->piVars['f2']);
		else
			$month = date('m');

		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f1']))
			$year = intval($this->piVars['f1']);
		else
			$year = date('Y');

		/* now switch to seconds, so that we can use strotoime() */
		$daytime = mktime(0, 0, 0, $month, $day, $year);

		/*
		 * You can create a default "offset" date, which can be used to display e.g. the NEXT month by default
		 * instead of the current one.  If an offset is set, adjust all those values above.
		 */
		$date_off = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'date_offset');
		if ($date_off != "") {
			$daytime = strtotime($date_off, $daytime);
			$year = date('Y', $daytime);
			$month = date('m', $daytime);
			$day = date('d', $daytime);
		}
		/* We also need to know about the end of this day, which is the start of the next day */
		$endtime = strtotime("+1 days", $daytime);

		/* Select this day's events */
		$eventmatrix = $this->getEventsInRange($year, $month, $day, date('Y', $endtime), date('m', $endtime), date('d', $endtime));

		/* What follows is Typo3 API - create a content object, create a day "row" (see makeDayRow() above), display it */
		$dayobj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
		$day = $this->makeDayRow($eventmatrix, $template, $daytime, $month);
		$dayobj->start($day);
		$lConf = $this->conf['displayDay.'];
		return $dayobj->cObjGetSingle($lConf['day'], $lConf['day.']);
	}

	/**
	 * This function is usually called as a Typoscript USER content object, e.g. for the "###EVENTS###" subpart.
	 * Its main purpose is to select all events of this day, create a content object and call the displayEvent()
	 * function, which uses Typo3 API to render each event.
	 * 
	 * Additionally it does some calculations that can't be done in Typoscript, but are crucial for nice formatting.
	 * 
	 * For example, if we want to create a nice time-schedule view of all events of this day,
	 * we need to know what "interval" this events start and en in.  Intervals can be like 30 minutes,
	 * and the calculation of the "start interval" uses a mod-calculation.  This is hard in Typo3.  For easy usage in TS,
	 * this is done here. 
	 * 
	 * displayDay() expects the current day to be the current data set in Typoscript, i.e. the output of makeDayRow().
	 */
	function displayDay($content, $conf) {
		/* XXX $lConf is old code, could be replaced sometime by $conf. */
		$lConf = $conf;
		
		/* we expect all our data to be in the dObj's data array. */
		/* XXX I'm pretty sure direct access to the ->data field is not allowed, where's the Getter functoin? */
		$data = $this->cObj->data;
		
		/* ok, what date are we going to display? */
		$year = $data['year'];
		$month = $data['month'];
		$day = $data['day'];
		/* This contains all the events that we are going to render */
		$eventmatrix = $data['events'];
		/* 
		 * Sometimes this is not an array, PHP doesn't like this below, so we just make it an empty array in this case
		 */
		if ($eventmatrix == null) {
			$eventmatrix = array ();
		}

		/* Get configuration from FlexForms.  $interval is the number of seconds one "interval" is supposed to last */
		$interval = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'interval', 's_day');
		/* if it's not set, we should default to 30 minutes, which is 1800 seconds */
		if ($interval == 0)
			$interval = 1800;

		/* shortcut to all the events of this day */
		$todaysevents = $eventmatrix[$year][$month][$day];

		/* For the interval stuff, we also need start of end of this day */
		$today_time = mktime(0, 0, 0, $month, $day, $year);
		$tomorrow_time = strtotime("+1 days", $today_time);

		/* This will hold all the content we are going to render.  It's return()ed later */
		$theEvents = "";

		/* if there are no events today, this is not an array.  Make it one for the foreach() below */
		if (!is_array($todaysevents))
			$todaysevents = array();

		/*
		 * As explained for the class above, we use one file for each view's template.  This means, for the event view
		 * we need to get the template from "our" template, which is the template of this day and kept in the field
		 * TEMPLATE_DAY.  We then to feed it back to the event row so that the event content object can render itself.
		 * 
		 * It's probably not the best idea to hardcode ###EVENTS### here, if someone has a nicer solution, let me know.
		 */
		$eventTemplate = $this->cObj->getSubpart($data['TEMPLATE_DAY'], "###EVENTS###");

		/*
		 * We are sorting todays events by the starttime so that the earliest events will be rendered first.
		 * 
		 * If arbitrary content objects are fed into "calendar", they need to set start_date and end_date, otherwise they'll
		 * always be rendered first.
		 * 
		 * XXX Typo3 coding guidelines forbid to define global functions, so we should make this a function of this class.
		 */
		usort($todaysevents, "sort_events_by_starttime");

		/*
		 * Now render the events each by each.
		 * The output will just be concat'ed to $theEvents, which we later return as our output. 
		 */
		foreach ($todaysevents as $row) {
			/*
			 * We need to tell Typoscript the "current" day on which the event is displayed.
			 * This is because events, that span multiple days BUT have a start_time set, must only
			 * be rendered starting at the start_time on the first day, but starting at 00:00 on all following days.
			 * The same holds for the end_time.  In Typoscript, we can easily compare start_date and $today_time if we
			 * want to decide what we render.
			 */
			$row['THIS_DAY'] = $today_time;

			/*
			 * Now we calculate the start and end-intervals of this event, and we also calc the duration of this event
			 * in intervals.  Those can be used in CSS to render the events.
			 */
			if ($row['start_date'] < $today_time) {
				/*  This event has a start_date set to a previous day.  So today's start_interval is at 00:00 */
				$row['INTERVAL_START'] = $today_time;
			} else
				/* I'm not sure how you do a mod b in PHP, so I do it manually using floor() */
				$row['INTERVAL_START'] = $row['start_date'] + floor($row['start_time'] / $interval) * $interval;

			/*
			 * The end_date case is similar to the start_date case, but it's even a bit more complex:
			 * If the end_date is not set, it (MySQL) defaults to 0.  This means the event ends on the same day
			 * that it starts on.
			 * If it has an end_date set, it's similar to what we do for the start_date:  If it ends tomorrow or later,
			 * render it until 24:00, otherwise use the end_time.
			 */
			if ($row['end_date'] != 0) {
				/* So we have a real end_date set.  That's good. */
				if ($row['end_date'] + $row['end_time'] > $tomorrow_time) {
					/* 
					 * This means, the event doesn't end today.  So we need to set the INTERVAL_END to the end of the day, which
					 * is 24:00
					 */
					$row['INTERVAL_END'] = $tomorrow_time;
				} else {
					/*
					 * If we are here, the event ends today.  If end_time is set, we can calc the end interval,
					 * otherwise we default to the end of the day.
					 */
					if ($row['end_time'] > 0) {
						$row['INTERVAL_END'] = $row['end_date'] + floor($row['end_time'] / $interval) * $interval;
					} else {
						/* default to 24:00 */
						$row['INTERVAL_END'] = $tomorrow_time;
					}
				}
			} else {
				/* 
				 * This is the end_date = 0 case, which means end and start date are the same.  Knowing this, the same
				 * holds as above:  No endtime means 24.00.
				 */
				if ($row['end_time'] > 0) {
					$row['INTERVAL_END'] = $row['start_date'] + floor($row['end_time'] / $interval) * $interval;
				} else {
					$row['INTERVAL_END'] = $tomorrow_time;
				}
			}

			/* Knowing start and end intervals, we can calc the duration, in intervals */
			$row['EVENT_DURATION'] = floor(($row['INTERVAL_END'] - $row['INTERVAL_START']) / $interval);

			/* get output from this event */
			$addevent = $this->displayEvent($row, $lConf, $eventTemplate);

			/* add it to our output */
			$theEvents .= $addevent;
		}
		
		return $theEvents;
	}



	/*
	 * This function is one of the most important functions of this extension.
	 * Given a range, it returns an array of all objects that fall into this range.
	 * 
	 * Objects can be arbitrary content objects that are loaded by external PHP scripts, configured by Typoscript,
	 * or our own events.  For our own, we also need to do recurrence calculations.
	 */
	function getEventsInRange($fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay) {
		
		/* $theMatrix holds all events of this range in an array of arrays of arrays of arrays (year, month, day, events) */
		$theMatrix = array ();
		
		/*
		 * First we load all the objects that are now our own.
		 * We use the functions that are defined in $conf['injectObjects.'] from the TS config.
		 * If of those points to a userfunction, which we will call.  
		 */
		foreach ($this->conf['injectObjects.'] as $o) {
			/* We need to give the userfunction the the range as an argument.  */
			$range = array ("fromYear" => $fromYear, "fromMonth" => $fromMonth, "fromDay" => $fromDay, "toYear" => $toYear, "toMonth" => $toMonth, "toDay" => $toDay,);
			/* Now call it.  Notice the $o, it's the Typoscript config.  That way you can configure your user function */
			$theEvents = $this->cObj->callUserFunction($o['getObjectsInRange'], $o, $range);
			
			/*
			 * The function has returned an event array.  PHP cannot merge two arrays of depth 4, so we need to do it
			 * ourselves.
			 */
			foreach (array_keys($theEvents) as $year) {
				foreach (array_keys($theEvents[$year]) as $month) {
					foreach (array_keys($theEvents[$year][$month]) as $day) {
						if (!is_array($theMatrix[$year][$month][$year]))
							$theMatrix[$year][$month][$day] = array ();
						foreach ($theEvents[$year][$month][$day] as $e) {
							$theMatrix[$year][$month][$day][] = $e;
						}
					}
				}
			}
		} /* end of foreach injetObjects. */

		/* Now we fetch our very own objects.  $begin and $end hold the seconds since epoch of the range. */
		$begin = mktime(0, 0, 0, $fromMonth, $fromDay, $fromYear);
		$end = mktime(0, 0, 0, $toMonth, $toDay, $toYear);

		/*
		 * We start with the recurring events, which have an eventtype 1-4.  eventtype 0 are regular events, and 5 are
		 * exceptions.
		 * 
		 * The WHERE clause is quite simple.  If the end-date for the series (rec_end_date) is unset (means
		 * unlimited recurrence, at least date-wise), we need to select it in every case.
		 * There are only two cases when we do not need to select this series, this is
		 * 	a) the rec_end_date is before our range started ($begin), or
		 *  b) the start_date of this event is in the future (after $end)
		 * Interverting this logically leads to the second part of the WHERE clause. 
		 */
		$where = "(
						(
							rec_end_date = 0
						OR
							(
								rec_end_date >= $begin
							AND
								start_date < $end
							)
						)
					AND eventtype < 5 AND eventtype > 0)";
					
		/*
		 * With this $where clause, we are no selecting the events from our db table using Typo3-API.
		 * The nice thing with getQuery() is, is does all the hidden/start/end stuff for us, so we don't need to
		 * bother about it.  getSelectConf() adds in some more config for us, e.g. the list of Page-Ids we want to
		 * fetch events from.  See there for more details.
		 * */
		$query = $this->cObj->getQuery($this->dbTable, $this->getSelectConf($where));
		
		/* Now we execute this. */
		/* XXX BAH! BAH! BAH!  There's a nice Typo3-DB-abstraction and I don't know how to use it.  Fix this! */
		$res = mysql_query($query);
		/* Now we loop for every result we get. */
		while ($row = mysql_fetch_assoc($res)) {
			/* First, we really need to set this object type to "event" so we later know that is one of ours */
			$row['calendar_object_type'] = "event";
			
			/*
			 * Now what we will be doing in this while() loop is the following:
			 * 
			 * - Fetch any exceptions to this events and save them for later use
			 * - Calculate how many days this events last.  We need to add this event to all the
			 *   days that contain this events.  Rembember:  $theMatrix holds all the events of each day.
			 * - Add this event at every series date it appears.
			 * 
			 * The latter is the most critical part.  More follows below.
			 * 
			 */

			/*
			 * First we save the start_date and the end_date of this event.  Note that times are not important for recurrence
			 */
			$startdate = $row['start_date'];
			$enddate = $row['end_date'];

			/*
			 * It will be quite import for us to know when the ORIGINAL event was later on,
			 * e.g. what weekday it was on.  Save that.
			 */
			$orig_year = date('Y', $startdate);
			$orig_month = date('m', $startdate);
			$orig_day = date('d', $startdate);

			/*
			 * Now fetch all exeptions of this event and save them in the $ex array.
			 */
			$where = "(eventtype = 5 AND exception_mm=".$row['uid']." AND start_date < $end)";
			$query = $this->cObj->getQuery($this->dbTable, $this->getSelectConf($where));
			$nres = mysql_query($query);
			$ex = array ();
			while ($arow = mysql_fetch_assoc($nres))
				$ex[] = $arow;
			mysql_free_result($nres);

			/* 
			 * calculate the duration of this event, i.e. how many days this event does last
			 * We will later use this value so that we know how many days we need to add this event on.
			 */
			if ($enddate == 0 || $enddate == $startdate)
				/* start and end date are the same */
				$duration = 0;
			else
				/*
				 * Use floor() so that we have the right duration even in summer, when we
				 * have one our less due to daylight savings.
				 * 
				 * Note:  Any fix done here should also be done add the exception handling below (copy & paste code)
				 */
				$duration = floor(($enddate - $startdate) / (24 * 60 * 60));

			/*
			 * What follows is the logic to add this event on all occurences of the series.
			 * 
			 * A while loop is used.  $i will always contain the next due date when we need to add this event.
			 * In the while-loop we will then dynamically calculate the NEXT date and 'continue;', so $i will contain
			 * the date when the event should be added again.
			 * 
			 * Of course, we only need to loop until we are out of "$end", which is the end of the range that we were
			 * asked to calc the events in. 
			 * 
			 * Another possible termination is $n, which holds the times we rendered this event.  One can specify
			 * rec_end_times, which means "only recur this event n times".  Each time we add a series date, we raise $n.
			 * If $n is to big, we can also break this while loop.
			 * 
			 * Within the loop, a few more things are done:  We do, for example, check for exceptions on this date.
			 */				
			$i = $startdate;		/* begin at the start_date of this event */
			$n = 0;					/* we added 0 events yet */
			while ($i < $end) {
				/* in case rec_end_times is positive, we have to stop if we already added enough events */
				if ($row['rec_end_times'] > 0 && $n >= $row['rec_end_times'])
					break;

				/* 
				 * The same holds for the last day of this series:  If we are already too far with $i,
				 * i.e. the next event would be AFTER the rec_end_date, we can stop here. 
				 */
				if ($row['rec_end_date'] > 0 && $i > $row['rec_end_date'])
					break;

				/*
				 * If we are here, $i contains the next date when we are supposed to register the event in.
				 * This is exactly what we are doing.
				 * 
				 * Adding events at the next series due date involves a few things:
				 * - Check if there's an exception for this event on this date.  If this is the case,
				 *   we must use the exception instead of the event
				 * - Adjust the $row's start_date and end_date accordingly
				 * - ....
				 */
				 
				/* 
				 * First we first make a real YYYY/MM/DD representation out of $i, and then we will use
				 * this together with mktime() to calc the new start_date.  mktime() respects daylight savings time and stuff.
				 * I'm not quite sure if we'd really need this, but that way we are on the safe side.
				 */
				$year = date('Y', $i);
				$month = date('m', $i);
				$day = date('d', $i);
				
				/*
				 * We now adjust the $row to reflect the new start_date and end_date of this row, so that
				 * it fits the series' date.  Only that way it'll be rendered correnctly from Typoscript later.
				 */
				$row['start_date'] = mktime(0, 0, 0, $month, $day, $year);
				if ($enddate != 0) {
					/*
					 * ($enddate - $start_date) holds the duration of the original event, that's what we
					 * add to "start_date" to get the new "end_date".
					 * 
					 * XXX this might be a problem with daylight saving times.  Maybe we have a broken end_date
					 * somewhere if a series spans the Mar 21th or Oct 21th.  Not sure.  Can be a race condition and
					 * only appear if you depend on end_date being correclty set.  Let me know about this if you
					 * have problems.
					 */
					$row['end_date'] = $row['start_date'] + ($enddate - $startdate);
				}

				/* Now we need to look up any exceptions for the event on this day. */
				$overwrite = null;
				foreach ($ex as $e) {
					/* 
					 * an exception is to be registered for this event on this date, if the start_date of the exception
					 * is the same as the start_date for this series due date.
					 * 
					 * XXX There might be some problems with timezones here, if one entered the exception from another timezone
					 * than the server.  Maybe they won't fit. (start_date of the exception is a few hours off)
					 */
					if ($e['start_date'] == $row['start_date']) {
						$overwrite = $e;
					}
				}

				/*
				 * OK, in case there is an exception, it MIGHT be that the event lasts few or more days.
				 * In that case, we must not use the same $duration value as the original event has, but
				 * we need to recalc it based on the exception.
				 * 
				 * The new duration is kept in $add_duration, so if there's no exception, we can use the original one
				 */
				if ($overwrite == null)
					$add_duration = $duration;
				else {
					/*
					 * If we are here, there's an exception, so we just recalc it.
					 * 
					 * Important:  Any fix here should be done above in the original calculation as well */
					if ($overwrite['end_date'] == 0 || $overwrite['end_date'] == $overwrite['start_date'])
						$add_duration = 0;
					else
						$add_duration = floor(($overwrite['end_date'] - $overwrite['start_date']) / (24 * 60 * 60));
				}

				/*
				 * Now we need to add it on every day.
				 * Example:  An event lasts three days and starts at 2005-03-03.
				 * Given the $theMatrix layout, we have to add the same $row into the arrays
				 * - $theMatrix[2005}[03][03] 
				 * - $theMatrix[2005}[03][04] 
				 * - $theMatrix[2005}[03][05
				 * 
				 * This is why we loop $add_duration times.
				 * 
				 * Also, there's one more point:  The exception might have the "skip this event" flag set.
				 * In that case we must not add it.  But if we don't add it, we also must not raise $n which
				 * counts the times we added this event.  All clear?  So $added saves the value if we actually
				 * added the event.  We only add it, if "exception_skip" is not set, and finally, if we have added it,
				 * we raise $n.    
				 */
				$added = false;
				for ($j = 0; $j <= $add_duration; $j ++) {
					/*
					 *  We use a combination of strtotime() and date() because strtotime() will do the right thing
					 * for daylight savings time
					 */
					$year = date('Y', strtotime("+$j days", $i));
					$month = date('m', strtotime("+$j days", $i));
					$day = date('d', strtotime("+$j days", $i));
					
					if ($overwrite == null) {
						/* no exception, just add the original $row */
						$theMatrix[$year][$month][$day][] = $row;
						$added = true;
					} else {
						/* there's an exception.  Go add this instead.  Oh, of course only if we are not supposed to skip it */
						if ($overwrite['exception_skip'] == 1)
							break;
						$theMatrix[$year][$month][$day][] = $overwrite;
						$added = true;
					}
				}
				if ($added)
					/* cool, we added it.  So raise $n by one */
					$n ++;


				/*
				 * Now we are done with adding the event, we need to calc the next series due date.  This is what
				 * we do in the big switch(), as the next date depends on the series type of this event.
				 */
				 
				/* 
				 * This is just for a mapping of the numeric value of the day of the week, as date('w') returns, so
				 * that we can feed it into strtotime as in "next monday"
				 */
				$weekdayarray = array ("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");

				switch ($row['eventtype']) {
					
					/* daily -------------------------------------------------------------------------------------- */
					case 1 :
						/*
						 * Daily is easy, just add it on the next $diff days, where $diff is speciefied in repeat_days.
						 * 
						 * XXX We also have an event subtype "On each workday", which can be simulated by
						 * weekly type with "On Mondays" to "On Firdays" set.  I don't know how we would
						 * do that instead, as we needed a work-day database instead. 
						 */
						if ($row['repeat_days'] > 0)
							$diff = $row['repeat_days'];
						else
							$diff = 1;
							
						$i = strtotime("+$diff days", $i);
						break;
						
					/* weekly ---------------------------------------------------------------------------------------- */
					case 2 :
						if ($row['repeat_weeks'] > 0)
							$diff = $row['repeat_weeks'];
						else
							$diff = 1;

						/*
						 * The weekly type lets you specify weekdays this event is due, e.g.
						 * "On Tuesdays" and "On Saturdays".  This makes it quite complicated as
						 * we can't just add 7 days.
						 * 
						 * To make this easy, we first find out what is the FIRST weekday that
						 * the event will appear on and what is the LAST weekday. ($firstday, $lastday)
						 * Here Monday is 1, Sunday is 7.
						 * 
						 * We are using the helper array we defined above. 
						 */
						$lastday = 0;
						$firstday = 0;
						$daycount = 0;
						foreach ($weekdayarray as $weekday) {
							$daycount ++;
							if ($row["repeat_week_$weekday"] > 0) {
								/*
								 * We shall repeat on $weekday.  $lastday can be set in any case, $firstday only if there
								 * is no previous "first day"
								 */
								$lastday = $daycount;
								if ($firstday == 0)
									$firstday = $daycount;
							}
						}
						
						/*
						 * Add this time, we know about the "On XXX" settings.
						 * If there is no "Last Day" set in $lastday, i.e. $lastday == 0, the user
						 * didn't set "On XXX" on any weekday.  This makes it easy, we can just
						 * use strtoime()s "+x weeks" to get the next series due date.  After that we can
						 * break the switch(), as we are done.
						 */
						if ($lastday == 0) {
							$i = strtotime("+$diff weeks", $i);
							break;
						}
						
						/*
						 * If we are here, we have an "On XXX" setting.
						 * 
						 * What we do know is, we first look up the weekday of the _current_ due date, numerically.
						 */
						$weekday = strftime('%u', $i);
						/*					 
						 * If this weekday is the last "On" day, we need to skip $diff weeks, but ALSO
						 * need to switch to the next weekday that comes _first_ in the "On XXX" list.
						 * 
						 * The ">=" is as the inintal start_date might be e.g. a Friday, while the "On" setting is set to "On Tueday".
						 * Bugreport by Michael Perkhofer <michael.perkhofer@uibk.ac.at>
						 */
						if ($weekday >= $lastday) {  
							/* First we try to skip $diff weeks, _and_ get the first weekday. */
							$newi = strtotime("$diff ".$weekdayarray[$firstday - 1], $i);
							
							/* 
							 * Now, there's _one_ race condition, which is if $firstday == $lastday, which it is
							 * quite often:  This is the case if you selected only one weekday in the "On XXX" settings.
							 * 
							 * This is special for strtotime():  If you are on a friday, "1 friday" will return 
							 * the SAME friday.  This, however, also means we can just use "$diff weeks" again.
							 * 
							 * XXX why didn't we do this check above then, where we do $lastday == 0?
							 */
							if ($newi == $i)
								$newi = strtotime("$diff weeks", $i);
							$i = $newi;
							$weekday = $firstday;	/* XXX this one can go, $weekday is unused below and overwriten above */
							
							/* All done, continue to add the next series date (this continue is used in the while() loop) */
							continue;
						}

						/*
						 * If we are here, we are currently somewhere between $firstday and $lastday, for example
						 * on a Tuesday, and the next series due date is on a Saturday.
						 * We will just use a for() loop starting at the current day, and loop to the next
						 * day.  "this <weekday>" will take us to this day, time-wise.
						 */
						for ($iter = $weekday; $iter < 7; $iter ++) {
							$weekdaystring = $weekdayarray[$iter];
							if ($row["repeat_week_$weekdaystring"] > 0) {
								$i = strtotime("this $weekdaystring", $i);
								break 2;
							}
						}
						
						/*
						 * If we are here, something is going wrong.  We will be ending up in an endless while
						 * loop anyways, so we can also die() with the suggestion to do a bugreport.
						 */
						die("calendar:  Must not be here.  Please write a bug report to the extension's author.");
						break;
						
					/* Monthly ---------------------------------------------------------------------------------------- */	
					case 3 :
						/*
						 * There are a few subtypes for recurring monthly, so each type is explained below.
						 * For now, we are just saving some of the values that we are going to use in any way.
						 */
						$month = date('m', $row['start_date']);
						$year = date('Y', $row['start_date']);

						if ($row['repeat_months'] == 0)
							$diff = 1;
						else
							$diff = $row['repeat_months'];

						if ($row['rec_monthly_type'] == 0) {
							/*
							 * This is "Monthly by day", which repeats this event on every nth of the month.
							 * 
							 * If the original event is on the 29th, 30 or 31th, and this month doesn't have
							 * that many days, we use the last possible day in this month.
							 * 
							 * XXX could be nice to let the user decide what setting he'd like to use, e.g. in leaf years,
							 * use Feb 29th or Mar 01?
							 * 
							 * Fortunately, we are quite safe with the 15th of every month.
							 * So, we first calc the next month by the 15th. and then compare it to the
							 * month mktime() found out.  mktime() will use the next month if you specified
							 * a wrong date, so those months will differ.  In that case, we try to do
							 * it as many times as required to find the last day in month.
							 * 
							 * XXX this is quite stupid, strftime() has an entity to get the "number of days in month",
							 * so we don't need to do the trickw ith $less.'
							 */
							 
							/* $less holds the number of days we try to skip at the month end.  We begin with 0, of course */
							$less = 0;
							/*
							 * We calc the new day.  Note that we are using $orig_day" here, as $day _could_ be the 28th or
							 * so instead of the 31th.
							 */
							$i = mktime(0, 0, 0, $month + $diff, $orig_day, $year);
							/* Now ewe do the same with the 15th */
							$safe_month = date('m', mktime(0, 0, 0, $month + $diff, 15, $year));
							while (date('m', $i) != $safe_month) {
								/* As long as the month differ, we need to skip one day.  Raise "$less". */
								$less ++;
								$i = mktime(0, 0, 0, $month + $diff, $orig_day - $less, $year);
							}
							
							/* ok fine, everything done, add this event by continueing above */
							continue;

						} else
							if ($row['rec_monthly_type'] == 1 || $row['rec_monthly_type'] == 2) {
								
								/*
								 * This are the recurring by weekday types.  1 is counting from the
								 * begin of the month, 2 is counting backwards from the end.
								 * 
								 * - Martin Klaus <klausm@in.tum.de> wrote this code.
								 * 
								 * XXX not yet documented.  Do so!
								 *  
								 */

								$daysInMonth = date('d', mktime(0, 0, 0, $orig_month +1, 0, $orig_year));
								$weekDay = $row['rec_monthly_weekday'];
								$weekDayOccurency = $row['rec_monthly_weekday_no'];

								// set $weekDayOccurency for "monthly by last weekday"
								if ($row['rec_monthly_type'] == 2) {
									$weekDayOccurency = 0 - $row['rec_monthly_weekday_no'];
								}

								// find next event based on $weekDay and $weekDayOccurency						 
								$find_nextDate = $row['start_date'];
								$addNewEvent = false;

								while (!$addNewEvent && ($row['rec_end_date'] == 0 || $find_nextDate <= $row['rec_end_date']) && $find_nextDate <= $end) {
									$month += $diff;
									// correction if month > 12
									if ($month > 12) {
										$year = $year + (int) (($month -1) / 12);
										$month = $month % 12;
									}

									$find_nextDay = $this->dayOfMonth($month, $year, $weekDay, $weekDayOccurency, 0);

									// if Day exists:
									if ($find_nextDay > 0) {
										$i = mktime(0, 0, 0, $month, $find_nextDay, $year);
										$addNewEvent = true;
										break;
									}

									// date not found handling:

									// show event on next possible week, same weekday, same month
									if ($row['rec_monthly_notfound'] == 0) {
										if ($weekDayOccurency > 0) {
											$find_nextDate = mktime(0, 0, 0, $month, $daysInMonth, $year);
											$i = strtotime("last ".$weekdayarray[$weekDay -1], $find_nextDate);
										} else {
											$find_nextDate = mktime(0, 0, 0, $month, 1, $year);
											$i = strtotime("this ".$weekdayarray[$weekDay -1], $find_nextDate);
										}
										$addNewEvent = true;
										break;
									}

									// show event on next possible month.  Set diff to 1, so it will try each of the following months until one is found
									if ($row['rec_monthly_notfound'] == 1) {
										$diff = 1;
									}

									// show event on next possible month, respect "Every X months"/$diff value							
									if ($row['rec_monthly_notfound'] == 2) {
										// no nothing
									}
								}
							}
						break;

					/* Yearly ---------------------------------------------------------------------------------------- */
					case 4 :
						/*
						 * We have only one yearly type yet, which is at the same date.  This is quite easy, we just
						 * add the value of repeat_years to the $year and use mktime() to get the new $i
						 */
						if ($row['repeat_years'] == 0)
							$diff = 1;
						else
							$diff = $row['repeat_years'];

						$day = date('d', $row['start_date']);
						$month = date('m', $row['start_date']);
						$year = date('Y', $row['start_date']);

						$i = mktime(0, 0, 0, $month, $day, $year + $diff);
						break;
				}
			}
		}
		
		mysql_free_result($res);
		
		/*
		 * Now we have all the recurring events in the $theMatrix array.  However, the regular events
		 * are still missing.  What we do now is, we use a cool SQL query to select all those events for
		 * us.  Note that we only select the "regular" events, that are eventtype == 0.
		 * 
		 * The first part of the OR are those events, that _START_ in the interval between $start and $end.
		 * The second part of the OR are those events, that started before the interval, but that end in the interval, which is
		 * after $begin. Those need to be rendered as well, so we need to add them, too.
		 */
		$where = "(
						(start_date + start_time >= $begin AND start_date + start_time < $end)
					OR
						(start_date + start_time <= $begin AND end_date + end_time >= $begin)
					) AND eventtype = 0 ";

		$query = $this->cObj->getQuery($this->dbTable, $this->getSelectConf($where));
		$res = mysql_query($query);
		/* Now we can add those events */
		while ($row = mysql_fetch_assoc($res)) {
			/* register object type as ours.  */
			$row['calendar_object_type'] = "event";

			/* Now we are just adding this event to $theMatrix on each day this events belongs to. */
			$startdate = $row['start_date'];
			$enddate = $row['end_date'];
			if ($enddate == 0)
				$enddate = $startdate;
			for ($i = $startdate; $i <= $enddate; $i = strtotime("+1 day", $i)) {
				$year = date('Y', $i);
				$month = date('m', $i);
				$day = date('d', $i);
				if (!is_array($theMatrix[$year][$month][$day]))
					$theMatrix[$year][$month][$day] = array ();
				$theMatrix[$year][$month][$day][] = $row;
			}
		}
		mysql_free_result($res);

		/*
		 * Now, we have ALL events in the $theMatrix array.
		 * However, the user might have selected a few targetgroups or categories only,
		 * so we pass $theMatrix through our filter function that removes all of those unwanted events.
		 */
		$theMatrix = $this->filterEvents($theMatrix);

		return $theMatrix;
	}

	/*
	 * This function gets a usual event matrix array (sorted by year/month/day) and filters out all
	 * the unwanted events.
	 * An event is unwanted if its targetgroup and its category are not in the array of targetgroups and categories
	 * the functions getCurrentTargetgroups() and getCurrentCategories() returned, respectively.
	 */
	function filterEvents($theEvents) {
		$newEvents = array ();
		$cats = $this->getCurrentCategories();
		$targetgroups = $this->getCurrentTargetgroups();
		foreach (array_keys($theEvents) as $year) {
			foreach (array_keys($theEvents[$year]) as $month) {
				foreach (array_keys($theEvents[$year][$month]) as $day) {
					if (!is_array($newEvents[$year][$month][$year]))
						$newEvents[$year][$month][$day] = array ();
					foreach ($theEvents[$year][$month][$day] as $e) {
						if (in_array($e['category'], $cats) && in_array($e['targetgroup'], $targetgroups))
							$newEvents[$year][$month][$day][] = $e;
					}
				}
			}
		}
		return $newEvents;
	}

	/*
	 * Given the $year and the ISO $week number as arguments, this function
	 * constructs the second since epoch at 00:00 on Monday of this week.
	 */
	function getWeekTime($year, $week) {
		/*
		 * January, 4th is, according to a comment on the PHP website, always in the ISO week 1.
		 * So, what we do is, we take January 4th of that $year and just add $weekoff weeks.
		 * Because the week starts at week 1, we need to only add $week - 1 weeks.
		 */
		$weekoff = $week - 1;
		$weektime = strtotime("+$weekoff weeks", mktime(0, 0, 0, 1, 4, $year));
		
		/*
		 * Now we are in the right week.  This is not enough - we want the START of the week.
		 * So, what we do is we get the day of the week and substract those days, so we are getting Monday, 00:00.
		 */
		$dayoff = $this->getDayOfTheWeek($weektime) - 1;
		$weektime = strtotime("-$dayoff days", $weektime);

		return $weektime;
	}

	/*
	 * Called from main(), we are supposed to render the weekview.
	 * See more at displayEventFirst() and displayDayFirst().
	 */
	function displayWeekFirst() {
		/* get the template */
		$template = $this->loadTemplate();

		/* If GET vars are set, and we are allowed to use them, adjust the week that is displayed */
		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f2']))
			$week = intval($this->piVars['f2']);
		else
			$week = date('W');

		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f1']))
			$year = intval($this->piVars['f1']);
		else
			$year = date('Y');

		/* We now have the week that we want to display in $year/$week.  Make it a UNIX time */
		$weektime = $this->getWeekTime($year, $week);

		/* Now we can take a look at the felxforms config, that maybe tells us to adjust this view by a few weeks */
		$date_off = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'date_offset');
		if ($date_off != "") {
			$weektime = strtotime($date_off, $weektime);
			if ($weektime == -1)
				return "invalid date offset string";
			$week = date('W', $weektime);
			$year = date('Y', $weektime);
		}

		$weekend = strtotime("+1 weeks", $weektime);
		
		$eventmatrix = $this->getEventsInRange(	date('Y', $weektime),
												date('m', $weektime),
												date('d', $weektime),
												date('Y', $weekend),
												date('m', $weekend),
												date('d', $weekend));

		/* Now use Typo3 API to display this week */
		$weekobj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
		
		/* makeWeekRow() expects a "current Month".  We just default to the week's month, no big deal */
		$weekrow = $this->makeWeekRow($eventmatrix, $template, $weektime, date('m', $weektime));
		$weekobj->start($weekrow);
		$lConf = $this->conf['displayWeek.'];
		return $weekobj->cObjGetSingle($lConf['week'], $lConf['week.']);
	}

	function makeWeekRow($events, $template, $weektime, $currentMonth) {
		$week = array ();
		$week['events'] = $events;
		$week['TEMPLATE_WEEK'] = $template;
		$week['year'] = date('Y', $weektime);
		$week['week'] = date('W', $weektime);
		$week['week_time'] = $weektime;
		$week['pi_flexform'] = $this->cObj->data['pi_flexform'];
		$week['THIS_MONTH'] = $currentMonth;
		$this->setFlexValues($week);

		return $week;
	}

	/**
	 * Similar to displayDay().  For more info see there.  
	 * This displays the days of this week.
	 */
	function displayWeek($content, $conf) {
		$lConf = $conf;

		/* XXX use Getter function */
		$data = $this->cObj->data;
		/* Use the template that we get passed from earlier calls */
		$dayTemplate = $this->cObj->getSubpart($data['TEMPLATE_WEEK'], "###DAYS###");
		
		$year = $data['year'];
		$week = $data['week'];
		$eventmatrix = $data['events'];
		
		/* Sometimes this might be empty.  Fix this */
		if ($eventmatrix == null) {
			$eventmatrix = array ();
		}

		$weektime = $data['week_time'];
		$month = date("m", $weektime);
		$beginday = date("d", $weektime);

		/* 
		 * Now we will render each day.  Our output will be $weektable, so we add the output
		 * of each day to that variable.
		 */
		$weektable = "";
		/* A week has seven days, starting at the $beginday we calculated above */
		for ($i = 0; $i < 7; $i ++) { // First, fetch the events of this day
			$daytime = strtotime("+$i days", $weektime);
			
			/* We just let Typo3 render htis for us.  We have done some Typoscript configuration instead. */
			$dayobj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
			$day = $this->makeDayRow($eventmatrix, $dayTemplate, $daytime, $data['THIS_MONTH']);
			$dayobj->start($day);

			$weektable .= $dayobj->cObjGetSingle($lConf['day'], $lConf['day.']);
		}

		return $weektable;
	}

	/**
	 * Called from main(), this renders a month view.
	 * Fore more info, see the similar functions displayEventFirst8), displayDayFirst8), displayWeekFirst()
	 */
	function displayMonthFirst() {
		/* load the template from whereever */
		$template = $this->loadTemplate();

		/* We might need, if we are allowed to, adjust the "cvurrent" month and year */
		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f2']))
			$month = intval($this->piVars['f2']);
		else
			$month = date('m');
		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f1']))
			$year = intval($this->piVars['f1']);
		else
			$year = date('Y');

		/* What's the 1st of this month? */
		$monthBegin = mktime(0, 0, 0, $month, 1, $year);

		/* If set in the configuration file, we might need to use an offset to the date used above. */
		$date_off = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'date_offset');
		if ($date_off != "") {
			$monthBegin = strtotime($date_off, $monthBegin);
			if ($monthBegin == -1)
				return "invalid date offset string";
			$month = date('m', $monthBegin);
			$year = date('Y', $monthBegin);
		}

		/*
		 * We now only need to get all the events in this month and let Typoscript render the month and the events
		 * for us.  However, the month view might include a few days of the prevoius month, so we expand the range a little bit.
		 */
		$eventmatrix = $this->getEventsInRange($year, $month - 1, 20, $year, $month +1, 10);

		/* Typo3 API, nothing special */
		$monthobj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
		$monthrow = $this->makeMonthRow($eventmatrix, $template, $monthBegin);
		$monthobj->start($monthrow);

		$lConf = $this->conf['displayMonth.'];
		return $monthobj->cObjGetSingle($lConf['month'], $lConf['month.']);
	}

	function makeMonthRow($events, $template, $monthtime) {
		$month = array ();
		$month['events'] = $events;
		$month['TEMPLATE_MONTH'] = $template;
		$month['year'] = date('Y', $monthtime);
		$month['month'] = date('m', $monthtime);
		$month['month_time'] = $monthtime;
		$month['pi_flexform'] = $this->cObj->data['pi_flexform'];

		$this->setFlexValues($month);

		return $month;
	}

	/**
	 * Usually called from Typoscript to render all the weeks of this month.
	 * It's very similar to displayWeek/displayDay/displayEvent(), so please see there
	 */
	function displayMonth($content, $conf) {
		$lConf = $conf;

		/* XXX use Getter() function */
		$data = $this->cObj->data;
		
		$year = $data['year'];
		$month = $data['month'];
		
		$eventmatrix = $data['events'];
		if ($eventmatrix == null) {
			$eventmatrix = array ();
		}
		
		/* Get Start and End of this Month */
		$monthBegin = mktime(0, 0, 0, $month, 1, $year);
		$nextMonth = strtotime("+1 months", $monthBegin);

		/*
		 *  Actually, the first WEEK that we are going to render now
		 * might be earlier than the begin of this month.  This is because we like to render
		 * the month nicely aligned on the weekdays.
		 * 
		 * So, if $monthBegin" is already a Monday (== 1), we set the firstDay (to render) to the month's begin.
		 * Otherwise we set the Monday of the first week in this month as the first day to render.
		 */
		if ($this->getDayOfTheWeek($monthBegin) == 1) {
			$firstDay = $monthBegin;
		} else {
			$daysoff = $this->getDayOfTheWeek($monthBegin) - 1;
			$firstDay = strtotime("-$daysoff days", $monthBegin);
		}

		/*
		 * Now we render 4-6 weeks, depending on the month and the year.
		 * First, we get the template for the week, because we need to pass it to the
		 * week object later on, as usual.
		 */
		$weekTemplate = $this->cObj->getSubpart($data['TEMPLATE_MONTH'], "###WEEKS###");

		/*
		 * Now we are going to render the weeks using Typoscript.
		 * We stop if the $weektime that we are rendering has left the current month.
		 * As the $weektime always contains the START of the week we are rendering,
		 * this also means we have successfully rendered all days of this month, up to the last
		 * Sunday (that might reach into the next month, though).
		 * 
		 * $i is used for calculation of the next $weektime, $calstr holds the output of
		 * all the weeks we have rendered so far.
		 */
		 
		$i = 0;
		$calstr = "";
		while (1) {
			$weektime = strtotime("+$i weeks", $firstDay);
			if ($weektime >= $nextMonth)
				break;

			$weekobj = t3lib_div :: makeInstance('tslib_cObj'); // Create new tslib_cObj for our use
			$weekrow = $this->makeWeekRow($eventmatrix, $weekTemplate, $weektime, $month);
			$weekobj->start($weekrow);

			$theWeek = $weekobj->cObjGetSingle($lConf['week'], $lConf['week.']);
			$calstr .= $theWeek;
			$i ++;
		}

		return $calstr;
	}

	/**
	 * Called from main(), this function is responsible for rendering the Upcoming view.
	 * In general it's very similar to the other *First() functions, but it's a bit more tricky as
	 * we don't have a special time range that the events might lay in.  So we need to
	 * specify a maximum number of days to look for events in the future.  See below for more info.
	 */
	function displayUpcomingFirst() {
		/* As in the other *First() functions, first get the basic template */
		$template = $this->loadTemplate();
		/* Upcoming is a special case, we directly render events.  So get the EVENTS subpart form our template */
		$eventTemplate = $this->cObj->getSubpart($template, "###EVENTS###");

		/* 
		 * If we need to adjust the "current" date, do so.  Using this you can render e.g. all the next 10 events
		 * starting at 2005/08/12. 
		 */
		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f3']))
			$day = intval($this->piVars['f3']);
		else
			$day = date('d');

		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f2']))
			$month = intval($this->piVars['f2']);
		else
			$month = date('m');

		if (!$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'ignore_pivars_date') && isset ($this->piVars['f1']))
			$year = intval($this->piVars['f1']);
		else
			$year = date('Y');

		/* $howmany keeps the maximum number of events we shall render.  If none are set, we default to 10 */
		$howmany = intval($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'how_many', 's_upcoming'));
		if ($howmany == 0)
			$howmany = 10;
		/* 
		 * $maxdays contains the maximum number of days we are going to look into the future to find
		 * and events.  If unset, default to a year
		 */
		$maxdays = intval($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'max_days', 's_upcoming'));
		if ($maxdays == 0)
			$maxdays = 365;
			
		$daytime = mktime(0, 0, 0, $month, $day, $year);
		/* date_offset is the usual offset, as always */
		$date_off = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'date_offset');
		if ($date_off != "") {
			$daytime = strtotime($date_off, $daytime);
			$year = date('Y', $daytime);
			$month = date('m', $daytime);
			$day = date('d', $daytime);
		}
		$start_day = $daytime;

		$lConf = $this->conf['displayUpcoming.'];

		/*
		 * The Upcoming is a bit tricky, as we cannot tell a fixed range where the next n events might occur.
		 * The Upcoming config in Flexforms has a maximum number of events set.  However, those
		 * n events can appear already in the first week, or might only appear in the next 10 years or so, e.g.
		 * a bi-yearly recurring event.
		 * 
		 * What we do is, we begin with the next 10 days in the future.  If we find enough events, we are all fine.
		 * If not, we add 10 more days.  And 10 more days, until we found enough events OR we reached the $maxdays limit.
		 * 
		 * $n holds the current number of events we have available.  $i is a loop variable the counts the times
		 * we added 10 more days already.  $daevents holds the events we have found so far.
		 */  
		$n = 0;
		$daevents = array ();
		$i = 1;
		while ($n < $howmany && ($i - 1) * 10 < $maxdays) {
			/* get all events in the next range */
			$eventmatrix = $this->getEventsInRange($year, $month, $day + 10 * ($i -1 ), $year, $month, $day + 10 * $i);

			/* we now need to merge those new events with our existing events in $daevents */
			foreach (array_keys($eventmatrix) as $theyear) {
				foreach (array_keys($eventmatrix[$theyear]) as $themonth) {
					foreach (array_keys($eventmatrix[$theyear][$themonth]) as $theday) {
						/* 
						 * First filter out all events in the past.  They are of no use for the
						 * Upcoming view, but might have slipped in due to the getEventsInRange() function just
						 * adding the whole series of recurring events instead of only adding the events of interest.
						 */
						if (mktime(0, 0, 0, $themonth, $theday, $theyear) < $daytime)
							/* jep, this is in the past.  just continue to the next event */
							continue;
						/* 
						 * If there are any events on that day, $eventmatrix is an array.  we can just add those to
						 * $daevents.  Being a flat array, we can finally use array_merge()
						 */
						if (is_array($eventmatrix[$theyear][$themonth][$theday])) {
							$daevents = array_merge($daevents, $eventmatrix[$theyear][$themonth][$theday]);
						}
					}
				}
			}

			/*
			 * Now, events that are spanning multiple days have been added on every day that they span.
			 * They appear in the upcoming view as the very same events, but xxx times (as long as they are taking).
			 * This is not what we want:  We only want each event listed once in the upcoming view.
			 * 
			 * We know, however, that those double events are EXACTLY the same arrays for each day.
			 * So it's serialize() value is the same.  What we do is, we serialize the whole $daevents() array
			 * and can now use the PHP function array_unique(), which will filter out all those doubles for us.
			 * After that, we have to undo that serialization, of course.
			 */
			foreach ($daevents AS $key => $arr)
				$daevents[$key] = serialize($arr);
			$daevents = array_unique($daevents);
			foreach ($daevents AS $key => $arr)
				$daevents[$key] = unserialize($arr);

			/* Having filtered out the doubles, we can now count the new number of events that we found so far */
			$n = count($daevents);
			$i ++;
		}

		/*
		 * Cool, we have enough events, or not, I don't know.  But we can output them, that's fine.
		 * However, $n might be bigger than $howmany, because in the final round we could have gotten more events
		 * than we wanted.  So while outputting, we make sure we only output maximum $howmany events.  $n is raised
		 * on every output, and the loop stops if there are enough events displayed.
		 */
		/* first sort them */
		usort($daevents, "sort_events_by_starttime");
		$n = 0;
		foreach ($daevents as $row) {
			$addevent = $this->displayEvent($row, $lConf, $eventTemplate);
			$theEvents .= $addevent;
			$n ++;
			if ($howmany <= $n)
				break;
		}

		/* Finally, we put all those events in our template, and are done */
		$subpartArray = array ('EVENTS' => $theEvents,);
		$content = $this->cObj->substituteMarkerArrayCached($template, array (), $subpartArray, array ());

		return $content;
	}

	/**
	 * This function loads the template file for us and returns it as a variable for furhter use
	 * in any of the other functions.
	 */
	function loadTemplate() {
		/*
		 * One can select the default template, or use his own template.
		 * If a default template is wanted, the config returnes a nonempty value.  We can just fetch
		 * the file from our extension directory that holds those templates and use it.
		 * 
		 * If not, it must have been uploaded to the uploads directory.  We are going to use it in that case. Fine.
		 */
		$defaulttemplate = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'template_use_default', 's_template');
		if ($defaulttemplate != "") {
			$theFile = "EXT:calendar/templates/".$defaulttemplate;
		} else {
			$theFile = 'uploads/tx_calendar/'.$this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'template_file', 's_template');
		}

		/*
		 * Now we use Typo3-API to fetch that file we wanted.  fileResource() also nicely expands EXT:, so we
		 * don't have to bother about paths.
		 */
		$templateCode = $this->cObj->fileResource($theFile);
		if ($templateCode == "") {
			return '<h3>'.$this->extKey.': no template file found:'.$this->conf["templateFile"].'</h3>';
		}

		/* $templateCode now contains the contents of that file.  We are just returning it for further usage. */
		return $templateCode;
	}

	/**
	 * This function takes a WHERE clause as an argument and constructs a full $selectConf array for us, as
	 * Typo3 likes to see it for its getQuery() function call.
	 * Used a lot by the functions in here.
	 */
	function getSelectConf($where) {
		//get events
		$selectConf = Array ();
		$selectConf["pidInList"] = $this->pid_list;
		$selectConf["where"] = $where;
		$selectConf["orderBy"] = "start_date, start_time";
		return $selectConf;
	}

	/**
	 * I'm pretty sure I had a good thing in mind with these functions, but for now they seem unsed :-)
	 */
	function getMonthPage() {
		return $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'month_page');
	}
	function getDayPage() {
		return $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'day_page');
	}
	function getWeekPage() {
		return $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'week_page');
	}

	/**
	 * This function is called as a USER func from Typoscript.  It creates
	 * a SELECT HTML box with all the categories that are allowed to be used in
	 * this view.
	*/
	function makeCategorySelect($content, $conf) {
		$this->initdefaults($content, $conf);

		$opt = array ();
		$selCat = intval($this->piVars['category']);
		$value = htmlentities($this->pi_linkTP_keepPIvars_url(array ("category" => "")));

		/* Suck in label for "allCategories" from typoscript */
		if ($this->conf["allCategoriesMarker"])
			$opt[] = '<option value="'.$value.'">'.$this->conf["allCategoriesMarker"].'</option>';
		else
			// if unset, use the one from locallang
			$opt[] = '<option value="'.$value.'">'.$this->pi_getLL('allCategoriesMarker').'</option>';

		foreach ($this->categories as $cat) {
			if ($cat['uid'] == 0)
				continue;
			$opt[] = '<option value="'.htmlentities($this->pi_linkTP_keepPIvars_url(array ("category" => $cat['uid']), $this->allowCaching)).'"'. ($selCat[0] == $cat['uid'] ? " SELECTED" : "").'>'.htmlentities($cat['title']).'</option>';
		}
		return '<select onChange="document.location='."'".$GLOBALS['TSFE']->baseUrl."'".' + this.options[this.selectedIndex].value;">'.implode("", $opt).'</select>';
	}

	/**
	 * Same as makeCategoriesSelect(), but for Targetgroups
	 */
	function makeTargetgroupSelect($content, $conf) {
		$this->initdefaults($content, $conf);

		$opt = array ();

		$selGroup = intval($this->piVars['targetgroup']);

		$value = htmlentities($this->pi_linkTP_keepPIvars_url(array ("targetgroup" => "")));

		/* Suck in label for "allCategories" from typoscript */
		if ($this->conf["allTargetgroupsMarker"])
			$opt[] = '<option value="'.$value.'">'.$this->conf["allTargetgroupsMarker"].'</option>';
		else
			// if unset, use the one from locallang
			$opt[] = '<option value="'.$value.'">'.$this->pi_getLL('allTargetgroupsMarker').'</option>';

		foreach ($this->targetgroups as $t) {
			if ($t['uid'] == 0)
				continue;
			$opt[] = '<option value="'.htmlentities($this->pi_linkTP_keepPIvars_url(array ("targetgroup" => $t['uid']), $this->allowCaching)).'"'. ($selGroup[0] == $t['uid'] ? " SELECTED" : "").'>'.htmlentities($t['title']).'</option>';
		}
		return '<select onChange="document.location='."'".$GLOBALS['TSFE']->baseUrl."'".' + this.options[this.selectedIndex].value;">'.implode("", $opt).'</select>';
	}


	/**
	 * This function returns an array of the UIDs of those categories, that we
	 * are currently being allowed to display.  If piVars["category"] is set, it's the
	 * only allowed category, if not, it returns all categories that have been loaded
	 * into $this->categories earlier based on the FlexForms config. 
	 */
	function getCurrentCategories() {
		if (isset ($this->piVars["category"])) {
			return array (0 => intval($this->piVars["category"]));
		} else {
			return array_keys($this->categories);
		}
	}

	/**
	 * This is the same as getCurrentCategories(), but for targetgroups
	 */
	function getCurrentTargetgroups() {
		if (isset ($this->piVars["targetgroup"])) {
			return array (0 => intval($this->piVars["targetgroup"]));
		} else {
			return array_keys($this->targetgroups);
		}
	}

	/**
	 * This is my special getDayOfTheWeke function, because calendar defaults Sunday being END of the week,
	 * not the start of the week.  date("w") returns 0 for sundays, which is quite odd.  Use 7 in that case.
	 * I know that this is not common in the US, but the bible clearly states Sunday being the end of the year,
	 * and so do all of the European countries handle it, so it's a good default.
	 */
	function getDayOfTheWeek($theTime) {
		$day = date("w", $theTime);
		return ($day == 0 ? 7 : $day);
	}

	/**
	 * Returns the view that we are in, which is set in flexforms config.
	 */
	function getCurrentView() {
		return $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'viewmode');
	}

	/**
	 * Sets the pid_list internal var
	 */
	function setPidlist($pid_list) {
		$this->pid_list = $pid_list;
	}
	/**
	 * Getter for pid_list internal var
	 */
	function getPidlist() {
		return $this->pid_list;
	}

	/**
	 * Extends the given by the levels given by $recursive.  Stolen from tt_news ;-)
	 */
	function generatePidlistRecursive($pid_list, $recursive) {
		/* If the pid_list is empty, we default to the current page.  Makes few sense, though */
		if ($pid_list == "")
			$pid_list = $GLOBALS["TSFE"]->id;
		if ($recursive) {
			$pid_list_arr = explode(",", $pid_list);
			$pid_list = "";
			while (list (, $val) = each($pid_list_arr)) {
				$pid_list .= $val.",".$this->cObj->getTreeList($val, intval($recursive));
			}
			$pid_list = ereg_replace(",$", "", $pid_list);
		}
		return $pid_list;
	}

	/**
	* function dayOfMonth
	*
	* finds either a specific occurence of a day based on name
	* (i.e., monday, tuesday, etc.), after a certain day, or
	* the last occurence of a day of the month.
	*
	* if no $occurence of is given, then it will look for the
	* first occurence of that day.  to find the last occurence
	* of a day, then set a value smaller or equal to zero (0).
	*
	* if no after date is given then it will start on the first
	* day of the month
	*
	* if any invalid data is passed then the function will return
	* false
	*
	*/
	function dayOfMonth($fmonth, $fyear, $dayToFind, $occurenceOf = 1, $after = 0) {
		$dtr = false;
		$done = false;
		$daysInMonth = date('d', mktime(0, 0, 0, $fmonth +1, 0, $fyear));
		$cd = $after +1;

		// We count "Sunday" as 7, but PHP uses it as "0", so fix this here
		if ($dayToFind == 7)
			$dayToFind = 0;

		//assert
		if (!checkdate($fmonth, 1, $fyear) || $occurenceOf < -5 || $occurenceOf > 5 || $cd > $daysInMonth) {
			return false;
		}

		// find day by weekday and occurance 
		if ($occurenceOf > 0) {
			for ($cd; $cd <= $daysInMonth && !$done; $cd ++) {

				//weekday found					
				if (date("w", mktime(0, 0, 0, $fmonth, $cd, $fyear)) == $dayToFind) {
					$cd = $cd + (($occurenceOf -1) * 7);

					//only set $dtr if found day is in current month
					if ($cd <= $daysInMonth)
						$dtr = $cd;

					$done = true;
				}
			}

			// find day by last weekday and occurance before	
		} else {

			if ($occurenceOf == 0)
				$occurenceOf = -1;

			// count down to find the last occurance of the given weekday  
			for ($cd = $daysInMonth; $cd > 0 && !$done; $cd --) {

				if (date("w", mktime(0, 0, 0, $fmonth, $cd, $fyear)) == $dayToFind) {

					$cd = $cd + (($occurenceOf +1) * 7);

					//only set the $dtr if found day is in current month						
					if ($cd > 0)
						$dtr = $cd;

					$done = true;
				}
			}
		}
		return $dtr;
	}

}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/calendar/pi1/class.tx_calendar_pi1.php"]) {
	include_once ($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/calendar/pi1/class.tx_calendar_pi1.php"]);
}
?>
