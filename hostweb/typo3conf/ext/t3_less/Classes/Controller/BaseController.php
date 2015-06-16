<?php
namespace DG\T3Less\Controller;
/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2013 David Greiner <hallo@davidgreiner.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * ************************************************************* */

/**
 *
 *
 * @package TYPO3
 * @subpackage t3_less
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @author  David Greiner <hallo@davidgreiner.de>
 * @author  Thomas Heuer <technik@thomas-heuer.de>
 */
class BaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * configuration array from constants
	 * @var array $configuration
	 */
	protected $configuration;

	/**
	 * folder for lessfiles
	 * @var string $lessfolder
	 */
	protected $lessfolder;

	/**
	 * folder for compiled files
	 * @var string $outputfolder
	 */
	protected $outputfolder;

	public function __construct()
	{
		//makeInstance should not be used, but injection does not work without FE-plugin?

		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( 'TYPO3\\CMS\\Extbase\\Object\\ObjectManager' );

		$configurationManager = $objectManager->get( 'TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface' );

		$configuration = $configurationManager->getConfiguration(
			\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK, 'T3Less', ''
		);
		$this->configuration = $configuration;

		$this->lessfolder = \DG\T3Less\Utility\Utilities::getPath( $this->configuration['files']['pathToLessFiles'] );
		$this->outputfolder = \DG\T3Less\Utility\Utilities::getPath( $this->configuration['files']['outputFolder'] );
		parent::__construct();
	}

	/**
	 * action base
	 *
	 */
	public function baseAction()
	{
		if( TYPO3_MODE != 'FE' )
		{
			return;
		}

		$files = array( );
		// compiler activated?
		if( $this->configuration['other']['activateCompiler'] )
		{
			// folders defined?
			if( $this->lessfolder && $this->outputfolder )
			{
				// are there files in the defined less folder?
				if( \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir( $this->lessfolder, "less", TRUE ) )
				{
					$files = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir( $this->lessfolder, "less", TRUE );

				}
				else
				{
					echo \DG\T3Less\Utility\Utilities::wrapErrorMessage( \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'noLessFilesInFolder', $this->extensionName, $arguments = array( 's' => $this->lessfolder ) ) );
				}
			}
			else
			{
				echo \DG\T3Less\Utility\Utilities::wrapErrorMessage( \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'emptyPathes', $this->extensionName ) );
			}
		}


		/* Hook to pass less-files from other extension, see manual */
		if( isset( $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['t3less']['addForeignLessFiles'] ) )
		{
			foreach( $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['t3less']['addForeignLessFiles'] as $hookedFilePath )
			{
				$hookPath = \DG\T3Less\Utility\Utilities::getPath( $hookedFilePath );
				$files[] = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir( $hookPath, "less", TRUE );
			}
			$files = \DG\T3Less\Utility\Utilities::flatArray( null, $files );
		}

		switch( $this->configuration['enable']['mode'] )
		{
			case 'PHP-Compiler':
				$controller = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( 'DG\\T3Less\\Controller\\LessPhpController' );
				$controller->lessPhp( $files );
				break;

			case 'JS-Compiler':
				$controller = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( 'DG\\T3Less\\Controller\\LessJsController' );
				$controller->lessJs( $files );
				break;

			case 'JS-Compiler via Node.js':
				$controller = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( 'DG\\T3Less\\Controller\\LessJsNodeController' );
				if( $controller->isLesscInstalled() )
				{
					$controller->lessc( $files );
				}
				else
				{
					echo \DG\T3Less\Utility\Utilities::wrapErrorMessage( \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'lesscRequired', $this->extensionName ) );
				}
				break;
		}
	}

}
