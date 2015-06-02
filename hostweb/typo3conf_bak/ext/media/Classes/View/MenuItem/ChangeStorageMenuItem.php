<?php
namespace TYPO3\CMS\Media\View\MenuItem;

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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Media\Module\ModuleParameter;
use TYPO3\CMS\Vidi\View\AbstractComponentView;

/**
 * View which renders a "move" menu item to be placed in the "change storage" menu.
 */
class ChangeStorageMenuItem extends AbstractComponentView {

	/**
	 * Renders a "move" menu item to be placed in the grid menu for Media.
	 *
	 * @return string
	 */
	public function render() {
		return sprintf('<li><a href="%s" class="change-storage" >%s %s</a>',
			$this->getChangeStorageUri(),
			IconUtility::getSpriteIcon('extensions-media-storage-change'),
			LocalizationUtility::translate('change_storage', 'media')
		);
	}

	/**
	 * @return string
	 */
	protected function getChangeStorageUri() {
		$urlParameters = array(
			ModuleParameter::PREFIX => array(
				'controller' => 'Asset',
				'action' => 'editStorage',
			),
		);

		return BackendUtility::getModuleUrl(ModuleParameter::MODULE_SIGNATURE, $urlParameters);
	}

}
