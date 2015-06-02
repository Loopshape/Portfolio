<?php
return array (
  'HDNET\\Autoloader\\Loader\\Hooks' => 
  array (
    0 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|cms/layout/class.tx_cms_layout.php|list_type_Info|calendarize_calendar',
      ),
      'configuration' => 'HDNET\\Calendarize\\Hooks\\CmsLayout->getExtensionSummary',
    ),
    1 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|t3lib/class.t3lib_tcemain.php|processDatamapClass',
      ),
      'configuration' => 'HDNET\\Calendarize\\Hooks\\ProcessDatamapClass',
    ),
    2 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|ext/realurl/class.tx_realurl_autoconfgen.php|extensionConfiguration',
      ),
      'configuration' => 'HDNET\\Calendarize\\Hooks\\RealurlConfiguration->addCalendarizeConfiguration',
    ),
  ),
  'HDNET\\Autoloader\\Loader\\Slots' => 
  array (
    0 => 
    array (
      'signalClassName' => 'TYPO3\\CMS\\Install\\Service\\SqlExpectedSchemaService',
      'signalName' => 'tablesDefinitionIsBeingBuilt',
      'slotClassNameOrObject' => 'HDNET\\Calendarize\\Slots\\Database',
      'slotMethodName' => 'loadCalendarizeTables',
    ),
    1 => 
    array (
      'signalClassName' => 'TYPO3\\CMS\\Extensionmanager\\Utility\\InstallUtility',
      'signalName' => 'tablesDefinitionIsBeingBuilt',
      'slotClassNameOrObject' => 'HDNET\\Calendarize\\Slots\\Database',
      'slotMethodName' => 'updateCalendarizeTables',
    ),
    2 => 
    array (
      'signalClassName' => 'HDNET\\Calendarize\\Domain\\Repository\\IndexRepository',
      'signalName' => 'findBySearchPre',
      'slotClassNameOrObject' => 'HDNET\\Calendarize\\Slots\\EventSearch',
      'slotMethodName' => 'setIdsByCustomSearch',
    ),
  ),
  'HDNET\\Autoloader\\Loader\\SmartObjects' => 
  array (
    0 => 'HDNET\\Calendarize\\Domain\\Model\\Configuration',
    1 => 'HDNET\\Calendarize\\Domain\\Model\\ConfigurationGroup',
    2 => 'HDNET\\Calendarize\\Domain\\Model\\Event',
    3 => 'HDNET\\Calendarize\\Domain\\Model\\Index',
  ),
  'HDNET\\Autoloader\\Loader\\FlexForms' => 
  array (
    0 => 
    array (
      'pluginSignature' => 'calendarize_calendar',
      'path' => 'FILE:EXT:calendarize/Configuration/FlexForms/Calendar.xml',
    ),
  ),
  'HDNET\\Autoloader\\Loader\\CommandController' => 
  array (
    0 => 'HDNET\\Calendarize\\Command\\ReindexCommandController',
  ),
  'HDNET\\Autoloader\\Loader\\StaticTyposcript' => 
  array (
    0 => 
    array (
      'path' => 'Configuration/TypoScript/',
      'title' => 'Calendarize',
    ),
  ),
);
#