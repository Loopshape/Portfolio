<?php

namespace Spin\Div;

use TYPO3\CMs\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 André Spindler <typo3@andre-spindler.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Collection of static functions to work in cooperation with the extension lib (lib/div)
 *
 * @package    TYPO3
 * @subpackage div
 * @license    http://www.gnu.org/licenses/gpl.html
 *               GNU General Public License, version 3 or later
 * @author     Elmar Hinz <elmar.hinz@team-red.net>
 * @author     André Spindler <typo3@andre-spindler.de>
 * @copyright  2006-2007 Elmar Hinz, 2012-2014 André Spindler
 */
class TxDiv {


	/**
	 * Do a recursive require_once for all classes of an extension or subdirectory
	 *
	 * This function is a workaround for the __autoload() function from PHP5.
	 * - Limitation: Doesn't work for "intra extension inheritance". (see below)
	 * - Disadvantage: All classfiles are required, even if not used.
	 * - Advantage: It also works in PHP4.
	 * - Advantage: It doesn't require the same __autolod pattern for all extensions.
	 * - Alternative: tx_div::load() to require on demand.
	 *
	 * Usage example:
	 *
	 * In ext_localconf.php
	 * <code>
	 *    require_once(t3lib_extMgm::extPath('div') . 'class.tx_div.php');
	 *    if(TYPO3_MODE == 'FE') tx_div::autoLoadAll($_EXTKEY);
	 * </code>
	 *
	 * Intra extension inheritance limitation:
	 *
	 * This function doesn't work trustworthy, for classes that inherit from other
	 * classes within the same extension, because it doesn't respect the required
	 * order. Workaround: Use tx_div::load() to require an extension internal
	 * class as parent.
	 *
	 * This function is deprecated now - use the autoload features of TYPO3 instead.
	 *
	 * @todo    Improve Intra extension inheritance limitation
	 * @see     tx_div::load()
	 *
	 * @param    string        preg pattern matching the filenames to require
	 * @param    string        extension Key
	 * @param    string        subdirectory
	 * @return    void
	 * @deprecated Use the autoload features of TYPO3 instead
	 */
	public static function autoLoadAll($extensionKey, $subdirectory = '', $pregFileNamePattern = '/^class[.]tx_(.*)[.]php$/') {
		GeneralUtility::logDeprecatedFunction();
		// Format subdirectory first to '.../' or ''
		preg_match('/^\/?(.*)\/?$/', $subdirectory, $matches);
		$subdirectory = strlen($matches[1]) ? $matches[1] . '/' : '';
		$path = ExtensionManagementUtility::extPath($extensionKey) . $subdirectory;
		if (is_dir($path)) {
			$handle = opendir($path);
			while ($entry = readdir($handle)) {
				if (preg_match($pregFileNamePattern, $entry)) {
					require_once($path . $entry);
				} elseif (is_dir($path . $entry) && !preg_match('/\./', $entry)) {
					self::autoLoadAll($extensionKey, $subdirectory . $entry, $pregFileNamePattern);
				}
			}
		} else {
			die('No such directory: ' . $path . ' in ' . __FILE__ . ' line ' . __LINE__);
		}
	}


	/**
	 * Clear all caches
	 *
	 * WARNING: Only use during development!!!!
	 * It's not a runtime function. If you use it during development keep in mind,
	 * that functionality may depend on the cached content. So the use can lead to
	 * irritating results.
	 *
	 * @return    void
	 */
	public static function clearAllCaches() {
		$tce = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\DataHandling\\DataHandler');
		$tce->admin = true;
		$tce->clear_cacheCmd('all');
	}


	/**
	 * Get the database object TYPO3_DB
	 *
	 * Alias for the function getDataBase().
	 *
	 * @return \TYPO3\CMS\Core\Database\DatabaseConnection
	 * @see tx_div::getDataBase()
	 */
	public static function db() {
		return self::getDataBase();
	}


