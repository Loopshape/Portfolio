<?php
$TYPO3_CONF_VARS['EXTCONF']['indexed_search']['pi1_hooks']['getDisplayResults'] = 'EXT:is_ts_tmpl/pi1/class.tx_ists_gdr.php:tx_ists_gdr';
$TYPO3_CONF_VARS["FE"]["XCLASS"]["ext/indexed_search/pi/class.tx_indexedsearch.php"]=t3lib_extMgm::extPath("is_ts_tmpl")."pi1/class.ux_tx_indexedsearch.php";
?>