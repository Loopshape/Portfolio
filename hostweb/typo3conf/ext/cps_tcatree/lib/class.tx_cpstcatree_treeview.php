<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Nicole Cordes <cordes@cps-it.de>
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
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * This function displays a selector styled as tree
 * The original code is borrowed from the extension "News" (tt_news) author: Rupert Germann <rupi
 *
 * @gmx.li>
 *
 * @author	Nicole Cordes <cordes@cps-it.de>
 * @package TYPO3
 * @subpackage cps_tcatree
 */

// TYPO3 Downwards Compatibility
// #61661, 140911, dwildt, 1-
//require_once (PATH_t3lib . 'class.t3lib_treeview.php');
// #61661, 140911, dwildt, +
list( $main, $sub, $bugfix ) = explode( '.', TYPO3_version );
$version = ( ( int ) $main ) * 1000000;
$version = $version + ( ( int ) $sub ) * 1000;
$version = $version + ( ( int ) $bugfix ) * 1;
// Set TYPO3 version as integer (sample: 4.7.7 -> 4007007)
if ( $version < 6002000 )
{
  require_once (PATH_t3lib . 'class.t3lib_treeview.php');
}
// #61661, 140911, dwildt, +

class tx_cpstcatree_treeview extends t3lib_treeview {

	/**
	 * Show only accessible pages in tree or not
	 * @var int $ignorePermsClause
	 */
	var $ignorePermsClause;

	var $TCEforms_itemFormElName;
	var $TCEforms_nonSelectableItemsArray = array();

	function getBrowsableTree() {

		if ($GLOBALS['BE_USER']->check('tables_select', $this->table)) {

			$this->initializePositionSaving();

			$treeArr = array();
			$tmpClause = $this->clause;
			$savedTable = $this->table;

			$this->tmpC = 0;

			foreach ($this->MOUNTS as $idx => $uid) {

				$this->bank = $idx;
				$isOpen = ($this->stored[$idx][$uid] OR $this->expandFirst);

				$curIds = $this->ids;
				$this->reset();
				$this->ids = $curIds;

				$cmd = $this->bank . '_' . ($isOpen ? '0_' : '1_') . $uid . '_' . $this->treeName;

				$icon = '<img' . t3lib_iconWorks::skinImg($this->backPath, 'gfx/ol/' . ($isOpen ? 'minus' : 'plus') . 'only.gif') . ' alt="" />';
				if (($this->expandable) AND (!$this->expandFirst)) {
					$firstHtml = $this->PMiconATagWrap($icon, $cmd);
				} else {
					$firstHtml = $icon;
				}

				$this->addStyle = '';

				if ($uid) {
					$rootRec = $this->getRecord($uid);
					$firstHtml .= $this->getIcon($rootRec);
				} else {
					$rootRec = $this->getRootRecord($uid);
					$firstHtml .= $this->getRootIcon($rootRec);
				}

				$this->table = $savedTable;

				if (is_array($rootRec)) {
					$uid = $rootRec['uid'];

					$this->tree[] = array('HTML' => $firstHtml, 'row' => $rootRec, 'bank' => $this->bank, 'hasSub' => true, 'invertedDepth' => 1000);

					if ($isOpen) {
						if ($this->addSelfId) {
							$this->ids[] = $uid;
						}
						$this->getTree($uid, ($this->treeView) ? 999 : 0, '', $rootRec['_SUBCSSCLASS']);
					}
					$treeArr = array_merge($treeArr, $this->tree);
				}
			}
		} else {
			$treeArr[] = array('HTML' => '<img' . t3lib_iconWorks::skinImg($this->backPath, 'gfx/ol/minusonly.gif') . ' alt="" /><em>' . $GLOBALS['LANG']->sL('LLL:EXT:cps_tcatree/locallang_tca.xml:cps_tcatree.treeview.noAccess') . '</em>');
		}

		// If no tree was found and table is pages then try create table with mounts
		if (!count($this->ids) and $this->table == 'pages') {
			$webmounts = $GLOBALS['BE_USER']->returnWebmounts();
			if (is_array($webmounts)) {
				$pidArray = array();

				// PIDs of webmounts
				foreach ($webmounts as $key => $mount) {
					// Get record from database to get pid
					$row = t3lib_BEfunc::getRecord($this->table, $mount, 'pid');

					$pidArray[$row['pid']] = $row['pid'];
				}
				unset($key, $mount);

				// Generate Tree
				foreach ($pidArray as $key => $value) {
					$this->getTree($value, ($this->treeView) ? 999 : 0, '', $rootRec['_SUBCSSCLASS']);
					$treeArr = $this->tree;
				}
				unset($key, $value);
			}
		}

		return $this->printTree($treeArr);
	}

