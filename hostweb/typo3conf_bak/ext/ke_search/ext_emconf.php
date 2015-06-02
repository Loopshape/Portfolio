<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ke_search".
 *
 * Auto generated 01-06-2015 22:29
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Faceted Search',
	'description' => 'Faceted fulltext search for TYPO3. Fast, flexible and easy to use. Very easy to install. Fast (tested with over 200.000 records) and flexible (you can write your own indexers). Indexes content directly from the databases. Visit kesearch.de for further information and documentation.',
	'category' => 'plugin',
	'version' => '1.10.0',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Christian Buelter (kennziffer.com)',
	'author_email' => 'christian.buelter@inmedias.de',
	'author_company' => 'www.kennziffer.com GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.5.0-7.99.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

