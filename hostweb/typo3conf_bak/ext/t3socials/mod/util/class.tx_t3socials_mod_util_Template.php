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

/**
 * Basis handler für HybridAuth
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_mod_util_Template {

	/**
	 * Display the user interface for this handler
	 *
	 * @param string $template the subpart for handler in func template
	 * @param tx_rnbase_mod_IModule $mod
	 * @param tx_t3socials_models_Base $formData
	 * @param array $formFields
	 * @param array $options
	 * @return string
	 */
	public static function parseMessageFormFields(
		$template,
		tx_rnbase_mod_IModule $mod,
		tx_t3socials_models_Base $formData,
		array $formFields,
		array $options = array()
	) {

		if (empty($template)) {
			$template = self::getDefaultMessageTemplate($mod, $options);
			if (empty($template)) {
				return '';
			}
		}

		$formTool = $mod->getFormTool();

		$markerArr = array();
		$subpartArr = array();
		$wrappedSubpartArr = array();

		if (isset($formFields['headline'])) {
			$markerArr['###INPUT_HEADLINE###'] = $formTool->createTxtInput('data[headline]', $formData->getHeadline(), 30);
			$wrappedSubpartArr['###SEND_FORM_HEADLINE###'] = '';
		} else {
			$subpartArr['###SEND_FORM_HEADLINE###'] = '';
		}
		if (isset($formFields['intro'])) {
			$markerArr['###INPUT_INTRO###'] = $formTool->createTextArea('data[intro]', $formData->getIntro(), 30, 3);
			$wrappedSubpartArr['###SEND_FORM_INTRO###'] = '';
		} else {
			$subpartArr['###SEND_FORM_INTRO###'] = '';
		}
		if (isset($formFields['message'])) {
			$markerArr['###INPUT_MESSAGE###'] = $formTool->createTextArea('data[message]', $formData->getMessage(), 30, 5);
			$wrappedSubpartArr['###SEND_FORM_MESSAGE###'] = '';
		} else {
			$subpartArr['###SEND_FORM_MESSAGE###'] = '';
		}
		if (isset($formFields['url'])) {
			$markerArr['###INPUT_URL###'] = $formTool->createTxtInput('data[url]', $formData->getUrl(), 30);
			$wrappedSubpartArr['###SEND_FORM_URL###'] = '';
		} else {
			$subpartArr['###SEND_FORM_URL###'] = '';
		}

		$submitName = empty($options['submitname']) ? 'sendmessage' : $options['submitname'];
		$markerArr['###BTN_SEND###'] = $formTool->createSubmit($submitName, '###LABEL_SEND_MESSAGE###');
		$wrappedSubpartArr['###SEND_FORM###'] = '';

		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached($template, $markerArr, $subpartArr, $wrappedSubpartArr);

		return $out;
	}

	/**
	 * Erzeugt ein Default Template
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @param array $options
	 * @return string
	 */
	public static function getDefaultMessageTemplate(tx_rnbase_mod_IModule $mod, $options) {
		$configurations = $mod->getConfigurations();

		$file = $configurations->get('communicator.hybridauth.template');
		$file = t3lib_div::getFileAbsFileName($file);
		$templateCode = t3lib_div::getURL($file);

		if (empty($templateCode)) {
			$out  = '<br />Template ConfId: communicator.hybridauth.template';
			$out .= '<br />Configured Template: ' . $configurations->get('communicator.hybridauth.template');
			$mod->addMessage($out, 'Template not Found!', 2);
			return '';
		}

		$template = tx_rnbase_util_Templates::getSubpart($templateCode, '###HYBRIDAUTH_DEFAULT###');

		if (empty($template)) {
			$out  = '<br />Template ConfId: communicator.hybridauth.template';
			$out .= '<br />Configured Template: ' . $configurations->get('communicator.hybridauth.template');
			$out .= '<br />Missing Subpart Template: ###HYBRIDAUTH_DEFAULT###';
			$out .= '<br />Template: <pre>' . (htmlspecialchars($templateCode)) . '</pre>';
			$mod->addMessage($out, 'Subpart not Found!', 2);
			return '';
		}

		return $template;
	}

	/**
	 * Prüft den Status der Authentifikation
	 * und erzeugt eine Entsprechende Ausgabe
	 *
	 * @param integer|tx_t3socials_models_Network $network
	 * @return string
	 *
	 * @TODO: not an popup, do an ajax call / iframe in a lightbox!
	 */
	public static function getAuthentificationState($network) {
		if (!$network) {
			return '';
		}
		$network = $network instanceof tx_t3socials_models_Network
			? $network
			: tx_t3socials_srv_ServiceRegistry::getNetworkService()->get($network);

		$connection = tx_t3socials_network_Config::getNetworkConnection($network);

		/* @var $connection instanceof tx_t3socials_network_hybridauth_Interface */
		if (!$connection instanceof tx_t3socials_network_hybridauth_Interface) {
			return '';
		}
		$connected = false;
		$errMsg = '';
		try {
			/* @var $adapter Hybrid_Provider_Model_OAuth1 */
			$adapter = $connection->getProvider()->adapter;
			$connected = $adapter->isUserConnected();
		} catch(Exception $e) {
			$errMsg = $e->getMessage();
		}
		$out  = '<div class="typo3-message ' . ($connected ? 'message-ok' : 'message-error') . '">';
		$head = $connected ? '###LABEL_T3SOCIALS_STATE_connectED###' : '###LABEL_T3SOCIALS_STATE_DISconnectED###';
		$out .= 	'<div class="message-header">' . $head . '</div>';
		$out .= 	'<div class="message-body">';
		$popup  = 	'fenster = window.open(this.href, \'T3SOCIALS CONNECTION\', ' .
					'\'toolbar=no,scrollbars=yes,resizable=yes,width=800,height=600\');';
		$popup .= ' fenster.focus(); return false;';
		// dienst ist verbunden
		if ($connected) {
			$out .= '###LABEL_T3SOCIALS_STATE_connectED_DESC### <br />';
			$url = tx_t3socials_network_hybridauth_OAuthCall::getOAuthCallBaseUrl(
				$network->getUid(),
				tx_t3socials_network_hybridauth_OAuthCall::OAUT_CALL_LOGOUT
			);
			$out .= '<a href="' . $url . '" target="_blank"' .
				' onclick="if (!confirm(\'###LABEL_T3SOCIALS_STATE_LOGOUT_CONFIRM###\')) {return false;}' . $popup . '">' .
				'<strong>###LABEL_T3SOCIALS_STATE_LOGOUT###</strong></a>';
			$out .= ' <small>(###LABEL_T3SOCIALS_STATE_REFRESH_POPUP###)</small>';
		}
		// es besteht keine verbindung zum dienst
		else {
			$out .= '###LABEL_T3SOCIALS_STATE_DISconnectED_DESC### <br />';
			if ($errMsg) {
				$out .= '<br/><strong>' . $errMsg . '</strong><br/></br/>';
			}
			$url = tx_t3socials_network_hybridauth_OAuthCall::getOAuthCallBaseUrl(
				$network->getUid(),
				tx_t3socials_network_hybridauth_OAuthCall::OAUT_CALL_STATE
			);
			$out .= '<a href="' . $url . '" target="_blank"' .
				' onclick="' . $popup . '"><strong>###LABEL_T3SOCIALS_STATE_LOGIN###</strong></a>';
			$out .= ' <small>(###LABEL_T3SOCIALS_STATE_REFRESH_POPUP###)</small>';
		}
		$out .= 	'</div>';
		$out .= '</div>';
		return $out;
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/util/class.tx_t3socials_mod_util_Template.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/util/class.tx_t3socials_mod_util_Template.php']);
}