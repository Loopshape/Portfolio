<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "jh_opengraphprotocol".
 *
 * Auto generated 01-06-2015 23:57
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Open Graph protocol',
	'description' => 'Adds the Open Graph protocol properties in meta-tags to the html-header and supports multilanguage-websites.',
	'category' => 'plugin',
	'version' => '1.0.3',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Jonathan Heilmann',
	'author_email' => 'mail@jonathan-heilmann.de',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => 
		array (
			'jh_opengraph_ttnews' => '0.0.0-0.0.10',
		),
		'suggests' => 
		array (
		),
	),
);

