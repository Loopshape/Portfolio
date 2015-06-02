<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5/', 'Foundation 5 basic');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Interchange/', 'Foundation 5 - Interchange');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Offcanvas/', 'Foundation 5 - Offcanvas');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Breadcrumbs/', 'Foundation 5 - Breadcrumbs');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_TopBar/', 'Foundation 5 - Top Bar');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_SubNav/', 'Foundation 5 - Sub Nav');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_SideNav/', 'Foundation 5 - Side Nav');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_DropdownNav/', 'Foundation 5 - Dropdown Nav');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Pagination/', 'Foundation 5 - Pagination');


$_EXTCONF = unserialize($_EXTCONF);
if ($_EXTCONF['foundation_5_Magellan']) {
	$magellan = 'tx_dffoundation5_magellan,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Magellan/', 'Foundation 5 - Magellan');
}
if ($_EXTCONF['foundation_5_Tabs']) {
	$tabs = 'tx_dffoundation5_tab,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Tabs/', 'Foundation 5 - Tabs');
}
if ($_EXTCONF['foundation_5_slider'] == 1) {
	$wow = 'tx_dffoundation5_wow,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Wow/', 'Foundation 5 - WowSlider');
}
if ($_EXTCONF['foundation_5_slider'] == 2) {
	$orbit = 'tx_dffoundation5_orbit,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Orbit/', 'Foundation 5 - Orbit');
} 

$tempColumns = array(
	'tx_dffoundation5_large_left_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,
			'cols' => '40',
		)
	),
	'tx_dffoundation5_large_right_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,			
		)
	),
	'tx_dffoundation5_medium_left_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,			
		)
	),
	'tx_dffoundation5_medium_right_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,			
		)
	),
	'tx_dffoundation5_small_left_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 12,
		)
	),
	'tx_dffoundation5_small_right_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 12,			
		)
	),
	'tx_dffoundation5_large_block_grid' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 1,			
		)
	),	
	'tx_dffoundation5_medium_block_grid' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 1,			
		)
	),
	'tx_dffoundation5_small_block_grid' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 1,			
		)
	),
	'tx_dffoundation5_left_add' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_left_add',		
		'config' => array(
			'type' => 'input',	
			'size' => '14',
		)
	),
	'tx_dffoundation5_right_add' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_right_add',		
		'config' => array(
			'type' => 'input',	
			'size' => '14',
		)
	),		
	'tx_dffoundation5_class' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_class',		
		'config' => array(
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_dffoundation5_style' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_style',		
		'config' => array(
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_dffoundation5_show_for' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.1', 'show-for-small-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.2', 'show-for-medium-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.3', 'show-for-medium-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.4', 'show-for-large-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.5', 'show-for-large-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.6', 'show-for-xlarge-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.7', 'show-for-xlarge-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.8', 'show-for-xxlarge-up'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_hide_for' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.1', 'hide-for-small-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.2', 'hide-for-medium-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.3', 'hide-for-medium-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.4', 'hide-for-large-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.5', 'hide-for-large-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.6', 'hide-for-xlarge-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.7', 'hide-for-xlarge-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.8', 'hide-for-xxlarge-up'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_format' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format.I.1', 'show-for-landscape'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format.I.2', 'show-for-portrait'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_touch' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch.I.1', 'show-for-touch'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch.I.2', 'hide-for-touch'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_print' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print.I.1', 'show-for-print'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print.I.2', 'hide-for-print'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_cropscaling' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_cropscaling_ratio' => array (		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio',	
		'config' => array (
			'type' => 'select',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.0', '0'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.1', '1'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.2', '16/9'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.3', '4/3'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.4', '9/16'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.5', '3/4'),
			)
		)
	),
	'tx_dffoundation5_cropscaling_orient' => array (		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient',		
		'config' => array (
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.1', 1, 'EXT:df_foundation5/Resources/Public/Icons/cut_above_left.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.2', 2, 'EXT:df_foundation5/Resources/Public/Icons/cut_above_center.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.3', 3, 'EXT:df_foundation5/Resources/Public/Icons/cut_above_right.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.8', 8, 'EXT:df_foundation5/Resources/Public/Icons/cut_center_left.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.0', 0, 'EXT:df_foundation5/Resources/Public/Icons/cut_center_center.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.4', 4, 'EXT:df_foundation5/Resources/Public/Icons/cut_center_right.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.7', 7, 'EXT:df_foundation5/Resources/Public/Icons/cut_below_left.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.6', 6, 'EXT:df_foundation5/Resources/Public/Icons/cut_below_center.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.5', 5, 'EXT:df_foundation5/Resources/Public/Icons/cut_below_right.gif',),				
			),
			'selicon_cols' => 3,
			'default' => 0,
			'size' => 1,
			'minitems' => 1,
			'maxitems' => 1,
			'iconsInOptionTags' => 1,
		)
	),
	'tx_dffoundation5_orbit' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_orbit',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_orbit.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_wow' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_wow',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_wow.I.0', ''),
			)
		)
	),	
	'tx_dffoundation5_magellan' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_magellan',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_magellan.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_tab' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_tab',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_tab.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_interchange' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_interchange',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_interchange.I.0', ''),
			)
		)
	),	
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_label_conditions, tx_dffoundation5_show_for, tx_dffoundation5_hide_for, tx_dffoundation5_format, tx_dffoundation5_touch, tx_dffoundation5_print, --div--;Erweitert, tx_dffoundation5_class, tx_dffoundation5_style, ');

