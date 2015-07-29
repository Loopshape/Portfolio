<?php
namespace TYPO3\CMS\Install;

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

use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Core\Core\RequestHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Default request handler for all requests inside the TYPO3 Install Tool, which does a simple hardcoded
 * dispatching to a controller based on the get/post variable.
 *
 * @package TYPO3\CMS\Install
 */
class RequestHandler implements RequestHandlerInterface {

	/**
	 * Instance of the current TYPO3 bootstrap
	 * @var Bootstrap
	 */
	protected $bootstrap;

	/**
	 * Constructor handing over the bootstrap
	 *
	 * @param Bootstrap $bootstrap
	 */
	public function __construct(Bootstrap $bootstrap) {
		$this->bootstrap = $bootstrap;
	}

	/**
	 * Handles an install tool request
	 * Execute 'tool' or 'step' controller depending on install[controller] GET/POST parameter
	 *
	 * @return void
	 */
	public function handleRequest() {
		$getPost = GeneralUtility::_GP('install');
		switch ($getPost['controller']) {
			case 'tool':
				$controllerClassName = Controller\ToolController::class;
				break;
			case 'ajax':
				$controllerClassName = Controller\AjaxController::class;
				break;
			default:
				$controllerClassName = Controller\StepController::class;
		}
		GeneralUtility::makeInstance($controllerClassName)->execute();
	}

	/**
	 * This request handler can handle any request when not in CLI mode and the install tool flag is set
	 * please note that both checks are needed, as when in "failsafe" mode, the TYPO3_REQUESTTYPE is not
	 * necessarily set at this point.
	 *
	 * @return bool Returns TRUE if the request is in Install Tool mode, otherwise FALSE
	 */
	public function canHandleRequest() {
		return defined('TYPO3_enterInstallScript') || (TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL);
	}

	/**
	 * Returns the priority - how eager the handler is to actually handle the request.
	 *
	 * @return int The priority of the request handler.
	 */
	public function getPriority() {
		return 20;
	}
}
