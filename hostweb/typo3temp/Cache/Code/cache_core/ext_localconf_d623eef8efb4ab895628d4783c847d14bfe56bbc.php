<?php
/**
 * Compiled ext_localconf.php cache file
 */

global $TYPO3_CONF_VARS, $T3_SERVICES, $T3_VAR;

/**
 * Extension: core
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/core/ext_localconf.php
 */

$_EXTKEY = 'core';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	$signalSlotDispatcher->connect(
		\TYPO3\CMS\Core\Resource\ResourceFactory::class,
		\TYPO3\CMS\Core\Resource\ResourceFactoryInterface::SIGNAL_PostProcessStorage,
		\TYPO3\CMS\Core\Resource\Security\StoragePermissionsAspect::class,
		'addUserPermissionsToStorage'
	);
	$signalSlotDispatcher->connect(
		'PackageManagement',
		'packagesMayHaveChanged',
		\TYPO3\CMS\Core\Package\PackageManager::class,
		'scanAvailablePackages'
	);
}

$signalSlotDispatcher->connect(
	\TYPO3\CMS\Core\Resource\ResourceStorage::class,
	\TYPO3\CMS\Core\Resource\ResourceStorageInterface::SIGNAL_PostFileDelete,
	\TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect::class,
	'removeFromRepository'
);

$signalSlotDispatcher->connect(
	\TYPO3\CMS\Core\Resource\ResourceStorage::class,
	\TYPO3\CMS\Core\Resource\ResourceStorageInterface::SIGNAL_PostFileAdd,
	\TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect::class,
	'cleanupProcessedFilesPostFileAdd'
);

$signalSlotDispatcher->connect(
	\TYPO3\CMS\Core\Resource\ResourceStorage::class,
	\TYPO3\CMS\Core\Resource\ResourceStorageInterface::SIGNAL_PostFileReplace,
	\TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect::class,
	'cleanupProcessedFilesPostFileReplace'
);

if (!\TYPO3\CMS\Core\Core\Bootstrap::usesComposerClassLoading()) {
	$bootstrap = \TYPO3\CMS\Core\Core\Bootstrap::getInstance();
	$classAliasMap = $bootstrap->getEarlyInstance(\TYPO3\CMS\Core\Core\ClassAliasMap::class);
	$signalSlotDispatcher->connect(
		\TYPO3\CMS\Extensionmanager\Service\ExtensionManagementService::class,
		'hasInstalledExtensions',
		$classAliasMap,
		'buildStaticMappingFile'
	);

	$signalSlotDispatcher->connect(
		\TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
		'afterExtensionUninstall',
		$classAliasMap,
		'buildStaticMappingFile'
	);
	unset($bootstrap, $classAliasMap);
}

unset($signalSlotDispatcher);

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['dumpFile'] = 'EXT:core/Resources/PHP/FileDumpEID.php';

/** @var \TYPO3\CMS\Core\Resource\Rendering\RendererRegistry $rendererRegistry */
$rendererRegistry = \TYPO3\CMS\Core\Resource\Rendering\RendererRegistry::getInstance();
$rendererRegistry->registerRendererClass(\TYPO3\CMS\Core\Resource\Rendering\AudioTagRenderer::class);
$rendererRegistry->registerRendererClass(\TYPO3\CMS\Core\Resource\Rendering\VideoTagRenderer::class);

$textExtractorRegistry = \TYPO3\CMS\Core\Resource\TextExtraction\TextExtractorRegistry::getInstance();
$textExtractorRegistry->registerTextExtractor(\TYPO3\CMS\Core\Resource\TextExtraction\PlainTextExtractor::class);


/**
 * Extension: backend
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/backend/ext_localconf.php
 */

$_EXTKEY = 'backend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)->connect(
		\TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider::class,
		\TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider::SIGNAL_PostProcessTreeData,
		\TYPO3\CMS\Backend\Security\CategoryPermissionsAspect::class,
		'addUserPermissionsToCategoryTreeData'
	);

	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = \TYPO3\CMS\Backend\Backend\ToolbarItems\ClearCacheToolbarItem::class;
	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = \TYPO3\CMS\Backend\Backend\ToolbarItems\HelpToolbarItem::class;
	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = \TYPO3\CMS\Backend\Backend\ToolbarItems\LiveSearchToolbarItem::class;
	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = \TYPO3\CMS\Backend\Backend\ToolbarItems\ShortcutToolbarItem::class;
	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = \TYPO3\CMS\Backend\Backend\ToolbarItems\SystemInformationToolbarItem::class;
	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = \TYPO3\CMS\Backend\Backend\ToolbarItems\UserToolbarItem::class;
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tsfebeuserauth.php']['frontendEditingController']['default'] = \TYPO3\CMS\Core\FrontendEditing\FrontendEditingController::class;


/**
 * Extension: extensionmanager
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_localconf.php
 */

$_EXTKEY = 'extensionmanager';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register extension list update task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Extensionmanager\Task\UpdateExtensionListTask::class] = array(
	'extension' => $_EXTKEY,
	'title' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:task.updateExtensionListTask.name',
	'description' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:task.updateExtensionListTask.description',
	'additionalFields' => '',
);

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \TYPO3\CMS\Extensionmanager\Command\ExtensionCommandController::class;
	if (!(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
		$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
		$signalSlotDispatcher->connect(
			\TYPO3\CMS\Extensionmanager\Service\ExtensionManagementService::class,
			'willInstallExtensions',
			\TYPO3\CMS\Core\Package\PackageManager::class,
			'scanAvailablePackages'
		);
		$signalSlotDispatcher->connect(
			\TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
			'tablesDefinitionIsBeingBuilt',
			\TYPO3\CMS\Core\Cache\Cache::class,
			'addCachingFrameworkRequiredDatabaseSchemaToTablesDefinition'
		);
		$signalSlotDispatcher->connect(
			\TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
			'tablesDefinitionIsBeingBuilt',
			\TYPO3\CMS\Core\Category\CategoryRegistry::class,
			'addExtensionCategoryDatabaseSchemaToTablesDefinition'
		);
	}

}


/**
 * Extension: frontend
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/frontend/ext_localconf.php
 */

$_EXTKEY = 'frontend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'FE' && !isset($_REQUEST['eID'])) {
	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)->connect(
		\TYPO3\CMS\Core\Resource\Index\MetaDataRepository::class,
		'recordPostRetrieval',
		\TYPO3\CMS\Frontend\Aspect\FileMetadataOverlayAspect::class,
		'languageAndWorkspaceOverlay'
	);
}

if (TYPO3_MODE === 'FE') {

	// Register eID provider for showpic
	$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['tx_cms_showpic'] = 'EXT:frontend/Resources/PHP/Eid/ShowPic.php';
	// Register eID provider for ExtDirect for the frontend
	$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['ExtDirect'] = 'EXT:frontend/Resources/PHP/Eid/ExtDirect.php';

	// Register all available content objects
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], array(
		'TEXT'             => \TYPO3\CMS\Frontend\ContentObject\TextContentObject::class,
		'CASE'             => \TYPO3\CMS\Frontend\ContentObject\CaseContentObject::class,
		'COA'              => \TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayContentObject::class,
		'COA_INT'          => \TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayInternalContentObject::class,
		'USER'             => \TYPO3\CMS\Frontend\ContentObject\UserContentObject::class,
		'USER_INT'         => \TYPO3\CMS\Frontend\ContentObject\UserInternalContentObject::class,
		'FILE'             => \TYPO3\CMS\Frontend\ContentObject\FileContentObject::class,
		'FILES'            => \TYPO3\CMS\Frontend\ContentObject\FilesContentObject::class,
		'IMAGE'            => \TYPO3\CMS\Frontend\ContentObject\ImageContentObject::class,
		'IMG_RESOURCE'     => \TYPO3\CMS\Frontend\ContentObject\ImageResourceContentObject::class,
		'CONTENT'          => \TYPO3\CMS\Frontend\ContentObject\ContentContentObject::class,
		'RECORDS'          => \TYPO3\CMS\Frontend\ContentObject\RecordsContentObject::class,
		'HMENU'            => \TYPO3\CMS\Frontend\ContentObject\HierarchicalMenuContentObject::class,
		'LOAD_REGISTER'    => \TYPO3\CMS\Frontend\ContentObject\LoadRegisterContentObject::class,
		'RESTORE_REGISTER' => \TYPO3\CMS\Frontend\ContentObject\RestoreRegisterContentObject::class,
		'TEMPLATE'         => \TYPO3\CMS\Frontend\ContentObject\TemplateContentObject::class,
		'FLUIDTEMPLATE'    => \TYPO3\CMS\Frontend\ContentObject\FluidTemplateContentObject::class,
		'SVG'              => \TYPO3\CMS\Frontend\ContentObject\ScalableVectorGraphicsContentObject::class,
		'EDITPANEL'        => \TYPO3\CMS\Frontend\ContentObject\EditPanelContentObject::class
	));
}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocView = 1
	options.saveDocNew = 1
	options.saveDocNew.pages = 0
	options.saveDocNew.sys_file = 0
	options.disableDelete.sys_file = 1
