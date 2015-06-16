<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cps_tcatree".
 *
 * Auto generated 06-11-2013 09:02
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Record tree for TCA [FIXED for TYPO3 6.2]',
	'description' => 'Adds a new type to tca configuration to display record lists (like tt_news)',
	'category' => 'be',
	'shy' => 0,
	'version' => '0.4.2',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'alpha',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Nicole Cordes',
	'author_email' => 'cordes@cps-it.de',
	'author_company' => 'CPS-IT GmbH (http://www.cps-it.de)',
	'CGLcompliance' => NULL,
	'CGLcompliance_note' => NULL,
	'constraints' =>
	array (
		'depends' =>
		array (
			'php' => '5.0.0-0.0.0',
			'typo3' => '4.1.0-0.0.0',
			'cps_devlib' => '0.1.0-',
      'typo3' => '4.5.0-6.2.99', // ##61661, 140916, dwildt, 1+
		),
		'conflicts' =>
		array (
		),
		'suggests' =>
		array (
		),
	),
);

?>
