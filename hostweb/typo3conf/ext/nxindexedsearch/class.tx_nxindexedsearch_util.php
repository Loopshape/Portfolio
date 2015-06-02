<?php
/**
 * Copyright notice
 * 
 * (c) 2008 netlogix GmbH & Co. KG (Stefan.Braune@netlogix.de)
 * All rights reserved
 * 
 * This script is part of the TYPO3 project. The TYPO3 project is 
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * 
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * Class with static utility methods, used by the indexed search. This class is part of the 
 * 'nxindexedsearch' extension.
 *
 * @author netlogix GmbH & Co. KG (Stefan Braune) <Stefan.Braune@netlogix.de>
 */
class tx_nxindexedsearch_util
{
	/**
	 * Removes stop words, SGML tags and special characters and replaces mutated vowels in the $dataString and returns the result.
	 *
	 * @param string $dataString
	 * @return string
	 */
	public static function transformString($dataString) {
		$stopWords = '/ aber | alle | allen | alles | als | also | andere | anderem | anderer | anderes '
			. '| anders | auch | auf | aus | ausser | ausserdem | bei | beide | beiden | beides | beim '
			. '| bereits | bestehen | besteht | bevor | bin | bis | bloss | brauchen | braucht | dabei '
			. '| dadurch | dagegen | daher | damit | danach | dann | darf | darueber | darum | darunter '
			. '| das | dass | davon | dazu | dem | den | denn | der | des | deshalb | dessen | die | dies '
			. '| diese | diesem | diesen | dieser | dieses | doch | dort | duerfen | durch | durfte | durften '
			. '| ebenfalls | ebenso | ein | eine | einem | einen | einer | eines | einige | einiges | einzig '
			. '| entweder | erst | erste | ersten | etwa | etwas | falls | fast | ferner | folgender | folglich '
			. '| fuer | ganz | geben | gegen | gehabt | gekonnt | gemaess | getan | gewesen | gewollt | geworden '
			. '| gibt | habe | haben | haette | haetten | hallo | hat | hatte | hatten | heraus | herein | hier '
			. '| hin | hinein | hinter | ich | ihm | ihn | ihnen | ihr | ihre | ihrem | ihren | ihres | immer '
			. '| indem | infolge | innen | innerhalb | ins | inzwischen | irgend | irgendwas | irgendwen '
			. '| irgendwer | irgendwie | irgendwo | ist | jede | jedem | jeden | jeder | jedes | jedoch | jene '
			. '| jenem | jenen | jener | jenes | kann | kein | keine | keinem | keinen | keiner | keines '
			. '| koennen | koennte | koennten | konnte | konnten | kuenftig | leer | machen | macht | machte '
			. '| machten | man | mehr | mein | meine | meinen | meinem | meiner | meist | meiste | meisten '
			. '| mich | mit | moechte | moechten | muessen | muessten | muss | musste | mussten | nach | nachdem '
			. '| nacher | naemlich | neben | nein | nicht | nichts | noch | nuetzt | nur | nutzt | obgleich '
			. '| obwohl | oder | ohne | per | pro | rund | schon | sehr | seid | sein | seine | seinem | seinen '
			. '| seiner | seit | seitdem | seither | selber | sich | sie | siehe | sind | sobald | solange '
			. '| solch | solche | solchem | solchen | solcher | solches | soll | sollen | sollte | sollten '
			. '| somit | sondern | soweit | sowie | spaeter | stets | such | ueber | ums | und | uns | unser '
			. '| unsere | unserem | unseren | viel | viele | vollstaendig | vom | von | vor | vorbei | vorher '
			. '| vorueber | waehrend | waere | waeren | wann | war | waren | warum | was | wegen | weil | weiter '
			. '| weitere | weiterem | weiteren | weiterer | weiteres | weiterhin | welche | welchem | welchen '
			. '| welcher | welches | wem | wen | wenigstens | wenn | wenngleich | wer | werde | werden | weshalb '
			. '| wessen | wie | wieder | will | wir | wird | wodurch | wohin | wollen | wollte | wollten | worin '
			. '| wuerde | wuerden | wurde | wurden | zufolge | zum | zusammen | zur | zwar | zwischen /';
	
		$replaceChars = array(
			"ä" => "ae",
			"ö" => "oe",
			"ü" => "ue",
			"ß" => "ss"
		);
		
		$dataString = trim(stripslashes(preg_replace("/<[^>]*>/", " ", strtolower($dataString))));
		$dataString = str_replace(array_keys($replaceChars), array_values($replaceChars), $dataString);
		$dataString = str_replace(array('^', '°', '!', '"', '§', '$', '%', '&', '/', '(', ')', '=', '?', '`', '*', 
			'\'', '_', ':', ',', ';', '{', '[', ']', '}', '\\'), ' ', $dataString);
		$dataString = preg_replace('/[^0-9a-z\+\-\.#\s]/', '', $dataString);
		$dataString = trim(preg_replace($stopWords, ' ', $dataString));
		
		// Special handling of characters: . - + #
		$extraString = ' ';
		preg_match_all("/([a-z]*[\+\-#\.]+[a-z]*)/", $dataString, $matches);
		foreach ($matches[1] as $match) {
			$extraString .= strlen($match) > 2 ? $match . ' ' : '';
		}
		
		$dataString  = preg_replace("/[\+\-#\.]+/", ' ', $dataString);
		$dataString .= $extraString;
		
		$dataString = preg_replace('/\s+[0-9a-z\+\-#\.]{0,2}\s+/', ' ', $dataString);
		$dataString = preg_replace('/\s+/', ' ', $dataString);
		
		return $dataString;
	}
	
	/**
	 * Transforms the $dataString with <code>string tx_nxindexedsearch_indexer::transformString(string)</code> and
	 * splits it into pieces.
	 *
	 * @param string $dataString
	 */
	public static function splitTransformString($dataString) {
		return explode(' ', tx_nxindexedsearch_util::transformString($dataString));
	}
	
	/**
	 * Returns an array which contains all known datasources. Each element is a object with the following public properties:
	 * <ul>
	 * <li>dataSourceId - the unique ID of the datasource</li>
	 * <li>dataSourceKey - the MySQL table name of the datasource</li>
	 * <li>indexCategory - the category name</li>
	 * <li>pageId - the root page of the index</li>
	 * </ul>
	 *
	 * @return array
	 */
	public static function getKnownDataSources() {
		$dataSources = array();
		$result      = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid, source_table, source_category, source_page', 'tx_nxindexedsearch_sources', '');
		while (($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) != false) {
			$dataSources[$record['uid']] = new stdClass();
			$dataSources[$record['uid']]->dataSourceId  = $record['uid'];
			$dataSources[$record['uid']]->dataSourceKey = $record['source_table']; 
			$dataSources[$record['uid']]->indexCategory = $record['source_category'];
			$dataSources[$record['uid']]->pageId        = $record['source_page'];
		}
		
		return $dataSources;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/class.tx_nxindexedsearch_util.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/nxindexedsearch/class.tx_nxindexedsearch_util.php']);
}
?>