<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
t3lib_extMgm::addPageTSConfig('
	# your google API key from http://www.google.com/apis/download.html
	key = xxxxxxxxxxxx
	
	# website you would like to search - leave blank for whole www
	site = www.typo3.org
');
t3lib_extMgm::addUserTSConfig('
	##
');

## WOP:[pi][1][addType] / [pi][1][tag_name]
  ## Extending TypoScript from static template uid=43 to set up userdefined tag:
t3lib_extMgm::addTypoScript($_EXTKEY,"editorcfg","
	tt_content.CSS_editor.ch.tx_googleapisearch_pi1 = < plugin.tx_googleapisearch_pi1.CSS_editor
",43);


## WOP:[pi][1][addType]
t3lib_extMgm::addPItoST43($_EXTKEY,"pi1/class.tx_googleapisearch_pi1.php","_pi1","list_type",0);
?>