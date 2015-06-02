<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2003 Kasper Skårhøj (kasper@typo3.com)
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
 * Content rendering based on TypoScript
 *
 * class tslib_cObj				:		contentObject (the main-thing in TS!)
 * class tslib_controlTable		:		Makes a table CTABLE (TS)
 * class tslib_tableOffset		:		Makes a table-offset (TS)
 * class tslib_frameset			: 		Generates framesets (TS)
 *
 * @author	Kasper Skårhøj <kasper@typo3.com>
 */


/**
 * Rendering of content objects
 *
 * This class is normally instantiated and referred to as "cObj".
 * It does the rendering of socalled "cObjects" or "content objects" from TypoScript.
 * There are lots of functions you can use from your include-scripts.
 *
 * @author	Kasper Skårhøj <kasper@typo3.com>
 * extended by Sacha Vorbeck <info@unlimited-vision.net>
 */
class ux_tslib_cObj extends tslib_cObj{

	function getTreeList($id,$depth,$begin=0,$dontCheckEnableFields=0,$addSelectFields="",$moreWhereClauses="")	{
		/* Generates a list of Page-uid's from $id. List does not include $id itself
		 The only pages WHICH PREVENTS DECENDING in a branch are
		   - deleted pages,
		   - pages in a recycler (added 061101) or of the Backend User Section type (added 080102)
		   - pages that has the extendToSubpages set, WHERE start/endtime, hidden and fe_users would hide the records.
		 Appart from that, pages with enable-fields excluding them, will also be removed. HOWEVER $dontCheckEnableFields set will allow enableFields-excluded pages to be included anyway - including extendToSubpages sections!

		 Returns the list with a comma in the end (if any pages selected!)
		 $begin is an optional integer that determines at which level in the tree to start collecting uid's. Zero means "start right away", 1 = 'next level and out'

		 Changes Sacha Vorbeck 12.05.2004: modified query so that links from protected areas are shown but hidden/deleted/timed records are not
		*/
		$depth=intval($depth);
		$begin=intval($begin);
		$id=intval($id);
		$theList="";
		$allFields = "uid,hidden,starttime,endtime,fe_group,extendToSubpages,doktype,php_tree_stop".$addSelectFields;
		if ($id && $depth>0)	{

			$query = 	"SELECT " . $allFields . "
						FROM pages
						WHERE pid = " . $id . $this->enableFieldsforIndexedSearchPlus("pages") . "
						". $moreWhereClauses . "
						ORDER BY sorting";	// "ORDER BY sorting" added 280201

			if ($dontCheckEnableFields) {
				debug($query);
			}
			$res = mysql(TYPO3_db, $query);
			echo mysql_error();
			while ($row = mysql_fetch_assoc($res))	{
				if ($dontCheckEnableFields || $GLOBALS["TSFE"]->checkPagerecordForIncludeSection($row))	{
					if ($begin<=0)	{
						if ($dontCheckEnableFields || $GLOBALS["TSFE"]->checkEnableFields($row))	{
							$theList.=$row["uid"].",";
						}
					}
					if ($depth>1 && !$row["php_tree_stop"])	{
						$theList.=$this->getTreeList($row["uid"], $depth-1, $begin-1, $dontCheckEnableFields, $addSelectFields, $moreWhereClauses);
					}
				}
			}
		}
//		debug($theList);
		return $theList;
	}
		/**
		 * Alternative version of enableFields without feUser/feGroups check:
		 */
		function enableFieldsforIndexedSearchPlus($table,$show_hidden=-1,$ignore_array=array())	{
			// if $show_hidden is set (0/1), any hidden-fields in records are ignored
			// NOTICE: If you call this function, consider what to do with the show_hidden parameter. Maybe it should be set?
			// See tslib_cObj->enableFields where it's implemented correctly.
		if ($show_hidden==-1 && is_object($GLOBALS["TSFE"]))	{	// If show_hidden was not set from outside and if TSFE is an object, set it based on showHiddenPage and showHiddenRecords from TSFE
			$show_hidden = $table=="pages" ? $GLOBALS["TSFE"]->showHiddenPage : $GLOBALS["TSFE"]->showHiddenRecords;
//			debug($table." - ".$show_hidden);
		}
		if ($show_hidden==-1)	$show_hidden=0;	// If show_hidden was not changed during the previous evaluation, do it here.

		$ctrl = $GLOBALS["TCA"][$table]["ctrl"];
		$query="";
		if (is_array($ctrl))	{
			if ($ctrl["delete"])	{
				$query.=" AND NOT ".$table.".".$ctrl["delete"];
			}
			if (is_array($ctrl["enablecolumns"]))	{
				if ($ctrl["enablecolumns"]["disabled"] && !$show_hidden && !$ignore_array["disabled"])	{
					$field = $table.".".$ctrl["enablecolumns"]["disabled"];
					$query.=" AND NOT ".$field;
				}
				if ($ctrl["enablecolumns"]["starttime"] && !$ignore_array["starttime"])	{
					$field = $table.".".$ctrl["enablecolumns"]["starttime"];
					$query.=" AND (".$field."<=".$GLOBALS["SIM_EXEC_TIME"].")";
				}
				if ($ctrl["enablecolumns"]["endtime"] && !$ignore_array["endtime"])	{
					$field = $table.".".$ctrl["enablecolumns"]["endtime"];
					$query.=" AND (".$field."=0 OR ".$field.">".$GLOBALS["SIM_EXEC_TIME"].")";
				}
				/*
				if ($ctrl["enablecolumns"]["fe_group"] && !$ignore_array["fe_group"])	{
					$field = $table.".".$ctrl["enablecolumns"]["fe_group"];
					$gr_list = $GLOBALS["TSFE"]->gr_list;
					if (!strcmp($gr_list,""))	$gr_list=0;
					$query.=" AND ".$field." IN (".$gr_list.")";
				}
				*/
			}
		} else {die ("NO entry in the \$TCA-array for '".$table."'");}
//		debug($query,1);
		return $query;
	}

}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/sv_indexedsearchplus/class.ux_tslib_cObj.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/sv_indexedsearchplus/class.ux_tslib_cObj.php"]);
}

?>