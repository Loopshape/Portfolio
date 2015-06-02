<?php
namespace TYPO3\CMS\Media\View\Check;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Vidi\Tca\Tca;
use TYPO3\CMS\Vidi\View\AbstractComponentView;

/**
 * View which renders a button for uploading assets.
 */
class ConfigurationCheck extends AbstractComponentView {

	/**
	 * @var array
	 */
	public $notAllowedMountPoints = array();

	/**
	 * Renders a button for uploading assets.
	 *
	 * @return string
	 */
	public function render() {

		$result = '';

		// Check whether storage is configured or not.
		if ($this->checkStorageNotConfigured()) {
			$this->configureStorage();
			$result .= $this->formatMessageForStorageConfigured();
		}

		// Check whether storage is online or not.
		if ($this->checkStorageOffline()) {
			$result .= $this->formatMessageForStorageOffline();
		}

		// Check all mount points of the storage are available
		if (!$this->checkMountPoints()) {
			$result .= $this->formatMessageForMountPoints();
		}

		// Check all mount points of the storage are available
		if (!$this->checkColumnNumberOfReferences()) {
			$result .= $this->formatMessageForColumnNumberOfReferences();
		}

		return $result;
	}

	/**
	 * @return boolean
	 */
	protected function configureStorage() {
		$tableName = 'sys_file_storage';
		$fields = array(
			'maximum_dimension_original_image',
			'extension_allowed_file_type_1',
			'extension_allowed_file_type_2',
			'extension_allowed_file_type_3',
			'extension_allowed_file_type_4',
			'extension_allowed_file_type_5',
		);

		$values = array();
		foreach ($fields as $field) {
			$values[$field] = Tca::table($tableName)->field($field)->getDefaultValue();
		}

		$storage = $this->getStorageService()->findCurrentStorage();
		$this->getDatabaseConnection()->exec_UPDATEquery($tableName, 'uid = ' . $storage->getUid(), $values);
	}

	/**
	 * Check whether the storage is correctly configured.
	 *
	 * @return boolean
	 */
	protected function checkStorageNotConfigured() {
		$currentStorage = $this->getStorageService()->findCurrentStorage();
		$storageRecord = $currentStorage->getStorageRecord();

		// Take the storage fields and check whether some data was initialized.
		$fields = array(
			'mount_point_file_type_1',
			'mount_point_file_type_2',
			'mount_point_file_type_3',
			'mount_point_file_type_4',
			'mount_point_file_type_5',
			'maximum_dimension_original_image',
			'extension_allowed_file_type_1',
			'extension_allowed_file_type_2',
			'extension_allowed_file_type_3',
			'extension_allowed_file_type_4',
			'extension_allowed_file_type_5',
		);

		$result = TRUE;
		foreach ($fields as $fieldName) {
			// TRUE means the storage has data and thus was configured / saved once.
			if (!empty($storageRecord[$fieldName])) {
				$result = FALSE;
				break;
			}
		}
		return $result;
	}

	/**
	 * Format a message whenever the storage is offline.
	 *
	 * @return string
	 */
	protected function formatMessageForStorageConfigured() {

		$storage = $this->getStorageService()->findCurrentStorage();

		$result = <<< EOF
			<div class="typo3-message message-information">
				<div class="message-header">
						Storage has been configured.
				</div>
				<div class="message-body">
					The storage "{$storage->getName()}" was not configured for Media. Some default values have automatically been added.
					To see those values, open the storage record "{$storage->getName()}" ({$storage->getUid()})
					and check under tab "Upload Settings" or "Default mount points".
				</div>
			</div>
EOF;

		return $result;
	}

	/**
	 * Check whether the storage is online or not.
	 *
	 * @return boolean
	 */
	protected function checkStorageOffline() {
		return !$this->getStorageService()->findCurrentStorage()->isOnline();
	}

	/**
	 * Format a message whenever the storage is offline.
	 *
	 * @return string
	 */
	protected function formatMessageForStorageOffline() {

		$storage = $this->getStorageService()->findCurrentStorage();

		$result = <<< EOF
			<div class="typo3-message message-warning">
					<div class="message-header">
						Storage is currently offline
				</div>
					<div class="message-body">
						The storage "{$storage->getName()}" looks currently to be off-line. Contact an administrator if you think this is an error.
					</div>
				</div>
			</div>
EOF;

		return $result;
	}

