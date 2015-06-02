<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

/**
 * Example of how to configure a class for extension of another class:
 */


#**************   here the original PHP-Class is extended:
#   ##extensionkey## must be replaced by extension-key of the original extension (starts with "tx_" if it is a user extension)
$TYPO3_CONF_VARS["FE"]["XCLASS"]["ext/indexed_search/pi/class.tx_indexedsearch.php"]=t3lib_extMgm::extPath($_EXTKEY)."class.ux_tx_indexedsearch.php";

$TYPO3_CONF_VARS["FE"]["XCLASS"]["tslib/class.tslib_content.php"] = t3lib_extMgm::extPath($_EXTKEY)."class.ux_tslib_cObj.php";

?>