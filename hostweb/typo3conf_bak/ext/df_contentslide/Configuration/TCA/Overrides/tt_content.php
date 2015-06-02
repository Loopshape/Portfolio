<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) sgalinski Internet Services (http://www.sgalinski.de)
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

$tempColumns = array(
	'tx_df_contentslide_contentslide' => array(
		'exclude' => TRUE,
		'label' => 'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_activate',
		'config' => array(
			'type' => 'check',
			'default' => 0,
			'items' => array(
				1 => array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_activate'
				),
			),
		),
	),
	'tx_df_contentslide_options' => array(
		'exclude' => TRUE,
		'label' => 'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_options',
		'config' => array(
			'type' => 'check',
			'items' => array(
				1 => array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_options.withAjax'
				),
				2 => array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_options.expanded'
				),
			),
		),
		'displayCond' => 'FIELD:tx_df_contentslide_contentslide:REQ:TRUE',
	),
	'tx_df_contentslide_layout' => array(
		'exclude' => TRUE,
		'label' => 'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_layout',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_layout.layout1',
					'layout1'
				),
				array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_layout.layout2',
					'layout2'
				),
				array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_layout.layout3',
					'layout3'
				),
			),
		),
		'displayCond' => 'FIELD:tx_df_contentslide_contentslide:REQ:TRUE',
	),
	'tx_df_contentslide_animation' => array(
		'exclude' => TRUE,
		'label' => 'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_animation',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_animation.slideDownwards',
					'slideDownwards'
				),
				array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_animation.slideUpwards',
					'slideUpwards'
				),
				array(
					'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_animation.fade',
					'fade'
				),
			),
		),
		'displayCond' => 'FIELD:tx_df_contentslide_contentslide:REQ:TRUE',
	),
	'tx_df_contentslide_header' => array(
		'exclude' => TRUE,
		'label' => 'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_useCustomHeader',
		'config' => array(
			'type' => 'input',
		),
		'displayCond' => 'FIELD:tx_df_contentslide_contentslide:REQ:TRUE',
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns, 1);

$paletteLabel = 'LLL:EXT:df_contentslide/Resources/Private/Languages/locallang_db.xlf:tt_content.tx_df_contentslide_contentslide';
$position .= '--palette--;' . $paletteLabel . ';df_contentslide';

$GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'] .= ', tx_df_contentslide_contentslide';

$GLOBALS['TCA']['tt_content']['palettes']['df_contentslide'] = array(
	'showitem' => 'tx_df_contentslide_contentslide, tx_df_contentslide_options,' .
		'tx_df_contentslide_layout, tx_df_contentslide_animation',
//	--linebreak--, tx_df_contentslide_header
	'canNotCollapse' => 1,
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tt_content', $position, 'text,textpic,shortcut,image,gridelements_pi1', 'after:layout'
);