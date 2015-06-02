<?php
$SOBE = t3lib_div::makeInstance('tx_linkservice_module');
$SOBE->init();
$SOBE->main();
$SOBE->printContent();
