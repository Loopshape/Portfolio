<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if ('FE' === TYPO3_MODE) {
    $GLOBALS['TYPO3_CONF_VARS']['FE']['jsConcatenateHandler'] = 'Serfhos\\MyMinifier\\Handler\\CompressionHandler->compressJavascript';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cssConcatenateHandler'] = 'Serfhos\\MyMinifier\\Handler\\CompressionHandler->compressCss';
}