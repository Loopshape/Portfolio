<?php
namespace Intera\Recordlink\Hooks;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Buja Cristian <cristian.buja@intera.it>
 *
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
 ***************************************************************/

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Utility\MathUtility;
use \TYPO3\CMS\Backend\Utility\BackendUtility;
use \TYPO3\CMS\Core\ElementBrowser\ElementBrowserHookInterface;

/**
 * Adjust wizard link Hooks
 *
 * Hook which is used to adjust wizard link
 *
 * @package Recordlink
 * @subpackage Hooks
 * @route off
 */
class ElementBrowser implements \TYPO3\CMS\Core\ElementBrowser\ElementBrowserHookInterface {

  /**
   * the browse_links object
   */
  protected $pObj;

  protected $allAvailableTabHandlers = array();

  /**
   * TCA configuration of "blindLinkOptions" for the current field
   *
   * @var string OPTIONAL Comma separated list
   */
  protected $blindLinkOptions = '';

  /**
   * initializes the hook object
   *
   * @param \TYPO3\CMS\Recordlist\Browser\ElementBrowser $pObj
   * @param array $params
   * @return void
   */
  public function init($pObj, $params) {

    $this->pObj = $pObj;
    $this->act = 'record';
    $this->config = GeneralUtility::_GP('config');
    $this->pointer = GeneralUtility::_GP('pointer');
    $this->_checkConfigAndGetDefault();
    
    $this->configs = $this->getTabsConfig();
    
    if ($this->config) {

      $this->addPassOnParams = '&config=' . $this->config;
      if (!$this->isRTE()) {
        $P2 = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('P');
        if (is_array($P2) && !empty($P2) ) {
          $this->addPassOnParams .= GeneralUtility::implodeArrayForUrl('P', $P2);
        }
      } else {
        $curUrl = GeneralUtility::_GP('curUrl');
        if (is_array($curUrl) && !empty($curUrl) ) {
          $this->addPassOnParams .= GeneralUtility::implodeArrayForUrl('curUrl', $curUrl);
        }
      }
      
    }
  }
  
  /**
   * checks the current URL and returns a info array. This is used to
   * tell the link browser which is the current tab based on the current URL.
   * function should at least return the $info array.
   *
   * @param string $href
   * @param string $siteUrl
   * @param array $info Current info array.
   * @return array $info a infoarray for browser to tell them what is current active tab
   */
  public function parseCurrentUrl($href, $siteUrl, $info) {

    // depending on link and setup the href string can contain complete absolute link
    if (substr($href, 0, 7) == 'http://') {
      if ($_href = strstr($href, '?id=')) {
        $href = substr($_href, 4);
      } else {
        $href = substr(strrchr($href, '/'), 1);
      }
    }

    list($currentHandler, $config, $uid) = explode(':', $href);
    
    if ($currentHandler == 'record') {
      if (empty($this->config)) {
      $this->config = $config;
      }
      if ($this->config && !array_key_exists($this->config, $this->configs)) {
      $this->config = '';
      }
      
      $table = $this->configs[$config]['table'];
      $label = $this->configs[$config]['label'];
      $record = BackendUtility::getRecordWSOL($table, $uid);
      $title = BackendUtility::getRecordTitle($table, $record, FALSE, TRUE);
      $info['info'] = $label . ' \'' . $title . '\' (ID:' . $uid . ')';
      $info['act'] = $currentHandler;
      $info['config'] = $config;
      $info['recordTable'] = $table;
      $info['recordUid'] = $uid;
      
      $this->addPassOnParams .= '&config=' . $this->config;

      if (!$this->isRTE()) {
        $P2 = GeneralUtility::_GP('P');
        if (is_array($P2) && !empty($P2) ) {
          $this->addPassOnParams .= GeneralUtility::implodeArrayForUrl('P', $P2);
        }
      } else {
        $curUrl = GeneralUtility::_GP('curUrl');
        if (is_array($curUrl) && !empty($curUrl) ) {
          $this->addPassOnParams .= GeneralUtility::implodeArrayForUrl('curUrl', $curUrl);
        }
      }
      
    }
    
    return $info;
  }
  
