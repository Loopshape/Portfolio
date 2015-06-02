<?php
if (!defined("TYPO3_MODE")) {
	die("Access denied.");
}

if (TYPO3_MODE == 'FE') {
	/**
	 * Hook for HTML-modification on the page
	 */
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = 'HTML\\Sourceopt\\User\\FrontendHook->cleanUncachedContent';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = 'HTML\\Sourceopt\\User\\FrontendHook->cleanCachedContent';
}