');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement {
	renderMode = tabs
	wizardItems {
		common.header = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common
		common.elements {
			header {
				icon = gfx/c_wiz/regular_header.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_headerOnly_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_headerOnly_description
				tt_content_defValues {
					CType = header
				}
			}
			text {
				icon = gfx/c_wiz/regular_text.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_regularText_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_regularText_description
				tt_content_defValues {
					CType = text
				}
			}
			textpic {
				icon = gfx/c_wiz/text_image_right.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_textImage_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_textImage_description
				tt_content_defValues {
					CType = textpic
					imageorient = 17
				}
			}
			image {
				icon = gfx/c_wiz/images_only.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_imagesOnly_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_imagesOnly_description
				tt_content_defValues {
					CType = image
				}
			}
			bullets {
				icon = gfx/c_wiz/bullet_list.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_bulletList_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_bulletList_description
				tt_content_defValues {
					CType = bullets
				}
			}
			table {
				icon = gfx/c_wiz/table.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_table_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:common_table_description
				tt_content_defValues {
					CType = table
				}
			}

		}
		common.show = header,text,textpic,image,bullets,table

		special.header = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special
		special.elements {
			uploads {
				icon = gfx/c_wiz/filelinks.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_filelinks_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_filelinks_description
				tt_content_defValues {
					CType = uploads
				}
			}
			menu {
				icon = gfx/c_wiz/sitemap2.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_menus_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_menus_description
				tt_content_defValues {
					CType = menu
					menu_type = 0
				}
			}
			html {
				icon = gfx/c_wiz/html.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_plainHTML_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_plainHTML_description
				tt_content_defValues {
					CType = html
				}
			}
			div {
				icon = gfx/c_wiz/div.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_divider_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_divider_description
				tt_content_defValues {
					CType = div
				}
			}
			shortcut {
				icon = gfx/c_wiz/shortcut.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_shortcut_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:special_shortcut_description
				tt_content_defValues {
					CType = shortcut
				}
			}

		}
		special.show = uploads,menu,html,div,shortcut

		# dummy placeholder for forms group
		forms.header = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms

		plugins.header = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:plugins
		plugins.elements {
			general {
				icon = gfx/c_wiz/user_defined.gif
				title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:plugins_general_title
				description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:plugins_general_description
				tt_content_defValues.CType = list
			}
		}
		plugins.show = *
	}
}

');

// Registering hooks for the treelist cache
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = \TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['moveRecordClass'][] = \TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks::class;

// Register search keys
$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['page'] = 'pages';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['content'] = 'tt_content';

// Register hook to show preview info
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['hook_previewInfo']['cms'] = \TYPO3\CMS\Frontend\Hooks\FrontendHooks::class . '->hook_previewInfo';


/**
 * Extension: extbase
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/extbase/ext_localconf.php
 */

$_EXTKEY = 'extbase';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// We set the default implementation for Storage Backend & Query Settings in Backend and Frontend.
// The code below is NO PUBLIC API!
/** @var $extbaseObjectContainer \TYPO3\CMS\Extbase\Object\Container\Container */
$extbaseObjectContainer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class);
// Singleton
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\QueryInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\Query::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\BackendInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbBackend::class);
$extbaseObjectContainer->registerImplementation(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class, \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
unset($extbaseObjectContainer);

// Register type converters
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\ArrayConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\BooleanConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FloatConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\IntegerConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\ObjectStorageConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\ObjectConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\StringConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\CoreTypeConverter::class);
// Experimental FAL<->extbase converters
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FileConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FileReferenceConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FolderBasedFileCollectionConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\StaticFileCollectionConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\TYPO3\CMS\Extbase\Property\TypeConverter\FolderConverter::class);

if (TYPO3_MODE === 'BE') {
	// registers Extbase at the cli_dispatcher with key "extbase".
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['extbase'] = array(
		'EXT:extbase/Scripts/CommandLineLauncher.php',
		'_CLI_lowlevel'
	);
	// register help command
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \TYPO3\CMS\Extbase\Command\HelpCommandController::class;
}


/**
 * Extension: install
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/install/ext_localconf.php
 */

$_EXTKEY = 'install';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// TYPO3 CMS 7
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['backendUserStartModule'] = \TYPO3\CMS\Install\Updates\BackendUserStartModuleUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['languageIsoCode'] = \TYPO3\CMS\Install\Updates\LanguageIsoCodeUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['PageShortcutParent'] = \TYPO3\CMS\Install\Updates\PageShortcutParentUpdate::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['backendShortcuts'] = \TYPO3\CMS\Install\Updates\MigrateShortcutUrlsUpdate::class;

$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
	\TYPO3\CMS\Install\Service\SqlExpectedSchemaService::class,
	'tablesDefinitionIsBeingBuilt',
	\TYPO3\CMS\Install\Service\CachingFrameworkDatabaseSchemaService::class,
	'addCachingFrameworkRequiredDatabaseSchemaToTablesDefinition'
);
$signalSlotDispatcher->connect(
	\TYPO3\CMS\Install\Service\SqlExpectedSchemaService::class,
	'tablesDefinitionIsBeingBuilt',
	\TYPO3\CMS\Core\Category\CategoryRegistry::class,
	'addCategoryDatabaseSchemaToTablesDefinition'
);


/**
 * Extension: lang
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/lang/ext_localconf.php
 */

$_EXTKEY = 'lang';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register language update command controller
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = \TYPO3\CMS\Lang\Command\LanguageCommandController::class;


/**
 * Extension: saltedpasswords
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/saltedpasswords/ext_localconf.php
 */

$_EXTKEY = 'saltedpasswords';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Form evaluation function for fe_users
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['TYPO3\\CMS\\Saltedpasswords\\Evaluation\\FrontendEvaluator'] = 'EXT:saltedpasswords/Classes/Evaluation/FrontendEvaluator.php';
// Form evaluation function for be_users
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['TYPO3\\CMS\\Saltedpasswords\\Evaluation\\BackendEvaluator'] = 'EXT:saltedpasswords/Classes/Evaluation/BackendEvaluator.php';

// Hook for processing "forgotPassword" in felogin
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['password_changed'][] = \TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::class . '->feloginForgotPasswordHook';

// Extension may register additional salted hashing methods in this array
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/saltedpasswords']['saltMethods'] = array();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService('saltedpasswords', 'auth', \TYPO3\CMS\Saltedpasswords\SaltedPasswordService::class, array(
	'title' => 'FE/BE Authentification salted',
	'description' => 'Salting of passwords for Frontend and Backend',
	'subtype' => 'authUserFE,authUserBE',
	'available' => TRUE,
	'priority' => 70,
	// must be higher than \TYPO3\CMS\Sv\AuthenticationService (50) and rsaauth (60) but lower than OpenID (75)
	'quality' => 70,
	'os' => '',
	'exec' => '',
	'className' => \TYPO3\CMS\Saltedpasswords\SaltedPasswordService::class
));

// Register bulk update task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Saltedpasswords\Task\BulkUpdateTask::class] = array(
	'extension' => 'saltedpasswords',
	'title' => 'LLL:EXT:saltedpasswords/locallang.xlf:ext.saltedpasswords.tasks.bulkupdate.name',
	'description' => 'LLL:EXT:saltedpasswords/locallang.xlf:ext.saltedpasswords.tasks.bulkupdate.description',
	'additionalFields' => \TYPO3\CMS\Saltedpasswords\Task\BulkUpdateFieldProvider::class
);


/**
 * Extension: sv
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/sv/ext_localconf.php
 */

