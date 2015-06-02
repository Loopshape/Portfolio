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
 * $Id: Tx_Formhandler_Finisher_ClearCache.php 22614 2009-07-21 20:43:47Z fabien_u $
 *                                                                        */

/**
 * This finisher generates a unique code for a database entry.
 * This can be used for FE user registration or newsletter registration.
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Finisher_GenerateAuthCode extends Tx_Formhandler_AbstractFinisher {

	/**
	 * The main method called by the controller
	 *
	 * @return array The probably modified GET/POST parameters
	 */
	public function process() {
		$firstInsertInfo = array();
		if($this->utilityFuncs->getSingle($this->settings, 'uid')) {
			$uidField = $this->utilityFuncs->getSingle($this->settings, 'uidField');
			if(!$uidField) {
				$uidField = 'uid';
			}
			$firstInsertInfo = array(
				'table' => $this->utilityFuncs->getSingle($this->settings, 'table'),
				'uidField' => $uidField,
				'uid' => $this->utilityFuncs->getSingle($this->settings, 'uid')
			);
 		} elseif (is_array($this->gp['saveDB'])) {
 			if (isset($this->settings['table'])) {
 				$table = $this->utilityFuncs->getSingle($this->settings, 'table');
 				foreach ($this->gp['saveDB'] as $idx => $insertInfo) {
 					if ($insertInfo['table'] === $table) {
 						$firstInsertInfo = $insertInfo;
 						break;
 					}
 				}
 			}
 			if (empty($firstInsertInfo)) {
 				reset($this->gp['saveDB']);
 				$firstInsertInfo = current($this->gp['saveDB']);
 			}
 		}
		$table = $firstInsertInfo['table'];
		$uid = $GLOBALS['TYPO3_DB']->fullQuoteStr($firstInsertInfo['uid'], $table);
		$uidField = $firstInsertInfo['uidField'];
		if(!$uidField) {
			$uidField = 'uid';
		}
		if ($table && $uid && $uidField) {
			$selectFields = '*';
			if($this->settings['selectFields']) {
				$selectFields = $this->utilityFuncs->getSingle($this->settings, 'selectFields');
			}
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($selectFields, $table, $uidField . '=' . $uid);
			if ($res) {
				$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
				$authCode = $this->generateAuthCode($row);
				$this->gp['generated_authCode'] = $authCode;

				// looking for the page, which should be used for the authCode Link
				// first look for TS-setting 'authCodePage', second look for redirect_page-setting, third use actual page
				$authCodePage = ''; 
				if (isset($this->settings['authCodePage'])) {
					$authCodePage = $this->utilityFuncs->getSingle($this->settings, 'authCodePage');
				} else {
					$authCodePage = $this->utilityFuncs->pi_getFFvalue($this->cObj->data['pi_flexform'], 'redirect_page', 'sMISC');
				}
				if (!$authCodePage) {
					$authCodePage = $GLOBALS['TSFE']->id;
				}

				//create the parameter-array for the authCode Link
				$paramsArray = array_merge($firstInsertInfo, array('authCode' => $authCode));
				
				if($this->settings['excludeParams']) {
					$excludeParams = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->utilityFuncs->getSingle($this->settings, 'excludeParams'));
					foreach($excludeParams as $param) {
						if(isset($paramsArray[$param])) {
							unset($paramsArray[$param]);
						}
					}
				}

				// If we have set a formValuesPrefix, add it to the parameter-array
				$formValuesPrefix = $this->globals->getFormValuesPrefix();
				if (!empty($formValuesPrefix)) {
					$paramsArray = array($formValuesPrefix => $paramsArray);
				}
				
				$linkConf = array(
					'parameter' => $authCodePage,
					'additionalParams' => \TYPO3\CMS\Core\Utility\GeneralUtility::implodeArrayForUrl('', $paramsArray),
					'returnLast' => 'url',
					'useCacheHash' => 1
				);

				// create the link, using typolink function, use baseUrl if set, else use \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL')
				$url = $this->cObj->typoLink_URL($linkConf);
				$tmpArr = parse_url($url);
				if (empty($tmpArr['scheme'])) {
					$url = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL') . ltrim($url, '/');
				}
				$this->gp['authCodeUrl'] = $url;
			}
		}
		return $this->gp;
	}

	/**
	 * Return a hash value to send by email as an auth code.
	 *
	 * @param array The submitted form data
	 * @return string The auth code
	 */
	protected function generateAuthCode($row) {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::hmac(serialize($row), 'formhandler');
	}

}
?>