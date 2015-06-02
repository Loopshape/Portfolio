<?
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
$TYPO3_CONF_VARS["FE"]["XCLASS"]["ext/indexed_search/pi/class.tx_indexedsearch.php"]=t3lib_extMgm::extPath("indexed_search_mysql")."class.ux_tx_indexedsearch.php";
?>