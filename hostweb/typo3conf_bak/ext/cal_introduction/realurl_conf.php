<?php
$GLOBALS ['TYPO3_CONF_VARS'] ['EXTCONF'] ['realurl'] = array (
		'_DEFAULT' => array (
				'init' => array (
						'enableCHashCache' => TRUE,
						'appendMissingSlash' => 'ifNotFile,redirect',
						'adminJumpToBackend' => TRUE,
						'enableUrlDecodeCache' => TRUE,
						'enableUrlEncodeCache' => TRUE,
						'emptyUrlReturnValue' => \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL'), 
				),
				'pagePath' => array (
						'type' => 'user',
						'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
						'spaceCharacter' => '-',
						'languageGetVar' => 'L',
						'dontResolveShortcuts' => FALSE,
				),
				'redirects' => array (
				),
				'preVars' => array (
						'0' => array (
								'GETvar' => 'no_cache',
								'valueMap' => array (
										'nc' => '1',
								),
								'noMatch' => 'bypass'
						),
						'1' => array (
			                'GETvar' => 'L',
			                'valueMap' => array (
			                    'da' => '1',
			                    'de' => '2',
			                ),
			                'noMatch' => 'bypass',
			            ),
				),
				'fileName' => array (
						'defaultToHTMLsuffixOnPrev' => 1,
						'acceptHTMLsuffix' => 1,
						'index' => array (
								'print' => array (
										'keyValues' => array (
												'type' => 98 
										) 
								),
								'calendarRSS.xml' => array (
										'keyValues' => array (
												'type' => 151 
										) 
								),
								'calendar.ics' => array (
										'keyValues' => array (
												'type' => 150 
										) 
								) 
						) 
				),
				'postVarSets' => array (
						'_DEFAULT' => array (
								'calendar' => array (
										0 => array (
												'GETvar' => 'tx_cal_controller[year]',
												'valueMap' => array (
														2000 => '2000',
														2001 => '2001',
														2002 => '2002',
														2003 => '2003',
														2004 => '2004',
														2005 => '2005',
														2006 => '2006',
														2007 => '2007',
														2008 => '2008',
														2009 => '2009',
														2010 => '2010',
														2011 => '2011',
														2012 => '2012',
														2013 => '2013',
														2014 => '2014',
														2015 => '2015',
														2016 => '2016',
														2017 => '2017',
														2018 => '2018',
														2019 => '2019',
														2020 => '2020' 
												),
												'noMatch' => 'bypass' 
										),
										1 => array (
												'GETvar' => 'tx_cal_controller[month]',
												'valueMap' => array (
														'01' => '01',
														'02' => '02',
														'03' => '03',
														'04' => '04',
														'05' => '05',
														'06' => '06',
														'07' => '07',
														'08' => '08',
														'09' => '09',
														1 => '1',
														2 => '2',
														3 => '3',
														4 => '4',
														5 => '5',
														6 => '6',
														7 => '7',
														8 => '8',
														9 => '9',
														10 => '10',
														11 => '11',
														12 => '12' 
												),
												'noMatch' => 'bypass' 
										),
										2 => array (
												'GETvar' => 'tx_cal_controller[day]',
												'valueMap' => array (
														'01' => '01',
														'02' => '02',
														'03' => '03',
														'04' => '04',
														'05' => '05',
														'06' => '06',
														'07' => '07',
														'08' => '08',
														'09' => '09',
														1 => '1',
														2 => '2',
														3 => '3',
														4 => '4',
														5 => '5',
														6 => '6',
														7 => '7',
														8 => '8',
														9 => '9',
														10 => '10',
														11 => '11',
														12 => '12',
														13 => '13',
														14 => '14',
														15 => '15',
														16 => '16',
														17 => '17',
														18 => '18',
														19 => '19',
														20 => '20',
														21 => '21',
														22 => '22',
														23 => '23',
														24 => '24',
														25 => '25',
														26 => '26',
														27 => '27',
														28 => '28',
														29 => '29',
														30 => '30',
														31 => '31' 
												),
												'noMatch' => 'bypass' 
										),
										3 => array (
												'GETvar' => 'tx_cal_controller[view]',
												'valueMap' => array (
														'month' => 'month',
														'year' => 'year',
														'week' => 'week',
														'day' => 'day',
														'event' => 'event',
														'list' => 'list',
														'admin' => 'admin',
														'search_event' => 'search_event',
														'search_location' => 'search_location',
														'search_organizer' => 'search_organizer',
														'search_all' => 'search_all',
														'create_event' => 'create_event',
														'confirm_event' => 'confirm_event',
														'save_event' => 'save_event',
														'edit_event' => 'edit_event',
														'delete_event' => 'delete_event',
														'remove_event' => 'remove_event',
														'save_exception_event' => 'save_exception_event',
														'create_calendar' => 'create_calendar',
														'confirm_calendar' => 'confirm_calendar',
														'save_calendar' => 'save_calendar',
														'edit_calendar' => 'edit_calendar',
														'delete_calendar' => 'delete_calendar',
														'remove_calendar' => 'remove_calendar',
														'create_category' => 'create_category',
														'confirm_category' => 'confirm_category',
														'save_category' => 'save_category',
														'edit_category' => 'edit_category',
														'delete_category' => 'delete_category',
														'remove_category' => 'remove_category',
														'create_location' => 'create_location',
														'confirm_location' => 'confirm_location',
														'save_location' => 'save_location',
														'edit_location' => 'edit_location',
														'delete_location' => 'delete_location',
														'remove_location' => 'remove_location',
														'create_organizer' => 'create_organizer',
														'confirm_organizer' => 'confirm_organizer',
														'save_organizer' => 'save_organizer',
														'edit_organizer' => 'edit_organizer',
														'delete_organizer' => 'delete_organizer',
														'remove_organizer' => 'remove_organizer',
														'organizer' => 'organizer',
														'location' => 'location',
														'ics' => 'ics',
														'icslist' => 'icslist',
														'single_ics' => 'single_ics',
														'subscription' => 'subscription',
														'meeting' => 'meeting',
														'translation' => 'translation',
														'todo' => 'todo',
														'ajax' => 'ajax' 
												),
												'noMatch' => 'bypass' 
										),
										4 => array (
												'GETvar' => 'tx_cal_controller[type]',
												'valueMap' => array (
														'tx_cal_phpicalendar' => 'tx_cal_phpicalendar',
														'tx_cal_organizer' => 'tx_cal_organizer',
														'tx_cal_location' => 'tx_cal_location',
														'tx_cal_calendar' => 'tx_cal_calendar',
														'tx_cal_category' => 'tx_cal_category',
														'tx_cal_attendee' => 'tx_cal_attendee',
														'tx_tt_address' => 'tx_tt_address',
														'tx_feuser' => 'tx_feuser',
														'tx_partner_main' => 'tx_feuser' 
												),
												'noMatch' => 'bypass' 
										),
										5 => array (
												'cond' => array (
														'prevValueInList' => 'tx_cal_phpicalendar' 
												),
												'GETvar' => 'tx_cal_controller[uid]',
												'lookUpTable' => array (
														'table' => 'tx_cal_event',
														'id_field' => 'uid',
														'alias_field' => 'title',
														'addWhereClause' => ' AND NOT deleted',
														'useUniqueCache' => 1,
														'useUniqueCache_conf' => array (
																'strtolower' => 1,
																'spaceCharacter' => '_' 
														) 
												) 
										),
										6 => array (
												'cond' => array (
														'prevValueInList' => 'tx_cal_organizer' 
												),
												'GETvar' => 'tx_cal_controller[uid]',
												'lookUpTable' => array (
														'table' => 'tx_cal_organizer',
														'id_field' => 'uid',
														'alias_field' => 'name',
														'addWhereClause' => ' AND NOT deleted',
														'useUniqueCache' => 1,
														'useUniqueCache_conf' => array (
																'strtolower' => 1,
																'spaceCharacter' => '_' 
														) 
												) 
										),
										7 => array (
												'cond' => array (
														'prevValueInList' => 'tx_cal_location' 
												),
												'GETvar' => 'tx_cal_controller[uid]',
												'lookUpTable' => array (
														'table' => 'tx_cal_location',
														'id_field' => 'uid',
														'alias_field' => 'name',
														'addWhereClause' => ' AND NOT deleted',
														'useUniqueCache' => 1,
														'useUniqueCache_conf' => array (
																'strtolower' => 1,
																'spaceCharacter' => '_' 
														) 
												) 
										) 
								),
								'export' => array (
										0 => array (
												'GETvar' => 'tx_cal_controller[calendar]',
												'lookUpTable' => array (
														'table' => 'tx_cal_calendar',
														'id_field' => 'uid',
														'alias_field' => 'title',
														'addWhereClause' => ' AND NOT deleted',
														'useUniqueCache' => 1,
														'useUniqueCache_conf' => array (
																'strtolower' => 1,
																'spaceCharacter' => '_' 
														) 
												),
										) 
								) 
						) 
				) 
		) 
);
