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
 * HybridAuth Interface für Connections
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
interface tx_t3socials_network_hybridauth_Interface {

	/**
	 * Liefert die Konfiguration für HybridAuth.
	 *
	 * @return array
	 */
	public function getHybridAuthConfig(); /*{
		return array (
			'enabled' => true,
			'networkUid' => $this->getNetwork()->getUid(),
			'keys' => array(
				'key' => $this->getNetwork()->getUsername(),
				'secret' => $this->getNetwork()->getPassword(),
 				'access_token' => 'f7e26318fa155eafd135',
 				'access_token_secret' => '6330a31821856fc53665',
			)
		);
	}*/

	/**
	 * Liefert den HybridAuth Provider
	 *
	 * @return Hybrid_Provider_Adapter
	 */
	public function getProvider();

}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/hybridauth/class.tx_t3socials_network_hybridauth_Interface.php']
) {
	include_once(
		$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/hybridauth/class.tx_t3socials_network_hybridauth_Interface.php']
	);
}
