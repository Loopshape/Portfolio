#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_dffoundation5_large_left_column int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_large_right_column int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_medium_left_column int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_medium_right_column int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_small_left_column int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_small_right_column int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_large_block_grid int(11) DEFAULT '0' NOT NULL,	
	tx_dffoundation5_medium_block_grid int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_small_block_grid int(11) DEFAULT '0' NOT NULL,
	tx_dffoundation5_left_add tinytext,
	tx_dffoundation5_right_add tinytext,	
	tx_dffoundation5_class tinytext,
	tx_dffoundation5_style tinytext,
	tx_dffoundation5_show_for varchar(20) DEFAULT '' NOT NULL,
	tx_dffoundation5_hide_for varchar(20) DEFAULT '' NOT NULL,
	tx_dffoundation5_format varchar(18) DEFAULT '' NOT NULL,
	tx_dffoundation5_touch varchar(14) DEFAULT '' NOT NULL,
	tx_dffoundation5_print varchar(14) DEFAULT '' NOT NULL,
	tx_dffoundation5_cropscaling tinyint(3) DEFAULT '0' NOT NULL,
	tx_dffoundation5_cropscaling_orient tinyint(3) DEFAULT '0' NOT NULL,	
	tx_dffoundation5_cropscaling_ratio varchar(14) DEFAULT '0' NOT NULL,
	tx_dffoundation5_orbit tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_dffoundation5_wow tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_dffoundation5_magellan tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_dffoundation5_tab tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_dffoundation5_interchange tinyint(4) unsigned DEFAULT '0' NOT NULL
);
