<?php
namespace TYPO3\CMS\Backend\Form\Wizard;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Wizard for rendering an AJAX selector for records
 *
 * @author Steffen Kamper <steffen@typo3.org>
 */
class ValueSliderWizard {

	/**
	 * Renders the slider value wizard
	 *
	 * @param array $params
	 * @return string
	 */
	public function renderWizard($params) {
		$field = $params['field'];
		$value = $params['row'][$field];
		// If Slider is used in a flexform
		if (!empty($params['flexFormPath'])) {
			$flexFormTools = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools::class);
			$flexFormValue = $flexFormTools->getArrayValueByPath($params['flexFormPath'], GeneralUtility::xml2array($value));
			if ($flexFormValue !== NULL) {
				$value = $flexFormValue;
			}
		}
		$itemName = $params['itemName'];
		// Set default values (which correspond to those of the JS component)
		$min = 0;
		$max = 10000;
		// Use the range property, if defined, to set min and max values
		if (isset($params['fieldConfig']['range'])) {
			$min = isset($params['fieldConfig']['range']['lower']) ? (int)$params['fieldConfig']['range']['lower'] : 0;
			$max = isset($params['fieldConfig']['range']['upper']) ? (int)$params['fieldConfig']['range']['upper'] : 10000;
		}
		$elementType = $params['fieldConfig']['type'];
		$step = $params['wConf']['step'] ?: 1;
		$width = (int)$params['wConf']['width'] ?: 400;
		$type = 'null';
		if (isset($params['fieldConfig']['eval'])) {
			$eval = GeneralUtility::trimExplode(',', $params['fieldConfig']['eval'], TRUE);
			if (in_array('int', $eval, TRUE)) {
				$type = 'int';
				$value = (int)$value;
			} elseif (in_array('double2', $eval, TRUE)) {
				$type = 'double';
				$value = (double)$value;
			}
		}
		if (isset($params['fieldConfig']['items'])) {
			$type = 'array';
			$index = 0;
			$itemAmount = count($params['fieldConfig']['items']);
			for (; $index < $itemAmount; ++$index) {
				$item = $params['fieldConfig']['items'][$index];
				if ((string)$item[1] === $value) {
					break;
				}
			}
			$min = 0;
			$max = $itemAmount -1;
			$step = 1;
			$value = $index;
		}
		$callback = $params['fieldChangeFunc']['TBE_EDITOR_fieldChanged'];
		$getField = $params['fieldChangeFunc']['typo3form.fieldGet'];
		$id = 'slider-' . $params['md5ID'];
		$content =
			'<div'
				. ' id="' . $id . '"'
				. ' data-slider-id="' . $id . '"'
				. ' data-slider-min="' . $min . '"'
				. ' data-slider-max="' . $max . '"'
				. ' data-slider-step="' . htmlspecialchars($step) . '"'
				. ' data-slider-value="' . htmlspecialchars($value) . '"'
				. ' data-slider-value-type="' . htmlspecialchars($type) . '"'
				. ' data-slider-item-name="' . htmlspecialchars($itemName) . '"'
				. ' data-slider-element-type="' . htmlspecialchars($elementType) . '"'
				. ' data-slider-field="' . htmlspecialchars($getField) . '"'
				. ' data-slider-callback="' . htmlspecialchars($callback) . '"'
				. ' style="width: ' . $width . 'px;"'
			. '></div>';

		return $content;
	}

}