	function getTitleStyles($row) {
		$style = '';
		if (in_array($row['uid'], $this->TCEforms_selectedItemsArray)) {
			$style .= 'font-weight: bold;';
		}
		$parent = false;
		foreach ($this->TCEforms_selectedItemsArray as $selectedItem) {
			if ((is_array($this->selectedItemsArrayParents[$selectedItem])) AND (in_array($row['uid'], $this->selectedItemsArrayParents[$selectedItem]))) {
				$parent = true;
				break;
			}
		}
		if ($parent) {
			$style .= ' text-decoration: underline; background: #ffc;';
		}

		return $style;
	}

	function getTree($uid, $depth = 999, $blankLineCode = '', $subCSSclass = '') {

		$this->buffer_idH = array();

		$depth = intval($depth);
		$HTML = '';
		$a = 0;

		$res = $this->getDataInit($uid, $subCSSclass);
		$c = $this->getDataCount($res);
		$crazyRecursionLimiter = 999;
		$allRows = array();
		while (($crazyRecursionLimiter > 0) AND ($row = $this->getDataNext($res, $subCSSclass))) {
			$crazyRecursionLimiter--;
			$allRows[] = $row;
		}

		foreach ($allRows as $row) {

			if ((!(t3lib_div::inList('pages', $this->table))) OR (t3lib_BEfunc::readPageAccess($row['uid'], $GLOBALS['BE_USER']->getPagePermsClause(1))) OR $this->ignorePermsClause) {
				$a++;

				$newID = $row['uid'];
				$this->tree[] = array();
				end($this->tree);
				$treeKey = key($this->tree);
				$LN = ($a == $c) ? 'blank' : 'line';

				if ($this->setRecs) {
					$this->recs[$row['uid']] = $row;
				}

				$this->ids[] = $idH[$row['uid']]['uid'] = $row['uid'];
				$this->ids_hierarchy[$depth][] = $row['uid'];

				if ($this->treeView) {
					if (($depth > 1) AND ($this->expandNext($newID))) {
						$nextCount = $this->getTree($newID, $depth - 1, $blankLineCode . ',' . $LN, $row['_SUBCSSCLASS']);
						if (count($this->buffer_idH)) {
							$idH[$row['uid']]['subrow'] = $this->buffer_idH;
						}
						$exp = 1;
					} else {
						$nextCount = $this->getCount($newID);
						$exp = 0;
					}

				} else {
					$nextCount = 0;
					$exp = 0;
				}

				if ($this->makeHTML) {
					$HTML = '';
					$HTML .= $this->PMicon($row, $a, $c, $nextCount, $exp);
					$HTML .= $this->wrapStop($this->getIcon($row), $row);
				}

				$this->tree[$treeKey] = array('row' => $row, 'HTML' => $HTML, 'hasSub' => ((($nextCount) AND ($this->expandNext($newID))) ? 1 : 0), 'isFirst' => $a == 1, 'isLast' => false, 'invertedDepth' => $depth, 'blankLineCode' => $blankLineCode, 'bank' => $this->bank);
			}
		}

		if ($a) {
			$this->tree[$treeKey]['isLast'] = true;
		}

		$this->getDataFree($res);
		$this->buffer_idH = $idH;

		return $c;
	}

