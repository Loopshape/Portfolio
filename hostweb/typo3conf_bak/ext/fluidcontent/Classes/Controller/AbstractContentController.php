<?php
namespace FluidTYPO3\Fluidcontent\Controller;

/*
 * This file is part of the FluidTYPO3/Fluidcontent project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Fluidcontent\Service\ConfigurationService;
use FluidTYPO3\Flux\Controller\AbstractFluxController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * Abstract Content Controller
 *
 * @route off
 */
abstract class AbstractContentController extends AbstractFluxController implements ContentControllerInterface {

	/**
	 * @var ConfigurationService
	 */
	protected $configurationService;

	/**
	 * @param ConfigurationService $configurationService
	 * @return void
	 */
	public function injectConfigurationService(ConfigurationService $configurationService) {
		$this->configurationService = $configurationService;
	}

	/**
	 * @param ViewInterface $view
	 * @return void
	 */
	public function initializeView(ViewInterface $view) {
		parent::initializeView($view);
		$view->assign('page', $GLOBALS['TSFE']->page);
		$view->assign('user', $GLOBALS['TSFE']->fe_user->user);
		$view->assign('record', $this->getRecord());
		$view->assign('contentObject', $this->configurationManager->getContentObject());
		$view->assign('cookies', $_COOKIE);
		$view->assign('session', $_SESSION);
	}

}
