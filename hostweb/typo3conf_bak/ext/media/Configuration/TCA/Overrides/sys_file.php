<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');

$tca = array(
	'ctrl' => array(
		'default_sortby' => 'uid DESC',
		// Beware that "metadata.categories" is quite expansive performance wise.
		'searchFields' => 'uid, extension, name, metadata.title, metadata.description, metadata.categories',
	),
	'columns' => array(
		'extension' => array(
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim',
			),
		),
		'number_of_references' => array(
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'readOnly' => TRUE,
			),
		),
	),
	'vidi' => array(
		// For actions such as update, remove, copy, move, the DataHandler of the Core is configured to be used by default.
		// It will work fine in most cases. However, there is the chance to set your own Data Handler if there are special needs (@see FileDataHandler in EXT:media)
		// Another reasons, would be for speed. You will notice a performance cost when mass editing data using the Core DataHandler.
		// Using your own DataHandler would make the mass processing much faster.
		'data_handler' => array(
			// For all actions
			'*' => 'TYPO3\CMS\Media\DataHandler\FileDataHandler'
		),
	),
	'grid' => array(
		'facets' => array(
			'uid',
			new \TYPO3\CMS\Vidi\Facet\StandardFacet('extension', 'LLL:EXT:media/Resources/Private/Language/locallang.xlf:sys_file.extension'),
			'name',
			'identifier',
			'metadata.title',
			'metadata.description',
			'metadata.categories',
			new \TYPO3\CMS\Vidi\Facet\StandardFacet(
				'number_of_references',
				'LLL:EXT:media/Resources/Private/Language/locallang.xlf:usage',
				array('0', '1', '2', '3', 'etc...') // auto-suggestions
			),
		),
		'columns' => array(
			'__checkbox' => array(
				'renderer' => new TYPO3\CMS\Vidi\Grid\CheckBoxComponent(),
			),
			'uid' => array(
				'visible' => FALSE,
				'label' => 'LLL:EXT:media/Resources/Private/Language/locallang.xlf:uid',
				'width' => '5px',
			),
			'identifier' => array(
				'visible' => FALSE,
			),
			'fileinfo' => array(
				'renderer' => 'TYPO3\CMS\Media\Grid\PreviewRenderer',
				'label' => 'LLL:EXT:media/Resources/Private/Language/locallang.xlf:preview',
				'wrap' => '<div class="center preview">|</div>',
				'width' => '150px',
				'sortable' => FALSE,
			),
			'metadata.title' => array(
				'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'title')),
				'width' => '400px',
				'editable' => TRUE,
				'sortable' => TRUE,
			),
			'metadata.description' => array(
				'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'description')),
				'visible' => FALSE,
				'sortable' => FALSE,
			),
			'tstamp' => array(
				'visible' => FALSE,
				'format' => '\\TYPO3\\CMS\\Media\\Formatter\\Date',
				'label' => 'LLL:EXT:media/Resources/Private/Language/locallang.xlf:sys_file.tstamp',
			),
			'metadata.categories' => array(
				'renderers' => array(
					new \TYPO3\CMS\Vidi\Grid\RelationEditRendererComponent(),
					new \TYPO3\CMS\Media\Grid\CategoryRendererComponent(),
				),
				'editable' => TRUE,
				'visible' => TRUE,
				'sortable' => FALSE,
			),
			'usage' => array(
				'renderer' => 'TYPO3\CMS\Media\Grid\UsageRenderer',
				'label' => 'LLL:EXT:media/Resources/Private/Language/locallang.xlf:usage',
				'visible' => TRUE,
				'sortable' => FALSE,
			),
			'metadata' => array(
				'label' => 'Metadata File Identifier',
				'visible' => FALSE,
				'sortable' => FALSE,
			),
		)
	)
);

// Add more info to the Grid if EXT:filemetadata is loaded. Notice that the extension is not required but suggested.
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('filemetadata')) {

	$additionalTca = array(
		'ctrl' => array(
			'searchFields' => $tca['ctrl']['searchFields'] . ', metadata.keywords',
		),
		'grid' => array(
			'columns' => array(
				'metadata.keywords' => array(
					'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'keywords')),
					'label' => 'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.keywords',
					'visible' => FALSE,
					'sortable' => FALSE,
				),
				'metadata.fe_groups' => array(
					'renderers' => array(
						new \TYPO3\CMS\Vidi\Grid\RelationEditRendererComponent(),
						new \TYPO3\CMS\Media\Grid\FrontendPermissionRendererComponent(),
					),
					'label' => 'LLL:EXT:media/Resources/Private/Language/locallang.xlf:permissions_fe_groups',
					'visible' => FALSE,
					'sortable' => FALSE,
				),
				'metadata.status' => array(
					'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'status')),
					'label' => 'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.status',
					'visible' => FALSE,
					'width' => '5%',
					'sortable' => FALSE,
				),
				# un-comment me to see the "visible" flag in the grid.
				#'visible' => array(
				#	'renderer' => 'TYPO3\CMS\Media\Grid\VisibilityRenderer', @todo will not work out of the box after 6.2 migration
				#	'label' => 'LLL:EXT:vidi/Resources/Private/Language/locallang.xlf:visibility_abbreviation',
				#	'width' => '3%',
				#),
				'metadata.creator_tool' => array(
					'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'creator_tool')),
					'label' => 'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.creator_tool',
					'visible' => FALSE,
					'sortable' => FALSE,
				),
				'metadata.content_creation_date' => array(
					'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'content_creation_date')),
					'label' => 'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.content_creation_date',
					'visible' => FALSE,
					'format' => 'datetime',
					'sortable' => FALSE,
				),
				'metadata.content_modification_date' => array(
					'renderer' => new TYPO3\CMS\Media\Grid\MetadataRendererComponent(array('property' => 'content_modification_date')),
					'label' => 'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.content_modification_date',
					'visible' => FALSE,
					'format' => 'datetime',
					'sortable' => FALSE,
				),
			)
		)
	);
	\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($tca, $additionalTca);
}

// Control buttons such as edit, delete, etc... must be set at the end in any case.
$tca['grid']['columns']['__buttons'] = array(
	'renderer' => new TYPO3\CMS\Vidi\Grid\ButtonGroupComponent(),
);

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['sys_file'], $tca);