	/**
	 * Get the database object TYPO3_DB
	 *
	 * @return \TYPO3\CMS\Core\Database\DatabaseConnection
	 * @see tx_div::db();
	 */
	public static function getDataBase() {
		return self::getGlobal('TYPO3_DB');
	}


	/**
	 * Get a global variable
	 *
	 * @param string   The key of the global variable
	 * @return mixed   The global variable.
	 */
	public static function getGlobal($key) {
		return $GLOBALS[$key];
	}


	/**
	 * Guess the key from the given information
	 *
	 * Guessing has the following order:
	 *
	 * 1. A KEY itself is tried.
	 *    <pre>
	 *     Example: my_extension
	 *    </pre>
	 * 2. A classnmae of the pattern tx_KEY_something_else is tried.
	 *    <pre>
	 *     Example: tx_myextension_view
	 *    </pre>
	 * 3. A full classname of the pattern ' * tx_KEY_something_else.php' is tried.
	 *    <pre>
	 *     Example: class.tx_myextension_view.php
	 *     Example: brokenPath/class.tx_myextension_view.php
	 *    </pre>
	 * 4. A path that starts with the KEY is tried.
	 *    <pre>
	 *     Example: my_extension/class.view.php
	 *    </pre>
	 *
	 * @param    string        the minimal necessary information (see 1-4)
	 * @return    string        the guessed key, FALSE if no result
	 */
	public static function guessKey($minimalInformation) {
		$info = trim($minimalInformation);
		$key = false;
		if ($info) {
			// Can it be the key itself?
			if (!$key && preg_match('/^([A-Za-z_]*)$/', $info, $matches)) {
				$key = $matches[1];
				$key = self::getValidKey($key);
			}
			// Is it a classname that contains the key?
			if (!$key && (preg_match('/^tx_([^_]*)(.*)$/', $info, $matches) || preg_match('/^user_([^_]*)(.*)$/', $info, $matches))) {
				$key = $matches[1];
				$key = self::getValidKey($key);
			}
			// Is there a full filename that contains the key in it?
			if (!$key && (preg_match('/^.*?tx_([^_]*)(.*)\.php$/', $info, $matches) || preg_match('/^.*?user_([^_]*)(.*)\.php$/', $info, $matches))) {
				$key = $matches[1];
				$key = self::getValidKey($key);
			}
			// Is it a path that starts with the key?
			if (!$key && $last = strstr('/', $info)) {
				$key = substr($info, 0, $last);
				$key = self::getValidKey($key);
			}
		}

		return $key ? $key : false;
	}


	/**
	 * Check if the given extension key is within the loaded extensions
	 *
	 * The key can be given in the regular format or with underscores stripped.
	 *
	 * @param    string        extension key to check
	 * @return    boolean        is the key valid?
	 */
	public static function getValidKey($rawKey) {
		$result = false;
		$uKeys = array_keys($GLOBALS['TYPO3_LOADED_EXT']);
		foreach ((array)$uKeys as $uKey) {
			if (str_replace('_', '', $uKey) == str_replace('_', '', $rawKey)) {
				$result = $uKey;
			}
		}

		return $result ? $result : false;
	}


	/**
	 * This function is an alias for tx_div::loadClass() for your convinience
	 *
	 * @param    string        classname or path matching for the type of loader
	 * @return    boolean        true if successfull else false
	 * @see     tx_div::loadClass()
	 * @deprecated Use the autoload features of TYPO3 instead
	 */
	public static function load($classNameOrPathInformation) {
		GeneralUtility::logDeprecatedFunction();

		return self::loadClass($classNameOrPathInformation);
	}


