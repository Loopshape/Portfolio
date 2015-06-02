<?php
namespace Serfhos\MyMinifier\Handler;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;

/**
 * Handler: Handle compression for configured files
 *
 * @package Serfhos\MyMinifier\Handler
 */
class CompressionHandler implements \TYPO3\CMS\Core\SingletonInterface
{

    /**
     * Minimization Types
     *
     * @var integer
     */
    const MINIMIZE_JAVASCRIPT = 1;
    const MINIMIZE_CSS = 2;

    /**
     * @var string
     */
    protected $targetDirectory = 'typo3temp/compressor/my_minifier/';

    /**
     * @var \TYPO3\CMS\Core\Resource\ResourceCompressor
     */
    protected $compressor;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Check for existence of our targetDirectory
        if (!is_dir((PATH_site . $this->targetDirectory))) {
            GeneralUtility::mkdir_deep(PATH_site . $this->targetDirectory);
        }
    }

    /**
     * Minimize and concatenate javascript files for rendering
     *
     * @param array $files
     * @return void
     */
    public function compressJavascript(&$files)
    {
        if ($this->isEnabled(CompressionHandler::MINIMIZE_JAVASCRIPT)) {
            $files['jsLibs'] = $this->minifyFiles($files['jsLibs'], CompressionHandler::MINIMIZE_JAVASCRIPT);
            $files['jsFiles'] = $this->minifyFiles($files['jsFiles'], CompressionHandler::MINIMIZE_JAVASCRIPT);
            $files['jsFooterFiles'] = $this->minifyFiles($files['jsFooterFiles'], CompressionHandler::MINIMIZE_JAVASCRIPT);
        }

        // Always do default concatenating
        $files['jsLibs'] = $this->getCompressor()->concatenateJsFiles($files['jsLibs']);
        $files['jsFiles'] = $this->getCompressor()->concatenateJsFiles($files['jsFiles']);
        $files['jsFooterFiles'] = $this->getCompressor()->concatenateJsFiles($files['jsFooterFiles']);
    }

    /**
     * Minimize and concatenate css files for rendering
     *
     * @param array $files
     * @return void
     */
    public function compressCss(&$files)
    {
        if ($this->isEnabled(CompressionHandler::MINIMIZE_CSS)) {
            $files['cssFiles'] = $this->minifyFiles($files['cssFiles'], CompressionHandler::MINIMIZE_CSS);
        }

        // Always do default concatenating
        $files['cssFiles'] = $this->getCompressor()->concatenateCssFiles($files['cssFiles']);
    }

    /**
     * Minimize files
     *
     * @param array $files
     * @param integer $type
     * @return array
     */
    protected function minifyFiles(array $files, $type = CompressionHandler::MINIMIZE_JAVASCRIPT)
    {
        $filesAfterMinimization = array();
        foreach ($files as $fileName => $options) {
            if ((bool) $options['disableMinimization'] == false && (bool) $options['excludeFromConcatenation'] == false) {
                $options['disableMinimization'] = true;

                switch ($type) {
                    case CompressionHandler::MINIMIZE_JAVASCRIPT:
                        $minifiedFilename = $this->minifyJsFile($options['file']);
                        break;

                    case CompressionHandler::MINIMIZE_CSS:
                        $minifiedFilename = $this->minifyCssFile($options['file']);
                        break;

                    default:
                        $minifiedFilename = $options['file'];
                }

                $options['disableMinimization'] = true;
                $options['file'] = $minifiedFilename;
                $filesAfterMinimization[$minifiedFilename] = $options;
            } else {
                $filesAfterMinimization[$fileName] = $options;
            }
        }
        return $filesAfterMinimization;
    }

    /**
     * Minimize a javascript file
     *
     * @param string $fileName Source filename, relative to requested page
     * @return string Filename of the compressed file, relative to requested page
     */
    public function minifyJsFile($fileName)
    {
        // generate the unique name of the file
        $fileNameAbsolute = PATH_site . $fileName;
        if (@file_exists($fileNameAbsolute)) {
            $fileStatus = stat($fileNameAbsolute);
            $unique = $fileNameAbsolute . $fileStatus['mtime'] . $fileStatus['size'];
        } else {
            $unique = $fileNameAbsolute;
        }

        $pathInfo = PathUtility::pathinfo($fileName);
        $targetFile = $this->targetDirectory . 'javascript/' . $pathInfo['filename'] . '-' . md5($unique) . '.js';
        // only create it, if it doesn't exist, yet
        if (!file_exists((PATH_site . $targetFile))) {
            $contents = $this->getMinifyService()->minifyLocalJavascript($fileNameAbsolute);
            if ($contents === null) {
                return $fileName;
            } else {
                $this->getCompressor()->writeGeneratedFile($targetFile, $contents);
            }
        }
        return $targetFile;
    }

    /**
     * Minimize a style file
     *
     * @param string $fileName Source filename, relative to requested page
     * @return string Filename of the compressed file, relative to requested page
     */
    public function minifyCssFile($fileName)
    {
        // generate the unique name of the file
        $fileNameAbsolute = PATH_site . $fileName;
        if (@file_exists($fileNameAbsolute)) {
            $fileStatus = stat($fileNameAbsolute);
            $unique = $fileNameAbsolute . $fileStatus['mtime'] . $fileStatus['size'];
        } else {
            $unique = $fileNameAbsolute;
        }

        $pathInfo = PathUtility::pathinfo($fileName);
        $targetFile = $this->targetDirectory . 'styles/' . $pathInfo['filename'] . '-' . md5($unique) . '.css';
        // only create it, if it doesn't exist, yet
        if (!file_exists((PATH_site . $targetFile))) {
            $contents = $this->getMinifyService()->minifyLocalCss($fileNameAbsolute);
            if ($contents === null) {
                return $fileName;
            } else {
                $contents = $this->getCompressor()->cssFixRelativeUrlPaths(
                    $contents,
                    PathUtility::dirname($fileName) . '/'
                );
                $this->getCompressor()->writeGeneratedFile($targetFile, $contents);
            }
        }
        return $targetFile;
    }

    /**
     * Check if given type is enabled for minimization
     *
     * @param integer $type
     * @return boolean
     */
    protected function isEnabled($type)
    {
        $enabled = false;
        $configuration = $this->getTypoScriptFrontendController()->config['config']['my_minifier.'];
        if (!empty($configuration)) {
            switch ($type) {
                case CompressionHandler::MINIMIZE_JAVASCRIPT:
                    $enabled = (bool) $configuration['minimizeJs'];
                    break;
                case CompressionHandler::MINIMIZE_CSS:
                    $enabled = (bool) $configuration['minimizeCss'];
                    break;
            }
        }
        return $enabled;
    }

    /**
     * @return \Serfhos\MyMinifier\Service\MinifyService
     */
    protected function getMinifyService()
    {
        return GeneralUtility::makeInstance('Serfhos\\MyMinifier\\Service\\MinifyService');
    }

    /**
     * @return \Serfhos\MyMinifier\Resource\ResourceCompressor
     */
    protected function getCompressor()
    {
        if ($this->compressor === null) {
            $this->compressor = GeneralUtility::makeInstance('Serfhos\\MyMinifier\\Resource\\ResourceCompressor');
        }
        return $this->compressor;
    }

    /**
     * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    protected function getTypoScriptFrontendController()
    {
        return $GLOBALS['TSFE'];
    }
}