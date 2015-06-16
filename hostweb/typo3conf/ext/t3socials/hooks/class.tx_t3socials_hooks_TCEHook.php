<?php
/***************************************************************
*  Copyright notice
*
 * (c) 2013 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
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

/**
 * TCE-HOOK
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_hooks
 * @author Rene Nitzsche <rene@system25.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_hooks_TCEHook {

	/**
	 * Nachbearbeitungen, unmittelbar NACHDEM die Daten gespeichert wurden.
	 *
	 * @param string $status
	 * @param string $table
	 * @param int $id
	 * @param array $fieldArray
	 * @param tce_main &$tcemain
	 * @return void
	 */
	public function processDatamap_afterDatabaseOperations(
		$status, $table, $id, $fieldArray, t3lib_TCEmain &$tcemain
	) {
		if (
			!(
				// gibts trigger für die Tabelle?
				$this->isTriggerable($table)
				// wurden daten geändert?
				&& !empty($tcemain->datamap)
				// befinden wir uns im live workspace?
				&& $tcemain->BE_USER->workspace === 0
				// nur beim command new und update!
				&& ($status == 'new' || $status == 'update')
			)
		) {
			return;
		}
		if ($status == 'new') {
			$id = $tcemain->substNEWwithIDs[$id];
		}

		$this->handleAutoSend($table, $id);
		$this->handleInfo($table, $id);
	}

	/**
	 * Hook after performing different record actions in Typo3 backend:
	 * Update indexes according to the just performed action
	 *
	 * @param string $command
	 * @param string $table
	 * @param int $id
	 * @param int $value
	 * @param t3lib_TCEmain $tce
	 * @return void
	 * @todo Treatment of any additional actions necessary?
	 */
	public function processCmdmap_postProcess(
		$command, $table, $id, $value, t3lib_TCEmain $tcemain
	) {
		if (
			!(
				// gibts trigger für die Tabelle?
				$this->isTriggerable($table)
				// wurden änderungen am workspace gemacht?
				&& $command == 'version'
				// wurde die version ausgetauscht?
				&& $value['action'] === 'swap'
				&& $value['swapWith'] > 0
			)
		) {
			return;
		}

		$this->handleAutoSend($table, $id);
		$this->handleInfo($table, $id);
	}

	/**
	 * Prüft, ob die übergebene Tabelle Trigger haben kann.
	 *
	 * @param string $table
	 * @return string
	 */
	protected function isTriggerable($table) {
		$triggerable = tx_t3socials_trigger_Config::getTriggerTableNames();
		return in_array($table, $triggerable);
	}

	/**
	 * Sendet automatisch einen Datensatz an die Netzwerke.
	 *
	 * @param string $table
	 * @param int $uid
	 * @return void
	 */
	protected function handleAutoSend($table, $uid) {
		$networkSrv = tx_t3socials_srv_ServiceRegistry::getNetworkService();
		$states = $networkSrv->exeuteAutoSend($table, $uid);
		tx_rnbase::load('tx_t3socials_util_Message');
		/* @var $state tx_t3socials_models_State */
		foreach ($states as $state) {
			// wir zeigen nur erfolgsmeldungen an,
			// alles weitere steht in der log
			if ($state->isStateSuccess()) {
				tx_t3socials_util_Message::showFlashMessage($state);
			}
		}
	}

	/**
	 * Prüft, ob eine spezielle Info (Flash Message) erzeugt werden soll.
	 *
	 * @param string $table
	 * @param int $uid
	 * @return void
	 */
	protected function handleInfo($table, $uid) {
		$triggers = tx_t3socials_trigger_Config::getTriggerNamesForTable($table);
		$networkSrv = tx_t3socials_srv_ServiceRegistry::getNetworkService();
		$networks = $networkSrv->findAccountsByTriggers($triggers, FALSE);
		// wir haben Konfigurierte Netzwerke,
		// weche manuell getriggert werden können.
		// wir bauen also die nachricht zusammen
		if (!empty($networks)) {
			$url  = t3lib_div::getIndpEnv('TYPO3_SITE_URL');
			tx_rnbase::load('tx_rnbase_util_Misc');
			$thisUrl = rawurlencode(tx_rnbase_util_Misc::getIndpEnv('REQUEST_URI'));
			$url .= 'typo3conf/ext/t3socials/mod/index.php?1';
			$url .= '&returnUrl=' . $thisUrl;
			$url .= '&SET%5Bfunction%5D=tx_t3socials_mod_Trigger';
			$url .= '&SET%5Btrigger%5D=' . reset($triggers);
			$url .= '&SET%5Bresource%5D=' . (int) $uid;
			$msg  = 'Sie können das eben gespeicherte Element über T3 SOCIALS an verschiedene Dienste senden. <br />';
			$msg .= ' Klicken Sie <a href="' . $url . '">hier</a> um die Nachricht anzupassen und einen manuellen Versand durchzuführen.';
			$message = array(
				'message' => $msg,
				'title' => '<a href="' . $url . '">T3 SOCIALS</a>',
				'severity' => t3lib_FlashMessage::INFO,
				// Damit die meldung auch bei akttionen wie
				// speichern und schließen" ausgegeben wird.
				'storeinsession' => TRUE,
			);
			tx_rnbase::load('tx_t3socials_util_Message');
			tx_t3socials_util_Message::showFlashMessage($message);
		}
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/hooks/class.tx_t3socials_hooks_TCEHook.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/hooks/class.tx_t3socials_hooks_TCEHook.php']
	);
}
