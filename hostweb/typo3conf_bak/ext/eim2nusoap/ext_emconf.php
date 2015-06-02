<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "eim2nusoap".
 *
 * Auto generated 02-06-2015 01:11
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'eim2 nusoap',
	'description' => 'contains the actual nusoap library from Dietrich Ayala, there is one in extension repository, but with an older version of nusoap, which didn\'t fit my needs.',
	'category' => 'misc',
	'version' => '1.0.0',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Achim Eichhorn',
	'author_email' => 'AchimEichhorn@eim2.de',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '3.5.0-0.0.0',
			'php' => '3.0.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

