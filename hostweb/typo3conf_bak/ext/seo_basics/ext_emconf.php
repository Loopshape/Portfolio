<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "seo_basics".
 *
 * Auto generated 02-06-2015 04:17
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Basic SEO Features',
	'description' => 'Adds a separate field for the title-tag per page, easy and SEO-friendly keywords and description editing in a new module as well as a flexible Google Sitemap (XML).',
	'category' => 'fe',
	'version' => '0.9.0',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Benni Mack',
	'author_email' => 'benni@typo3.org',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'realurl' => '0.0.0-0.0.0',
			'typo3' => '6.2.0-7.9.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

