<?php
namespace In2code\Powermail\ViewHelpers\Condition;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Check if Path or File is an image
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class IsImageViewHelper extends AbstractViewHelper {

	/**
	 * Webimage Formats
	 *
	 * @var array
	 */
	protected $imageExtensions = array(
		'jpg',
		'jpeg',
		'bmp',
		'gif',
		'png'
	);

	/**
	 * Check if Path or File is an image
	 *
	 * @param string $path
	 * @return boolean
	 */
	public function render($path) {
		$fileInfo = pathinfo($path);
		return in_array($fileInfo['extension'], $this->imageExtensions);
	}
}