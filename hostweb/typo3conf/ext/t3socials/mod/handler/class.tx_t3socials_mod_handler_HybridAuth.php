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
tx_rnbase::load('tx_t3socials_models_Message');
tx_rnbase::load('tx_t3socials_mod_util_Template');
tx_rnbase::load('tx_rnbase_util_Templates');

/**
 * Basis handler für HybridAuth
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
abstract class tx_t3socials_mod_handler_HybridAuth
	implements tx_rnbase_mod_IModHandler {

	/**
	 *
	 * @var tx_rnbase_model_base
	 */
	private $formData = NULL;

	/**
	 * liefert die network id. (twitter, xing, ...)
	 *
	 * @return string
	 */
	abstract protected function getNetworkId();

	/**
	 * Kann in der Kindklasse überschrieben werden
	 * um die Message anzupassen oder zu validieren.
	 *
	 * @param tx_t3socials_models_Message $message
	 * @return tx_t3socials_models_Message|string with error message
	 */
	protected function prepareMessage(tx_t3socials_models_Message $message) {
		return $message;
	}

	/**
	 * liefert die Handler ID anhand der Netzwerk ID
	 *
	 * @return string
	 */
	public function getSubID() {
		return $this->getNetworkId();
	}

	/**
	 * Liefert den namen des Submitbuttons
	 *
	 * @return string
	 */
	protected function getSubmitName() {
		return 'send' . $this->getNetworkId() . 'message';
	}

	/**
	 * Liefert die Netzwerkkonfiguration
	 *
	 * @return tx_t3socials_models_NetworkConfig
	 */
	protected function getNetworkConfig() {
		return tx_t3socials_network_Config::getNetworkConfig($this->getNetworkId());
	}

	/**
	 * Returns the label for Handler in SubMenu. You can use a label-Marker.
	 *
	 * @return string
	 */
	public function getSubLabel() {
		return tx_t3socials_network_Config::translateNetwork($this->getNetworkId());
	}

	/**
	 * Liefert alle im Default Formular sichtbaren Felder.
	 *
	 * @return array
	 */
	protected function getVisibleFormFields() {
		return array('headline', 'intro', 'message', 'url');
	}

	/**
	 * Liefert die eventuell abgesendeten Formulardaten
	 *
	 * @return tx_t3socials_models_Base
	 */
	protected function getFormData() {
		if (is_null($this->formData)) {
			$data = t3lib_div::_GP('data');
			$data = empty($data) || !is_array($data) ? array() : $data;
			$this->formData = tx_rnbase::makeInstance('tx_t3socials_models_Base', $data);
		}
		return $this->formData;
	}

	/**
	 * Liefert die generische Nachricht für den versand.
	 *
	 * @return tx_t3socials_models_Message
	 */
	protected function getMessage() {
		$formData = $this->getFormData();
		$headline = $formData->getHeadline();
		$intro = $formData->getIntro();
		$content = $formData->hasMsg() ? $formData->getMsg() : $formData->getMessage();
		$url = $formData->hasLink() ? $formData->getLink() : $formData->getUrl();

		$message = tx_t3socials_models_Message::getInstance();
		$message->setHeadline($headline);
		$message->setIntro($intro);
		$message->setMessage($content);
		$message->setUrl($url);

		return $message;
	}

	/**
	 * This method is called each time the method func is clicked,
	 * to handle request data.
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @return string|null
	 */
	public function handleRequest(tx_rnbase_mod_IModule $mod) {
		$submitted = t3lib_div::_GP($this->getSubmitName());
		if (!$submitted) {
			return NULL;
		}

		$message = $this->getMessage();

		$message = $this->prepareMessage($message);

		// Wurde keine Message zurück gegeben
		// ist die Validierung fehlgeschlagen!
		if (!$message instanceof tx_t3socials_models_Message) {
			$mod->addMessage($message, '###LABEL_MESSAGE###', 1);
			return NULL;
		}

		$set = t3lib_div::_GP('SET');
		$account = tx_t3socials_srv_ServiceRegistry::getNetworkService()->get(
			$set[$this->getNetworkId()]
		);

		try {
			$connection = tx_t3socials_network_Config::getNetworkConnection($account);
			$connection->setNetwork($account);
			$error = $connection->sendMessage($message);
			// fehler beim senden?
			if ($error) {
				$mod->addMessage($error, '###LABEL_ERROR###', 1);
			}
			// erfolgreich versendet
			else {
				$mod->addMessage('###LABEL_MESSAGE_SENT###', '###LABEL_MESSAGE###', 0);
			}
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
		if (empty($template)) {
			$template = tx_t3socials_mod_util_Template::getDefaultMessageTemplate($mod, $options);
			if (empty($template)) {
				return '';
			}
		}

		$formTool = $mod->getFormTool();

		$markerArr = array();
		$subpartArr = array();
		$wrappedSubpartArr = array();

		$markerArr['###NETWORK_TITLE###'] = $this->getSubLabel();

		// Auswahlbox mit den vorhandenen XING-Accounts
		$accounts = tx_t3socials_srv_ServiceRegistry::getNetworkService()->findAccountsByType($this->getNetworkId());
		// wir haben keine Accounts, an die wir versenden könnten
		if (empty($accounts)) {
			$mod->addMessage(
				'Es wurde kein Account für "' . $this->getNetworkConfig()->getProviderTitle() .
				'" gefunden.', '###LABEL_MESSAGE###',
				0
		);
			$subpartArr['###SEND_FORM###'] = '';
		}
		// wir haben accounts, die wir nun auflisten
		else {
			$accMenu = $this->getAccountSelector($mod, $accounts);
			$markerArr['###ACCOUNT_SEL###'] = $accMenu['menu'];
			$markerArr['###ACCOUNT_EDITLINK###'] = $formTool->createEditLink('tx_t3socials_networks', $accMenu['value']);
			$markerArr['###AUTH_STATE###'] = tx_t3socials_mod_util_Template::getAuthentificationState((int) $accMenu['value']);

			$options['submitname'] = $this->getSubmitName();
			$template = tx_t3socials_mod_util_Template::parseMessageFormFields(
				$template, $mod,
				$this->getFormData(), array_flip($this->getVisibleFormFields()),
				$options
			);
		}

		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached($template, $markerArr, $subpartArr, $wrappedSubpartArr);

		return $out;
	}

	/**
	 * Prüft den Status der Authentifikation
	 * und erzeugt eine Entsprechende Ausgabe
	 *
	 * @param integer $networkId
	 * @return string
	 *
	 * @TODO: not an popup, do an ajax call / iframe in a lightbox!
	 */
	protected function getAuthentificationState($networkId) {
		if (!$networkId) {
			return '';
		}
		$network = tx_t3socials_srv_ServiceRegistry::getNetworkService()->get($networkId);

		$connection = tx_t3socials_network_Config::getNetworkConnection($network);

		/* @var $connection instanceof tx_t3socials_network_hybridauth_Interface */
		if (!$connection instanceof tx_t3socials_network_hybridauth_Interface) {
			return '';
		}
		/* @var $adapter Hybrid_Provider_Model_OAuth1 */
		$adapter = $connection->getProvider()->adapter;
		$connected = $adapter->isUserConnected();
		$out  = '<div class="typo3-message ' . ($connected ? 'message-ok' : 'message-error') . '">';
		$out .= 	'<div class="message-header">' . ($connected ? 'Connected' : 'Disconnected') .
					'</div>';
		$out .= 	'<div class="message-body">';
		$popup  = 	'fenster = window.open(this.href, \'T3SOCIALS CONNECTION\', ' .
					'\'toolbar=no,scrollbars=yes,resizable=yes,width=800,height=600\');';
		$popup .= ' fenster.focus(); return false;';
		// dienst ist verbunden
		if ($connected) {
			$url = tx_t3socials_network_hybridauth_OAuthCall::getOAuthCallBaseUrl(
				$networkId,
				tx_t3socials_network_hybridauth_OAuthCall::OAUT_CALL_LOGOUT
			);
			$out .= '<a href="' . $url .
					'" target="_blank" onclick="if (!confirm(\'Do you really want to log out?\')) {return false;}' .
					$popup . '"><strong>Logout</strong></a>';
			$out .= ' <small>(To see the new status you haveto refresh this page after the popup is closed!)</small>';
		}
		// es besteht keine verbindung zum dienst
		else {
			$out .= 'You can not send any Messages at the moment! <br />';
			$url = tx_t3socials_network_hybridauth_OAuthCall::getOAuthCallBaseUrl(
				$networkId,
				tx_t3socials_network_hybridauth_OAuthCall::OAUT_CALL_STATE
			);
			$out .= '<a href="' . $url . '" target="_blank" onclick="' . $popup . '"><strong>Connect</strong></a>';
			$out .= ' <small>(To see the new status you haveto refresh this page after the popup is closed!)</small>';
		}
		$out .= 	'</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 * Returns all rounds of current bet game
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @param array $accounts
	 * @return array
	 */
	private function getAccountSelector(tx_rnbase_mod_IModule $mod, $accounts) {
		$entries = array ('' => '');
		foreach ($accounts As $account) {
			$entries[$account->getUid()] = $account->getName();
		}
		$menue = $mod->getFormTool()->showMenu($pid, $this->getNetworkId(), $mod->getName(), $entries);
		return $menue;
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_HybridAuth.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_HybridAuth.php']);
}