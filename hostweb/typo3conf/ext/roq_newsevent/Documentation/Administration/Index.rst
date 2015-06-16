.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt

=====================
Administration
=====================

Archiving
------------------------

News records are archived by using the archive date restriction or time restriction settings. These settings are not used
for news events records, and archiving for events works a bit differently. Events which are current or will occur in the
future (based on the event data) are known as 'active', and all past events are known as 'archived'. You must select
either 'active' or 'archived' when configuring an added news plugin for news events. See the section Configuration →
Plugin for more information.

RSS
------------------------

News event supports RSS feeds, which is handled like an event list view plugin. You can create an RSS feed exactly the
same as adding an RSS feed for News. See the manual for the news system extension for more information. The default
template for the output is stored in: Resources/Private/Templates/News/EventList.xml.
The xml file type is achieved by setting::

    plugin.tx_news.settings.format = xml

iCalendar (ICS)
---------------------------
Next to RSS, the news event extension also supports the iCalendar (ICS) format. See: http://en.wikipedia.org/wiki/ICalendar for more information about the iCalendar format.
The news event extension comes with two default ICS templates:

- For listing all events (like the Event List view), which is located in: *Resources/Private/Templates/News/EventList.ics*;
- per single event (like the Event Detail view), which is located in: *Resources/Private/Templates/News/EventDetail.ics*.

Both default templates use the same partial, which is located at: Resources/Private/Partials/Events/Item.ics

ICS support by embedding the plugin with TypoScript
'''''''''''''''''''''''''''''''''''''''''''''''''''
This section describes how you can create an ICS page for all and/or single events on your website by using TypoScript.

ICS for all events
""""""""""""""""""
See the TypoScript below as an example in which all active events are shown::

    page = PAGE
    page {
        typeNum = 9828
        10 < tt_content.list.20.news_pi1
        10 {
            switchableControllerActions {
            News {
                1 = eventList
            }
        }
        settings {
            format = ics
            archiveRestriction = active
            startingpoint = [sysFolderID]
        }
    }
    config {
        disableAllHeaderCode = 1
        xhtml_cleaning = none
        admPanel = 0
        disablePrefixComment = 1
        metaCharset = utf-8
        additionalHeaders = Content-Type:text/calendar;charset=utf-8
    }

As shown in the TypoScript above a the string Content-Type:text/calendar;charset=utf-8 will be added to the HTTP header with the additionalHeaders setting, which causes the ICS page to be interpret as an iCalendar file.
Because of this, the ICS data can be included directly into the website user's local calendar (like Apple iCal, Google Calendar, Microsoft Outlook etc.). Depending on the browser, the website user will be prompted with a pop-up box if the current event should be added to his or her local calendar.

ICS for single events
"""""""""""""""""""""
If you want to create a single ICS per event, you can use the same TypoScript code as above, but you'll need to set the controller action to eventDetail instead of eventList::

    SwitchableControllerActions {
        News {
            1 = eventDetail
        }
    }

You could include a typolink to a single event ICS on your single event matching the corresponding event, so that a visitor can add the event directly to his or her local calendar.

RealURL configuration for ICS
"""""""""""""""""""""""""""""
If you use RealURL for speaking URL's, you can include the following code in your RealURL configuration for your ICS pages::

    $TYPO3_CONF_VARS['EXTCONF']['realurl'] = array(
        '_DEFAULT' => array(
            'fileName' => array(
                'defaultToHTMLsuffixOnPrev' => true,
                    'index' => array(
                        'eventlist.ics' => array(
                            'keyValues' => array(
                                'type' => 9828,
                            ),
                        ),
                        'event.ics' => array(
                            'keyValues' => array(
                            'type' => 9829,
                        ),
                    ),
                ),
            ),
        ),
    );

Please make sure that the type matches the corresponding typeNum defined in your TypoScript. In this exampe the
types 9828 and 9829 are used, but of course you can use your own type numbers. This is also applicable to the name of
the pages, which are eventlist.ics and event.ics.