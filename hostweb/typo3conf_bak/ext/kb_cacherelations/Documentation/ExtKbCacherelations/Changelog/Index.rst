
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


Changelog
---------

+---------+----------------------+-------------------------------------------------------+
| Version | Date                 | Changelog                                             |
+=========+======================+=======================================================+
| 0.0.1   | 2006-02-07           | - Initial internal release                            |
+---------+----------------------+-------------------------------------------------------+
| 0.0.1   | 2006-03-11           | - Added support for the "*" operator for target pages |
|         |                      |   (pages to be cleared) which means that the cache of |
|         |                      |   the set page and all subpages should get cleared.   |
|         |                      |   (Recursion)                                         |
|         |                      | - It is also possible to give the depth of the        |
|         |                      |   recursion.                                          |
+---------+----------------------+-------------------------------------------------------+
| 0.1.0   | 2014-11-12           | - Created TYPO3 6.2 compatibility                     |
|         |                      | - First official release to TER                       |
+---------+----------------------+-------------------------------------------------------+
| 0.1.1   | 2015-05-29           | - Changed extension to 6.2 style by removing all      |
|         |                      |   calls to old non-namespaced classes.                |
|         |                      | - Improved method documentations                      |
|         |                      | - Created online documentation (ReST)                 |
+---------+----------------------+-------------------------------------------------------+

.. note:: If you find any bug please report them to office@think-open.at.

