<?php
namespace TYPO3\CMS\Media\FileUpload;

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

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Media\Exception\MissingFileException;

/**
 * An abstract class for uploaded file.
 */
abstract class UploadedFileAbstract implements UploadedFileInterface {

	/**
	 * @var string
	 */
	protected $uploadFolder;

	/**
	 * @var string
	 */
	protected $inputName;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * Get the file type.
	 *
	 * @return int
	 */
	public function getType() {
		$this->checkFileExistence();

		// this basically extracts the mimetype and guess the filetype based
		// on the first part of the mimetype works for 99% of all cases, and
		// we don't need to make an SQL statement like EXT:media does currently
		$mimeType = $this->getMimeType();
		list($fileType) = explode('/', $mimeType);
		switch (strtolower($fileType)) {
			case 'text':
				$type = File::FILETYPE_TEXT;
				break;
			case 'image':
				$type = File::FILETYPE_IMAGE;
				break;
			case 'audio':
				$type = File::FILETYPE_AUDIO;
				break;
			case 'video':
				$type = File::FILETYPE_VIDEO;
				break;
			case 'application':
			case 'software':
				$type = File::FILETYPE_APPLICATION;
				break;
			default:
				$type = File::FILETYPE_UNKNOWN;
		}
		return $type;
	}

	/**
	 * Get the file with its absolute path.
	 *
	 * @return string
	 */
	public function getFileWithAbsolutePath() {
		$fileIdentifier = GeneralUtility::_POST('qquuid');
		if (!empty($fileIdentifier)) {
			$fileIdentifier .= '-';
		}
		return $this->uploadFolder . DIRECTORY_SEPARATOR . $fileIdentifier . $this->name;
	}

	/**
	 * Get the file's public URL.
	 *
	 * @return string
	 */
	public function getPublicUrl() {
		$fileNameAndPath = str_replace(PATH_site, '', $this->getFileWithAbsolutePath());
		return '/' . ltrim($fileNameAndPath, '/');
	}

	/**
	 * @return string
	 */
	public function getInputName() {
		return $this->inputName;
	}

	/**
	 * @param string $inputName
	 * @return UploadedFileInterface
	 */
	public function setInputName($inputName) {
		$this->inputName = $inputName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUploadFolder() {
		return $this->uploadFolder;
	}

	/**
	 * @param string $uploadFolder
	 * @return UploadedFileInterface
	 */
	public function setUploadFolder($uploadFolder) {
		$this->uploadFolder = $uploadFolder;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return UploadedFileInterface
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * Check whether the file exists.
	 */
	protected function checkFileExistence() {
		if (!is_file($this->getFileWithAbsolutePath())) {
			$message = sprintf('File not found at "%s". Did you save it?', $this->getFileWithAbsolutePath());
			throw new MissingFileException($message, 1361786958);
		}
	}

}
