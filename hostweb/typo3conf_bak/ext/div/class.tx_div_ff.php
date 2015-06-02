<?php

class tx_div_ff extends \Spin\Div\TxDivFF {
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/div/class.tx_div_ff.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/div/class.tx_div_ff.php']);
}
?>
