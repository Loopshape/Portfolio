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
 * Thumbnail generator tool for the Media module.
 */
class ThumbnailGeneratorTool extends AbstractTool {

	/**
	 * Display the title of the tool on the welcome screen.
	 *
	 * @return string
	 */
	public function getTitle() {
		return 'Generate thumbnails';
	}

	/**
	 * Display the description of the tool in the welcome screen.
	 *
	 * @return string
	 */
	public function getDescription() {
		$templateNameAndPath = 'EXT:media/Resources/Private/Backend/Standalone/Tool/ThumbnailGenerator/Launcher.html';
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

		$reports = array();

		foreach ($this->getStorageRepository()->findAll() as $storage) {

			if ($storage->isOnline()) {

				// @todo fine a way to define that from the GUI.
				$limit = $offset = 0;
				$thumbnailGenerator = $this->getThumbnailGenerator();
				$thumbnailGenerator
					->setStorage($storage)
					->generate($limit, $offset);

				$formattedResultSet = array();
				$resultSet = $thumbnailGenerator->getResultSet();
				$processedFileIdentifiers = $thumbnailGenerator->getNewProcessedFileIdentifiers();

				foreach ($processedFileIdentifiers as $fileIdentifier => $processedFileIdentifier) {
					$result = $resultSet[$fileIdentifier];
					$formattedResultSet[] = sprintf('* File "%s": %s %s',
						$result['fileUid'],
						$result['fileIdentifier'],
						empty($result['thumbnailUri']) ? '' : ' -> ' . $result['thumbnailUri']
					);
				}

				$reports[] = array(
					'storage' => $storage,
					'isStorageOnline' => TRUE,
					'resultSet' => $formattedResultSet,
					'numberOfProcessedFiles' => $thumbnailGenerator->getNumberOfProcessedFiles(),
					'numberOfTraversedFiles' => $thumbnailGenerator->getNumberOfTraversedFiles(),
					'numberOfMissingFiles' => $thumbnailGenerator->getNumberOfMissingFiles(),
					'totalNumberOfFiles' => $thumbnailGenerator->getTotalNumberOfFiles(),
				);
			} else {
				$reports[] = array(
					'storage' => $storage,
					'isStorageOnline' => FALSE,
				);
			}
		}


		$templateNameAndPath = 'EXT:media/Resources/Private/Backend/Standalone/Tool/ThumbnailGenerator/WorkResult.html';
		$view = $this->initializeStandaloneView($templateNameAndPath);

		$view->assign('reports', $reports);
		return $view->render();
	}

	/**
	 * @return \TYPO3\CMS\Media\Thumbnail\ThumbnailGenerator
	 */
	protected function getThumbnailGenerator() {
		return GeneralUtility::makeInstance('TYPO3\CMS\Media\Thumbnail\ThumbnailGenerator');
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

