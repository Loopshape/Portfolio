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
tx_rnbase::load('tx_rnbase_util_SearchBase');


/**
 * Class to search networks from database
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_search
 * @author Rene Nitzsche <rene@system25.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_search_Network
	extends tx_rnbase_util_SearchBase {

	/**
	 * Kindklassen müssen ein Array bereitstellen, in denen die Aliases der
	 * Tabellen zu den eigentlichen Tabellennamen gemappt werden.
	 *
	 * @return array(alias => tablename, ...)
	 */
	protected function getTableMappings() {
		$tableMapping['NETWORK'] = 'tx_t3socials_networks';

		// Hook to append other tables
		tx_rnbase_util_Misc::callHook(
			't3socials', 'search_Network_getTableMapping_hook',
			array('tableMapping' => &$tableMapping), $this
		);
		return $tableMapping;
	}

	/**
	 * Name der Basistabelle, in der gesucht wird
	 *
	 * @return string
	 */
	protected function getBaseTable() {
		return 'tx_t3socials_networks';
	}

	/**
	 * Name der Klasse, in die die Ergebnisse gemappt werden
	 *
	 * @return string
	 */
	public function getWrapperClass() {
		return 'tx_t3socials_models_Network';
	}

	/**
	 * Name des Alias' der Basistabelle, in der gesucht wird
	 * Nicht abstract wg. Abwärts-Kompatibilität
	 *
	 * @return string
	 */
	protected function getBaseTableAlias() {
		return 'NETWORK';
	}

	/**
	 * As default the sql statement is build with tablenames.
	 * If this method returns true, the aliases will
	 * be used instead. But keep in mind,
	 * to use aliases for Joins too and to overwrite getBaseTableAlias()!
	 *
	 * @return boolean
	 */
	protected function useAlias() {
		return TRUE;
	}

	/**
	 * Kindklassen liefern hier die notwendigen DB-Joins. Ist kein JOIN erforderlich
	 * sollte ein leerer String geliefert werden.
	 *
	 * @param array $tableAliases
	 * @return string
	 */
	protected function getJoins($tableAliases) {
		$join = '';

		// Hook to append other tables
		tx_rnbase_util_Misc::callHook(
			't3socials', 'search_Network_getJoins_hook',
			array('join' => &$join, 'tableAliases' => $tableAliases), $this
		);
		return $join;
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/search/class.tx_t3socials_search_Network.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/search/class.tx_t3socials_search_Network.php']);
}
