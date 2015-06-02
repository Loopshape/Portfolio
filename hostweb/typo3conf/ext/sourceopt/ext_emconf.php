<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "sourceopt".
 *
 * Auto generated 02-06-2015 17:15
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Source Optimization',
	'description' => 'Optimization of the final page: reformatting the (x)html output, removal of new lines, and quotes. Move development repository to https://github.com/lochmueller/sourceopt',
	'category' => 'fe',
	'version' => '0.8.7',
	'state' => 'beta',
	'uploadfolder' => false,
	'createDirs' => NULL,
	'clearcacheonload' => false,
	'author' => 'Dr. Ronald P. Steiner, Boris Nicolai, Tim Lochmueller',
	'author_email' => 'ronald.steiner@googlemail.com, boris.nicolai@andavida.com, tim@fruit-lab.de',
	'author_company' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.0.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

