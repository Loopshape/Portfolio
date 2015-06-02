<?php
defined('TYPO3_MODE') or die();

// Configure static language field of sys_language table
$GLOBALS['TCA']['sys_language']['columns']['static_lang_isocode']['config'] = array(
	'type' => 'select',
	'items' => array(
		array('',0)
	),
	'foreign_table' => 'static_languages',
	'foreign_table_where' => 'AND static_languages.pid=0 ORDER BY static_languages.lg_name_en',
	'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateLanguagesSelector',
	'size' => '1',
	'minitems' => '0',
	'maxitems' => '1',
	'wizards' => array(
		'suggest' => array(
			'type' => 'suggest',
			'default' => array(
				'receiverClass' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\SuggestReceiver'
			)
		)
	)
);