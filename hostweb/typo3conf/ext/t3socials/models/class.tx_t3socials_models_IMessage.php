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
 * A generic message class
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_models
 * @author Rene Nitzsche <rene@system25.de>
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
interface tx_t3socials_models_IMessage {

	/**
	 * Liefert den Typ.
	 *
	 * @return string
	 */
	public function getMessageType();

	/**
	 * Liefert die Headline.
	 *
	 * @return string
	 */
	public function getHeadline();
	/**
	 * Setzt die Headline.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setHeadline($value);


	/**
	 * Liefert den Introtext.
	 *
	 * @return string
	 */
	public function getIntro();

	/**
	 * Setzt den Introtext.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setIntro($value);


	/**
	 * Liefert den Nachrichtentext.
	 *
	 * @return string
	 */
	public function getMessage();

	/**
	 * Setztden Nachrichtentext.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setMessage($value);


	/**
	 * Liefert die URL.
	 *
	 * @return string
	 */
	public function getUrl();

	/**
	 * Setzt die URL.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setUrl($value);


	/**
	 * Liefert die Ursprungsdaten.
	 *
	 * @return mixed
	 */
	public function getData();

	/**
	 * Setzt die Ursprungsdaten.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setData($value);

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_IMessage.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/models/class.tx_t3socials_models_IMessage.php']);
}
