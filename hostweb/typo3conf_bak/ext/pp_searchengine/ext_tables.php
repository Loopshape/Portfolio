<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types'][$_EXTKEY.'_pi1']['showitem']='CType;;4;button;1-1-1, header;;3;;2-2-2,tx_ppsearchengine_isengine;LLL:EXT:pp_searchengine/locallang_db.php:tt_content.tx_ppsearchengine_isengine.pp_searchengine;;;';
$TCA['tt_content']['ctrl']['typeicons'][$_EXTKEY.'_pi1'] = '../typo3conf/ext/'.$_EXTKEY.'/tt_content_ppico.gif';

t3lib_extMgm::addPlugin(Array('LLL:EXT:pp_searchengine/locallang_db.php:tt_content.CType_pi1', $_EXTKEY.'_pi1'),'CType');
t3lib_extMgm::addStaticFile($_EXTKEY,'tt_content_engine','tt_content search engine');

$tempColumns = Array (
	'tx_ppsearchengine_isengine' => Array (        
		'exclude' => 1,        
		'label' => 'LLL:EXT:pp_searchengine/locallang_db.php:tt_content.tx_ppsearchengine_isengine',        
		'config' => Array (
			'type' => 'check',
		)
	),
);
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);

?>