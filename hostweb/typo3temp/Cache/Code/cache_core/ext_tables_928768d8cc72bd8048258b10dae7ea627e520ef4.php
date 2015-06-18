<?php
/**
 * Compiled ext_tables.php cache file
 */

global $T3_SERVICES, $T3_VAR, $TYPO3_CONF_VARS;
global $TBE_MODULES, $TBE_MODULES_EXT, $TCA;
global $PAGES_TYPES, $TBE_STYLES, $FILEICONS;
global $_EXTKEY;

/**
 * Extension: core
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/core/ext_tables.php
 */

$_EXTKEY = 'core';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

/**
 * $GLOBALS['PAGES_TYPES'] defines the various types of pages (field: doktype) the system
 * can handle and what restrictions may apply to them.
 * Here you can set the icon and especially you can define which tables are
 * allowed on a certain pagetype (doktype)
 * NOTE: The 'default' entry in the $GLOBALS['PAGES_TYPES'] array is the 'base' for all
 * types, and for every type the entries simply overrides the entries in the 'default' type!
 */
$GLOBALS['PAGES_TYPES'] = array(
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_LINK => array(),
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SHORTCUT => array(),
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_BE_USER_SECTION => array(
		'type' => 'web',
		'allowedTables' => '*'
	),
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_MOUNTPOINT => array(),
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SPACER => array(
		'type' => 'sys'
	),
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SYSFOLDER => array(
		//  Doktype 254 is a 'Folder' - a general purpose storage folder for whatever you like.
		// In CMS context it's NOT a viewable page. Can contain any element.
		'type' => 'sys',
		'allowedTables' => '*'
	),
	(string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_RECYCLER => array(
		// Doktype 255 is a recycle-bin.
		'type' => 'sys',
		'allowedTables' => '*'
	),
	'default' => array(
		'type' => 'web',
		'allowedTables' => 'pages',
		'onlyAllowedTables' => '0'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('sys_category');

/** @var \TYPO3\CMS\Core\Resource\Driver\DriverRegistry $registry */
$registry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\Driver\DriverRegistry::class);
$registry->addDriversToTCA();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('sys_file_reference');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('sys_file_collection');

/**
 * $TBE_MODULES contains the structure of the backend modules as they are
 * arranged in main- and sub-modules. Every entry in this array represents a
 * menu item on either first (key) or second level (value from list) in the
 * left menu in the TYPO3 backend
 * For information about adding modules to TYPO3 you should consult the
 * documentation found in "Inside TYPO3"
 */
$GLOBALS['TBE_MODULES'] = array(
	'web' => 'list',
	'file' => '',
	'user' => '',
	'tools' => '',
	'system' => '',
	'help' => '',
	'_configuration' => array(
		'web' => array(
			'labels' => array(
				'tabs_images' => array('tab' => 'website.gif'),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_web.xlf'
			),
			'configuration' => array(
				'name' => 'web',
				'access' => 'user,group'
			)
		),
		'file' => array(
			'labels' => array(
				'tabs_images' => array('tab' => 'file.gif'),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_file.xlf'
			),
			'configuration' => array(
				'name' => 'file',
				'access' => 'user,group',
				'workspaces' => 'online,custom'
			)
		),
		'user' => array(
			'labels' => array(
				'tabs_images' => array('tab' => 'user.gif'),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_usertools.xlf'
			),
			'configuration' => array(
				'name' => 'user',
				'access' => 'user,group'
			)
		),
		'tools' => array(
			'labels' => array(
				'tabs_images' => array('tab' => 'tool.gif'),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_admintools.xlf'
			),
			'configuration' => array(
				'name' => 'tools',
				'access' => 'admin'
			)
		),
		'system' => array(
			'labels' => array(
				'll_ref' => 'LLL:EXT:lang/locallang_mod_system.xlf'
			),
			'configuration' => array(
				'name' => 'system',
				'access' => 'admin'
			)
		),
		'help' => array(
			'labels' => array(
				'll_ref' => 'LLL:EXT:lang/locallang_mod_help.xlf'
			),
			'configuration' => array(
				'name' => 'help'
			)
		)
	)
);


// Register the page tree core navigation component
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addCoreNavigationComponent('web', 'typo3-pagetree');


/**
 * $TBE_STYLES configures backend styles and colors; Basically this contains
 * all the values that can be used to create new skins for TYPO3.
 * For information about making skins to TYPO3 you should consult the
 * documentation found in "Inside TYPO3"
 */
$GLOBALS['TBE_STYLES'] = array(
	'colorschemes' => array(
		'0' => '#E4E0DB,#CBC7C3,#EDE9E5'
	),
	'borderschemes' => array(
		'0' => array('border:solid 1px black;', 5)
	)
);


/**
 * Setting up $TCA_DESCR - Context Sensitive Help (CSH)
 * For information about using the CSH API in TYPO3 you should consult the
 * documentation found in "Inside TYPO3"
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('pages', 'EXT:lang/locallang_csh_pages.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('be_users', 'EXT:lang/locallang_csh_be_users.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('be_groups', 'EXT:lang/locallang_csh_be_groups.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_filemounts', 'EXT:lang/locallang_csh_sysfilem.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_language', 'EXT:lang/locallang_csh_syslang.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_news', 'EXT:lang/locallang_csh_sysnews.xlf');
// General Core
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('xMOD_csh_corebe', 'EXT:lang/locallang_csh_corebe.xlf');
// Extension manager
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_tools_em', 'EXT:lang/locallang_csh_em.xlf');
// Web > Info
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_info', 'EXT:lang/locallang_csh_web_info.xlf');
// Web > Func
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_func', 'EXT:lang/locallang_csh_web_func.xlf');
// Labels for TYPO3 4.5 and greater.
// These labels override the ones set above, while still falling back to the original labels
// if no translation is available.
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:lang/locallang_csh_pages.xlf'][] = 'EXT:lang/4.5/locallang_csh_pages.xlf';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:lang/locallang_csh_corebe.xlf'][] = 'EXT:lang/4.5/locallang_csh_corebe.xlf';


/**
 * $FILEICONS defines icons for the various file-formats
 */
$GLOBALS['FILEICONS'] = array(
	'txt' => 'txt.gif',
	'pdf' => 'pdf.gif',
	'doc' => 'doc.gif',
	'ai' => 'ai.gif',
	'bmp' => 'bmp.gif',
	'tif' => 'tif.gif',
	'htm' => 'htm.gif',
	'html' => 'html.gif',
	'pcd' => 'pcd.gif',
	'gif' => 'gif.gif',
	'jpg' => 'jpg.gif',
	'jpeg' => 'jpg.gif',
	'mpg' => 'mpg.gif',
	'mpeg' => 'mpeg.gif',
	'exe' => 'exe.gif',
	'com' => 'exe.gif',
	'zip' => 'zip.gif',
	'tgz' => 'zip.gif',
	'gz' => 'zip.gif',
	'php3' => 'php3.gif',
	'php4' => 'php3.gif',
	'php5' => 'php3.gif',
	'php6' => 'php3.gif',
	'php' => 'php3.gif',
	'ppt' => 'ppt.gif',
	'ttf' => 'ttf.gif',
	'pcx' => 'pcx.gif',
	'png' => 'png.gif',
	'tga' => 'tga.gif',
	'class' => 'java.gif',
	'sxc' => 'sxc.gif',
	'sxw' => 'sxw.gif',
	'xls' => 'xls.gif',
	'swf' => 'swf.gif',
	'swa' => 'flash.gif',
	'dcr' => 'flash.gif',
	'wav' => 'wav.gif',
	'mp3' => 'mp3.gif',
	'avi' => 'avi.gif',
	'au' => 'au.gif',
	'mov' => 'mov.gif',
	'3ds' => '3ds.gif',
	'csv' => 'csv.gif',
	'ico' => 'ico.gif',
	'max' => 'max.gif',
	'ps' => 'ps.gif',
	'tmpl' => 'tmpl.gif',
	'fh3' => 'fh3.gif',
	'inc' => 'inc.gif',
	'mid' => 'mid.gif',
	'psd' => 'psd.gif',
	'xml' => 'xml.gif',
	'rtf' => 'rtf.gif',
	't3x' => 't3x.gif',
	't3d' => 't3d.gif',
	'cdr' => 'cdr.gif',
	'dtd' => 'dtd.gif',
	'sgml' => 'sgml.gif',
	'ani' => 'ani.gif',
	'css' => 'css.gif',
	'eps' => 'eps.gif',
	'js' => 'js.gif',
	'wrl' => 'wrl.gif',
	'default' => 'default.gif'
);


/**
 * Backend sprite icon-names
 */
$GLOBALS['TBE_STYLES']['spriteIconApi']['coreSpriteImageNames'] = array(
	'actions-document-close',
	'actions-document-duplicates-select',
	'actions-document-edit-access',
	'actions-document-export-csv',
	'actions-document-export-t3d',
	'actions-document-history-open',
	'actions-document-import-t3d',
	'actions-document-info',
	'actions-document-localize',
	'actions-document-move',
	'actions-document-new',
	'actions-document-open',
	'actions-document-open-read-only',
	'actions-document-paste-after',
	'actions-document-paste-into',
	'actions-document-save',
	'actions-document-save-cleartranslationcache',
	'actions-document-save-close',
	'actions-document-save-new',
	'actions-document-save-translation',
	'actions-document-save-view',
	'actions-document-select',
	'actions-document-synchronize',
	'actions-document-view',
	'actions-edit-add',
	'actions-edit-copy',
	'actions-edit-copy-release',
	'actions-edit-cut',
	'actions-edit-cut-release',
	'actions-edit-delete',
	'actions-edit-download',
	'actions-edit-hide',
	'actions-edit-insert-default',
	'actions-edit-localize-status-high',
	'actions-edit-localize-status-low',
	'actions-edit-merge-localization',
	'actions-edit-pick-date',
	'actions-edit-rename',
	'actions-edit-restore',
	'actions-edit-undelete-edit',
	'actions-edit-undo',
	'actions-edit-unhide',
	'actions-edit-upload',
	'actions-input-clear',
	'actions-insert-record',
	'actions-insert-reference',
	'actions-markstate',
	'actions-message-error-close',
	'actions-message-information-close',
	'actions-message-notice-close',
	'actions-message-ok-close',
	'actions-message-warning-close',
	'actions-move-down',
	'actions-move-left',
	'actions-move-move',
	'actions-move-right',
	'actions-move-to-bottom',
	'actions-move-to-top',
	'actions-move-up',
	'actions-page-move',
	'actions-page-new',
	'actions-page-open',
	'actions-selection-delete',
	'actions-system-backend-user-emulate',
	'actions-system-backend-user-switch',
	'actions-system-cache-clear',
	'actions-system-cache-clear-impact-high',
	'actions-system-cache-clear-impact-low',
	'actions-system-cache-clear-impact-medium',
	'actions-system-cache-clear-rte',
	'actions-system-extension-configure',
	'actions-system-extension-documentation',
	'actions-system-extension-download',
	'actions-system-extension-import',
	'actions-system-extension-install',
	'actions-system-extension-sqldump',
	'actions-system-extension-uninstall',
	'actions-system-extension-update',
	'actions-system-extension-update-disabled',
	'actions-system-help-open',
	'actions-system-list-open',
	'actions-system-options-view',
	'actions-system-pagemodule-open',
	'actions-system-refresh',
	'actions-system-shortcut-new',
	'actions-system-tree-search-open',
	'actions-system-typoscript-documentation',
	'actions-system-typoscript-documentation-open',
	'actions-template-new',
	'actions-unmarkstate',
	'actions-version-document-remove',
	'actions-version-page-open',
	'actions-version-swap-version',
	'actions-version-swap-workspace',
	'actions-version-workspace-preview',
	'actions-version-workspace-sendtostage',
	'actions-view-go-back',
	'actions-view-go-down',
	'actions-view-go-forward',
	'actions-view-go-up',
	'actions-view-list-collapse',
	'actions-view-list-expand',
	'actions-view-paging-first',
	'actions-view-paging-first-disabled',
	'actions-view-paging-last',
	'actions-view-paging-last-disabled',
	'actions-view-paging-next',
	'actions-view-paging-next-disabled',
	'actions-view-paging-previous',
	'actions-view-paging-previous-disabled',
	'actions-view-table-collapse',
	'actions-view-table-expand',
	'actions-window-open',
	'apps-clipboard-images',
	'apps-clipboard-list',
	'apps-filetree-folder-add',
	'apps-filetree-folder-default',
	'apps-filetree-folder-list',
	'apps-filetree-folder-locked',
	'apps-filetree-folder-media',
	'apps-filetree-folder-news',
	'apps-filetree-folder-opened',
	'apps-filetree-folder-recycler',
	'apps-filetree-folder-temp',
	'apps-filetree-folder-user',
	'apps-filetree-mount',
	'apps-filetree-root',
	'apps-irre-collapsed',
	'apps-irre-expanded',
	'apps-pagetree-backend-user',
	'apps-pagetree-backend-user-hideinmenu',
	'apps-pagetree-collapse',
	'apps-pagetree-drag-copy-above',
	'apps-pagetree-drag-copy-below',
	'apps-pagetree-drag-move-above',
	'apps-pagetree-drag-move-below',
	'apps-pagetree-drag-move-between',
	'apps-pagetree-drag-move-into',
	'apps-pagetree-drag-new-between',
	'apps-pagetree-drag-new-inside',
	'apps-pagetree-drag-place-denied',
	'apps-pagetree-expand',
	'apps-pagetree-folder-contains-approve',
	'apps-pagetree-folder-contains-board',
	'apps-pagetree-folder-contains-fe_users',
	'apps-pagetree-folder-contains-news',
	'apps-pagetree-folder-contains-shop',
	'apps-pagetree-folder-default',
	'apps-pagetree-page-advanced',
	'apps-pagetree-page-advanced-hideinmenu',
	'apps-pagetree-page-advanced-root',
	'apps-pagetree-page-backend-users',
	'apps-pagetree-page-backend-users-hideinmenu',
	'apps-pagetree-page-backend-users-root',
	'apps-pagetree-page-content-from-page',
	'apps-pagetree-page-content-from-page-hideinmenu',
	'apps-pagetree-page-default',
	'apps-pagetree-page-domain',
	'apps-pagetree-page-frontend-user',
	'apps-pagetree-page-frontend-user-hideinmenu',
	'apps-pagetree-page-frontend-user-root',
	'apps-pagetree-page-frontend-users',
	'apps-pagetree-page-frontend-users-hideinmenu',
	'apps-pagetree-page-frontend-users-root',
	'apps-pagetree-page-mountpoint',
	'apps-pagetree-page-mountpoint-hideinmenu',
	'apps-pagetree-page-mountpoint-root',
	'apps-pagetree-page-no-icon-found',
	'apps-pagetree-page-no-icon-found-hideinmenu',
	'apps-pagetree-page-no-icon-found-root',
	'apps-pagetree-page-not-in-menu',
	'apps-pagetree-page-recycler',
	'apps-pagetree-page-shortcut',
	'apps-pagetree-page-shortcut-external',
	'apps-pagetree-page-shortcut-external-hideinmenu',
	'apps-pagetree-page-shortcut-external-root',
	'apps-pagetree-page-shortcut-hideinmenu',
	'apps-pagetree-page-shortcut-root',
	'apps-pagetree-root',
	'apps-pagetree-spacer',
	'apps-tcatree-select-recursive',
	'apps-toolbar-menu-actions',
	'apps-toolbar-menu-cache',
	'apps-toolbar-menu-opendocs',
	'apps-toolbar-menu-search',
	'apps-toolbar-menu-shortcut',
	'apps-toolbar-menu-workspace',
	'mimetypes-compressed',
	'mimetypes-excel',
	'mimetypes-media-audio',
	'mimetypes-media-flash',
	'mimetypes-media-image',
	'mimetypes-media-video',
	'mimetypes-other-other',
	'mimetypes-pdf',
	'mimetypes-powerpoint',
	'mimetypes-text-css',
	'mimetypes-text-csv',
	'mimetypes-text-html',
	'mimetypes-text-js',
	'mimetypes-text-php',
	'mimetypes-text-text',
	'mimetypes-word',
	'mimetypes-x-content-divider',
	'mimetypes-x-content-domain',
	'mimetypes-x-content-form',
	'mimetypes-x-content-form-search',
	'mimetypes-x-content-header',
	'mimetypes-x-content-html',
	'mimetypes-x-content-image',
	'mimetypes-x-content-link',
	'mimetypes-x-content-list-bullets',
	'mimetypes-x-content-list-files',
	'mimetypes-x-content-login',
	'mimetypes-x-content-menu',
	'mimetypes-x-content-multimedia',
	'mimetypes-x-content-page-language-overlay',
	'mimetypes-x-content-plugin',
	'mimetypes-x-content-script',
	'mimetypes-x-content-table',
	'mimetypes-x-content-template',
	'mimetypes-x-content-template-extension',
	'mimetypes-x-content-template-static',
	'mimetypes-x-content-text',
	'mimetypes-x-content-text-picture',
	'mimetypes-x-sys_action',
	'mimetypes-x-sys_category',
	'mimetypes-x-sys_language',
	'mimetypes-x-sys_news',
	'mimetypes-x-sys_workspace',
	'mimetypes-x_belayout',
	'status-dialog-error',
	'status-dialog-information',
	'status-dialog-notification',
	'status-dialog-ok',
	'status-dialog-warning',
	'status-overlay-access-restricted',
	'status-overlay-deleted',
	'status-overlay-hidden',
	'status-overlay-icon-missing',
	'status-overlay-includes-subpages',
	'status-overlay-locked',
	'status-overlay-scheduled',
	'status-overlay-scheduled-future-end',
	'status-overlay-translated',
	'status-status-checked',
	'status-status-current',
	'status-status-edit-read-only',
	'status-status-icon-missing',
	'status-status-locked',
	'status-status-permission-denied',
	'status-status-permission-granted',
	'status-status-readonly',
	'status-status-reference-hard',
	'status-status-reference-soft',
	'status-status-sorting-asc',
	'status-status-sorting-desc',
	'status-status-sorting-light-asc',
	'status-status-sorting-light-desc',
	'status-status-workspace-draft',
	'status-system-extension-required',
	'status-user-admin',
	'status-user-backend',
	'status-user-frontend',
	'status-user-group-backend',
	'status-user-group-frontend',
	'status-version-1',
	'status-version-2',
	'status-version-3',
	'status-version-4',
	'status-version-5',
	'status-version-6',
	'status-version-7',
	'status-version-8',
	'status-version-9',
	'status-version-10',
	'status-version-11',
	'status-version-12',
	'status-version-13',
	'status-version-14',
	'status-version-15',
	'status-version-16',
	'status-version-17',
	'status-version-18',
	'status-version-19',
	'status-version-20',
	'status-version-21',
	'status-version-22',
	'status-version-23',
	'status-version-24',
	'status-version-25',
	'status-version-26',
	'status-version-27',
	'status-version-28',
	'status-version-29',
	'status-version-30',
	'status-version-31',
	'status-version-32',
	'status-version-33',
	'status-version-34',
	'status-version-35',
	'status-version-36',
	'status-version-37',
	'status-version-38',
	'status-version-39',
	'status-version-40',
	'status-version-41',
	'status-version-42',
	'status-version-43',
	'status-version-44',
	'status-version-45',
	'status-version-46',
	'status-version-47',
	'status-version-48',
	'status-version-49',
	'status-version-50',
	'status-version-no-version',
	'status-warning-in-use',
	'status-warning-lock',
	'treeline-blank',
	'treeline-join',
	'treeline-joinbottom',
	'treeline-jointop',
	'treeline-line',
	'treeline-minus',
	'treeline-minusbottom',
	'treeline-minusonly',
	'treeline-minustop',
	'treeline-plus',
	'treeline-plusbottom',
	'treeline-plusonly',
	'treeline-stopper'
);


$GLOBALS['TBE_STYLES']['spriteIconApi']['spriteIconRecordOverlayPriorities'] = array(
	'deleted',
	'hidden',
	'starttime',
	'endtime',
	'futureendtime',
	'fe_group',
	'protectedSection'
);


$GLOBALS['TBE_STYLES']['spriteIconApi']['spriteIconRecordOverlayNames'] = array(
	'hidden' => 'status-overlay-hidden',
	'fe_group' => 'status-overlay-access-restricted',
	'starttime' => 'status-overlay-scheduled',
	'endtime' => 'status-overlay-scheduled',
	'futureendtime' => 'status-overlay-scheduled-future-end',
	'readonly' => 'status-overlay-locked',
	'deleted' => 'status-overlay-deleted',
	'missing' => 'status-overlay-missing',
	'translated' => 'status-overlay-translated',
	'protectedSection' => 'status-overlay-includes-subpages'
);

// add stylesheets from the core
$GLOBALS['TBE_STYLES']['skins']['core']['stylesheetDirectories']['Base'] = 'EXT:core/Resources/Public/StyleSheets/';

// Adding flags to the sprite manager
if (TYPO3_MODE === 'BE' || TYPO3_MODE === 'FE' && isset($GLOBALS['BE_USER'])) {
	$flagNames = array(
		'multiple',
		'ad', 'ae', 'af', 'ag', 'ai', 'al', 'am', 'an', 'ao', 'ar', 'as', 'at', 'au', 'aw', 'ax', 'az',
		'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bm', 'bn', 'bo', 'br', 'bs', 'bt', 'bv', 'bw', 'by', 'bz',
		'ca', 'catalonia', 'cc', 'cd', 'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr', 'cs', 'cu', 'cv', 'cx', 'cy', 'cz',
		'de', 'dj', 'dk', 'dm', 'do', 'dz',
		'ec', 'ee', 'eg', 'eh', 'england', 'er', 'es', 'et', 'europeanunion',
		'fam', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr',
		'ga', 'gb', 'gd', 'ge', 'gf', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp', 'gq', 'gr', 'gs', 'gt', 'gu', 'gw', 'gy',
		'hk', 'hm', 'hn', 'hr', 'ht', 'hu',
		'id', 'ie', 'il', 'in', 'io', 'iq', 'ir', 'is', 'it',
		'jm', 'jo', 'jp',
		'ke', 'kg', 'kh', 'ki', 'km', 'kn', 'kp', 'kr', 'kw', 'ky', 'kz',
		'la', 'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 'ly',
		'ma', 'mc', 'md', 'me', 'mg', 'mh', 'mk', 'ml', 'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 'mv', 'mw', 'mx', 'my', 'mz',
		'na', 'nc', 'ne', 'nf', 'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nu', 'nz',
		'om',
		'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 'pr', 'ps', 'pt', 'pw', 'py',
		'qa', 'qc',
		're', 'ro', 'rs', 'ru', 'rw',
		'sa', 'sb', 'sc', 'scotland', 'sd', 'se', 'sg', 'sh', 'si', 'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'st', 'sv', 'sy', 'sz',
		'tc', 'td', 'tf', 'tg', 'th', 'tj', 'tk', 'tl', 'tm', 'tn', 'to', 'tr', 'tt', 'tv', 'tw', 'tz',
		'ua', 'ug', 'um', 'us', 'uy', 'uz',
		'va', 'vc', 've', 'vg', 'vi', 'vn', 'vu',
		'wales', 'wf', 'ws',
		'ye', 'yt',
		'za', 'zm', 'zw'
	);

	$flagIcons = array();
	foreach ($flagNames as $flagName) {
		$flagIcons[] = 'flags-' . $flagName;
		$flagIcons[] = 'flags-' . $flagName . '-overlay';
	}
	\TYPO3\CMS\Backend\Sprite\SpriteManager::addIconSprite($flagIcons);
	unset($flagNames, $flagName, $flagIcons);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: backend
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/backend/ext_tables.php
 */

$_EXTKEY = 'backend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Register record edit module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'record_edit',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/FormEngine/'
	);

	// Register record history module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'record_history',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/RecordHistory/'
	);

	// Register login frameset
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'login_frameset',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/LoginFrameset/'
	);

	// Register logout
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'logout',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Logout/'
	);

	// Register file_navframe
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addCoreNavigationComponent('file', 'file_navframe');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'file_navframe',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/FileSystemNavigationFrame/'
	);

	// Register file_edit
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'file_edit',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/File/Edit/'
	);

	// Register file_newfolder
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'file_newfolder',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/File/Newfolder/'
	);

	// Register file_rename
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'file_rename',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/File/Rename/'
	);

	// Register file_rename
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'file_upload',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/File/Upload/'
	);

	// Register tce_db
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'tce_db',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/File/Database/'
	);

	// Register tce_file
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'tce_file',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/File/Administration/'
	);

	// Register edit wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_edit',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/EditWizard/'
	);

	// Register add wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_add',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/AddWizard/'
	);

	// Register list wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_list',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/ListWizard/'
	);

	// Register table wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_table',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/TableWizard/'
	);

	// Register rte wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_rte',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/RteWizard/'
	);

	// Register colorpicker wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_colorpicker',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/ColorpickerWizard/'
	);

	// Register backend_layout wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_backend_layout',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/BackendLayoutWizard/'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'layout',
		'top',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Layout/',
		array(
			'script' => '_DISPATCH',
			'access' => 'user,group',
			'name' => 'web_layout',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../../Resources/Public/Icons/module-page.png',
				),
				'll_ref' => 'LLL:EXT:cms/layout/locallang_mod.xlf',
			),
		)
	);

	// Register new record
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'db_new',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/NewRecord/'
	);

	// Register new content element module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'new_content_element',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/NewContentElement/'
	);

	// Register move element module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'move_element',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/MoveElement/'
	);

	// Register show item module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'show_item',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/ShowItem/'
	);

	// Register browser
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'browser',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Browser/'
	);

	// Register dummy window
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'dummy',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Dummy/'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: extensionmanager
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/extensionmanager/ext_tables.php
 */

