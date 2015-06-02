<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_calendar_cat=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_calendar_item=1
');
t3lib_extMgm::addPageTSConfig('

	# ***************************************************************************************
	# CONFIGURATION of RTE in table "tx_calendar_item", field "descr"
	# ***************************************************************************************
RTE.config.tx_calendar_item.descr {
  hidePStyleItems = H1, H4, H5, H6
  proc.exitHTMLparser_db=1
  proc.exitHTMLparser_db {
    keepNonMatchedTags=1
    tags.font.allowedAttribs= color
    tags.font.rmTagIfNoAttrib = 1
    tags.font.nesting = global
  }
}
');
t3lib_extMgm::addPageTSConfig('

	# ***************************************************************************************
	# CONFIGURATION of RTE in table "tx_calendar_item", field "moreinfo"
	# ***************************************************************************************
RTE.config.tx_calendar_item.moreinfo {
  hidePStyleItems = H1, H4, H5, H6
  proc.exitHTMLparser_db=1
  proc.exitHTMLparser_db {
    keepNonMatchedTags=1
    tags.font.allowedAttribs= color
    tags.font.rmTagIfNoAttrib = 1
    tags.font.nesting = global
  }
}
');

  ## Extending TypoScript from static template uid=43 to set up userdefined tag:
t3lib_extMgm::addTypoScript($_EXTKEY,"editorcfg","
	tt_content.CSS_editor.ch.tx_calendar_pi1 = < plugin.tx_calendar_pi1.CSS_editor
",43);


t3lib_extMgm::addPItoST43($_EXTKEY,"pi1/class.tx_calendar_pi1.php","_pi1","list_type",1);

// make this visible through Web->Page
$TYPO3_CONF_VARS['EXTCONF']['cms']['db_layout']['addTables']['tx_calendar_item'][0] =
                array('fList' => 'title,start_date,start_time,end_date,end_time,place,image',
                      'icon'  => 1,
                );

?>