	/**
	 * Check whether mount points privilege are ok.
	 *
	 * @return boolean
	 */
	protected function checkMountPoints() {
		if (! $this->getBackendUser()->isAdmin()) {

			$fileMounts = $this->getBackendUser()->getFileMountRecords();

			$fileMountIdentifiers = array();
			foreach ($fileMounts as $fileMount) {
				$fileMountIdentifiers[] = $fileMount['uid'];
			}

			$storage = $this->getStorageService()->findCurrentStorage();
			$storageRecord = $storage->getStorageRecord();
			$fieldNames = array(
				'mount_point_file_type_1',
				'mount_point_file_type_2',
				'mount_point_file_type_3',
				'mount_point_file_type_4',
				'mount_point_file_type_5',
			);
			foreach ($fieldNames as $fileName) {
				$fileMountIdentifier = (int) $storageRecord[$fileName];
				if ($fileMountIdentifier > 0 && ! in_array($fileMountIdentifier, $fileMountIdentifiers)) {
					$this->notAllowedMountPoints[] = $this->fetchMountPoint($fileMountIdentifier);
				} else {
					# $fileMountIdentifier
					$folder = $storage->getRootLevelFolder();
				}
			}
		}
		return empty($this->notAllowedMountPoints);
	}

	/**
	 * Return a mount point according to an file mount identifier.
	 *
	 * @param string $identifier
	 * @return array
	 */
	protected function fetchMountPoint($identifier) {
		return $this->getDatabaseConnection()->exec_SELECTgetSingleRow('*', 'sys_filemounts', 'uid = ' . $identifier);
	}

	/**
	 * Format a message whenever mount points privilege are not OK.
	 *
	 * @return string
	 */
	protected function formatMessageForMountPoints() {

		$storage = $this->getStorageService()->findCurrentStorage();
		$backendUser = $this->getBackendUser();

		foreach ($this->notAllowedMountPoints as $notAllowedMountPoints) {
			$list = sprintf('<li>"%s" with path %s</li>',
				$notAllowedMountPoints['title'],
				$notAllowedMountPoints['path']
			);

		}

		$result = <<< EOF
			<div class="typo3-message message-warning">
					<div class="message-header">
						File mount are wrongly configured for user "{$backendUser->user['username']}".
				</div>
					<div class="message-body">
						User "{$backendUser->user['username']}" has no access to the following mount point configured in storage "{$storage->getName()}":
						<ul>
						{$list}
						</ul>
					</div>
				</div>
			</div>
EOF;

		return $result;
	}

	/**
	 * Check whether the column "total_of_references" has been already processed once.
	 *
	 * @return boolean
	 */
	protected function checkColumnNumberOfReferences() {
		$file = $this->getDatabaseConnection()->exec_SELECTgetSingleRow('uid', 'sys_file', 'number_of_references > 0');
		return !empty($file);
	}

	/**
	 * Format a message if columns "total_of_references" looks wrong.
	 *
	 * @return string
	 */
	protected function formatMessageForColumnNumberOfReferences() {

		$result = <<< EOF
			<div class="typo3-message message-warning">
				<div class="message-header">
						Column "number_of_references" requires to be initialized.
				</div>
				<div class="message-body">
					The column "number_of_references" in "sys_file" is used as a caching column for storing the total number of usage of a file.
					It is required for performance reason to search by "usage", example for retrieving all files with 0 usage.
					The column can be easily initialized <strong>by opening a tool in in the upper right button of this module</strong> or by a scheduler task.
					The number of usage is then updated by a Hook each time a record is edited which contains file references coming from "sys_file_reference" or from "sys_refindex" if soft
					reference.
				</div>
			</div>
EOF;

		return $result;
	}

	/**
	 * Returns an instance of the current Backend User.
	 *
	 * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected function getBackendUser() {
		return $GLOBALS['BE_USER'];
	}

	/**
	 * Return a pointer to the database.
	 *
	 * @return \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected function getDatabaseConnection() {
		return $GLOBALS['TYPO3_DB'];
	}

	/**
	 * @return \TYPO3\CMS\Media\Resource\StorageService
	 */
	protected function getStorageService() {
		return GeneralUtility::makeInstance('TYPO3\CMS\Media\Resource\StorageService');
	}
}
