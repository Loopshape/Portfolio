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
use \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Render link Hooks
 *
 * Hook which is used to render custom link
 *
 * @package Recordlink
 * @subpackage Hooks
 * @route off
 */
class LinkHandler {

  /**
   * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
   */
  protected $localContentObject = NULL;

  /**
   * Process the link generation
   *
   * @param string $linkText
   * @param array $typoLinkConfiguration TypoLink Configuration array
   * @param string $linkHandlerKeyword Define the identifier that an record is given
   * @param string $linkHandlerValue Table and uid of the requested record like "tt_news:2"
   * @param string $linkParameters Full link params like "record:tt_news:2"
   * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $contentObjectRenderer
   * @return string
   */
  public function main($linkText, array $typoLinkConfiguration, $linkHandlerKeyword, $linkHandlerValue, $linkParameters, \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $contentObjectRenderer) {
    $typoScriptConfiguration = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_recordlink.'];

    // extract link params like "target", "css-class" or "title"
    $additionalLinkParameters = str_replace($linkHandlerKeyword . ':' . $linkHandlerValue, '', $linkParameters);
    list ($recordTableName, $recordUid) = GeneralUtility::trimExplode(':', $linkHandlerValue);

    $typolinkConf = $typoScriptConfiguration[$recordTableName . '.']['typolink.'];
    $typolinkConf['parameter'] .= $additionalLinkParameters;
    
    $recordTableName = $typoScriptConfiguration[$recordTableName . '.']['table'];    
    $recordArray = $this->getCurrentRecord($recordTableName, $recordUid);
    
    $this->localContentObject = clone $contentObjectRenderer;
    $this->localContentObject->start($recordArray, '');
    
    $currentLinkConfigurationArray = $typolinkConf;
        
    $generatedLink = $this->localContentObject->typoLink($linkText, $currentLinkConfigurationArray);
    $this->updateParentLastTypoLinkMember($contentObjectRenderer);
    
    return $generatedLink;
  }


  /**
   * Indicate that the requested link can be created or not.
   *
   * @param string $recordTableName The name of database table
   * @param array $typoScriptConfiguration Global defined TypoScript cofiguration for the linkHandler
   * @param array $recordArray Requested record to link to it
   * @access protected
   * @return bool
   */
  protected function isRecordLinkable($recordTableName, array $typoScriptConfiguration, array $recordArray) {
    $isLinkable = FALSE;

      // record type link configuration available
    if (is_array($typoScriptConfiguration) && array_key_exists($recordTableName . '.', $typoScriptConfiguration)) {
      if (
          (is_array($recordArray) && !empty($recordArray))
        ||
          ((int) $typoScriptConfiguration[$recordTableName . '.']['forceLink'] === 1)
      ) {
        $isLinkable = TRUE;
      }
    }

    return $isLinkable;
  }


  /**
   * Find the current record to work with.
   *
   * This method keeps attention on the l18n_parent field and retrieve the original record.
   *
   * @param string $recordTableName The name of database table
   * @param integer $recordUid ID of the record
   * @access protected
   * @return array
   */
  protected function getCurrentRecord($recordTableName, $recordUid) {

    static $cache = array();
    $parameterHash = $recordTableName . intval($recordUid);

    if (isset($cache[$parameterHash])) {
      return $cache[$parameterHash];
    }

    // check for l18n_parent and fix the recordRow {
    if (is_array($GLOBALS['TCA'][$recordTableName]['ctrl'])) {
      $l18nPointer = (array_key_exists('transOrigPointerField', $GLOBALS['TCA'][$recordTableName]['ctrl']))
        ? $GLOBALS['TCA'][$recordTableName]['ctrl']['transOrigPointerField']
        : '';
    } else {
      $l18nPointer = '';
    }

    $recordArray = $GLOBALS['TSFE']->sys_page->getRawRecord($recordTableName, $recordUid);

    if (is_array($recordArray) && (array_key_exists($l18nPointer, $recordArray) && $recordArray[$l18nPointer] > 0 && $recordArray['sys_language_uid'] > 0)) {
      $recordArray = $GLOBALS['TSFE']->sys_page->getRawRecord($recordTableName, $recordArray[$l18nPointer]);
    }

    $cache[$parameterHash] = $recordArray;
    return $recordArray;
  }


  /**
   * Update the lastTypoLink member of the contentObjectRenderer
   * 
   * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $contentObjectRenderer
   * @access public
   * @return void
   */
  protected function updateParentLastTypoLinkMember(ContentObjectRenderer $contentObjectRenderer) {
    $contentObjectRenderer->lastTypoLinkUrl = $this->localContentObject->lastTypoLinkUrl;
    $contentObjectRenderer->lastTypoLinkTarget = $this->localContentObject->lastTypoLinkTarget;
    $contentObjectRenderer->lastTypoLinkLD = $this->localContentObject->lastTypoLinkLD;
  }


  /**
   * Merge all TypoScript for the typoLink from the global and local defined settings.
   * 
   * @param array $linkConfigurationArray Global defined TypoScript cofiguration for the linkHandler
   * @param array $typoLinkConfigurationArray Local typolink TypoScript configuration for current link
   * @param string $recordTableName The name of database table
   * @access protected
   * @return array
   */
  protected function mergeTypoScript(array $linkConfigurationArray , array $typoLinkConfigurationArray, $recordTableName) {

      // precompile the "additionalParams"
    $linkConfigurationArray[$recordTableName . '.']['additionalParams'] = $this->localContentObject->stdWrap($linkConfigurationArray[$recordTableName . '.']['additionalParams'], $linkConfigurationArray[$recordTableName . '.']['additionalParams.']);
    unset($linkConfigurationArray[$recordTableName . '.']['additionalParams.']);

      // merge recursive the "additionalParams" from "$typoScriptConfiguration" with the "$typoLinkConfigurationArray"
    if ( array_key_exists('additionalParams', $typoLinkConfigurationArray) ) {
      $typoLinkConfigurationArray['additionalParams'] = GeneralUtility::implodeArrayForUrl(
        '',
        GeneralUtility::array_merge_recursive_overrule(
          GeneralUtility::explodeUrl2Array($linkConfigurationArray[$recordTableName . '.']['additionalParams']),
          GeneralUtility::explodeUrl2Array($typoLinkConfigurationArray['additionalParams'])
        )
      );
    }

      // merge the linkhandler configuration from "$typoScriptConfiguration" with the current "$typoLinkConfiguration"
    if (is_array($typoLinkConfigurationArray) && !empty($typoLinkConfigurationArray)) {
      if (array_key_exists('parameter.', $typoLinkConfigurationArray)) {
        unset($typoLinkConfigurationArray['parameter.']);
      }
      $linkConfigurationArray[$recordTableName . '.'] = array_merge($linkConfigurationArray[$recordTableName . '.'], $typoLinkConfigurationArray);
    }

    return $linkConfigurationArray[$recordTableName . '.'];
  }
}

?>