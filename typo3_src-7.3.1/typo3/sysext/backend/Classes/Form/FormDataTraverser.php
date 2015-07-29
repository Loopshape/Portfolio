<?php
namespace TYPO3\CMS\Backend\Form;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Form\DataPreprocessor;
use TYPO3\CMS\Backend\Form\Utility\FormEngineUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Utility class for traversing related fields in the TCA.
 *
 * @author Sebastian Fischer <typo3@evoweb.de>
 * @author Alexander Stehlik <astehlik.deleteme@intera.de>
 */
class FormDataTraverser {

	/**
	 * If this value is set during traversal and the traversal chain can
	 * not be walked to the end this value will be returned instead.
	 *
	 * @var string
	 */
	protected $alternativeFieldValue;

	/**
	 * If this is TRUE the alternative field value will be used even if
	 * the detected field value is not empty.
	 *
	 * @var bool
	 */
	protected $forceAlternativeFieldValueUse = FALSE;

	/**
	 * The row data of the record that is currently traversed.
	 *
	 * @var array
	 */
	protected $currentRow;

	/**
	 * Name of the table that is currently traversed.
	 *
	 * @var string
	 */
	protected $currentTable;

	/**
	 * If the first record in the chain is translatable the language
	 * UID of this record is stored in this variable.
	 *
	 * @var int
	 */
	protected $originalLanguageUid = NULL;

	/**
	 * Inline first pid
	 *
	 * @var integer
	 */
	protected $inlineFirstPid;

	/**
	 * Traverses the array of given field names by using the TCA.
	 *
	 * @param array $fieldNameArray The field names that should be traversed.
	 * @param string $tableName The starting table name.
	 * @param array $row The starting record row.
	 * @param int $inlineFirstPid Inline first pid
	 * @return mixed The value of the last field in the chain.
	 */
	public function getTraversedFieldValue(array $fieldNameArray, $tableName, array $row, $inlineFirstPid) {
		$this->currentTable = $tableName;
		$this->currentRow = $row;
		$this->inlineFirstPid = $inlineFirstPid;
		$fieldValue = '';
		if (count($fieldNameArray) > 0) {
			$this->initializeOriginalLanguageUid();
			$fieldValue = $this->getFieldValueRecursive($fieldNameArray);
		}
		return $fieldValue;
	}

	/**
	 * Checks if the current table is translatable and initializes the
	 * originalLanguageUid with the value of the languageField of the
	 * current row.
	 *
	 * @return void
	 */
	protected function initializeOriginalLanguageUid() {
		$fieldCtrlConfig = $GLOBALS['TCA'][$this->currentTable]['ctrl'];
		if (!empty($fieldCtrlConfig['languageField']) && isset($this->currentRow[$fieldCtrlConfig['languageField']])) {
			$this->originalLanguageUid = (int)$this->currentRow[$fieldCtrlConfig['languageField']];
		} else {
			$this->originalLanguageUid = FALSE;
		}
	}

	/**
	 * Traverses the fields in the $fieldNameArray and tries to read
	 * the field values.
	 *
	 * @param array $fieldNameArray The field names that should be traversed.
	 * @return mixed The value of the last field.
	 */
	protected function getFieldValueRecursive(array $fieldNameArray) {
		$value = '';

		foreach ($fieldNameArray as $fieldName) {
			// Skip if a defined field was actually not present in the database row
			// Using array_key_exists here, since TYPO3 supports NULL values as well
			if (!array_key_exists($fieldName, $this->currentRow)) {
				$value = '';
				break;
			}

			$value = $this->currentRow[$fieldName];
			if (empty($value)) {
				break;
			}

			$this->currentRow = $this->getRelatedRecordRow($fieldName, $value);
			if ($this->currentRow === FALSE) {
				break;
			}
		}

		if ((empty($value) || $this->forceAlternativeFieldValueUse) && !empty($this->alternativeFieldValue)) {
			$value = $this->alternativeFieldValue;
		}

		return $value;
	}

