<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "media".
 *
 * Auto generated 02-06-2015 00:02
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Media management',
	'description' => 'Media management system for TYPO3 CMS.',
	'category' => 'misc',
	'version' => '3.5.3',
	'state' => 'beta',
	'uploadfolder' => true,
	'createDirs' => NULL,
	'clearcacheonload' => true,
	'author' => 'Fabien Udriot',
	'author_email' => 'fabien.udriot@typo3.org',
	'author_company' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-6.2.99',
			'vidi' => '',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

