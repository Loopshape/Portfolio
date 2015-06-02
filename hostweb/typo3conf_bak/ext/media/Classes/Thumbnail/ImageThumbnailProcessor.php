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

use TYPO3\CMS\Core\Resource\ProcessedFile;

/**
 * Image Thumbnail Processor.
 */
class ImageThumbnailProcessor extends AbstractThumbnailProcessor {

	/**
	 * @var array
	 */
	protected $defaultConfigurationWrap = array(
		'width' => 0,
		'height' => 0,
	);

	/**
	 * Render a thumbnail of a resource of type image.
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

		// Makes sure the width and the height of the thumbnail is not bigger than the actual file
		$configuration = $this->getConfiguration();
		if (!empty($configuration['width']) && $configuration['width'] > $this->getFile()->getProperty('width')) {
			$configuration['width'] = $this->getFile()->getProperty('width');
		}
		if (!empty($configuration['height']) && $configuration['height'] > $this->getFile()->getProperty('height')) {
			$configuration['height'] = $this->getFile()->getProperty('height');
		}

		$configuration = $this->computeFinalImageDimension($configuration);
		$this->processedFile = $this->getFile()->process($this->getProcessingType(), $configuration);
		$result = $this->processedFile->getPublicUrl(TRUE);

		// Update time stamp of processed image at this stage. This is needed for the browser to get new version of the thumbnail.
		if ($this->processedFile->getProperty('originalfilesha1') != $this->getFile()->getProperty('sha1')) {
			$this->processedFile->updateProperties(array('tstamp' => $this->getFile()->getProperty('tstamp')));
		}

		return $result;
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
			$this->thumbnailService->getAppendTimeStamp() ? $parameterSeparator . $this->processedFile->getProperty('tstamp') : '',
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

		// Perhaps the wrapping file must be processed
		$configurationWrap = $this->thumbnailService->getConfigurationWrap();

		// Make sure we have configurationWrap initialized correctly
		if (!empty($configurationWrap['width']) || !empty($configurationWrap['height'])) {
			$configurationWrap = array_merge($this->defaultConfigurationWrap, $configurationWrap);

			// It looks maxW or maxH does not work as expected with CONTEXT_IMAGEPREVIEW...
			// ... uses "width" and "height" instead.
			if ($configurationWrap['width'] < $this->getFile()->getProperty('width')
				|| $configurationWrap['height'] < $this->getFile()->getProperty('height')
			) {
				$configurationWrap = $this->computeFinalImageDimension($configurationWrap);
				$file = $this->getFile()->process($this->getProcessingType(), $configurationWrap);
			}
		}

		// Analyse the current $url and compute the adequate separator between arguments.
		$url = $this->thumbnailService->getAnchorUri() ? $this->thumbnailService->getAnchorUri() : $file->getPublicUrl(TRUE);
		$parameterSeparator = strpos($url, '?') === false ? '?' : '&';

		return sprintf('<a href="%s%s" target="%s" data-uid="%s">%s</a>',
			$url,
			$this->thumbnailService->getAppendTimeStamp() && !$this->thumbnailService->getAnchorUri() ? $parameterSeparator . $file->getProperty('tstamp') : '',
			$this->thumbnailService->getTarget(),
			$file->getUid(),
			$result
		);
	}

	/**
	 * Compute the final configuration for the image preview.
	 * Keep ratio of width / height for the image.
	 *
	 * @param array $configuration
	 * @return array
	 */
	protected function computeFinalImageDimension(array $configuration) {
		$ratio = $this->computeImageRatio();

		if ($ratio > 1) {
			$configuration['height'] = round($configuration['width'] / $ratio);
		} else {
			$configuration['width'] = round($configuration['height'] * $ratio);
		}
		return $configuration;
	}

	/**
	 * Compute the width / height ratio of the image.
	 *
	 * @return NULL|float
	 */
	protected function computeImageRatio() {
		$ratio = NULL;
		if ($this->getFile()->getProperty('width') > 0 && $this->getFile()->getProperty('height') > 0) {
			$ratio = $this->getFile()->getProperty('width') / $this->getFile()->getProperty('height');
		}
		return $ratio;
	}

	/**
	 * @return string
	 */
	public function getProcessingType() {
		if ($this->thumbnailService->getProcessingType() === NULL) {
			return ProcessedFile::CONTEXT_IMAGECROPSCALEMASK;
		}
		return $this->thumbnailService->getProcessingType();
	}
}