	/**
	 * Tries to read the related record from the database depending on
	 * the TCA. Supported types are group (db), select and inline.
	 *
	 * @param string $fieldName The name of the field of which the related record should be fetched.
	 * @param string $value The current field value.
	 * @return array|boolean The related row if it could be found otherwise FALSE.
	 */
	protected function getRelatedRecordRow($fieldName, $value) {
		$fieldConfig = $GLOBALS['TCA'][$this->currentTable]['columns'][$fieldName]['config'];
		$possibleUids = array();

		switch ($fieldConfig['type']) {
			case 'group':
				$possibleUids = $this->getRelatedGroupFieldUids($fieldConfig, $value);
				break;
			case 'select':
				$possibleUids = $this->getRelatedSelectFieldUids($fieldConfig, $fieldName, $value);
				break;
			case 'inline':
				$possibleUids = $this->getRelatedInlineFieldUids($fieldConfig, $fieldName, $value);
				break;
		}

		$relatedRow = FALSE;
		if (count($possibleUids) === 1) {
			$relatedRow = $this->getRecordRow($possibleUids[0]);
		} elseif (count($possibleUids) > 1) {
			$relatedRow = $this->getMatchingRecordRowByTranslation($possibleUids, $fieldConfig);
		}

		return $relatedRow;
	}

	/**
	 * Tries to get the related UIDs of a group field.
	 *
	 * @param array $fieldConfig "config" section from the TCA for the current field.
	 * @param string $value The current value (normally a comma separated record list, possibly consisting of multiple parts [table]_[uid]|[title]).
	 * @return array Array of related UIDs.
	 */
	protected function getRelatedGroupFieldUids(array $fieldConfig, $value) {
		$relatedUids = array();
		$allowedTable = $this->getAllowedTableForGroupField($fieldConfig);

		if (($fieldConfig['internal_type'] !== 'db') || ($allowedTable === FALSE)) {
			return $relatedUids;
		}

		$values = GeneralUtility::trimExplode(',', $value, TRUE);
		foreach ($values as $groupValue) {
			list($foreignIdentifier, $foreignTitle) = GeneralUtility::trimExplode('|', $groupValue);
			list($recordForeignTable, $foreignUid) = BackendUtility::splitTable_Uid($foreignIdentifier);
			// skip records that do not match the allowed table
			if (!empty($recordForeignTable) && ($recordForeignTable !== $allowedTable)) {
				continue;
			}
			if (!empty($foreignTitle)) {
				$this->alternativeFieldValue = rawurldecode($foreignTitle);
			}
			$relatedUids[] = $foreignUid;
		}

		if (count($relatedUids) > 0) {
			$this->currentTable = $allowedTable;
		}

		return $relatedUids;
	}

	/**
	 * Tries to get the related UID of an inline field.
	 *
	 * @param array $fieldConfig "config" section of the TCA configuration of the related inline field.
	 * @param string $fieldName The name of the inline field.
	 * @param string $value The value in the local table (normally a comma separated list of the inline record UIDs).
	 * @return array Array of related UIDs.
	 */
	protected function getRelatedInlineFieldUids(array $fieldConfig, $fieldName, $value) {
		$relatedUids = array();

		$PA = array('itemFormElValue' => $value);
		$inlineRelatedRecordResolver = GeneralUtility::makeInstance(InlineRelatedRecordResolver::class);
		$items = $inlineRelatedRecordResolver->getRelatedRecords($this->currentTable, $fieldName, $this->currentRow, $PA, $fieldConfig, $this->inlineFirstPid);
		if ($items['count'] > 0) {
			$this->currentTable = $fieldConfig['foreign_table'];
			foreach ($items['records'] as $inlineRecord) {
				$relatedUids[] = $inlineRecord['uid'];
			}
		}

		return $relatedUids;
	}

	/**
	 * Will read the "allowed" value from the given field configuration
	 * and returns FALSE if none was defined or more than one.
	 *
	 * If exactly one table was defined the name of that table is returned.
	 *
	 * @param array $fieldConfig "config" section of a group field from the TCA.
	 * @return bool|string FALSE if none ore more than one table was found, otherwise the name of the table.
	 */
	protected function getAllowedTableForGroupField(array $fieldConfig) {
		$allowedTable = FALSE;

		$allowedTables = GeneralUtility::trimExplode(',', $fieldConfig['allowed'], TRUE);
		if (count($allowedTables) === 1) {
			$allowedTable = $allowedTables[0];
		}

		return $allowedTable;
	}

	/**
	 * Uses the DataPreprocessor to read a value from the database.
	 *
	 * The table name is read from the currentTable class variable.
	 *
	 * @param int $uid The UID of the record that should be fetched.
	 * @return array|boolean FALSE if the record can not be accessed, otherwise the data of the requested record.
	 */
	protected function getRecordRow($uid) {
		/** @var DataPreprocessor $dataPreprocessor */
		$dataPreprocessor = GeneralUtility::makeInstance(DataPreprocessor::class);
		$dataPreprocessor->fetchRecord($this->currentTable, $uid, '');
		return reset($dataPreprocessor->regTableItems_data);
	}

