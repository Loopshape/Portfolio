<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "linkhandlerconf".
 *
 * Auto generated 15-06-2015 23:46
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => '+AOE link handler configurator',
	'description' => 'Extend the AOE linkhandler with this configurator! It simplifies the linkhandler. The configurator has userinterfaces and out-of-the-box templates for cal, org, sf_event_mgt, tt_news and tt_products. Don\'t edit page TSconfig manually	any longer.',
	'category' => 'plugin',
	'version' => '6.1.1',
	'state' => 'beta',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Dirk Wildt - Die Netzmacher',
	'author_email' => 'http://wildt.at.die-netzmacher.de',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'linkhandler' => '1.1.0-1.9.99',
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

