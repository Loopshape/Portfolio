<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_kkcalendar_entries'] = array (
	'ctrl' => $TCA['tx_kkcalendar_entries']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'type,date,title,note,category,responsible,workgroup,time,week,hidden,starttime,endtime,link,atagparams'
	),
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'starttime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'    => array (
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				)
			)
		),
		'type' => array (
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.type',		
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.type.I.1', '1'),
					array('LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.type.I.2', '2'),
				),
            'default' => 1
			)
		),
		'title' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.title',		
			'config' => array (
				'type' => 'input',	
				'size' => '40',	
				'max' => '255',	
				'eval' => 'required',
			)
		),
		'date' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.date',		
			'config' => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'checkbox' => '0',
				'default'  => '0'
			)
		),
		'week' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.week',
			'config' => Array (
				'type' => 'input',
				'size' => '6',
				'max' => '6',
				'eval' => 'int',
				'range' => Array (
					'upper' => 53,
					'lower' => 1
				),
				'default' => '0'
			)
		),
		'time' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.time',		
			'config' => array (
				'type' => 'input',	
				'size' => '5',	
				'max' => '5',
				'eval'     => 'time',
			)
		),
		'note' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.note',		
			'config' => array (
				'type' => 'text',
				'cols' => '40',	
				'rows' => '5',
			)
		),
		'datetext' => array (		
			'exclude' => 1,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.datetext',		
			'config' => array (
				'type' => 'input',	
				'size' => '40',	
				'max' => '255',
			)
		),
		'priority' => array (		
			'exclude' => 1,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.priority',		
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.priority.I.0', '0'),
					array('LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.priority.I.1', '1'),
					array('LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.priority.I.2', '2'),
				),
				'size' => 1,	
				'maxitems' => 1,
			)
		),
		'complete' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.complete',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'workgroup' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.workgroup',
			'config' => Array (
				'type' => 'input',
				'size' => '40',
				'eval' => 'trim',
				'max' => '80'
			)
		),
		'responsible' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.responsible',
			'config' => Array (
				'type' => 'input',
				'size' => '40',
				'eval' => 'trim',
				'max' => '80'
			)
		),
		'category' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.category',		
			'config' => array (
				'type' => 'select',	
				'items' => array (
					array('',0),
				),
				'foreign_table' => 'tx_kkcalendar_cat',	
				'foreign_table_where' => 'AND tx_kkcalendar_cat.pid=###STORAGE_PID### ORDER BY tx_kkcalendar_cat.uid',	
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'link' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.link',		
			'config' => array (
				'type' => 'group',	
				'internal_type' => 'db',	
				'allowed' => 'tt_content',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'atagparams' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_entries.atagparams',
			'config' => Array (
				'type' => 'input',
				'size' => '40',
				'eval' => 'trim',
				'max' => '250'
			)
		),
	),

	'types' => Array (
		'1' => Array('showitem' => 'type;;1;;1-1-1, category, date;;3;;3-3-3, title, note, link, atagparams'),
		'2' => Array('showitem' => 'type;;1;;1-1-1, category, date;;2;;3-3-3, title, note, workgroup, responsible, link, atagparams')
	),
	'palettes' => Array (
		'1' => Array('showitem' => 'hidden,starttime,endtime'),
		'2' => Array('showitem' => 'week, time, priority, complete'),
		'3' => Array('showitem' => 'datetext')
	)
);

$TCA['tx_kkcalendar_cat'] = array (
	'ctrl' => $TCA['tx_kkcalendar_cat']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,starttime,endtime,title'
	),
	'feInterface' => $TCA['tx_kkcalendar_cat']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'starttime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'    => array (
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				)
			)
		),
		'title' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:kk_calendar/locallang_db.xml:tx_kkcalendar_cat.title',
			'config' => array (
				'type' => 'input',
				'size' => '40',
				'max' => '255',
				'eval' => 'required',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'title;;1;;1-1-1')
	),
	'palettes' => array (
		'1' => array('showitem' => 'hidden, starttime, endtime')
	)
);


?>