	/**
	 * Tries to get the correct record based on the parent translation by
	 * traversing all given related UIDs and checking if their language UID
	 * matches the stored original language UID.
	 *
	 * If exactly one match was found for the original language the resulting
	 * row is returned, otherwise FALSE.
	 *
	 * @param array $relatedUids All possible matching UIDs.
	 * @return bool|array The row data if a matching record was found, FALSE otherwise.
	 */
	protected function getMatchingRecordRowByTranslation(array $relatedUids) {
		if ($this->originalLanguageUid === FALSE) {
			return FALSE;
		}

		$fieldCtrlConfig = $GLOBALS['TCA'][$this->currentTable]['ctrl'];
		if (empty($fieldCtrlConfig['languageField'])) {
			return FALSE;
		}

		$languageField = $fieldCtrlConfig['languageField'];
		$foundRows = array();
		foreach ($relatedUids as $relatedUid) {
			$currentRow = $this->getRecordRow($relatedUid);
			if (!isset($currentRow[$languageField])) {
				continue;
			}
			if ((int)$currentRow[$languageField] === $this->originalLanguageUid) {
				$foundRows[] = $currentRow;
			}
		}

		$relatedRow = FALSE;
		if (count($foundRows) === 1) {
			$relatedRow = $foundRows[0];
		}

		return $relatedRow;
	}

	/**
	 * If the select field is build by a foreign_table the related UIDs
	 * will be returned.
	 *
	 * Otherwise the label of the currently selected value will be written
	 * to the alternativeFieldValue class property.
	 *
	 * @param array $fieldConfig The "config" section of the TCA for the current select field.
	 * @param string $fieldName The name of the select field.
	 * @param string $value The current value in the local record, usually a comma separated list of selected values.
	 * @return array Array of related UIDs.
	 */
	protected function getRelatedSelectFieldUids(array $fieldConfig, $fieldName, $value) {
		$relatedUids = array();

		$isTraversable = FALSE;
		if (isset($fieldConfig['foreign_table'])) {
			$isTraversable = TRUE;
			// if a foreign_table is used we pre-filter the records for performance
			$fieldConfig['foreign_table_where'] .= ' AND ' . $fieldConfig['foreign_table'] . '.uid IN (' . $value . ')';
		}

		$PA = array();
		$PA['fieldConf']['config'] = $fieldConfig;
		$PA['fieldTSConfig'] = FormEngineUtility::getTSconfigForTableRow($this->currentTable, $this->currentRow, $fieldName);
		$PA['fieldConf']['config'] = FormEngineUtility::overrideFieldConf($PA['fieldConf']['config'], $PA['fieldTSConfig']);
		$selectItemArray = FormEngineUtility::getSelectItems($this->currentTable, $fieldName, $this->currentRow, $PA);

		if ($isTraversable && !empty($selectItemArray)) {
			$this->currentTable = $fieldConfig['foreign_table'];
			$relatedUids = $this->getSelectedValuesFromSelectItemArray($selectItemArray, $value);
		} else {
			$selectedLabels = $this->getSelectedValuesFromSelectItemArray($selectItemArray, $value, 1, TRUE);
			if (count($selectedLabels) === 1) {
				$this->alternativeFieldValue = $selectedLabels[0];
				$this->forceAlternativeFieldValueUse = TRUE;
			}
		}

		return $relatedUids;
	}

	/**
	 * Extracts the selected values from a given array of select items.
	 *
	 * @param array $selectItemArray The select item array generated by \TYPO3\CMS\Backend\Form\FormEngine->getSelectItems.
	 * @param string $value The currently selected value(s) as comma separated list.
	 * @param int|NULL $maxItems Optional value, if set processing is skipped and an empty array will be returned when the number of selected values is larger than the provided value.
	 * @param bool $returnLabels If TRUE the select labels will be returned instead of the values.
	 * @return array
	 */
	protected function getSelectedValuesFromSelectItemArray(array $selectItemArray, $value, $maxItems = NULL, $returnLabels = FALSE) {
		$values = GeneralUtility::trimExplode(',', $value);
		$selectedValues = array();

		if ($maxItems !== NULL && (count($values) > (int)$maxItems)) {
			return $selectedValues;
		}

		foreach ($selectItemArray as $selectItem) {
			$selectItemValue = $selectItem[1];
			if (in_array($selectItemValue, $values)) {
				if ($returnLabels) {
					$selectedValues[] = $selectItem[0];
				} else {
					$selectedValues[] = $selectItemValue;
				}
			}
		}

		return $selectedValues;
	}

}
