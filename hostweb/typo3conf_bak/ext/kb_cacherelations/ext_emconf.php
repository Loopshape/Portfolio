<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "kb_cacherelations".
 *
 * Auto generated 01-06-2015 23:53
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'KB Cache Relations',
	'description' => 'Clears the cache of specified pages if records on other specified related pages got changed. More sophisticated possibilites than by the default way to do this using TCEMAIN.clearCacheCmd',
	'category' => 'be',
	'version' => '0.1.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => NULL,
	'clearcacheonload' => false,
	'author' => 'Bernhard Kraft',
	'author_email' => 'kraftb@kraftb.at',
	'author_company' => 'think-open.at GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0-7.99.99',
			'php' => '5.2.0-5.99.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

