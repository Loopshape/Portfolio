<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2014 Michael Stopp <stopp@eye.ch>
*  All rights reserved
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

// tell TCPDF not to use default config
define("K_TCPDF_EXTERNAL_CONFIG", true);

// load T3 config file
require_once(t3lib_extMgm::extPath('t3_tcpdf').'t3_tcpdf_config.php');
require_once(t3lib_extMgm::extPath('t3_tcpdf').'tcpdf/tcpdf.php');

class tx_t3_tcpdf extends TCPDF {

	var $t3_header_txt = '';
	var $t3_header_font = 'helvetica';
	var $t3_header_fontstyle = '';
	var $t3_header_fontsize = 9;

	var $t3_footer_txt = '';
	var $t3_footer_font = 'helvetica';
	var $t3_footer_fontstyle = '';
	var $t3_footer_fontsize = 9;

    function Header() {
		if ( $this->t3_header_txt != '' ) {
			$this->SetFont($this->t3_header_font, $this->t3_header_fontstyle, $this->t3_header_fontsize);
			$this->writeHTMLCell($w=0, $h=0, $x='', $y='', $this->t3_header_txt, $border=0, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);
		}
		else {
			parent::Header();
		}
	}

    function Footer() {
		if ( $this->t3_footer_txt != '' ) {
			$this->SetFont($this->t3_footer_font, $this->t3_footer_fontstyle, $this->t3_footer_fontsize);
			$this->writeHTMLCell($w=0, $h=0, $x='', $y='', $this->t3_footer_txt, $border=0, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);
		}
		else {
			parent::Footer();
		}
	}
}
?>
