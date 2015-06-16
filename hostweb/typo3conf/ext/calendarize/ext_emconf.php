<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "calendarize".
 *
 * Auto generated 16-06-2015 01:18
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Calendarize',
	'description' => 'Create a structure for timely controlled tables and one plugin for the different output of calendar views. The extension is shipped with one default event table, but the aim of the extension is to "calendarize" every table/model. It is completely independent and configurable! Use your own models as event items in this calender. We need feedback about the concept! Development on https://github.com/lochmueller/calendarize',
	'category' => 'fe',
	'version' => '1.4.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => NULL,
	'clearcacheonload' => true,
	'author' => 'Tim Lochmüller',
	'author_email' => 'tim@fruit-lab.de',
	'author_company' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.2.99',
			'autoloader' => '1.5.5-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

