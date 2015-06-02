<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "indexedsearch_ttnews_crawler".
 *
 * Auto generated 02-06-2015 17:31
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'IndexedSearch Crawler for tt_news',
	'description' => 'Adds a crawler for tt_news entries into the indexed_search configuration',
	'category' => 'misc',
	'version' => '1.1.6',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Simon Schick',
	'author_email' => 'simonsimcity@gmail.com',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.5.0-6.1.99',
			'indexed_search' => '',
			'crawler' => '',
			'tt_news' => '',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

