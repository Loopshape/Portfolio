<?php
namespace TYPO3\CMS\Rtehtmlarea\Extension;

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
use TYPO3\CMS\Rtehtmlarea\RteHtmlAreaApi;
use TYPO3\CMS\Rtehtmlarea\RteHtmlAreaBase;

/**
 * Copy Paste plugin for htmlArea RTE
 *
 * @author Stanislas Rolland <typo3(arobas)sjbr.ca>
 */
class CopyPaste extends RteHtmlAreaApi {

	/**
	 * The name of the plugin registered by the extension
	 *
	 * @var string
	 */
	protected $pluginName = 'CopyPaste';

	/**
	 * Path to the skin file relative to the extension directory
	 *
	 * @var string
	 */
	protected $relativePathToSkin = 'Resources/Public/Css/Skin/Plugins/copy-paste.css';

	/**
	 * The comma-separated list of button names that the registered plugin is adding to the htmlArea RTE toolbar
	 *
	 * @var string
	 */
	protected $pluginButtons = 'copy, cut, paste';

	/**
	 * The name-converting array, converting the button names used in the RTE PageTSConfing to the button id's used by the JS scripts
	 *
	 * @var array
	 */
	protected $convertToolbarForHtmlAreaArray = array(
		'copy' => 'Copy',
		'cut' => 'Cut',
		'paste' => 'Paste'
	);

	/**
	 * Hide buttons not implemented in client browsers
	 *
	 * @var array
	 */
	protected $hideButtonsFromClient = array(
		'gecko' => array('copy', 'cut', 'paste'),
		'webkit' => array('copy', 'cut', 'paste'),
		'opera' => array('copy', 'cut', 'paste')
	);

	/**
	 * Returns TRUE if the plugin is available and correctly initialized
	 *
	 * @param RteHtmlAreaBase $parentObject parent object
	 * @return bool TRUE if this plugin object should be made available in the current environment and is correctly initialized
	 */
	public function main($parentObject) {
		$enabled = parent::main($parentObject);
		// Hiding some buttons
		if ($enabled && is_array($this->hideButtonsFromClient[$this->htmlAreaRTE->client['browser']])) {
			$this->pluginButtons = implode(',', array_diff(GeneralUtility::trimExplode(',', $this->pluginButtons, TRUE), $this->hideButtonsFromClient[$this->htmlAreaRTE->client['browser']]));
		}
		// Force enabling the plugin even if no button remains in the tool bar, so that hot keys still are enabled
		$this->pluginAddsButtons = FALSE;
		return $enabled;
	}

	/**
	 * Return an updated array of toolbar enabled buttons
	 *
	 * @param array $show: array of toolbar elements that will be enabled, unless modified here
	 * @return array toolbar button array, possibly updated
	 */
	public function applyToolbarConstraints($show) {
		// Remove some buttons
		if (is_array($this->hideButtonsFromClient[$this->htmlAreaRTE->client['browser']])) {
			return array_diff($show, $this->hideButtonsFromClient[$this->htmlAreaRTE->client['browser']]);
		} else {
			return $show;
		}
	}

}
