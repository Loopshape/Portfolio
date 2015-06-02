<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "linkservice".
 *
 * Auto generated 02-06-2015 07:09
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Linkservice - link refresher',
	'description' => 'Refreshes links in elements by issuing HEAD-request to them. Redirect are followed and updated back into the tables.',
	'category' => 'Configuration',
	'version' => '2.0.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Daniel Schledermann',
	'author_email' => 'daniel@linkfactory.dk',
	'author_company' => 'Linkfactory A/S',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

