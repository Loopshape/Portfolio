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

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('formhandler') . 'Classes/Generator/FE/Tx_Formhandler_Generator_TcPdf.php');

/**
 * PDF generator class for Formhandler using TCPDF
 *
 * @author	Reinhard Führicht <rf@typoheads.at>
 */
class Tx_Formhandler_Generator_SkTcPdf extends Tx_Formhandler_Generator_TcPdf {


    /**
     * Function to generate a PDF file from submitted form values. This function is called by Tx_Formhandler_Controller_Backend
     *
     * @param array $records The records to export to PDF
     * @param array $exportFields A list of fields to export. If not set all fields are exported
     * @see Tx_Formhandler_Controller_Backend::generatePDF()
     * @return void
     */
    function generateModulePDF($records, $exportFields = array(), $fileName = 'formhandler.pdf') {
        if (!is_object($GLOBALS['TT'])) {
            $GLOBALS['TT'] = new \TYPO3\CMS\Core\TimeTracker\NullTimeTracker;
            $GLOBALS['TT']->start();
        }
        $this->globals = Tx_Formhandler_Globals::getInstance();
        $this->utilityFuncs->initializeTSFE($records[0]['pid']);
        $this->globals->setCObj($GLOBALS['TSFE']->cObj);
        $this->globals->setSettings($GLOBALS['TSFE']->tmpl->setup['plugin.']['Tx_Formhandler.']);
        $sessionClass = $this->utilityFuncs->getPreparedClassName($this->settings['session.'], 'Session_PHP');
        $session = $this->componentManager->getComponent($sessionClass);
        $session->init($this->gp, $this->settings['session.']['config.']);
        $session->start();
        $this->globals->setSession($session);
        $this->globals->getSession()->set('settings', $this->globals->getSettings());
        $this->globals->setLangFiles(array('EXT:sk_sfgv/Resources/Private/Language/registration.xml'));
        $options = $this->globals->getSettings();
        $this->init($records[0]['params'], $options['settings.']['predef.']['sfgv-registration.']['finishers.']['1.']['config.']['actions.']['pdf.']['config.']);
        $this->process();
        exit;
    }
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

        $this->pdf->ImageSVG($file=\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('sk_sfgv').'/Resources/Public/Images/sfgv_logo.svg', $x=101, $y=-25, $w=100, $h=100, $link='http://www.sfgv.ch', $align='', $palign='', $border=0, $fitonpage=false);

        $fontname = $this->pdf->addTTFfont(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('sk_sfgv').'/Resources/Public/Fonts/RotisSansSerif.ttf', 'TrueTypeUnicode', '', 32);
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
                $fileName = $GLOBALS['TSFE']->sL($fileName);
                foreach ($this->gp as $k => $v) {
                    $fileName = str_replace("{$k}", $v, $fileName);
                }
                $fileName = str_replace("{timestamp}", date("Y-m-d_H-i-s") ,$fileName);
                $fileName = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).])", '', $fileName);
                $fileName = preg_replace("([\.]{2,})", '', $fileName);
			}

			$this->pdf->Output($fileName, 'D');
			exit;
		}
	}
}

?>