$_EXTKEY = 'sv';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register base authentication service
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
	'sv',
	'auth',
	\TYPO3\CMS\Sv\AuthenticationService::class,
	array(
		'title' => 'User authentication',
		'description' => 'Authentication with username/password.',
		'subtype' => 'getUserBE,authUserBE,getUserFE,authUserFE,getGroupsFE,processLoginDataBE,processLoginDataFE',
		'available' => TRUE,
		'priority' => 50,
		'quality' => 50,
		'os' => '',
		'exec' => '',
		'className' => \TYPO3\CMS\Sv\AuthenticationService::class
	)
);
// Add hooks to the backend login form
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['loginFormHook']['sv'] = \TYPO3\CMS\Sv\LoginFormHook::class . '->getLoginFormTag';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['loginScriptHook']['sv'] = \TYPO3\CMS\Sv\LoginFormHook::class . '->getLoginScripts';


/**
 * Extension: t3skin
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/t3skin/ext_localconf.php
 */

$_EXTKEY = 't3skin';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	RTE.default.skin = EXT:t3skin/rtehtmlarea/htmlarea.css
	RTE.default.FE.skin = EXT:t3skin/rtehtmlarea/htmlarea.css
');

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)->connect(
	\TYPO3\CMS\Backend\Utility\IconUtility::class,
	'buildSpriteHtmlIconTag',
	\TYPO3\CMS\T3skin\Slot\IconStyleModifier::class,
	'buildSpriteHtmlIconTag'
);
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)->connect(
	\TYPO3\CMS\Backend\Utility\IconUtility::class,
	'buildSpriteIconClasses',
	\TYPO3\CMS\T3skin\Slot\IconStyleModifier::class,
	'buildSpriteIconClasses'
);


/**
 * Extension: belog
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/belog/ext_localconf.php
 */

$_EXTKEY = 'belog';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
	$signalSlotDispatcher->connect(
		\TYPO3\CMS\Backend\Backend\ToolbarItems\SystemInformationToolbarItem::class,
		'loadMessages',
		\TYPO3\CMS\Belog\Controller\SystemInformationController::class,
		'appendMessage'
	);
}


/**
 * Extension: beuser
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/beuser/ext_localconf.php
 */

$_EXTKEY = 'beuser';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['logoff_pre_processing'][] = \TYPO3\CMS\Beuser\Hook\SwitchBackUserHook::class . '->switchBack';


/**
 * Extension: compatibility6
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/compatibility6/ext_localconf.php
 */

$_EXTKEY = 'compatibility6';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'FE') {

	// Register legacy content objects
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['IMGTEXT']      = \TYPO3\CMS\Compatibility6\ContentObject\ImageTextContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['CLEARGIF']     = \TYPO3\CMS\Compatibility6\ContentObject\ClearGifContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['CTABLE']       = \TYPO3\CMS\Compatibility6\ContentObject\ContentTableContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['OTABLE']       = \TYPO3\CMS\Compatibility6\ContentObject\OffsetTableContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['COLUMNS']      = \TYPO3\CMS\Compatibility6\ContentObject\ColumnsContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['HRULER']       = \TYPO3\CMS\Compatibility6\ContentObject\HorizontalRulerContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['FORM']         = \TYPO3\CMS\Compatibility6\ContentObject\FormContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['SEARCHRESULT'] = \TYPO3\CMS\Compatibility6\ContentObject\SearchResultContentObject::class;
	// deprecated alias names for cObjects in use
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['COBJ_ARRAY']   = \TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayContentObject::class;
	$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects']['CASEFUNC']     = \TYPO3\CMS\Frontend\ContentObject\CaseContentObject::class;

	// Register a hook for data submission
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['checkDataSubmission']['mailform'] = \TYPO3\CMS\Compatibility6\Controller\FormDataSubmissionController::class;

	// Register hooks for xhtml_cleaning and prefixLocalAnchors
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = \TYPO3\CMS\Compatibility6\Hooks\TypoScriptFrontendController\ContentPostProcHook::class . '->contentPostProcAll';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-cached'][] = \TYPO3\CMS\Compatibility6\Hooks\TypoScriptFrontendController\ContentPostProcHook::class . '->contentPostProcCached';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = \TYPO3\CMS\Compatibility6\Hooks\TypoScriptFrontendController\ContentPostProcHook::class . '->contentPostProcOutput';
}

/**
 * CType "mailform"
 */
