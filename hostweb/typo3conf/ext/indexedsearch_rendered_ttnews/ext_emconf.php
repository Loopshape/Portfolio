<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "indexedsearch_rendered_ttnews".
 *
 * Auto generated 02-06-2015 17:36
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Render news content for IndexedSearch Crawler tt_news',
	'description' => 'Renders the content-field for news before indexing it. Useful for f.e. rgnewsce.',
	'category' => 'misc',
	'version' => '2.1.7',
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
			'indexedsearch_ttnews_crawler' => '',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

