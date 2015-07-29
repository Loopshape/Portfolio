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
 * API for modal windows powered by Twitter Bootstrap.
 * This module depends on TYPO3/CMS/Backend/Notification due to top.TYPO3.Severity.
 */
define('TYPO3/CMS/Backend/Modal', ['jquery', 'TYPO3/CMS/Backend/Notification', 'bootstrap'], function($) {

	/**
	 * The main object of the modal API
	 *
	 * @type {{instances: Array, currentModal: null, template: (*|jQuery|HTMLElement)}}
	 */
	var Modal = {
		instances: [],
		currentModal: null,
		template: $(
			'<div class="t3-modal modal fade">' +
				'<div class="modal-dialog">' +
					'<div class="modal-content">' +
						'<div class="modal-header">' +
							'<button class="close">' +
								'<span aria-hidden="true">&times;</span>' +
								'<span class="sr-only"></span>' +
							'</button>' +
							'<h4 class="modal-title"></h4>' +
						'</div>' +
						'<div class="modal-body"></div>' +
						'<div class="modal-footer"></div>' +
					'</div>' +
				'</div>' +
			'</div>'
		)
	};

	/**
	 * Get the correct css class for given severity
	 *
	 * @param {int} severity use constants from top.TYPO3.Severity.*
	 * @returns {string}
	 * @private
	 */
	Modal.getSeverityClass = function(severity) {
		var severityClass;
		switch (severity) {
			case top.TYPO3.Severity.notice:
				severityClass = 'notice';
				break;
			case top.TYPO3.Severity.ok:
				severityClass = 'success';
				break;
			case top.TYPO3.Severity.warning:
				severityClass = 'warning';
				break;
			case top.TYPO3.Severity.error:
				severityClass = 'danger';
				break;
			case top.TYPO3.Severity.info:
			default:
				severityClass = 'info';
				break;
		}
		return severityClass;
	};

	/**
	 * Shows a confirmation dialog
	 * Events:
	 * - button.clicked
	 * - confirm.button.cancel
	 * - confirm.button.ok
	 *
	 * @param {string} title the title for the confirm modal
	 * @param {string} content the content for the conform modal, e.g. the main question
	 * @param {int} severity default top.TYPO3.Severity.warning
	 * @param {array} buttons an array with buttons, default no buttons
	 */
	Modal.confirm = function(title, content, severity, buttons) {
		severity = (typeof severity !== 'undefined' ? severity : top.TYPO3.Severity.warning);
		buttons = buttons || [
			{
				text: $(this).data('button-close-text') || TYPO3.lang['button.cancel'] || 'Cancel',
				active: true,
				name: 'cancel'
			},
			{
				text: $(this).data('button-ok-text') || TYPO3.lang['button.ok'] || 'OK',
				btnClass: 'btn-' + Modal.getSeverityClass(severity),
				name: 'ok'
			}
		];
		$modal = Modal.show(title, content, severity, buttons);
		$modal.on('button.clicked', function(e) {
			if (e.target.name === 'cancel') {
				$(this).trigger('confirm.button.cancel');
			} else if (e.target.name === 'ok') {
				$(this).trigger('confirm.button.ok');
			}
		});
		return $modal;
	};

	/**
	 * load URL with AJAX, append the content to the modal-body
	 * and trigger the callback
	 *
	 * @param {string} title
	 * @param {int} severity
	 * @param {array} buttons
	 * @param {string} url
	 * @param {string} target
	 * @param {function} callback
	 */
	Modal.loadUrl = function(title, severity, buttons, url, callback, target) {
		$.get(url, function(response) {
			Modal.currentModal.find(target ? target : '.modal-body').empty().append(response);
			if (callback) {
				callback();
			}
			Modal.currentModal.trigger('modal-loaded');
		}, 'html');
		return Modal.show(title, '<p class="loadmessage"><i class="fa fa-spinner fa-spin fa-5x "></i></p>', severity, buttons);
	};


	/**
	 * Shows a dialog
	 * Events:
	 * - button.clicked
	 *
	 * @param {string} title the title for the confirm modal
	 * @param {string} content the content for the conform modal, e.g. the main question
	 * @param {int} severity default top.TYPO3.Severity.info
	 * @param {array} buttons an array with buttons, default no buttons
	 */
	Modal.show = function(title, content, severity, buttons) {
		severity = (typeof severity !== 'undefined' ? severity : top.TYPO3.Severity.info);
		buttons = buttons || [];
		Modal.currentModal = Modal.template.clone();
		Modal.currentModal.attr('tabindex', '-1');
		Modal.currentModal.find('.modal-title').text(title);
		Modal.currentModal.find('.modal-header .close').on('click', function() {
			Modal.currentModal.trigger('modal-dismiss');
		});

		if (typeof content === 'object') {
			Modal.currentModal.find('.modal-body').append(content);
		} else {
			// we need html, check if we have to wrap content in <p>
			if (!/^<[a-z][\s\S]*>/i.test(content)) {
				content = $('<p />').text(content);
			}

			Modal.currentModal.find('.modal-body').html(content);
		}

		Modal.currentModal.addClass('t3-modal-' + Modal.getSeverityClass(severity));
		if (buttons.length > 0) {
			for (var i=0; i<buttons.length; i++) {
				var button = buttons[i];
				var $button = $('<button />', {class: 'btn'});
				$button.html(button.text);
				if (button.active) {
					$button.addClass('t3js-active');
				}
				if (button.btnClass) {
					$button.addClass(button.btnClass);
				}
				if (button.name) {
					$button.attr('name', button.name);
				}
				if (button.trigger) {
					$button.on('click', button.trigger);
				}
				Modal.currentModal.find('.modal-footer').append($button);
			}
			Modal.currentModal
				.find('.modal-footer button')
				.on('click', function() {
					$(this).trigger('button.clicked');
				});

		} else {
			Modal.currentModal.find('.modal-footer').remove();
		}
		Modal.currentModal.on('shown.bs.modal', function(e) {
			// focus the button which was configured as active button
			$(this).find('.modal-footer .t3js-active').first().focus();
		});
		Modal.currentModal.on('hidden.bs.modal', function(e) {
			if (Modal.instances.length > 0) {
				var lastIndex = Modal.instances.length-1;
				Modal.instances.splice(lastIndex, 1);
				Modal.currentModal = Modal.instances[lastIndex-1];
			}
			$(this).remove();
			// Keep class modal-open on body tag as long as open modals exist
			if (Modal.instances.length > 0) {
				top.TYPO3.jQuery('body').addClass('modal-open');
			}
		});
		Modal.currentModal.on('show.bs.modal', function(e) {
			Modal.instances.push(Modal.currentModal);
			Modal.center();
		});
		Modal.currentModal.on('modal-dismiss', Modal.dismiss);
		top.TYPO3.jQuery('body').append(Modal.currentModal);
		Modal.currentModal.modal();

		return Modal.currentModal;
	};

	/**
	 * Close the current open modal
	 */
	Modal.dismiss = function() {
		if (Modal.currentModal) {
			Modal.currentModal.modal('hide');
			Modal.currentModal = null;
		}
	};

	/**
	 * Center the modal windows
	 */
	Modal.center = function() {
		$(window).off('resize', Modal.center);
		if(Modal.instances.length > 0){
			$(window).on('resize', Modal.center);
			$(Modal.instances).each(function() {
				var $me = $(this),
					$clone = $me.clone().css('display', 'block').appendTo('body'),
					top = Math.max(0, Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2));

				$clone.remove();
				$me.find('.modal-content').css('margin-top', top);
			});
		}
	};

	/**
	 * Initialize markup with data attributes
	 */
	Modal.initializeMarkupTrigger = function() {
		$(document).on('click', '.t3js-modal-trigger', function(evt) {
			evt.preventDefault();
			var $element = $(this);
			var url = $element.data('url') || null;
			var title = $element.data('title') || 'Alert';
			var content = $element.data('content') || 'Are you sure?';
			var severity = (typeof top.TYPO3.Severity[$element.data('severity')] !== 'undefined') ? top.TYPO3.Severity[$element.data('severity')] : top.TYPO3.Severity.info;
			var buttons = [
				{
					text: $element.data('button-close-text') || 'Close',
					active: true,
					trigger: function() {
						$element.trigger('modal-dismiss');
					}
				},
				{
					text: $element.data('button-ok-text') || 'OK',
					trigger: function() {
						$element.trigger('modal-dismiss');
						self.location.href = $element.data('href') || $element.attr('href');
					}
				}
			];
			if (url !== null) {
				var separator = (url.indexOf('?') > -1) ? '&' : '?';
				var params = $.param({data: $element.data()});
				Modal.loadUrl(title, severity, buttons, url + separator + params);
			} else {
				Modal.show(title, content, severity, buttons);
			}
		});
	};

	/**
	 * Custom event, fired if modal gets closed
	 */
	$(document).on('modal-dismiss', Modal.dismiss);

	/**
	 * Return the Modal object
	 */
	return function() {
		Modal.initializeMarkupTrigger();
		TYPO3.Modal = Modal;
		return Modal;
	}();
});