$_EXTKEY = 'extensionmanager';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Extensionmanager',
		'tools',
		'extensionmanager', '', array(
			'List' => 'index,unresolvedDependencies,ter,showAllVersions,distributions',
			'Action' => 'toggleExtensionInstallationState,installExtensionWithoutSystemDependencyCheck,removeExtension,downloadExtensionZip,downloadExtensionData',
			'Configuration' => 'showConfigurationForm,save,saveAndClose',
			'Download' => 'checkDependencies,installFromTer,installExtensionWithoutSystemDependencyCheck,installDistribution,updateExtension,updateCommentForUpdatableVersions',
			'UpdateScript' => 'show',
			'UpdateFromTer' => 'updateExtensionListFromTer',
			'UploadExtensionFile' => 'form,extract',
			'Distribution' => 'show'
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:extensionmanager/Resources/Public/Icons/module-extensionmanager.png',
			'labels' => 'LLL:EXT:extensionmanager/Resources/Private/Language/locallang_mod.xlf',
		)
	);

	// Register extension status report system
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['Extension Manager'][] =
		\TYPO3\CMS\Extensionmanager\Report\ExtensionStatus::class;
}

// Register specific icon for update script button
\TYPO3\CMS\Backend\Sprite\SpriteManager::addSingleIcons(
	array(
		'update-script' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('extensionmanager') . 'Resources/Public/Images/Icons/ExtensionUpdateScript.png'
	),
	'extensionmanager'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: frontend
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/frontend/ext_tables.php
 */

$_EXTKEY = 'frontend';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Add allowed records to pages
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('pages_language_overlay,tt_content,sys_template,sys_domain,backend_layout');

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_layout', 'EXT:cms/locallang_csh_weblayout.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_info', 'EXT:cms/locallang_csh_webinfo.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_info',
		\TYPO3\CMS\Frontend\Controller\PageInformationController::class,
		NULL,
		'LLL:EXT:cms/locallang_tca.xlf:mod_tx_cms_webinfo_page'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_info',
		\TYPO3\CMS\Frontend\Controller\TranslationStatusController::class,
		NULL,
		'LLL:EXT:cms/locallang_tca.xlf:mod_tx_cms_webinfo_lang'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: extbase
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/extbase/ext_tables.php
 */

$_EXTKEY = 'extbase';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// register Extbase dispatcher for modules
	$TBE_MODULES['_dispatcher'][] = \TYPO3\CMS\Extbase\Core\ModuleRunnerInterface::class;
}
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['extbase'][] = \TYPO3\CMS\Extbase\Utility\ExtbaseRequirementsCheckUtility::class;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TYPO3\CMS\Extbase\Scheduler\Task::class] = array(
	'extension' => 'extbase',
	'title' => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xlf:task.name',
	'description' => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xlf:task.description',
	'additionalFields' => \TYPO3\CMS\Extbase\Scheduler\FieldProvider::class
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['checkFlexFormValue'][] = \TYPO3\CMS\Extbase\Hook\DataHandler\CheckFlexFormValue::class;

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: fluid
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/fluid/ext_tables.php
 */

$_EXTKEY = 'fluid';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid: (Optional) default ajax configuration');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: install
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/install/ext_tables.php
 */

$_EXTKEY = 'install';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Register report module additions
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['typo3'][] = \TYPO3\CMS\Install\Report\InstallStatusReport::class;
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['security'][] = \TYPO3\CMS\Install\Report\SecurityStatusReport::class;

	// Only add the environment status report if not in CLI mode
	if (!defined('TYPO3_cliMode') || !TYPO3_cliMode) {
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['system'][] = \TYPO3\CMS\Install\Report\EnvironmentStatusReport::class;
	}

	// Register backend module
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Install',
		'system',
		'install', '', array(
			'BackendModule' => 'index, showEnableInstallToolButton, enableInstallTool',
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:install/Resources/Public/Icons/module-install.png',
			'labels' => 'LLL:EXT:install/Resources/Private/Language/BackendModule.xlf',
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: lang
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/lang/ext_tables.php
 */

$_EXTKEY = 'lang';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {

	// Register the backend module
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Lang',
		'tools',
		'language',
		'after:extensionmanager',
		array(
			'Language' => 'listLanguages, listTranslations, getTranslations, updateLanguage, updateTranslation, activateLanguage, deactivateLanguage',
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:lang/Resources/Public/Images/module-lang.png',
			'labels' => 'LLL:EXT:lang/Resources/Private/Language/locallang_mod.xlf',
		)
	);

}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: sv
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/sv/ext_tables.php
 */

$_EXTKEY = 'sv';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['sv']['services'] = array(
		'title' => 'LLL:EXT:sv/Resources/Private/Language/locallang.xlf:report_title',
		'description' => 'LLL:EXT:sv/Resources/Private/Language/locallang.xlf:report_description',
		'icon' => 'EXT:sv/Resources/Public/Images/service-reports.png',
		'report' => \TYPO3\CMS\Sv\Report\ServicesListReport::class
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: recordlist
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/recordlist/ext_tables.php
 */

$_EXTKEY = 'recordlist';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'web_list',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'list',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/',
		array(
			'script' => '_DISPATCH',
			'access' => 'user,group',
			'name' => 'web_list',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-list.png',
				),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_web_list.xlf',
			),
		)
	);

	// Register element browser wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_element_browser',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/ElementBrowserWizard/'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: saltedpasswords
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/saltedpasswords/ext_tables.php
 */

$_EXTKEY = 'saltedpasswords';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Add context sensitive help (csh) for scheduler task
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_txsaltedpasswords', 'EXT:saltedpasswords/locallang_csh_saltedpasswords.xlf');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: t3skin
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/t3skin/ext_tables.php
 */

