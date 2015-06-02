<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "tk_svconsql_table".
 *
 * Auto generated 02-06-2015 17:39
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Table for Connector service SQL',
	'description' => 'Simple extension for presenting data from external database as HTML table.',
	'category' => 'plugin',
	'version' => '2.2.2',
	'state' => 'beta',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Tomasz Krawczyk',
	'author_email' => 'tomasz@typo3.pl',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.3.0-5.4.99',
			'typo3' => '4.5.0-6.2.99',
			'adodb' => '5.14.0-6.2.99',
			'svconnector' => '2.0.0-2.4.99',
			'svconnector_sql' => '1.0.0-1.4.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

