<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "calendarize_news".
 *
 * Auto generated 02-06-2015 17:22
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Calendarize for News',
	'description' => 'Add Event options to the news extension',
	'category' => 'misc',
	'version' => '0.1.1',
	'state' => 'beta',
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
			'typo3' => '6.2.0-7.1.99',
			'calendarize' => '1.2.0-0.0.0',
			'news' => '3.0.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

