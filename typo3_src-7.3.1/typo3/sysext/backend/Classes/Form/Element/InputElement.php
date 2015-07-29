<?php
namespace TYPO3\CMS\Backend\Form\Element;

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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Backend\Form\NodeFactory;

/**
 * Generation of TCEform elements of the type "input"
 */
class InputElement extends AbstractFormElement {

	/**
	 * This will render a single-line input form field, possibly with various control/validation features
	 *
	 * @return array As defined in initializeResultArray() of AbstractNode
	 */
	public function render() {
		$languageService = $this->getLanguageService();

		$table = $this->globalOptions['table'];
		$fieldName = $this->globalOptions['fieldName'];
		$row = $this->globalOptions['databaseRow'];
		$parameterArray = $this->globalOptions['parameterArray'];
		$resultArray = $this->initializeResultArray();
		$isDateField = FALSE;

		$config = $parameterArray['fieldConf']['config'];
		$specConf = BackendUtility::getSpecConfParts($parameterArray['fieldConf']['defaultExtras']);
		$size = MathUtility::forceIntegerInRange($config['size'] ?: $this->defaultInputWidth, $this->minimumInputWidth, $this->maxInputWidth);
		$evalList = GeneralUtility::trimExplode(',', $config['eval'], TRUE);
		$classes = array();
		$attributes = array();

		if (!isset($config['checkbox'])) {
			$config['checkbox'] = '0';
			$checkboxIsset = FALSE;
		} else {
			$checkboxIsset = TRUE;
		}

		// set all date times available
		$dateFormats = array(
			'date' => '%d-%m-%Y',
			'year' => '%Y',
			'time' => '%H:%M',
			'timesec' => '%H:%M:%S'
		);
		if ($GLOBALS['TYPO3_CONF_VARS']['SYS']['USdateFormat']) {
			$dateFormats['date'] = '%m-%d-%Y';
		}
		$dateFormats['datetime'] = $dateFormats['time'] . ' ' . $dateFormats['date'];
		$dateFormats['datetimesec'] = $dateFormats['timesec'] . ' ' . $dateFormats['date'];

		// readonly
		if ($this->isGlobalReadonly() || $config['readOnly']) {
			$itemFormElValue = $parameterArray['itemFormElValue'];
			if (in_array('date', $evalList)) {
				$config['format'] = 'date';
			} elseif (in_array('datetime', $evalList)) {
				$config['format'] = 'datetime';
			} elseif (in_array('time', $evalList)) {
				$config['format'] = 'time';
			}
			if (in_array('password', $evalList)) {
				$itemFormElValue = $itemFormElValue ? '*********' : '';
			}
			$options = $this->globalOptions;
			$options['parameterArray'] = array(
				'fieldConf' => array(
					'config' => $config,
				),
				'itemFormElValue' => $itemFormElValue,
			);
			$options['renderType'] = 'none';
			/** @var NodeFactory $nodeFactory */
			$nodeFactory = $this->globalOptions['nodeFactory'];
			return $nodeFactory->create($options)->render();
		}

		if (in_array('datetime', $evalList, TRUE)
			|| in_array('date', $evalList)) {

			$classes[] = 't3js-datetimepicker';
			$isDateField = TRUE;
			if (in_array('datetime', $evalList)) {
				$attributes['data-date-type'] = 'datetime';
				$dateFormat = $dateFormats['datetime'];
			} elseif (in_array('date', $evalList)) {
				$attributes['data-date-type'] = 'date';
				$dateFormat = $dateFormats['date'];
			}
			if ($parameterArray['itemFormElValue'] > 0) {
				$parameterArray['itemFormElValue'] += date('Z', $parameterArray['itemFormElValue']);
			}
			if (isset($config['range']['lower'])) {
				$attributes['data-date-minDate'] = (int)$config['range']['lower'];
			}
			if (isset($config['range']['upper'])) {
				$attributes['data-date-maxDate'] = (int)$config['range']['upper'];
			}
		} elseif (in_array('time', $evalList)) {
			$dateFormat = $dateFormats['time'];
			$isDateField = TRUE;
			$classes[] = 't3js-datetimepicker';
			$attributes['data-date-type'] = 'time';
		} elseif (in_array('timesec', $evalList)) {
			$dateFormat = $dateFormats['timesec'];
			$isDateField = TRUE;
			$classes[] = 't3js-datetimepicker';
			$attributes['data-date-type'] = 'timesec';
		} else {
			if ($checkboxIsset === FALSE) {
				$config['checkbox'] = '';
			}
		}

		foreach ($evalList as $func) {
			switch ($func) {
				case 'required':
					$resultArray['requiredFields'][$table . '_' . $row['uid'] . '_' . $fieldName] = $parameterArray['itemFormElName'];
					$tabAndInlineStack = $this->globalOptions['tabAndInlineStack'];
					if (!empty($tabAndInlineStack) && preg_match('/^(.+\\])\\[(\\w+)\\]$/', $parameterArray['itemFormElName'], $match)) {
						array_shift($match);
						$resultArray['requiredNested'][$parameterArray['itemFormElName']] = array(
							'parts' => $match,
							'level' => $tabAndInlineStack,
						);
					}
					// Mark this field for date/time disposal:
					if (array_intersect($evalList, array('date', 'datetime', 'time', 'timesec'))) {
						$resultArray['requiredAdditional'][$parameterArray['itemFormElName']] = array(
							'isPositiveNumber' => TRUE,
						);
					}
					break;
				default:
					// Pair hook to the one in \TYPO3\CMS\Core\DataHandling\DataHandler::checkValue_input_Eval()
					$evalObj = GeneralUtility::getUserObj($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][$func] . ':&' . $func);
					if (is_object($evalObj) && method_exists($evalObj, 'deevaluateFieldValue')) {
						$_params = array(
							'value' => $parameterArray['itemFormElValue']
						);
						$parameterArray['itemFormElValue'] = $evalObj->deevaluateFieldValue($_params);
					}
			}
		}
		$paramsList = GeneralUtility::quoteJSvalue($parameterArray['itemFormElName']) . ',' . GeneralUtility::quoteJSvalue(implode(',', $evalList)) . ',' . GeneralUtility::quoteJSvalue(trim($config['is_in'])) . ',' . ($config['checkbox'] ? 1 : 0) . ',' . GeneralUtility::quoteJSvalue($config['checkbox']);
		$parameterArray['fieldChangeFunc'] = array_merge(array('typo3form.fieldGet' => 'typo3form.fieldGet(' . $paramsList . ');'), $parameterArray['fieldChangeFunc']);

