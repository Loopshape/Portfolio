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
 * Model einer trigger Konfiguration
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_models
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_models_TriggerConfig
	extends tx_t3socials_models_Base {

	/**
	 * Inits the model instance either with uid or a complete data record.
	 * As the result the instance should be completly loaded.
	 *
	 * @param mixed $rowOrUid
	 * @return void
	 */
	public function init($rowOrUid) {
		// wir haben bereits einen record
		if (is_array($rowOrUid)) {
			$this->uid = isset($rowOrUid['uid']) ? $rowOrUid['uid'] : $rowOrUid['trigger_id'];
			$this->uid = empty($this->uid) ? $rowOrUid['table'] : $this->uid;
			$this->record = $rowOrUid;
		}
		// wir haben nur eine uid
		else {
			$this->uid = $rowOrUid;
			$this->record = array();
		}
		$this->initConfig();
	}

	/**
	 * Initialisiert die Konfiguration für den Trigger.
	 *
	 * @return void
	 */
	protected function initConfig() {
		if (!$this->hasProperty('table')) {
			$this->setProperty('table', NULL);
		}
		if (!$this->hasProperty('trigger_id')) {
			$this->setProperty('trigger_id', $this->getProperty('table'));
		}
		if (!$this->hasProperty('message_builder')) {
			$this->setProperty('message_builder', NULL);
		}
		if (!$this->hasProperty('resolver')) {
			$this->setProperty('resolver', 'tx_t3socials_util_ResolverT3DB');
		}
		if (!$this->hasProperty('double_sent_allowed')) {
			$this->setProperty('double_sent_allowed', FALSE);
		}
	}

	/**
	 * Liefert die Trigger ID.
	 * Wenn keine gesetzt ist, nehmen wir den Tabellennamen,
	 * der ist eindeutig genug!
	 *
	 * @return string
	 */
	public function getTriggerId() {
		return $this->hasProperty('trigger_id')
			? $this->getProperty('trigger_id')
			: $this->getTableName();
	}

	/**
	 * Liefert den tamen der Tabelle des Triggers
	 *
	 * @return string
	 */
	public function getTableName() {
		return $this->getProperty('table');
	}

	/**
	 * Liefert den Klassenname des Message-Builders.
	 *
	 * @return string
	 */
	public function getMessageBuilderClass() {
		return $this->getProperty('message_builder');
	}

	/**
	 * Liefert den Klassenname des Resolvers.
	 *
	 * @return string
	 */
	public function getResolverClass() {
		return $this->getProperty('resolver');
	}
	/**
	 * Doppelter Versand kann automatisch verhindert werden.
	 * @return boolean
	 */
	public function isDoubleSentAllowed() {
		return $this->getProperty('double_sent_allowed');
	}
}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_TriggerConfig.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_TriggerConfig.php']);
}
