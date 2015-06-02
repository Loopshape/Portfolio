<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "crawler".
 *
 * Auto generated 02-06-2015 17:31
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Site Crawler',
	'description' => 'Libraries and scripts for crawling the TYPO3 page tree. Used for re-caching, re-indexing, publishing applications etc.',
	'category' => 'module',
	'version' => '3.5.0',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Kasper Skaarhoj, Daniel Poetzinger, Fabrizio Branca, Tolleiv Nietsch, Timo Schmidt, Michael Klapper',
	'author_email' => 'dev@aoemedia.de',
	'author_company' => 'AOE media GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.1.0-0.0.0',
			'typo3' => '4.2.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

