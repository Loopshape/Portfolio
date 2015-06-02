<?php
namespace Serfhos\MyMinifier\Service;

/**
 * Service: Minify different objects (css/js)
 *
 * @package Serfhos\MyMinifier\Service
 */
class MinifyService implements \TYPO3\CMS\Core\SingletonInterface
{

    /**
     * Minimize javascript via closure-compiler
     *
     * @param string $content
     * @return string
     */
    public function minifyJavascript($content)
    {
        $compileApi = 'http://closure-compiler.appspot.com/compile';
        $arguments = array(
            'js_code' => $content,
            'compilation_level' => 'SIMPLE_OPTIMIZATIONS',
            'output_format' => 'text',
            'output_info' => 'compiled_code',
        );

        $headers = array();
        $response = trim($this->postURL($compileApi, $arguments, $headers));

        if (!empty($response) && !preg_match('/^Error\(\d\d?\):/', $response)) {
            return $response;
        }
        return null;
    }

    /**
     * Minimize Cascading Style Sheets via css-minifier
     *
     * @param string $content
     * @return string
     */
    public function minifyCss($content)
    {
        $compileApi = 'http://cssminifier.com/raw';
        $arguments = array(
            'input' => $content,
        );

        $headers = array();
        $response = trim($this->postURL($compileApi, $arguments, $headers));
        if (!empty($response) && !preg_match('/^Error\(\d\d?\):/', $response)) {
            return $response;
        }
        return null;
    }

    /**
     * Minimize local javascript file
     *
     * @param string $filename
     * @return string
     */
    public function minifyLocalJavascript($filename)
    {
        $content = file_get_contents($filename);
        return $this->minifyJavascript($content);
    }

    /**
     * Minimize local css file
     *
     * @param string $filename
     * @return string
     */
    public function minifyLocalCss($filename)
    {
        $content = file_get_contents($filename);
        return $this->minifyCss($content);
    }

    /**
     * Post parameters to url for API outputs
     *
     * @param string $url
     * @param array $parameters
     * @param array $report
     * @return string
     */
    protected function postURL($url, array $parameters, &$report = null)
    {
        $content = false;
        $curlSetup = array(
            'curlUse' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['curlUse'],
            'curlTimeout' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['curlTimeout'],
            'curlProxyServer' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['curlProxyServer'],
            'curlProxyTunnel' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['curlProxyTunnel'],
            'curlProxyUserPass' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['curlProxyUserPass'],
        );

        if (isset($report)) {
            $report['error'] = 0;
            $report['message'] = '';
        }

        if ($curlSetup['curlUse'] == '1' && preg_match('/^(?:http|ftp)s?|s(?:ftp|cp):/', $url)) {
            if (isset($report)) {
                $report['lib'] = 'cURL';
            }

            // External URL without error checking.
            $ch = curl_init();
            if (!$ch) {
                if (isset($report)) {
                    $report['error'] = -1;
                    $report['message'] = 'Couldn\'t initialize cURL.';
                }
                return false;
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
            // some sites need a user-agent
            curl_setopt($ch, CURLOPT_USERAGENT, 'My-Minifier/1.0');

            // may fail (PHP 5.2.0+ and 5.1.5+) when open_basedir or safe_mode are enabled
            $followLocation = @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

            if (!empty($curlSetup['curlProxyServer'])) {
                curl_setopt($ch, CURLOPT_PROXY, $curlSetup['curlProxyServer']);

                if (!empty($curlSetup['curlProxyTunnel'])) {
                    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, $curlSetup['curlProxyTunnel']);
                }
                if (!empty($curlSetup['curlProxyUserPass'])) {
                    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $curlSetup['curlProxyUserPass']);
                }
            }
            $content = curl_exec($ch);
            if (isset($report)) {
                $curlInfo = curl_getinfo($ch);
                $report['headers'] = $curlInfo;
                if ($content === false) {
                    $report['error'] = curl_errno($ch);
                    $report['message'] = curl_error($ch);
                } else {
                    // We hit a redirection but we couldn't follow it
                    if (!$followLocation && $curlInfo['status'] >= 300 && $curlInfo['status'] < 400) {
                        $report['error'] = -1;
                        $report['message'] = 'Couldn\'t follow location redirect (either PHP configuration option safe_mode or open_basedir is in effect).';
                    }
                }
            }
            curl_close($ch);
        } else {
            \TYPO3\CMS\Core\Utility\GeneralUtility::devLog('curl is not enabled', 'eur_library', 3);
        }

        return $content;
    }
}