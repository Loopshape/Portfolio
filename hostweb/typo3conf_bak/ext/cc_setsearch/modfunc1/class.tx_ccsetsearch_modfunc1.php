<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2004-2005 René Fritz (r.fritz@colorcube.de)
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
/**
 * Module extension (addition to function menu) 'Set index flag (recursive)' for the 'cc_setsearch' extension.
 *
 * @author	René Fritz <r.fritz@colorcube.de>
 */

require_once (PATH_t3lib.'class.t3lib_pagetree.php');
require_once(PATH_t3lib.'class.t3lib_extobjbase.php');




/**
 * Creates the "set searchable" wizard
 * 
 * @author	René Fritz <r.fritz@colorcube.de>
 */
class tx_ccsetsearch_modfunc1 extends t3lib_extobjbase {

	var $tree;

	/**
	 * Adds menu items
	 * 
	 * @return	array		
	 * @ignore
	 */	
	function modMenu()	{
		global $LANG;

		$levelsLabel = $LANG->sL('LLL:EXT:lang/locallang_mod_web_perm.php:levels');
		return array(
			'tx_ccsetsearch_modfunc1_depth' => array(
				1 => '1 '.$levelsLabel,
				2 => '2 '.$levelsLabel,
				3 => '3 '.$levelsLabel,
				4 => '4 '.$levelsLabel,
				10 => '10 '.$levelsLabel
			)
		);
	}

	/**
	 * Main function creating the content for the module.
	 * 
	 * @return	string		HTML content for the module, actually a "section" made through the parent object in $this->pObj
	 */
	function main()	{
		global $BE_USER,$LANG,$BACK_PATH;

		$this->getPageTree();

			// title
		$theOutput .= $this->pObj->doc->spacer(5);
		$theOutput .= $this->pObj->doc->section($LANG->getLL('title'),'',0,1);

			// depth menu
		$menu=$LANG->sL('LLL:EXT:lang/locallang_mod_web_perm.php:Depth').': '.
			t3lib_BEfunc::getFuncMenu($this->pObj->id,
				'SET[tx_ccsetsearch_modfunc1_depth]',
				$this->pObj->MOD_SETTINGS['tx_ccsetsearch_modfunc1_depth'],
				$this->pObj->MOD_MENU['tx_ccsetsearch_modfunc1_depth']
			);
		$theOutput .= $this->pObj->doc->spacer(5);
		$theOutput .= $this->pObj->doc->section('',$menu,0,1);

			// output page tree
		$theOutput .= $this->pObj->doc->spacer(10);
		$theOutput .= $this->pObj->doc->section('',$this->showPageTree(),0,1);

			// new form (close old)
		$theOutput .= '</form>';
		$theOutput .= $this->pObj->doc->spacer(10);

		$theOutput .= '<form action="'.$BACK_PATH.'tce_db.php" method="POST" name="editform">';
		$theOutput .= '<input type="hidden" name="id" value="'.$this->pObj->id.'">';
		$theOutput .= '<input type="hidden" name="redirect" value="'.TYPO3_MOD_PATH.'index.php?id='.$this->pObj->id.'">';


		$theOutput .= '<input type="hidden" name="data[pages]['.$this->pObj->id.'][no_search]" value="1">';
		$theOutput .= '<input type="hidden" name="mirror[pages]['.$this->pObj->id.']" value="'.htmlspecialchars(implode(',',$this->getRecursivePageIDArray())).'">';

			// submit buttons
		$theOutput .= '<input type="submit" name="setSearchable" value="'.$LANG->getLL('setSearchable').'" onclick="document.editform[\'data[pages]['.$this->pObj->id.'][no_search]\'].value=0;"> ';
		$theOutput .= '<input type="submit" name="setNonSearchable" value="'.$LANG->getLL('setNonSearchable').'">';


		return $theOutput;
	}


	function showPageTree()	{
		global $BE_USER,$LANG,$BACK_PATH;

		$tableLayout = array (
			'table' => array ('<table border="0" cellspacing="1" cellpadding="0" id="typo3-tree" style="width:auto;">', '</table>'),
			'0' => array (
				'tr' => array('<tr class="tableheader bgColor5">','</tr>'),
				'0' => array('<td colspan="2" align="right" nowrap="nowrap" class="bgColor5">','</td>'),
				'1' => array('',''),
			),
			'defRow' => array (
				'tr' => array('<tr class="bgColor4">','</tr>'),
				'0' => array('<td nowrap="nowrap">','</td>'),
				'1' => array('<td align="center" nowrap="nowrap">&nbsp;&nbsp;','&nbsp;&nbsp;</td>'),
			)
		);

		$table=array();
		$tr=0;
		$table[$tr++][0]='<strong>'.$LANG->getLL('searchable').':</strong>';

		foreach($this->tree->tree as $pageItem)	{
			if (!($this->admin || $BE_USER->doesUserHaveAccess($pageItem['row'],$perms)))	{
				$tableLayout[$tr]['tr'] = array('<tr class="bgColor4-20">','</tr>');
			}

			$title = t3lib_div::fixed_lgd($this->tree->getTitleStr($pageItem['row']),$BE_USER->uc['titleLen']);
			$treeItem = $pageItem['HTML'].$this->tree->wrapTitle($title,$pageItem['row']);

			if ($pageItem['row']['no_search']) {
				$searchFlag = '<span style="color:red">&times;</span>';
			} else {
				$searchFlag = '<span style="color:green">&bull;</span>';
			}

 			$table[$tr][0] = $treeItem.'&nbsp;';
			$table[$tr++][1] = $searchFlag;
		}

		return $this->pObj->doc->table($table, $tableLayout);
	}


