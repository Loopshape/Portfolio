.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt
.. index:: TypoScript Example

TypoScript Example
------------------

All configuration of the minifier can be done via the constant editor (“PLUGIN.MYMINIFIER”)
Certainly you also can set the configuration directly via TypoScript setup/constants.

Here is an example of a TypoScript setup/constants:

via constants:
::

    my_minifier {
        minimizeJs = 1
        minimizeCss = 0
    }

via setup:
::

    config.my_minifier {
        minimizeJs = 1
        minimizeCss = 0
    }

via PAGE specific configuration:
::

    page.config.my_minifier {
        minimizeJs = 1
        minimizeCss = 0
    }


Specific file include configuration to exclude minimization:
::

    page.includeJSlibs {
        # jQuery CDN library
        jquery_lib = //code.jquery.com/jquery-1.10.2.min.js
        jquery_lib {
            external = 1
            forceOnTop = 1
            disableCompression = 1
            excludeFromConcatenation = 1
            disableMinimization = 1
        }
    }