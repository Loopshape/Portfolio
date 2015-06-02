<?php
$extensionPath = t3lib_extMgm::extPath('linkservice');
return array(
	'tx_linkservice_linkrefresh' => $extensionPath . 'scheduler/class.tx_linkservice_linkrefresh.php',
	'tx_linkservice_clearlog' => $extensionPath . 'scheduler/class.tx_linkservice_clearlog.php',
	'tx_linkservice_httpheadquery' => $extensionPath . 'lib/class.tx_linkservice_httpheadquery.php',
    'tx_linkservice_httpresponse' => $extensionPath . 'lib/class.tx_linkservice_httpresponse.php',
    'tx_linkservice_reportquery' => $extensionPath . 'lib/class.tx_linkservice_reportquery.php',
    'tx_linkservice_module' => $extensionPath . 'mod/class.tx_linkservice_module.php',
);
