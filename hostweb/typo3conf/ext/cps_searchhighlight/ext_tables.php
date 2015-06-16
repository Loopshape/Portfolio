<?php

if (!defined ('TYPO3_MODE'))     die ('Access denied.');

//add static template to list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Keyword Highlighting');
?>
