<?php
namespace In2code\Powermail\Utility\Tca;

use In2code\Powermail\Utility\Configuration;
use In2code\Powermail\Utility\Div;

/**
 * Class ShowFormNoteIfNoEmailOrNameSelected shows note if form errors
 */
class ShowFormNoteIfNoEmailOrNameSelected {

	/**
	 * Path to locallang file (with : as postfix)
	 *
	 * @var string
	 */
	protected $locallangPath = 'LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:';

	/**
	 * @var \TYPO3\CMS\Lang\LanguageService
	 */
	protected $languageService = NULL;

	/**
	 * Show Note if no Email or Name selected
	 *
	 * @param array $params Config Array
	 * @return string
	 */
	public function showNote($params) {
		$this->initialize();
		$content = '';
		if (!$this->showNoteActive($params)) {
			return $content;
		}

		if (!$this->senderEmailOrSenderNameSet($params['row']['uid'])) {
			if ($this->noteFieldDisabled($params)) {
				$content .= '<p style="opacity: 0.3; margin: 0;">';
				$content .= $this->getCheckboxHtml($params);
				$content .= '<label for="tx_powermail_domain_model_forms_note_checkbox" style="vertical-align: bottom;">';
				$content .= $this->languageService->sL($this->locallangPath . 'tx_powermail_domain_model_forms.note.4', TRUE);
				$content .= '</label>';
				$content .= '<p style="margin: 0 0 3px 0;">';
			} else {
				$content .= '<div style="background-color: #FCF8E3; border: 1px solid #FFB019; padding: 5px 10px; color: #FFB019;">';
				$content .= '<p style="margin: 0 0 3px 0;">';
				$content .= '<strong>';
				$content .= $this->languageService->sL($this->locallangPath . 'tx_powermail_domain_model_forms.note.1', TRUE);
				$content .= '</strong>';
				$content .= ' ';
				$content .= $this->languageService->sL($this->locallangPath . 'tx_powermail_domain_model_forms.note.2', TRUE);
				$content .= '</p>';
				$content .= '<p style="margin: 0;">';
				$content .= $this->getCheckboxHtml($params);
				$content .= '<label for="tx_powermail_domain_model_forms_note_checkbox" style="vertical-align: bottom;">';
				$content .= $this->languageService->sL($this->locallangPath . 'tx_powermail_domain_model_forms.note.3', TRUE);
				$content .= '</label>';
				$content .= '</p>';
				$content .= '</div>';
			}
		}

		if (!$this->hasFormUniqueFieldMarkers($params['row']['uid'])) {
			$content .= '<div style="background:#F2DEDE; border:1px solid #A94442; padding: 5px 10px; color: #A94442; margin-top: 10px">';
			$content .= '<p><strong>';
			$content .= $this->languageService->sL($this->locallangPath . 'tx_powermail_domain_model_forms.error.1', TRUE);
			$content .= '</strong></p>';
			$content .= '<p>';
			$content .= $this->languageService->sL($this->locallangPath . 'tx_powermail_domain_model_forms.error.2', TRUE);
			$content .= '</p>';
			$content .= '</div>';
		}

		return $content;
	}

	/**
	 * @param array $params Config Array
	 * @return string
	 */
	protected function getCheckboxHtml($params) {
		$content = '';
		$content .= '<input type="checkbox" id="tx_powermail_domain_model_forms_note_checkbox" name="dummy" ';
		$content .= ((isset($params['row']['note']) && $params['row']['note'] === '1') ? 'checked="checked" ' : '');
		$content .= '
			value="1" onclick="document.getElementById(\'tx_powermail_domain_model_forms_note\').value = ((this.checked) ? 1 : 0);" />
		';
		$content .= '<input type="hidden" id="tx_powermail_domain_model_forms_note" ';
		$content .= 'name="data[tx_powermail_domain_model_forms][' . $params['row']['uid'] . '][note]" ';
		$content .= 'value="' . (!empty($params['row']['note']) ? '1' : '0') . '" />';
		return $content;
	}

	/**
	 * Check if notefield was disabled
	 *
	 * @param array $params Config Array
	 * @return bool
	 */
	protected function noteFieldDisabled($params) {
		if (isset($params['row']['note']) && $params['row']['note'] === '1') {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Check if sender_email or sender_name was set
	 *
	 * @param $formUid
	 * @return bool
	 */
	protected function senderEmailOrSenderNameSet($formUid) {
		$fields = Div::getFieldsFromFormWithSelectQuery($formUid);
		foreach ($fields as $property) {
			foreach ($property as $column => $value) {
				if ($column === 'sender_email' && $value === '1') {
					return TRUE;
				}
				if ($column === 'sender_name' && $value === '1') {
					return TRUE;
				}
			}
		}
		return FALSE;
	}

	/**
	 * Check if form has unique field markers
	 *
	 * @param $formUid
	 * @return bool
	 */
	protected function hasFormUniqueFieldMarkers($formUid) {
		$fields = Div::getFieldsFromFormWithSelectQuery($formUid);
		$markers = array();
		foreach ($fields as $field) {
			$markers[] = $field['marker'];
		}
		if (array_unique($markers) === $markers) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Check if showNote should be active or not
	 *
	 * @param array $params Config Array
	 * @return bool
	 */
	protected function showNoteActive($params) {
		if (
			!isset($params['row']['uid']) ||
			!is_numeric($params['row']['uid'])
			|| Configuration::isReplaceIrreWithElementBrowserActive()
		) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Initialize some variables
	 *
	 * @return void
	 */
	protected function initialize() {
		$this->languageService = $GLOBALS['LANG'];
	}
}