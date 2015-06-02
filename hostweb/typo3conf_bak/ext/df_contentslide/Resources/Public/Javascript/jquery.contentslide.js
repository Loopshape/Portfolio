if (!document.documentElement.className.match(/(^| )hasJs/)) {
	document.documentElement.className = 'hasJs ' + document.documentElement.className;
}

(function() {

	/**
	 * This object stores all available transitions
	 *
	 * @type {object}
	 */
	var transitions = {
		slideDownwards: {
			className: 'dfcontentslide-transition-slide-downwards',
			onTransition: function(content, action) {
				if (action === 'expand') {
					content.slideDown();
				} else {
					content.slideUp();
				}
			},
			cssTransition: false
		},
		slideUpwards: {
			className: 'dfcontentslide-transition-slide-upwards',
			onTransition: function(content, action) {
				if (action === 'expand') {
					content.slideDown();
				} else {
					content.slideUp();
				}
			},
			cssTransition: false
		},
		fade: {
			className: 'dfcontentslide-transition-fade',
			cssTransition: true
		},
		// fallback transition that relies on JavaScript only
		fallback: {
			className: 'dfcontentslide-transition-fallback',
			onTransition: function(content) {
				content.slideToggle();
			}
		}
	};

	/**
	 * A ContentSlide object represents a single slide instance
	 *
	 * @param {HTMLElement} _slideRoot The slides root element
	 * @returns {object}
	 * @constructor
	 */
	function ContentSlide (_slideRoot) {
		'use strict';

		var toggle,
			content,
			ContentSlide = {},
			lastTransitionClassName,
			options = {
				transition: 'slideDownwards'
			};

		/**
		 * Initialize this ContentSlide
		 */
		function init() {
			toggle = $('.dfcontentslide-toggle', _slideRoot).first();
			_slideRoot = $(_slideRoot);

			initFromDataAttributes();
			initContent();

			if (_slideRoot.hasClass('dfcontentslide-open')) {
				loadContent().then(ContentSlide.expand);
			}

			// kill all default events on the toggle to prevent issues with selecting elements via keyboard
			$('a', toggle).off('click').on('click', function(_event){ _event.preventDefault(); });
			// attach toggle event listener
			toggle.on('click', ContentSlide.toggle);
		}

		function initContent() {
			content = $('.dfcontentslide-content', _slideRoot).first();
			setTransition();
			$(ContentSlide).on('optionsChange', setTransition);
		}

		/**
		 * Set options via configuration data-attributes on _slideRoot
		 */
		function initFromDataAttributes() {
			var slideAnimationName = _slideRoot.data('dfcontentslide-animation');
			if (typeof slideAnimationName !== 'undefined' && slideAnimationName in transitions) {
				ContentSlide.setOptions({transition: slideAnimationName});
			}
		}

		/**
		 * Set the given transition for this ContentSlide
		 */
		function setTransition() {
			// remove old transition class
			if (lastTransitionClassName) {
				content.removeClass(lastTransitionClassName);
			}
			// set fallback transition if the selected one is not supported
			if (transitions[options.transition].cssTransition && !$.support.transition) {
				options.transition = 'fallback';
			}
			// change the data-attribute if it is not valid anymore
			if (_slideRoot.data('dfcontentslide-animation') !== options.transition) {
				// this needs to be done via attr, since data() doesn't update the html attribute
				_slideRoot.attr('data-dfcontentslide-animation', options.transition);
			}
			content.addClass(transitions[options.transition].className);
			lastTransitionClassName = transitions[options.transition].className;
		}

		/**
		 * This function checks if content is present and loads it via ajax if not.
		 *
		 * @returns {Promise} Promise resolves if content is present
		 */
		function loadContent() {
			var deferred = $.Deferred();
			// check if content is already there
			if (content.length === 0) {
				// display loading spinner while request is processed
				var spinner = $('<div class="dfcontentslide-spinner" />');
				_slideRoot.append(spinner);

				// grab content via ajax
				$.ajax({
					type: 'get',
					url: 'index.php?eID=dfcontentslide',
					data: 'df_contentslide[id]=' + toggle.find('a').attr('id').substring(3)
				}).then(function(response) {
					response = $(response);
					spinner.remove();
					if (response.length > 0) {
						_slideRoot.append(response);
						initContent();
					}
					deferred.resolve();
				});
			} else {
				// content is already there, nothing to do
				deferred.resolve();
			}

			return deferred.promise();
		}

		/**
		 * Expand the slide and trigger expand event
		 */
		ContentSlide.expand = function() {
			var transition = transitions[options.transition];
			if (transition.onTransition) {
				transition.onTransition.call(this, content, 'expand');
			}
			_slideRoot.addClass('dfcontentslide-open');
			_slideRoot.trigger('expand', [toggle, content]);
		};

		/**
		 * Collapse the slide and trigger collapse event
		 */
		ContentSlide.collapse = function() {
			var transition = transitions[options.transition];
			if (transition.onTransition) {
				transition.onTransition.call(this, content, 'collapse');
			}
			_slideRoot.removeClass('dfcontentslide-open');
			_slideRoot.trigger('collapse', [toggle, content]);
		};

		/**
		 * Toggle the slide
		 *
		 * @param _event {Event} The click event
		 */
		ContentSlide.toggle = function(_event) {
			_event.preventDefault();
			if (_slideRoot.hasClass('dfcontentslide-open')) {
				ContentSlide.collapse();
			} else {
				loadContent().then(ContentSlide.expand);
			}
		};

		/**
		 * Set options object. The provided options will be merged with the default ones.
		 *
		 * @param _optionsObject {Object} new options to be set
		 */
		ContentSlide.setOptions = function(_optionsObject) {
			$.extend(options, _optionsObject);
			$(ContentSlide).trigger('optionsChange');
		};

		/**
		 * Get the slide root element
		 *
		 * @returns {HTMLElement} the root DOM node of this slide
		 */
		ContentSlide.getSlideRoot = function() {
			return _slideRoot;
		};

		init();

		return ContentSlide;
	}

	/**
	 * A ContentSlideManager can be used to control a set of ContentSlides
	 *
	 * @param {object} _slides An iterable object containing ContentSlide root elements
	 * @returns {object}
	 * @constructor
	 */
	window.ContentSlideManager = function(_slides) {
		'use strict';

		var slides = {},
			ContentSlideManager = {};

		/**
		 * Initialize the ContentSlideManager
		 */
		function init() {
			ContentSlideManager.addSlides(_slides);
			hashChanged();
			$(window).on('hashchange', hashChanged);
		}

		/**
		 * Expands the slide associated with the current hash
		 */
		function hashChanged() {
			var hash = window.location.hash;
			if (hash in slides) {
				slides[hash].expand();
			}
		}

		/**
		 * Add slides to the ContentSlideManager
		 *
		 * @param _slides {Object} An iterable object containing the slideRoots
		 */
		ContentSlideManager.addSlides = function(_slides) {
			_slides.each(function() {
				var slideObject = $('.dfcontentslide-toggle a', this).get(0);
				if (typeof slideObject !== 'undefined') {
					slides['#' + slideObject.id] = new ContentSlide(this);
				}
			});
		};

		/**
		 * Expands all managed Slides
		 */
		ContentSlideManager.expandAll = function() {
			for (var slideId in slides) {
				slides[slideId].expand();
			}
		};

		/**
		 * Collapses all managed Slides
		 */
		ContentSlideManager.collapseAll = function() {
			for (var slideId in slides) {
				slides[slideId].collapse();
			}
		};

		/**
		 * Get the ContentSlide object associated with _hash
		 * @param _hash {String} the hash of the desired ContentSlide
		 * @returns {Object} the ContentSlide object
		 */
		ContentSlideManager.getSlide = function(_hash) {
			return slides[_hash];
		};

		/**
		 * Get all available slide Objects
		 *
		 * @returns {Object} an object containing all ContentSlide objects
		 */
		ContentSlideManager.getAllSlides = function() {
			return slides;
		};

		init();

		return ContentSlideManager;
	}
})();

$.support.transition = (function(){
	var thisBody = document.body || document.documentElement,
		thisStyle = thisBody.style;
		return thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;
})();

$(document).ready(function() {
	window.ContentSlideManager.instance = new ContentSlideManager($('.dfcontentslide-wrap'));
});