$_EXTKEY = 't3skin';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE' || TYPO3_MODE === 'FE' && isset($GLOBALS['BE_USER'])) {

	// Register as a skin
	$GLOBALS['TBE_STYLES']['skins']['t3skin'] = array(
		'name' => 't3skin'
	);

	// Support for other extensions to add own icons...
	$presetSkinImgs = is_array($GLOBALS['TBE_STYLES']['skinImg']) ? $GLOBALS['TBE_STYLES']['skinImg'] : array();
	$GLOBALS['TBE_STYLES']['skins']['t3skin']['stylesheetDirectories']['sprites'] = 'EXT:t3skin/stylesheets/sprites/';

	// Alternative dimensions for frameset sizes:
	// Left menu frame width
	$GLOBALS['TBE_STYLES']['dims']['leftMenuFrameW'] = 190;

	// Top frame height
	$GLOBALS['TBE_STYLES']['dims']['topFrameH'] = 45;

	// Default navigation frame width
	$GLOBALS['TBE_STYLES']['dims']['navFrameWidth'] = 280;

	// Setting up auto detection of alternative icons:
	$GLOBALS['TBE_STYLES']['skinImgAutoCfg'] = array(
		'absDir' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3skin') . 'icons/',
		'relDir' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3skin') . 'icons/',
		'forceFileExtension' => 'gif',
		// Force to look for PNG alternatives...
		'iconSizeWidth' => 16,
		'iconSizeHeight' => 16
	);

	// Changing icon for filemounts, needs to be done here as overwriting the original icon would also change the filelist tree's root icon
	$GLOBALS['TCA']['sys_filemounts']['ctrl']['iconfile'] = '_icon_ftp_2.gif';

	$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][1][2] = 'EXT:t3skin/images/icons/status/user-frontend.png';


	// Setting the relative path to the extension in temp. variable:
	$relativePathToExtension = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3skin');

	// Manual setting up of alternative icons. This is mainly for module icons which has a special prefix:
	$GLOBALS['TBE_STYLES']['skinImg'] = array_merge($presetSkinImgs, array(
		'gfx/ol/blank.gif' => array('clear.gif', 'width="18" height="16"'),
		'MOD:web/website.gif' => array($relativePathToExtension . 'icons/module_web.gif', 'width="24" height="24"'),
		'MOD:web_ts/ts1.gif' => array($relativePathToExtension . 'icons/module_web_ts.gif', 'width="24" height="24"'),
		'MOD:web_modules/modules.gif' => array($relativePathToExtension . 'icons/module_web_modules.gif', 'width="24" height="24"'),
		'MOD:web_txversionM1/cm_icon.gif' => array($relativePathToExtension . 'icons/module_web_version.gif', 'width="24" height="24"'),
		'MOD:file/file.gif' => array($relativePathToExtension . 'icons/module_file.gif', 'width="22" height="24"'),
		'MOD:file_images/images.gif' => array($relativePathToExtension . 'icons/module_file_images.gif', 'width="22" height="22"'),
		'MOD:user/user.gif' => array($relativePathToExtension . 'icons/module_user.gif', 'width="22" height="22"'),
		'MOD:user_doc/document.gif' => array($relativePathToExtension . 'icons/module_doc.gif', 'width="22" height="22"'),
		'MOD:tools/tool.gif' => array($relativePathToExtension . 'icons/module_tools.gif', 'width="25" height="24"'),
		'MOD:tools_txphpmyadmin/thirdparty_db.gif' => array($relativePathToExtension . 'icons/module_tools_phpmyadmin.gif', 'width="24" height="24"'),
		'MOD:help/help.gif' => array($relativePathToExtension . 'icons/module_help.gif', 'width="23" height="24"'),
		'MOD:help_txtsconfighelpM1/moduleicon.gif' => array($relativePathToExtension . 'icons/module_help_ts.gif', 'width="25" height="24"')
	));

	// extJS theme
	$GLOBALS['TBE_STYLES']['extJS']['theme'] = $relativePathToExtension . 'extjs/xtheme-t3skin.css';
	$GLOBALS['TBE_STYLES']['stylesheets']['admPanel'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('t3skin') . 'stylesheets/standalone/admin_panel.css';

	unset($relativePathToExtension);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: about
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/about/ext_tables.php
 */

$_EXTKEY = 'about';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Avoid that this block is loaded in frontend or within upgrade wizards
if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.About',
		'help',
		'about',
		'top',
		array('About' => 'index'),
		array(
			'access' => 'user,group',
			'icon' => 'EXT:about/Resources/Public/Icons/module-about.png',
			'labels' => 'LLL:EXT:lang/locallang_mod_help_about.xlf'
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: aboutmodules
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/aboutmodules/ext_tables.php
 */

$_EXTKEY = 'aboutmodules';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Avoid that this block is loaded in frontend or within upgrade wizards
if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Aboutmodules',
		'help',
		'aboutmodules',
		'after:about',
		array(
			'Modules' => 'index'
		),
		array(
			'access' => 'user,group',
			'icon' => 'EXT:aboutmodules/Resources/Public/Icons/module-aboutmodules.png',
			'labels' => 'LLL:EXT:aboutmodules/Resources/Private/Language/locallang_mod.xlf'
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: belog
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/belog/ext_tables.php
 */

$_EXTKEY = 'belog';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Register backend modules, but not in frontend or within upgrade wizards
if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	// Module Web->Info->Log
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_info',
		\TYPO3\CMS\Belog\Module\BackendLogModuleBootstrap::class,
		NULL,
		'Log'
	);

	// Module Tools->Log
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Belog',
		'system',
		'log',
		'',
		array(
			'Tools' => 'index',
			'WebInfo' => 'index',
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:belog/Resources/Public/Icons/module-belog.png',
			'labels' => 'LLL:EXT:belog/Resources/Private/Language/locallang_mod.xlf',
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: beuser
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/beuser/ext_tables.php
 */

$_EXTKEY = 'beuser';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Module System > Backend Users
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Beuser',
		'system',
		'tx_Beuser',
		'top',
		array(
			'BackendUser' => 'index, addToCompareList, removeFromCompareList, compare, online, terminateBackendUserSession',
			'BackendUserGroup' => 'index'
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:beuser/Resources/Public/Icons/module-beuser.png',
			'labels' => 'LLL:EXT:beuser/Resources/Private/Language/locallang_mod.xlf'
		)
	);

	// Module System > Access
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Beuser',
		'system',
		'tx_Permission',
		'top',
		array(
			'Permission' => 'index, edit, update'
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:beuser/Resources/Public/Icons/module-permission.png',
			'labels' => 'LLL:EXT:beuser/Resources/Private/Language/locallang_mod_permission.xlf',
			'navigationComponentId' => 'typo3-pagetree'
		)
	);

	// Register AJAX Controller
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('PermissionAjaxController::dispatch',
		\TYPO3\CMS\Beuser\Controller\PermissionAjaxController::class . '->dispatch');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: compatibility6
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/compatibility6/ext_tables.php
 */

$_EXTKEY = 'compatibility6';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_func',
		\TYPO3\CMS\Compatibility6\Controller\WebFunctionWizardsBaseController::class,
		NULL,
		'LLL:EXT:compatibility6/Resources/Private/Language/wizards.xlf:mod_wizards'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_func', 'EXT:compatibility6/Resources/Private/Language/wizards_csh.xlf');


	// Register forms wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_forms',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('compatibility6', 'Modules/Wizards/FormsWizard/')
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: context_help
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/context_help/ext_tables.php
 */

$_EXTKEY = 'context_help';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('fe_groups', 'EXT:context_help/locallang_csh_fe_groups.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('fe_users', 'EXT:context_help/locallang_csh_fe_users.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('pages', 'EXT:context_help/locallang_csh_pages.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('pages_language_overlay', 'EXT:context_help/locallang_csh_pageslol.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('static_template', 'EXT:context_help/locallang_csh_statictpl.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_domain', 'EXT:context_help/locallang_csh_sysdomain.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_file_storage', 'EXT:context_help/locallang_csh_sysfilestorage.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_template', 'EXT:context_help/locallang_csh_systmpl.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tt_content', 'EXT:context_help/locallang_csh_ttcontent.xlf');
// Labels for TYPO3 4.5 and greater.  These labels override the ones set above, while still falling back to the original labels if no translation is available.
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:context_help/locallang_csh_pages.xlf'][] = 'EXT:context_help/4.5/locallang_csh_pages.xlf';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:context_help/locallang_csh_ttcontent.xlf'][] = 'EXT:context_help/4.5/locallang_csh_ttcontent.xlf';

if (TYPO3_MODE === 'BE') {
	// Register AJAX Controller
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('ContextHelpAjaxController::dispatch',
		\TYPO3\CMS\ContextHelp\Controller\ContextHelpAjaxController::class . '->dispatch');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cshmanual
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/cshmanual/ext_tables.php
 */

$_EXTKEY = 'cshmanual';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'help',
		'cshmanual',
		'top',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod/',
		array(
			'script' => '_DISPATCH',
			'access' => 'user,group',
			'name' => 'help_cshmanual',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-cshmanual.png',
				),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_help_cshmanual.xlf',
			),
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: documentation
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/documentation/ext_tables.php
 */

$_EXTKEY = 'documentation';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Registers a Backend Module
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Documentation',
		'help',
		'documentation',
		'top',
		array(
			'Document' => 'list, download, fetch',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:documentation/Resources/Public/Icons/module-documentation.png',
			'labels' => 'LLL:EXT:documentation/Resources/Private/Language/locallang_mod.xlf',
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: filelist
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/filelist/ext_tables.php
 */

$_EXTKEY = 'filelist';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'file',
		'list',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/',
		array(
			'script' => '_DISPATCH',
			'access' => 'user,group',
			'name' => 'file_list',
			'workspaces' => 'online,custom',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-filelist.png',
				),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_file_list.xlf',
			),
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: form
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/form/ext_tables.php
 */

$_EXTKEY = 'form';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Register wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_form',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/FormWizard/'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: func
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/func/ext_tables.php
 */

$_EXTKEY = 'func';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'func',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/',
		array(
			'script' => '_DISPATCH',
			'access' => 'user,group',
			'name' => 'web_func',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-func.png',
				),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_web_func.xlf',
			),
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: impexp
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/impexp/ext_tables.php
 */

$_EXTKEY = 'impexp';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TBE_MODULES_EXT']['xMOD_alt_clickmenu']['extendCMclasses'][] = array(
		'name' => \TYPO3\CMS\Impexp\Clickmenu::class,
	);
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['taskcenter']['impexp']['tx_impexp_task'] = array(
		'title' => 'LLL:EXT:impexp/locallang_csh.xlf:.alttitle',
		'description' => 'LLL:EXT:impexp/locallang_csh.xlf:.description',
		'icon' => 'EXT:impexp/export.gif'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('xMOD_tx_impexp', 'EXT:impexp/locallang_csh.xlf');
	// CSH labels for TYPO3 4.5 and greater.  These labels override the ones set above, while still falling back to the original labels if no translation is available.
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:impexp/locallang_csh.xml'][] = 'EXT:impexp/locallang_csh_45.xlf';
	// Special context menu actions for the import/export module
	$importExportActions = '
		9000 = DIVIDER

		9100 = ITEM
		9100 {
			name = exportT3d
			label = LLL:EXT:impexp/app/locallang.xlf:export
			spriteIcon = actions-document-export-t3d
			callbackAction = exportT3d
		}

		9200 = ITEM
		9200 {
			name = importT3d
			label = LLL:EXT:impexp/app/locallang.xlf:import
			spriteIcon = actions-document-import-t3d
			callbackAction = importT3d
		}
	';
	// Context menu user default configuration
	$GLOBALS['TYPO3_CONF_VARS']['BE']['defaultUserTSconfig'] .= '
		options.contextMenu.table {
			virtual_root.items {
				' . $importExportActions . '
			}

			pages_root.items {
				' . $importExportActions . '
			}

			pages.items.1000 {
				' . $importExportActions . '
			}
		}
	';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath('xMOD_tximpexp', \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'app/');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: indexed_search
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/indexed_search/ext_tables.php
 */

$_EXTKEY = 'indexed_search';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Indexed Search (experimental)');

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.IndexedSearch',
		'web',
		'isearch',
		'',
		array(
			'Administration' => 'index,pages,externalDocuments,statistic,statisticDetails,deleteIndexedItem,saveStopwordsKeywords,wordDetail',
		),
		array(
			'access' => 'admin',
			'icon'   => 'EXT:indexed_search/Resources/Public/Icons/module-indexed_search.png',
			'labels' => 'LLL:EXT:indexed_search/mod/locallang_mod.xlf',
		)
	);

	$GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']['tx_indexed_search_pi_wizicon'] =
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'pi/class.tx_indexed_search_pi_wizicon.php';
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('index_config');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('index_config', 'EXT:indexed_search/locallang_csh_indexcfg.xlf');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: info
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/info/ext_tables.php
 */

$_EXTKEY = 'info';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'info',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/',
		array(
			'script' => '_DISPATCH',
			'access' => 'user,group',
			'name' => 'web_info',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-info.png',
				),
				'll_ref' => 'LLL:EXT:lang/locallang_mod_web_info.xlf',
			),
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: info_pagetsconfig
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/info_pagetsconfig/ext_tables.php
 */

$_EXTKEY = 'info_pagetsconfig';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_info',
		\TYPO3\CMS\InfoPagetsconfig\Controller\InfoPageTyposcriptConfigController::class,
		NULL,
		'LLL:EXT:info_pagetsconfig/locallang.xlf:mod_pagetsconfig'
	);
}
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_web_info', 'EXT:info_pagetsconfig/locallang_csh_webinfo.xlf');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: lowlevel
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/lowlevel/ext_tables.php
 */

$_EXTKEY = 'lowlevel';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'system',
		'dbint',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'dbint/',
		array(
			'script' => '_DISPATCH',
			'access' => 'admin',
			'name' => 'system_dbint',
			'workspaces' => 'online',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-dbint.png',
				),
				'll_ref' => 'LLL:EXT:lowlevel/dbint/locallang_mod.xlf',
			),
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'system',
		'config',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'config/',
		array(
			'script' => '_DISPATCH',
			'access' => 'admin',
			'name' => 'system_config',
			'workspaces' => 'online',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-config.png',
				),
				'll_ref' => 'LLL:EXT:lowlevel/config/locallang_mod.xlf',
			),
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: setup
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/setup/ext_tables.php
 */

