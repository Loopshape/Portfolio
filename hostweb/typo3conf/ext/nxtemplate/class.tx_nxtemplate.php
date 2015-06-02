<?php
/**
 * Copyright notice
 * 
 * (c) 2008 netlogix GmbH & Co. KG (Stefan.Braune@netlogix.de)
 * All rights reserved
 * 
 * This script is part of the TYPO3 project. The TYPO3 project is 
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * 
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * This copyright notice MUST APPEAR in all copies of the script!
 */


/**
 * A simple rudimentary templating system, behaves like the one found in cObj.
 *
 */
class tx_nxtemplate {
	public function __construct() {
	}
	
	public function fromResource($fileName) {
		return file_get_contents($fileName);
	}
	
	public function getSubpart($markerName, $templateCode) {
		$markerName = preg_quote($markerName, '/');
		preg_match("/<!--\s*$markerName\s+BEGIN\s*-->\s*(.*)\s*<!--\s*$markerName\s+END\s*-->/sUi", $templateCode, $matches);
		if (!isset($matches[1])) {
			trigger_error("Subpart $markerName not found. Returning empty string.", E_USER_ERROR);
		}
		return isset($matches[1]) ? $matches[1] : '';
	}
	
	public function substituteMarkerArray($markerArray, $templateCode) {
		foreach ($markerArray as $markerName => $markerValue) {
			$templateCode = str_replace($markerName, $markerValue, $templateCode);
		}
		
		return $templateCode;
	}
}
?>