// Add Default TypoScript for CType "mailform" after default content rendering
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('compatibility6', 'constants', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:compatibility6/Configuration/TypoScript/Form/constants.txt">', 'defaultContentRendering');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('compatibility6', 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:compatibility6/Configuration/TypoScript/Form/setup.txt">', 'defaultContentRendering');

// Add the search CType to the "New Content Element" wizard
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement.wizardItems.forms {
	elements.mailform {
		icon = gfx/c_wiz/mailform.gif
		title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_mail_title
		description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_mail_description
		tt_content_defValues {
			CType = mailform
			bodytext (
		# Example content:
		Name: | *name = input,40 | Enter your name here
		Email: | *email=input,40 |
		Address: | address=textarea,40,5 |
		Contact me: | tv=check | 1

		|formtype_mail = submit | Send form!
		|html_enabled=hidden | 1
		|subject=hidden| This is the subject
			)
		}
	}
	show :=addToList(mailform)
}
');

// Register for hook to show preview of tt_content element of CType="mailform" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['mailform'] = \TYPO3\CMS\Compatibility6\Hooks\PageLayoutView\MailformPreviewRenderer::class;

// Register for hook to show preview of tt_content element of CType="script" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['script'] = \TYPO3\CMS\Compatibility6\Hooks\PageLayoutView\ScriptPreviewRenderer::class;

/**
 * CType "search"
 */

// Add Default TypoScript for CType "search" after default content rendering
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('compatibility6', 'constants', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:compatibility6/Configuration/TypoScript/Search/constants.txt">', 'defaultContentRendering');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('compatibility6', 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:compatibility6/Configuration/TypoScript/Search/setup.txt">', 'defaultContentRendering');

// Add the search CType to the "New Content Element" wizard
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement.wizardItems.forms {
	elements.search {
		icon = gfx/c_wiz/searchform.gif
		title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_search_title
		description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_search_description
		tt_content_defValues.CType = search
	}
	show :=addToList(search)
}
');


/**
 * Extension: css_styled_content
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/css_styled_content/ext_localconf.php
 */

$_EXTKEY = 'css_styled_content';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// unserializing the configuration so we can use it here:
$_EXTCONF = unserialize($_EXTCONF);
if (!$_EXTCONF || $_EXTCONF['setPageTSconfig']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
		# Removes obsolete type values and fields from "Content Element" table "tt_content"
		TCEFORM.tt_content.image_frames.disabled = 1
	');
}
if (!$_EXTCONF || $_EXTCONF['removePositionTypes']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
		TCEFORM.tt_content.imageorient.types.image.removeItems = 8,9,10,17,18,25,26
	');
}

// Mark the delivered TypoScript templates as "content rendering template" (providing the hooks of "static template 43" = content (default))
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'cssstyledcontent/static/';
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'cssstyledcontent/static/v6.2/';

// Register for hook to show preview of tt_content element of CType="image" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['image'] =
	\TYPO3\CMS\CssStyledContent\Hooks\PageLayoutView\ImagePreviewRenderer::class;

// Register for hook to show preview of tt_content element of CType="textpic" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['textpic'] =
	\TYPO3\CMS\CssStyledContent\Hooks\PageLayoutView\TextpicPreviewRenderer::class;

// Register for hook to show preview of tt_content element of CType="text" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['text'] =
	\TYPO3\CMS\CssStyledContent\Hooks\PageLayoutView\TextPreviewRenderer::class;


/**
 * Extension: documentation
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/documentation/ext_localconf.php
 */

$_EXTKEY = 'documentation';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Open extension manual from within Extension Manager
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
	\TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper::class,
	'processActions',
	\TYPO3\CMS\Documentation\Slots\ExtensionManager::class,
	'processActions'
);


/**
 * Extension: feedit
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/feedit/ext_localconf.php
 */

$_EXTKEY = 'feedit';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register the edit panel view.
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/classes/class.frontendedit.php']['edit'] = \TYPO3\CMS\Feedit\FrontendEditPanel::class;


/**
 * Extension: felogin
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/felogin/ext_localconf.php
 */

$_EXTKEY = 'felogin';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// add plugin controller
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('TYPO3.CMS.Felogin', 'setup', '
# Setting "felogin" plugin TypoScript
plugin.tx_felogin_pi1 = USER_INT
plugin.tx_felogin_pi1.userFunc = TYPO3\\CMS\\Felogin\\Controller\\FrontendLoginController->main
');

// Add a default TypoScript for the CType "login" (also replaces history login functionality)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('TYPO3.CMS.Felogin', 'setup', '
# Setting "felogin" plugin TypoScript
tt_content.login = COA
tt_content.login {
	10 =< lib.stdheader
	20 >
	20 =< plugin.tx_felogin_pi1
}
', 'defaultContentRendering');

// add login to new content element wizard
if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	mod.wizards.newContentElement.wizardItems.forms {
		elements.login {
			icon = gfx/c_wiz/login_form.gif
			title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_login_title
			description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_login_description
			tt_content_defValues {
				CType = login
			}
		}
		show :=addToList(login)
	}
	');
}

// Page module hook
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['felogin'] = \TYPO3\CMS\Felogin\Hooks\CmsLayout::class;


/**
 * Extension: form
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/form/ext_localconf.php
 */

$_EXTKEY = 'form';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Form\Utility\FormUtility::getInstance()->initializeFormObjects()->initializePageTsConfig();

// Add a for previewing tt_content elements of CType="mailform"
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['mailform'] = \TYPO3\CMS\Form\Hooks\PageLayoutView\MailformPreviewRenderer::class;


// Add the form CType to the "New Content Element" wizard
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	mod.wizards.newContentElement.wizardItems.forms {
		elements.mailform {
			icon = gfx/c_wiz/mailform.gif
			title = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_mail_title
			description = LLL:EXT:cms/layout/locallang_db_new_content_el.xlf:forms_mail_description
			tt_content_defValues.CType = mailform
		}
		show :=addToList(mailform)
	}
');


/**
 * Extension: impexp
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/impexp/ext_localconf.php
 */

$_EXTKEY = 'impexp';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess'][] = 'TYPO3\\CMS\\Impexp\\Hook\\BackendControllerHook->addJavaScript';


/**
 * Extension: indexed_search
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search/ext_localconf.php
 */

$_EXTKEY = 'indexed_search';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43('indexed_search');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('indexed_search', 'Pi2', array('Search' => 'form,search'), array('Search' => 'form,search'));
// Attach to hooks:
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['pageIndexing'][] = 'TYPO3\\CMS\\IndexedSearch\\Indexer';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['headerNoCache']['tx_indexedsearch'] = '&TYPO3\\CMS\\IndexedSearch\\Hook\\TypoScriptFrontendHook->headerNoCache';
// Register with "crawler" extension:
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['crawler']['procInstructions']['tx_indexedsearch_reindex'] = 'Re-indexing';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['crawler']['cli_hooks']['tx_indexedsearch_crawl'] = '&TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerHook';
// Register with TCEmain:
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['tx_indexedsearch'] = '&TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerHook';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['tx_indexedsearch'] = '&TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerHook';
// Configure default document parsers:
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['external_parsers'] = array(
	'pdf' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'doc' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'pps' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'ppt' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'xls' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'sxc' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'sxi' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'sxw' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'ods' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'odp' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'odt' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'rtf' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'txt' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'html' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'htm' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'csv' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'xml' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'jpg' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'jpeg' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser',
	'tif' => '&TYPO3\\CMS\\IndexedSearch\\FileContentParser'
);
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['use_tables'] = 'index_phash,index_fulltext,index_rel,index_words,index_section,index_grlist,index_stat_search,index_stat_word,index_debug,index_config';
// unserializing the configuration so we can use it here:
$_EXTCONF = unserialize($_EXTCONF);
// Use the advanced doubleMetaphone parser instead of the internal one (usage of metaphone parsers is generally disabled by default)
if (isset($_EXTCONF['enableMetaphoneSearch']) && (int)$_EXTCONF['enableMetaphoneSearch'] == 2) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['metaphone'] = '&TYPO3\\CMS\\IndexedSearch\\Utility\\DoubleMetaPhoneUtility';
}


/**
 * Extension: indexed_search_mysql
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search_mysql/ext_localconf.php
 */

$_EXTKEY = 'indexed_search_mysql';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Configure hook to query the fulltext index
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['pi1_hooks']['getResultRows_SQLpointer'] = '&TYPO3\CMS\IndexedSearchMysql\Hook\MysqlFulltextIndexHook';
// Use all index_* tables except "index_rel" and "index_words"
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['use_tables'] = 'index_phash,index_fulltext,index_section,index_grlist,index_stat_search,index_stat_word,index_debug,index_config';


/**
 * Extension: lowlevel
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/lowlevel/ext_localconf.php
 */

$_EXTKEY = 'lowlevel';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Setting up scripts that can be run from the cli_dispatch.phpsh script.
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['lowlevel_refindex'] = array('EXT:lowlevel/dbint/cli/refindex_cli.php', '_CLI_lowlevel');
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['lowlevel_cleaner'] = array('EXT:lowlevel/dbint/cli/cleaner_cli.php', '_CLI_lowlevel');
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['lowlevel_admin'] = array('EXT:lowlevel/admin_cli.php', '_CLI_lowlevel');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['missing_files'] = array('TYPO3\\CMS\\Lowlevel\\MissingFilesCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['missing_relations'] = array('TYPO3\\CMS\\Lowlevel\\MissingRelationsCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['double_files'] = array('TYPO3\\CMS\\Lowlevel\\DoubleFilesCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['rte_images'] = array('TYPO3\\CMS\\Lowlevel\\RteImagesCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['lost_files'] = array('TYPO3\\CMS\\Lowlevel\\LostFilesCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['orphan_records'] = array('TYPO3\\CMS\\Lowlevel\\OrphanRecordsCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['deleted'] = array('TYPO3\\CMS\\Lowlevel\\DeletedRecordsCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['versions'] = array('TYPO3\\CMS\\Lowlevel\\VersionsCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['cleanflexform'] = array('TYPO3\\CMS\\Lowlevel\\CleanFlexformCommand');
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['lowlevel']['cleanerModules']['syslog'] = array('TYPO3\\CMS\\Lowlevel\\SyslogCommand');
}


/**
 * Extension: reports
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/reports/ext_localconf.php
 */

$_EXTKEY = 'reports';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Reports\Task\SystemStatusUpdateTask::class] = array(
	'extension' => 'reports',
	'title' => 'LLL:EXT:reports/reports/locallang.xlf:status_updateTaskTitle',
	'description' => 'LLL:EXT:reports/reports/locallang.xlf:status_updateTaskDescription',
	'additionalFields' => \TYPO3\CMS\Reports\Task\SystemStatusUpdateTaskNotificationEmailField::class
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_befunc.php']['displayWarningMessages']['tx_reports_WarningMessagePostProcessor'] = \TYPO3\CMS\Reports\Report\Status\WarningMessagePostProcessor::class;


/**
 * Extension: rsaauth
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/rsaauth/ext_localconf.php
 */

$_EXTKEY = 'rsaauth';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Add the service
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService('rsaauth', 'auth', \TYPO3\CMS\Rsaauth\RsaAuthService::class, array(
	'title' => 'RSA authentication',
	'description' => 'Authenticates users by using encrypted passwords',
	'subtype' => 'processLoginDataBE,processLoginDataFE',
	'available' => TRUE,
	'priority' => 60,
	// tx_svauth_sv1 has 50, t3sec_saltedpw has 55. This service must have higher priority!
	'quality' => 60,
	// tx_svauth_sv1 has 50. This service must have higher quality!
	'os' => '',
	'exec' => '',
	// Do not put a dependency on openssh here or service loading will fail!
	'className' => \TYPO3\CMS\Rsaauth\RsaAuthService::class
));

// Add a hook to the BE login form
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['loginFormHook']['rsaauth'] = \TYPO3\CMS\Rsaauth\Hook\LoginFormHook::class . '->getLoginFormTag';
// Add hook for user setup module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/setup/mod/index.php']['setupScriptHook']['rsaauth'] = \TYPO3\CMS\Rsaauth\Hook\UserSetupHook::class . '->getLoginScripts';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/setup/mod/index.php']['modifyUserDataBeforeSave']['rsaauth'] = \TYPO3\CMS\Rsaauth\Hook\UserSetupHook::class . '->decryptPassword';
// Add a hook to the FE login form (felogin system extension)
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['loginFormOnSubmitFuncs']['rsaauth'] = \TYPO3\CMS\Rsaauth\Hook\FrontendLoginHook::class . '->loginFormHook';
// Add a hook to show Backend warnings
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_befunc.php']['displayWarningMessages']['rsaauth'] = \TYPO3\CMS\Rsaauth\BackendWarnings::class;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
	'BackendLogin::getRsaPublicKey',
	\TYPO3\CMS\Rsaauth\Backend\AjaxLoginHandler::class . '->getRsaPublicKey',
	FALSE
);

// eID for FrontendLoginRsaPublicKey
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['FrontendLoginRsaPublicKey'] =
	'EXT:rsaauth/Resources/PHP/FrontendLoginRsaPublicKey.php';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess'][] = \TYPO3\CMS\Rsaauth\Hook\BackendHookForAjaxLogin::class . '->addRsaJsLibraries';


/**
 * Extension: rtehtmlarea
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/rtehtmlarea/ext_localconf.php
 */

$_EXTKEY = 'rtehtmlarea';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (!$GLOBALS['TYPO3_CONF_VARS']['BE']['RTEenabled']) {
	$GLOBALS['TYPO3_CONF_VARS']['BE']['RTEenabled'] = 1;
}

// Registering the RTE object
$GLOBALS['TYPO3_CONF_VARS']['BE']['RTE_reg']['rtehtmlarea'] = array('objRef' => '&TYPO3\\CMS\\Rtehtmlarea\\RteHtmlAreaBase');

// Make the extension version number available to the extension scripts
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('rtehtmlarea') . 'ext_emconf.php';

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['version'] = $EM_CONF['rtehtmlarea']['version'];
// Unserializing the configuration so we can use it here
$_EXTCONF = unserialize($_EXTCONF);

// Add default RTE transformation configuration
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/PageTS/Proc/pageTSConfig.txt">');

// Add default Page TS Config RTE configuration
if (strstr($_EXTCONF['defaultConfiguration'], 'Minimal')) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] = 'Advanced';
} elseif (strstr($_EXTCONF['defaultConfiguration'], 'Demo')) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] = 'Demo';
} else {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] = 'Typical';
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/PageTS/' . $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] . '/pageTSConfig.txt">');
// Add default User TS Config RTE configuration
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/UserTS/' . $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] . '/userTSConfig.txt">');

