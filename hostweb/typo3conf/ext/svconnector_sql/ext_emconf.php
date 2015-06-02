<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "svconnector_sql".
 *
 * Auto generated 02-06-2015 17:39
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Connector service - SQL',
	'description' => 'Connector service for any SQL-based database via ADODB.',
	'category' => 'services',
	'version' => '1.4.0',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Francois Suter (Cobweb)',
	'author_email' => 'typo3@cobweb.ch',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.5.0-6.2.99',
			'adodb' => '',
			'svconnector' => '2.2.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

