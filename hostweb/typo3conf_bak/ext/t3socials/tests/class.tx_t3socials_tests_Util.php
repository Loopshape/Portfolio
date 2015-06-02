<?php
/***************************************************************
*  Copyright notice
*
 * (c) 2014 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
 * All rights reserved
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
require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');

/**
 * Util für Tests
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_tests
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_tests_Util {

	/**
	 * Liefert einen Lorem Ipsum text mit ca 2000 Zeichen.
	 *
	 * @return string
	 */
	public static function getLoremIpsum() {
		return 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. ' .
		'Aenean commodo ligula eget dolor. Aenean massa. ' .
		'Cum sociis natoque penatibus et magnis dis parturient montes, ' .
		'nascetur ridiculus mus. Donec quam felis, ultricies nec, ' .
		'pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. ' .
		'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. ' .
		'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. ' .
		'Nullam dictum felis eu pede mollis pretium. Integer tincidunt. ' .
		'Cras dapibus.' . CRLF . CRLF .
		'Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. ' .
		'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. ' .
		'Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. ' .
		'Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. ' .
		'Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ' .
		'ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, ' .
		'tellus eget condimentum rhoncus, sem quam semper libero, ' .
		'sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, ' .
		'luctus pulvinar, hendrerit id, lorem.' . CRLF . CRLF .
		'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut ' .
		'libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci ' .
		'eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit ' .
		'amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget ' .
		'bibendum sodales, augue velit cursus nunc, quis gravida magna mi ' .
		'a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, ' .
		'scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan ' .
		'lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. ' .
		'Vestibulum ante ipsum primis in faucibus orci luctus et ' .
		'ultrices posuere cubilia Curae; In ac dui quis mi consectetuer ' .
		'lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit ' .
		'eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ' .
		'ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, ' .
		'posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ' .
		'ipsum rutrum nunc. Nunc nonummy metus.';
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/class.tx_t3socials_tests_Util.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/tests/class.tx_t3socials_tests_Util.php']);
}
