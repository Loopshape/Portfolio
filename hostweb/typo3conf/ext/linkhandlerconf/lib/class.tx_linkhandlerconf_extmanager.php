<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2013-2015 - Dirk Wildt <http://wildt.at.die-netzmacher.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * Class provides methods for the extension manager.
 *
 * @author    Dirk Wildt <http://wildt.at.die-netzmacher.de>
 * @package    TYPO3
 * @subpackage    linkhandlerconf
 * @version 0.0.1
 * @since 0.0.1
 */

/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   49: class tx_linkhandlerconf_extmanager
 *   67:     function promptQuickstart( )
 *
 * TOTAL FUNCTIONS: 2
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */
class tx_linkhandlerconf_extmanager
{

  /**
   * promptAbstract( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptAbstract()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-information">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptAbstractBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

  /**
   * promptBearInMind( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptBearInMind()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-warning">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptBearInMindBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

  /**
   * promptConstantEditor( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptConstantEditor()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-information">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptConstantEditorBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

  /**
   * promptExtensionManager( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptExtensionManager()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-information">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptExtensionManagerBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

  /**
   * promptExtensionManager( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptExtensionManagerMyTable()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-information">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptExtensionManagerBody' ) . '
  </div>
</div>
<div class="typo3-message message-warning">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptTyposcriptMyTableCheckBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

  /**
   * promptExternalLinks( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptExternalLinks()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="message-body">
  ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptExternalLinksBody' ) . '
</div>';

    return $str_prompt;
  }

  /**
   * promptOrganiser( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 0.0.1
   * @version 0.0.1
   */
  public function promptOrganiser()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-ok">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptOrganiserBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

  /**
   * promptQuickshop( ): Displays the quick start message.
   *
   * @return  string    message wrapped in HTML
   * @access  public
   * @since 6.1.0
   * @version 6.1.0
   */
  public function promptQuickshop()
  {
//.message-notice
//.message-information
//.message-ok
//.message-warning
//.message-error

    $str_prompt = null;

    $str_prompt = $str_prompt . '
<div class="typo3-message message-ok">
  <div class="message-body">
    ' . $GLOBALS[ 'LANG' ]->sL( 'LLL:EXT:linkhandlerconf/lib/locallang.xml:promptQuickshopBody' ) . '
  </div>
</div>
';

    return $str_prompt;
  }

}

if ( defined( 'TYPO3_MODE' ) && $TYPO3_CONF_VARS[ TYPO3_MODE ][ 'XCLASS' ][ 'ext/linkhandlerconf/lib/class.tx_linkhandlerconf_extmanager.php' ] )
{
  include_once($TYPO3_CONF_VARS[ TYPO3_MODE ][ 'XCLASS' ][ 'ext/linkhandlerconf/lib/class.tx_linkhandlerconf_extmanager.php' ]);
}
?>