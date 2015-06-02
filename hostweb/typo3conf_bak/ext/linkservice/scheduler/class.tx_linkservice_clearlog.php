<?php

class tx_linkservice_clearlog extends tx_scheduler_Task {
    // The configuration from ext_conf_template.txt
    protected $extConf;

    public function execute() {
        $this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['linkservice']);
        $GLOBALS['TYPO3_DB']->exec_DELETEquery('tx_linkservice_log', 'checktime < '.(time() - 3600 * $this->extConf['log_retention']));

				return true;
    }
}

