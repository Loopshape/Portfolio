<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "div".
 *
 * Auto generated 02-06-2015 00:03
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Static Methods for Extensions',
	'description' => 'Collection of static functions and peer to access tx_lib. Auto including and loading of objects. NG typo3.teams.extension-coordination.',
	'category' => 'misc',
	'version' => '0.3.0',
	'state' => 'alpha',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Andre Sindler',
	'author_email' => 'git@andre-spindler.de',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.0.0-6.2.99',
			'php' => '5.3.0-5.6.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

