<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "my_minifier".
 *
 * Auto generated 02-06-2015 07:10
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'My CSS/JS Minifier',
	'description' => 'A frontend plugin that loop through all css/js to minimize it via Google Closure API and cssminifier.com',
	'category' => 'service',
	'version' => '1.0.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => NULL,
	'clearcacheonload' => true,
	'author' => 'Benjamin Serfhos',
	'author_email' => 'benjamin@serfhos.com',
	'author_company' => 'Rotterdam School of Management, Erasmus University',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.0.0-7.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

