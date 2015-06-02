<?php
/***************************************************************
 *  Copyright notice
 *
 * (c) 2014 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
 * All rights reserved
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
require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
tx_rnbase::load('tx_t3socials_models_Base');

/**
 * Model eines Versandstatus
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_models
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_models_State
	extends tx_t3socials_models_Base {

	const STATE_UNKNOWN = 0;
	const STATE_INFO = 1;
	const STATE_OK = 2;
	const STATE_NOTICE = 3;
	const STATE_WARNING = 4;
	const STATE_ERROR = 5;

	/**
	 * Inits the model instance either with uid or a complete data record.
	 * As the result the instance should be completly loaded.
	 *
	 * @param mixed $rowOrUid
	 * @return void
	 */
	public function init($rowOrUid) {
		$rowOrUid = is_array($rowOrUid) ? $rowOrUid : array('state' => $rowOrUid);
		$rowOrUid['uid'] = 0;
		parent::init($rowOrUid);
		$this->setState(
			empty($rowOrUid['state']) ? self::STATE_UNKNOWN : $rowOrUid['state']
		);
	}

	/**
	 * Liefert den Status
	 *
	 * @return int
	 */
	public function getState() {
		return $this->getProperty('state');
	}
	/**
	 * Setzt den status
	 *
	 * @param int $state
	 * @param mixed $error
	 * @return void
	 */
	public function setState($state, $error = NULL) {
		switch((int) $state) {
			case self::STATE_INFO:
			case self::STATE_OK:
			case self::STATE_NOTICE:
			case self::STATE_WARNING:
			case self::STATE_ERROR:
				$this->setProperty('state', $state);
				break;
			default:
				$this->setProperty('state', self::STATE_UNKNOWN);
				break;
		}
		if ($error !== NULL) {
			if ($error instanceof Exception) {
				$this->setMessage($error->getMessage());
				$this->setErrorCode($error->getCode());
			} elseif (is_int($error)) {
				$this->setErrorCode($error);
			} elseif (is_string($error)) {
				$this->setMessage($error);
			}
		}
	}

	/**
	 * Ist der Status SUCCESS?
	 *
	 * @return boolean
	 */
	public function isStateSuccess() {
		$state = $this->getProperty('state');
		return $state === self::STATE_OK || $state === self::STATE_INFO;
	}
	/**
	 * Ist der Status FAILURE?
	 *
	 * @return boolean
	 */
	public function isStateFailure() {
		return !$this->isStateSuccess();
	}

	/**
	 * Liefert den Fehlercode
	 *
	 * @return int
	 */
	public function getErrorCode() {
		return $this->getProperty('error_code');
	}

	/**
	 * Liefert die Fehlermeldung
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->getProperty('message');
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_State.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_State.php']);
}
