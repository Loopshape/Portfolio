#
# Table structure for table 'tx_ppsearchengine_cache'
#
CREATE TABLE tx_ppsearchengine_cache (
	uid int(11) NOT NULL auto_increment,
	params tinyblob NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	results longblob NOT NULL,
	
	PRIMARY KEY (uid),
);

CREATE TABLE tt_content (
    tx_ppsearchengine_isengine tinyint(3) DEFAULT '0' NOT NULL
);