	function PMicon($row, $a, $c, $nextCount, $exp) {
		if ($this->expandable) {
			$PM = $nextCount ? ($exp ? 'minus' : 'plus') : 'join';
		} else {
			$PM = 'join';
		}

		$BTM = ($a == $c) ? 'bottom' : '';
		$icon = '<img' . t3lib_iconWorks::skinImg($this->backPath, 'gfx/ol/' . $PM . $BTM . '.gif', 'width="18" height="16"') . ' alt="" />';

		if ($nextCount) {
			$cmd = $this->bank . '_' . ($exp ? '0_' : '1_') . $row['uid'] . '_' . $this->treeName;
			$icon = $this->PMiconATagWrap($icon, $cmd, !$exp);
		}
		return $icon;
	}

	function PMiconATagWrap($icon, $cmd, $isExpand = true) {
		if (($this->thisScript) AND ($this->expandable)) {
			$js = htmlspecialchars('tceFormsItemTree.load(\'' . $cmd . '\', ' . intval($isExpand) . ', this, \'' . $this->tceFormsTable . '\', \'' . $this->tceFormsField . '\', \'' . $this->tceFormsRecID . '\', \'' . $this->tceFormsFFConf . '\');');
			return '<a class="pm" onclick="' . $js . '">' . $icon . '</a>';
		} else {
			return $icon;
		}
	}

	function printTree($treeArr = '') {
		$titleLen = $GLOBALS['BE_USER']->uc['titleLen'];

		if (!is_array($treeArr)) {
			$treeArr = $this->tree;
		}

		$out = '
			<!-- TYPO3 tree structure. -->
			<ul class="tree" id="treeRoot">
		';

		$PM = t3lib_div::_GP('PM');

		if (($PMpos = strpos($PM, '#')) !== false) {
			$PM = substr($PM, 0, $PMpos);
		}
		$PM = explode('_', $PM);
		if ((is_array($PM)) AND (count($PM) == 4)) {

			if ($PM[1]) {
				$expandedPageUid = $PM[2];
				$ajaxOutput = '';
				$invertedDepthOfAjaxRequestedItem = 0;
				$doExpand = true;
			} else {
				$collapsedPageUid = $PM[2];
				$doCollapse = true;
			}
		}

		$closeDepth = array();

		foreach ($treeArr as $v) {
			$classAttr = $v['row']['_CSSCLASS'];
			$uid = $v['row']['uid'];
			$idAttr = htmlspecialchars($this->domIdPrefix . $this->getId($v['row']) . '_' . $v['bank']);
			$itemHTML = '';
			$addStyle = '';

			if (($v['isFirst']) AND (!$doCollapse) AND (!(($doExpand) AND ($expandedPageUid == $uid)))) {
				$itemHTML = '<ul>';
			}

			if ($v['hasSub']) {
				$classAttr .= ($classAttr ? ' ' : '') . 'expanded';
			}
			if ($v['isLast']) {
				$classAttr .= ($classAttr ? ' ' : '') . 'last';
			}
			if (($uid) AND ($uid == $this->category)) {
				$classAttr .= ($classAttr ? ' ' : '') . 'active';
			}

			if ($v['row']) {
				$itemHTML .= '
					<li id="' . $idAttr . '"' . $addStyle . ($classAttr ? ' class="' . $classAttr . '"' : '') . '>' . $v['HTML'] . $this->wrapTitle($this->getTitleStr($v['row'], $titleLen), $v['row'], $v['bank']) . "\n";
			} else {
				$itemHTML .= '
					<li id="' . $idAttr . '"' . $addStyle . ($classAttr ? ' class="' . $classAttr . '"' : '') . '>' . $v['HTML'] . "\n";
			}

			if (!$v['hasSub']) {
				$itemHTML .= '</li>';
			}

			if (($v['isLast']) AND (!(($doExpand) AND ($expandedPageUid == $uid)))) {
				$closeDepth[$v['invertedDepth']] = 1;
			}

			if (($v['isLast']) AND (!$v['hasSub']) AND (!$doCollapse) AND (!(($doExpand) AND ($expandedPageUid == $uid)))) {
				for ($i = $v['invertedDepth']; $closeDepth[$i] == 1; $i++) {
					$closeDepth[$i] = 0;
					$itemHTML .= '</ul></li>';
				}
			}

			if (($doCollapse) AND ($collapsedPageUid == $uid)) {
				$this->ajaxStatus = true;
				return $itemHTML;
			}

			if (($doExpand) AND ($expandedPageUid == $uid)) {
				$ajaxOutput .= $itemHTML;
				$invertedDepthOfAjaxRequestedItem = $v['invertedDepth'];
			} elseif ($invertedDepthOfAjaxRequestedItem) {
				if ($v['invertedDepth'] < $invertedDepthOfAjaxRequestedItem) {
					$ajaxOutput .= $itemHTML;
				} else {
					$this->ajaxStatus = true;
					return $ajaxOutput;
				}
			}
			$out .= $itemHTML;
		}

		if ($ajaxOutput) {
			$this->ajaxStatus = true;
			return $ajaxOutput;
		}

		$out .= '</ul>';
		return $out;
	}

