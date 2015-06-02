<?php
if(!defined('TYPO3_MODE')){
    die('Access denied.');
}


/***************
 * Make the extension configuration accessible
 */
if(!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])){
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}


/***************
 * Use RealUrl Config from Bootstrap Package
 */
//if($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['UseRealUrlConfig'] == 1){
    @include_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY,'Configuration/RealURL/default.php'));
//}