	/**
	 * Reads the page tree
	 * 
	 * @return	void
	 */
	function getPageTree()	{
		global $BE_USER,$LANG,$BACK_PATH;

		$this->tree = t3lib_div::makeInstance('tx_ccsetsearch_pageTree');
		$this->tree->init(' AND '.$this->pObj->perms_clause);
		$this->tree->setRecs = 1;
		$this->tree->makeHTML = true;
		$this->tree->thisScript = 'index.php';
		$this->tree->addField('no_search');
		$this->tree->addField('perms_userid',1);
		$this->tree->addField('perms_groupid',1);
		$this->tree->addField('perms_user',1);
		$this->tree->addField('perms_group',1);
		$this->tree->addField('perms_everybody',1);

			// set Root icon
		$HTML='<img src="'.$BACK_PATH.t3lib_iconWorks::getIcon('pages',$this->pObj->pageinfo).'" title="'.t3lib_BEfunc::getRecordIconAltText($this->pObj->pageinfo, $this->tree->table).'" width="18" height="16" align="top">';
		$this->tree->tree[]=Array('row'=>$this->pObj->pageinfo, 'HTML'=>$HTML);

		$this->tree->getTree($this->pObj->id, $this->pObj->MOD_SETTINGS['tx_ccsetsearch_modfunc1_depth'],'');
	}


	/**
	 * Return an array of page id's where the user have access to
	 * 
	 * @return	array	pages uid array
	 */	
	function getRecursivePageIDArray()	{
		global $BE_USER,$LANG,$BACK_PATH;

		$theIdListArr=array();

		if ($BE_USER->user['uid'] && count($this->tree->ids_hierarchy))	{
			reset($this->tree->ids_hierarchy);
			$theIdListArr=array();
			for ($a=$this->pObj->MOD_SETTINGS['tx_ccsetsearch_modfunc1_depth']; $a>0; $a--)	{
				if (is_array($this->tree->ids_hierarchy[$a]))	{
					reset($this->tree->ids_hierarchy[$a]);
					while(list(,$theId)=each($this->tree->ids_hierarchy[$a]))	{
						if ($this->admin || $BE_USER->doesUserHaveAccess($this->tree->tree[$theId]['row'],$perms))	{
							$theIdListArr[]=$theId;
						}
					}
					$lKey = $getLevels-$a+1;
				}
			}
		}

		return $theIdListArr;
	}
}

/**
 * local version of the page tree
 * 
 * @author	René Fritz <r.fritz@colorcube.de>
 */
class tx_ccsetsearch_pageTree extends t3lib_pageTree {

	/**
	 * Wrapping $title in a-tags.
	 *
	 * @param	string		Title string
	 * @param	string		Item record
	 * @param	integer		Bank pointer (which mount point number)
	 * @return	string
	 * @access private
	 */
	function wrapTitle($title,$v)	{
		$aOnClick = 'return jumpToUrl(\'index.php?id='.$v['uid'].'\',this);';
		return '<a href="#" onclick="'.htmlspecialchars($aOnClick).'">'.$title.'</a>';
	}

	/**
	 * Creates title attribute content for pages.
	 * Uses API function in t3lib_BEfunc which will retrieve lots of useful information for pages.
	 *
	 * @param	array		The table row.
	 * @return	string
	 */
	function getTitleAttrib($row) {
		return $iconAltText = t3lib_BEfunc::getRecordIconAltText($row, $this->table);
	}

	/**
	 * Wrapping the image tag, $icon, for the row, $row (except for mount points)
	 *
	 * @param	string		The image tag for the icon
	 * @param	array		The row for the current element
	 * @return	string		The processed icon input value.
	 * @access private
	 */
	function wrapIcon($icon,$row)	{
			// Add title attribute to input icon tag
		$theIcon = $this->addTagAttributes($icon,($this->titleAttrib ? $this->titleAttrib.'="'.$this->getTitleAttrib($row).'"' : ''));

		return $theIcon;
	}
}


if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/cc_setsearch/modfunc1/class.tx_ccsetsearch_modfunc1.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/cc_setsearch/modfunc1/class.tx_ccsetsearch_modfunc1.php"]);
}

?>