		// set classes
		$classes[] = 'form-control';
		$classes[] = 't3js-clearable';
		$classes[] = 'hasDefaultValue';

		// calculate attributes
		$attributes['id'] = str_replace('.', '', uniqid('formengine-input-', TRUE));
		$attributes['name'] = $parameterArray['itemFormElName'] . '_hr';
		$attributes['value'] = '';
		$attributes['maxlength'] = $config['max'] ?: 256;
		$attributes['onchange'] = implode('', $parameterArray['fieldChangeFunc']);

		if (!empty($styles)) {
			$attributes['style'] = implode(' ', $styles);
		}
		if (!empty($classes)) {
			$attributes['class'] = implode(' ', $classes);
		}
		if (isset($config['max']) && (int)$config['max'] > 0) {
			$attributes['maxlength'] = (int)$config['max'];
		}

		// Build the attribute string
		$attributeString = '';
		foreach ($attributes as $attributeName => $attributeValue) {
			$attributeString .= ' ' . $attributeName . '="' . htmlspecialchars($attributeValue) . '"';
		}

		// This is the EDITABLE form field.
		$placeholderValue = $this->getPlaceholderValue($table, $config, $row);
		$placeholderAttribute = '';
		if (!empty($placeholderValue)) {
			$placeholderAttribute = ' placeholder="' . htmlspecialchars(trim($languageService->sL($placeholderValue))) . '" ';
		}

		$html = '
			<input type="text"'
				. $attributeString
				. $placeholderAttribute
				. $parameterArray['onFocus'] . ' />';

		// This is the ACTUAL form field - values from the EDITABLE field must be transferred to this field which is the one that is written to the database.
		$html .= '<input type="hidden" name="' . $parameterArray['itemFormElName'] . '" value="' . htmlspecialchars($parameterArray['itemFormElValue']) . '" />';

		$resultArray['extJSCODE'] = 'typo3form.fieldSet(' . $paramsList . ');';
		// Going through all custom evaluations configured for this field
		foreach ($evalList as $evalData) {
			$evalObj = GeneralUtility::getUserObj($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][$evalData] . ':&' . $evalData);
			if (is_object($evalObj) && method_exists($evalObj, 'returnFieldJS')) {
				$resultArray['extJSCODE'] .= LF . 'TBE_EDITOR.customEvalFunctions[' . GeneralUtility::quoteJSvalue($evalData) . '] = function(value) {' . $evalObj->returnFieldJS() . '}';
			}
		}

		// add HTML wrapper
		if ($isDateField) {
			$html = '
				<div class="input-group">
					' . $html . '
					<span class="input-group-btn">
						<label class="btn btn-default" for="' . $attributes['id'] . '">
							' . IconUtility::getSpriteIcon('actions-edit-pick-date') . '
						</label>
					</span>
				</div>';
		}

		// Creating an alternative item without the JavaScript handlers.
		$altItem = '
			<input type="hidden" name="' . htmlspecialchars($parameterArray['itemFormElName']) . '_hr" value="" />
			<input type="hidden" name="' . htmlspecialchars($parameterArray['itemFormElName']) . '" value="' . htmlspecialchars($parameterArray['itemFormElValue']) . '" />';

		// Wrap a wizard around the item?
		$html = $this->renderWizards(
			array($html, $altItem),
			$config['wizards'],
			$table,
			$row,
			$fieldName,
			$parameterArray,
			$parameterArray['itemFormElName'] . '_hr', $specConf
		);

		// Add a wrapper to remain maximum width
		$width = (int)$this->formMaxWidth($size);
		$html = '<div class="form-control-wrap"' . ($width ? ' style="max-width: ' . $width . 'px"' : '') . '>' . $html . '</div>';
		$resultArray['html'] = $html;
		return $resultArray;
	}

}