	function getTitleStr($row, $titleLen = 30) {

		// Generate title proper to label and label_alt
		if (!$row['uid']) {
			// For root
			$title = $row['title'];
		} else {
			$title = t3lib_BEfunc::getProcessedValue($this->table, $GLOBALS['TCA'][$this->table]['ctrl']['label'], $row[$GLOBALS['TCA'][$this->table]['ctrl']['label']], 0, 0, false, $row['uid']);
			if ($GLOBALS['TCA'][$this->table]['ctrl']['label_alt'] AND ($GLOBALS['TCA'][$this->table]['ctrl']['label_alt_force'] OR !strcmp($title, ''))) {
				$altFields = t3lib_div::trimExplode(',', $GLOBALS['TCA'][$this->table]['ctrl']['label_alt'], 1);
				$titleAlt = array();
				if (!empty($title)) $titleAlt[] = $title;
				foreach ($altFields as $value) {
					$title = trim(strip_tags($row[$value]));
					if (strcmp($title, '')) {
						$title = t3lib_BEfunc::getProcessedValue($this->table, $value, $title, 0, 0, false, $row['uid']);
						if (!$GLOBALS['TCA'][$this->table]['ctrl']['label_alt_force']) {
							break;
						}
						$titleAlt[] = $title;
					}
				}
				if ($GLOBALS['TCA'][$this->table]['ctrl']['label_alt_force']) {
					$title = implode(', ', $titleAlt);
				}
			}
		}

		$title = (strlen(trim($title)) == 0) ? '[' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.php:labels.no_title', 1) . ']' : htmlspecialchars(t3lib_div::fixed_lgd_cs($title, $titleLen));

		return $title;
	}

	function wrapTitle($title, $row, $bank) {
		if ($row['uid'] > 0) {
			if (in_array($row['uid'], $this->TCEforms_nonSelectableItemsArray)) {
				$style = $this->getTitleStyles($row);
				return '<a href="#" title="' . $title . ' [uid: ' . $row['uid'] . ']"><span style="color: #999; cursor:default; ' . $style . '">' . $title . '</span></a>';
			} else {
				$aOnClick = 'setFormValueFromBrowseWin(\'' . $this->TCEforms_itemFormElName . '\', ' . $row['uid'] . ', \'' . t3lib_div::slashJS($title) . '\'); return false;';
				$style = $this->getTitleStyles($row);
				return '<a href="#" onclick="' . htmlspecialchars($aOnClick) . '" title="' . $title . ' [uid: ' . $row['uid'] . ']"><span style="' . $style . '">' . $title . '</span></a>';
			}
		} else {
			$pidLbl = ' <span class="typo3-dimmed"><em>' . $GLOBALS['LANG']->sL('LLL:EXT:cps_tcatree/locallang_tca.xml:cps_tcatree.treeview.allPages') . '</em></span>';
			return $title . $pidLbl;
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cps_tcatree/lib/class.tx_cpstcatree_treeview.php']) {
	include_once ($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cps_tcatree/lib/class.tx_cpstcatree_treeview.php']);
}
?>