  /**
   * adds new item to the currently allowed ones and returns them
   *
   * @param array $allowedItems currently allowed items
   * @return array currently allowed items plus added items
   */
  public function addAllowedItems($allowedItems) {
    $allowedItems[] = $this->act;
    return $allowedItems;
  }

  /**
   * modifies the menu definition and returns it
   *
   * @param array $menuDef menu definition
   * @return array modified menu definition
   */
  public function modifyMenuDefinition($menuDef) {
    $menuDef[$this->act] = array();
    $menuDef[$this->act]['isActive'] = $this->pObj->act == $this->act;
    $menuDef[$this->act]['label'] = $GLOBALS['LANG']->sL('LLL:EXT:recordlink/Resources/Private/Language/locallang_be.xlf:record');
    $menuDef[$this->act]['url'] = '#';
    $params = '';
    $params .= ($this->isRTE()) ? '&mode=rte' : '';
    $menuDef[$this->act]['addParams'] = 'onclick="jumpToUrl(' . GeneralUtility::quoteJSvalue('?act=' . $this->act . $params) . ');return false;"';

    return $menuDef;
  }
  


  /**
   * returns a new tab for the browse links wizard
   *
   * @param string current link selector action
   * @return string a tab for the selected link action
   */
  public function getTab($act) {

    $content = '
        <!--
          Record link:
        -->
    ';    
    
    // get current href value (diffrent for RTE and normal browselinks)
    if ($this->isRTE()) {
      $currentValue = $this->pObj->curUrlInfo['value'];
      $content .= $this->pObj->addAttributesForm();
    } else {
      $currentValue = $this->pObj->P['currentValue'];
    }
    
    $cElements = '<h3>'
      . $GLOBALS['LANG']->sL('LLL:EXT:recordlink/Resources/Private/Language/locallang_be.xlf:select_linktype')
      . '</h3>';
    $params = '';
    $params .= ($this->isRTE()) ? '&mode=rte' : '';
    $onChange = 'onchange="jumpToUrl(' . GeneralUtility::quoteJSvalue('?act='.$this->act . '&config=') . ' + this.value + ' . GeneralUtility::quoteJSvalue($params) . '); return false;"';
    $cElements .= '<select ' . $onChange . ' >';  
    if(!$this->config) {
      $cElements .= '<option value="0"></option>';
    }
    foreach ($this->configs as $key => $config) {
      if($key==$this->config) {
      $cElements .= '<option value="'.$key.'" selected="selected">'.$config['label'].'</option>';
      } else {
      $cElements .= '<option value="'.$key.'">'.$config['label'].'</option>';
      }
    }    
    $cElements .= '</select><br />';
    
    
    if($this->config && array_key_exists($this->config, $this->configs)) {
        // Headline for selecting records:
      $cElements .= '<h3>'
      . $GLOBALS['LANG']->sL('LLL:EXT:recordlink/Resources/Private/Language/locallang_be.xlf:select_record')
      . '</h3>';
      
      // Initialize the record listing:
      $table = $this->configs[$this->config]['table'];
      $id = $this->configs[$this->config]['pid'];
      $pointer = MathUtility::forceIntegerInRange($this->pointer, 0, 100000);
      $pagePermsClause = $GLOBALS['BE_USER']->getPagePermsClause(1);
      $pageinfo = BackendUtility::readPageAccess($id, $pagePermsClause);
      
      // Generate the record list:
      $dblist = GeneralUtility::makeInstance('Intera\Recordlink\RecordList\ElementBrowserRecordList');
      $dblist->setAddPassOnParameters($this->addPassOnParams);
      // ?
      //$dblist->disableSingleTableView = true;
      $dblist->browselistObj = $this->pObj;
      $dblist->backPath = $GLOBALS['BACK_PATH'];
      $dblist->thumbs = 0;
      $dblist->calcPerms = $GLOBALS['BE_USER']->calcPerms($pageinfo);
      $dblist->noControlPanels = 1;
      $dblist->clickMenuEnabled = 0;
      $dblist->tableList = $table;
      
      //new option
      $dblist->linkConfig = $this->config;
          
      $dblist->start($id, $dblist->tableList, $pointer,
        GeneralUtility::_GP('search_field'),
        $this->configs[$this->config]['recursive'],
        GeneralUtility::_GP('showLimit')
      );

      $dblist->setDispFields();
      $dblist->generateList();
      $dblist->writeBottom();
      
      //  Add the HTML for the record list to output variable:
      $cElements .= $dblist->HTMLcode;
      $cElements .= $dblist->getSearchBox();
    }
    
    $content .= '
        <!--
          Wrapper table for page tree / record list:
        -->
        <table border="0" cellpadding="0" cellspacing="0" id="typo3-linkPages">
          <tr>
            <td class="c-wCell" valign="top">' . $cElements . '</td>
          </tr>
        </table>
        <hr />
    ';
    
    return $content;

  }


