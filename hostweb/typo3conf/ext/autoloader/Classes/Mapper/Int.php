<?php
/**
 * Map int
 *
 * @category   Extension
 * @package    Autoloader\Mapper
 * @author     Tim Lochmüller <tim@fruit-lab.de>
 */

namespace HDNET\Autoloader\Mapper;

use HDNET\Autoloader\MapperInterface;

/**
 * Map int
 *
 * @author     Tim Lochmüller <tim@fruit-lab.de>
 */
class Int implements MapperInterface {

	/**
	 * Check if the current mapper can handle the given type
	 *
	 * @param string $type
	 *
	 * @return bool
	 */
	public function canHandleType($type) {
		return in_array(strtolower($type), array(
			'int',
			'integer'
		));
	}

	/**
	 * Get the TCA configuration for the current type
	 *
	 * @param string $fieldName
	 * @param bool   $overWriteLabel
	 *
	 * @return array
	 */
	public function getTcaConfiguration($fieldName, $overWriteLabel = FALSE) {
		return array(
			'exclude' => 1,
			'label'   => $overWriteLabel ? $overWriteLabel : $fieldName,
			'config'  => array(
				'type' => 'input',
				'eval' => 'int',
				'size' => 8,
			),
		);
	}

	/**
	 * Get the database definition for the current mapper
	 *
	 * @return string
	 */
	public function getDatabaseDefinition() {
		return 'int(11) DEFAULT \'0\' NOT NULL';
	}
}