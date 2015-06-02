<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2014 Detlef Fluess <fluess@2-ad.de>
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
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

class ext_update {
	
	/**
	* Stub function for the extension manager
	*
	* @param       string  $what   What should be updated
	* @return      boolean true to allow access
	*/
	
	public function access($what = 'all') {
		$fields = $GLOBALS['TYPO3_DB']->admin_get_fields('tt_content');
		return isset($fields['imagecols']);
	}
	
	public function main() {	
		if (t3lib_div::_POST('nssubmit') != '') {
			$this->updateOverridePaths();
			$content = 'Update finished successfully.';
		}
		else {
			$content = $this->prompt();
		}
			return $content;
		}
		
		protected function prompt() {
			return
      '<form action="' . t3lib_div::getIndpEnv('REQUEST_URI') . '" method="POST">' .			
				'<p>This update will do the following:<br />
					- Update foundation from value imagecols<br />
					- Update table tt_content imagecols to value = 1.
				</p>
				
				<p><b>Note: </b> <br />
				All current values ​​from the field imagecols (columns) are now taken over by Foundation. (Must not be reset!)<br />
					This is necessary for a correct image width calculation multicolumn representations !!</p> 
				<br />
				<input type="submit" name="nssubmit" value="Update" />' .
			'</form>';
		}
		
		protected function updateOverridePaths() {
			$GLOBALS['TYPO3_DB']->sql_query('UPDATE tt_content SET tx_dffoundation5_large_block_grid=imagecols WHERE imagecols > 1');
			$GLOBALS['TYPO3_DB']->sql_query('UPDATE tt_content SET imagecols=1 WHERE imagecols > 1');
		}
	}
	
	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/realurl/class.ext_update.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/realurl/class.ext_update.php']);
}
?>