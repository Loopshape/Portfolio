<?php
$TYPO3_CONF_VARS['EXTCONF']['indexed_search']['pi1_hooks']['getDisplayResults'] = 'EXT:ch_is_templates/pi1/class.tx_ch_gdr.php:tx_ch_gdr';
$TYPO3_CONF_VARS['EXTCONF']['indexed_search']['pi1_hooks']['printResultRow'] = 'EXT:ch_is_templates/pi1/class.tx_ch_prr.php:tx_ch_prr';
$TYPO3_CONF_VARS['EXTCONF']['indexed_search']['pi1_hooks']['getResultRows'] = 'EXT:ch_is_templates/pi1/class.tx_ch_grr.php:tx_ch_grr';
$TYPO3_CONF_VARS["FE"]["XCLASS"]["ext/indexed_search/pi/class.tx_indexedsearch.php"]=t3lib_extMgm::extPath("ch_is_templates")."pi1/class.ux_tx_indexedsearch.php";
?>