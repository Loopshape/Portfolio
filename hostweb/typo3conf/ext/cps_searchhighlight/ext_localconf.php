<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

//include and register own post-process hook class for processing of search highlighting
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['isOutputting']['tx_cpssearchhighlight'] = 'CPSIT\\CpsSearchhighlight\\Hooks\\SearchhighlightProcess->main';

//include and register own post-process hook class to get solr search terms as register
if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extconf']['solr'])) {
	$TYPO3_CONF_VARS['EXTCONF']['solr']['modifyResultDocument']['searchWords'] = 'CPSIT\\CpsSearchhighlight\\Solr\\ResultsModifier\\SearchWords';
}
?>
