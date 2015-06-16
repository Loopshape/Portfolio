<?php
namespace In2code\Powermail\Utility\Hook;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Alex Kellner <alexander.kellner@in2code.de>, in2code.de
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

/**
 * Abstract Marker Class for Backend-Marker functions
 *
 * @package powermail
 * @license http://www.gnu.org/licenses/lgpl.html
 * 			GNU Lesser General Public License, version 3 or later
 */
class AbstractMarker {

	/**
	 * Array with all GET/POST params to save
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Marker Array
	 *
	 * @var array
	 */
	protected $marker;

	/**
	 * Form Uid
	 *
	 * @var int
	 */
	protected $formUid;

	/**
	 * Existing Markers from Database to current form
	 *
	 * @var array
	 */
	protected $existingMarkers;

	/**
	 * Restricted Marker Names
	 *
	 * @var array
	 */
	protected $restrictedMarkerNames = array(
		'mail',
		'powermail_rte',
		'powermail_all'
	);

	/**
	 * @var \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected $databaseConnection = NULL;

	/**
	 * Clean Marker String ("My Field" => "my_field")
	 *
	 * @param string $string Any String
	 * @return string
	 */
	protected function cleanString($string) {
		$string = preg_replace('/[^a-zA-Z0-9_-]/', '', $string);
		$string = str_replace(array('-'), '_', $string);
		$string = strtolower($string);
		return $string;
	}

	/**
	 * Read Form Uid from GET params
	 *
	 * @return int form uid
	 */
	protected function getFormUid() {
		$formUid = 0;

			// if form is given in GET params (open form and pages and fields via IRRE)
		if (isset($this->data['tx_powermail_domain_model_forms'])) {
			foreach (array_keys((array) $this->data['tx_powermail_domain_model_forms']) as $uid) {
				$formUid = $uid;
			}
		}

			// if pages open (fields via IRRE)
		if ($formUid === 0) {
			foreach (array_keys((array) $this->data['tx_powermail_domain_model_pages']) as $uid) {
				if (!empty($this->data['tx_powermail_domain_model_pages'][$uid]['forms'])) {
					$formUid = $this->data['tx_powermail_domain_model_pages'][$uid]['forms'];
				}
			}
		}

			// if field is directly opened (no IRRE OR opened pages with their IRRE fields
		if ($formUid === 0) {
			foreach (array_keys((array) $this->data['tx_powermail_domain_model_fields']) as $uid) {
				if (!empty($this->data['tx_powermail_domain_model_fields'][$uid]['pages'])) {
					$formUid = $this->getFormUidFromRelatedPage(
						$this->data['tx_powermail_domain_model_fields'][$uid]['pages']
					);
				}
			}
		}

		return $formUid;
	}

	/**
	 * Get From Uid from related Page
	 *
	 * @param int $pageUid
	 * @return int
	 */
	protected function getFormUidFromRelatedPage($pageUid) {
		$formUid = 0;
		$select = 'tx_powermail_domain_model_forms.uid';
		$from = '
			tx_powermail_domain_model_forms
			LEFT JOIN tx_powermail_domain_model_pages ON tx_powermail_domain_model_pages.forms = tx_powermail_domain_model_forms.uid
			LEFT JOIN tx_powermail_domain_model_fields ON tx_powermail_domain_model_fields.pages = tx_powermail_domain_model_pages.uid
		';
		$where = 'tx_powermail_domain_model_pages.uid = ' . intval($pageUid);
		$groupBy = '';
		$orderBy = '';
		$limit = 1;
		$res = $this->databaseConnection->exec_SELECTquery($select, $from, $where, $groupBy, $orderBy, $limit);
		if ($res) {
			$row = $this->databaseConnection->sql_fetch_assoc($res);
			$formUid = (int) $row['uid'];
		}
		return $formUid;
	}

	/**
	 * Get form uid from any of its field
	 *
	 * @param int $fieldUid
	 * @return int $formUid
	 */
	protected function getFormUidFromFieldUid($fieldUid) {
		$formUid = 0;
		$select = 'tx_powermail_domain_model_forms.uid';
		$from = '
			tx_powermail_domain_model_forms
			LEFT JOIN tx_powermail_domain_model_pages ON tx_powermail_domain_model_pages.forms = tx_powermail_domain_model_forms.uid
			LEFT JOIN tx_powermail_domain_model_fields ON tx_powermail_domain_model_fields.pages = tx_powermail_domain_model_pages.uid
		';
		$where = 'tx_powermail_domain_model_fields.uid = ' . intval($fieldUid);
		$groupBy = '';
		$orderBy = '';
		$limit = 1;
		$res = $this->databaseConnection->exec_SELECTquery($select, $from, $where, $groupBy, $orderBy, $limit);
		if ($res) {
			$row = $this->databaseConnection->sql_fetch_assoc($res);
			$formUid = (int) $row['uid'];
		}
		return $formUid;
	}

	/**
	 * Get array with markers from a complete form
	 *
	 * @return array
	 */
	protected function getFieldMarkersFromForm() {
		$result = array();
		$select = 'tx_powermail_domain_model_fields.marker, tx_powermail_domain_model_fields.uid';
		$from = '
			tx_powermail_domain_model_forms
			LEFT JOIN tx_powermail_domain_model_pages ON tx_powermail_domain_model_pages.forms = tx_powermail_domain_model_forms.uid
			LEFT JOIN tx_powermail_domain_model_fields ON tx_powermail_domain_model_fields.pages = tx_powermail_domain_model_pages.uid
		';
		$where = 'tx_powermail_domain_model_forms.uid = ' . intval($this->formUid) .
			' and tx_powermail_domain_model_fields.deleted = 0';
		$groupBy = '';
		$orderBy = '';
		$limit = 1000;
		$res = $this->databaseConnection->exec_SELECTquery($select, $from, $where, $groupBy, $orderBy, $limit);
		if ($res) {
			while (($row = $this->databaseConnection->sql_fetch_assoc($res))) {
				$result['_' . $row['uid']] = $row['marker'];
			}
		}

		return $result;
	}

	/**
	 * Make Array with unique values
	 *
	 * @param array $array
	 * @return void
	 */
	protected function makeUniqueValueInArray(&$array) {
		$newArray = array();
		foreach ((array) $array as $key => $value) {
			if (!in_array($value, $newArray) && !in_array($value, $this->restrictedMarkerNames)) {
				$newArray[$key] = $value;
			} else {
				for ($i = 1; $i < 100; $i++) {
						// remove appendix "_xx"
					$value = preg_replace('/_[0-9][0-9]$/', '', $value);
					$value .= '_' . str_pad($i, 2, '0', STR_PAD_LEFT);
					if (!in_array($value, $newArray)) {
						$newArray[$key] = $value;
						break;
					}
				}
			}
		}
		$array = $newArray;
		unset($newArray);
	}

	/**
	 * Get marker values
	 *
	 * @return void
	 */
	protected function getMarkers() {
		$this->marker = array();
		foreach ((array) $this->data['tx_powermail_domain_model_fields'] as $fieldUid => $fieldValues) {
			if (!empty($fieldValues['title'])) {
				$this->marker['_' . $fieldUid] =
					(isset($fieldValues['marker']) ? $fieldValues['marker'] : $this->cleanString($fieldValues['title']));
			}
		}
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->databaseConnection = $GLOBALS['TYPO3_DB'];
		$this->data = (array) GeneralUtility::_GP('data');
		$this->getMarkers();
		$this->formUid = $this->getFormUid();
		$this->existingMarkers = $this->getFieldMarkersFromForm();
	}
}