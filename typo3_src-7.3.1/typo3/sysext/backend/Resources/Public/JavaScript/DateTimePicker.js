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
 * contains all logic for the date time picker used in FormEngine
 * and EXT:belog and EXT:scheduler
 */
define('TYPO3/CMS/Backend/DateTimePicker', ['jquery'], function ($) {

	var DateTimePicker = {
		options: {
			fieldSelector: '.t3js-datetimepicker',
			format: (opener ? opener.top : top).TYPO3.settings.DateTimePicker.DateFormat
		}
	};

	/**
	 * initialize date fields to add a datepicker to each field
	 * note: this function can be called multiple times (e.g. after AJAX requests) because it only
	 * applies to fields which haven't been used yet.
	 */
	DateTimePicker.initialize = function() {
		// fetch the date time fields that heven't been initialized yet
		var $dateTimeFields = $(DateTimePicker.options.fieldSelector).filter(function() {
			return ($(this).data('DateTimePicker') == undefined);
		});

		if ($dateTimeFields.length > 0) {
			require(['moment', 'twbs/bootstrap-datetimepicker'], function(moment) {

				// initialize the datepicker on each selected element
				$dateTimeFields.each(function() {
					var $element = $(this);
					var format = DateTimePicker.options.format;
					var type = $element.data('dateType');
					var options = {
						sideBySide: true,
						icons: {
							time: 'fa fa-clock-o',
							date: 'fa fa-calendar',
							up: 'fa fa-chevron-up',
							down: 'fa fa-chevron-down',
							previous: 'fa fa-chevron-left',
							next: 'fa fa-chevron-right',
							today: 'fa fa-calendar-o',
							clear: 'fa fa-trash'
						}
					};

					// set options based on type
					switch (type) {
						case 'datetime':
							options.format = format[1];
							break;
						case 'date':
							options.format = format[0];
							break;
						case 'time':
							options.format = 'HH:mm';
							break;
						case 'timesec':
							options.format = 'HH:mm:ss';
							break;
						case 'year':
							options.format = 'YYYY';
							break;
					}

					// datepicker expects the min and max dates to be formatted with options.format but unix timestamp given
					if ($element.data('dateMindate')) {
						$element.data('dateMindate', moment.unix($element.data('dateMindate')).format(options.format));
					}
					if ($element.data('dateMaxdate')) {
						$element.data('dateMaxdate', moment.unix($element.data('dateMaxdate')).format(options.format));
					}

					// initialize the date time picker on this element
					$element.datetimepicker(options);
				});

				$dateTimeFields.on('blur', function(event) {
					var $element = $(this);
					var $hiddenField = $element.parent().parent().find('input[type=hidden]');

					if ($element.val() === '') {
						$hiddenField.val('');
					} else {
						var format = $element.data('DateTimePicker').format();
						var date = moment($element.val(), format);
						var calculateTimeZoneOffset = $element.data('date-offset');
						if (typeof calculateTimeZoneOffset !== 'undefined') {
							var timeZoneOffset = parseInt(calculateTimeZoneOffset);
						} else {
							var timeZoneOffset = date.utcOffset() * 60 * -1;
						}

						if (date.isValid()) {
							$hiddenField.val(date.unix() - timeZoneOffset);
						} else {
							date = moment($hiddenField.val() + timeZoneOffset, 'X');
							$element.val(date.format(format));
						}
					}
				});

				// on datepicker change, write the selected date with the timezone offset to the hidden field
				$dateTimeFields.on('dp.change', function(event) {
					var $element = $(this);
					var $hiddenField = $element.parent().parent().find('input[type=hidden]');

					if ($element.val() === '') {
						$hiddenField.val('');
					} else {
						var date = event.date;
						var calculateTimeZoneOffset = $element.data('date-offset');
						if (typeof calculateTimeZoneOffset !== 'undefined') {
							var timeZoneOffset = parseInt(calculateTimeZoneOffset);
						} else {
							var timeZoneOffset = date.utcOffset() * 60 * -1;
						}
						$hiddenField.val(date.unix() - timeZoneOffset);
					}
				});
			});
		}
	};

	/**
	 * initialize function
	 */
	return function() {
		DateTimePicker.initialize();
		return DateTimePicker;
	}();
});
