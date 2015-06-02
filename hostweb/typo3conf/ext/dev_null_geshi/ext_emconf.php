<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "dev_null_geshi".
 *
 * Auto generated 02-06-2015 17:24
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Source Code Highlighter',
	'description' => 'The source code highlighter is capable of highlighting 70+ different languages making it easy to publish source code in typo3. The highlighting is done using the GeSHi (http://qbnz.com/highlighter/) highlighting engine.',
	'category' => 'plugin',
	'version' => '1.0.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'W. Rotschek',
	'author_email' => 'typo3@dev-null.at',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.2.0-0.0.0',
			'typo3' => '6.0.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

