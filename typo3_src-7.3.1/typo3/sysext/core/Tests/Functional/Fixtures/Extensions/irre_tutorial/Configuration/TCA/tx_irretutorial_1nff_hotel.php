<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tx_irretutorial_1nff_hotel',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('irre_tutorial') . 'Resources/Public/Icons/icon_tx_irretutorial_hotel.gif',
		'versioningWS' => 2,
		'origUid' => 't3_origuid',
		// @see http://forge.typo3.org/issues/29278 which solves it implicitly in the Core
		// 'shadowColumnsForNewPlaceholders' => 'parentid,parenttable',
		'shadowColumnsForMovePlaceholders' => 'parentid,parenttable',
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,title,offers'
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_irretutorial_1nff_hotel',
				'foreign_table_where' => 'AND tx_irretutorial_1nff_hotel.pid=###CURRENT_PID### AND tx_irretutorial_1nff_hotel.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'parentid' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
		'parenttable' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
		'title' => array(
			'exclude' => 1,
			'l10n_mode' => 'prefixLangTitle',
			'label' => 'LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tx_irretutorial_hotel.title',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'offers' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tx_irretutorial_hotel.offers',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_irretutorial_1nff_offer',
				'foreign_field' => 'parentid',
				'foreign_table_field' => 'parenttable',
				'maxitems' => 10,
				'appearance' => array(
					'showSynchronizationLink' => 1,
					'showAllLocalizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showRemovedLocalizationRecords' => 1,
				),
				'behaviour' => array(
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => TRUE,
				),
			)
		),
	),
	'types' => array(
		'0' => Array('showitem' =>
			'--div--;LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tabs.general, title, offers,' .
			'--div--;LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tabs.visibility, sys_language_uid, l18n_parent, l18n_diffsource, hidden;;1'
		)
	),
	'palettes' => array(
		'1' => Array('showitem' => '')
	)
);