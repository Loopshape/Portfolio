<?php
namespace In2code\Powermail\ViewHelpers\Getter;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * View helper check if given value is array or not
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class GetPageNameFromUidViewHelper extends AbstractViewHelper {

	/**
	 * pageRepository
	 *
	 * @var \In2code\Powermail\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository;

	/**
	 * View helper check if given value is array or not
	 *
	 * @param int $uid PID
	 * @return string Page Name
	 */
	public function render($uid = 0) {
		return $this->pageRepository->getPageNameFromUid($uid);
	}

}