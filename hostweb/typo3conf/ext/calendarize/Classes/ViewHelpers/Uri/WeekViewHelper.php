<?php
/**
 * Uri to the week
 *
 * @package Calendarize\ViewHelpers\Link
 * @author  Tim Lochmüller
 */

namespace HDNET\Calendarize\ViewHelpers\Uri;

/**
 * Uri to the week
 *
 * @author Tim Lochmüller
 */
class WeekViewHelper extends \HDNET\Calendarize\ViewHelpers\Link\WeekViewHelper {

	/**
	 * Render the uri to the given day
	 *
	 * @param \DateTime $date
	 * @param int       $pageUid
	 *
	 * @return string
	 */
	public function render(\DateTime $date, $pageUid = NULL) {
		parent::render($date, $pageUid);
		return $this->tag->getAttribute('href');
	}
}