	/**
	 * Load the class file
	 *
	 * Load the file for a given classname 'tx_key_path_file'
	 * or a given part of the filepath that contains enough information to find the class.
	 *
	 * @param    string        classname or path matching for the type of loader
	 * @return    boolean        true if successfull, false otherwise
	 * @see     tx_lib_t3Loader
	 * @see     tx_lib_pearLoader
	 * @deprecated Use the autoload features of TYPO3 instead
	 */
	public static function loadClass($classNameOrPathInformation) {
		GeneralUtility::logDeprecatedFunction();
		if (\Spin\Lib\T3Loader::load($classNameOrPathInformation)) {
			return true;
		}
//		print '<p>Trying Pear Loader: ' . $classNameOrPathInformation;
//		require_once(t3lib_extMgm::extPath('lib') . 'class.tx_lib_pearLoader.php');
//		if(tx_lib_pearLoader::load($classNameOrPathInformation)) {
//			return true;
//		}
		return false;
	}


	/**
	 * Loads TCA additions of other extensions
	 *
	 * Your extension may depend on fields that are added by other
	 * extensions. For reasons of performance parts of the TCA are only
	 * loaded on demand. To ensure that the extended TCA is loaded for
	 * the extensions yours depends you can apply this function.
	 *
	 * @param       array  extension keys which have TCA additions to load
	 * @return      void
	 * @author      Franz Holzinger
	 */
	public static function loadTcaAdditions($ext_keys) {
		//Merge all ext_keys
		if (is_array($ext_keys)) {
			for ($i = 0; $i < sizeof($ext_keys); $i++) {
				//Include the ext_table
				$GLOBALS['_EXTKEY'] = $ext_keys[$i];
				include(ExtensionManagementUtility::extPath($ext_keys[$i]) . 'ext_tables.php');
			}
		}
	}


	/**
	 * Load the class file and make an instance of the class
	 *
	 * This is an extension to t3lib_div::makeInstance(). The advantage
	 * is that it tries to autoload the file wich in combination
	 * with the shorter notation simplyfies the generation of objects.
	 *
	 * @param    string        classname
	 * @return    object        the instance else FALSE
	 * @see     tx_div::makeInstanceClassName
	 * @see     tx_lib_t3Loader
	 * @see     tx_lib_pearLoader
	 * @deprecated Use the core function of TYPO3 instead for creating instances
	 */
	public static function makeInstance($className) {
		GeneralUtility::logDeprecatedFunction();
		$instance = false;
		if (!is_object($instance)) {
			$instance = \Spin\Lib\T3Loader::makeInstance($className);
		}
//		if(!is_object($instance)) {
//			require_once(t3lib_extMgm::extPath('lib') . 'class.tx_lib_pearLoader.php');
//			$instance = tx_lib_pearLoader::makeInstance($className);
//		}
		if (!is_object($instance)) {
			return false;
		} else {
			return $instance;
		}
	}


	/**
	 * Load the class file, return the classname or the ux_classname
	 *
	 * This is an extension to t3lib_div::makeInstanceClassName. The advantage
	 * is that it tries to autoload the file. In combination with the shorter
	 * notation it simplyfies the finding of the classname.
	 *
	 * @param    string        classname
	 * @return    string        classname or ux_classsname (maybe  service classname)
	 * @see     tx_div::makeInstance
	 * @see     tx_lib_t3Loader
	 * @see     tx_lib_pearLoader
	 * @deprecated Use the core function of TYPO3 instead for creating instances
	 */
	public static function makeInstanceClassName($inputName) {
		GeneralUtility::logDeprecatedFunction();
		$outputName = false;
		if (!$outputName) {
			$outputName = \Spin\Lib\T3Loader::makeInstanceClassName($inputName);
		}
//		if(!$outputName) {
//			require_once(t3lib_extMgm::extPath('lib') . 'class.tx_lib_pearLoader.php');
//			$outputName = tx_lib_pearLoader::makeInstanceClassName($inputName);
//		}
		return $outputName;
	}


	/**
	 * Resolves the "EXT:" prefix relative to PATH_site. If not given the path is untouched.
	 *
	 * @param string Path to resolve.
	 * @return string Resolved path.
	 */
	public static function resolvePathWithExtPrefix($path) {
		if (substr($path, 0, 4) == 'EXT:') {
			list($extKey, $local) = explode('/', substr($path, 4), 2);
			if (ExtensionManagementUtility::isLoaded($extKey)) {
				$path = self::getSiteRelativeExtensionPath($extKey) . $local;
			}
		}

		return $path;
	}


