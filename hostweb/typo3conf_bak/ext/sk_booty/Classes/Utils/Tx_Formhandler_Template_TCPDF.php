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
*                                                                        */

if (TYPO3_MODE == 'BE') {
	require_once('../../../Resources/PHP/tcpdf/tcpdf.php');
} else {
	require_once('typo3conf/ext/formhandler/Resources/PHP/tcpdf/tcpdf.php');
}

/**
 * A PDF Template class for Formhandler generated PDF files for usage with Generator_TCPDF.
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Template_TCPDFSFGV extends TCPDF {

	/**
	 * Path to language file
	 *
	 * @access protected
	 * @var string
	 */
	protected $sysLangFile;

	/**
	 * Text for the header
	 *
	 * @access protected
	 * @var string
	 */
	protected $headerText;

	/**
	 * Text for the footer
	 *
	 * @access protected
	 * @var string
	 */
	protected $footerText;

	public function __construct() {
		parent::__construct();
		$this->sysLangFile = 'EXT:formhandler/Resources/Language/locallang.xml';
	}

	/**
	 * Generates the header of the page
	 * 
	 * @return void
	 */
	public function Header() {
		$headerText = $this->getHeaderText();
		if(strlen($headerText) > 0) {
			$this->SetY(50);
			$this->SetFont('Helvetica', 'I', 8);
			$text = str_ireplace(
					array(
						'###PDF_PAGE_NUMBER###',
						'###PDF_TOTAL_PAGES###'
					),
					array(
						$this->PageNo(),
						$this->numpages
					),
					$headerText
			);
			$this->Cell(0, 10, $text, 'B', 0, 'C');
		}
	}

	/**
	 * Generates the footer
	 * 
	 * @return void
	 */
	public function Footer() {

		//Position at 1.5 cm from bottom
		$this->SetY(-15);
		//$this->SetFont('Helvetica', 'I', 8);

        $fontname = $this->addTTFfont(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('sk_sfgv').'/Resources/Public/Fonts/RotisSansSerif.ttf', 'TrueTypeUnicode', '', 8);
        $this->SetFont($fontname, '', 9, '', false);

		$footerText = $this->getFooterText();

		if(strlen($footerText) > 0) {
			$footerText = str_ireplace(
					array(
						'###PDF_PAGE_NUMBER###',
						'###PDF_TOTAL_PAGES###'
					),
					array(
						$this->getAliasNumPage(),
						$this->getAliasNbPages()
					),
					$footerText
			);
			$this->Cell(0, 10, $footerText, 'T', 0, 'C');
		} else {
			/*$text = $this->getLL('footer_text');
			$text = sprintf($text,date('d.m.Y H:i:s', time()));
			//$this->Cell(0, 10, $text, 'T', 0, 'C');
			$pageNumbers = $text . ' ' . $this->getAliasNumPage() . ' | ' . $this->getAliasNbPages();
			$this->Cell(0, 10, $pageNumbers, 0, 0, 0);*/

            // test some inline CSS
            $text = $this->getLL('footer_text');
            $text = sprintf($text,date('d.m.Y', time()));
            $apage = $this->PageNo();
            $opage = $this->getAliasNbPages();

            $html = '<div align="right" style="width: 10%; text-align: right; color: #CCCCCC; ">'. $text . '&nbsp;&nbsp;'.$apage.' | '.$opage.'</div>';
           // $html = '<div align="right" style="width: 100%; text-align: right;">'. $text . ' ' . $this->getAliasNumPage() . ' | ' . $this->getAliasNbPages() . '</div>';

            //$this->writeHTMLCell(300, '', '', 500, $html, 0, 0, 1, true, 'J', true);
            $this->writeHTMLCell(80, '', 125, '', $html, 0, 1, 0, true, 'J', true);
            //$this->writeHTMLCell(80, '', '', $y, $left_column, 1, 0, 1, true, 'J', true);
		}
		
		
	}

	/**
	 * Get a translation for given key from "EXT:formhandler/Resources/Language/locallang.xml"
	 *
	 * @param string $key The key
	 * @return string The translation
	 */
	private function getLL($key) {
		global $LANG;
		if (TYPO3_MODE == 'BE') {
			$LANG->includeLLFile($this->sysLangFile);
			$text = trim($LANG->getLL($key));
		} else {
			$text = trim($GLOBALS['TSFE']->sL('LLL:' . $this->sysLangFile . ':' . $key));
		}
		return $text;
	}

	/**
	 * Set the text for the PDF Header
	 *
	 * @param string $s The string to set as PDF Header Text
	 */
	public function setHeaderText($s) {
		$this->headerText = $s;
	}

	/**
	 * Set the text for the PDF Footer
	 *
	 * @param string $s The string to set as PDF Header Text
	 */
	public function setFooterText($s) {
		$this->footerText = $s;
	}

	/**
	 * Returns the string used as PDF Footer text
	 *
	 * @return string
	 */
	public function getHeaderText() {
		return $this->headerText;
	}

	/**
	 * Returns the string used as PDF Footer text
	 *
	 * @return string
	 */
	public function getFooterText() {
		return $this->footerText;
	}

}
?>