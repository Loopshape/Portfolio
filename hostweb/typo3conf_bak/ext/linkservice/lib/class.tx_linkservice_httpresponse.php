<?php

class tx_linkservice_httpresponse {
    public $statusCode = 200;
    public $location = '';
    public $exception_message = '';

    /**
     * Set new location for url.
     * 
     * @param string $new_location
     * @param string $old_location
     * @throws Exception
     */
    public function setLocation($new_location, $old_location) {
        $new_location = trim($new_location);
        $old_parts = parse_url($old_location);
        $new_parts = parse_url($new_location);

        // An absolute location
        if (preg_match('|^https?://|', $new_location)) {
            $this->location = $new_location;
        }
        // A relative location
        else if (preg_match('|^/|', $new_location)) {
            $this->location = 'http://'. $old_parts['host'] . $new_location;
        }
        // An invalid location
        else {
            $this->statusCode = 503;
            throw new Exception('Invalid location returned "'.$new_location.'"');
        }

        // If the new url does not contain a fragment, but the old one did.
        // then use the old fragement.
        if ( !$new_parts['fragment'] && $old_parts['fragment']) {
            $this->location .= '#'.$old_parts['fragment'];
        }

        // Repair the location if it seems to contain broken double encodings
        $this->location = preg_replace('/&amp(;amp)*(%3b|;)/i', '&', $this->location);
    }

    /**
     * Check if response is permanent redirect.
     * 
     * @return boolean
     */
    public function isPermanentRedirect() {
        return $this->statusCode == 301 && $this->location;
    }

    /**
     * Check if response is a temporary redirect.
     *
     * @return boolean
     */
    public function isTemporaryRedirect() {
        return $this->location && ($this->statusCode == 302 || $this->statusCode == 303 || $this->statusCode == 307);
    }

    /**
     * Check if response is unavailable.
     *
     * @return boolean
     */
    public function isUnavailable() {
        return $this->statusCode >= 400 && $this->statusCode <= 499;
    }

    /**
     * Check if response is an error.
     * 
     * @return boolean
     */
    public function isError() {
        return $this->statusCode >= 500;
    }
}

