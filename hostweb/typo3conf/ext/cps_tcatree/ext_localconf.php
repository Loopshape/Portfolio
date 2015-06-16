<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// register Ajax scripts
$TYPO3_CONF_VARS['BE']['AJAX']['tceFormsItemTree::expandCollapse'] = t3lib_extMgm::extPath('cps_tcatree') . 'class.tx_cpstcatree.php:tx_cpstcatree->ajaxExpandCollapse';
?>