<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "autoloader".
 *
 * Auto generated 02-06-2015 17:22
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Autoloader',
	'description' => 'Automatic components loading of ExtBase extensions to get more time for coffee in the company ;) This ext is not a PHP SPL autoloader or class loader - it is better! Loads CommandController, Xclass, Hooks, Aspects, FlexForms, Slots...',
	'category' => NULL,
	'version' => '1.5.8',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => NULL,
	'clearcacheonload' => true,
	'author' => 'Tim Lochmüller',
	'author_email' => 'tim.lochmueller@hdnet.de',
	'author_company' => 'hdnet.de',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

