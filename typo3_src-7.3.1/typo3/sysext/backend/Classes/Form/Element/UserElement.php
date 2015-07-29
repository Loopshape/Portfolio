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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Form\FormEngine;

/**
 * Generation of TCEform elements of the type "user"
 */
class UserElement extends AbstractFormElement {

	/**
	 * User defined field type
	 *
	 * @return array As defined in initializeResultArray() of AbstractNode
	 */
	public function render() {
		$parameterArray = $this->globalOptions['parameterArray'];
		$parameterArray['table'] = $this->globalOptions['table'];
		$parameterArray['field'] = $this->globalOptions['fieldName'];
		$parameterArray['row'] = $this->globalOptions['databaseRow'];
		$parameterArray['parameters'] = isset($parameterArray['fieldConf']['config']['parameters'])
			? $parameterArray['fieldConf']['config']['parameters']
			: array();
		// Instance of FormEngine is kept here for backwards compatibility - but it is a dummy only
		$dummyFormEngine = new FormEngine;
		$parameterArray['pObj'] = $dummyFormEngine;
		$resultArray = $this->initializeResultArray();
		$resultArray['html'] = GeneralUtility::callUserFunction(
			$parameterArray['fieldConf']['config']['userFunc'],
			$parameterArray,
			$dummyFormEngine
		);
		return $resultArray;
	}

}
