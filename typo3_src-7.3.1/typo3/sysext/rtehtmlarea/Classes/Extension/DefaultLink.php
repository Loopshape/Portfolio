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
use TYPO3\CMS\Rtehtmlarea\RteHtmlAreaApi;

/**
 * Default Link extension for htmlArea RTE
 *
 * @author Stanislas Rolland <typo3(arobas)sjbr.ca>
 */
class DefaultLink extends RteHtmlAreaApi {

	/**
	 * The name of the plugin registered by the extension
	 *
	 * @var string
	 */
	protected $pluginName = 'DefaultLink';

	/**
	 * Path to the skin file relative to the extension directory
	 *
	 * @var string
	 */
	protected $relativePathToSkin = 'Resources/Public/Css/Skin/Plugins/default-link.css';

	/**
	 * The comma-separated list of button names that the registered plugin is adding to the htmlArea RTE toolbar
	 *
	 * @var string
	 */
	protected $pluginButtons = 'link, unlink';

	/**
	 * The name-converting array, converting the button names used in the RTE PageTSConfing to the button id's used by the JS scripts
	 *
	 * @var array
	 */
	protected $convertToolbarForHtmlAreaArray = array(
		'link' => 'CreateLink',
		'unlink' => 'UnLink'
	);

	/**
	 * Return JS configuration of the htmlArea plugins registered by the extension
	 *
	 * @param string $rteNumberPlaceholder A dummy string for JS arrays
	 * @return string JS configuration for registered plugins
	 */
	public function buildJavascriptConfiguration($rteNumberPlaceholder) {
		$registerRTEinJavascriptString = '';
		$button = 'link';
		if (in_array($button, $this->toolbar) && $this->htmlAreaRTE->is_FE()) {
			if (!is_array($this->thisConfig['buttons.']) || !is_array($this->thisConfig['buttons.'][($button . '.')])) {
				$registerRTEinJavascriptString .= '
			RTEarea[' . $rteNumberPlaceholder . ']["buttons"]["' . $button . '"] = new Object();';
			}
			$registerRTEinJavascriptString .= '
			RTEarea[' . $rteNumberPlaceholder . '].buttons.' . $button . '.stripBaseUrl = true;';
		}
		return $registerRTEinJavascriptString;
	}

}