// Add processing of soft references on image tags in RTE content
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('rtehtmlarea') . 'Configuration/Hook/SoftReferences/ext_localconf.php';
// Add Status Report about Conflicting Extensions
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('rtehtmlarea') . 'Configuration/Hook/StatusReport/ext_localconf.php';

// Set warning in the Update Wizard of the Install Tool for deprecated Page TS Config properties
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['checkForDeprecatedRtePageTSConfigProperties'] = \TYPO3\CMS\Rtehtmlarea\Hook\Install\DeprecatedRteProperties::class;
// Set warning in the Update Wizard of the Install Tool for replacement of "acronym" button by "abbreviation" button
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['checkForRteAcronymButtonRenamedToAbbreviation'] = \TYPO3\CMS\Rtehtmlarea\Hook\Install\RteAcronymButtonRenamedToAbbreviation::class;

// Initialize plugin registration array
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins'] = array();

// Editor Mode configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['EditorMode'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['EditorMode']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\EditorMode::class;

// General Element configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['EditElement'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['EditElement']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\EditElement::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['EditElement']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['EditElement']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['MicrodataSchema'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['MicrodataSchema']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\MicroDataSchema::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['MicrodataSchema']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['MicrodataSchema']['disableInFE'] = 0;

// Inline Elements configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultInline'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultInline']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\DefaultInline::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultInline']['addIconsToSkin'] = 1;
if ($_EXTCONF['enableInlineElements']) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['InlineElements'] = array();
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['InlineElements']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\InlineElements::class;
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/PageTS/Extensions/InlineElements/pageTSConfig.txt">');
}

// Block Elements configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['BlockElements'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['BlockElements']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\BlockElements::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['BlockElements']['addIconsToSkin'] = 0;


$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefinitionList'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefinitionList']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\DefinitionList::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefinitionList']['addIconsToSkin'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['BlockStyle'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['BlockStyle']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\BlockStyle::class;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CharacterMap'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CharacterMap']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\CharacterMap::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CharacterMap']['addIconsToSkin'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Abbreviation'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Abbreviation']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Abbreviation::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Abbreviation']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Abbreviation']['disableInFE'] = 1;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UserElements'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UserElements']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\UserElements::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UserElements']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UserElements']['disableInFE'] = 1;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TextStyle'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TextStyle']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\TextStyle::class;

// Enable images and add default Page TS Config RTE configuration for enabling images with the Minimal and Typical default configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['enableImages'] = $_EXTCONF['enableImages'] ?: 0;
if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] == 'Demo') {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['enableImages'] = 1;
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['enableImages']) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultImage'] = array();
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultImage']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\DefaultImage::class;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultImage']['addIconsToSkin'] = 0;

	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Image'] = array();
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Image']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Typo3Image::class;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Image']['addIconsToSkin'] = 0;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Image']['disableInFE'] = 1;

	if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] == 'Advanced' || $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['defaultConfiguration'] == 'Typical') {
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/PageTS/Image/pageTSConfig.txt">');
	}
}
// Add frontend image rendering TypoScript anyways
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('rtehtmlarea', 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/TypoScript/ImageRendering/setup.txt">', 'defaultContentRendering');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultLink'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultLink']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\DefaultLink::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultLink']['addIconsToSkin'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Link'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Link']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Typo3Link::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Link']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Link']['disableInFE'] = 1;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Link']['additionalAttributes'] = 'rel';

// Add default Page TS Config RTE configuration for enabling links accessibility icons
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['enableAccessibilityIcons'] = $_EXTCONF['enableAccessibilityIcons'] ?: 0;
if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['enableAccessibilityIcons']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/PageTS/AccessibilityIcons/pageTSConfig.txt">');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('rtehtmlarea', 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/res/accessibilityicons/setup.txt">', 'defaultContentRendering');
}

// Register features that use the style attribute
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['allowStyleAttribute'] = isset($_EXTCONF['allowStyleAttribute']) && !$_EXTCONF['allowStyleAttribute'] ? 0 : 1;
if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['allowStyleAttribute']) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Color'] = array();
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Color']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Typo3Color::class;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Color']['addIconsToSkin'] = 0;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3Color']['disableInFE'] = 0;

	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SelectFont'] = array();
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SelectFont']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\SelectFont::class;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SelectFont']['addIconsToSkin'] = 0;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SelectFont']['disableInFE'] = 0;
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rtehtmlarea/Configuration/PageTS/Style/pageTSConfig.txt">');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TextIndicator'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TextIndicator']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\TextIndicator::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TextIndicator']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TextIndicator']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['InsertSmiley'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['InsertSmiley']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\InsertSmiley::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['InsertSmiley']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['InsertSmiley']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Language'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Language']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Language::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Language']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['Language']['disableInFE'] = 0;

