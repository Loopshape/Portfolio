.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt

=====================
User's manual
=====================

About news event records
------------------------

The records can be created on any page, however it is recommended to create a seperate sysfolder for news event records (next to a sysfolder in which you store your news records).

See the Tutorial section for more information about how to use the news event extension.

News event records
,,,,,,,,,,,,,,,,,,

.. t3-field-list-table::
  :header-rows: 1

  - :Field:
        Field:

    :Description:
        Description:

    :Required:
        Required:


  - :Field:
        Is event

    :Description:
        Mark a news records as an event. If this has been enabled, the news record will be recognized as an news event record.

    :Required:
        No


  - :Field:
        Start date

    :Description:
        Start date of the event.

        Note: If the start date has been left empty or undefined, the event will not be visible in the frontend.

    :Required:
        Yes


  - :Field:
        Start time

    :Description:
        Start time of the event.

    :Required:
        No


  - :Field:
        End date

    :Description:
        End date of the event. This makes an event multiple days unless this date is the same as the start date. In this case you don't have to define the end date.

    :Required:
        No


  - :Field:
        End time

    :Description:
        End time of a the event.

    :Required:
        No


  - :Field:
     Location

    :Description:
     Location where the event takes place. For instance: Washington D.C.

    :Required:
     No
