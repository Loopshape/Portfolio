<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "t3_tcpdf".
 *
 * Auto generated 15-06-2015 23:46
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'TCPDF for TYPO3',
	'description' => 'Make TCPDF library (www.tcpdf.org) available within TYPO3.',
	'category' => 'misc',
	'version' => '2.4.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'EYE Communications AG',
	'author_email' => 'info@eye.ch',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.5.0-6.2.99',
			'php' => '5.2.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

