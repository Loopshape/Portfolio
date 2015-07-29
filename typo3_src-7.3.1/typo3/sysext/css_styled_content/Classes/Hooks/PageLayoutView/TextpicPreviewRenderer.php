<?php
namespace TYPO3\CMS\CssStyledContent\Hooks\PageLayoutView;

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

/**
 * Contains a preview rendering for the page module of CType="textpic"
 */
class TextpicPreviewRenderer implements \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface {

	/**
	 * Preprocesses the preview rendering of the content element "textpic".
	 *
	 * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
	 * @param bool $drawItem Whether to draw the item using the default functionalities
	 * @param string $headerContent Header content
	 * @param string $itemContent Item content
	 * @param array $row Record row of tt_content
	 * @return void
	 */
	public function preProcess(
		\TYPO3\CMS\Backend\View\PageLayoutView &$parentObject,
		&$drawItem,
		&$headerContent,
		&$itemContent,
		array &$row
	) {
		if ($row['CType'] === 'textpic') {
			if ($row['bodytext']) {
				$itemContent .= $parentObject->linkEditContent($parentObject->renderText($row['bodytext']), $row) . '<br />';
			}

			if ($row['image']) {
				$itemContent .= $parentObject->thumbCode($row, 'tt_content', 'image');

				$fileReferences = \TYPO3\CMS\Backend\Utility\BackendUtility::resolveFileReferences('tt_content', 'image', $row);

				if (!empty($fileReferences)) {
					$linkedContent = '';

					foreach ($fileReferences as $fileReference) {
						$description = $fileReference->getDescription();
						if ($description !== NULL && $description !== '') {
							$linkedContent .= htmlspecialchars($description) . '<br />';
						}
					}

					$itemContent .= $parentObject->linkEditContent($linkedContent, $row);

					unset($linkedContent);
				}
			}

			$drawItem = FALSE;
		}
	}
}
