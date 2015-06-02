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
 * Netzwerk Config
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_trigger_Config {

	private static $triggers = array();

	/**
	 * Wir registrieren ein neues Netzwerk
	 *
	 * @param string $config
	 * @return void
	 */
	public static function registerTrigger($config) {
		if (!$config instanceof tx_t3socials_models_TriggerConfig) {
			$config = (string) $config;
			if (!tx_rnbase::load($config)) {
				throw new Exception('Could not load trigger configuration: ' . $config);
			}
			$config = tx_rnbase::makeInstance($config, $config);
			if (!$config instanceof tx_t3socials_models_TriggerConfig) {
				throw new Exception(
					'The trigger configuration "' . get_class($config) .
					'" has to extend the class "tx_t3socials_models_TriggerConfig".'
				);
			}
		}

		$id = $config->getTriggerId();
		self::$triggers[$id] = $config;
	}

	/**
	 * Liefert alle Netzwerk ID's
	 *
	 * @return array
	 */
	public static function getTriggerIds() {
		return array_keys(self::$triggers);
	}

	/**
	 * Liefert alle Tabellennamen, welche Trigger haben könnten.
	 *
	 * @return array
	 */
	public static function getTriggerTableNames() {
		$tables = array();
		/* @var $config tx_t3socials_models_TriggerConfig */
		foreach (self::$triggers as $config) {
			$tables[] = $config->getTableName();
		}
		return $tables;
	}

	/**
	 * Liefert eine Triggerconfig eines bestimmten Trigger.
	 *
	 * @param string $trigger
	 * @throws Exception
	 * @return tx_t3socials_models_TriggerConfig
	 */
	public static function getTriggerConfig($trigger) {
		$id = $trigger;
		if (!isset(self::$triggers[$id])) {
			throw new Exception('Unknown trigger: ' . $id);
		}
		return self::$triggers[$id];
	}

	/**
	 * Liefert den Trigger für eine Tabelle.
	 * Mehrere Trigger pro Tabelle werden nicht mehr unterstützt.
	 * TODO: Methode umbenennen getTriggerConfigForTable
	 * @param string $table
	 * @return tx_t3socials_models_TriggerConfig
	 */
	public static function getTriggerConfigsForTable($table) {
		/* @var $config tx_t3socials_models_TriggerConfig */
		foreach (self::$triggers as $config) {
			if ($config->getTableName() != $table) {
				continue;
			}
			return $config;
		}
		return null;
	}

	/**
	 * Liefert alle Trigger für eine Tabelle.
	 *
	 * @param string $table
	 * @return array
	 */
	public static function getTriggerNamesForTable($table) {
		/* @var $config tx_t3socials_models_TriggerConfig */
		$config = self::getTriggerConfigsForTable($table);
		$triggers = array();
		$triggers[] = $config->getTriggerId();

		return $triggers;
	}

	/**
	 * Liefert ein Connector für ein Konfigurierter-Netzwerk.
	 *
	 * @param string|tx_t3socials_models_TriggerConfig $trigger
	 * @throws Exception
	 * @return tx_t3socials_network_IConnection
	 */
	public static function getMessageBuilder($trigger) {
		$config = $trigger instanceof tx_t3socials_models_TriggerConfig
			? $trigger : self::getTriggerConfig($trigger);
		$class = $config->getMessageBuilderClass();
		if (!tx_rnbase::load($class)) {
			throw new Exception('Could not load message builder: ' . $class);
		}
		$builder = tx_rnbase::makeInstance($class);
		if (!$builder instanceof tx_t3socials_trigger_IMessageBuilder) {
			throw new Exception(
				'The message builder "' . get_class($builder) .
				'" has to implement the interface "tx_t3socials_trigger_IMessageBuilder".'
			);
		}
		if ($builder instanceof tx_t3socials_trigger_MessageBuilder) {
			$builder->setTrigger($config);
		}
		return $builder;
	}

	/**
	 * Liefert ein Connector für ein Konfigurierter-Netzwerk.
	 *
	 * @param string|tx_t3socials_models_TriggerConfig $trigger
	 * @throws Exception
	 * @return tx_t3socials_network_IConnection
	 */
	public static function getResolver($trigger) {
		$config = $trigger instanceof tx_t3socials_models_TriggerConfig
			? $trigger : self::getTriggerConfig($trigger);
		$class = $config->getResolverClass();
		if (!tx_rnbase::load($class)) {
			throw new Exception('Could not load resolver: ' . $class);
		}
		$resolver = tx_rnbase::makeInstance($class);
		if (!$resolver instanceof tx_t3socials_util_IResolver) {
			throw new Exception(
				'The resolver "' . get_class($resolver) .
				'" has to implement the interface "tx_t3socials_util_IResolver".'
			);
		}
		return $resolver;
	}

	/**
	 * Übersetzt eine TriggerID zu einem Titel.
	 *
	 * @param string|tx_t3socials_models_TriggerConfig $trigger
	 * @return string
	 */
	public static function translateTrigger($trigger) {
		$id = $trigger instanceof tx_t3socials_models_TriggerConfig
			? $trigger->getTriggerId() : $trigger;
		tx_rnbase::load('tx_rnbase_util_Misc');
		$title = tx_rnbase_util_Misc::translateLLL('LLL:EXT:t3socials/Resources/Private/Language/locallang_db.xml:tx_t3socials_trigger_' . $id);
		return empty($title) ? $id : $title;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/trigger/class.tx_t3socials_trigger_Config.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/trigger/class.tx_t3socials_trigger_Config.php']);
}