$_EXTKEY = 'setup';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'user',
		'setup',
		'after:task',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod/',
		array(
			'script' => '_DISPATCH',
			'access' => 'group,user',
			'name' => 'user_setup',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-setup.png',
				),
				'll_ref' => 'LLL:EXT:setup/mod/locallang_mod.xlf',
			),
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
		'_MOD_user_setup',
		'EXT:setup/locallang_csh_mod.xlf'
	);

	$GLOBALS['TYPO3_USER_SETTINGS'] = array(
		'columns' => array(
			'realName' => array(
				'type' => 'text',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:beUser_realName',
				'table' => 'be_users',
				'csh' => 'beUser_realName'
			),
			'email' => array(
				'type' => 'email',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:beUser_email',
				'table' => 'be_users',
				'csh' => 'beUser_email'
			),
			'emailMeAtLogin' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:emailMeAtLogin',
				'csh' => 'emailMeAtLogin'
			),
			'password' => array(
				'type' => 'password',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:newPassword',
				'table' => 'be_users',
				'csh' => 'newPassword',
			),
			'password2' => array(
				'type' => 'password',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:newPasswordAgain',
				'table' => 'be_users',
				'csh' => 'newPasswordAgain',
			),
			'passwordCurrent' => array(
				'type' => 'password',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:passwordCurrent',
				'table' => 'be_users',
				'csh' => 'passwordCurrent',
			),
			'lang' => array(
				'type' => 'select',
				'itemsProcFunc' => \TYPO3\CMS\Setup\Controller\SetupModuleController::class . '->renderLanguageSelect',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:language',
				'csh' => 'language'
			),
			'startModule' => array(
				'type' => 'select',
				'itemsProcFunc' => \TYPO3\CMS\Setup\Controller\SetupModuleController::class . '->renderStartModuleSelect',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:startModule',
				'csh' => 'startModule'
			),
			'thumbnailsByDefault' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:showThumbs',
				'csh' => 'showThumbs'
			),
			'titleLen' => array(
				'type' => 'text',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:maxTitleLen',
				'csh' => 'maxTitleLen'
			),
			'edit_RTE' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:edit_RTE',
				'csh' => 'edit_RTE'
			),
			'edit_docModuleUpload' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:edit_docModuleUpload',
				'csh' => 'edit_docModuleUpload'
			),
			'showHiddenFilesAndFolders' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:showHiddenFilesAndFolders',
				'csh' => 'showHiddenFilesAndFolders'
			),
			'copyLevels' => array(
				'type' => 'text',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:copyLevels',
				'csh' => 'copyLevels'
			),
			'recursiveDelete' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:recursiveDelete',
				'csh' => 'recursiveDelete'
			),
			'resetConfiguration' => array(
				'type' => 'button',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:resetConfiguration',
				'buttonlabel' => 'LLL:EXT:setup/mod/locallang.xlf:resetConfigurationShort',
				'csh' => 'reset',
				'onClick' => 'if (confirm(\'%s\')) { document.getElementById(\'setValuesToDefault\').value = 1; this.form.submit(); }',
				'onClickLabels' => array(
					'LLL:EXT:setup/mod/locallang.xlf:setToStandardQuestion'
				)
			),
			'clearSessionVars' => array(
				'type' => 'button',
				'access' => 'admin',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:clearSessionVars',
				'buttonlabel' => 'LLL:EXT:setup/mod/locallang.xlf:clearSessionVarsShort',
				'csh' => 'reset',
				'onClick' => 'if (confirm(\'%s\')) { document.getElementById(\'clearSessionVars\').value = 1; this.form.submit(); }',
				'onClickLabels' => array(
					'LLL:EXT:setup/mod/locallang.xlf:clearSessionVarsQuestion'
				)
			),
			'resizeTextareas_Flexible' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:resizeTextareas_Flexible',
				'csh' => 'resizeTextareas_Flexible'
			),
			'resizeTextareas_MaxHeight' => array(
				'type' => 'text',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:flexibleTextareas_MaxHeight',
				'csh' => 'flexibleTextareas_MaxHeight'
			),
			'debugInWindow' => array(
				'type' => 'check',
				'label' => 'LLL:EXT:setup/mod/locallang.xlf:debugInWindow',
				'access' => 'admin'
			)
		),
		'showitem' => '--div--;LLL:EXT:setup/mod/locallang.xlf:personal_data,realName,email,emailMeAtLogin,lang,
				--div--;LLL:EXT:setup/mod/locallang.xml:passwordHeader,passwordCurrent,password,password2,
				--div--;LLL:EXT:setup/mod/locallang.xlf:opening,startModule,thumbnailsByDefault,titleLen,
				--div--;LLL:EXT:setup/mod/locallang.xlf:editFunctionsTab,edit_RTE,edit_docModuleUpload,showHiddenFilesAndFolders,resizeTextareas_Flexible,resizeTextareas_MaxHeight,copyLevels,recursiveDelete,resetConfiguration,clearSessionVars,
				--div--;LLL:EXT:setup/mod/locallang.xlf:adminFunctions,debugInWindow'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: openid
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/openid/ext_tables.php
 */

$_EXTKEY = 'openid';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Register wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_openid',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'wizard/'
	);

	// Add field to setup module
	$GLOBALS['TYPO3_USER_SETTINGS']['columns']['tx_openid_openid'] = array(
		'type' => 'user',
		'table' => 'be_users',
		'label' => 'LLL:EXT:openid/locallang_db.xlf:_MOD_user_setup.tx_openid_openid',
		'csh' => 'tx_openid_openid',
		'userFunc' => \TYPO3\CMS\Openid\OpenidModuleSetup::class . '->renderOpenID',
		'access' => \TYPO3\CMS\Openid\OpenidModuleSetup::class
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToUserSettings('tx_openid_openid', 'after:password2');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: recycler
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/recycler/ext_tables.php
 */

$_EXTKEY = 'recycler';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Recycler',
		'web',
		'Recycler',
		'',
		array(
			'RecyclerModule' => 'index',
		),
		array(
			'access' => 'user,group',
			'icon' => 'EXT:recycler/Resources/Public/Icons/module-recycler.png',
			'labels' => 'LLL:EXT:recycler/Resources/Private/Language/locallang_mod.xlf',
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: reports
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/reports/ext_tables.php
 */

$_EXTKEY = 'reports';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Reports',
		'system',
		'txreportsM1',
		'',
		array(
			'Report' => 'index,detail'
		), array(
			'access' => 'admin',
			'icon' => 'EXT:reports/Resources/Public/Icons/module-reports.png',
			'labels' => 'LLL:EXT:reports/Resources/Private/Language/locallang.xlf'
		)
	);
	$statusReport = array(
		'title' => 'LLL:EXT:reports/reports/locallang.xlf:status_report_title',
		'icon' => 'EXT:reports/Resources/Public/Icons/module-reports.png',
		'description' => 'LLL:EXT:reports/reports/locallang.xlf:status_report_description',
		'report' => \TYPO3\CMS\Reports\Report\Status\Status::class
	);
	if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status'])) {
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status'] = array();
	}
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status'] = array_merge($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status'], $statusReport);
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['typo3'][] = \TYPO3\CMS\Reports\Report\Status\Typo3Status::class;
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['system'][] = \TYPO3\CMS\Reports\Report\Status\SystemStatus::class;
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['security'][] = \TYPO3\CMS\Reports\Report\Status\SecurityStatus::class;
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['configuration'][] = \TYPO3\CMS\Reports\Report\Status\ConfigurationStatus::class;
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['fal'][] = \TYPO3\CMS\Reports\Report\Status\FalStatus::class;
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: rtehtmlarea
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/rtehtmlarea/ext_tables.php
 */

$_EXTKEY = 'rtehtmlarea';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Add static template for Click-enlarge rendering
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('rtehtmlarea', 'static/clickenlarge/', 'Clickenlarge Rendering');

// Add Abbreviation records (as of 7.0 not working in Configuration/TCA/Overrides)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rtehtmlarea_acronym');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rtehtmlarea_acronym', 'EXT:rtehtmlarea/locallang_csh_abbreviation.xlf');

// Add contextual help files
$htmlAreaRteContextHelpFiles = array(
	'General' => 'EXT:rtehtmlarea/locallang_csh.xlf',
	'Abbreviation' => 'EXT:rtehtmlarea/extensions/Abbreviation/locallang_csh.xlf',
	'EditElement' => 'EXT:rtehtmlarea/extensions/EditElement/locallang_csh.xlf',
	'Language' => 'EXT:rtehtmlarea/extensions/Language/locallang_csh.xlf',
	'MicrodataSchema' => 'EXT:rtehtmlarea/extensions/MicrodataSchema/locallang_csh.xlf',
	'PlainText' => 'EXT:rtehtmlarea/extensions/PlainText/locallang_csh.xlf',
	'RemoveFormat' => 'EXT:rtehtmlarea/extensions/RemoveFormat/locallang_csh.xlf',
	'TableOperations' => 'EXT:rtehtmlarea/extensions/TableOperations/locallang_csh.xlf'
);
foreach ($htmlAreaRteContextHelpFiles as $key => $file) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('xEXT_rtehtmlarea_' . $key, $file);
}
unset($htmlAreaRteContextHelpFiles);

// Extend TYPO3 User Settings Configuration
if (TYPO3_MODE === 'BE' && \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('setup') && is_array($GLOBALS['TYPO3_USER_SETTINGS'])) {
	$GLOBALS['TYPO3_USER_SETTINGS']['columns'] = array_merge($GLOBALS['TYPO3_USER_SETTINGS']['columns'], array(
		'rteWidth' => array(
			'type' => 'text',
			'label' => 'LLL:EXT:rtehtmlarea/locallang.xlf:rteWidth',
			'csh' => 'xEXT_rtehtmlarea_General:rteWidth'
		),
		'rteHeight' => array(
			'type' => 'text',
			'label' => 'LLL:EXT:rtehtmlarea/locallang.xlf:rteHeight',
			'csh' => 'xEXT_rtehtmlarea_General:rteHeight'
		),
		'rteResize' => array(
			'type' => 'check',
			'label' => 'LLL:EXT:rtehtmlarea/locallang.xlf:rteResize',
			'csh' => 'xEXT_rtehtmlarea_General:rteResize'
		),
		'rteMaxHeight' => array(
			'type' => 'text',
			'label' => 'LLL:EXT:rtehtmlarea/locallang.xlf:rteMaxHeight',
			'csh' => 'xEXT_rtehtmlarea_General:rteMaxHeight'
		),
		'rteCleanPasteBehaviour' => array(
			'type' => 'select',
			'label' => 'LLL:EXT:rtehtmlarea/htmlarea/plugins/PlainText/locallang.xlf:rteCleanPasteBehaviour',
			'items' => array(
				'plainText' => 'LLL:EXT:rtehtmlarea/htmlarea/plugins/PlainText/locallang.xlf:plainText',
				'pasteStructure' => 'LLL:EXT:rtehtmlarea/htmlarea/plugins/PlainText/locallang.xlf:pasteStructure',
				'pasteFormat' => 'LLL:EXT:rtehtmlarea/htmlarea/plugins/PlainText/locallang.xlf:pasteFormat'
			),
			'csh' => 'xEXT_rtehtmlarea_PlainText:behaviour'
		)
	));
	$GLOBALS['TYPO3_USER_SETTINGS']['showitem'] .= ',--div--;LLL:EXT:rtehtmlarea/locallang.xlf:rteSettings,rteWidth,rteHeight,rteResize,rteMaxHeight,rteCleanPasteBehaviour';
}
if (TYPO3_MODE === 'BE') {
	// Register RTE browse links wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'rtehtmlarea_wizard_browse_links',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/BrowseLinks/'
	);

	// Register RTE select image wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'rtehtmlarea_wizard_select_image',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/SelectImage/'
	);

	// Register RTE user elements wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'rtehtmlarea_wizard_user_elements',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/UserElements/'
	);

	// Register RTE parse html wizard
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'rtehtmlarea_wizard_parse_html',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/ParseHtml/'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: scheduler
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/scheduler/ext_tables.php
 */

$_EXTKEY = 'scheduler';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Add module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'system',
		'txschedulerM1',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/',
		array(
			'script' => '_DISPATCH',
			'access' => 'admin',
			'name' => 'system_txschedulerM1',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-scheduler.png',
				),
				'll_ref' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang_mod.xlf',
			),
		)
	);

	// Add context sensitive help (csh) to the backend module
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
		'_MOD_system_txschedulerM1',
		'EXT:scheduler/Resources/Private/Language/locallang_csh_scheduler.xlf'
	);
}

// Register specific icon for run task button
\TYPO3\CMS\Backend\Sprite\SpriteManager::addSingleIcons(
	array(
		'run-task' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('scheduler') . 'Resources/Public/Images/Icons/RunTask.png'
	),
	'scheduler'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: sys_action
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/sys_action/ext_tables.php
 */

$_EXTKEY = 'sys_action';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_action', 'EXT:sys_action/locallang_csh_sysaction.xlf');
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['taskcenter']['sys_action']['tx_sysaction_task'] = array(
		'title' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action',
		'description' => 'LLL:EXT:sys_action/locallang_csh_sysaction.xlf:.description',
		'icon' => 'EXT:sys_action/Resources/Public/Images/x-sys_action.png'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: sys_note
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/sys_note/ext_tables.php
 */

$_EXTKEY = 'sys_note';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('sys_note');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('sys_note', 'EXT:sys_note/Resources/Private/Language/locallang_csh_sysnote.xlf');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: t3editor
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/t3editor/ext_tables.php
 */

$_EXTKEY = 't3editor';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	// Register AJAX handlers:
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('T3Editor::saveCode', \TYPO3\CMS\T3editor\T3editor::class . '->ajaxSaveCode');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('T3Editor::getPlugins', \TYPO3\CMS\T3editor\T3editor::class . '->getPlugins');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('T3Editor_TSrefLoader::getTypes', \TYPO3\CMS\T3editor\TypoScriptReferenceLoader::class . '->processAjaxRequest');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('T3Editor_TSrefLoader::getDescription', \TYPO3\CMS\T3editor\TypoScriptReferenceLoader::class . '->processAjaxRequest');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler('CodeCompletion::loadTemplates', \TYPO3\CMS\T3editor\CodeCompletion::class . '->processAjaxRequest');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: taskcenter
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/taskcenter/ext_tables.php
 */

$_EXTKEY = 'taskcenter';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'tools_txtaskcenterM1',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'task/'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'user',
		'task',
		'top',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'task/',
		array(
			'script' => '_DISPATCH',
			'access' => 'group,user',
			'name' => 'user_task',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-taskcenter.png',
				),
				'll_ref' => 'LLL:EXT:taskcenter/task/locallang_mod.xlf',
			),
		)
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
		'Taskcenter::saveCollapseState',
		\TYPO3\CMS\Taskcenter\TaskStatus::class . '->saveCollapseState'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler(
		'Taskcenter::saveSortingState',
		\TYPO3\CMS\Taskcenter\TaskStatus::class . '->saveSortingState'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: tstemplate
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/tstemplate/ext_tables.php
 */

$_EXTKEY = 'tstemplate';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'ts',
		'',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('tstemplate') . 'ts/',
		array(
			'script' => '_DISPATCH',
			'access' => 'admin',
			'name' => 'web_ts',
			'labels' => array(
				'tabs_images' => array(
					'tab' => '../Resources/Public/Icons/module-tstemplate.png',
				),
				'll_ref' => 'LLL:EXT:tstemplate/ts/locallang_mod.xlf',
			),
		)
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_ts',
		\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateConstantEditorModuleFunctionController::class,
		NULL,
		'LLL:EXT:tstemplate/ts/locallang.xlf:constantEditor'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_ts',
		\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateInformationModuleFunctionController::class,
		NULL,
		'LLL:EXT:tstemplate/ts/locallang.xlf:infoModify'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_ts',
		\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateObjectBrowserModuleFunctionController::class,
		NULL,
		'LLL:EXT:tstemplate/ts/locallang.xlf:objectBrowser'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_ts',
		\TYPO3\CMS\Tstemplate\Controller\TemplateAnalyzerModuleFunctionController::class,
		NULL,
		'LLL:EXT:tstemplate/ts/locallang.xlf:templateAnalyzer'
	);

}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: viewpage
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/viewpage/ext_tables.php
 */

$_EXTKEY = 'viewpage';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	// Module Web->View
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'TYPO3.CMS.Viewpage',
		'web',
		'view',
		'after:layout',
		array(
			'ViewModule' => 'show'
		),
		array(
			'icon' => 'EXT:viewpage/Resources/Public/Icons/module-viewpage.png',
			'labels' => 'LLL:EXT:viewpage/Resources/Private/Language/locallang_mod.xlf',
			'access' => 'user,group'
		)
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: wizard_crpages
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/wizard_crpages/ext_tables.php
 */

$_EXTKEY = 'wizard_crpages';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_func',
		\TYPO3\CMS\WizardCrpages\Controller\CreatePagesWizardModuleFunctionController::class,
		NULL,
		'LLL:EXT:wizard_crpages/locallang.xlf:wiz_crMany'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
		'_MOD_web_func',
		'EXT:wizard_crpages/locallang_csh.xlf'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: wizard_sortpages
 * File: /var/www/virtual/loop/html/hostweb/typo3/sysext/wizard_sortpages/ext_tables.php
 */

$_EXTKEY = 'wizard_sortpages';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_func',
		\TYPO3\CMS\WizardSortpages\View\SortPagesWizardModuleFunction::class,
		NULL,
		'LLL:EXT:wizard_sortpages/locallang.xlf:wiz_sort'
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
		'_MOD_web_func',
		'EXT:wizard_sortpages/locallang_csh.xlf'
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: toctoc_comments
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/toctoc_comments/ext_tables.php
 */

$_EXTKEY = 'toctoc_comments';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];



if (!defined('TYPO3_MODE')) die('Access denied.');

if (version_compare(TYPO3_version, '6.3', '>')) {
	(class_exists('t3lib_extMgm', FALSE)) ? TRUE : class_alias('\TYPO3\CMS\Core\Utility\ExtensionManagementUtility', 't3lib_extMgm');
	(class_exists('t3lib_div', FALSE)) ? TRUE : class_alias('TYPO3\CMS\Core\Utility\GeneralUtility', 't3lib_div');
}
// Add static files for plugins
t3lib_extMgm::addStaticFile($_EXTKEY, 'static/', 'AJAX Social Network Components');

