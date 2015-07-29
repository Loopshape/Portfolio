=========================================================================
Feature: #56644 - Hook for InlineRecordContainer::checkAccess()
=========================================================================

Description
===========

Hook to post-process ``InlineRecordContainer::checkAccess``
result. ``InlineRecordContainer::checkAccess`` is used to check
the access to related inline records. It's implemented in the same way to
the hook $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/alt_doc.php']['makeEditForm_accessCheck']
in the EditDocumentController.

Register like this:

.. code-block:: php

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms_inline.php']['checkAccess'][] = 'My\\Package\\HookClass->hookMethod';