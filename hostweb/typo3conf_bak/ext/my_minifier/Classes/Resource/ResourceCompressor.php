<?php
namespace Serfhos\MyMinifier\Resource;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Compressor: ResourceCompressor
 * Make protected functions public
 *
 * @package Serfhos\MyMinifier\Resource
 */
class ResourceCompressor extends \TYPO3\CMS\Core\Resource\ResourceCompressor
{

    /**
     * Public: Fix relative URL paths
     *
     * @param string $contents
     * @param string $oldDir
     * @return string
     */
    public function cssFixRelativeUrlPaths($contents, $oldDir)
    {
        return parent::cssFixRelativeUrlPaths($contents, $oldDir);
    }

    /**
     * Writes $contents into file $filename together with a gzipped version into $filename.gz
     *
     * @param string $filename Target filename
     * @param string $contents File contents
     * @return void
     */
    public function writeGeneratedFile($filename, $contents)
    {
        $this->ensureDirectoryExists($filename);
        GeneralUtility::writeFile(PATH_site . $filename, $contents);
    }

    /**
     * Make sure the given directory exists before writing the file
     *
     * @param string $filename
     * @return void
     */
    public function ensureDirectoryExists($filename)
    {
        $directory = dirname(PATH_site . $filename);
        if (!is_dir($directory)) {
            GeneralUtility::mkdir_deep($directory);
        }
    }
}
