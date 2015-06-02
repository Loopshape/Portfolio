#
# Table structure for table 'tx_calendar_cat'
#
CREATE TABLE tx_calendar_cat (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(10) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	image blob NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_calendar_targetgroup'
#
CREATE TABLE tx_calendar_targetgroup (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(10) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	image blob NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_calendar_organizer'
#
CREATE TABLE tx_calendar_organizer (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(10) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	image blob NOT NULL,
	url tinytext NOT NULL,
	url_text tinytext NOT NULL,
	email tinytext NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_calendar_item'
#
CREATE TABLE tx_calendar_item (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	fe_group int(11) DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	eventtype int(5) unsigned DEFAULT '0' NOT NULL,
	start_date int(11) DEFAULT '0' NOT NULL,
	start_time int(11) DEFAULT '0' NOT NULL,
	end_date int(11) DEFAULT '0' NOT NULL,
	end_time int(11) DEFAULT '0' NOT NULL,
	organizer_mm int(11) unsigned DEFAULT '0' NOT NULL,
	organizer tinytext NOT NULL,
	organizer_email tinytext NOT NULL,
	organizer_url tinytext NOT NULL,
	organizer_url_text tinytext NOT NULL,
	teaser tinytext NOT NULL,
	descr text NOT NULL,
	category int(11) unsigned DEFAULT '0' NOT NULL,
	targetgroup int(11) unsigned DEFAULT '0' NOT NULL,
	place tinytext NOT NULL,
	address text NOT NULL,
	moreinfo text NOT NULL,
	url tinytext NOT NULL,
	url_text tinytext NOT NULL,
	image blob NOT NULL,
	rec_end_date int(11) DEFAULT '0' NOT NULL,
	rec_end_times int(11) unsigned DEFAULT '0' NOT NULL,
	rec_daily_type int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_days int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_weeks int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_week_monday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	repeat_week_tuesday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	repeat_week_wednesday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	repeat_week_thursday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	repeat_week_friday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	repeat_week_saturday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	repeat_week_sunday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	rec_monthly_type int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_months int(11) unsigned DEFAULT '0' NOT NULL,
	rec_monthly_weekday int(11) unsigned DEFAULT '0' NOT NULL,
	rec_monthly_weekday_no int(11) unsigned DEFAULT '0' NOT NULL,
	rec_monthly_notfound int(11) unsigned DEFAULT '0' NOT NULL,
	rec_yearly_type int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_years int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_year_month int(11) unsigned DEFAULT '0' NOT NULL,
	repeat_year_day int(11) unsigned DEFAULT '0' NOT NULL,

	exception_mm int(11) unsigned DEFAULT '0' NOT NULL,
	exception_skip tinyint(4) unsigned DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);
