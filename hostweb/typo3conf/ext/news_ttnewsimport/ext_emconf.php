<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "news_ttnewsimport".
 *
 * Auto generated 16-06-2015 07:48
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'tt_news importer',
	'description' => 'Importer of ext:tt_news items to ext:news',
	'category' => 'be',
	'version' => '1.0.2',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Frans Saris',
	'author_email' => 't3ext@beech.it',
	'author_company' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.4-7.99.99',
			'php' => '5.3.0-0.0.0',
			'news' => '3.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