	/**
	 * Load the site relative extension path for the given extension key.
	 *
	 * @param string Extension key to resolve.
	 * @return string Site relative path. FALSE if not found.
	 */
	public static function getSiteRelativeExtensionPath($key) {
		if (isset($GLOBALS['TYPO3_LOADED_EXT'][$key]['siteRelPath'])) {
			return $GLOBALS['TYPO3_LOADED_EXT'][$key]['siteRelPath'];
		} else {
			return false;
		}
	}


	/**
	 * Using the browser session
	 *
	 * This is an alias for the function tx_div::browserSession()
	 *
	 * @param  session    key
	 * @param  mixed    sesion value
	 * @return mixed    session value
	 * @see    userSeesion()
	 * @see    browserSession()
	 */
	public static function session($key, $value = NULL) {
		return self::browserSession($key, $value);
	}


	/**
	 * Using the browser session
	 *
	 * The browser session is bound to the browser not to the frontend user.
	 *
	 * The value for the given key is returned.
	 * If a value is given it is stored into the session before.
	 *
	 * @param  session    key
	 * @param  mixed    sesion value
	 * @return mixed    session value
	 * @see    userSeesion()
	 * @see    session()
	 */
	public static function browserSession($key, $value = NULL) {
		if ($value != NULL)
			$GLOBALS['TSFE']->fe_user->setKey('ses', $key, $value);

		return $GLOBALS['TSFE']->fe_user->getKey('ses', $key);
	}


	/**
	 * Get an instance of the T3 core engine (TCE)
	 * Alias for the function findTce()
	 *
	 * @return \TYPO3\CMS\Core\DataHandling\DataHandler
	 * @see tx_div::findTce()
	 */
	public static function tce() {
		return self::findTce();
	}


	/**
	 * Get an instance of the T3 core engine (TCE)
	 *
	 * This function requires that a BE user is logged in.
	 * You can log in a BE user into the FE i.e. by using
	 * the extension "simulatebe". Alternatively you can
	 * work with a "faked" $BE_USER object.
	 *
	 * @return    \TYPO3\CMS\Core\DataHandling\DataHandler
	 */
	public static function findTce() {
//		ob_start();
//		require(PATH_t3lib.'stddb/tables.php');
//		require(PATH_t3lib.'stddb/load_ext_tables.php');
//		require_once(PATH_t3lib.'class.t3lib_tcemain.php');
//		ob_end_clean();
		if (!isset($tce)) {
			static $tce; // Singleton.
//			$tce = t3lib_div::makeInstance('t3lib_tcemain');
			/** @var \TYPO3\CMS\Core\DataHandling\DataHandler $tce */
			$tce = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\DataHandling\\DataHandler');
			$tce->stripslashes_value = 0;
		}

		return $tce;
	}


	/**
	 * Converts the given mixed data into an hashObject
	 *
	 * @param   mixed       data to be converted
	 * @param   string      string of characters used to split first argument
	 * @return  object      an hashObject
	 */
	public static function toHashObject($mixed, $splitCharacters = ',;:') {
		//return new tx_lib_object(self::toHashArray($mixed, $splitCharacters));
        return GeneralUtility::makeInstance('\\Spin\\Lib\\Object', self::toHashArray($mixed, $splitCharacters));
	}


	/**
	 * Converts the given mixed data into an hashArray
	 *
	 * @param   mixed       data to be converted
	 * @param   string      string of characters used to split first argument
	 * @return  array       an hashArray
	 */
	public static function toHashArray($mixed, $splitCharacters = ',;:\s') {
		if (is_string($mixed)) {
			$hashArray = array();
			$array = self::explode($mixed, $splitCharacters); // TODO: Enable empty values by defining a better explode functions.
			for ($i = 0; $i < count($array); $i = $i + 2) {
				$hashArray[$array[$i]] = $array[$i + 1];
			}
		} elseif (is_array($mixed)) {
			$hashArray = $mixed;
		} elseif (is_object($mixed) && method_exists($mixed, 'getArrayCopy')) {
			$hashArray = $mixed->getArrayCopy();
		} else {
			$hashArray = array();
		}

		return $hashArray;
	}


