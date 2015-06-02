<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "sa_indexedsearch_patch".
 *
 * Auto generated 01-06-2015 19:18
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Public results for indexed search',
	'description' => 'Includes public results in the search results of logged in frontend users. Pages that are cached by non-logged in users (usergroups 0,-1) will also appear in the results when a user is logged in. Attention: might conflict with other extensions that extend indexed search with XCLASS',
	'category' => 'misc',
	'version' => '2.0.0',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Bart Dubelaar',
	'author_email' => 'bdubelaar@sundayafternoon.nl',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'indexed_search' => '',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

