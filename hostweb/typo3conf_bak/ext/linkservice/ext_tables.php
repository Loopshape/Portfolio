<?php

if (TYPO3_MODE == 'BE') {
        t3lib_extMgm::addModule('web', 'txlinkserviceM1', '', t3lib_extMgm::extPath($_EXTKEY) . 'mod/');
}