// Add pi1 plugin
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] = 'pi_flexform';
t3lib_extMgm::addPlugin(Array('LLL:EXT:toctoc_comments/pi1/locallang.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'), 'list_type');
if (version_compare(TYPO3_version, '4.2', '<')) {
	// Pre-4.2 dies if flexform has references to sheets
	require_once(t3lib_extMgm::extPath('toctoc_comments', 'flexform_functions.php'));
	t3lib_extMgm::addPiFlexFormValue($_EXTKEY .'_pi1', toctoc_comments_makeTempFlexFormDS());
}
else {
	// 4.2 or newer works fine with flexforms
	t3lib_extMgm::addPiFlexFormValue($_EXTKEY .'_pi1', 'FILE:EXT:toctoc_comments/pi1/flexform_ds.xml');
}

if (version_compare(TYPO3_version, '6.0', '<')) {
	if (TYPO3_MODE=='BE') {
		include_once(t3lib_extMgm::extPath($_EXTKEY).'class.user_toctoc_comments_toctoc_comments.php');
	}
}

t3lib_extMgm::addLLrefForTCAdescr('tt_content.pi_flexform.toctoc_comments_pi1.list', 'EXT:toctoc_comments/pi1/locallang_csh.xml');

// Comments table
$TCA['tx_toctoc_comments_comments'] = array(
	'ctrl' => array (
		'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_comments',
		'label' => 'content',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'sortby' => 'crdate',
		'default_sortby' => ' ORDER BY crdate DESC',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments.gif',
		//'type' => 'approved',
		'typeicon_column' => 'approved',
		'typeicons' => array(
			'0' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_toctoc_comments_not_approved.gif',
			'1' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_toctoc_comments.gif',
		),
	)
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_comments');
//t3lib_extMgm::addToInsertRecords('tx_toctoc_comments_comments');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_comments', 'EXT:toctoc_comments/locallang_csh.xml');

// Comments to FeUser table
$TCA['tx_toctoc_comments_feuser_mm'] = array(
	'ctrl' => array (
		'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_feuser_mm',
		'label' => 'toctoc_comments_user',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'sortby' => 'crdate',
		'delete' => 'deleted',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_feuser_mm.gif',
		'hideTable'	=> $toctoc_ratings_debug_mode_disabled,

	)
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_feuser_mm');
//t3lib_extMgm::addToInsertRecords('tx_toctoc_comments_feuser_mm');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_feuser_mm', 'EXT:toctoc_comments/locallang_csh.xml');

// Comments to Comments User
$TCA['tx_toctoc_comments_user'] = array(
		'ctrl' => array (
				'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_user',
				'label' => 'toctoc_comments_user',
				'tstamp' => 'tstamp',
				'crdate' => 'crdate',
				'sortby' => 'crdate',
				'delete' => 'deleted',
				'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
				'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_user.gif',
		)
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_user');
//t3lib_extMgm::addToInsertRecords('tx_toctoc_comments_user');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_user', 'EXT:toctoc_comments/locallang_csh.xml');

$TCA['tx_toctoc_comments_urllog'] = array(
	'ctrl' => array (
		'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_urllog',
		'label' => 'external_ref',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'sortby' => 'external_ref',
		'delete' => 'deleted',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_urllog.gif',
		'hideTable'	=> $toctoc_ratings_debug_mode_disabled,

	)
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_urllog');
//t3lib_extMgm::addToInsertRecords('tx_toctoc_comments_urllog');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_urllog', 'EXT:toctoc_comments/locallang_csh.xml');


if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['user_toctoc_comments_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.user_toctoc_comments_pi1_wizicon.php';
}

$TCA['tx_toctoc_ratings_scope'] = array (
	'ctrl' => array (
		'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_ratings_scope',
		'label' => 'scope_title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'origUid' => 't3_origuid',
		'shadowColumnsForNewPlaceholders' => 'sys_language_uid,l18n_parent',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_ratings_scope.gif',
	),
	'feInterface' => array (
		'fe_admin_fieldList' => 'scope_title, sys_language_uid, l18n_parent, l18n_diffsource, scope_description, display_order, hidden',
	)
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_ratings_scope');
t3lib_extMgm::addToInsertRecords('tx_toctoc_ratings_scope');


$TCA['tx_toctoc_ratings_data'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_ratings_data',
		'label'     => 'reference',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate DESC',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_ratings_data.gif',
		'hideTable'	=> $toctoc_ratings_debug_mode_disabled,
		'readOnly'	=> $toctoc_ratings_debug_mode_disabled,
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_ratings_data');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_ratings_data', 'EXT:toctoc_comments/locallang_csh.xml');

$TCA['tx_toctoc_ratings_iplog'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_ratings_iplog',
		'label'     => 'reference',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate DESC',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_ratings_iplog.gif',
		'hideTable'	=> $toctoc_ratings_debug_mode_disabled,
		'readOnly'	=> $toctoc_ratings_debug_mode_disabled,
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_ratings_iplog');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_ratings_iplog', 'EXT:toctoc_comments/locallang_csh.xml');

$TCA['tx_toctoc_comments_spamwords'] = array (
		'ctrl' => array (
				'title'     => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_spamwords',
				'label'     => 'spamword',
				'tstamp'    => 'tstamp',
				'crdate'    => 'crdate',
				'cruser_id' => 'cruser_id',
				'default_sortby' => 'ORDER BY spamword',
				'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
				'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_spamwords.gif',
		),
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_spamwords');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_spamwords', 'EXT:toctoc_comments/locallang_csh.xml');

// Attachments table
$TCA['tx_toctoc_comments_attachment'] = array(
		'ctrl' => array (
				'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_attachment',
				'label' => 'title',
				'tstamp' => 'tstamp',
				'crdate' => 'crdate',
				'sortby' => 'crdate',
				'default_sortby' => ' ORDER BY crdate DESC',
				'delete' => 'deleted',
				'enablecolumns' => array (
						'disabled' => 'hidden',
				),
				'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
				'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_attachment.gif',
				'MM' => 'tx_toctoc_comments_attachment_mm',

		)
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_attachment');
//t3lib_extMgm::addToInsertRecords('tx_toctoc_comments_comments');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_attachment', 'EXT:toctoc_comments/locallang_csh.xml');

// prefixtotable table
$TCA['tx_toctoc_comments_prefixtotable'] = array(
		'ctrl' => array (
				'title' => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_prefixtotable',
				'label' => 'pi1_key',
				'tstamp' => 'tstamp',
				'crdate' => 'crdate',
				'sortby' => 'crdate',
				'default_sortby' => ' ORDER BY crdate DESC',
				'delete' => 'deleted',
				'enablecolumns' => array (
						'disabled' => 'hidden',
				),
				'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
				'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_prefixtotable.gif',

		),
		'feInterface' => array (
			'fe_admin_fieldList' => 'uid,pi1_key,pi1_table,show_uid,displayfields,topratingsdetailpage,topratingsimagesfolder',
		),
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_prefixtotable');
t3lib_extMgm::addToInsertRecords('tx_toctoc_comments_prefixtotable');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_prefixtotable', 'EXT:toctoc_comments/locallang_csh.xml');

$TCA['tx_toctoc_comments_ipbl_local'] = array (
		'ctrl' => array (
				'title'     => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_ipbl_local',
				'label'     => 'ipaddr',
				'tstamp'    => 'tstamp',
				'crdate'    => 'crdate',
				'cruser_id' => 'cruser_id',
				'default_sortby' => 'ORDER BY ipaddr',
				'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
				'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_ipbl_local.gif',
				'rootLevel' => -1,
		),
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_ipbl_local');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_ipbl_local', 'EXT:toctoc_comments/locallang_csh.xml');

$TCA['tx_toctoc_comments_ipbl_static'] = array (
		'ctrl' => array (
				'title'     => 'LLL:EXT:toctoc_comments/locallang_db.xml:tx_toctoc_comments_ipbl_static',
				'label'     => 'ipaddr',
				'tstamp'    => 'tstamp',
				'crdate'    => 'crdate',
				'cruser_id' => 'cruser_id',
				'default_sortby' => 'ORDER BY ipaddr',
				'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
				'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_toctoc_comments_ipbl_static.gif',
		),
);
t3lib_extMgm::allowTableOnStandardPages('tx_toctoc_comments_ipbl_static');
t3lib_extMgm::addLLrefForTCAdescr('tx_toctoc_comments_ipbl_static', 'EXT:toctoc_comments/locallang_csh.xml');

// facebook connect
$tempColumns = array (
		'tx_toctoc_comments_facebook_id' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.toctoc_comments_id',
				'config' => array (
						'type' => 'input',
						'size' => '20',
				)
		),
		'tx_toctoc_comments_facebook_link' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.toctoc_comments_link',
				'config' => array (
						'type'     => 'input',
						'size'     => '30',
						'max'      => '255',
						'checkbox' => '',
						'eval'     => 'trim',
						'wizards'  => array(
								'_PADDING' => 2,
								'link'     => array(
										'type'         => 'popup',
										'title'        => 'Link',
										'icon'         => 'link_popup.gif',
										'script'       => 'browse_links.php?mode=wizard',
										'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
								)
						)
				)
		),
		'tx_toctoc_comments_facebook_gender' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.toctoc_comments_gender',
				'config' => array (
						'type' => 'input',
						'size' => '5',
				)
		),
		'tx_toctoc_comments_facebook_email' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.toctoc_comments_email',
				'config' => array (
						'type' => 'input',
						'size' => '30',
				)
		),
		'tx_toctoc_comments_facebook_locale' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.tx_toctoc_comments_facebook_locale',
				'config' => array (
						'type' => 'input',
						'size' => '5',
						'max' => '5',
						'eval' => 'trim',
				)
		),
		'tx_toctoc_comments_facebook_updated_time' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.tx_toctoc_comments_facebook_updated_time',
				'config' => array (
						'type' => 'input',
						'size' => '15',
						'max' => '25',
						'eval' => 'trim',
				)
		),
		'gender' => array (
				'exclude' => '1',
				'label' => 'LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.gender',
				'config' => array (
						'type' => 'radio',
						'items' => array (
								array('LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.gender.I.0', '0'),
								array('LLL:EXT:toctoc_comments/locallang_db.xml:fe_users.gender.I.1', '1')
						),
				)
		),
);
if (version_compare(TYPO3_branch, '6.1', '<')) {
	t3lib_div::loadTCA('fe_users');
}

if($TCA['fe_users']['columns']['gender']) {
	unset($tempColumns['gender']);
}
t3lib_extMgm::addTCAcolumns('fe_users', $tempColumns, 1);
$sgender = '';
$sgenderadd = FALSE;
if (str_replace('gender,', '', $TCA['fe_users']['feInterface']['fe_admin_fieldList'] ) == $TCA['fe_users']['feInterface']['fe_admin_fieldList'] ) {
	$sgender = ',gender';
	$sgenderadd = TRUE;
}
$TCA['fe_users']['feInterface']['fe_admin_fieldList'] .= ',tx_toctoc_comments_facebook_id,tx_toctoc_comments_facebook_link,tx_toctoc_comments_facebook_email,tx_toctoc_comments_facebook_gender,tx_toctoc_comments_facebook_locale,tx_toctoc_comments_facebook_updated_time' . $sgender;
$sgender = '';
if (str_replace('gender,', '', $TCA['fe_users']['feInterface']['showRecordFieldList'] ) == $TCA['fe_users']['feInterface']['showRecordFieldList'] ) {
	$sgender = ',gender';
	$sgenderadd = TRUE;
}
$TCA['fe_users']['interface']['showRecordFieldList'] .= ',tx_toctoc_comments_facebook_id,tx_toctoc_comments_facebook_link,tx_toctoc_comments_facebook_email,tx_toctoc_comments_facebook_gender,tx_toctoc_comments_facebook_locale,tx_toctoc_comments_facebook_updated_time' . $sgender;
if ($sgenderadd == TRUE) {
	t3lib_extMgm::addToAllTCATypes('fe_users', '--div--;toctoc comments,tx_toctoc_comments_facebook_id;;;;1-1-1,tx_toctoc_comments_facebook_link,tx_toctoc_comments_facebook_email,tx_toctoc_comments_facebook_gender,tx_toctoc_comments_facebook_locale,tx_toctoc_comments_facebook_updated_time,gender');
} else {
	t3lib_extMgm::addToAllTCATypes('fe_users', '--div--;toctoc comments,tx_toctoc_comments_facebook_id;;;;1-1-1,tx_toctoc_comments_facebook_link,tx_toctoc_comments_facebook_email,tx_toctoc_comments_facebook_gender,tx_toctoc_comments_facebook_locale,tx_toctoc_comments_facebook_updated_time');
}

// from commentbe
if (TYPO3_MODE == 'BE') {
	t3lib_extMgm::addModulePath('web_toctoccommentsbeM1', t3lib_extMgm::extPath($_EXTKEY) . 'mod1/');
	t3lib_extMgm::addModule('web', 'toctoccommentsbeM1', '', t3lib_extMgm::extPath($_EXTKEY) . 'mod1/');
}



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: t3socials
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/t3socials/ext_tables.php
 */

$_EXTKEY = 't3socials';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}


/* *** **************** *** *
 * *** BE Module Config *** *
 * *** **************** *** */
if (TYPO3_MODE == 'BE') {
	// Einbindung einer PageTSConfig
	t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . 't3socials' . '/mod/pageTSconfig.txt">');

	// communicator
	t3lib_extMgm::addModule('user', 'txt3socialsM1', '', t3lib_extMgm::extPath('t3socials') . 'mod/');
	t3lib_extMgm::insertModuleFunction(
		'user_txt3socialsM1', 'tx_t3socials_mod_Communicator',
		t3lib_extMgm::extPath('t3socials', 'mod/class.tx_t3socials_mod_Communicator.php'),
		'LLL:EXT:t3socials/mod/locallang.xml:label_t3socials_connector'
	);
	// trigger
	t3lib_extMgm::insertModuleFunction(
		'user_txt3socialsM1', 'tx_t3socials_mod_Trigger',
		t3lib_extMgm::extPath('t3socials', 'mod/class.tx_t3socials_mod_Trigger.php'),
		'LLL:EXT:t3socials/mod/locallang.xml:label_t3socials_trigger'
	);

}

/* *** *************** *** *
 * *** TCA definitions *** *
 * *** *************** *** */
$TCA['tx_t3socials_networks'] = array (
	'ctrl' => array (
		'title' => 'LLL:EXT:t3socials/Resources/Private/Language/locallang_db.xml:tx_t3socials_networks',
		'label' => 'name',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'default_sortby' => 'ORDER BY name asc',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'requestUpdate' => 'network',
		'dynamicConfigFile' => t3lib_extMgm::extPath('t3socials', 'Configuration/TCA/Network.php'),
		'iconfile'          => t3lib_extMgm::extRelPath('t3socials', 'ext_icon.gif'),
	),
	'feInterface' => array (
		'fe_admin_fieldList' => 'name,username,password,config',
	)
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: t3_less
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/t3_less/ext_tables.php
 */

$_EXTKEY = 't3_less';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if( !defined( 'TYPO3_MODE' ) )
{
	die( 'Access denied.' );
}

t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript', 'less' );


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: static_info_tables
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/static_info_tables/ext_tables.php
 */

$_EXTKEY = 'static_info_tables';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

// Configure extension static template
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Static', 'Static Info Tables');

if (TYPO3_MODE == 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	/**
	 * Registers the Static Info Tables Manager backend module, if enabled
	 */
	if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['enableManager']) {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
			$_EXTKEY,
			// Make module a submodule of 'tools'
			'tools',
			// Submodule key
			'Manager',
			// Position
			'',
			// An array holding the controller-action combinations that are accessible
			array(
				'Manager' => 'information,newLanguagePack,createLanguagePack,testForm,testFormResult,sqlDumpNonLocalizedData'
			),
			array(
				'access' => 'user,group',
				'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Images/Icons/moduleicon.gif',
				'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xlf'
			)
		);
		// Add module configuration setup
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript($_EXTKEY, 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/Manager/setup.txt">');
		
		// Enable editing Static Info Tables
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables'])) {
			$tableNames = array_keys($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['tables']);
			foreach ($tableNames as $tableName) {
				$GLOBALS['TCA'][$tableName]['ctrl']['readOnly'] = 0;
			}
		}
	}
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: source_publisher
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/source_publisher/ext_tables.php
 */

