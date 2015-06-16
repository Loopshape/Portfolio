#
# Table structure for table 'tx_news_domain_model_news'
#
CREATE TABLE tx_news_domain_model_news (

    tx_roqnewsevent_is_event tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_roqnewsevent_startdate int(11) DEFAULT '0' NOT NULL,
	tx_roqnewsevent_starttime int(11) DEFAULT '0' NOT NULL,
	tx_roqnewsevent_enddate int(11) DEFAULT '0' NOT NULL,
	tx_roqnewsevent_endtime int(11) DEFAULT '0' NOT NULL,
	tx_roqnewsevent_location varchar(255) DEFAULT '' NOT NULL,

);