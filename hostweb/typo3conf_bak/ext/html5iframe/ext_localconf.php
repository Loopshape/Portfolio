<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Iframe',
	array(
		'Iframe' => 'show',
		
	),
	array(
		'Iframe' => 'show',
		
	)
);

?>