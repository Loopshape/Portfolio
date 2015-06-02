#
# Table structure for table 'tx_nxindexedsearch_sources'
#
CREATE TABLE tx_nxindexedsearch_sources (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	source_table varchar(255) DEFAULT '' NOT NULL,
	source_category varchar(255) DEFAULT '' NOT NULL,
	source_page int(11) DEFAULT '0' NOT NULL,
	indexing_active tinyint DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY source_table (source_table),
	KEY source_category (source_category),
	KEY source_page (source_page)
);


#
# Table structure for table 'tx_nxindexedsearch_searchindex'
#
CREATE TABLE tx_nxindexedsearch_searchindex (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	source_uid int(11) DEFAULT '0' NOT NULL,
	document_uid int(11) DEFAULT '0' NOT NULL,
	word_uid int(11) DEFAULT '0' NOT NULL,
	occurence_count int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY source_uid (source_uid),
	KEY document_uid (document_uid),
	KEY word_uid (word_uid)
);



#
# Table structure for table 'tx_nxindexedsearch_searchwords'
#
CREATE TABLE tx_nxindexedsearch_searchwords (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	searchword varchar(255) DEFAULT '' NOT NULL,
	split_offset int(11) DEFAULT '0' NOT NULL,
	usage_count int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY searchword (searchword)
);

CREATE TABLE tx_nxindexedsearch_stats (
	uid int(11) NOT NULL auto_increment,
	source_uid int(11) DEFAULT '0' NOT NULL,
	searchstring varchar(255) NOT NULL,
	results int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY searchstring (searchstring)
);


#
# Table structure for table 'tx_nxindexedsearch_searchtime'
#
CREATE TABLE tx_nxindexedsearch_searchtime (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	source_uid int(11) DEFAULT '0' NOT NULL,
	document_uid int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY source_uid (source_uid),
	KEY document_uid (document_uid)
);