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
tx_rnbase::load('tx_rnbase_mod_IModHandler');

/**
 * PUSHD Handler
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Rene Nitzsche <rene@system25.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_mod_handler_Pushd
	implements tx_rnbase_mod_IModHandler {

	private $data = array();
	private $warnings = array();

	/**
	 * liefert die Handler ID anhand der Netzwerk ID
	 *
	 * @return string
	 */
	public function getSubID() {
		return 'pushd';
	}

	/**
	 * Returns the label for Handler in SubMenu. You can use a label-Marker.
	 *
	 * @return string
	 */
	public function getSubLabel() {
		return 'Pushd';
	}

	/**
	 * This method is called each time the method func is clicked,
	 * to handle request data.
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @return string|null
	 */
	public function handleRequest(tx_rnbase_mod_IModule $mod) {
		$submitted = t3lib_div::_GP('sendpushd');
		if (!$submitted) {
			return NULL;
		}

		$this->data = t3lib_div::_GP('data');
		$msg = trim($this->data['msg']);
		$title = trim($this->data['title']);
		$set = t3lib_div::_GP('SET');
		if (strlen($msg) == 0) {
			$info = 'Bitte einen Text eingeben.<br />';
			$mod->addMessage($info, '###LABEL_MESSAGE###', 1);
			return NULL;
		}
		$message = tx_rnbase::makeInstance('tx_t3socials_models_Message', $set['event']);
		$message->setHeadline($title);
		$message->setMessage($msg);
		$account = tx_rnbase::makeInstance('tx_t3socials_models_Network', $set['pushd']);

		try {
			$conn = tx_rnbase::makeInstance('tx_t3socials_network_pushd_Connection');
			$conn->setNetwork($account);
			$conn->sendMessage($message);
			$mod->addMessage('###LABEL_MESSAGE_SENT###', '###LABEL_MESSAGE###', 0);
		} catch (Exception $e) {
			$mod->addMessage($e->getMessage(), '###LABEL_ERROR###', 2);
		}
		return NULL;
	}

	/**
	 * Display the user interface for this handler
	 *
	 * @param string $template the subpart for handler in func template
	 * @param tx_rnbase_mod_IModule $mod
	 * @param array $options
	 * @return string
	 */
	public function showScreen($template, tx_rnbase_mod_IModule $mod, $options) {

		$formTool = $mod->getFormTool();
		$options = array();

		$markerArr = array();
		$subpartArr = array();
		$wrappedSubpartArr = array();
		// Auswahlbox mit den vorhandenen Accounts
		$accounts = tx_t3socials_srv_ServiceRegistry::getNetworkService()->findAccountsByType('pushd');
		// wir haben accounts, die wir nun auflisten
		if (empty($accounts)) {
			$mod->addMessage('Es wurde kein Pushd-Account gefunden.', '###LABEL_MESSAGE###', 0);
			$subpartArr['###SEND_FORM###'] = '';
		}
		// wir haben accounts, die wir nun auflisten
		else {
			$accMenu = $this->getAccountSelector($mod, $accounts);

			$account = tx_rnbase::makeInstance('tx_t3socials_models_Network', $accMenu['value']);
			$eventMenu = $this->getEventSelector($mod, $account);

			$markerArr['###ACCOUNT_SEL###'] = $accMenu['menu'];
			$markerArr['###ACCOUNT_EDITLINK###'] = $formTool->createEditLink('tx_t3socials_networks', $accMenu['value']);
			$markerArr['###EVENT_SEL###'] = $eventMenu === FALSE ? '<strong>###LABEL_PUSHD_NOEVENTS###</strong>' : $eventMenu['menu'];
			$markerArr['###INPUT_MESSAGE###'] = $formTool->createTextArea('data[msg]', $this->data['msg']);
			$markerArr['###INPUT_TITLE###'] = $formTool->createTxtInput('data[title]', $this->data['title'], 50);
			$markerArr['###BTN_SEND###'] = $formTool->createSubmit('sendpushd', '###LABEL_SUBMIT###');
			$wrappedSubpartArr['###SEND_FORM###'] = '';

		}

		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached(
			$template, $markerArr, $subpartArr, $wrappedSubpartArr
		);
		return $out;
	}

	/**
	 * Returns all accounts
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @param array $accounts
	 * @return array
	 */
	private function getAccountSelector(tx_rnbase_mod_IModule $mod, $accounts) {
		$entries = Array ();
		foreach ($accounts As $account) {
			$entries[$account->uid] = $account->getName();
		}
		return $mod->getFormTool()->showMenu($mod->getPid(), 'pushd', $mod->getName(), $entries);

	}

	/**
	 * Liefert die Events
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @param unknown_type $account
	 * @return array
	 */
	private function getEventSelector(tx_rnbase_mod_IModule $mod, $account) {
		$entries = Array ();
		$confId = 'pushd.events.';
		$events = $account->getConfigurations()->getKeyNames($confId);
		foreach ($events As $event) {
			$entries[$event] = $account->getConfigData($confId . $event . '.label');
			$entries[$event] = $entries[$event] ? $entries[$event] : $event;
		}
		if (empty($entries)) {
			return array();
		}
		return $mod->getFormTool()->showMenu($mod->getPid(), 'event', $mod->getName(), $entries);
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_Pushd.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_Pushd.php']);
}
