<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cb_newscal".
 *
 * Auto generated 02-06-2015 07:14
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Calendar for news',
	'description' => 'Display news as calendar of the month.',
	'category' => NULL,
	'version' => '1.2.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Charles Brunet',
	'author_email' => 'charles@cbrunet.net',
	'author_company' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.99.99',
			'news' => '3.0.0-3.1.99',
		),
		'suggests' => 
		array (
			'roq_newsevent' => '3.0.0-3.1.99',
		),
		'conflicts' => 
		array (
		),
	),
);

