<?php
namespace Intera\Recordlink\RecordList;
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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\Utility\IconUtility;

  
/**
 * Extend ElementBrowserRecordList for link wizard
 *
 * @package Recordlink
 * @subpackage RecordList
 * @route off
 */
class ElementBrowserRecordList extends \TYPO3\CMS\Backend\RecordList\ElementBrowserRecordList {

  /**
   * @var string
   */
  protected $addPassOnParameters;

  /**
   * @var string
   */
  protected $linkHandler = 'record';
  
  public $linkConfig = '';

  /**
   * Set the parameters that should be added to the link, in order to keep the required vars for the linkwizard
   * @param string $addPassOnParameters
   * @return void
   */
  public function setAddPassOnParameters($addPassOnParameters) {
    $this->addPassOnParameters = $addPassOnParameters;
  }

  /**
   * Override the default linkhandler
   *
   * @param string $linkHandler
   * @return void
   */
  public function setOverwriteLinkHandler($linkHandler) {
    $this->linkHandler = $linkHandler;
  }

  /**
   * Returns the title of a record (from table $table) with the proper link around (that is for "pages"-records a link to the level of that record)
   *
   * @param string $table Table name
   * @param integer $uid UID
   * @param string $title Title string
   * @param array $row Records array (from table name)
   * @return string
   */
  public function linkWrapItems($table, $uid, $title, $row) {
    // if we handle translation records, make sure that we refer to the localisation parent with their uid
    if (is_array($GLOBALS['TCA'][$table]['ctrl']) && array_key_exists('transOrigPointerField', $GLOBALS['TCA'][$table]['ctrl']) ) {
      $transOrigPointerField = $GLOBALS['TCA'][$table]['ctrl']['transOrigPointerField'];

      if (\TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($row[$transOrigPointerField]) > 0) {
        $uid = $row[$transOrigPointerField];
      }
    }

    $currentImage = '';
    if ($this->browselistObj->curUrlInfo['recordTable'] === $table && $this->browselistObj->curUrlInfo['recordUid'] === $uid) {
      $currentImage = '<img' .
        \TYPO3\CMS\Backend\Utility\IconUtility::skinImg($GLOBALS['BACK_PATH'], 'gfx/blinkarrow_right.gif', 'width="5" height="9"') .
        ' class="c-blinkArrowL" alt="" />';
    }

    $title = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordTitle($table, $row, FALSE, TRUE);

    if (@$this->browselistObj->mode === 'rte') {
      //used in RTE mode:
      $aOnClick = 'return link_spec(\'' . $this->linkHandler . ':' . $this->linkConfig . ':' . $uid . '\');';
    } else {
      //used in wizard mode
      $aOnClick = 'return link_folder(\'' . $this->linkHandler . ':' . $this->linkConfig . ':' . $uid . '\');';
    }

    return '<a href="#" onclick="' . $aOnClick . '">' . $title . $currentImage . '</a>';
  }

  /**
   * Returns additional, local GET parameters to include in the links of the record list.
   *
   * @return string
   */
  public function ext_addP() {
    $str = '&act=' . $GLOBALS['SOBE']->browser->act .
      '&editorNo=' . $this->browselistObj->editorNo .
      '&contentTypo3Language=' . $this->browselistObj->contentTypo3Language .
      '&contentTypo3Charset=' . $this->browselistObj->contentTypo3Charset .
      '&mode=' . $GLOBALS['SOBE']->browser->mode .
      '&expandPage=' . $GLOBALS['SOBE']->browser->expandPage .
      '&RTEtsConfigParams=' . \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('RTEtsConfigParams') .
      '&bparams=' . rawurlencode($GLOBALS['SOBE']->browser->bparams) .
      $this->addPassOnParameters;
    return $str;
  }
  
