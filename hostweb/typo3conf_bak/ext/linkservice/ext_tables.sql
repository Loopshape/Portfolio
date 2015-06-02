
#
# Table structure for table 'tx_linkservice_field_status'
#
CREATE TABLE tx_linkservice_field_status (
	lastcheck int(11) unsigned DEFAULT '0' NOT NULL,
	field_name varchar(255) DEFAULT 'bodytext' NOT NULL,
	table_name varchar(255) DEFAULT 'tt_content' NOT NULL,
	record_uid int(11) DEFAULT '0' NOT NULL,
	KEY lastcheck (lastcheck)
) ENGINE=InnoDB;


#
# Table structure for table 'tx_linkservice_log'
#
CREATE TABLE tx_linkservice_log (
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	field_name varchar(255) DEFAULT 'bodytext' NOT NULL,
	table_name varchar(255) DEFAULT 'tt_content' NOT NULL,
	record_uid int(11) DEFAULT '0' NOT NULL,
	link varchar(255) DEFAULT 'http://www.example.com/' NOT NULL,
	http_status int(11) DEFAULT '200' NOT NULL,
	location varchar(255) DEFAULT '' NOT NULL,
	exception_message text,
	checktime int(11) unsigned DEFAULT '0' NOT NULL,
	KEY parent (pid)
) ENGINE=InnoDB;

