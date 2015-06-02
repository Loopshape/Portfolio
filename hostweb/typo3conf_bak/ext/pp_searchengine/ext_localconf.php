<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::addPItoST43($_EXTKEY,'pi1/class.tx_ppsearchengine_pi1.php','_pi1','CType',0);

$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output']['pp_searchengine']='EXT:pp_searchengine/highlight/class.tx_pphighlight.php:tx_pphighlight->highlight';
?>