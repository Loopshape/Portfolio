<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cps_searchhighlight".
 *
 * Auto generated 15-06-2015 23:37
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'CPS Search Highlighting',
	'description' => 'Highlights search terms in google-style (with different colors) when a user comes from a search engine or other extension e.g. indexed_search or solr. (base on EXT:psm_highlight)',
	'category' => 'misc',
	'version' => '1.0.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Roman Ott @ CPS It GmbH',
	'author_email' => 'ott@cps-it.de',
	'author_company' => 'CPS-IT',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0 - 6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

