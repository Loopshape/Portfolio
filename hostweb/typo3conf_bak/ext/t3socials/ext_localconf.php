<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');

/* *** ***************** *** *
 * *** Register Networks *** *
 * *** ***************** *** */
tx_rnbase::load('tx_t3socials_network_Config');
tx_t3socials_network_Config::registerNetwork(
	'tx_t3socials_network_pushd_NetworkConfig'
);
tx_t3socials_network_Config::registerNetwork(
	'tx_t3socials_network_twitter_NetworkConfig'
);
tx_t3socials_network_Config::registerNetwork(
	'tx_t3socials_network_xing_NetworkConfig'
);
tx_t3socials_network_Config::registerNetwork(
	'tx_t3socials_network_facebook_NetworkConfig'
);


/* *** **************** *** *
 * *** Register Trigger *** *
 * *** **************** *** */
tx_rnbase::load('tx_t3socials_trigger_Config');
tx_t3socials_trigger_Config::registerTrigger(
	'tx_t3socials_trigger_news_TriggerConfig'
);

/* *** ****************** *** *
 * *** HybridAuth (FE/BE) *** *
 * *** ****************** *** */
// ajax id for BE
$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['t3socials-hybridauth']
	= t3lib_extMgm::extPath('t3socials', 'network/hybridauth/class.tx_t3socials_network_hybridauth_OAuthCall.php') .
		':tx_t3socials_network_hybridauth_OAuthCall->ajaxId';

/* *** ***** *** *
 * *** Hooks *** *
 * *** ***** *** */
// TCE-Hooks, um automatisch beim speichern trigger aufzurufen
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['t3socials']
	= 'EXT:t3socials/hooks/class.tx_t3socials_hooks_TCEHook.php:tx_t3socials_hooks_TCEHook';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['t3socials']
	= 'EXT:t3socials/hooks/class.tx_t3socials_hooks_TCEHook.php:tx_t3socials_hooks_TCEHook';

/* *** ***************** *** *
 * *** Register Services *** *
 * *** ***************** *** */
tx_rnbase::load('tx_t3socials_srv_ServiceRegistry');
t3lib_extMgm::addService($_EXTKEY, 't3socials' /* sv type */, 'tx_t3socials_srv_Network' /* sv key */,
	array(
		'title' => 'Social network accounts', 'description' => 'Handles accounts of social networks', 'subtype' => 'network',
		'available' => TRUE, 'priority' => 50, 'quality' => 50,
		'os' => '', 'exec' => '',
		'classFile' => t3lib_extMgm::extPath($_EXTKEY, 'srv/class.tx_t3socials_srv_Network.php'),
		'className' => 'tx_t3socials_srv_Network',
	)
);

/* *** ****************** *** *
 * *** System Enviromends *** *
 * *** ****************** *** */
defined('TAB') || define('TAB', chr(9));
defined('LF') || define('LF', chr(10));
defined('CR') || define('CR', chr(13));
defined('CRLF') || define('CRLF', CR . LF);