  /**
  * returns the complete configuration (tsconfig) of all tabs
  */
  private function getTabsConfig() {
    $tabs = array();

    if (is_array($this->pObj->thisConfig['tx_recordlink.'])) {
      foreach ($this->pObj->thisConfig['tx_recordlink.'] as $name => $tabConfig) {
        if (is_array($tabConfig)) {
          $key = substr($name, 0, -1);
          if (GeneralUtility::inList($this->blindLinkOptions, $key)) {
            continue;
          }

          $tabs[$key] = $tabConfig;
        }
      }
    }
    return $tabs;
  }

  /**
  * returns config for a single tab
  */
  private function getTabConfig($tabKey) {
    $conf = $this->getTabsConfig();
    return $conf[$tabKey];
  }

  /**
  * returns if the current linkwizard is RTE or not
  **/
  protected function isRTE() {
    return($this->pObj->mode == 'rte');
  }
  
  private function _checkConfigAndGetDefault() {
    if ($this->pObj->mode == 'rte') {
      $RTEtsConfigParts = explode(':', $this->pObj->RTEtsConfigParams);
      $RTEsetup = $GLOBALS["BE_USER"]->getTSConfig('RTE', BackendUtility::getPagesTSconfig($RTEtsConfigParts[5]));
      $this->pObj->thisConfig = BackendUtility::RTEsetup($RTEsetup['properties'], $RTEtsConfigParts[0], $RTEtsConfigParts[2], $RTEtsConfigParts[4]);
    } elseif (! is_array($this->pObj->thisConfig['tx_recordlink.']) ) {
      $pid = $this->getCurrentPageId();
      $modTSconfig = $GLOBALS["BE_USER"]->getTSConfig("mod.tx_recordlink", BackendUtility::getPagesTSconfig($pid));

      $this->pObj->thisConfig['tx_recordlink.'] = $modTSconfig['properties'];
    }
  }
  
  /**
   * Return the ID of current page.
   *
   * @return integer
   */
  private function getCurrentPageId() {
    $pageId = 0;

    if ($this->isRTE()) {
      $confParts = explode(':', $this->pObj->RTEtsConfigParams);
      $pageId = $confParts[5];
    } else {
      $P = GeneralUtility::_GP('P');

      if (is_array($P) && array_key_exists('pid', $P)) {
        $pageId = $P['pid'];
      } else {
        $pageId = $this->findPageIdFromData($P);
      }
    }

    return $pageId;
  }
  
  /**
   * Try to find the current page id from the value containing the itemNode value.
   *
   * @param array $params $_GET Parameter from linkwizard
   * @return integer
   */
  private function findPageIdFromData($params) {
    $pageId = 0;

    if (is_array($params) && array_key_exists('itemName', $params)) {

      preg_match('~data\[([^]]*)\]\[([^]]*)\]~', $params['itemName'], $matches);
      $recordArray = BackendUtility::getRecord($matches['1'], $matches['2']);

      if (is_array($recordArray)) {
        $pageId = $recordArray['pid'];
      }
    }

    return $pageId;
  }

}
