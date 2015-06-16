<?php
return array (
  'aliasToClassNameMapping' => 
  array (
    'tx_about_controller_aboutcontroller' => 'TYPO3\\CMS\\About\\Controller\\AboutController',
    'tx_about_domain_model_extension' => 'TYPO3\\CMS\\About\\Domain\\Model\\Extension',
    'tx_about_domain_repository_extensionrepository' => 'TYPO3\\CMS\\About\\Domain\\Repository\\ExtensionRepository',
    'tx_about_viewhelpers_skinimageviewhelper' => 'TYPO3\\CMS\\About\\ViewHelpers\\SkinImageViewHelper',
    'tx_aboutmodules_controller_modulescontroller' => 'TYPO3\\CMS\\Aboutmodules\\Controller\\ModulesController',
    'ajaxlogin' => 'TYPO3\\CMS\\Backend\\AjaxLoginHandler',
    'clickmenu' => 'TYPO3\\CMS\\Backend\\ClickMenu\\ClickMenu',
    't3lib_cli' => 'TYPO3\\CMS\\Core\\Controller\\CommandLineController',
    't3lib_clipboard' => 'TYPO3\\CMS\\Backend\\Clipboard\\Clipboard',
    't3lib_transl8tools' => 'TYPO3\\CMS\\Backend\\Configuration\\TranslationConfigurationProvider',
    't3lib_tsparser' => 'TYPO3\\CMS\\Core\\TypoScript\\Parser\\TypoScriptParser',
    't3lib_tsparser_tsconfig' => 'TYPO3\\CMS\\Backend\\Configuration\\TsConfigParser',
    't3lib_matchcondition_backend' => 'TYPO3\\CMS\\Backend\\Configuration\\TypoScript\\ConditionMatching\\ConditionMatcher',
    't3lib_contextmenu_abstractcontextmenu' => 'TYPO3\\CMS\\Backend\\ContextMenu\\AbstractContextMenu',
    't3lib_contextmenu_abstractdataprovider' => 'TYPO3\\CMS\\Backend\\ContextMenu\\AbstractContextMenuDataProvider',
    't3lib_contextmenu_action' => 'TYPO3\\CMS\\Backend\\ContextMenu\\ContextMenuAction',
    't3lib_contextmenu_actioncollection' => 'TYPO3\\CMS\\Backend\\ContextMenu\\ContextMenuActionCollection',
    't3lib_contextmenu_extdirect_contextmenu' => 'TYPO3\\CMS\\Backend\\ContextMenu\\Extdirect\\AbstractExtdirectContextMenu',
    't3lib_contextmenu_pagetree_dataprovider' => 'TYPO3\\CMS\\Backend\\ContextMenu\\Pagetree\\ContextMenuDataProvider',
    't3lib_contextmenu_pagetree_extdirect_contextmenu' => 'TYPO3\\CMS\\Backend\\ContextMenu\\Pagetree\\Extdirect\\ContextMenuConfiguration',
    't3lib_contextmenu_renderer_abstract' => 'TYPO3\\CMS\\Backend\\ContextMenu\\Renderer\\AbstractContextMenuRenderer',
    'typo3backend' => 'TYPO3\\CMS\\Backend\\Controller\\BackendController',
    'sc_wizard_backend_layout' => 'TYPO3\\CMS\\Backend\\Controller\\BackendLayoutWizardController',
    'sc_alt_clickmenu' => 'TYPO3\\CMS\\Backend\\Controller\\ClickMenuController',
    'sc_show_rechis' => 'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\ElementHistoryController',
    'sc_show_item' => 'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\ElementInformationController',
    'sc_move_el' => 'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\MoveElementController',
    'sc_db_new_content_el' => 'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\NewContentElementController',
    'sc_db_layout' => 'TYPO3\\CMS\\Backend\\Controller\\PageLayoutController',
    'sc_dummy' => 'TYPO3\\CMS\\Backend\\Controller\\DummyController',
    'sc_alt_doc' => 'TYPO3\\CMS\\Backend\\Controller\\EditDocumentController',
    'sc_file_newfolder' => 'TYPO3\\CMS\\Backend\\Controller\\File\\CreateFolderController',
    'sc_file_edit' => 'TYPO3\\CMS\\Backend\\Controller\\File\\EditFileController',
    'typo3_tcefile' => 'TYPO3\\CMS\\Backend\\Controller\\File\\FileController',
    'sc_file_upload' => 'TYPO3\\CMS\\Backend\\Controller\\File\\FileUploadController',
    'sc_file_rename' => 'TYPO3\\CMS\\Backend\\Controller\\File\\RenameFileController',
    'sc_alt_file_navframe' => 'TYPO3\\CMS\\Backend\\Controller\\FileSystemNavigationFrameController',
    'sc_listframe_loader' => 'TYPO3\\CMS\\Backend\\Controller\\ListFrameLoaderController',
    'sc_index' => 'TYPO3\\CMS\\Backend\\Controller\\LoginController',
    'sc_login_frameset' => 'TYPO3\\CMS\\Backend\\Controller\\LoginFramesetController',
    'sc_logout' => 'TYPO3\\CMS\\Backend\\Controller\\LogoutController',
    'sc_db_new' => 'TYPO3\\CMS\\Backend\\Controller\\NewRecordController',
    'sc_alt_db_navframe' => 'TYPO3\\CMS\\Backend\\Controller\\PageTreeNavigationController',
    'sc_tce_db' => 'TYPO3\\CMS\\Backend\\Controller\\SimpleDataHandlerController',
    'sc_wizard_add' => 'TYPO3\\CMS\\Backend\\Controller\\Wizard\\AddController',
    'sc_wizard_colorpicker' => 'TYPO3\\CMS\\Backend\\Controller\\Wizard\\ColorpickerController',
    'sc_wizard_edit' => 'TYPO3\\CMS\\Backend\\Controller\\Wizard\\EditController',
    'sc_wizard_forms' => 'TYPO3\\CMS\\Compatibility6\\Controller\\Wizard\\FormsController',
    'sc_wizard_list' => 'TYPO3\\CMS\\Backend\\Controller\\Wizard\\ListController',
    'sc_wizard_rte' => 'TYPO3\\CMS\\Backend\\Controller\\Wizard\\RteController',
    'sc_wizard_table' => 'TYPO3\\CMS\\Backend\\Controller\\Wizard\\TableController',
    't3lib_transferdata' => 'TYPO3\\CMS\\Backend\\Form\\DataPreprocessor',
    't3lib_tceforms_inline' => 'TYPO3\\CMS\\Backend\\Form\\Element\\InlineElement',
    't3lib_tceformsinlinehook' => 'TYPO3\\CMS\\Backend\\Form\\Element\\InlineElementHookInterface',
    't3lib_tceforms' => 'TYPO3\\CMS\\Backend\\Form\\FormEngine',
    't3lib_tceforms_fe' => 'TYPO3\\CMS\\Backend\\Form\\FrontendFormEngine',
    't3lib_tceforms_dbfileiconshook' => 'TYPO3\\CMS\\Backend\\Form\\DatabaseFileIconsHookInterface',
    't3lib_tceforms_suggest' => 'TYPO3\\CMS\\Backend\\Form\\Wizard\\SuggestWizard',
    't3lib_tceforms_suggest_defaultreceiver' => 'TYPO3\\CMS\\Backend\\Form\\Wizard\\SuggestWizardDefaultReceiver',
    't3lib_tceforms_tree' => 'TYPO3\\CMS\\Backend\\Form\\Element\\TreeElement',
    't3lib_tceforms_valueslider' => 'TYPO3\\CMS\\Backend\\Form\\Wizard\\ValueSliderWizard',
    't3lib_tceforms_flexforms' => 'TYPO3\\CMS\\Backend\\Form\\FlexFormsHelper',
    't3lib_tsfebeuserauth' => 'TYPO3\\CMS\\Backend\\FrontendBackendUserAuthentication',
    'recordhistory' => 'TYPO3\\CMS\\Backend\\History\\RecordHistory',
    'extdirect_dataprovider_state' => 'TYPO3\\CMS\\Backend\\InterfaceState\\ExtDirect\\DataProvider',
    't3lib_extobjbase' => 'TYPO3\\CMS\\Backend\\Module\\AbstractFunctionModule',
    't3lib_scbase' => 'TYPO3\\CMS\\Backend\\Module\\BaseScriptClass',
    't3lib_loadmodules' => 'TYPO3\\CMS\\Backend\\Module\\ModuleLoader',
    'typo3_modulestorage' => 'TYPO3\\CMS\\Backend\\Module\\ModuleStorage',
    't3lib_modsettings' => 'TYPO3\\CMS\\Backend\\ModuleSettings',
    't3lib_recordlist' => 'TYPO3\\CMS\\Backend\\RecordList\\AbstractRecordList',
    'tbe_browser_recordlist' => 'TYPO3\\CMS\\Backend\\RecordList\\ElementBrowserRecordList',
    't3lib_localrecordlistgettablehook' => 'TYPO3\\CMS\\Backend\\RecordList\\RecordListGetTableHookInterface',
    't3lib_rteapi' => 'TYPO3\\CMS\\Backend\\Rte\\AbstractRte',
    'extdirect_dataprovider_backendlivesearch' => 'TYPO3\\CMS\\Backend\\Search\\LiveSearch\\ExtDirect\\LiveSearchDataProvider',
    't3lib_search_livesearch' => 'TYPO3\\CMS\\Backend\\Search\\LiveSearch\\LiveSearch',
    't3lib_search_livesearch_queryparser' => 'TYPO3\\CMS\\Backend\\Search\\LiveSearch\\QueryParser',
    't3lib_spritemanager_abstracthandler' => 'TYPO3\\CMS\\Backend\\Sprite\\AbstractSpriteHandler',
    't3lib_spritemanager_simplehandler' => 'TYPO3\\CMS\\Backend\\Sprite\\SimpleSpriteHandler',
    't3lib_spritemanager_spritebuildinghandler' => 'TYPO3\\CMS\\Backend\\Sprite\\SpriteBuildingHandler',
    't3lib_spritemanager_spritegenerator' => 'TYPO3\\CMS\\Backend\\Sprite\\SpriteGenerator',
    't3lib_spritemanager_spriteicongenerator' => 'TYPO3\\CMS\\Backend\\Sprite\\SpriteIconGeneratorInterface',
    't3lib_spritemanager' => 'TYPO3\\CMS\\Backend\\Sprite\\SpriteManager',
    'template' => 'TYPO3\\CMS\\Backend\\Template\\DocumentTemplate',
    'frontenddoc' => 'TYPO3\\CMS\\Backend\\Template\\FrontendDocumentTemplate',
    't3lib_tree_extdirect_abstractextjstree' => 'TYPO3\\CMS\\Backend\\Tree\\AbstractExtJsTree',
    't3lib_tree_abstracttree' => 'TYPO3\\CMS\\Backend\\Tree\\AbstractTree',
    't3lib_tree_abstractdataprovider' => 'TYPO3\\CMS\\Backend\\Tree\\AbstractTreeDataProvider',
    't3lib_tree_abstractstateprovider' => 'TYPO3\\CMS\\Backend\\Tree\\AbstractTreeStateProvider',
    't3lib_tree_comparablenode' => 'TYPO3\\CMS\\Backend\\Tree\\ComparableNodeInterface',
    't3lib_tree_draggableanddropable' => 'TYPO3\\CMS\\Backend\\Tree\\DraggableAndDropableNodeInterface',
    't3lib_tree_labeleditable' => 'TYPO3\\CMS\\Backend\\Tree\\EditableNodeLabelInterface',
    't3lib_tree_extdirect_node' => 'TYPO3\\CMS\\Backend\\Tree\\ExtDirectNode',
    't3lib_tree_pagetree_interfaces_collectionprocessor' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\CollectionProcessorInterface',
    't3lib_tree_pagetree_commands' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\Commands',
    't3lib_tree_pagetree_dataprovider' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\DataProvider',
    't3lib_tree_pagetree_extdirect_commands' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\ExtdirectTreeCommands',
    't3lib_tree_pagetree_extdirect_tree' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\ExtdirectTreeDataProvider',
    't3lib_tree_pagetree_indicator' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\Indicator',
    't3lib_tree_pagetree_interfaces_indicatorprovider' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\IndicatorProviderInterface',
    't3lib_tree_pagetree_node' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\PagetreeNode',
    't3lib_tree_pagetree_nodecollection' => 'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\PagetreeNodeCollection',
    't3lib_tree_renderer_abstract' => 'TYPO3\\CMS\\Backend\\Tree\\Renderer\\AbstractTreeRenderer',
    't3lib_tree_renderer_extjsjson' => 'TYPO3\\CMS\\Backend\\Tree\\Renderer\\ExtJsJsonTreeRenderer',
    't3lib_tree_renderer_unorderedlist' => 'TYPO3\\CMS\\Backend\\Tree\\Renderer\\UnorderedListTreeRenderer',
    't3lib_tree_sortednodecollection' => 'TYPO3\\CMS\\Backend\\Tree\\SortedTreeNodeCollection',
    't3lib_tree_node' => 'TYPO3\\CMS\\Backend\\Tree\\TreeNode',
    't3lib_tree_nodecollection' => 'TYPO3\\CMS\\Backend\\Tree\\TreeNodeCollection',
    't3lib_tree_representationnode' => 'TYPO3\\CMS\\Backend\\Tree\\TreeRepresentationNode',
    't3lib_treeview' => 'TYPO3\\CMS\\Backend\\Tree\\View\\AbstractTreeView',
    't3lib_browsetree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\BrowseTreeView',
    't3lib_foldertree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\FolderTreeView',
    't3lib_positionmap' => 'TYPO3\\CMS\\Backend\\Tree\\View\\PagePositionMap',
    't3lib_pagetree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\PageTreeView',
    'extdirect_dataprovider_backendusersettings' => 'TYPO3\\CMS\\Backend\\User\\ExtDirect\\BackendUserSettingsDataProvider',
    't3lib_befunc' => 'TYPO3\\CMS\\Backend\\Utility\\BackendUtility',
    't3lib_iconworks' => 'TYPO3\\CMS\\Backend\\Utility\\IconUtility',
    'tx_cms_backendlayout' => 'TYPO3\\CMS\\Backend\\View\\BackendLayoutView',
    'modulemenu' => 'TYPO3\\CMS\\Backend\\View\\ModuleMenuView',
    'tx_cms_layout' => 'TYPO3\\CMS\\Backend\\View\\PageLayoutView',
    'tx_cms_layout_tt_content_drawitemhook' => 'TYPO3\\CMS\\Backend\\View\\PageLayoutViewDrawItemHookInterface',
    'webpagetree' => 'TYPO3\\CMS\\Backend\\View\\PageTreeView',
    'sc_t3lib_thumbs' => 'TYPO3\\CMS\\Backend\\View\\ThumbnailView',
    'typo3logo' => 'TYPO3\\CMS\\Backend\\View\\LogoView',
    'cms_newcontentelementwizardshook' => 'TYPO3\\CMS\\Backend\\Wizard\\NewContentElementWizardHookInterface',
    't3lib_extjs_extdirectrouter' => 'TYPO3\\CMS\\Core\\ExtDirect\\ExtDirectRouter',
    't3lib_extjs_extdirectapi' => 'TYPO3\\CMS\\Core\\ExtDirect\\ExtDirectApi',
    't3lib_extjs_extdirectdebug' => 'TYPO3\\CMS\\Core\\ExtDirect\\ExtDirectDebug',
    'extdirect_dataprovider_contexthelp' => 'TYPO3\\CMS\\ContextHelp\\ExtDirect\\ContextHelpDataProvider',
    't3lib_userauth' => 'TYPO3\\CMS\\Core\\Authentication\\AbstractUserAuthentication',
    't3lib_beuserauth' => 'TYPO3\\CMS\\Core\\Authentication\\BackendUserAuthentication',
    't3lib_autoloader' => 'TYPO3\\CMS\\Core\\Core\\ClassLoader',
    't3lib_cache_backend_abstractbackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\AbstractBackend',
    't3lib_cache_backend_apcbackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\ApcBackend',
    't3lib_cache_backend_backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\BackendInterface',
    't3lib_cache_backend_filebackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\FileBackend',
    't3lib_cache_backend_memcachedbackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\MemcachedBackend',
    't3lib_cache_backend_nullbackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\NullBackend',
    't3lib_cache_backend_pdobackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\PdoBackend',
    't3lib_cache_backend_phpcapablebackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\PhpCapableBackendInterface',
    't3lib_cache_backend_redisbackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\RedisBackend',
    't3lib_cache_backend_transientmemorybackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\TransientMemoryBackend',
    't3lib_cache_backend_dbbackend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
    't3lib_cache' => 'TYPO3\\CMS\\Core\\Cache\\Cache',
    't3lib_cache_factory' => 'TYPO3\\CMS\\Core\\Cache\\CacheFactory',
    't3lib_cache_manager' => 'TYPO3\\CMS\\Core\\Cache\\CacheManager',
    't3lib_cache_exception' => 'TYPO3\\CMS\\Core\\Cache\\Exception',
    't3lib_cache_exception_classalreadyloaded' => 'TYPO3\\CMS\\Core\\Cache\\Exception\\ClassAlreadyLoadedException',
    't3lib_cache_exception_duplicateidentifier' => 'TYPO3\\CMS\\Core\\Cache\\Exception\\DuplicateIdentifierException',
    't3lib_cache_exception_invalidbackend' => 'TYPO3\\CMS\\Core\\Cache\\Exception\\InvalidBackendException',
    't3lib_cache_exception_invalidcache' => 'TYPO3\\CMS\\Core\\Cache\\Exception\\InvalidCacheException',
    't3lib_cache_exception_invaliddata' => 'TYPO3\\CMS\\Core\\Cache\\Exception\\InvalidDataException',
    't3lib_cache_exception_nosuchcache' => 'TYPO3\\CMS\\Core\\Cache\\Exception\\NoSuchCacheException',
    't3lib_cache_frontend_abstractfrontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\AbstractFrontend',
    't3lib_cache_frontend_frontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\FrontendInterface',
    't3lib_cache_frontend_phpfrontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\PhpFrontend',
    't3lib_cache_frontend_stringfrontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\StringFrontend',
    't3lib_cache_frontend_variablefrontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend',
    't3lib_cs' => 'TYPO3\\CMS\\Core\\Charset\\CharsetConverter',
    't3lib_collection_abstractrecordcollection' => 'TYPO3\\CMS\\Core\\Collection\\AbstractRecordCollection',
    't3lib_collection_collection' => 'TYPO3\\CMS\\Core\\Collection\\CollectionInterface',
    't3lib_collection_editable' => 'TYPO3\\CMS\\Core\\Collection\\EditableCollectionInterface',
    't3lib_collection_nameable' => 'TYPO3\\CMS\\Core\\Collection\\NameableCollectionInterface',
    't3lib_collection_persistable' => 'TYPO3\\CMS\\Core\\Collection\\PersistableCollectionInterface',
    't3lib_collection_recordcollection' => 'TYPO3\\CMS\\Core\\Collection\\RecordCollectionInterface',
    't3lib_collection_recordcollectionrepository' => 'TYPO3\\CMS\\Core\\Collection\\RecordCollectionRepository',
    't3lib_collection_sortable' => 'TYPO3\\CMS\\Core\\Collection\\SortableCollectionInterface',
    't3lib_collection_staticrecordcollection' => 'TYPO3\\CMS\\Core\\Collection\\StaticRecordCollection',
    't3lib_flexformtools' => 'TYPO3\\CMS\\Core\\Configuration\\FlexForm\\FlexFormTools',
    't3lib_matchcondition_abstract' => 'TYPO3\\CMS\\Core\\Configuration\\TypoScript\\ConditionMatching\\AbstractConditionMatcher',
    't3lib_db' => 'TYPO3\\CMS\\Core\\Database\\DatabaseConnection',
    't3lib_db_postprocessqueryhook' => 'TYPO3\\CMS\\Core\\Database\\PostProcessQueryHookInterface',
    't3lib_db_preprocessqueryhook' => 'TYPO3\\CMS\\Core\\Database\\PreProcessQueryHookInterface',
    't3lib_pdohelper' => 'TYPO3\\CMS\\Core\\Database\\PdoHelper',
    't3lib_db_preparedstatement' => 'TYPO3\\CMS\\Core\\Database\\PreparedStatement',
    't3lib_querygenerator' => 'TYPO3\\CMS\\Core\\Database\\QueryGenerator',
    't3lib_fullsearch' => 'TYPO3\\CMS\\Core\\Database\\QueryView',
    't3lib_refindex' => 'TYPO3\\CMS\\Core\\Database\\ReferenceIndex',
    't3lib_loaddbgroup' => 'TYPO3\\CMS\\Core\\Database\\RelationHandler',
    't3lib_softrefproc' => 'TYPO3\\CMS\\Core\\Database\\SoftReferenceIndex',
    't3lib_sqlparser' => 'TYPO3\\CMS\\Core\\Database\\SqlParser',
    't3lib_exttables_postprocessinghook' => 'TYPO3\\CMS\\Core\\Database\\TableConfigurationPostProcessingHookInterface',
    't3lib_tcemain' => 'TYPO3\\CMS\\Core\\DataHandling\\DataHandler',
    't3lib_tcemain_checkmodifyaccesslisthook' => 'TYPO3\\CMS\\Core\\DataHandling\\DataHandlerCheckModifyAccessListHookInterface',
    't3lib_tcemain_processuploadhook' => 'TYPO3\\CMS\\Core\\DataHandling\\DataHandlerProcessUploadHookInterface',
    't3lib_browselinkshook' => 'TYPO3\\CMS\\Core\\ElementBrowser\\ElementBrowserHookInterface',
    't3lib_codec_javascriptencoder' => 'TYPO3\\CMS\\Core\\Encoder\\JavaScriptEncoder',
    't3lib_error_abstractexceptionhandler' => 'TYPO3\\CMS\\Core\\Error\\AbstractExceptionHandler',
    't3lib_error_debugexceptionhandler' => 'TYPO3\\CMS\\Core\\Error\\DebugExceptionHandler',
    't3lib_error_errorhandler' => 'TYPO3\\CMS\\Core\\Error\\ErrorHandler',
    't3lib_error_errorhandlerinterface' => 'TYPO3\\CMS\\Core\\Error\\ErrorHandlerInterface',
    't3lib_error_exception' => 'TYPO3\\CMS\\Core\\Error\\Exception',
    't3lib_error_exceptionhandlerinterface' => 'TYPO3\\CMS\\Core\\Error\\ExceptionHandlerInterface',
    't3lib_error_http_abstractclienterrorexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\AbstractClientErrorException',
    't3lib_error_http_abstractservererrorexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\AbstractServerErrorException',
    't3lib_error_http_badrequestexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\BadRequestException',
    't3lib_error_http_forbiddenexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\ForbiddenException',
    't3lib_error_http_pagenotfoundexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\PageNotFoundException',
    't3lib_error_http_serviceunavailableexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\ServiceUnavailableException',
    't3lib_error_http_statusexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\StatusException',
    't3lib_error_http_unauthorizedexception' => 'TYPO3\\CMS\\Core\\Error\\Http\\UnauthorizedException',
    't3lib_error_productionexceptionhandler' => 'TYPO3\\CMS\\Core\\Error\\ProductionExceptionHandler',
    't3lib_exception' => 'TYPO3\\CMS\\Core\\Exception',
    't3lib_formprotection_abstract' => 'TYPO3\\CMS\\Core\\FormProtection\\AbstractFormProtection',
    't3lib_formprotection_backendformprotection' => 'TYPO3\\CMS\\Core\\FormProtection\\BackendFormProtection',
    't3lib_formprotection_disabledformprotection' => 'TYPO3\\CMS\\Core\\FormProtection\\DisabledFormProtection',
    't3lib_formprotection_invalidtokenexception' => 'TYPO3\\CMS\\Core\\FormProtection\\Exception',
    't3lib_formprotection_factory' => 'TYPO3\\CMS\\Core\\FormProtection\\FormProtectionFactory',
    't3lib_formprotection_installtoolformprotection' => 'TYPO3\\CMS\\Core\\FormProtection\\InstallToolFormProtection',
    't3lib_frontendedit' => 'TYPO3\\CMS\\Core\\FrontendEditing\\FrontendEditingController',
    't3lib_parsehtml' => 'TYPO3\\CMS\\Core\\Html\\HtmlParser',
    't3lib_parsehtml_proc' => 'TYPO3\\CMS\\Core\\Html\\RteHtmlParser',
    'typo3ajax' => 'TYPO3\\CMS\\Core\\Http\\AjaxRequestHandler',
    't3lib_http_request' => 'TYPO3\\CMS\\Core\\Http\\HttpRequest',
    't3lib_http_observer_download' => 'TYPO3\\CMS\\Core\\Http\\Observer\\Download',
    't3lib_stdgraphic' => 'TYPO3\\CMS\\Core\\Imaging\\GraphicalFunctions',
    't3lib_admin' => 'TYPO3\\CMS\\Core\\Integrity\\DatabaseIntegrityCheck',
    't3lib_l10n_exception_filenotfound' => 'TYPO3\\CMS\\Core\\Localization\\Exception\\FileNotFoundException',
    't3lib_l10n_exception_invalidparser' => 'TYPO3\\CMS\\Core\\Localization\\Exception\\InvalidParserException',
    't3lib_l10n_exception_invalidxmlfile' => 'TYPO3\\CMS\\Core\\Localization\\Exception\\InvalidXmlFileException',
    't3lib_l10n_store' => 'TYPO3\\CMS\\Core\\Localization\\LanguageStore',
    't3lib_l10n_locales' => 'TYPO3\\CMS\\Core\\Localization\\Locales',
    't3lib_l10n_factory' => 'TYPO3\\CMS\\Core\\Localization\\LocalizationFactory',
    't3lib_l10n_parser_abstractxml' => 'TYPO3\\CMS\\Core\\Localization\\Parser\\AbstractXmlParser',
    't3lib_l10n_parser' => 'TYPO3\\CMS\\Core\\Localization\\Parser\\LocalizationParserInterface',
    't3lib_l10n_parser_llphp' => 'TYPO3\\CMS\\Core\\Localization\\Parser\\LocallangArrayParser',
    't3lib_l10n_parser_llxml' => 'TYPO3\\CMS\\Core\\Localization\\Parser\\LocallangXmlParser',
    't3lib_l10n_parser_xliff' => 'TYPO3\\CMS\\Core\\Localization\\Parser\\XliffParser',
    't3lib_lock' => 'TYPO3\\CMS\\Core\\Locking\\Locker',
    't3lib_mail_mailer' => 'TYPO3\\CMS\\Core\\Mail\\Mailer',
    't3lib_mail_maileradapter' => 'TYPO3\\CMS\\Core\\Mail\\MailerAdapterInterface',
    't3lib_mail_message' => 'TYPO3\\CMS\\Core\\Mail\\MailMessage',
    't3lib_mail_mboxtransport' => 'TYPO3\\CMS\\Core\\Mail\\MboxTransport',
    't3lib_mail_rfc822addressesparser' => 'TYPO3\\CMS\\Core\\Mail\\Rfc822AddressesParser',
    't3lib_message_abstractmessage' => 'TYPO3\\CMS\\Core\\Messaging\\AbstractMessage',
    't3lib_message_abstractstandalonemessage' => 'TYPO3\\CMS\\Core\\Messaging\\AbstractStandaloneMessage',
    't3lib_message_errorpagemessage' => 'TYPO3\\CMS\\Core\\Messaging\\ErrorpageMessage',
    't3lib_flashmessage' => 'TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
    't3lib_flashmessagequeue' => 'TYPO3\\CMS\\Core\\Messaging\\FlashMessageQueue',
    't3lib_pagerenderer' => 'TYPO3\\CMS\\Core\\Page\\PageRenderer',
    't3lib_registry' => 'TYPO3\\CMS\\Core\\Registry',
    't3lib_compressor' => 'TYPO3\\CMS\\Core\\Resource\\ResourceCompressor',
    't3lib_svbase' => 'TYPO3\\CMS\\Core\\Service\\AbstractService',
    't3lib_singleton' => 'TYPO3\\CMS\\Core\\SingletonInterface',
    't3lib_timetracknull' => 'TYPO3\\CMS\\Core\\TimeTracker\\NullTimeTracker',
    't3lib_timetrack' => 'TYPO3\\CMS\\Core\\TimeTracker\\TimeTracker',
    't3lib_tree_tca_abstracttcatreedataprovider' => 'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\AbstractTableConfigurationTreeDataProvider',
    't3lib_tree_tca_databasetreedataprovider' => 'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\DatabaseTreeDataProvider',
    't3lib_tree_tca_databasenode' => 'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\DatabaseTreeNode',
    't3lib_tree_tca_extjsarrayrenderer' => 'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\ExtJsArrayTreeRenderer',
    't3lib_tree_tca_tcatree' => 'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\TableConfigurationTree',
    't3lib_tree_tca_dataproviderfactory' => 'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\TreeDataProviderFactory',
    't3lib_tsstyleconfig' => 'TYPO3\\CMS\\Core\\TypoScript\\ConfigurationForm',
    't3lib_tsparser_ext' => 'TYPO3\\CMS\\Core\\TypoScript\\ExtendedTemplateService',
    't3lib_tstemplate' => 'TYPO3\\CMS\\Core\\TypoScript\\TemplateService',
    't3lib_utility_array' => 'TYPO3\\CMS\\Core\\Utility\\ArrayUtility',
    't3lib_utility_client' => 'TYPO3\\CMS\\Core\\Utility\\ClientUtility',
    't3lib_exec' => 'TYPO3\\CMS\\Core\\Utility\\CommandUtility',
    't3lib_utility_command' => 'TYPO3\\CMS\\Core\\Utility\\CommandUtility',
    't3lib_utility_debug' => 'TYPO3\\CMS\\Core\\Utility\\DebugUtility',
    't3lib_diff' => 'TYPO3\\CMS\\Core\\Utility\\DiffUtility',
    't3lib_basicfilefunctions' => 'TYPO3\\CMS\\Core\\Utility\\File\\BasicFileUtility',
    't3lib_extfilefunctions' => 'TYPO3\\CMS\\Core\\Utility\\File\\ExtendedFileUtility',
    't3lib_extfilefunctions_processdatahook' => 'TYPO3\\CMS\\Core\\Utility\\File\\ExtendedFileUtilityProcessDataHookInterface',
    't3lib_div' => 'TYPO3\\CMS\\Core\\Utility\\GeneralUtility',
    't3lib_utility_http' => 'TYPO3\\CMS\\Core\\Utility\\HttpUtility',
    't3lib_utility_mail' => 'TYPO3\\CMS\\Core\\Utility\\MailUtility',
    't3lib_utility_math' => 'TYPO3\\CMS\\Core\\Utility\\MathUtility',
    't3lib_utility_monitor' => 'TYPO3\\CMS\\Core\\Utility\\MonitorUtility',
    't3lib_utility_path' => 'TYPO3\\CMS\\Core\\Utility\\PathUtility',
    't3lib_utility_phpoptions' => 'TYPO3\\CMS\\Core\\Utility\\PhpOptionsUtility',
    't3lib_utility_versionnumber' => 'TYPO3\\CMS\\Core\\Utility\\VersionNumberUtility',
    'sc_view_help' => 'TYPO3\\CMS\\Cshmanual\\Controller\\HelpModuleController',
    'tx_cssstyledcontent_pi1' => 'TYPO3\\CMS\\CssStyledContent\\Controller\\CssStyledContentController',
    'tx_dbal_module1' => 'TYPO3\\CMS\\Dbal\\Controller\\ModuleController',
    'tx_dbal_querycache' => 'TYPO3\\CMS\\Dbal\\QueryCache',
    'ux_t3lib_db' => 'TYPO3\\CMS\\Dbal\\Database\\DatabaseConnection',
    'ux_t3lib_sqlparser' => 'TYPO3\\CMS\\Dbal\\Database\\SqlParser',
    'ux_localrecordlist' => 'TYPO3\\CMS\\Dbal\\RecordList\\DatabaseRecordList',
    'tx_extbase_command_helpcommandcontroller' => 'TYPO3\\CMS\\Extbase\\Command\\HelpCommandController',
    'tx_extbase_configuration_abstractconfigurationmanager' => 'TYPO3\\CMS\\Extbase\\Configuration\\AbstractConfigurationManager',
    'tx_extbase_configuration_backendconfigurationmanager' => 'TYPO3\\CMS\\Extbase\\Configuration\\BackendConfigurationManager',
    'tx_extbase_configuration_configurationmanager' => 'TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager',
    'tx_extbase_configuration_configurationmanagerinterface' => 'TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface',
    'tx_extbase_configuration_exception' => 'TYPO3\\CMS\\Extbase\\Configuration\\Exception',
    'tx_extbase_configuration_exception_containerislocked' => 'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\ContainerIsLockedException',
    'tx_extbase_configuration_exception_invalidconfigurationtype' => 'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\InvalidConfigurationTypeException',
    'tx_extbase_configuration_exception_nosuchfile' => 'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\NoSuchFileException',
    'tx_extbase_configuration_exception_nosuchoption' => 'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\NoSuchOptionException',
    'tx_extbase_configuration_exception_parseerror' => 'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\ParseErrorException',
    'tx_extbase_configuration_frontendconfigurationmanager' => 'TYPO3\\CMS\\Extbase\\Configuration\\FrontendConfigurationManager',
    'tx_extbase_core_bootstrap' => 'TYPO3\\CMS\\Extbase\\Core\\Bootstrap',
    'tx_extbase_core_bootstrapinterface' => 'TYPO3\\CMS\\Extbase\\Core\\BootstrapInterface',
    'tx_extbase_domain_model_abstractfilecollection' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\AbstractFileCollection',
    'tx_extbase_domain_model_abstractfilefolder' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\AbstractFileFolder',
    'tx_extbase_domain_model_backenduser' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\BackendUser',
    'tx_extbase_domain_model_backendusergroup' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\BackendUserGroup',
    'tx_extbase_domain_model_category' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\Category',
    'tx_extbase_domain_model_file' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\File',
    'tx_extbase_domain_model_filemount' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\FileMount',
    'tx_extbase_domain_model_filereference' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\FileReference',
    'tx_extbase_domain_model_folder' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\Folder',
    'tx_extbase_domain_model_folderbasedfilecollection' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\FolderBasedFileCollection',
    'tx_extbase_domain_model_frontenduser' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\FrontendUser',
    'tx_extbase_domain_model_frontendusergroup' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\FrontendUserGroup',
    'tx_extbase_domain_model_staticfilecollection' => 'TYPO3\\CMS\\Extbase\\Domain\\Model\\StaticFileCollection',
    'tx_extbase_domain_repository_backenduserrepository' => 'TYPO3\\CMS\\Extbase\\Domain\\Repository\\BackendUserGroupRepository',
    'tx_extbase_domain_repository_backendusergrouprepository' => 'TYPO3\\CMS\\Extbase\\Domain\\Repository\\BackendUserGroupRepository',
    'tx_extbase_domain_repository_categoryrepository' => 'TYPO3\\CMS\\Extbase\\Domain\\Repository\\CategoryRepository',
    'tx_extbase_domain_repository_filemountrepository' => 'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FileMountRepository',
    'tx_extbase_domain_repository_frontendusergrouprepository' => 'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserGroupRepository',
    'tx_extbase_domain_repository_frontenduserrepository' => 'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository',
    'tx_extbase_domainobject_abstractdomainobject' => 'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject',
    'tx_extbase_domainobject_abstractentity' => 'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractEntity',
    'tx_extbase_domainobject_abstractvalueobject' => 'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractValueObject',
    'tx_extbase_domainobject_domainobjectinterface' => 'TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface',
    'tx_extbase_error_error' => 'TYPO3\\CMS\\Extbase\\Error\\Error',
    'tx_extbase_error_message' => 'TYPO3\\CMS\\Extbase\\Error\\Message',
    'tx_extbase_error_notice' => 'TYPO3\\CMS\\Extbase\\Error\\Notice',
    'tx_extbase_error_result' => 'TYPO3\\CMS\\Extbase\\Error\\Result',
    'tx_extbase_error_warning' => 'TYPO3\\CMS\\Extbase\\Error\\Warning',
    'tx_extbase_exception' => 'TYPO3\\CMS\\Extbase\\Exception',
    'tx_extbase_mvc_cli_command' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Command',
    'tx_extbase_mvc_cli_commandargumentdefinition' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\CommandArgumentDefinition',
    'tx_extbase_mvc_cli_commandmanager' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\CommandManager',
    'tx_extbase_mvc_cli_request' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Request',
    'tx_extbase_mvc_cli_requestbuilder' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\RequestBuilder',
    'tx_extbase_mvc_cli_requesthandler' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\RequestHandler',
    'tx_extbase_mvc_cli_response' => 'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Response',
    'tx_extbase_mvc_controller_abstractcontroller' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\AbstractController',
    'tx_extbase_mvc_controller_actioncontroller' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController',
    'tx_extbase_mvc_controller_argument' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument',
    'tx_extbase_mvc_controller_arguments' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments',
    'tx_extbase_mvc_controller_commandcontroller' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\CommandController',
    'tx_extbase_mvc_controller_commandcontrollerinterface' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\CommandControllerInterface',
    'tx_extbase_mvc_controller_controllercontext' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerContext',
    'tx_extbase_mvc_controller_controllerinterface' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerInterface',
    'tx_extbase_mvc_controller_exception_requiredargumentmissingexception' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Exception\\RequiredArgumentMissingException',
    'tx_extbase_mvc_controller_mvcpropertymappingconfiguration' => 'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\MvcPropertyMappingConfiguration',
    'tx_extbase_mvc_dispatcher' => 'TYPO3\\CMS\\Extbase\\Mvc\\Dispatcher',
    'tx_extbase_mvc_exception' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception',
    'tx_extbase_mvc_exception_ambiguouscommandidentifier' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\AmbiguousCommandIdentifierException',
    'tx_extbase_mvc_exception_command' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\CommandException',
    'tx_extbase_mvc_exception_infiniteloop' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InfiniteLoopException',
    'tx_extbase_mvc_exception_invalidactionname' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidActionNameException',
    'tx_extbase_mvc_exception_invalidargumentmixing' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentMixingException',
    'tx_extbase_mvc_exception_invalidargumentname' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentNameException',
    'tx_extbase_mvc_exception_invalidargumenttype' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentTypeException',
    'tx_extbase_mvc_exception_invalidargumentvalue' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentValueException',
    'tx_extbase_mvc_exception_invalidcommandidentifier' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidCommandIdentifierException',
    'tx_extbase_mvc_exception_invalidcontroller' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidControllerException',
    'tx_extbase_mvc_exception_invalidcontrollername' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidControllerNameException',
    'tx_extbase_mvc_exception_invalidextensionname' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidExtensionNameException',
    'tx_extbase_mvc_exception_invalidmarker' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidMarkerException',
    'tx_extbase_mvc_exception_invalidornorequesthash' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidOrNoRequestHashException',
    'tx_extbase_mvc_exception_invalidrequestmethod' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidRequestMethodException',
    'tx_extbase_mvc_exception_invalidrequesttype' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidRequestTypeException',
    'tx_extbase_mvc_exception_invalidtemplateresource' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidTemplateResourceException',
    'tx_extbase_mvc_exception_invaliduripattern' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidUriPatternException',
    'tx_extbase_mvc_exception_invalidviewhelper' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidViewHelperException',
    'tx_extbase_mvc_exception_nosuchaction' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchActionException',
    'tx_extbase_mvc_exception_nosuchargument' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchArgumentException',
    'tx_extbase_mvc_exception_nosuchcommand' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchCommandException',
    'tx_extbase_mvc_exception_nosuchcontroller' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchControllerException',
    'tx_extbase_mvc_exception_requiredargumentmissing' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\RequiredArgumentMissingException',
    'tx_extbase_mvc_exception_stopaction' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\StopActionException',
    'tx_extbase_mvc_exception_unsupportedrequesttype' => 'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\UnsupportedRequestTypeException',
    'tx_extbase_mvc_request' => 'TYPO3\\CMS\\Extbase\\Mvc\\Request',
    'tx_extbase_mvc_requesthandlerinterface' => 'TYPO3\\CMS\\Extbase\\Mvc\\RequestHandlerInterface',
    'tx_extbase_mvc_requesthandlerresolver' => 'TYPO3\\CMS\\Extbase\\Mvc\\RequestHandlerResolver',
    'tx_extbase_mvc_requestinterface' => 'TYPO3\\CMS\\Extbase\\Mvc\\RequestInterface',
    'tx_extbase_mvc_response' => 'TYPO3\\CMS\\Extbase\\Mvc\\Response',
    'tx_extbase_mvc_responseinterface' => 'TYPO3\\CMS\\Extbase\\Mvc\\ResponseInterface',
    'tx_extbase_mvc_view_abstractview' => 'TYPO3\\CMS\\Extbase\\Mvc\\View\\AbstractView',
    'tx_extbase_mvc_view_emptyview' => 'TYPO3\\CMS\\Extbase\\Mvc\\View\\EmptyView',
    'tx_extbase_mvc_view_notfoundview' => 'TYPO3\\CMS\\Extbase\\Mvc\\View\\NotFoundView',
    'tx_extbase_mvc_view_viewinterface' => 'TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface',
    'tx_extbase_mvc_web_abstractrequesthandler' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\AbstractRequestHandler',
    'tx_extbase_mvc_web_backendrequesthandler' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\BackendRequestHandler',
    'tx_extbase_mvc_web_frontendrequesthandler' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\FrontendRequestHandler',
    'tx_extbase_mvc_web_request' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\Request',
    'tx_extbase_mvc_web_requestbuilder' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\RequestBuilder',
    'tx_extbase_mvc_web_response' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\Response',
    'tx_extbase_mvc_web_routing_uribuilder' => 'TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder',
    'tx_extbase_object_container_classinfo' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\ClassInfo',
    'tx_extbase_object_container_classinfocache' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\ClassInfoCache',
    'tx_extbase_object_container_classinfofactory' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\ClassInfoFactory',
    'tx_extbase_object_container_container' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\Container',
    'tx_extbase_object_container_exception_cannotinitializecacheexception' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\Exception\\CannotInitializeCacheException',
    'tx_extbase_object_container_exception_toomanyrecursionlevelsexception' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\Exception\\TooManyRecursionLevelsException',
    'tx_extbase_object_container_exception_unknownobjectexception' => 'TYPO3\\CMS\\Extbase\\Object\\Container\\Exception\\UnknownObjectException',
    'tx_extbase_object_exception' => 'TYPO3\\CMS\\Extbase\\Object\\Exception',
    'tx_extbase_object_exception_cannotbuildobject' => 'TYPO3\\CMS\\Extbase\\Object\\Exception\\CannotBuildObjectException',
    'tx_extbase_object_exception_cannotreconstituteobject' => 'TYPO3\\CMS\\Extbase\\Object\\Exception\\CannotReconstituteObjectException',
    'tx_extbase_object_exception_wrongscope' => 'TYPO3\\CMS\\Extbase\\Object\\Exception\\WrongScopeException',
    'tx_extbase_object_invalidclass' => 'TYPO3\\CMS\\Extbase\\Object\\InvalidClassException',
    'tx_extbase_object_invalidobjectconfiguration' => 'TYPO3\\CMS\\Extbase\\Object\\InvalidObjectConfigurationException',
    'tx_extbase_object_invalidobject' => 'TYPO3\\CMS\\Extbase\\Object\\InvalidObjectException',
    'tx_extbase_object_objectalreadyregistered' => 'TYPO3\\CMS\\Extbase\\Object\\ObjectAlreadyRegisteredException',
    'tx_extbase_object_objectmanager' => 'TYPO3\\CMS\\Extbase\\Object\\ObjectManager',
    'tx_extbase_object_objectmanagerinterface' => 'TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface',
    'tx_extbase_object_unknownclass' => 'TYPO3\\CMS\\Extbase\\Object\\UnknownClassException',
    'tx_extbase_object_unknowninterface' => 'TYPO3\\CMS\\Extbase\\Object\\UnknownInterfaceException',
    'tx_extbase_object_unresolveddependencies' => 'TYPO3\\CMS\\Extbase\\Object\\UnresolvedDependenciesException',
    'tx_extbase_persistence_backend' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Backend',
    'tx_extbase_persistence_backendinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\BackendInterface',
    'tx_extbase_persistence_exception' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception',
    'tx_extbase_persistence_exception_cleanstatenotmemorized' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\CleanStateNotMemorizedException',
    'tx_extbase_persistence_exception_illegalobjecttype' => 'TYPO3\\CMS\\Extbase\\Persistence\\Exception\\IllegalObjectTypeException',
    'tx_extbase_persistence_exception_invalidclass' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InvalidClassException',
    'tx_extbase_persistence_exception_invalidnumberofconstraints' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InvalidNumberOfConstraintsException',
    'tx_extbase_persistence_exception_invalidpropertytype' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InvalidPropertyTypeException',
    'tx_extbase_persistence_exception_missingbackend' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\MissingBackendException',
    'tx_extbase_persistence_exception_repositoryexception' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\RepositoryException',
    'tx_extbase_persistence_exception_toodirty' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\TooDirtyException',
    'tx_extbase_persistence_exception_unexpectedtypeexception' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnexpectedTypeException',
    'tx_extbase_persistence_exception_unknownobject' => 'TYPO3\\CMS\\Extbase\\Persistence\\Exception\\UnknownObjectException',
    'tx_extbase_persistence_exception_unsupportedmethod' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnsupportedMethodException',
    'tx_extbase_persistence_exception_unsupportedorder' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnsupportedOrderException',
    'tx_extbase_persistence_exception_unsupportedrelation' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnsupportedRelationException',
    'tx_extbase_persistence_generic_exception_inconsistentquerysettings' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InconsistentQuerySettingsException',
    'tx_extbase_persistence_identitymap' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\IdentityMap',
    'tx_extbase_persistence_lazyloadingproxy' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LazyLoadingProxy',
    'tx_extbase_persistence_lazyobjectstorage' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LazyObjectStorage',
    'tx_extbase_persistence_loadingstrategyinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LoadingStrategyInterface',
    'tx_extbase_persistence_mapper_columnmap' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\ColumnMap',
    'tx_extbase_persistence_mapper_datamap' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMap',
    'tx_extbase_persistence_mapper_datamapfactory' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMapFactory',
    'tx_extbase_persistence_mapper_datamapper' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMapper',
    'tx_extbase_persistence_objectmonitoringinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\ObjectMonitoringInterface',
    'tx_extbase_persistence_objectstorage' => 'TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage',
    'tx_extbase_persistence_manager' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager',
    'tx_extbase_persistence_persistencemanagerinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface',
    'tx_extbase_persistence_managerinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface',
    'tx_extbase_persistence_propertytype' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PropertyType',
    'tx_extbase_persistence_qom_andinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\AndInterface',
    'tx_extbase_persistence_qom_bindvariablevalue' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\BindVariableValue',
    'tx_extbase_persistence_qom_bindvariablevalueinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\BindVariableValueInterface',
    'tx_extbase_persistence_qom_comparison' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Comparison',
    'tx_extbase_persistence_qom_comparisoninterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\ComparisonInterface',
    'tx_extbase_persistence_qom_constraint' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Constraint',
    'tx_extbase_persistence_qom_constraintinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\ConstraintInterface',
    'tx_extbase_persistence_qom_dynamicoperandinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\DynamicOperandInterface',
    'tx_extbase_persistence_qom_equijoincondition' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\EquiJoinCondition',
    'tx_extbase_persistence_qom_equijoinconditioninterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\EquiJoinConditionInterface',
    'tx_extbase_persistence_qom_join' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Join',
    'tx_extbase_persistence_qom_joinconditioninterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\JoinConditionInterface',
    'tx_extbase_persistence_qom_joininterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\JoinInterface',
    'tx_extbase_persistence_qom_logicaland' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LogicalAnd',
    'tx_extbase_persistence_qom_logicalnot' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LogicalNot',
    'tx_extbase_persistence_qom_logicalor' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LogicalOr',
    'tx_extbase_persistence_qom_lowercase' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LowerCase',
    'tx_extbase_persistence_qom_lowercaseinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LowerCaseInterface',
    'tx_extbase_persistence_qom_notinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\NotInterface',
    'tx_extbase_persistence_qom_operand' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Operand',
    'tx_extbase_persistence_qom_operandinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\OperandInterface',
    'tx_extbase_persistence_qom_ordering' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Ordering',
    'tx_extbase_persistence_qom_orderinginterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\OrderingInterface',
    'tx_extbase_persistence_qom_orinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\OrInterface',
    'tx_extbase_persistence_qom_propertyvalue' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\PropertyValue',
    'tx_extbase_persistence_qom_propertyvalueinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\PropertyValueInterface',
    'tx_extbase_persistence_qom_queryobjectmodelfactory' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\QueryObjectModelFactory',
    'tx_extbase_persistence_qom_selector' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Selector',
    'tx_extbase_persistence_qom_selectorinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\SelectorInterface',
    'tx_extbase_persistence_qom_sourceinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\SourceInterface',
    'tx_extbase_persistence_qom_statement' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Statement',
    'tx_extbase_persistence_qom_staticoperand' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\StaticOperand',
    'tx_extbase_persistence_qom_staticoperandinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\StaticOperandInterface',
    'tx_extbase_persistence_qom_uppercase' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\UpperCase',
    'tx_extbase_persistence_qom_uppercaseinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\UpperCaseInterface',
    'tx_extbase_persistence_query' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Query',
    'tx_extbase_persistence_queryfactory' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QueryFactory',
    'tx_extbase_persistence_queryfactoryinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QueryFactoryInterface',
    'tx_extbase_persistence_queryinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\QueryInterface',
    'tx_extbase_persistence_queryresult' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QueryResult',
    'tx_extbase_persistence_queryresultinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\QueryResultInterface',
    'tx_extbase_persistence_querysettingsinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface',
    'tx_extbase_persistence_repository' => 'TYPO3\\CMS\\Extbase\\Persistence\\Repository',
    'tx_extbase_persistence_repositoryinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\RepositoryInterface',
    'tx_extbase_persistence_session' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Session',
    'tx_extbase_persistence_storage_backendinterface' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\BackendInterface',
    'tx_extbase_persistence_storage_exception_badconstraint' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Exception\\BadConstraintException',
    'tx_extbase_persistence_storage_exception_sqlerror' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Exception\\SqlErrorException',
    'tx_extbase_persistence_storage_typo3dbbackend' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbBackend',
    'tx_extbase_persistence_typo3querysettings' => 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings',
    'tx_extbase_property_exception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception',
    'tx_extbase_property_exception_duplicateobjectexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\DuplicateObjectException',
    'tx_extbase_property_exception_duplicatetypeconverterexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\DuplicateTypeConverterException',
    'tx_extbase_property_exception_formatnotsupportedexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\FormatNotSupportedException',
    'tx_extbase_property_exception_invaliddatatypeexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidDataTypeException',
    'tx_extbase_property_exception_invalidformatexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidFormatException',
    'tx_extbase_property_exception_invalidpropertyexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidPropertyException',
    'tx_extbase_property_exception_invalidpropertymappingconfigurationexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidPropertyMappingConfigurationException',
    'tx_extbase_property_exception_invalidsource' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidSourceException',
    'tx_extbase_property_exception_invalidsourceexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidSourceException',
    'tx_extbase_property_exception_invalidtarget' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidTargetException',
    'tx_extbase_property_exception_invalidtargetexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidTargetException',
    'tx_extbase_property_exception_targetnotfoundexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\TargetNotFoundException',
    'tx_extbase_property_exception_typeconverterexception' => 'TYPO3\\CMS\\Extbase\\Property\\Exception\\TypeConverterException',
    'tx_extbase_property_propertymapper' => 'TYPO3\\CMS\\Extbase\\Property\\PropertyMapper',
    'tx_extbase_property_propertymappingconfiguration' => 'TYPO3\\CMS\\Extbase\\Property\\PropertyMappingConfiguration',
    'tx_extbase_property_propertymappingconfigurationbuilder' => 'TYPO3\\CMS\\Extbase\\Property\\PropertyMappingConfigurationBuilder',
    'tx_extbase_property_propertymappingconfigurationinterface' => 'TYPO3\\CMS\\Extbase\\Property\\PropertyMappingConfigurationInterface',
    'tx_extbase_property_typeconverter_abstractfilecollectionconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\AbstractFileCollectionConverter',
    'tx_extbase_property_typeconverter_abstractfilefolderconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\AbstractFileFolderConverter',
    'tx_extbase_property_typeconverter_abstracttypeconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\AbstractTypeConverter',
    'tx_extbase_property_typeconverter_arrayconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\ArrayConverter',
    'tx_extbase_property_typeconverter_booleanconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\BooleanConverter',
    'tx_extbase_property_typeconverter_datetimeconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
    'tx_extbase_property_typeconverter_fileconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FileConverter',
    'tx_extbase_property_typeconverter_filereferenceconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FileReferenceConverter',
    'tx_extbase_property_typeconverter_floatconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FloatConverter',
    'tx_extbase_property_typeconverter_folderbasedfilecollectionconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FolderBasedFileCollectionConverter',
    'tx_extbase_property_typeconverter_folderconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FolderConverter',
    'tx_extbase_property_typeconverter_integerconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\IntegerConverter',
    'tx_extbase_property_typeconverter_objectstorageconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\ObjectStorageConverter',
    'tx_extbase_property_typeconverter_persistentobjectconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\PersistentObjectConverter',
    'tx_extbase_property_typeconverter_staticfilecollectionconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\StaticFileCollectionConverter',
    'tx_extbase_property_typeconverter_stringconverter' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\StringConverter',
    'tx_extbase_property_typeconverterinterface' => 'TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface',
    'tx_extbase_reflection_classreflection' => 'TYPO3\\CMS\\Extbase\\Reflection\\ClassReflection',
    'tx_extbase_reflection_classschema' => 'TYPO3\\CMS\\Extbase\\Reflection\\ClassSchema',
    'tx_extbase_reflection_doccommentparser' => 'TYPO3\\CMS\\Extbase\\Reflection\\DocCommentParser',
    'tx_extbase_reflection_exception' => 'TYPO3\\CMS\\Extbase\\Reflection\\Exception',
    'tx_extbase_reflection_exception_invalidpropertytype' => 'TYPO3\\CMS\\Extbase\\Reflection\\Exception\\InvalidPropertyTypeException',
    'tx_extbase_reflection_exception_propertynotaccessibleexception' => 'TYPO3\\CMS\\Extbase\\Reflection\\Exception\\PropertyNotAccessibleException',
    'tx_extbase_reflection_exception_unknownclass' => 'TYPO3\\CMS\\Extbase\\Reflection\\Exception\\UnknownClassException',
    'tx_extbase_reflection_methodreflection' => 'TYPO3\\CMS\\Extbase\\Reflection\\MethodReflection',
    'tx_extbase_reflection_objectaccess' => 'TYPO3\\CMS\\Extbase\\Reflection\\ObjectAccess',
    'tx_extbase_reflection_parameterreflection' => 'TYPO3\\CMS\\Extbase\\Reflection\\ParameterReflection',
    'tx_extbase_reflection_propertyreflection' => 'TYPO3\\CMS\\Extbase\\Reflection\\PropertyReflection',
    'tx_extbase_reflection_service' => 'TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService',
    'tx_extbase_scheduler_fieldprovider' => 'TYPO3\\CMS\\Extbase\\Scheduler\\FieldProvider',
    'tx_extbase_scheduler_task' => 'TYPO3\\CMS\\Extbase\\Scheduler\\Task',
    'tx_extbase_scheduler_taskexecutor' => 'TYPO3\\CMS\\Extbase\\Scheduler\\TaskExecutor',
    'tx_extbase_security_cryptography_hashservice' => 'TYPO3\\CMS\\Extbase\\Security\\Cryptography\\HashService',
    'tx_extbase_security_exception' => 'TYPO3\\CMS\\Extbase\\Security\\Exception',
    'tx_extbase_security_exception_invalidargumentforhashgeneration' => 'TYPO3\\CMS\\Extbase\\Security\\Exception\\InvalidArgumentForHashGenerationException',
    'tx_extbase_security_exception_invalidargumentforrequesthashgeneration' => 'TYPO3\\CMS\\Extbase\\Security\\Exception\\InvalidArgumentForRequestHashGenerationException',
    'tx_extbase_security_exception_invalidhash' => 'TYPO3\\CMS\\Extbase\\Security\\Exception\\InvalidHashException',
    'tx_extbase_security_exception_syntacticallywrongrequesthash' => 'TYPO3\\CMS\\Extbase\\Security\\Exception\\SyntacticallyWrongRequestHashException',
    'tx_extbase_service_cacheservice' => 'TYPO3\\CMS\\Extbase\\Service\\CacheService',
    'tx_extbase_service_extensionservice' => 'TYPO3\\CMS\\Extbase\\Service\\ExtensionService',
    'tx_extbase_service_flexformservice' => 'TYPO3\\CMS\\Extbase\\Service\\FlexFormService',
    'tx_extbase_service_typoscriptservice' => 'TYPO3\\CMS\\Extbase\\Service\\TypoScriptService',
    'tx_extbase_signalslot_dispatcher' => 'TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher',
    'tx_extbase_signalslot_exception_invalidslotexception' => 'TYPO3\\CMS\\Extbase\\SignalSlot\\Exception\\InvalidSlotException',
    'tx_extbase_tests_unit_basetestcase' => 'TYPO3\\CMS\\Core\\Tests\\UnitTestCase',
    'typo3\\cms\\extbase\\tests\\unit\\basetestcase' => 'TYPO3\\CMS\\Core\\Tests\\UnitTestCase',
    'tx_extbase_utility_arrays' => 'TYPO3\\CMS\\Extbase\\Utility\\ArrayUtility',
    'tx_extbase_utility_debugger' => 'TYPO3\\CMS\\Extbase\\Utility\\DebuggerUtility',
    'tx_extbase_utility_extbaserequirementscheck' => 'TYPO3\\CMS\\Extbase\\Utility\\ExtbaseRequirementsCheckUtility',
    'tx_extbase_utility_extension' => 'TYPO3\\CMS\\Extbase\\Utility\\ExtensionUtility',
    'tx_extbase_utility_frontendsimulator' => 'TYPO3\\CMS\\Extbase\\Utility\\FrontendSimulatorUtility',
    'tx_extbase_utility_localization' => 'TYPO3\\CMS\\Extbase\\Utility\\LocalizationUtility',
    'tx_extbase_validation_error' => 'TYPO3\\CMS\\Extbase\\Validation\\Error',
    'tx_extbase_validation_exception' => 'TYPO3\\CMS\\Extbase\\Validation\\Exception',
    'tx_extbase_validation_exception_invalidsubject' => 'TYPO3\\CMS\\Extbase\\Validation\\Exception\\InvalidSubjectException',
    'tx_extbase_validation_exception_invalidvalidationconfiguration' => 'TYPO3\\CMS\\Extbase\\Validation\\Exception\\InvalidValidationConfigurationException',
    'tx_extbase_validation_exception_invalidvalidationoptions' => 'TYPO3\\CMS\\Extbase\\Validation\\Exception\\InvalidValidationOptionsException',
    'tx_extbase_validation_exception_nosuchvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Exception\\NoSuchValidatorException',
    'tx_extbase_validation_exception_novalidatorfound' => 'TYPO3\\CMS\\Extbase\\Validation\\Exception\\NoValidatorFoundException',
    'tx_extbase_validation_validator_abstractcompositevalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\AbstractCompositeValidator',
    'tx_extbase_validation_validator_abstractvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\AbstractValidator',
    'tx_extbase_validation_validator_alphanumericvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\AlphanumericValidator',
    'tx_extbase_validation_validator_conjunctionvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator',
    'tx_extbase_validation_validator_datetimevalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\DateTimeValidator',
    'tx_extbase_validation_validator_disjunctionvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\DisjunctionValidator',
    'tx_extbase_validation_validator_emailaddressvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\EmailAddressValidator',
    'tx_extbase_validation_validator_floatvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\FloatValidator',
    'tx_extbase_validation_validator_genericobjectvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\GenericObjectValidator',
    'tx_extbase_validation_validator_integervalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\IntegerValidator',
    'tx_extbase_validation_validator_notemptyvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\NotEmptyValidator',
    'tx_extbase_validation_validator_numberrangevalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\NumberRangeValidator',
    'tx_extbase_validation_validator_numbervalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\NumberValidator',
    'tx_extbase_validation_validator_objectvalidatorinterface' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\ObjectValidatorInterface',
    'tx_extbase_validation_validator_rawvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\RawValidator',
    'tx_extbase_validation_validator_regularexpressionvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\RegularExpressionValidator',
    'tx_extbase_validation_validator_stringlengthvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\StringLengthValidator',
    'tx_extbase_validation_validator_stringvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\StringValidator',
    'tx_extbase_validation_validator_textvalidator' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\TextValidator',
    'tx_extbase_validation_validator_validatorinterface' => 'TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface',
    'tx_extbase_validation_validatorresolver' => 'TYPO3\\CMS\\Extbase\\Validation\\ValidatorResolver',
    'tx_em_tasks_updateextensionlist' => 'TYPO3\\CMS\\Extensionmanager\\Task\\UpdateExtensionListTask',
    'tx_feedit_editpanel' => 'TYPO3\\CMS\\Feedit\\FrontendEditPanel',
    'sc_file_list' => 'TYPO3\\CMS\\Filelist\\Controller\\FileListController',
    'filelist' => 'TYPO3\\CMS\\Filelist\\FileList',
    'filelist_editiconhook' => 'TYPO3\\CMS\\Filelist\\FileListEditIconHookInterface',
    'filelistfoldertree' => 'TYPO3\\CMS\\Filelist\\FileListFolderTree',
    'tx_fluid_compatibility_docbookgeneratorservice' => 'TYPO3\\CMS\\Fluid\\Compatibility\\DocbookGeneratorService',
    'tx_fluid_compatibility_templateparserbuilder' => 'TYPO3\\CMS\\Fluid\\Compatibility\\TemplateParserBuilder',
    'tx_fluid_core_compiler_abstractcompiledtemplate' => 'TYPO3\\CMS\\Fluid\\Core\\Compiler\\AbstractCompiledTemplate',
    'tx_fluid_core_compiler_templatecompiler' => 'TYPO3\\CMS\\Fluid\\Core\\Compiler\\TemplateCompiler',
    'tx_fluid_core_exception' => 'TYPO3\\CMS\\Fluid\\Core\\Exception',
    'tx_fluid_core_parser_configuration' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\Configuration',
    'tx_fluid_core_parser_exception' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\Exception',
    'tx_fluid_core_parser_interceptor_escape' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\Interceptor\\Escape',
    'tx_fluid_core_parser_interceptorinterface' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\InterceptorInterface',
    'tx_fluid_core_parser_parsedtemplateinterface' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\ParsedTemplateInterface',
    'tx_fluid_core_parser_parsingstate' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\ParsingState',
    'tx_fluid_core_parser_syntaxtree_abstractnode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\AbstractNode',
    'tx_fluid_core_parser_syntaxtree_arraynode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\ArrayNode',
    'tx_fluid_core_parser_syntaxtree_booleannode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\BooleanNode',
    'tx_fluid_core_parser_syntaxtree_nodeinterface' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\NodeInterface',
    'tx_fluid_core_parser_syntaxtree_objectaccessornode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\ObjectAccessorNode',
    'tx_fluid_core_parser_syntaxtree_renderingcontextawareinterface' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\RenderingContextAwareInterface',
    'tx_fluid_core_parser_syntaxtree_rootnode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\RootNode',
    'tx_fluid_core_parser_syntaxtree_textnode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\TextNode',
    'tx_fluid_core_parser_syntaxtree_viewhelpernode' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\ViewHelperNode',
    'tx_fluid_core_parser_templateparser' => 'TYPO3\\CMS\\Fluid\\Core\\Parser\\TemplateParser',
    'tx_fluid_core_rendering_renderingcontext' => 'TYPO3\\CMS\\Fluid\\Core\\Rendering\\RenderingContext',
    'tx_fluid_core_rendering_renderingcontextinterface' => 'TYPO3\\CMS\\Fluid\\Core\\Rendering\\RenderingContextInterface',
    'tx_fluid_core_viewhelper_abstractconditionviewhelper' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\AbstractConditionViewHelper',
    'tx_fluid_core_viewhelper_abstracttagbasedviewhelper' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\AbstractTagBasedViewHelper',
    'tx_fluid_core_viewhelper_abstractviewhelper' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\AbstractViewHelper',
    'tx_fluid_core_viewhelper_argumentdefinition' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\ArgumentDefinition',
    'tx_fluid_core_viewhelper_arguments' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Arguments',
    'tx_fluid_core_viewhelper_exception' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Exception',
    'tx_fluid_core_viewhelper_exception_invalidvariableexception' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Exception\\InvalidVariableException',
    'tx_fluid_core_viewhelper_exception_renderingcontextnotaccessibleexception' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Exception\\RenderingContextNotAccessibleException',
    'tx_fluid_core_viewhelper_facets_childnodeaccessinterface' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Facets\\ChildNodeAccessInterface',
    'tx_fluid_core_viewhelper_facets_compilableinterface' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Facets\\CompilableInterface',
    'tx_fluid_core_viewhelper_facets_postparseinterface' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Facets\\PostParseInterface',
    'tx_fluid_core_viewhelper_tagbuilder' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\TagBuilder',
    'tx_fluid_core_viewhelper_templatevariablecontainer' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\TemplateVariableContainer',
    'tx_fluid_core_viewhelper_viewhelperinterface' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\ViewHelperInterface',
    'tx_fluid_core_viewhelper_viewhelpervariablecontainer' => 'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\ViewHelperVariableContainer',
    'tx_fluid_core_widget_abstractwidgetcontroller' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\AbstractWidgetController',
    'tx_fluid_core_widget_abstractwidgetviewhelper' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\AbstractWidgetViewHelper',
    'tx_fluid_core_widget_ajaxwidgetcontextholder' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\AjaxWidgetContextHolder',
    'tx_fluid_core_widget_bootstrap' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\Bootstrap',
    'tx_fluid_core_widget_exception' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception',
    'tx_fluid_core_widget_exception_missingcontrollerexception' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\MissingControllerException',
    'tx_fluid_core_widget_exception_renderingcontextnotfoundexception' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\RenderingContextNotFoundException',
    'tx_fluid_core_widget_exception_widgetcontextnotfoundexception' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\WidgetContextNotFoundException',
    'tx_fluid_core_widget_exception_widgetrequestnotfoundexception' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\WidgetRequestNotFoundException',
    'tx_fluid_core_widget_widgetcontext' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetContext',
    'tx_fluid_core_widget_widgetrequest' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetRequest',
    'tx_fluid_core_widget_widgetrequestbuilder' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetRequestBuilder',
    'tx_fluid_core_widget_widgetrequesthandler' => 'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetRequestHandler',
    'tx_fluid_exception' => 'TYPO3\\CMS\\Fluid\\Exception',
    'tx_fluid_fluid' => 'TYPO3\\CMS\\Fluid\\Fluid',
    'tx_fluid_service_docbookgenerator' => 'TYPO3\\CMS\\Fluid\\Service\\DocbookGenerator',
    'tx_fluid_view_abstracttemplateview' => 'TYPO3\\CMS\\Fluid\\View\\AbstractTemplateView',
    'tx_fluid_view_exception' => 'TYPO3\\CMS\\Fluid\\View\\Exception',
    'tx_fluid_view_exception_invalidsectionexception' => 'TYPO3\\CMS\\Fluid\\View\\Exception\\InvalidSectionException',
    'tx_fluid_view_exception_invalidtemplateresourceexception' => 'TYPO3\\CMS\\Fluid\\View\\Exception\\InvalidTemplateResourceException',
    'tx_fluid_view_standaloneview' => 'TYPO3\\CMS\\Fluid\\View\\StandaloneView',
    'tx_fluid_view_templateview' => 'TYPO3\\CMS\\Fluid\\View\\TemplateView',
    'tx_fluid_viewhelpers_aliasviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\AliasViewHelper',
    'tx_fluid_viewhelpers_baseviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\BaseViewHelper',
    'tx_fluid_viewhelpers_be_abstractbackendviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\AbstractBackendViewHelper',
    'tx_fluid_viewhelpers_be_buttons_cshviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Buttons\\CshViewHelper',
    'tx_fluid_viewhelpers_be_buttons_iconviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Buttons\\IconViewHelper',
    'tx_fluid_viewhelpers_be_buttons_shortcutviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Buttons\\ShortcutViewHelper',
    'tx_fluid_viewhelpers_be_containerviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\ContainerViewHelper',
    'tx_fluid_viewhelpers_be_menus_actionmenuitemviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Menus\\ActionMenuItemViewHelper',
    'tx_fluid_viewhelpers_be_menus_actionmenuviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Menus\\ActionMenuViewHelper',
    'tx_fluid_viewhelpers_be_pageinfoviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\PageInfoViewHelper',
    'tx_fluid_viewhelpers_be_pagepathviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\PagePathViewHelper',
    'tx_fluid_viewhelpers_be_security_ifauthenticatedviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Security\\IfAuthenticatedViewHelper',
    'tx_fluid_viewhelpers_be_security_ifhasroleviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Security\\IfHasRoleViewHelper',
    'tx_fluid_viewhelpers_be_tablelistviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\TableListViewHelper',
    'tx_fluid_viewhelpers_cobjectviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\CObjectViewHelper',
    'tx_fluid_viewhelpers_commentviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\CommentViewHelper',
    'tx_fluid_viewhelpers_countviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\CountViewHelper',
    'tx_fluid_viewhelpers_cycleviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\CycleViewHelper',
    'tx_fluid_viewhelpers_debugviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\DebugViewHelper',
    'tx_fluid_viewhelpers_elseviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\ElseViewHelper',
    'tx_fluid_viewhelpers_flashmessagesviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\FlashMessagesViewHelper',
    'tx_fluid_viewhelpers_form_abstractformfieldviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\AbstractFormFieldViewHelper',
    'tx_fluid_viewhelpers_form_abstractformviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\AbstractFormViewHelper',
    'tx_fluid_viewhelpers_form_checkboxviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\CheckboxViewHelper',
    'tx_fluid_viewhelpers_form_hiddenviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\HiddenViewHelper',
    'tx_fluid_viewhelpers_form_passwordviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\PasswordViewHelper',
    'tx_fluid_viewhelpers_form_radioviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\RadioViewHelper',
    'tx_fluid_viewhelpers_form_selectviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\SelectViewHelper',
    'tx_fluid_viewhelpers_form_submitviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\SubmitViewHelper',
    'tx_fluid_viewhelpers_form_textareaviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\TextareaViewHelper',
    'tx_fluid_viewhelpers_form_textfieldviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\TextfieldViewHelper',
    'tx_fluid_viewhelpers_form_uploadviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\UploadViewHelper',
    'tx_fluid_viewhelpers_form_validationresultsviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\ValidationResultsViewHelper',
    'tx_fluid_viewhelpers_format_abstractencodingviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\AbstractEncodingViewHelper',
    'tx_fluid_viewhelpers_format_cdataviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\CdataViewHelper',
    'tx_fluid_viewhelpers_format_cropviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\CropViewHelper',
    'tx_fluid_viewhelpers_format_currencyviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\CurrencyViewHelper',
    'tx_fluid_viewhelpers_format_dateviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\DateViewHelper',
    'tx_fluid_viewhelpers_format_htmlentitiesdecodeviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlentitiesDecodeViewHelper',
    'tx_fluid_viewhelpers_format_htmlentitiesviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlentitiesViewHelper',
    'tx_fluid_viewhelpers_format_htmlspecialcharsviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlspecialcharsViewHelper',
    'tx_fluid_viewhelpers_format_htmlviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlViewHelper',
    'tx_fluid_viewhelpers_format_nl2brviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\Nl2brViewHelper',
    'tx_fluid_viewhelpers_format_numberviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\NumberViewHelper',
    'tx_fluid_viewhelpers_format_paddingviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\PaddingViewHelper',
    'tx_fluid_viewhelpers_format_printfviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\PrintfViewHelper',
    'tx_fluid_viewhelpers_format_rawviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\RawViewHelper',
    'tx_fluid_viewhelpers_format_striptagsviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\StripTagsViewHelper',
    'tx_fluid_viewhelpers_format_urlencodeviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\UrlencodeViewHelper',
    'tx_fluid_viewhelpers_formviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\FormViewHelper',
    'tx_fluid_viewhelpers_forviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\ForViewHelper',
    'tx_fluid_viewhelpers_groupedforviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\GroupedForViewHelper',
    'tx_fluid_viewhelpers_ifviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\IfViewHelper',
    'tx_fluid_viewhelpers_imageviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\ImageViewHelper',
    'tx_fluid_viewhelpers_layoutviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\LayoutViewHelper',
    'tx_fluid_viewhelpers_link_actionviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\ActionViewHelper',
    'tx_fluid_viewhelpers_link_emailviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\EmailViewHelper',
    'tx_fluid_viewhelpers_link_externalviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\ExternalViewHelper',
    'tx_fluid_viewhelpers_link_pageviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\PageViewHelper',
    'tx_fluid_viewhelpers_renderchildrenviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\RenderChildrenViewHelper',
    'tx_fluid_viewhelpers_renderviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\RenderViewHelper',
    'tx_fluid_viewhelpers_sectionviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\SectionViewHelper',
    'tx_fluid_viewhelpers_security_ifauthenticatedviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Security\\IfAuthenticatedViewHelper',
    'tx_fluid_viewhelpers_security_ifhasroleviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Security\\IfHasRoleViewHelper',
    'tx_fluid_viewhelpers_thenviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\ThenViewHelper',
    'tx_fluid_viewhelpers_translateviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\TranslateViewHelper',
    'tx_fluid_viewhelpers_uri_actionviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ActionViewHelper',
    'tx_fluid_viewhelpers_uri_emailviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\EmailViewHelper',
    'tx_fluid_viewhelpers_uri_externalviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ExternalViewHelper',
    'tx_fluid_viewhelpers_uri_imageviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ImageViewHelper',
    'tx_fluid_viewhelpers_uri_pageviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\PageViewHelper',
    'tx_fluid_viewhelpers_uri_resourceviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ResourceViewHelper',
    'tx_fluid_viewhelpers_widget_autocompleteviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\AutocompleteViewHelper',
    'tx_fluid_viewhelpers_widget_controller_autocompletecontroller' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\Controller\\AutocompleteController',
    'tx_fluid_viewhelpers_widget_controller_paginatecontroller' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\Controller\\PaginateController',
    'tx_fluid_viewhelpers_widget_linkviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\LinkViewHelper',
    'tx_fluid_viewhelpers_widget_paginateviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\PaginateViewHelper',
    'tx_fluid_viewhelpers_widget_uriviewhelper' => 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\UriViewHelper',
    'tx_form_controller_form' => 'TYPO3\\CMS\\Form\\Controller\\FormController',
    'tx_form_controller_wizard' => 'TYPO3\\CMS\\Form\\Controller\\WizardController',
    'tx_form_domain_factory_jsontotyposcript' => 'TYPO3\\CMS\\Form\\Domain\\Factory\\JsonToTypoScript',
    'tx_form_domain_factory_typoscript' => 'TYPO3\\CMS\\Form\\Domain\\Factory\\TypoScriptFactory',
    'tx_form_domain_model_additional_abstract' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\AbstractAdditionalElement',
    'tx_form_domain_model_additional_additional' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\AdditionalAdditionalElement',
    'tx_form_domain_model_additional_error' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\ErrorAdditionalElement',
    'tx_form_domain_model_additional_label' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\LabelAdditionalElement',
    'tx_form_domain_model_additional_legend' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\LegendAdditionalElement',
    'tx_form_domain_model_additional_mandatory' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\MandatoryAdditionalElement',
    'tx_form_domain_model_attributes_abstract' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AbstractAttribute',
    'tx_form_domain_model_attributes_accept' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AcceptAttribute',
    'tx_form_domain_model_attributes_acceptcharset' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AcceptCharsetAttribute',
    'tx_form_domain_model_attributes_accesskey' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AccesskeyAttribute',
    'tx_form_domain_model_attributes_action' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ActionAttribute',
    'tx_form_domain_model_attributes_alt' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AltAttribute',
    'tx_form_domain_model_attributes_attributes' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AttributesAttribute',
    'tx_form_domain_model_attributes_checked' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\CheckedAttribute',
    'tx_form_domain_model_attributes_class' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ClassAttribute',
    'tx_form_domain_model_attributes_cols' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ColsAttribute',
    'tx_form_domain_model_attributes_dir' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\DirAttribute',
    'tx_form_domain_model_attributes_disabled' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\DisabledAttribute',
    'tx_form_domain_model_attributes_enctype' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\EnctypeAttribute',
    'tx_form_domain_model_attributes_id' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\IdAttribute',
    'tx_form_domain_model_attributes_label' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\LabelAttribute',
    'tx_form_domain_model_attributes_lang' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\LangAttribute',
    'tx_form_domain_model_attributes_maxlength' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\MaxlengthAttribute',
    'tx_form_domain_model_attributes_method' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\MethodAttribute',
    'tx_form_domain_model_attributes_multiple' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\MultipleAttribute',
    'tx_form_domain_model_attributes_name' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\NameAttribute',
    'tx_form_domain_model_attributes_readonly' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ReadonlyAttribute',
    'tx_form_domain_model_attributes_rows' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\RowsAttribute',
    'tx_form_domain_model_attributes_selected' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\SelectedAttribute',
    'tx_form_domain_model_attributes_size' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\SizeAttribute',
    'tx_form_domain_model_attributes_src' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\SrcAttribute',
    'tx_form_domain_model_attributes_style' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\StyleAttribute',
    'tx_form_domain_model_attributes_tabindex' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\TabindexAttribute',
    'tx_form_domain_model_attributes_title' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\TitleAttribute',
    'tx_form_domain_model_attributes_type' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\TypeAttribute',
    'tx_form_domain_model_attributes_value' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ValueAttribute',
    'tx_form_domain_model_content' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Content',
    'tx_form_domain_model_element_abstract' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\AbstractElement',
    'tx_form_domain_model_element_abstractplain' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\AbstractPlainElement',
    'tx_form_domain_model_element_button' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ButtonElement',
    'tx_form_domain_model_element_checkbox' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\CheckboxElement',
    'tx_form_domain_model_element_checkboxgroup' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\CheckboxGroupElement',
    'tx_form_domain_model_element_container' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ContainerElement',
    'tx_form_domain_model_element_content' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ContentElement',
    'tx_form_domain_model_element_fieldset' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\FieldsetElement',
    'tx_form_domain_model_element_fileupload' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\FileuploadElement',
    'tx_form_domain_model_element_header' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\HeaderElement',
    'tx_form_domain_model_element_hidden' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\HiddenElement',
    'tx_form_domain_model_element_imagebutton' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ImagebuttonElement',
    'tx_form_domain_model_element_optgroup' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\OptgroupElement',
    'tx_form_domain_model_element_option' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\OptionElement',
    'tx_form_domain_model_element_password' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\PasswordElement',
    'tx_form_domain_model_element_radio' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\RadioElement',
    'tx_form_domain_model_element_radiogroup' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\RadioGroupElement',
    'tx_form_domain_model_element_reset' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ResetElement',
    'tx_form_domain_model_element_select' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\SelectElement',
    'tx_form_domain_model_element_submit' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\SubmitElement',
    'tx_form_domain_model_element_textarea' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\TextareaElement',
    'tx_form_domain_model_element_textblock' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\TextblockElement',
    'tx_form_domain_model_element_textline' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\TextlineElement',
    'tx_form_domain_model_form' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Form',
    'tx_form_domain_model_json_element' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\AbstractJsonElement',
    'tx_form_domain_model_json_button' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\ButtonJsonElement',
    'tx_form_domain_model_json_checkboxgroup' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\CheckboxGroupJsonElement',
    'tx_form_domain_model_json_checkbox' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\CheckboxJsonElement',
    'tx_form_domain_model_json_container' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\ContainerJsonElement',
    'tx_form_domain_model_json_fieldset' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\FieldsetJsonElement',
    'tx_form_domain_model_json_fileupload' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\FileuploadJsonElement',
    'tx_form_domain_model_json_form' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\FormJsonElement',
    'tx_form_domain_model_json_header' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\HeaderJsonElement',
    'tx_form_domain_model_json_hidden' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\HiddenJsonElement',
    'tx_form_domain_model_json_name' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\NameJsonElement',
    'tx_form_domain_model_json_password' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\PasswordJsonElement',
    'tx_form_domain_model_json_radiogroup' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\RadioGroupJsonElement',
    'tx_form_domain_model_json_radio' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\RadioJsonElement',
    'tx_form_domain_model_json_reset' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\ResetJsonElement',
    'tx_form_domain_model_json_select' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\SelectJsonElement',
    'tx_form_domain_model_json_submit' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\SubmitJsonElement',
    'tx_form_domain_model_json_textarea' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\TextareaJsonElement',
    'tx_form_domain_model_json_textblock' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\TextblockJsonElement',
    'tx_form_domain_model_json_textline' => 'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\TextlineJsonElement',
    'tx_form_domain_repository_content' => 'TYPO3\\CMS\\Form\\Domain\\Repository\\ContentRepository',
    'tx_form_domain_factory_typoscripttojson' => 'TYPO3\\CMS\\Form\\Utility\\TypoScriptToJsonConverter',
    'tx_form_system_elementcounter' => 'TYPO3\\CMS\\Form\\ElementCounter',
    'tx_form_system_filter_alphabetic' => 'TYPO3\\CMS\\Form\\Filter\\AlphabeticFilter',
    'tx_form_system_filter_alphanumeric' => 'TYPO3\\CMS\\Form\\Filter\\AlphanumericFilter',
    'tx_form_system_filter_currency' => 'TYPO3\\CMS\\Form\\Filter\\CurrencyFilter',
    'tx_form_system_filter_digit' => 'TYPO3\\CMS\\Form\\Filter\\DigitFilter',
    'tx_form_system_filter_interface' => 'TYPO3\\CMS\\Form\\Filter\\FilterInterface',
    'tx_form_system_filter_integer' => 'TYPO3\\CMS\\Form\\Filter\\IntegerFilter',
    'tx_form_system_filter_lowercase' => 'TYPO3\\CMS\\Form\\Filter\\LowerCaseFilter',
    'tx_form_system_filter_regexp' => 'TYPO3\\CMS\\Form\\Filter\\RegExpFilter',
    'tx_form_system_filter_removexss' => 'TYPO3\\CMS\\Form\\Filter\\RemoveXssFilter',
    'tx_form_system_filter_stripnewlines' => 'TYPO3\\CMS\\Form\\Filter\\StripNewLinesFilter',
    'tx_form_system_filter_titlecase' => 'TYPO3\\CMS\\Form\\Filter\\TitleCaseFilter',
    'tx_form_system_filter_trim' => 'TYPO3\\CMS\\Form\\Filter\\TrimFilter',
    'tx_form_system_filter_uppercase' => 'TYPO3\\CMS\\Form\\Filter\\UpperCaseFilter',
    'tx_form_system_filter' => 'TYPO3\\CMS\\Form\\Utility\\FilterUtility',
    'tx_form_system_layout' => 'TYPO3\\CMS\\Form\\Layout',
    'tx_form_system_localization' => 'TYPO3\\CMS\\Form\\Localization',
    'tx_form_system_postprocessor_mail' => 'TYPO3\\CMS\\Form\\PostProcess\\MailPostProcessor',
    'tx_form_system_postprocessor' => 'TYPO3\\CMS\\Form\\PostProcess\\PostProcessor',
    'tx_form_system_postprocessor_interface' => 'TYPO3\\CMS\\Form\\PostProcess\\PostProcessorInterface',
    'tx_form_system_request' => 'TYPO3\\CMS\\Form\\Request',
    'tx_form_common' => 'TYPO3\\CMS\\Form\\Utility\\FormUtility',
    'tx_form_system_validate' => 'TYPO3\\CMS\\Form\\Utility\\ValidatorUtility',
    'tx_form_system_validate_abstract' => 'TYPO3\\CMS\\Form\\Validation\\AbstractValidator',
    'tx_form_system_validate_alphabetic' => 'TYPO3\\CMS\\Form\\Validation\\AlphabeticValidator',
    'tx_form_system_validate_alphanumeric' => 'TYPO3\\CMS\\Form\\Validation\\AlphanumericValidator',
    'tx_form_system_validate_between' => 'TYPO3\\CMS\\Form\\Validation\\BetweenValidator',
    'tx_form_system_validate_date' => 'TYPO3\\CMS\\Form\\Validation\\DateValidator',
    'tx_form_system_validate_digit' => 'TYPO3\\CMS\\Form\\Validation\\DigitValidator',
    'tx_form_system_validate_email' => 'TYPO3\\CMS\\Form\\Validation\\EmailValidator',
    'tx_form_system_validate_equals' => 'TYPO3\\CMS\\Form\\Validation\\EqualsValidator',
    'tx_form_system_validate_fileallowedtypes' => 'TYPO3\\CMS\\Form\\Validation\\FileAllowedTypesValidator',
    'tx_form_system_validate_filemaximumsize' => 'TYPO3\\CMS\\Form\\Validation\\FileMaximumSizeValidator',
    'tx_form_system_validate_fileminimumsize' => 'TYPO3\\CMS\\Form\\Validation\\FileMinimumSizeValidator',
    'tx_form_system_validate_float' => 'TYPO3\\CMS\\Form\\Validation\\FloatValidator',
    'tx_form_system_validate_greaterthan' => 'TYPO3\\CMS\\Form\\Validation\\GreaterThanValidator',
    'tx_form_system_validate_inarray' => 'TYPO3\\CMS\\Form\\Validation\\InArrayValidator',
    'tx_form_system_validate_integer' => 'TYPO3\\CMS\\Form\\Validation\\IntegerValidator',
    'tx_form_system_validate_interface' => 'TYPO3\\CMS\\Form\\Validation\\ValidatorInterface',
    'tx_form_system_validate_ip' => 'TYPO3\\CMS\\Form\\Validation\\IpValidator',
    'tx_form_system_validate_length' => 'TYPO3\\CMS\\Form\\Validation\\LengthValidator',
    'tx_form_system_validate_lessthan' => 'TYPO3\\CMS\\Form\\Validation\\LessthanValidator',
    'tx_form_system_validate_regexp' => 'TYPO3\\CMS\\Form\\Validation\\RegExpValidator',
    'tx_form_system_validate_required' => 'TYPO3\\CMS\\Form\\Validation\\RequiredValidator',
    'tx_form_system_validate_uri' => 'TYPO3\\CMS\\Form\\Validation\\UriValidator',
    'tx_form_view_confirmation_additional' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Additional\\AdditionalElementView',
    'tx_form_view_confirmation_additional_label' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Additional\\LabelAdditionalElementView',
    'tx_form_view_confirmation_additional_legend' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Additional\\LegendAdditionalElementView',
    'tx_form_view_confirmation' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\ConfirmationView',
    'tx_form_view_confirmation_element_abstract' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\AbstractElementView',
    'tx_form_view_confirmation_element_checkbox' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\CheckboxElementView',
    'tx_form_view_confirmation_element_checkboxgroup' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\CheckboxGroupElementView',
    'tx_form_view_confirmation_element_container' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\ContainerElementView',
    'tx_form_view_confirmation_element_fieldset' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\FieldsetElementView',
    'tx_form_view_confirmation_element_fileupload' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\FileuploadElementView',
    'tx_form_view_confirmation_element_optgroup' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\OptgroupElementView',
    'tx_form_view_confirmation_element_option' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\OptionElementView',
    'tx_form_view_confirmation_element_radio' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\RadioElementView',
    'tx_form_view_confirmation_element_radiogroup' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\RadioGroupElementView',
    'tx_form_view_confirmation_element_select' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\SelectElementView',
    'tx_form_view_confirmation_element_textarea' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\TextareaElementView',
    'tx_form_view_confirmation_element_textline' => 'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\TextlineElementView',
    'tx_form_view_form_additional' => 'TYPO3\\CMS\\Form\\View\\Form\\Additional\\AdditionalElementView',
    'tx_form_view_form_additional_error' => 'TYPO3\\CMS\\Form\\View\\Form\\Additional\\ErrorAdditionalElementView',
    'tx_form_view_form_additional_label' => 'TYPO3\\CMS\\Form\\View\\Form\\Additional\\LabelAdditionalElementView',
    'tx_form_view_form_additional_legend' => 'TYPO3\\CMS\\Form\\View\\Form\\Additional\\LegendAdditionalElementView',
    'tx_form_view_form_additional_mandatory' => 'TYPO3\\CMS\\Form\\View\\Form\\Additional\\MandatoryAdditionalElementView',
    'tx_form_view_form_element_abstract' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\AbstractElementView',
    'tx_form_view_form_element_button' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\ButtonElementView',
    'tx_form_view_form_element_checkbox' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\CheckboxElementView',
    'tx_form_view_form_element_checkboxgroup' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\CheckboxGroupElementView',
    'tx_form_view_form_element_container' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\ContainerElementView',
    'tx_form_view_form_element_content' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\ContentElementView',
    'tx_form_view_form_element_fieldset' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\FieldsetElementView',
    'tx_form_view_form_element_fileupload' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\FileuploadElementView',
    'tx_form_view_form_element_header' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\HeaderElementView',
    'tx_form_view_form_element_hidden' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\HiddenElementView',
    'tx_form_view_form_element_imagebutton' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\ImagebuttonElementView',
    'tx_form_view_form_element_optgroup' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\OptgroupElementView',
    'tx_form_view_form_element_option' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\OptionElementView',
    'tx_form_view_form_element_password' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\PasswordElementView',
    'tx_form_view_form_element_radio' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\RadioElementView',
    'tx_form_view_form_element_radiogroup' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\RadioGroupElementView',
    'tx_form_view_form_element_reset' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\ResetElementView',
    'tx_form_view_form_element_select' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\SelectElementView',
    'tx_form_view_form_element_submit' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\SubmitElementView',
    'tx_form_view_form_element_textarea' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\TextareaElementView',
    'tx_form_view_form_element_textblock' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\TextblockElementView',
    'tx_form_view_form_element_textline' => 'TYPO3\\CMS\\Form\\View\\Form\\Element\\TextlineElementView',
    'tx_form_view_form' => 'TYPO3\\CMS\\Form\\View\\Form\\FormView',
    'tx_form_view_mail_html_additional' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Additional\\AdditionalElementView',
    'tx_form_view_mail_html_additional_label' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Additional\\LabelAdditionalElementView',
    'tx_form_view_mail_html_additional_legend' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Additional\\LegendAdditionalElementView',
    'tx_form_view_mail_html_element_abstract' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\AbstractElementView',
    'tx_form_view_mail_html_element_checkbox' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\CheckboxElementView',
    'tx_form_view_mail_html_element_checkboxgroup' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\CheckboxGroupElementView',
    'tx_form_view_mail_html_element_container' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\ContainerElementView',
    'tx_form_view_mail_html_element_fieldset' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\FieldsetElementView',
    'tx_form_view_mail_html_element_fileupload' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\FileuploadElementView',
    'tx_form_view_mail_html_element_hidden' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\HiddenElementView',
    'tx_form_view_mail_html_element_optgroup' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\OptgroupElementView',
    'tx_form_view_mail_html_element_option' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\OptionElementView',
    'tx_form_view_mail_html_element_radio' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\RadioElementView',
    'tx_form_view_mail_html_element_radiogroup' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\RadioGroupElementView',
    'tx_form_view_mail_html_element_select' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\SelectElementView',
    'tx_form_view_mail_html_element_textarea' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\TextareaElementView',
    'tx_form_view_mail_html_element_textline' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\TextlineElementView',
    'tx_form_view_mail_html' => 'TYPO3\\CMS\\Form\\View\\Mail\\Html\\HtmlView',
    'tx_form_view_mail' => 'TYPO3\\CMS\\Form\\View\\Mail\\MailView',
    'tx_form_view_mail_plain_element_abstract' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\AbstractElementView',
    'tx_form_view_mail_plain_element_checkbox' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\CheckboxElementView',
    'tx_form_view_mail_plain_element_checkboxgroup' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\CheckboxGroupElementView',
    'tx_form_view_mail_plain_element_container' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\ContainerElementView',
    'tx_form_view_mail_plain_element_fieldset' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\FieldsetElementView',
    'tx_form_view_mail_plain_element_fileupload' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\FileuploadElementView',
    'tx_form_view_mail_plain_element_hidden' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\HiddenElementView',
    'tx_form_view_mail_plain_element_optgroup' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\OptgroupElementView',
    'tx_form_view_mail_plain_element_option' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\OptionElementView',
    'tx_form_view_mail_plain_element_radio' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\RadioElementView',
    'tx_form_view_mail_plain_element_radiogroup' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\RadioGroupElementView',
    'tx_form_view_mail_plain_element_select' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\SelectElementView',
    'tx_form_view_mail_plain_element_textarea' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\TextareaElementView',
    'tx_form_view_mail_plain_element_textline' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\TextlineElementView',
    'tx_form_view_mail_plain' => 'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\PlainView',
    'tx_form_view_wizard_abstract' => 'TYPO3\\CMS\\Form\\View\\Wizard\\AbstractWizardView',
    'tx_form_view_wizard_load' => 'TYPO3\\CMS\\Form\\View\\Wizard\\LoadWizardView',
    'tx_form_view_wizard_save' => 'TYPO3\\CMS\\Form\\View\\Wizard\\SaveWizardView',
    'tx_form_view_wizard_wizard' => 'TYPO3\\CMS\\Form\\View\\Wizard\\WizardView',
    'tslib_feuserauth' => 'TYPO3\\CMS\\Frontend\\Authentication\\FrontendUserAuthentication',
    't3lib_matchcondition_frontend' => 'TYPO3\\CMS\\Frontend\\Configuration\\TypoScript\\ConditionMatching\\ConditionMatcher',
    't3lib_formmail' => 'TYPO3\\CMS\\Compatibility6\\Controller\\FormDataSubmissionController',
    'tslib_content_abstract' => 'TYPO3\\CMS\\Frontend\\ContentObject\\AbstractContentObject',
    'tslib_content_case' => 'TYPO3\\CMS\\Frontend\\ContentObject\\CaseContentObject',
    'tslib_content_cleargif' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ClearGifContentObject',
    'tslib_content_columns' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ColumnsContentObject',
    'tslib_content_content' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentContentObject',
    'tslib_content_contentobjectarray' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectArrayContentObject',
    'tslib_content_contentobjectarrayinternal' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectArrayInternalContentObject',
    'tslib_content_getdatahook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetDataHookInterface',
    'tslib_cobj_getimgresourcehook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetImageResourceHookInterface',
    'tslib_content_getpublicurlforfilehook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetPublicUrlForFileHookInterface',
    'tslib_content_cobjgetsinglehook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetSingleHookInterface',
    'tslib_content_postinithook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectPostInitHookInterface',
    'tslib_cobj' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer',
    'tslib_content_stdwraphook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectStdWrapHookInterface',
    'tslib_content_contenttable' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ContentTableContentObject',
    'tslib_content_editpanel' => 'TYPO3\\CMS\\Frontend\\ContentObject\\EditPanelContentObject',
    'tslib_content_file' => 'TYPO3\\CMS\\Frontend\\ContentObject\\FileContentObject',
    'tslib_content_filelinkhook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\FileLinkHookInterface',
    'tslib_content_files' => 'TYPO3\\CMS\\Frontend\\ContentObject\\FilesContentObject',
    'tslib_content_flowplayer' => 'TYPO3\\CMS\\Mediace\\ContentObject\\FlowPlayerContentObject',
    'tslib_content_fluidtemplate' => 'TYPO3\\CMS\\Frontend\\ContentObject\\FluidTemplateContentObject',
    'tslib_content_form' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\FormContentObject',
    'tslib_content_hierarchicalmenu' => 'TYPO3\\CMS\\Frontend\\ContentObject\\HierarchicalMenuContentObject',
    'tslib_content_horizontalruler' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\HorizontalRulerContentObject',
    'tslib_content_image' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ImageContentObject',
    'tslib_content_imageresource' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ImageResourceContentObject',
    'tslib_content_imagetext' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ImageTextContentObject',
    'tslib_content_loadregister' => 'TYPO3\\CMS\\Frontend\\ContentObject\\LoadRegisterContentObject',
    'tslib_content_media' => 'TYPO3\\CMS\\Mediace\\ContentObject\\MediaContentObject',
    'tslib_content_multimedia' => 'TYPO3\\CMS\\Mediace\\ContentObject\\MultimediaContentObject',
    'tslib_content_offsettable' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\OffsetTableContentObject',
    'tslib_content_quicktimeobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\QuicktimeObjectContentObject',
    'tslib_content_records' => 'TYPO3\\CMS\\Frontend\\ContentObject\\RecordsContentObject',
    'tslib_content_restoreregister' => 'TYPO3\\CMS\\Frontend\\ContentObject\\RestoreRegisterContentObject',
    'tslib_content_scalablevectorgraphics' => 'TYPO3\\CMS\\Frontend\\ContentObject\\ScalableVectorGraphicsContentObject',
    'tslib_content_searchresult' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\SearchResultContentObject',
    'tslib_content_shockwaveflashobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\ShockwaveFlashObjectContentObject',
    'tslib_content_template' => 'TYPO3\\CMS\\Frontend\\ContentObject\\TemplateContentObject',
    'tslib_content_text' => 'TYPO3\\CMS\\Frontend\\ContentObject\\TextContentObject',
    'tslib_content_user' => 'TYPO3\\CMS\\Frontend\\ContentObject\\UserContentObject',
    'tslib_content_userinternal' => 'TYPO3\\CMS\\Frontend\\ContentObject\\UserInternalContentObject',
    'tslib_menu' => 'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\AbstractMenuContentObject',
    'tslib_menu_filtermenupageshook' => 'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\AbstractMenuFilterPagesHookInterface',
    'tslib_gmenu' => 'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\GraphicalMenuContentObject',
    'tslib_imgmenu' => 'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\ImageMenuContentObject',
    'tslib_jsmenu' => 'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\JavaScriptMenuContentObject',
    'tslib_tmenu' => 'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\TextMenuContentObject',
    'tslib_tableoffset' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\OffsetTableContentObject',
    'tslib_search' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\SearchResultContentObject',
    'tslib_controltable' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\TableRenderer',
    'tslib_extdirecteid' => 'TYPO3\\CMS\\Frontend\\Controller\\ExtDirectEidController',
    'tx_cms_webinfo_page' => 'TYPO3\\CMS\\Frontend\\Controller\\PageInformationController',
    'sc_tslib_showpic' => 'TYPO3\\CMS\\Frontend\\Controller\\ShowImageController',
    'tx_cms_webinfo_lang' => 'TYPO3\\CMS\\Frontend\\Controller\\TranslationStatusController',
    'tslib_fe' => 'TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController',
    'tx_cms_fehooks' => 'TYPO3\\CMS\\Frontend\\Hooks\\FrontendHooks',
    'tx_cms_mediaitems' => 'TYPO3\\CMS\\Frontend\\Hooks\\MediaItemHooks',
    'tx_cms_treelistcacheupdate' => 'TYPO3\\CMS\\Frontend\\Hooks\\TreelistCacheUpdateHooks',
    'tslib_gifbuilder' => 'TYPO3\\CMS\\Frontend\\Imaging\\GifBuilder',
    'tslib_mediawizardcoreprovider' => 'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProvider',
    'tslib_mediawizardprovider' => 'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProviderInterface',
    'tslib_mediawizardmanager' => 'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProviderManager',
    't3lib_cachehash' => 'TYPO3\\CMS\\Frontend\\Page\\CacheHashCalculator',
    'tslib_frameset' => 'TYPO3\\CMS\\Frontend\\Page\\FramesetRenderer',
    'tspagegen' => 'TYPO3\\CMS\\Frontend\\Page\\PageGenerator',
    't3lib_pageselect' => 'TYPO3\\CMS\\Frontend\\Page\\PageRepository',
    't3lib_pageselect_getpagehook' => 'TYPO3\\CMS\\Frontend\\Page\\PageRepositoryGetPageHookInterface',
    't3lib_pageselect_getpageoverlayhook' => 'TYPO3\\CMS\\Frontend\\Page\\PageRepositoryGetPageOverlayHookInterface',
    't3lib_pageselect_getrecordoverlayhook' => 'TYPO3\\CMS\\Frontend\\Page\\PageRepositoryGetRecordOverlayHookInterface',
    'tslib_pibase' => 'TYPO3\\CMS\\Frontend\\Plugin\\AbstractPlugin',
    'tslib_fecompression' => 'TYPO3\\CMS\\Frontend\\Utility\\CompressionUtility',
    'tslib_eidtools' => 'TYPO3\\CMS\\Frontend\\Utility\\EidUtility',
    'tslib_adminpanel' => 'TYPO3\\CMS\\Frontend\\View\\AdminPanelView',
    'tslib_adminpanelhook' => 'TYPO3\\CMS\\Frontend\\View\\AdminPanelViewHookInterface',
    'sc_mod_web_func_index' => 'TYPO3\\CMS\\Func\\Controller\\PageFunctionsController',
    'tx_funcwizards_webfunc' => 'TYPO3\\CMS\\Compatibility6\\Controller\\WebFunctionWizardsBaseController',
    'typo3\\cms\\funcwizards\\controller\\webfunctionwizardsbasecontroller' => 'TYPO3\\CMS\\Compatibility6\\Controller\\WebFunctionWizardsBaseController',
    'tx_impexp_clickmenu' => 'TYPO3\\CMS\\Impexp\\Clickmenu',
    'sc_mod_tools_log_index' => 'TYPO3\\CMS\\Impexp\\Controller\\ImportExportController',
    'tx_impexp' => 'TYPO3\\CMS\\Impexp\\ImportExport',
    'tx_impexp_localpagetree' => 'TYPO3\\CMS\\Impexp\\LocalPageTree',
    'tx_impexp_task' => 'TYPO3\\CMS\\Impexp\\Task\\ImportExportTask',
    'tx_indexedsearch_domain_repository_indexsearchrepository' => 'TYPO3\\CMS\\IndexedSearch\\Domain\\Repository\\IndexSearchRepository',
    'tx_indexedsearch_files' => 'TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerFilesHook',
    'tx_indexedsearch_crawler' => 'TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerHook',
    'tx_indexedsearch_mysql' => 'TYPO3\\CMS\\IndexedSearchMysql\\Hook\\MysqlFulltextIndexHook',
    'tx_indexedsearch_tslib_fe_hook' => 'TYPO3\\CMS\\IndexedSearch\\Hook\\TypoScriptFrontendHook',
    'tx_indexedsearch_indexer' => 'TYPO3\\CMS\\IndexedSearch\\Indexer',
    'tx_indexedsearch_lexer' => 'TYPO3\\CMS\\IndexedSearch\\Lexer',
    'tx_indexedsearch_util' => 'TYPO3\\CMS\\IndexedSearch\\Utility\\IndexedSearchUtility',
    'tx_indexed_search_extparse' => 'TYPO3\\CMS\\IndexedSearch\\FileContentParser',
    'user_doublemetaphone' => 'TYPO3\\CMS\\IndexedSearch\\Utility\\DoubleMetaPhoneUtility',
    'tx_indexedsearch_viewhelpers_pagebrowsingresultsviewhelper' => 'TYPO3\\CMS\\IndexedSearch\\ViewHelpers\\PageBrowsingResultsViewHelper',
    'tx_indexedsearch_viewhelpers_pagebrowsingviewhelper' => 'TYPO3\\CMS\\IndexedSearch\\ViewHelpers\\PageBrowsingViewHelper',
    'sc_mod_web_info_index' => 'TYPO3\\CMS\\Info\\Controller\\InfoModuleController',
    'tx_infopagetsconfig_webinfo' => 'TYPO3\\CMS\\InfoPagetsconfig\\Controller\\InfoPageTyposcriptConfigController',
    'tx_coreupdates_compatversion' => 'TYPO3\\CMS\\Install\\Updates\\CompatVersionUpdate',
    'tx_install_service_basicservice' => 'TYPO3\\CMS\\Install\\Service\\EnableFileService',
    'typo3\\cms\\install\\enablefileservice' => 'TYPO3\\CMS\\Install\\Service\\EnableFileService',
    'tx_install_report_installstatus' => 'TYPO3\\CMS\\Install\\Report\\InstallStatusReport',
    'tx_install_session' => 'TYPO3\\CMS\\Install\\Service\\SessionService',
    'typo3\\cms\\install\\session' => 'TYPO3\\CMS\\Install\\Service\\SessionService',
    't3lib_install_sql' => 'TYPO3\\CMS\\Install\\Service\\SqlSchemaMigrationService',
    'typo3\\cms\\install\\sql\\schemamigrator' => 'TYPO3\\CMS\\Install\\Service\\SqlSchemaMigrationService',
    'tx_install_updates_base' => 'TYPO3\\CMS\\Install\\Updates\\AbstractUpdate',
    'language' => 'TYPO3\\CMS\\Lang\\LanguageService',
    'tx_felogin_pi1' => 'TYPO3\\CMS\\Felogin\\Controller\\FrontendLoginController',
    'tx_linkvalidator_processor' => 'TYPO3\\CMS\\Linkvalidator\\LinkAnalyzer',
    'tx_linkvalidator_linktype_abstract' => 'TYPO3\\CMS\\Linkvalidator\\Linktype\\AbstractLinktype',
    'tx_linkvalidator_linktype_external' => 'TYPO3\\CMS\\Linkvalidator\\Linktype\\ExternalLinktype',
    'tx_linkvalidator_linktype_file' => 'TYPO3\\CMS\\Linkvalidator\\Linktype\\FileLinktype',
    'tx_linkvalidator_linktype_internal' => 'TYPO3\\CMS\\Linkvalidator\\Linktype\\InternalLinktype',
    'tx_linkvalidator_linktype_linkhandler' => 'TYPO3\\CMS\\Linkvalidator\\Linktype\\LinkHandler',
    'tx_linkvalidator_linktype_interface' => 'TYPO3\\CMS\\Linkvalidator\\Linktype\\LinktypeInterface',
    'tx_linkvalidator_modfuncreport' => 'TYPO3\\CMS\\Linkvalidator\\Report\\LinkValidatorReport',
    'tx_linkvalidator_tasks_validator' => 'TYPO3\\CMS\\Linkvalidator\\Task\\ValidatorTask',
    'tx_linkvalidator_tasks_validatoradditionalfieldprovider' => 'TYPO3\\CMS\\Linkvalidator\\Task\\ValidatorTaskAdditionalFieldProvider',
    'tx_lowlevel_admin_core' => 'TYPO3\\CMS\\Lowlevel\\AdminCommand',
    'tx_lowlevel_cleaner_core' => 'TYPO3\\CMS\\Lowlevel\\CleanerCommand',
    'tx_lowlevel_cleanflexform' => 'TYPO3\\CMS\\Lowlevel\\CleanFlexformCommand',
    'tx_lowlevel_deleted' => 'TYPO3\\CMS\\Lowlevel\\DeletedRecordsCommand',
    'tx_lowlevel_double_files' => 'TYPO3\\CMS\\Lowlevel\\DoubleFilesCommand',
    'tx_lowlevel_lost_files' => 'TYPO3\\CMS\\Lowlevel\\LostFilesCommand',
    'tx_lowlevel_missing_files' => 'TYPO3\\CMS\\Lowlevel\\MissingFilesCommand',
    'tx_lowlevel_missing_relations' => 'TYPO3\\CMS\\Lowlevel\\MissingRelationsCommand',
    'tx_lowlevel_orphan_records' => 'TYPO3\\CMS\\Lowlevel\\OrphanRecordsCommand',
    'tx_lowlevel_rte_images' => 'TYPO3\\CMS\\Lowlevel\\RteImagesCommand',
    'tx_lowlevel_syslog' => 'TYPO3\\CMS\\Lowlevel\\SyslogCommand',
    'tx_lowlevel_versions' => 'TYPO3\\CMS\\Lowlevel\\VersionsCommand',
    't3lib_arraybrowser' => 'TYPO3\\CMS\\Lowlevel\\Utility\\ArrayBrowser',
    'sc_mod_tools_config_index' => 'TYPO3\\CMS\\Lowlevel\\View\\ConfigurationView',
    'sc_mod_tools_dbint_index' => 'TYPO3\\CMS\\Lowlevel\\View\\DatabaseIntegrityView',
    'tx_openid_eid' => 'TYPO3\\CMS\\Openid\\OpenidEid',
    'tx_openid_mod_setup' => 'TYPO3\\CMS\\Openid\\OpenidModuleSetup',
    'tx_openid_sv1' => 'TYPO3\\CMS\\Openid\\OpenidService',
    'tx_openid_store' => 'TYPO3\\CMS\\Openid\\OpenidStore',
    'sc_mod_web_perm_ajax' => 'TYPO3\\CMS\\Beuser\\Controller\\PermissionAjaxController',
    'sc_mod_web_perm_index' => 'TYPO3\\CMS\\Beuser\\Controller\\PermissionController',
    'browse_links' => 'TYPO3\\CMS\\Recordlist\\Browser\\ElementBrowser',
    'sc_browse_links' => 'TYPO3\\CMS\\Recordlist\\Controller\\ElementBrowserController',
    'sc_browser' => 'TYPO3\\CMS\\Recordlist\\Controller\\ElementBrowserFramesetController',
    'sc_db_list' => 'TYPO3\\CMS\\Recordlist\\RecordList',
    'recordlist' => 'TYPO3\\CMS\\Recordlist\\RecordList\\AbstractDatabaseRecordList',
    'localrecordlist' => 'TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList',
    'localrecordlist_actionshook' => 'TYPO3\\CMS\\Recordlist\\RecordList\\RecordListHookInterface',
    'tx_recycler_view_deletedrecords' => 'TYPO3\\CMS\\Recycler\\Controller\\DeletedRecordsController',
    'tx_recycler_controller_ajax' => 'TYPO3\\CMS\\Recycler\\Controller\\RecyclerAjaxController',
    'tx_recycler_module1' => 'TYPO3\\CMS\\Recycler\\Controller\\RecyclerModuleController',
    'tx_recycler_model_deletedrecords' => 'TYPO3\\CMS\\Recycler\\Domain\\Model\\DeletedRecords',
    'tx_recycler_model_tables' => 'TYPO3\\CMS\\Recycler\\Domain\\Model\\Tables',
    'tx_recycler_helper' => 'TYPO3\\CMS\\Recycler\\Utility\\RecyclerUtility',
    'tx_reports_controller_reportcontroller' => 'TYPO3\\CMS\\Reports\\Controller\\ReportController',
    'tx_reports_reports_status_configurationstatus' => 'TYPO3\\CMS\\Reports\\Report\\Status\\ConfigurationStatus',
    'tx_reports_reports_status_securitystatus' => 'TYPO3\\CMS\\Reports\\Report\\Status\\SecurityStatus',
    'tx_reports_reports_status' => 'TYPO3\\CMS\\Reports\\Report\\Status\\Status',
    'tx_reports_reports_status_status' => 'TYPO3\\CMS\\Reports\\Status',
    'tx_reports_reports_status_systemstatus' => 'TYPO3\\CMS\\Reports\\Report\\Status\\SystemStatus',
    'tx_reports_reports_status_typo3status' => 'TYPO3\\CMS\\Reports\\Report\\Status\\Typo3Status',
    'tx_reports_reports_status_warningmessagepostprocessor' => 'TYPO3\\CMS\\Reports\\Report\\Status\\WarningMessagePostProcessor',
    'tx_reports_report' => 'TYPO3\\CMS\\Reports\\ReportInterface',
    'tx_reports_statusprovider' => 'TYPO3\\CMS\\Reports\\StatusProviderInterface',
    'tx_reports_tasks_systemstatusupdatetask' => 'TYPO3\\CMS\\Reports\\Task\\SystemStatusUpdateTask',
    'tx_reports_tasks_systemstatusupdatetasknotificationemailfield' => 'TYPO3\\CMS\\Reports\\Task\\SystemStatusUpdateTaskNotificationEmailField',
    'tx_reports_viewhelpers_actionmenuitemviewhelper' => 'TYPO3\\CMS\\Reports\\ViewHelpers\\ActionMenuItemViewHelper',
    'tx_reports_viewhelpers_iconviewhelper' => 'TYPO3\\CMS\\Reports\\ViewHelpers\\IconViewHelper',
    'tx_rsaauth_abstract_backend' => 'TYPO3\\CMS\\Rsaauth\\Backend\\AbstractBackend',
    'tx_rsaauth_backendfactory' => 'TYPO3\\CMS\\Rsaauth\\Backend\\BackendFactory',
    'tx_rsaauth_cmdline_backend' => 'TYPO3\\CMS\\Rsaauth\\Backend\\CommandLineBackend',
    'tx_rsaauth_php_backend' => 'TYPO3\\CMS\\Rsaauth\\Backend\\PhpBackend',
    'tx_rsaauth_backendwarnings' => 'TYPO3\\CMS\\Rsaauth\\BackendWarnings',
    'tx_rsaauth_feloginhook' => 'TYPO3\\CMS\\Rsaauth\\Hook\\FrontendLoginHook',
    'tx_rsaauth_loginformhook' => 'TYPO3\\CMS\\Rsaauth\\Hook\\LoginFormHook',
    'tx_rsaauth_usersetuphook' => 'TYPO3\\CMS\\Rsaauth\\Hook\\UserSetupHook',
    'tx_rsaauth_keypair' => 'TYPO3\\CMS\\Rsaauth\\Keypair',
    'tx_rsaauth_sv1' => 'TYPO3\\CMS\\Rsaauth\\RsaAuthService',
    'tx_rsaauth_abstract_storage' => 'TYPO3\\CMS\\Rsaauth\\Storage\\AbstractStorage',
    'tx_rsaauth_session_storage' => 'TYPO3\\CMS\\Rsaauth\\Storage\\SessionStorage',
    'tx_rsaauth_split_storage' => 'TYPO3\\CMS\\Rsaauth\\Storage\\SplitStorage',
    'tx_rsaauth_storagefactory' => 'TYPO3\\CMS\\Rsaauth\\Storage\\StorageFactory',
    'tx_rtehtmlarea_browse_links' => 'TYPO3\\CMS\\Rtehtmlarea\\BrowseLinks',
    'tx_rtehtmlarea_parse_html' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\ParseHtmlController',
    'tx_rtehtmlarea_sc_browse_links' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\BrowseLinksController',
    'tx_rtehtmlarea_pi3' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\CustomAttributeController',
    'tx_rtehtmlarea_pi2' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\FrontendRteController',
    'tx_rtehtmlarea_sc_select_image' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\SelectImageController',
    'tx_rtehtmlarea_pi1' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\SpellCheckingController',
    'tx_rtehtmlarea_abouteditor' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\AboutEditor',
    'tx_rtehtmlarea_acronym' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Abbreviation',
    'tx_rtehtmlarea_blockelements' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\BlockElements',
    'tx_rtehtmlarea_blockstyle' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\BlockStyle',
    'tx_rtehtmlarea_charactermap' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\CharacterMap',
    'tx_rtehtmlarea_contextmenu' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\ContextMenu',
    'tx_rtehtmlarea_copypaste' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\CopyPaste',
    'tx_rtehtmlarea_defaultclean' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultClean',
    'tx_rtehtmlarea_defaultimage' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultImage',
    'tx_rtehtmlarea_defaultinline' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultInline',
    'tx_rtehtmlarea_defaultlink' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultLink',
    'tx_rtehtmlarea_definitionlist' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefinitionList',
    'tx_rtehtmlarea_editelement' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\EditElement',
    'tx_rtehtmlarea_editormode' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\EditorMode',
    'tx_rtehtmlarea_findreplace' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\FindReplace',
    'tx_rtehtmlarea_inlineelements' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\InlineElements',
    'tx_rtehtmlarea_insertsmiley' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\InsertSmiley',
    'tx_rtehtmlarea_language' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Language',
    'tx_rtehtmlarea_microdataschema' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\MicroDataSchema',
    'tx_rtehtmlarea_plaintext' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Plaintext',
    'tx_rtehtmlarea_quicktag' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\QuickTag',
    'tx_rtehtmlarea_removeformat' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\RemoveFormat',
    'tx_rtehtmlarea_selectfont' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\SelectFont',
    'tx_rtehtmlarea_spellchecker' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Spellchecker',
    'tx_rtehtmlarea_tableoperations' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\TableOperations',
    'tx_rtehtmlarea_textindicator' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\TextIndicator',
    'tx_rtehtmlarea_textstyle' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\TextStyle',
    'tx_rtehtmlarea_typo3color' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3Color',
    'tx_rtehtmlarea_typo3htmlparser' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3HtmlParser',
    'tx_rtehtmlarea_typo3image' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3Image',
    'tx_rtehtmlarea_typo3link' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3Link',
    'tx_rtehtmlarea_undoredo' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\UndoRedo',
    'tx_rtehtmlarea_userelements' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\UserElements',
    'tx_rtehtmlarea_foldertree' => 'TYPO3\\CMS\\Rtehtmlarea\\FolderTree',
    'tx_rtehtmlarea_deprecatedrteproperties' => 'TYPO3\\CMS\\Rtehtmlarea\\Hook\\Install\\DeprecatedRteProperties',
    'tx_rtehtmlarea_softrefproc' => 'TYPO3\\CMS\\Rtehtmlarea\\Hook\\SoftReferenceHook',
    'tx_rtehtmlarea_statusreport_conflictscheck' => 'TYPO3\\CMS\\Rtehtmlarea\\Hook\\StatusReportConflictsCheckHook',
    'tx_rtehtmlarea_image_foldertree' => 'TYPO3\\CMS\\Rtehtmlarea\\FolderTree',
    'tx_rtehtmlarea_pagetree' => 'TYPO3\\CMS\\Rtehtmlarea\\PageTree',
    'tx_rtehtmlarea_api' => 'TYPO3\\CMS\\Rtehtmlarea\\RteHtmlAreaApi',
    'tx_rtehtmlarea_base' => 'TYPO3\\CMS\\Rtehtmlarea\\RteHtmlAreaBase',
    'tx_rtehtmlarea_select_image' => 'TYPO3\\CMS\\Rtehtmlarea\\SelectImage',
    'tx_rtehtmlarea_user' => 'TYPO3\\CMS\\Rtehtmlarea\\Controller\\UserElementsController',
    'typo3\\cms\\rtehtmlarea\\imagefoldertree' => 'TYPO3\\CMS\\Rtehtmlarea\\FolderTree',
    'tx_saltedpasswords_eval_be' => 'TYPO3\\CMS\\Saltedpasswords\\Evaluation\\BackendEvaluator',
    'tx_saltedpasswords_eval' => 'TYPO3\\CMS\\Saltedpasswords\\Evaluation\\Evaluator',
    'tx_saltedpasswords_eval_fe' => 'TYPO3\\CMS\\Saltedpasswords\\Evaluation\\FrontendEvaluator',
    'tx_saltedpasswords_abstract_salts' => 'TYPO3\\CMS\\Saltedpasswords\\Salt\\AbstractSalt',
    'tx_saltedpasswords_salts_blowfish' => 'TYPO3\\CMS\\Saltedpasswords\\Salt\\BlowfishSalt',
    'tx_saltedpasswords_salts_md5' => 'TYPO3\\CMS\\Saltedpasswords\\Salt\\Md5Salt',
    'tx_saltedpasswords_salts_phpass' => 'TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt',
    'tx_saltedpasswords_salts_factory' => 'TYPO3\\CMS\\Saltedpasswords\\Salt\\SaltFactory',
    'tx_saltedpasswords_salts' => 'TYPO3\\CMS\\Saltedpasswords\\Salt\\SaltInterface',
    'tx_saltedpasswords_sv1' => 'TYPO3\\CMS\\Saltedpasswords\\SaltedPasswordService',
    'tx_saltedpasswords_tasks_bulkupdate_additionalfieldprovider' => 'TYPO3\\CMS\\Saltedpasswords\\Task\\BulkUpdateFieldProvider',
    'tx_saltedpasswords_tasks_bulkupdate' => 'TYPO3\\CMS\\Saltedpasswords\\Task\\BulkUpdateTask',
    'tx_saltedpasswords_emconfhelper' => 'TYPO3\\CMS\\Saltedpasswords\\Utility\\ExtensionManagerConfigurationUtility',
    'tx_saltedpasswords_div' => 'TYPO3\\CMS\\Saltedpasswords\\Utility\\SaltedPasswordsUtility',
    'tx_scheduler_additionalfieldprovider' => 'TYPO3\\CMS\\Scheduler\\AdditionalFieldProviderInterface',
    'tx_scheduler_module' => 'TYPO3\\CMS\\Scheduler\\Controller\\SchedulerModuleController',
    'tx_scheduler_croncmd' => 'TYPO3\\CMS\\Scheduler\\CronCommand\\CronCommand',
    'tx_scheduler_croncmd_normalize' => 'TYPO3\\CMS\\Scheduler\\CronCommand\\NormalizeCommand',
    'tx_scheduler_sleeptask' => 'TYPO3\\CMS\\Scheduler\\Example\\SleepTask',
    'tx_scheduler_sleeptask_additionalfieldprovider' => 'TYPO3\\CMS\\Scheduler\\Example\\SleepTaskAdditionalFieldProvider',
    'tx_scheduler_execution' => 'TYPO3\\CMS\\Scheduler\\Execution',
    'tx_scheduler_failedexecutionexception' => 'TYPO3\\CMS\\Scheduler\\FailedExecutionException',
    'tx_scheduler_progressprovider' => 'TYPO3\\CMS\\Scheduler\\ProgressProviderInterface',
    'tx_scheduler' => 'TYPO3\\CMS\\Scheduler\\Scheduler',
    'tx_scheduler_task' => 'TYPO3\\CMS\\Scheduler\\Task\\AbstractTask',
    'tx_scheduler_cachingframeworkgarbagecollection_additionalfieldprovider' => 'TYPO3\\CMS\\Scheduler\\Task\\CachingFrameworkGarbageCollectionAdditionalFieldProvider',
    'tx_scheduler_cachingframeworkgarbagecollection' => 'TYPO3\\CMS\\Scheduler\\Task\\CachingFrameworkGarbageCollectionTask',
    'tx_scheduler_recyclergarbagecollection_additionalfieldprovider' => 'TYPO3\\CMS\\Scheduler\\Task\\RecyclerGarbageCollectionAdditionalFieldProvider',
    'tx_scheduler_recyclergarbagecollection' => 'TYPO3\\CMS\\Scheduler\\Task\\RecyclerGarbageCollectionTask',
    'tx_scheduler_tablegarbagecollection_additionalfieldprovider' => 'TYPO3\\CMS\\Scheduler\\Task\\TableGarbageCollectionAdditionalFieldProvider',
    'tx_scheduler_tablegarbagecollection' => 'TYPO3\\CMS\\Scheduler\\Task\\TableGarbageCollectionTask',
    'sc_mod_user_setup_index' => 'TYPO3\\CMS\\Setup\\Controller\\SetupModuleController',
    'tx_sv_authbase' => 'TYPO3\\CMS\\Sv\\AbstractAuthenticationService',
    'tx_sv_auth' => 'TYPO3\\CMS\\Sv\\AuthenticationService',
    'tx_sv_loginformhook' => 'TYPO3\\CMS\\Sv\\LoginFormHook',
    'tx_sv_reports_serviceslist' => 'TYPO3\\CMS\\Sv\\Report\\ServicesListReport',
    'tx_sysaction_list' => 'TYPO3\\CMS\\SysAction\\ActionList',
    'tx_sysaction_task' => 'TYPO3\\CMS\\SysAction\\ActionTask',
    'tx_t3editor_codecompletion' => 'TYPO3\\CMS\\T3editor\\CodeCompletion',
    'tx_t3editor_tceforms_wizard' => 'TYPO3\\CMS\\T3editor\\FormWizard',
    'tx_t3editor_hooks_fileedit' => 'TYPO3\\CMS\\T3editor\\Hook\\FileEditHook',
    'tx_t3editor_hooks_tstemplateinfo' => 'TYPO3\\CMS\\T3editor\\Hook\\TypoScriptTemplateInfoHook',
    'tx_t3editor' => 'TYPO3\\CMS\\T3editor\\T3editor',
    'tx_t3editor_tsrefloader' => 'TYPO3\\CMS\\T3editor\\TypoScriptReferenceLoader',
    'sc_mod_user_task_index' => 'TYPO3\\CMS\\Taskcenter\\Controller\\TaskModuleController',
    'tx_taskcenter_task' => 'TYPO3\\CMS\\Taskcenter\\TaskInterface',
    'tx_taskcenter_status' => 'TYPO3\\CMS\\Taskcenter\\TaskStatus',
    'sc_mod_web_ts_index' => 'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateModuleController',
    'tx_tstemplateanalyzer' => 'TYPO3\\CMS\\Tstemplate\\Controller\\TemplateAnalyzerModuleFunctionController',
    'tx_tstemplateceditor' => 'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateConstantEditorModuleFunctionController',
    'tx_tstemplateinfo' => 'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateInformationModuleFunctionController',
    'tx_tstemplateobjbrowser' => 'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateObjectBrowserModuleFunctionController',
    'tx_version_cm1' => 'TYPO3\\CMS\\Version\\Controller\\VersionModuleController',
    'tx_version_tcemain_commandmap' => 'TYPO3\\CMS\\Version\\DataHandler\\CommandMap',
    'tx_version_tcemain' => 'TYPO3\\CMS\\Version\\Hook\\DataHandlerHook',
    'tx_version_iconworks' => 'TYPO3\\CMS\\Version\\Hook\\IconUtilityHook',
    'tx_version_preview' => 'TYPO3\\CMS\\Version\\Hook\\PreviewHook',
    'tx_version_tasks_autopublish' => 'TYPO3\\CMS\\Version\\Task\\AutoPublishTask',
    't3lib_utility_dependency_factory' => 'TYPO3\\CMS\\Version\\Dependency\\DependencyEntityFactory',
    't3lib_utility_dependency' => 'TYPO3\\CMS\\Version\\Dependency\\DependencyResolver',
    't3lib_utility_dependency_element' => 'TYPO3\\CMS\\Version\\Dependency\\ElementEntity',
    't3lib_utility_dependency_callback' => 'TYPO3\\CMS\\Version\\Dependency\\EventCallback',
    't3lib_utility_dependency_reference' => 'TYPO3\\CMS\\Version\\Dependency\\ReferenceEntity',
    'wslib' => 'TYPO3\\CMS\\Version\\Utility\\WorkspacesUtility',
    'tx_version_gui' => 'TYPO3\\CMS\\Version\\View\\VersionView',
    'tx_wizardcrpages_webfunc_2' => 'TYPO3\\CMS\\WizardCrpages\\Controller\\CreatePagesWizardModuleFunctionController',
    'tx_wizardsortpages_webfunc_2' => 'TYPO3\\CMS\\WizardSortPages\\View\\SortPagesWizardModuleFunction',
    'tx_workspaces_controller_abstractcontroller' => 'TYPO3\\CMS\\Workspaces\\Controller\\AbstractController',
    'tx_workspaces_controller_previewcontroller' => 'TYPO3\\CMS\\Workspaces\\Controller\\PreviewController',
    'tx_workspaces_controller_reviewcontroller' => 'TYPO3\\CMS\\Workspaces\\Controller\\ReviewController',
    'tx_workspaces_domain_model_combinedrecord' => 'TYPO3\\CMS\\Workspaces\\Domain\\Model\\CombinedRecord',
    'tx_workspaces_domain_model_databaserecord' => 'TYPO3\\CMS\\Workspaces\\Domain\\Model\\DatabaseRecord',
    'tx_workspaces_extdirect_abstracthandler' => 'TYPO3\\CMS\\Workspaces\\ExtDirect\\AbstractHandler',
    'tx_workspaces_extdirect_actionhandler' => 'TYPO3\\CMS\\Workspaces\\ExtDirect\\ActionHandler',
    'tx_workspaces_extdirect_server' => 'TYPO3\\CMS\\Workspaces\\ExtDirect\\ExtDirectServer',
    'tx_workspaces_extdirect_massactionhandler' => 'TYPO3\\CMS\\Workspaces\\ExtDirect\\MassActionHandler',
    'tx_workspaces_extdirect_pagetreecollectionsprocessor' => 'TYPO3\\CMS\\Workspaces\\ExtDirect\\PagetreeCollectionsProcessor',
    'tx_workspaces_service_befunc' => 'TYPO3\\CMS\\Workspaces\\Hook\\BackendUtilityHook',
    'tx_workspaces_service_tcemain' => 'TYPO3\\CMS\\Workspaces\\Hook\\DataHandlerHook',
    'tx_workspaces_service_fehooks' => 'TYPO3\\CMS\\Workspaces\\Hook\\TypoScriptFrontendControllerHook',
    'tx_workspaces_service_autopublish' => 'TYPO3\\CMS\\Workspaces\\Service\\AutoPublishService',
    'tx_workspaces_service_griddata' => 'TYPO3\\CMS\\Workspaces\\Service\\GridDataService',
    'tx_workspaces_service_history' => 'TYPO3\\CMS\\Workspaces\\Service\\HistoryService',
    'tx_workspaces_service_integrity' => 'TYPO3\\CMS\\Workspaces\\Service\\IntegrityService',
    'tx_workspaces_service_stages' => 'TYPO3\\CMS\\Workspaces\\Service\\StagesService',
    'tx_workspaces_service_workspaces' => 'TYPO3\\CMS\\Workspaces\\Service\\WorkspaceService',
    'tx_workspaces_service_autopublishtask' => 'TYPO3\\CMS\\Workspaces\\Task\\AutoPublishTask',
    'tx_workspaces_service_cleanuppreviewlinktask' => 'TYPO3\\CMS\\Workspaces\\Task\\CleanupPreviewLinkTask',
    'moveelementlocalpagetree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\MoveElementPageTreeView',
    'ext_posmap_pages' => 'TYPO3\\CMS\\Backend\\Tree\\View\\PageMovingPagePositionMap',
    'ext_posmap_tt_content' => 'TYPO3\\CMS\\Backend\\Tree\\View\\ContentMovingPagePositionMap',
    'localpagetree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\ElementBrowserPageTreeView',
    'tbe_pagetree' => 'TYPO3\\CMS\\Recordlist\\Tree\\View\\ElementBrowserPageTreeView',
    'localfoldertree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\ElementBrowserFolderTreeView',
    'tbe_foldertree' => 'TYPO3\\CMS\\Recordlist\\Tree\\View\\ElementBrowserFolderTreeView',
    'newrecordlocalpagetree' => 'TYPO3\\CMS\\Backend\\Tree\\View\\NewRecordPageTreeView',
    'backend_cacheactionshook' => 'TYPO3\\CMS\\Backend\\Toolbar\\ClearCacheActionsHookInterface',
    'typo3\\cms\\frontend\\contentobject\\searchresultcontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\SearchResultContentObject',
    'typo3\\cms\\frontend\\contentobject\\imagetextcontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ImageTextContentObject',
    'typo3\\cms\\frontend\\contentobject\\cleargifcontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ClearGifContentObject',
    'typo3\\cms\\frontend\\contentobject\\contenttablecontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ContentTableContentObject',
    'typo3\\cms\\frontend\\contentobject\\offsettablecontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\OffsetTableContentObject',
    'typo3\\cms\\frontend\\contentobject\\columnscontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\ColumnsContentObject',
    'typo3\\cms\\frontend\\contentobject\\horizontalrulercontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\HorizontalRulerContentObject',
    'typo3\\cms\\frontend\\contentobject\\formcontentobject' => 'TYPO3\\CMS\\Compatibility6\\ContentObject\\FormContentObject',
    'typo3\\cms\\frontend\\controller\\wizard\\formscontroller' => 'TYPO3\\CMS\\Compatibility6\\Controller\\Wizard\\FormsController',
    'typo3\\cms\\frontend\\controller\\datasubmissioncontroller' => 'TYPO3\\CMS\\Compatibility6\\Controller\\FormDataSubmissionController',
    'tx_indexedsearch' => 'TYPO3\\CMS\\IndexedSearch\\Controller\\SearchFormController',
    'tx_indexedsearch_controller_searchcontroller' => 'TYPO3\\CMS\\IndexedSearch\\Controller\\SearchController',
    'typo3\\cms\\frontend\\contentobject\\flowplayercontentobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\FlowplayerContentObject',
    'typo3\\cms\\frontend\\contentobject\\mediacontentobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\MediaContentObject',
    'typo3\\cms\\frontend\\contentobject\\multimediacontentobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\MultimediaContentObject',
    'typo3\\cms\\frontend\\contentobject\\quicktimeobjectcontentobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\QuicktimeObjectContentObject',
    'typo3\\cms\\frontend\\contentobject\\shockwaveflashobjectcontentobject' => 'TYPO3\\CMS\\Mediace\\ContentObject\\ShockwaveFlashObjectContentObject',
    'typo3\\cms\\frontend\\mediawizard\\mediawizardprovider' => 'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProvider',
    'typo3\\cms\\frontend\\mediawizard\\mediawizardproviderinterface' => 'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProviderInterface',
    'typo3\\cms\\frontend\\mediawizard\\mediawizardprovidermanager' => 'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProviderManager',
    'typo3\\cms\\rtehtmlarea\\extension\\acronym' => 'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Abbreviation',
    'tx_news_controller_administrationcontroller' => 'GeorgRinger\\News\\Controller\\AdministrationController',
    'tx_news_controller_categorycontroller' => 'GeorgRinger\\News\\Controller\\CategoryController',
    'tx_news_controller_importcontroller' => 'GeorgRinger\\News\\Controller\\ImportController',
    'tx_news_controller_newsbasecontroller' => 'GeorgRinger\\News\\Controller\\NewsBaseController',
    'tx_news_controller_newscontroller' => 'GeorgRinger\\News\\Controller\\NewsController',
    'tx_news_controller_tagcontroller' => 'GeorgRinger\\News\\Controller\\TagController',
    'tx_news_database_softreferenceindex' => 'GeorgRinger\\News\\Database\\SoftReferenceIndex',
    'tx_news_viewhelpers_titletagviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\TitleTagViewHelper',
    'tx_news_viewhelpers_targetlinkviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\TargetLinkViewHelper',
    'tx_news_viewhelpers_simpleprevnextviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\SimplePrevNextViewHelper',
    'tx_news_viewhelpers_paginatebodytextviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\PaginateBodytextViewHelper',
    'tx_news_viewhelpers_objectviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\ObjectViewHelper',
    'tx_news_viewhelpers_metatagviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\MetaTagViewHelper',
    'tx_news_viewhelpers_mediafactoryviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\MediaFactoryViewHelper',
    'tx_news_viewhelpers_linkviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\LinkViewHelper',
    'tx_news_viewhelpers_includefileviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\IncludeFileViewHelper',
    'tx_news_viewhelpers_ifisactiveviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\IfIsActiveViewHelper',
    'tx_news_viewhelpers_headerdataviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\HeaderDataViewHelper',
    'tx_news_viewhelpers_falmediafactoryviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\FalMediaFactoryViewHelper',
    'tx_news_viewhelpers_excludedisplayednewsviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\ExcludeDisplayedNewsViewHelper',
    'tx_news_viewhelpers_categorychildrenviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\CategoryChildrenViewHelper',
    'tx_news_viewhelpers_widget_paginateviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Widget\\PaginateViewHelper',
    'tx_news_viewhelpers_widget_controller_paginatecontroller' => 'GeorgRinger\\News\\ViewHelpers\\Widget\\Controller\\PaginateController',
    'tx_news_viewhelpers_social_twitterviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\TwitterViewHelper',
    'tx_news_viewhelpers_social_gravatarviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\GravatarViewHelper',
    'tx_news_viewhelpers_social_googleplusviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\GooglePlusViewHelper',
    'tx_news_viewhelpers_social_disqusviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\DisqusViewHelper',
    'tx_news_viewhelpers_social_facebook_commentviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\Facebook\\CommentViewHelper',
    'tx_news_viewhelpers_social_facebook_likeviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\Facebook\\LikeViewHelper',
    'tx_news_viewhelpers_social_facebook_shareviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Social\\Facebook\\ShareViewHelper',
    'tx_news_viewhelpers_format_striptagsviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\StriptagsViewHelper',
    'tx_news_viewhelpers_format_nothingviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\NothingViewHelper',
    'tx_news_viewhelpers_format_htmlentitiesdecodeviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\HtmlentitiesDecodeViewHelper',
    'tx_news_viewhelpers_format_hscviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\HscViewHelper',
    'tx_news_viewhelpers_format_filesizeviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\FileSizeViewHelper',
    'tx_news_viewhelpers_format_filedownloadviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\FileDownloadViewHelper',
    'tx_news_viewhelpers_format_dateviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Format\\DateViewHelper',
    'tx_news_viewhelpers_be_multieditlinkviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Be\\MultiEditLinkViewHelper',
    'tx_news_viewhelpers_be_clickmenuviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Be\\ClickmenuViewHelper',
    'tx_news_viewhelpers_be_security' => 'GeorgRinger\\News\\ViewHelpers\\Be\\Security\\IfAccessToTableIsAllowedViewHelper',
    'tx_news_viewhelpers_be_buttons_iconviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Be\\Buttons\\IconViewHelper',
    'tx_news_viewhelpers_be_buttons_iconforrecordviewhelper' => 'GeorgRinger\\News\\ViewHelpers\\Be\\Buttons\\IconForRecordViewHelper',
    'tx_news_utility_validation' => 'GeorgRinger\\News\\Utility\\Validation',
    'tx_news_utility_url' => 'GeorgRinger\\News\\Utility\\Url',
    'tx_news_utility_typoscript' => 'GeorgRinger\\News\\Utility\\TypoScript',
    'tx_news_utility_templatelayout' => 'GeorgRinger\\News\\Utility\\TemplateLayout',
    'tx_news_utility_page' => 'GeorgRinger\\News\\Utility\\Page',
    'tx_news_utility_importjob' => 'GeorgRinger\\News\\Utility\\ImportJob',
    'tx_news_utility_emconfiguration' => 'GeorgRinger\\News\\Utility\\EmConfiguration',
    'tx_news_utility_cache' => 'GeorgRinger\\News\\Utility\\Cache',
    'tx_news_treeprovider_databasetreedataprovider' => 'GeorgRinger\\News\\TreeProvider\\DatabaseTreeDataProvider',
    'tx_news_service_settingsservice' => 'GeorgRinger\\News\\Service\\SettingsService',
    'tx_news_service_fileservice' => 'GeorgRinger\\News\\Service\\FileService',
    'tx_news_service_categoryservice' => 'GeorgRinger\\News\\Service\\CategoryService',
    'tx_news_service_cacheservice' => 'GeorgRinger\\News\\Service\\CacheService',
    'tx_news_service_accesscontrolservice' => 'GeorgRinger\\News\\Service\\AccessControlService',
    'tx_news_service_import_dataproviderserviceinterface' => 'GeorgRinger\\News\\Service\\Import\\DataProviderServiceInterface',
    'tx_news_mediarenderer_mediainterface' => 'GeorgRinger\\News\\MediaRenderer\\MediaInterface',
    'tx_news_mediarenderer_falmediainterface' => 'GeorgRinger\\News\\MediaRenderer\\FalMediaInterface',
    'tx_news_mediarenderer_video_youtube' => 'GeorgRinger\\News\\MediaRenderer\\Video\\Youtube',
    'tx_news_mediarenderer_video_vimeo' => 'GeorgRinger\\News\\MediaRenderer\\Video\\Vimeo',
    'tx_news_mediarenderer_video_videosites' => 'GeorgRinger\\News\\MediaRenderer\\Video\\Videosites',
    'tx_news_mediarenderer_video_quicktime' => 'GeorgRinger\\News\\MediaRenderer\\Video\\Quicktime',
    'tx_news_mediarenderer_video_file' => 'GeorgRinger\\News\\MediaRenderer\\Video\\File',
    'tx_news_mediarenderer_video_fal' => 'GeorgRinger\\News\\MediaRenderer\\Video\\Fal',
    'tx_news_mediarenderer_audio_mp3html5' => 'GeorgRinger\\News\\MediaRenderer\\Audio\\Mp3Html5',
    'tx_news_mediarenderer_audio_mp3' => 'GeorgRinger\\News\\MediaRenderer\\Audio\\Mp3',
    'tx_news_jobs_importjobinterface' => 'GeorgRinger\\News\\Jobs\\ImportJobInterface',
    'tx_news_jobs_abstractimportjob' => 'GeorgRinger\\News\\Jobs\\AbstractImportJob',
    'tx_news_hooks_tcemain' => 'GeorgRinger\\News\\Hooks\\DataHandler',
    'tx_news_hooks_tceforms' => 'GeorgRinger\\News\\Hooks\\FormEngine',
    'tx_news_hooks_t3libbefunc' => 'GeorgRinger\\News\\Hooks\\BackendUtility',
    'tx_news_hooks_suggestreceivercall' => 'GeorgRinger\\News\\Hooks\\SuggestReceiverCall',
    'tx_news_hooks_suggestreceiver' => 'GeorgRinger\\News\\Hooks\\SuggestReceiver',
    'tx_news_hooks_realurlautoconfiguration' => 'GeorgRinger\\News\\Hooks\\RealUrlAutoConfiguration',
    'tx_news_hooks_labels' => 'GeorgRinger\\News\\Hooks\\Labels',
    'tx_news_hooks_itemsprocfunc' => 'GeorgRinger\\News\\Hooks\\ItemsProcFunc',
    'tx_news_hooks_inlineelementhook' => 'GeorgRinger\\News\\Hooks\\InlineElementHook',
    'tx_news_hooks_cmslayout' => 'GeorgRinger\\News\\Hooks\\CmsLayout',
    'tx_news_domain_service_newsimportservice' => 'GeorgRinger\\News\\Domain\\Service\\NewsImportService',
    'tx_news_domain_service_categoryimportservice' => 'GeorgRinger\\News\\Domain\\Service\\CategoryImportService',
    'tx_news_domain_service_abstractimportservice' => 'GeorgRinger\\News\\Domain\\Service\\AbstractImportService',
    'tx_news_domain_repository_ttcontentrepository' => 'GeorgRinger\\News\\Domain\\Repository\\TtContentRepository',
    'tx_news_domain_repository_tagrepository' => 'GeorgRinger\\News\\Domain\\Repository\\TagRepository',
    'tx_news_domain_repository_newsrepository' => 'GeorgRinger\\News\\Domain\\Repository\\NewsRepository',
    'tx_news_domain_repository_newsdefaultrepository' => 'GeorgRinger\\News\\Domain\\Repository\\NewsDefaultRepository',
    'tx_news_domain_repository_mediarepository' => 'GeorgRinger\\News\\Domain\\Repository\\MediaRepository',
    'tx_news_domain_repository_linkrepository' => 'GeorgRinger\\News\\Domain\\Repository\\LinkRepository',
    'tx_news_domain_repository_filerepository' => 'GeorgRinger\\News\\Domain\\Repository\\FileRepository',
    'tx_news_domain_repository_demandedrepositoryinterface' => 'GeorgRinger\\News\\Domain\\Repository\\DemandedRepositoryInterface',
    'tx_news_domain_repository_categoryrepository' => 'GeorgRinger\\News\\Domain\\Repository\\CategoryRepository',
    'tx_news_domain_repository_abstractdemandedrepository' => 'GeorgRinger\\News\\Domain\\Repository\\AbstractDemandedRepository',
    'tx_news_domain_model_category' => 'GeorgRinger\\News\\Domain\\Model\\Category',
    'tx_news_domain_model_demandinterface' => 'GeorgRinger\\News\\Domain\\Model\\DemandInterface',
    'tx_news_domain_model_file' => 'GeorgRinger\\News\\Domain\\Model\\File',
    'tx_news_domain_model_filereference' => 'GeorgRinger\\News\\Domain\\Model\\FileReference',
    'tx_news_domain_model_link' => 'GeorgRinger\\News\\Domain\\Model\\Link',
    'tx_news_domain_model_media' => 'GeorgRinger\\News\\Domain\\Model\\Media',
    'tx_news_domain_model_news' => 'GeorgRinger\\News\\Domain\\Model\\News',
    'tx_news_domain_model_newsdefault' => 'GeorgRinger\\News\\Domain\\Model\\NewsDefault',
    'tx_news_domain_model_newsexternal' => 'GeorgRinger\\News\\Domain\\Model\\NewsExternal',
    'tx_news_domain_model_newsinternal' => 'GeorgRinger\\News\\Domain\\Model\\NewsInternal',
    'tx_news_domain_model_tag' => 'GeorgRinger\\News\\Domain\\Model\\Tag',
    'tx_news_domain_model_ttcontent' => 'GeorgRinger\\News\\Domain\\Model\\TtContent',
    'tx_news_domain_model_dto_administrationdemand' => 'GeorgRinger\\News\\Domain\\Model\\Dto\\AdministrationDemand',
    'tx_news_domain_model_dto_emconfiguration' => 'GeorgRinger\\News\\Domain\\Model\\Dto\\EmConfiguration',
    'tx_news_domain_model_dto_newsdemand' => 'GeorgRinger\\News\\Domain\\Model\\Dto\\NewsDemand',
    'tx_news_domain_model_dto_search' => 'GeorgRinger\\News\\Domain\\Model\\Dto\\Search',
    'tx_news_domain_model_dto_' => 'GeorgRinger\\News\\Domain\\Model\\Dto\\',
  ),
  'classNameToAliasMapping' => 
  array (
    'TYPO3\\CMS\\About\\Controller\\AboutController' => 
    array (
      'tx_about_controller_aboutcontroller' => 'tx_about_controller_aboutcontroller',
    ),
    'TYPO3\\CMS\\About\\Domain\\Model\\Extension' => 
    array (
      'tx_about_domain_model_extension' => 'tx_about_domain_model_extension',
    ),
    'TYPO3\\CMS\\About\\Domain\\Repository\\ExtensionRepository' => 
    array (
      'tx_about_domain_repository_extensionrepository' => 'tx_about_domain_repository_extensionrepository',
    ),
    'TYPO3\\CMS\\About\\ViewHelpers\\SkinImageViewHelper' => 
    array (
      'tx_about_viewhelpers_skinimageviewhelper' => 'tx_about_viewhelpers_skinimageviewhelper',
    ),
    'TYPO3\\CMS\\Aboutmodules\\Controller\\ModulesController' => 
    array (
      'tx_aboutmodules_controller_modulescontroller' => 'tx_aboutmodules_controller_modulescontroller',
    ),
    'TYPO3\\CMS\\Backend\\AjaxLoginHandler' => 
    array (
      'ajaxlogin' => 'ajaxlogin',
    ),
    'TYPO3\\CMS\\Backend\\ClickMenu\\ClickMenu' => 
    array (
      'clickmenu' => 'clickmenu',
    ),
    'TYPO3\\CMS\\Core\\Controller\\CommandLineController' => 
    array (
      't3lib_cli' => 't3lib_cli',
    ),
    'TYPO3\\CMS\\Backend\\Clipboard\\Clipboard' => 
    array (
      't3lib_clipboard' => 't3lib_clipboard',
    ),
    'TYPO3\\CMS\\Backend\\Configuration\\TranslationConfigurationProvider' => 
    array (
      't3lib_transl8tools' => 't3lib_transl8tools',
    ),
    'TYPO3\\CMS\\Core\\TypoScript\\Parser\\TypoScriptParser' => 
    array (
      't3lib_tsparser' => 't3lib_tsparser',
    ),
    'TYPO3\\CMS\\Backend\\Configuration\\TsConfigParser' => 
    array (
      't3lib_tsparser_tsconfig' => 't3lib_tsparser_tsconfig',
    ),
    'TYPO3\\CMS\\Backend\\Configuration\\TypoScript\\ConditionMatching\\ConditionMatcher' => 
    array (
      't3lib_matchcondition_backend' => 't3lib_matchcondition_backend',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\AbstractContextMenu' => 
    array (
      't3lib_contextmenu_abstractcontextmenu' => 't3lib_contextmenu_abstractcontextmenu',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\AbstractContextMenuDataProvider' => 
    array (
      't3lib_contextmenu_abstractdataprovider' => 't3lib_contextmenu_abstractdataprovider',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\ContextMenuAction' => 
    array (
      't3lib_contextmenu_action' => 't3lib_contextmenu_action',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\ContextMenuActionCollection' => 
    array (
      't3lib_contextmenu_actioncollection' => 't3lib_contextmenu_actioncollection',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\Extdirect\\AbstractExtdirectContextMenu' => 
    array (
      't3lib_contextmenu_extdirect_contextmenu' => 't3lib_contextmenu_extdirect_contextmenu',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\Pagetree\\ContextMenuDataProvider' => 
    array (
      't3lib_contextmenu_pagetree_dataprovider' => 't3lib_contextmenu_pagetree_dataprovider',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\Pagetree\\Extdirect\\ContextMenuConfiguration' => 
    array (
      't3lib_contextmenu_pagetree_extdirect_contextmenu' => 't3lib_contextmenu_pagetree_extdirect_contextmenu',
    ),
    'TYPO3\\CMS\\Backend\\ContextMenu\\Renderer\\AbstractContextMenuRenderer' => 
    array (
      't3lib_contextmenu_renderer_abstract' => 't3lib_contextmenu_renderer_abstract',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\BackendController' => 
    array (
      'typo3backend' => 'typo3backend',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\BackendLayoutWizardController' => 
    array (
      'sc_wizard_backend_layout' => 'sc_wizard_backend_layout',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\ClickMenuController' => 
    array (
      'sc_alt_clickmenu' => 'sc_alt_clickmenu',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\ElementHistoryController' => 
    array (
      'sc_show_rechis' => 'sc_show_rechis',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\ElementInformationController' => 
    array (
      'sc_show_item' => 'sc_show_item',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\MoveElementController' => 
    array (
      'sc_move_el' => 'sc_move_el',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\ContentElement\\NewContentElementController' => 
    array (
      'sc_db_new_content_el' => 'sc_db_new_content_el',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\PageLayoutController' => 
    array (
      'sc_db_layout' => 'sc_db_layout',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\DummyController' => 
    array (
      'sc_dummy' => 'sc_dummy',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\EditDocumentController' => 
    array (
      'sc_alt_doc' => 'sc_alt_doc',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\File\\CreateFolderController' => 
    array (
      'sc_file_newfolder' => 'sc_file_newfolder',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\File\\EditFileController' => 
    array (
      'sc_file_edit' => 'sc_file_edit',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\File\\FileController' => 
    array (
      'typo3_tcefile' => 'typo3_tcefile',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\File\\FileUploadController' => 
    array (
      'sc_file_upload' => 'sc_file_upload',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\File\\RenameFileController' => 
    array (
      'sc_file_rename' => 'sc_file_rename',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\FileSystemNavigationFrameController' => 
    array (
      'sc_alt_file_navframe' => 'sc_alt_file_navframe',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\ListFrameLoaderController' => 
    array (
      'sc_listframe_loader' => 'sc_listframe_loader',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\LoginController' => 
    array (
      'sc_index' => 'sc_index',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\LoginFramesetController' => 
    array (
      'sc_login_frameset' => 'sc_login_frameset',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\LogoutController' => 
    array (
      'sc_logout' => 'sc_logout',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\NewRecordController' => 
    array (
      'sc_db_new' => 'sc_db_new',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\PageTreeNavigationController' => 
    array (
      'sc_alt_db_navframe' => 'sc_alt_db_navframe',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\SimpleDataHandlerController' => 
    array (
      'sc_tce_db' => 'sc_tce_db',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\Wizard\\AddController' => 
    array (
      'sc_wizard_add' => 'sc_wizard_add',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\Wizard\\ColorpickerController' => 
    array (
      'sc_wizard_colorpicker' => 'sc_wizard_colorpicker',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\Wizard\\EditController' => 
    array (
      'sc_wizard_edit' => 'sc_wizard_edit',
    ),
    'TYPO3\\CMS\\Compatibility6\\Controller\\Wizard\\FormsController' => 
    array (
      'sc_wizard_forms' => 'sc_wizard_forms',
      'typo3\\cms\\frontend\\controller\\wizard\\formscontroller' => 'typo3\\cms\\frontend\\controller\\wizard\\formscontroller',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\Wizard\\ListController' => 
    array (
      'sc_wizard_list' => 'sc_wizard_list',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\Wizard\\RteController' => 
    array (
      'sc_wizard_rte' => 'sc_wizard_rte',
    ),
    'TYPO3\\CMS\\Backend\\Controller\\Wizard\\TableController' => 
    array (
      'sc_wizard_table' => 'sc_wizard_table',
    ),
    'TYPO3\\CMS\\Backend\\Form\\DataPreprocessor' => 
    array (
      't3lib_transferdata' => 't3lib_transferdata',
    ),
    'TYPO3\\CMS\\Backend\\Form\\Element\\InlineElement' => 
    array (
      't3lib_tceforms_inline' => 't3lib_tceforms_inline',
    ),
    'TYPO3\\CMS\\Backend\\Form\\Element\\InlineElementHookInterface' => 
    array (
      't3lib_tceformsinlinehook' => 't3lib_tceformsinlinehook',
    ),
    'TYPO3\\CMS\\Backend\\Form\\FormEngine' => 
    array (
      't3lib_tceforms' => 't3lib_tceforms',
    ),
    'TYPO3\\CMS\\Backend\\Form\\FrontendFormEngine' => 
    array (
      't3lib_tceforms_fe' => 't3lib_tceforms_fe',
    ),
    'TYPO3\\CMS\\Backend\\Form\\DatabaseFileIconsHookInterface' => 
    array (
      't3lib_tceforms_dbfileiconshook' => 't3lib_tceforms_dbfileiconshook',
    ),
    'TYPO3\\CMS\\Backend\\Form\\Wizard\\SuggestWizard' => 
    array (
      't3lib_tceforms_suggest' => 't3lib_tceforms_suggest',
    ),
    'TYPO3\\CMS\\Backend\\Form\\Wizard\\SuggestWizardDefaultReceiver' => 
    array (
      't3lib_tceforms_suggest_defaultreceiver' => 't3lib_tceforms_suggest_defaultreceiver',
    ),
    'TYPO3\\CMS\\Backend\\Form\\Element\\TreeElement' => 
    array (
      't3lib_tceforms_tree' => 't3lib_tceforms_tree',
    ),
    'TYPO3\\CMS\\Backend\\Form\\Wizard\\ValueSliderWizard' => 
    array (
      't3lib_tceforms_valueslider' => 't3lib_tceforms_valueslider',
    ),
    'TYPO3\\CMS\\Backend\\Form\\FlexFormsHelper' => 
    array (
      't3lib_tceforms_flexforms' => 't3lib_tceforms_flexforms',
    ),
    'TYPO3\\CMS\\Backend\\FrontendBackendUserAuthentication' => 
    array (
      't3lib_tsfebeuserauth' => 't3lib_tsfebeuserauth',
    ),
    'TYPO3\\CMS\\Backend\\History\\RecordHistory' => 
    array (
      'recordhistory' => 'recordhistory',
    ),
    'TYPO3\\CMS\\Backend\\InterfaceState\\ExtDirect\\DataProvider' => 
    array (
      'extdirect_dataprovider_state' => 'extdirect_dataprovider_state',
    ),
    'TYPO3\\CMS\\Backend\\Module\\AbstractFunctionModule' => 
    array (
      't3lib_extobjbase' => 't3lib_extobjbase',
    ),
    'TYPO3\\CMS\\Backend\\Module\\BaseScriptClass' => 
    array (
      't3lib_scbase' => 't3lib_scbase',
    ),
    'TYPO3\\CMS\\Backend\\Module\\ModuleLoader' => 
    array (
      't3lib_loadmodules' => 't3lib_loadmodules',
    ),
    'TYPO3\\CMS\\Backend\\Module\\ModuleStorage' => 
    array (
      'typo3_modulestorage' => 'typo3_modulestorage',
    ),
    'TYPO3\\CMS\\Backend\\ModuleSettings' => 
    array (
      't3lib_modsettings' => 't3lib_modsettings',
    ),
    'TYPO3\\CMS\\Backend\\RecordList\\AbstractRecordList' => 
    array (
      't3lib_recordlist' => 't3lib_recordlist',
    ),
    'TYPO3\\CMS\\Backend\\RecordList\\ElementBrowserRecordList' => 
    array (
      'tbe_browser_recordlist' => 'tbe_browser_recordlist',
    ),
    'TYPO3\\CMS\\Backend\\RecordList\\RecordListGetTableHookInterface' => 
    array (
      't3lib_localrecordlistgettablehook' => 't3lib_localrecordlistgettablehook',
    ),
    'TYPO3\\CMS\\Backend\\Rte\\AbstractRte' => 
    array (
      't3lib_rteapi' => 't3lib_rteapi',
    ),
    'TYPO3\\CMS\\Backend\\Search\\LiveSearch\\ExtDirect\\LiveSearchDataProvider' => 
    array (
      'extdirect_dataprovider_backendlivesearch' => 'extdirect_dataprovider_backendlivesearch',
    ),
    'TYPO3\\CMS\\Backend\\Search\\LiveSearch\\LiveSearch' => 
    array (
      't3lib_search_livesearch' => 't3lib_search_livesearch',
    ),
    'TYPO3\\CMS\\Backend\\Search\\LiveSearch\\QueryParser' => 
    array (
      't3lib_search_livesearch_queryparser' => 't3lib_search_livesearch_queryparser',
    ),
    'TYPO3\\CMS\\Backend\\Sprite\\AbstractSpriteHandler' => 
    array (
      't3lib_spritemanager_abstracthandler' => 't3lib_spritemanager_abstracthandler',
    ),
    'TYPO3\\CMS\\Backend\\Sprite\\SimpleSpriteHandler' => 
    array (
      't3lib_spritemanager_simplehandler' => 't3lib_spritemanager_simplehandler',
    ),
    'TYPO3\\CMS\\Backend\\Sprite\\SpriteBuildingHandler' => 
    array (
      't3lib_spritemanager_spritebuildinghandler' => 't3lib_spritemanager_spritebuildinghandler',
    ),
    'TYPO3\\CMS\\Backend\\Sprite\\SpriteGenerator' => 
    array (
      't3lib_spritemanager_spritegenerator' => 't3lib_spritemanager_spritegenerator',
    ),
    'TYPO3\\CMS\\Backend\\Sprite\\SpriteIconGeneratorInterface' => 
    array (
      't3lib_spritemanager_spriteicongenerator' => 't3lib_spritemanager_spriteicongenerator',
    ),
    'TYPO3\\CMS\\Backend\\Sprite\\SpriteManager' => 
    array (
      't3lib_spritemanager' => 't3lib_spritemanager',
    ),
    'TYPO3\\CMS\\Backend\\Template\\DocumentTemplate' => 
    array (
      'template' => 'template',
    ),
    'TYPO3\\CMS\\Backend\\Template\\FrontendDocumentTemplate' => 
    array (
      'frontenddoc' => 'frontenddoc',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\AbstractExtJsTree' => 
    array (
      't3lib_tree_extdirect_abstractextjstree' => 't3lib_tree_extdirect_abstractextjstree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\AbstractTree' => 
    array (
      't3lib_tree_abstracttree' => 't3lib_tree_abstracttree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\AbstractTreeDataProvider' => 
    array (
      't3lib_tree_abstractdataprovider' => 't3lib_tree_abstractdataprovider',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\AbstractTreeStateProvider' => 
    array (
      't3lib_tree_abstractstateprovider' => 't3lib_tree_abstractstateprovider',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\ComparableNodeInterface' => 
    array (
      't3lib_tree_comparablenode' => 't3lib_tree_comparablenode',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\DraggableAndDropableNodeInterface' => 
    array (
      't3lib_tree_draggableanddropable' => 't3lib_tree_draggableanddropable',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\EditableNodeLabelInterface' => 
    array (
      't3lib_tree_labeleditable' => 't3lib_tree_labeleditable',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\ExtDirectNode' => 
    array (
      't3lib_tree_extdirect_node' => 't3lib_tree_extdirect_node',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\CollectionProcessorInterface' => 
    array (
      't3lib_tree_pagetree_interfaces_collectionprocessor' => 't3lib_tree_pagetree_interfaces_collectionprocessor',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\Commands' => 
    array (
      't3lib_tree_pagetree_commands' => 't3lib_tree_pagetree_commands',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\DataProvider' => 
    array (
      't3lib_tree_pagetree_dataprovider' => 't3lib_tree_pagetree_dataprovider',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\ExtdirectTreeCommands' => 
    array (
      't3lib_tree_pagetree_extdirect_commands' => 't3lib_tree_pagetree_extdirect_commands',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\ExtdirectTreeDataProvider' => 
    array (
      't3lib_tree_pagetree_extdirect_tree' => 't3lib_tree_pagetree_extdirect_tree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\Indicator' => 
    array (
      't3lib_tree_pagetree_indicator' => 't3lib_tree_pagetree_indicator',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\IndicatorProviderInterface' => 
    array (
      't3lib_tree_pagetree_interfaces_indicatorprovider' => 't3lib_tree_pagetree_interfaces_indicatorprovider',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\PagetreeNode' => 
    array (
      't3lib_tree_pagetree_node' => 't3lib_tree_pagetree_node',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Pagetree\\PagetreeNodeCollection' => 
    array (
      't3lib_tree_pagetree_nodecollection' => 't3lib_tree_pagetree_nodecollection',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Renderer\\AbstractTreeRenderer' => 
    array (
      't3lib_tree_renderer_abstract' => 't3lib_tree_renderer_abstract',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Renderer\\ExtJsJsonTreeRenderer' => 
    array (
      't3lib_tree_renderer_extjsjson' => 't3lib_tree_renderer_extjsjson',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\Renderer\\UnorderedListTreeRenderer' => 
    array (
      't3lib_tree_renderer_unorderedlist' => 't3lib_tree_renderer_unorderedlist',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\SortedTreeNodeCollection' => 
    array (
      't3lib_tree_sortednodecollection' => 't3lib_tree_sortednodecollection',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\TreeNode' => 
    array (
      't3lib_tree_node' => 't3lib_tree_node',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\TreeNodeCollection' => 
    array (
      't3lib_tree_nodecollection' => 't3lib_tree_nodecollection',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\TreeRepresentationNode' => 
    array (
      't3lib_tree_representationnode' => 't3lib_tree_representationnode',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\AbstractTreeView' => 
    array (
      't3lib_treeview' => 't3lib_treeview',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\BrowseTreeView' => 
    array (
      't3lib_browsetree' => 't3lib_browsetree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\FolderTreeView' => 
    array (
      't3lib_foldertree' => 't3lib_foldertree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\PagePositionMap' => 
    array (
      't3lib_positionmap' => 't3lib_positionmap',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\PageTreeView' => 
    array (
      't3lib_pagetree' => 't3lib_pagetree',
    ),
    'TYPO3\\CMS\\Backend\\User\\ExtDirect\\BackendUserSettingsDataProvider' => 
    array (
      'extdirect_dataprovider_backendusersettings' => 'extdirect_dataprovider_backendusersettings',
    ),
    'TYPO3\\CMS\\Backend\\Utility\\BackendUtility' => 
    array (
      't3lib_befunc' => 't3lib_befunc',
    ),
    'TYPO3\\CMS\\Backend\\Utility\\IconUtility' => 
    array (
      't3lib_iconworks' => 't3lib_iconworks',
    ),
    'TYPO3\\CMS\\Backend\\View\\BackendLayoutView' => 
    array (
      'tx_cms_backendlayout' => 'tx_cms_backendlayout',
    ),
    'TYPO3\\CMS\\Backend\\View\\ModuleMenuView' => 
    array (
      'modulemenu' => 'modulemenu',
    ),
    'TYPO3\\CMS\\Backend\\View\\PageLayoutView' => 
    array (
      'tx_cms_layout' => 'tx_cms_layout',
    ),
    'TYPO3\\CMS\\Backend\\View\\PageLayoutViewDrawItemHookInterface' => 
    array (
      'tx_cms_layout_tt_content_drawitemhook' => 'tx_cms_layout_tt_content_drawitemhook',
    ),
    'TYPO3\\CMS\\Backend\\View\\PageTreeView' => 
    array (
      'webpagetree' => 'webpagetree',
    ),
    'TYPO3\\CMS\\Backend\\View\\ThumbnailView' => 
    array (
      'sc_t3lib_thumbs' => 'sc_t3lib_thumbs',
    ),
    'TYPO3\\CMS\\Backend\\View\\LogoView' => 
    array (
      'typo3logo' => 'typo3logo',
    ),
    'TYPO3\\CMS\\Backend\\Wizard\\NewContentElementWizardHookInterface' => 
    array (
      'cms_newcontentelementwizardshook' => 'cms_newcontentelementwizardshook',
    ),
    'TYPO3\\CMS\\Core\\ExtDirect\\ExtDirectRouter' => 
    array (
      't3lib_extjs_extdirectrouter' => 't3lib_extjs_extdirectrouter',
    ),
    'TYPO3\\CMS\\Core\\ExtDirect\\ExtDirectApi' => 
    array (
      't3lib_extjs_extdirectapi' => 't3lib_extjs_extdirectapi',
    ),
    'TYPO3\\CMS\\Core\\ExtDirect\\ExtDirectDebug' => 
    array (
      't3lib_extjs_extdirectdebug' => 't3lib_extjs_extdirectdebug',
    ),
    'TYPO3\\CMS\\ContextHelp\\ExtDirect\\ContextHelpDataProvider' => 
    array (
      'extdirect_dataprovider_contexthelp' => 'extdirect_dataprovider_contexthelp',
    ),
    'TYPO3\\CMS\\Core\\Authentication\\AbstractUserAuthentication' => 
    array (
      't3lib_userauth' => 't3lib_userauth',
    ),
    'TYPO3\\CMS\\Core\\Authentication\\BackendUserAuthentication' => 
    array (
      't3lib_beuserauth' => 't3lib_beuserauth',
    ),
    'TYPO3\\CMS\\Core\\Core\\ClassLoader' => 
    array (
      't3lib_autoloader' => 't3lib_autoloader',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\AbstractBackend' => 
    array (
      't3lib_cache_backend_abstractbackend' => 't3lib_cache_backend_abstractbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\ApcBackend' => 
    array (
      't3lib_cache_backend_apcbackend' => 't3lib_cache_backend_apcbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\BackendInterface' => 
    array (
      't3lib_cache_backend_backend' => 't3lib_cache_backend_backend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\FileBackend' => 
    array (
      't3lib_cache_backend_filebackend' => 't3lib_cache_backend_filebackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\MemcachedBackend' => 
    array (
      't3lib_cache_backend_memcachedbackend' => 't3lib_cache_backend_memcachedbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\NullBackend' => 
    array (
      't3lib_cache_backend_nullbackend' => 't3lib_cache_backend_nullbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\PdoBackend' => 
    array (
      't3lib_cache_backend_pdobackend' => 't3lib_cache_backend_pdobackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\PhpCapableBackendInterface' => 
    array (
      't3lib_cache_backend_phpcapablebackend' => 't3lib_cache_backend_phpcapablebackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\RedisBackend' => 
    array (
      't3lib_cache_backend_redisbackend' => 't3lib_cache_backend_redisbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\TransientMemoryBackend' => 
    array (
      't3lib_cache_backend_transientmemorybackend' => 't3lib_cache_backend_transientmemorybackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend' => 
    array (
      't3lib_cache_backend_dbbackend' => 't3lib_cache_backend_dbbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Cache' => 
    array (
      't3lib_cache' => 't3lib_cache',
    ),
    'TYPO3\\CMS\\Core\\Cache\\CacheFactory' => 
    array (
      't3lib_cache_factory' => 't3lib_cache_factory',
    ),
    'TYPO3\\CMS\\Core\\Cache\\CacheManager' => 
    array (
      't3lib_cache_manager' => 't3lib_cache_manager',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception' => 
    array (
      't3lib_cache_exception' => 't3lib_cache_exception',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception\\ClassAlreadyLoadedException' => 
    array (
      't3lib_cache_exception_classalreadyloaded' => 't3lib_cache_exception_classalreadyloaded',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception\\DuplicateIdentifierException' => 
    array (
      't3lib_cache_exception_duplicateidentifier' => 't3lib_cache_exception_duplicateidentifier',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception\\InvalidBackendException' => 
    array (
      't3lib_cache_exception_invalidbackend' => 't3lib_cache_exception_invalidbackend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception\\InvalidCacheException' => 
    array (
      't3lib_cache_exception_invalidcache' => 't3lib_cache_exception_invalidcache',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception\\InvalidDataException' => 
    array (
      't3lib_cache_exception_invaliddata' => 't3lib_cache_exception_invaliddata',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Exception\\NoSuchCacheException' => 
    array (
      't3lib_cache_exception_nosuchcache' => 't3lib_cache_exception_nosuchcache',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Frontend\\AbstractFrontend' => 
    array (
      't3lib_cache_frontend_abstractfrontend' => 't3lib_cache_frontend_abstractfrontend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Frontend\\FrontendInterface' => 
    array (
      't3lib_cache_frontend_frontend' => 't3lib_cache_frontend_frontend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Frontend\\PhpFrontend' => 
    array (
      't3lib_cache_frontend_phpfrontend' => 't3lib_cache_frontend_phpfrontend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Frontend\\StringFrontend' => 
    array (
      't3lib_cache_frontend_stringfrontend' => 't3lib_cache_frontend_stringfrontend',
    ),
    'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend' => 
    array (
      't3lib_cache_frontend_variablefrontend' => 't3lib_cache_frontend_variablefrontend',
    ),
    'TYPO3\\CMS\\Core\\Charset\\CharsetConverter' => 
    array (
      't3lib_cs' => 't3lib_cs',
    ),
    'TYPO3\\CMS\\Core\\Collection\\AbstractRecordCollection' => 
    array (
      't3lib_collection_abstractrecordcollection' => 't3lib_collection_abstractrecordcollection',
    ),
    'TYPO3\\CMS\\Core\\Collection\\CollectionInterface' => 
    array (
      't3lib_collection_collection' => 't3lib_collection_collection',
    ),
    'TYPO3\\CMS\\Core\\Collection\\EditableCollectionInterface' => 
    array (
      't3lib_collection_editable' => 't3lib_collection_editable',
    ),
    'TYPO3\\CMS\\Core\\Collection\\NameableCollectionInterface' => 
    array (
      't3lib_collection_nameable' => 't3lib_collection_nameable',
    ),
    'TYPO3\\CMS\\Core\\Collection\\PersistableCollectionInterface' => 
    array (
      't3lib_collection_persistable' => 't3lib_collection_persistable',
    ),
    'TYPO3\\CMS\\Core\\Collection\\RecordCollectionInterface' => 
    array (
      't3lib_collection_recordcollection' => 't3lib_collection_recordcollection',
    ),
    'TYPO3\\CMS\\Core\\Collection\\RecordCollectionRepository' => 
    array (
      't3lib_collection_recordcollectionrepository' => 't3lib_collection_recordcollectionrepository',
    ),
    'TYPO3\\CMS\\Core\\Collection\\SortableCollectionInterface' => 
    array (
      't3lib_collection_sortable' => 't3lib_collection_sortable',
    ),
    'TYPO3\\CMS\\Core\\Collection\\StaticRecordCollection' => 
    array (
      't3lib_collection_staticrecordcollection' => 't3lib_collection_staticrecordcollection',
    ),
    'TYPO3\\CMS\\Core\\Configuration\\FlexForm\\FlexFormTools' => 
    array (
      't3lib_flexformtools' => 't3lib_flexformtools',
    ),
    'TYPO3\\CMS\\Core\\Configuration\\TypoScript\\ConditionMatching\\AbstractConditionMatcher' => 
    array (
      't3lib_matchcondition_abstract' => 't3lib_matchcondition_abstract',
    ),
    'TYPO3\\CMS\\Core\\Database\\DatabaseConnection' => 
    array (
      't3lib_db' => 't3lib_db',
    ),
    'TYPO3\\CMS\\Core\\Database\\PostProcessQueryHookInterface' => 
    array (
      't3lib_db_postprocessqueryhook' => 't3lib_db_postprocessqueryhook',
    ),
    'TYPO3\\CMS\\Core\\Database\\PreProcessQueryHookInterface' => 
    array (
      't3lib_db_preprocessqueryhook' => 't3lib_db_preprocessqueryhook',
    ),
    'TYPO3\\CMS\\Core\\Database\\PdoHelper' => 
    array (
      't3lib_pdohelper' => 't3lib_pdohelper',
    ),
    'TYPO3\\CMS\\Core\\Database\\PreparedStatement' => 
    array (
      't3lib_db_preparedstatement' => 't3lib_db_preparedstatement',
    ),
    'TYPO3\\CMS\\Core\\Database\\QueryGenerator' => 
    array (
      't3lib_querygenerator' => 't3lib_querygenerator',
    ),
    'TYPO3\\CMS\\Core\\Database\\QueryView' => 
    array (
      't3lib_fullsearch' => 't3lib_fullsearch',
    ),
    'TYPO3\\CMS\\Core\\Database\\ReferenceIndex' => 
    array (
      't3lib_refindex' => 't3lib_refindex',
    ),
    'TYPO3\\CMS\\Core\\Database\\RelationHandler' => 
    array (
      't3lib_loaddbgroup' => 't3lib_loaddbgroup',
    ),
    'TYPO3\\CMS\\Core\\Database\\SoftReferenceIndex' => 
    array (
      't3lib_softrefproc' => 't3lib_softrefproc',
    ),
    'TYPO3\\CMS\\Core\\Database\\SqlParser' => 
    array (
      't3lib_sqlparser' => 't3lib_sqlparser',
    ),
    'TYPO3\\CMS\\Core\\Database\\TableConfigurationPostProcessingHookInterface' => 
    array (
      't3lib_exttables_postprocessinghook' => 't3lib_exttables_postprocessinghook',
    ),
    'TYPO3\\CMS\\Core\\DataHandling\\DataHandler' => 
    array (
      't3lib_tcemain' => 't3lib_tcemain',
    ),
    'TYPO3\\CMS\\Core\\DataHandling\\DataHandlerCheckModifyAccessListHookInterface' => 
    array (
      't3lib_tcemain_checkmodifyaccesslisthook' => 't3lib_tcemain_checkmodifyaccesslisthook',
    ),
    'TYPO3\\CMS\\Core\\DataHandling\\DataHandlerProcessUploadHookInterface' => 
    array (
      't3lib_tcemain_processuploadhook' => 't3lib_tcemain_processuploadhook',
    ),
    'TYPO3\\CMS\\Core\\ElementBrowser\\ElementBrowserHookInterface' => 
    array (
      't3lib_browselinkshook' => 't3lib_browselinkshook',
    ),
    'TYPO3\\CMS\\Core\\Encoder\\JavaScriptEncoder' => 
    array (
      't3lib_codec_javascriptencoder' => 't3lib_codec_javascriptencoder',
    ),
    'TYPO3\\CMS\\Core\\Error\\AbstractExceptionHandler' => 
    array (
      't3lib_error_abstractexceptionhandler' => 't3lib_error_abstractexceptionhandler',
    ),
    'TYPO3\\CMS\\Core\\Error\\DebugExceptionHandler' => 
    array (
      't3lib_error_debugexceptionhandler' => 't3lib_error_debugexceptionhandler',
    ),
    'TYPO3\\CMS\\Core\\Error\\ErrorHandler' => 
    array (
      't3lib_error_errorhandler' => 't3lib_error_errorhandler',
    ),
    'TYPO3\\CMS\\Core\\Error\\ErrorHandlerInterface' => 
    array (
      't3lib_error_errorhandlerinterface' => 't3lib_error_errorhandlerinterface',
    ),
    'TYPO3\\CMS\\Core\\Error\\Exception' => 
    array (
      't3lib_error_exception' => 't3lib_error_exception',
    ),
    'TYPO3\\CMS\\Core\\Error\\ExceptionHandlerInterface' => 
    array (
      't3lib_error_exceptionhandlerinterface' => 't3lib_error_exceptionhandlerinterface',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\AbstractClientErrorException' => 
    array (
      't3lib_error_http_abstractclienterrorexception' => 't3lib_error_http_abstractclienterrorexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\AbstractServerErrorException' => 
    array (
      't3lib_error_http_abstractservererrorexception' => 't3lib_error_http_abstractservererrorexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\BadRequestException' => 
    array (
      't3lib_error_http_badrequestexception' => 't3lib_error_http_badrequestexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\ForbiddenException' => 
    array (
      't3lib_error_http_forbiddenexception' => 't3lib_error_http_forbiddenexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\PageNotFoundException' => 
    array (
      't3lib_error_http_pagenotfoundexception' => 't3lib_error_http_pagenotfoundexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\ServiceUnavailableException' => 
    array (
      't3lib_error_http_serviceunavailableexception' => 't3lib_error_http_serviceunavailableexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\StatusException' => 
    array (
      't3lib_error_http_statusexception' => 't3lib_error_http_statusexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\Http\\UnauthorizedException' => 
    array (
      't3lib_error_http_unauthorizedexception' => 't3lib_error_http_unauthorizedexception',
    ),
    'TYPO3\\CMS\\Core\\Error\\ProductionExceptionHandler' => 
    array (
      't3lib_error_productionexceptionhandler' => 't3lib_error_productionexceptionhandler',
    ),
    'TYPO3\\CMS\\Core\\Exception' => 
    array (
      't3lib_exception' => 't3lib_exception',
    ),
    'TYPO3\\CMS\\Core\\FormProtection\\AbstractFormProtection' => 
    array (
      't3lib_formprotection_abstract' => 't3lib_formprotection_abstract',
    ),
    'TYPO3\\CMS\\Core\\FormProtection\\BackendFormProtection' => 
    array (
      't3lib_formprotection_backendformprotection' => 't3lib_formprotection_backendformprotection',
    ),
    'TYPO3\\CMS\\Core\\FormProtection\\DisabledFormProtection' => 
    array (
      't3lib_formprotection_disabledformprotection' => 't3lib_formprotection_disabledformprotection',
    ),
    'TYPO3\\CMS\\Core\\FormProtection\\Exception' => 
    array (
      't3lib_formprotection_invalidtokenexception' => 't3lib_formprotection_invalidtokenexception',
    ),
    'TYPO3\\CMS\\Core\\FormProtection\\FormProtectionFactory' => 
    array (
      't3lib_formprotection_factory' => 't3lib_formprotection_factory',
    ),
    'TYPO3\\CMS\\Core\\FormProtection\\InstallToolFormProtection' => 
    array (
      't3lib_formprotection_installtoolformprotection' => 't3lib_formprotection_installtoolformprotection',
    ),
    'TYPO3\\CMS\\Core\\FrontendEditing\\FrontendEditingController' => 
    array (
      't3lib_frontendedit' => 't3lib_frontendedit',
    ),
    'TYPO3\\CMS\\Core\\Html\\HtmlParser' => 
    array (
      't3lib_parsehtml' => 't3lib_parsehtml',
    ),
    'TYPO3\\CMS\\Core\\Html\\RteHtmlParser' => 
    array (
      't3lib_parsehtml_proc' => 't3lib_parsehtml_proc',
    ),
    'TYPO3\\CMS\\Core\\Http\\AjaxRequestHandler' => 
    array (
      'typo3ajax' => 'typo3ajax',
    ),
    'TYPO3\\CMS\\Core\\Http\\HttpRequest' => 
    array (
      't3lib_http_request' => 't3lib_http_request',
    ),
    'TYPO3\\CMS\\Core\\Http\\Observer\\Download' => 
    array (
      't3lib_http_observer_download' => 't3lib_http_observer_download',
    ),
    'TYPO3\\CMS\\Core\\Imaging\\GraphicalFunctions' => 
    array (
      't3lib_stdgraphic' => 't3lib_stdgraphic',
    ),
    'TYPO3\\CMS\\Core\\Integrity\\DatabaseIntegrityCheck' => 
    array (
      't3lib_admin' => 't3lib_admin',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Exception\\FileNotFoundException' => 
    array (
      't3lib_l10n_exception_filenotfound' => 't3lib_l10n_exception_filenotfound',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Exception\\InvalidParserException' => 
    array (
      't3lib_l10n_exception_invalidparser' => 't3lib_l10n_exception_invalidparser',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Exception\\InvalidXmlFileException' => 
    array (
      't3lib_l10n_exception_invalidxmlfile' => 't3lib_l10n_exception_invalidxmlfile',
    ),
    'TYPO3\\CMS\\Core\\Localization\\LanguageStore' => 
    array (
      't3lib_l10n_store' => 't3lib_l10n_store',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Locales' => 
    array (
      't3lib_l10n_locales' => 't3lib_l10n_locales',
    ),
    'TYPO3\\CMS\\Core\\Localization\\LocalizationFactory' => 
    array (
      't3lib_l10n_factory' => 't3lib_l10n_factory',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Parser\\AbstractXmlParser' => 
    array (
      't3lib_l10n_parser_abstractxml' => 't3lib_l10n_parser_abstractxml',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Parser\\LocalizationParserInterface' => 
    array (
      't3lib_l10n_parser' => 't3lib_l10n_parser',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Parser\\LocallangArrayParser' => 
    array (
      't3lib_l10n_parser_llphp' => 't3lib_l10n_parser_llphp',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Parser\\LocallangXmlParser' => 
    array (
      't3lib_l10n_parser_llxml' => 't3lib_l10n_parser_llxml',
    ),
    'TYPO3\\CMS\\Core\\Localization\\Parser\\XliffParser' => 
    array (
      't3lib_l10n_parser_xliff' => 't3lib_l10n_parser_xliff',
    ),
    'TYPO3\\CMS\\Core\\Locking\\Locker' => 
    array (
      't3lib_lock' => 't3lib_lock',
    ),
    'TYPO3\\CMS\\Core\\Mail\\Mailer' => 
    array (
      't3lib_mail_mailer' => 't3lib_mail_mailer',
    ),
    'TYPO3\\CMS\\Core\\Mail\\MailerAdapterInterface' => 
    array (
      't3lib_mail_maileradapter' => 't3lib_mail_maileradapter',
    ),
    'TYPO3\\CMS\\Core\\Mail\\MailMessage' => 
    array (
      't3lib_mail_message' => 't3lib_mail_message',
    ),
    'TYPO3\\CMS\\Core\\Mail\\MboxTransport' => 
    array (
      't3lib_mail_mboxtransport' => 't3lib_mail_mboxtransport',
    ),
    'TYPO3\\CMS\\Core\\Mail\\Rfc822AddressesParser' => 
    array (
      't3lib_mail_rfc822addressesparser' => 't3lib_mail_rfc822addressesparser',
    ),
    'TYPO3\\CMS\\Core\\Messaging\\AbstractMessage' => 
    array (
      't3lib_message_abstractmessage' => 't3lib_message_abstractmessage',
    ),
    'TYPO3\\CMS\\Core\\Messaging\\AbstractStandaloneMessage' => 
    array (
      't3lib_message_abstractstandalonemessage' => 't3lib_message_abstractstandalonemessage',
    ),
    'TYPO3\\CMS\\Core\\Messaging\\ErrorpageMessage' => 
    array (
      't3lib_message_errorpagemessage' => 't3lib_message_errorpagemessage',
    ),
    'TYPO3\\CMS\\Core\\Messaging\\FlashMessage' => 
    array (
      't3lib_flashmessage' => 't3lib_flashmessage',
    ),
    'TYPO3\\CMS\\Core\\Messaging\\FlashMessageQueue' => 
    array (
      't3lib_flashmessagequeue' => 't3lib_flashmessagequeue',
    ),
    'TYPO3\\CMS\\Core\\Page\\PageRenderer' => 
    array (
      't3lib_pagerenderer' => 't3lib_pagerenderer',
    ),
    'TYPO3\\CMS\\Core\\Registry' => 
    array (
      't3lib_registry' => 't3lib_registry',
    ),
    'TYPO3\\CMS\\Core\\Resource\\ResourceCompressor' => 
    array (
      't3lib_compressor' => 't3lib_compressor',
    ),
    'TYPO3\\CMS\\Core\\Service\\AbstractService' => 
    array (
      't3lib_svbase' => 't3lib_svbase',
    ),
    'TYPO3\\CMS\\Core\\SingletonInterface' => 
    array (
      't3lib_singleton' => 't3lib_singleton',
    ),
    'TYPO3\\CMS\\Core\\TimeTracker\\NullTimeTracker' => 
    array (
      't3lib_timetracknull' => 't3lib_timetracknull',
    ),
    'TYPO3\\CMS\\Core\\TimeTracker\\TimeTracker' => 
    array (
      't3lib_timetrack' => 't3lib_timetrack',
    ),
    'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\AbstractTableConfigurationTreeDataProvider' => 
    array (
      't3lib_tree_tca_abstracttcatreedataprovider' => 't3lib_tree_tca_abstracttcatreedataprovider',
    ),
    'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\DatabaseTreeDataProvider' => 
    array (
      't3lib_tree_tca_databasetreedataprovider' => 't3lib_tree_tca_databasetreedataprovider',
    ),
    'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\DatabaseTreeNode' => 
    array (
      't3lib_tree_tca_databasenode' => 't3lib_tree_tca_databasenode',
    ),
    'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\ExtJsArrayTreeRenderer' => 
    array (
      't3lib_tree_tca_extjsarrayrenderer' => 't3lib_tree_tca_extjsarrayrenderer',
    ),
    'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\TableConfigurationTree' => 
    array (
      't3lib_tree_tca_tcatree' => 't3lib_tree_tca_tcatree',
    ),
    'TYPO3\\CMS\\Core\\Tree\\TableConfiguration\\TreeDataProviderFactory' => 
    array (
      't3lib_tree_tca_dataproviderfactory' => 't3lib_tree_tca_dataproviderfactory',
    ),
    'TYPO3\\CMS\\Core\\TypoScript\\ConfigurationForm' => 
    array (
      't3lib_tsstyleconfig' => 't3lib_tsstyleconfig',
    ),
    'TYPO3\\CMS\\Core\\TypoScript\\ExtendedTemplateService' => 
    array (
      't3lib_tsparser_ext' => 't3lib_tsparser_ext',
    ),
    'TYPO3\\CMS\\Core\\TypoScript\\TemplateService' => 
    array (
      't3lib_tstemplate' => 't3lib_tstemplate',
    ),
    'TYPO3\\CMS\\Core\\Utility\\ArrayUtility' => 
    array (
      't3lib_utility_array' => 't3lib_utility_array',
    ),
    'TYPO3\\CMS\\Core\\Utility\\ClientUtility' => 
    array (
      't3lib_utility_client' => 't3lib_utility_client',
    ),
    'TYPO3\\CMS\\Core\\Utility\\CommandUtility' => 
    array (
      't3lib_exec' => 't3lib_exec',
      't3lib_utility_command' => 't3lib_utility_command',
    ),
    'TYPO3\\CMS\\Core\\Utility\\DebugUtility' => 
    array (
      't3lib_utility_debug' => 't3lib_utility_debug',
    ),
    'TYPO3\\CMS\\Core\\Utility\\DiffUtility' => 
    array (
      't3lib_diff' => 't3lib_diff',
    ),
    'TYPO3\\CMS\\Core\\Utility\\File\\BasicFileUtility' => 
    array (
      't3lib_basicfilefunctions' => 't3lib_basicfilefunctions',
    ),
    'TYPO3\\CMS\\Core\\Utility\\File\\ExtendedFileUtility' => 
    array (
      't3lib_extfilefunctions' => 't3lib_extfilefunctions',
    ),
    'TYPO3\\CMS\\Core\\Utility\\File\\ExtendedFileUtilityProcessDataHookInterface' => 
    array (
      't3lib_extfilefunctions_processdatahook' => 't3lib_extfilefunctions_processdatahook',
    ),
    'TYPO3\\CMS\\Core\\Utility\\GeneralUtility' => 
    array (
      't3lib_div' => 't3lib_div',
    ),
    'TYPO3\\CMS\\Core\\Utility\\HttpUtility' => 
    array (
      't3lib_utility_http' => 't3lib_utility_http',
    ),
    'TYPO3\\CMS\\Core\\Utility\\MailUtility' => 
    array (
      't3lib_utility_mail' => 't3lib_utility_mail',
    ),
    'TYPO3\\CMS\\Core\\Utility\\MathUtility' => 
    array (
      't3lib_utility_math' => 't3lib_utility_math',
    ),
    'TYPO3\\CMS\\Core\\Utility\\MonitorUtility' => 
    array (
      't3lib_utility_monitor' => 't3lib_utility_monitor',
    ),
    'TYPO3\\CMS\\Core\\Utility\\PathUtility' => 
    array (
      't3lib_utility_path' => 't3lib_utility_path',
    ),
    'TYPO3\\CMS\\Core\\Utility\\PhpOptionsUtility' => 
    array (
      't3lib_utility_phpoptions' => 't3lib_utility_phpoptions',
    ),
    'TYPO3\\CMS\\Core\\Utility\\VersionNumberUtility' => 
    array (
      't3lib_utility_versionnumber' => 't3lib_utility_versionnumber',
    ),
    'TYPO3\\CMS\\Cshmanual\\Controller\\HelpModuleController' => 
    array (
      'sc_view_help' => 'sc_view_help',
    ),
    'TYPO3\\CMS\\CssStyledContent\\Controller\\CssStyledContentController' => 
    array (
      'tx_cssstyledcontent_pi1' => 'tx_cssstyledcontent_pi1',
    ),
    'TYPO3\\CMS\\Dbal\\Controller\\ModuleController' => 
    array (
      'tx_dbal_module1' => 'tx_dbal_module1',
    ),
    'TYPO3\\CMS\\Dbal\\QueryCache' => 
    array (
      'tx_dbal_querycache' => 'tx_dbal_querycache',
    ),
    'TYPO3\\CMS\\Dbal\\Database\\DatabaseConnection' => 
    array (
      'ux_t3lib_db' => 'ux_t3lib_db',
    ),
    'TYPO3\\CMS\\Dbal\\Database\\SqlParser' => 
    array (
      'ux_t3lib_sqlparser' => 'ux_t3lib_sqlparser',
    ),
    'TYPO3\\CMS\\Dbal\\RecordList\\DatabaseRecordList' => 
    array (
      'ux_localrecordlist' => 'ux_localrecordlist',
    ),
    'TYPO3\\CMS\\Extbase\\Command\\HelpCommandController' => 
    array (
      'tx_extbase_command_helpcommandcontroller' => 'tx_extbase_command_helpcommandcontroller',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\AbstractConfigurationManager' => 
    array (
      'tx_extbase_configuration_abstractconfigurationmanager' => 'tx_extbase_configuration_abstractconfigurationmanager',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\BackendConfigurationManager' => 
    array (
      'tx_extbase_configuration_backendconfigurationmanager' => 'tx_extbase_configuration_backendconfigurationmanager',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager' => 
    array (
      'tx_extbase_configuration_configurationmanager' => 'tx_extbase_configuration_configurationmanager',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface' => 
    array (
      'tx_extbase_configuration_configurationmanagerinterface' => 'tx_extbase_configuration_configurationmanagerinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\Exception' => 
    array (
      'tx_extbase_configuration_exception' => 'tx_extbase_configuration_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\ContainerIsLockedException' => 
    array (
      'tx_extbase_configuration_exception_containerislocked' => 'tx_extbase_configuration_exception_containerislocked',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\InvalidConfigurationTypeException' => 
    array (
      'tx_extbase_configuration_exception_invalidconfigurationtype' => 'tx_extbase_configuration_exception_invalidconfigurationtype',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\NoSuchFileException' => 
    array (
      'tx_extbase_configuration_exception_nosuchfile' => 'tx_extbase_configuration_exception_nosuchfile',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\NoSuchOptionException' => 
    array (
      'tx_extbase_configuration_exception_nosuchoption' => 'tx_extbase_configuration_exception_nosuchoption',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\Exception\\ParseErrorException' => 
    array (
      'tx_extbase_configuration_exception_parseerror' => 'tx_extbase_configuration_exception_parseerror',
    ),
    'TYPO3\\CMS\\Extbase\\Configuration\\FrontendConfigurationManager' => 
    array (
      'tx_extbase_configuration_frontendconfigurationmanager' => 'tx_extbase_configuration_frontendconfigurationmanager',
    ),
    'TYPO3\\CMS\\Extbase\\Core\\Bootstrap' => 
    array (
      'tx_extbase_core_bootstrap' => 'tx_extbase_core_bootstrap',
    ),
    'TYPO3\\CMS\\Extbase\\Core\\BootstrapInterface' => 
    array (
      'tx_extbase_core_bootstrapinterface' => 'tx_extbase_core_bootstrapinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\AbstractFileCollection' => 
    array (
      'tx_extbase_domain_model_abstractfilecollection' => 'tx_extbase_domain_model_abstractfilecollection',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\AbstractFileFolder' => 
    array (
      'tx_extbase_domain_model_abstractfilefolder' => 'tx_extbase_domain_model_abstractfilefolder',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\BackendUser' => 
    array (
      'tx_extbase_domain_model_backenduser' => 'tx_extbase_domain_model_backenduser',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\BackendUserGroup' => 
    array (
      'tx_extbase_domain_model_backendusergroup' => 'tx_extbase_domain_model_backendusergroup',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\Category' => 
    array (
      'tx_extbase_domain_model_category' => 'tx_extbase_domain_model_category',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\File' => 
    array (
      'tx_extbase_domain_model_file' => 'tx_extbase_domain_model_file',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\FileMount' => 
    array (
      'tx_extbase_domain_model_filemount' => 'tx_extbase_domain_model_filemount',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\FileReference' => 
    array (
      'tx_extbase_domain_model_filereference' => 'tx_extbase_domain_model_filereference',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\Folder' => 
    array (
      'tx_extbase_domain_model_folder' => 'tx_extbase_domain_model_folder',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\FolderBasedFileCollection' => 
    array (
      'tx_extbase_domain_model_folderbasedfilecollection' => 'tx_extbase_domain_model_folderbasedfilecollection',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\FrontendUser' => 
    array (
      'tx_extbase_domain_model_frontenduser' => 'tx_extbase_domain_model_frontenduser',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\FrontendUserGroup' => 
    array (
      'tx_extbase_domain_model_frontendusergroup' => 'tx_extbase_domain_model_frontendusergroup',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Model\\StaticFileCollection' => 
    array (
      'tx_extbase_domain_model_staticfilecollection' => 'tx_extbase_domain_model_staticfilecollection',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Repository\\BackendUserGroupRepository' => 
    array (
      'tx_extbase_domain_repository_backenduserrepository' => 'tx_extbase_domain_repository_backenduserrepository',
      'tx_extbase_domain_repository_backendusergrouprepository' => 'tx_extbase_domain_repository_backendusergrouprepository',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Repository\\CategoryRepository' => 
    array (
      'tx_extbase_domain_repository_categoryrepository' => 'tx_extbase_domain_repository_categoryrepository',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FileMountRepository' => 
    array (
      'tx_extbase_domain_repository_filemountrepository' => 'tx_extbase_domain_repository_filemountrepository',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserGroupRepository' => 
    array (
      'tx_extbase_domain_repository_frontendusergrouprepository' => 'tx_extbase_domain_repository_frontendusergrouprepository',
    ),
    'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository' => 
    array (
      'tx_extbase_domain_repository_frontenduserrepository' => 'tx_extbase_domain_repository_frontenduserrepository',
    ),
    'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractDomainObject' => 
    array (
      'tx_extbase_domainobject_abstractdomainobject' => 'tx_extbase_domainobject_abstractdomainobject',
    ),
    'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractEntity' => 
    array (
      'tx_extbase_domainobject_abstractentity' => 'tx_extbase_domainobject_abstractentity',
    ),
    'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractValueObject' => 
    array (
      'tx_extbase_domainobject_abstractvalueobject' => 'tx_extbase_domainobject_abstractvalueobject',
    ),
    'TYPO3\\CMS\\Extbase\\DomainObject\\DomainObjectInterface' => 
    array (
      'tx_extbase_domainobject_domainobjectinterface' => 'tx_extbase_domainobject_domainobjectinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Error\\Error' => 
    array (
      'tx_extbase_error_error' => 'tx_extbase_error_error',
    ),
    'TYPO3\\CMS\\Extbase\\Error\\Message' => 
    array (
      'tx_extbase_error_message' => 'tx_extbase_error_message',
    ),
    'TYPO3\\CMS\\Extbase\\Error\\Notice' => 
    array (
      'tx_extbase_error_notice' => 'tx_extbase_error_notice',
    ),
    'TYPO3\\CMS\\Extbase\\Error\\Result' => 
    array (
      'tx_extbase_error_result' => 'tx_extbase_error_result',
    ),
    'TYPO3\\CMS\\Extbase\\Error\\Warning' => 
    array (
      'tx_extbase_error_warning' => 'tx_extbase_error_warning',
    ),
    'TYPO3\\CMS\\Extbase\\Exception' => 
    array (
      'tx_extbase_exception' => 'tx_extbase_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Command' => 
    array (
      'tx_extbase_mvc_cli_command' => 'tx_extbase_mvc_cli_command',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\CommandArgumentDefinition' => 
    array (
      'tx_extbase_mvc_cli_commandargumentdefinition' => 'tx_extbase_mvc_cli_commandargumentdefinition',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\CommandManager' => 
    array (
      'tx_extbase_mvc_cli_commandmanager' => 'tx_extbase_mvc_cli_commandmanager',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Request' => 
    array (
      'tx_extbase_mvc_cli_request' => 'tx_extbase_mvc_cli_request',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\RequestBuilder' => 
    array (
      'tx_extbase_mvc_cli_requestbuilder' => 'tx_extbase_mvc_cli_requestbuilder',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\RequestHandler' => 
    array (
      'tx_extbase_mvc_cli_requesthandler' => 'tx_extbase_mvc_cli_requesthandler',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Response' => 
    array (
      'tx_extbase_mvc_cli_response' => 'tx_extbase_mvc_cli_response',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\AbstractController' => 
    array (
      'tx_extbase_mvc_controller_abstractcontroller' => 'tx_extbase_mvc_controller_abstractcontroller',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController' => 
    array (
      'tx_extbase_mvc_controller_actioncontroller' => 'tx_extbase_mvc_controller_actioncontroller',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument' => 
    array (
      'tx_extbase_mvc_controller_argument' => 'tx_extbase_mvc_controller_argument',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments' => 
    array (
      'tx_extbase_mvc_controller_arguments' => 'tx_extbase_mvc_controller_arguments',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\CommandController' => 
    array (
      'tx_extbase_mvc_controller_commandcontroller' => 'tx_extbase_mvc_controller_commandcontroller',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\CommandControllerInterface' => 
    array (
      'tx_extbase_mvc_controller_commandcontrollerinterface' => 'tx_extbase_mvc_controller_commandcontrollerinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerContext' => 
    array (
      'tx_extbase_mvc_controller_controllercontext' => 'tx_extbase_mvc_controller_controllercontext',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerInterface' => 
    array (
      'tx_extbase_mvc_controller_controllerinterface' => 'tx_extbase_mvc_controller_controllerinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Exception\\RequiredArgumentMissingException' => 
    array (
      'tx_extbase_mvc_controller_exception_requiredargumentmissingexception' => 'tx_extbase_mvc_controller_exception_requiredargumentmissingexception',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Controller\\MvcPropertyMappingConfiguration' => 
    array (
      'tx_extbase_mvc_controller_mvcpropertymappingconfiguration' => 'tx_extbase_mvc_controller_mvcpropertymappingconfiguration',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Dispatcher' => 
    array (
      'tx_extbase_mvc_dispatcher' => 'tx_extbase_mvc_dispatcher',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception' => 
    array (
      'tx_extbase_mvc_exception' => 'tx_extbase_mvc_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\AmbiguousCommandIdentifierException' => 
    array (
      'tx_extbase_mvc_exception_ambiguouscommandidentifier' => 'tx_extbase_mvc_exception_ambiguouscommandidentifier',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\CommandException' => 
    array (
      'tx_extbase_mvc_exception_command' => 'tx_extbase_mvc_exception_command',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InfiniteLoopException' => 
    array (
      'tx_extbase_mvc_exception_infiniteloop' => 'tx_extbase_mvc_exception_infiniteloop',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidActionNameException' => 
    array (
      'tx_extbase_mvc_exception_invalidactionname' => 'tx_extbase_mvc_exception_invalidactionname',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentMixingException' => 
    array (
      'tx_extbase_mvc_exception_invalidargumentmixing' => 'tx_extbase_mvc_exception_invalidargumentmixing',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentNameException' => 
    array (
      'tx_extbase_mvc_exception_invalidargumentname' => 'tx_extbase_mvc_exception_invalidargumentname',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentTypeException' => 
    array (
      'tx_extbase_mvc_exception_invalidargumenttype' => 'tx_extbase_mvc_exception_invalidargumenttype',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidArgumentValueException' => 
    array (
      'tx_extbase_mvc_exception_invalidargumentvalue' => 'tx_extbase_mvc_exception_invalidargumentvalue',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidCommandIdentifierException' => 
    array (
      'tx_extbase_mvc_exception_invalidcommandidentifier' => 'tx_extbase_mvc_exception_invalidcommandidentifier',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidControllerException' => 
    array (
      'tx_extbase_mvc_exception_invalidcontroller' => 'tx_extbase_mvc_exception_invalidcontroller',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidControllerNameException' => 
    array (
      'tx_extbase_mvc_exception_invalidcontrollername' => 'tx_extbase_mvc_exception_invalidcontrollername',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidExtensionNameException' => 
    array (
      'tx_extbase_mvc_exception_invalidextensionname' => 'tx_extbase_mvc_exception_invalidextensionname',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidMarkerException' => 
    array (
      'tx_extbase_mvc_exception_invalidmarker' => 'tx_extbase_mvc_exception_invalidmarker',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidOrNoRequestHashException' => 
    array (
      'tx_extbase_mvc_exception_invalidornorequesthash' => 'tx_extbase_mvc_exception_invalidornorequesthash',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidRequestMethodException' => 
    array (
      'tx_extbase_mvc_exception_invalidrequestmethod' => 'tx_extbase_mvc_exception_invalidrequestmethod',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidRequestTypeException' => 
    array (
      'tx_extbase_mvc_exception_invalidrequesttype' => 'tx_extbase_mvc_exception_invalidrequesttype',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidTemplateResourceException' => 
    array (
      'tx_extbase_mvc_exception_invalidtemplateresource' => 'tx_extbase_mvc_exception_invalidtemplateresource',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidUriPatternException' => 
    array (
      'tx_extbase_mvc_exception_invaliduripattern' => 'tx_extbase_mvc_exception_invaliduripattern',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\InvalidViewHelperException' => 
    array (
      'tx_extbase_mvc_exception_invalidviewhelper' => 'tx_extbase_mvc_exception_invalidviewhelper',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchActionException' => 
    array (
      'tx_extbase_mvc_exception_nosuchaction' => 'tx_extbase_mvc_exception_nosuchaction',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchArgumentException' => 
    array (
      'tx_extbase_mvc_exception_nosuchargument' => 'tx_extbase_mvc_exception_nosuchargument',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchCommandException' => 
    array (
      'tx_extbase_mvc_exception_nosuchcommand' => 'tx_extbase_mvc_exception_nosuchcommand',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\NoSuchControllerException' => 
    array (
      'tx_extbase_mvc_exception_nosuchcontroller' => 'tx_extbase_mvc_exception_nosuchcontroller',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\RequiredArgumentMissingException' => 
    array (
      'tx_extbase_mvc_exception_requiredargumentmissing' => 'tx_extbase_mvc_exception_requiredargumentmissing',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\StopActionException' => 
    array (
      'tx_extbase_mvc_exception_stopaction' => 'tx_extbase_mvc_exception_stopaction',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Exception\\UnsupportedRequestTypeException' => 
    array (
      'tx_extbase_mvc_exception_unsupportedrequesttype' => 'tx_extbase_mvc_exception_unsupportedrequesttype',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Request' => 
    array (
      'tx_extbase_mvc_request' => 'tx_extbase_mvc_request',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\RequestHandlerInterface' => 
    array (
      'tx_extbase_mvc_requesthandlerinterface' => 'tx_extbase_mvc_requesthandlerinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\RequestHandlerResolver' => 
    array (
      'tx_extbase_mvc_requesthandlerresolver' => 'tx_extbase_mvc_requesthandlerresolver',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\RequestInterface' => 
    array (
      'tx_extbase_mvc_requestinterface' => 'tx_extbase_mvc_requestinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Response' => 
    array (
      'tx_extbase_mvc_response' => 'tx_extbase_mvc_response',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\ResponseInterface' => 
    array (
      'tx_extbase_mvc_responseinterface' => 'tx_extbase_mvc_responseinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\View\\AbstractView' => 
    array (
      'tx_extbase_mvc_view_abstractview' => 'tx_extbase_mvc_view_abstractview',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\View\\EmptyView' => 
    array (
      'tx_extbase_mvc_view_emptyview' => 'tx_extbase_mvc_view_emptyview',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\View\\NotFoundView' => 
    array (
      'tx_extbase_mvc_view_notfoundview' => 'tx_extbase_mvc_view_notfoundview',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface' => 
    array (
      'tx_extbase_mvc_view_viewinterface' => 'tx_extbase_mvc_view_viewinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\AbstractRequestHandler' => 
    array (
      'tx_extbase_mvc_web_abstractrequesthandler' => 'tx_extbase_mvc_web_abstractrequesthandler',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\BackendRequestHandler' => 
    array (
      'tx_extbase_mvc_web_backendrequesthandler' => 'tx_extbase_mvc_web_backendrequesthandler',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\FrontendRequestHandler' => 
    array (
      'tx_extbase_mvc_web_frontendrequesthandler' => 'tx_extbase_mvc_web_frontendrequesthandler',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\Request' => 
    array (
      'tx_extbase_mvc_web_request' => 'tx_extbase_mvc_web_request',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\RequestBuilder' => 
    array (
      'tx_extbase_mvc_web_requestbuilder' => 'tx_extbase_mvc_web_requestbuilder',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\Response' => 
    array (
      'tx_extbase_mvc_web_response' => 'tx_extbase_mvc_web_response',
    ),
    'TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder' => 
    array (
      'tx_extbase_mvc_web_routing_uribuilder' => 'tx_extbase_mvc_web_routing_uribuilder',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\ClassInfo' => 
    array (
      'tx_extbase_object_container_classinfo' => 'tx_extbase_object_container_classinfo',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\ClassInfoCache' => 
    array (
      'tx_extbase_object_container_classinfocache' => 'tx_extbase_object_container_classinfocache',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\ClassInfoFactory' => 
    array (
      'tx_extbase_object_container_classinfofactory' => 'tx_extbase_object_container_classinfofactory',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\Container' => 
    array (
      'tx_extbase_object_container_container' => 'tx_extbase_object_container_container',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\Exception\\CannotInitializeCacheException' => 
    array (
      'tx_extbase_object_container_exception_cannotinitializecacheexception' => 'tx_extbase_object_container_exception_cannotinitializecacheexception',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\Exception\\TooManyRecursionLevelsException' => 
    array (
      'tx_extbase_object_container_exception_toomanyrecursionlevelsexception' => 'tx_extbase_object_container_exception_toomanyrecursionlevelsexception',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Container\\Exception\\UnknownObjectException' => 
    array (
      'tx_extbase_object_container_exception_unknownobjectexception' => 'tx_extbase_object_container_exception_unknownobjectexception',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Exception' => 
    array (
      'tx_extbase_object_exception' => 'tx_extbase_object_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Exception\\CannotBuildObjectException' => 
    array (
      'tx_extbase_object_exception_cannotbuildobject' => 'tx_extbase_object_exception_cannotbuildobject',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Exception\\CannotReconstituteObjectException' => 
    array (
      'tx_extbase_object_exception_cannotreconstituteobject' => 'tx_extbase_object_exception_cannotreconstituteobject',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\Exception\\WrongScopeException' => 
    array (
      'tx_extbase_object_exception_wrongscope' => 'tx_extbase_object_exception_wrongscope',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\InvalidClassException' => 
    array (
      'tx_extbase_object_invalidclass' => 'tx_extbase_object_invalidclass',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\InvalidObjectConfigurationException' => 
    array (
      'tx_extbase_object_invalidobjectconfiguration' => 'tx_extbase_object_invalidobjectconfiguration',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\InvalidObjectException' => 
    array (
      'tx_extbase_object_invalidobject' => 'tx_extbase_object_invalidobject',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\ObjectAlreadyRegisteredException' => 
    array (
      'tx_extbase_object_objectalreadyregistered' => 'tx_extbase_object_objectalreadyregistered',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\ObjectManager' => 
    array (
      'tx_extbase_object_objectmanager' => 'tx_extbase_object_objectmanager',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface' => 
    array (
      'tx_extbase_object_objectmanagerinterface' => 'tx_extbase_object_objectmanagerinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\UnknownClassException' => 
    array (
      'tx_extbase_object_unknownclass' => 'tx_extbase_object_unknownclass',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\UnknownInterfaceException' => 
    array (
      'tx_extbase_object_unknowninterface' => 'tx_extbase_object_unknowninterface',
    ),
    'TYPO3\\CMS\\Extbase\\Object\\UnresolvedDependenciesException' => 
    array (
      'tx_extbase_object_unresolveddependencies' => 'tx_extbase_object_unresolveddependencies',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Backend' => 
    array (
      'tx_extbase_persistence_backend' => 'tx_extbase_persistence_backend',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\BackendInterface' => 
    array (
      'tx_extbase_persistence_backendinterface' => 'tx_extbase_persistence_backendinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception' => 
    array (
      'tx_extbase_persistence_exception' => 'tx_extbase_persistence_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\CleanStateNotMemorizedException' => 
    array (
      'tx_extbase_persistence_exception_cleanstatenotmemorized' => 'tx_extbase_persistence_exception_cleanstatenotmemorized',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Exception\\IllegalObjectTypeException' => 
    array (
      'tx_extbase_persistence_exception_illegalobjecttype' => 'tx_extbase_persistence_exception_illegalobjecttype',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InvalidClassException' => 
    array (
      'tx_extbase_persistence_exception_invalidclass' => 'tx_extbase_persistence_exception_invalidclass',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InvalidNumberOfConstraintsException' => 
    array (
      'tx_extbase_persistence_exception_invalidnumberofconstraints' => 'tx_extbase_persistence_exception_invalidnumberofconstraints',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InvalidPropertyTypeException' => 
    array (
      'tx_extbase_persistence_exception_invalidpropertytype' => 'tx_extbase_persistence_exception_invalidpropertytype',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\MissingBackendException' => 
    array (
      'tx_extbase_persistence_exception_missingbackend' => 'tx_extbase_persistence_exception_missingbackend',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\RepositoryException' => 
    array (
      'tx_extbase_persistence_exception_repositoryexception' => 'tx_extbase_persistence_exception_repositoryexception',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\TooDirtyException' => 
    array (
      'tx_extbase_persistence_exception_toodirty' => 'tx_extbase_persistence_exception_toodirty',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnexpectedTypeException' => 
    array (
      'tx_extbase_persistence_exception_unexpectedtypeexception' => 'tx_extbase_persistence_exception_unexpectedtypeexception',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Exception\\UnknownObjectException' => 
    array (
      'tx_extbase_persistence_exception_unknownobject' => 'tx_extbase_persistence_exception_unknownobject',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnsupportedMethodException' => 
    array (
      'tx_extbase_persistence_exception_unsupportedmethod' => 'tx_extbase_persistence_exception_unsupportedmethod',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnsupportedOrderException' => 
    array (
      'tx_extbase_persistence_exception_unsupportedorder' => 'tx_extbase_persistence_exception_unsupportedorder',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\UnsupportedRelationException' => 
    array (
      'tx_extbase_persistence_exception_unsupportedrelation' => 'tx_extbase_persistence_exception_unsupportedrelation',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\InconsistentQuerySettingsException' => 
    array (
      'tx_extbase_persistence_generic_exception_inconsistentquerysettings' => 'tx_extbase_persistence_generic_exception_inconsistentquerysettings',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\IdentityMap' => 
    array (
      'tx_extbase_persistence_identitymap' => 'tx_extbase_persistence_identitymap',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LazyLoadingProxy' => 
    array (
      'tx_extbase_persistence_lazyloadingproxy' => 'tx_extbase_persistence_lazyloadingproxy',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LazyObjectStorage' => 
    array (
      'tx_extbase_persistence_lazyobjectstorage' => 'tx_extbase_persistence_lazyobjectstorage',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LoadingStrategyInterface' => 
    array (
      'tx_extbase_persistence_loadingstrategyinterface' => 'tx_extbase_persistence_loadingstrategyinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\ColumnMap' => 
    array (
      'tx_extbase_persistence_mapper_columnmap' => 'tx_extbase_persistence_mapper_columnmap',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMap' => 
    array (
      'tx_extbase_persistence_mapper_datamap' => 'tx_extbase_persistence_mapper_datamap',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMapFactory' => 
    array (
      'tx_extbase_persistence_mapper_datamapfactory' => 'tx_extbase_persistence_mapper_datamapfactory',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMapper' => 
    array (
      'tx_extbase_persistence_mapper_datamapper' => 'tx_extbase_persistence_mapper_datamapper',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\ObjectMonitoringInterface' => 
    array (
      'tx_extbase_persistence_objectmonitoringinterface' => 'tx_extbase_persistence_objectmonitoringinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage' => 
    array (
      'tx_extbase_persistence_objectstorage' => 'tx_extbase_persistence_objectstorage',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager' => 
    array (
      'tx_extbase_persistence_manager' => 'tx_extbase_persistence_manager',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface' => 
    array (
      'tx_extbase_persistence_persistencemanagerinterface' => 'tx_extbase_persistence_persistencemanagerinterface',
      'tx_extbase_persistence_managerinterface' => 'tx_extbase_persistence_managerinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PropertyType' => 
    array (
      'tx_extbase_persistence_propertytype' => 'tx_extbase_persistence_propertytype',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\AndInterface' => 
    array (
      'tx_extbase_persistence_qom_andinterface' => 'tx_extbase_persistence_qom_andinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\BindVariableValue' => 
    array (
      'tx_extbase_persistence_qom_bindvariablevalue' => 'tx_extbase_persistence_qom_bindvariablevalue',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\BindVariableValueInterface' => 
    array (
      'tx_extbase_persistence_qom_bindvariablevalueinterface' => 'tx_extbase_persistence_qom_bindvariablevalueinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Comparison' => 
    array (
      'tx_extbase_persistence_qom_comparison' => 'tx_extbase_persistence_qom_comparison',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\ComparisonInterface' => 
    array (
      'tx_extbase_persistence_qom_comparisoninterface' => 'tx_extbase_persistence_qom_comparisoninterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Constraint' => 
    array (
      'tx_extbase_persistence_qom_constraint' => 'tx_extbase_persistence_qom_constraint',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\ConstraintInterface' => 
    array (
      'tx_extbase_persistence_qom_constraintinterface' => 'tx_extbase_persistence_qom_constraintinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\DynamicOperandInterface' => 
    array (
      'tx_extbase_persistence_qom_dynamicoperandinterface' => 'tx_extbase_persistence_qom_dynamicoperandinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\EquiJoinCondition' => 
    array (
      'tx_extbase_persistence_qom_equijoincondition' => 'tx_extbase_persistence_qom_equijoincondition',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\EquiJoinConditionInterface' => 
    array (
      'tx_extbase_persistence_qom_equijoinconditioninterface' => 'tx_extbase_persistence_qom_equijoinconditioninterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Join' => 
    array (
      'tx_extbase_persistence_qom_join' => 'tx_extbase_persistence_qom_join',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\JoinConditionInterface' => 
    array (
      'tx_extbase_persistence_qom_joinconditioninterface' => 'tx_extbase_persistence_qom_joinconditioninterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\JoinInterface' => 
    array (
      'tx_extbase_persistence_qom_joininterface' => 'tx_extbase_persistence_qom_joininterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LogicalAnd' => 
    array (
      'tx_extbase_persistence_qom_logicaland' => 'tx_extbase_persistence_qom_logicaland',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LogicalNot' => 
    array (
      'tx_extbase_persistence_qom_logicalnot' => 'tx_extbase_persistence_qom_logicalnot',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LogicalOr' => 
    array (
      'tx_extbase_persistence_qom_logicalor' => 'tx_extbase_persistence_qom_logicalor',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LowerCase' => 
    array (
      'tx_extbase_persistence_qom_lowercase' => 'tx_extbase_persistence_qom_lowercase',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\LowerCaseInterface' => 
    array (
      'tx_extbase_persistence_qom_lowercaseinterface' => 'tx_extbase_persistence_qom_lowercaseinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\NotInterface' => 
    array (
      'tx_extbase_persistence_qom_notinterface' => 'tx_extbase_persistence_qom_notinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Operand' => 
    array (
      'tx_extbase_persistence_qom_operand' => 'tx_extbase_persistence_qom_operand',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\OperandInterface' => 
    array (
      'tx_extbase_persistence_qom_operandinterface' => 'tx_extbase_persistence_qom_operandinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Ordering' => 
    array (
      'tx_extbase_persistence_qom_ordering' => 'tx_extbase_persistence_qom_ordering',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\OrderingInterface' => 
    array (
      'tx_extbase_persistence_qom_orderinginterface' => 'tx_extbase_persistence_qom_orderinginterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\OrInterface' => 
    array (
      'tx_extbase_persistence_qom_orinterface' => 'tx_extbase_persistence_qom_orinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\PropertyValue' => 
    array (
      'tx_extbase_persistence_qom_propertyvalue' => 'tx_extbase_persistence_qom_propertyvalue',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\PropertyValueInterface' => 
    array (
      'tx_extbase_persistence_qom_propertyvalueinterface' => 'tx_extbase_persistence_qom_propertyvalueinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\QueryObjectModelFactory' => 
    array (
      'tx_extbase_persistence_qom_queryobjectmodelfactory' => 'tx_extbase_persistence_qom_queryobjectmodelfactory',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Selector' => 
    array (
      'tx_extbase_persistence_qom_selector' => 'tx_extbase_persistence_qom_selector',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\SelectorInterface' => 
    array (
      'tx_extbase_persistence_qom_selectorinterface' => 'tx_extbase_persistence_qom_selectorinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\SourceInterface' => 
    array (
      'tx_extbase_persistence_qom_sourceinterface' => 'tx_extbase_persistence_qom_sourceinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\Statement' => 
    array (
      'tx_extbase_persistence_qom_statement' => 'tx_extbase_persistence_qom_statement',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\StaticOperand' => 
    array (
      'tx_extbase_persistence_qom_staticoperand' => 'tx_extbase_persistence_qom_staticoperand',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\StaticOperandInterface' => 
    array (
      'tx_extbase_persistence_qom_staticoperandinterface' => 'tx_extbase_persistence_qom_staticoperandinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\UpperCase' => 
    array (
      'tx_extbase_persistence_qom_uppercase' => 'tx_extbase_persistence_qom_uppercase',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Qom\\UpperCaseInterface' => 
    array (
      'tx_extbase_persistence_qom_uppercaseinterface' => 'tx_extbase_persistence_qom_uppercaseinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Query' => 
    array (
      'tx_extbase_persistence_query' => 'tx_extbase_persistence_query',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QueryFactory' => 
    array (
      'tx_extbase_persistence_queryfactory' => 'tx_extbase_persistence_queryfactory',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QueryFactoryInterface' => 
    array (
      'tx_extbase_persistence_queryfactoryinterface' => 'tx_extbase_persistence_queryfactoryinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\QueryInterface' => 
    array (
      'tx_extbase_persistence_queryinterface' => 'tx_extbase_persistence_queryinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QueryResult' => 
    array (
      'tx_extbase_persistence_queryresult' => 'tx_extbase_persistence_queryresult',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\QueryResultInterface' => 
    array (
      'tx_extbase_persistence_queryresultinterface' => 'tx_extbase_persistence_queryresultinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface' => 
    array (
      'tx_extbase_persistence_querysettingsinterface' => 'tx_extbase_persistence_querysettingsinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Repository' => 
    array (
      'tx_extbase_persistence_repository' => 'tx_extbase_persistence_repository',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\RepositoryInterface' => 
    array (
      'tx_extbase_persistence_repositoryinterface' => 'tx_extbase_persistence_repositoryinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Session' => 
    array (
      'tx_extbase_persistence_session' => 'tx_extbase_persistence_session',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\BackendInterface' => 
    array (
      'tx_extbase_persistence_storage_backendinterface' => 'tx_extbase_persistence_storage_backendinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Exception\\BadConstraintException' => 
    array (
      'tx_extbase_persistence_storage_exception_badconstraint' => 'tx_extbase_persistence_storage_exception_badconstraint',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Exception\\SqlErrorException' => 
    array (
      'tx_extbase_persistence_storage_exception_sqlerror' => 'tx_extbase_persistence_storage_exception_sqlerror',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbBackend' => 
    array (
      'tx_extbase_persistence_storage_typo3dbbackend' => 'tx_extbase_persistence_storage_typo3dbbackend',
    ),
    'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings' => 
    array (
      'tx_extbase_persistence_typo3querysettings' => 'tx_extbase_persistence_typo3querysettings',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception' => 
    array (
      'tx_extbase_property_exception' => 'tx_extbase_property_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\DuplicateObjectException' => 
    array (
      'tx_extbase_property_exception_duplicateobjectexception' => 'tx_extbase_property_exception_duplicateobjectexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\DuplicateTypeConverterException' => 
    array (
      'tx_extbase_property_exception_duplicatetypeconverterexception' => 'tx_extbase_property_exception_duplicatetypeconverterexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\FormatNotSupportedException' => 
    array (
      'tx_extbase_property_exception_formatnotsupportedexception' => 'tx_extbase_property_exception_formatnotsupportedexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidDataTypeException' => 
    array (
      'tx_extbase_property_exception_invaliddatatypeexception' => 'tx_extbase_property_exception_invaliddatatypeexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidFormatException' => 
    array (
      'tx_extbase_property_exception_invalidformatexception' => 'tx_extbase_property_exception_invalidformatexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidPropertyException' => 
    array (
      'tx_extbase_property_exception_invalidpropertyexception' => 'tx_extbase_property_exception_invalidpropertyexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidPropertyMappingConfigurationException' => 
    array (
      'tx_extbase_property_exception_invalidpropertymappingconfigurationexception' => 'tx_extbase_property_exception_invalidpropertymappingconfigurationexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidSourceException' => 
    array (
      'tx_extbase_property_exception_invalidsource' => 'tx_extbase_property_exception_invalidsource',
      'tx_extbase_property_exception_invalidsourceexception' => 'tx_extbase_property_exception_invalidsourceexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\InvalidTargetException' => 
    array (
      'tx_extbase_property_exception_invalidtarget' => 'tx_extbase_property_exception_invalidtarget',
      'tx_extbase_property_exception_invalidtargetexception' => 'tx_extbase_property_exception_invalidtargetexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\TargetNotFoundException' => 
    array (
      'tx_extbase_property_exception_targetnotfoundexception' => 'tx_extbase_property_exception_targetnotfoundexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\Exception\\TypeConverterException' => 
    array (
      'tx_extbase_property_exception_typeconverterexception' => 'tx_extbase_property_exception_typeconverterexception',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\PropertyMapper' => 
    array (
      'tx_extbase_property_propertymapper' => 'tx_extbase_property_propertymapper',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\PropertyMappingConfiguration' => 
    array (
      'tx_extbase_property_propertymappingconfiguration' => 'tx_extbase_property_propertymappingconfiguration',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\PropertyMappingConfigurationBuilder' => 
    array (
      'tx_extbase_property_propertymappingconfigurationbuilder' => 'tx_extbase_property_propertymappingconfigurationbuilder',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\PropertyMappingConfigurationInterface' => 
    array (
      'tx_extbase_property_propertymappingconfigurationinterface' => 'tx_extbase_property_propertymappingconfigurationinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\AbstractFileCollectionConverter' => 
    array (
      'tx_extbase_property_typeconverter_abstractfilecollectionconverter' => 'tx_extbase_property_typeconverter_abstractfilecollectionconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\AbstractFileFolderConverter' => 
    array (
      'tx_extbase_property_typeconverter_abstractfilefolderconverter' => 'tx_extbase_property_typeconverter_abstractfilefolderconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\AbstractTypeConverter' => 
    array (
      'tx_extbase_property_typeconverter_abstracttypeconverter' => 'tx_extbase_property_typeconverter_abstracttypeconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\ArrayConverter' => 
    array (
      'tx_extbase_property_typeconverter_arrayconverter' => 'tx_extbase_property_typeconverter_arrayconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\BooleanConverter' => 
    array (
      'tx_extbase_property_typeconverter_booleanconverter' => 'tx_extbase_property_typeconverter_booleanconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter' => 
    array (
      'tx_extbase_property_typeconverter_datetimeconverter' => 'tx_extbase_property_typeconverter_datetimeconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FileConverter' => 
    array (
      'tx_extbase_property_typeconverter_fileconverter' => 'tx_extbase_property_typeconverter_fileconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FileReferenceConverter' => 
    array (
      'tx_extbase_property_typeconverter_filereferenceconverter' => 'tx_extbase_property_typeconverter_filereferenceconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FloatConverter' => 
    array (
      'tx_extbase_property_typeconverter_floatconverter' => 'tx_extbase_property_typeconverter_floatconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FolderBasedFileCollectionConverter' => 
    array (
      'tx_extbase_property_typeconverter_folderbasedfilecollectionconverter' => 'tx_extbase_property_typeconverter_folderbasedfilecollectionconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\FolderConverter' => 
    array (
      'tx_extbase_property_typeconverter_folderconverter' => 'tx_extbase_property_typeconverter_folderconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\IntegerConverter' => 
    array (
      'tx_extbase_property_typeconverter_integerconverter' => 'tx_extbase_property_typeconverter_integerconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\ObjectStorageConverter' => 
    array (
      'tx_extbase_property_typeconverter_objectstorageconverter' => 'tx_extbase_property_typeconverter_objectstorageconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\PersistentObjectConverter' => 
    array (
      'tx_extbase_property_typeconverter_persistentobjectconverter' => 'tx_extbase_property_typeconverter_persistentobjectconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\StaticFileCollectionConverter' => 
    array (
      'tx_extbase_property_typeconverter_staticfilecollectionconverter' => 'tx_extbase_property_typeconverter_staticfilecollectionconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\StringConverter' => 
    array (
      'tx_extbase_property_typeconverter_stringconverter' => 'tx_extbase_property_typeconverter_stringconverter',
    ),
    'TYPO3\\CMS\\Extbase\\Property\\TypeConverterInterface' => 
    array (
      'tx_extbase_property_typeconverterinterface' => 'tx_extbase_property_typeconverterinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\ClassReflection' => 
    array (
      'tx_extbase_reflection_classreflection' => 'tx_extbase_reflection_classreflection',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\ClassSchema' => 
    array (
      'tx_extbase_reflection_classschema' => 'tx_extbase_reflection_classschema',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\DocCommentParser' => 
    array (
      'tx_extbase_reflection_doccommentparser' => 'tx_extbase_reflection_doccommentparser',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\Exception' => 
    array (
      'tx_extbase_reflection_exception' => 'tx_extbase_reflection_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\Exception\\InvalidPropertyTypeException' => 
    array (
      'tx_extbase_reflection_exception_invalidpropertytype' => 'tx_extbase_reflection_exception_invalidpropertytype',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\Exception\\PropertyNotAccessibleException' => 
    array (
      'tx_extbase_reflection_exception_propertynotaccessibleexception' => 'tx_extbase_reflection_exception_propertynotaccessibleexception',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\Exception\\UnknownClassException' => 
    array (
      'tx_extbase_reflection_exception_unknownclass' => 'tx_extbase_reflection_exception_unknownclass',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\MethodReflection' => 
    array (
      'tx_extbase_reflection_methodreflection' => 'tx_extbase_reflection_methodreflection',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\ObjectAccess' => 
    array (
      'tx_extbase_reflection_objectaccess' => 'tx_extbase_reflection_objectaccess',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\ParameterReflection' => 
    array (
      'tx_extbase_reflection_parameterreflection' => 'tx_extbase_reflection_parameterreflection',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\PropertyReflection' => 
    array (
      'tx_extbase_reflection_propertyreflection' => 'tx_extbase_reflection_propertyreflection',
    ),
    'TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService' => 
    array (
      'tx_extbase_reflection_service' => 'tx_extbase_reflection_service',
    ),
    'TYPO3\\CMS\\Extbase\\Scheduler\\FieldProvider' => 
    array (
      'tx_extbase_scheduler_fieldprovider' => 'tx_extbase_scheduler_fieldprovider',
    ),
    'TYPO3\\CMS\\Extbase\\Scheduler\\Task' => 
    array (
      'tx_extbase_scheduler_task' => 'tx_extbase_scheduler_task',
    ),
    'TYPO3\\CMS\\Extbase\\Scheduler\\TaskExecutor' => 
    array (
      'tx_extbase_scheduler_taskexecutor' => 'tx_extbase_scheduler_taskexecutor',
    ),
    'TYPO3\\CMS\\Extbase\\Security\\Cryptography\\HashService' => 
    array (
      'tx_extbase_security_cryptography_hashservice' => 'tx_extbase_security_cryptography_hashservice',
    ),
    'TYPO3\\CMS\\Extbase\\Security\\Exception' => 
    array (
      'tx_extbase_security_exception' => 'tx_extbase_security_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Security\\Exception\\InvalidArgumentForHashGenerationException' => 
    array (
      'tx_extbase_security_exception_invalidargumentforhashgeneration' => 'tx_extbase_security_exception_invalidargumentforhashgeneration',
    ),
    'TYPO3\\CMS\\Extbase\\Security\\Exception\\InvalidArgumentForRequestHashGenerationException' => 
    array (
      'tx_extbase_security_exception_invalidargumentforrequesthashgeneration' => 'tx_extbase_security_exception_invalidargumentforrequesthashgeneration',
    ),
    'TYPO3\\CMS\\Extbase\\Security\\Exception\\InvalidHashException' => 
    array (
      'tx_extbase_security_exception_invalidhash' => 'tx_extbase_security_exception_invalidhash',
    ),
    'TYPO3\\CMS\\Extbase\\Security\\Exception\\SyntacticallyWrongRequestHashException' => 
    array (
      'tx_extbase_security_exception_syntacticallywrongrequesthash' => 'tx_extbase_security_exception_syntacticallywrongrequesthash',
    ),
    'TYPO3\\CMS\\Extbase\\Service\\CacheService' => 
    array (
      'tx_extbase_service_cacheservice' => 'tx_extbase_service_cacheservice',
    ),
    'TYPO3\\CMS\\Extbase\\Service\\ExtensionService' => 
    array (
      'tx_extbase_service_extensionservice' => 'tx_extbase_service_extensionservice',
    ),
    'TYPO3\\CMS\\Extbase\\Service\\FlexFormService' => 
    array (
      'tx_extbase_service_flexformservice' => 'tx_extbase_service_flexformservice',
    ),
    'TYPO3\\CMS\\Extbase\\Service\\TypoScriptService' => 
    array (
      'tx_extbase_service_typoscriptservice' => 'tx_extbase_service_typoscriptservice',
    ),
    'TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher' => 
    array (
      'tx_extbase_signalslot_dispatcher' => 'tx_extbase_signalslot_dispatcher',
    ),
    'TYPO3\\CMS\\Extbase\\SignalSlot\\Exception\\InvalidSlotException' => 
    array (
      'tx_extbase_signalslot_exception_invalidslotexception' => 'tx_extbase_signalslot_exception_invalidslotexception',
    ),
    'TYPO3\\CMS\\Core\\Tests\\UnitTestCase' => 
    array (
      'tx_extbase_tests_unit_basetestcase' => 'tx_extbase_tests_unit_basetestcase',
      'typo3\\cms\\extbase\\tests\\unit\\basetestcase' => 'typo3\\cms\\extbase\\tests\\unit\\basetestcase',
    ),
    'TYPO3\\CMS\\Extbase\\Utility\\ArrayUtility' => 
    array (
      'tx_extbase_utility_arrays' => 'tx_extbase_utility_arrays',
    ),
    'TYPO3\\CMS\\Extbase\\Utility\\DebuggerUtility' => 
    array (
      'tx_extbase_utility_debugger' => 'tx_extbase_utility_debugger',
    ),
    'TYPO3\\CMS\\Extbase\\Utility\\ExtbaseRequirementsCheckUtility' => 
    array (
      'tx_extbase_utility_extbaserequirementscheck' => 'tx_extbase_utility_extbaserequirementscheck',
    ),
    'TYPO3\\CMS\\Extbase\\Utility\\ExtensionUtility' => 
    array (
      'tx_extbase_utility_extension' => 'tx_extbase_utility_extension',
    ),
    'TYPO3\\CMS\\Extbase\\Utility\\FrontendSimulatorUtility' => 
    array (
      'tx_extbase_utility_frontendsimulator' => 'tx_extbase_utility_frontendsimulator',
    ),
    'TYPO3\\CMS\\Extbase\\Utility\\LocalizationUtility' => 
    array (
      'tx_extbase_utility_localization' => 'tx_extbase_utility_localization',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Error' => 
    array (
      'tx_extbase_validation_error' => 'tx_extbase_validation_error',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Exception' => 
    array (
      'tx_extbase_validation_exception' => 'tx_extbase_validation_exception',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Exception\\InvalidSubjectException' => 
    array (
      'tx_extbase_validation_exception_invalidsubject' => 'tx_extbase_validation_exception_invalidsubject',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Exception\\InvalidValidationConfigurationException' => 
    array (
      'tx_extbase_validation_exception_invalidvalidationconfiguration' => 'tx_extbase_validation_exception_invalidvalidationconfiguration',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Exception\\InvalidValidationOptionsException' => 
    array (
      'tx_extbase_validation_exception_invalidvalidationoptions' => 'tx_extbase_validation_exception_invalidvalidationoptions',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Exception\\NoSuchValidatorException' => 
    array (
      'tx_extbase_validation_exception_nosuchvalidator' => 'tx_extbase_validation_exception_nosuchvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Exception\\NoValidatorFoundException' => 
    array (
      'tx_extbase_validation_exception_novalidatorfound' => 'tx_extbase_validation_exception_novalidatorfound',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\AbstractCompositeValidator' => 
    array (
      'tx_extbase_validation_validator_abstractcompositevalidator' => 'tx_extbase_validation_validator_abstractcompositevalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\AbstractValidator' => 
    array (
      'tx_extbase_validation_validator_abstractvalidator' => 'tx_extbase_validation_validator_abstractvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\AlphanumericValidator' => 
    array (
      'tx_extbase_validation_validator_alphanumericvalidator' => 'tx_extbase_validation_validator_alphanumericvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator' => 
    array (
      'tx_extbase_validation_validator_conjunctionvalidator' => 'tx_extbase_validation_validator_conjunctionvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\DateTimeValidator' => 
    array (
      'tx_extbase_validation_validator_datetimevalidator' => 'tx_extbase_validation_validator_datetimevalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\DisjunctionValidator' => 
    array (
      'tx_extbase_validation_validator_disjunctionvalidator' => 'tx_extbase_validation_validator_disjunctionvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\EmailAddressValidator' => 
    array (
      'tx_extbase_validation_validator_emailaddressvalidator' => 'tx_extbase_validation_validator_emailaddressvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\FloatValidator' => 
    array (
      'tx_extbase_validation_validator_floatvalidator' => 'tx_extbase_validation_validator_floatvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\GenericObjectValidator' => 
    array (
      'tx_extbase_validation_validator_genericobjectvalidator' => 'tx_extbase_validation_validator_genericobjectvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\IntegerValidator' => 
    array (
      'tx_extbase_validation_validator_integervalidator' => 'tx_extbase_validation_validator_integervalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\NotEmptyValidator' => 
    array (
      'tx_extbase_validation_validator_notemptyvalidator' => 'tx_extbase_validation_validator_notemptyvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\NumberRangeValidator' => 
    array (
      'tx_extbase_validation_validator_numberrangevalidator' => 'tx_extbase_validation_validator_numberrangevalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\NumberValidator' => 
    array (
      'tx_extbase_validation_validator_numbervalidator' => 'tx_extbase_validation_validator_numbervalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\ObjectValidatorInterface' => 
    array (
      'tx_extbase_validation_validator_objectvalidatorinterface' => 'tx_extbase_validation_validator_objectvalidatorinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\RawValidator' => 
    array (
      'tx_extbase_validation_validator_rawvalidator' => 'tx_extbase_validation_validator_rawvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\RegularExpressionValidator' => 
    array (
      'tx_extbase_validation_validator_regularexpressionvalidator' => 'tx_extbase_validation_validator_regularexpressionvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\StringLengthValidator' => 
    array (
      'tx_extbase_validation_validator_stringlengthvalidator' => 'tx_extbase_validation_validator_stringlengthvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\StringValidator' => 
    array (
      'tx_extbase_validation_validator_stringvalidator' => 'tx_extbase_validation_validator_stringvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\TextValidator' => 
    array (
      'tx_extbase_validation_validator_textvalidator' => 'tx_extbase_validation_validator_textvalidator',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface' => 
    array (
      'tx_extbase_validation_validator_validatorinterface' => 'tx_extbase_validation_validator_validatorinterface',
    ),
    'TYPO3\\CMS\\Extbase\\Validation\\ValidatorResolver' => 
    array (
      'tx_extbase_validation_validatorresolver' => 'tx_extbase_validation_validatorresolver',
    ),
    'TYPO3\\CMS\\Extensionmanager\\Task\\UpdateExtensionListTask' => 
    array (
      'tx_em_tasks_updateextensionlist' => 'tx_em_tasks_updateextensionlist',
    ),
    'TYPO3\\CMS\\Feedit\\FrontendEditPanel' => 
    array (
      'tx_feedit_editpanel' => 'tx_feedit_editpanel',
    ),
    'TYPO3\\CMS\\Filelist\\Controller\\FileListController' => 
    array (
      'sc_file_list' => 'sc_file_list',
    ),
    'TYPO3\\CMS\\Filelist\\FileList' => 
    array (
      'filelist' => 'filelist',
    ),
    'TYPO3\\CMS\\Filelist\\FileListEditIconHookInterface' => 
    array (
      'filelist_editiconhook' => 'filelist_editiconhook',
    ),
    'TYPO3\\CMS\\Filelist\\FileListFolderTree' => 
    array (
      'filelistfoldertree' => 'filelistfoldertree',
    ),
    'TYPO3\\CMS\\Fluid\\Compatibility\\DocbookGeneratorService' => 
    array (
      'tx_fluid_compatibility_docbookgeneratorservice' => 'tx_fluid_compatibility_docbookgeneratorservice',
    ),
    'TYPO3\\CMS\\Fluid\\Compatibility\\TemplateParserBuilder' => 
    array (
      'tx_fluid_compatibility_templateparserbuilder' => 'tx_fluid_compatibility_templateparserbuilder',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Compiler\\AbstractCompiledTemplate' => 
    array (
      'tx_fluid_core_compiler_abstractcompiledtemplate' => 'tx_fluid_core_compiler_abstractcompiledtemplate',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Compiler\\TemplateCompiler' => 
    array (
      'tx_fluid_core_compiler_templatecompiler' => 'tx_fluid_core_compiler_templatecompiler',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Exception' => 
    array (
      'tx_fluid_core_exception' => 'tx_fluid_core_exception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\Configuration' => 
    array (
      'tx_fluid_core_parser_configuration' => 'tx_fluid_core_parser_configuration',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\Exception' => 
    array (
      'tx_fluid_core_parser_exception' => 'tx_fluid_core_parser_exception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\Interceptor\\Escape' => 
    array (
      'tx_fluid_core_parser_interceptor_escape' => 'tx_fluid_core_parser_interceptor_escape',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\InterceptorInterface' => 
    array (
      'tx_fluid_core_parser_interceptorinterface' => 'tx_fluid_core_parser_interceptorinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\ParsedTemplateInterface' => 
    array (
      'tx_fluid_core_parser_parsedtemplateinterface' => 'tx_fluid_core_parser_parsedtemplateinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\ParsingState' => 
    array (
      'tx_fluid_core_parser_parsingstate' => 'tx_fluid_core_parser_parsingstate',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\AbstractNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_abstractnode' => 'tx_fluid_core_parser_syntaxtree_abstractnode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\ArrayNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_arraynode' => 'tx_fluid_core_parser_syntaxtree_arraynode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\BooleanNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_booleannode' => 'tx_fluid_core_parser_syntaxtree_booleannode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\NodeInterface' => 
    array (
      'tx_fluid_core_parser_syntaxtree_nodeinterface' => 'tx_fluid_core_parser_syntaxtree_nodeinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\ObjectAccessorNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_objectaccessornode' => 'tx_fluid_core_parser_syntaxtree_objectaccessornode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\RenderingContextAwareInterface' => 
    array (
      'tx_fluid_core_parser_syntaxtree_renderingcontextawareinterface' => 'tx_fluid_core_parser_syntaxtree_renderingcontextawareinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\RootNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_rootnode' => 'tx_fluid_core_parser_syntaxtree_rootnode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\TextNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_textnode' => 'tx_fluid_core_parser_syntaxtree_textnode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\SyntaxTree\\ViewHelperNode' => 
    array (
      'tx_fluid_core_parser_syntaxtree_viewhelpernode' => 'tx_fluid_core_parser_syntaxtree_viewhelpernode',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Parser\\TemplateParser' => 
    array (
      'tx_fluid_core_parser_templateparser' => 'tx_fluid_core_parser_templateparser',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Rendering\\RenderingContext' => 
    array (
      'tx_fluid_core_rendering_renderingcontext' => 'tx_fluid_core_rendering_renderingcontext',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Rendering\\RenderingContextInterface' => 
    array (
      'tx_fluid_core_rendering_renderingcontextinterface' => 'tx_fluid_core_rendering_renderingcontextinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\AbstractConditionViewHelper' => 
    array (
      'tx_fluid_core_viewhelper_abstractconditionviewhelper' => 'tx_fluid_core_viewhelper_abstractconditionviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\AbstractTagBasedViewHelper' => 
    array (
      'tx_fluid_core_viewhelper_abstracttagbasedviewhelper' => 'tx_fluid_core_viewhelper_abstracttagbasedviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\AbstractViewHelper' => 
    array (
      'tx_fluid_core_viewhelper_abstractviewhelper' => 'tx_fluid_core_viewhelper_abstractviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\ArgumentDefinition' => 
    array (
      'tx_fluid_core_viewhelper_argumentdefinition' => 'tx_fluid_core_viewhelper_argumentdefinition',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Arguments' => 
    array (
      'tx_fluid_core_viewhelper_arguments' => 'tx_fluid_core_viewhelper_arguments',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Exception' => 
    array (
      'tx_fluid_core_viewhelper_exception' => 'tx_fluid_core_viewhelper_exception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Exception\\InvalidVariableException' => 
    array (
      'tx_fluid_core_viewhelper_exception_invalidvariableexception' => 'tx_fluid_core_viewhelper_exception_invalidvariableexception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Exception\\RenderingContextNotAccessibleException' => 
    array (
      'tx_fluid_core_viewhelper_exception_renderingcontextnotaccessibleexception' => 'tx_fluid_core_viewhelper_exception_renderingcontextnotaccessibleexception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Facets\\ChildNodeAccessInterface' => 
    array (
      'tx_fluid_core_viewhelper_facets_childnodeaccessinterface' => 'tx_fluid_core_viewhelper_facets_childnodeaccessinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Facets\\CompilableInterface' => 
    array (
      'tx_fluid_core_viewhelper_facets_compilableinterface' => 'tx_fluid_core_viewhelper_facets_compilableinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\Facets\\PostParseInterface' => 
    array (
      'tx_fluid_core_viewhelper_facets_postparseinterface' => 'tx_fluid_core_viewhelper_facets_postparseinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\TagBuilder' => 
    array (
      'tx_fluid_core_viewhelper_tagbuilder' => 'tx_fluid_core_viewhelper_tagbuilder',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\TemplateVariableContainer' => 
    array (
      'tx_fluid_core_viewhelper_templatevariablecontainer' => 'tx_fluid_core_viewhelper_templatevariablecontainer',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\ViewHelperInterface' => 
    array (
      'tx_fluid_core_viewhelper_viewhelperinterface' => 'tx_fluid_core_viewhelper_viewhelperinterface',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\ViewHelper\\ViewHelperVariableContainer' => 
    array (
      'tx_fluid_core_viewhelper_viewhelpervariablecontainer' => 'tx_fluid_core_viewhelper_viewhelpervariablecontainer',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\AbstractWidgetController' => 
    array (
      'tx_fluid_core_widget_abstractwidgetcontroller' => 'tx_fluid_core_widget_abstractwidgetcontroller',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\AbstractWidgetViewHelper' => 
    array (
      'tx_fluid_core_widget_abstractwidgetviewhelper' => 'tx_fluid_core_widget_abstractwidgetviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\AjaxWidgetContextHolder' => 
    array (
      'tx_fluid_core_widget_ajaxwidgetcontextholder' => 'tx_fluid_core_widget_ajaxwidgetcontextholder',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\Bootstrap' => 
    array (
      'tx_fluid_core_widget_bootstrap' => 'tx_fluid_core_widget_bootstrap',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception' => 
    array (
      'tx_fluid_core_widget_exception' => 'tx_fluid_core_widget_exception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\MissingControllerException' => 
    array (
      'tx_fluid_core_widget_exception_missingcontrollerexception' => 'tx_fluid_core_widget_exception_missingcontrollerexception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\RenderingContextNotFoundException' => 
    array (
      'tx_fluid_core_widget_exception_renderingcontextnotfoundexception' => 'tx_fluid_core_widget_exception_renderingcontextnotfoundexception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\WidgetContextNotFoundException' => 
    array (
      'tx_fluid_core_widget_exception_widgetcontextnotfoundexception' => 'tx_fluid_core_widget_exception_widgetcontextnotfoundexception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\Exception\\WidgetRequestNotFoundException' => 
    array (
      'tx_fluid_core_widget_exception_widgetrequestnotfoundexception' => 'tx_fluid_core_widget_exception_widgetrequestnotfoundexception',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetContext' => 
    array (
      'tx_fluid_core_widget_widgetcontext' => 'tx_fluid_core_widget_widgetcontext',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetRequest' => 
    array (
      'tx_fluid_core_widget_widgetrequest' => 'tx_fluid_core_widget_widgetrequest',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetRequestBuilder' => 
    array (
      'tx_fluid_core_widget_widgetrequestbuilder' => 'tx_fluid_core_widget_widgetrequestbuilder',
    ),
    'TYPO3\\CMS\\Fluid\\Core\\Widget\\WidgetRequestHandler' => 
    array (
      'tx_fluid_core_widget_widgetrequesthandler' => 'tx_fluid_core_widget_widgetrequesthandler',
    ),
    'TYPO3\\CMS\\Fluid\\Exception' => 
    array (
      'tx_fluid_exception' => 'tx_fluid_exception',
    ),
    'TYPO3\\CMS\\Fluid\\Fluid' => 
    array (
      'tx_fluid_fluid' => 'tx_fluid_fluid',
    ),
    'TYPO3\\CMS\\Fluid\\Service\\DocbookGenerator' => 
    array (
      'tx_fluid_service_docbookgenerator' => 'tx_fluid_service_docbookgenerator',
    ),
    'TYPO3\\CMS\\Fluid\\View\\AbstractTemplateView' => 
    array (
      'tx_fluid_view_abstracttemplateview' => 'tx_fluid_view_abstracttemplateview',
    ),
    'TYPO3\\CMS\\Fluid\\View\\Exception' => 
    array (
      'tx_fluid_view_exception' => 'tx_fluid_view_exception',
    ),
    'TYPO3\\CMS\\Fluid\\View\\Exception\\InvalidSectionException' => 
    array (
      'tx_fluid_view_exception_invalidsectionexception' => 'tx_fluid_view_exception_invalidsectionexception',
    ),
    'TYPO3\\CMS\\Fluid\\View\\Exception\\InvalidTemplateResourceException' => 
    array (
      'tx_fluid_view_exception_invalidtemplateresourceexception' => 'tx_fluid_view_exception_invalidtemplateresourceexception',
    ),
    'TYPO3\\CMS\\Fluid\\View\\StandaloneView' => 
    array (
      'tx_fluid_view_standaloneview' => 'tx_fluid_view_standaloneview',
    ),
    'TYPO3\\CMS\\Fluid\\View\\TemplateView' => 
    array (
      'tx_fluid_view_templateview' => 'tx_fluid_view_templateview',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\AliasViewHelper' => 
    array (
      'tx_fluid_viewhelpers_aliasviewhelper' => 'tx_fluid_viewhelpers_aliasviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\BaseViewHelper' => 
    array (
      'tx_fluid_viewhelpers_baseviewhelper' => 'tx_fluid_viewhelpers_baseviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\AbstractBackendViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_abstractbackendviewhelper' => 'tx_fluid_viewhelpers_be_abstractbackendviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Buttons\\CshViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_buttons_cshviewhelper' => 'tx_fluid_viewhelpers_be_buttons_cshviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Buttons\\IconViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_buttons_iconviewhelper' => 'tx_fluid_viewhelpers_be_buttons_iconviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Buttons\\ShortcutViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_buttons_shortcutviewhelper' => 'tx_fluid_viewhelpers_be_buttons_shortcutviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\ContainerViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_containerviewhelper' => 'tx_fluid_viewhelpers_be_containerviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Menus\\ActionMenuItemViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_menus_actionmenuitemviewhelper' => 'tx_fluid_viewhelpers_be_menus_actionmenuitemviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Menus\\ActionMenuViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_menus_actionmenuviewhelper' => 'tx_fluid_viewhelpers_be_menus_actionmenuviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\PageInfoViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_pageinfoviewhelper' => 'tx_fluid_viewhelpers_be_pageinfoviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\PagePathViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_pagepathviewhelper' => 'tx_fluid_viewhelpers_be_pagepathviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Security\\IfAuthenticatedViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_security_ifauthenticatedviewhelper' => 'tx_fluid_viewhelpers_be_security_ifauthenticatedviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\Security\\IfHasRoleViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_security_ifhasroleviewhelper' => 'tx_fluid_viewhelpers_be_security_ifhasroleviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Be\\TableListViewHelper' => 
    array (
      'tx_fluid_viewhelpers_be_tablelistviewhelper' => 'tx_fluid_viewhelpers_be_tablelistviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\CObjectViewHelper' => 
    array (
      'tx_fluid_viewhelpers_cobjectviewhelper' => 'tx_fluid_viewhelpers_cobjectviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\CommentViewHelper' => 
    array (
      'tx_fluid_viewhelpers_commentviewhelper' => 'tx_fluid_viewhelpers_commentviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\CountViewHelper' => 
    array (
      'tx_fluid_viewhelpers_countviewhelper' => 'tx_fluid_viewhelpers_countviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\CycleViewHelper' => 
    array (
      'tx_fluid_viewhelpers_cycleviewhelper' => 'tx_fluid_viewhelpers_cycleviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\DebugViewHelper' => 
    array (
      'tx_fluid_viewhelpers_debugviewhelper' => 'tx_fluid_viewhelpers_debugviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\ElseViewHelper' => 
    array (
      'tx_fluid_viewhelpers_elseviewhelper' => 'tx_fluid_viewhelpers_elseviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\FlashMessagesViewHelper' => 
    array (
      'tx_fluid_viewhelpers_flashmessagesviewhelper' => 'tx_fluid_viewhelpers_flashmessagesviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\AbstractFormFieldViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_abstractformfieldviewhelper' => 'tx_fluid_viewhelpers_form_abstractformfieldviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\AbstractFormViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_abstractformviewhelper' => 'tx_fluid_viewhelpers_form_abstractformviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\CheckboxViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_checkboxviewhelper' => 'tx_fluid_viewhelpers_form_checkboxviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\HiddenViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_hiddenviewhelper' => 'tx_fluid_viewhelpers_form_hiddenviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\PasswordViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_passwordviewhelper' => 'tx_fluid_viewhelpers_form_passwordviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\RadioViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_radioviewhelper' => 'tx_fluid_viewhelpers_form_radioviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\SelectViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_selectviewhelper' => 'tx_fluid_viewhelpers_form_selectviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\SubmitViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_submitviewhelper' => 'tx_fluid_viewhelpers_form_submitviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\TextareaViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_textareaviewhelper' => 'tx_fluid_viewhelpers_form_textareaviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\TextfieldViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_textfieldviewhelper' => 'tx_fluid_viewhelpers_form_textfieldviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\UploadViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_uploadviewhelper' => 'tx_fluid_viewhelpers_form_uploadviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\\ValidationResultsViewHelper' => 
    array (
      'tx_fluid_viewhelpers_form_validationresultsviewhelper' => 'tx_fluid_viewhelpers_form_validationresultsviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\AbstractEncodingViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_abstractencodingviewhelper' => 'tx_fluid_viewhelpers_format_abstractencodingviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\CdataViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_cdataviewhelper' => 'tx_fluid_viewhelpers_format_cdataviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\CropViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_cropviewhelper' => 'tx_fluid_viewhelpers_format_cropviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\CurrencyViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_currencyviewhelper' => 'tx_fluid_viewhelpers_format_currencyviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\DateViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_dateviewhelper' => 'tx_fluid_viewhelpers_format_dateviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlentitiesDecodeViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_htmlentitiesdecodeviewhelper' => 'tx_fluid_viewhelpers_format_htmlentitiesdecodeviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlentitiesViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_htmlentitiesviewhelper' => 'tx_fluid_viewhelpers_format_htmlentitiesviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlspecialcharsViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_htmlspecialcharsviewhelper' => 'tx_fluid_viewhelpers_format_htmlspecialcharsviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\HtmlViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_htmlviewhelper' => 'tx_fluid_viewhelpers_format_htmlviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\Nl2brViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_nl2brviewhelper' => 'tx_fluid_viewhelpers_format_nl2brviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\NumberViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_numberviewhelper' => 'tx_fluid_viewhelpers_format_numberviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\PaddingViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_paddingviewhelper' => 'tx_fluid_viewhelpers_format_paddingviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\PrintfViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_printfviewhelper' => 'tx_fluid_viewhelpers_format_printfviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\RawViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_rawviewhelper' => 'tx_fluid_viewhelpers_format_rawviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\StripTagsViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_striptagsviewhelper' => 'tx_fluid_viewhelpers_format_striptagsviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Format\\UrlencodeViewHelper' => 
    array (
      'tx_fluid_viewhelpers_format_urlencodeviewhelper' => 'tx_fluid_viewhelpers_format_urlencodeviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\FormViewHelper' => 
    array (
      'tx_fluid_viewhelpers_formviewhelper' => 'tx_fluid_viewhelpers_formviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\ForViewHelper' => 
    array (
      'tx_fluid_viewhelpers_forviewhelper' => 'tx_fluid_viewhelpers_forviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\GroupedForViewHelper' => 
    array (
      'tx_fluid_viewhelpers_groupedforviewhelper' => 'tx_fluid_viewhelpers_groupedforviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\IfViewHelper' => 
    array (
      'tx_fluid_viewhelpers_ifviewhelper' => 'tx_fluid_viewhelpers_ifviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\ImageViewHelper' => 
    array (
      'tx_fluid_viewhelpers_imageviewhelper' => 'tx_fluid_viewhelpers_imageviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\LayoutViewHelper' => 
    array (
      'tx_fluid_viewhelpers_layoutviewhelper' => 'tx_fluid_viewhelpers_layoutviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\ActionViewHelper' => 
    array (
      'tx_fluid_viewhelpers_link_actionviewhelper' => 'tx_fluid_viewhelpers_link_actionviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\EmailViewHelper' => 
    array (
      'tx_fluid_viewhelpers_link_emailviewhelper' => 'tx_fluid_viewhelpers_link_emailviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\ExternalViewHelper' => 
    array (
      'tx_fluid_viewhelpers_link_externalviewhelper' => 'tx_fluid_viewhelpers_link_externalviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Link\\PageViewHelper' => 
    array (
      'tx_fluid_viewhelpers_link_pageviewhelper' => 'tx_fluid_viewhelpers_link_pageviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\RenderChildrenViewHelper' => 
    array (
      'tx_fluid_viewhelpers_renderchildrenviewhelper' => 'tx_fluid_viewhelpers_renderchildrenviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\RenderViewHelper' => 
    array (
      'tx_fluid_viewhelpers_renderviewhelper' => 'tx_fluid_viewhelpers_renderviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\SectionViewHelper' => 
    array (
      'tx_fluid_viewhelpers_sectionviewhelper' => 'tx_fluid_viewhelpers_sectionviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Security\\IfAuthenticatedViewHelper' => 
    array (
      'tx_fluid_viewhelpers_security_ifauthenticatedviewhelper' => 'tx_fluid_viewhelpers_security_ifauthenticatedviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Security\\IfHasRoleViewHelper' => 
    array (
      'tx_fluid_viewhelpers_security_ifhasroleviewhelper' => 'tx_fluid_viewhelpers_security_ifhasroleviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\ThenViewHelper' => 
    array (
      'tx_fluid_viewhelpers_thenviewhelper' => 'tx_fluid_viewhelpers_thenviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\TranslateViewHelper' => 
    array (
      'tx_fluid_viewhelpers_translateviewhelper' => 'tx_fluid_viewhelpers_translateviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ActionViewHelper' => 
    array (
      'tx_fluid_viewhelpers_uri_actionviewhelper' => 'tx_fluid_viewhelpers_uri_actionviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\EmailViewHelper' => 
    array (
      'tx_fluid_viewhelpers_uri_emailviewhelper' => 'tx_fluid_viewhelpers_uri_emailviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ExternalViewHelper' => 
    array (
      'tx_fluid_viewhelpers_uri_externalviewhelper' => 'tx_fluid_viewhelpers_uri_externalviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ImageViewHelper' => 
    array (
      'tx_fluid_viewhelpers_uri_imageviewhelper' => 'tx_fluid_viewhelpers_uri_imageviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\PageViewHelper' => 
    array (
      'tx_fluid_viewhelpers_uri_pageviewhelper' => 'tx_fluid_viewhelpers_uri_pageviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Uri\\ResourceViewHelper' => 
    array (
      'tx_fluid_viewhelpers_uri_resourceviewhelper' => 'tx_fluid_viewhelpers_uri_resourceviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\AutocompleteViewHelper' => 
    array (
      'tx_fluid_viewhelpers_widget_autocompleteviewhelper' => 'tx_fluid_viewhelpers_widget_autocompleteviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\Controller\\AutocompleteController' => 
    array (
      'tx_fluid_viewhelpers_widget_controller_autocompletecontroller' => 'tx_fluid_viewhelpers_widget_controller_autocompletecontroller',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\Controller\\PaginateController' => 
    array (
      'tx_fluid_viewhelpers_widget_controller_paginatecontroller' => 'tx_fluid_viewhelpers_widget_controller_paginatecontroller',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\LinkViewHelper' => 
    array (
      'tx_fluid_viewhelpers_widget_linkviewhelper' => 'tx_fluid_viewhelpers_widget_linkviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\PaginateViewHelper' => 
    array (
      'tx_fluid_viewhelpers_widget_paginateviewhelper' => 'tx_fluid_viewhelpers_widget_paginateviewhelper',
    ),
    'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\UriViewHelper' => 
    array (
      'tx_fluid_viewhelpers_widget_uriviewhelper' => 'tx_fluid_viewhelpers_widget_uriviewhelper',
    ),
    'TYPO3\\CMS\\Form\\Controller\\FormController' => 
    array (
      'tx_form_controller_form' => 'tx_form_controller_form',
    ),
    'TYPO3\\CMS\\Form\\Controller\\WizardController' => 
    array (
      'tx_form_controller_wizard' => 'tx_form_controller_wizard',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Factory\\JsonToTypoScript' => 
    array (
      'tx_form_domain_factory_jsontotyposcript' => 'tx_form_domain_factory_jsontotyposcript',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Factory\\TypoScriptFactory' => 
    array (
      'tx_form_domain_factory_typoscript' => 'tx_form_domain_factory_typoscript',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\AbstractAdditionalElement' => 
    array (
      'tx_form_domain_model_additional_abstract' => 'tx_form_domain_model_additional_abstract',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\AdditionalAdditionalElement' => 
    array (
      'tx_form_domain_model_additional_additional' => 'tx_form_domain_model_additional_additional',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\ErrorAdditionalElement' => 
    array (
      'tx_form_domain_model_additional_error' => 'tx_form_domain_model_additional_error',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\LabelAdditionalElement' => 
    array (
      'tx_form_domain_model_additional_label' => 'tx_form_domain_model_additional_label',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\LegendAdditionalElement' => 
    array (
      'tx_form_domain_model_additional_legend' => 'tx_form_domain_model_additional_legend',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Additional\\MandatoryAdditionalElement' => 
    array (
      'tx_form_domain_model_additional_mandatory' => 'tx_form_domain_model_additional_mandatory',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AbstractAttribute' => 
    array (
      'tx_form_domain_model_attributes_abstract' => 'tx_form_domain_model_attributes_abstract',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AcceptAttribute' => 
    array (
      'tx_form_domain_model_attributes_accept' => 'tx_form_domain_model_attributes_accept',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AcceptCharsetAttribute' => 
    array (
      'tx_form_domain_model_attributes_acceptcharset' => 'tx_form_domain_model_attributes_acceptcharset',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AccesskeyAttribute' => 
    array (
      'tx_form_domain_model_attributes_accesskey' => 'tx_form_domain_model_attributes_accesskey',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ActionAttribute' => 
    array (
      'tx_form_domain_model_attributes_action' => 'tx_form_domain_model_attributes_action',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AltAttribute' => 
    array (
      'tx_form_domain_model_attributes_alt' => 'tx_form_domain_model_attributes_alt',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\AttributesAttribute' => 
    array (
      'tx_form_domain_model_attributes_attributes' => 'tx_form_domain_model_attributes_attributes',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\CheckedAttribute' => 
    array (
      'tx_form_domain_model_attributes_checked' => 'tx_form_domain_model_attributes_checked',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ClassAttribute' => 
    array (
      'tx_form_domain_model_attributes_class' => 'tx_form_domain_model_attributes_class',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ColsAttribute' => 
    array (
      'tx_form_domain_model_attributes_cols' => 'tx_form_domain_model_attributes_cols',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\DirAttribute' => 
    array (
      'tx_form_domain_model_attributes_dir' => 'tx_form_domain_model_attributes_dir',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\DisabledAttribute' => 
    array (
      'tx_form_domain_model_attributes_disabled' => 'tx_form_domain_model_attributes_disabled',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\EnctypeAttribute' => 
    array (
      'tx_form_domain_model_attributes_enctype' => 'tx_form_domain_model_attributes_enctype',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\IdAttribute' => 
    array (
      'tx_form_domain_model_attributes_id' => 'tx_form_domain_model_attributes_id',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\LabelAttribute' => 
    array (
      'tx_form_domain_model_attributes_label' => 'tx_form_domain_model_attributes_label',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\LangAttribute' => 
    array (
      'tx_form_domain_model_attributes_lang' => 'tx_form_domain_model_attributes_lang',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\MaxlengthAttribute' => 
    array (
      'tx_form_domain_model_attributes_maxlength' => 'tx_form_domain_model_attributes_maxlength',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\MethodAttribute' => 
    array (
      'tx_form_domain_model_attributes_method' => 'tx_form_domain_model_attributes_method',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\MultipleAttribute' => 
    array (
      'tx_form_domain_model_attributes_multiple' => 'tx_form_domain_model_attributes_multiple',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\NameAttribute' => 
    array (
      'tx_form_domain_model_attributes_name' => 'tx_form_domain_model_attributes_name',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ReadonlyAttribute' => 
    array (
      'tx_form_domain_model_attributes_readonly' => 'tx_form_domain_model_attributes_readonly',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\RowsAttribute' => 
    array (
      'tx_form_domain_model_attributes_rows' => 'tx_form_domain_model_attributes_rows',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\SelectedAttribute' => 
    array (
      'tx_form_domain_model_attributes_selected' => 'tx_form_domain_model_attributes_selected',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\SizeAttribute' => 
    array (
      'tx_form_domain_model_attributes_size' => 'tx_form_domain_model_attributes_size',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\SrcAttribute' => 
    array (
      'tx_form_domain_model_attributes_src' => 'tx_form_domain_model_attributes_src',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\StyleAttribute' => 
    array (
      'tx_form_domain_model_attributes_style' => 'tx_form_domain_model_attributes_style',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\TabindexAttribute' => 
    array (
      'tx_form_domain_model_attributes_tabindex' => 'tx_form_domain_model_attributes_tabindex',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\TitleAttribute' => 
    array (
      'tx_form_domain_model_attributes_title' => 'tx_form_domain_model_attributes_title',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\TypeAttribute' => 
    array (
      'tx_form_domain_model_attributes_type' => 'tx_form_domain_model_attributes_type',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Attribute\\ValueAttribute' => 
    array (
      'tx_form_domain_model_attributes_value' => 'tx_form_domain_model_attributes_value',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Content' => 
    array (
      'tx_form_domain_model_content' => 'tx_form_domain_model_content',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\AbstractElement' => 
    array (
      'tx_form_domain_model_element_abstract' => 'tx_form_domain_model_element_abstract',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\AbstractPlainElement' => 
    array (
      'tx_form_domain_model_element_abstractplain' => 'tx_form_domain_model_element_abstractplain',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ButtonElement' => 
    array (
      'tx_form_domain_model_element_button' => 'tx_form_domain_model_element_button',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\CheckboxElement' => 
    array (
      'tx_form_domain_model_element_checkbox' => 'tx_form_domain_model_element_checkbox',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\CheckboxGroupElement' => 
    array (
      'tx_form_domain_model_element_checkboxgroup' => 'tx_form_domain_model_element_checkboxgroup',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ContainerElement' => 
    array (
      'tx_form_domain_model_element_container' => 'tx_form_domain_model_element_container',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ContentElement' => 
    array (
      'tx_form_domain_model_element_content' => 'tx_form_domain_model_element_content',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\FieldsetElement' => 
    array (
      'tx_form_domain_model_element_fieldset' => 'tx_form_domain_model_element_fieldset',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\FileuploadElement' => 
    array (
      'tx_form_domain_model_element_fileupload' => 'tx_form_domain_model_element_fileupload',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\HeaderElement' => 
    array (
      'tx_form_domain_model_element_header' => 'tx_form_domain_model_element_header',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\HiddenElement' => 
    array (
      'tx_form_domain_model_element_hidden' => 'tx_form_domain_model_element_hidden',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ImagebuttonElement' => 
    array (
      'tx_form_domain_model_element_imagebutton' => 'tx_form_domain_model_element_imagebutton',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\OptgroupElement' => 
    array (
      'tx_form_domain_model_element_optgroup' => 'tx_form_domain_model_element_optgroup',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\OptionElement' => 
    array (
      'tx_form_domain_model_element_option' => 'tx_form_domain_model_element_option',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\PasswordElement' => 
    array (
      'tx_form_domain_model_element_password' => 'tx_form_domain_model_element_password',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\RadioElement' => 
    array (
      'tx_form_domain_model_element_radio' => 'tx_form_domain_model_element_radio',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\RadioGroupElement' => 
    array (
      'tx_form_domain_model_element_radiogroup' => 'tx_form_domain_model_element_radiogroup',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\ResetElement' => 
    array (
      'tx_form_domain_model_element_reset' => 'tx_form_domain_model_element_reset',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\SelectElement' => 
    array (
      'tx_form_domain_model_element_select' => 'tx_form_domain_model_element_select',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\SubmitElement' => 
    array (
      'tx_form_domain_model_element_submit' => 'tx_form_domain_model_element_submit',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\TextareaElement' => 
    array (
      'tx_form_domain_model_element_textarea' => 'tx_form_domain_model_element_textarea',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\TextblockElement' => 
    array (
      'tx_form_domain_model_element_textblock' => 'tx_form_domain_model_element_textblock',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Element\\TextlineElement' => 
    array (
      'tx_form_domain_model_element_textline' => 'tx_form_domain_model_element_textline',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Form' => 
    array (
      'tx_form_domain_model_form' => 'tx_form_domain_model_form',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\AbstractJsonElement' => 
    array (
      'tx_form_domain_model_json_element' => 'tx_form_domain_model_json_element',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\ButtonJsonElement' => 
    array (
      'tx_form_domain_model_json_button' => 'tx_form_domain_model_json_button',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\CheckboxGroupJsonElement' => 
    array (
      'tx_form_domain_model_json_checkboxgroup' => 'tx_form_domain_model_json_checkboxgroup',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\CheckboxJsonElement' => 
    array (
      'tx_form_domain_model_json_checkbox' => 'tx_form_domain_model_json_checkbox',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\ContainerJsonElement' => 
    array (
      'tx_form_domain_model_json_container' => 'tx_form_domain_model_json_container',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\FieldsetJsonElement' => 
    array (
      'tx_form_domain_model_json_fieldset' => 'tx_form_domain_model_json_fieldset',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\FileuploadJsonElement' => 
    array (
      'tx_form_domain_model_json_fileupload' => 'tx_form_domain_model_json_fileupload',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\FormJsonElement' => 
    array (
      'tx_form_domain_model_json_form' => 'tx_form_domain_model_json_form',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\HeaderJsonElement' => 
    array (
      'tx_form_domain_model_json_header' => 'tx_form_domain_model_json_header',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\HiddenJsonElement' => 
    array (
      'tx_form_domain_model_json_hidden' => 'tx_form_domain_model_json_hidden',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\NameJsonElement' => 
    array (
      'tx_form_domain_model_json_name' => 'tx_form_domain_model_json_name',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\PasswordJsonElement' => 
    array (
      'tx_form_domain_model_json_password' => 'tx_form_domain_model_json_password',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\RadioGroupJsonElement' => 
    array (
      'tx_form_domain_model_json_radiogroup' => 'tx_form_domain_model_json_radiogroup',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\RadioJsonElement' => 
    array (
      'tx_form_domain_model_json_radio' => 'tx_form_domain_model_json_radio',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\ResetJsonElement' => 
    array (
      'tx_form_domain_model_json_reset' => 'tx_form_domain_model_json_reset',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\SelectJsonElement' => 
    array (
      'tx_form_domain_model_json_select' => 'tx_form_domain_model_json_select',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\SubmitJsonElement' => 
    array (
      'tx_form_domain_model_json_submit' => 'tx_form_domain_model_json_submit',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\TextareaJsonElement' => 
    array (
      'tx_form_domain_model_json_textarea' => 'tx_form_domain_model_json_textarea',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\TextblockJsonElement' => 
    array (
      'tx_form_domain_model_json_textblock' => 'tx_form_domain_model_json_textblock',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Model\\Json\\TextlineJsonElement' => 
    array (
      'tx_form_domain_model_json_textline' => 'tx_form_domain_model_json_textline',
    ),
    'TYPO3\\CMS\\Form\\Domain\\Repository\\ContentRepository' => 
    array (
      'tx_form_domain_repository_content' => 'tx_form_domain_repository_content',
    ),
    'TYPO3\\CMS\\Form\\Utility\\TypoScriptToJsonConverter' => 
    array (
      'tx_form_domain_factory_typoscripttojson' => 'tx_form_domain_factory_typoscripttojson',
    ),
    'TYPO3\\CMS\\Form\\ElementCounter' => 
    array (
      'tx_form_system_elementcounter' => 'tx_form_system_elementcounter',
    ),
    'TYPO3\\CMS\\Form\\Filter\\AlphabeticFilter' => 
    array (
      'tx_form_system_filter_alphabetic' => 'tx_form_system_filter_alphabetic',
    ),
    'TYPO3\\CMS\\Form\\Filter\\AlphanumericFilter' => 
    array (
      'tx_form_system_filter_alphanumeric' => 'tx_form_system_filter_alphanumeric',
    ),
    'TYPO3\\CMS\\Form\\Filter\\CurrencyFilter' => 
    array (
      'tx_form_system_filter_currency' => 'tx_form_system_filter_currency',
    ),
    'TYPO3\\CMS\\Form\\Filter\\DigitFilter' => 
    array (
      'tx_form_system_filter_digit' => 'tx_form_system_filter_digit',
    ),
    'TYPO3\\CMS\\Form\\Filter\\FilterInterface' => 
    array (
      'tx_form_system_filter_interface' => 'tx_form_system_filter_interface',
    ),
    'TYPO3\\CMS\\Form\\Filter\\IntegerFilter' => 
    array (
      'tx_form_system_filter_integer' => 'tx_form_system_filter_integer',
    ),
    'TYPO3\\CMS\\Form\\Filter\\LowerCaseFilter' => 
    array (
      'tx_form_system_filter_lowercase' => 'tx_form_system_filter_lowercase',
    ),
    'TYPO3\\CMS\\Form\\Filter\\RegExpFilter' => 
    array (
      'tx_form_system_filter_regexp' => 'tx_form_system_filter_regexp',
    ),
    'TYPO3\\CMS\\Form\\Filter\\RemoveXssFilter' => 
    array (
      'tx_form_system_filter_removexss' => 'tx_form_system_filter_removexss',
    ),
    'TYPO3\\CMS\\Form\\Filter\\StripNewLinesFilter' => 
    array (
      'tx_form_system_filter_stripnewlines' => 'tx_form_system_filter_stripnewlines',
    ),
    'TYPO3\\CMS\\Form\\Filter\\TitleCaseFilter' => 
    array (
      'tx_form_system_filter_titlecase' => 'tx_form_system_filter_titlecase',
    ),
    'TYPO3\\CMS\\Form\\Filter\\TrimFilter' => 
    array (
      'tx_form_system_filter_trim' => 'tx_form_system_filter_trim',
    ),
    'TYPO3\\CMS\\Form\\Filter\\UpperCaseFilter' => 
    array (
      'tx_form_system_filter_uppercase' => 'tx_form_system_filter_uppercase',
    ),
    'TYPO3\\CMS\\Form\\Utility\\FilterUtility' => 
    array (
      'tx_form_system_filter' => 'tx_form_system_filter',
    ),
    'TYPO3\\CMS\\Form\\Layout' => 
    array (
      'tx_form_system_layout' => 'tx_form_system_layout',
    ),
    'TYPO3\\CMS\\Form\\Localization' => 
    array (
      'tx_form_system_localization' => 'tx_form_system_localization',
    ),
    'TYPO3\\CMS\\Form\\PostProcess\\MailPostProcessor' => 
    array (
      'tx_form_system_postprocessor_mail' => 'tx_form_system_postprocessor_mail',
    ),
    'TYPO3\\CMS\\Form\\PostProcess\\PostProcessor' => 
    array (
      'tx_form_system_postprocessor' => 'tx_form_system_postprocessor',
    ),
    'TYPO3\\CMS\\Form\\PostProcess\\PostProcessorInterface' => 
    array (
      'tx_form_system_postprocessor_interface' => 'tx_form_system_postprocessor_interface',
    ),
    'TYPO3\\CMS\\Form\\Request' => 
    array (
      'tx_form_system_request' => 'tx_form_system_request',
    ),
    'TYPO3\\CMS\\Form\\Utility\\FormUtility' => 
    array (
      'tx_form_common' => 'tx_form_common',
    ),
    'TYPO3\\CMS\\Form\\Utility\\ValidatorUtility' => 
    array (
      'tx_form_system_validate' => 'tx_form_system_validate',
    ),
    'TYPO3\\CMS\\Form\\Validation\\AbstractValidator' => 
    array (
      'tx_form_system_validate_abstract' => 'tx_form_system_validate_abstract',
    ),
    'TYPO3\\CMS\\Form\\Validation\\AlphabeticValidator' => 
    array (
      'tx_form_system_validate_alphabetic' => 'tx_form_system_validate_alphabetic',
    ),
    'TYPO3\\CMS\\Form\\Validation\\AlphanumericValidator' => 
    array (
      'tx_form_system_validate_alphanumeric' => 'tx_form_system_validate_alphanumeric',
    ),
    'TYPO3\\CMS\\Form\\Validation\\BetweenValidator' => 
    array (
      'tx_form_system_validate_between' => 'tx_form_system_validate_between',
    ),
    'TYPO3\\CMS\\Form\\Validation\\DateValidator' => 
    array (
      'tx_form_system_validate_date' => 'tx_form_system_validate_date',
    ),
    'TYPO3\\CMS\\Form\\Validation\\DigitValidator' => 
    array (
      'tx_form_system_validate_digit' => 'tx_form_system_validate_digit',
    ),
    'TYPO3\\CMS\\Form\\Validation\\EmailValidator' => 
    array (
      'tx_form_system_validate_email' => 'tx_form_system_validate_email',
    ),
    'TYPO3\\CMS\\Form\\Validation\\EqualsValidator' => 
    array (
      'tx_form_system_validate_equals' => 'tx_form_system_validate_equals',
    ),
    'TYPO3\\CMS\\Form\\Validation\\FileAllowedTypesValidator' => 
    array (
      'tx_form_system_validate_fileallowedtypes' => 'tx_form_system_validate_fileallowedtypes',
    ),
    'TYPO3\\CMS\\Form\\Validation\\FileMaximumSizeValidator' => 
    array (
      'tx_form_system_validate_filemaximumsize' => 'tx_form_system_validate_filemaximumsize',
    ),
    'TYPO3\\CMS\\Form\\Validation\\FileMinimumSizeValidator' => 
    array (
      'tx_form_system_validate_fileminimumsize' => 'tx_form_system_validate_fileminimumsize',
    ),
    'TYPO3\\CMS\\Form\\Validation\\FloatValidator' => 
    array (
      'tx_form_system_validate_float' => 'tx_form_system_validate_float',
    ),
    'TYPO3\\CMS\\Form\\Validation\\GreaterThanValidator' => 
    array (
      'tx_form_system_validate_greaterthan' => 'tx_form_system_validate_greaterthan',
    ),
    'TYPO3\\CMS\\Form\\Validation\\InArrayValidator' => 
    array (
      'tx_form_system_validate_inarray' => 'tx_form_system_validate_inarray',
    ),
    'TYPO3\\CMS\\Form\\Validation\\IntegerValidator' => 
    array (
      'tx_form_system_validate_integer' => 'tx_form_system_validate_integer',
    ),
    'TYPO3\\CMS\\Form\\Validation\\ValidatorInterface' => 
    array (
      'tx_form_system_validate_interface' => 'tx_form_system_validate_interface',
    ),
    'TYPO3\\CMS\\Form\\Validation\\IpValidator' => 
    array (
      'tx_form_system_validate_ip' => 'tx_form_system_validate_ip',
    ),
    'TYPO3\\CMS\\Form\\Validation\\LengthValidator' => 
    array (
      'tx_form_system_validate_length' => 'tx_form_system_validate_length',
    ),
    'TYPO3\\CMS\\Form\\Validation\\LessthanValidator' => 
    array (
      'tx_form_system_validate_lessthan' => 'tx_form_system_validate_lessthan',
    ),
    'TYPO3\\CMS\\Form\\Validation\\RegExpValidator' => 
    array (
      'tx_form_system_validate_regexp' => 'tx_form_system_validate_regexp',
    ),
    'TYPO3\\CMS\\Form\\Validation\\RequiredValidator' => 
    array (
      'tx_form_system_validate_required' => 'tx_form_system_validate_required',
    ),
    'TYPO3\\CMS\\Form\\Validation\\UriValidator' => 
    array (
      'tx_form_system_validate_uri' => 'tx_form_system_validate_uri',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Additional\\AdditionalElementView' => 
    array (
      'tx_form_view_confirmation_additional' => 'tx_form_view_confirmation_additional',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Additional\\LabelAdditionalElementView' => 
    array (
      'tx_form_view_confirmation_additional_label' => 'tx_form_view_confirmation_additional_label',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Additional\\LegendAdditionalElementView' => 
    array (
      'tx_form_view_confirmation_additional_legend' => 'tx_form_view_confirmation_additional_legend',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\ConfirmationView' => 
    array (
      'tx_form_view_confirmation' => 'tx_form_view_confirmation',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\AbstractElementView' => 
    array (
      'tx_form_view_confirmation_element_abstract' => 'tx_form_view_confirmation_element_abstract',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\CheckboxElementView' => 
    array (
      'tx_form_view_confirmation_element_checkbox' => 'tx_form_view_confirmation_element_checkbox',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\CheckboxGroupElementView' => 
    array (
      'tx_form_view_confirmation_element_checkboxgroup' => 'tx_form_view_confirmation_element_checkboxgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\ContainerElementView' => 
    array (
      'tx_form_view_confirmation_element_container' => 'tx_form_view_confirmation_element_container',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\FieldsetElementView' => 
    array (
      'tx_form_view_confirmation_element_fieldset' => 'tx_form_view_confirmation_element_fieldset',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\FileuploadElementView' => 
    array (
      'tx_form_view_confirmation_element_fileupload' => 'tx_form_view_confirmation_element_fileupload',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\OptgroupElementView' => 
    array (
      'tx_form_view_confirmation_element_optgroup' => 'tx_form_view_confirmation_element_optgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\OptionElementView' => 
    array (
      'tx_form_view_confirmation_element_option' => 'tx_form_view_confirmation_element_option',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\RadioElementView' => 
    array (
      'tx_form_view_confirmation_element_radio' => 'tx_form_view_confirmation_element_radio',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\RadioGroupElementView' => 
    array (
      'tx_form_view_confirmation_element_radiogroup' => 'tx_form_view_confirmation_element_radiogroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\SelectElementView' => 
    array (
      'tx_form_view_confirmation_element_select' => 'tx_form_view_confirmation_element_select',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\TextareaElementView' => 
    array (
      'tx_form_view_confirmation_element_textarea' => 'tx_form_view_confirmation_element_textarea',
    ),
    'TYPO3\\CMS\\Form\\View\\Confirmation\\Element\\TextlineElementView' => 
    array (
      'tx_form_view_confirmation_element_textline' => 'tx_form_view_confirmation_element_textline',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Additional\\AdditionalElementView' => 
    array (
      'tx_form_view_form_additional' => 'tx_form_view_form_additional',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Additional\\ErrorAdditionalElementView' => 
    array (
      'tx_form_view_form_additional_error' => 'tx_form_view_form_additional_error',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Additional\\LabelAdditionalElementView' => 
    array (
      'tx_form_view_form_additional_label' => 'tx_form_view_form_additional_label',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Additional\\LegendAdditionalElementView' => 
    array (
      'tx_form_view_form_additional_legend' => 'tx_form_view_form_additional_legend',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Additional\\MandatoryAdditionalElementView' => 
    array (
      'tx_form_view_form_additional_mandatory' => 'tx_form_view_form_additional_mandatory',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\AbstractElementView' => 
    array (
      'tx_form_view_form_element_abstract' => 'tx_form_view_form_element_abstract',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\ButtonElementView' => 
    array (
      'tx_form_view_form_element_button' => 'tx_form_view_form_element_button',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\CheckboxElementView' => 
    array (
      'tx_form_view_form_element_checkbox' => 'tx_form_view_form_element_checkbox',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\CheckboxGroupElementView' => 
    array (
      'tx_form_view_form_element_checkboxgroup' => 'tx_form_view_form_element_checkboxgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\ContainerElementView' => 
    array (
      'tx_form_view_form_element_container' => 'tx_form_view_form_element_container',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\ContentElementView' => 
    array (
      'tx_form_view_form_element_content' => 'tx_form_view_form_element_content',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\FieldsetElementView' => 
    array (
      'tx_form_view_form_element_fieldset' => 'tx_form_view_form_element_fieldset',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\FileuploadElementView' => 
    array (
      'tx_form_view_form_element_fileupload' => 'tx_form_view_form_element_fileupload',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\HeaderElementView' => 
    array (
      'tx_form_view_form_element_header' => 'tx_form_view_form_element_header',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\HiddenElementView' => 
    array (
      'tx_form_view_form_element_hidden' => 'tx_form_view_form_element_hidden',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\ImagebuttonElementView' => 
    array (
      'tx_form_view_form_element_imagebutton' => 'tx_form_view_form_element_imagebutton',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\OptgroupElementView' => 
    array (
      'tx_form_view_form_element_optgroup' => 'tx_form_view_form_element_optgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\OptionElementView' => 
    array (
      'tx_form_view_form_element_option' => 'tx_form_view_form_element_option',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\PasswordElementView' => 
    array (
      'tx_form_view_form_element_password' => 'tx_form_view_form_element_password',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\RadioElementView' => 
    array (
      'tx_form_view_form_element_radio' => 'tx_form_view_form_element_radio',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\RadioGroupElementView' => 
    array (
      'tx_form_view_form_element_radiogroup' => 'tx_form_view_form_element_radiogroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\ResetElementView' => 
    array (
      'tx_form_view_form_element_reset' => 'tx_form_view_form_element_reset',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\SelectElementView' => 
    array (
      'tx_form_view_form_element_select' => 'tx_form_view_form_element_select',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\SubmitElementView' => 
    array (
      'tx_form_view_form_element_submit' => 'tx_form_view_form_element_submit',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\TextareaElementView' => 
    array (
      'tx_form_view_form_element_textarea' => 'tx_form_view_form_element_textarea',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\TextblockElementView' => 
    array (
      'tx_form_view_form_element_textblock' => 'tx_form_view_form_element_textblock',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\Element\\TextlineElementView' => 
    array (
      'tx_form_view_form_element_textline' => 'tx_form_view_form_element_textline',
    ),
    'TYPO3\\CMS\\Form\\View\\Form\\FormView' => 
    array (
      'tx_form_view_form' => 'tx_form_view_form',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Additional\\AdditionalElementView' => 
    array (
      'tx_form_view_mail_html_additional' => 'tx_form_view_mail_html_additional',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Additional\\LabelAdditionalElementView' => 
    array (
      'tx_form_view_mail_html_additional_label' => 'tx_form_view_mail_html_additional_label',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Additional\\LegendAdditionalElementView' => 
    array (
      'tx_form_view_mail_html_additional_legend' => 'tx_form_view_mail_html_additional_legend',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\AbstractElementView' => 
    array (
      'tx_form_view_mail_html_element_abstract' => 'tx_form_view_mail_html_element_abstract',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\CheckboxElementView' => 
    array (
      'tx_form_view_mail_html_element_checkbox' => 'tx_form_view_mail_html_element_checkbox',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\CheckboxGroupElementView' => 
    array (
      'tx_form_view_mail_html_element_checkboxgroup' => 'tx_form_view_mail_html_element_checkboxgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\ContainerElementView' => 
    array (
      'tx_form_view_mail_html_element_container' => 'tx_form_view_mail_html_element_container',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\FieldsetElementView' => 
    array (
      'tx_form_view_mail_html_element_fieldset' => 'tx_form_view_mail_html_element_fieldset',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\FileuploadElementView' => 
    array (
      'tx_form_view_mail_html_element_fileupload' => 'tx_form_view_mail_html_element_fileupload',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\HiddenElementView' => 
    array (
      'tx_form_view_mail_html_element_hidden' => 'tx_form_view_mail_html_element_hidden',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\OptgroupElementView' => 
    array (
      'tx_form_view_mail_html_element_optgroup' => 'tx_form_view_mail_html_element_optgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\OptionElementView' => 
    array (
      'tx_form_view_mail_html_element_option' => 'tx_form_view_mail_html_element_option',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\RadioElementView' => 
    array (
      'tx_form_view_mail_html_element_radio' => 'tx_form_view_mail_html_element_radio',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\RadioGroupElementView' => 
    array (
      'tx_form_view_mail_html_element_radiogroup' => 'tx_form_view_mail_html_element_radiogroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\SelectElementView' => 
    array (
      'tx_form_view_mail_html_element_select' => 'tx_form_view_mail_html_element_select',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\TextareaElementView' => 
    array (
      'tx_form_view_mail_html_element_textarea' => 'tx_form_view_mail_html_element_textarea',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\Element\\TextlineElementView' => 
    array (
      'tx_form_view_mail_html_element_textline' => 'tx_form_view_mail_html_element_textline',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Html\\HtmlView' => 
    array (
      'tx_form_view_mail_html' => 'tx_form_view_mail_html',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\MailView' => 
    array (
      'tx_form_view_mail' => 'tx_form_view_mail',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\AbstractElementView' => 
    array (
      'tx_form_view_mail_plain_element_abstract' => 'tx_form_view_mail_plain_element_abstract',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\CheckboxElementView' => 
    array (
      'tx_form_view_mail_plain_element_checkbox' => 'tx_form_view_mail_plain_element_checkbox',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\CheckboxGroupElementView' => 
    array (
      'tx_form_view_mail_plain_element_checkboxgroup' => 'tx_form_view_mail_plain_element_checkboxgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\ContainerElementView' => 
    array (
      'tx_form_view_mail_plain_element_container' => 'tx_form_view_mail_plain_element_container',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\FieldsetElementView' => 
    array (
      'tx_form_view_mail_plain_element_fieldset' => 'tx_form_view_mail_plain_element_fieldset',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\FileuploadElementView' => 
    array (
      'tx_form_view_mail_plain_element_fileupload' => 'tx_form_view_mail_plain_element_fileupload',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\HiddenElementView' => 
    array (
      'tx_form_view_mail_plain_element_hidden' => 'tx_form_view_mail_plain_element_hidden',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\OptgroupElementView' => 
    array (
      'tx_form_view_mail_plain_element_optgroup' => 'tx_form_view_mail_plain_element_optgroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\OptionElementView' => 
    array (
      'tx_form_view_mail_plain_element_option' => 'tx_form_view_mail_plain_element_option',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\RadioElementView' => 
    array (
      'tx_form_view_mail_plain_element_radio' => 'tx_form_view_mail_plain_element_radio',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\RadioGroupElementView' => 
    array (
      'tx_form_view_mail_plain_element_radiogroup' => 'tx_form_view_mail_plain_element_radiogroup',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\SelectElementView' => 
    array (
      'tx_form_view_mail_plain_element_select' => 'tx_form_view_mail_plain_element_select',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\TextareaElementView' => 
    array (
      'tx_form_view_mail_plain_element_textarea' => 'tx_form_view_mail_plain_element_textarea',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\Element\\TextlineElementView' => 
    array (
      'tx_form_view_mail_plain_element_textline' => 'tx_form_view_mail_plain_element_textline',
    ),
    'TYPO3\\CMS\\Form\\View\\Mail\\Plain\\PlainView' => 
    array (
      'tx_form_view_mail_plain' => 'tx_form_view_mail_plain',
    ),
    'TYPO3\\CMS\\Form\\View\\Wizard\\AbstractWizardView' => 
    array (
      'tx_form_view_wizard_abstract' => 'tx_form_view_wizard_abstract',
    ),
    'TYPO3\\CMS\\Form\\View\\Wizard\\LoadWizardView' => 
    array (
      'tx_form_view_wizard_load' => 'tx_form_view_wizard_load',
    ),
    'TYPO3\\CMS\\Form\\View\\Wizard\\SaveWizardView' => 
    array (
      'tx_form_view_wizard_save' => 'tx_form_view_wizard_save',
    ),
    'TYPO3\\CMS\\Form\\View\\Wizard\\WizardView' => 
    array (
      'tx_form_view_wizard_wizard' => 'tx_form_view_wizard_wizard',
    ),
    'TYPO3\\CMS\\Frontend\\Authentication\\FrontendUserAuthentication' => 
    array (
      'tslib_feuserauth' => 'tslib_feuserauth',
    ),
    'TYPO3\\CMS\\Frontend\\Configuration\\TypoScript\\ConditionMatching\\ConditionMatcher' => 
    array (
      't3lib_matchcondition_frontend' => 't3lib_matchcondition_frontend',
    ),
    'TYPO3\\CMS\\Compatibility6\\Controller\\FormDataSubmissionController' => 
    array (
      't3lib_formmail' => 't3lib_formmail',
      'typo3\\cms\\frontend\\controller\\datasubmissioncontroller' => 'typo3\\cms\\frontend\\controller\\datasubmissioncontroller',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\AbstractContentObject' => 
    array (
      'tslib_content_abstract' => 'tslib_content_abstract',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\CaseContentObject' => 
    array (
      'tslib_content_case' => 'tslib_content_case',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\ClearGifContentObject' => 
    array (
      'tslib_content_cleargif' => 'tslib_content_cleargif',
      'typo3\\cms\\frontend\\contentobject\\cleargifcontentobject' => 'typo3\\cms\\frontend\\contentobject\\cleargifcontentobject',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\ColumnsContentObject' => 
    array (
      'tslib_content_columns' => 'tslib_content_columns',
      'typo3\\cms\\frontend\\contentobject\\columnscontentobject' => 'typo3\\cms\\frontend\\contentobject\\columnscontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentContentObject' => 
    array (
      'tslib_content_content' => 'tslib_content_content',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectArrayContentObject' => 
    array (
      'tslib_content_contentobjectarray' => 'tslib_content_contentobjectarray',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectArrayInternalContentObject' => 
    array (
      'tslib_content_contentobjectarrayinternal' => 'tslib_content_contentobjectarrayinternal',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetDataHookInterface' => 
    array (
      'tslib_content_getdatahook' => 'tslib_content_getdatahook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetImageResourceHookInterface' => 
    array (
      'tslib_cobj_getimgresourcehook' => 'tslib_cobj_getimgresourcehook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetPublicUrlForFileHookInterface' => 
    array (
      'tslib_content_getpublicurlforfilehook' => 'tslib_content_getpublicurlforfilehook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectGetSingleHookInterface' => 
    array (
      'tslib_content_cobjgetsinglehook' => 'tslib_content_cobjgetsinglehook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectPostInitHookInterface' => 
    array (
      'tslib_content_postinithook' => 'tslib_content_postinithook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer' => 
    array (
      'tslib_cobj' => 'tslib_cobj',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectStdWrapHookInterface' => 
    array (
      'tslib_content_stdwraphook' => 'tslib_content_stdwraphook',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\ContentTableContentObject' => 
    array (
      'tslib_content_contenttable' => 'tslib_content_contenttable',
      'typo3\\cms\\frontend\\contentobject\\contenttablecontentobject' => 'typo3\\cms\\frontend\\contentobject\\contenttablecontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\EditPanelContentObject' => 
    array (
      'tslib_content_editpanel' => 'tslib_content_editpanel',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\FileContentObject' => 
    array (
      'tslib_content_file' => 'tslib_content_file',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\FileLinkHookInterface' => 
    array (
      'tslib_content_filelinkhook' => 'tslib_content_filelinkhook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\FilesContentObject' => 
    array (
      'tslib_content_files' => 'tslib_content_files',
    ),
    'TYPO3\\CMS\\Mediace\\ContentObject\\FlowPlayerContentObject' => 
    array (
      'tslib_content_flowplayer' => 'tslib_content_flowplayer',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\FluidTemplateContentObject' => 
    array (
      'tslib_content_fluidtemplate' => 'tslib_content_fluidtemplate',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\FormContentObject' => 
    array (
      'tslib_content_form' => 'tslib_content_form',
      'typo3\\cms\\frontend\\contentobject\\formcontentobject' => 'typo3\\cms\\frontend\\contentobject\\formcontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\HierarchicalMenuContentObject' => 
    array (
      'tslib_content_hierarchicalmenu' => 'tslib_content_hierarchicalmenu',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\HorizontalRulerContentObject' => 
    array (
      'tslib_content_horizontalruler' => 'tslib_content_horizontalruler',
      'typo3\\cms\\frontend\\contentobject\\horizontalrulercontentobject' => 'typo3\\cms\\frontend\\contentobject\\horizontalrulercontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ImageContentObject' => 
    array (
      'tslib_content_image' => 'tslib_content_image',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ImageResourceContentObject' => 
    array (
      'tslib_content_imageresource' => 'tslib_content_imageresource',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\ImageTextContentObject' => 
    array (
      'tslib_content_imagetext' => 'tslib_content_imagetext',
      'typo3\\cms\\frontend\\contentobject\\imagetextcontentobject' => 'typo3\\cms\\frontend\\contentobject\\imagetextcontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\LoadRegisterContentObject' => 
    array (
      'tslib_content_loadregister' => 'tslib_content_loadregister',
    ),
    'TYPO3\\CMS\\Mediace\\ContentObject\\MediaContentObject' => 
    array (
      'tslib_content_media' => 'tslib_content_media',
      'typo3\\cms\\frontend\\contentobject\\mediacontentobject' => 'typo3\\cms\\frontend\\contentobject\\mediacontentobject',
    ),
    'TYPO3\\CMS\\Mediace\\ContentObject\\MultimediaContentObject' => 
    array (
      'tslib_content_multimedia' => 'tslib_content_multimedia',
      'typo3\\cms\\frontend\\contentobject\\multimediacontentobject' => 'typo3\\cms\\frontend\\contentobject\\multimediacontentobject',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\OffsetTableContentObject' => 
    array (
      'tslib_content_offsettable' => 'tslib_content_offsettable',
      'tslib_tableoffset' => 'tslib_tableoffset',
      'typo3\\cms\\frontend\\contentobject\\offsettablecontentobject' => 'typo3\\cms\\frontend\\contentobject\\offsettablecontentobject',
    ),
    'TYPO3\\CMS\\Mediace\\ContentObject\\QuicktimeObjectContentObject' => 
    array (
      'tslib_content_quicktimeobject' => 'tslib_content_quicktimeobject',
      'typo3\\cms\\frontend\\contentobject\\quicktimeobjectcontentobject' => 'typo3\\cms\\frontend\\contentobject\\quicktimeobjectcontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\RecordsContentObject' => 
    array (
      'tslib_content_records' => 'tslib_content_records',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\RestoreRegisterContentObject' => 
    array (
      'tslib_content_restoreregister' => 'tslib_content_restoreregister',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\ScalableVectorGraphicsContentObject' => 
    array (
      'tslib_content_scalablevectorgraphics' => 'tslib_content_scalablevectorgraphics',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\SearchResultContentObject' => 
    array (
      'tslib_content_searchresult' => 'tslib_content_searchresult',
      'tslib_search' => 'tslib_search',
      'typo3\\cms\\frontend\\contentobject\\searchresultcontentobject' => 'typo3\\cms\\frontend\\contentobject\\searchresultcontentobject',
    ),
    'TYPO3\\CMS\\Mediace\\ContentObject\\ShockwaveFlashObjectContentObject' => 
    array (
      'tslib_content_shockwaveflashobject' => 'tslib_content_shockwaveflashobject',
      'typo3\\cms\\frontend\\contentobject\\shockwaveflashobjectcontentobject' => 'typo3\\cms\\frontend\\contentobject\\shockwaveflashobjectcontentobject',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\TemplateContentObject' => 
    array (
      'tslib_content_template' => 'tslib_content_template',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\TextContentObject' => 
    array (
      'tslib_content_text' => 'tslib_content_text',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\UserContentObject' => 
    array (
      'tslib_content_user' => 'tslib_content_user',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\UserInternalContentObject' => 
    array (
      'tslib_content_userinternal' => 'tslib_content_userinternal',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\AbstractMenuContentObject' => 
    array (
      'tslib_menu' => 'tslib_menu',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\AbstractMenuFilterPagesHookInterface' => 
    array (
      'tslib_menu_filtermenupageshook' => 'tslib_menu_filtermenupageshook',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\GraphicalMenuContentObject' => 
    array (
      'tslib_gmenu' => 'tslib_gmenu',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\ImageMenuContentObject' => 
    array (
      'tslib_imgmenu' => 'tslib_imgmenu',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\JavaScriptMenuContentObject' => 
    array (
      'tslib_jsmenu' => 'tslib_jsmenu',
    ),
    'TYPO3\\CMS\\Frontend\\ContentObject\\Menu\\TextMenuContentObject' => 
    array (
      'tslib_tmenu' => 'tslib_tmenu',
    ),
    'TYPO3\\CMS\\Compatibility6\\ContentObject\\TableRenderer' => 
    array (
      'tslib_controltable' => 'tslib_controltable',
    ),
    'TYPO3\\CMS\\Frontend\\Controller\\ExtDirectEidController' => 
    array (
      'tslib_extdirecteid' => 'tslib_extdirecteid',
    ),
    'TYPO3\\CMS\\Frontend\\Controller\\PageInformationController' => 
    array (
      'tx_cms_webinfo_page' => 'tx_cms_webinfo_page',
    ),
    'TYPO3\\CMS\\Frontend\\Controller\\ShowImageController' => 
    array (
      'sc_tslib_showpic' => 'sc_tslib_showpic',
    ),
    'TYPO3\\CMS\\Frontend\\Controller\\TranslationStatusController' => 
    array (
      'tx_cms_webinfo_lang' => 'tx_cms_webinfo_lang',
    ),
    'TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController' => 
    array (
      'tslib_fe' => 'tslib_fe',
    ),
    'TYPO3\\CMS\\Frontend\\Hooks\\FrontendHooks' => 
    array (
      'tx_cms_fehooks' => 'tx_cms_fehooks',
    ),
    'TYPO3\\CMS\\Frontend\\Hooks\\MediaItemHooks' => 
    array (
      'tx_cms_mediaitems' => 'tx_cms_mediaitems',
    ),
    'TYPO3\\CMS\\Frontend\\Hooks\\TreelistCacheUpdateHooks' => 
    array (
      'tx_cms_treelistcacheupdate' => 'tx_cms_treelistcacheupdate',
    ),
    'TYPO3\\CMS\\Frontend\\Imaging\\GifBuilder' => 
    array (
      'tslib_gifbuilder' => 'tslib_gifbuilder',
    ),
    'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProvider' => 
    array (
      'tslib_mediawizardcoreprovider' => 'tslib_mediawizardcoreprovider',
      'typo3\\cms\\frontend\\mediawizard\\mediawizardprovider' => 'typo3\\cms\\frontend\\mediawizard\\mediawizardprovider',
    ),
    'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProviderInterface' => 
    array (
      'tslib_mediawizardprovider' => 'tslib_mediawizardprovider',
      'typo3\\cms\\frontend\\mediawizard\\mediawizardproviderinterface' => 'typo3\\cms\\frontend\\mediawizard\\mediawizardproviderinterface',
    ),
    'TYPO3\\CMS\\Mediace\\MediaWizard\\MediaWizardProviderManager' => 
    array (
      'tslib_mediawizardmanager' => 'tslib_mediawizardmanager',
      'typo3\\cms\\frontend\\mediawizard\\mediawizardprovidermanager' => 'typo3\\cms\\frontend\\mediawizard\\mediawizardprovidermanager',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\CacheHashCalculator' => 
    array (
      't3lib_cachehash' => 't3lib_cachehash',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\FramesetRenderer' => 
    array (
      'tslib_frameset' => 'tslib_frameset',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\PageGenerator' => 
    array (
      'tspagegen' => 'tspagegen',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\PageRepository' => 
    array (
      't3lib_pageselect' => 't3lib_pageselect',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\PageRepositoryGetPageHookInterface' => 
    array (
      't3lib_pageselect_getpagehook' => 't3lib_pageselect_getpagehook',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\PageRepositoryGetPageOverlayHookInterface' => 
    array (
      't3lib_pageselect_getpageoverlayhook' => 't3lib_pageselect_getpageoverlayhook',
    ),
    'TYPO3\\CMS\\Frontend\\Page\\PageRepositoryGetRecordOverlayHookInterface' => 
    array (
      't3lib_pageselect_getrecordoverlayhook' => 't3lib_pageselect_getrecordoverlayhook',
    ),
    'TYPO3\\CMS\\Frontend\\Plugin\\AbstractPlugin' => 
    array (
      'tslib_pibase' => 'tslib_pibase',
    ),
    'TYPO3\\CMS\\Frontend\\Utility\\CompressionUtility' => 
    array (
      'tslib_fecompression' => 'tslib_fecompression',
    ),
    'TYPO3\\CMS\\Frontend\\Utility\\EidUtility' => 
    array (
      'tslib_eidtools' => 'tslib_eidtools',
    ),
    'TYPO3\\CMS\\Frontend\\View\\AdminPanelView' => 
    array (
      'tslib_adminpanel' => 'tslib_adminpanel',
    ),
    'TYPO3\\CMS\\Frontend\\View\\AdminPanelViewHookInterface' => 
    array (
      'tslib_adminpanelhook' => 'tslib_adminpanelhook',
    ),
    'TYPO3\\CMS\\Func\\Controller\\PageFunctionsController' => 
    array (
      'sc_mod_web_func_index' => 'sc_mod_web_func_index',
    ),
    'TYPO3\\CMS\\Compatibility6\\Controller\\WebFunctionWizardsBaseController' => 
    array (
      'tx_funcwizards_webfunc' => 'tx_funcwizards_webfunc',
      'typo3\\cms\\funcwizards\\controller\\webfunctionwizardsbasecontroller' => 'typo3\\cms\\funcwizards\\controller\\webfunctionwizardsbasecontroller',
    ),
    'TYPO3\\CMS\\Impexp\\Clickmenu' => 
    array (
      'tx_impexp_clickmenu' => 'tx_impexp_clickmenu',
    ),
    'TYPO3\\CMS\\Impexp\\Controller\\ImportExportController' => 
    array (
      'sc_mod_tools_log_index' => 'sc_mod_tools_log_index',
    ),
    'TYPO3\\CMS\\Impexp\\ImportExport' => 
    array (
      'tx_impexp' => 'tx_impexp',
    ),
    'TYPO3\\CMS\\Impexp\\LocalPageTree' => 
    array (
      'tx_impexp_localpagetree' => 'tx_impexp_localpagetree',
    ),
    'TYPO3\\CMS\\Impexp\\Task\\ImportExportTask' => 
    array (
      'tx_impexp_task' => 'tx_impexp_task',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Domain\\Repository\\IndexSearchRepository' => 
    array (
      'tx_indexedsearch_domain_repository_indexsearchrepository' => 'tx_indexedsearch_domain_repository_indexsearchrepository',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerFilesHook' => 
    array (
      'tx_indexedsearch_files' => 'tx_indexedsearch_files',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Hook\\CrawlerHook' => 
    array (
      'tx_indexedsearch_crawler' => 'tx_indexedsearch_crawler',
    ),
    'TYPO3\\CMS\\IndexedSearchMysql\\Hook\\MysqlFulltextIndexHook' => 
    array (
      'tx_indexedsearch_mysql' => 'tx_indexedsearch_mysql',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Hook\\TypoScriptFrontendHook' => 
    array (
      'tx_indexedsearch_tslib_fe_hook' => 'tx_indexedsearch_tslib_fe_hook',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Indexer' => 
    array (
      'tx_indexedsearch_indexer' => 'tx_indexedsearch_indexer',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Lexer' => 
    array (
      'tx_indexedsearch_lexer' => 'tx_indexedsearch_lexer',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Utility\\IndexedSearchUtility' => 
    array (
      'tx_indexedsearch_util' => 'tx_indexedsearch_util',
    ),
    'TYPO3\\CMS\\IndexedSearch\\FileContentParser' => 
    array (
      'tx_indexed_search_extparse' => 'tx_indexed_search_extparse',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Utility\\DoubleMetaPhoneUtility' => 
    array (
      'user_doublemetaphone' => 'user_doublemetaphone',
    ),
    'TYPO3\\CMS\\IndexedSearch\\ViewHelpers\\PageBrowsingResultsViewHelper' => 
    array (
      'tx_indexedsearch_viewhelpers_pagebrowsingresultsviewhelper' => 'tx_indexedsearch_viewhelpers_pagebrowsingresultsviewhelper',
    ),
    'TYPO3\\CMS\\IndexedSearch\\ViewHelpers\\PageBrowsingViewHelper' => 
    array (
      'tx_indexedsearch_viewhelpers_pagebrowsingviewhelper' => 'tx_indexedsearch_viewhelpers_pagebrowsingviewhelper',
    ),
    'TYPO3\\CMS\\Info\\Controller\\InfoModuleController' => 
    array (
      'sc_mod_web_info_index' => 'sc_mod_web_info_index',
    ),
    'TYPO3\\CMS\\InfoPagetsconfig\\Controller\\InfoPageTyposcriptConfigController' => 
    array (
      'tx_infopagetsconfig_webinfo' => 'tx_infopagetsconfig_webinfo',
    ),
    'TYPO3\\CMS\\Install\\Updates\\CompatVersionUpdate' => 
    array (
      'tx_coreupdates_compatversion' => 'tx_coreupdates_compatversion',
    ),
    'TYPO3\\CMS\\Install\\Service\\EnableFileService' => 
    array (
      'tx_install_service_basicservice' => 'tx_install_service_basicservice',
      'typo3\\cms\\install\\enablefileservice' => 'typo3\\cms\\install\\enablefileservice',
    ),
    'TYPO3\\CMS\\Install\\Report\\InstallStatusReport' => 
    array (
      'tx_install_report_installstatus' => 'tx_install_report_installstatus',
    ),
    'TYPO3\\CMS\\Install\\Service\\SessionService' => 
    array (
      'tx_install_session' => 'tx_install_session',
      'typo3\\cms\\install\\session' => 'typo3\\cms\\install\\session',
    ),
    'TYPO3\\CMS\\Install\\Service\\SqlSchemaMigrationService' => 
    array (
      't3lib_install_sql' => 't3lib_install_sql',
      'typo3\\cms\\install\\sql\\schemamigrator' => 'typo3\\cms\\install\\sql\\schemamigrator',
    ),
    'TYPO3\\CMS\\Install\\Updates\\AbstractUpdate' => 
    array (
      'tx_install_updates_base' => 'tx_install_updates_base',
    ),
    'TYPO3\\CMS\\Lang\\LanguageService' => 
    array (
      'language' => 'language',
    ),
    'TYPO3\\CMS\\Felogin\\Controller\\FrontendLoginController' => 
    array (
      'tx_felogin_pi1' => 'tx_felogin_pi1',
    ),
    'TYPO3\\CMS\\Linkvalidator\\LinkAnalyzer' => 
    array (
      'tx_linkvalidator_processor' => 'tx_linkvalidator_processor',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Linktype\\AbstractLinktype' => 
    array (
      'tx_linkvalidator_linktype_abstract' => 'tx_linkvalidator_linktype_abstract',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Linktype\\ExternalLinktype' => 
    array (
      'tx_linkvalidator_linktype_external' => 'tx_linkvalidator_linktype_external',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Linktype\\FileLinktype' => 
    array (
      'tx_linkvalidator_linktype_file' => 'tx_linkvalidator_linktype_file',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Linktype\\InternalLinktype' => 
    array (
      'tx_linkvalidator_linktype_internal' => 'tx_linkvalidator_linktype_internal',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Linktype\\LinkHandler' => 
    array (
      'tx_linkvalidator_linktype_linkhandler' => 'tx_linkvalidator_linktype_linkhandler',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Linktype\\LinktypeInterface' => 
    array (
      'tx_linkvalidator_linktype_interface' => 'tx_linkvalidator_linktype_interface',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Report\\LinkValidatorReport' => 
    array (
      'tx_linkvalidator_modfuncreport' => 'tx_linkvalidator_modfuncreport',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Task\\ValidatorTask' => 
    array (
      'tx_linkvalidator_tasks_validator' => 'tx_linkvalidator_tasks_validator',
    ),
    'TYPO3\\CMS\\Linkvalidator\\Task\\ValidatorTaskAdditionalFieldProvider' => 
    array (
      'tx_linkvalidator_tasks_validatoradditionalfieldprovider' => 'tx_linkvalidator_tasks_validatoradditionalfieldprovider',
    ),
    'TYPO3\\CMS\\Lowlevel\\AdminCommand' => 
    array (
      'tx_lowlevel_admin_core' => 'tx_lowlevel_admin_core',
    ),
    'TYPO3\\CMS\\Lowlevel\\CleanerCommand' => 
    array (
      'tx_lowlevel_cleaner_core' => 'tx_lowlevel_cleaner_core',
    ),
    'TYPO3\\CMS\\Lowlevel\\CleanFlexformCommand' => 
    array (
      'tx_lowlevel_cleanflexform' => 'tx_lowlevel_cleanflexform',
    ),
    'TYPO3\\CMS\\Lowlevel\\DeletedRecordsCommand' => 
    array (
      'tx_lowlevel_deleted' => 'tx_lowlevel_deleted',
    ),
    'TYPO3\\CMS\\Lowlevel\\DoubleFilesCommand' => 
    array (
      'tx_lowlevel_double_files' => 'tx_lowlevel_double_files',
    ),
    'TYPO3\\CMS\\Lowlevel\\LostFilesCommand' => 
    array (
      'tx_lowlevel_lost_files' => 'tx_lowlevel_lost_files',
    ),
    'TYPO3\\CMS\\Lowlevel\\MissingFilesCommand' => 
    array (
      'tx_lowlevel_missing_files' => 'tx_lowlevel_missing_files',
    ),
    'TYPO3\\CMS\\Lowlevel\\MissingRelationsCommand' => 
    array (
      'tx_lowlevel_missing_relations' => 'tx_lowlevel_missing_relations',
    ),
    'TYPO3\\CMS\\Lowlevel\\OrphanRecordsCommand' => 
    array (
      'tx_lowlevel_orphan_records' => 'tx_lowlevel_orphan_records',
    ),
    'TYPO3\\CMS\\Lowlevel\\RteImagesCommand' => 
    array (
      'tx_lowlevel_rte_images' => 'tx_lowlevel_rte_images',
    ),
    'TYPO3\\CMS\\Lowlevel\\SyslogCommand' => 
    array (
      'tx_lowlevel_syslog' => 'tx_lowlevel_syslog',
    ),
    'TYPO3\\CMS\\Lowlevel\\VersionsCommand' => 
    array (
      'tx_lowlevel_versions' => 'tx_lowlevel_versions',
    ),
    'TYPO3\\CMS\\Lowlevel\\Utility\\ArrayBrowser' => 
    array (
      't3lib_arraybrowser' => 't3lib_arraybrowser',
    ),
    'TYPO3\\CMS\\Lowlevel\\View\\ConfigurationView' => 
    array (
      'sc_mod_tools_config_index' => 'sc_mod_tools_config_index',
    ),
    'TYPO3\\CMS\\Lowlevel\\View\\DatabaseIntegrityView' => 
    array (
      'sc_mod_tools_dbint_index' => 'sc_mod_tools_dbint_index',
    ),
    'TYPO3\\CMS\\Openid\\OpenidEid' => 
    array (
      'tx_openid_eid' => 'tx_openid_eid',
    ),
    'TYPO3\\CMS\\Openid\\OpenidModuleSetup' => 
    array (
      'tx_openid_mod_setup' => 'tx_openid_mod_setup',
    ),
    'TYPO3\\CMS\\Openid\\OpenidService' => 
    array (
      'tx_openid_sv1' => 'tx_openid_sv1',
    ),
    'TYPO3\\CMS\\Openid\\OpenidStore' => 
    array (
      'tx_openid_store' => 'tx_openid_store',
    ),
    'TYPO3\\CMS\\Beuser\\Controller\\PermissionAjaxController' => 
    array (
      'sc_mod_web_perm_ajax' => 'sc_mod_web_perm_ajax',
    ),
    'TYPO3\\CMS\\Beuser\\Controller\\PermissionController' => 
    array (
      'sc_mod_web_perm_index' => 'sc_mod_web_perm_index',
    ),
    'TYPO3\\CMS\\Recordlist\\Browser\\ElementBrowser' => 
    array (
      'browse_links' => 'browse_links',
    ),
    'TYPO3\\CMS\\Recordlist\\Controller\\ElementBrowserController' => 
    array (
      'sc_browse_links' => 'sc_browse_links',
    ),
    'TYPO3\\CMS\\Recordlist\\Controller\\ElementBrowserFramesetController' => 
    array (
      'sc_browser' => 'sc_browser',
    ),
    'TYPO3\\CMS\\Recordlist\\RecordList' => 
    array (
      'sc_db_list' => 'sc_db_list',
    ),
    'TYPO3\\CMS\\Recordlist\\RecordList\\AbstractDatabaseRecordList' => 
    array (
      'recordlist' => 'recordlist',
    ),
    'TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList' => 
    array (
      'localrecordlist' => 'localrecordlist',
    ),
    'TYPO3\\CMS\\Recordlist\\RecordList\\RecordListHookInterface' => 
    array (
      'localrecordlist_actionshook' => 'localrecordlist_actionshook',
    ),
    'TYPO3\\CMS\\Recycler\\Controller\\DeletedRecordsController' => 
    array (
      'tx_recycler_view_deletedrecords' => 'tx_recycler_view_deletedrecords',
    ),
    'TYPO3\\CMS\\Recycler\\Controller\\RecyclerAjaxController' => 
    array (
      'tx_recycler_controller_ajax' => 'tx_recycler_controller_ajax',
    ),
    'TYPO3\\CMS\\Recycler\\Controller\\RecyclerModuleController' => 
    array (
      'tx_recycler_module1' => 'tx_recycler_module1',
    ),
    'TYPO3\\CMS\\Recycler\\Domain\\Model\\DeletedRecords' => 
    array (
      'tx_recycler_model_deletedrecords' => 'tx_recycler_model_deletedrecords',
    ),
    'TYPO3\\CMS\\Recycler\\Domain\\Model\\Tables' => 
    array (
      'tx_recycler_model_tables' => 'tx_recycler_model_tables',
    ),
    'TYPO3\\CMS\\Recycler\\Utility\\RecyclerUtility' => 
    array (
      'tx_recycler_helper' => 'tx_recycler_helper',
    ),
    'TYPO3\\CMS\\Reports\\Controller\\ReportController' => 
    array (
      'tx_reports_controller_reportcontroller' => 'tx_reports_controller_reportcontroller',
    ),
    'TYPO3\\CMS\\Reports\\Report\\Status\\ConfigurationStatus' => 
    array (
      'tx_reports_reports_status_configurationstatus' => 'tx_reports_reports_status_configurationstatus',
    ),
    'TYPO3\\CMS\\Reports\\Report\\Status\\SecurityStatus' => 
    array (
      'tx_reports_reports_status_securitystatus' => 'tx_reports_reports_status_securitystatus',
    ),
    'TYPO3\\CMS\\Reports\\Report\\Status\\Status' => 
    array (
      'tx_reports_reports_status' => 'tx_reports_reports_status',
    ),
    'TYPO3\\CMS\\Reports\\Status' => 
    array (
      'tx_reports_reports_status_status' => 'tx_reports_reports_status_status',
    ),
    'TYPO3\\CMS\\Reports\\Report\\Status\\SystemStatus' => 
    array (
      'tx_reports_reports_status_systemstatus' => 'tx_reports_reports_status_systemstatus',
    ),
    'TYPO3\\CMS\\Reports\\Report\\Status\\Typo3Status' => 
    array (
      'tx_reports_reports_status_typo3status' => 'tx_reports_reports_status_typo3status',
    ),
    'TYPO3\\CMS\\Reports\\Report\\Status\\WarningMessagePostProcessor' => 
    array (
      'tx_reports_reports_status_warningmessagepostprocessor' => 'tx_reports_reports_status_warningmessagepostprocessor',
    ),
    'TYPO3\\CMS\\Reports\\ReportInterface' => 
    array (
      'tx_reports_report' => 'tx_reports_report',
    ),
    'TYPO3\\CMS\\Reports\\StatusProviderInterface' => 
    array (
      'tx_reports_statusprovider' => 'tx_reports_statusprovider',
    ),
    'TYPO3\\CMS\\Reports\\Task\\SystemStatusUpdateTask' => 
    array (
      'tx_reports_tasks_systemstatusupdatetask' => 'tx_reports_tasks_systemstatusupdatetask',
    ),
    'TYPO3\\CMS\\Reports\\Task\\SystemStatusUpdateTaskNotificationEmailField' => 
    array (
      'tx_reports_tasks_systemstatusupdatetasknotificationemailfield' => 'tx_reports_tasks_systemstatusupdatetasknotificationemailfield',
    ),
    'TYPO3\\CMS\\Reports\\ViewHelpers\\ActionMenuItemViewHelper' => 
    array (
      'tx_reports_viewhelpers_actionmenuitemviewhelper' => 'tx_reports_viewhelpers_actionmenuitemviewhelper',
    ),
    'TYPO3\\CMS\\Reports\\ViewHelpers\\IconViewHelper' => 
    array (
      'tx_reports_viewhelpers_iconviewhelper' => 'tx_reports_viewhelpers_iconviewhelper',
    ),
    'TYPO3\\CMS\\Rsaauth\\Backend\\AbstractBackend' => 
    array (
      'tx_rsaauth_abstract_backend' => 'tx_rsaauth_abstract_backend',
    ),
    'TYPO3\\CMS\\Rsaauth\\Backend\\BackendFactory' => 
    array (
      'tx_rsaauth_backendfactory' => 'tx_rsaauth_backendfactory',
    ),
    'TYPO3\\CMS\\Rsaauth\\Backend\\CommandLineBackend' => 
    array (
      'tx_rsaauth_cmdline_backend' => 'tx_rsaauth_cmdline_backend',
    ),
    'TYPO3\\CMS\\Rsaauth\\Backend\\PhpBackend' => 
    array (
      'tx_rsaauth_php_backend' => 'tx_rsaauth_php_backend',
    ),
    'TYPO3\\CMS\\Rsaauth\\BackendWarnings' => 
    array (
      'tx_rsaauth_backendwarnings' => 'tx_rsaauth_backendwarnings',
    ),
    'TYPO3\\CMS\\Rsaauth\\Hook\\FrontendLoginHook' => 
    array (
      'tx_rsaauth_feloginhook' => 'tx_rsaauth_feloginhook',
    ),
    'TYPO3\\CMS\\Rsaauth\\Hook\\LoginFormHook' => 
    array (
      'tx_rsaauth_loginformhook' => 'tx_rsaauth_loginformhook',
    ),
    'TYPO3\\CMS\\Rsaauth\\Hook\\UserSetupHook' => 
    array (
      'tx_rsaauth_usersetuphook' => 'tx_rsaauth_usersetuphook',
    ),
    'TYPO3\\CMS\\Rsaauth\\Keypair' => 
    array (
      'tx_rsaauth_keypair' => 'tx_rsaauth_keypair',
    ),
    'TYPO3\\CMS\\Rsaauth\\RsaAuthService' => 
    array (
      'tx_rsaauth_sv1' => 'tx_rsaauth_sv1',
    ),
    'TYPO3\\CMS\\Rsaauth\\Storage\\AbstractStorage' => 
    array (
      'tx_rsaauth_abstract_storage' => 'tx_rsaauth_abstract_storage',
    ),
    'TYPO3\\CMS\\Rsaauth\\Storage\\SessionStorage' => 
    array (
      'tx_rsaauth_session_storage' => 'tx_rsaauth_session_storage',
    ),
    'TYPO3\\CMS\\Rsaauth\\Storage\\SplitStorage' => 
    array (
      'tx_rsaauth_split_storage' => 'tx_rsaauth_split_storage',
    ),
    'TYPO3\\CMS\\Rsaauth\\Storage\\StorageFactory' => 
    array (
      'tx_rsaauth_storagefactory' => 'tx_rsaauth_storagefactory',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\BrowseLinks' => 
    array (
      'tx_rtehtmlarea_browse_links' => 'tx_rtehtmlarea_browse_links',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\ParseHtmlController' => 
    array (
      'tx_rtehtmlarea_parse_html' => 'tx_rtehtmlarea_parse_html',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\BrowseLinksController' => 
    array (
      'tx_rtehtmlarea_sc_browse_links' => 'tx_rtehtmlarea_sc_browse_links',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\CustomAttributeController' => 
    array (
      'tx_rtehtmlarea_pi3' => 'tx_rtehtmlarea_pi3',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\FrontendRteController' => 
    array (
      'tx_rtehtmlarea_pi2' => 'tx_rtehtmlarea_pi2',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\SelectImageController' => 
    array (
      'tx_rtehtmlarea_sc_select_image' => 'tx_rtehtmlarea_sc_select_image',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\SpellCheckingController' => 
    array (
      'tx_rtehtmlarea_pi1' => 'tx_rtehtmlarea_pi1',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\AboutEditor' => 
    array (
      'tx_rtehtmlarea_abouteditor' => 'tx_rtehtmlarea_abouteditor',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Abbreviation' => 
    array (
      'tx_rtehtmlarea_acronym' => 'tx_rtehtmlarea_acronym',
      'typo3\\cms\\rtehtmlarea\\extension\\acronym' => 'typo3\\cms\\rtehtmlarea\\extension\\acronym',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\BlockElements' => 
    array (
      'tx_rtehtmlarea_blockelements' => 'tx_rtehtmlarea_blockelements',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\BlockStyle' => 
    array (
      'tx_rtehtmlarea_blockstyle' => 'tx_rtehtmlarea_blockstyle',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\CharacterMap' => 
    array (
      'tx_rtehtmlarea_charactermap' => 'tx_rtehtmlarea_charactermap',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\ContextMenu' => 
    array (
      'tx_rtehtmlarea_contextmenu' => 'tx_rtehtmlarea_contextmenu',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\CopyPaste' => 
    array (
      'tx_rtehtmlarea_copypaste' => 'tx_rtehtmlarea_copypaste',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultClean' => 
    array (
      'tx_rtehtmlarea_defaultclean' => 'tx_rtehtmlarea_defaultclean',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultImage' => 
    array (
      'tx_rtehtmlarea_defaultimage' => 'tx_rtehtmlarea_defaultimage',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultInline' => 
    array (
      'tx_rtehtmlarea_defaultinline' => 'tx_rtehtmlarea_defaultinline',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefaultLink' => 
    array (
      'tx_rtehtmlarea_defaultlink' => 'tx_rtehtmlarea_defaultlink',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\DefinitionList' => 
    array (
      'tx_rtehtmlarea_definitionlist' => 'tx_rtehtmlarea_definitionlist',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\EditElement' => 
    array (
      'tx_rtehtmlarea_editelement' => 'tx_rtehtmlarea_editelement',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\EditorMode' => 
    array (
      'tx_rtehtmlarea_editormode' => 'tx_rtehtmlarea_editormode',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\FindReplace' => 
    array (
      'tx_rtehtmlarea_findreplace' => 'tx_rtehtmlarea_findreplace',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\InlineElements' => 
    array (
      'tx_rtehtmlarea_inlineelements' => 'tx_rtehtmlarea_inlineelements',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\InsertSmiley' => 
    array (
      'tx_rtehtmlarea_insertsmiley' => 'tx_rtehtmlarea_insertsmiley',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Language' => 
    array (
      'tx_rtehtmlarea_language' => 'tx_rtehtmlarea_language',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\MicroDataSchema' => 
    array (
      'tx_rtehtmlarea_microdataschema' => 'tx_rtehtmlarea_microdataschema',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Plaintext' => 
    array (
      'tx_rtehtmlarea_plaintext' => 'tx_rtehtmlarea_plaintext',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\QuickTag' => 
    array (
      'tx_rtehtmlarea_quicktag' => 'tx_rtehtmlarea_quicktag',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\RemoveFormat' => 
    array (
      'tx_rtehtmlarea_removeformat' => 'tx_rtehtmlarea_removeformat',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\SelectFont' => 
    array (
      'tx_rtehtmlarea_selectfont' => 'tx_rtehtmlarea_selectfont',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Spellchecker' => 
    array (
      'tx_rtehtmlarea_spellchecker' => 'tx_rtehtmlarea_spellchecker',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\TableOperations' => 
    array (
      'tx_rtehtmlarea_tableoperations' => 'tx_rtehtmlarea_tableoperations',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\TextIndicator' => 
    array (
      'tx_rtehtmlarea_textindicator' => 'tx_rtehtmlarea_textindicator',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\TextStyle' => 
    array (
      'tx_rtehtmlarea_textstyle' => 'tx_rtehtmlarea_textstyle',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3Color' => 
    array (
      'tx_rtehtmlarea_typo3color' => 'tx_rtehtmlarea_typo3color',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3HtmlParser' => 
    array (
      'tx_rtehtmlarea_typo3htmlparser' => 'tx_rtehtmlarea_typo3htmlparser',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3Image' => 
    array (
      'tx_rtehtmlarea_typo3image' => 'tx_rtehtmlarea_typo3image',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\Typo3Link' => 
    array (
      'tx_rtehtmlarea_typo3link' => 'tx_rtehtmlarea_typo3link',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\UndoRedo' => 
    array (
      'tx_rtehtmlarea_undoredo' => 'tx_rtehtmlarea_undoredo',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Extension\\UserElements' => 
    array (
      'tx_rtehtmlarea_userelements' => 'tx_rtehtmlarea_userelements',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\FolderTree' => 
    array (
      'tx_rtehtmlarea_foldertree' => 'tx_rtehtmlarea_foldertree',
      'tx_rtehtmlarea_image_foldertree' => 'tx_rtehtmlarea_image_foldertree',
      'typo3\\cms\\rtehtmlarea\\imagefoldertree' => 'typo3\\cms\\rtehtmlarea\\imagefoldertree',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Hook\\Install\\DeprecatedRteProperties' => 
    array (
      'tx_rtehtmlarea_deprecatedrteproperties' => 'tx_rtehtmlarea_deprecatedrteproperties',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Hook\\SoftReferenceHook' => 
    array (
      'tx_rtehtmlarea_softrefproc' => 'tx_rtehtmlarea_softrefproc',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Hook\\StatusReportConflictsCheckHook' => 
    array (
      'tx_rtehtmlarea_statusreport_conflictscheck' => 'tx_rtehtmlarea_statusreport_conflictscheck',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\PageTree' => 
    array (
      'tx_rtehtmlarea_pagetree' => 'tx_rtehtmlarea_pagetree',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\RteHtmlAreaApi' => 
    array (
      'tx_rtehtmlarea_api' => 'tx_rtehtmlarea_api',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\RteHtmlAreaBase' => 
    array (
      'tx_rtehtmlarea_base' => 'tx_rtehtmlarea_base',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\SelectImage' => 
    array (
      'tx_rtehtmlarea_select_image' => 'tx_rtehtmlarea_select_image',
    ),
    'TYPO3\\CMS\\Rtehtmlarea\\Controller\\UserElementsController' => 
    array (
      'tx_rtehtmlarea_user' => 'tx_rtehtmlarea_user',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Evaluation\\BackendEvaluator' => 
    array (
      'tx_saltedpasswords_eval_be' => 'tx_saltedpasswords_eval_be',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Evaluation\\Evaluator' => 
    array (
      'tx_saltedpasswords_eval' => 'tx_saltedpasswords_eval',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Evaluation\\FrontendEvaluator' => 
    array (
      'tx_saltedpasswords_eval_fe' => 'tx_saltedpasswords_eval_fe',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Salt\\AbstractSalt' => 
    array (
      'tx_saltedpasswords_abstract_salts' => 'tx_saltedpasswords_abstract_salts',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Salt\\BlowfishSalt' => 
    array (
      'tx_saltedpasswords_salts_blowfish' => 'tx_saltedpasswords_salts_blowfish',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Salt\\Md5Salt' => 
    array (
      'tx_saltedpasswords_salts_md5' => 'tx_saltedpasswords_salts_md5',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt' => 
    array (
      'tx_saltedpasswords_salts_phpass' => 'tx_saltedpasswords_salts_phpass',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Salt\\SaltFactory' => 
    array (
      'tx_saltedpasswords_salts_factory' => 'tx_saltedpasswords_salts_factory',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Salt\\SaltInterface' => 
    array (
      'tx_saltedpasswords_salts' => 'tx_saltedpasswords_salts',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\SaltedPasswordService' => 
    array (
      'tx_saltedpasswords_sv1' => 'tx_saltedpasswords_sv1',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Task\\BulkUpdateFieldProvider' => 
    array (
      'tx_saltedpasswords_tasks_bulkupdate_additionalfieldprovider' => 'tx_saltedpasswords_tasks_bulkupdate_additionalfieldprovider',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Task\\BulkUpdateTask' => 
    array (
      'tx_saltedpasswords_tasks_bulkupdate' => 'tx_saltedpasswords_tasks_bulkupdate',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Utility\\ExtensionManagerConfigurationUtility' => 
    array (
      'tx_saltedpasswords_emconfhelper' => 'tx_saltedpasswords_emconfhelper',
    ),
    'TYPO3\\CMS\\Saltedpasswords\\Utility\\SaltedPasswordsUtility' => 
    array (
      'tx_saltedpasswords_div' => 'tx_saltedpasswords_div',
    ),
    'TYPO3\\CMS\\Scheduler\\AdditionalFieldProviderInterface' => 
    array (
      'tx_scheduler_additionalfieldprovider' => 'tx_scheduler_additionalfieldprovider',
    ),
    'TYPO3\\CMS\\Scheduler\\Controller\\SchedulerModuleController' => 
    array (
      'tx_scheduler_module' => 'tx_scheduler_module',
    ),
    'TYPO3\\CMS\\Scheduler\\CronCommand\\CronCommand' => 
    array (
      'tx_scheduler_croncmd' => 'tx_scheduler_croncmd',
    ),
    'TYPO3\\CMS\\Scheduler\\CronCommand\\NormalizeCommand' => 
    array (
      'tx_scheduler_croncmd_normalize' => 'tx_scheduler_croncmd_normalize',
    ),
    'TYPO3\\CMS\\Scheduler\\Example\\SleepTask' => 
    array (
      'tx_scheduler_sleeptask' => 'tx_scheduler_sleeptask',
    ),
    'TYPO3\\CMS\\Scheduler\\Example\\SleepTaskAdditionalFieldProvider' => 
    array (
      'tx_scheduler_sleeptask_additionalfieldprovider' => 'tx_scheduler_sleeptask_additionalfieldprovider',
    ),
    'TYPO3\\CMS\\Scheduler\\Execution' => 
    array (
      'tx_scheduler_execution' => 'tx_scheduler_execution',
    ),
    'TYPO3\\CMS\\Scheduler\\FailedExecutionException' => 
    array (
      'tx_scheduler_failedexecutionexception' => 'tx_scheduler_failedexecutionexception',
    ),
    'TYPO3\\CMS\\Scheduler\\ProgressProviderInterface' => 
    array (
      'tx_scheduler_progressprovider' => 'tx_scheduler_progressprovider',
    ),
    'TYPO3\\CMS\\Scheduler\\Scheduler' => 
    array (
      'tx_scheduler' => 'tx_scheduler',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\AbstractTask' => 
    array (
      'tx_scheduler_task' => 'tx_scheduler_task',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\CachingFrameworkGarbageCollectionAdditionalFieldProvider' => 
    array (
      'tx_scheduler_cachingframeworkgarbagecollection_additionalfieldprovider' => 'tx_scheduler_cachingframeworkgarbagecollection_additionalfieldprovider',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\CachingFrameworkGarbageCollectionTask' => 
    array (
      'tx_scheduler_cachingframeworkgarbagecollection' => 'tx_scheduler_cachingframeworkgarbagecollection',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\RecyclerGarbageCollectionAdditionalFieldProvider' => 
    array (
      'tx_scheduler_recyclergarbagecollection_additionalfieldprovider' => 'tx_scheduler_recyclergarbagecollection_additionalfieldprovider',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\RecyclerGarbageCollectionTask' => 
    array (
      'tx_scheduler_recyclergarbagecollection' => 'tx_scheduler_recyclergarbagecollection',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\TableGarbageCollectionAdditionalFieldProvider' => 
    array (
      'tx_scheduler_tablegarbagecollection_additionalfieldprovider' => 'tx_scheduler_tablegarbagecollection_additionalfieldprovider',
    ),
    'TYPO3\\CMS\\Scheduler\\Task\\TableGarbageCollectionTask' => 
    array (
      'tx_scheduler_tablegarbagecollection' => 'tx_scheduler_tablegarbagecollection',
    ),
    'TYPO3\\CMS\\Setup\\Controller\\SetupModuleController' => 
    array (
      'sc_mod_user_setup_index' => 'sc_mod_user_setup_index',
    ),
    'TYPO3\\CMS\\Sv\\AbstractAuthenticationService' => 
    array (
      'tx_sv_authbase' => 'tx_sv_authbase',
    ),
    'TYPO3\\CMS\\Sv\\AuthenticationService' => 
    array (
      'tx_sv_auth' => 'tx_sv_auth',
    ),
    'TYPO3\\CMS\\Sv\\LoginFormHook' => 
    array (
      'tx_sv_loginformhook' => 'tx_sv_loginformhook',
    ),
    'TYPO3\\CMS\\Sv\\Report\\ServicesListReport' => 
    array (
      'tx_sv_reports_serviceslist' => 'tx_sv_reports_serviceslist',
    ),
    'TYPO3\\CMS\\SysAction\\ActionList' => 
    array (
      'tx_sysaction_list' => 'tx_sysaction_list',
    ),
    'TYPO3\\CMS\\SysAction\\ActionTask' => 
    array (
      'tx_sysaction_task' => 'tx_sysaction_task',
    ),
    'TYPO3\\CMS\\T3editor\\CodeCompletion' => 
    array (
      'tx_t3editor_codecompletion' => 'tx_t3editor_codecompletion',
    ),
    'TYPO3\\CMS\\T3editor\\FormWizard' => 
    array (
      'tx_t3editor_tceforms_wizard' => 'tx_t3editor_tceforms_wizard',
    ),
    'TYPO3\\CMS\\T3editor\\Hook\\FileEditHook' => 
    array (
      'tx_t3editor_hooks_fileedit' => 'tx_t3editor_hooks_fileedit',
    ),
    'TYPO3\\CMS\\T3editor\\Hook\\TypoScriptTemplateInfoHook' => 
    array (
      'tx_t3editor_hooks_tstemplateinfo' => 'tx_t3editor_hooks_tstemplateinfo',
    ),
    'TYPO3\\CMS\\T3editor\\T3editor' => 
    array (
      'tx_t3editor' => 'tx_t3editor',
    ),
    'TYPO3\\CMS\\T3editor\\TypoScriptReferenceLoader' => 
    array (
      'tx_t3editor_tsrefloader' => 'tx_t3editor_tsrefloader',
    ),
    'TYPO3\\CMS\\Taskcenter\\Controller\\TaskModuleController' => 
    array (
      'sc_mod_user_task_index' => 'sc_mod_user_task_index',
    ),
    'TYPO3\\CMS\\Taskcenter\\TaskInterface' => 
    array (
      'tx_taskcenter_task' => 'tx_taskcenter_task',
    ),
    'TYPO3\\CMS\\Taskcenter\\TaskStatus' => 
    array (
      'tx_taskcenter_status' => 'tx_taskcenter_status',
    ),
    'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateModuleController' => 
    array (
      'sc_mod_web_ts_index' => 'sc_mod_web_ts_index',
    ),
    'TYPO3\\CMS\\Tstemplate\\Controller\\TemplateAnalyzerModuleFunctionController' => 
    array (
      'tx_tstemplateanalyzer' => 'tx_tstemplateanalyzer',
    ),
    'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateConstantEditorModuleFunctionController' => 
    array (
      'tx_tstemplateceditor' => 'tx_tstemplateceditor',
    ),
    'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateInformationModuleFunctionController' => 
    array (
      'tx_tstemplateinfo' => 'tx_tstemplateinfo',
    ),
    'TYPO3\\CMS\\Tstemplate\\Controller\\TypoScriptTemplateObjectBrowserModuleFunctionController' => 
    array (
      'tx_tstemplateobjbrowser' => 'tx_tstemplateobjbrowser',
    ),
    'TYPO3\\CMS\\Version\\Controller\\VersionModuleController' => 
    array (
      'tx_version_cm1' => 'tx_version_cm1',
    ),
    'TYPO3\\CMS\\Version\\DataHandler\\CommandMap' => 
    array (
      'tx_version_tcemain_commandmap' => 'tx_version_tcemain_commandmap',
    ),
    'TYPO3\\CMS\\Version\\Hook\\DataHandlerHook' => 
    array (
      'tx_version_tcemain' => 'tx_version_tcemain',
    ),
    'TYPO3\\CMS\\Version\\Hook\\IconUtilityHook' => 
    array (
      'tx_version_iconworks' => 'tx_version_iconworks',
    ),
    'TYPO3\\CMS\\Version\\Hook\\PreviewHook' => 
    array (
      'tx_version_preview' => 'tx_version_preview',
    ),
    'TYPO3\\CMS\\Version\\Task\\AutoPublishTask' => 
    array (
      'tx_version_tasks_autopublish' => 'tx_version_tasks_autopublish',
    ),
    'TYPO3\\CMS\\Version\\Dependency\\DependencyEntityFactory' => 
    array (
      't3lib_utility_dependency_factory' => 't3lib_utility_dependency_factory',
    ),
    'TYPO3\\CMS\\Version\\Dependency\\DependencyResolver' => 
    array (
      't3lib_utility_dependency' => 't3lib_utility_dependency',
    ),
    'TYPO3\\CMS\\Version\\Dependency\\ElementEntity' => 
    array (
      't3lib_utility_dependency_element' => 't3lib_utility_dependency_element',
    ),
    'TYPO3\\CMS\\Version\\Dependency\\EventCallback' => 
    array (
      't3lib_utility_dependency_callback' => 't3lib_utility_dependency_callback',
    ),
    'TYPO3\\CMS\\Version\\Dependency\\ReferenceEntity' => 
    array (
      't3lib_utility_dependency_reference' => 't3lib_utility_dependency_reference',
    ),
    'TYPO3\\CMS\\Version\\Utility\\WorkspacesUtility' => 
    array (
      'wslib' => 'wslib',
    ),
    'TYPO3\\CMS\\Version\\View\\VersionView' => 
    array (
      'tx_version_gui' => 'tx_version_gui',
    ),
    'TYPO3\\CMS\\WizardCrpages\\Controller\\CreatePagesWizardModuleFunctionController' => 
    array (
      'tx_wizardcrpages_webfunc_2' => 'tx_wizardcrpages_webfunc_2',
    ),
    'TYPO3\\CMS\\WizardSortPages\\View\\SortPagesWizardModuleFunction' => 
    array (
      'tx_wizardsortpages_webfunc_2' => 'tx_wizardsortpages_webfunc_2',
    ),
    'TYPO3\\CMS\\Workspaces\\Controller\\AbstractController' => 
    array (
      'tx_workspaces_controller_abstractcontroller' => 'tx_workspaces_controller_abstractcontroller',
    ),
    'TYPO3\\CMS\\Workspaces\\Controller\\PreviewController' => 
    array (
      'tx_workspaces_controller_previewcontroller' => 'tx_workspaces_controller_previewcontroller',
    ),
    'TYPO3\\CMS\\Workspaces\\Controller\\ReviewController' => 
    array (
      'tx_workspaces_controller_reviewcontroller' => 'tx_workspaces_controller_reviewcontroller',
    ),
    'TYPO3\\CMS\\Workspaces\\Domain\\Model\\CombinedRecord' => 
    array (
      'tx_workspaces_domain_model_combinedrecord' => 'tx_workspaces_domain_model_combinedrecord',
    ),
    'TYPO3\\CMS\\Workspaces\\Domain\\Model\\DatabaseRecord' => 
    array (
      'tx_workspaces_domain_model_databaserecord' => 'tx_workspaces_domain_model_databaserecord',
    ),
    'TYPO3\\CMS\\Workspaces\\ExtDirect\\AbstractHandler' => 
    array (
      'tx_workspaces_extdirect_abstracthandler' => 'tx_workspaces_extdirect_abstracthandler',
    ),
    'TYPO3\\CMS\\Workspaces\\ExtDirect\\ActionHandler' => 
    array (
      'tx_workspaces_extdirect_actionhandler' => 'tx_workspaces_extdirect_actionhandler',
    ),
    'TYPO3\\CMS\\Workspaces\\ExtDirect\\ExtDirectServer' => 
    array (
      'tx_workspaces_extdirect_server' => 'tx_workspaces_extdirect_server',
    ),
    'TYPO3\\CMS\\Workspaces\\ExtDirect\\MassActionHandler' => 
    array (
      'tx_workspaces_extdirect_massactionhandler' => 'tx_workspaces_extdirect_massactionhandler',
    ),
    'TYPO3\\CMS\\Workspaces\\ExtDirect\\PagetreeCollectionsProcessor' => 
    array (
      'tx_workspaces_extdirect_pagetreecollectionsprocessor' => 'tx_workspaces_extdirect_pagetreecollectionsprocessor',
    ),
    'TYPO3\\CMS\\Workspaces\\Hook\\BackendUtilityHook' => 
    array (
      'tx_workspaces_service_befunc' => 'tx_workspaces_service_befunc',
    ),
    'TYPO3\\CMS\\Workspaces\\Hook\\DataHandlerHook' => 
    array (
      'tx_workspaces_service_tcemain' => 'tx_workspaces_service_tcemain',
    ),
    'TYPO3\\CMS\\Workspaces\\Hook\\TypoScriptFrontendControllerHook' => 
    array (
      'tx_workspaces_service_fehooks' => 'tx_workspaces_service_fehooks',
    ),
    'TYPO3\\CMS\\Workspaces\\Service\\AutoPublishService' => 
    array (
      'tx_workspaces_service_autopublish' => 'tx_workspaces_service_autopublish',
    ),
    'TYPO3\\CMS\\Workspaces\\Service\\GridDataService' => 
    array (
      'tx_workspaces_service_griddata' => 'tx_workspaces_service_griddata',
    ),
    'TYPO3\\CMS\\Workspaces\\Service\\HistoryService' => 
    array (
      'tx_workspaces_service_history' => 'tx_workspaces_service_history',
    ),
    'TYPO3\\CMS\\Workspaces\\Service\\IntegrityService' => 
    array (
      'tx_workspaces_service_integrity' => 'tx_workspaces_service_integrity',
    ),
    'TYPO3\\CMS\\Workspaces\\Service\\StagesService' => 
    array (
      'tx_workspaces_service_stages' => 'tx_workspaces_service_stages',
    ),
    'TYPO3\\CMS\\Workspaces\\Service\\WorkspaceService' => 
    array (
      'tx_workspaces_service_workspaces' => 'tx_workspaces_service_workspaces',
    ),
    'TYPO3\\CMS\\Workspaces\\Task\\AutoPublishTask' => 
    array (
      'tx_workspaces_service_autopublishtask' => 'tx_workspaces_service_autopublishtask',
    ),
    'TYPO3\\CMS\\Workspaces\\Task\\CleanupPreviewLinkTask' => 
    array (
      'tx_workspaces_service_cleanuppreviewlinktask' => 'tx_workspaces_service_cleanuppreviewlinktask',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\MoveElementPageTreeView' => 
    array (
      'moveelementlocalpagetree' => 'moveelementlocalpagetree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\PageMovingPagePositionMap' => 
    array (
      'ext_posmap_pages' => 'ext_posmap_pages',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\ContentMovingPagePositionMap' => 
    array (
      'ext_posmap_tt_content' => 'ext_posmap_tt_content',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\ElementBrowserPageTreeView' => 
    array (
      'localpagetree' => 'localpagetree',
    ),
    'TYPO3\\CMS\\Recordlist\\Tree\\View\\ElementBrowserPageTreeView' => 
    array (
      'tbe_pagetree' => 'tbe_pagetree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\ElementBrowserFolderTreeView' => 
    array (
      'localfoldertree' => 'localfoldertree',
    ),
    'TYPO3\\CMS\\Recordlist\\Tree\\View\\ElementBrowserFolderTreeView' => 
    array (
      'tbe_foldertree' => 'tbe_foldertree',
    ),
    'TYPO3\\CMS\\Backend\\Tree\\View\\NewRecordPageTreeView' => 
    array (
      'newrecordlocalpagetree' => 'newrecordlocalpagetree',
    ),
    'TYPO3\\CMS\\Backend\\Toolbar\\ClearCacheActionsHookInterface' => 
    array (
      'backend_cacheactionshook' => 'backend_cacheactionshook',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Controller\\SearchFormController' => 
    array (
      'tx_indexedsearch' => 'tx_indexedsearch',
    ),
    'TYPO3\\CMS\\IndexedSearch\\Controller\\SearchController' => 
    array (
      'tx_indexedsearch_controller_searchcontroller' => 'tx_indexedsearch_controller_searchcontroller',
    ),
    'TYPO3\\CMS\\Mediace\\ContentObject\\FlowplayerContentObject' => 
    array (
      'typo3\\cms\\frontend\\contentobject\\flowplayercontentobject' => 'typo3\\cms\\frontend\\contentobject\\flowplayercontentobject',
    ),
    'GeorgRinger\\News\\Controller\\AdministrationController' => 
    array (
      'tx_news_controller_administrationcontroller' => 'tx_news_controller_administrationcontroller',
    ),
    'GeorgRinger\\News\\Controller\\CategoryController' => 
    array (
      'tx_news_controller_categorycontroller' => 'tx_news_controller_categorycontroller',
    ),
    'GeorgRinger\\News\\Controller\\ImportController' => 
    array (
      'tx_news_controller_importcontroller' => 'tx_news_controller_importcontroller',
    ),
    'GeorgRinger\\News\\Controller\\NewsBaseController' => 
    array (
      'tx_news_controller_newsbasecontroller' => 'tx_news_controller_newsbasecontroller',
    ),
    'GeorgRinger\\News\\Controller\\NewsController' => 
    array (
      'tx_news_controller_newscontroller' => 'tx_news_controller_newscontroller',
    ),
    'GeorgRinger\\News\\Controller\\TagController' => 
    array (
      'tx_news_controller_tagcontroller' => 'tx_news_controller_tagcontroller',
    ),
    'GeorgRinger\\News\\Database\\SoftReferenceIndex' => 
    array (
      'tx_news_database_softreferenceindex' => 'tx_news_database_softreferenceindex',
    ),
    'GeorgRinger\\News\\ViewHelpers\\TitleTagViewHelper' => 
    array (
      'tx_news_viewhelpers_titletagviewhelper' => 'tx_news_viewhelpers_titletagviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\TargetLinkViewHelper' => 
    array (
      'tx_news_viewhelpers_targetlinkviewhelper' => 'tx_news_viewhelpers_targetlinkviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\SimplePrevNextViewHelper' => 
    array (
      'tx_news_viewhelpers_simpleprevnextviewhelper' => 'tx_news_viewhelpers_simpleprevnextviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\PaginateBodytextViewHelper' => 
    array (
      'tx_news_viewhelpers_paginatebodytextviewhelper' => 'tx_news_viewhelpers_paginatebodytextviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\ObjectViewHelper' => 
    array (
      'tx_news_viewhelpers_objectviewhelper' => 'tx_news_viewhelpers_objectviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\MetaTagViewHelper' => 
    array (
      'tx_news_viewhelpers_metatagviewhelper' => 'tx_news_viewhelpers_metatagviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\MediaFactoryViewHelper' => 
    array (
      'tx_news_viewhelpers_mediafactoryviewhelper' => 'tx_news_viewhelpers_mediafactoryviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\LinkViewHelper' => 
    array (
      'tx_news_viewhelpers_linkviewhelper' => 'tx_news_viewhelpers_linkviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\IncludeFileViewHelper' => 
    array (
      'tx_news_viewhelpers_includefileviewhelper' => 'tx_news_viewhelpers_includefileviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\IfIsActiveViewHelper' => 
    array (
      'tx_news_viewhelpers_ifisactiveviewhelper' => 'tx_news_viewhelpers_ifisactiveviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\HeaderDataViewHelper' => 
    array (
      'tx_news_viewhelpers_headerdataviewhelper' => 'tx_news_viewhelpers_headerdataviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\FalMediaFactoryViewHelper' => 
    array (
      'tx_news_viewhelpers_falmediafactoryviewhelper' => 'tx_news_viewhelpers_falmediafactoryviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\ExcludeDisplayedNewsViewHelper' => 
    array (
      'tx_news_viewhelpers_excludedisplayednewsviewhelper' => 'tx_news_viewhelpers_excludedisplayednewsviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\CategoryChildrenViewHelper' => 
    array (
      'tx_news_viewhelpers_categorychildrenviewhelper' => 'tx_news_viewhelpers_categorychildrenviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Widget\\PaginateViewHelper' => 
    array (
      'tx_news_viewhelpers_widget_paginateviewhelper' => 'tx_news_viewhelpers_widget_paginateviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Widget\\Controller\\PaginateController' => 
    array (
      'tx_news_viewhelpers_widget_controller_paginatecontroller' => 'tx_news_viewhelpers_widget_controller_paginatecontroller',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\TwitterViewHelper' => 
    array (
      'tx_news_viewhelpers_social_twitterviewhelper' => 'tx_news_viewhelpers_social_twitterviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\GravatarViewHelper' => 
    array (
      'tx_news_viewhelpers_social_gravatarviewhelper' => 'tx_news_viewhelpers_social_gravatarviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\GooglePlusViewHelper' => 
    array (
      'tx_news_viewhelpers_social_googleplusviewhelper' => 'tx_news_viewhelpers_social_googleplusviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\DisqusViewHelper' => 
    array (
      'tx_news_viewhelpers_social_disqusviewhelper' => 'tx_news_viewhelpers_social_disqusviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\Facebook\\CommentViewHelper' => 
    array (
      'tx_news_viewhelpers_social_facebook_commentviewhelper' => 'tx_news_viewhelpers_social_facebook_commentviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\Facebook\\LikeViewHelper' => 
    array (
      'tx_news_viewhelpers_social_facebook_likeviewhelper' => 'tx_news_viewhelpers_social_facebook_likeviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Social\\Facebook\\ShareViewHelper' => 
    array (
      'tx_news_viewhelpers_social_facebook_shareviewhelper' => 'tx_news_viewhelpers_social_facebook_shareviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\StriptagsViewHelper' => 
    array (
      'tx_news_viewhelpers_format_striptagsviewhelper' => 'tx_news_viewhelpers_format_striptagsviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\NothingViewHelper' => 
    array (
      'tx_news_viewhelpers_format_nothingviewhelper' => 'tx_news_viewhelpers_format_nothingviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\HtmlentitiesDecodeViewHelper' => 
    array (
      'tx_news_viewhelpers_format_htmlentitiesdecodeviewhelper' => 'tx_news_viewhelpers_format_htmlentitiesdecodeviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\HscViewHelper' => 
    array (
      'tx_news_viewhelpers_format_hscviewhelper' => 'tx_news_viewhelpers_format_hscviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\FileSizeViewHelper' => 
    array (
      'tx_news_viewhelpers_format_filesizeviewhelper' => 'tx_news_viewhelpers_format_filesizeviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\FileDownloadViewHelper' => 
    array (
      'tx_news_viewhelpers_format_filedownloadviewhelper' => 'tx_news_viewhelpers_format_filedownloadviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Format\\DateViewHelper' => 
    array (
      'tx_news_viewhelpers_format_dateviewhelper' => 'tx_news_viewhelpers_format_dateviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Be\\MultiEditLinkViewHelper' => 
    array (
      'tx_news_viewhelpers_be_multieditlinkviewhelper' => 'tx_news_viewhelpers_be_multieditlinkviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Be\\ClickmenuViewHelper' => 
    array (
      'tx_news_viewhelpers_be_clickmenuviewhelper' => 'tx_news_viewhelpers_be_clickmenuviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Be\\Security\\IfAccessToTableIsAllowedViewHelper' => 
    array (
      'tx_news_viewhelpers_be_security' => 'tx_news_viewhelpers_be_security',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Be\\Buttons\\IconViewHelper' => 
    array (
      'tx_news_viewhelpers_be_buttons_iconviewhelper' => 'tx_news_viewhelpers_be_buttons_iconviewhelper',
    ),
    'GeorgRinger\\News\\ViewHelpers\\Be\\Buttons\\IconForRecordViewHelper' => 
    array (
      'tx_news_viewhelpers_be_buttons_iconforrecordviewhelper' => 'tx_news_viewhelpers_be_buttons_iconforrecordviewhelper',
    ),
    'GeorgRinger\\News\\Utility\\Validation' => 
    array (
      'tx_news_utility_validation' => 'tx_news_utility_validation',
    ),
    'GeorgRinger\\News\\Utility\\Url' => 
    array (
      'tx_news_utility_url' => 'tx_news_utility_url',
    ),
    'GeorgRinger\\News\\Utility\\TypoScript' => 
    array (
      'tx_news_utility_typoscript' => 'tx_news_utility_typoscript',
    ),
    'GeorgRinger\\News\\Utility\\TemplateLayout' => 
    array (
      'tx_news_utility_templatelayout' => 'tx_news_utility_templatelayout',
    ),
    'GeorgRinger\\News\\Utility\\Page' => 
    array (
      'tx_news_utility_page' => 'tx_news_utility_page',
    ),
    'GeorgRinger\\News\\Utility\\ImportJob' => 
    array (
      'tx_news_utility_importjob' => 'tx_news_utility_importjob',
    ),
    'GeorgRinger\\News\\Utility\\EmConfiguration' => 
    array (
      'tx_news_utility_emconfiguration' => 'tx_news_utility_emconfiguration',
    ),
    'GeorgRinger\\News\\Utility\\Cache' => 
    array (
      'tx_news_utility_cache' => 'tx_news_utility_cache',
    ),
    'GeorgRinger\\News\\TreeProvider\\DatabaseTreeDataProvider' => 
    array (
      'tx_news_treeprovider_databasetreedataprovider' => 'tx_news_treeprovider_databasetreedataprovider',
    ),
    'GeorgRinger\\News\\Service\\SettingsService' => 
    array (
      'tx_news_service_settingsservice' => 'tx_news_service_settingsservice',
    ),
    'GeorgRinger\\News\\Service\\FileService' => 
    array (
      'tx_news_service_fileservice' => 'tx_news_service_fileservice',
    ),
    'GeorgRinger\\News\\Service\\CategoryService' => 
    array (
      'tx_news_service_categoryservice' => 'tx_news_service_categoryservice',
    ),
    'GeorgRinger\\News\\Service\\CacheService' => 
    array (
      'tx_news_service_cacheservice' => 'tx_news_service_cacheservice',
    ),
    'GeorgRinger\\News\\Service\\AccessControlService' => 
    array (
      'tx_news_service_accesscontrolservice' => 'tx_news_service_accesscontrolservice',
    ),
    'GeorgRinger\\News\\Service\\Import\\DataProviderServiceInterface' => 
    array (
      'tx_news_service_import_dataproviderserviceinterface' => 'tx_news_service_import_dataproviderserviceinterface',
    ),
    'GeorgRinger\\News\\MediaRenderer\\MediaInterface' => 
    array (
      'tx_news_mediarenderer_mediainterface' => 'tx_news_mediarenderer_mediainterface',
    ),
    'GeorgRinger\\News\\MediaRenderer\\FalMediaInterface' => 
    array (
      'tx_news_mediarenderer_falmediainterface' => 'tx_news_mediarenderer_falmediainterface',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Video\\Youtube' => 
    array (
      'tx_news_mediarenderer_video_youtube' => 'tx_news_mediarenderer_video_youtube',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Video\\Vimeo' => 
    array (
      'tx_news_mediarenderer_video_vimeo' => 'tx_news_mediarenderer_video_vimeo',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Video\\Videosites' => 
    array (
      'tx_news_mediarenderer_video_videosites' => 'tx_news_mediarenderer_video_videosites',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Video\\Quicktime' => 
    array (
      'tx_news_mediarenderer_video_quicktime' => 'tx_news_mediarenderer_video_quicktime',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Video\\File' => 
    array (
      'tx_news_mediarenderer_video_file' => 'tx_news_mediarenderer_video_file',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Video\\Fal' => 
    array (
      'tx_news_mediarenderer_video_fal' => 'tx_news_mediarenderer_video_fal',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Audio\\Mp3Html5' => 
    array (
      'tx_news_mediarenderer_audio_mp3html5' => 'tx_news_mediarenderer_audio_mp3html5',
    ),
    'GeorgRinger\\News\\MediaRenderer\\Audio\\Mp3' => 
    array (
      'tx_news_mediarenderer_audio_mp3' => 'tx_news_mediarenderer_audio_mp3',
    ),
    'GeorgRinger\\News\\Jobs\\ImportJobInterface' => 
    array (
      'tx_news_jobs_importjobinterface' => 'tx_news_jobs_importjobinterface',
    ),
    'GeorgRinger\\News\\Jobs\\AbstractImportJob' => 
    array (
      'tx_news_jobs_abstractimportjob' => 'tx_news_jobs_abstractimportjob',
    ),
    'GeorgRinger\\News\\Hooks\\DataHandler' => 
    array (
      'tx_news_hooks_tcemain' => 'tx_news_hooks_tcemain',
    ),
    'GeorgRinger\\News\\Hooks\\FormEngine' => 
    array (
      'tx_news_hooks_tceforms' => 'tx_news_hooks_tceforms',
    ),
    'GeorgRinger\\News\\Hooks\\BackendUtility' => 
    array (
      'tx_news_hooks_t3libbefunc' => 'tx_news_hooks_t3libbefunc',
    ),
    'GeorgRinger\\News\\Hooks\\SuggestReceiverCall' => 
    array (
      'tx_news_hooks_suggestreceivercall' => 'tx_news_hooks_suggestreceivercall',
    ),
    'GeorgRinger\\News\\Hooks\\SuggestReceiver' => 
    array (
      'tx_news_hooks_suggestreceiver' => 'tx_news_hooks_suggestreceiver',
    ),
    'GeorgRinger\\News\\Hooks\\RealUrlAutoConfiguration' => 
    array (
      'tx_news_hooks_realurlautoconfiguration' => 'tx_news_hooks_realurlautoconfiguration',
    ),
    'GeorgRinger\\News\\Hooks\\Labels' => 
    array (
      'tx_news_hooks_labels' => 'tx_news_hooks_labels',
    ),
    'GeorgRinger\\News\\Hooks\\ItemsProcFunc' => 
    array (
      'tx_news_hooks_itemsprocfunc' => 'tx_news_hooks_itemsprocfunc',
    ),
    'GeorgRinger\\News\\Hooks\\InlineElementHook' => 
    array (
      'tx_news_hooks_inlineelementhook' => 'tx_news_hooks_inlineelementhook',
    ),
    'GeorgRinger\\News\\Hooks\\CmsLayout' => 
    array (
      'tx_news_hooks_cmslayout' => 'tx_news_hooks_cmslayout',
    ),
    'GeorgRinger\\News\\Domain\\Service\\NewsImportService' => 
    array (
      'tx_news_domain_service_newsimportservice' => 'tx_news_domain_service_newsimportservice',
    ),
    'GeorgRinger\\News\\Domain\\Service\\CategoryImportService' => 
    array (
      'tx_news_domain_service_categoryimportservice' => 'tx_news_domain_service_categoryimportservice',
    ),
    'GeorgRinger\\News\\Domain\\Service\\AbstractImportService' => 
    array (
      'tx_news_domain_service_abstractimportservice' => 'tx_news_domain_service_abstractimportservice',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\TtContentRepository' => 
    array (
      'tx_news_domain_repository_ttcontentrepository' => 'tx_news_domain_repository_ttcontentrepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\TagRepository' => 
    array (
      'tx_news_domain_repository_tagrepository' => 'tx_news_domain_repository_tagrepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\NewsRepository' => 
    array (
      'tx_news_domain_repository_newsrepository' => 'tx_news_domain_repository_newsrepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\NewsDefaultRepository' => 
    array (
      'tx_news_domain_repository_newsdefaultrepository' => 'tx_news_domain_repository_newsdefaultrepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\MediaRepository' => 
    array (
      'tx_news_domain_repository_mediarepository' => 'tx_news_domain_repository_mediarepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\LinkRepository' => 
    array (
      'tx_news_domain_repository_linkrepository' => 'tx_news_domain_repository_linkrepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\FileRepository' => 
    array (
      'tx_news_domain_repository_filerepository' => 'tx_news_domain_repository_filerepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\DemandedRepositoryInterface' => 
    array (
      'tx_news_domain_repository_demandedrepositoryinterface' => 'tx_news_domain_repository_demandedrepositoryinterface',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\CategoryRepository' => 
    array (
      'tx_news_domain_repository_categoryrepository' => 'tx_news_domain_repository_categoryrepository',
    ),
    'GeorgRinger\\News\\Domain\\Repository\\AbstractDemandedRepository' => 
    array (
      'tx_news_domain_repository_abstractdemandedrepository' => 'tx_news_domain_repository_abstractdemandedrepository',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Category' => 
    array (
      'tx_news_domain_model_category' => 'tx_news_domain_model_category',
    ),
    'GeorgRinger\\News\\Domain\\Model\\DemandInterface' => 
    array (
      'tx_news_domain_model_demandinterface' => 'tx_news_domain_model_demandinterface',
    ),
    'GeorgRinger\\News\\Domain\\Model\\File' => 
    array (
      'tx_news_domain_model_file' => 'tx_news_domain_model_file',
    ),
    'GeorgRinger\\News\\Domain\\Model\\FileReference' => 
    array (
      'tx_news_domain_model_filereference' => 'tx_news_domain_model_filereference',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Link' => 
    array (
      'tx_news_domain_model_link' => 'tx_news_domain_model_link',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Media' => 
    array (
      'tx_news_domain_model_media' => 'tx_news_domain_model_media',
    ),
    'GeorgRinger\\News\\Domain\\Model\\News' => 
    array (
      'tx_news_domain_model_news' => 'tx_news_domain_model_news',
    ),
    'GeorgRinger\\News\\Domain\\Model\\NewsDefault' => 
    array (
      'tx_news_domain_model_newsdefault' => 'tx_news_domain_model_newsdefault',
    ),
    'GeorgRinger\\News\\Domain\\Model\\NewsExternal' => 
    array (
      'tx_news_domain_model_newsexternal' => 'tx_news_domain_model_newsexternal',
    ),
    'GeorgRinger\\News\\Domain\\Model\\NewsInternal' => 
    array (
      'tx_news_domain_model_newsinternal' => 'tx_news_domain_model_newsinternal',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Tag' => 
    array (
      'tx_news_domain_model_tag' => 'tx_news_domain_model_tag',
    ),
    'GeorgRinger\\News\\Domain\\Model\\TtContent' => 
    array (
      'tx_news_domain_model_ttcontent' => 'tx_news_domain_model_ttcontent',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Dto\\AdministrationDemand' => 
    array (
      'tx_news_domain_model_dto_administrationdemand' => 'tx_news_domain_model_dto_administrationdemand',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Dto\\EmConfiguration' => 
    array (
      'tx_news_domain_model_dto_emconfiguration' => 'tx_news_domain_model_dto_emconfiguration',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Dto\\NewsDemand' => 
    array (
      'tx_news_domain_model_dto_newsdemand' => 'tx_news_domain_model_dto_newsdemand',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Dto\\Search' => 
    array (
      'tx_news_domain_model_dto_search' => 'tx_news_domain_model_dto_search',
    ),
    'GeorgRinger\\News\\Domain\\Model\\Dto\\' => 
    array (
      'tx_news_domain_model_dto_' => 'tx_news_domain_model_dto_',
    ),
  ),
);