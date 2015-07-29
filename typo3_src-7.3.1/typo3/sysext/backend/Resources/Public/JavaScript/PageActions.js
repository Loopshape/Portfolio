/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * JavaScript implementations for page actions
 */
define('TYPO3/CMS/Backend/PageActions', ['jquery'], function($) {
	var PageActions = {
		settings: {
			pageId: 0,
			canEditPage: false,
			language: {
				pageOverlayId: 0
			}
		},
		identifier: {
			$pageTitle: $('h1')
		}
	};

	/**
	 * Initialize page title renaming
	 */
	PageActions.initializePageTitleRenaming = function() {
		if (!(PageActions.settings.pageId > 0 && PageActions.settings.canEditPage)) {
			return;
		}

		var $editActionLink = $('<a class="hidden" href="#" data-action="edit"><span class="t3-icon fa fa-pencil"></span></a>');
		$editActionLink.on('click', function(e) {
			e.preventDefault();
			PageActions.editPageTitle();
		});
		PageActions.identifier.$pageTitle
			.on('dblclick', PageActions.editPageTitle)
			.on('mouseover', function() { $editActionLink.removeClass('hidden'); })
			.on('mouseout', function() { $editActionLink.addClass('hidden'); })
			.append($editActionLink);
	};

	/**
	 * Changes the h1 to an edit form
	 */
	PageActions.editPageTitle = function() {
		var $inputFieldWrap = $(
				'<form class="row">' +
					'<div class="col-lg-4 col-md-6 col-sm-12">' +
						'<div class="input-group">' +
							'<input class="form-control">' +
							'<span class="input-group-btn">' +
								'<button class="btn btn-default" type="button" data-action="submit"><span class="t3-icon fa fa-floppy-o"></span></button>' +
							'</span>' +
							'<span class="input-group-btn">' +
								'<button class="btn btn-danger" type="button" data-action="cancel"><span class="t3-icon fa fa-times"></span></button>' +
							'</span>' +
						'</div>' +
					'</div>' +
				'</form>'
			),
			$inputField = $inputFieldWrap.find('input');

		$inputFieldWrap.find('[data-action=cancel]').on('click', function() {
			$inputFieldWrap.replaceWith(PageActions.identifier.$pageTitle);
			PageActions.initializePageTitleRenaming();
		});

		$inputFieldWrap.find('[data-action=submit]').on('click', function() {
			var newPageTitle = $.trim($inputField.val());
			if (newPageTitle !== '' && PageActions.identifier.$pageTitle.text() !== newPageTitle) {
				PageActions.saveChanges($inputField);
			} else {
				$inputFieldWrap.find('[data-action=cancel]').trigger('click');
			}
		});

		// the form stuff is a wacky workaround to prevent the submission of the docheader form
		$inputField.parents('form').on('submit', function(e) {
			e.preventDefault();
			return false;
		});

		var $h1 = PageActions.identifier.$pageTitle;
		$h1.children().last().remove();
		$h1.replaceWith($inputFieldWrap);
		$inputField.val($h1.text()).focus();

		$inputField.on('keyup', function(e) {
			switch (e.which) {
				case 13: // enter
					$inputFieldWrap.find('[data-action=submit]').trigger('click');
					break;
				case 27: // escape
					$inputFieldWrap.find('[data-action=cancel]').trigger('click');
					break;
			}
		});
	};

	/**
	 * Set the page id (used in the RequireJS callback)
	 */
	PageActions.setPageId = function(pageId) {
		PageActions.settings.pageId = pageId;
	};

	/**
	 * Set if user can edit the page properties
	 */
	PageActions.setCanEditPage = function(allowed) {
		PageActions.settings.canEditPage = allowed;
	};

	/**
	 * Set the overlay id
	 */
	PageActions.setLanguageOverlayId = function(overlayId) {
		PageActions.settings.language.pageOverlayId = overlayId;
	};

	/**
	 * Save the changes and reload the page tree
	 */
	PageActions.saveChanges = function($field) {
		var $inputFieldWrap = $field.parents('form');
		$inputFieldWrap.find('button').addClass('disabled');
		$field.attr('disabled', 'disabled');

		var parameters = {},
			pagesTable,
			recordUid;

		if (PageActions.settings.language.pageOverlayId === 0) {
			pagesTable = 'pages';
			recordUid = PageActions.settings.pageId;
		} else {
			pagesTable = 'pages_language_overlay';
			recordUid = PageActions.settings.language.pageOverlayId;
		}

		parameters['data'] = {};
		parameters['data'][pagesTable] = {};
		parameters['data'][pagesTable][recordUid] = {title: $field.val()};
		require(['TYPO3/CMS/Backend/AjaxDataHandler'], function(DataHandler) {
			DataHandler.process(parameters).done(function(result) {
				$inputFieldWrap.find('[data-action=cancel]').trigger('click');
				PageActions.identifier.$pageTitle.text($field.val());
				PageActions.initializePageTitleRenaming();
				top.TYPO3.Backend.NavigationContainer.PageTree.refreshTree();
			}).fail(function() {
				$inputFieldWrap.find('[data-action=cancel]').trigger('click');
			});
		});
	};

	return function() {
		TYPO3.PageActions = PageActions;
		return PageActions;
	}();
});
