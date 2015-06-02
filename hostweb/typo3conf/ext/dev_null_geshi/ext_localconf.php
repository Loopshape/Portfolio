<?php
if (!defined ('TYPO3_MODE'))
 	die ('Access denied.');

// for cache remove for debug / testing
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY,'pi1/class.tx_devnullgeshi_pi1.php','_pi1','list_type',1);

$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_devnullgeshi_evalhighlight'] = 'EXT:dev_null_geshi/pi1/class.tx_devnullgeshi_evalhighlight.php';
?>
