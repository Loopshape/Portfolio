<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$table  = 'tt_news';
$conf   = $confArr[ $table . '.'];

  // RETURN : current configuration is disabled
if( $conf['disabled'] ) 
{
    return;
}
  // RETURN : current configuration is disabled


  // Init tsConfig
$tsConfig = '

mod.tx_linkhandler {
  ' . $table . ' {
    label       = ' . $conf['label'] . '
    listTables  = ' . $conf['listTables'] . '
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.' . $table . ' < mod.tx_linkhandler.' . $table . '
';

switch( true )
{
  case( ! empty ( $conf['onlyPids'] ) ):
    $onlyPids = 'onlyPids    = ' . $conf['onlyPids'];
    break;
  case( empty ( $conf['onlyPids'] ) ):
  default;
    $onlyPids = null;
    break;  
}

$tsConfig = str_replace( '%onlyPids%', $onlyPids, $tsConfig );
t3lib_extMgm::addPageTSConfig( $tsConfig );

return;

?>
