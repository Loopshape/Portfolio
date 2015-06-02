<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

// Register the logging method with the appropriate hook
$TYPO3_CONF_VARS['EXTCONF']['lowlevel']['cleanerModules']['tx_' . $_EXTKEY . '_cache'] = array('EXT:' . $_EXTKEY . '/class.tx_' . $_EXTKEY . '_cache.php:tx_' . $_EXTKEY . '_cache');
$TYPO3_CONF_VARS['EXTCONF']['lowlevel']['cleanerModules']['tx_' . $_EXTKEY . '_index'] = array('EXT:' . $_EXTKEY . '/class.tx_' . $_EXTKEY . '_index.php:tx_' . $_EXTKEY . '_index');
?>