
#
# Table structure for table 'index_config'
#
CREATE TABLE index_config (
  news_categoryselection text,
  news_usesubcategories tinyint(1) DEFAULT '0' NOT NULL,
  news_includenewswithoutcategory tinyint(1) DEFAULT '0' NOT NULL,
);
