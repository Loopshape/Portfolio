<?php
namespace TYPO3\CMS\Media\Tool;

/**
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
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Vidi\Tool\AbstractTool;

/**
 * Search for duplicate files having the same "sha1" and process them.
 */
class DuplicateRecordsFinderTool extends AbstractTool {

	/**
	 * Display the title of the tool on the welcome screen.
	 *
	 * @return string
	 */
	public function getTitle() {
		return 'Find duplicate Records';
	}

	/**
	 * Display the description of the tool in the welcome screen.
	 *
	 * @return string
	 */
	public function getDescription() {
		$templateNameAndPath = 'EXT:media/Resources/Private/Backend/Standalone/Tool/DuplicateRecordsFinder/Launcher.html';
		$view = $this->initializeStandaloneView($templateNameAndPath);
		$view->assign('sitePath', PATH_site);
		return $view->render();
	}

	/**
	 * Do the job: analyse Index.
	 *
	 * @param array $arguments
	 * @return string
	 */
	public function work(array $arguments = array()) {

		$templateNameAndPath = 'EXT:media/Resources/Private/Backend/Standalone/Tool/DuplicateRecordsFinder/WorkResult.html';
		$view = $this->initializeStandaloneView($templateNameAndPath);

		$duplicateRecordsReports = array();
		foreach ($this->getStorageRepository()->findAll() as $storage) {

			if ($storage->isOnline()) {
				$duplicateFiles = $this->getIndexAnalyser()->searchForDuplicateIdentifiers($storage);
				$duplicateRecordsReports[] = array(
					'storage' => $storage,
					'duplicateFiles' => $duplicateFiles,
					'numberOfDuplicateFiles' => count($duplicateFiles),
				);
			}
		}

		$view->assign('duplicateRecordsReports', $duplicateRecordsReports);

		return $view->render();
	}

	/**
	 * Return a pointer to the database.
	 *
	 * @return \TYPO3\CMS\Media\Index\IndexAnalyser
	 */
	protected function getIndexAnalyser() {
		return GeneralUtility::makeInstance('TYPO3\CMS\Media\Index\IndexAnalyser');
	}

	/**
	 * @return StorageRepository
	 */
	protected function getStorageRepository() {
		return GeneralUtility::makeInstance('TYPO3\CMS\Core\Resource\StorageRepository');
	}

	/**
	 * Tell whether the tools should be displayed according to the context.
	 *
	 * @return bool
	 */
	public function isShown() {
		return $this->getBackendUser()->isAdmin();
	}

	/**
	 * Return a pointer to the database.
	 *
	 * @return \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected function getDatabaseConnection() {
		return $GLOBALS['TYPO3_DB'];
	}

}

