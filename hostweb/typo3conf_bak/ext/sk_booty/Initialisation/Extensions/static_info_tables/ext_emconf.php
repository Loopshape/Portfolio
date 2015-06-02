<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "static_info_tables".
 *
 * Auto generated 01-12-2014 16:05
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Static Info Tables',
	'description' => 'Data and API for countries, languages and currencies.',
	'category' => 'misc',
	'version' => '6.1.2',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Stanislas Rolland/René Fritz',
	'author_email' => 'typo3@sjbr.ca',
	'author_company' => 'SJBR',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.0.6-6.2.99',
			'php' => '5.3.7-0.0.0',
		),
		'conflicts' => 
		array (
			'sr_static_info' => '0.0.0-99.99.99',
			'cc_infotablesmgm' => '0.0.0-99.99.99',
			'uncache' => '0.0.0-99.99.99',
		),
		'suggests' => 
		array (
		),
	),
);