$_EXTKEY = 'source_publisher';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
$tempColumns = Array (
	"tx_sourcepublisher_pub_file" => Array (
		"exclude" => 0,
		"label" => "LLL:EXT:source_publisher/locallang_db.php:tt_content.tx_sourcepublisher_pub_file",
		"config" => Array (
			"type" => "group",
			"internal_type" => "file",
			"allowed" => "",
			"disallowed" => "php,php3",
			"max_size" => 500,
			"uploadfolder" => "uploads/tx_sourcepublisher",
			"size" => 1,
			"minitems" => 0,
			"maxitems" => 1,
		)
	),
);


//t3lib_div::loadTCA("tt_content");
t3lib_extMgm::addTCAcolumns("tt_content",$tempColumns,1);


//t3lib_div::loadTCA("tt_content");
$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]="CType;;4;button;1-1-1, header;;3;;2-2-2, tx_sourcepublisher_pub_file;;;;1-1-1";


t3lib_extMgm::addPlugin(Array("LLL:EXT:source_publisher/locallang_db.php:tt_content.CType", $_EXTKEY."_pi1"),"CType");


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: realurl
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/realurl/ext_tables.php
 */

$_EXTKEY = 'realurl';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (version_compare(TYPO3_branch, '6.2', '<')) {
	t3lib_div::loadTCA('pages');
	$extensionMamagementUtility = 't3lib_extMgm';
	$generalUtility = 't3lib_div';
	$isLegacyVersion = TRUE;
}
else {
	$extensionMamagementUtility = '\\TYPO3\\CMS\\Core\\Utility\\ExtensionManagementUtility';
	$generalUtility = '\\TYPO3\\CMS\\Core\\Utility\\GeneralUtility';
	$isLegacyVersion = FALSE;
}
/** @var t3lib_extMgm|\TYPO3\CMS\Core\Utility\ExtensionManagementUtility $extensionMamagementUtility */
/** @var t3lib_div|\TYPO3\CMS\Core\Utility\GeneralUtility $generalUtility */

if (TYPO3_MODE == 'BE')	{
	// Add Web>Info module
	$extensionMamagementUtility::insertModuleFunction(
		'web_info',
		'tx_realurl_modfunc1',
		$isLegacyVersion ? $extensionMamagementUtility::extPath('realurl') . 'modfunc1/class.tx_realurl_modfunc1.php' : NULL,
		'LLL:EXT:realurl/locallang_db.xml:moduleFunction.tx_realurl_modfunc1',
		'function',
		'online'
	);
}

$GLOBALS['TCA']['pages']['columns'] += array(
	'tx_realurl_pathsegment' => array(
		'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_pathsegment',
		'displayCond' => 'FIELD:tx_realurl_exclude:!=:1',
		'exclude' => 1,
		'config' => array (
			'type' => 'input',
			'max' => 255,
			'eval' => 'trim,nospace,lower'
		),
	),
	'tx_realurl_pathoverride' => array(
		'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_path_override',
		'exclude' => 1,
		'config' => array (
			'type' => 'check',
			'items' => array(
				array('', '')
			)
		)
	),
	'tx_realurl_exclude' => array(
		'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_exclude',
		'exclude' => 1,
		'config' => array (
			'type' => 'check',
			'items' => array(
				array('', '')
			)
		)
	),
	'tx_realurl_nocache' => array(
		'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_nocache',
		'exclude' => 1,
		'config' => array (
			'type' => 'check',
			'items' => array(
				array('', ''),
			),
		),
	)
);

$GLOBALS['TCA']['pages']['ctrl']['requestUpdate'] .= ',tx_realurl_exclude';

$GLOBALS['TCA']['pages']['palettes']['137'] = array(
	'showitem' => 'tx_realurl_pathoverride'
);

$extensionMamagementUtility::addFieldsToPalette('pages', '3', 'tx_realurl_nocache', 'after:cache_timeout');
$extensionMamagementUtility::addToAllTCAtypes('pages', 'tx_realurl_pathsegment;;137;;,tx_realurl_exclude', '1', 'after:nav_title');
$extensionMamagementUtility::addToAllTCAtypes('pages', 'tx_realurl_pathsegment;;137;;,tx_realurl_exclude', '4,199,254', 'after:title');

$extensionMamagementUtility::addLLrefForTCAdescr('pages','EXT:realurl/locallang_csh.xml');

$GLOBALS['TCA']['pages_language_overlay']['columns'] += array(
	'tx_realurl_pathsegment' => array(
		'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_pathsegment',
		'exclude' => 1,
		'config' => array (
			'type' => 'input',
			'max' => 255,
			'eval' => 'trim,nospace,lower'
		),
	),
);

$extensionMamagementUtility::addToAllTCAtypes('pages_language_overlay', 'tx_realurl_pathsegment', '', 'after:nav_title');

unset($extensionMamagementUtility, $generalUtility, $isLegacyVersion);



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: powermail
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/powermail/ext_tables.php
 */

$_EXTKEY = 'powermail';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

/**
 * Include Plugins
 */
	// Pi1
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Powermail'
);
	// Pi2
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi2',
	'Powermail_Frontend'
);

/**
 * Include Backend Module
 */
if (
	TYPO3_MODE === 'BE' &&
	!\In2code\Powermail\Utility\Configuration::isDisableBackendModuleActive() &&
	!(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)
) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'In2code.' . $_EXTKEY,
		'web',
		'm1',
		'',
		array(
			'Module' => 'dispatch, list, exportXls, exportCsv, reportingBe, toolsBe, overviewBe,
				checkBe, converterBe, converterUpdateBe, reportingFormBe, reportingMarketingBe,
				fixUploadFolder, fixWrongLocalizedForms, fixFilledMarkersInLocalizedFields,
				fixWrongLocalizedPages, fixFilledMarkersInLocalizedPages'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.' . (\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.0') ? 'svg' : 'gif'),
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xlf',
		)
	);
}

/**
 * Include Flexform
 */
	// Pi1
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/FlexformPi1.xml'
);
	// Pi2
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi2';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/FlexformPi2.xml'
);

/**
 * Include UserFuncs
 */
if (TYPO3_MODE === 'BE') {
	$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);

	// form selection
	require_once($extPath . 'Classes/Utility/Tca/FormSelectorUserFunc.php');

	// show powermail fields in Pi2 (powermail_frontend)
	require_once($extPath . 'Classes/Utility/Tca/FieldSelectorUserFunc.php');

	// marker field in Pi1
	require_once($extPath . 'Classes/Utility/Tca/Marker.php');

	// add options to TCA select fields with itemsProcFunc
	require_once($extPath . 'Classes/Utility/Tca/AddOptionsToSelection.php');

	// show form note in FlexForm
	require_once($extPath . 'Classes/Utility/Tca/ShowFormNoteEditForm.php');

	// ContentElementWizard for Pi1
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['In2code\Powermail\Utility\Hook\ContentElementWizard'] =
		$extPath . 'Classes/Utility/Hook/ContentElementWizard.php';
}

/**
 * Include TypoScript
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY, 'Configuration/TypoScript/Main',
	'Main Template'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY, 'Configuration/TypoScript/Powermail_Frontend',
	'Powermail_Frontend'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY, 'Configuration/TypoScript/CssDemo',
	'Add Demo CSS'
);
if (!\In2code\Powermail\Utility\Configuration::isDisableMarketingInformationActive()) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
		$_EXTKEY, 'Configuration/TypoScript/Marketing',
		'Marketing Information'
	);
}

/**
 * Table Configuration
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_powermail_domain_model_forms',
	'EXT:powermail/Resources/Private/Language/locallang_csh_tx_powermail_domain_model_forms.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_powermail_domain_model_forms');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_powermail_domain_model_pages',
	'EXT:powermail/Resources/Private/Language/locallang_csh_tx_powermail_domain_model_pages.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_powermail_domain_model_pages');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_powermail_domain_model_fields',
	'EXT:powermail/Resources/Private/Language/locallang_csh_tx_powermail_domain_model_fields.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_powermail_domain_model_fields');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_powermail_domain_model_mails',
	'EXT:powermail/Resources/Private/Language/locallang_csh_tx_powermail_domain_model_mails.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_powermail_domain_model_mails');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_powermail_domain_model_answers',
	'EXT:powermail/Resources/Private/Language/locallang_csh_tx_powermail_domain_model_answers.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_powermail_domain_model_answers');

/**
 * Garbage Collector
 */
if (\In2code\Powermail\Utility\Configuration::isEnableTableGarbageCollectionActive()) {
	$tgct = 'TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask';
	$table = 'tx_powermail_domain_model_mails';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][$tgct]['options']['tables'][$table] = array(
		'dateField' => 'tstamp',
		'expirePeriod' => 30
	);
	$table = 'tx_powermail_domain_model_answers';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][$tgct]['options']['tables'][$table] = array(
		'dateField' => 'tstamp',
		'expirePeriod' => 30
	);
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: newsletter
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/newsletter/ext_tables.php
 */

$_EXTKEY = 'newsletter';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];



if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// ========== Register BE Modules
if (TYPO3_MODE == 'BE') {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'Ecodev.' . $_EXTKEY, 'web', // Make newsletter module a submodule of 'user'
            'tx_newsletter_m1', // Submodule key
            'before:info', // Position
            array(
        'Module' => 'index',
        'Newsletter' => 'list, listPlanned, create, statistics',
        'Email' => 'list',
        'Link' => 'list',
        'BounceAccount' => 'list',
        'RecipientList' => 'list, listRecipient',
            ), array(
        'access' => 'user,group',
        'icon' => 'EXT:newsletter/Resources/Public/Icons/tx_newsletter.png',
        'labels' => 'LLL:EXT:newsletter/Resources/Private/Language/locallang_module.xlf',
            )
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_newsletter_domain_model_newsletter', 'EXT:newsletter/Resources/Private/Language/locallang_csh_tx_newsletter_domain_model_newsletter.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newsletter_domain_model_newsletter');
$TCA['tx_newsletter_domain_model_newsletter'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:newsletter/Resources/Private/Language/locallang_db.xlf:tx_newsletter_domain_model_newsletter',
        'label' => 'planned_time',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Newsletter.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_newsletter_domain_model_newsletter.gif',
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_newsletter_domain_model_bounceaccount', 'EXT:newsletter/Resources/Private/Language/locallang_csh_tx_newsletter_domain_model_bounceaccount.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newsletter_domain_model_bounceaccount');
$TCA['tx_newsletter_domain_model_bounceaccount'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:newsletter/Resources/Private/Language/locallang_db.xlf:tx_newsletter_domain_model_bounceaccount',
        'label' => 'email',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/BounceAccount.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_newsletter_domain_model_bounceaccount.gif',
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_newsletter_domain_model_recipientlist', 'EXT:newsletter/Resources/Private/Language/locallang_csh_tx_newsletter_domain_model_recipientlist.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newsletter_domain_model_recipientlist');
$TCA['tx_newsletter_domain_model_recipientlist'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:newsletter/Resources/Private/Language/locallang_db.xlf:tx_newsletter_domain_model_recipientlist',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'type' => 'type',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/RecipientList.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_newsletter_domain_model_recipientlist.gif',
        'type' => 'type', // this tells extbase to respect the "type" column for Single Table Inheritance
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_newsletter_domain_model_email', 'EXT:newsletter/Resources/Private/Language/locallang_csh_tx_newsletter_domain_model_email.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newsletter_domain_model_email');
$TCA['tx_newsletter_domain_model_email'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:newsletter/Resources/Private/Language/locallang_db.xlf:tx_newsletter_domain_model_email',
        'label' => 'recipient_address',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Email.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_newsletter_domain_model_email.gif',
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_newsletter_domain_model_link', 'EXT:newsletter/Resources/Private/Language/locallang_csh_tx_newsletter_domain_model_link.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newsletter_domain_model_link');
$TCA['tx_newsletter_domain_model_link'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:newsletter/Resources/Private/Language/locallang_db.xlf:tx_newsletter_domain_model_link',
        'label' => 'url',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Link.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_newsletter_domain_model_link.gif',
    ),
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: news
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/news/ext_tables.php
 */

$_EXTKEY = 'news';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


defined('TYPO3_MODE') or die();

$boot = function($packageKey) {
	// The following calls are targeted for BE but might be needed in FE editing

	// CSH - context sensitive help
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_news_domain_model_news', 'EXT:news/Resources/Private/Language/locallang_csh_news.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_news_domain_model_media', 'EXT:news/Resources/Private/Language/locallang_csh_media.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_news_domain_model_file', 'EXT:news/Resources/Private/Language/locallang_csh_file.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_news_domain_model_link', 'EXT:news/Resources/Private/Language/locallang_csh_link.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_news_domain_model_tag', 'EXT:news/Resources/Private/Language/locallang_csh_tag.xlf');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
			'tt_content.pi_flexform.news_pi1.list', 'EXT:news/Resources/Private/Language/locallang_csh_flexforms.xlf');

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_news_domain_model_news');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_news_domain_model_media');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_news_domain_model_file');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_news_domain_model_link');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_news_domain_model_tag');

	// Extension manager configuration
	$configuration = \GeorgRinger\News\Utility\EmConfiguration::getSettings();

	/***************
	 * News icon in page tree
	 */
	unset($GLOBALS['ICON_TYPES']['news']);
	\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon('pages', 'contains-news', '../typo3conf/ext/news/Resources/Public/Icons/folder.gif');

	if (TYPO3_MODE === 'BE') {

		$addNewsToModuleSelection = TRUE;
		foreach ($GLOBALS['TCA']['pages']['columns']['module']['config']['items'] as $item) {
			if ($item[1] === 'news') {
				$addNewsToModuleSelection = FALSE;
				continue;
			}
		}
		if ($addNewsToModuleSelection) {
			$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = array(
				0 => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:news-folder',
				1 => 'news',
				2 => '../typo3conf/ext/news/Resources/Public/Icons/folder.gif'
			);
		}

		/***************
		 * Show news table in page module
		 */
		if ($configuration->getPageModuleFieldsNews()) {
			$addTableItems = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(';', $configuration->getPageModuleFieldsNews(), TRUE);
			foreach ($addTableItems as $item) {
				$split = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('=', $item, TRUE);
				if (count($split) == 2) {
					$fTitle = $split[0];
					$fList = $split[1];
				} else {
					$fTitle = '';
					$fList = $split[0];
				}
				$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['tx_news_domain_model_news'][] = array(
					'MENU' => $fTitle,
					'fList' => $fList,
					'icon' => TRUE,
				);
			}
		}

		if ($configuration->getPageModuleFieldsCategory()) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['sys_category'][0] = array(
				'fList' => htmlspecialchars($configuration->getPageModuleFieldsCategory()),
				'icon' => TRUE
			);
		}

		// Extend user settings
		$GLOBALS['TYPO3_USER_SETTINGS']['columns']['newsoverlay'] = array(
			'label'			=> 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:usersettings.overlay',
			'type'			=> 'select',
			'itemsProcFunc'	=> 'GeorgRinger\\News\\Hooks\\ItemsProcFunc->user_categoryOverlay',
		);
		$GLOBALS['TYPO3_USER_SETTINGS']['showitem'] .= ',
			--div--;LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:pi1_title,newsoverlay';

		// Add tables to livesearch (e.g. "#news:fo" or "#newscat:fo")
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['news'] = 'tx_news_domain_model_news';
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['newstag'] = 'tx_news_domain_model_tag';


		/* ===========================================================================
			Register BE-Modules
		=========================================================================== */
		if ($configuration->getShowImporter()) {
			\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
				'news',
				'web',
				'tx_news_m1',
				'',
				array(
					'Import' => 'index, runJob, jobInfo',
				),
				array(
					'access' => 'user,group',
					'icon' => 'EXT:news/Resources/Public/Icons/' .
						(\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.0') ? 'module_import.png' : 'import_module.gif'),
					'labels' => 'LLL:EXT:news/Resources/Private/Language/locallang_mod.xlf',
				)
			);
		}


		/* ===========================================================================
			Register BE-Module for Administration
		=========================================================================== */
		if ($configuration->getShowAdministrationModule()) {
			\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
				'news',
				'web',
				'tx_news_m2',
				'',
				array(
					'Administration' => 'index,newNews,newCategory,newTag,newsPidListing',
				),
				array(
					'access' => 'user,group',
					'icon' => 'EXT:news/Resources/Public/Icons/' .
						(\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.0') ? 'module_administration.png' : 'folder.gif'),
					'labels' => 'LLL:EXT:news/Resources/Private/Language/locallang_modadministration.xlf',
				)
			);
		}

		/* ===========================================================================
			Ajax call to save tags
		=========================================================================== */
		$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['News::createTag'] = 'typo3conf/ext/news/Classes/Hooks/SuggestReceiverCall.php:GeorgRinger\\News\\Hooks\\SuggestReceiverCall->createTag';
	}

	/* ===========================================================================
		Default configuration
	=========================================================================== */
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['orderByCategory'] = 'uid,title,tstamp,sorting';
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['orderByNews'] = 'tstamp,datetime,crdate,title' . ($configuration->getManualSorting() ? ',sorting' : '');
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['orderByTag'] = 'tstamp,crdate,title';
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['list'] = $configuration->getRemoveListActionFromFlexforms();
};

$boot($_EXTKEY);
unset($boot);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: news_ttnewsimport
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/news_ttnewsimport/ext_tables.php
 */

$_EXTKEY = 'news_ttnewsimport';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\Tx_News_Utility_ImportJob::register(
	'BeechIt\\NewsTtnewsimport\\Jobs\\TTNewsNewsImportJob',
	'LLL:EXT:news_ttnewsimport/Resources/Private/Language/locallang_be.xml:ttnews_importer_title',
	'');
\Tx_News_Utility_ImportJob::register(
	'BeechIt\\NewsTtnewsimport\\Jobs\\TTNewsCategoryImportJob',
	'LLL:EXT:news_ttnewsimport/Resources/Private/Language/locallang_be.xml:ttnewscategory_importer_title',
	'');
\Tx_News_Utility_ImportJob::register(
	'BeechIt\\NewsTtnewsimport\\Jobs\\MblNewseventImportJob',
	'LLL:EXT:news_ttnewsimport/Resources/Private/Language/locallang_be.xml:mblnewsevent_importer_title',
	'');
\Tx_News_Utility_ImportJob::register(
	'BeechIt\\NewsTtnewsimport\\Jobs\\DamMediaTagConversionJob',
	'LLL:EXT:news_ttnewsimport/Resources/Private/Language/locallang_be.xml:dammediatag_converter_title',
	'');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: metaseo
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/metaseo/ext_tables.php
 */

$_EXTKEY = 'metaseo';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$extPath    = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY);

