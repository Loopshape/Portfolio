<?php
namespace TYPO3\CMS\Media\Utility;

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

/**
 * A class to handle validation on the client side
 */
class ImagePresetUtility implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @var array
	 */
	protected $store = array();

	/**
	 * @var string
	 */
	protected $currentPreset = '';

	/**
	 * Returns a class instance
	 *
	 * @return \TYPO3\CMS\Media\Utility\ImagePresetUtility
	 */
	static public function getInstance() {
		return GeneralUtility::makeInstance('TYPO3\CMS\Media\Utility\ImagePresetUtility');
	}

	/**
	 * Set the current preset value. Preset values come from the settings and can be:
	 * image_thumbnail, image_mini, image_small, image_medium, image_large
	 *
	 * @throws \TYPO3\CMS\Media\Exception\EmptyValueException
	 * @param string $preset image_thumbnail, image_mini, ...
	 * @return \TYPO3\CMS\Media\Utility\ImagePresetUtility
	 */
	public function preset($preset){
		$size = ConfigurationUtility::getInstance()->get($preset);
		if (is_null($size)) {
			throw new \TYPO3\CMS\Media\Exception\EmptyValueException('No value for preset: ' . $preset, 1362501066);
		}

		$this->currentPreset = $preset;
		if (!isset($this->store[$this->currentPreset])) {
			// @todo use object Dimension instead
			$dimensions = GeneralUtility::trimExplode('x', $size);
			$this->store[$this->currentPreset]['width'] = empty($dimensions[0]) ? 0 : $dimensions[0];
			$this->store[$this->currentPreset]['height'] = empty($dimensions[1]) ? 0 : $dimensions[1];
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getStore() {
		return $this->store;
	}

	/**
	 * @param array $store
	 */
	public function setStore($store) {
		$this->store = $store;
	}

	/**
	 * Returns width of the current preset.
	 *
	 * @throws \TYPO3\CMS\Media\Exception\InvalidKeyInArrayException
	 * @return int
	 */
	public function getWidth(){
		if (empty($this->store[$this->currentPreset])) {
			throw new \TYPO3\CMS\Media\Exception\InvalidKeyInArrayException('No existing values for current preset. Have you set a preset?', 1362501853);
		}
		return (int) $this->store[$this->currentPreset]['width'];
	}

	/**
	 * Returns height of the current preset.
	 *
	 * @throws \TYPO3\CMS\Media\Exception\InvalidKeyInArrayException
	 * @return int
	 */
	public function getHeight() {
		if (empty($this->store[$this->currentPreset])) {
			throw new \TYPO3\CMS\Media\Exception\InvalidKeyInArrayException('No existing values for current preset. Have you set a preset?', 1362501853);
		}
		return (int) $this->store[$this->currentPreset]['height'];
	}
}
