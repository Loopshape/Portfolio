<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

if (TYPO3_MODE=="BE")	{
	t3lib_extMgm::insertModuleFunction(
		"web_func",		
		"tx_ccsetsearch_modfunc1",
		t3lib_extMgm::extPath($_EXTKEY)."modfunc1/class.tx_ccsetsearch_modfunc1.php",
		"LLL:EXT:cc_setsearch/locallang_db.php:moduleFunction.tx_ccsetsearch_modfunc1",
		"wiz"	
	);
}

?>