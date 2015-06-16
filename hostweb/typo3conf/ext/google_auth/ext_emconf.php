<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "google_auth".
 *
 * Auto generated 16-06-2015 07:53
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Google OpenAuth v2',
	'description' => 'Google OAuth2 implementation. Authorize your fe_users remotely, then creates a local fe_users record with data from Google Account for use in access protection. Login form can be replaced by one button - all auth happens at Google Apps. Requires Google App registration.',
	'category' => 'services',
	'version' => '4.0.0',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Claus Due',
	'author_email' => 'claus@wildside.dk',
	'author_company' => 'Wildside A/S',
	'constraints' => 
	array (
		'depends' => 
		array (
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

