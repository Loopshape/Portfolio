<?php
if (!defined ('TYPO3_MODE')){
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Iframe',
	'html5iframe'
);


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'HTML5 Iframe Extension');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_iframe']='layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_iframe'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_iframe','FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_iframe.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_iframes_domain_model_iframe', 'EXT:iframes/Resources/Private/Language/locallang_csh_tx_html5iframe_domain_model_iframe.xml');

?>