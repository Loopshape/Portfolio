<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "adx_less".
 *
 * Auto generated 02-06-2015 00:32
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'ad: LESS',
	'description' => 'Contains a server- and client-side LESS compiler (http://leafo.net/lessphp/, http://lesscss.org). Supports a new cObject "LESS", a hook for t3lib_pagerenderer witch compiles LESS files for "includeCSS", hooks for rtehtmlarea for the property "RTE.default.contentCSS" and tinymce_rte for the property "RTE.default.init.content_css" and a ViewHelper for Fluid. Furthermore includes the Twitter Bootstrap grid system. Only the grid system and nothing more ;)',
	'category' => 'plugin',
	'version' => '1.1.1',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Arno Dudek',
	'author_email' => 'webmaster@adgrafik.at',
	'author_company' => 'ad:grafik',
	'constraints' => 
	array (
		'depends' => 
		array (
			'php' => '5.3.3-0.0.0',
			'typo3' => '6.0.0-6.1.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

