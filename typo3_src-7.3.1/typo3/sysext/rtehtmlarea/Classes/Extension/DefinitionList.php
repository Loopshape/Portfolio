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
use TYPO3\CMS\Rtehtmlarea\RteHtmlAreaBase;

/**
 * Definition List plugin for htmlArea RTE
 *
 * @author Stanislas Rolland <typo3(arobas)sjbr.ca>
 */
class DefinitionList extends RteHtmlAreaApi {

	/**
	 * The name of the plugin registered by the extension
	 *
	 * @var string
	 */
	protected $pluginName = 'DefinitionList';

	/**
	 * Path to the skin file relative to the extension directory
	 *
	 * @var string
	 */
	protected $relativePathToSkin = 'Resources/Public/Css/Skin/Plugins/definition-list.css';

	/**
	 * The comma-separated list of button names that the registered plugin is adding to the htmlArea RTE toolbar
	 *
	 * @var string
	 */
	protected $pluginButtons = 'definitionlist, definitionitem';

	/**
	 * The name-converting array, converting the button names used in the RTE PageTSConfing to the button id's used by the JS scripts
	 *
	 * @var array
	 */
	protected $convertToolbarForHtmlAreaArray = array(
		'definitionlist' => 'DefinitionList',
		'definitionitem' => 'DefinitionItem'
	);

	/**
	 * The comma-separated list of names of prerequisite plugins
	 *
	 * @var string
	 */
	protected $requiredPlugins = 'BlockElements';

	/**
	 * Returns TRUE if the plugin is available and correctly initialized
	 *
	 * @param RteHtmlAreaBase $parentObject parent object
	 * @return bool TRUE if this plugin object should be made available in the current environment and is correctly initialized
	 */
	public function main($parentObject) {
		$enabled = parent::main($parentObject) && $this->htmlAreaRTE->isPluginEnabled('BlockElements');
		if ($enabled && is_object($this->htmlAreaRTE->registeredPlugins['BlockElements'])) {
			$this->htmlAreaRTE->registeredPlugins['BlockElements']->setSynchronousLoad();
		}
		return $enabled;
	}

	/**
	 * Return JS configuration of the htmlArea plugins registered by the extension
	 *
	 * @param string $rteNumberPlaceholder A dummy string for JS arrays
	 * @return string JS configuration for registered plugins
	 */
	public function buildJavascriptConfiguration($rteNumberPlaceholder) {
		return '';
	}

	/**
	 * Return an updated array of toolbar enabled buttons
	 *
	 * @param array $show: array of toolbar elements that will be enabled, unless modified here
	 * @return array toolbar button array, possibly updated
	 */
	public function applyToolbarConstraints($show) {
		$blockElementsButtons = 'formatblock, indent, outdent, blockquote, insertparagraphbefore, insertparagraphafter, left, center, right, justifyfull, orderedlist, unorderedlist';
		$notRemoved = array_intersect(\TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $blockElementsButtons, TRUE), $show);
		// DefinitionList plugin requires BlockElements plugin
		// We will not allow any definition lists operations if all block elements buttons were disabled
		if (empty($notRemoved)) {
			return array_diff($show, \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->pluginButtons));
		} else {
			return $show;
		}
	}

}
