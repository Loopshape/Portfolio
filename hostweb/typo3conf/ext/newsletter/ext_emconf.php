<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "newsletter".
 *
 * Auto generated 15-06-2015 23:41
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Newsletter',
	'description' => 'Send any pages as Newsletter and provide statistics on opened emails and clicked links.',
	'category' => 'module',
	'version' => '2.4.1',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Ecodev',
	'author_email' => 'contact@ecodev.ch',
	'author_company' => 'Ecodev',
	'constraints' => 
	array (
		'depends' => 
		array (
			'cms' => '',
			'php' => '5.3.7-0.0.0',
			'typo3' => '6.1.0-7.99.99',
			'scheduler' => '6.1.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

