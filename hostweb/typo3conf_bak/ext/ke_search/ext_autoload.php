<?php
if (TYPO3_VERSION_INTEGER >= 6002000) {
	$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ke_search');
} else {
	$extensionPath = t3lib_extMgm::extPath('ke_search');
}
return array(
	'tx_kesearch_pi1' => $extensionPath . 'pi1/class.tx_kesearch_pi1.php',
	'tx_kesearch_indexertask' => $extensionPath . 'Classes/Scheduler/class.tx_kesearch_indexertask.php',
	'tx_kesearch_indexer' => $extensionPath . 'Classes/indexer/class.tx_kesearch_indexer.php',
	'tx_kesearch_indexer_types' => $extensionPath . 'Classes/indexer/class.tx_kesearch_indexer_types.php',
	'tx_kesearch_indexer_types_file' => $extensionPath . 'Classes/indexer/types/class.tx_kesearch_indexer_types_file.php',
	'tx_kesearch_indexer_types_page' => $extensionPath . 'Classes/indexer/types/class.tx_kesearch_indexer_types_page.php',
	'tx_kesearch_indexer_types_templavoila' => $extensionPath . 'Classes/indexer/types/class.tx_kesearch_indexer_types_templavoila.php',
	'tx_kesearch_indexer_filetypes' => $extensionPath . 'Classes/indexer/filetypes/interface.tx_kesearch_indexer_filetypes.php',
	'tx_kesearch_indexer_filetypes_pdf' => $extensionPath . 'Classes/indexer/filetypes/class.tx_kesearch_indexer_filetypes_pdf.php',
	'tx_kesearch_indexer_filetypes_ppt' => $extensionPath . 'Classes/indexer/filetypes/class.tx_kesearch_indexer_filetypes_ppt.php',
	'tx_kesearch_indexer_filetypes_doc' => $extensionPath . 'Classes/indexer/filetypes/class.tx_kesearch_indexer_filetypes_doc.php',
	'tx_kesearch_indexer_filetypes_xls' => $extensionPath . 'Classes/indexer/filetypes/class.tx_kesearch_indexer_filetypes_xls.php',
	'tx_kesearch_lib' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib.php',
	'tx_kesearch_lib_div' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib_div.php',
	'tx_kesearch_lib_fileinfo' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib_fileinfo.php',
	'tx_kesearch_lib_searchphrase' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib_searchphrase.php',
	'tx_kesearch_lib_searchresult' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib_searchresult.php',
	'tx_kesearch_lib_sorting' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib_sorting.php',
	'tx_kesearch_lib_filters_textlinks' => $extensionPath . 'Classes/lib/filters/class.tx_kesearch_lib_filters_textlinks.php',
	'tx_kesearch_helper' => $extensionPath . 'Classes/lib/class.tx_kesearch_lib_helper.php',
	'tx_kesearch_db' => $extensionPath . 'Classes/lib/class.tx_kesearch_db.php',
	'tx_kesearch_filters' => $extensionPath . 'Classes/lib/class.tx_kesearch_filters.php',
);
?>
