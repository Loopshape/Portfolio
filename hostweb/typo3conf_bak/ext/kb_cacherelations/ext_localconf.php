<?php
defined('TYPO3_MODE') or die('Access denied.');

if (TYPO3_MODE=='BE')	{
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = 'ThinkopenAt\KbCacherelations\DataHandlerHook';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'ThinkopenAt\KbCacherelations\DataHandlerHook';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['moveRecordClass'][] = 'ThinkopenAt\KbCacherelations\DataHandlerHook';
}

