<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "t3socials".
 *
 * Auto generated 02-06-2015 00:07
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'T3 SOCIALS',
	'description' => 'This TYPO3 extension provides an API to communicate with socials networks. So it\'s possible for example to publish newly created news (or whatever you like) directly into social networks.',
	'category' => 'services',
	'version' => '1.1.0',
	'state' => 'beta',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Michael Wagner, Rene Nitzsche',
	'author_email' => 'dev@dmk-ebusiness.de',
	'author_company' => 'DMK E-BUSINESS GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.0.0-0.0.0',
			'rn_base' => '0.14.9-0.0.0',
			'typo3' => '4.4.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

