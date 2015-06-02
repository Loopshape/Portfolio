<?php
/**
 * Static file cache info module
 *
 * @package SFC\NcStaticfilecache\Module
 * @author  Tim Lochmüller
 */

namespace SFC\NcStaticfilecache\Module;

use SFC\NcStaticfilecache\Configuration;
use SFC\NcStaticfilecache\StaticFileCache;
use SFC\NcStaticfilecache\Utility\CacheUtility;
use TYPO3\CMS\Backend\Module\AbstractFunctionModule;
use TYPO3\CMS\Backend\Tree\View\BrowseTreeView;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Static file cache info module
 *
 * @author Tim Lochmüller
 * @author Michiel Roos
 */
class CacheModule extends AbstractFunctionModule {

	/**
	 * Page ID
	 *
	 * @var integer
	 */
	protected $pageId = 0;

	/**
	 * MAIN function for static publishing information
	 *
	 * @return    string        Output HTML for the module.
	 */
	public function main() {
		// Handle actions:
		$this->handleActions();

		$this->pageId = intval($this->pObj->id);

		// Initialize tree object:
		/* @var $tree BrowseTreeView */
		$tree = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Tree\\View\\BrowseTreeView');
		$tree->makeHTML = 2;
		$tree->init();

		// Set starting page Id of tree (overrides webmounts):
		if ($this->pageId > 0) {
			$tree->MOUNTS = array(0 => $this->pageId);
		}

		$tree->ext_IconMode = TRUE;
		$tree->showDefaultTitleAttribute = TRUE;
		$tree->thisScript = BackendUtility::getModuleUrl(GeneralUtility::_GP('M'));
		$tree->setTreeName('staticfilecache');

		// Creating top icon; the current page
		$tree->getBrowsableTree();

		// Render information table:
		return $this->processExpandCollapseLinks($this->renderModule($tree));
	}

	/**
	 * Rendering the information
	 *
	 * @param    BrowseTreeView $tree The Page tree data
	 *
	 * @return    string        HTML for the information table.
	 */
	protected function renderModule(BrowseTreeView $tree) {
		$rows = array();
		$cache = CacheUtility::getCache();

		foreach ($tree->tree as $row) {

			$cacheEntries = $cache->getByTag('pageId_' . $row['row']['uid']);

			if ($cacheEntries) {
				$isFirst = TRUE;
				foreach ($cacheEntries as $identifier => $info) {
					$cell = array(
						'uid'        => $row['row']['uid'],
						'title'      => $isFirst ? $row['HTML'] . BackendUtility::getRecordTitle('pages', $row['row'], TRUE) : $row['HTML_depthData'],
						'identifier' => $identifier,
						'info'       => $info,
					);
					$isFirst = FALSE;

					$rows[] = $cell;
				}
			} else {
				$cell = array(
					'uid'       => $row['row']['uid'],
					'title'     => $row['HTML'] . BackendUtility::getRecordTitle('pages', $row['row'], TRUE),
				);
				$rows[] = $cell;
			}
		}

		/** @var StandaloneView $renderer */
		$renderer = GeneralUtility::makeInstance('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$renderer->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName('EXT:nc_staticfilecache/Resources/Private/Templates/Module.html'));
		$renderer->assignMultiple(array(
			'requestUri' => GeneralUtility::getIndpEnv('REQUEST_URI'),
			'rows'       => $rows,
			'pageId'     => $this->pageId
		));

		return $renderer->render();
	}

	/**
	 * Handles incoming actions (e.g. removing all expired pages).
	 *
	 * @return    void
	 */
	protected function handleActions() {
		$action = GeneralUtility::_GP('ACTION');

		if (isset($action['removeExpiredPages'])) {
			CacheUtility::getCache()
				->collectGarbage();
		}
	}

	/**
	 * Processes the expand/collapse links and adds the Id of the current page in branch.
	 *
	 * Example:
	 * index.php?PM=0_0_23_staticfilecache#0_23 --> index.php?PM=0_0_23_staticfilecache&id=13#0_23
	 *
	 * @param    string $content : Content to be processed
	 *
	 * @return    string        The processed and modified content
	 */
	protected function processExpandCollapseLinks($content) {
		if (strpos($content, 'PM=') !== FALSE && $this->pageId > 0) {

			$content = preg_replace('/(href=")([^"]+PM=[^"#]+)(#[^"]+)?(")/', '${1}${2}&id=' . $this->pageId . '${3}${4}', $content);
		}
		return $content;
	}
}