<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "sk_booty".
 *
 * Auto generated 02-06-2015 07:47
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'SK Booty',
	'description' => 'Small Bootstrap Package.',
	'category' => 'distribution',
	'version' => '0.1.0',
	'state' => 'alpha',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Seitenkick GmbH',
	'author_email' => 'info@seitenkick.ch',
	'author_company' => 'private',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.6-6.2.99',
			'css_styled_content' => '6.2.0-6.2.99',
			'realurl' => '1.12.8-1.12.99',
			't3jquery' => '2.7.1-2.7.99',
			'static_info_tables' => '6.1.2-6.1.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

