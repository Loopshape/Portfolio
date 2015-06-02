#
# Table structure for table 'tx_kkcalendar_cat'
#
CREATE TABLE tx_kkcalendar_cat (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_kkcalendar_entries'
#
CREATE TABLE tx_kkcalendar_entries (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	date int(11) DEFAULT '0' NOT NULL,
	time tinytext NOT NULL,
	note text NOT NULL,
	datetext tinytext NOT NULL,
	week tinyint(4) unsigned DEFAULT '0' NOT NULL,
   complete tinyint(4) unsigned DEFAULT '0' NOT NULL,
   workgroup varchar(80) DEFAULT '' NOT NULL,
   responsible varchar(20) DEFAULT '' NOT NULL,
	priority int(11) DEFAULT '0' NOT NULL,
	category int(11) DEFAULT '0' NOT NULL,
	link text NOT NULL,
	atagparams text NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_kkcalendar_cal mediumtext
);