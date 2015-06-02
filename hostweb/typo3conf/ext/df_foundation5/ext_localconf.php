<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.imageorient.disableNoMatchingValueElement = 1');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.100 = Dropdown-Box click');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.101 = Dropdown-Box hover');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.110 = Modal-Box');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.120 = Close-Box Standard');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.121 = Close-Box Info');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.122 = Close-Box Warning');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.123 = Close-Box Error');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.section_frame.addItems.124 = Close-Box Success');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement.wizardItems {
	common.elements {
		image {
			tt_content_defValues {
				CType = image
				imagecols = 1
			}
		}
		textpic {
			tt_content_defValues {
				CType = textpic
				imageorient = 0
			}
		}
	}
}
');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	TCEFORM.tt_content.imageorient.types.image.removeItems = 0,1,2,8,9,10,30,31
	TCEFORM.tt_content {
		tx_dffoundation5_large_left_column.types.image.disabled = 1
		tx_dffoundation5_large_right_column.types.image.disabled = 1
		tx_dffoundation5_medium_left_column.types.image.disabled = 1
		tx_dffoundation5_medium_right_column.types.image.disabled = 1
		tx_dffoundation5_small_left_column.types.image.disabled = 1
		tx_dffoundation5_small_right_column.types.image.disabled = 1
		tx_dffoundation5_left_add.types.image.disabled = 1
		tx_dffoundation5_right_add.types.image.disabled = 1
	}
');
?>