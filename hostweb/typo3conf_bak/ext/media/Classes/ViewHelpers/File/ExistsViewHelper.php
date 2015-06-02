<?php
namespace TYPO3\CMS\Media\ViewHelpers\File;

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

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Vidi\Domain\Model\Content;

/**
 * View helper which tell whether a file exists.
 */
class ExistsViewHelper extends AbstractViewHelper {

	/**
	 * Returns a property value of a file given by the context.
	 *
	 * @param File|Content|int $file
	 * @return bool
	 */
	public function render($file) {

		if (! $file instanceof File) {
			$file = $this->getFileConverter()->convert($file);
		}

		return $file->exists();
	}

	/**
	 * @return \TYPO3\CMS\Media\TypeConverter\ContentToFileConverter
	 */
	protected function getFileConverter() {
		return GeneralUtility::makeInstance('TYPO3\CMS\Media\TypeConverter\ContentToFileConverter');
	}
}
