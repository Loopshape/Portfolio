<?php
if( !defined( 'TYPO3_MODE' ) )
{
	die( 'Access denied.' );
}
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] = 'EXT:t3_less/Classes/Controller/BaseController.php:DG\\T3Less\\Controller\\BaseController->baseAction';

?>