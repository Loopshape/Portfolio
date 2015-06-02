<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "indexedsearch_icons".
 *
 * Auto generated 01-06-2015 19:18
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Icons for indexed search',
	'description' => 'Nicer icons for indexed_search search results and support for more file types like .odt and .odp',
	'category' => 'fe',
	'version' => '2.0.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Sven Burkert',
	'author_email' => 'bedienung@sbtheke.de',
	'author_company' => 'SBTheke web development',
	'constraints' => 
	array (
		'depends' => 
		array (
			'indexed_search' => '',
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