// Spell checking configuration
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['rtehtmlarea_spellchecker'] = 'EXT:rtehtmlarea/Resources/Private/PHP/SpellCheckerEid.php';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('rtehtmlarea::spellchecker', \TYPO3\CMS\Rtehtmlarea\Controller\SpellCheckingController::class . '->main');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Spellchecker::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker']['disableInFE'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker']['AspellDirectory'] = $_EXTCONF['AspellDirectory'] ? $_EXTCONF['AspellDirectory'] : '/usr/bin/aspell';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker']['noSpellCheckLanguages'] = $_EXTCONF['noSpellCheckLanguages'] ? $_EXTCONF['noSpellCheckLanguages'] : 'ja,km,ko,lo,th,zh,b5,gb';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['SpellChecker']['forceCommandMode'] = $_EXTCONF['forceCommandMode'] ? $_EXTCONF['forceCommandMode'] : 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['FindReplace'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['FindReplace']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\FindReplace::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['FindReplace']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['FindReplace']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['RemoveFormat'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['RemoveFormat']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\RemoveFormat::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['RemoveFormat']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['RemoveFormat']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['PlainText'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['PlainText']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Plaintext::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['PlainText']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['PlainText']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultClean'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['DefaultClean']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\DefaultClean::class;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3HtmlParser'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3HtmlParser']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\Typo3HtmlParser::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TYPO3HtmlParser']['disableInFE'] = 1;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['QuickTag'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['QuickTag']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\QuickTag::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['QuickTag']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['QuickTag']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TableOperations'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TableOperations']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\TableOperations::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TableOperations']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['TableOperations']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['AboutEditor'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['AboutEditor']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\AboutEditor::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['AboutEditor']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['AboutEditor']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['ContextMenu'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['ContextMenu']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\ContextMenu::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['ContextMenu']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['ContextMenu']['disableInFE'] = 0;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UndoRedo'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UndoRedo']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\UndoRedo::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UndoRedo']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['UndoRedo']['disableInFE'] = 0;

// Copy & Paste configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CopyPaste'] = array();
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CopyPaste']['objectReference'] = '&' . \TYPO3\CMS\Rtehtmlarea\Extension\CopyPaste::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CopyPaste']['addIconsToSkin'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtehtmlarea']['plugins']['CopyPaste']['disableInFE'] = 0;


/**
 * Extension: sys_action
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/sys_action/ext_localconf.php
 */

$_EXTKEY = 'sys_action';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = 'TYPO3\\CMS\\SysAction\\Backend\\ToolbarItems\\ActionToolbarItem';
}


/**
 * Extension: sys_note
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_localconf.php
 */

$_EXTKEY = 'sys_note';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register "switchableControllerActions" manually because there is no plugin or module for sys_note available
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['SysNote']['modules']['Note']['controllers'] = array(
	'Note' => array(
		'actions' => array('list')
	)
);

// Hook into the list module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['recordlist/mod1/index.php']['drawFooterHook']['sys_note'] = \TYPO3\CMS\SysNote\Hook\RecordListHook::class . '->render';
// Hook into the page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/db_layout.php']['drawFooterHook']['sys_note'] = \TYPO3\CMS\SysNote\Hook\PageHook::class . '->render';
// Hook into the info module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/web_info/class.tx_cms_webinfo.php']['drawFooterHook']['sys_note'] = \TYPO3\CMS\SysNote\Hook\InfoModuleHook::class . '->render';


/**
 * Extension: t3editor
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/t3editor/ext_localconf.php
 */

$_EXTKEY = 't3editor';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE == 'BE') {
	// Register hooks for tstemplate module
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook'][] = \TYPO3\CMS\T3editor\Hook\TypoScriptTemplateInfoHook::class . '->preStartPageHook';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/tstemplate_info/class.tx_tstemplateinfo.php']['postOutputProcessingHook'][] = \TYPO3\CMS\T3editor\Hook\TypoScriptTemplateInfoHook::class . '->postOutputProcessingHook';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/t3editor/classes/class.tx_t3editor.php']['ajaxSaveCode']['tx_tstemplateinfo'] = \TYPO3\CMS\T3editor\Hook\TypoScriptTemplateInfoHook::class . '->save';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/t3editor/classes/class.tx_t3editor.php']['ajaxSaveCode']['file_edit'] = \TYPO3\CMS\T3editor\Hook\FileEditHook::class . '->save';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook'][] = \TYPO3\CMS\T3editor\Hook\FileEditHook::class . '->preStartPageHook';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/file_edit.php']['preOutputProcessingHook'][] = \TYPO3\CMS\T3editor\Hook\FileEditHook::class . '->preOutputProcessingHook';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/file_edit.php']['postOutputProcessingHook'][] = \TYPO3\CMS\T3editor\Hook\FileEditHook::class . '->postOutputProcessingHook';
}


/**
 * Extension: static_info_tables
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables/ext_localconf.php
 */

$_EXTKEY = 'static_info_tables';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

if (!defined ('STATIC_INFO_TABLES_EXTkey')) {
	define('STATIC_INFO_TABLES_EXTkey', $_EXTKEY);
}

if (!defined ('PATH_BE_staticinfotables')) {
	define('PATH_BE_staticinfotables', \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY));
}

if (!defined ('PATH_BE_staticinfotables_rel')) {
	define('PATH_BE_staticinfotables_rel', \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY));
}
// Unserializing the configuration so we can use it here
$_EXTCONF = unserialize($_EXTCONF);

// Including Extbase configuration
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/Extbase/setup.txt">');

// Register cache static_info_tables
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY])) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY] = array();
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY]['groups'] = array('all');
}
if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY]['frontend'])) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY]['frontend'] = 'TYPO3\\CMS\\Core\\Cache\\Frontend\\PhpFrontend';
}
if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY]['backend'])) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$_EXTKEY]['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\FileBackend';
}

// Configure clear cache post processing for extended domain model
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Cache/ClassCacheManager.php:SJBR\StaticInfoTables\Cache\ClassCacheManager->reBuild';

// Names of static entities
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['entities'] = array(
	'Country',
	'CountryZone',
	'Currency',
	'Language',
	'Territory'
);

// Register cached domain model classes autoloader
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Cache/CachedClassLoader.php');
\SJBR\StaticInfoTables\Cache\CachedClassLoader::registerAutoloader();

// Possible label fields for different languages. Default as last.
$labelTable = array(
	'static_territories' => array(
		'label_fields' => array(
			'tr_name_##', 'tr_name_en',
		),
		'isocode_field' => array(
			'tr_iso_##',
		),
	),
	'static_countries' => array(
		'label_fields' => array(
			'cn_short_##', 'cn_short_en',
		),
		'isocode_field' => array(
			'cn_iso_##',
		),
	),
	'static_country_zones' => array(
		'label_fields' => array(
			'zn_name_##', 'zn_name_local',
		),
		'isocode_field' => array(
			'zn_code', 'zn_country_iso_##',
		),
	),
	'static_languages' => array(
		'label_fields' => array(
			'lg_name_##', 'lg_name_en',
		),
		'isocode_field' => array(
			'lg_iso_##', 'lg_country_iso_##',
		),
	),
	'static_currencies' => array(
		'label_fields' => array(
			'cu_name_##', 'cu_name_en',
		),
		'isocode_field' => array(
			'cu_iso_##',
		),
	),
);

if (isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables']) && is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables'])) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables'] = array_merge($labelTable, $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables']);
} else {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables'] = $labelTable;
}
unset($labelTable);

// Registering backend form select field prrenderingfor hook in order to localize selected items
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms.php']['getSingleFieldClass'][] = 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper';

// Add data handling hook to manage ISO codes redundancies on records
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'SJBR\\StaticInfoTables\\Hook\\Core\\DataHandling\\ProcessDataMap';

// Enabling the Static Info Tables Manager module
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['enableManager'] = isset($_EXTCONF['enableManager']) ? $_EXTCONF['enableManager'] : '0';

// Make the extension version and constraints available when creating language packs and to other extensions
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'ext_emconf.php');
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['version'] = $EM_CONF[$_EXTKEY]['version'];
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['constraints'] = $EM_CONF[$_EXTKEY]['constraints'];


/**
 * Extension: static_info_tables_de
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables_de/ext_localconf.php
 */

$_EXTKEY = 'static_info_tables_de';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/Extbase/setup.txt">');


/**
 * Extension: sourceopt
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/sourceopt/ext_localconf.php
 */

$_EXTKEY = 'sourceopt';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined("TYPO3_MODE")) {
	die("Access denied.");
}

if (TYPO3_MODE == 'FE') {
	/**
	 * Hook for HTML-modification on the page
	 */
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = 'HTML\\Sourceopt\\User\\FrontendHook->cleanUncachedContent';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = 'HTML\\Sourceopt\\User\\FrontendHook->cleanCachedContent';
}


/**
 * Extension: realurl
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/realurl/ext_localconf.php
 */

$_EXTKEY = 'realurl';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];



$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['linkData-PostProc']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->encodeSpURL';
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_content.php']['typoLink_PostProc']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->encodeSpURL_urlPrepend';
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['checkAlternativeIdMethods-PostProc']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->decodeSpURL';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearPageCacheEval']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->clearPageCacheMgm';

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_urldecodecache'] = 'tx_realurl_urldecodecache';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_urlencodecache'] = 'tx_realurl_urlencodecache';

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['tx_realurl'] = 'EXT:realurl/class.tx_realurl_tcemain.php:&tx_realurl_tcemain';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['tx_realurl'] = 'EXT:realurl/class.tx_realurl_tcemain.php:&tx_realurl_tcemain';

