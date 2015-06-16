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

/**
 * Trigger Handler
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_mod
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_mod_handler_Trigger
	implements tx_rnbase_mod_IModHandler {


	private $triggerConfig = FALSE;
	private $resourceModel = FALSE;
	private $accountSelector = FALSE;
	/**
	 *
	 * @var tx_rnbase_model_base
	 */
	private $formData = NULL;

	/**
	 * Setzt den Trigger
	 *
	 * @param tx_t3socials_models_TriggerConfig $triggerConfig
	 * @return tx_t3socials_mod_handler_Trigger
	 */
	public function setTriggerConfig(
		tx_t3socials_models_TriggerConfig $triggerConfig
	) {
		$this->triggerConfig = $triggerConfig;
		return $this;
	}
	/**
	 * Liefert den Trigger
	 *
	 * @return tx_t3socials_models_TriggerConfig
	 */
	public function getTriggerConfig() {
		return $this->triggerConfig;
	}

	/**
	 * Setzt das Resource Model
	 *
	 * @param tx_t3socials_models_Base $resourceModel
	 * @return tx_t3socials_mod_handler_Trigger
	 */
	public function setResourceModel(
		tx_t3socials_models_Base $resourceModel
	) {
		$this->resourceModel = $resourceModel;
		return $this;
	}
	/**
	 * Liefert das Resource Model
	 *
	 * @return tx_t3socials_models_Base
	 */
	public function getResourceModel() {
		return $this->resourceModel;
	}

	/**
	 * Liefert die eventuell abgesendeten Formulardaten
	 *
	 * @return tx_t3socials_models_Base
	 */
	protected function getFormData() {
		if ($this->formData === NULL) {
			$data = t3lib_div::_GP('data');
			$data = empty($data) || !is_array($data) ? array() : $data;
			// keine formdaten vorhanden? dann die vom record nutzen!
			if (empty($data) && $this->getTriggerConfig() && $this->getResourceModel()) {
				$builder = tx_t3socials_trigger_Config::getMessageBuilder($this->getTriggerConfig());
				$this->formData = $builder->buildGenericMessage($this->getResourceModel());
			} else {
				$this->formData = tx_rnbase::makeInstance('tx_t3socials_models_Base', $data);
			}
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
		$type = $this->getTriggerConfig() ? $this->getTriggerConfig()->getTrigerId() : 'manually';
		$message = tx_t3socials_models_Message::getInstance($type);
		$message->setHeadline($formData->getHeadline());
		$message->setIntro($formData->getIntro());
		$message->setMessage($formData->getMessage());
		$message->setUrl($formData->getUrl());
		return $message;
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
	 * Returns a unique ID for this handler.
	 * This is used to created the subpart in template.
	 *
	 * @return string
	 */
	public function getSubID() {
		return 'trigger';
	}

	/**
	 * Liefert das Label des Moduls
	 *
	 * @return string
	 */
	public function getSubLabel() {
		return 'Trigger';
	}

	/**
	 * This method is called each time the method func is clicked,
	 * to handle request data.
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @return null|string
	 */
	public function handleRequest(tx_rnbase_mod_IModule $mod) {
		$submitted = t3lib_div::_GP('sendtriggermessage');
		if (!$submitted) {
			return NULL;
		}

		$networks = t3lib_div::_GP('network');

		// keine netzwerke / accounts gewählt
		if (empty($networks)) {
			$mod->addMessage('###LABEL_MESSAGE_NO_NETWORK_SELECTED###', '###LABEL_MESSAGE###', 0);
			return NULL;
		}

		// uids sind immer int!
		$networks = array_map('intval', $networks);

		$message = $this->getMessage();

		if (
			!($message->getHeadline())
			&& !($message->getIntro())
			&& !($message->getMessage())
			&& !($message->getUid())
		) {
			$message = '###LABEL_MESSAGE_EMPTY###';
		}

		// Wurde keine Message zurück gegeben
		// ist die Validierung fehlgeschlagen!
		if (!$message instanceof tx_t3socials_models_Message) {
			$mod->addMessage($message, '###LABEL_MESSAGE###', 1);
			return NULL;
		}

		// wir initiieren noch das model in die news
		$message->setData($this->getResourceModel());

		$hasSend = FALSE;

		$networkSrv = tx_t3socials_srv_ServiceRegistry::getNetworkService();
		foreach ($networks as $networkId) {
			/* @var $account tx_t3socials_models_Network */
			$account = $networkSrv->get($networkId);

			// wir erzeugen ein clone, um spezielle manipulationen
			// für das netzwerk zu machen
			$messageCopy = clone $message;

			// jetzt müssen wir nocht den builder vom trigger aufrufen
			// das ist wichtig, wenn beispielsweise der link
			// zu einer news automatich generiert werden soll
			if ($this->getTriggerConfig()) {
				$builder = tx_t3socials_trigger_Config::getMessageBuilder($this->getTriggerConfig());
				$builder->prepareMessageForNetwork(
					$messageCopy, $account,
					$this->getTriggerConfig()
				);
			}

			try {
				$connection = tx_t3socials_network_Config::getNetworkConnection($account);
				$connection->setNetwork($account);
				$error = $connection->sendMessage($messageCopy);
				// fehler beim senden?
				if ($error) {
					$mod->addMessage($error, '###LABEL_ERROR### (' . $account->getName() . ')', 1);
				}
				// erfolgreich versendet
				else {
					$mod->addMessage('###LABEL_MESSAGE_SENT###', '###LABEL_NOTE### (' . $account->getName() . ')', 0);
					$hasSend = TRUE;
				}
			} catch (Exception $e) {
				$mod->addMessage($e->getMessage(), '###LABEL_ERROR### (' . $account->getName() . ')', 2);
			}

		}

		if ($hasSend && $this->getTriggerConfig() && $this->getResourceModel()) {
			$networkSrv->setSent(
				$this->getResourceModel()->getUid(),
				$this->getTriggerConfig()->getTableName()
			);
		}

		return NULL;
	}

	/**
	 * Display the user interface for this handler
	 *
	 * @param string $template
	 * @param tx_rnbase_mod_IModule $mod
	 * @param array $options
	 * @return string
	 */
	public function showScreen($template, tx_rnbase_mod_IModule $mod, $options) {
		$options['submitname'] = empty($options['submitname']) ? 'sendtriggermessage' : $options['submitname'];
		$out = tx_t3socials_mod_util_Template::parseMessageFormFields(
			$template, $mod,
			$this->getFormData(), array_flip($this->getVisibleFormFields()),
			$options
		);

		$markerArr = array();
		// felder vom basistemplate befüllen
		$markerArr['###NETWORK_TITLE###'] = 'Accounts and Message';
		$markerArr['###AUTH_STATE###'] = $this->getResourceModelInfo($mod);
		$markerArr['###ACCOUNT_SEL###'] = $this->getAccountSelector($mod);
		$markerArr['###ACCOUNT_EDITLINK###'] = '';
		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached($out, $markerArr);
		return $out;
	}

	/**
	 * Liefert eine Kurze Info über das verwendete Resource-Model
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @return string
	 */
	protected function getResourceModelInfo(tx_rnbase_mod_IModule $mod) {
		$out = '';
		$model = $this->getResourceModel();
		$trigger = $this->getTriggerConfig();
		if ($model) {
			$tableName = $trigger->getTableName();
			$labelField = $GLOBALS['TCA'][$tableName]['ctrl']['label'];
			$row = array();
			$row[] = array('###LABEL_RESOURCE_INFO###', '');
			$row[] = array(
				'###LABEL_T3SOCIALS_TRIGGER###',
				$trigger->getTrigerId(),
			);
			$networkSrv = tx_t3socials_srv_ServiceRegistry::getNetworkService();
			$hasSend = $networkSrv->hasSent($model->getUid(), $tableName);
			$wrap = array(
				'<span style="color:#' . ($hasSend ? 'AA0225' : '3B7826') . ';">',
				'</span>'
			);
			$row[] = array(
				$wrap[0] . '###LABEL_T3SOCIALS_HASSEND_LABEL###' . $wrap[1],
				$wrap[0] . ($hasSend
					? '###LABEL_T3SOCIALS_HASSEND_YES###'
					: '###LABEL_T3SOCIALS_HASSEND_NO###') . $wrap[1],
			);
			$row[] = array(
				'###LABEL_TABLE###',
				$tableName,
			);
			$row[] = array(
				'UID',
				$model->getUid(),
			);
			$row[] = array(
				'###LABEL_TITLE###',
				$model->record[$labelField],
			);
			// gelöscht oder hidden? dann meldung ausgeben!
			$state = array();
			if ($model->isDeleted()) {
				$state[] = 'deleted';
			}
			if ($model->isHidden()) {
				$state[] = 'hidden';
			}
			if (!empty($state)) {
				$wrap = array(
					'<span style="color:#AA0225;">',
					'</span>'
				);
				$row[] = array(
					$wrap[0] . 'State' . $wrap[1],
					$wrap[0] . implode(' and ', $state) . '!' . $wrap[1]
				);
			}

			$out = $mod->getDoc()->table($row);
		}
		return $out;
	}

	/**
	 * Liefert alle Accounts für die Auswahl zum versenden.
	 *
	 * @param tx_rnbase_mod_IModule $mod
	 * @return array
	 */
	private function getAccountSelector(tx_rnbase_mod_IModule $mod) {
		if ($this->accountSelector === FALSE) {
			$this->accountSelector = '';

			$formTool = $mod->getFormTool();
			$srv = tx_t3socials_srv_ServiceRegistry::getNetworkService();

			$accounts = array();
			$triggerConfig = $this->getTriggerConfig();
			// nur accounts für einen bestimmten Trigger liefern
			if ($triggerConfig) {
				$accounts = $srv->findAccounts($triggerConfig->getTrigerId());
			}
			// alle accounts abrufen
			else {
				$accounts = $srv->findAll();
			}

			$rows = array();
			// tabellenüberschrift
			$rows[] = array('', '###LABEL_ACCOUNT###', '###LABEL_STATE###');

			foreach ($accounts as $account) {
				$rows[] = $this->getAccountRow($account, $mod);
			}

			$this->accountSelector = $mod->doc->table($rows);
		}
		return $this->accountSelector;
	}

	/**
	 * Erzeugt das HTML für den Select eines Netzwerks.
	 *
	 * @param tx_t3socials_models_Network $account
	 * @param tx_rnbase_mod_IModule $mod
	 * @return array
	 */
	protected function getAccountRow(
		tx_t3socials_models_Network $account,
		tx_rnbase_mod_IModule $mod
	) {

		$checked = t3lib_div::_GP('network');
		$checked = is_array($checked) ? $checked : array();

		$uid = $account->getUid();
		$title = $account->getName();

		$row = array();

		$html  = '';
		$html .= '<input type="checkbox"';
		$html .= ' name="network[' . $uid . ']"';
		$html .= ' id="network_' . $uid . '"';
		$html .= ' value="' . $uid . '"';
		$html .= empty($checked[$uid]) ? '' : ' checked="checked"';
		$html .= ' /> ';
		$row[] = $html;

		$html  = '';
		$html .= $mod->getFormTool()->createEditLink($account->getTableName(), $uid, '');
		$html .= ' <label for="network_' . $uid . '">';
		$html .= ' <strong>' . $title . '</strong>';
		$html .= ' </label>';
		$row[] = $html;

		$row[] = tx_t3socials_mod_util_Template::getAuthentificationState($account);

		return $row;
	}

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_Trigger.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/mod/handler/class.tx_t3socials_mod_handler_Trigger.php']);
}
