<?php

class tx_linkservice_httpheadquery {
    // Settings
    public $http_timeout = 5;

    public function submitUrl($url) {
        // Collect url parts and assemble in our usable parts
        $parts = parse_url($url);
        $host = $parts['host'];
        $path = $parts['path'];

        // We always have some port.
        if ($parts['port']) {
            $port = $parts['port'];
        }
        else {
            $port = 80;
        }

        // Query is just appended to URL
        if ($parts['query']) {
            $path .= '?'.$parts['query'];
        }

        $protocol = $parts['scheme'];
        $response = t3lib_div::makeInstance('tx_linkservice_httpresponse');

        try {
            // We will not handle urls using usernames/passwords
            if ($parts['password'] || $parts['username']) {
                $response->statusCode = 401;
                throw new Exception('Username and password not supported in url');
            }

            // We are using curl to resolve our links
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $protocol . '://' . $host . $path);
            curl_setopt($ch, CURLOPT_USERAGENT, 'TYPO3CMS; crawler; linkservice; https://github.com/dschledermann/typo3-linkservice;');
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->http_timeout);
            curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);

            if ($info['redirect_url']) {
                $response->setLocation($info['redirect_url'], $url);
            }

            // Some valid response
            if ($info['http_code']) {
                $response->statusCode = $info['http_code'];
            }
            else {
                $response->statusCode = 503;
                throw new Exception('Empty response invalid');
            }
        }
        catch (Exception $e) {
            // Something went wrong
            $response->exception_message = $e->getMessage();

            // If no other status code - use 503.
            if (!$response->statusCode) {
                $response->statusCode = 503;
            }
        }

        return $response;
    }
}
