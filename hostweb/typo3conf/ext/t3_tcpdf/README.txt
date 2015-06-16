This Extension is intended for extension developers who want to create PDFs
within their extension.

It makes use of the great pure PHP (ie. no pdf extension for PHP required!) pdf
library TCPDF by Nicola Asuni (www.tcpdf.org). Please support him by making a
donation at http://sourceforge.net/donate/index.php?group_id=128076.

To update the TCPDF library yourself, you should only have to replace the contents
of the tcpdf folder within the extension with a newer version of TCPDF. Depending on
the changes in TCPDF, you then might have to update the file t3_tcpdf_config.php in
the root folder of the extension as well. (This file is based on tcpdf_config.php
in the config folder of tcpdf.)
Currently included TCPDF version: 6.2.6 (2015-03-26)

Below is a rudimentary code sample for the use of t3_tcpdf within your own extension.
The $body variable is expected to be HTML code. Please be aware that not all HTML/CSS
as for regular browser output can be used here, if you want satisfying results in
your generated PDFs. Please check the samples page at www.tcpdf.org.



MS, 2015-03-26

======================================================================================

class tx_yourextension_pi1 extends tslib_pibase {

	[...]

	function main($content,$conf)	{

		[...]

		// prepare document body and file name
		$pdfBody = $this->buildPDFMessage();
		$pdfFile = $this->tempDir.'/test.pdf';
		// create PDF
		$this->makePDF($pdfBody,$pdfFile,'D','My Company','Document Title');
	}


	/**
	 * Create PDF from HTML (using TCPDF through t3_tcpdf extension)
	 *
	 * @param	string	$body: pre-formatted page body
	 * @param	string	$file: pdf file name
	 * @param	string	$outMode: pdf output mode (I = inline, D = download, F = file etc. -> see function for details)
	 * @param	string	$author: author name (for pdf properties)
	 * @param	string	$title: document title (for pdf properties)
	 * @return	void
	 */
	 function makePDF($body,$file='test.pdf',$outMode='F',$author='',$title='') {
		$pdf = t3lib_div::makeInstance('tx_t3_tcpdf','P', 'mm', 'A4', true, 'UTF-8', false);

		if ( $this->conf['pdfHeaderTxt'] ) $pdf->t3_header_txt = $this->conf['pdfHeaderTxt'];
		if ( $this->conf['pdfHeaderFont'] ) $pdf->t3_header_font = $this->conf['pdfHeaderFont'];
		if ( $this->conf['pdfHeaderFontStyle'] ) $pdf->t3_header_fontstyle = $this->conf['pdfHeaderFontStyle'];
		if ( $this->conf['pdfHeaderFontSize'] ) $pdf->t3_header_fontsize = $this->conf['pdfHeaderFontSize'];

		if ( $this->conf['pdfFooterTxt'] ) $pdf->t3_footer_txt = $this->conf['pdfFooterTxt'];
		if ( $this->conf['pdfFooterFont'] ) $pdf->t3_footer_font = $this->conf['pdfFooterFont'];
		if ( $this->conf['pdfFooterFontStyle'] ) $pdf->t3_footer_fontstyle = $this->conf['pdfFooterFontStyle'];
		if ( $this->conf['pdfFooterFontSize'] ) $pdf->t3_footer_fontsize = $this->conf['pdfFooterFontSize'];

		$bodyFont = $this->conf['pdfBodyFont'] ? $this->conf['pdfBodyFont'] : 'helvetica';
		$bodyFontStyle = $this->conf['pdfBodyFontStyle'] ? $this->conf['pdfBodyFontStyle'] : '';
		$bodyFontSize = $this->conf['pdfBodyFontSize'] ? $this->conf['pdfBodyFontSize'] : 11;
		$bodyFontFile = $this->conf['pdfBodyFontFile'] ? $this->conf['pdfBodyFontFile'] : '';
		
		// set document information
		$pdf->SetAuthor($author);
		$pdf->SetTitle($title);
		$pdf->SetSubject('');
		$pdf->SetKeywords('');

		// set default header data
		// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

		// todo: replace all the TCPDF constants by our own definitions 
		
		// set header and footer fonts
		// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margins
		// todo: take margins from other source (TS)
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		//set some language-dependent strings
		$pdf->setLanguageArray($l);

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		$pdf->SetFont($bodyFont, $bodyFontStyle, $bodyFontSize, $bodyFontFile, 'default');

		// Add a page
		$pdf->AddPage();

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $body, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);

		// ---------------------------------------------------------

		// Close and output PDF document
		$pdf->Output($file, $outMode);
	}

}
