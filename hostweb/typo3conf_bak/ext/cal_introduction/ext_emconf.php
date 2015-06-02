<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cal_introduction".
 *
 * Auto generated 02-06-2015 07:47
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Calendar Base Introduction Package',
	'description' => 'This package delivers a new website tree branch "Calendar Base" inside "Content excamples" and shows all out-of-the-box features of the Calendar Base extension.',
	'category' => 'distribution',
	'version' => '1.0.0',
	'state' => 'beta',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Mario Matzulla',
	'author_email' => 'mario@matzullas.de',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.2.99',
			'bootstrap_package' => '6.2.0-6.2.99',
			'realurl' => '1.12.8-1.12.99',
			'cal' => '1.9.0-1.9.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

