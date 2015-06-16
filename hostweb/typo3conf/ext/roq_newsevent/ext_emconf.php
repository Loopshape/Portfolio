<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "roq_newsevent".
 *
 * Auto generated 15-06-2015 23:30
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'News event',
	'description' => 'Event extension based on the versatile news system. Supplies additional event functionality to news records.',
	'category' => 'plugin',
	'version' => '3.1.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'ROQUIN B.V.',
	'author_email' => 'extensions@roquin.nl',
	'author_company' => 'ROQUIN B.V.',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-6.2.99',
			'news' => '3.0.1-3.1.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