	/**
	 * Explode a list into an array
	 *
	 * Explodes a string by any number of the given charactrs.
	 * By default it uses comma, semicolon, colon and whitespace.
	 *
	 * The returned values are trimmed.
	 *
	 * @param    string        string to split
	 * @param    string        regular expression that defines the splitter
	 * @return    array        with the results
	 */
	public static function explode($value, $splitCharacters = ',;:\s') {
		$pattern = '/[' . $splitCharacters . ']+/';
		$results = preg_split($pattern, $value, -1, PREG_SPLIT_NO_EMPTY);
		$return = array();
		foreach ($results as $result)
			$return[] = trim($result);

		return (array)$return;
	}


	/**
	 * Converts the given mixed data into an hashString
	 *
	 * @param   mixed       data to be converted
	 * @param   string      string of characters used to split first argument
	 * @return  string      an hashString
	 */
	public static function toHashString($mixed, $splitCharacters = ',;:') {
		$array = self::toHashArray($mixed, $splitCharacters);
		$string = '';
		for ($i = 0; $i < count($array); $i = $i + 2) {
			$string .= $array[$i] . ' : ' . $array[$i + 1] . ', ';
		}

		return $string ? substr($string, 0, -1) : false;
	}


	/**
	 * Converts the given mixed data into a listObject
	 *
	 * @param   mixed       data to be converted
	 * @param   string      string of characters used to split first argument
	 * @return  object      a listObject
	 */
	public static function toListObject($mixed, $splitCharacters = ',;:') {
		//return new tx_lib_object(self::toListArray($mixed, $splitCharacters));
        return GeneralUtility::makeInstance('\\Spin\\Lib\\Object', self::toListArray($mixed, $splitCharacters));
	}


	/**
	 * Converts the given mixed data into a listArray
	 *
	 * @param   mixed       data to be converted
	 * @param   string      string of characters used to split first argument
	 * @return  array       a listArray
	 */
	public static function toListArray($mixed, $splitCharacters = ',;:\s') {
		if (is_string($mixed)) {
			$listArray = self::explode($mixed, $splitCharacters);
		} elseif (is_array($mixed)) {
			$listArray = array_values($mixed);
		} elseif (is_object($mixed) && method_exists($mixed, 'getArrayCopy')) {
			$listArray = array_values($mixed->getArrayCopy());
		} else {
			$listArray = array();
		}

		return $listArray;
	}


	/**
	 * Converts the given mixed data into a listString
	 *
	 * @param   mixed       data to be converted
	 * @param   string      string of characters used to split first argument
	 * @return  string      a listString
	 */
	public static function toListString($mixed, $splitCharacters = ',;:') {
		return implode(', ', self::toListArray($mixed, $splitCharacters));
	}


	/**
	 * Get the frontend user
	 *
	 * Alias to getFrontEndUser();
	 *
	 * @return    \TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication
	 */
	public static function user() {
		return self::getFrontEndUser();
	}


	/**
	 * Get the frontend user
	 *
	 * @return \TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication
	 * @see tx_div::user();
	 */
	public static function getFrontEndUser() {
		return $GLOBALS['TSFE']->fe_user;
	}


	/**
	 * Using the user session
	 *
	 * The user session is bound to the frontend user.
	 *
	 * The value for the given key is returned.
	 * If a value is given it is stored into the session before.
	 *
	 * @param  session key
	 * @param  mixed sesion value
	 * @return    mixed    session value
	 * @see    browserSeesion()
	 */
	public static function userSession($key, $value = NULL) {
		if ($value != NULL)
			$GLOBALS['TSFE']->fe_user->setKey('user', $key, $value);

		return $GLOBALS['TSFE']->fe_user->getKey('user', $key);
	}


}
