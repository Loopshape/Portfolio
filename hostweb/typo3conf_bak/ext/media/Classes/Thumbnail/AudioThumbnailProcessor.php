<?php
namespace TYPO3\CMS\Media\Thumbnail;

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

use TYPO3\CMS\Media\Utility\Path;

/**
 */
class AudioThumbnailProcessor extends AbstractThumbnailProcessor {

	/**
	 * Render a thumbnail of a resource of type audio.
	 *
	 * @return string
	 */
	public function create() {
		$steps = $this->getRenderingSteps();

		$result = '';
		while ($step = array_shift($steps)) {
			$result = $this->$step($result);
		}

		return $result;
	}

	/**
	 * Render the URI of the thumbnail.
	 *
	 * @return string
	 */
	public function renderUri() {

		$relativePath = sprintf('Icons/MimeType/%s.png', $this->getFile()->getProperty('extension'));
		$fileNameAndPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:media/Resources/Public/' . $relativePath);
		if (!file_exists($fileNameAndPath)) {
			$relativePath = 'Icons/UnknownMimeType.png';
		}

		return Path::getRelativePath($relativePath);
	}

	/**
	 * Render the tag image which is the main one for a thumbnail.
	 *
	 * @param string $result
	 * @return string
	 */
	public function renderTagImage($result) {

		// Variable $result corresponds to an URL in this case.
		// Analyse the URL and compute the adequate separator between arguments.
		$parameterSeparator = strpos($result, '?') === FALSE ? '?' : '&';

		return sprintf('<img src="%s%s" title="%s" alt="%s" %s/>',
			$result,
			$this->thumbnailService->getAppendTimeStamp() ? $parameterSeparator . $this->getFile()->getProperty('tstamp') : '',
			$this->getTitle(),
			$this->getTitle(),
			$this->renderAttributes()
		);
	}

	/**
	 * Compute and return the title of the file.
	 *
	 * @return string
	 */
	protected function getTitle() {
		$result = $this->getFile()->getProperty('title');
		if (empty($result)) {
			$result = $this->getFile()->getName();
		}
		return htmlspecialchars($result);
	}

	/**
	 * Render a wrapping anchor around the thumbnail.
	 *
	 * @param string $result
	 * @return string
	 */
	public function renderTagAnchor($result) {

		$file = $this->getFile();

		return sprintf('<a href="%s%s" target="%s">%s</a>',
			$this->thumbnailService->getAnchorUri() ? $this->thumbnailService->getAnchorUri() : $file->getPublicUrl(TRUE),
			$this->thumbnailService->getAppendTimeStamp() ? '?' . $file->getProperty('tstamp') : '',
			$this->thumbnailService->getTarget(),
			$result
		);
	}
}
