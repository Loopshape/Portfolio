.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt

=====================
Configuration
=====================

Plugin
------------------------

The news event extension adds three additional views. Next to these views, some other settings will work a bit differently comparing to the news system. See the table below for an explanation of these settings:

.. t3-field-list-table::
  :header-rows: 1

  - :Property:
        Property:

    :View:
        View:

    :Description:
        Description:

    :Key:
        Key:


  - :Property:
        What to display

    :View:
        All

    :Description:
        Selection of view:

        - Event List view: List of all news event records which fit the configuration
        - Event Detail view: Shows the complete news event record
        - Event Date menu: Date menu based on the dates (by default years) of news event records

    :Key:
        | -


  - :Property:
        Sort by

    :View:
        None

    :Description:
        Define the sorting of displayed news records.

        **This field will be ignored.** This setting can only be configured by using TypoScript configuration, see the TypoScript reference for more information.

    :Key:
        orderBy

  - :Property:
        Sort direction

    :View:
        None

    :Description:
        | Define the sorting direction which can either be ascending or descending.
        |
        | **This field will be ignored.** Sorting will be handled by the 'Sort by' setting, which can be overridden by using Typoscript configuration, see the TypoScript reference for more information.

    :Key:
        orderDirection


  - :Property:
        Archive

    :View:
        | Event List view,
        | Event Date menu

    :Description:
        | Next to 'No constraint', two modes are available:
        |
        | *Only active (non archived)*
        |   All current and future news event records (based on event dates and time) are shown.
        |
        | *Archived*
        |   All news event records with event dates in the past are shown.
        |
        | *Note:* News (event) records can hold an optional archive date. **This archive date in news event records will be ignored**, and only the archive restriction as described above will be used.
    :Key:
        archiveRestriction


  - :Property:
        Date field to use

    :View:
        Date menu

    :Description:
        The date menu builds a menu by year and month and the given news records.
        **This field will be ignored.** By default the field 'EventStartdate' will be used as dateField, and can be overridden by using TypoScript configuration, see the TypoScript reference for more information.
    :Key:
        dateField

TypoScript reference
--------------------

This section describes additional news system TypoScript settings, which are available for news events.
A simple way to get to know the default settings is to look at the file *EXT:roq_newsevent/Configuration/TypoScript/setup.txt*

News settings (iCal support)
''''''''''''''''''''''''''''
See the table below for the general news settings, used by news event, which are defined by using::

    plugin.tx_news.settings.<property>.

.. t3-field-list-table::
  :header-rows: 1

  - :Property:
        Property:

    :Data type:
        View:

    :Description:
        Description:

    :Default:
        Key:


  - :Property:
        format

    :Data type:
        string

    :Description:
        Set a different format for the output. Use e.g. “ics” for iCalendar “xml” or for RSS feeds.

    :Default:
        html

News event settings
'''''''''''''''''''
See the table below for the specific news event settings, which are defined by using::

    plugin.tx_news.settings.event.<property>.


.. t3-field-list-table::
  :header-rows: 1

  - :Property:
        Property:

    :Data type:
        View:

    :Description:
        Description:

    :Default:
        Key:


  - :Property:
        templateRootPath

    :Data type:
        dir

    :Description:
        Root path for the fluid templates for news event. The plugin has one controller with three actions (named “eventDateMenu”, “eventList” and “eventDetail”).
        Accordingly there have to be at least three fluid templates at the following locations (relative to the template root path):

        - News/EventList.html
        - News/EventDetail.html
        - News/EventDateMenu.html

        Additionally for ICS and RSS/XML support three additional templates also have to at the following locations (also relative to the template root path):

        - News/EventList.ics
        - News/EventDetail.ics
        - News/EventList.xml

    :Default:
        EXT:roq_newsevent/Resources/Private/Templates


  - :Property:
        partialRootPath

    :Data type:
        dir

    :Description:
        Root path for the fluid partials of the plugin. The default Fluid templates use several default partials. If you override the default templates this might become irrelevant.

    :Default:
        EXT:roq_newsevent/Resources/Private/Partials


  - :Property:
        layoutRootPath

    :Data type:
        dir

    :Description:
        Root path for the fluid layouts of the plugin (not used by default)

    :Default:
        *undefined*


Database reference
''''''''''''''''''

This section describes the news event database fields, which are added to the news table 'tx_news_domain_model_news'
to store all event data.

Additional database columns
"""""""""""""""""""""""""""

.. t3-field-list-table::
  :header-rows: 1

  - :Property:
        Property:

    :Data type:
        View:

    :Description:
        Description:


  - :Property:
        tx_roqnewsevent_is_event

    :Data type:
        tinyint(1), unsigned

    :Description:
        Determines if a news record is of type news event

  - :Property:
        tx_roqnewsevent_startdate

    :Data type:
        int(1)

    :Description:
        The event start date


  - :Property:
        tx_roqnewsevent_starttime

    :Data type:
        int(1)

    :Description:
        The event start time


  - :Property:
        tx_roqnewsevent_enddate

    :Data type:
        int(1)

    :Description:
        The event end date (for multiple day events)


  - :Property:
        tx_roqnewsevent_endtime

    :Data type:
        int(1)

    :Description:
        The event end time


  - :Property:
        tx_roqnewsevent_location

    :Data type:
        varchar(255)

    :Description:
        The location of the event