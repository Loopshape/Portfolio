<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "mksearch".
 *
 * Auto generated 02-06-2015 07:14
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'MK Search',
	'description' => 'Generic highly adjustable and extendable search engine framework, using Zend Lucene, Apache Solr or ElasticSearch. But support for other search engines can be provided easily.',
	'category' => 'plugin',
	'version' => '1.4.14',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Michael Wagner, Hannes Bochmann, Rene Nitzsche',
	'author_email' => 'dev@dmk-ebusiness.de',
	'author_company' => 'DMK E-Business GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'rn_base' => '0.13.7-',
			'typo3' => '4.4.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

