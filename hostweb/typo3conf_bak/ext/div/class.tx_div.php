<?php

class tx_div extends \Spin\Div\TxDiv {
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/div/class.tx_div.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/div/class.tx_div.php']);
}
?>
