<?php
namespace TYPO3\CMS\Vidi\Tca;

/**
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

/**
 * A class to handle TCA form configuration
 */
class FormService implements TcaServiceInterface {

	/**
	 * @var array
	 */
	protected $tca;

	/**
	 * @var string
	 */
	protected $tableName;

	/**
	 * __construct
	 *
	 * @throws \TYPO3\CMS\Vidi\Exception\InvalidKeyInArrayException
	 * @param string $tableName
	 * @return \TYPO3\CMS\Vidi\Tca\FieldService
	 */
	public function __construct($tableName) {
		$this->tableName = $tableName;
		if (empty($GLOBALS['TCA'][$this->tableName])) {
			throw new \TYPO3\CMS\Vidi\Exception\InvalidKeyInArrayException('No TCA existence for table name: ' . $this->tableName, 1356945107);
		}
		$this->tca = $GLOBALS['TCA'][$this->tableName];
	}

	/**
	 * Returns an array containing type names.
	 *
	 * @return array
	 */
	public function getTypes() {
		return array_keys($this->tca['types']);
	}

	/**
	 * Returns a list of fields. If type is not given, return the first one found.
	 *
	 * @throws \TYPO3\CMS\Vidi\Exception\InvalidKeyInArrayException
	 * @param int $type
	 * @return string
	 */
	public function getFields($type = NULL) {
		if ($type === NULL) {
			reset($this->tca['types']);
			$type = key($this->tca['types']);
		}

		if (empty($this->tca['types'][$type]['showitem'])) {
			throw new \TYPO3\CMS\Vidi\Exception\InvalidKeyInArrayException('There is not such TCA for type :' . $type, 1356028574);
		}
		return $this->tca['types'][$type]['showitem'];
	}

	/**
	 * Returns structured fields for a possible given type. The structure is organized by tab as key followed by its fields.
	 *
	 * Example:
	 *
	 * array(
	 *   'tab_1' = array(
	 *      'field_1',
	 *      'field_2',
	 *   )
	 * );
	 *
	 * @param int $type
	 * @return array
	 */
	public function getFieldStructure($type = NULL) {
		$fields = $this->getFields($type);

		$structure = array();
		$tabName = 'LLL:EXT:cms/locallang_ttc.xml:palette.general';
		$tabMarker = '--div--;';
		$items = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $fields);

		foreach ($items as $item) {
			if (strpos($item, $tabMarker) !== FALSE) {
				$tabName = str_replace($tabMarker, '', $item);
			} else {
				$structure[$tabName][] = $item;
			}
		}
		return $structure;
	}

	/**
	 * @return array
	 */
	public function getTca() {
		return $this->tca;
	}
}
