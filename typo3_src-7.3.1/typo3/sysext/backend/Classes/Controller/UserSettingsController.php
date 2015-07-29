<?php

namespace TYPO3\CMS\Backend\Controller;

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

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * A wrapper class to call BE_USER->uc
 * used for AJAX and TYPO3.Storage JS object
 */
class UserSettingsController {

	/**
	 * Processes all AJAX calls and returns a JSON for the data
	 *
	 * @param array $parameters
	 * @param \TYPO3\CMS\Core\Http\AjaxRequestHandler $ajaxRequestHandler
	 */
	public function processAjaxRequest($parameters, \TYPO3\CMS\Core\Http\AjaxRequestHandler $ajaxRequestHandler) {
		// do the regular / main logic, depending on the action parameter
		$action = GeneralUtility::_GP('action');
		$key = GeneralUtility::_GP('key');
		$value = GeneralUtility::_GP('value');

		$content = $this->process($action, $key, $value);

		$ajaxRequestHandler->setContentFormat('json');
		$ajaxRequestHandler->setContent($content);
	}

	/**
	 * Process data
	 *
	 * @param string $action
	 * @param string $key
	 * @param string $value
	 * @return mixed
	 */
	public function process($action, $key = '', $value = '') {
		switch ($action) {
			case 'get':
				$content = $this->get($key);
				break;
			case 'getAll':
				$content = $this->getAll();
				break;
			case 'set':
				$this->set($key, $value);
				$content = $this->getAll();
				break;
			case 'addToList':
				$this->addToList($key, $value);
				$content = $this->getAll();
			case 'removeFromList':
				$this->removeFromList($key, $value);
				$content = $this->getAll();
			case 'unset':
				$this->unsetOption($key);
				$content = $this->getAll();
				break;
			case 'clear':
				$this->clear();
				$content = array('result' => TRUE);
				break;
			default:
				$content = array('result' => FALSE);
		}

		return $content;
	}

	/**
	 * Returns a specific user setting
	 *
	 * @param string $key Identifier, allows also dotted notation for subarrays
	 * @return mixed Value associated
	 */
	protected function get($key) {
		return (strpos($key, '.') !== FALSE) ? $this->getFromDottedNotation($key) : $this->getBackendUser()->uc[$key];
	}

	/**
	 * Get all user settings
	 *
	 * @return mixed all values, usually a multi-dimensional array
	 */
	protected function getAll() {
		return $this->getBackendUser()->uc;
	}

	/**
	 * Sets user settings by key/value pair
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function set($key, $value) {
		$beUser = $this->getBackendUser();
		if (strpos($key, '.') !== FALSE) {
			$this->setFromDottedNotation($key, $value);
		} else {
			$beUser->uc[$key] = $value;
		}
		$beUser->writeUC($beUser->uc);
	}

	/**
	 * Adds an value to an Comma-separated list
	 * stored $key  of user settings
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function addToList($key, $value) {
		$list = $this->get($key);
		if (!isset($list)) {
			$list = $value;
		} else {
			if (!GeneralUtility::inList($list, $value)) {
				$list .= ',' . $value;
			}
		}
		$this->set($key, $list);
	}

	/**
	 * Removes an value from an Comma-separated list
	 * stored $key of user settings
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function removeFromList($key, $value) {
		$list = $this->get($key);
		if (GeneralUtility::inList($list, $value)) {
			$list = GeneralUtility::trimExplode(',', $list, TRUE);
			$list = ArrayUtility::removeArrayEntryByValue($list, $value);
			$this->set($key, implode(',', $list));
		}
	}

	/**
	 * Resets the user settings to the default
	 *
	 * @return void
	 */
	protected function clear() {
		$this->getBackendUser()->resetUC();
	}

	/**
	 * Unsets a key in user settings
	 *
	 * @param string $key
	 * @return void
	 */
	protected function unsetOption($key) {
		$beUser = $this->getBackendUser();
		if (isset($beUser->uc[$key])) {
			unset($beUser->uc[$key]);
			$beUser->writeUC($beUser->uc);
		}
	}

	/**
	 * Computes the subarray from dotted notation
	 *
	 * @param $key string Dotted notation of subkeys like moduleData.module1.general.checked
	 * @return mixed value of the settings
	 */
	protected function getFromDottedNotation($key) {
		$subkeys = GeneralUtility::trimExplode('.', $key);
		$array = &$this->getBackendUser()->uc;
		foreach ($subkeys as $subkey) {
			$array = &$array[$subkey];
		}
		return $array;
	}

	/**
	 * Sets the value of a key written in dotted notation
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function setFromDottedNotation($key, $value) {
		$subkeys = GeneralUtility::trimExplode('.', $key, TRUE);
		$lastKey = $subkeys[count($subkeys) - 1];
		$array = &$this->getBackendUser()->uc;
		foreach ($subkeys as $subkey) {
			if ($subkey === $lastKey) {
				$array[$subkey] = $value;
			} else {
				$array = &$array[$subkey];
			}
		}
	}

	/**
	 * Returns the current BE user.
	 *
	 * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected function getBackendUser() {
		return $GLOBALS['BE_USER'];
	}
}
