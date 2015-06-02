<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE == 'BE') {
	require_once(t3lib_extMgm::extPath('ke_search') . 'Classes/lib/class.tx_kesearch_lib_items.php');
}

$tempColumns = array(
    'tx_kesearch_tags' => array(
	'exclude' => 0,
	'label' => 'LLL:EXT:ke_search/locallang_db.xml:pages.tx_kesearch_tags',
	'config' => array(
	    'type' => 'select',
	    'size' => 10,
	    'minitems' => 0,
	    'maxitems' => 100,
	    'items' => array(),
	    'allowNonIdValues' => true,
	    'itemsProcFunc' => 'user_filterlist->getListOfAvailableFiltersForTCA',
	)
    ),
);

// help file
t3lib_extMgm::addLLrefForTCAdescr('tx_kesearch_filters', 'EXT:ke_search/locallang_csh.xml');

// Show FlexForm field in plugin configuration
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi2'] = 'pi_flexform';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi3'] = 'pi_flexform';

// Configure FlexForm field
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:ke_search/pi1/flexform_pi1.xml');
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi2', 'FILE:EXT:ke_search/pi2/flexform_pi2.xml');
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi3', 'FILE:EXT:ke_search/pi3/flexform_pi3.xml');

if (TYPO3_VERSION_INTEGER < 6001000) {
	t3lib_div::loadTCA('pages');
	t3lib_div::loadTCA('tt_content');
}

t3lib_extMgm::addTCAcolumns('pages', $tempColumns);
t3lib_extMgm::addToAllTCAtypes('pages', 'tx_kesearch_tags;;;;1-1-1');

if (TYPO3_MODE == 'BE') {
	t3lib_extMgm::addModulePath('web_txkesearchM1', t3lib_extMgm::extPath($_EXTKEY) . 'mod1/');
	t3lib_extMgm::addModule('web', 'txkesearchM1', '', t3lib_extMgm::extPath($_EXTKEY) . 'mod1/');
}

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi2'] = 'layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi3'] = 'layout,select_key';

t3lib_extMgm::addPlugin(array(
    'LLL:EXT:ke_search/locallang_db.xml:tt_content.list_type_pi1',
    $_EXTKEY . '_pi1',
    t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'), 'list_type'
);

t3lib_extMgm::addPlugin(array(
    'LLL:EXT:ke_search/locallang_db.xml:tt_content.list_type_pi2',
    $_EXTKEY . '_pi2',
    t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'), 'list_type'
);

t3lib_extMgm::addPlugin(array(
    'LLL:EXT:ke_search/locallang_db.xml:tt_content.list_type_pi3',
    $_EXTKEY . '_pi3',
    t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'), 'list_type'
);

$TCA['tx_kesearch_filters'] = array(
    'ctrl' => array(
	'title' => 'LLL:EXT:ke_search/locallang_db.xml:tx_kesearch_filters',
	'label' => 'title',
	'tstamp' => 'tstamp',
	'crdate' => 'crdate',
	'cruser_id' => 'cruser_id',
	'languageField' => 'sys_language_uid',
	'transOrigPointerField' => 'l10n_parent',
	'transOrigDiffSourceField' => 'l10n_diffsource',
	'default_sortby' => 'ORDER BY crdate',
	'delete' => 'deleted',
	'type' => 'rendertype',
	'enablecolumns' => array(
	    'disabled' => 'hidden',
	),
	'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
	'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'res/img/table_icons/icon_tx_kesearch_filters.gif',
	'searchFields' => 'title'
    ),
);

$TCA['tx_kesearch_filteroptions'] = array(
    'ctrl' => array(
	'title' => 'LLL:EXT:ke_search/locallang_db.xml:tx_kesearch_filteroptions',
	'label' => 'title',
	'tstamp' => 'tstamp',
	'crdate' => 'crdate',
	'cruser_id' => 'cruser_id',
	'languageField' => 'sys_language_uid',
	'transOrigPointerField' => 'l10n_parent',
	'transOrigDiffSourceField' => 'l10n_diffsource',
	'sortby' => 'sorting',
	'delete' => 'deleted',
	'enablecolumns' => array(
	    'disabled' => 'hidden',
	),
	'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
	'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'res/img/table_icons/icon_tx_kesearch_filteroptions.gif',
	'searchFields' => 'title,tag'
    ),
);

$TCA['tx_kesearch_index'] = array(
    'ctrl' => array(
	'title' => 'LLL:EXT:ke_search/locallang_db.xml:tx_kesearch_index',
	'label' => 'title',
	'tstamp' => 'tstamp',
	'crdate' => 'crdate',
	'cruser_id' => 'cruser_id',
	'default_sortby' => 'ORDER BY crdate',
	'enablecolumns' => array(
	    'starttime' => 'starttime',
	    'endtime' => 'endtime',
	    'fe_group' => 'fe_group',
	),
	'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
	'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'res/img/table_icons/icon_tx_kesearch_index.gif',
    ),
);

// class for displaying the category tree for tt_news in BE forms.
if (t3lib_extMgm::isLoaded('tt_news')) {
	include_once(t3lib_extMgm::extPath('tt_news') . 'lib/class.tx_ttnews_TCAform_selectTree.php');
}

$TCA['tx_kesearch_indexerconfig'] = array(
    'ctrl' => array(
	'title' => 'LLL:EXT:ke_search/locallang_db.xml:tx_kesearch_indexerconfig',
	'label' => 'title',
	'tstamp' => 'tstamp',
	'crdate' => 'crdate',
	'cruser_id' => 'cruser_id',
	'default_sortby' => 'ORDER BY crdate',
	'delete' => 'deleted',
	'enablecolumns' => array(
	    'disabled' => 'hidden',
	),
	'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
	'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'res/img/table_icons/icon_tx_kesearch_indexerconfig.gif',
	'searchFields' => 'title'
    ),
);

if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_kesearch_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'pi1/class.tx_kesearch_pi1_wizicon.php';
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_kesearch_pi2_wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'pi2/class.tx_kesearch_pi2_wizicon.php';
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_kesearch_pi3_wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'pi3/class.tx_kesearch_pi3_wizicon.php';
}
?>
