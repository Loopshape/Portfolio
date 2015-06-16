<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Configuration by the extension manager
$confArr  = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['linkhandlerconf']);

  // add dynamic page TSConfig
$path = PATH_typo3conf . 'ext/linkhandlerconf/tsConfig/';

require_once( $path . 'mytables.php' );
require_once( $path . 'tt_news.php' );
require_once( $path . 'tt_products.php' );
require_once( $path . 'tx_cal_event.php' );
require_once( $path . 'tx_news_domain_model_news.php' );
require_once( $path . 'tx_sfeventmgt_domain_model_event.php' );
  // add dynamic page TSConfig

  // add file to include static templates
t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/', 'Link Handler [1] Configurator');

?>