  public function getTable($table, $id, $rowlist) {
    // Init
    $addWhere = '';
    $titleCol = $GLOBALS['TCA'][$table]['ctrl']['label'];
    $thumbsCol = $GLOBALS['TCA'][$table]['ctrl']['thumbnail'];
    $l10nEnabled = $GLOBALS['TCA'][$table]['ctrl']['languageField'] && $GLOBALS['TCA'][$table]['ctrl']['transOrigPointerField'] && !$GLOBALS['TCA'][$table]['ctrl']['transOrigPointerTable'];
    $tableCollapsed = (boolean)$this->tablesCollapsed[$table];
    // prepare space icon
    $this->spaceIcon = IconUtility::getSpriteIcon('empty-empty', array('style' => 'background-position: 0 10px;'));
    // Cleaning rowlist for duplicates and place the $titleCol as the first column always!
    $this->fieldArray = array();
    // title Column
    // Add title column
    $this->fieldArray[] = $titleCol;
    // Control-Panel
    if (!GeneralUtility::inList($rowlist, '_CONTROL_')) {
      $this->fieldArray[] = '_CONTROL_';
      $this->fieldArray[] = '_AFTERCONTROL_';
    }
    // Clipboard
    if ($this->showClipboard) {
      $this->fieldArray[] = '_CLIPBOARD_';
    }
    // Ref
    if (!$this->dontShowClipControlPanels) {
      $this->fieldArray[] = '_REF_';
      $this->fieldArray[] = '_AFTERREF_';
    }
    // Path
    if ($this->searchLevels) {
      $this->fieldArray[] = '_PATH_';
    }
    // Localization
    if ($this->localizationView && $l10nEnabled) {
      $this->fieldArray[] = '_LOCALIZATION_';
      $this->fieldArray[] = '_LOCALIZATION_b';
      $addWhere .= ' AND (
        ' . $GLOBALS['TCA'][$table]['ctrl']['languageField'] . '<=0
        OR
        ' . $GLOBALS['TCA'][$table]['ctrl']['transOrigPointerField'] . ' = 0
      )';
    }
    // Cleaning up:
    $this->fieldArray = array_unique(array_merge($this->fieldArray, GeneralUtility::trimExplode(',', $rowlist, TRUE)));
    if ($this->noControlPanels) {
      $tempArray = array_flip($this->fieldArray);
      unset($tempArray['_CONTROL_']);
      unset($tempArray['_CLIPBOARD_']);
      $this->fieldArray = array_keys($tempArray);
    }
	
