<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$myTables = array(
  'mytable01',
  'mytable02',
  'mytable03',
  'mytable04',
  'mytable05',
  'mytable06',
  'mytable07',
  'mytable08',
  'mytable09',
  'mytable10'
);

foreach( $myTables as $myTable )
{
    // Get the configuration array
  $conf = $confArr[ $myTable . '.'];

    // CONTINUE : current table is disabled
  if( $conf['disabled'] ) 
  {
     continue;
  }
    // CONTINUE : current table is disabled

  list( $table )  = explode( ',', $conf[ 'table' ] );
  $table          = trim( $table );

    // Init tsConfig
  $tsConfig = '

  mod.tx_linkhandler {
    ' . $table . ' {
      label       = ' . $conf['label'] . '
      listTables  = ' . $table . '
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

}


?>
