<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "rn_base".
 *
 * Auto generated 02-06-2015 00:37
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'A base library for extensions.',
	'description' => 'Uses MVC design principles and domain driven development for TYPO3 extension development.',
	'category' => 'misc',
	'version' => '0.14.11',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => 'typo3temp/rn_base/',
	'clearcacheonload' => true,
	'author' => 'Rene Nitzsche',
	'author_email' => 'rene@system25.de',
	'author_company' => 'System 25',
	'constraints' => 
	array (
		'depends' => 
		array (
			'cms' => '',
			'typo3' => '4.3.0-6.2.99',
			'php' => '5.0.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

