<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

/*
		'enablecolumns' => Array (
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime'
		),
*/

t3lib_extMgm::allowTableOnStandardPages('tx_kkcalendar_entries');
t3lib_extMgm::addToInsertRecords('tx_kkcalendar_entries');

$TCA['tx_kkcalendar_entries'] = array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries',
		'label' => 'title',
		'default_sortby' => 'ORDER BY date',
		'tstamp' => 'tstamp',
		'prependAtCopy' => 'LLL:EXT:lang/locallang_general.php:LGL.prependAtCopy',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'type' => 'type',
		'typeicon_column' => 'type',
		'typeicons' => Array (
			'1' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_kkcalendar_entries.gif',
			'2' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_kkcalendar_todos.gif'
		),
		'useColumnsForDefaultValues' => 'type',
		'mainpalette' => 1,
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_kkcalendar_entries.gif',
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_kkcalendar_cat');
t3lib_extMgm::addToInsertRecords('tx_kkcalendar_cat');

$TCA['tx_kkcalendar_cat'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_cat',		
		'label'     => 'title',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_kkcalendar_cat.gif',
	),
);

$tempColumns = array (
	'tx_kkcalendar_cal' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tt_content.tx_kkcalendar_cal',		
		'config' => array (
			'type' => 'flex',
			'ds' => array (
				'default' => 'FILE:EXT:kk_calendar/flexform.xml',
			),
		)
	),
);

// insert CSS file
t3lib_extMgm::addStaticFile($_EXTKEY,'res/','calendar');
t3lib_extMgm::addStaticFile($_EXTKEY,'res/css/','calendar css');

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='tx_kkcalendar_cal;;;;1-1-1';


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:kk_calendar/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');


// you add pi_flexform to be renderd when your plugin is shown
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] ='tx_kkcalendar_cal';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';                   // new!
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY . '/flexform.xml');


?>