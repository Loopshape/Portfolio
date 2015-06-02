<?php
class ux_tx_indexedsearch extends tx_indexedsearch {

function checkResume($row)	{
			// If the record is indexed by an indexing configuration, just show it.
			// At least this is needed for external URLs and files.
			// For records we might need to extend this - for instance block display if record is access restricted.
		if ($row['freeIndexUid'])	{
			return TRUE;
		}

			// Evaluate regularly indexed pages based on item_type:
		if ($row['item_type'])	{	// External media:
				// For external media we will check the access of the parent page on which the media was linked from.
				// "phash_t3" is the phash of the parent TYPO3 page row which initiated the indexing of the documents in this section.
				// So, selecting for the grlist records belonging to the parent phash-row where the current users gr_list exists will help us to know.
				// If this is NOT found, there is still a theoretical possibility that another user accessible page would display a link, so maybe the resume of such a document here may be unjustified hidden. But better safe than sorry.
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('phash', 'index_grlist', 'phash='.intval($row['phash_t3']).' AND gr_list='.$GLOBALS['TYPO3_DB']->fullQuoteStr($GLOBALS['TSFE']->gr_list, 'index_grlist'));
			if ($GLOBALS['TYPO3_DB']->sql_num_rows($res))	{
				#debug("Look up for external media '".$row['data_filename']."': phash:".$row['phash_t3'].' YES - ('.$GLOBALS['TSFE']->gr_list.")!",1);
				return TRUE;
			} else {
				#debug("Look up for external media '".$row['data_filename']."': phash:".$row['phash_t3'].' NO - ('.$GLOBALS['TSFE']->gr_list.")!",1);
				return FALSE;
			}
		} else {	// Ordinary TYPO3 pages:
			if (strcmp($row['gr_list'],$GLOBALS['TSFE']->gr_list) OR strcmp($row['gr_list'],"0,-1"))	{
					// Selecting for the grlist records belonging to the phash-row where the current users gr_list exists. If it is found it is proof that this user has direct access to the phash-rows content although he did not himself initiate the indexing...
				$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('phash', 'index_grlist', 'phash='.intval($row['phash']).' AND (gr_list='.$GLOBALS['TYPO3_DB']->fullQuoteStr($GLOBALS['TSFE']->gr_list, 'index_grlist').' OR gr_list='.$GLOBALS['TYPO3_DB']->fullQuoteStr('0,-1', 'index_grlist').')');
				if ($GLOBALS['TYPO3_DB']->sql_num_rows($res))	{
					#debug('Checking on it ...'.$row['item_title'].'/'.$row['phash'].' - YES ('.$GLOBALS['TSFE']->gr_list.")",1);
					return TRUE;
				} else {
					#debug('Checking on it ...'.$row['item_title'].'/'.$row['phash']." - NOPE",1);
					return FALSE;
				}
			} else {
					#debug('Resume can be shown, because the document was in fact indexed by this combination of groups!'.$GLOBALS['TSFE']->gr_list.' - '.$row['item_title'].'/'.$row['phash'],1);
				return TRUE;
			}
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sa_indexedsearch_patch/class.ux_tx_indexedsearch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sa_indexedsearch_patch/class.ux_tx_indexedsearch.php']);
}
?>