<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Stefan Regniet, TechDivision GmbH <s.regniet@techdivision.com>
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
 * Controller for the Iframe object
 */
class Tx_Html5iframe_Controller_IframeController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Displays a single Iframe
	 *
	 * @return string The rendered view
	 */
	public function showAction() {
		$url = $this->buildUrlWithParameters($this->settings['url']?$this->settings['url']:$this->settings['globalUrl']);
		$this->view->assign('outputUrl', $url);
	}

	/**
	 * renders the uri with params from flexform
	 *
	 * @param string
	 * @return string url
	 */
	public function buildUrlWithParameters($url) {
		if($url && count($this->settings['params'])){
			$urlWithParameters = $url;
			if(strstr($urlWithParameters,'?') <= 0)
				$urlWithParameters .= '?';
			foreach ($this->settings['params'] as $parameterToAdd) {
				$urlWithParameters .= '&' . urlencode($parameterToAdd['param']['key']) . '=' . urlencode($parameterToAdd['param']['value']);
			}
		}
		return $urlWithParameters;
	}



}
?>