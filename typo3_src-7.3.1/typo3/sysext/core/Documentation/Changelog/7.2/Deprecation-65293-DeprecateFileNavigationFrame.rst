=================================================================
Deprecation: #65293 - Deprecate file navigation frame entry point
=================================================================

Description
===========

The following entry point has been marked as deprecated:

* typo3/alt_file_navframe.php


Impact
======

Using this entry point in a backend module will throw a deprecation message.


Migration
=========

Use ``\TYPO3\CMS\Backend\Utility\BackendUtility::getModuleUrl()`` instead with the according module name.

``typo3/alt_file_navframe.php`` will have to be refactored to ``\TYPO3\CMS\Backend\Utility\BackendUtility::getModuleUrl('file_navframe')``