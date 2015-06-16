<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "toctoc_comments".
 *
 * Auto generated 16-06-2015 07:51
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'AJAX Social Network Components',
	'description' => 'AJAX-based commenting, review, rating and sharing system (jQuery) for TYPO3 4.3 to 7.x. 
		Comments or reviews can have webpage previews, pictures and pdfs attached. You can use BB-Codes, emojis and smilies. 
		Userpictures include gravatar-, Facebook- or fe_users-userpictures. 
		More plugin-modes for comments are available, a user center, a recent comments list, a report bad comment form and several charts. 
		Four looks for ratings by voting stars and Facebook-like iLikes, usage of scopes for categorizing ratings. 
		For ratings there is a plugin-mode for top ratings. Many options for spam- and data-protection. AJAX runs with jQuery.
		ViewHelpers for extension news. 
		Comments, reviews or ratings can trigger records in other extensions DETAIL-views and LIST-views (LIST-view tt_news, news, modify all other pi1-extensions in PHP and implement a new marker or ViewHelper for comments and ratings in LIST-views).
		Includes full featured AJAX Login and Sign Up, including login with Facebook or Google+ account. 
		Works with TemplaVoila, tx_news, tt_news, tt_products, community, cwt_community and many other extensions. 
		The extension is extremely configurable.',
	'category' => 'plugin',
	'version' => '7.3.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => 'uploads/tx_toctoccomments/temp, uploads/tx_toctoccomments/webpagepreview, uploads/tx_felogin',
	'clearcacheonload' => true,
	'author' => 'Gisele Wendl',
	'author_email' => 'gisele.wendl@toctoc.ch',
	'author_company' => 'TocToc Internetmanagement',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.3.0-7.9.99',
			'php' => '5.3.7-5.6.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

