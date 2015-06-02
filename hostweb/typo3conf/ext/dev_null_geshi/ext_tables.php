<?php
if (!defined ('TYPO3_MODE'))
	die ('Access denied.');

if (TYPO3_MODE=="BE") {
	include_once(TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'class.tx_devnullgeshi_addFieldsToFlexForm.php');
}

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
	'LLL:EXT:dev_null_geshi/Resources/Private/Language/locallang_be.xml:pi1_title',
	$_EXTKEY.'_pi1',
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'),
'list_type');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY.'/pi1/flexform.xml');

if (TYPO3_MODE=="BE") {
	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_devnullgeshi_pi1_wizicon"] = TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."pi1/class.tx_devnullgeshi_pi1_wizicon.php";
}

?>
