<?php
/***************************************************************
*  Copyright notice
*  
*  (c) 2003 Mathieu VIDAL (mathaaus.typo3@gmail.com)
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is 
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
/** 
 * Plugin 'Lexical search' for the 'lexical_search' extension.
 *
 * @author	Mathieu VIDAL <mathaaus.typo3@gmail.com>
 */


require_once(PATH_tslib."class.tslib_pibase.php");

class tx_lexicalsearch_pi1 extends tslib_pibase {
	var $prefixId = "tx_lexicalsearch_pi1";		// Same as class name
	var $scriptRelPath = "pi1/class.tx_lexicalsearch_pi1.php";	// Path to this script relative to the extension dir.
	var $extKey = "lexical_search";	// The extension key.
	
	/**
	 * [Put your description here]
	 */
	function main($content,$conf)	{
		$GLOBALS["TSFE"]->set_no_cache();
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		$this->local_cObj =t3lib_div::makeInstance("tslib_cObj");		// Local cObj.
		$this->id_page  = $GLOBALS["TSFE"]->id;
		$this->lettre = t3lib_div::GPvar("lettre");
		$this->mot = t3lib_div::GPvar("mot");

		$alphabet = array("#"=>0, "A"=>0, "B"=>0, "C"=>0, "D"=>0, "E"=>0, "F"=>0, "G"=>0, "H"=>0, "I"=>0, "J"=>0, "K"=>0, "L"=>0, "M"=>0, "N"=>0, "O"=>0, "P"=>0, "Q"=>0, "R"=>0, "S"=>0, "T"=>0, "U"=>0, "V"=>0, "W"=>0, "X"=>0, "Y"=>0, "Z"=>0);

		$select = "select uid,tx_lexicalsearch_keywords from pages where tx_lexicalsearch_keywords!='' ".$this->local_cObj->enableFields("pages");
		$resultat = mysql(TYPO3_db,$select);

		/*
		 * Selection of link letter and update of field tx_lexicalsearch_keywords of the table pages to put in good format
		 */
		while ($row=mysql_fetch_assoc($resultat)) {
			$mise_a_jour="";
			$liste=explode(";",trim($row["tx_lexicalsearch_keywords"]));
			while (list ($key, $val) = each ($liste)) {
				$lettre=substr(trim($val),0,1);
				$alphabet[strtoupper($lettre)]=1;
				$mise_a_jour.=strtoupper(substr(trim($val),0,1)).strtolower(substr(trim($val),1,strlen($val))).";";
			}

			$requete_maj="update pages set tx_lexicalsearch_keywords='".substr($mise_a_jour,0,strlen($mise_a_jour)-1)."' where uid=".$row["uid"];
			mysql(TYPO3_db,$requete_maj);
		}
		
		/*
		 * Display of the alphabet on top page
		 */
		while (list ($key, $val) = each ($alphabet)) {
			if ($val==1) {
				$content.="<a href=index.php?id=".$this->id_page."&lettre=".$key.">".$this->applyWrap($key, $this->conf["alphabetWrapLink"])."</a>";
			}
			elseif ($this->conf["displayAlphabet"]) {
				$content.=$this->applyWrap($key,$this->conf["alphabetWrap"]);
			}
		}

		$content=$this->applyWrap($content,$this->conf["globalAlphabetWrap"]);

		/*
		 * Treatment after the selection of a letter
		 */
		if ($this->lettre) {
			$content.="<br><br>";
			
			// Display of the letter on head of list
			$content.=$this->applyWrap($this->lettre, $this->conf["headLetterWrap"])."<br><p>";

			$compteur=0;
			// Select of list of key word
			$select = "select tx_lexicalsearch_keywords from pages where tx_lexicalsearch_keywords!='' ".$this->local_cObj->enableFields("pages");
			$resultat = mysql(TYPO3_db,$select);

			// Search of word with the good first letter
			while ($row=mysql_fetch_assoc($resultat)) {
				$liste=explode(";",trim($row["tx_lexicalsearch_keywords"]));
				while (list ($key, $val) = each ($liste)) {
					$lettre=substr($val,0,1);
					if ($lettre==$this->lettre) {
						$find=false;
						for ($i=0;$i<$compteur;$i++) {
							if ($mots[$i]==$val)
								$find=true;
						}
						if (!($find)) {
							$mots[$compteur]=$val;
							$compteur++;
						}
					}
				}
			}

			// Sort of the table with all words with good letter
			sort($mots);
			reset($mots);
			
			/*
			 * Display of words, if one link, the link is on word, if several link the link is on the new display list
			 */
			while (list ($key, $val) = each ($mots)) {
				$select = "select uid from pages where tx_lexicalsearch_keywords like '%".$val."%' ".$this->local_cObj->enableFields("pages");
				$resultat = mysql(TYPO3_db,$select);

				if (mysql_num_rows($resultat) > 1) {
					$content.="<a href=index.php?id=".$this->id_page."&lettre=".$this->lettre."&mot=".$val.">".$this->applyWrap($val,$this->conf["wordWrap"])."</a><br>";
					if ($this->mot) {
						$select_liste = "select uid, tx_lexicalsearch_keywords from pages where tx_lexicalsearch_keywords like '%".$this->mot.";%' ".$this->local_cObj->enableFields("pages");
						$resultat_liste = mysql(TYPO3_db,$select_liste);
						while ($row_liste=mysql_fetch_assoc($resultat_liste)) {
							$content.="<a href=index.php?id=".$row_liste["uid"].">".$this->applyWrap(str_replace (";", " ", $row_liste["tx_lexicalsearch_keywords"]), $this->conf["wordListWrap"])."</a><br>";
						}
					}
				}
				else {
					$row=mysql_fetch_assoc($resultat);
					$page=$row["uid"];
					$content.="<a href=index.php?id=".$page.">".$this->applyWrap($val, $this->conf["wordWrap"])."</a><br>";
				}
			}

			$content.="</p>";
		}
			
		return $this->pi_wrapInBaseClass($content);
	}

	/*
	 * Apply wrap on a text
	 */
	function applyWrap($text, $wrap) {
		list($avant,$apres)=explode("|",$wrap);
		$result=$avant.$text.$apres;
		return $result;
	}
}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/lexical_search/pi1/class.tx_lexicalsearch_pi1.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/lexical_search/pi1/class.tx_lexicalsearch_pi1.php"]);
}

?>