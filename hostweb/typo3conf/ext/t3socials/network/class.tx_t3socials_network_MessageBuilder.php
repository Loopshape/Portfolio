<?php
/***************************************************************
*  Copyright notice
*
 * (c) 2014 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
 * All rights reserved
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
require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');

/**
 * Basis Message Builder
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Rene Nitzsche <rene@system25.de>
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_MessageBuilder {

	/**
	 * Liefert den Verbinder zwischen Titel und Content.
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return integer
	 */
	protected function getContentDelimiter(tx_t3socials_models_IMessage $message) {
		return CRLF . CRLF;
	}

	/**
	 * Liefert die Maximale Anzahl an Zeichen für den Inhalt.
	 * 0 = Unlimited
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return integer
	 */
	protected function getMaxContentLength(tx_t3socials_models_IMessage $message) {
		return 0;
	}

	/**
	 * Liefert den text, der angehängt werden soll, wenn der Content zu kurz ist.
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return string
	 */
	protected function getCropAfterString(tx_t3socials_models_IMessage $message) {
		return ' ...';
	}


	/**
	 * Erzeugt anhand einers Message Models eine Statusmeldung.
	 *
	 * @param tx_t3socials_models_IMessage $message
	 * @return string|array string with message or array with post data
	 */
	public function build(tx_t3socials_models_IMessage $message) {
		$title = $this->html2plain($message->getHeadline());
		$content = $message->getIntro() ? $message->getIntro() : $message->getMessage();
		$content = $this->html2plain($content);
		$url = $message->getUrl();

		$out = '';

		$contentDelimiter = $this->getContentDelimiter($message);
		$maxChars = $this->getMaxContentLength($message);
		$charsAvailable = $maxChars;

		// wir kürzen ggf. den Titel
		if ($maxChars > 0) {
			$title = $this->cropText($title, $charsAvailable, $this->getCropAfterString($message));
		}
		$out .= $title;

		// haben wir content?
		if (!empty($content)) {
			$charsAvailable = $maxChars - $this->getStrLen($out);
			if (!empty($out)) {
				$charsAvailable -= $this->getStrLen($contentDelimiter);
			}
			// wenn noch Platz ist, erweitern wir den titel um den content
			// wir adden den Content zum Titel
			if ($maxChars > 0) {
				$content = $this->cropText($content, $charsAvailable, $this->getCropAfterString($message));
			}
			// add content delimiter if necessary
			$out .= empty($out) ? '' : $contentDelimiter;
			$out .= $content;
		}

		// ggf url hinzufügen
		$out .= empty($out) || empty($url) ? '' : $contentDelimiter;
		$out .= $url;

		return $out;
	}

	/**
	 * Ermittelt die Länge eines Strings.
	 *
	 * @param string $text
	 * @param string $encoding
	 * @return string
	 */
	protected function getStrLen($text, $encoding = 'utf-8') {
		$text = (string) $text;
		return extension_loaded('mbstring')
			? mb_strlen($text, $encoding)
			: strlen($text);
	}

	/**
	 * Convert HTML to plain text
	 *
	 * Removes HTML tags and HTML comments and converts HTML entities
	 * to their applicable characters.
	 *
	 * @param string $text
	 * @param array $options
	 * @return string Converted string (utf8-encoded)
	 */
	protected function html2plain($text, array $options = array()) {
		if (!is_string($text)) {
			return $text;
		}

		// sollen zeilenumbrüche übernommen werden? default is ON
		$whitespaces = isset($options['lineendings']) && !$options['lineendings'] ? FALSE : TRUE;
		$whitespaces = $whitespaces ? '[ \t\f]' : '\s';

		$replaces = array(
			// whitespaces durch leerzeichen ersetzen
			'/(' . $whitespaces . '+|(<.*?>)+)/' => ' ',
			// html kommentare entfernen
			'/<!--.*?-->/' => ' ',
		);

		return trim(
			html_entity_decode(
				preg_replace(
					array_keys($replaces),
					array_values($replaces),
					$text
				),
				ENT_QUOTES,
				'UTF-8'
			)
		);
	}

	/**
	 * Crop text. This modified method is taken from TYPO3 stdWrap
	 *
	 * @param string $text
	 * @param int $chars maximum length of string
	 * @param string $afterstring Something like "..."
	 * @return string
	 */
	protected function cropText($text, $chars, $afterstring) {
		if ($this->getStrLen($text) < $chars) {
			return $text;
		}
		$crop2space = TRUE;
		// Kürzen
		$text = substr($text, 0, ($chars - $this->getStrLen($afterstring)));
		$truncAt = strrpos($text, ' ');
		$text = ($truncAt && $crop2space)
			? substr($text, 0, $truncAt) . $afterstring
			: $text . $afterstring;
		return $text;
	}


}

if (
	defined('TYPO3_MODE') &&
	$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/class.tx_t3socials_network_MessageBuilder.php']
) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/class.tx_t3socials_network_MessageBuilder.php']);
}
