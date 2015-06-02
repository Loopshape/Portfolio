<?php
return array (
  'HDNET\\Autoloader\\Loader\\Hooks' => 
  array (
    0 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|BackendLayoutDataProvider',
      ),
      'configuration' => 'HDNET\\Autoloader\\Hooks\\BackendLayoutProvider',
    ),
    1 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|additionalBackendItems|cacheActions',
      ),
      'configuration' => 'HDNET\\Autoloader\\Hooks\\ClearCache',
    ),
    2 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|cms/layout/class.tx_cms_layout.php|tt_content_drawItem',
      ),
      'configuration' => 'HDNET\\Autoloader\\Hooks\\ElementBackendPreview',
    ),
    3 => 
    array (
      'locations' => 
      array (
        0 => 'TYPO3_CONF_VARS|SC_OPTIONS|GLOBAL|extTablesInclusion-PostProcessing',
      ),
      'configuration' => 'HDNET\\Autoloader\\Hooks\\RegisterAspect',
    ),
  ),
  'HDNET\\Autoloader\\Loader\\Slots' => 
  array (
    0 => 
    array (
      'signalClassName' => 'TYPO3\\CMS\\Install\\Service\\SqlExpectedSchemaService',
      'signalName' => 'tablesDefinitionIsBeingBuilt',
      'slotClassNameOrObject' => 'HDNET\\Autoloader\\Slots\\SmartDatabase',
      'slotMethodName' => 'loadSmartObjectTables',
    ),
    1 => 
    array (
      'signalClassName' => 'TYPO3\\CMS\\Extensionmanager\\Utility\\InstallUtility',
      'signalName' => 'tablesDefinitionIsBeingBuilt',
      'slotClassNameOrObject' => 'HDNET\\Autoloader\\Slots\\SmartDatabase',
      'slotMethodName' => 'updateSmartObjectTables',
    ),
  ),
  'HDNET\\Autoloader\\Loader\\StaticTyposcript' => 
  array (
    0 => 
    array (
      'path' => 'Configuration/TypoScript/BackendLayouts/',
      'title' => 'Autoloader - BackendLayouts',
    ),
  ),
);
#