    // Creating the list of fields to include in the SQL query:
    $selectFields = $this->fieldArray;
    $selectFields[] = 'uid';
    $selectFields[] = 'pid';
    // adding column for thumbnails
    if ($thumbsCol) {
      $selectFields[] = $thumbsCol;
    }
    if ($table == 'pages') {
      $selectFields[] = 'module';
      $selectFields[] = 'extendToSubpages';
      $selectFields[] = 'nav_hide';
      $selectFields[] = 'doktype';
      $selectFields[] = 'shortcut';
    }
    if (is_array($GLOBALS['TCA'][$table]['ctrl']['enablecolumns'])) {
      $selectFields = array_merge($selectFields, $GLOBALS['TCA'][$table]['ctrl']['enablecolumns']);
    }
    if ($GLOBALS['TCA'][$table]['ctrl']['type']) {
      $selectFields[] = $GLOBALS['TCA'][$table]['ctrl']['type'];
    }
    if ($GLOBALS['TCA'][$table]['ctrl']['typeicon_column']) {
      $selectFields[] = $GLOBALS['TCA'][$table]['ctrl']['typeicon_column'];
    }
    if ($GLOBALS['TCA'][$table]['ctrl']['versioningWS']) {
      $selectFields[] = 't3ver_id';
      $selectFields[] = 't3ver_state';
      $selectFields[] = 't3ver_wsid';
    }
    if ($l10nEnabled) {
      $selectFields[] = $GLOBALS['TCA'][$table]['ctrl']['languageField'];
      $selectFields[] = $GLOBALS['TCA'][$table]['ctrl']['transOrigPointerField'];
    }
    if ($GLOBALS['TCA'][$table]['ctrl']['label_alt']) {
      $selectFields = array_merge($selectFields, GeneralUtility::trimExplode(',', $GLOBALS['TCA'][$table]['ctrl']['label_alt'], TRUE));
    }
    // Unique list!
    $selectFields = array_unique($selectFields);
    $fieldListFields = $this->makeFieldList($table, 1);
    if (empty($fieldListFields) && $GLOBALS['TYPO3_CONF_VARS']['BE']['debug']) {
      $message = sprintf($GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_mod_web_list.xlf:missingTcaColumnsMessage', TRUE), $table, $table);
      $messageTitle = $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_mod_web_list.xlf:missingTcaColumnsMessageTitle', TRUE);
      $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage', $message, $messageTitle, \TYPO3\CMS\Core\Messaging\FlashMessage::WARNING, TRUE);
      /** @var $flashMessageService \TYPO3\CMS\Core\Messaging\FlashMessageService */
      $flashMessageService = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessageService');
      /** @var $defaultFlashMessageQueue \TYPO3\CMS\Core\Messaging\FlashMessageQueue */
      $defaultFlashMessageQueue = $flashMessageService->getMessageQueueByIdentifier();
      $defaultFlashMessageQueue->enqueue($flashMessage);
    }
    // Making sure that the fields in the field-list ARE in the field-list from TCA!
    $selectFields = array_intersect($selectFields, $fieldListFields);
    // Implode it into a list of fields for the SQL-statement.
    $selFieldList = implode(',', $selectFields);
    $this->selFieldList = $selFieldList;
    /**
     * @hook DB-List getTable
     * @date 2007-11-16
     * @request Malte Jansen <mail@maltejansen.de>
     */
    if (is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable'])) {
      foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable'] as $classData) {
        $hookObject = GeneralUtility::getUserObj($classData);
        if (!$hookObject instanceof \TYPO3\CMS\Backend\RecordList\RecordListGetTableHookInterface) {
          throw new \UnexpectedValueException('$hookObject must implement interface TYPO3\\CMS\\Backend\\RecordList\\RecordListGetTableHookInterface', 1195114460);
        }
        $hookObject->getDBlistQuery($table, $id, $addWhere, $selFieldList, $this);
      }
    }
    // Create the SQL query for selecting the elements in the listing:
    // do not do paging when outputting as CSV
    if ($this->csvOutput) {
      $this->iLimit = 0;
    }
    if ($this->firstElementNumber > 2 && $this->iLimit > 0) {
      // Get the two previous rows for sorting if displaying page > 1
      $this->firstElementNumber = $this->firstElementNumber - 2;
      $this->iLimit = $this->iLimit + 2;
      // (API function from TYPO3\CMS\Recordlist\RecordList\AbstractDatabaseRecordList)
      $queryParts = $this->makeQueryArray($table, $id, $addWhere, $selFieldList);
      $this->firstElementNumber = $this->firstElementNumber + 2;
      $this->iLimit = $this->iLimit - 2;
    } else {
      // (API function from TYPO3\CMS\Recordlist\RecordList\AbstractDatabaseRecordList)
      $queryParts = $this->makeQueryArray($table, $id, $addWhere, $selFieldList);
    }

    // Finding the total amount of records on the page
    // (API function from TYPO3\CMS\Recordlist\RecordList\AbstractDatabaseRecordList)
    $this->setTotalItems($queryParts);

