<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "context_hints".
 *
 * Auto generated 02-06-2015 04:17
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Display hints about the current Application Context',
	'description' => 'Displays a little message on the top of the Backend about the current context along with some useful info as tooltip.
										After configuring and installing the extension, reload the Backend and notice the additional info next to the TYPO3 logo.',
	'category' => 'be',
	'version' => '1.2.2',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => NULL,
	'clearcacheonload' => false,
	'author' => 'Fabien Udriot',
	'author_email' => 'fabien.udriot@typo3.org',
	'author_company' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