$TCA['tt_content']['columns']['imagecols']['config']['type'] = 'passthrough';
$TCA['tt_content']['columns']['image_noRows']['config']['type'] = 'passthrough';
$TCA['tt_content']['palettes']['visibility']['showitem'] .= ','.$magellan.$tabs;
$TCA['tt_content']['palettes']['imageblock']['showitem'] = str_replace(', imagecols', ',imagecols, tx_dffoundation5_large_block_grid, tx_dffoundation5_medium_block_grid, tx_dffoundation5_small_block_grid, --linebreak--, tx_dffoundation5_large_left_column, tx_dffoundation5_large_right_column,--linebreak--, tx_dffoundation5_medium_left_column, tx_dffoundation5_medium_right_column, --linebreak--, tx_dffoundation5_small_left_column, tx_dffoundation5_small_right_column, --linebreak--,tx_dffoundation5_left_add,tx_dffoundation5_right_add,', $TCA['tt_content']['palettes']['imageblock']['showitem']);
$TCA['tt_content']['palettes']['imagelinks']['showitem'] .= ',tx_dffoundation5_interchange';
$TCA['tt_content']['palettes']['image_settings']['showitem'] = '
	imagewidth;LLL:EXT:cms/locallang_ttc.xlf:imagewidth_formlabel, 
	imageheight;LLL:EXT:cms/locallang_ttc.xlf:imageheight_formlabel, 
	imageborder;LLL:EXT:cms/locallang_ttc.xlf:imageborder_formlabel,
	'.$orbit.$wow.'--linebreak--, 
	tx_dffoundation5_cropscaling, 
	tx_dffoundation5_cropscaling_orient, --linebreak--, 
	image_compression;LLL:EXT:cms/locallang_ttc.xlf:image_compression_formlabel, 
	image_effects;LLL:EXT:cms/locallang_ttc.xlf:image_effects_formlabel, 
	image_frames;LLL:EXT:cms/locallang_ttc.xlf:image_frames_formlabel
';

// in zweite Optionspalette 
$TCA['tt_content']['palettes']['image_settings']['canNotCollapse'] = 0;

$TCA['tt_content']['columns']['imageorient'] = array (
			'label' => 'LLL:EXT:df_foundation5/cms/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.0', 0, 'EXT:df_foundation5/Resources/Public/Icons/above_center.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.1', 1, 'EXT:df_foundation5/Resources/Public/Icons/above_right.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.2', 2, 'EXT:df_foundation5/Resources/Public/Icons/above_left.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.3', 8, 'EXT:df_foundation5/Resources/Public/Icons/below_center.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.4', 9,	'EXT:df_foundation5/Resources/Public/Icons/below_right.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.5', 10, 'EXT:df_foundation5/Resources/Public/Icons/below_left.gif',),			
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.30', 30, 'EXT:df_foundation5/Resources/Public/Icons/intext_left_nowrap.gif',),					 
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.31', 31, 'EXT:df_foundation5/Resources/Public/Icons/intext_right_nowrap.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.32', 32, 'EXT:df_foundation5/Resources/Public/Icons/nowrap.gif',),
				),
			'selicon_cols' => 3,
			'default' => 0,
			'size' => 1,
			'minitems' => 1,
			'maxitems' => 1,
			'iconsInOptionTags' => 1,
     ),
 );
?>