    // Init:
    $dbCount = 0;
    $out = '';
    $listOnlyInSingleTableMode = $this->listOnlyInSingleTableMode && !$this->table;
    // If the count query returned any number of records, we perform the real query, selecting records.
    if ($this->totalItems) {
      // Fetch records only if not in single table mode or if in multi table mode and not collapsed
      if ($listOnlyInSingleTableMode || !$this->table && $tableCollapsed) {
        $dbCount = $this->totalItems;
      } else {
        // Set the showLimit to the number of records when outputting as CSV
        if ($this->csvOutput) {
          $this->showLimit = $this->totalItems;
          $this->iLimit = $this->totalItems;
        }
        $result = $GLOBALS['TYPO3_DB']->exec_SELECT_queryArray($queryParts);
        $dbCount = $GLOBALS['TYPO3_DB']->sql_num_rows($result);
      }
    }
    // If any records was selected, render the list:
    if ($dbCount) {
      // Half line is drawn between tables:
      if (!$listOnlyInSingleTableMode) {
        $theData = array();
        if (!$this->table && !$rowlist) {
          $theData[$titleCol] = '<img src="clear.gif" width="' . ($GLOBALS['SOBE']->MOD_SETTINGS['bigControlPanel'] ? '230' : '350') . '" height="1" alt="" />';
          if (in_array('_CONTROL_', $this->fieldArray)) {
            $theData['_CONTROL_'] = '';
          }
          if (in_array('_CLIPBOARD_', $this->fieldArray)) {
            $theData['_CLIPBOARD_'] = '';
          }
        }
        $out .= $this->addelement(0, '', $theData, 'class="c-table-row-spacer"', $this->leftMargin);
      }
      $tableTitle = $GLOBALS['LANG']->sL($GLOBALS['TCA'][$table]['ctrl']['title'], TRUE);
      if ($tableTitle === '') {
        $tableTitle = $table;
      }
      // Header line is drawn
      $theData = array();
      //if ($this->disableSingleTableView) {
        $theData[$titleCol] = '<span class="c-table">' . BackendUtility::wrapInHelp($table, '', $tableTitle) . '</span> (' . $this->totalItems . ')';
      //} else {
      //  $theData[$titleCol] = $this->linkWrapTable($table, '<span class="c-table">' . $tableTitle . '</span> (' . $this->totalItems . ') ' . ($this->table ? IconUtility::getSpriteIcon('actions-view-table-collapse', array('title' => $GLOBALS['LANG']->getLL('contractView', TRUE))) : IconUtility::getSpriteIcon('actions-view-table-expand', array('title' => $GLOBALS['LANG']->getLL('expandView', TRUE)))));
      //}
      //if ($listOnlyInSingleTableMode) {
      //  $out .= '
      //    <tr>
      //      <td class="t3-row-header" style="width:95%;">' . BackendUtility::wrapInHelp($table, '', $theData[$titleCol]) . '</td>
      //    </tr>';
      //} else {
        // Render collapse button if in multi table mode
        $collapseIcon = '';
        if (!$this->table) {
          $collapseIcon = '<a href="' . htmlspecialchars(($this->listURL() . '&collapse[' . $table . ']=' . ($tableCollapsed ? '0' : '1'))) . '" title="' . ($tableCollapsed ? $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.expandTable', TRUE) : $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.collapseTable', TRUE)) . '">' . ($tableCollapsed ? IconUtility::getSpriteIcon('actions-view-list-expand', array('class' => 'collapseIcon')) : IconUtility::getSpriteIcon('actions-view-list-collapse', array('class' => 'collapseIcon'))) . '</a>';
        }
        $out .= $this->addElement(1, $collapseIcon, $theData, ' class="t3-row-header"', '');
        //$out .= $this->addElement(1, '', $theData, ' class="t3-row-header"', '');
      //}
      // Render table rows only if in multi table view and not collapsed or if in single table view
      if (!$listOnlyInSingleTableMode && (!$tableCollapsed || $this->table)) {
        // Fixing a order table for sortby tables
        $this->currentTable = array();
        $currentIdList = array();
        $doSort = $GLOBALS['TCA'][$table]['ctrl']['sortby'] && !$this->sortField;
        $prevUid = 0;
        $prevPrevUid = 0;
        // Get first two rows and initialize prevPrevUid and prevUid if on page > 1
        if ($this->firstElementNumber > 2 && $this->iLimit > 0) {
          $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
          $prevPrevUid = -((int)$row['uid']);
          $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
          $prevUid = $row['uid'];
        }
        $accRows = array();
        // Accumulate rows here
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
          if (!$this->isRowListingConditionFulfilled($table, $row)) {
            continue;
          }
          // In offline workspace, look for alternative record:
          BackendUtility::workspaceOL($table, $row, $GLOBALS['BE_USER']->workspace, TRUE);
          if (is_array($row)) {
            $accRows[] = $row;
            $currentIdList[] = $row['uid'];
            if ($doSort) {
              if ($prevUid) {
                $this->currentTable['prev'][$row['uid']] = $prevPrevUid;
                $this->currentTable['next'][$prevUid] = '-' . $row['uid'];
                $this->currentTable['prevUid'][$row['uid']] = $prevUid;
              }
              $prevPrevUid = isset($this->currentTable['prev'][$row['uid']]) ? -$prevUid : $row['pid'];
              $prevUid = $row['uid'];
            }
          }
        }
        $GLOBALS['TYPO3_DB']->sql_free_result($result);
        $this->totalRowCount = count($accRows);
        // CSV initiated
        if ($this->csvOutput) {
          $this->initCSV();
        }
        // Render items:
        $this->CBnames = array();
        $this->duplicateStack = array();
        $this->eCounter = $this->firstElementNumber;
        $iOut = '';
        $cc = 0;
        foreach ($accRows as $row) {
          // Render item row if counter < limit
          if ($cc < $this->iLimit) {
            $cc++;
            $this->translations = FALSE;
            $iOut .= $this->renderListRow($table, $row, $cc, $titleCol, $thumbsCol);
            // If localization view is enabled it means that the selected records are
            // either default or All language and here we will not select translations
            // which point to the main record:
            if ($this->localizationView && $l10nEnabled) {
              // For each available translation, render the record:
              if (is_array($this->translations)) {
                foreach ($this->translations as $lRow) {
                  // $lRow isn't always what we want - if record was moved we've to work with the
                  // placeholder records otherwise the list is messed up a bit
                  if ($row['_MOVE_PLH_uid'] && $row['_MOVE_PLH_pid']) {
                    $tmpRow = BackendUtility::getRecordRaw($table, 't3ver_move_id="' . (int)$lRow['uid'] . '" AND pid="' . $row['_MOVE_PLH_pid'] . '" AND t3ver_wsid=' . $row['t3ver_wsid'] . BackendUtility::deleteClause($table), $selFieldList);
                    $lRow = is_array($tmpRow) ? $tmpRow : $lRow;
                  }
                  // In offline workspace, look for alternative record:
                  BackendUtility::workspaceOL($table, $lRow, $GLOBALS['BE_USER']->workspace, TRUE);
                  if (is_array($lRow) && $GLOBALS['BE_USER']->checkLanguageAccess($lRow[$GLOBALS['TCA'][$table]['ctrl']['languageField']])) {
                    $currentIdList[] = $lRow['uid'];
                    $iOut .= $this->renderListRow($table, $lRow, $cc, $titleCol, $thumbsCol, 18);
                  }
                }
              }
            }
          }
          // Counter of total rows incremented:
          $this->eCounter++;
        }
        // Record navigation is added to the beginning and end of the table if in single table mode
        if ($this->table) {
          $iOut = $this->renderListNavigation('top') . $iOut . $this->renderListNavigation('bottom');
        } else {
          // Show that there are more records than shown
          if ($this->totalItems > $this->itemsLimitPerTable) {
            $countOnFirstPage = $this->totalItems > $this->itemsLimitSingleTable ? $this->itemsLimitSingleTable : $this->totalItems;
            $hasMore = $this->totalItems > $this->itemsLimitSingleTable;
            $colspan = $this->showIcon ? count($this->fieldArray) + 1 : count($this->fieldArray);
            $iOut .= '<tr><td colspan="' . $colspan . '" style="padding:5px;">
                <a href="' . htmlspecialchars(($this->listURL() . '&table=' . rawurlencode($table))) . '">' . '<img' . IconUtility::skinImg($this->backPath, 'gfx/pildown.gif', 'width="14" height="14"') . ' alt="" />' . ' <i>[1 - ' . $countOnFirstPage . ($hasMore ? '+' : '') . ']</i></a>
                </td></tr>';
          }
        }
        // The header row for the table is now created:
        $out .= $this->renderListHeader($table, $currentIdList);
      }
      // The list of records is added after the header:
      $out .= $iOut;
      unset($iOut);
      // ... and it is all wrapped in a table:
      $out = '



      <!--
        DB listing of elements:  "' . htmlspecialchars($table) . '"
      -->
        <table border="0" cellpadding="0" cellspacing="0" class="typo3-dblist' . ($listOnlyInSingleTableMode ? ' typo3-dblist-overview' : '') . '">
          ' . $out . '
        </table>';
      // Output csv if...
      // This ends the page with exit.
      if ($this->csvOutput) {
        $this->outputCSV($table);
      }
    }
    // Return content:
    return $out;
  }

	public function renderListHeader($table, $currentIdList) {
		// Init:
		$theData = array();
		// Traverse the fields:
		foreach ($this->fieldArray as $fCol) {
			// Calculate users permissions to edit records in the table:
			$permsEdit = $this->calcPerms & ($table == 'pages' ? 2 : 16);
			switch ((string) $fCol) {
				case '_PATH_':
					// Path
					$theData[$fCol] = '<i>[' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels._PATH_', TRUE) . ']</i>';
					break;
				case '_REF_':
					// References
					$theData[$fCol] = '<i>[' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_mod_file_list.xlf:c__REF_', TRUE) . ']</i>';
					break;
				case '_LOCALIZATION_':
					// Path
					$theData[$fCol] = '<i>[' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels._LOCALIZATION_', TRUE) . ']</i>';
					break;
				case '_LOCALIZATION_b':
					// Path
					$theData[$fCol] = $GLOBALS['LANG']->getLL('Localize', TRUE);
					break;
				case '_CLIPBOARD_':
					// Clipboard:
					$cells = array();
					// If there are elements on the clipboard for this table, then display the "paste into" icon:
					$elFromTable = $this->clipObj->elFromTable($table);
					if (count($elFromTable)) {
						$cells['pasteAfter'] = '<a href="' . htmlspecialchars($this->clipObj->pasteUrl($table, $this->id)) . '" onclick="' . htmlspecialchars(('return ' . $this->clipObj->confirmMsg('pages', $this->pageRow, 'into', $elFromTable))) . '" title="' . $GLOBALS['LANG']->getLL('clip_paste', TRUE) . '">' . IconUtility::getSpriteIcon('actions-document-paste-after') . '</a>';
					}
					// If the numeric clipboard pads are enabled, display the control icons for that:
					if ($this->clipObj->current != 'normal') {
						// The "select" link:
						$cells['copyMarked'] = $this->linkClipboardHeaderIcon(IconUtility::getSpriteIcon('actions-edit-copy', array('title' => $GLOBALS['LANG']->getLL('clip_selectMarked', TRUE))), $table, 'setCB');
						// The "edit marked" link:
						$editIdList = implode(',', $currentIdList);
						$editIdList = '\'+editList(\'' . $table . '\',\'' . $editIdList . '\')+\'';
						$params = '&edit[' . $table . '][' . $editIdList . ']=edit&disHelp=1';
						$cells['edit'] = '<a href="#" onclick="' . htmlspecialchars(BackendUtility::editOnClick($params, $this->backPath, -1)) . '" title="' . $GLOBALS['LANG']->getLL('clip_editMarked', TRUE) . '">' . IconUtility::getSpriteIcon('actions-document-open') . '</a>';
						// The "Delete marked" link:
						$cells['delete'] = $this->linkClipboardHeaderIcon(IconUtility::getSpriteIcon('actions-edit-delete', array('title' => $GLOBALS['LANG']->getLL('clip_deleteMarked', TRUE))), $table, 'delete', sprintf($GLOBALS['LANG']->getLL('clip_deleteMarkedWarning'), $GLOBALS['LANG']->sL($GLOBALS['TCA'][$table]['ctrl']['title'])));
						// The "Select all" link:
						$cells['markAll'] = '<a class="cbcCheckAll" rel="" href="#" onclick="' . htmlspecialchars(('checkOffCB(\'' . implode(',', $this->CBnames) . '\', this); return false;')) . '" title="' . $GLOBALS['LANG']->getLL('clip_markRecords', TRUE) . '">' . IconUtility::getSpriteIcon('actions-document-select') . '</a>';
					} else {
						$cells['empty'] = '';
					}
					/**
					* @hook renderListHeaderActions: Allows to change the clipboard icons of the Web>List table headers
					* @date 2007-11-20
					* @request 	Bernhard Kraft  <krafbt@kraftb.at>
					* @usage Above each listed table in Web>List a header row is shown. This hook allows to modify the icons responsible for the clipboard functions (shown above the clipboard checkboxes when a clipboard other than "Normal" is selected), or other "Action" functions which perform operations on the listed records.
					*/
					if (is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['actions'])) {
						foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['actions'] as $classData) {
							$hookObject = GeneralUtility::getUserObj($classData);
							if (!$hookObject instanceof \TYPO3\CMS\Recordlist\RecordList\RecordListHookInterface) {
								throw new \UnexpectedValueException('$hookObject must implement interface TYPO3\\CMS\\Recordlist\\RecordList\\RecordListHookInterface', 1195567850);
							}
							$cells = $hookObject->renderListHeaderActions($table, $currentIdList, $cells, $this);
						}
					}
					$theData[$fCol] = implode('', $cells);
					break;
				case '_CONTROL_':
					// Add an empty entry, so column count fits again after moving this into $icon
					$theData[$fCol] = '&nbsp;';
					break;
				case '_AFTERCONTROL_':

				case '_AFTERREF_':
					// space column
					$theData[$fCol] = '&nbsp;';
					break;
				default:
					// Regular fields header:
					$theData[$fCol] = '';

					// Check if $fCol is really a field and get the label and remove the colons at the end
					$sortLabel = BackendUtility::getItemLabel($table, $fCol);
					if ($sortLabel !== NULL) {
						$sortLabel = $GLOBALS['LANG']->sL($sortLabel, TRUE);
						$sortLabel = rtrim(trim($sortLabel), ':');
					} else {
						// No TCA field, only output the $fCol variable with square brackets []
						$sortLabel = htmlspecialchars($fCol);
						$sortLabel = '<i>[' . rtrim(trim($sortLabel), ':') . ']</i>';
					}

					if ($this->table && is_array($currentIdList)) {
						// If the numeric clipboard pads are selected, show duplicate sorting link:
						if ($this->clipNumPane()) {
							$theData[$fCol] .= '<a href="' . htmlspecialchars(($this->listURL('', -1) . '&duplicateField=' . $fCol)) . '" title="' . $GLOBALS['LANG']->getLL('clip_duplicates', TRUE) . '">' . IconUtility::getSpriteIcon('actions-document-duplicates-select') . '</a>';
						}
						// If the table can be edited, add link for editing THIS field for all listed records:
						if (!$GLOBALS['TCA'][$table]['ctrl']['readOnly'] && $permsEdit && $GLOBALS['TCA'][$table]['columns'][$fCol]) {
							$editIdList = implode(',', $currentIdList);
							if ($this->clipNumPane()) {
								$editIdList = '\'+editList(\'' . $table . '\',\'' . $editIdList . '\')+\'';
							}
							$params = '&edit[' . $table . '][' . $editIdList . ']=edit&columnsOnly=' . $fCol . '&disHelp=1';
							$iTitle = sprintf($GLOBALS['LANG']->getLL('editThisColumn'), $sortLabel);
							$theData[$fCol] .= '<a href="#" onclick="' . htmlspecialchars(BackendUtility::editOnClick($params, $this->backPath, -1)) . '" title="' . htmlspecialchars($iTitle) . '">' . IconUtility::getSpriteIcon('actions-document-open') . '</a>';
						}
					}
					$theData[$fCol] .= $this->addSortLink($sortLabel, $fCol, $table);
			}
		}
	}
	
	/**
	 * Creates the search box
	 *
	 * @param boolean $formFields If TRUE, the search box is wrapped in its own form-tags
	 * @return string HTML for the search box
	 * @todo Define visibility
	 */
	public function getSearchBox($formFields = 1) {
		// Setting form-elements, if applicable:
		$formElements = array('', '');
		if ($formFields) {
			$formElements = array('<form action="' . htmlspecialchars($this->listURL('', -1, 'firstElementNumber')) . '" method="post">', '</form>');
		}
		
		// Skip level selector

		// Table with the search box:
		$content = '<div class="db_list-searchbox-form">
			' . $formElements[0] . '

				<!--
					Search box:
				-->
				<table border="0" cellpadding="0" cellspacing="0" id="typo3-dblist-search">
					<tr>
						<td><label for="search_field">' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.enterSearchString', TRUE) . '</label></td>
						<td><input type="text" name="search_field" id="search_field" value="' . htmlspecialchars($this->searchString) . '"' . $GLOBALS['TBE_TEMPLATE']->formWidth(10) . ' /></td>
						<td><input type="submit" name="search" value="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.search', TRUE) . '" /></td>
					</tr>
					<tr>
						<td><label for="showLimit">' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.showRecords', TRUE) . ':</label></td>
						<td colspan="2"><input type="text" name="showLimit" id="showLimit" value="' . htmlspecialchars(($this->showLimit ? $this->showLimit : '')) . '"' . $GLOBALS['TBE_TEMPLATE']->formWidth(4) . ' /></td>
					</tr>
				</table>
			' . $formElements[1] . '</div>';
		return $content;
	}
}