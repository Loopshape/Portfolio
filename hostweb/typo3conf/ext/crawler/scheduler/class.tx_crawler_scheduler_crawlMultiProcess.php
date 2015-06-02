<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 AOE media (dev@aoemedia.de)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 * @author Michael Klapper <michael.klapper@aoemedia.de>
 * @package
 * @version $Id:$
 */
class tx_crawler_scheduler_crawlMultiProcess extends tx_scheduler_Task {

	/**
	 * @var integer
	 */
	public $timeOut;

	/**
	 * Function executed from the Scheduler.
	 *
	 * @return	void
	 */
	public function execute() {

		$processManager = new tx_crawler_domain_process_manager();
		$timeout = is_int($this->timeOut) ? (int)$this->timeOut : 10000;

		try {
			$processManager->multiProcess($timeout);
		} catch (Exception $e) {
		}

		return true;
	}
}

?>
