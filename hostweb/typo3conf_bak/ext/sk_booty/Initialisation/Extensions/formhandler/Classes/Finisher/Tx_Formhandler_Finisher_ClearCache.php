<?php
/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *
 * $Id: Tx_Formhandler_Finisher_ClearCache.php 57892 2012-02-14 18:19:52Z reinhardfuehricht $
 *                                                                        */

/**
 * This finisher clears the cache. 
 * If no further configuration is set the current page's cache will be cleared.
 * Alternatively a pidList can be set:
 * 
 * Example configuration:
 *
 * <code>
 * finishers.1.class = Tx_Formhandler_Finisher_ClearCache
 *
 * # The cache of page 15 will be cleared 
 * finishers.1.config.pidList = 15
 * 
 * # cObject is supported...
 * finishers.1.config.pidList = TEXT
 * finishers.1.config.pidList.data = GP:someparameter

 * </code>
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Finisher_ClearCache extends Tx_Formhandler_AbstractFinisher {

	/**
	 * The main method called by the controller
	 *
	 * @return array The probably modified GET/POST parameters
	 */
	public function process() {
		$pidList = $this->utilityFuncs->getSingle($this->settings, 'pidList');
		if (empty($pidList)) {
			$pidList = $GLOBALS['TSFE']->id;
		}

		$this->utilityFuncs->debugMessage('Clearing Cache', array($pidList));

		$GLOBALS['TSFE']->clearPageCacheContent_pidList($pidList);
		return $this->gp;
	}
}
?>
