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

/**
 * PDF generator class for Formhandler using TCPDF
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Generator_TcPdf extends Tx_Formhandler_AbstractGenerator {

	/**
	 * Renders the CSV.
	 *
	 * @return void
	 */
	public function process() {

        $this->pdf = $this->componentManager->getComponent('Tx_Formhandler_Template_TCPDFSFGV');
        $this->pdf->SetMargins(25, 10, 15, true);


		$this->pdf->setHeaderText($this->utilityFuncs->getSingle($this->settings, 'headerText'));
        $this->pdf->setFooterText($this->utilityFuncs->getSingle($this->settings, 'footerText'));
        $this->pdf->SetFooterMargin(0);



		$this->pdf->AddPage();

        $this->pdf->ImageSVG($file='fileadmin/sfgv_logo.svg', $x=101, $y=-25, $w=100, $h=100, $link='http://www.sfgv.ch', $align='', $palign='', $border=0, $fitonpage=false);

		//$this->pdf->SetFont('RotisSansSerif', '', 10);
        $fontname = $this->pdf->addTTFfont('fileadmin/RotisSansSerif.ttf', 'TrueTypeUnicode', '', 32);
        $this->pdf->SetFont($fontname, '', 9, '', false);

        $view = $this->componentManager->getComponent('Tx_Formhandler_View_PDF');
		$this->filename = FALSE;
		if (intval($this->settings['storeInTempFile']) === 1) {
			$this->outputPath = $this->utilityFuncs->getDocumentRoot();
			if ($this->settings['customTempOutputPath']) {
				$this->outputPath .= $this->settings['customTempOutputPath'];
			} else {
				$this->outputPath .= '/typo3temp/';
			}
			$this->outputPath = $this->utilityFuncs->sanitizePath($this->outputPath);
			$this->filename = $this->outputPath . $this->settings['filePrefix'] . $this->utilityFuncs->generateHash() . '.pdf';

			$this->filenameOnly = $this->utilityFuncs->getSingle($this->settings, 'staticFileName');
			if(strlen($this->filenameOnly) === 0) {
				$this->filenameOnly = basename($this->filename);
			}
		}

		$this->formhandlerSettings = $this->globals->getSettings();
		$suffix = $this->formhandlerSettings['templateSuffix'];
		$this->templateCode = $this->utilityFuncs->readTemplateFile(FALSE, $this->formhandlerSettings);
		if($this->settings['templateFile']) {
			$this->templateCode = $this->utilityFuncs->readTemplateFile(FALSE, $this->settings);
		}
		if ($suffix) {
			$view->setTemplate($this->templateCode, 'PDF' . $suffix);
		}
		if (!$view->hasTemplate()) {
			$view->setTemplate($this->templateCode, 'PDF');
		}
		if (!$view->hasTemplate()) {
			$this->utilityFuncs->throwException('no_pdf_template');
		}

		$view->setComponentSettings($this->settings);
		$content = $view->render($this->gp, array());

		$this->pdf->writeHTML($content);

		$returns = $this->settings['returnFileName'];

        //$this->$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));




		if ($this->filename !== FALSE) {
			$this->pdf->Output($this->filename, 'F');

			$downloadpath = $this->filename;
			if ($returns) {
				return $downloadpath;
			}
			$downloadpath = str_replace($this->utilityFuncs->getDocumentRoot(), '', $downloadpath);
			header('Location: ' . $downloadpath);
			exit;
		} else {
			$fileName = 'formhandler.pdf';
			if($this->settings['outputFileName']) {
				$fileName = $this->utilityFuncs->getSingle($this->settings, 'outputFileName');
			}
			$this->pdf->Output($fileName, 'D');
			exit;
		}
	}

	/* (non-PHPdoc)
	 * @see Classes/Generator/Tx_Formhandler_AbstractGenerator#getComponentLinkParams($linkGP)
	*/
	protected function getComponentLinkParams($linkGP) {
		$prefix = $this->globals->getFormValuesPrefix();
		$tempParams = array(
			'action' => 'pdf'
		);
		$params = array();
		if ($prefix) {
			$params[$prefix] = $tempParams;
		} else {
			$params = $tempParams;
		}
		return $params;
	}
}

?>