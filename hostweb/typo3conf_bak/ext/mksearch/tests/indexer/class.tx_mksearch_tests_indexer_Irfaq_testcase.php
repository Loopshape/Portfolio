<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 DMK E-Business GmbH
*  All rights reserved
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
require_once t3lib_extMgm::extPath('mksearch', 'lib/Apache/Solr/Document.php');
tx_rnbase::load('tx_mksearch_tests_DbTestcase');
tx_rnbase::load('tx_mksearch_tests_Util');

/**
 * Wir müssen in diesem Fall mit der DB testen da wir die pages
 * Tabelle benötigen
 *
 * @package tx_mksearch
 * @subpackage tx_mksearch_tests
 * @author Hannes Bochmann <hannes.bochmann@dmk-ebusiness.de>
 * @author Michael Wagner <michael.wagner@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_mksearch_tests_indexer_Irfaq_testcase
	extends tx_mksearch_tests_DbTestcase {

	/**
	 * Constructs a test case with the given name.
	 *
	 * @param string $name the name of a testcase
	 * @param array $data ?
	 * @param string $dataName ?
	 */
	public function __construct($name = NULL, array $data = array(), $dataName = '') {
		parent::__construct($name, $data, $dataName);
		$this->importExtensions[] = 'irfaq';
		$this->importDataSets[] = tx_mksearch_tests_Util::getFixturePath('db/irfaq_q.xml');
		$this->importDataSets[] = tx_mksearch_tests_Util::getFixturePath('db/irfaq_cat.xml');
		$this->importDataSets[] = tx_mksearch_tests_Util::getFixturePath('db/irfaq_q_cat_mm.xml');
		$this->importDataSets[] = tx_mksearch_tests_Util::getFixturePath('db/irfaq_expert.xml');
	}

	/**
	 * Prüft ob nur die Elemente indiziert werden, die im
	 * angegebenen Seitenbaum liegen
	 */
	public function testPrepareSearchDataWhenTableQuestionsWithExpert() {
		//Testdaten aus DB holen
		$aOptions = array(
			'where' => 'tx_irfaq_q.uid=1',
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_irfaq_q', $aOptions);

		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_Irfaq');
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = array();

		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_q', $aResult[0], $indexDoc, $options)->getData();

		//Common
		$this->assertEquals(
			87,
			$aIndexDoc['sorting_i']->getValue(),
			'Es wurde nicht die richtige Sortierung indiziert!'
		);
		$this->assertEquals(
			'1. FAQ',
		$aIndexDoc['q_s']->getValue(),
			'Es wurde nicht die richtige Frage indiziert!'
		);
		$this->assertEquals(
			'You have to know this and this',
			$aIndexDoc['a_s']->getValue(),
			'Es wurde nicht der richtige Fragetext indiziert!'
		);
		$this->assertEquals(
			'<span>You have to know this and this</span>',
			$aIndexDoc['a_with_html_s']->getValue(),
			'Es wurde nicht der richtige Fragetext mit HTML indiziert!'
		);
		$this->assertEquals(
			'something related',
			$aIndexDoc['related_s']->getValue(),
			'Es wurde nicht das richtige related indiziert!'
		);
		$this->assertEquals(
			'some related links',
			$aIndexDoc['related_links_s']->getValue(),
			'Es wurden nicht die richtigen related Links indiziert!'
		);
		$this->assertEquals(
			'some files',
			$aIndexDoc['faq_files_s']->getValue(),
			'Es wurde nicht der richtige Dateien indiziert!'
		);
		$this->assertEquals(
			123,
			$aIndexDoc['tstamp']->getValue(),
			'Es wurde nicht der richtige tstamp indiziert!'
		);
		//Expert
		$this->assertEquals(
			1,
			$aIndexDoc['expert_i']->getValue(),
			'Es wurde nicht der richtige Experte indiziert!'
		);
		$this->assertEquals(
			'1. Expert',
			$aIndexDoc['expert_name_s']->getValue(),
			'Es wurde nicht der richtige Expertenname indiziert!'
		);
		$this->assertEquals(
			'mail@expert.de',
			$aIndexDoc['expert_email_s']->getValue(),
			'Es wurde nicht die richtige Expertenmail indiziert!'
		);
		$this->assertEquals(
			'some url',
			$aIndexDoc['expert_url_s']->getValue(),
			'Es wurde nicht die richtige Expertenurl indiziert!'
		);
		//Categories
		$this->assertEquals(
			array(0=>'1',1=>'2'),
			$aIndexDoc['category_mi']->getValue(),
			'Es wurden nicht die richtigen Kategorie-Uids indiziert!'
		);
		$this->assertEquals(
			array(0=>'47',1=>'48'),
			$aIndexDoc['category_sorting_mi']->getValue(),
			'Es wurden nicht die richtigen Kategorie-Sortierungen indiziert!'
		);
		$this->assertEquals(
			array(0=>'1. FAQ Category',1=>'2. FAQ Category'),
			$aIndexDoc['category_title_ms']->getValue(),
			'Es wurden nicht die richtigen Kategorie-Titel indiziert!'
		);
		$this->assertEquals(
			array(0=>'1. Shortcut',1=>'2. Shortcut'),
			$aIndexDoc['category_shortcut_ms']->getValue(),
			'Es wurden nicht die richtigen Kategorie-Shortcuts indiziert!'
		);
		$this->assertEquals(
			'1. Shortcut',
			$aIndexDoc['category_first_shortcut_s']->getValue(),
			'Es wurden nicht der richtige erste Kategorie-Shortcut indiziert!'
		);
	}

	/**
	 * Prüft ob nur die Elemente indiziert werden, die im
	 * angegebenen Seitenbaum liegen
	 */
	public function testPrepareSearchDataWhenTableQuestionsWithoutExpert() {
		//Testdaten aus DB holen
		$aOptions = array(
			'where' => 'tx_irfaq_q.uid=3',
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_irfaq_q', $aOptions);

		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_Irfaq');
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = array();

		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_q', $aResult[0], $indexDoc, $options)->getData();

		//Common
		$this->assertEquals(99,$aIndexDoc['sorting_i']->getValue(),'Es wurde nicht die richtige Sortierung indiziert!');
		$this->assertEquals('3. FAQ',$aIndexDoc['q_s']->getValue(),'Es wurde nicht die richtige Frage indiziert!');
		$this->assertEquals('You have to know nothing',$aIndexDoc['a_s']->getValue(),'Es wurde nicht der richtige Fragetext indiziert!');
		$this->assertNull($aIndexDoc['related_s'],'Es wurde doch related indiziert!');
		$this->assertNull($aIndexDoc['related_links_s'],'Es wurden doch related Links indiziert!');
		$this->assertNull($aIndexDoc['faq_files_s'],'Es wurde doch Dateien indiziert!');
		//Expert
		$this->assertNull($aIndexDoc['expert_i'],'Es wurde doch ein Experte indiziert!');
		$this->assertNull($aIndexDoc['expert_name_s'],'Es wurde doch ein Expertenname indiziert!');
		$this->assertNull($aIndexDoc['expert_email_s'],'Es wurde doch eine Expertenmail indiziert!');
		$this->assertNull($aIndexDoc['expert_url_s'],'Es wurde doch eine Expertenurl indiziert!');
		//Categories
		$this->assertEquals(array(0=>'2'),$aIndexDoc['category_mi']->getValue(),'Es wurden nicht die richtigen Kategorie-Uids indiziert!');
		$this->assertEquals(array(0=>'48'),$aIndexDoc['category_sorting_mi']->getValue(),'Es wurden nicht die richtigen Kategorie-Sortierungen indiziert!');
		$this->assertEquals(array(0=>'2. FAQ Category'),$aIndexDoc['category_title_ms']->getValue(),'Es wurden nicht die richtigen Kategorie-Titel indiziert!');
		$this->assertEquals(array(0=>'2. Shortcut'),$aIndexDoc['category_shortcut_ms']->getValue(),'Es wurden nicht die richtigen Kategorie-Shortcuts indiziert!');
	}

	/**
	 * Prüft ob nur die Elemente indiziert werden, die im
	 * angegebenen Seitenbaum liegen
	 */
	public function testPrepareSearchDataWhenTableExperts() {
		//Testdaten aus DB holen
		$aOptions = array(
			'where' => 'tx_irfaq_expert.uid=1',
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_irfaq_expert', $aOptions);

		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_Irfaq');
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = array();

		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_expert', $aResult[0], $indexDoc, $options);
		//nichtzs direkt indiziert?
		$this->assertNull($aIndexDoc,'Es wurde nicht null zurück gegeben!');

		$aOptions = array(
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_mksearch_queue', $aOptions);

		$this->assertEquals(2,count($aResult),'Es wurde nicht der richtige Anzahl in die queue gelegt!');
		$this->assertEquals('tx_irfaq_q',$aResult[0]['tablename'],'Es wurde nicht das richtige Seminar (tablename) in die queue gelegt!');
		$this->assertEquals(1,$aResult[0]['recid'],'Es wurde nicht das richtige Seminar (recid) in die queue gelegt!');
		$this->assertEquals('tx_irfaq_q',$aResult[1]['tablename'],'Es wurde nicht das richtige Seminar (tablename) in die queue gelegt!');
		$this->assertEquals(2,$aResult[1]['recid'],'Es wurde nicht das richtige Seminar (recid) in die queue gelegt!');
	}

/**
	 * Prüft ob nur die Elemente indiziert werden, die im
	 * angegebenen Seitenbaum liegen
	 */
	public function testPrepareSearchDataWhenTableCategory() {
		//Testdaten aus DB holen
		$aOptions = array(
			'where' => 'tx_irfaq_cat.uid=2',
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_irfaq_cat', $aOptions);

		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_Irfaq');
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = array();

		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_cat', $aResult[0], $indexDoc, $options);
		//nichtzs direkt indiziert?
		$this->assertNull($aIndexDoc,'Es wurde nicht null zurück gegeben!');

		$aOptions = array(
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_mksearch_queue', $aOptions);

		$this->assertEquals(2,count($aResult),'Es wurde nicht der richtige Anzahl in die queue gelegt!');
		$this->assertEquals('tx_irfaq_q',$aResult[0]['tablename'],'Es wurde nicht das richtige Seminar (tablename) in die queue gelegt!');
		$this->assertEquals(1,$aResult[0]['recid'],'Es wurde nicht das richtige Seminar (recid) in die queue gelegt!');
		$this->assertEquals('tx_irfaq_q',$aResult[1]['tablename'],'Es wurde nicht das richtige Seminar (tablename) in die queue gelegt!');
		$this->assertEquals(3,$aResult[1]['recid'],'Es wurde nicht das richtige Seminar (recid) in die queue gelegt!');
	}

	/**
	 * Prüft ob nur die Elemente indiziert werden, die im
	 * angegebenen Seitenbaum liegen
	 */
	public function testPrepareSearchDataWhenTableQuestionsWithIncludeCategoriesOption() {
		//Testdaten aus DB holen
		$aOptions = array(
			'where' => 'tx_irfaq_q.uid=1',
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_irfaq_q', $aOptions);

		$indexer = tx_rnbase::makeInstance('tx_mksearch_indexer_Irfaq');
		list($extKey, $cType) = $indexer->getContentType();
		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);
		$options = array(
			'include.' => array(
				'categories.' => array(
					0 => 1
				)
			)
		);
		$options2 = array(
			'include.' => array(
				'categories' => 1,3
			)
		);

		//with include categories as array
		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_q', $aResult[0], $indexDoc, $options);
		$this->assertNotNull($aIndexDoc,'Das Element wurde doch nicht indziert! Option 1');

		//with include categories as string
		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_q', $aResult[0], $indexDoc, $options2);
		$this->assertNotNull($aIndexDoc,'Das Element wurde doch nicht indziert! Option 2');

		//and now with a faq that a the worng category
		$aOptions = array(
			'where' => 'tx_irfaq_q.uid=3',
			'enablefieldsoff' => true
		);
		$aResult = tx_rnbase_util_DB::doSelect('*', 'tx_irfaq_q', $aOptions);

		$indexDoc = tx_rnbase::makeInstance('tx_mksearch_model_IndexerDocumentBase',$extKey, $cType);

		//with include categories as array
		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_q', $aResult[0], $indexDoc, $options);
		$this->assertNull($aIndexDoc,'Das Element wurde doch indziert! Option 1');

		//with include categories as string
		$aIndexDoc = $indexer->prepareSearchData('tx_irfaq_q', $aResult[0], $indexDoc, $options2);
		$this->assertNull($aIndexDoc,'Das Element wurde doch indziert! Option 2');
	}
}
if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/mksearch/tests/indexer/class.tx_mksearch_tests_indexer_TtContent_testcase.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/mksearch/tests/indexer/class.tx_mksearch_tests_indexer_TtContent_testcase.php']);
}

?>