// ############################################################################
// TABLES
// ############################################################################

// ################
// Pages
// ################

$tempColumns = array(
    'tx_metaseo_pagetitle'        => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_pagetitle',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_pagetitle_rel'    => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_pagetitle_rel',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_pagetitle_prefix' => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_pagetitle_prefix',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_pagetitle_suffix' => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_pagetitle_suffix',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_inheritance'      => array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_inheritance',
        'config'  => array(
            'type'     => 'select',
            'items'    => array(
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_inheritance.I.0',
                    0
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_inheritance.I.1',
                    1
                ),
            ),
            'size'     => 1,
            'maxitems' => 1
        )
    ),
    'tx_metaseo_is_exclude'       => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_is_exclude',
        'exclude' => 1,
        'config'  => array(
            'type' => 'check'
        )
    ),
    'tx_metaseo_canonicalurl'     => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_canonicalurl',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
            'wizards'  => Array(
                '_PADDING' => 2,
                'link'     => Array(
                    'type'         => 'popup',
                    'title'        => 'Link',
                    'icon'         => 'link_popup.gif',
                    'script'       => 'browse_links.php?mode=wizard&act=url',
                    'params'       => array(
                        'blindLinkOptions' => 'mail',
                    ),
                    'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
                ),
            ),
        )
    ),
    'tx_metaseo_priority'         => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_priority',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'int',
        )
    ),
    'tx_metaseo_change_frequency' => array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency',
        'config'  => array(
            'type'     => 'select',
            'items'    => array(
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.0',
                    0
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.1',
                    1
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.2',
                    2
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.3',
                    3
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.4',
                    4
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.5',
                    5
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.6',
                    6
                ),
                array(
                    'LLL:EXT:metaseo/locallang_db.php:pages.tx_metaseo_change_frequency.I.7',
                    7
                ),
            ),
            'size'     => 1,
            'maxitems' => 1
        )
    ),
    'tx_metaseo_geo_lat'          => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_geo_lat',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_geo_long'         => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_geo_long',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_geo_place'        => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_geo_place',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_geo_region'       => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_geo_region',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),

);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns, 1);

// TCA Palettes
$TCA['pages']['palettes']['tx_metaseo_pagetitle'] = array(
    'showitem'       => 'tx_metaseo_pagetitle,--linebreak--,tx_metaseo_pagetitle_prefix,tx_metaseo_pagetitle_suffix,--linebreak--,tx_metaseo_inheritance',
    'canNotCollapse' => 1
);

$TCA['pages']['palettes']['tx_metaseo_crawler'] = array(
    'showitem'       => 'tx_metaseo_is_exclude,--linebreak--,tx_metaseo_canonicalurl',
    'canNotCollapse' => 1
);

$TCA['pages']['palettes']['tx_metaseo_sitemap'] = array(
    'showitem'       => 'tx_metaseo_priority,--linebreak--,tx_metaseo_change_frequency',
    'canNotCollapse' => 1
);

$TCA['pages']['palettes']['tx_metaseo_geo'] = array(
    'showitem'       => 'tx_metaseo_geo_lat,--linebreak--,tx_metaseo_geo_long,--linebreak--,tx_metaseo_geo_place,--linebreak--,tx_metaseo_geo_region',
    'canNotCollapse' => 1
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_metaseo_pagetitle_rel',
    '1,4,7,3',
    'after:title'
);

// Put it for standard page
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:metaseo/locallang_tca.xml:pages.tab.seo;,--palette--;LLL:EXT:metaseo/locallang_tca.xml:pages.palette.pagetitle;tx_metaseo_pagetitle,--palette--;LLL:EXT:metaseo/locallang_tca.xml:pages.palette.geo;tx_metaseo_geo,--palette--;LLL:EXT:metaseo/locallang_tca.xml:pages.palette.crawler;tx_metaseo_crawler,--palette--;LLL:EXT:metaseo/locallang_tca.xml:pages.palette.sitemap;tx_metaseo_sitemap',
    '1,4,7,3',
    'after:author_email'
);

// ################
// Page overlay (lang)
// ################

$tempColumns = array(
    'tx_metaseo_pagetitle'        => array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages_language_overlay.tx_metaseo_pagetitle',
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_pagetitle_rel'    => array(
        'exclude' => 1,
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages_language_overlay.tx_metaseo_pagetitle_rel',
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_pagetitle_prefix' => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_pagetitle_prefix',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_pagetitle_suffix' => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_pagetitle_suffix',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
        )
    ),
    'tx_metaseo_canonicalurl'     => array(
        'label'   => 'LLL:EXT:metaseo/locallang_db.xml:pages.tx_metaseo_canonicalurl',
        'exclude' => 1,
        'config'  => array(
            'type'     => 'input',
            'size'     => '30',
            'max'      => '255',
            'checkbox' => '',
            'eval'     => 'trim',
            'wizards'  => Array(
                '_PADDING' => 2,
                'link'     => Array(
                    'type'         => 'popup',
                    'title'        => 'Link',
                    'icon'         => 'link_popup.gif',
                    'script'       => 'browse_links.php?mode=wizard&act=url',
                    'params'       => array(
                        'blindLinkOptions' => 'mail',
                    ),
                    'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
                ),
            ),
        )
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $tempColumns, 1);

// TCA Palettes
$TCA['pages_language_overlay']['palettes']['tx_metaseo_pagetitle'] = array(
    'showitem'       => 'tx_metaseo_pagetitle,--linebreak--,tx_metaseo_pagetitle_prefix,tx_metaseo_pagetitle_suffix',
    'canNotCollapse' => 1
);

$TCA['pages_language_overlay']['palettes']['tx_metaseo_crawler'] = array(
    'showitem'       => 'tx_metaseo_canonicalurl',
    'canNotCollapse' => 1
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages_language_overlay',
    'tx_metaseo_pagetitle_rel',
    '',
    'after:title'
);

// Put it for standard page overlay
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages_language_overlay',
    '--div--;LLL:EXT:metaseo/locallang_tca.xml:pages.tab.seo;,--palette--;LLL:EXT:metaseo/locallang_tca.xml:pages.palette.pagetitle;tx_metaseo_pagetitle,--palette--;LLL:EXT:metaseo/locallang_tca.xml:pages.palette.crawler;tx_metaseo_crawler',
    '',
    'after:author_email'
);

// ################
// Domains
// ################

/*
$tempColumns = array (
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_domain',$tempColumns,1);
*/

// ################
// Settings Root
// ################
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_metaseo_setting_root');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_metaseo_setting_root');

$TCA['tx_metaseo_setting_root'] = array(
    'ctrl'        => array(
        'title'             => 'LLL:EXT:metaseo/locallang_db.xml:tx_metaseo_setting_root',
        'label'             => 'uid',
        'adminOnly'         => true,
        'dynamicConfigFile' => $extPath . 'Configuration/TCA/MetaseoSettingRoot.php',
        'iconfile'          => 'page',
        'hideTable'         => true,
        'dividers2tabs'     => true,
    ),
    'interface'   => array(
        'always_description' => true,
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_metaseo_setting_root',
    'EXT:metaseo/locallang_csh_setting_root.xml'
);

/*
$TCA['tx_metaseo_setting_page'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:metaseo/locallang_db.xml:tx_metaseo_setting_page',
		'label'				=> 'uid',
		'adminOnly'			=> 1,
		'dynamicConfigFile'	=> $extPath.'tca.php',
		'iconfile'			=> 'page',
		'hideTable'			=> TRUE,
	),
	'interface' => array(
	),
);
*/

// ############################################################################
// Backend
// ############################################################################

if (TYPO3_MODE == 'BE') {

    // ####################################################
    // Module category "WEB"
    // ####################################################

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Metaseo.' . $_EXTKEY,
        'web',
        'pageseo',
        '', # Position
        array('BackendPageSeo' => 'main,metadata,geo,searchengines,url,pagetitle,pagetitlesim'), # Controller array
        array(
            'access' => 'user,group',
            'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Backend/Icons/ModuleSeo.png',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.pageseo.xml',
        )
    );

    // ####################################################
    // Module category "SEO"
    // ####################################################

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        $_EXTKEY,
        'metaseo',
        '',
        '',
        array(),
        array(
            'access' => 'user,group',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.main.xml',
        )
    );


    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Metaseo.' . $_EXTKEY,
        'metaseo',
        'controlcenter',
        '',
        array('BackendControlCenter' => 'main'),
        array(
            'access' => 'user,group',
            'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Backend/Icons/ModuleControlCenter.png',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.controlcenter.xml',
        )
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Metaseo.' . $_EXTKEY,
        'metaseo',
        'sitemap',
        'after:controlcenter',
        array('BackendSitemap' => 'main,sitemap'),
        array(
            'access' => 'user,group',
            'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Backend/Icons/ModuleSitemap.png',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.sitemap.xml',
        )
    );
}

// ############################################################################
// CONFIGURATION
// ############################################################################

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'MetaSEO');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: iconfont
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/iconfont/ext_tables.php
 */

$_EXTKEY = 'iconfont';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) die ('Access denied.');

// --- Get extension configuration ---
$extConf = array();
if ( strlen($_EXTCONF) ) {
	$extConf = unserialize($_EXTCONF);
}


// --- Icon font key/name --
$iconFont = $extConf['iconFont'];
$customIconDefFile = $extConf['customIconDefinitionFile'];

// dummy icon options (if none loaded)
$iconFontOption = array(array('', 0));

// --- Load array with icons --
//
if ( $iconFont == 'custom' ) {
	if ( file_exists(PATH_site . $customIconDefFile) ) {
		include(PATH_site . $customIconDefFile);
	}
} else {
	// Load default icon font specific select array
	if ( file_exists(PATH_site . 'typo3conf/ext/iconfont/ext_tables_' . $iconFont . '.php') ) {
		include(PATH_site . 'typo3conf/ext/iconfont/ext_tables_' . $iconFont . '.php');
	}
}

// --- Add field --
//
$tempColumn = array(
	'tx_iconfont_icon' => array (
		'exclude' => 0,
		'label' => 'LLL:EXT:iconfont/Resources/Private/Language/locallang_db.xlf:tt_content.tx_iconfont_icon',
		'config' => array (
			'type' => 'select',
			'default' => '0',
			'size' => 1,
			'maxitems' => 1,
			'items' => $iconFontOption
		)
	)
);
// show icons in select options
$tempColumn['tx_iconfont_icon']['config']['iconsInOptionTags'] = 1;
// don't show icons below select box
$tempColumn['tx_iconfont_icon']['config']['suppress_icons'] = 'ONLY_SELECTED';
// add after header_layout
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumn, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 'header', 'tx_iconfont_icon', 'after:header_layout');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 'headers', 'tx_iconfont_icon', 'after:header_layout');


// --- Add static ts configurations  --
//
switch ( $iconFont ) {
	case 'fontawesome':
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants('
plugin.tx_iconfont {
    # cat=tx_iconfont/base/010; type=string; label=Path to icon font css file
    cssFile = //maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css
    # cat=tx_iconfont/base/011; type=string; label=Icon font class prefix
    fontClassPrefix = fa fa-
    # cat=tx_iconfont/base/012; type=string; label=Icon font class addon
    fontClassAddon =
}');
		break;

	case 'fontello':
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants('
plugin.tx_iconfont {
    # cat=tx_iconfont/base/010; type=string; label=Path to icon font css file
    cssFile = fileadmin/templates/fontello/css/fontello.css
    # cat=tx_iconfont/base/011; type=string; label=Icon font class prefix
    fontClassPrefix = icon-
    # cat=tx_iconfont/base/012; type=string; label=Icon font class addon
    fontClassAddon =
}');
		break;

	default:
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants('
plugin.tx_iconfont {
    # cat=tx_iconfont/base/010; type=string; label=Path to icon font css file
    cssFile =
    # cat=tx_iconfont/base/011; type=string; label=Icon font class prefix
    fontClassPrefix =
    # cat=tx_iconfont/base/012; type=string; label=Icon font class addon
    fontClassAddon =
}');

		break;
}



// Default TS for iconfont
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Icon Font');

// Optional for modified header (option in bootstrap_core to have subheader in header tag)
if ( isset($extConf['enableHeaderRenderingOption']) && $extConf['enableHeaderRenderingOption'] ) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Header', 'Subheader in header (addon)');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: google_auth
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/google_auth/ext_tables.php
 */

$_EXTKEY = 'google_auth';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}




t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Google OpenAuth v2');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Auth',
	'Auth controller return point'
);

if ($TYPO3_CONF_VARS['EXTCONF']['google_auth']['setup']['enableProfile']) {
	Tx_Extbase_Utility_Extension::registerPlugin(
		$_EXTKEY,
		'Profile',
		'Mini FrontendUser Profile Editor'
	);
}



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: df_foundation5
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/df_foundation5/ext_tables.php
 */

$_EXTKEY = 'df_foundation5';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5/', 'Foundation 5 basic');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Interchange/', 'Foundation 5 - Interchange');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Offcanvas/', 'Foundation 5 - Offcanvas');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Breadcrumbs/', 'Foundation 5 - Breadcrumbs');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_TopBar/', 'Foundation 5 - Top Bar');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_SubNav/', 'Foundation 5 - Sub Nav');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_SideNav/', 'Foundation 5 - Side Nav');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_DropdownNav/', 'Foundation 5 - Dropdown Nav');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Pagination/', 'Foundation 5 - Pagination');


