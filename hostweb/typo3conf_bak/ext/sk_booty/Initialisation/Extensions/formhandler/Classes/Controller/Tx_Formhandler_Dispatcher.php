<?php
/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *
 * $Id: Tx_Formhandler_Dispatcher.php 85290 2014-05-16 09:57:44Z reinhardfuehricht $
 *                                                                        */

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('formhandler') . 'Classes/Component/Tx_Formhandler_Component_Manager.php');
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('formhandler') . 'Classes/Utils/Tx_Formhandler_Globals.php');
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('formhandler') . 'Classes/Utils/Tx_Formhandler_UtilityFuncs.php');

/**
 * The Dispatcher instantiates the Component Manager and delegates the process to the given controller.
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Dispatcher extends TYPO3\CMS\Frontend\Plugin\AbstractPlugin {

	/**
	 * Compontent Manager
	 * 
	 * @access protected
	 * @var Tx_Formhandler_Component_Manager
	 */
	protected $componentManager;

	/**
	 * The global Formhandler values
	 *
	 * @access protected
	 * @var Tx_Formhandler_Globals
	 */
	protected $globals;

	/**
	 * Main method of the dispatcher. This method is called as a user function.
	 *
	 * @return string rendered view
	 * @param string $content
	 * @param array $setup The TypoScript config
	 */
	public function main($content, $setup) {
		$this->pi_USER_INT_obj = 1;
		$this->globals = Tx_Formhandler_Globals::getInstance();
		$this->utilityFuncs = Tx_Formhandler_UtilityFuncs::getInstance();
		try {

			//init flexform
			$this->pi_initPIflexForm();

			/*
			 * Parse values from flexform:
			 * - Template file
			 * - Translation file
			 * - Predefined form
			 * - E-mail settings
			 * - Required fields
			 * - Redirect page
			 */
			$templateFile = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'template_file', 'sDEF');
			$langFile = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'lang_file', 'sDEF');
			$predef = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'predefined', 'sDEF');
			
			$this->globals->setCObj($this->cObj);
			if($setup['usePredef']) {
				$predef = $this->utilityFuncs->getSingle($setup, 'usePredef');
			}
			$this->globals->getCObj()->setCurrentVal($predef);
			$this->globals->setPredef($predef);
			$this->globals->setOverrideSettings($setup);
			$this->componentManager = Tx_Formhandler_Component_Manager::getInstance();

			/*
			 * set controller:
			 * 1. Default controller
			 * 2. TypoScript
			 */
			$controller = 'Tx_Formhandler_Controller_Form';
			if ($setup['controller']) {
				$controller = $setup['controller'];
			}

			$controller = $this->utilityFuncs->prepareClassName($controller);
			$controller = $this->componentManager->getComponent($controller);

			if (isset($content)) {
				$controller->setContent($this->componentManager->getComponent('Tx_Formhandler_Content', $content));
			}
			if (strlen($templateFile) > 0) {
				$controller->setTemplateFile($templateFile);
			}
			if (strlen($langFile) > 0) {
				$controller->setLangFiles(array($langFile));
			}
			if (strlen($predef) > 0) {
				$controller->setPredefined($predef);
			}

			$result = $controller->process();
		} catch(Exception $e) {
			\TYPO3\CMS\Core\Utility\GeneralUtility::sysLog(
				$e->getFile() . '(' . $e->getLine() . ')' . ' ' . $e->getMessage(),
				'formhandler',
				\TYPO3\CMS\Core\Utility\GeneralUtility::SYSLOG_SEVERITY_ERROR
			);
			$result = $this->utilityFuncs->getTranslatedMessage($this->globals->getLangFiles(), 'fe-exception');
			if(!$result) {
				$result = '<div style="color:red; font-weight: bold">' . $this->utilityFuncs->getExceptionMessage('fe-exception') . '</div>';
			}
			if ($this->globals->getSession() && $this->globals->getSession()->get('debug')) {
				$result = '<div style="color:red; font-weight: bold">' . $e->getMessage() . '</div>';
				$result .= '<div style="color:red; font-weight: bold">File: ' . $e->getFile() . '(' . $e->getLine() . ')</div>';
				$result .= '<div style="color:red; font-weight: bold">' . $e->getTraceAsString() . '</div>';
			}
		}
		if ($this->globals->getSession() && $this->globals->getSession()->get('debug')) {
			$debuggers = $this->globals->getDebuggers();
			foreach($debuggers as $idx => $debugger) {
				$debugger->outputDebugLog();
			}
		}
		return $result;
	}
}
?>
