.. include:: Images.txt
.. _Step3RunCalIndexer:

==============================
Step 3: Run Cal Indexer
==============================

.. include:: ../../Includes.txt

All demo events are recurring events and must therefore be indexed to show up. This can be easily achieved with the help of the "Cal Indexer" tool.

Select the "Cal Indexer" from the "ADMIN TOOLS" menu.

|adminTools|

You should see the information page of the "Cal Indexer" tool.

Select "Generate" from the dropdown option on the right hand side.

|calIndexerInformation|

The "Cal Indexer" needs three informations to process the recurring instances:

#. **Frontend Page with calendar plugin** - An id of where to find the cal typoscript information.
#. **Start time** - The start of the timeframe to generate an recurring instance of an event.
#. **End time** -  The end of the timeframe to generate an recurring instance of an event.
 
|calIndexerGenerate|

Fill in the pageId "2" into the *Frontend Page with calendar plugin* field. And hit "Start indexing".

You will see the processed events on the next page.

|calIndexerResult|