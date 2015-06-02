
.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Introduction
------------

What does it do?
^^^^^^^^^^^^^^^^

This extension clears the cache of pages specified via TSConfig when records
on other pages which are related to the specified pages get modified/created/deleted.

This is useful when you have a plugin like tt_news for example which sources it's records
from a page defined in the plugin setup.

When you now change some records in the sysfolder where you have located your news records
the news-listing page will not update because its cache didn't get cleared.
Using this extension you can define constraints which will clear the cache of the news
listing page when something was done with the news records on the sysfolder page.

By deafult something similar is supported by TYPO3 out of the box. You can set TS-Config
in a specific branch of the pagetree. When something gets edited inside this branch other
configured pages can get cleared.

This can achieved with the following TS-Config:

    TCEMAIN.clearCacheCmd = pageID1,pageID2

But using this method you can not:
 - Clear the cache only when records of a specific type/table got modified
 - Clear the cache of a page recursively with all subpages.

Using this exentsion you can.

Screenshots
^^^^^^^^^^^

Sorry. No screenshots. This extension works mostly from within TS-Config configuration
which is better shown by examples and/or syntax reference.