$_EXTCONF = unserialize($_EXTCONF);
if ($_EXTCONF['foundation_5_Magellan']) {
	$magellan = 'tx_dffoundation5_magellan,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Magellan/', 'Foundation 5 - Magellan');
}
if ($_EXTCONF['foundation_5_Tabs']) {
	$tabs = 'tx_dffoundation5_tab,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Tabs/', 'Foundation 5 - Tabs');
}
if ($_EXTCONF['foundation_5_slider'] == 1) {
	$wow = 'tx_dffoundation5_wow,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Wow/', 'Foundation 5 - WowSlider');
}
if ($_EXTCONF['foundation_5_slider'] == 2) {
	$orbit = 'tx_dffoundation5_orbit,';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/foundation_5_Orbit/', 'Foundation 5 - Orbit');
} 

$tempColumns = array(
	'tx_dffoundation5_large_left_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_left_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,
			'cols' => '40',
		)
	),
	'tx_dffoundation5_large_right_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_right_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,			
		)
	),
	'tx_dffoundation5_medium_left_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_left_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,			
		)
	),
	'tx_dffoundation5_medium_right_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_right_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 6,			
		)
	),
	'tx_dffoundation5_small_left_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_left_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 12,
		)
	),
	'tx_dffoundation5_small_right_column' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_right_column.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 12,			
		)
	),
	'tx_dffoundation5_large_block_grid' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_large_block_grid.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 1,			
		)
	),	
	'tx_dffoundation5_medium_block_grid' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_medium_block_grid.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 1,			
		)
	),
	'tx_dffoundation5_small_block_grid' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.0', '1'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.1', '2'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.2', '3'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.3', '4'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.4', '5'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.5', '6'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.6', '7'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.7', '8'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.8', '9'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.9', '10'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.10', '11'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_small_block_grid.I.11', '12'),
			),
			'size' => 1,	
			'maxitems' => 1,
			'default' => 1,			
		)
	),
	'tx_dffoundation5_left_add' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_left_add',		
		'config' => array(
			'type' => 'input',	
			'size' => '14',
		)
	),
	'tx_dffoundation5_right_add' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_right_add',		
		'config' => array(
			'type' => 'input',	
			'size' => '14',
		)
	),		
	'tx_dffoundation5_class' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_class',		
		'config' => array(
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_dffoundation5_style' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_style',		
		'config' => array(
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_dffoundation5_show_for' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.1', 'show-for-small-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.2', 'show-for-medium-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.3', 'show-for-medium-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.4', 'show-for-large-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.5', 'show-for-large-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.6', 'show-for-xlarge-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.7', 'show-for-xlarge-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_show_for.I.8', 'show-for-xxlarge-up'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_hide_for' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.1', 'hide-for-small-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.2', 'hide-for-medium-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.3', 'hide-for-medium-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.4', 'hide-for-large-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.5', 'hide-for-large-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.6', 'hide-for-xlarge-up'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.7', 'hide-for-xlarge-only'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_hide_for.I.8', 'hide-for-xxlarge-up'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_format' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format.I.1', 'show-for-landscape'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_format.I.2', 'show-for-portrait'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_touch' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch.I.1', 'show-for-touch'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_touch.I.2', 'hide-for-touch'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_print' => array(		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print',		
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print.I.0', ''),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print.I.1', 'show-for-print'),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_print.I.2', 'hide-for-print'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_dffoundation5_cropscaling' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_cropscaling_ratio' => array (		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio',	
		'config' => array (
			'type' => 'select',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.0', '0'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.1', '1'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.2', '16/9'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.3', '4/3'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.4', '9/16'),
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_ratio.I.5', '3/4'),
			)
		)
	),
	'tx_dffoundation5_cropscaling_orient' => array (		
		'exclude' => 1,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient',		
		'config' => array (
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.1', 1, 'EXT:df_foundation5/Resources/Public/Icons/cut_above_left.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.2', 2, 'EXT:df_foundation5/Resources/Public/Icons/cut_above_center.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.3', 3, 'EXT:df_foundation5/Resources/Public/Icons/cut_above_right.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.8', 8, 'EXT:df_foundation5/Resources/Public/Icons/cut_center_left.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.0', 0, 'EXT:df_foundation5/Resources/Public/Icons/cut_center_center.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.4', 4, 'EXT:df_foundation5/Resources/Public/Icons/cut_center_right.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.7', 7, 'EXT:df_foundation5/Resources/Public/Icons/cut_below_left.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.6', 6, 'EXT:df_foundation5/Resources/Public/Icons/cut_below_center.gif',),
				array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_cropscaling_orient.I.5', 5, 'EXT:df_foundation5/Resources/Public/Icons/cut_below_right.gif',),				
			),
			'selicon_cols' => 3,
			'default' => 0,
			'size' => 1,
			'minitems' => 1,
			'maxitems' => 1,
			'iconsInOptionTags' => 1,
		)
	),
	'tx_dffoundation5_orbit' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_orbit',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_orbit.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_wow' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_wow',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_wow.I.0', ''),
			)
		)
	),	
	'tx_dffoundation5_magellan' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_magellan',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_magellan.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_tab' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_tab',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_tab.I.0', ''),
			)
		)
	),
	'tx_dffoundation5_interchange' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_interchange',		
		'config' => array (
			'type' => 'check',
			'default' => 0,
			'items' => Array (
				Array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_interchange.I.0', ''),
			)
		)
	),	
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_label_conditions, tx_dffoundation5_show_for, tx_dffoundation5_hide_for, tx_dffoundation5_format, tx_dffoundation5_touch, tx_dffoundation5_print, --div--;Erweitert, tx_dffoundation5_class, tx_dffoundation5_style, ');

$TCA['tt_content']['columns']['imagecols']['config']['type'] = 'passthrough';
$TCA['tt_content']['columns']['image_noRows']['config']['type'] = 'passthrough';
$TCA['tt_content']['palettes']['visibility']['showitem'] .= ','.$magellan.$tabs;
$TCA['tt_content']['palettes']['imageblock']['showitem'] = str_replace(', imagecols', ',imagecols, tx_dffoundation5_large_block_grid, tx_dffoundation5_medium_block_grid, tx_dffoundation5_small_block_grid, --linebreak--, tx_dffoundation5_large_left_column, tx_dffoundation5_large_right_column,--linebreak--, tx_dffoundation5_medium_left_column, tx_dffoundation5_medium_right_column, --linebreak--, tx_dffoundation5_small_left_column, tx_dffoundation5_small_right_column, --linebreak--,tx_dffoundation5_left_add,tx_dffoundation5_right_add,', $TCA['tt_content']['palettes']['imageblock']['showitem']);
$TCA['tt_content']['palettes']['imagelinks']['showitem'] .= ',tx_dffoundation5_interchange';
$TCA['tt_content']['palettes']['image_settings']['showitem'] = '
	imagewidth;LLL:EXT:cms/locallang_ttc.xlf:imagewidth_formlabel, 
	imageheight;LLL:EXT:cms/locallang_ttc.xlf:imageheight_formlabel, 
	imageborder;LLL:EXT:cms/locallang_ttc.xlf:imageborder_formlabel,
	'.$orbit.$wow.'--linebreak--, 
	tx_dffoundation5_cropscaling, 
	tx_dffoundation5_cropscaling_orient, --linebreak--, 
	image_compression;LLL:EXT:cms/locallang_ttc.xlf:image_compression_formlabel, 
	image_effects;LLL:EXT:cms/locallang_ttc.xlf:image_effects_formlabel, 
	image_frames;LLL:EXT:cms/locallang_ttc.xlf:image_frames_formlabel
';

// in zweite Optionspalette 
$TCA['tt_content']['palettes']['image_settings']['canNotCollapse'] = 0;

$TCA['tt_content']['columns']['imageorient'] = array (
			'label' => 'LLL:EXT:df_foundation5/cms/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.0', 0, 'EXT:df_foundation5/Resources/Public/Icons/above_center.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.1', 1, 'EXT:df_foundation5/Resources/Public/Icons/above_right.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.2', 2, 'EXT:df_foundation5/Resources/Public/Icons/above_left.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.3', 8, 'EXT:df_foundation5/Resources/Public/Icons/below_center.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.4', 9,	'EXT:df_foundation5/Resources/Public/Icons/below_right.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.5', 10, 'EXT:df_foundation5/Resources/Public/Icons/below_left.gif',),			
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.30', 30, 'EXT:df_foundation5/Resources/Public/Icons/intext_left_nowrap.gif',),					 
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.31', 31, 'EXT:df_foundation5/Resources/Public/Icons/intext_right_nowrap.gif',),
					array('LLL:EXT:df_foundation5/Resources/Private/Language/locallang_tca.xml:tt_content.tx_dffoundation5_imageorient.I.32', 32, 'EXT:df_foundation5/Resources/Public/Icons/nowrap.gif',),
				),
			'selicon_cols' => 3,
			'default' => 0,
			'size' => 1,
			'minitems' => 1,
			'maxitems' => 1,
			'iconsInOptionTags' => 1,
     ),
 );


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: dev_null_geshi
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/dev_null_geshi/ext_tables.php
 */

$_EXTKEY = 'dev_null_geshi';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE'))
	die ('Access denied.');

if (TYPO3_MODE=="BE") {
	include_once(TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'class.tx_devnullgeshi_addFieldsToFlexForm.php');
}

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
	'LLL:EXT:dev_null_geshi/Resources/Private/Language/locallang_be.xml:pi1_title',
	$_EXTKEY.'_pi1',
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'),
'list_type');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY.'/pi1/flexform.xml');

if (TYPO3_MODE=="BE") {
	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_devnullgeshi_pi1_wizicon"] = TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."pi1/class.tx_devnullgeshi_pi1_wizicon.php";
}



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: crawler
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/crawler/ext_tables.php
 */

$_EXTKEY = 'crawler';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

if (TYPO3_MODE=='BE')	{

		// add info module function
	t3lib_extMgm::insertModuleFunction(
		'web_info',
		'tx_crawler_modfunc1',
		t3lib_extMgm::extPath($_EXTKEY).'modfunc1/class.tx_crawler_modfunc1.php',
		'LLL:EXT:crawler/locallang_db.php:moduleFunction.tx_crawler_modfunc1'
	);

		// add context menu item
	$GLOBALS['TBE_MODULES_EXT']['xMOD_alt_clickmenu']['extendCMclasses'][] = array(
		'name' => 'tx_crawler_contextMenu',
		'path' => t3lib_extMgm::extPath($_EXTKEY).'class.tx_crawler_contextMenu.php'
	);

}

t3lib_extMgm::allowTableOnStandardPages('tx_crawler_configuration');

$TCA["tx_crawler_configuration"] = array (
    "ctrl" => array (
        'title'     => 'LLL:EXT:crawler/locallang_db.xml:tx_crawler_configuration',
        'label'     => 'name',
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",
        'delete' => 'deleted',
        'enablecolumns' => array (
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_crawler_configuration.gif',
    ),
    "feInterface" => array (
        "fe_admin_fieldList" => "hidden, name, processing_instruction_filter, processing_instruction_parameters_ts, configuration, base_url, sys_domain_base_url, pidsonly, begroups,fegroups, sys_workspace_uid, realurl, chash, exclude",
    )
);

if (version_compare(TYPO3_version, '4.5.0','<=')) {
	t3lib_div::loadTCA("tx_crawler_configuration");
	$TCA['tx_crawler_configuration']['columns']['sys_workspace_uid']['config']['items'][1] = Array('LLL:EXT:lang/locallang_misc.xml:shortcut_offlineWS',-1);
}



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cps_tcatree
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_tcatree/ext_tables.php
 */

$_EXTKEY = 'cps_tcatree';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

require_once(t3lib_extMgm::extPath('cps_tcatree') . 'class.tx_cpstcatree.php');


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cps_searchhighlight
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/cps_searchhighlight/ext_tables.php
 */

$_EXTKEY = 'cps_searchhighlight';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];



if (!defined ('TYPO3_MODE'))     die ('Access denied.');

//add static template to list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Keyword Highlighting');


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: roq_newsevent
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/roq_newsevent/ext_tables.php
 */

$_EXTKEY = 'roq_newsevent';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'News event');

$tmp_roq_newsevent_columns = array(

    'tx_roqnewsevent_is_event' => array(
   		'exclude' => 0,
   		'label' => 'LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_is_event',
   		'config' => array(
   			'type' => 'check',
   			'default' => 0
   		),
   	),
	'tx_roqnewsevent_startdate' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_startdate',
		'config' => array(
			'type' => 'input',
			'size' => 7,
			'eval' => 'date',
			'checkbox' => 1,
		),
	),
	'tx_roqnewsevent_starttime' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_starttime',
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'eval' => 'time',
			'checkbox' => 1,
		),
	),
	'tx_roqnewsevent_enddate' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_enddate',
		'config' => array(
			'type' => 'input',
			'size' => 7,
			'eval' => 'date',
			'checkbox' => 1,
		),
	),
	'tx_roqnewsevent_endtime' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_endtime',
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'eval' => 'time',
			'checkbox' => 1,
		),
	),
	'tx_roqnewsevent_location' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_location',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim',
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $tmp_roq_newsevent_columns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tx_news_domain_model_news',
	',--div--;LLL:EXT:roq_newsevent/Resources/Private/Language/locallang_db.xml:tx_roqnewsevent_domain_model_event,tx_roqnewsevent_is_event, tx_roqnewsevent_startdate, tx_roqnewsevent_starttime, tx_roqnewsevent_enddate, tx_roqnewsevent_endtime, tx_roqnewsevent_location'
);



TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cb_newscal
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_newscal/ext_tables.php
 */

$_EXTKEY = 'cb_newscal';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Calendar for news');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: cb_indexedsearch_autocomplete
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/cb_indexedsearch_autocomplete/ext_tables.php
 */

$_EXTKEY = 'cb_indexedsearch_autocomplete';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/ts/', 'Indexed Search AutoComplete');


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: autoloader
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/autoloader/ext_tables.php
 */

$_EXTKEY = 'autoloader';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


/**
 * General ext_tables file and also an example for your own extension
 *
 * @category Extension
 * @package  Autoloader
 * @author   Tim Lochmüller
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\HDNET\Autoloader\Loader::extTables('HDNET', 'autoloader', array('Hooks', 'Slots', 'StaticTyposcript'));

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: calendarize
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize/ext_tables.php
 */

$_EXTKEY = 'calendarize';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


/**
 * General ext_tables file and also an example for your own extension
 *
 * @category Extension
 * @package  Calendarize
 * @author   Tim Lochmüller
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\HDNET\Autoloader\Loader::extTables('HDNET', 'calendarize', \HDNET\Calendarize\Register::getDefaultAutoloader());

if (!(boolean)\HDNET\Calendarize\Utility\ConfigurationUtility::get('disableDefaultEvent')) {
	\HDNET\Calendarize\Register::extTables(\HDNET\Calendarize\Register::getDefaultCalendarizeConfiguration());
}

$pluginName = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('pluginName', 'calendarize');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('calendarize', 'Calendar', $pluginName);

// module icon
$relIconPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('calendarize') . 'ext_icon.png';
\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon('pages', 'contains-calendar', $relIconPath);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: calendarize_news
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/calendarize_news/ext_tables.php
 */

$_EXTKEY = 'calendarize_news';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


/**
 * General ext_tables file and also an example for your own extension
 *
 * @category   Extension
 * @package    Calendarize
 * @author     Tim Lochmüller
 */

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\HDNET\Autoloader\Loader::extTables('HDNET', 'calendarize_news');
\HDNET\Calendarize\Register::extTables(\HDNET\CalendarizeNews\Register::getConfiguration());

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

/**
 * Extension: ajaxpagepreloader
 * File: /var/www/virtual/loop/html/hostweb/typo3conf/ext/ajaxpagepreloader/ext_tables.php
 */

$_EXTKEY = 'ajaxpagepreloader';
$_EXTCONF = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY];


if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Ajax Page Preloader');

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::loadNewTcaColumnsConfigFiles();

#