<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "bsdist".
 *
 * Auto generated 02-06-2015 07:47
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Bootstrap Kickstart Package',
	'description' => 'This distribution package imports an initial page tree for a new website and installs bootstrap_core. A collection of files for the website layout and extension configuration is included.',
	'category' => 'distribution',
	'version' => '1.2.2',
	'state' => 'beta',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Pascal Mayer',
	'author_email' => 'typo3@bsdist.ch',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.2.99',
			'bootstrap_core' => '1.2.3-0.0.0',
			'scheduler' => '6.2.0-7.2.99',
			'recycler' => '6.2.0-7.2.99',
		),
		'conflicts' => 
		array (
			'bootstrap_package' => '',
			'introduction' => '',
		),
		'suggests' => 
		array (
		),
	),
);

