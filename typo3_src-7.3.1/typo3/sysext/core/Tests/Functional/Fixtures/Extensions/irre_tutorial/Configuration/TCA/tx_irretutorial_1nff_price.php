<?php
return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tx_irretutorial_1nff_price',
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
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('irre_tutorial') . 'Resources/Public/Icons/icon_tx_irretutorial_price.gif',
		'versioningWS' => 2,
		'origUid' => 't3_origuid',
		// @see http://forge.typo3.org/issues/29278 which solves it implicitly in the Core
		// 'shadowColumnsForNewPlaceholders' => 'parentid,parenttable',
		'shadowColumnsForMovePlaceholders' => 'parentid,parenttable',
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,parentid,title,price'
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
				'foreign_table' => 'tx_irretutorial_1nff_price',
				'foreign_table_where' => 'AND tx_irretutorial_1nff_price.pid=###CURRENT_PID### AND tx_irretutorial_1nff_price.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tx_irretutorial_price.title',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'price' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tx_irretutorial_price.price',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'double2',
			)
		),
	),
	'types' => array(
		'0' => Array('showitem' =>
			'--div--;LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tabs.general, title, price,' .
			'--div--;LLL:EXT:irre_tutorial/Resources/Private/Language/locallang_db.xml:tabs.visibility, sys_language_uid, l18n_parent, l18n_diffsource, hidden;;1, parentid'
		)
	),
	'palettes' => array(
		'1' => Array('showitem' => '')
	)
);