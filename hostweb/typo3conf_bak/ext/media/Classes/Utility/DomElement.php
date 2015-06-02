<?php
namespace TYPO3\CMS\Media\Utility;

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
 * A class to handle a attribute
 */
class DomElement implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * Returns a class instance
	 *
	 * @return \TYPO3\CMS\Media\Utility\DomElement
	 */
	static public function getInstance() {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Media\Utility\DomElement');
	}

	/**
	 * Format an id given an input string
	 *
	 * @param string $input
	 * @return string
	 */
	public function formatId($input) {

		// remove the capital letter from the id
		$segments = preg_split('/(?=[A-Z])/', $input);
		$segments = array_map('strtolower', $segments);
		if ($segments[0] == '') {
			array_shift($segments);
		}
		$result = implode('-', $segments);

		return $this->sanitizeId($result);
	}

	/**
	 * Sanitize an id
	 *
	 * @param string $input
	 * @return mixed
	 */
	protected function sanitizeId($input){

		// remove the track of possible namespace
		$searches[] = ' ';
		$searches[] = '_';
		$searches[] = '--';
		$searches[] = '[';
		$searches[] = ']';
		$replaces[] = '-';
		$replaces[] = '-';
		$replaces[] = '-';
		$replaces[] = '-';
		$replaces[] = '';
		return str_replace($searches, $replaces, strtolower($input));
	}

}
