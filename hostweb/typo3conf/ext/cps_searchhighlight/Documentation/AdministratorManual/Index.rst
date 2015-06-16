.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator manual
====================

.. _hooks:

Hooks
-----

- extension registers a hook for own post-process in fe outputting

::

   $TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['isOutputting']['tx_cpssearchhighlight'] = 'CPSIT\\CpsSearchhighlight\\Hooks\\SearchhighlightProcess->main';

- extension registers a hook for solr result modifier, if solr extension is installed in system

::

   $TYPO3_CONF_VARS['EXTCONF']['solr']['modifyResultDocument']['searchWords'] = 'CPSIT\\CpsSearchhighlight\\Solr\\ResultsModifier\\SearchWords';

Target group: **Administrators**


.. _installation:

Installation
------------
- Download extension from TER and install

- Include static template from extension to your TypoScript template

.. _configuration:

Configuration
-------------
All configuration options are available in TypoScript

.. _plugin-tx-cpssearchhighlight:

plugin.tx\_cpssearchhighlight
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

.. _css-default-style:

\_CSS\_DEFAULT\_STYLE
"""""""""""""""""""""

.. container:: table-row

   Property
         \_CSS\_DEFAULT\_STYLE

   Data type
         string

   Description
         CSS included in the page for highlight formating

   Default
         ::

		.tx-cpssearchhighlight-sword { background-color: yellow; }
		.tx-cpssearchhighlight-sword-1 { background-color: yellow; }
		.tx-cpssearchhighlight-sword-2 { background-color: aqua; }
		.tx-cpssearchhighlight-sword-3 { background-color: lime;}

.. _sword-array:

sword\_array
""""""""""""

.. container:: table-row

   Property
		sword\_array

   Data type
         COA

   Description
         In this configuration part you can add additional possible url params for analyse from url and highlighting.
         You can use full TypoScript functionality

   Example
         ::

		sword_array = COA
		sword_array {
			10 = TEXT
			10 {
				data = GP:tx_ttnews|swords
				split {
					token.char = 32
					cObjNum = 1
					1.current = 1
					1.wrap = |,
					wrap = |
				}
			}
		}

.. _minkeywordlength:

minkeywordlength
""""""""""""""""

.. container:: table-row

   Property
         minkeywordlength

   Data type
         integer

   Description
         Minimum keyword length: Define the minimum length of a keyword to be highlighted

   Default
         ::

		{$plugin.tx_cpssearchhighlight.minkeywordlength}

.. _numberofcolors:

numberofcolors
""""""""""""""

.. container:: table-row

   Property
         numberofcolors

   Data type
         integer

   Descriptionn
   		 Number of different colors: Set the number of different colors (CSS-Styles) to use. Keep in mind that you have to extend the CSS .tx-cpssearchhighlight-sword-X (X stands for the number of the keyword).

   Default
         ::

		{$plugin.tx_cpssearchhighlight.numberofcolors}

.. _differentcolors:

differentcolors
"""""""""""""""

.. container:: table-row

   Property
         differentcolors

   Data type
         boolean

   Descriptionn
   		 Enable different colors for different keywords

   Default
         ::

		{$plugin.tx_cpssearchhighlight.differentcolors}

.. _solr:

Solr Integration
----------------

The extension provides a hook implementation for the ResultModifier in solr.
Function provides integration of solr query words into field row and additional register, so you have access to the search words
in stdWrap function for plugin.tx_solr.search.results.fieldRenderingInstructions.

Example:

::

	plugin.tx_solr.search.results.fieldRenderingInstructions {
   		link_with_params = CASE
		link_with_params {
			key.field = type

			pages = TEXT
			pages {
				value.cObject = TEXT
				value.cObject {
					typolink {
						parameter.field = uid
						returnLast = url
						forceAbsoluteUrl = 1
					}
				}
				typolink {
					parameter.field = uid
					additionalParams.data = register:SWORD_PARAMS
				}
			}

			tx_news_domain_model_news = TEXT
			tx_news_domain_model_news {
				field = title
				typolink {
					parameter = 179
					additionalParams = &tx_news_pi1[controller]=News&tx_news_pi1[action]=detail&tx_news_pi1[news]={field:uid}&{register:SWORD_PARAMS}
					additionalParams.insertData = 1
					useCacheHash = 1
				}
			}
		}
	}

