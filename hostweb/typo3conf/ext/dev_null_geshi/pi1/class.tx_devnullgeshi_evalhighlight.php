<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2014 W. Rotschek <typo3@dev-null.at>
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

class tx_devnullgeshi_evalhighlight {

	function returnFieldJS() {
		return 'return value;';
	}

	function evaluateFieldValue($value, $is_in, &$set) {

		if (preg_match('/^[0-9,]+$/', $value)) {
			return $value;
		} else {
			return '';
		}
	}
}

?>
