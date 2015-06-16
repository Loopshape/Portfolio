---
-- Sponsors
---
CREATE TABLE tx_t3socials_networks (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,

	network varchar(50) DEFAULT '' NOT NULL,
	actions varchar(250) DEFAULT '' NOT NULL,
	autosend tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(150) DEFAULT '' NOT NULL,
	username varchar(250) DEFAULT '' NOT NULL,
	password varchar(250) DEFAULT '' NOT NULL,
	config text NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

# Erstmal ohne TCA Beschreibung
# Speichert automatisch abgeschickte Daten
CREATE TABLE tx_t3socials_autosends (
	uid int(11) NOT NULL auto_increment,
	recid int(11) DEFAULT '0' NOT NULL,
	tablename varchar(250) DEFAULT '' NOT NULL,
	PRIMARY KEY (uid),
	UNIQUE KEY dataset (recid,tablename)
);