$TYPO3_CONF_VARS['FE']['addRootLineFields'] .= ',tx_realurl_pathsegment,tx_realurl_exclude,tx_realurl_pathoverride';
$TYPO3_CONF_VARS['FE']['pageOverlayFields'] .= ',tx_realurl_pathsegment';

// Include configuration file
$_realurl_conf = @unserialize($_EXTCONF);
if (is_array($_realurl_conf)) {
	$_realurl_conf_file = trim($_realurl_conf['configFile']);
	if ($_realurl_conf_file && @file_exists(PATH_site . $_realurl_conf_file)) {
		/** @noinspection PhpIncludeInspection */
		require_once(PATH_site . $_realurl_conf_file);
	}
	unset($_realurl_conf_file);
}

define('TX_REALURL_AUTOCONF_FILE', 'typo3conf/realurl_autoconf.php');
if ($_realurl_conf['enableAutoConf'] && !isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'])) {
	/** @noinspection PhpIncludeInspection */
	@include_once(PATH_site . TX_REALURL_AUTOCONF_FILE);
}
unset($_realurl_conf);

define('TX_REALURL_SEGTITLEFIELDLIST_DEFAULT', 'tx_realurl_pathsegment,alias,nav_title,title,uid');
define('TX_REALURL_SEGTITLEFIELDLIST_PLO', 'tx_realurl_pathsegment,nav_title,title,uid');




/**
 * Extension: metaseo
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/metaseo/ext_localconf.php
 */

$_EXTKEY = 'metaseo';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['metaseo']);

// ##############################################
// BACKEND
// ##############################################
if (TYPO3_MODE == 'BE') {
    // AJAX
    $GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['tx_metaseo_backend_ajax::sitemap'] = 'Metaseo\\Metaseo\\Backend\\Ajax\SitemapAjax->main';
    $GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['tx_metaseo_backend_ajax::page']    = 'Metaseo\\Metaseo\\Backend\\Ajax\PageAjax->main';

    // Field validations
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['tx_metaseo_backend_validation_float'] = 'EXT:metaseo/Classes/Backend/Validator/ValidatorImport.php';

    // Hooks
    //$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][]  = 'Metaseo\\Metaseo\\Hook\\ClearCacheHook->main';
}

// ##############################################
// SEO
// ##############################################

$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',tx_metaseo_pagetitle,tx_metaseo_pagetitle_rel,tx_metaseo_pagetitle_prefix,tx_metaseo_pagetitle_suffix,tx_metaseo_canonicalurl';
$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',tx_metaseo_pagetitle_prefix,tx_metaseo_pagetitle_suffix,tx_metaseo_inheritance';

//$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['typoLink_PostProc'][] = 'EXT:metaseo/lib/class.linkparser.php:user_metaseo_linkparser->main';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['typoLink_PostProc'][] = 'Metaseo\\Metaseo\\Hook\\SitemapIndexHook->hook_linkParse';

// HTTP Header extension
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['isOutputting']['metaseo'] = 'Metaseo\\Metaseo\\Hook\\HttpHook->main';


// ##############################################
// SITEMAP
// ##############################################
// Frontend indexed
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['pageIndexing'][] = 'Metaseo\\Metaseo\\Hook\\SitemapIndexHook';

// ##############################################
// HOOKS
// ##############################################

// EXT:tt_news
if (!empty($confArr['enableIntegrationTTNews'])) {
    // Metatag fetch hook
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraItemMarkerHook']['metaseo'] = 'Metaseo\\Metaseo\\Hook\\Extension\\TtnewsExtension';
}

// EXT:news
if (!empty($confArr['enableIntegrationNews'])) {
    // Metatag fetch hook
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['news']['hooks']['listAction']['metaseo'] = 'Metaseo\\Metaseo\\Hook\\Extension\\NewsExtension->listActionHook';
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['news']['hooks']['detailAction']['metaseo'] = 'Metaseo\\Metaseo\\Hook\\Extension\\NewsExtension->detailActionHook';
}

// ############################################################################
// CLI
// ############################################################################

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = 'Metaseo\\Metaseo\\Command\\MetaseoCommandController';

// ##############################################
// SCHEDULER
// ##############################################

// Cleanup task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Metaseo\\Metaseo\\Scheduler\\Task\\GarbageCollectionTask'] = array(
    'extension'   => $_EXTKEY,
    'title'       => 'Sitemap garbage collection',
    'description' => 'Cleanup old sitemap entries'
);

// Sitemap XML task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Metaseo\\Metaseo\\Scheduler\\Task\\SitemapXmlTask'] = array(
    'extension'   => $_EXTKEY,
    'title'       => 'Sitemap.xml builder',
    'description' => 'Build sitemap xml as static file (in uploads/tx_metaseo/sitemap-xml/)'
);

// Sitemap TXT task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Metaseo\\Metaseo\\Scheduler\\Task\\SitemapTxtTask'] = array(
    'extension'   => $_EXTKEY,
    'title'       => 'Sitemap.txt builder',
    'description' => 'Build sitemap txt as static file (in uploads/tx_metaseo/sitemap-txt/)'
);


/**
 * Extension: df_foundation5
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/df_foundation5/ext_localconf.php
 */

$_EXTKEY = 'df_foundation5';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.imageorient.disableNoMatchingValueElement = 1');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.100 = Dropdown-Box click');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.101 = Dropdown-Box hover');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.110 = Modal-Box');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.120 = Close-Box Standard');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.121 = Close-Box Info');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.122 = Close-Box Warning');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.123 = Close-Box Error');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.124 = Close-Box Success');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement.wizardItems {
	common.elements {
		image {
			tt_content_defValues {
				CType = image
				imagecols = 1
			}
		}
		textpic {
			tt_content_defValues {
				CType = textpic
				imageorient = 0
			}
		}
	}
}
');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	TCEFORM.tt_content.imageorient.types.image.removeItems = 0,1,2,8,9,10,30,31
	TCEFORM.tt_content {
		tx_dffoundation5_large_left_column.types.image.disabled = 1
		tx_dffoundation5_large_right_column.types.image.disabled = 1
		tx_dffoundation5_medium_left_column.types.image.disabled = 1
		tx_dffoundation5_medium_right_column.types.image.disabled = 1
		tx_dffoundation5_small_left_column.types.image.disabled = 1
		tx_dffoundation5_small_right_column.types.image.disabled = 1
		tx_dffoundation5_left_add.types.image.disabled = 1
		tx_dffoundation5_right_add.types.image.disabled = 1
	}
');



/**
 * Extension: devtools
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/devtools/ext_localconf.php
 */

$_EXTKEY = 'devtools';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher')->connect(
		'TYPO3\\CMS\\Extensionmanager\\ViewHelpers\\ProcessAvailableActionsViewHelper',
		'processActions',
		'IchHabRecht\\Devtools\\Slot\\Extensionmanager\\ProcessActions',
		'markModifiedExtension'
	);
	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher')->connect(
		'TYPO3\\CMS\\Extensionmanager\\ViewHelpers\\ProcessAvailableActionsViewHelper',
		'processActions',
		'IchHabRecht\\Devtools\\Slot\\Extensionmanager\\ProcessActions',
		'updateExtensionConfigurationFile'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
		'DevtoolsModifiedFilesController::listFiles',
		'IchHabRecht\\Devtools\\Controller\\Slot\\Extensionmanager\\ProcessActions\\ModifiedFilesController->listFiles'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
		'DevtoolsUpdateConfigurationFileController::updateConfigurationFile',
		'IchHabRecht\\Devtools\\Controller\\Slot\\Extensionmanager\\ProcessActions\\UpdateConfigurationFileController->updateConfigurationFile'
	);
}


/**
 * Extension: dev_null_geshi
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/dev_null_geshi/ext_localconf.php
 */

$_EXTKEY = 'dev_null_geshi';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE'))
 	die ('Access denied.');

// for cache remove for debug / testing
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY,'pi1/class.tx_devnullgeshi_pi1.php','_pi1','list_type',1);

$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_devnullgeshi_evalhighlight'] = 'EXT:dev_null_geshi/pi1/class.tx_devnullgeshi_evalhighlight.php';



/**
 * Extension: crawler
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/crawler/ext_localconf.php
 */

$_EXTKEY = 'crawler';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];



