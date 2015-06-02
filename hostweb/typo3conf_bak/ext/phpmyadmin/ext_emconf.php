<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "phpmyadmin".
 *
 * Auto generated 02-06-2015 08:14
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'phpMyAdmin',
	'description' => 'Third party \'phpMyAdmin\' administration module. Access to admin-users only. 4.x releases require PHP 5.2, TYPO3 4.2 and MySQL 5. The 3.x branch is still supported: http://www.mehrwert.de/go/t3x',
	'category' => 'module',
	'version' => '4.19.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => 'uploads/tx_phpmyadmin',
	'clearcacheonload' => true,
	'author' => 'Andreas Beutel - mehrwert',
	'author_email' => 'typo3@mehrwert.de',
	'author_company' => 'mehrwert intermediale kommunikation GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.2.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