$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['crawler'] 			= array('EXT:crawler/cli/crawler_cli.php','_CLI_crawler');
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['crawler_im'] 		= array('EXT:crawler/cli/crawler_im.php','_CLI_crawler');
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['crawler_flush'] 	= array('EXT:crawler/cli/crawler_flush.php','_CLI_crawler');
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['cliKeys']['crawler_multiprocess'] 	= array('EXT:crawler/cli/crawler_multiprocess.php','_CLI_crawler');


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['connectToDB']['tx_crawler'] = 'EXT:crawler/hooks/class.tx_crawler_hooks_tsfe.php:&tx_crawler_hooks_tsfe->fe_init';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['initFEuser']['tx_crawler'] = 'EXT:crawler/hooks/class.tx_crawler_hooks_tsfe.php:&tx_crawler_hooks_tsfe->fe_feuserInit';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['isOutputting']['tx_crawler'] = 'EXT:crawler/hooks/class.tx_crawler_hooks_tsfe.php:&tx_crawler_hooks_tsfe->fe_isOutputting';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['hook_eofe']['tx_crawler'] = 'EXT:crawler/hooks/class.tx_crawler_hooks_tsfe.php:&tx_crawler_hooks_tsfe->fe_eofe';

$GLOBALS['TYPO3_CONF_VARS']['SVCONF']['auth']['setup']['BE_alwaysFetchUser'] = true;

t3lib_extMgm::addService(
	$_EXTKEY,
	'auth' /* sv type */,
	'tx_crawler_auth' /* sv key */,
	array(

		'title' => 'Login for wsPreview',
		'description' => '',

		'subtype' => 'getUserBE,authUserBE',

		'available' => TRUE,
		'priority' => 80,
		'quality' => 50,

		'os' => '',
		'exec' => '',

		'classFile' => t3lib_extMgm::extPath($_EXTKEY).'class.tx_crawler_auth.php',
		'className' => 'tx_crawler_auth',
	)
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_crawler_scheduler_im'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_im.name',
	'description'      => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_im.description',
	'additionalFields' => 'tx_crawler_scheduler_imAdditionalFieldProvider'
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_crawler_scheduler_crawl'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_crawl.name',
	'description'      => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_crawl.description',
	'additionalFields' => 'tx_crawler_scheduler_crawlAdditionalFieldProvider'
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_crawler_scheduler_crawlMultiProcess'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_crawlMultiProcess.name',
	'description'      => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_crawl.description',
	'additionalFields' => 'tx_crawler_scheduler_crawlMultiProcessAdditionalFieldProvider'
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_crawler_scheduler_flush'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_flush.name',
	'description'      => 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:crawler_flush.description',
	'additionalFields' => 'tx_crawler_scheduler_flushAdditionalFieldProvider'
);




/**
 * Extension: news
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/news/ext_localconf.php
 */

$_EXTKEY = 'news';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$boot = function($packageKey) {
	// Extension manager configuration
	$configuration = Tx_News_Utility_EmConfiguration::getSettings();

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		$packageKey,
		'Pi1',
		array(
			'News' => 'list,detail,dateMenu,searchForm,searchResult',
			'Category' => 'list',
			'Tag' => 'list',
		),
		array(
			'News' => 'searchForm,searchResult',
		)
	);

	// Page module hook
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info'][$packageKey . '_pi1'][$packageKey] =
		'Tx_News_Hooks_CmsLayout->getExtensionSummary';

	// Preview of news records
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$packageKey] =
		'Tx_News_Hooks_Tcemain';

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$packageKey . '_clearcache'] =
		'Tx_News_Hooks_Tcemain->clearCachePostProc';

	// Edit restriction for news records
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][$packageKey] =
		'Tx_News_Hooks_Tcemain';

	// Tceforms: Rendering of fields
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms.php']['getSingleFieldClass'][$packageKey] =
		'Tx_News_Hooks_Tceforms';

	// Tceforms: Rendering of the whole Tceform
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms.php']['getMainFieldsClass'][] =
		'Tx_News_Hooks_Tceforms';

	// Modify flexform values
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_befunc.php']['getFlexFormDSClass'][$packageKey] =
		'Tx_News_Hooks_T3libBefunc';

	// Inline records hook
	if ($configuration->getUseFal()) {
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms_inline.php']['tceformsInlineHook'][$packageKey] =
			'Tx_News_Hooks_InlineElementHook';
	}

	/* ===========================================================================
		Custom cache, done with the caching framework
	=========================================================================== */
	if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_news_category'])) {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_news_category'] = array();
	}
	// Define string frontend as default frontend, this must be set with TYPO3 4.5 and below
	// and overrides the default variable frontend of 4.6
	if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_news_category']['frontend'])) {
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_news_category']['frontend'] = 'TYPO3\CMS\Core\Cache\Frontend\StringFrontend';
	}


	/* ===========================================================================
		Add soft reference parser
	=========================================================================== */
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['softRefParser']['news_externalurl'] = '&Tx_News_Database_SoftReferenceIndex';

	/* ===========================================================================
		Add TSconfig
	=========================================================================== */
		// For linkvalidator
	if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('linkvalidator')) {
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $packageKey . '/Configuration/TSconfig/Page/mod.linkvalidator.txt">');
	}

	/* ===========================================================================
		Hooks
	=========================================================================== */
	if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('realurl')) {
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/realurl/class.tx_realurl_autoconfgen.php']['extensionConfiguration'][$packageKey] =
			'Tx_News_Hooks_RealUrlAutoConfiguration->addNewsConfig';
	}

	/* ===========================================================================
		Update scripts
	=========================================================================== */
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['news_fal'] = 'GeorgRinger\\News\\Updates\\FalUpdateWizard';

};

$boot($_EXTKEY);
unset($boot);


/**
 * Extension: cb_newscal
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_newscal/ext_localconf.php
 */

$_EXTKEY = 'cb_newscal';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['Newscal->calendar'] = 'LLL:EXT:cb_newscal/Resources/Private/Language/locallang_db.xlf:flexforms_general.mode.newscal_calendar';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['News']['plugins']['Pi1']['controllers']['Newscal']['actions']['0'] = 'calendar';

// Display custom information for Preview in Page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['news_pi1']['newscal'] = 'Cbrunet\CbNewscal\Hooks\CmsLayout->getExtensionSummary';

// Update fields in the flexform
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['Hooks/T3libBefunc.php']['updateFlexforms'][] = 'Cbrunet\CbNewscal\Hooks\T3libBefunc->updateFlexforms';


/**
 * Extension: autoloader
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/autoloader/ext_localconf.php
 */

$_EXTKEY = 'autoloader';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


/**
 * General ext_localconf file and also an example for your own extension
 *
 * @category Extension
 * @package  Autoloader
 * @author   Tim Lochmüller
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\HDNET\Autoloader\Loader::extLocalconf('HDNET', 'autoloader', array('Hooks', 'Slots', 'StaticTyposcript'));

$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['autoloader::clearCache'] = 'HDNET\\Autoloader\\Hooks\\ClearCache->clear';


/**
 * Extension: calendarize
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize/ext_localconf.php
 */

$_EXTKEY = 'calendarize';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


/**
 * General ext_localconf file and also an example for your own extension
 *
 * @category Extension
 * @package  Calendarize
 * @author   Tim Lochmüller
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\HDNET\Autoloader\Loader::extLocalconf('HDNET', 'calendarize', \HDNET\Calendarize\Register::getDefaultAutoloader());

if (!(boolean)\HDNET\Calendarize\Utility\ConfigurationUtility::get('disableDefaultEvent')) {
	\HDNET\Calendarize\Register::extLocalconf(\HDNET\Calendarize\Register::getDefaultCalendarizeConfiguration());
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('HDNET.calendarize', 'Calendar', array('Calendar' => 'list,year,month,week,day,detail,search'), array('Calendar' => 'list,year,month,week,day,detail,search'));


/**
 * Extension: calendarize_news
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize_news/ext_localconf.php
 */

$_EXTKEY = 'calendarize_news';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


/**
 * General ext_localconf file and also an example for your own extension
 *
 * @category   Extension
 * @package    Calendarize
 * @author     Tim Lochmüller
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\HDNET\Autoloader\Loader::extLocalconf('HDNET', 'calendarize_news');
\HDNET\Calendarize\Register::extLocalconf(\HDNET\CalendarizeNews\Register::getConfiguration());


#