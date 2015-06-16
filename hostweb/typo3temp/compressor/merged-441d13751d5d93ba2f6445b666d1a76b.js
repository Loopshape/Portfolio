
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

Ext.ns('TYPO3', 'TYPO3.Components');

/**
 * TYPO3window - General TYPO3 window component
 */
TYPO3.Components.Window = Ext.extend(Ext.Window, {
	width: 450,
	autoHeight: true,
	closable: true,
	resizable: false,
	plain: true,
	border: false,
	modal: true,
	draggable: true,
	closeAction: 'hide',
	cls: 't3-window',

	constructor: function(config) {
		config = config || {};
		Ext.apply(this, config);
		TYPO3.Components.Window.superclass.constructor.call(this, config);
	}
});
Ext.reg('TYPO3window', TYPO3.Components.Window);


/**
 * Helper class for managing windows.
 * Once a window is created, it is permanent until you close
 * [TYPO3.Windows.close(id)] or remove all [TYPO3.Windows.closeAll()]
 *
 * Example usage:
 *
 * var w = TYPO3.Windows.getWindow({
 *		title: 'Testwindow',
 *		html: 'some content!',
 *		width: 400
 *	}).show();
 */
TYPO3.Windows = function() {
	/** @private */
	var windowCollection = new Ext.util.MixedCollection(true);

	return {
		/** @public */

		/**
		 * Get a window. If already in collection return it, otherwise create a new one
		 *
		 * @param {Object} configuration
		 * @return {Object} window
		 */
		getWindow: function(configuration) {
			var id = configuration.id || '', window;

			if (id) {
				window = this.getById(id);
			}
			if (window) {
				return window;
			} else {
				window = new TYPO3.Components.Window(configuration);
				windowCollection.add(window);
				return window;
			}
		},

		/**
		 * Get a window and show. If already in collection return it, otherwise create a new one
		 *
		 * @param {Object} configuration
		 * @return {Object} window
		 */
		showWindow: function(configuration) {
			var window = this.getWindow(configuration);
			window.show();
			return window;
		},

		/**
		 * Shows window with id and return reference. If not exist return false
		 *
		 * @param {String} id
		 * @return {Object} window false if not found
		 */
		show: function(id) {
			var window = this.getById(id);
			if (window) {
				window.show();
				return window;
			}
			return false;
		},

		/**
		 * Shows window with id and return reference. If not exist return false
		 *
		 * @param {String} id
		 * @return {Object} window or false if not found
		 */
		getById: function(id) {
			return windowCollection.key(id);
		},

		/**
		 * Get the window collection
		 *
		 * @return {Ext.util.MixedCollection} windowCollection
		 */
		getCollection: function () {
			return windowCollection;
		},

		/**
		 * Get count of windows
		 *
		 * @return {Int} count
		 */
		getCount: function() {
			return windowCollection.length;
		},

		/**
		 * Each for windowCollection
		 *
		 * @param {Function} function
		 * @param {Object} scope
		 * @return void
		 */
		each : function(fn, scope) {
			windowCollection.each(fn, scope);
		},

		/**
		 * Close window and remove from stack
		 *
		 * @param {Int} id
		 * @return void
		 */
		close: function(id) {
			var window = this.getById(id);
			if (window) {
				window.close();
				windowCollection.remove(window);
			}
		},

		/**
		 * Close all windows and clear stack
		 *
		 * @return void
		 */
		closeAll: function() {
			windowCollection.each(function(window) {
				window.close();
			});
			windowCollection.clear();
		}
	}
}();

/**
 * Helper class for dialog windows
 *
 * Example usage:
 *
 * TYPO3.Dialog.InformationDialog({
 * 		title: 'Test',
 *		msg: 'some information'
 *	});

 */
TYPO3.Dialog = function() {
	/** @private functions */
	var informationDialogConfiguration = {
		buttons: Ext.MessageBox.OK,
		icon: Ext.MessageBox.INFO,
		fn: Ext.emptyFn
	};

	var questionDialogConfiguration = {
		buttons: Ext.MessageBox.YESNO,
		icon: Ext.MessageBox.QUESTION
	};

	var warningDialogConfiguration = {
		buttons: Ext.MessageBox.OK,
		icon: Ext.MessageBox.WARNING,
		fn: Ext.emptyFn
	};

	var errorDialogConfiguration = {
		buttons: Ext.MessageBox.OK,
		icon: Ext.MessageBox.ERROR,
		fn: Ext.emptyFn
	};

	return {
		/** @public functions */
		InformationDialog: function(configuration) {
			configuration = configuration || {};
			configuration = Ext.apply(
					informationDialogConfiguration,
					configuration
					);
			Ext.Msg.show(configuration);
		},

		QuestionDialog: function(configuration) {
			configuration = configuration || {};
			configuration = Ext.apply(
					questionDialogConfiguration,
					configuration
					);
			Ext.Msg.show(configuration);
		},

		WarningDialog: function(configuration) {
			configuration = configuration || {};
			configuration = Ext.apply(
					warningDialogConfiguration,
					configuration
					);
			Ext.Msg.show(configuration);
		},

		ErrorDialog: function(configuration) {
			configuration = configuration || {};
			configuration = Ext.apply(
					errorDialogConfiguration,
					configuration
					);
			Ext.Msg.show(configuration);
		}
	}
}();

// Avoid re-initialization on AJax call when HTMLArea object was already initialized
if (typeof HTMLArea === 'undefined') {

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
 * Establish namespace
 */
var HTMLArea = HTMLArea || {};
HTMLArea.jQuery = TYPO3.jQuery;
HTMLArea.CSS = {};

/**
 * ExtJS namespacing
 */
Ext.ux.form = {};
Ext.ux.menu = {};
Ext.ux.Toolbar = {};
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
 * Identify the current user agent
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent', [], function () {

	var userAgent = navigator.userAgent.toLowerCase();
	var documentMode = document.documentMode,
		isOpera = /opera/i.test(userAgent),
		isChrome = /\bchrome\b/i.test(userAgent),
		isWebKit = /webkit/i.test(userAgent),
		isIE = (!isOpera && /msie/i.test(userAgent)) || /trident/i.test(userAgent),
		isIE6 = isIE && /msie 6/i.test(userAgent),
		isIE7 = isIE && (/msie 7/i.test(userAgent) || documentMode == 7),
		isIE8 = isIE && ((/msie 8/i.test(userAgent) && documentMode != 7) || documentMode == 8),
		isIEBeforeIE9 = isIE6 || isIE7 || isIE8 || (isIE && typeof documentMode !== 'undefined' && documentMode < 9),
		isGecko = !isWebKit && !isIE && /gecko/i.test(userAgent),
		isiPhone = /iphone/i.test(userAgent),
		isiPad = /ipad/i.test(userAgent);
	return {
		isOpera: isOpera,
		isChrome: isChrome,
		isWebKit: isWebKit,
		isSafari: !isChrome && /safari/i.test(userAgent),
		isIE: isIE,
		isIE6: isIE6,
		isIE7: isIE7,
		isIE8: isIE8,
		isIEBeforeIE9: isIEBeforeIE9,
		isGecko: isGecko,
		isGecko2: isGecko && /rv:1\.8/i.test(userAgent),
		isGecko3: isGecko && /rv:1\.9/i.test(userAgent),
		isWindows: /windows|win32/i.test(userAgent),
		isMac: /macintosh|mac os x/i.test(userAgent),
		isAir: /adobeair/i.test(userAgent),
		isLinux: /linux/i.test(userAgent),
		isAndroid: /android/i.test(userAgent),
		isiPhone: isiPhone,
		isiPad: isiPad,
		isiOS: isiPhone || isiPad,
		/**
		 * Check if the client agent is supported
		 *
		 * @return boolean true if the client is supported
		 */
		isSupported: function () {
			return isGecko || isWebKit || isOpera || (isIE && !isIEBeforeIE9);
		}
	};
});

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
/***************************************************
 *  UTILITY FUNCTIONS
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent'],
	function (UserAgent) {

	var Util = {

		/**
		 * Perform HTML decoding of some given string
		 * Borrowed in part from Xinha (is not htmlArea) - http://xinha.gogo.co.nz/
		 */
		htmlDecode: function (str) {
			str = str.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
			str = str.replace(/&nbsp;/g, '\xA0'); // Decimal 160, non-breaking-space
			str = str.replace(/&quot;/g, '\x22');
			str = str.replace(/&#39;/g, "'");
			str = str.replace(/&amp;/g, '&');
			return str;
		},

		/**
		 * Perform HTML encoding of some given string
		 */
		htmlEncode: function (str) {
			if (typeof str !== 'string') {
				str = str.toString();
			}
			str = str.replace(/&/g, '&amp;');
			str = str.replace(/</g, '&lt;').replace(/>/g, '&gt;');
			str = str.replace(/\xA0/g, '&nbsp;'); // Decimal 160, non-breaking-space
			str = str.replace(/\x22/g, '&quot;'); // \x22 means '"'
			return str;
		},

		/**
		 * Empty function
		 */
		emptyFunction: function () {},

		/**
		 * Copies all the properties of config to obj.
		 * @param Object obj The receiver of the properties
		 * @param Object config The source of the properties
		 * @param Object defaults A different object that will also be applied for default values
		 * @return Object obj
		 */
		apply: function (object, config, defaults){
			if (defaults){
				Util.apply(object, defaults);
			}
			if (object && typeof object === 'object' && config && typeof config === 'object'){
				for (var property in config) {
					object[property] = config[property];
				}
			}
			return object;
		},

		/**
		 * Copies all the properties of config to object if they don't already exist.
		 *
		 * @param Object object The receiver of the properties
		 * @param Object config The source of the properties
		 * @return Object object
		 */
		applyIf: function (object, config) {
			if (object && typeof object === 'object' && config && typeof config === 'object') {
				for (var property in config){
					if (typeof object[property] === 'undefined') {
						object[property] = config[property];
					}
				}
			}
			return object;
		},

		/**
		 * Simple inheritance
		 * subClass inherits from superClass
		 *
		 * @param Object subClass The class that inherits
		 * @param Object superClass The source of the properties
		 * @return Object the subClass
		 */
		inherit: function (subClass, superClass) {
		    	var Construct = Util.emptyFunction;
		    	Construct.prototype = superClass.prototype;
		    	subClass.prototype = new Construct;
		    	subClass.prototype.constructor = subClass;
			subClass.super = superClass;
			return subClass;
		},

		/**
		 * Width of the browser scrollbar
		 */
		scrollBarWidth: null,

		/**
		 * Utility method for getting the width of the browser scrollbar. This can differ depending on
		 * operating system settings, such as the theme or font size.
		 *
		 * @return integer The width of the scrollbar.
		 */
		getScrollBarWidth: function (){
			if (Util.scrollBarWidth === null) {
				// Append a div, do calculation and then remove it
				var div = document.createElement('div');
				div.style.cssText = 'position:absolute!important;left:-10000px;top:-10000px;visibility:hidden;width:100px;height:50px;overflow:hidden;';
				div = document.body.appendChild(div);
				var innerDiv = document.createElement('div');
				innerDiv.style.height = '200px';
				innerDiv = div.appendChild(innerDiv);
				var w1 = innerDiv.offsetWidth;
				div.style.overflow = (UserAgent.isWebKit || UserAgent.isGecko) ? 'auto' : 'scroll';
				var w2 = innerDiv.offsetWidth;
				div.parentNode.removeChild(div);
				// Need to add 2 to ensure we leave enough space
				Util.scrollBarWidth = w1 - w2 + 2;
		    }
		    return Util.scrollBarWidth;
		},

		/**
		 * Test whether a css property is supported by the browser
		 *
		 * @param object element: the DOM element on which to test
		 * @param string property: the CSSS property to test
		 * @param value value: the value to test
		 * @return boolean true if the property is supported
		 */
		testCssPropertySupport: function (element, property, value) {
			var style = element.style;
			if (!(property in style)) {
				return false;
			}
			var before = style[property];
			try {
				style[property] = value;
			} catch (e) {}
			var after = style[property];
			style[property] = before;
			return before !== after;
		}
	};

	return Util;

});

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
/***************************************************
 *  Color utilities
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Color', [], function () {

	return {

		/**
		 * Returns a rgb-style color from a number
		 */
		colorToRgb: function(v) {
			if (typeof(v) != 'number') {
				return v;
			}
			var r = v & 0xFF;
			var g = (v >> 8) & 0xFF;
			var b = (v >> 16) & 0xFF;
			return 'rgb(' + r + ',' + g + ',' + b + ')';
		},

		/**
		 * Returns hexadecimal color representation from a number or a rgb-style color.
		 */
		colorToHex: function(v) {
			if (typeof v === 'undefined' || v == null) {
				return '';
			}
			function hex(d) {
				return (d < 16) ? ('0' + d.toString(16)) : d.toString(16);
			};
			if (typeof(v) == 'number') {
				var b = v & 0xFF;
				var g = (v >> 8) & 0xFF;
				var r = (v >> 16) & 0xFF;
				return '#' + hex(r) + hex(g) + hex(b);
			}
			if (v.substr(0, 3) === 'rgb') {
				var re = /rgb\s*\(\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\s*\)/;
				if (v.match(re)) {
					var r = parseInt(RegExp.$1);
					var g = parseInt(RegExp.$2);
					var b = parseInt(RegExp.$3);
					return ('#' + hex(r) + hex(g) + hex(b)).toUpperCase();
				}
				return '';
			}
			if (v.substr(0, 1) === '#') {
				return v;
			}
			return '';
		},

		/**
		 * Select interceptor to ensure that the color exists in the palette before trying to select
		 */
		checkIfColorInPalette: function (color) {
				// Do not continue if the new color is not in the palette
			if (this.el && !this.el.child('a.color-' + color)) {
					// Remove any previous selection
				this.deSelect();
				return false;
			}
		}
	}
});

/**
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
/***************************************************
 *  Make resizable
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Resizable',
	['jquery',
	'jquery-ui/resizable'],
	function ($, Resizable) {

	var Resizable = {

		/**
		 * Make an element resizable
		 *
		 * @param object element: the target element
		 * @param object
		 */
		makeResizable: function (element, config) {
			if (typeof config !== 'undefined') {
				return $(element).resizable(config);
			} else {
				return $(element).resizable();
			}
		},

		/**
		 * Removes the resizable feature from the element
		 *
		 * @param object element: the target element
		 * @return object the element
		 */
		destroy: function (element) {
			return $(element).resizable('destroy');
		}
	};

	return Resizable;

});

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
/***************************************************
 *  Color utilities
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/String',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent'],
	function (UserAgent) {

	// Create the ruler
	if (!document.getElementById('htmlarea-ruler')) {
		// Insert the css rule in the stylesheet
		var styleSheet = document.styleSheets[0];
		var selector = '#htmlarea-ruler';
		var style = 'visibility: hidden; white-space: nowrap;';
		var rule = selector + ' { ' + style + ' }';
		if (!UserAgent.isIEBeforeIE9) {
			try {
				styleSheet.insertRule(rule, styleSheet.cssRules.length);
			} catch (e) {}
		} else {
			styleSheet.addRule(selector, style);
		}
		//Insert the ruler on the document
		var ruler = document.createElement('span');
		ruler.setAttribute('id', 'htmlarea-ruler');
		document.body.appendChild(ruler);
	}

	/**
	 * Get the visual length of a string
	 */
	String.prototype.visualLength = function() {
		var ruler = document.getElementById('htmlarea-ruler');
		ruler.innerHTML = this;
		return ruler.offsetWidth;
	};

	/**
	 * Set an ellipsis on a string
	 */
	String.prototype.ellipsis = function(length) {
		var temp = this;
		var trimmed = this;
		if (temp.visualLength() > length) {
			trimmed += "...";
			while (trimmed.visualLength() > length) {
				temp = temp.substring(0, temp.length-1);
					trimmed = temp + "...";
			}
		}
		return trimmed;
	};
});

/***************************************************
 *  TIPS ON FORM FIELDS AND MENU ITEMS
 ***************************************************/
/*
 * Intercept Ext.form.Field.afterRender in order to provide tips on form fields and menu items
 * Adapted from: http://www.extjs.com/forum/showthread.php?t=36642
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Tips',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent'],
	function (UserAgent) {

	Tips = {
		tipsOnFormFields: function () {
			if (this.helpText || this.helpTitle) {
				if (!this.helpDisplay) {
					this.helpDisplay = 'both';
				}
				var label = this.label;
					// IE has problems with img inside label tag
				if (label && this.helpIcon && !UserAgent.isIE) {
					var helpImage = label.insertFirst({
						tag: 'img',
						src: HTMLArea.editorSkin + 'images/system-help-open.png',
						style: 'vertical-align: middle; padding-right: 2px;'
					});
					if (this.helpDisplay == 'image' || this.helpDisplay == 'both'){
						Ext.QuickTips.register({
							target: helpImage,
							title: this.helpTitle,
							text: this.helpText
						});
					}
				}
				if (this.helpDisplay == 'field' || this.helpDisplay == 'both'){
					Ext.QuickTips.register({
						target: this,
						title: this.helpTitle,
						text: this.helpText
					});
				}
			}
		},
		tipsOnMenuItems: function () {
			if (this.helpText || this.helpTitle) {
				Ext.QuickTips.register({
					target: this,
					title: this.helpTitle,
					text: this.helpText
				});
			}
		}
	};

	Ext.form.Field.prototype.afterRender = Ext.form.Field.prototype.afterRender.createInterceptor(Tips.tipsOnFormFields);
	Ext.menu.BaseItem.prototype.afterRender = Ext.menu.BaseItem.prototype.afterRender.createInterceptor(Tips.tipsOnMenuItems);

	return Tips;
});

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
/***************************************************
 * HTMLArea.util.TYPO3: Utility functions for dealing with tabs and inline elements in TYPO3 forms
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/TYPO3',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM'],
	function (UserAgent, Dom) {

	return {

		/**
		 * Simplify the array of nested levels. Create an indexed array with the correct names of the elements.
		 *
		 * @param	object		nested: The array with the nested levels
		 * @return	object		The simplified array
		 * @author	Oliver Hader <oh@inpublica.de>
		 */
		simplifyNested: function(nested) {
			var i, type, level, elementId, max, simplifiedNested=[],
				elementIdSuffix = {
					tab: '-DIV',
					inline: '_div',
					flex: '-content'
				};
			if (nested && nested.length) {
				if (nested[0][0]=='inline') {
					nested = inline.findContinuedNestedLevel(nested, nested[0][1]);
				}
				for (i = 0, max=nested.length; i < max; i++) {
					type = nested[i][0];
					level = nested[i][1];
					elementId = level + elementIdSuffix[type];
					if (document.getElementById(elementId)) {
						simplifiedNested.push(elementId);
					}
				}
			}
			return simplifiedNested;
		},

		/**
		 * Access an inline relational element or tab menu and make it "accessible".
		 * If a parent or ancestor object has the style "display: none", offsetWidth & offsetHeight are '0'.
		 *
		 * @params array parentElements: array of parent elements id's; note that this input array will be modified
		 * @params object callbackFunc: A function to be called, when the embedded objects are "accessible".
		 * @params array args: array of arguments
		 * @return object An object returned by the callbackFunc.
		 * @author Oliver Hader <oh@inpublica.de>
		 */
		accessParentElements: function (parentElements, callbackFunc, args) {
			var result = {};
			if (parentElements.length) {
				var currentElementId = parentElements.pop();
				var currentElement = document.getElementById(currentElementId);
				var actionRequired = (currentElementId.indexOf('-DIV') !== -1 && !Dom.hasClass(currentElement, 'active'))
					|| (currentElementId.indexOf('_div') !== -1 && !Dom.hasClass(currentElement, 'panel-visible'))
					|| (currentElement.style.display === 'none');
				if (actionRequired) {
					var visibility = currentElement.style.visibility;
					var position = currentElement.style.position;
					var top = currentElement.style.top;
					var display = currentElement.style.display;
					var className = currentElement.className;
					currentElement.style.visibility = 'hidden';
					currentElement.style.position = 'absolute';
					currentElement.style.top = '-10000px';
					currentElement.style.display = '';
					if (currentElementId.indexOf('-DIV') !== -1) {
						Dom.addClass(currentElement, 'active');
					} else if (currentElementId.indexOf('_div') !== -1) {
						Dom.addClass(currentElement, 'panel-visible');
					}
					currentElement.className = '';
				}
				result = this.accessParentElements(parentElements, callbackFunc, args);
				if (actionRequired) {
					currentElement.style.visibility = visibility;
					currentElement.style.position = position;
					currentElement.style.top = top;
					currentElement.style.display = display;
					currentElement.className = className;
				}
			} else {
				result = eval(callbackFunc);
			}
			return result;
		},

		/**
		 * Check if all elements in input array are currently displayed
		 *
		 * @param array elements: array of element id's
		 * @return boolean true if all elements are displayed
		 */
		allElementsAreDisplayed: function(elements) {
			var allDisplayed = true;
			for (var i = elements.length; --i >= 0;) {
				var element = document.getElementById(elements[i]);
				if (element) {
					if (element.style.display) {
						allDisplayed = element.style.display !== 'none';
					}
					if (elements[i].indexOf('-DIV') !== -1) {
						allDisplayed = allDisplayed && Dom.hasClass(element, 'active');
					} else if (elements[i].indexOf('_div') !== -1) {
						allDisplayed = allDisplayed && Dom.hasClass(element, 'panel-visible');
					}
				}
				if (!allDisplayed) {
					break;
				}
			}
			return allDisplayed;
		},

		/**
		 * Get current size of window
		 *
		 * @return object width and height of window
		 */
		getWindowSize: function () {
			if (UserAgent.isIE) {
				var body = document.body, html = document.documentElement;
				var size = {
					width: document.body.clientWidth,
					height: Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight)
				};
			} else {
				var size = {
					width: window.innerWidth,
					height: window.innerHeight
				};
			}
			// Subtract the docheader height from the calculated window height
			var docHeader = document.getElementById('typo3-docheader');
			if (docHeader) {
				size.height -= docHeader.offsetHeight;
			}
			return size;
		}
	}
});

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
 * Ajax object
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Ajax/Ajax',
	['jquery',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function($, Util) {

	/**
	 * Constructor method
	 */
	var Ajax = function (config) {
		Util.apply(this, config);
	};

	Ajax.prototype = {

		/**
		 * Load a Javascript file asynchronously
		 *
		 * @param string url: url of the file to load
		 * @param function callBack: the callBack function
		 * @param object scope: scope of the callbacks
		 * @param string dataType: expected data type
		 *
		 * @return boolean true on success of the request submission
		 */
		getJavascriptFile: function (url, callback, scope, dataType) {
			if (typeof dataType === 'undefined') {
				var dataType = 'script';
			}
			var success = false,
				self = this,
				options = {
					callback: callback,
					complete: function (response, status) {
						this.callback.call(scope, options, success, response);
					},
					dataType: dataType,
					error: function (response, status, error) {
						self.editor.inhibitKeyboardInput = false;
						self.editor.appendToLog('HTMLArea/Ajax/Ajax', 'getJavascriptFile', 'Unable to get ' + url + ' . Server reported ' + error, 'error');
					},
					success: function (data, status, response) {
						success = true;
					},
					scope: scope,
					type: 'GET',
					url: url
				};
			$.ajax(options);
			return success;
		},

		/**
		 * Post data to the server
		 *
		 * @param	string		url: url to post data to
		 * @param	object		data: data to be posted
		 * @param	function	callback: function that will handle the response returned by the server
		 * @param	object		scope: scope of the callbacks
		 *
		 * @return	boolean		true on success
		 */
		postData: function (url, data, callback, scope) {
			var success = false,
				self = this;
			data.charset = this.editor.config.typo3ContentCharset ? this.editor.config.typo3ContentCharset : 'utf-8';
			var params = '';
			for (var parameter in data) {
				params += (params.length ? '&' : '') + parameter + '=' + encodeURIComponent(data[parameter]);
			}
			params += this.editor.config.RTEtsConfigParams;
			var options = {
				callback: typeof callback === 'function' ? callback : function (options, success, response) {
					if (!success) {
						self.editor.appendToLog('HTMLArea/Ajax/Ajax', 'postData', 'Post request to ' + url + ' failed. Server reported ' + response.status, 'error');
					}
				},
				complete: function (response, status) {
					this.callback.call(scope, options, success, response);
				},
				contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				data: params,
				error: function (response) {
					self.editor.appendToLog('HTMLArea/Ajax/Ajax', 'postData', 'Unable to post ' + url + ' . Server reported ' + response.status, 'error');
				},
				success: function (response) {
					success = true;
				},
				scope: scope,
				type: 'POST',
				url: url
			};
			$.ajax(options);
			return success;
		}
	};

	return Ajax;

});

/**
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
/*****************************************************************
 * HTMLArea.DOM: Utility functions for dealing with the DOM tree *
 *****************************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (UserAgent, Util) {

	var Dom = {

		/***************************************************
		*  DOM NODES TYPES CONSTANTS
		***************************************************/
		ELEMENT_NODE: 1,
		ATTRIBUTE_NODE: 2,
		TEXT_NODE: 3,
		CDATA_SECTION_NODE: 4,
		ENTITY_REFERENCE_NODE: 5,
		ENTITY_NODE: 6,
		PROCESSING_INSTRUCTION_NODE: 7,
		COMMENT_NODE: 8,
		DOCUMENT_NODE: 9,
		DOCUMENT_TYPE_NODE: 10,
		DOCUMENT_FRAGMENT_NODE: 11,
		NOTATION_NODE: 12,

		/***************************************************
		*  DOM-RELATED REGULAR EXPRESSIONS
		***************************************************/
		RE_blockTags: /^(address|article|aside|body|blockquote|caption|dd|div|dl|dt|fieldset|footer|form|header|hr|h1|h2|h3|h4|h5|h6|iframe|li|ol|p|pre|nav|noscript|section|table|tbody|td|tfoot|th|thead|tr|ul)$/i,
		RE_noClosingTag: /^(area|base|br|col|command|embed|hr|img|input|keygen|link|meta|param|source|track|wbr)$/i,
		RE_bodyTag: new RegExp('<\/?(body)[^>]*>', 'gi'),

		/***************************************************
		*  STATIC METHODS ON DOM NODE
		***************************************************/
		/**
		 * Determine whether an element node is a block element
		 *
		 * @param	object		element: the element node
		 *
		 * @return	boolean		true, if the element node is a block element
		 */
		isBlockElement: function (element) {
			return element && element.nodeType === Dom.ELEMENT_NODE && Dom.RE_blockTags.test(element.nodeName);
		},

		/**
		 * Determine whether an element node needs a closing tag
		 *
		 * @param	object		element: the element node
		 *
		 * @return	boolean		true, if the element node needs a closing tag
		 */
		needsClosingTag: function (element) {
			return element && element.nodeType === Dom.ELEMENT_NODE && !Dom.RE_noClosingTag.test(element.nodeName);
		},

		/**
		 * Gets the class names assigned to a node, reserved classes removed
		 *
		 * @param	object		node: the node
		 * @return	array		array of class names on the node, reserved classes removed
		 */
		getClassNames: function (node) {
			var classNames = [];
			if (node) {
				if (node.className && /\S/.test(node.className)) {
					classNames = node.className.trim().split(' ');
				}
				if (HTMLArea.reservedClassNames.test(node.className)) {
					var cleanClassNames = [];
					var j = -1;
					for (var i = 0, n = classNames.length; i < n; ++i) {
						if (!HTMLArea.reservedClassNames.test(classNames[i])) {
							cleanClassNames[++j] = classNames[i];
						}
					}
					classNames = cleanClassNames;
				}
			}
			return classNames;
		},

		/**
		 * Check if a class name is in the class attribute of a node
		 *
		 * @param	object		node: the node
		 * @param	string		className: the class name to look for
		 * @param	boolean		substring: if true, look for a class name starting with the given string
		 * @return	boolean		true if the class name was found, false otherwise
		 */
		hasClass: function (node, className, substring) {
			var found = false;
			if (node && node.className) {
				var classes = node.className.trim().split(' ');
				for (var i = classes.length; --i >= 0;) {
					found = ((classes[i] == className) || (substring && classes[i].indexOf(className) == 0));
					if (found) {
						break;
					}
				}
			}
			return found;
		},

		/**
		 * Add a class name to the class attribute of a node
		 *
		 * @param object node: the node
		 * @param string className: the name of the class to be added
		 * @param integer recursionLevel: recursion level of current call
		 * @return void
		 */
		addClass: function (node, className, recursionLevel) {
			if (node) {
				var classNames = Dom.getClassNames(node);
				if (classNames.indexOf(className) === -1) {
					// Remove classes configured to be incompatible with the class to be added
					if (node.className && HTMLArea.classesXOR && HTMLArea.classesXOR[className] && typeof HTMLArea.classesXOR[className].test === 'function') {
						for (var i = classNames.length; --i >= 0;) {
							if (HTMLArea.classesXOR[className].test(classNames[i])) {
								Dom.removeClass(node, classNames[i]);
							}
						}
					}
					// Check dependencies to add required classes recursively
					if (typeof HTMLArea.classesRequires !== 'undefined' && typeof HTMLArea.classesRequires[className] !== 'undefined') {
						if (typeof recursionLevel === 'undefined') {
							var recursionLevel = 1;
						} else {
							recursionLevel++;
						}
						if (recursionLevel < 20) {
							for (var i = 0, n = HTMLArea.classesRequires[className].length; i < n; i++) { 
								var classNames = Dom.getClassNames(node);
								if (classNames.indexOf(HTMLArea.classesRequires[className][i]) === -1) {
									Dom.addClass(node, HTMLArea.classesRequires[className][i], recursionLevel);
								}
							}
						}
					}
					if (node.className) {
						node.className += ' ' + className;
					} else {
						node.className = className;
					}
				}
			}
		},

		/**
		 * Remove a class name from the class attribute of a node
		 *
		 * @param	object		node: the node
		 * @param	string		className: the class name to removed
		 * @param	boolean		substring: if true, remove the class names starting with the given string
		 * @return	void
		 */
		removeClass: function (node, className, substring) {
			if (node && node.className) {
				var classes = node.className.trim().split(' ');
				var newClasses = [];
				for (var i = classes.length; --i >= 0;) {
					if ((!substring && classes[i] != className) || (substring && classes[i].indexOf(className) != 0)) {
						newClasses[newClasses.length] = classes[i];
					}
				}
				if (newClasses.length) {
					node.className = newClasses.join(' ');
				} else {
					if (!UserAgent.isOpera) {
						node.removeAttribute('class');
						if (UserAgent.isIEBeforeIE9) {
							node.removeAttribute('className');
						}
					} else {
						node.className = '';
					}
				}
				// Remove the first unselectable class that is no more required, the following ones being removed by recursive calls
				if (node.className && typeof HTMLArea.classesSelectable !== 'undefined') {
					classes = Dom.getClassNames(node);
					for (var i = classes.length; --i >= 0;) {
						if (typeof HTMLArea.classesSelectable[classes[i]] !== 'undefined' && !HTMLArea.classesSelectable[classes[i]] && !Dom.isRequiredClass(node, classes[i])) {
							Dom.removeClass(node, classes[i]);
							break;
						}
					}
				}
			}
		},

		/**
		 * Check if the class is required by another class assigned to the node
		 * 
		 * @param object node: the node
		 * @param string className: the class name to check
		 * @return boolean 
		 */
		isRequiredClass: function (node, className) {
			if (typeof HTMLArea.classesRequiredBy !== 'undefined') {
				var classes = Dom.getClassNames(node);
				for (var i = classes.length; --i >= 0;) {
					if (typeof HTMLArea.classesRequiredBy[classes[i]] !== 'undefined' && HTMLArea.classesRequiredBy[classes[i]].indexOf(className) !== -1) {
						return true;
					}
				}
			}
			return false;
		},

		/**
		 * Get the innerText of a given node
		 *
		 * @param	object		node: the node
		 *
		 * @return	string		the text inside the node
		 */
		getInnerText: function (node) {
			return UserAgent.isIEBeforeIE9 ? node.innerText : node.textContent;;
		},

		/**
		 * Get the block ancestors of a node within a given block
		 *
		 * @param	object		node: the given node
		 * @param	object		withinBlock: the containing node
		 *
		 * @return	array		array of block ancestors
		 */
		getBlockAncestors: function (node, withinBlock) {
			var ancestors = [];
			var ancestor = node;
			while (ancestor && (ancestor.nodeType === Dom.ELEMENT_NODE) && !/^(body)$/i.test(ancestor.nodeName) && ancestor != withinBlock) {
				if (Dom.isBlockElement(ancestor)) {
					ancestors.unshift(ancestor);
				}
				ancestor = ancestor.parentNode;
			}
			ancestors.unshift(ancestor);
			return ancestors;
		},

		/**
		 * Get the deepest element ancestor of a given node that is of one of the specified types
		 *
		 * @param	object		node: the given node
		 * @param	array		types: an array of nodeNames
		 *
		 * @return	object		the found ancestor of one of the given types or null
		 */
		getFirstAncestorOfType: function (node, types) {
			var ancestor = null,
				parent = node;
			if (typeof types === 'string') {
				var types = [types];
			}
			// Is types a non-empty array?
			if (types && Object.prototype.toString.call(types) === '[object Array]' && types.length > 0) {
				types = new RegExp( '^(' + types.join('|') + ')$', 'i');
				while (parent && parent.nodeType === Dom.ELEMENT_NODE && !/^(body)$/i.test(parent.nodeName)) {
					if (types.test(parent.nodeName)) {
						ancestor = parent;
						break;
					}
					parent = parent.parentNode;
				}
			}
			return ancestor;
		},

		/**
		 * Get the position of the node within the children of its parent
		 * Adapted from FCKeditor
		 *
		 * @param	object		node: the DOM node
		 * @param	boolean		normalized: if true, a normalized position is calculated
		 *
		 * @return	integer		the position of the node
		 */
		getPositionWithinParent: function (node, normalized) {
			var current = node,
				position = 0;
			while (current = current.previousSibling) {
				// For a normalized position, do not count any empty text node or any text node following another one
				if (
					normalized
					&& current.nodeType == Dom.TEXT_NODE
					&& (!current.nodeValue.length || (current.previousSibling && current.previousSibling.nodeType == Dom.TEXT_NODE))
				) {
					continue;
				}
				position++;
			}
			return position;
		},

		/**
		 * Determine whether a given node has any allowed attributes
		 *
		 * @param	object		node: the DOM node
		 * @param	array		allowedAttributes: array of allowed attribute names
		 *
		 * @return	boolean		true if the node has one of the allowed attributes
		 */
		 hasAllowedAttributes: function (node, allowedAttributes) {
			var value,
				hasAllowedAttributes = false;
			if (typeof allowedAttributes === 'string') {
				var allowedAttributes = [allowedAttributes];
			}
			// Is allowedAttributes an array?
			if (allowedAttributes && Object.prototype.toString.call(allowedAttributes) === '[object Array]') {
				for (var i = allowedAttributes.length; --i >= 0;) {
					value = node.getAttribute(allowedAttributes[i]);
					if (value) {
						if (allowedAttributes[i] === 'style') {
							if (node.style.cssText) {
								hasAllowedAttributes = true;
								break;
							}
						} else {
							hasAllowedAttributes = true;
							break;
						}
					}
				}
			}
			return hasAllowedAttributes;
		},

		/**
		 * Remove the given node from its parent
		 *
		 * @param	object		node: the DOM node
		 *
		 * @return	void
		 */
		removeFromParent: function (node) {
			var parent = node.parentNode;
			if (parent) {
				parent.removeChild(node);
			}
		},

		/**
		 * Change the nodeName of an element node
		 *
		 * @param	object		node: the node to convert (must belong to a document)
		 * @param	string		nodeName: the nodeName of the converted node
		 *
		 * @retrun	object		the converted node or the input node
		 */
		convertNode: function (node, nodeName) {
			var convertedNode = node,
				ownerDocument = node.ownerDocument;
			if (ownerDocument && node.nodeType === Dom.ELEMENT_NODE) {
				var convertedNode = ownerDocument.createElement(nodeName),
					parent = node.parentNode;
				while (node.firstChild) {
					convertedNode.appendChild(node.firstChild);
				}
				parent.insertBefore(convertedNode, node);
				parent.removeChild(node);
			}
			return convertedNode;
		},

		/**
		 * Determine whether a given range intersects a given node
		 *
		 * @param	object		range: the range
		 * @param	object		node: the DOM node (must belong to a document)
		 *
		 * @return	boolean		true if the range intersects the node
		 */
		rangeIntersectsNode: function (range, node) {
			var rangeIntersectsNode = false,
				ownerDocument = node.ownerDocument;
			if (ownerDocument) {
				if (UserAgent.isIEBeforeIE9) {
					var nodeRange = ownerDocument.body.createTextRange();
					nodeRange.moveToElementText(node);
					rangeIntersectsNode = (range.compareEndPoints('EndToStart', nodeRange) == -1 && range.compareEndPoints('StartToEnd', nodeRange) == 1) ||
						(range.compareEndPoints('EndToStart', nodeRange) == 1 && range.compareEndPoints('StartToEnd', nodeRange) == -1);
				} else {
					var nodeRange = ownerDocument.createRange();
					try {
						nodeRange.selectNode(node);
					} catch (e) {
						if (UserAgent.isWebKit) {
							nodeRange.setStart(node, 0);
							if (node.nodeType === Dom.TEXT_NODE || node.nodeType === Dom.COMMENT_NODE || node.nodeType === Dom.CDATA_SECTION_NODE) {
								nodeRange.setEnd(node, node.textContent.length);
							} else {
								nodeRange.setEnd(node, node.childNodes.length);
							}
						} else {
							nodeRange.selectNodeContents(node);
						}
					}
					// Note: sometimes WebKit inverts the end points
					rangeIntersectsNode = (range.compareBoundaryPoints(range.END_TO_START, nodeRange) == -1 && range.compareBoundaryPoints(range.START_TO_END, nodeRange) == 1) ||
						(range.compareBoundaryPoints(range.END_TO_START, nodeRange) == 1 && range.compareBoundaryPoints(range.START_TO_END, nodeRange) == -1);
				}
			}
			return rangeIntersectsNode;
		},

		/**
		 * Make url's absolute in the DOM tree under the root node
		 *
		 * @param	object		root: the root node
		 * @param	string		baseUrl: base url to use
		 * @param	string		walker: a HLMLArea.DOM.Walker object
		 * @return	void
		 */
		makeUrlsAbsolute: function (node, baseUrl, walker) {
			walker.walk(node, true, 'args[0].makeImageSourceAbsolute(node, args[2]) || args[0].makeLinkHrefAbsolute(node, args[2])', 'args[1].emptyFunction', [Dom, Util, baseUrl]);
		},

		/**
		 * Make the src attribute of an image node absolute
		 *
		 * @param	object		node: the image node
		 * @param	string		baseUrl: base url to use
		 * @return	void
		 */
		makeImageSourceAbsolute: function (node, baseUrl) {
			if (/^img$/i.test(node.nodeName)) {
				var src = node.getAttribute('src');
				if (src) {
					node.setAttribute('src', Dom.addBaseUrl(src, baseUrl));
				}
				return true;
			}
			return false;
		},

		/**
		 * Make the href attribute of an a node absolute
		 *
		 * @param	object		node: the image node
		 * @param	string		baseUrl: base url to use
		 * @return	void
		 */
		makeLinkHrefAbsolute: function (node, baseUrl) {
			if (/^a$/i.test(node.nodeName)) {
				var href = node.getAttribute('href');
				if (href) {
					node.setAttribute('href', Dom.addBaseUrl(href, baseUrl));
				}
				return true;
			}
			return false;
		},

		/**
		 * Add base url
		 *
		 * @param	string		url: value of a href or src attribute
		 * @param	string		baseUrl: base url to add
		 * @return	string		absolute url
		 */
		addBaseUrl: function (url, baseUrl) {
			var absoluteUrl = url;
				// If the url has no scheme...
			if (!/^[a-z0-9_]{2,}\:/i.test(absoluteUrl)) {
				var base = baseUrl;
				while (absoluteUrl.match(/^\.\.\/(.*)/)) {
						// Remove leading ../ from url
					absoluteUrl = RegExp.$1;
					base.match(/(.*\:\/\/.*\/)[^\/]+\/$/);
						// Remove lowest directory level from base
					base = RegExp.$1;
					absoluteUrl = base + absoluteUrl;
				}
					// If the url is still not absolute...
				if (!/^.*\:\/\//.test(absoluteUrl)) {
					absoluteUrl = baseUrl + absoluteUrl;
				}
			}
			return absoluteUrl;
		},

		/**
		 * Get the position of a node
		 *
		 * @param object node
		 * @return object left and top coordinates
		 */
		getPosition: function (node) {
			var x = 0, y = 0;
			while (node && !isNaN(node.offsetLeft) && !isNaN(node.offsetTop)) {
				x += node.offsetLeft - node.scrollLeft;
				y += node.offsetTop - node.scrollTop;
				node = node.offsetParent;
			}
			return { x: x, y: y };
		},

		/**
		 * Get the current size of a node
		 *
		 * @param object node
		 * @return object width and height
		 */
		getSize: function (node) {
			return {
				width:  Math.max(node.offsetWidth, node.clientWidth) || 0,
				height: Math.max(node.offsetHeight, node.clientHeight) || 0
			}
		},

		/**
		 * Set the size of a node
		 *
		 * @param object node
		 * @param object size: width and height
		 * @return void
		 */
		setSize: function (node, size) {
			if (typeof size.width !== 'undefined') {
				node.style.width = size.width + 'px';
			}
			if (typeof size.height !== 'undefined') {
				node.style.height = size.height + 'px';
			}
		},

		/**
		 * Set the style of a node
		 *
		 * @param object node
		 * @param object style
		 * @return void
		 */
		setStyle: function (node, style) {
			for (var property in style) {
				if (typeof style[property] !== 'undefined') {
					node.style[property] = style[property];
				}
			}
		}
	};

	return Dom;

});

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
/*****************************************************************
 * HTMLArea.Event: Utility functions for dealing with events     *
 *****************************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	['jquery',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function ($, UserAgent, Util) {

	var Event = {

		NAMESPACE: '.htmlarea',

		// Key codes for key events
		BACKSPACE: 8,
		TAB: 9,
		ENTER: 13,
		ESC: 27,
		SPACE: 32,
		LEFT: 37,
		UP: 38,
		RIGHT: 39,
		DOWN: 40,
		DELETE: 46,
		F11: 122,
		NON_BREAKING_SPACE: 160,

		// DOM Level 3 defines values for event.key
		domLevel3Keys: {
			'Backspace': 8,
			'Tab': 9,
			'Enter': 13,
			'Esc': 27,
			'Escape': 27,
			'Spacebar': 32,
			' ': 32,
			'Left': 37,
			'ArrowLeft': 37,
			'Up': 38,
			'ArrowUp': 38,
			'Right': 39,
			'ArrowRight': 39,
			'Down': 40,
			'ArrowDown': 40,
			'Del': 46,
			'Delete': 46,
			'0': 48,
			'1': 49,
			'2': 50,
			'3': 51,
			'4': 52,
			'5': 53,
			'6': 54,
			'7': 55,
			'8': 56,
			'9': 57,
			'F11': 122
		},

		// Safari keypress events for special keys return bad keycodes
		safariKeys: {
		    3 : 13, // enter
		    63234 : 37, // left
		    63235 : 39, // right
		    63232 : 38, // up
		    63233 : 40, // down
		    63276 : 33, // page up
		    63277 : 34, // page down
		    63272 : 46, // delete
		    63273 : 36, // home
		    63275 : 35  // end
		},

		/**
		 * Attach an event handler on an element
		 *
		 * @param object|string element: the element to which the event handler is attached or a jquery selector
		 * @param string eventName: the name of the event
		 * @param function handler: the event handler
		 * @param object options: options for handling the event
		 * @return void
		 */
		on: function (element, eventName, handler, options) {
			var data = {};
			if (typeof options === 'object') {
				Util.apply(data, options);
			}
			if (data.delegate) {
				$(element).on(eventName + Event.NAMESPACE, data.delegate, data, handler);
			} else {
				$(element).on(eventName + Event.NAMESPACE, data, handler);
			}
		},

		/**
		 * Attach an event handler on an element. The handler is executed at most once.
		 *
		 * @param object|string element: the element to which the event handler is attached or a jquery selector
		 * @param string eventName: the name of the event
		 * @param function handler: the event handler
		 * @param object options: options for handling the event
		 * @return void
		 */
		one: function (element, eventName, handler, options) {
			var data = {};
			if (typeof options === 'object') {
				Util.apply(data, options);
			}
			$(element).one(eventName + Event.NAMESPACE, data, handler);
		},

		/**
		 * Attach an event handler on an element
		 *
		 * @param object|string element: the element to which the event handler is attached or a jquery selector
		 * @param string eventName: the name of the event
		 * @param function handler: the event handler
		 * @return void
		 */
		off: function (element, eventName, handler) {
			if (typeof eventName === 'undefined' && typeof handler === 'undefined') {
				$(element).off(Event.NAMESPACE);
			} else if (typeof handler === 'undefined') {
				$(element).off(eventName + Event.NAMESPACE);
			} else {
				$(element).off(eventName + Event.NAMESPACE, handler);
			}
		},

		/**
		 * Attach an event handler on an element
		 *
		 * @param object event: the jQuery event object
		 * @return void
		 */
		stopEvent: function (event) {
			event.preventDefault();
			event.stopPropagation();
		},

		/**
		 * Trigger an event
		 *
		 * @param object|string element: the element to which the event handler is attached or a jquery selector
		 * @param string eventName: the name of the event
		 * @param array extraParameters: extra parameters to be passed to the event handler
		 * @return void
		 */
		trigger: function(element, eventName, extraParameters) {
			if (typeof extraParameters === 'undefined') {
				$(element).trigger(eventName);
			} else {
				$(element).trigger(eventName, extraParameters);
			}
		},

		/**
		 * Returns a normalized key for the event.
		 *
		 * @param object event: the jQuery event object
		 * @return integer the normalized key
		 */
		getKey: function (event) {
			var originalEvent = event.originalEvent;
			return Event.normalizeKey(
				(typeof originalEvent.key !== 'undefined' && originalEvent.key && originalEvent.key !== 'Unidentified')
				? (Event.domLevel3Keys[originalEvent.key] || originalEvent.key)
				: (originalEvent.charCode ? originalEvent.charCode : (originalEvent.keyCode ? originalEvent.keyCode : originalEvent.which))
			);
		},

		/**
		 * Returns a normalized key
		 *
		 * @param integer key: the key
		 * @return integer the normalized key
		 */
		normalizeKey: function(key){
		    return UserAgent.isSafari ? (Event.safariKeys[key] || key) : key;
		},

		/**
		 * Get the original browser event
		 *
		 * @param object event: the jQuery  event object
		 * @return object the browser event
		 */
		getBrowserEvent: function (event) {
			return event.originalEvent;
		}
	};

	return Event;

});

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
/********************************************************************
 * HTMLArea.KeyMap: Utility functions for dealing with key events   *
 ********************************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/KeyMap',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (Event) {

	/**
	 * Constructor method
	 *
	 * @param object element: the element to which the key map is attached
	 * @param string eventName: the event name
	 * @return void
	 */
	var KeyMap = function (element, eventName) {

		// Key bindings
		this.keyBindings = {};

		// Attach the key map event handler to the element
		var self = this;
		Event.on(element, eventName, function (event) { return self.handler(event); });
	};	

	/**
	 * Add an event handler to the keymap for a given combination of keys
	 *
	 * @param object options: options for the binding; possible keys:
	 *	key: a key or an array of keys
	 *	ctrl: boolean,
	 *	shift: boolean,
	 *	alt: boolean,
	 *	handler: an event handler
	 * @return void
	 */
	KeyMap.prototype.addBinding = function (options) {
		var key = options.key,
			normalizedKey;
		if (typeof key === 'string' || typeof key === 'number') {
			key = [key];
		}
		for (var i = 0, n = key.length; i < n; i++) {
			// Normalizing hot keys
			normalizedKey = key[i];
			if (typeof normalizedKey === 'string' && normalizedKey.length === 1) {
				normalizedKey = normalizedKey.toUpperCase().charCodeAt(0);
			}
			if (typeof this.keyBindings[normalizedKey] === 'undefined') {
				this.keyBindings[normalizedKey] = [];
			}
			this.keyBindings[normalizedKey].push({
				ctrl: options.ctrl,
				shift: options.shift,
				alt: options.alt,
				handler: options.handler
			});
		}
	};

	/**
	 * Key map handler
	 * @return boolean false if the event was handled
	 */
	KeyMap.prototype.handler = function (event) {
		var key = Event.getKey(event);
		var keyBindings = this.keyBindings[key];
		if (typeof keyBindings !== 'undefined') {
			for (var i = 0, n = keyBindings.length; i < n; i++) {
				var keyBinding = keyBindings[i];
				if ((typeof keyBinding.alt === 'undefined' || event.altKey == keyBinding.alt)
					&& (typeof keyBinding.shift === 'undefined' || event.shiftKey == keyBinding.shift)
					&& (typeof keyBinding.ctrl === 'undefined' || event.ctrlKey == keyBinding.ctrl || event.metaKey == keyBinding.ctrl)
				) {
					return keyBinding.handler(event);
				}
			}
		}
		return true;
	};

	return KeyMap;

});

/**
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
/***************************************************
 *  HTMLArea.CSS.Parser: CSS Parser
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/CSS/Parser',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (UserAgent, Util, Event) {

	/**
	 * Parser constructor
	 */
	var Parser = function (config) {
		var configDefaults = {
			parseAttemptsMaximumNumber: 20,
			prefixLabelWithClassName: false,
			postfixLabelWithClassName: false,
			showTagFreeClasses: false,
			tags: null,
			editor: null
		};
		// config.editor MUST be set!
		Util.apply(this, config, configDefaults);
		if (this.editor.config.styleSheetsMaximumAttempts) {
			this.parseAttemptsMaximumNumber = this.editor.config.styleSheetsMaximumAttempts;
		}

		/**
		 * The parsed classes
		 */
		this.parsedClasses = {};

		/**
		 * Boolean indicating whether are not parsing is complete
		 */
		this.ready = false;

		/**
		 * Boolean indicating whether or not the stylesheets were accessible
		 */
		this.cssLoaded = false;

		/**
		 * Counter of the number of attempts at parsing the stylesheets
		 */
		this.parseAttemptsCounter = 0;

		/**
		 * Parsing attempt timeout id
		 */
		this.attemptTimeout = null;

		/**
		 * The error that occurred on the last attempt at parsing the stylesheets
		 */
		this.error = null;
	};

	/**
	 * This function gets the parsed css classes
	 *
	 * @return object this.parsedClasses
	 */
	Parser.prototype.getClasses = function() {
		return this.parsedClasses;
	};

	/**
	 * This function gets the ready state
	 *
	 * @return bool this.ready
	 */
	Parser.prototype.isReady = function() {
		return this.ready;
	};

	/**
	 * This function parses the stylesheets of the iframe set in config
	 *
	 * @return void	parsed css classes are accumulated in this.parsedClasses
	 */
	Parser.prototype.parse = function() {
		if (this.editor.document) {
			var self = this;
			if (!this.editor.classesConfigurationIsLoaded()) {
				this.attemptTimeout = window.setTimeout(function () {
					self.parse();
				}, 100);
			} else {
				this.parseStyleSheets();
				if (!this.cssLoaded) {
					if (/Security/i.test(this.error)) {
						this.editor.appendToLog('HTMLArea.CSS.Parser', 'parse', 'A security error occurred. Make sure all stylesheets are accessed from the same domain/subdomain and using the same protocol as the current script.', 'error');
						/**
						 * @event HTMLAreaEventCssParsingComplete
						 * Fires when parsing of the stylesheets of the iframe is complete
						 */
						Event.trigger(this, 'HTMLAreaEventCssParsingComplete');
					} else if (this.parseAttemptsCounter < this.parseAttemptsMaximumNumber) {
						this.parseAttemptsCounter++;
						this.attemptTimeout = window.setTimeout(function () {
							self.parse();
						}, 200);
					} else {
						this.editor.appendToLog('HTMLArea.CSS.Parser', 'parse', 'The stylesheets could not be parsed. Reported error: ' + this.error, 'error');
						/**
						 * @event HTMLAreaEventCssParsingComplete
						 * Fires when parsing of the stylesheets of the iframe is complete
						 */
						Event.trigger(this, 'HTMLAreaEventCssParsingComplete');
					}
				} else {
					if (this.attemptTimeout) {
						window.clearTimeout(this.attemptTimeout);
					}
					this.ready = true;
					this.filterAllowedClasses();
					this.sort();
					/**
					 * @event HTMLAreaEventCssParsingComplete
					 * Fires when parsing of the stylesheets of the iframe is complete
					 */
					Event.trigger(this, 'HTMLAreaEventCssParsingComplete');
				}
			}
		}
	};

	/**
	 * This function parses the stylesheets of an iframe
	 *
	 * @return void	parsed css classes are accumulated in this.parsedClasses
	 */
	Parser.prototype.parseStyleSheets = function () {
		this.cssLoaded = true;
		this.error = null;
		// Test if the styleSheets array is at all accessible
		if (UserAgent.isOpera) {
			if (this.editor.document.readyState !== 'complete') {
				this.cssLoaded = false;
				this.error = 'Document.readyState not complete';
			}
		} else {
			try {
				this.editor.document.styleSheets && this.editor.document.styleSheets[0] && this.editor.document.styleSheets[0].rules;
			} catch(e) {
				this.cssLoaded = false;
				this.error = e;
			}
		}
		if (this.cssLoaded) {
			// Expecting at least 2 stylesheets...
			if (this.editor.document.styleSheets.length > 1) {
				var styleSheets = this.editor.document.styleSheets;
				for (var index = 0, n = styleSheets.length; index < n; index++) {
					try {
						var styleSheet = styleSheets[index];
						if (!UserAgent.isIE || styleSheet.cssRules.length) {
							this.parseRules(styleSheet.cssRules);
						} else {
							this.cssLoaded = false;
							this.parsedClasses = {};
							break;
						}
					} catch (e) {
						this.error = e;
						this.cssLoaded = false;
						this.parsedClasses = {};
						break;
					}
				}
			} else {
				this.cssLoaded = false;
				this.error = 'Empty stylesheets array or missing linked stylesheets';
			}
		}
	};

	/**
	 * This function parses the set of rules from a standard stylesheet
	 *
	 * @param array cssRules: the array of rules of a stylesheet
	 * @return void
	 */
	Parser.prototype.parseRules = function (cssRules) {
		for (var rule = 0, n = cssRules.length; rule < n; rule++) {
			// Style rule
			if (cssRules[rule].selectorText) {
				this.parseSelectorText(cssRules[rule].selectorText);
			} else {
				// Import rule
				try {
					if (cssRules[rule].styleSheet && cssRules[rule].styleSheet.cssRules) {
						this.parseRules(cssRules[rule].styleSheet.cssRules);
					}
				} catch (e) {
					if (/Security/i.test(e)) {
						// If this is a security error, silently log the error and continue parsing
						this.editor.appendToLog('HTMLArea.CSS.Parser', 'parseRules', 'A security error occurred. Make sure all stylesheets are accessed from the same domain/subdomain and using the same protocol as the current script.', 'error');
					} else {
						throw e;
					}
				}
				// Media rule
				if (cssRules[rule].cssRules) {
					this.parseRules(cssRules[rule].cssRules);
				}
			}
		}
	};

	/**
	 * This function parses the set of rules from an IE stylesheet
	 *
	 * @param array cssRules: the array of rules of a stylesheet
	 * @return void
	 */
	Parser.prototype.parseIeRules = function (cssRules) {
		for (var rule = 0, n = cssRules.length; rule < n; rule++) {
				// Import rule
			if (cssRules[rule].imports) {
				this.parseIeRules(cssRules[rule].imports);
			}
				// Style rule
			if (cssRules[rule].rules) {
				this.parseRules(cssRules[rule].rules);
			}
		}
	};

	/**
	 * This function parses a selector rule
	 *
	 * @param string selectorText: the text of the rule to parsed
	 * @return void
	 */
	Parser.prototype.parseSelectorText = function (selectorText) {
		var cssElements = [],
			cssElement = [],
			nodeName, className,
			pattern = /(\S*)\.(\S+)/;
		if (selectorText.search(/:+/) == -1) {
				// Split equal styles
			cssElements = selectorText.split(',');
			for (var k = 0, n = cssElements.length; k < n; k++) {
					// Match all classes (<element name (optional)>.<class name>) in selector rule
				var s = cssElements[k], index;
				while ((index = s.search(pattern)) > -1) {
					var match = pattern.exec(s.substring(index));
					s = s.substring(index+match[0].length);
					nodeName = (match[1] && (match[1] != '*')) ? match[1].toLowerCase().trim() : 'all';
					className = match[2];
					if (className && !HTMLArea.reservedClassNames.test(className)) {
						if (((nodeName != 'all') && (!this.tags || !this.tags[nodeName]))
							|| ((nodeName == 'all') && (!this.tags || !this.tags[nodeName]) && this.showTagFreeClasses)
							|| (this.tags && this.tags[nodeName] && this.tags[nodeName].allowedClasses && this.tags[nodeName].allowedClasses.test(className))) {
							if (!this.parsedClasses[nodeName]) {
								this.parsedClasses[nodeName] = {};
							}
							cssName = className;
							if (HTMLArea.classesLabels && HTMLArea.classesLabels[className]) {
								cssName = this.prefixLabelWithClassName ? (className + ' - ' + HTMLArea.classesLabels[className]) : HTMLArea.classesLabels[className];
								cssName = this.postfixLabelWithClassName ? (cssName + ' - ' + className) : cssName;
							}
							this.parsedClasses[nodeName][className] = cssName;
						}
					}
				}
			}
		}
	};

	/**
	 * This function filters the class selectors allowed for each nodeName
	 *
	 * @return void
	 */
	Parser.prototype.filterAllowedClasses = function() {
		var nodeName, cssClass;
		for (nodeName in this.tags) {
			var allowedClasses = {};
			// Get classes allowed for all tags
			if (nodeName !== 'all' && typeof this.parsedClasses['all'] !== 'undefined') {
				if (this.tags && this.tags[nodeName] && this.tags[nodeName].allowedClasses) {
					var allowed = this.tags[nodeName].allowedClasses;
					for (cssClass in this.parsedClasses['all']) {
						if (allowed.test(cssClass)) {
							allowedClasses[cssClass] = this.parsedClasses['all'][cssClass];
						}
					}
				} else {
					allowedClasses = this.parsedClasses['all'];
				}
			}
			// Merge classes allowed for nodeName
			if (typeof this.parsedClasses[nodeName] !== 'undefined') {
				if (this.tags && this.tags[nodeName] && this.tags[nodeName].allowedClasses) {
					var allowed = this.tags[nodeName].allowedClasses;
					for (cssClass in this.parsedClasses[nodeName]) {
						if (allowed.test(cssClass)) {
							allowedClasses[cssClass] = this.parsedClasses[nodeName][cssClass];
						}
					}
				} else {
					for (cssClass in this.parsedClasses[nodeName]) {
						allowedClasses[cssClass] = this.parsedClasses[nodeName][cssClass];
					}
				}
			}
			this.parsedClasses[nodeName] = allowedClasses;
		}
		// If showTagFreeClasses is set and there is no allowedClasses clause on a tag, merge classes allowed for all tags
		if (this.showTagFreeClasses && typeof this.parsedClasses['all'] !== 'undefined') {
			for (nodeName in this.parsedClasses) {
				if (nodeName !== 'all' && !this.tags[nodeName]) {
					for (cssClass in this.parsedClasses['all']) {
						this.parsedClasses[nodeName][cssClass] = this.parsedClasses['all'][cssClass];
					}
				}
			}
		}
	};

	/**
	 * This function sorts the class selectors for each nodeName
	 *
	 * @return void
	 */
	Parser.prototype.sort = function() {
		var nodeName, cssClass, i, n, x, y;
		for (nodeName in this.parsedClasses) {
			var value = this.parsedClasses[nodeName];
			var classes = [];
			var sortedClasses = {};
			// Collect keys
			for (cssClass in value) {
				classes.push(cssClass);
			}
			function compare(a, b) {
				x = value[a];
				y = value[b];
				return ((x < y) ? -1 : ((x > y) ? 1 : 0));
			}
			// Sort keys by comparing texts
			classes = classes.sort(compare);
			for (i = 0, n = classes.length; i < n; ++i) {
				sortedClasses[classes[i]] = value[classes[i]];
			}
			this.parsedClasses[nodeName] = sortedClasses;
		}
	};

	return Parser;

});

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
/***************************************************
 *  HTMLArea.DOM.BookMark: BookMark object
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/BookMark',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM'],
	function (UserAgent, Util, Dom) {

	/**
	 * Constructor method
	 *
	 * @param object config: an object with property "editor" giving reference to the parent object
	 *
	 * @return void
	 */
	var BookMark = function (config) {

		/**
		 * Reference to the editor MUST be set in config
		 */
		this.editor = null;

		Util.apply(this, config);

		/**
		 * Reference to the editor document
		 */
		this.document = this.editor.document;

		/**
		 * Reference to the editor selection object
		 */
		this.selection = this.editor.getSelection();
	};

	/**
	 * Get a bookMark
	 *
	 * @param	object		range: the range to bookMark
	 * @param	boolean		nonIntrusive: if true, a non-intrusive bookmark is requested
	 *
	 * @return	object		the bookMark
	 */
	BookMark.prototype.get = function (range, nonIntrusive) {
		var bookMark;
		if (nonIntrusive) {
			bookMark = this.getNonIntrusiveBookMark(range, true);
		} else {
			bookMark = this.getIntrusiveBookMark(range);
		}
		return bookMark;
	};

	/**
	 * Get an intrusive bookMark
	 * Adapted from FCKeditor
	 * This is an "intrusive" way to create a bookMark. It includes <span> tags
	 * in the range boundaries. The advantage of it is that it is possible to
	 * handle DOM mutations when moving back to the bookMark.
	 *
	 * @param	object		range: the range to bookMark
	 *
	 * @return	object		the bookMark
	 */
	BookMark.prototype.getIntrusiveBookMark = function (range) {
		// Create the bookmark info (random IDs).
		var bookMark = {
			nonIntrusive: false,
			startId: (new Date()).valueOf() + Math.floor(Math.random()*1000) + 'S',
			endId: (new Date()).valueOf() + Math.floor(Math.random()*1000) + 'E'
		};
		var startSpan;
		var endSpan;
		var rangeClone = range.cloneRange();
		// For collapsed ranges, add just the start marker
		if (!range.collapsed ) {
			endSpan = this.document.createElement('span');
			endSpan.style.display = 'none';
			endSpan.id = bookMark.endId;
			endSpan.setAttribute('data-htmlarea-bookmark', true);
			endSpan.innerHTML = '&nbsp;';
			rangeClone.collapse(false);
			rangeClone.insertNode(endSpan);
		}
		startSpan = this.document.createElement('span');
		startSpan.style.display = 'none';
		startSpan.id = bookMark.startId;
		startSpan.setAttribute('data-htmlarea-bookmark', true);
		startSpan.innerHTML = '&nbsp;';
		var rangeClone = range.cloneRange();
		rangeClone.collapse(true);
		rangeClone.insertNode(startSpan);
		bookMark.startNode = startSpan;
		bookMark.endNode = endSpan;
		// Update the range position.
		if (endSpan) {
			range.setEndBefore(endSpan);
			range.setStartAfter(startSpan);
		} else {
			range.setEndAfter(startSpan);
			range.collapse(false);
		}
		return bookMark;
	};

	/**
	 * Get a non-intrusive bookMark
	 * Adapted from FCKeditor
	 *
	 * @param	object		range: the range to bookMark
	 * @param	boolean		normalized: if true, normalized enpoints are calculated
	 *
	 * @return	object		the bookMark
	 */
	BookMark.prototype.getNonIntrusiveBookMark = function (range, normalized) {
		var startContainer = range.startContainer,
			endContainer = range.endContainer,
			startOffset = range.startOffset,
			endOffset = range.endOffset,
			collapsed = range.collapsed,
			child,
			previous,
			bookMark = {};
		if (!startContainer || !endContainer) {
			bookMark = {
				nonIntrusive: true,
				start: 0,
				end: 0
			};
		} else {
			if (normalized) {
				// Find out if the start is pointing to a text node that might be normalized
				if (startContainer.nodeType == Dom.NODE_ELEMENT) {
					child = startContainer.childNodes[startOffset];
					// In this case, move the start to that text node
					if (
						child
						&& child.nodeType == Dom.NODE_TEXT
						&& startOffset > 0
						&& child.previousSibling.nodeType == Dom.NODE_TEXT
					) {
						startContainer = child;
						startOffset = 0;
					}
					// Get the normalized offset
					if (child && child.nodeType == Dom.NODE_ELEMENT) {
						startOffset = Dom.getPositionWithinParent(child, true);
					}
				}
				// Normalize the start
				while (
					startContainer.nodeType == Dom.NODE_TEXT
					&& (previous = startContainer.previousSibling)
					&& previous.nodeType == Dom.NODE_TEXT
				) {
					startContainer = previous;
					startOffset += previous.nodeValue.length;
				}
				// Process the end only if not collapsed
				if (!collapsed) {
					// Find out if the start is pointing to a text node that will be normalized
					if (endContainer.nodeType == Dom.NODE_ELEMENT) {
						child = endContainer.childNodes[endOffset];
						// In this case, move the end to that text node
						if (
							child
							&& child.nodeType == Dom.NODE_TEXT
							&& endOffset > 0
							&& child.previousSibling.nodeType == Dom.NODE_TEXT
						) {
							endContainer = child;
							endOffset = 0;
						}
						// Get the normalized offset
						if (child && child.nodeType == Dom.NODE_ELEMENT) {
							endOffset = Dom.getPositionWithinParent(child, true);
						}
					}
					// Normalize the end
					while (
						endContainer.nodeType == Dom.NODE_TEXT
						&& (previous = endContainer.previousSibling)
						&& previous.nodeType == Dom.NODE_TEXT
					) {
						endContainer = previous;
						endOffset += previous.nodeValue.length;
					}
				}
			}
			bookMark = {
				start: this.editor.getDomNode().getPositionWithinTree(startContainer, normalized),
				end: collapsed ? null : this.editor.getDomNode().getPositionWithinTree(endContainer, normalized),
				startOffset: startOffset,
				endOffset: endOffset,
				normalized: normalized,
				collapsed: collapsed,
				nonIntrusive: true
			};
		}
		return bookMark;
	};

	/**
	 * Get the end point of the bookMark
	 * Adapted from FCKeditor
	 *
	 * @param	object		bookMark: the bookMark
	 * @param	boolean		endPoint: true, for startPoint, false for endPoint
	 *
	 * @return	object		the endPoint node
	 */
	BookMark.prototype.getEndPoint = function (bookMark, endPoint) {
		if (endPoint) {
			return this.document.getElementById(bookMark.startId);
		} else {
			return this.document.getElementById(bookMark.endId);
		}
	};

	/**
	 * Get a range and move it to the bookMark
	 *
	 * @param	object		bookMark: the bookmark to move to
	 *
	 * @return	object		the range that was bookmarked
	 */
	BookMark.prototype.moveTo = function (bookMark) {
		var range = this.selection.createRange();
		if (bookMark.nonIntrusive) {
			range = this.moveToNonIntrusiveBookMark(range, bookMark);
		} else {
			range = this.moveToIntrusiveBookMark(range, bookMark);
		}
		return range;
	};

	/**
	 * Move the range to the intrusive bookMark
	 * Adapted from FCKeditor
	 *
	 * @param	object		range: the range to be moved
	 * @param	object		bookMark: the bookmark to move to
	 *
	 * @return	object		the range that was bookmarked
	 */
	BookMark.prototype.moveToIntrusiveBookMark = function (range, bookMark) {
		var startSpan = this.getEndPoint(bookMark, true),
			endSpan = this.getEndPoint(bookMark, false),
			parent;
		if (startSpan) {
			// If the previous sibling is a text node, let the anchorNode have it as parent
			if (startSpan.previousSibling && startSpan.previousSibling.nodeType === Dom.TEXT_NODE) {
				range.setStart(startSpan.previousSibling, startSpan.previousSibling.data.length);
			} else {
				range.setStartBefore(startSpan);
			}
			Dom.removeFromParent(startSpan);
		} else {
			// For some reason, the startSpan was removed or its id attribute was removed so that it cannot be retrieved
			range.setStart(this.document.body, 0);
		}
		// If the bookmarked range was collapsed, the end span will not be available
		if (endSpan) {
			// If the next sibling is a text node, let the focusNode have it as parent
			if (endSpan.nextSibling && endSpan.nextSibling.nodeType === Dom.TEXT_NODE) {
				range.setEnd(endSpan.nextSibling, 0);
			} else {
				range.setEndBefore(endSpan);
			}
			Dom.removeFromParent(endSpan);
		} else {
			range.collapse(true);
		}
		return range;
	};

	/**
	 * Move the range to the non-intrusive bookMark
	 * Adapted from FCKeditor
	 *
	 * @param	object		range: the range to be moved
	 * @param	object		bookMark: the bookMark to move to
	 *
	 * @return	object		the range that was bookmarked
	 */
	BookMark.prototype.moveToNonIntrusiveBookMark = function (range, bookMark) {
		if (bookMark.start) {
			// Get the start information
			var startContainer = this.editor.getDomNode().getNodeByPosition(bookMark.start, bookMark.normalized),
				startOffset = bookMark.startOffset;
			// Set the start boundary
			range.setStart(startContainer, startOffset);
			// Get the end information
			var endContainer = bookMark.end && this.editor.getDomNode().getNodeByPosition(bookMark.end, bookMark.normalized),
				endOffset = bookMark.endOffset;
			// Set the end boundary. If not available, collapse the range
			if (endContainer) {
				range.setEnd(endContainer, endOffset);
			} else {
				range.collapse(true);
			}
		}
		return range;
	};

	return BookMark;

});

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
/***************************************************
 *  HTMLArea.DOM.Node: Node object
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/Node',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM'],
	function (UserAgent, Util, Dom) {

	/**
	 * Constructor method
	 *
	 * @param object config: an object with property "editor" giving reference to the parent object
	 *
	 * @return void
	 */
	var Node = function (config) {

		/**
		 * Reference to the editor MUST be set in config
		 */
		this.editor = null;

		Util.apply(this, config);

		/**
		 * Reference to the editor document
		 */
		this.document = this.editor.document;

		/**
		 * Reference to the editor selection object
		 */
		this.selection = this.editor.getSelection();

		/**
		 * Reference to the editor bookmark object
		 */
		this.bookMark = this.editor.getBookMark();
	};

	/**
	 * Remove the given element
	 *
	 * @param	object		element: the element to be removed, content and selection being preserved
	 *
	 * @return	void
	 */
	Node.prototype.removeMarkup = function (element) {
		var bookMark = this.bookMark.get(this.selection.createRange());
		var parent = element.parentNode;
		while (element.firstChild) {
			parent.insertBefore(element.firstChild, element);
		}
		parent.removeChild(element);
		this.selection.selectRange(this.bookMark.moveTo(bookMark));
	};

	/**
	 * Wrap the range with an inline element
	 *
	 * @param	string	element: the node that will wrap the range
	 * @param	object	range: the range to be wrapped
	 *
	 * @return	void
	 */
	Node.prototype.wrapWithInlineElement = function (element, range) {
		element.appendChild(range.extractContents());
		range.insertNode(element);
		element.normalize();
		// Sometimes Firefox inserts empty elements just outside the boundaries of the range
		var neighbour = element.previousSibling;
		if (neighbour && (neighbour.nodeType !== Dom.TEXT_NODE) && !/\S/.test(neighbour.textContent)) {
			Dom.removeFromParent(neighbour);
		}
		neighbour = element.nextSibling;
		if (neighbour && (neighbour.nodeType !== Dom.TEXT_NODE) && !/\S/.test(neighbour.textContent)) {
			Dom.removeFromParent(neighbour);
		}
		this.selection.selectNodeContents(element, false);
	};

	/**
	 * Get the position of the node within the document tree.
	 * The tree address returned is an array of integers, with each integer
	 * indicating a child index of a DOM node, starting from
	 * document.documentElement.
	 * The position cannot be used for finding back the DOM tree node once
	 * the DOM tree structure has been modified.
	 * Adapted from FCKeditor
	 *
	 * @param	object		node: the DOM node
	 * @param	boolean		normalized: if true, a normalized position is calculated
	 *
	 * @return	array		the position of the node
	 */
	Node.prototype.getPositionWithinTree = function (node, normalized) {
		var documentElement = this.document.documentElement,
			current = node,
			position = [];
		while (current && current != documentElement) {
			var parentNode = current.parentNode;
			if (parentNode) {
				// Get the current node position
				position.unshift(Dom.getPositionWithinParent(current, normalized));
			}
			current = parentNode;
		}
		return position;
	};

	/**
	 * Get the node given its position in the document tree.
	 * Adapted from FCKeditor
	 * See Node.prototype.getPositionWithinTree
	 *
	 * @param	array		position: the position of the node in the document tree
	 * @param	boolean		normalized: if true, a normalized position is given
	 *
	 * @return	objet		the node
	 */
	Node.prototype.getNodeByPosition = function (position, normalized) {
		var current = this.document.documentElement;
		var i, j, n, m;
		for (i = 0, n = position.length; current && i < n; i++) {
			var target = position[i];
			if (normalized) {
				var currentIndex = -1;
				for (j = 0, m = current.childNodes.length; j < m; j++) {
					var candidate = current.childNodes[j];
					if (
						candidate.nodeType == Dom.TEXT_NODE
						&& candidate.previousSibling
						&& candidate.previousSibling.nodeType == Dom.TEXT_NODE
					) {
						continue;
					}
					currentIndex++;
					if (currentIndex == target) {
						current = candidate;
						break;
					}
				}
			} else {
				current = current.childNodes[target];
			}
		}
		return current ? current : null;
	};

	/**
	 * Clean Apple wrapping span and font elements under the specified node
	 *
	 * @param	object		node: the node in the subtree of which cleaning is performed
	 *
	 * @return	void
	 */
	Node.prototype.cleanAppleStyleSpans = function (node) {
		if (UserAgent.isWebKit || UserAgent.isOpera) {
			if (node.getElementsByClassName) {
				var spans = node.getElementsByClassName('Apple-style-span');
				for (var i = spans.length; --i >= 0;) {
					this.removeMarkup(spans[i]);
				}
			}
			var spans = node.getElementsByTagName('span');
			for (var i = spans.length; --i >= 0;) {
				if (Dom.hasClass(spans[i], 'Apple-style-span')) {
					this.removeMarkup(spans[i]);
				}
				if (/^(li|h[1-6])$/i.test(spans[i].parentNode.nodeName) && (spans[i].style.cssText.indexOf('line-height') !== -1 || spans[i].style.cssText.indexOf('font-family') !== -1 || spans[i].style.cssText.indexOf('font-size') !== -1)) {
					this.removeMarkup(spans[i]);
				}
			}
			var fonts = node.getElementsByTagName('font');
			for (i = fonts.length; --i >= 0;) {
				if (Dom.hasClass(fonts[i], 'Apple-style-span')) {
					this.removeMarkup(fonts[i]);
				}
			}
			var uls = node.getElementsByTagName('ul');
			for (i = uls.length; --i >= 0;) {
				if (uls[i].style.cssText.indexOf('line-height') !== -1) {
					uls[i].style.lineHeight = '';
				}
			}
			var ols = node.getElementsByTagName('ol');
			for (i = ols.length; --i >= 0;) {
				if (ols[i].style.cssText.indexOf('line-height') !== -1) {
					ols[i].style.lineHeight = '';
				}
			}
		}
	};

	return Node;

});

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
/***************************************************
 *  HTMLArea.DOM.Selection: Selection object
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/Selection',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (UserAgent, Util, Dom, Event) {

	/**
	 * Constructor method
	 *
	 * @param object config: an object with property "editor" giving reference to the parent object
	 *
	 * @return void
	 */
	var Selection = function (config) {

		/**
		 * Reference to the editor MUST be set in config
		 */
		this.editor = null;

		/**
		 * The current selection
		 */
		this.selection = null;

		Util.apply(this, config);

		/**
		 * Reference to the editor document
		 */
		this.document = this.editor.document;

		/**
		 * Reference to the editor iframe window
		 */
		this.window = this.editor.iframe.getEl().contentWindow;

		// Set current selection
		this.get();
	};

	/**
	 * Get the current selection object
	 *
	 * @return	object		this
	 */
	Selection.prototype.get = function () {
		this.editor.focus();
	 	this.selection = this.window.getSelection ? this.window.getSelection() : this.document.selection;
	 	return this;
	};

	/**
	 * Get the type of the current selection
	 *
	 * @return	string		the type of selection ("None", "Text" or "Control")
	 */
	Selection.prototype.getType = function() {
		// By default set the type to "Text"
		var type = 'Text';
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			// Check if the current selection is a Control
			if (this.selection && this.selection.rangeCount == 1) {
				var range = this.selection.getRangeAt(0);
				if (range.startContainer.nodeType === Dom.ELEMENT_NODE) {
					if (
						// Gecko
						(range.startContainer == range.endContainer && (range.endOffset - range.startOffset) == 1) ||
						// Opera and WebKit
						(range.endContainer.nodeType === Dom.TEXT_NODE && range.endOffset == 0 && range.startContainer.childNodes[range.startOffset].nextSibling == range.endContainer)
					) {
						if (/^(img|hr|li|table|tr|td|embed|object|ol|ul|dl)$/i.test(range.startContainer.childNodes[range.startOffset].nodeName)) {
							type = 'Control';
						}
					}
				}
			}
		}
		return type;
	};

	/**
	 * Empty the current selection
	 *
	 * @return object this
	 */
	Selection.prototype.empty = function () {
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			if (typeof this.selection.removeAllRanges === 'function') {
				this.selection.removeAllRanges();
			} else {
				// Old version of WebKit
				this.selection.empty();
			}
			if (UserAgent.isOpera) {
				this.editor.focus();
			}
		}
		return this;
	};

	/**
	 * Determine whether the current selection is empty or not
	 *
	 * @return	boolean		true, if the selection is empty
	 */
	Selection.prototype.isEmpty = function () {
		var isEmpty = true;
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			isEmpty = this.selection.isCollapsed;
		}
		return isEmpty;
	};

	/**
	 * Get a range corresponding to the current selection
	 *
	 * @return	object		the range of the selection
	 */
	Selection.prototype.createRange = function () {
		var range;
		this.get();
		if (typeof this.selection !== 'object' || this.selection === null) {
			range = this.document.createRange();
		} else {
			// Older versions of WebKit did not support getRangeAt
			if (UserAgent.isWebKit && typeof this.selection.getRangeAt !== 'function') {
				range = this.document.createRange();
				if (this.selection.baseNode == null) {
					range.setStart(this.document.body, 0);
					range.setEnd(this.document.body, 0);
				} else {
					range.setStart(this.selection.baseNode, this.selection.baseOffset);
					range.setEnd(this.selection.extentNode, this.selection.extentOffset);
					if (range.collapsed != this.selection.isCollapsed) {
						range.setStart(this.selection.extentNode, this.selection.extentOffset);
						range.setEnd(this.selection.baseNode, this.selection.baseOffset);
					}
				}
			} else {
				try {
					range = this.selection.getRangeAt(0);
				} catch (e) {
					range = this.document.createRange();
				}
			}
		}
		return range;
	};

	/**
	 * Return the ranges of the selection
	 *
	 * @return	array		array of ranges
	 */
	Selection.prototype.getRanges = function () {
		this.get();
		var ranges = [];
		// Older versions of WebKit did not support getRangeAt
		if (typeof this.selection === 'object' && this.selection !== null && typeof this.selection.getRangeAt === 'function') {
			for (var i = this.selection.rangeCount; --i >= 0;) {
				ranges.push(this.selection.getRangeAt(i));
			}
		} else {
			ranges.push(this.createRange());
		}
		return ranges;
	};

	/**
	 * Add a range to the selection
	 *
	 * @param	object		range: the range to be added to the selection
	 *
	 * @return	object		this
	 */
	Selection.prototype.addRange = function (range) {
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			if (typeof this.selection.addRange === 'function') {
				this.selection.addRange(range);
			} else if (UserAgent.isWebKit) {
				this.selection.setBaseAndExtent(range.startContainer, range.startOffset, range.endContainer, range.endOffset);
			}
		}
		return this;
	};

	/**
	 * Set the ranges of the selection
	 *
	 * @param	array		ranges: array of range to be added to the selection
	 *
	 * @return	object		this
	 */
	Selection.prototype.setRanges = function (ranges) {
		this.get();
		this.empty();
		for (var i = ranges.length; --i >= 0;) {
			this.addRange(ranges[i]);
		}
		return this;
	};

	/**
	 * Set the selection to a given range
	 *
	 * @param	object		range: the range to be selected
	 *
	 * @return	object		this
	 */
	Selection.prototype.selectRange = function (range) {
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			this.empty().addRange(range);
		}
		return this;
	};

	/**
	 * Set the selection to a given node
	 *
	 * @param	object		node: the node to be selected
	 * @param	boolean		endPoint: collapse the selection at the start point (true) or end point (false) of the node
	 *
	 * @return	object		this
	 */
	Selection.prototype.selectNode = function (node, endPoint) {
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			if (UserAgent.isWebKit && /^(img)$/i.test(node.nodeName)) {
				this.selection.setBaseAndExtent(node, 0, node, 1);
			} else {
				var range = this.document.createRange();
				if (node.nodeType === Dom.ELEMENT_NODE && /^(body)$/i.test(node.nodeName)) {
					if (UserAgent.isWebKit) {
						range.setStart(node, 0);
						range.setEnd(node, node.childNodes.length);
					} else {
						range.selectNodeContents(node);
					}
				} else {
					range.selectNode(node);
				}
				if (typeof endPoint !== 'undefined') {
					range.collapse(endPoint);
				}
				this.selectRange(range);
			}
		}
		return this;
	};

	/**
	 * Set the selection to the inner contents of a given node
	 *
	 * @param	object		node: the node of which the contents are to be selected
	 * @param	boolean		endPoint: collapse the selection at the start point (true) or end point (false)
	 *
	 * @return	object		this
	 */
	Selection.prototype.selectNodeContents = function (node, endPoint) {
		var range;
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null) {
			range = this.document.createRange();
			if (UserAgent.isWebKit) {
				range.setStart(node, 0);
				if (node.nodeType === Dom.TEXT_NODE || node.nodeType === Dom.COMMENT_NODE || node.nodeType === Dom.CDATA_SECTION_NODE) {
					range.setEnd(node, node.textContent.length);
				} else {
					range.setEnd(node, node.childNodes.length);
				}
			} else {
				range.selectNodeContents(node);
			}
			if (typeof endPoint !== 'undefined') {
				range.collapse(endPoint);
			}
			this.selectRange(range);
		}
		return this;
	};

	/**
	 * Get the deepest node that contains both endpoints of the current selection.
	 *
	 * @return	object		the deepest node that contains both endpoints of the current selection.
	 */
	Selection.prototype.getParentElement = function () {
		var parentElement,
			range;
		this.get();
		if (this.getType() === 'Control') {
			parentElement = this.getElement();
		} else {
			range = this.createRange();
			parentElement = range.commonAncestorContainer;
				// Firefox 3 may report the document as commonAncestorContainer
			if (parentElement.nodeType === Dom.DOCUMENT_NODE) {
				parentElement = this.document.body;
			} else {
				while (parentElement && parentElement.nodeType === Dom.TEXT_NODE) {
					parentElement = parentElement.parentNode;
				}
			}
		}
		return parentElement;
	};

	/**
	 * Get the selected element (if any), in the case that a single element (object like and image or a table) is selected
	 * In IE language, we have a range of type 'Control'
	 *
	 * @return	object		the selected node
	 */
	Selection.prototype.getElement = function () {
		var element = null;
		this.get();
		if (typeof this.selection === 'object' && this.selection !== null && this.selection.anchorNode && this.selection.anchorNode.nodeType === Dom.ELEMENT_NODE && this.getType() == 'Control') {
			element = this.selection.anchorNode.childNodes[this.selection.anchorOffset];
				// For Safari, the anchor node for a control selection is the control itself
			if (!element) {
				element = this.selection.anchorNode;
			} else if (element.nodeType !== Dom.ELEMENT_NODE) {
				element = null;
			}
		}
		return element;
	};

	/**
	 * Get the deepest element ancestor of the selection that is of one of the specified types
	 *
	 * @param	array		types: an array of nodeNames
	 *
	 * @return	object		the found ancestor of one of the given types or null
	 */
	Selection.prototype.getFirstAncestorOfType = function (types) {
		var node = this.getParentElement();
		return Dom.getFirstAncestorOfType(node, types);
	};

	/**
	 * Get an array with all the ancestor nodes of the current selection
	 *
	 * @return	array		the ancestor nodes
	 */
	Selection.prototype.getAllAncestors = function () {
		var parent = this.getParentElement(),
			ancestors = [];
		while (parent && parent.nodeType === Dom.ELEMENT_NODE && !/^(body)$/i.test(parent.nodeName)) {
			ancestors.push(parent);
			parent = parent.parentNode;
		}
		ancestors.push(this.document.body);
		return ancestors;
	};

	/**
	 * Get an array with the parent elements of a multiple selection
	 *
	 * @return	array		the selected elements
	 */
	Selection.prototype.getElements = function () {
		var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null,
			elements = [];
		if (statusBarSelection) {
			elements.push(statusBarSelection);
		} else {
			var ranges = this.getRanges();
				parent;
			if (ranges.length > 1) {
				for (var i = ranges.length; --i >= 0;) {
					parent = range[i].commonAncestorContainer;
						// Firefox 3 may report the document as commonAncestorContainer
					if (parent.nodeType === Dom.DOCUMENT_NODE) {
						parent = this.document.body;
					} else {
						while (parent && parent.nodeType === Dom.TEXT_NODE) {
							parent = parent.parentNode;
						}
					}
					elements.push(parent);
				}
			} else {
				elements.push(this.getParentElement());
			}
		}
		return elements;
	};

	/**
	 * Get the node whose contents are currently fully selected
	 *
	 * @return	object		the fully selected node, if any, null otherwise
	 */
	Selection.prototype.getFullySelectedNode = function () {
		var node = null,
			isFullySelected = false;
		this.get();
		if (!this.isEmpty()) {
			var type = this.getType();
			var range = this.createRange();
			var ancestors = this.getAllAncestors();
			for (var i = 0, n = ancestors.length; i < n; i++) {
				var ancestor = ancestors[i];
				isFullySelected = (ancestor.textContent == range.toString());
				if (isFullySelected) {
					node = ancestor;
					break;
				}
			}
				// Working around bug with WebKit selection
			if (UserAgent.isWebKit && !isFullySelected) {
				var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null;
				if (statusBarSelection && statusBarSelection.textContent == range.toString()) {
					isFullySelected = true;
					node = statusBarSelection;
				}
			}
		}
		return node;
	};

	/**
	 * Get the block elements containing the start and the end points of the selection
	 *
	 * @return	object		object with properties start and end set to the end blocks of the selection
	 */
	Selection.prototype.getEndBlocks = function () {
		var range = this.createRange(),
			parentStart,
			parentEnd;
		parentStart = range.startContainer;
		if (/^(body)$/i.test(parentStart.nodeName)) {
			parentStart = parentStart.firstChild;
		}
		parentEnd = range.endContainer;
		if (/^(body)$/i.test(parentEnd.nodeName)) {
			parentEnd = parentEnd.lastChild;
		}
		while (parentStart && !Dom.isBlockElement(parentStart)) {
			parentStart = parentStart.parentNode;
		}
		while (parentEnd && !Dom.isBlockElement(parentEnd)) {
			parentEnd = parentEnd.parentNode;
		}
		return {
			start: parentStart,
			end: parentEnd
		};
	};

	/**
	 * Determine whether the end poins of the current selection are within the same block
	 *
	 * @return	boolean		true if the end points of the current selection are in the same block
	 */
	Selection.prototype.endPointsInSameBlock = function() {
		var endPointsInSameBlock = true;
		this.get();
		if (!this.isEmpty()) {
			var parent = this.getParentElement();
			var endBlocks = this.getEndBlocks();
			endPointsInSameBlock = (endBlocks.start === endBlocks.end && !/^(table|thead|tbody|tfoot|tr)$/i.test(parent.nodeName));
		}
		return endPointsInSameBlock;
	};

	/**
	 * Retrieve the HTML contents of the current selection
	 *
	 * @return	string		HTML text of the current selection
	 */
	Selection.prototype.getHtml = function () {
		var range = this.createRange(),
			html = '';
		if (!range.collapsed) {
			var cloneContents = range.cloneContents();
			if (!cloneContents) {
				cloneContents = this.document.createDocumentFragment();
			}
			html = this.editor.iframe.htmlRenderer.render(cloneContents, false);
		}
		return html;
	};

	/**
	 * Insert a node at the current position
	 * Delete the current selection, if any.
	 * Split the text node, if needed.
	 *
	 * @param	object		toBeInserted: the node to be inserted
	 *
	 * @return	object		this
	 */
	Selection.prototype.insertNode = function (toBeInserted) {
		var range = this.createRange();
		range.deleteContents();
		toBeSelected = (toBeInserted.nodeType === Dom.DOCUMENT_FRAGMENT_NODE) ? toBeInserted.lastChild : toBeInserted;
		range.insertNode(toBeInserted);
		this.selectNodeContents(toBeSelected, false);
		return this;
	};

	/**
	 * Insert HTML source code at the current position
	 * Delete the current selection, if any.
	 *
	 * @param	string		html: the HTML source code
	 *
	 * @return	object		this
	 */
	Selection.prototype.insertHtml = function (html) {
		this.editor.focus();
		var fragment = this.document.createDocumentFragment();
		var div = this.document.createElement('div');
		div.innerHTML = html;
		while (div.firstChild) {
			fragment.appendChild(div.firstChild);
		}
		this.insertNode(fragment);
		return this;
	};

	/**
	 * Surround the selection with an element specified by its start and end tags
	 * Delete the selection, if any.
	 *
	 * @param	string		startTag: the start tag
	 * @param	string		endTag: the end tag
	 *
	 * @return	void
	 */
	Selection.prototype.surroundHtml = function (startTag, endTag) {
		this.insertHtml(startTag + this.getHtml().replace(Dom.RE_bodyTag, '') + endTag);
	};

	/**
	 * Execute some native execCommand command on the current selection
	 *
	 * @param	string		cmdID: the command name or id
	 * @param	object		UI:
	 * @param	object		param:
	 *
	 * @return	boolean		false
	 */
	Selection.prototype.execCommand = function (cmdID, UI, param) {
		var success = true;
		this.editor.focus();
		try {
			this.document.execCommand(cmdID, UI, param);
		} catch (e) {
			success = false;
			this.editor.appendToLog('HTMLArea/DOM/Selection', 'execCommand', e + ' by execCommand(' + cmdID + ')', 'error');
		}
		this.editor.updateToolbar();
		return success;
	};

	/**
	 * Handle backspace event on the current selection
	 *
	 * @return	boolean		true to stop the event and cancel the default action
	 */
	Selection.prototype.handleBackSpace = function () {
		var range = this.createRange();
		var self = this;
		window.setTimeout(function() {
			var range = self.createRange();
			var startContainer = range.startContainer;
			var startOffset = range.startOffset;
			// If the selection is collapsed...
			if (self.isEmpty()) {
				// ... and the cursor lies in a direct child of body...
				if (/^(body)$/i.test(startContainer.nodeName)) {
					var node = startContainer.childNodes[startOffset-1];
				} else if (/^(body)$/i.test(startContainer.parentNode.nodeName)) {
					var node = startContainer;
				// ... or, in Google, a span tag may have been inserted inside a heading element
				} else if (UserAgent.isWebKit && /^(#text)$/i.test(startContainer.nodeName)) {
					var node = startContainer.parentNode;
					if (/^(h[1-6])$/i.test(node.nodeName)) {
						self.editor.getDomNode().cleanAppleStyleSpans(node);
					} else if (node.parentNode && /^(h[1-6])$/i.test(node.parentNode.nodeName)) {
						self.editor.getDomNode().cleanAppleStyleSpans(node.parentNode);
					}
					return false;
				} else {
					return false;
				}
				// ... which is a br or text node containing no non-whitespace character...
				node.normalize();
				if (/^(br|#text)$/i.test(node.nodeName) && !/\S/.test(node.textContent)) {
					// Get a meaningful previous sibling in which to reposition de cursor
					var previousSibling = node.previousSibling;
					while (previousSibling && /^(br|#text)$/i.test(previousSibling.nodeName) && !/\S/.test(previousSibling.textContent)) {
						previousSibling = previousSibling.previousSibling;
					}
					// If there is no meaningful previous sibling, the cursor is at the start of body or the start of a direct child of body
					if (previousSibling) {
						// Remove the node
						Dom.removeFromParent(node);
						// Position the cursor
						if (/^(ol|ul|dl)$/i.test(previousSibling.nodeName)) {
							self.selectNodeContents(previousSibling.lastChild, false);
						} else if (/^(table)$/i.test(previousSibling.nodeName)) {
							self.selectNodeContents(previousSibling.rows[previousSibling.rows.length-1].cells[previousSibling.rows[previousSibling.rows.length-1].cells.length-1], false);
						} else if (!/\S/.test(previousSibling.textContent) && previousSibling.firstChild) {
							self.selectNode(previousSibling.firstChild, true);
						} else {
							self.selectNodeContents(previousSibling, false);
						}
					}
				// ... or the only child of body and having no child (IE) or only a br child (FF)
				} else if (
						/^(body)$/i.test(node.parentNode.nodeName)
						&& !/\S/.test(node.parentNode.textContent)
						&& (node.childNodes.length === 0 || (node.childNodes.length === 1 && /^(br)$/i.test(node.firstChild.nodeName)))
					) {
					var parentNode = node.parentNode;
					Dom.removeFromParent(node);
					parentNode.innerHTML = '<br />';
					self.selectNodeContents(parentNode, true);
				}
			}
		}, 10);
		return false;

	};

	/**
	 * Detect emails and urls as they are typed in non-IE browsers
	 * Borrowed from Xinha (is not htmlArea) - http://xinha.gogo.co.nz/
	 *
	 * @param object event: the browser key event
	 *
	 * @return void
	 */
	Selection.prototype.detectURL = function (event) {
		var key = Event.getKey(event);
		var editor = this.editor;
		var selection = this.get().selection;
		if (!/^(a)$/i.test(this.getParentElement().nodeName)) {
			var autoWrap = function (textNode, tag) {
				var rightText = textNode.nextSibling;
				if (typeof tag === 'string') {
					tag = editor.document.createElement(tag);
				}
				var a = textNode.parentNode.insertBefore(tag, rightText);
				Dom.removeFromParent(textNode);
				a.appendChild(textNode);
				selection.collapse(rightText, 0);
				rightText.parentNode.normalize();

				editor.unLink = function() {
					var t = a.firstChild;
					a.removeChild(t);
					a.parentNode.insertBefore(t, a);
					Dom.removeFromParent(a);
					t.parentNode.normalize();
					editor.unLink = null;
					editor.unlinkOnUndo = false;
				};

				editor.unlinkOnUndo = true;
				return a;
			};
			switch (key) {
				// Space or Enter, see if the text just typed looks like a URL, or email address and link it accordingly
				case Event.ENTER:
				case Event.SPACE:
					if (selection && selection.isCollapsed && selection.anchorNode.nodeType === Dom.TEXT_NODE && selection.anchorNode.data.length > 3 && selection.anchorNode.data.indexOf('.') >= 0) {
						var midStart = selection.anchorNode.data.substring(0,selection.anchorOffset).search(/[a-zA-Z0-9]+\S{3,}$/);
						if (midStart == -1) {
							break;
						}
						if (this.getFirstAncestorOfType('a')) {
							// already in an anchor
							break;
						}
						var matchData = selection.anchorNode.data.substring(0,selection.anchorOffset).replace(/^.*?(\S*)$/, '$1');
						if (matchData.indexOf('@') != -1) {
							var m = matchData.match(HTMLArea.RE_email);
							if (m) {
								var leftText  = selection.anchorNode;
								var rightText = leftText.splitText(selection.anchorOffset);
								var midText   = leftText.splitText(midStart);
								var midEnd = midText.data.search(/[^a-zA-Z0-9\.@_\-]/);
								if (midEnd != -1) {
									var endText = midText.splitText(midEnd);
								}
								autoWrap(midText, 'a').href = 'mailto:' + m[0];
								break;
							}
						}
						var m = matchData.match(HTMLArea.RE_url);
						if (m) {
							var leftText  = selection.anchorNode;
							var rightText = leftText.splitText(selection.anchorOffset);
							var midText   = leftText.splitText(midStart);
							var midEnd = midText.data.search(/[^a-zA-Z0-9\._\-\/\&\?=:@]/);
							if (midEnd != -1) {
								var endText = midText.splitText(midEnd);
							}
							autoWrap(midText, 'a').href = (m[1] ? m[1] : 'http://') + m[3];
							break;
						}
					}
					break;
				default:
					if (key === Event.ESC || (editor.unlinkOnUndo && (event.ctrlKey || event.metaKey) && key === Event.F11)) {
						if (editor.unLink) {
							editor.unLink();
							Event.stopEvent(event);
						}
						break;
					} else if (key) {
						editor.unlinkOnUndo = false;
						if (selection.anchorNode && selection.anchorNode.nodeType === Dom.TEXT_NODE) {
							// See if we might be changing a link
							var a = this.getFirstAncestorOfType('a');
							if (!a) {
								break;
							}
							if (!a.updateAnchorTimeout) {
								if (selection.anchorNode.data.match(HTMLArea.RE_email) && (a.href.match('mailto:' + selection.anchorNode.data.trim()))) {
									var textNode = selection.anchorNode;
									var fn = function() {
										a.href = 'mailto:' + textNode.data.trim();
										a.updateAnchorTimeout = setTimeout(fn, 250);
									};
									a.updateAnchorTimeout = setTimeout(fn, 250);
									break;
								}
								var m = selection.anchorNode.data.match(HTMLArea.RE_url);
								if (m && a.href.match(selection.anchorNode.data.trim())) {
									var textNode = selection.anchorNode;
									var fn = function() {
										var m = textNode.data.match(HTMLArea.RE_url);
										a.href = (m[1] ? m[1] : 'http://') + m[3];
										a.updateAnchorTimeout = setTimeout(fn, 250);
									}
									a.updateAnchorTimeout = setTimeout(fn, 250);
								}
							}
						}
					}
					break;
			}
		}
	};

	/**
	 * Enter event handler
	 *
	 * @return boolean true to stop the event and cancel the default action
	 */
	Selection.prototype.checkInsertParagraph = function() {
		var editor = this.editor;
		var left, right, rangeClone,
			sel	= this.get().selection,
			range	= this.createRange(),
			p	= this.getAllAncestors(),
			block	= null,
			a	= null,
			doc	= this.document;
		for (var i = 0, n = p.length; i < n; ++i) {
			if (Dom.isBlockElement(p[i]) && !/^(html|body|table|tbody|thead|tfoot|tr|dl)$/i.test(p[i].nodeName)) {
				block = p[i];
				break;
			}
		}
		if (block && /^(td|th|tr|tbody|thead|tfoot|table)$/i.test(block.nodeName) && this.editor.config.buttons.table && this.editor.config.buttons.table.disableEnterParagraphs) {
			return false;
		}
		if (!range.collapsed) {
			range.deleteContents();
		}
		this.empty();
		if (!block || /^(td|div|article|aside|footer|header|nav|section)$/i.test(block.nodeName)) {
			if (!block) {
				block = doc.body;
			}
			if (block.hasChildNodes()) {
				rangeClone = range.cloneRange();
				if (range.startContainer == block) {
						// Selection is directly under the block
					var blockOnLeft = null;
					var leftSibling = null;
						// Looking for the farthest node on the left that is not a block
					for (var i = range.startOffset; --i >= 0;) {
						if (Dom.isBlockElement(block.childNodes[i])) {
							blockOnLeft = block.childNodes[i];
							break;
						} else {
							rangeClone.setStartBefore(block.childNodes[i]);
						}
					}
				} else {
						// Looking for inline or text container immediate child of block
					var inlineContainer = range.startContainer;
					while (inlineContainer.parentNode != block) {
						inlineContainer = inlineContainer.parentNode;
					}
						// Looking for the farthest node on the left that is not a block
					var leftSibling = inlineContainer;
					while (leftSibling.previousSibling && !Dom.isBlockElement(leftSibling.previousSibling)) {
						leftSibling = leftSibling.previousSibling;
					}
					rangeClone.setStartBefore(leftSibling);
					var blockOnLeft = leftSibling.previousSibling;
				}
					// Avoiding surroundContents buggy in Opera and Safari
				left = doc.createElement('p');
				left.appendChild(rangeClone.extractContents());
				if (!left.textContent && !left.getElementsByTagName('img').length && !left.getElementsByTagName('table').length) {
					left.innerHTML = '<br />';
				}
				if (block.hasChildNodes()) {
					if (blockOnLeft) {
						left = block.insertBefore(left, blockOnLeft.nextSibling);
					} else {
						left = block.insertBefore(left, block.firstChild);
					}
				} else {
					left = block.appendChild(left);
				}
				block.normalize();
					// Looking for the farthest node on the right that is not a block
				var rightSibling = left;
				while (rightSibling.nextSibling && !Dom.isBlockElement(rightSibling.nextSibling)) {
					rightSibling = rightSibling.nextSibling;
				}
				var blockOnRight = rightSibling.nextSibling;
				range.setEndAfter(rightSibling);
				range.setStartAfter(left);
					// Avoiding surroundContents buggy in Opera and Safari
				right = doc.createElement('p');
				right.appendChild(range.extractContents());
				if (!right.textContent && !right.getElementsByTagName('img').length && !right.getElementsByTagName('table').length) {
					right.innerHTML = '<br />';
				}
				if (!(left.childNodes.length == 1 && right.childNodes.length == 1 && left.firstChild.nodeName.toLowerCase() == 'br' && right.firstChild.nodeName.toLowerCase() == 'br')) {
					if (blockOnRight) {
						right = block.insertBefore(right, blockOnRight);
					} else {
						right = block.appendChild(right);
					}
					this.selectNodeContents(right, true);
				} else {
					this.selectNodeContents(left, true);
				}
				block.normalize();
			} else {
				var first = block.firstChild;
				if (first) {
					block.removeChild(first);
				}
				right = doc.createElement('p');
				if (UserAgent.isWebKit || UserAgent.isOpera) {
					right.innerHTML = '<br />';
				}
				right = block.appendChild(right);
				this.selectNodeContents(right, true);
			}
		} else {
			range.setEndAfter(block);
			var df = range.extractContents(), left_empty = false;
			if (!/\S/.test(block.innerHTML) || (!/\S/.test(block.textContent) && !/<(img|hr|table)/i.test(block.innerHTML))) {
				if (!UserAgent.isOpera) {
					block.innerHTML = '<br />';
				}
				left_empty = true;
			}
			p = df.firstChild;
			if (p) {
				if (!/\S/.test(p.innerHTML) || (!/\S/.test(p.textContent) && !/<(img|hr|table)/i.test(p.innerHTML))) {
					if (/^h[1-6]$/i.test(p.nodeName)) {
						p = Dom.convertNode(p, 'p');
					}
					if (/^(dt|dd)$/i.test(p.nodeName)) {
						 p = Dom.convertNode(p, /^(dt)$/i.test(p.nodeName) ? 'dd' : 'dt');
					}
					if (!UserAgent.isOpera) {
						p.innerHTML = '<br />';
					}
					if (/^li$/i.test(p.nodeName) && left_empty && (!block.nextSibling || !/^li$/i.test(block.nextSibling.nodeName))) {
						left = block.parentNode;
						left.removeChild(block);
						range.setEndAfter(left);
						range.collapse(false);
						p = Dom.convertNode(p, /^(li|dd|td|th|p|h[1-6])$/i.test(left.parentNode.nodeName) ? 'br' : 'p');
					}
				}
				range.insertNode(df);
					// Remove any anchor created empty on both sides of the selection
				if (p.previousSibling) {
					var a = p.previousSibling.lastChild;
					if (a && /^a$/i.test(a.nodeName) && !/\S/.test(a.innerHTML)) {
						Dom.convertNode(a, 'br');
					}
				}
				var a = p.lastChild;
				if (a && /^a$/i.test(a.nodeName) && !/\S/.test(a.innerHTML)) {
					Dom.convertNode(a, 'br');
				}
					// Walk inside the deepest child element (presumably inline element)
				while (p.firstChild && p.firstChild.nodeType === Dom.ELEMENT_NODE && !/^(br|img|hr|table)$/i.test(p.firstChild.nodeName)) {
					p = p.firstChild;
				}
				if (/^br$/i.test(p.nodeName)) {
					p = p.parentNode.insertBefore(doc.createTextNode('\x20'), p);
				} else if (!/\S/.test(p.innerHTML)) {
						// Need some element inside the deepest element
					p.appendChild(doc.createElement('br'));
				}
				this.selectNodeContents(p, true);
			} else {
				if (/^(li|dt|dd)$/i.test(block.nodeName)) {
					p = doc.createElement(block.nodeName);
				} else {
					p = doc.createElement('p');
				}
				if (!UserAgent.isOpera) {
					p.innerHTML = '<br />';
				}
				if (block.nextSibling) {
					p = block.parentNode.insertBefore(p, block.nextSibling);
				} else {
					p = block.parentNode.appendChild(p);
				}
				this.selectNodeContents(p, true);
			}
		}
		this.editor.scrollToCaret();
		return true;
	};

	return Selection;

});

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
/***************************************************
 *  HTMLArea.DOM.Walker: DOM tree walk
 ***************************************************/
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/Walker',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM'],
	function (UserAgent, Util, Dom) {

	/**
	 * Constructor method
	 *
	 * @param object config: an object with property "editor" giving reference to the parent object
	 *
	 * @return void
	 */
	var Walker = function (config) {
		// Configuration defaults
		var configDefaults = {
			keepComments: false,
			keepCDATASections: false,
			removeTags: /none/i,
			removeTagsAndContents: /none/i,
			keepTags: /.*/i,
			removeAttributes: /none/i,
			removeTrailingBR: true,
			baseUrl: ''
		};
		Util.apply(this, config, configDefaults);
	};

	/**
	 * Walk the DOM tree
	 *
	 * @param	object		node: the root node of the tree
	 * @param	boolean		includeNode: if set, apply callback to the node
	 * @param	string		startCallback: a function call to be evaluated on each node, before walking the children
	 * @param	string		endCallback: a function call to be evaluated on each node, after walking the children
	 * @param	array		args: array of arguments
	 * @return	void
	 */
	Walker.prototype.walk = function (node, includeNode, startCallback, endCallback, args) {
		if (!this.removeTagsAndContents.test(node.nodeName)) {
			if (includeNode) {
				eval(startCallback);
			}
				// Walk the children
			var child = node.firstChild;
			while (child) {
				this.walk(child, true, startCallback, endCallback, args);
				child = child.nextSibling;
			}
			if (includeNode) {
				eval(endCallback);
			}
		}
	};

	/**
	 * Generate html string from DOM tree
	 *
	 * @param	object		node: the root node of the tree
	 * @param	boolean		includeNode: if set, apply callback to root element
	 * @return	string		rendered html code
	 */
	Walker.prototype.render = function (node, includeNode) {
		this.html = '';
		this.walk(node, includeNode, 'args[0].renderNodeStart(node)', 'args[0].renderNodeEnd(node)', [this]);
		return this.html;
	};

	/**
	 * Generate html string for the start of a node
	 *
	 * @param	object		node: the root node of the tree
	 * @return	string		rendered html code (accumulated in this.html)
	 */
	Walker.prototype.renderNodeStart = function (node) {
		var html = '';
		switch (node.nodeType) {
			case Dom.ELEMENT_NODE:
				if (this.keepTags.test(node.nodeName) && !this.removeTags.test(node.nodeName)) {
					html += this.setOpeningTag(node);
				}
				break;
			case Dom.TEXT_NODE:
				html += /^(script|style)$/i.test(node.parentNode.nodeName) ? node.data : Util.htmlEncode(node.data);
				break;
			case Dom.ENTITY_NODE:
				html += node.nodeValue;
				break;
			case Dom.ENTITY_REFERENCE_NODE:
				html += '&' + node.nodeValue + ';';
				break;
			case Dom.COMMENT_NODE:
				if (this.keepComments) {
					html += '<!--' + node.data + '-->';
				}
				break;
			case Dom.CDATA_SECTION_NODE:
				if (this.keepCDATASections) {
					html += '<![CDATA[' + node.data + ']]>';
				}
				break;
			default:
					// Ignore all other node types
				break;
		}
		this.html += html;
	};

	/**
	 * Generate html string for the end of a node
	 *
	 * @param	object		node: the root node of the tree
	 * @return	string		rendered html code (accumulated in this.html)
	 */
	Walker.prototype.renderNodeEnd = function (node) {
		var html = '';
		if (node.nodeType === Dom.ELEMENT_NODE) {
			if (this.keepTags.test(node.nodeName) && !this.removeTags.test(node.nodeName)) {
				html += this.setClosingTag(node);
			}
		}
		this.html += html;
	};

	/**
	 * Get the attributes of the node, filtered and cleaned-up
	 *
	 * @param	object		node: the node
	 * @return	object		an object with attribute name as key and attribute value as value
	 */
	Walker.prototype.getAttributes = function (node) {
		var attributes = node.attributes;
		var filterededAttributes = [];
		var attribute, attributeName, attributeValue;
		for (var i = attributes.length; --i >= 0;) {
			attribute = attributes.item(i);
			attributeName = attribute.nodeName.toLowerCase();
			attributeValue = attribute.nodeValue;
				// Ignore some attributes and those configured to be removed
			if (/_moz|contenteditable|complete/.test(attributeName) || this.removeAttributes.test(attributeName)) {
				continue;
			}
				// Ignore default values except for the value attribute
			if (!attribute.specified && attributeName !== 'value') {
				continue;
			}
			if (UserAgent.isIE) {
				// May need to strip the base url
				if (attributeName === 'href' || attributeName === 'src') {
					attributeValue = this.stripBaseURL(attributeValue);
				// Ignore value="0" reported by IE on all li elements
				} else if (attributeName === 'value' && /^li$/i.test(node.nodeName) && attributeValue == 0) {
					continue;
				}
			} else if (UserAgent.isGecko) {
					// Ignore special values reported by Mozilla
				if (/(_moz|^$)/.test(attributeValue)) {
					continue;
					// Pasted internal url's are made relative by Mozilla: https://bugzilla.mozilla.org/show_bug.cgi?id=613517
				} else if (attributeName === 'href' || attributeName === 'src') {
					attributeValue = Dom.addBaseUrl(attributeValue, this.baseUrl);
				}
			}
				// Ignore id attributes generated by ExtJS
			if (attributeName === 'id' && /^ext-gen/.test(attributeValue)) {
				continue;
			}
			filterededAttributes.push({
				attributeName: attributeName,
				attributeValue: attributeValue
			});
		}
		return (UserAgent.isWebKit || UserAgent.isOpera) ? filterededAttributes.reverse() : filterededAttributes;
	};

	/**
	 * Set opening tag for a node
	 *
	 * @param	object		node: the node
	 * @return	object		opening tag
	 */
	Walker.prototype.setOpeningTag = function (node) {
		var html = '';
			// Handle br oddities
		if (/^br$/i.test(node.nodeName)) {
				// Remove Mozilla special br node
			if (UserAgent.isGecko && node.hasAttribute('_moz_editor_bogus_node')) {
				return html;
				// In Gecko, whenever some text is entered in an empty block, a trailing br tag is added by the browser.
				// If the br element is a trailing br in a block element with no other content or with content other than a br, it may be configured to be removed
			} else if (this.removeTrailingBR && !node.nextSibling && Dom.isBlockElement(node.parentNode) && (!node.previousSibling || !/^br$/i.test(node.previousSibling.nodeName))) {
						// If an empty paragraph with a class attribute, insert a non-breaking space so that RTE transform does not clean it away
					if (!node.previousSibling && node.parentNode && /^p$/i.test(node.parentNode.nodeName) && node.parentNode.className) {
						html += "&nbsp;";
					}
				return html;
			}
		}
			// Normal node
		var attributes = this.getAttributes(node);
		for (var i = 0, n = attributes.length; i < n; i++) {
			html +=  ' ' + attributes[i]['attributeName'] + '="' + Util.htmlEncode(attributes[i]['attributeValue']) + '"';
		}
		html = '<' + node.nodeName.toLowerCase() + html + (Dom.RE_noClosingTag.test(node.nodeName) ? ' />' : '>');
			// Fix orphan list elements
		if (/^li$/i.test(node.nodeName) && !/^[ou]l$/i.test(node.parentNode.nodeName)) {
			html = '<ul>' + html;
		}
		return html;
	};

	/**
	 * Set closing tag for a node
	 *
	 * @param	object		node: the node
	 * @return	object		closing tag, if required
	 */
	Walker.prototype.setClosingTag = function (node) {
		var html = Dom.RE_noClosingTag.test(node.nodeName) ? '' : '</' + node.nodeName.toLowerCase() + '>';
			// Fix orphan list elements
		if (/^li$/i.test(node.nodeName) && !/^[ou]l$/i.test(node.parentNode.nodeName)) {
			html += '</ul>';
		}
		return html;
	};

	/**
	 * Strip base url
	 * May be overridden by link handling plugin
	 *
	 * @param	string		value: value of a href or src attribute
	 * @return	tring		stripped value
	 */
	Walker.prototype.stripBaseURL = function (value) {
		return value;
	};

	return Walker;

});

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
 * Configuration of af an Editor of TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Configuration/Config',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (UserAgent, Util) {

	/**
	 *  Constructor: Sets editor configuration defaults
	 */
	var Config = function (editorId) {
		this.editorId = editorId;
			// if the site is secure, create a secure iframe
		this.useHTTPS = false;
			// for Mozilla
		this.useCSS = false;
		this.enableMozillaExtension = true;
		this.disableEnterParagraphs = false;
		this.disableObjectResizing = false;
		this.removeTrailingBR = true;
			// style included in the iframe document
		this.editedContentStyle = HTMLArea.editedContentCSS;
			// Array of content styles
		this.pageStyle = [];
			// Maximum attempts at accessing the stylesheets
		this.styleSheetsMaximumAttempts = 20;
			// Remove tags (must be a regular expression)
		this.htmlRemoveTags = /none/i;
			// Remove tags and their contents (must be a regular expression)
		this.htmlRemoveTagsAndContents = /none/i;
			// Remove comments
		this.htmlRemoveComments = false;
			// Array of custom tags
		this.customTags = [];
			// BaseURL to be included in the iframe document
		this.baseURL = document.baseURI;
			// IE does not support document.baseURI
			// Since document.URL is incorrect when using realurl, get first base tag and extract href
		if (!this.baseURL) {
			var baseTags = document.getElementsByTagName ('base');
			if (baseTags.length > 0) {
				this.baseURL = baseTags[0].href;
			} else {
				this.baseURL = document.URL;
			}
		}
		if (this.baseURL && this.baseURL.match(/(.*\:\/\/.*\/)[^\/]*/)) {
			this.baseURL = RegExp.$1;
		}
			// URL-s
		this.popupURL = "Resources/Public/Html/";
			// DocumentType
		this.documentType = '<!DOCTYPE html\r'
				+ '    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"\r'
				+ '    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r';
		this.blankDocument = '<html><head></head><body></body></html>';
			// Hold the configuration of buttons and hot keys registered by plugins
		this.buttonsConfig = {};
		this.hotKeyList = {};
			// Default configurations for toolbar items
		this.configDefaults = {
			all: {
				xtype: 'htmlareabutton',
				textMode: false,
				selection: false,
				dialog: false,
				hidden: false
			}
		};
	};

	/**
	 * Registers a button for inclusion in the toolbar, adding some standard configuration properties for the ExtJS widgets
	 *
	 * @param	object		buttonConfiguration: the configuration object of the button:
	 *					id		: unique id for the button
	 *					tooltip		: tooltip for the button
	 *					textMode	: enable in text mode
	 *					context		: disable if not inside one of listed elements
	 *					hidden		: hide in menu and show only in context menu
	 *					selection	: disable if there is no selection
	 *					hotkey		: hotkey character
	 *					dialog		: if true, the button opens a dialogue
	 *					dimensions	: the opening dimensions object of the dialogue window: { width: nn, height: mm }
	 *					and potentially other ExtJS config properties (will be forwarded)
	 *
	 * @return	boolean		true if the button was successfully registered
	 */
	Config.prototype.registerButton = function (config) {
		config.itemId = config.id;
		if (typeof this.buttonsConfig[config.id] !== 'undefined' && this.buttonsConfig[config.id] !== null) {
			HTMLArea.appendToLog('', 'HTMLArea.Config', 'registerButton', 'A toolbar item with the same Id: ' + config.id + ' already exists and will be overidden.', 'warn');
		}
		// Apply defaults
		Util.applyIf(config, this.configDefaults['all']);
		Util.applyIf(config, this.configDefaults[config.xtype]);
		// Set some additional properties
		switch (config.xtype) {
			case 'htmlareaselect':
				config.hideLabel = typeof config.fieldLabel !== 'string' || !config.fieldLabel.length || UserAgent.isIE6;
				config.helpTitle = config.tooltip;
				break;
			default:
				if (!config.iconCls) {
					config.iconCls = config.id;
				}
				break;
		}
		config.cmd = config.id;
		config.tooltipType = 'title';
		this.buttonsConfig[config.id] = config;
		return true;
	};

	/**
	 * Register a hotkey with the editor configuration.
	 */
	Config.prototype.registerHotKey = function (hotKeyConfiguration) {
		if (typeof this.hotKeyList[hotKeyConfiguration.id] !== 'undefined') {
			HTMLArea.appendToLog('', 'HTMLArea.Config', 'registerHotKey', 'A hotkey with the same key ' + hotKeyConfiguration.id + ' already exists and will be overidden.', 'warn');
		}
		if (typeof hotKeyConfiguration.cmd === 'string' && hotKeyConfiguration.cmd.length > 0 && typeof this.buttonsConfig[hotKeyConfiguration.cmd] !== 'undefined') {
			this.hotKeyList[hotKeyConfiguration.id] = hotKeyConfiguration;
			return true;
		} else {
			HTMLArea.appendToLog('', 'HTMLArea.Config', 'registerHotKey', 'A hotkey with key ' + hotKeyConfiguration.id + ' could not be registered because toolbar item with id ' + hotKeyConfiguration.cmd + ' was not registered.', 'warn');
			return false;
		}
	};

	/**
	 * Get the configured document type for dialogue windows
	 */
	Config.prototype.getDocumentType = function () {
		return this.documentType;
	};

	return Config;

});

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
 * A button in the toolbar
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Toolbar/Button',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (UserAgent, Dom, Util, Event) {

	/**
	 * Button constructor
	 */
	var Button = function (config) {
		Util.apply(this, config);		
	};

	Button.prototype = {

		/**
		 * Render the button item (called by the toolbar)
		 *
		 * @param object container: the container of the button (the toolbar object or a button group)
		 * @return void
		 */
		render: function (container) {
			this.el = document.createElement('button');
			this.el.setAttribute('type', 'button');
			Dom.addClass(this.el, 'btn');
			Dom.addClass(this.el, 'btn-default');
			Dom.addClass(this.el, 'btn-sm');
			if (this.id) {
				this.el.setAttribute('id', this.id);
			}
			if (typeof this.cls === 'string') {
				Dom.addClass(span, this.cls);
			}
			if (typeof this.tooltip === 'string') {
				this.setTooltip(this.tooltip);
			}
			if (this.hidden) {
				Dom.setStyle(this.el, { display: 'none' } );
			}
			container.appendChild(this.el);
			var span = document.createElement('span');
			Dom.addClass(span, 'btn-icon');
			if (typeof this.iconCls === 'string') {
				Dom.addClass(span, this.iconCls);
			}
			span.innerHTML = typeof this.text === 'string' ? this.text : '&nbsp;';
			this.el.appendChild(span);
			this.initEventListeners();
		},

		/**
		 * Get the element to which the item is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * Initialize listeners
		 */
		initEventListeners: function () {
			var self = this;
			Event.on(this, 'HTMLAreaEventHotkey', function (event, key, keyEvent) { return self.onHotKey(key, keyEvent); });
			Event.on(this, 'HTMLAreaEventContextMenu', function (event, button) { return self.onButtonClick(button, event); });
			Event.on(this.el, (UserAgent.isWebKit || UserAgent.isIE) ? 'mousedown' : 'click', function (event) { return self.onButtonClick(self, event); });
			// Monitor toolbar updates in order to refresh the state of the button
			Event.on(this.getToolbar(), 'HTMLAreaEventToolbarUpdate', function (event, mode, selectionEmpty, ancestors, endPointsInSameBlock) { Event.stopEvent(event); self.onUpdateToolbar(mode, selectionEmpty, ancestors, endPointsInSameBlock); return false; });
		},

		/**
		 * Get a reference to the editor
		 */
		getEditor: function() {
			return this.getToolbar().getEditor();
		},

		/**
		 * Get a reference to the toolbar
		 */
		getToolbar: function() {
			return this.toolbar;
		},

		/**
		 * Get the itemId of the button
		 */
		getItemId: function() {
			return this.itemId;
		},

		/**
		 * Add properties and function to set button active or not depending on current selection
		 */
		inactive: true,
		activeClass: 'btn-active',
		setInactive: function (inactive) {
			this.inactive = inactive;
			return inactive ? Dom.removeClass(this.el, this.activeClass) : Dom.addClass(this.el, this.activeClass);
		},

		/**
		 * Determine if the button should be enabled based on the current selection and context configuration property
		 */
		isInContext: function (mode, selectionEmpty, ancestors) {
			var editor = this.getEditor();
			var inContext = true;
			if (mode === 'wysiwyg' && this.context) {
				var attributes = [],
					contexts = [];
				if (/(.*)\[(.*?)\]/.test(this.context)) {
					contexts = RegExp.$1.split(',');
					attributes = RegExp.$2.split(',');
				} else {
					contexts = this.context.split(',');
				}
				contexts = new RegExp( '^(' + contexts.join('|') + ')$', 'i');
				var matchAny = contexts.test('*');
				var i, j, n;
				for (i = 0, n = ancestors.length; i < n; i++) {
					var ancestor = ancestors[i];
					inContext = matchAny || contexts.test(ancestor.nodeName);
					if (inContext) {
						for (j = attributes.length; --j >= 0;) {
							inContext = eval("ancestor." + attributes[j]);
							if (!inContext) {
								break;
							}
						}
					}
					if (inContext) {
						break;
					}
				}
			}
			return inContext && (!this.selection || !selectionEmpty);
		},

		/**
		 * Handler invoked when the button is clicked
		 */
		onButtonClick: function (button, event, key) {
			if (!this.disabled) {
				if (!this.plugins[this.action](this.getEditor(), key || this.itemId) && event) {
					Event.stopEvent(event);
				}
				if (UserAgent.isOpera) {
					this.getEditor().focus();
				}
				if (this.dialog) {
					this.setDisabled(true);
				} else {
					this.getToolbar().update();
				}
			}
			return false;
		},

		/**
		 * Handler invoked when the hotkey configured for this button is pressed
		 */
		onHotKey: function (key, event) {
			return this.onButtonClick(this, event, key);
		},

		/**
		 * Handler invoked when the toolbar is updated
		 */
		onUpdateToolbar: function (mode, selectionEmpty, ancestors, endPointsInSameBlock) {
			this.setDisabled(mode === 'textmode' && !this.textMode);
			if (!this.disabled) {
				if (!this.noAutoUpdate) {
					this.setDisabled(!this.isInContext(mode, selectionEmpty, ancestors));
				}
				this.plugins['onUpdateToolbar'](this, mode, selectionEmpty, ancestors, endPointsInSameBlock);
			}
		},

		/**
		 * Update the tooltip text
		 */
		setTooltip: function (text) {
			this.tooltip = text;
			this.el.setAttribute('title', this.tooltip);
			this.el.setAttribute('aria-label', this.tooltip);
		},

		/**
		 * Setting disabled/enabled by boolean.
		 * @param boolean disabled
		 * @return void
		 */
		setDisabled: function(disabled){
			this.disabled = disabled;
			if (disabled) {
				this.el.setAttribute('disabled', 'disabled');
			} else {
				this.el.removeAttribute('disabled');
			}
		},

		/**
		 * Cleanup (called by toolbar onBeforeDestroy)
		 */
		onBeforeDestroy: function () {
			Event.off(this);
			if (this.el) {
				Event.off(this.el);
				var node;
				while (node = this.el.firstChild) {
					this.el.removeChild(node);
				}
				this.el = null;
			}
		}
	};

	return Button;

});

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
 * A text item in the toolbar
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Toolbar/ToolbarText',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (Dom, Util, Event) {

	/**
	 * Toolbar text item constructor
	 */
	var ToolbarText = function (config) {
		Util.apply(this, config);
	};

	ToolbarText.prototype = {

		/**
		 * Render the text item (called by the toolbar)
		 *
		 * @param object container: the container of the toolbarText (the toolbar object)
		 * @return void
		 */
		render: function (container) {
			this.el = document.createElement('div');
			Dom.addClass(this.el, 'btn');
			Dom.addClass(this.el, 'btn-sm');
			Dom.addClass(this.el, 'btn-default');
			Dom.addClass(this.el, 'toolbar-text');
			if (this.id) {
				this.el.setAttribute('id', this.id);
			}
			if (typeof this.cls === 'string') {
				Dom.addClass(this.el, this.cls);
			}
			if (typeof this.text === 'string') {
				this.el.innerHTML = this.text;
			}
			if (typeof this.tooltip === 'string') {
				this.el.setAttribute('title', this.tooltip);
				this.el.setAttribute('aria-label', this.tooltip);
			}
			container.appendChild(this.el);
			this.initEventListeners();
		},

		/**
		 * Get the element to which the item is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * Initialize listeners
		 */
		initEventListeners: function () {
			// Monitor toolbar updates in order to refresh the state of the text item
			var self = this;
			Event.on(this.getToolbar(), 'HTMLAreaEventToolbarUpdate', function (event, mode, selectionEmpty, ancestors, endPointsInSameBlock) { Event.stopEvent(event); self.onUpdateToolbar(mode, selectionEmpty, ancestors, endPointsInSameBlock); return false; });
		},

		/**
		 * Get a reference to the toolbar
		 */
		getToolbar: function() {
			return this.toolbar;
		},

		/**
		 * Handler invoked when the toolbar is updated
		 */
		onUpdateToolbar: function (mode, selectionEmpty, ancestors, endPointsInSameBlock) {
			this.setDisabled(mode === 'textmode' && !this.textMode);
			if (!this.disabled) {
				this.plugins['onUpdateToolbar'](this, mode, selectionEmpty, ancestors, endPointsInSameBlock);
			}
		},

		/**
		 * Setting disabled/enabled by boolean.
		 * @param boolean disabled
		 * @return void
		 */
		setDisabled: function(disabled){
			this.disabled = disabled;
			if (disabled) {
				this.el.setAttribute('disabled', 'disabled');
			} else {
				this.el.removeAttribute('disabled');
			}
		},

		/**
		 * Cleanup (called by toolbar onBeforeDestroy)
		 */
		onBeforeDestroy: function () {
			if (this.el) {
				var node;
				while (node = this.el.firstChild) {
					this.el.removeChild(node);
				}
				this.el = null;
			}
		}
	};

	return ToolbarText;

});

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
 * A select field in the toolbar
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Toolbar/Select',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/String'],
	function (UserAgent, Dom, Util, Event, UtilString) {

	/**
	 * Select constructor
	 */
	var Select = function (config) {
		Util.apply(this, config);
	};

	Select.prototype = {

		/**
		 * Render the select item (called by the toolbar)
		 *
		 * @param object container: the container of the select (the toolbar object)
		 * @return void
		 */
		render: function (container) {
			this.el = document.createElement('div');
			Dom.addClass(this.el, 'btn');
			Dom.addClass(this.el, 'form-group');
			this.selectElement = document.createElement('select');
			Dom.addClass(this.selectElement, 'form-control');
			if (this.id) {
				this.selectElement.setAttribute('id', this.id);
			}
			if (typeof this.cls === 'string') {
				Dom.addClass(this.selectElement, this.cls);
			}
			if (typeof this.tooltip === 'string') {
				this.selectElement.setAttribute('title', this.tooltip);
			}
			if (this.width) {
				Dom.setStyle(this.selectElement, { width: this.width + 'px' } );
			} else {
				Dom.setStyle(this.selectElement, { width: '200px' } );
			}
			if (this.maxHeight) {
				Dom.setStyle(this.selectElement, { maxHeight: this.maxHeight + 'px' } );
			}
			if (this.options) {
				for (var i = 0, n = this.options.length; i < n; i++) {
					this.addOption(this.options[i][0], this.options[i][1], this.options[i][1], this.options[i][2]);
				}
			}
			this.selectElement = this.el.appendChild(this.selectElement);
			this.el = container.appendChild(this.el);
			if (this.fieldLabel) {
				var label = document.createElement('label');
				label.innerHTML = this.fieldLabel;
				Dom.addClass(label, 'form-label');
				label.setAttribute('for', this.selectElement.id);
				this.el.insertBefore(label, this.selectElement);
			} else if (typeof this.tooltip === 'string') {
				this.selectElement.setAttribute('aria-label', this.tooltip);
			}
			this.selectedElementWidth = Dom.getSize(this.selectElement).width;
			this.initEventListeners();
		},

		/**
		 * Get the element to which the item is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * Initialize listeners
		 */
		initEventListeners: function () {
			var self = this;
			Event.on(this, 'HTMLAreaEventHotkey', function (event, key, keyEvent) { return self.onHotKey(key, keyEvent); });
			Event.on(this.selectElement, 'change', function (event) { return self.onChange(self, event); });
			// Handlers to change the selected option when the select is collapsed/expanded
			if (!UserAgent.isIE) {
				Event.on(this.selectElement, 'click', function (event) { self.onTrigger(event); });
				Event.on(window, 'mouseup', function (event) { if (event.target !== self.selectElement && !self.collapsed) { self.onTrigger(event); event.stopPropagation();}});
				Event.on(this.selectElement, 'blur', function (event) { if (!self.collapsed) { self.onTrigger(event); event.stopPropagation();}});
				Event.on(this.selectElement, 'keyup', function (event) { self.onEscape(event); });
			}
			// Monitor toolbar updates in order to refresh the state of the select
			Event.on(this.getToolbar(), 'HTMLAreaEventToolbarUpdate', function (event, mode, selectionEmpty, ancestors, endPointsInSameBlock) { Event.stopEvent(event); self.onUpdateToolbar(mode, selectionEmpty, ancestors, endPointsInSameBlock); return false; });
		},

		/**
		 * Get a reference to the editor
		 */
		getEditor: function() {
			return this.getToolbar().getEditor();
		},

		/**
		 * Get a reference to the toolbar
		 */
		getToolbar: function() {
			return this.toolbar;
		},

		/**
		 * Handler invoked when an item is selected in the dropdown list
		 */
		onChange: function (select, event) {
			if (!select.disabled) {
				var editor = this.getEditor();
				// Invoke the plugin onChange handler
				this.plugins[this.action](editor, select);
				if (UserAgent.isOpera) {
					editor.focus();
				}
				this.getToolbar().update();
			}
			return false;
		},

		/**
		 * State of the select dropdwon list
		 */
		collapsed: true,

		/**
		 * Handler for a click on the select
		 */
		onTrigger: function (event) {
			this.collapsed = !this.collapsed;
			this.setSelectedOptionText();
		},

		/**
		 * Handler for an escape while focused on the select
		 */
		onEscape: function (event) {
			if (Event.getKey(event) === Event.ESC && !this.collapsed) {
				this.onTrigger();
			}
		},

		/**
		 * Get the current value
		 *
		 * @return string the value attribute of the currently selected option
		 */
		getValue: function () {
			return this.selectElement.options[this.selectElement.selectedIndex].value;
		},

		/**
		 * Set the current value
		 *
		 * @param string value: the value to be selected
		 * @return void
		 */
		setValue: function (value) {
			var options = this.selectElement.options;
			for (var i = 0, n = options.length; i < n; i++) {
				if (options[i].value == value) {
					this.selectElement.selectedIndex = i;
					this.collapsed = true;
					this.setSelectedOptionText();
					break;
			  	}
			}
		},

		/**
		 * Set the current value based on index
		 *
		 * @param int index: the index of the value to be selected
		 * @return void
		 */
		setValueByIndex: function (index) {
			this.selectElement.selectedIndex = index >= 0 ? index : 0;
			this.collapsed = true;
			this.setSelectedOptionText();
		},

		/**
		 * Find the index of the value
		 *
		 * @param string value: the value to be looked up
		 * @return int the index or -1
		 */
		findValue: function (value) {
			var index = -1;
			var options = this.selectElement.options;
			for (var i = 0, n = options.length; i < n; i++) {
				if (options[i].value == value) {
					index = i;
					break;
			  	}
			}
			return index;
		},

		/**
		 * Get the value of the option specified by the index
		 *
		 * @param int index: the index of the option
		 * @return string the value of the option
		 */
		getOptionValue: function (index) {
			var value = '';
			var option = this.selectElement.options[index];
			if (option) {
				value = option.value;
			}
			return value;
		},

		/**
		 * Set the text of the selected option
		 *
		 * @return void
		 */
		setSelectedOptionText: function () {
			var option = this.selectElement.options[this.selectElement.selectedIndex];
			if (this.collapsed && !UserAgent.isIE) {
				option.innerHTML = option.getAttribute('data-htmlarea-text').ellipsis(this.selectedElementWidth - 20);
			} else {
				option.innerHTML = option.getAttribute('data-htmlarea-text');
			}
		},

		/**
		 * Set the first option of the select
		 *
		 * @param string text: the text of the option
		 * @param string value: the value of the option
		 * @param string title: the title of the option, if different from the value
		 * @return object the option
		 */
		setFirstOption: function (text, value, title) {
			var option = this.selectElement.firstChild;
			if (!option) {
				var option = this.addOption(text, value, title);
			} else {
				option.innerHTML = text;
				option.setAttribute('value', value);
				if (typeof title !== 'undefined') {
					option.setAttribute('title', title);
				} else {
					option.setAttribute('title', value);
				}
			}
			return option;
		},

		/**
		 * Add an option to the select
		 *
		 * @param string text: the text of the option
		 * @param string value: the value of the option
		 * @param string title: the title of the option
		 * @param string style: the style of the option
		 * @return object the option
		 */
		addOption: function (text, value, title, style) {
			var option = document.createElement('option');
			option.innerHTML = text;
			option.setAttribute('data-htmlarea-text', text);
			option.setAttribute('value', value);
			if (typeof title !== 'undefined') {
				option.setAttribute('title', title);
			} else {
				option.setAttribute('title', value);
			}
			if (typeof style === 'string' && style.length > 0) {
				option.style.cssText = style;
			}
			if (this.listWidth) {
				Dom.setStyle(option, { width: this.listWidth + 'px' } );
			}
			this.selectElement.add(option);
			return option;
		},

		/**
		 * Get the current options of the select element
		 *
		 * @return array the options of the select element
		 */
		getOptions: function () {
			return this.selectElement.options;
		},

		/**
		 * Get the current count of options
		 *
		 * @return int the count
		 */
		getCount: function () {
			return this.getOptions().length;
		},

		/**
		 * Remove the option at the specified index
		 *
		 * @param int index: the index of the option to be removed
		 * @return void
		 */
		removeAt: function (index) {
			this.selectElement.remove(index);
		},

		/**
		 * Delete all options of the select element
		 *
		 * @return void
		 */
		removeAll: function () {
			var index, options = this.getOptions();
			while (index = options.length) {
				this.selectElement.remove(0);
			}
		},

		/**
		 * Setting disabled/enabled by boolean.
		 *
		 * @param boolean disabled
		 * @return void
		 */
		setDisabled: function(disabled){
			this.disabled = disabled;
			if (disabled) {
				this.selectElement.setAttribute('disabled', 'true');
			} else {
				this.selectElement.removeAttribute('disabled');
			}
		},

		/**
		 * Handler invoked when a hot key configured for this dropdown list is pressed
		 */
		onHotKey: function (key) {
			if (!this.disabled) {
				this.plugins.onHotKey(this.getEditor(), key);
				if (UserAgent.isOpera) {
					this.getEditor().focus();
				}
				this.getToolbar().update();
			}
			return false;
		},

		/**
		 * Handler invoked when the toolbar is updated
		 */
		onUpdateToolbar: function (mode, selectionEmpty, ancestors, endPointsInSameBlock) {
			this.setDisabled(mode === 'textmode' && !this.textMode);
			if (!this.disabled) {
				this.plugins['onUpdateToolbar'](this, mode, selectionEmpty, ancestors, endPointsInSameBlock);
			}
		},

		/**
		 * Cleanup (called by toolbar onBeforeDestroy)
		 */
		onBeforeDestroy: function () {
			Event.off(this);
			Event.off(this.selectElement);
			if (this.selectElement) {
				this.removeAll();
				this.selectElement = null;
			}
			if (this.el) {
				var node;
				while (node = this.el.firstChild) {
					this.el.removeChild(node);
				}
				this.el = null;
			}
		}
	};

	return Select;

});

/**
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
 * Intercept Ext.ColorPalette.prototype.select
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ColorPalette',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Color'],
	function (Color) {

	Ext.ColorPalette.prototype.select = Ext.ColorPalette.prototype.select.createInterceptor(Color.checkIfColorInPalette);
	/**
	 * Add deSelect method to Ext.ColorPalette
	 */
	Ext.override(Ext.ColorPalette, {
		deSelect: function () {
			if (this.el && this.value){
				this.el.child('a.color-' + this.value).removeClass('x-color-palette-sel');
				this.value = null;
			}
		}
	});
});

/**
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
 * Color menu
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ux/ColorMenu',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ColorPalette'],
	function (ColorPalette) {
		Ext.ux.menu.HTMLAreaColorMenu = Ext.extend(Ext.menu.Menu, {
			enableScrolling: false,
			hideOnClick: true,
			cls: 'x-color-menu',
			colorPaletteValue: '',
			customColorsValue: '',
			plain: true,
			showSeparator: false,
			initComponent: function () {
				var paletteItems = [];
				var width = 'auto';
				if (this.colorsConfiguration) {
					paletteItems.push({
						xtype: 'container',
						layout: 'anchor',
						width: 160,
						style: { float: 'right' },
						items: {
							xtype: 'colorpalette',
							itemId: 'custom-colors',
							cls: 'htmlarea-custom-colors',
							colors: this.colorsConfiguration,
							value: this.value,
							allowReselect: true,
							tpl: new Ext.XTemplate(
								'<tpl for="."><a href="#" class="color-{1}" hidefocus="on"><em><span style="background:#{1}" unselectable="on">&#160;</span></em><span unselectable="on">{0}</span></a></tpl>'
							)
						}
					});
				}
				if (this.colors.length) {
					paletteItems.push({
						xtype: 'container',
						layout: 'anchor',
						items: {
							xtype: 'colorpalette',
							itemId: 'color-palette',
							cls: 'color-palette',
							colors: this.colors,
							value: this.value,
							allowReselect: true
						}
					});
				}
				if (this.colorsConfiguration && this.colors.length) {
					width = 350;
				}
				Ext.apply(this, {
					layout: 'menu',
					width: width,
					items: paletteItems
				});
				Ext.ux.menu.HTMLAreaColorMenu.superclass.initComponent.call(this);
				this.standardPalette = this.find('itemId', 'color-palette')[0];
				this.customPalette = this.find('itemId', 'custom-colors')[0];
				if (this.standardPalette) {
					this.standardPalette.purgeListeners();
					this.relayEvents(this.standardPalette, ['select']);
				}
				if (this.customPalette) {
					this.customPalette.purgeListeners();
					this.relayEvents(this.customPalette, ['select']);
				}
				this.on('select', this.menuHide, this);
				if (this.handler){
					this.on('select', this.handler, this.scope || this);
				}
			},
			menuHide: function() {
				if (this.hideOnClick){
					this.hide(true);
				}
			}
		});
		Ext.reg('htmlareacolormenu', Ext.ux.menu.HTMLAreaColorMenu);
});

/**
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
 * Color palette trigger field
 * Based on http://www.extjs.com/forum/showthread.php?t=89312
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ux/ColorPaletteField',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ux/ColorMenu'],
	function (ColorMenu) {
		Ext.ux.form.ColorPaletteField = Ext.extend(Ext.form.TriggerField, {
			triggerClass: 'x-form-color-trigger',
			defaultColors: [
				'000000', '222222', '444444', '666666', '999999', 'BBBBBB', 'DDDDDD', 'FFFFFF',
				'660000', '663300', '996633', '003300', '003399', '000066', '330066', '660066',
				'990000', '993300', 'CC9900', '006600', '0033FF', '000099', '660099', '990066',
				'CC0000', 'CC3300', 'FFCC00', '009900', '0066FF', '0000CC', '663399', 'CC0099',
				'FF0000', 'FF3300', 'FFFF00', '00CC00', '0099FF', '0000FF', '9900CC', 'FF0099',
				'CC3333', 'FF6600', 'FFFF33', '00FF00', '00CCFF', '3366FF', '9933FF', 'FF00FF',
				'FF6666', 'FF6633', 'FFFF66', '66FF66', '00FFFF', '3399FF', '9966FF', 'FF66FF',
				'FF9999', 'FF9966', 'FFFF99', '99FF99', '99FFFF', '66CCFF', '9999FF', 'FF99FF',
				'FFCCCC', 'FFCC99', 'FFFFCC', 'CCFFCC', 'CCFFFF', '99CCFF', 'CCCCFF', 'FFCCFF'
			],
				// Whether or not the field background, text, or triggerbackgroud are set to the selected color
			colorizeFieldBackgroud: true,
			colorizeFieldText: true,
			colorizeTrigger: false,
			editable: true,
			initComponent: function () {
				Ext.ux.form.ColorPaletteField.superclass.initComponent.call(this);
				if (!this.colors) {
					this.colors = this.defaultColors;
				}
				this.addEvents(
					'select'
				);
			},
				// private
			validateBlur: function () {
				return !this.menu || !this.menu.isVisible();
			},
			setValue: function (color) {
				if (color) {
					if (this.colorizeFieldBackgroud) {
						this.el.applyStyles('background: #' + color  + ';');
					}
					if (this.colorizeFieldText) {
						this.el.applyStyles('color: #' + this.rgbToHex(this.invert(this.hexToRgb(color)))  + ';');
					}
					if (this.colorizeTrigger) {
						this.trigger.applyStyles('background-color: #' + color  + ';');
					}
				}
				return Ext.ux.form.ColorPaletteField.superclass.setValue.call(this, color);
			},
				// private
			onDestroy: function () {
				Ext.destroy(this.menu);
				Ext.ux.form.ColorPaletteField.superclass.onDestroy.call(this);
			},
				// private
			onTriggerClick: function () {
				if (this.disabled) {
					return;
				}
				if (this.menu == null) {
					this.menu = new Ext.ux.menu.HTMLAreaColorMenu({
						cls: 'htmlarea-color-menu',
						hideOnClick: false,
						colors: this.colors,
						colorsConfiguration: this.colorsConfiguration,
						value: this.getValue()
					});
				}
				this.onFocus();
				this.menu.show(this.el, "tl-bl?");
				this.menuEvents('on');
			},
				//private
			menuEvents: function (method) {
				this.menu[method]('select', this.onSelect, this);
				this.menu[method]('hide', this.onMenuHide, this);
				this.menu[method]('show', this.onFocus, this);
			},
			onSelect: function (m, d) {
				this.setValue(d);
				this.fireEvent('select', this, d);
				this.menu.hide();
			},
			onMenuHide: function () {
				this.focus(false, 60);
				this.menuEvents('un');
			},
			invert: function ( r, g, b ) {
				if( r instanceof Array ) { return this.invert.call( this, r[0], r[1], r[2] ); }
				return [255-r,255-g,255-b];
			},
			hexToRgb: function ( hex ) {
				return [ this.hexToDec( hex.substr(0, 2) ), this.hexToDec( hex.substr(2, 2) ), this.hexToDec( hex.substr(4, 2) ) ];
			},
			hexToDec: function( hex ) {
				var s = hex.split('');
				return ( ( this.getHCharPos( s[0] ) * 16 ) + this.getHCharPos( s[1] ) );
			},
			getHCharPos: function( c ) {
				var HCHARS = '0123456789ABCDEF';
				return HCHARS.indexOf( c.toUpperCase() );
			},
			rgbToHex: function( r, g, b ) {
				if( r instanceof Array ) { return this.rgbToHex.call( this, r[0], r[1], r[2] ); }
				return this.decToHex( r ) + this.decToHex( g ) + this.decToHex( b );
			},
			decToHex: function( n ) {
				var HCHARS = '0123456789ABCDEF';
				n = parseInt(n, 10);
				n = ( !isNaN( n )) ? n : 0;
				n = (n > 255 || n < 0) ? 0 : n;
				return HCHARS.charAt( ( n - n % 16 ) / 16 ) + HCHARS.charAt( n % 16 );
			}
		});
		Ext.reg('colorpalettefield', Ext.ux.form.ColorPaletteField);
});

/*
 * Extending the TYPO3 Lorem Ipsum extension
 */
var lorem_ipsum = function (element, text) {
	if (/^textarea$/i.test(element.nodeName) && element.id && element.id.substr(0,7) === 'RTEarea') {
		var editor = RTEarea[element.id.substr(7, element.id.length)]['editor'];
		editor.getSelection().insertHtml(text);
		editor.updateToolbar();
	}
}

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
 * HTMLArea.plugin class
 *
 * Every plugin should be a subclass of this class
 *
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (UserAgent, Util, Event) {

	/**
	 * Constructor method
	 *
	 * @param object editor: a reference to the parent object, instance of RTE
	 * @param string pluginName: the name of the plugin
	 *
	 * @return boolean true if the plugin was configured
	 */
	var Plugin = function (editor, pluginName) {
		this.editor = editor;
		this.editorNumber = editor.editorId;
		this.editorId = editor.editorId;
		this.editorConfiguration = editor.config;
		this.name = pluginName;
		try {
			this.I18N = HTMLArea.I18N[this.name];
		} catch(e) {
			this.I18N = new Object();
		}
		this.configurePlugin(editor);
	};

	Plugin.prototype = {

		/**
		 * Configures the plugin
		 * This function is invoked by the class constructor.
		 * This function should be redefined by the plugin subclass. Normal steps would be:
		 *	- registering plugin ingormation with method registerPluginInformation;
		 *	- registering any buttons with method registerButton;
		 *	- registering any drop-down lists with method registerDropDown.
		 *
		 * @param	object		editor: instance of RTE
		 *
		 * @return	boolean		true if the plugin was configured
		 */
		configurePlugin: function (editor) {
			return false;
		},

		/**
		 * Registers the plugin "About" information
		 *
		 * @param	object		pluginInformation:
		 *					version		: the version,
		 *					developer	: the name of the developer,
		 *					developerUrl	: the url of the developer,
		 *					copyrightOwner	: the name of the copyright owner,
		 *					sponsor		: the name of the sponsor,
		 *					sponsorUrl	: the url of the sponsor,
		 *					license		: the type of license (should be "GPL")
		 *
		 * @return	boolean		true if the information was registered
		 */
		registerPluginInformation: function (pluginInformation) {
			if (typeof pluginInformation !== 'object' || pluginInformation === null) {
				this.appendToLog('registerPluginInformation', 'Plugin information was not provided', 'warn');
				return false;
			} else {
				this.pluginInformation = pluginInformation;
				this.pluginInformation.name = this.name;
				return true;
			}
		},

		/**
		 * Returns the plugin information
		 *
		 * @return	object		the plugin information object
		 */
		getPluginInformation: function () {
			return this.pluginInformation;
		},

		/**
		 * Returns a plugin object
		 *
		 * @param	string		pluinName: the name of some plugin
		 * @return	object		the plugin object or null
		 */
		getPluginInstance: function (pluginName) {
			return this.editor.getPlugin(pluginName);
		},

		/**
		 * Returns a current editor mode
		 *
		 * @return	string		editor mode
		 */
		getEditorMode: function () {
			return this.editor.getMode();
		},

		/**
		 * Returns true if the button is enabled in the toolbar configuration
		 *
		 * @param	string		buttonId: identification of the button
		 *
		 * @return	boolean		true if the button is enabled in the toolbar configuration
		 */
		isButtonInToolbar: function (buttonId) {
			var index = -1;
			var i, j, n, m;
			for (i = 0, n = this.editorConfiguration.toolbar.length; i < n; i++) {
				var row = this.editorConfiguration.toolbar[i];
				for (j = 0, m = row.length; j < m; j++) {
					var group = row[j];
					index = group.indexOf(buttonId);
					if (index !== -1) {
						break;
					}
				}
				if (index !== -1) {
					break;
				}
			}
			return index !== -1;
		},

		/**
		 * Returns the button object from the toolbar
		 *
		 * @param	string		buttonId: identification of the button
		 *
		 * @return	object		the toolbar button object
		 */
		getButton: function (buttonId) {
			return this.editor.toolbar.getButton(buttonId);
		},

		/**
		 * Registers a button for inclusion in the toolbar
		 *
		 * @param	object		buttonConfiguration: the configuration object of the button:
		 *					id		: unique id for the button
		 *					tooltip		: tooltip for the button
		 *					textMode	: enable in text mode
		 *					action		: name of the function invoked when the button is pressed
		 *					context		: will be disabled if not inside one of listed elements
		 *					hide		: hide in menu and show only in context menu (deprecated, use hidden)
		 *					hidden		: synonym of hide
		 *					selection	: will be disabled if there is no selection
		 *					hotkey		: hotkey character
		 *					dialog		: if true, the button opens a dialogue
		 *					dimensions	: the opening dimensions object of the dialogue window
		 *
		 * @return	boolean		true if the button was successfully registered
		 */
		registerButton: function (buttonConfiguration) {
			if (this.isButtonInToolbar(buttonConfiguration.id)) {
				if (typeof buttonConfiguration.action === 'string' && buttonConfiguration.action.length > 0 && typeof this[buttonConfiguration.action] === 'function') {
					buttonConfiguration.plugins = this;
					if (buttonConfiguration.dialog) {
						if (!buttonConfiguration.dimensions) {
							buttonConfiguration.dimensions = { width: 250, height: 250};
						}
						buttonConfiguration.dimensions.top = buttonConfiguration.dimensions.top ?  buttonConfiguration.dimensions.top : this.editorConfiguration.dialogueWindows.defaultPositionFromTop;
						buttonConfiguration.dimensions.left = buttonConfiguration.dimensions.left ?  buttonConfiguration.dimensions.left : this.editorConfiguration.dialogueWindows.defaultPositionFromLeft;
					}
					buttonConfiguration.hidden = buttonConfiguration.hide;
					// Apply additional ExtJS config properties set in Page TSConfig
					// May not always work for values that must be integers
					Util.applyIf(buttonConfiguration, this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonConfiguration.id]]);
					if (this.editorConfiguration.registerButton(buttonConfiguration)) {
						var hotKey = buttonConfiguration.hotKey ? buttonConfiguration.hotKey :
							((this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonConfiguration.id]] && this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonConfiguration.id]].hotKey) ? this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonConfiguration.id]].hotKey : null);
						if (!hotKey && buttonConfiguration.hotKey == "0") {
							hotKey = "0";
						}
						if (!hotKey && this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonConfiguration.id]] && this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonConfiguration.id]].hotKey == "0") {
							hotKey = "0";
						}
						if (hotKey || hotKey == "0") {
							var hotKeyConfiguration = {
								id	: hotKey,
								cmd	: buttonConfiguration.id
							};
							return this.registerHotKey(hotKeyConfiguration);
						}
						return true;
					}
				} else {
					this.appendToLog('registerButton', 'Function ' + buttonConfiguration.action + ' was not defined when registering button ' + buttonConfiguration.id, 'error');
				}
			}
			return false;
		},

		/**
		 * Registers a drop-down list for inclusion in the toolbar
		 *
		 * @param	object		dropDownConfiguration: the configuration object of the drop-down:
		 *					id		: unique id for the drop-down
		 *					tooltip		: tooltip for the drop-down
		 *					action		: name of function to invoke when an option is selected
		 *					textMode	: enable in text mode
		 *
		 * @return	boolean		true if the drop-down list was successfully registered
		 */
		registerDropDown: function (dropDownConfiguration) {
			if (this.isButtonInToolbar(dropDownConfiguration.id)) {
				if (typeof dropDownConfiguration.action === 'string' && dropDownConfiguration.action.length > 0 && typeof this[dropDownConfiguration.action] === 'function') {
					dropDownConfiguration.plugins = this;
					dropDownConfiguration.hidden = dropDownConfiguration.hide;
					dropDownConfiguration.xtype = 'htmlareaselect';
					// Apply additional config properties set in Page TSConfig
					// May not always work for values that must be integers
					Util.applyIf(dropDownConfiguration, this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[dropDownConfiguration.id]]);
					return this.editorConfiguration.registerButton(dropDownConfiguration);
				} else {
					this.appendToLog('registerDropDown', 'Function ' + dropDownConfiguration.action + ' was not defined when registering drop-down ' + dropDownConfiguration.id, 'error');
				}
			}
			return false;
		},

		/**
		 * Registers a text element for inclusion in the toolbar
		 *
		 * @param	object		textConfiguration: the configuration object of the text element:
		 *					id		: unique id for the text item
		 *					text		: the text litteral
		 *					tooltip		: tooltip for the text item
		 *					cls		: a css class to be assigned to the text element
		 *
		 * @return	boolean		true if the drop-down list was successfully registered
		 */
		registerText: function (textConfiguration) {
			if (this.isButtonInToolbar(textConfiguration.id)) {
				textConfiguration.plugins = this;
				textConfiguration.xtype = 'htmlareatoolbartext';
				return this.editorConfiguration.registerButton(textConfiguration);
			}
			return false;
		},

		/**
		 * Returns the drop-down configuration
		 *
		 * @param	string		dropDownId: the unique id of the drop-down
		 *
		 * @return	object		the drop-down configuration object
		 */
		getDropDownConfiguration: function(dropDownId) {
			return this.editorConfiguration.buttonsConfig[dropDownId];
		},

		/**
		 * Registors a hotkey
		 *
		 * @param	object		hotKeyConfiguration: the configuration object of the hotkey:
		 *					id		: the key
		 *					cmd		: name of the button corresponding to the hot key
		 *					element		: value of the record to be selected in the dropDown item
		 *
		 * @return	boolean		true if the hotkey was successfully registered
		 */
		registerHotKey: function (hotKeyConfiguration) {
			return this.editorConfiguration.registerHotKey(hotKeyConfiguration);
		},

		/**
		 * Returns the buttonId corresponding to the hotkey, if any
		 *
		 * @param	string		key: the hotkey
		 *
		 * @return	string		the buttonId or ""
		 */
		translateHotKey: function(key) {
			if (typeof this.editorConfiguration.hotKeyList[key] !== 'undefined') {
				var buttonId = this.editorConfiguration.hotKeyList[key].cmd;
				if (typeof buttonId !== 'undefined') {
					return buttonId;
				} else {
					return "";
				}
			}
			return "";
		},

		/**
		 * Returns the hotkey configuration
		 *
		 * @param	string		key: the hotkey
		 *
		 * @return	object		the hotkey configuration object
		 */
		getHotKeyConfiguration: function(key) {
			if (typeof this.editorConfiguration.hotKeyList[key] !== 'undefined') {
				return this.editorConfiguration.hotKeyList[key];
			} else {
				return null;
			}
		},

		/**
		 * Initializes the plugin
		 * Is invoked when the toolbar component is created (subclass of Ext.ux.HTMLAreaButton or Ext.ux.form.HTMLAreaCombo)
		 *
		 * @param	object		button: the component
		 *
		 * @return	void
		 */
		init: Util.emptyFunction,

		/**
		 * The toolbar refresh handler of the plugin
		 * This function may be defined by the plugin subclass.
		 * If defined, the function will be invoked whenever the toolbar state is refreshed.
		 *
		 * @return	boolean
		 */
		onUpdateToolbar: Util.emptyFunction,

		/**
		 * The onMode event handler
		 * This function may be redefined by the plugin subclass.
		 * The function is invoked whenever the editor changes mode.
		 *
		 * @param	string		mode: "wysiwyg" or "textmode"
		 *
		 * @return	boolean
		 */
		onMode: function(mode) {
			if (mode === "textmode" && this.dialog && !(this.dialog.buttonId && this.editorConfiguration.buttons[this.dialog.buttonId] && this.editorConfiguration.buttons[this.dialog.buttonId].textMode)) {
				this.dialog.close();
			}
		},

		/**
		 * The onGenerate event handler
		 * This function may be defined by the plugin subclass.
		 * The function is invoked when the editor is initialized
		 *
		 * @return	boolean
		 */
		onGenerate: Util.emptyFunction,

		/**
		 * Localize a string
		 *
		 * @param	string		label: the name of the label to localize
		 *
		 * @return	string		the localization of the label
		 */
		localize: function (label, plural) {
			var i = plural || 0;
			var localized = this.I18N[label];
			if (typeof localized === 'object' && localized !== null && typeof localized[i] !== 'undefined') {
				localized = localized[i]['target'];
			} else {
				localized = HTMLArea.localize(label, plural);
			}
			return localized;
		},

		/**
		 * Get localized label wrapped with contextual help markup when available
		 *
		 * @param	string		fieldName: the name of the field in the CSH file
		 * @param	string		label: the name of the label to localize
		 * @param	string		pluginName: overrides this.name
		 *
		 * @return	string		localized label with CSH markup
		 */
		getHelpTip: function (fieldName, label, pluginName) {
			if (typeof TYPO3.ContextHelp !== 'undefined' && typeof fieldName === 'string') {
				var pluginName = typeof pluginName !== 'undefined' ? pluginName : this.name;
				if (fieldName.length > 0) {
					fieldName = fieldName.replace(/-|\s/gi, '_');
				}
				return '<span class="t3-help-link" href="#" data-table="xEXT_rtehtmlarea_' + pluginName + '" data-field="' + fieldName + '"><abbr class="t3-help-teaser">' + (this.localize(label) || label) + '</abbr></span>';
			} else {
				return this.localize(label) || label;
			}
		},

		/**
		 * Load a Javascript file asynchronously
		 *
		 * @param	string		url: url of the file to load
		 * @param	function	callBack: the callBack function
		 *
		 * @return	boolean		true on success of the request submission
		 */
		getJavascriptFile: function (url, callback) {
			return this.editor.ajax.getJavascriptFile(url, callback, this);
		},

		/**
		 * Post data to the server
		 *
		 * @param	string		url: url to post data to
		 * @param	object		data: data to be posted
		 * @param	function	callback: function that will handle the response returned by the server
		 *
		 * @return	boolean		true on success
		 */
		postData: function (url, data, callback) {
			return this.editor.ajax.postData(url, data, callback, this);
		},

		/**
		 * Open a window with container iframe
		 *
		 * @param	string		buttonId: the id of the button
		 * @param	string		title: the window title (will be localized here)
		 * @param	object		dimensions: the opening dimensions od the window
		 * @param	string		url: the url to load ino the iframe
		 *
		 * @ return	void
		 */
		openContainerWindow: function (buttonId, title, dimensions, url) {
			this.dialog = new Ext.Window({
				id: this.editor.editorId + buttonId,
				title: this.localize(title) || title,
				cls: 'htmlarea-window',
				width: dimensions.width,
				border: false,
				iconCls: this.getButton(buttonId).iconCls,
				listeners: {
					afterrender: {
						fn: this.onContainerResize
					},
					resize: {
						fn: this.onContainerResize
					},
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: {
						// The content iframe
					xtype: 'box',
					height: dimensions.height-20,
					itemId: 'content-iframe',
					autoEl: {
						tag: 'iframe',
						cls: 'content-iframe',
						src: url
					}
				},
				maximizable: true
			});
			this.show();
		},

		/**
		 * Handler invoked when the container window is rendered or resized in order to resize the content iframe to maximum size
		 */
		onContainerResize: function (panel) {
			var iframe = panel.getComponent('content-iframe');
			if (iframe.rendered) {
				iframe.getEl().setSize(panel.getInnerWidth(), panel.getInnerHeight());
			}
		},

		/**
		 * Get the opening diment=sions of the window
		 *
		 * @param	object		dimensions: default opening width and height set by the plugin
		 * @param	string		buttonId: the id of the button that is triggering the opening of the window
		 *
		 * @return	object		opening width and height of the window
		 */
		getWindowDimensions: function (dimensions, buttonId) {
			// Apply default dimensions
			this.dialogueWindowDimensions = {
				width: 250,
				height: 250
			};
			// Apply default values as per PageTSConfig
			Util.apply(this.dialogueWindowDimensions, this.editorConfiguration.dialogueWindows);
			// Apply dimensions as per button registration
			if (typeof this.editorConfiguration.buttonsConfig[buttonId] === 'object' && this.editorConfiguration.buttonsConfig[buttonId] !== null) {
				Util.apply(this.dialogueWindowDimensions, this.editorConfiguration.buttonsConfig[buttonId].dimensions);
			}
			// Apply dimensions as per call
			Util.apply(this.dialogueWindowDimensions, dimensions);
			// Overrride dimensions as per PageTSConfig
			var buttonConfiguration = this.editorConfiguration.buttons[this.editorConfiguration.convertButtonId[buttonId]];
			if (buttonConfiguration) {
				Util.apply(this.dialogueWindowDimensions, buttonConfiguration.dialogueWindow);
			}
			return this.dialogueWindowDimensions;
		},

		/**
		 * Make url from module path
		 *
		 * @param	string		modulePath: module path
		 * @param	string		parameters: additional parameters
		 *
		 * @return	string		the url
		 */
		makeUrlFromModulePath: function (modulePath, parameters) {
			return modulePath + (modulePath.indexOf("?") === -1 ? "?" : "&") + this.editorConfiguration.RTEtsConfigParams + '&editorNo=' + this.editor.editorId + '&sys_language_content=' + this.editorConfiguration.sys_language_content + '&contentTypo3Language=' + this.editorConfiguration.typo3ContentLanguage + (parameters?parameters:'');
		},

		/**
		 * Append an entry at the end of the troubleshooting log
		 *
		 * @param	string		functionName: the name of the plugin function writing to the log
		 * @param	string		text: the text of the message
		 * @param	string		type: the typeof of message: 'log', 'info', 'warn' or 'error'
		 *
		 * @return	void
		 */
		appendToLog: function (functionName, text, type) {
			this.editor.appendToLog(this.name, functionName, text, type);
		},

		/**
		 * Add a config element to config array if not empty
		 *
		 * @param	object		configElement: the config element
		 * @param	array		configArray: the config array
		 *
		 * @return	void
		 */
		addConfigElement: function (configElement, configArray) {
			if (typeof configElement === 'object'  && configElement !== null) {
				configArray.push(configElement);
			}
		},

		/**
		 * Handler for Ext.TabPanel afterrender and tabchange events
		 * Set height of the tabpanel (miscalculated when the brower zoom is in use)
		 * Working around ExtJS 3.1 bug
		 */
		setTabPanelHeight: function (tabpanel, tab) {
			var components = tab.findByType('fieldset');
			var height = 0;
			for (var i = components.length; --i >= 0;) {
				height += components[i].getEl().dom.offsetHeight;
			}
			tabpanel.setHeight(tabpanel.getFrameHeight() + height + tabpanel.findParentByType('window').footer.getHeight());
		},

		/**
		 * Handler for Ext.TabPanel tabchange event
		 * Force window ghost height synchronization
		 * Working around ExtJS 3.1 bug
		 */
		syncHeight: function (tabPanel, tab) {
			var position = this.dialog.getPosition();
			if (position[0] > 0) {
				this.dialog.setPosition(position);
			}
		},

		/**
		 * Show the dialogue window
		 */
		show: function () {
			// Close the window if the editor changes mode
			var self = this;
			Event.one(this.editor, 'HTMLAreaEventModeChange', function (event) { self.close(); });
			this.saveSelection();
			if (typeof this.dialogueWindowDimensions !== 'undefined') {
				this.dialog.setPosition(this.dialogueWindowDimensions.positionFromLeft, this.dialogueWindowDimensions.positionFromTop);
			}
			this.dialog.show();
			this.restoreSelection();
		},

		/**
		 * Remove listeners
		 * This function may be defined by the plugin subclass.
		 * The function is invoked when a plugin dialog is closed
		 * @return void
		 */
		removeListeners: Util.emptyFunction,

		/**
		 * Close the dialogue window (after saving the selection, if IE)
		 */
		close: function () {
			this.removeListeners();
			this.saveSelection();
			this.dialog.close();
		},

		/**
		 * Dialogue window onClose handler
		 */
		onClose: function () {
			this.removeListeners();
			this.editor.focus();
			this.restoreSelection();
			this.editor.updateToolbar();
		},

		/**
		 * Handler for window cancel
		 */
		onCancel: function () {
			this.removeListeners();
			this.dialog.close();
			this.editor.focus();
		},

		/**
		 * Save selection
		 * Should be called after processing button other than Cancel
		 */
		saveSelection: function () {
			// If IE, save the current selection
			if (UserAgent.isIE) {
				this.savedRange = this.editor.getSelection().createRange();
			}
		},

		/**
		 * Restore selection
		 * Should be called before processing dialogue button or result
		 */
		restoreSelection: function () {
			// If IE, restore the selection saved when the window was shown
			if (UserAgent.isIE && this.savedRange) {
					// Restoring the selection will not work if the inner html was replaced by the plugin
				try {
					this.editor.getSelection().selectRange(this.savedRange);
				} catch (e) {}
			}
		},

		/**
		 * Build the configuration object of a button
		 *
		 * @param	string		button: the text of the button
		 * @param	function	handler: button handler
		 *
		 * @return	object		the button configuration object
		 */
		buildButtonConfig: function (button, handler) {
			return {
				xtype: 'button',
				text: this.localize(button),
				listeners: {
					click: {
						fn: handler,
						scope: this
					}
				}
			};
		}
	}

	return Plugin;

});

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
 * EditorMode Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/EditorMode',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, Util) {

	var EditorMode = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(EditorMode, Plugin);
	Util.apply(EditorMode.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.1',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the buttons
			 */
			var buttonList = this.buttonList, buttonId;
			for (var i = 0, n = buttonList.length; i < n; ++i) {
				var button = buttonList[i];
				buttonId = button[0];
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize(buttonId + '-Tooltip'),
					iconCls		: 'htmlarea-action-editor-toggle-mode',
					action		: 'onButtonPress',
					context		: button[1],
					textMode	: (buttonId == 'TextMode')
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		},

		/**
		 * The list of buttons added by this plugin
		 */
		buttonList: [
			['TextMode', null]
		],

		/**
		 * This function gets called when a button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id, target) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			this.editor.setMode((this.editor.getMode() == buttonId.toLowerCase()) ? 'wysiwyg' : buttonId.toLowerCase());
			return false;
		},

		/**
		 * This function gets called when the toolbar is updated
		 *
		 * @return	void
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			button.setInactive(mode !== button.itemId.toLowerCase());
		}
	});

	return EditorMode;

});

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
 * Default Inline Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/DefaultInline',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, Util) {

	var DefaultInline = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(DefaultInline, Plugin);
	Util.apply(DefaultInline.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '1.3',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the buttons
			 */
			var button, buttonId;
			for (var i = 0, n = this.buttonList.length; i < n; i++) {
				button = this.buttonList[i];
				buttonId = button[0];
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize(buttonId + '-Tooltip'),
					iconCls		: 'htmlarea-action-' + button[2],
					textMode	: false,
					action		: 'onButtonPress',
					context		: button[1],
					hotKey		: (this.editorConfiguration.buttons[buttonId.toLowerCase()]?this.editorConfiguration.buttons[buttonId.toLowerCase()].hotKey:null)
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		},
		/*
		 * The list of buttons added by this plugin
		 */
		buttonList: [
			['Bold', null, 'bold'],
			['Italic', null, 'italic'],
			['StrikeThrough', null, 'strike-through'],
			['Subscript', null, 'subscript'],
			['Superscript', null, 'superscript'],
			['Underline', null, 'underline']
		],
		/*
		 * This function gets called when some inline element button was pressed.
		 */
		onButtonPress: function (editor, id) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			try {
				editor.getSelection().execCommand(buttonId, false, null);
			}
			catch(e) {
				this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
			}
			return false;
		},

		/**
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				var commandState = false;
				try {
					commandState = this.editor.document.queryCommandState(button.itemId);
				} catch(e) {
					commandState = false;
				}
				button.setInactive(!commandState);
			}
		}
	});

	return DefaultInline;

});

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
 * BlockElements Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/BlockElements',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Dom, Event, Util) {

	var BlockElements = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(BlockElements, Plugin);
	Util.apply(BlockElements.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Setting up some properties from PageTSConfig
			 */
			this.buttonsConfiguration = this.editorConfiguration.buttons;
			if (this.buttonsConfiguration.blockstyle) {
				this.tags = this.editorConfiguration.buttons.blockstyle.tags;
			}
			this.useClass = {
				Indent		: 'indent',
				JustifyLeft	: 'align-left',
				JustifyCenter	: 'align-center',
				JustifyRight	: 'align-right',
				JustifyFull	: 'align-justify'
			};
			this.useAlignAttribute = false;
			for (var buttonId in this.useClass) {
				this.useClass[buttonId] = this.buttonsConfiguration[this.buttonList[buttonId][2]] && this.buttonsConfiguration[this.buttonList[buttonId][2]].useClass ? this.buttonsConfiguration[this.buttonList[buttonId][2]].useClass : this.useClass[buttonId];
				if (buttonId === 'Indent') {
					this.useBlockquote = this.buttonsConfiguration.indent && this.buttonsConfiguration.indent.useBlockquote ? this.buttonsConfiguration.indent.useBlockquote : false;
				} else {
					if (this.buttonsConfiguration[this.buttonList[buttonId][2]] && this.buttonsConfiguration[this.buttonList[buttonId][2]].useAlignAttribute) {
						this.useAlignAttribute = true;
					}
				}
			}
			this.allowedAttributes = new Array('id', 'title', 'lang', 'xml:lang', 'dir', 'class', 'itemscope', 'itemtype', 'itemprop');
			this.indentedList = null;
				// Standard block formating items
			var standardElements = new Array('address', 'article', 'aside', 'blockquote', 'div', 'footer', 'header', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'nav', 'p', 'pre', 'section');
			this.standardBlockElements = new RegExp( '^(' + standardElements.join('|') + ')$', 'i');
				// Process block formating customization configuration
			this.formatBlockItems = {};
			if (this.buttonsConfiguration
				&& this.buttonsConfiguration.formatblock
				&& this.buttonsConfiguration.formatblock.items) {
					this.formatBlockItems = this.buttonsConfiguration.formatblock.items;
			}
				// Build lists of mutually exclusive class names
			for (var tagName in this.formatBlockItems) {
				if (this.formatBlockItems[tagName].tagName && this.formatBlockItems[tagName].addClass) {
					if (!this.formatBlockItems[this.formatBlockItems[tagName].tagName]) {
						this.formatBlockItems[this.formatBlockItems[tagName].tagName] = {};
					}
					if (!this.formatBlockItems[this.formatBlockItems[tagName].tagName].classList) {
						this.formatBlockItems[this.formatBlockItems[tagName].tagName].classList = new Array();
					}
					this.formatBlockItems[this.formatBlockItems[tagName].tagName].classList.push(this.formatBlockItems[tagName].addClass);
				}
			}
			for (var tagName in this.formatBlockItems) {
				if (this.formatBlockItems[tagName].classList) {
					this.formatBlockItems[tagName].classList = new RegExp( '^(' + this.formatBlockItems[tagName].classList.join('|') + ')$');
				}
			}

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '3.0',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: this.localize('Technische Universitat Ilmenau'),
				sponsorUrl	: 'http://www.tu-ilmenau.de/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the dropdown list
			 */
			var buttonId = 'FormatBlock';
			var dropDownConfiguration = {
				id: buttonId,
				tooltip: this.localize(buttonId + '-Tooltip'),
				options: this.buttonsConfiguration.formatblock && this.buttonsConfiguration.formatblock.options? this.buttonsConfiguration.formatblock.options : [],
				action: 'onChange'
			};
			if (this.buttonsConfiguration.formatblock) {
				if (this.buttonsConfiguration.formatblock.width) {
					dropDownConfiguration.width = parseInt(this.buttonsConfiguration.formatblock.width, 10);
				}
				if (this.buttonsConfiguration.formatblock.listWidth) {
					dropDownConfiguration.listWidth = parseInt(this.buttonsConfiguration.formatblock.listWidth, 10);
				}
				if (this.buttonsConfiguration.formatblock.maxHeight) {
					dropDownConfiguration.maxHeight = parseInt(this.buttonsConfiguration.formatblock.maxHeight, 10);
				}
			}
			this.registerDropDown(dropDownConfiguration);

			/**
			 * Establishing the list of allowed block elements
			 */
			var blockElements = new Array(), option;
			for (var i = 0, n = dropDownConfiguration.options.length; i < n; i++) {
				option = dropDownConfiguration.options[i];
				if (option[1] != 'none') {
					blockElements.push(option[1]);
				}
			}
			if (blockElements.length) {
				this.allowedBlockElements = new RegExp( "^(" + blockElements.join("|") + ")$", "i");
			} else {
				this.allowedBlockElements = this.standardBlockElements;
			}

			/**
			 * Registering hot keys for the dropdown list items
			 */
			var blockElement, configuredHotKey;
			for (var i = 0, n = blockElements.length; i < n; i++) {
				blockElement = blockElements[i];
				configuredHotKey = this.defaultHotKeys[blockElement];
				if (this.buttonsConfiguration.formatblock
						&& this.buttonsConfiguration.formatblock.items
						&& this.buttonsConfiguration.formatblock.items[blockElement]
						&& this.buttonsConfiguration.formatblock.items[blockElement].hotKey) {
					configuredHotKey = this.buttonsConfiguration.formatblock.items[blockElement].hotKey;
				}
				if (configuredHotKey) {
					var hotKeyConfiguration = {
						id		: configuredHotKey,
						cmd		: buttonId,
						element		: blockElement
					};
					this.registerHotKey(hotKeyConfiguration);
				}
			}

			/**
			 * Registering the buttons
			 */
			for (var buttonId in this.buttonList) {
				if (this.buttonList.hasOwnProperty(buttonId)) {
					var button = this.buttonList[buttonId];
					var buttonConfiguration = {
						id		: buttonId,
						tooltip		: this.localize(buttonId + '-Tooltip'),
						iconCls		: 'htmlarea-action-' + button[3],
						contextMenuTitle: this.localize(buttonId + '-contextMenuTitle'),
						helpText	: this.localize(buttonId + '-helpText'),
						action		: 'onButtonPress',
						hotKey		: ((this.buttonsConfiguration[button[2]] && this.buttonsConfiguration[button[2]].hotKey) ? this.buttonsConfiguration[button[2]].hotKey : (button[1] ? button[1] : null))
					};
					this.registerButton(buttonConfiguration);
				}
			}
			return true;
		},

		/**
		 * The list of buttons added by this plugin
		 */
		buttonList: {
			Indent			: [null, 'TAB', 'indent', 'indent'],
			Outdent			: [null, 'SHIFT-TAB', 'outdent', 'outdent'],
			Blockquote		: [null, null, 'blockquote', 'blockquote'],
			InsertParagraphBefore	: [null, null, 'insertparagraphbefore', 'paragraph-insert-before'],
			InsertParagraphAfter	: [null, null, 'insertparagraphafter', 'paragraph-insert-after'],
			JustifyLeft		: [null, 'l', 'left', 'justify-left'],
			JustifyCenter		: [null, 'e', 'center', 'justify-center'],
			JustifyRight		: [null, 'r', 'right', 'justify-right'],
			JustifyFull		: [null, 'j', 'justifyfull', 'justify-full'],
			InsertOrderedList	: [null, null, 'orderedlist', 'ordered-list'],
			InsertUnorderedList	: [null, null, 'unorderedlist', 'unordered-list'],
			InsertHorizontalRule	: [null, null, 'inserthorizontalrule', 'horizontal-rule-insert']
		},
		/*
		 * The list of hotkeys associated with block elements and registered by default by this plugin
		 */
		defaultHotKeys: {
				'p'	: 'n',
				'h1'	: '1',
				'h2'	: '2',
				'h3'	: '3',
				'h4'	: '4',
				'h5'	: '5',
				'h6'	: '6'
		},
		/*
		 * The function returns true if the type of block element is allowed in the current configuration
		 */
		isAllowedBlockElement: function (blockName) {
			return this.allowedBlockElements.test(blockName);
		},

		/**
		 * This function adds an attribute to the array of attributes allowed on block elements
		 *
		 * @param string attribute: the name of the attribute to be added to the array
		 * @return void
		 */
		addAllowedAttribute: function (attribute) {
			this.allowedAttributes.push(attribute);
		},

		/**
		 * This function gets called when some block element was selected in the drop-down list
		 */
		onChange: function (editor, select) {
			var blockElement = select.getValue();
			this.applyBlockElement(select.itemId, blockElement);
		},

		/**
		 * This function applies to the selection the markup chosen in the drop-down list or corresponding to the button pressed
		 */
		applyBlockElement: function (buttonId, blockElement) {
			var tagName = blockElement;
			var className = null;
			if (this.formatBlockItems[tagName]) {
				if (this.formatBlockItems[tagName].addClass) {
					className = this.formatBlockItems[tagName].addClass;
				}
				if (this.formatBlockItems[tagName].tagName) {
					tagName = this.formatBlockItems[tagName].tagName;
				}
			}
			if (this.standardBlockElements.test(tagName) || tagName == "none") {
				switch (tagName) {
					case 'blockquote':
						this.onButtonPress(this.editor, 'Blockquote', null, className);
						break;
					case 'address':
					case 'article':
					case 'aside':
					case 'div':
					case 'footer':
					case 'header':
					case 'nav':
					case 'section':
					case 'none':
						this.onButtonPress(this.editor, tagName, null, className);
						break;
					default	:
						var element = tagName;
						if (UserAgent.isIE) {
							element = '<' + element + '>';
						}
						this.editor.focus();
						if (UserAgent.isWebKit) {
							if (!this.editor.document.body.hasChildNodes()) {
								this.editor.document.body.appendChild((this.editor.document.createElement('br')));
							}
								// WebKit sometimes leaves empty block at the end of the selection
							this.editor.document.body.normalize();
						}
						try {
							this.editor.getSelection().execCommand(buttonId, false, element);
						} catch(e) {
							this.appendToLog('applyBlockElement', e + '\n\nby execCommand(' + buttonId + ');', 'error');
						}
						this.addClassOnBlockElements(tagName, className);
				}
			}
		},
		/*
		 * This function gets called when a button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 * @param	object		target: the target element of the contextmenu event, when invoked from the context menu
		 * @param	string		className: the className to be assigned to the element
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id, target, className) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			var range = editor.getSelection().createRange();
			var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null;
			var parentElement = statusBarSelection ? statusBarSelection : this.editor.getSelection().getParentElement();
			if (target) {
				parentElement = target;
			}
			while (parentElement && (!Dom.isBlockElement(parentElement) || /^li$/i.test(parentElement.nodeName))) {
				parentElement = parentElement.parentNode;
			}
			var blockAncestors = Dom.getBlockAncestors(parentElement);
			var tableCell = null;
			if (id === "TAB" || id === "SHIFT-TAB") {
				for (var i = blockAncestors.length; --i >= 0;) {
					if (/^(td|th)$/i.test(blockAncestors[i].nodeName)) {
						tableCell = blockAncestors[i];
						break;
					}
				}
			}
			var fullNodeTextSelected = (parentElement.textContent === range.toString());
			switch (buttonId) {
				case "Indent" :
					if (/^(ol|ul)$/i.test(parentElement.nodeName) && !(fullNodeTextSelected && !/^(li)$/i.test(parentElement.parentNode.nodeName))) {
						if (UserAgent.isOpera) {
							try {
								this.editor.getSelection().execCommand(buttonId, false, null);
							} catch(e) {
								this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
							}
							this.indentedList = parentElement;
							this.makeNestedList(parentElement);
							this.editor.getSelection().selectNodeContents(this.indentedList.lastChild, false);
						} else {
							this.indentSelectedListElements(parentElement, range);
						}
					} else if (tableCell) {
						var tablePart = tableCell.parentNode.parentNode;
							// Get next cell in same table part
						var nextCell = tableCell.nextSibling ? tableCell.nextSibling : (tableCell.parentNode.nextSibling ? tableCell.parentNode.nextSibling.cells[0] : null);
							// Next cell is in other table part
						if (!nextCell) {
							switch (tablePart.nodeName.toLowerCase()) {
							    case "thead":
								nextCell = tablePart.parentNode.tBodies[0].rows[0].cells[0];
								break;
							    case "tbody":
								nextCell = tablePart.nextSibling ? tablePart.nextSibling.rows[0].cells[0] : null;
								break;
							    case "tfoot":
								this.editor.getSelection().selectNodeContents(tablePart.parentNode.lastChild.lastChild.lastChild, true);
							}
						}
						if (!nextCell) {
							if (this.getPluginInstance('TableOperations')) {
								this.getPluginInstance('TableOperations').onButtonPress(this.editor, 'TO-row-insert-under');
							} else {
								nextCell = tablePart.parentNode.rows[0].cells[0];
							}
						}
						if (nextCell) {
							if (UserAgent.isOpera && !nextCell.hasChildNodes()) {
								nextCell.appendChild(this.editor.document.createElement('br'));
							}
							this.editor.getSelection().selectNodeContents(nextCell, true);
						}
					} else  if (this.useBlockquote) {
						try {
							this.editor.getSelection().execCommand(buttonId, false, null);
						} catch(e) {
							this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
						}
					} else if (this.isAllowedBlockElement("div")) {
						if (/^div$/i.test(parentElement.nodeName) && !Dom.hasClass(parentElement, this.useClass[buttonId])) {
							Dom.addClass(parentElement, this.useClass[buttonId]);
						} else if (!/^div$/i.test(parentElement.nodeName) && /^div$/i.test(parentElement.parentNode.nodeName) && !Dom.hasClass(parentElement.parentNode, this.useClass[buttonId])) {
							Dom.addClass(parentElement.parentNode, this.useClass[buttonId]);
						} else {
							var bookmark = this.editor.getBookMark().get(range);
							var newBlock = this.wrapSelectionInBlockElement('div', this.useClass[buttonId], null, true);
							this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
						}
					} else {
						this.addClassOnBlockElements(buttonId);
					}
					break;
				case "Outdent" :
					if (/^(ol|ul)$/i.test(parentElement.nodeName) && !Dom.hasClass(parentElement, this.useClass.Indent)) {
						if (/^(li)$/i.test(parentElement.parentNode.nodeName)) {
							if (UserAgent.isOpera) {
								try {
									this.editor.getSelection().execCommand(buttonId, false, null);
								} catch(e) {
									this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
								}
							} else {
								this.outdentSelectedListElements(parentElement, range);
							}
						}
					} else if (tableCell) {
						var previousCell = tableCell.previousSibling ? tableCell.previousSibling : (tableCell.parentNode.previousSibling ? tableCell.parentNode.previousSibling.lastChild : null);
						if (!previousCell) {
							var table = tableCell.parentNode.parentNode.parentNode;
							var tablePart = tableCell.parentNode.parentNode.nodeName.toLowerCase();
							switch (tablePart) {
								case "tbody":
									if (table.tHead) {
										previousCell = table.tHead.rows[table.tHead.rows.length-1].cells[table.tHead.rows[table.tHead.rows.length-1].cells.length-1];
										break;
									}
								case "thead":
									if (table.tFoot) {
										previousCell = table.tFoot.rows[table.tFoot.rows.length-1].cells[table.tFoot.rows[table.tFoot.rows.length-1].cells.length-1];
										break;
									}
								case "tfoot":
									previousCell = table.tBodies[table.tBodies.length-1].rows[table.tBodies[table.tBodies.length-1].rows.length-1].cells[table.tBodies[table.tBodies.length-1].rows[table.tBodies[table.tBodies.length-1].rows.length-1].cells.length-1];
							}
						}
						if (previousCell) {
							if (UserAgent.isOpera && !previousCell.hasChildNodes()) {
								previousCell.appendChild(this.editor.document.createElement('br'));
							}
							this.editor.getSelection().selectNodeContents(previousCell, true);
						}
					} else  if (this.useBlockquote) {
						try {
							this.editor.getSelection().execCommand(buttonId, false, null);
						} catch(e) {
							this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
						}
					} else if (this.isAllowedBlockElement("div")) {
						for (var i = blockAncestors.length; --i >= 0;) {
							if (Dom.hasClass(blockAncestors[i], this.useClass.Indent)) {
								var bookmark = this.editor.getBookMark().get(range);
								var newBlock = this.wrapSelectionInBlockElement('div', false, blockAncestors[i]);
									// If not directly under the div, we need to backtrack
								if (newBlock.parentNode !== blockAncestors[i]) {
									var parent = newBlock.parentNode;
									this.editor.getDomNode().removeMarkup(newBlock);
									while (parent.parentNode !== blockAncestors[i]) {
										parent = parent.parentNode;
									}
									blockAncestors[i].insertBefore(newBlock, parent);
									newBlock.appendChild(parent);
								}
								newBlock.className = blockAncestors[i].className;
								Dom.removeClass(newBlock, this.useClass.Indent);
								if (!newBlock.previousSibling) {
									while (newBlock.hasChildNodes()) {
										if (newBlock.firstChild.nodeType === Dom.ELEMENT_NODE) {
											newBlock.firstChild.className = newBlock.className;
										}
										blockAncestors[i].parentNode.insertBefore(newBlock.firstChild, blockAncestors[i]);
									}
								} else if (!newBlock.nextSibling) {
									if (blockAncestors[i].nextSibling) {
										while (newBlock.hasChildNodes()) {
											if (newBlock.firstChild.nodeType === Dom.ELEMENT_NODE) {
												newBlock.lastChild.className = newBlock.className;
											}
											blockAncestors[i].parentNode.insertBefore(newBlock.lastChild, blockAncestors[i].nextSibling);
										}
									} else {
										while (newBlock.hasChildNodes()) {
											if (newBlock.firstChild.nodeType === Dom.ELEMENT_NODE) {
												newBlock.firstChild.className = newBlock.className;
											}
											blockAncestors[i].parentNode.appendChild(newBlock.firstChild);
										}
									}
								} else {
									var clone = blockAncestors[i].cloneNode(false);
									if (blockAncestors[i].nextSibling) {
										blockAncestors[i].parentNode.insertBefore(clone, blockAncestors[i].nextSibling);
									} else {
										blockAncestors[i].parentNode.appendChild(clone);
									}
									while (newBlock.nextSibling) {
										clone.appendChild(newBlock.nextSibling);
									}
									while (newBlock.hasChildNodes()) {
										if (newBlock.firstChild.nodeType === Dom.ELEMENT_NODE) {
											newBlock.firstChild.className = newBlock.className;
										}
										blockAncestors[i].parentNode.insertBefore(newBlock.firstChild, clone);
									}
								}
								blockAncestors[i].removeChild(newBlock);
								if (!blockAncestors[i].hasChildNodes()) {
									blockAncestors[i].parentNode.removeChild(blockAncestors[i]);
								}
								this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
								break;
							}
						}
					} else {
						this.addClassOnBlockElements(buttonId);
					}
					break;
				case "InsertParagraphBefore" :
				case "InsertParagraphAfter"  :
					this.insertParagraph(buttonId === "InsertParagraphAfter");
					break;
				case "Blockquote" :
					var commandState = false;
					for (var i = blockAncestors.length; --i >= 0;) {
						if (/^blockquote$/i.test(blockAncestors[i].nodeName)) {
							commandState = true;
							this.editor.getDomNode().removeMarkup(blockAncestors[i]);
							break;
						}
					}
					if (!commandState) {
						var bookmark = this.editor.getBookMark().get(range);
						var newBlock = this.wrapSelectionInBlockElement('blockquote', className, null, true);
						this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
					}
					break;
				case 'address':
				case 'article':
				case 'aside':
				case 'div':
				case 'footer':
				case 'header':
				case 'nav':
				case 'section':
					var bookmark = this.editor.getBookMark().get(range);
					var newBlock = this.wrapSelectionInBlockElement(buttonId, className, null, true);
					this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
					if (UserAgent.isWebKit || UserAgent.isOpera) {
						this.editor.getDomNode().cleanAppleStyleSpans(newBlock);
					}
					break;
				case "JustifyLeft"   :
				case "JustifyCenter" :
				case "JustifyRight"  :
				case "JustifyFull"   :
					if (this.useAlignAttribute) {
						try {
							this.editor.getSelection().execCommand(buttonId, false, null);
						} catch(e) {
							this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
						}
					} else {
						this.addClassOnBlockElements(buttonId);
					}
					break;
				case "InsertOrderedList":
				case "InsertUnorderedList":
					this.insertList(buttonId, parentElement);
					break;
				case "InsertHorizontalRule":
					this.insertHorizontalRule();
					break;
				case "none" :
					if (this.isAllowedBlockElement(parentElement.nodeName)) {
						this.editor.getDomNode().removeMarkup(parentElement);
					}
					break;
				default	:
					break;
			}
			return false;
		},

		/**
		 * This function wraps the block elements intersecting the current selection in a block element of the given type
		 *
		 * @param	string		blockName: the type of element to be used as wrapping block
		 * @param	string		useClass: a class to be assigned to the wrapping block
		 * @param	object		withinBlock: only elements contained in this block will be wrapped
		 * @param	boolean		keepValid: make only valid wraps (working wraps may produce temporary invalid hierarchies)
		 *
		 * @return	object		the wrapping block
		 */
		wrapSelectionInBlockElement: function (blockName, useClass, withinBlock, keepValid) {
			var endBlocks = this.editor.getSelection().getEndBlocks();
			var startAncestors = Dom.getBlockAncestors(endBlocks.start, withinBlock);
			var endAncestors = Dom.getBlockAncestors(endBlocks.end, withinBlock);
			var i = 0;
			while (i < startAncestors.length && i < endAncestors.length && startAncestors[i] === endAncestors[i]) {
				++i;
			}
			if ((endBlocks.start === endBlocks.end && /^(body)$/i.test(endBlocks.start.nodeName)) || !startAncestors[i] || !endAncestors[i]) {
				--i;
			}
			if (keepValid) {
				if (endBlocks.start === endBlocks.end) {
					while (i && /^(thead|tbody|tfoot|tr|dt)$/i.test(startAncestors[i].nodeName)) {
						--i;
					}
				} else {
					while (i && (/^(thead|tbody|tfoot|tr|td|li|dd|dt)$/i.test(startAncestors[i].nodeName) || /^(thead|tbody|tfoot|tr|td|li|dd|dt)$/i.test(endAncestors[i].nodeName))) {
						--i;
					}
				}
			}
			var blockElement = this.editor.document.createElement(blockName);
			if (useClass) {
				Dom.addClass(blockElement, useClass);
			}
			var contextElement = endAncestors[0];
			if (i) {
				contextElement = endAncestors[i-1];
			}
			var nextElement = endAncestors[i].nextSibling;
			var block = startAncestors[i], sibling;
			if ((!/^(body|td|th|li|dd)$/i.test(block.nodeName) || /^(ol|ul|dl)$/i.test(blockName)) && block != withinBlock) {
				while (block && block != nextElement) {
					sibling = block.nextSibling;
					blockElement.appendChild(block);
					block = sibling;
				}
				if (nextElement) {
					blockElement = nextElement.parentNode.insertBefore(blockElement, nextElement);
				} else {
					blockElement = contextElement.appendChild(blockElement);
				}
			} else {
				contextElement = block;
				block = block.firstChild;
				while (block) {
					sibling = block.nextSibling;
					blockElement.appendChild(block);
					block = sibling;
				}
				blockElement = contextElement.appendChild(blockElement);
			}
				// Things go wrong in some browsers when the node is empty
			if (UserAgent.isWebKit && !blockElement.hasChildNodes()) {
				blockElement = blockElement.appendChild(this.editor.document.createElement('br'));
			}
			return blockElement;
		},
		/*
		 * This function adds a class attribute on blocks sibling of the block containing the start container of the selection
		 */
		addClassOnBlockElements: function (buttonId, className) {
			var endBlocks = this.editor.getSelection().getEndBlocks();
			var startAncestors = Dom.getBlockAncestors(endBlocks.start);
			var endAncestors = Dom.getBlockAncestors(endBlocks.end);
			var index = 0;
			while (index < startAncestors.length && index < endAncestors.length && startAncestors[index] === endAncestors[index]) {
				++index;
			}
			if (endBlocks.start === endBlocks.end) {
				--index;
			}
			if (!/^(body)$/i.test(startAncestors[index].nodeName)) {
				for (var block = startAncestors[index]; block; block = block.nextSibling) {
					if (Dom.isBlockElement(block)) {
						switch (buttonId) {
							case "Indent" :
								if (!Dom.hasClass(block, this.useClass[buttonId])) {
									Dom.addClass(block, this.useClass[buttonId]);
								}
								break;
							case "Outdent" :
								if (Dom.hasClass(block, this.useClass["Indent"])) {
									Dom.removeClass(block, this.useClass["Indent"]);
								}
								break;
							case "JustifyLeft"   :
							case "JustifyCenter" :
							case "JustifyRight"  :
							case "JustifyFull"   :
								this.toggleAlignmentClass(block, buttonId);
								break;
							default :
								if (this.standardBlockElements.test(buttonId.toLowerCase()) && buttonId.toLowerCase() == block.nodeName.toLowerCase()) {
									this.cleanClasses(block);
									if (className) {
										Dom.addClass(block, className);
									}
								}
								break;
						}
					}
					if (block == endAncestors[index]) {
						break;
					}
				}
			}
		},
		/*
		 * This function toggles the alignment class on the given block
		 */
		toggleAlignmentClass: function (block, buttonId) {
			for (var alignmentButtonId in this.useClass) {
				if (this.useClass.hasOwnProperty(alignmentButtonId) && alignmentButtonId !== "Indent") {
					if (Dom.hasClass(block, this.useClass[alignmentButtonId])) {
						Dom.removeClass(block, this.useClass[alignmentButtonId]);
					} else if (alignmentButtonId === buttonId) {
						Dom.addClass(block, this.useClass[alignmentButtonId]);
					}
				}
			}
			if (/^div$/i.test(block.nodeName) && !Dom.hasAllowedAttributes(block, this.allowedAttributes)) {
				this.editor.getDomNode().removeMarkup(block);
			}
		},
	
		insertList: function (buttonId, parentElement) {
			if (/^(dd)$/i.test(parentElement.nodeName)) {
				var list = parentElement.appendChild(this.editor.document.createElement((buttonId === 'OrderedList') ? 'ol' : 'ul'));
				var first = list.appendChild(this.editor.document.createElement('li'));
				first.innerHTML = '<br />';
				this.editor.getSelection().selectNodeContents(first, true);
			} else {
				try {
					this.editor.getSelection().execCommand(buttonId, false, null);
				} catch(e) {
					this.appendToLog('onButtonPress', e + '\n\nby execCommand(' + buttonId + ');', 'error');
				}
				if (UserAgent.isWebKit || UserAgent.isOpera) {
					var parentElement = this.editor.getSelection().getParentElement();
					var parentNode = parentElement.parentNode;
					// If the parent of the selection is a span, remove it
					if (/^(span)$/i.test(parentElement.nodeName)) {
						this.editor.getDomNode().removeMarkup(parentElement);
						parentElement = parentNode;
					}
					// The list might not be well-formed
					while (/^(li)$/i.test(parentElement.nodeName)) {
						parentElement = parentElement.parentNode;
					}
					if (/^(ol|ul)$/i.test(parentElement.nodeName)) {
						// Make sure the list is well-formed
						this.makeNestedList(parentElement);
						// The list may be wrapped inside a paragraph
						if (/^(p)$/i.test(parentElement.parentNode.nodeName)) {
							this.editor.getDomNode().removeMarkup(parentElement.parentNode);
						}
					}
					// Content may be polluted with span and font tags
					this.editor.getDomNode().cleanAppleStyleSpans(parentElement);
				}
			}
		},
		/*
		 * Indent selected list elements
		 */
		indentSelectedListElements: function (list, range) {
			var bookmark = this.editor.getBookMark().get(range);
				// The selected elements are wrapped into a list element
			var indentedList = this.wrapSelectionInBlockElement(list.nodeName.toLowerCase(), null, list);
				// which breaks the range
			var range = this.editor.getBookMark().moveTo(bookmark);
			bookmark = this.editor.getBookMark().get(range);
	
				// Check if the last element has children. If so, outdent those that do not intersect the selection
			var last = indentedList.lastChild.lastChild;
			if (last && /^(ol|ul)$/i.test(last.nodeName)) {
				var child = last.firstChild, next;
				while (child) {
					next = child.nextSibling;
					if (!Dom.rangeIntersectsNode(range, child)) {
						indentedList.appendChild(child);
					}
					child = next;
				}
				if (!last.hasChildNodes()) {
					Dom.removeFromParent(last);
				}
			}
			if (indentedList.previousSibling && indentedList.previousSibling.hasChildNodes()) {
					// Indenting some elements not including the first one
				if (/^(ol|ul)$/i.test(indentedList.previousSibling.lastChild.nodeName)) {
						// Some indented elements exist just above our selection
						// Moving to regroup with these elements
					while (indentedList.hasChildNodes()) {
						indentedList.previousSibling.lastChild.appendChild(indentedList.firstChild);
					}
					list.removeChild(indentedList);
				} else {
					indentedList = indentedList.previousSibling.appendChild(indentedList);
				}
			} else {
					// Indenting the first element and possibly some more
				var first = this.editor.document.createElement("li");
				first.innerHTML = "&nbsp;";
				list.insertBefore(first, indentedList);
				indentedList = first.appendChild(indentedList);
			}
			this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
		},

		/**
		 * Outdent selected list elements
		 */
		outdentSelectedListElements: function (list, range) {
				// We wrap the selected li elements and thereafter move them one level up
			var bookmark = this.editor.getBookMark().get(range);
			var wrappedList = this.wrapSelectionInBlockElement(list.nodeName.toLowerCase(), null, list);
				// which breaks the range
			var range = this.editor.getBookMark().moveTo(bookmark);
			bookmark = this.editor.getBookMark().get(range);

			if (!wrappedList.previousSibling) {
					// Outdenting the first element(s) of an indented list
				var next = list.parentNode.nextSibling;
				var last = wrappedList.lastChild;
				while (wrappedList.hasChildNodes()) {
					if (next) {
						list.parentNode.parentNode.insertBefore(wrappedList.firstChild, next);
					} else {
						list.parentNode.parentNode.appendChild(wrappedList.firstChild);
					}
				}
				list.removeChild(wrappedList);
				last.appendChild(list);
			} else if (!wrappedList.nextSibling) {
					// Outdenting the last element(s) of the list
					// This will break the gecko bookmark
				this.editor.getBookMark().moveTo(bookmark);
				while (wrappedList.hasChildNodes()) {
					if (list.parentNode.nextSibling) {
						list.parentNode.parentNode.insertBefore(wrappedList.firstChild, list.parentNode.nextSibling);
					} else {
						list.parentNode.parentNode.appendChild(wrappedList.firstChild);
					}
				}
				list.removeChild(wrappedList);
				this.editor.getSelection().selectNodeContents(list.parentNode.nextSibling, true);
				bookmark = this.editor.getBookMark().get(this.editor.getSelection().createRange());
			} else {
					// Outdenting the middle of a list
				var next = list.parentNode.nextSibling;
				var last = wrappedList.lastChild;
				var sibling = wrappedList.nextSibling;
				while (wrappedList.hasChildNodes()) {
					if (next) {
						list.parentNode.parentNode.insertBefore(wrappedList.firstChild, next);
					} else {
						list.parentNode.parentNode.appendChild(wrappedList.firstChild);
					}
				}
				while (sibling) {
					wrappedList.appendChild(sibling);
					sibling = sibling.nextSibling;
				}
				last.appendChild(wrappedList);
			}
				// Remove the list if all its elements have been moved up
			if (!list.hasChildNodes()) {
				list.parentNode.removeChild(list);
			}
			this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
		},
		/*
		 * Make XHTML-compliant nested list
		 * We need this for Opera and Chrome
		 */
		makeNestedList: function (el) {
			var previous;
			for (var i = el.firstChild; i; i = i.nextSibling) {
				if (/^li$/i.test(i.nodeName)) {
					for (var j = i.firstChild; j; j = j.nextSibling) {
						if (/^(ol|ul)$/i.test(j.nodeName)) {
							this.makeNestedList(j);
						} else if (/^(li)$/i.test(j.nodeName)) {
							this.editor.getDomNode().removeMarkup(j);
						}
					}
				} else if (/^(ol|ul)$/i.test(i.nodeName)) {
					previous = i.previousSibling;
					this.indentedList = i.cloneNode(true);
					if (!previous) {
						previous = el.insertBefore(this.editor.document.createElement('li'), i);
						this.indentedList = previous.appendChild(this.indentedList);
					} else {
						this.indentedList = previous.appendChild(this.indentedList);
					}
					Dom.removeFromParent(i);
					this.makeNestedList(el);
					break;
				}
			}
		},
		/*
		 * Insert a paragraph
		 */
		insertParagraph: function (after) {
			var endBlocks = this.editor.getSelection().getEndBlocks();
			var ancestors = after ? Dom.getBlockAncestors(endBlocks.end) : Dom.getBlockAncestors(endBlocks.start);
			var endElement = ancestors[ancestors.length-1];
			for (var i = ancestors.length; --i >= 0;) {
				if (/^(table|div|ul|ol|dl|blockquote|address|pre)$/i.test(ancestors[i].nodeName) && !/^(li)$/i.test(ancestors[i].parentNode.nodeName)) {
					endElement = ancestors[i];
					break;
				}
			}
			if (endElement) {
				var parent = endElement.parentNode;
				var paragraph = this.editor.document.createElement('p');
				paragraph.appendChild(this.editor.document.createElement('br'));
				if (after && !endElement.nextSibling) {
					parent.appendChild(paragraph);
				} else {
					parent.insertBefore(paragraph, after ? endElement.nextSibling : endElement);
				}
				this.editor.getSelection().selectNodeContents(paragraph, true);
			}
		},
		/*
		 * Insert horizontal line
		 */
		insertHorizontalRule: function () {
			this.editor.getSelection().execCommand('InsertHorizontalRule');
				// Apply enterParagraphs rule
			if (!UserAgent.isIE && !UserAgent.isOpera && !this.editor.config.disableEnterParagraphs) {
				var range = this.editor.getSelection().createRange();
				var startContainer = range.startContainer;
				if (/^body$/i.test(startContainer.nodeName)) {
					startContainer.normalize();
					var ruler = startContainer.childNodes[range.startOffset-1];
					if (ruler.nextSibling) {
						if (ruler.nextSibling.nodeType === Dom.TEXT_NODE) {
							if (/\S/.test(ruler.nextSibling.textContent)) {
								var paragraph = this.editor.document.createElement('p');
								paragraph = startContainer.appendChild(paragraph);
								paragraph = startContainer.insertBefore(paragraph, ruler.nextSibling);
								paragraph.appendChild(ruler.nextSibling);
							} else {
								Dom.removeFromParent(ruler.nextSibling);
								var paragraph = ruler.nextSibling;
							}
						} else {
							var paragraph = ruler.nextSibling;
						}
							// Cannot set the cursor on the hr element
						if (/^hr$/i.test(paragraph.nodeName)) {
							var inBetweenParagraph = this.editor.document.createElement('p');
							inBetweenParagraph.innerHTML = '<br />';
							paragraph = startContainer.insertBefore(inBetweenParagraph, paragraph);
						}
					} else {
						var paragraph = this.editor.document.createElement('p');
						if (UserAgent.isWebKit) {
							paragraph.innerHTML = '<br />';
						}
						paragraph = startContainer.appendChild(paragraph);
					}
					this.editor.getSelection().selectNodeContents(paragraph, true);
				}
			}
		},

		/**
		 * This function gets called when the plugin is generated
		 */
		onGenerate: function () {
			// Register the enter key handler for IE when the cursor is at the end of a dt or a dd element
			if (UserAgent.isIE) {
				var self = this;
				this.editor.iframe.keyMap.addBinding({
					key: Event.ENTER,
					shift: false,
					handler: function (event) { return self.onKey(event); }
				});
			}
		},

		/**
		 * This function gets called when the enter key was pressed in IE
		 * It will process the enter key for IE when the cursor is at the end of a dt or a dd element
		 *
		 * @param object event: the Ext event object (keydown)
		 * @return boolean false, if the event was taken care of
		 */
		onKey: function (event) {
			if (this.editor.getSelection().isEmpty()) {
				var range = this.editor.getSelection().createRange();
				var parentElement = this.editor.getSelection().getParentElement();
				while (parentElement && !Dom.isBlockElement(parentElement)) {
					parentElement = parentElement.parentNode;
				}
				if (/^(dt|dd)$/i.test(parentElement.nodeName)) {
					var nodeRange = this.editor.getSelection().createRange();
					nodeRange.moveToElementText(parentElement);
					range.setEndPoint("EndToEnd", nodeRange);
					if (!range.text || range.text == "\x20") {
						var item = parentElement.parentNode.insertBefore(this.editor.document.createElement((parentElement.nodeName.toLowerCase() === "dt") ? "dd" : "dt"), parentElement.nextSibling);
						item.innerHTML = "\x20";
						this.editor.getSelection().selectNodeContents(item, true);
						Event.stopEvent(event);
						return false;
					}
				} else if (/^(li)$/i.test(parentElement.nodeName)
						&& !parentElement.innerText
						&& parentElement.parentNode.parentNode
						&& /^(dd|td|th)$/i.test(parentElement.parentNode.parentNode.nodeName)) {
					var item = parentElement.parentNode.parentNode.insertBefore(this.editor.document.createTextNode("\x20"), parentElement.parentNode.nextSibling);
					this.editor.getSelection().selectNodeContents(parentElement.parentNode.parentNode, false);
					parentElement.parentNode.removeChild(parentElement);
					Event.stopEvent(event);
					return false;
				}
			}
			return true;
		},

		/**
		 * This function removes any disallowed class or mutually exclusive classes from the class attribute of the node
		 */
		cleanClasses: function (node) {
			var classNames = node.className.trim().split(" ");
			var nodeName = node.nodeName.toLowerCase();
			for (var i = classNames.length; --i >= 0;) {
				if (!HTMLArea.reservedClassNames.test(classNames[i])) {
					if (this.tags && this.tags[nodeName] && this.tags[nodeName].allowedClasses) {
						if (!this.tags[nodeName].allowedClasses.test(classNames[i])) {
							Dom.removeClass(node, classNames[i]);
						}
					} else if (this.tags && this.tags.all && this.tags.all.allowedClasses) {
						if (!this.tags.all.allowedClasses.test(classNames[i])) {
							Dom.removeClass(node, classNames[i]);
						}
					}
					if (this.formatBlockItems[nodeName] && this.formatBlockItems[nodeName].classList && this.formatBlockItems[nodeName].classList.test(classNames[i])) {
						Dom.removeClass(node, classNames[i]);
					}
				}
			}
		},

		/**
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors, endPointsInSameBlock) {
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null;
				var parentElement = statusBarSelection ? statusBarSelection : this.editor.getSelection().getParentElement();
				if (!/^body$/i.test(parentElement.nodeName)) {
					while (parentElement && !Dom.isBlockElement(parentElement) || /^li$/i.test(parentElement.nodeName)) {
						parentElement = parentElement.parentNode;
					}
					var blockAncestors = Dom.getBlockAncestors(parentElement);
					var endBlocks = this.editor.getSelection().getEndBlocks();
					var startAncestors = Dom.getBlockAncestors(endBlocks.start);
					var endAncestors = Dom.getBlockAncestors(endBlocks.end);
					var index = 0;
					while (index < startAncestors.length && index < endAncestors.length && startAncestors[index] === endAncestors[index]) {
						++index;
					}
					if (endBlocks.start === endBlocks.end || !startAncestors[index]) {
						--index;
					}
					var commandState = false;
					switch (button.itemId) {
						case 'FormatBlock':
							this.updateDropDown(button, blockAncestors[blockAncestors.length-1], startAncestors[index]);
							break;
						case "Outdent" :
							if (this.useBlockquote) {
								for (var j = blockAncestors.length; --j >= 0;) {
									if (/^blockquote$/i.test(blockAncestors[j].nodeName)) {
										commandState = true;
										break;
									}
								}
							} else if (/^(ol|ul)$/i.test(parentElement.nodeName)) {
								commandState = true;
							} else {
								for (var j = blockAncestors.length; --j >= 0;) {
									if (Dom.hasClass(blockAncestors[j], this.useClass.Indent) || /^(td|th)$/i.test(blockAncestors[j].nodeName)) {
										commandState = true;
										break;
									}
								}
							}
							button.setDisabled(!commandState);
							break;
						case "Indent" :
							break;
						case "InsertParagraphBefore" :
						case "InsertParagraphAfter"  :
							button.setDisabled(/^(body)$/i.test(startAncestors[index].nodeName));
							break;
						case "Blockquote" :
							for (var j = blockAncestors.length; --j >= 0;) {
								if (/^blockquote$/i.test(blockAncestors[j].nodeName)) {
									commandState = true;
									break;
								}
							}
							button.setInactive(!commandState);
							break;
						case "JustifyLeft"   :
						case "JustifyCenter" :
						case "JustifyRight"  :
						case "JustifyFull"   :
							if (this.useAlignAttribute) {
								try {
									commandState = this.editor.document.queryCommandState(button.itemId);
								} catch(e) {
									commandState = false;
								}
							} else {
								if (/^(body)$/i.test(startAncestors[index].nodeName)) {
									button.setDisabled(true);
								} else {
									button.setDisabled(false);
									commandState = true;
									for (var block = startAncestors[index]; block; block = block.nextSibling) {
										commandState = commandState && Dom.hasClass(block, this.useClass[button.itemId]);
										if (block == endAncestors[index]) {
											break;
										}
									}
								}
							}
							button.setInactive(!commandState);
							break;
						case "InsertOrderedList":
						case "InsertUnorderedList":
							try {
								commandState = this.editor.document.queryCommandState(button.itemId);
							} catch(e) {
								commandState = false;
							}
							button.setInactive(!commandState);
							break;
						default	:
							break;
					}
				} else {
						// The selection is not contained in any block
					switch (button.itemId) {
						case 'FormatBlock':
							this.updateDropDown(button);
							break;
						case 'Outdent' :
							button.setDisabled(true);
							break;
						case 'Indent' :
							break;
						case 'InsertParagraphBefore' :
						case 'InsertParagraphAfter'  :
							button.setDisabled(true);
							break;
						case 'Blockquote' :
							button.setInactive(true);
							break;
						case 'JustifyLeft'   :
						case 'JustifyCenter' :
						case 'JustifyRight'  :
						case 'JustifyFull'   :
							button.setInactive(true);
							button.setDisabled(true);
							break;
						case 'InsertOrderedList':
						case 'InsertUnorderedList':
							button.setInactive(true);
							break;
						default	:
							break;
					}
				}
			}
		},

		/**
		 * This function updates the drop-down list of block elements
		 */
		updateDropDown: function(select, deepestBlockAncestor, startAncestor) {
			var index = -1;
			var value, item, text;
			if (deepestBlockAncestor) {
				var nodeName = deepestBlockAncestor.nodeName.toLowerCase();
				// Could be a custom item ...
				for (var i = 0, n = select.getCount(); i < n; i++) {
					value = select.getOptionValue(i);
					item = this.formatBlockItems[value];
					if (item && item.tagName === nodeName && item.addClass && Dom.hasClass(deepestBlockAncestor, item.addClass)) {
						index = i;
						break;
					}
				}
				if (index === -1) {
					// ... or a standard one
					index = select.findValue(nodeName);
				}
			}
			if (index === -1) {
				text = this.localize('No block');
			} else {
				text = this.localize('Remove block');
			}
			select.setFirstOption(text, 'none', text);
			select.setValueByIndex(index);
		},

		/**
		 * This function handles the hotkey events registered on elements of the dropdown list
		 */
		onHotKey: function(editor, key) {
			var blockElement;
			var hotKeyConfiguration = this.getHotKeyConfiguration(key);
			if (hotKeyConfiguration) {
				var blockElement = hotKeyConfiguration.element;
			}
			if (blockElement && this.isAllowedBlockElement(blockElement)) {
				this.applyBlockElement(this.translateHotKey(key), blockElement);
				return false;
			}
			return true;
		}
	});

	return BlockElements;

});

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
 * Block Style Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/BlockStyle',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/CSS/Parser',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, Dom, Event, Parser, Util) {

	var BlockStyle = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(BlockStyle, Plugin);
	Util.apply(BlockStyle.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {
			this.cssArray = {};
			this.classesUrl = this.editorConfiguration.classesUrl;
			this.pageTSconfiguration = this.editorConfiguration.buttons.blockstyle;
			this.tags = (this.pageTSconfiguration && this.pageTSconfiguration.tags) ? this.pageTSconfiguration.tags : {};
			var allowedClasses;
			for (var tagName in this.tags) {
				if (this.tags[tagName].allowedClasses) {
					allowedClasses = this.tags[tagName].allowedClasses.trim().split(",");
					for (var i = allowedClasses.length; --i >= 0;) {
						allowedClasses[i] = allowedClasses[i].trim().replace(/\*/g, ".*");
					}
					this.tags[tagName].allowedClasses = new RegExp( "^(" + allowedClasses.join("|") + ")$", "i");
				}
			}
			this.showTagFreeClasses = this.pageTSconfiguration ? this.pageTSconfiguration.showTagFreeClasses : false;
			this.prefixLabelWithClassName = this.pageTSconfiguration ? this.pageTSconfiguration.prefixLabelWithClassName : false;
			this.postfixLabelWithClassName = this.pageTSconfiguration ? this.pageTSconfiguration.postfixLabelWithClassName : false;
			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '3.0',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: this.localize('Technische Universitat Ilmenau'),
				sponsorUrl	: 'http://www.tu-ilmenau.de/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the drop-down list
			 */
			var dropDownId = 'BlockStyle';
			var fieldLabel = this.pageTSconfiguration ? this.pageTSconfiguration.fieldLabel : '';
			if ((typeof fieldLabel !== 'string' || !fieldLabel.length) && this.isButtonInToolbar('I[Block style label]')) {
				fieldLabel = this.localize('Block style label');
			}
			var dropDownConfiguration = {
				id: dropDownId,
				tooltip: this.localize(dropDownId + '-Tooltip'),
				fieldLabel: fieldLabel,
				options: [[this.localize('No style'), 'none']],
				action: 'onChange'
			};
			if (this.pageTSconfiguration) {
				if (this.pageTSconfiguration.width) {
					dropDownConfiguration.width = parseInt(this.pageTSconfiguration.width, 10);
				}
				if (this.pageTSconfiguration.listWidth) {
					dropDownConfiguration.listWidth = parseInt(this.pageTSconfiguration.listWidth, 10);
				}
				if (this.pageTSconfiguration.maxHeight) {
					dropDownConfiguration.maxHeight = parseInt(this.pageTSconfiguration.maxHeight, 10);
				}
			}
			this.registerDropDown(dropDownConfiguration);
			return true;
		},

		/**
		 * This handler gets called when some block style was selected in the drop-down list
		 */
		onChange: function (editor, select) {
			var className = select.getValue();
			this.editor.focus();
			var blocks = this.editor.getSelection().getElements();
			for (var k = 0; k < blocks.length; ++k) {
				var parent = blocks[k];
				while (parent && !Dom.isBlockElement(parent) && !/^(img)$/i.test(parent.nodeName)) {
					parent = parent.parentNode;
				}
				if (!k) {
					var tagName = parent.tagName.toLowerCase();
				}
				if (parent.tagName.toLowerCase() == tagName) {
					this.applyClassChange(parent, className);
				}
			}
		},

		/**
		 * This function applies the class change to the node
		 */
		applyClassChange: function (node, className) {
			if (className == "none") {
				var classNames = node.className.trim().split(" ");
				for (var i = classNames.length; --i >= 0;) {
					if (!HTMLArea.reservedClassNames.test(classNames[i])) {
						Dom.removeClass(node, classNames[i]);
						if (node.nodeName.toLowerCase() === "table" && this.getPluginInstance('TableOperations')) {
							this.getPluginInstance('TableOperations').removeAlternatingClasses(node, classNames[i]);
							this.getPluginInstance('TableOperations').removeCountingClasses(node, classNames[i]);
						}
						break;
					}
				}
			} else {
				var nodeName = node.nodeName.toLowerCase();
				if (this.tags && this.tags[nodeName] && this.tags[nodeName].allowedClasses) {
					if (this.tags[nodeName].allowedClasses.test(className)) {
						Dom.addClass(node, className);
					}
				} else if (this.tags && this.tags.all && this.tags.all.allowedClasses) {
					if (this.tags.all.allowedClasses.test(className)) {
						Dom.addClass(node, className);
					}
				} else {
					Dom.addClass(node, className);
				}
				if (nodeName === "table" && this.getPluginInstance('TableOperations')) {
					this.getPluginInstance('TableOperations').reStyleTable(node);
				}
			}
		},

		/**
		 * This handler gets called when the editor is generated
		 */
		onGenerate: function () {
			var self = this;
			// Monitor editor changing mode
			Event.on(this.editor, 'HTMLAreaEventModeChange', function (event, mode) { Event.stopEvent(event); self.onModeChange(mode); return false; });
			// Create CSS Parser object
			this.blockStyles = new Parser({
				prefixLabelWithClassName: this.prefixLabelWithClassName,
				postfixLabelWithClassName: this.postfixLabelWithClassName,
				showTagFreeClasses: this.showTagFreeClasses,
				tags: this.tags,
				editor: this.editor
			});
			// Disable the combo while initialization completes
			var dropDown = this.getButton('BlockStyle');
			if (dropDown) {
				dropDown.setDisabled(true);
			}
			// Monitor css parsing being completed
			Event.one(this.blockStyles, 'HTMLAreaEventCssParsingComplete', function (event) { Event.stopEvent(event); self.onCssParsingComplete(); return false; }); 
			this.blockStyles.parse();
		},

		/**
		 * This handler gets called when parsing of css classes is completed
		 */
		onCssParsingComplete: function () {
			if (this.blockStyles.isReady()) {
				this.cssArray = this.blockStyles.getClasses();
				if (this.getEditorMode() === 'wysiwyg' && this.editor.isEditable()) {
					this.updateValue('BlockStyle');
				}
			}
		},

		/**
		 * This handler gets called when the toolbar is being updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			if (mode === 'wysiwyg' && this.editor.isEditable() && this.blockStyles.isReady()) {
				this.updateValue(button.itemId);
			}
		},

		/**
		 * This handler gets called when the editor has changed its mode to "wysiwyg"
		 */
		onModeChange: function(mode) {
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				this.updateValue('BlockStyle');
			}
		},

		/**
		 * This function updates the current value of the dropdown list
		 */
		updateValue: function(dropDownId) {
			var dropDown = this.getButton(dropDownId);
			if (dropDown) {
				var classNames = new Array();
				var nodeName = '';
				var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null;
				var parent = statusBarSelection ? statusBarSelection : this.editor.getSelection().getParentElement();
				while (parent && !Dom.isBlockElement(parent) && !/^(img)$/i.test(parent.nodeName)) {
					parent = parent.parentNode;
				}
				if (parent) {
					nodeName = parent.nodeName.toLowerCase();
					classNames = Dom.getClassNames(parent);
				}
				if (nodeName && nodeName !== 'body'){
					this.buildDropDownOptions(dropDown, nodeName);
					this.setSelectedOption(dropDown, classNames);
				} else {
					this.initializeDropDown(dropDown);
					dropDown.setDisabled(true);
				}
			}
		},

		/**
		 * This function reinitializes the options of the dropdown
		 */
		initializeDropDown: function (dropDown) {
			switch (dropDown.xtype) {
				case 'htmlareaselect':
					dropDown.removeAll();
					dropDown.setFirstOption(this.localize('No style'), 'none', this.localize('No style'));
					dropDown.setValueByIndex(0);
					break;
				case 'combo':
					var store = dropDown.getStore();
					store.removeAll(false);
					store.insert(0, new store.recordType({
						text: this.localize('No style'),
						value: 'none'
					}));
					dropDown.setValue('none');
					break;
			}
		},

		/**
		 * This function builds the options to be displayed in the dropDown box
		 */
		buildDropDownOptions: function (dropDown, nodeName) {
			this.initializeDropDown(dropDown);
			switch (dropDown.xtype) {
				case 'htmlareaselect':
					if (this.blockStyles.isReady()) {
						var allowedClasses = {};
						if (typeof this.cssArray[nodeName] !== 'undefined') {
							allowedClasses = this.cssArray[nodeName];
						} else if (this.showTagFreeClasses && typeof this.cssArray['all'] !== 'undefined') {
							allowedClasses = this.cssArray['all'];
						}
						for (var cssClass in allowedClasses) {
							if (typeof HTMLArea.classesSelectable[cssClass] === 'undefined' || HTMLArea.classesSelectable[cssClass]) {
								var style = null;
								if (!this.pageTSconfiguration || !this.pageTSconfiguration.disableStyleOnOptionLabel) {
									if (HTMLArea.classesValues[cssClass] && !HTMLArea.classesNoShow[cssClass]) {
										style = HTMLArea.classesValues[cssClass];
									} else if (/-[0-9]+$/.test(cssClass) && HTMLArea.classesValues[RegExp.leftContext + '-'])  {
										style = HTMLArea.classesValues[RegExp.leftContext + '-'];
									}
								}
								dropDown.addOption(allowedClasses[cssClass], cssClass, cssClass, style);
							}
						}
					}
					break;
				case 'combo':
					var store = dropDown.getStore();
					this.initializeDropDown(dropDown);
					if (this.blockStyles.isReady()) {
						var allowedClasses = {};
						if (typeof this.cssArray[nodeName] !== 'undefined') {
							allowedClasses = this.cssArray[nodeName];
						} else if (this.showTagFreeClasses && typeof this.cssArray['all'] !== 'undefined') {
							allowedClasses = this.cssArray['all'];
						}
						for (var cssClass in allowedClasses) {
							if (typeof HTMLArea.classesSelectable[cssClass] === 'undefined' || HTMLArea.classesSelectable[cssClass]) {
								var style = null;
								if (!this.pageTSconfiguration || !this.pageTSconfiguration.disableStyleOnOptionLabel) {
									if (HTMLArea.classesValues[cssClass] && !HTMLArea.classesNoShow[cssClass]) {
										style = HTMLArea.classesValues[cssClass];
									} else if (/-[0-9]+$/.test(cssClass) && HTMLArea.classesValues[RegExp.leftContext + '-'])  {
										style = HTMLArea.classesValues[RegExp.leftContext + '-'];
									}
								}
								store.add(new store.recordType({
									text: allowedClasses[cssClass],
									value: cssClass,
									style: style
								}));
							}
						}
					}
					break;
			}
		},

		/**
		 * This function sets the selected option of the dropDown box
		 */
		setSelectedOption: function (dropDown, classNames, noUnknown, defaultClass) {
			switch (dropDown.xtype) {
				case 'htmlareaselect':
					dropDown.setValue('none');
					if (classNames.length) {
						var index = dropDown.findValue(classNames[classNames.length-1]);
						if (index !== -1) {
							dropDown.setValue(classNames[classNames.length-1]);
							if (!defaultClass) {
								var text = this.localize('Remove style');
								dropDown.setFirstOption(text, 'none', text);
							}
						}
						if (index === -1 && !noUnknown) {
							var text = this.localize('Unknown style');
							var value = classNames[classNames.length-1];
							if (typeof HTMLArea.classesSelectable[value] !== 'undefined' && !HTMLArea.classesSelectable[value] && typeof HTMLArea.classesLabels[value] !== 'undefined') {
								text = HTMLArea.classesLabels[value];
							}
							var style = (!(this.pageTSconfiguration && this.pageTSconfiguration.disableStyleOnOptionLabel) && HTMLArea.classesValues && HTMLArea.classesValues[value] && !HTMLArea.classesNoShow[value]) ? HTMLArea.classesValues[value] : null;
							dropDown.addOption(text, value, value, style);
							dropDown.setValue(value);
							if (!defaultClass) {
								text = this.localize('Remove style');
								dropDown.setFirstOption(text, 'none', text);
							}
						}
						// Remove already assigned classes from the dropDown box
						var selectedValue = dropDown.getValue();
						for (var i = 0, n = classNames.length; i < n; i++) {
							index = dropDown.findValue(classNames[i]);
							if (index !== -1) {
								if (dropDown.getOptionValue(index) !== selectedValue) {
									dropDown.removeAt(index);
								}
							}
						}
					}
					dropDown.setDisabled(!dropDown.getCount() || (dropDown.getCount() === 1 && dropDown.getValue() === 'none'));
					break;
				case 'combo':
					var store = dropDown.getStore();
					dropDown.setValue('none');
					if (classNames.length) {
						var index = store.findExact('value', classNames[classNames.length-1]);
						if (index !== -1) {
							dropDown.setValue(classNames[classNames.length-1]);
							if (!defaultClass) {
								store.getAt(0).set('text', this.localize('Remove style'));
							}
						}
						if (index === -1 && !noUnknown) {
							var text = this.localize('Unknown style');
							var value = classNames[classNames.length-1];
							if (typeof HTMLArea.classesSelectable[value] !== 'undefined' && !HTMLArea.classesSelectable[value] && typeof HTMLArea.classesLabels[value] !== 'undefined') {
								text = HTMLArea.classesLabels[value];
							}
							store.add(new store.recordType({
								text: text,
								value: value,
								style: (!(this.pageTSconfiguration && this.pageTSconfiguration.disableStyleOnOptionLabel) && HTMLArea.classesValues && HTMLArea.classesValues[value] && !HTMLArea.classesNoShow[value]) ? HTMLArea.classesValues[value] : null
							}));
							dropDown.setValue(value);
							if (!defaultClass) {
								store.getAt(0).set('text', this.localize('Remove style'));
							}
						}
						// Remove already assigned classes from the dropDown box
						var classNamesString = ',' + classNames.join(',') + ',';
						var selectedValue = dropDown.getValue(), optionValue;
						store.each(function (option) {
							optionValue = option.get('value');
							if (classNamesString.indexOf(',' + optionValue + ',') !== -1 && optionValue !== selectedValue) {
								store.removeAt(store.indexOf(option));
							}
							return true;
						});
					}
					dropDown.setDisabled(!store.getCount() || (store.getCount() == 1 && dropDown.getValue() == 'none'));
					break;
			}
		}
	});

	return BlockStyle;

});

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
 * Character Map Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/CharacterMap',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Event, Util) {

	var CharacterMap = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(CharacterMap, Plugin);
	Util.apply(CharacterMap.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function(editor) {
			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '4.0',
				developer	: 'Holger Hees, Bernhard Pfeifer, Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Holger Hees, Bernhard Pfeifer, Stanislas Rolland',
				sponsor		: 'System Concept GmbH, Bernhard Pfeifer, SJBR, BLE',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the buttons
			 */
			for (var i = 0, n = this.buttons.length; i < n; ++i) {
				var button = this.buttons[i];
				buttonId = button[0];
				var buttonConfiguration = {
					id: buttonId,
					tooltip: this.localize(buttonId + '-Tooltip'),
					action: 'onButtonPress',
					context: button[1],
					dialog: false,
					iconCls: 'htmlarea-action-' + button[2]
				};
				this.registerButton(buttonConfiguration);
			}

			/**
			 * Localizing the maps
			 */
			for (var key in this.maps) {
				var map = this.maps[key];
				for (var i = map.length; --i >= 0;) {
					this.maps[key][i].push(this.localize(map[i][1]));
				}
			}
			return true;
		},

		/**
		 * The list of buttons added by this plugin
		 */
		buttons: [
			['InsertCharacter', null, 'character-insert-from-map'],
			['InsertSoftHyphen', null, 'soft-hyphen-insert']
		],

		/**
		 * Character maps
		 */
		maps: {
			general: [
				['&nbsp;', 'nbsp'],
				['&Agrave;', 'Agrave'],
				['&agrave;', 'agrave'],
				['&Aacute;', 'Aacute'],
				['&aacute;', 'aacute'],
				['&Acirc;', 'Acirc'],
				['&acirc;', 'acirc'],
				['&Atilde;', 'Atilde'],
				['&atilde;', 'atilde'],
				['&Auml;', 'Auml'],
				['&auml;', 'auml'],
				['&Aring;', 'Aring'],
				['&aring;', 'aring'],
				['&AElig;', 'AElig'],
				['&aelig;', 'aelig'],
				['&ordf;', 'ordf'],
				['&Ccedil;', 'Ccedil'],
				['&ccedil;', 'ccedil'],
				['&ETH;', 'ETH'],
				['&eth;', 'eth'],
				['&Egrave;', 'Egrave'],
				['&egrave;', 'egrave'],
				['&Eacute;', 'Eacute'],
				['&eacute;', 'eacute'],
				['&Ecirc;', 'Ecirc'],
				['&ecirc;', 'ecirc'],
				['&Euml;', 'Euml'],
				['&euml;', 'euml'],
				['&Igrave;', 'Igrave'],
				['&igrave;', 'igrave'],
				['&Iacute;', 'Iacute'],
				['&iacute;', 'iacute'],
				['&Icirc;', 'Icirc'],
				['&icirc;', 'icirc'],
				['&Iuml;', 'Iuml'],
				['&iuml;', 'iuml'],
				['&Ntilde;', 'Ntilde'],
				['&ntilde;', 'ntilde'],
				['&Ograve;', 'Ograve'],
				['&ograve;', 'ograve'],
				['&Oacute;', 'Oacute'],
				['&oacute;', 'oacute'],
				['&Ocirc;', 'Ocirc'],
				['&ocirc;', 'ocirc'],
				['&Otilde;', 'Otilde'],
				['&otilde;', 'otilde'],
				['&Ouml;', 'Ouml'],
				['&ouml;', 'ouml'],
				['&Oslash;', 'Oslash'],
				['&oslash;', 'oslash'],
				['&OElig;', 'OElig'],
				['&oelig;', 'oelig'],
				['&ordm;', 'ordm'],
				['&Scaron;', 'Scaron'],
				['&scaron;', 'scaron'],
				['&szlig;', 'szlig'],
				['&THORN;', 'THORN'],
				['&thorn;', 'thorn'],
				['&Ugrave;', 'Ugrave'],
				['&ugrave;', 'ugrave'],
				['&Uacute;', 'Uacute'],
				['&uacute;', 'uacute'],
				['&Ucirc;', 'Ucirc'],
				['&ucirc;', 'ucirc'],
				['&Uuml;', 'Uuml'],
				['&uuml;', 'uuml'],
				['&Yacute;', 'Yacute'],
				['&yacute;', 'yacute'],
				['&Yuml;', 'Yuml'],
				['&yuml;', 'yuml'],
				['&acute;', 'acute'],
				['&circ;', 'circ'],
				['&tilde;', 'tilde'],
				['&uml;', 'uml'],
				['&cedil;', 'cedil'],
				['&shy;', 'shy'],
				['&ndash;', 'ndash'],
				['&mdash;', 'mdash'],
				['&lsquo;', 'lsquo'],
				['&rsquo;', 'rsquo'],
				['&sbquo;', 'sbquo'],
				['&ldquo;', 'ldquo'],
				['&rdquo;', 'rdquo'],
				['&bdquo;', 'bdquo'],
				['&lsaquo;', 'lsaquo'],
				['&rsaquo;', 'rsaquo'],
				['&laquo;', 'laquo'],
				['&raquo;', 'raquo'],
				['&quot;', 'quot'],
				['&hellip;', 'hellip'],
				['&iquest;', 'iquest'],
				['&iexcl;', 'iexcl'],
				['&bull;', 'bull'],
				['&dagger;', 'dagger'],
				['&Dagger;', 'Dagger'],
				['&brvbar;', 'brvbar'],
				['&para;', 'para'],
				['&sect;', 'sect'],
				['&loz;', 'loz'],
				['&#064;', '#064'],
				['&copy;', 'copy'],
				['&reg;', 'reg'],
				['&trade;', 'trade'],
				['&curren;', 'curren'],
				['&cent;', 'cent'],
				['&euro;', 'euro'],
				['&pound;', 'pound'],
				['&yen;', 'yen'],
				['&emsp;', 'emsp'],
				['&ensp;', 'ensp'],
				['&thinsp;', 'thinsp'],
				['&zwj;', 'zwj'],
				['&zwnj;', 'zwnj']
			],
			mathematical: [
				['&minus;', 'minus'],
				['&plusmn;', 'plusmn'],
				['&times;', 'times'],
				['&divide;', 'divide'],
				['&radic;', 'radic'],
				['&sdot;', 'sdot'],
				['&otimes;', 'otimes'],
				['&lowast;', 'lowast'],
				['&ge;', 'ge'],
				['&le;', 'le'],
				['&ne;', 'ne'],
				['&asymp;', 'asymp'],
				['&sim;', 'sim'],
				['&prop;', 'prop'],
				['&deg;', 'deg'],
				['&prime;', 'prime'],
				['&Prime;', 'Prime'],
				['&micro;', 'micro'],
				['&ang;', 'ang'],
				['&perp;', 'perp'],
				['&permil;', 'permil'],
				['&frasl;', 'frasl'],
				['&frac14;', 'frac14'],
				['&frac12;', 'frac12'],
				['&frac34;', 'frac34'],
				['&sup1;', 'sup1'],
				['&sup2;', 'sup2'],
				['&sup3;', 'sup3'],
				['&not;', 'not'],
				['&and;', 'and'],
				['&or;', 'or'],
				['&there4;', 'there4'],
				['&cong;', 'cong'],
				['&isin;', 'isin'],
				['&ni;', 'ni'],
				['&notin;', 'notin'],
				['&sub;', 'sub'],
				['&sube;', 'sube'],
				['&nsub;', 'nsub'],
				['&sup;', 'sup'],
				['&supe;', 'supe'],
				['&cap;', 'cap'],
				['&cup;', 'cup'],
				['&oplus;', 'oplus'],
				['&nabla;', 'nabla'],
				['&empty;', 'empty'],
				['&equiv;', 'equiv'],
				['&sum;', 'sum'],
				['&prod;', 'prod'],
				['&weierp;', 'weierp'],
				['&exist;', 'exist'],
				['&forall;', 'forall'],
				['&infin;', 'infin'],
				['&alefsym;', 'alefsym'],
				['&real;', 'real'],
				['&image;', 'image'],
				['&fnof;', 'fnof'],
				['&int;', 'int'],
				['&part;', 'part'],
				['&Alpha;', 'Alpha'],
				['&alpha;', 'alpha'],
				['&Beta;', 'Beta'],
				['&beta;', 'beta'],
				['&Gamma;', 'Gamma'],
				['&gamma;', 'gamma'],
				['&Delta;', 'Delta'],
				['&delta;', 'delta'],
				['&Epsilon;', 'Epsilon'],
				['&epsilon;', 'epsilon'],
				['&Zeta;', 'Zeta'],
				['&zeta;', 'zeta'],
				['&Eta;', 'Eta'],
				['&eta;', 'eta'],
				['&Theta;', 'Theta'],
				['&theta;', 'theta'],
				['&thetasym;', 'thetasym'],
				['&Iota;', 'Iota'],
				['&iota;', 'iota'],
				['&Kappa;', 'Kappa'],
				['&kappa;', 'kappa'],
				['&Lambda;', 'Lambda'],
				['&lambda;', 'lambda'],
				['&Mu;', 'Mu'],
				['&mu;', 'mu'],
				['&Nu;', 'Nu'],
				['&nu;', 'nu'],
				['&Xi;', 'Xi'],
				['&xi;', 'xi'],
				['&Omicron;', 'Omicron'],
				['&omicron;', 'omicron'],
				['&Pi;', 'Pi'],
				['&pi;', 'pi'],
				['&piv;', 'piv'],
				['&Rho;', 'Rho'],
				['&rho;', 'rho'],
				['&Sigma;', 'Sigma'],
				['&sigma;', 'sigma'],
				['&sigmaf;', 'sigmaf'],
				['&Tau;', 'Tau'],
				['&tau;', 'tau'],
				['&Upsilon;', 'Upsilon'],
				['&upsih;', 'upsih'],
				['&upsilon;', 'upsilon'],
				['&Phi;', 'Phi'],
				['&phi;', 'phi'],
				['&Chi;', 'Chi'],
				['&chi;', 'chi'],
				['&Psi;', 'Psi'],
				['&psi;', 'psi'],
				['&Omega;', 'Omega'],
				['&omega;', 'omega']
			],
			graphical: [
				['&crarr;', 'crarr'],
				['&uarr;', 'uarr'],
				['&darr;', 'darr'],
				['&larr;', 'larr'],
				['&rarr;', 'rarr'],
				['&harr;', 'harr'],
				['&uArr;', 'uArr'],
				['&dArr;', 'dArr'],
				['&lArr;', 'lArr'],
				['&rArr;', 'rArr'],
				['&hArr;', 'hArr'],
				['&nbsp;', 'nbsp'],
				['&nbsp;', 'nbsp'],
				['&nbsp;', 'nbsp'],
				['&nbsp;', 'nbsp'],
				['&clubs;', 'clubs'],
				['&diams;', 'diams'],
				['&hearts;', 'hearts'],
				['&spades;', 'spades']
			]
		},
		/*
		 * This function gets called when the button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			switch (buttonId) {
				case 'InsertCharacter':
					this.openDialogue(
						buttonId,
						'Insert special character',
						this.getWindowDimensions(
							{
								width: 434,
								height: 360
							},
							buttonId
						),
						this.buildTabItems()
					);
					break;
				case 'InsertSoftHyphen':
					this.insertEntity('\xAD');
					break;
			}
			return false;
		},
		/*
		 * Open the dialogue window
		 *
		 * @param	string		buttonId: the button id
		 * @param	string		title: the window title
		 * @param	integer		dimensions: the opening width of the window
		 * @param	object		tabItems: the configuration of the tabbed panel
		 * @param	function	handler: handler when the OK button if clicked
		 *
		 * @return	void
		 */
		openDialogue: function (buttonId, title, dimensions, tabItems, handler) {
			this.dialog = new Ext.Window({
				title: this.localize(title),
				cls: 'htmlarea-window',
				border: false,
				width: dimensions.width,
				height: 'auto',
				iconCls: this.getButton(buttonId).iconCls,
				listeners: {
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: {
					xtype: 'tabpanel',
					activeTab: 0,
					listeners: {
						activate: {
							fn: this.resetFocus,
							scope: this
						},
						tabchange: {
							fn: this.syncHeight,
							scope: this
						}
					},
					items: tabItems
				},
				buttons: [
					this.buildButtonConfig('Cancel', this.onCancel)
				]
			});
			this.show();
		},
		/*
		 * Build the configuration of the the tab items
		 *
		 * @return	array	the configuration array of tab items
		 */
		buildTabItems: function () {
			var tabItems = [];
			for (var id in this.maps) {
				tabItems.push({
					xtype: 'box',
					cls: 'character-map',
					title: this.localize(id),
					itemId: id,
					tpl: new Ext.XTemplate(
						'<tpl for="."><a href="#" class="character" hidefocus="on" ext:qtitle="<span>&</span>{1};" ext:qtip="{2}">{0}</a></tpl>'
					),
					listeners: {
						render: {
							fn: this.renderMap,
							scope: this
						}
					}
				});
			}
			return tabItems;
		},

		/**
		 * Render an array of characters
		 *
		 * @param object component: the box containing the characters
		 * @return void
		 */
		renderMap: function (component) {
			component.tpl.overwrite(component.el, this.maps[component.itemId]);
			var self = this;
			Event.on(component.el.dom, 'click', function (event) { return self.insertCharacter(event); }, {delegate: 'a'});
		},

		/**
		 * Handle the click on an item of the map
		 *
		 * @param object event: the jQuery event
		 * @return boolean
		 */
		insertCharacter: function (event) {
			Event.stopEvent(event);
			this.restoreSelection();
			var entity = event.target.innerHTML;
			this.insertEntity(entity);
			this.saveSelection();
			return false;
		},

		/**
		 * Insert the selected entity
		 *
		 * @param	string		entity: the entity to insert at the current selection
		 *
		 * @return	void
		 */
		insertEntity: function (entity) {
			// Firefox, WebKit and IE convert '&nbsp;' to '&amp;nbsp;'
			var node = this.editor.document.createTextNode(((UserAgent.isGecko || UserAgent.isWebKit || UserAgent.isIE) && entity == '&nbsp;') ? '\xA0' : entity);
			this.editor.getSelection().insertNode(node);
			this.editor.getSelection().selectNode(node, false);
		},

		/**
		 * Reset focus on the the current selection, if at all possible
		 *
		 */
		resetFocus: function () {
			this.restoreSelection();
		},

		/**
		 * Remove listeners before closing the window
		 */		
		removeListeners: function () {
			var components = this.dialog.findByType('box');
			for (var i = components.length; --i > 0;) {
				if (components[i].el) {
					Event.off(components[i].el.dom);
				}
			}			
		}
	});

	return CharacterMap;

});

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
 * Text Style Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/TextStyle',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/CSS/Parser',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Dom, Event, Parser, Util) {

	var TextStyle = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(TextStyle, Plugin);
	Util.apply(TextStyle.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {
			this.cssArray = {};
			this.classesUrl = this.editorConfiguration.classesUrl;
			this.pageTSconfiguration = this.editorConfiguration.buttons.textstyle;
			this.tags = (this.pageTSconfiguration && this.pageTSconfiguration.tags) ? this.pageTSconfiguration.tags : {};
			var allowedClasses;
			for (var tagName in this.tags) {
				if (this.tags[tagName].allowedClasses) {
					allowedClasses = this.tags[tagName].allowedClasses.trim().split(",");
					for (var i = allowedClasses.length; --i >= 0;) {
						allowedClasses[i] = allowedClasses[i].trim().replace(/\*/g, ".*");
					}
					this.tags[tagName].allowedClasses = new RegExp( "^(" + allowedClasses.join("|") + ")$", "i");
				}
			}
			this.showTagFreeClasses = this.pageTSconfiguration ? this.pageTSconfiguration.showTagFreeClasses : false;
			this.prefixLabelWithClassName = this.pageTSconfiguration ? this.pageTSconfiguration.prefixLabelWithClassName : false;
			this.postfixLabelWithClassName = this.pageTSconfiguration ? this.pageTSconfiguration.postfixLabelWithClassName : false;

			// Regular expression to check if an element is an inline element
			this.REInlineTags = /^(a|abbr|acronym|b|bdo|big|cite|code|del|dfn|em|i|img|ins|kbd|q|samp|small|span|strike|strong|sub|sup|tt|u|var)$/;

			// Allowed attributes on inline elements
			this.allowedAttributes = new Array('id', 'title', 'lang', 'xml:lang', 'dir', 'class', 'itemscope', 'itemtype', 'itemprop');

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.3',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: this.localize('Technische Universitat Ilmenau'),
				sponsorUrl	: 'http://www.tu-ilmenau.de/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the dropdown list
			 */
			var buttonId = 'TextStyle';
			var fieldLabel = this.pageTSconfiguration ? this.pageTSconfiguration.fieldLabel : '';
			if ((typeof fieldLabel !== 'string' || !fieldLabel.length) && this.isButtonInToolbar('I[text_style]')) {
				fieldLabel = this.localize('text_style');
			}
			var dropDownConfiguration = {
				id: buttonId,
				tooltip: this.localize(buttonId + '-Tooltip'),
				fieldLabel: fieldLabel,
				options: [[this.localize('No style'), 'none']],
				action: 'onChange'
			};
			if (this.pageTSconfiguration) {
				if (this.pageTSconfiguration.width) {
					dropDownConfiguration.width = parseInt(this.pageTSconfiguration.width, 10);
				}
				if (this.pageTSconfiguration.listWidth) {
					dropDownConfiguration.listWidth = parseInt(this.pageTSconfiguration.listWidth, 10);
				}
				if (this.pageTSconfiguration.maxHeight) {
					dropDownConfiguration.maxHeight = parseInt(this.pageTSconfiguration.maxHeight, 10);
				}
			}
			this.registerDropDown(dropDownConfiguration);
			return true;
		},

		/**
		 * Determine whether the element is an inline element
		 *
		 * @param object el: the element
		 * @return boolen true if the element is an inline element
		 */
		isInlineElement: function (el) {
			return el && (el.nodeType === Dom.ELEMENT_NODE) && this.REInlineTags.test(el.nodeName.toLowerCase());
		},

		/**
		 * This function adds an attribute to the array of allowed attributes on inline elements
		 *
		 * @param	string	attribute: the name of the attribute to be added to the array
		 *
		 * @return	void
		 */
		addAllowedAttribute: function (attribute) {
			this.allowedAttributes.push(attribute);
		},

		/**
		 * This function gets called when some style in the drop-down list applies it to the highlighted textt
		 */
		onChange: function (editor, select) {
			var className = select.getValue();
			var classNames = null;
			var fullNodeSelected = false;
			var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null;
			var range = this.editor.getSelection().createRange();
			var parent = this.editor.getSelection().getParentElement();
			var selectionEmpty = this.editor.getSelection().isEmpty();
			var ancestors = this.editor.getSelection().getAllAncestors();

			if (!selectionEmpty) {
					// The selection is not empty
				for (var i = 0; i < ancestors.length; ++i) {
					fullNodeSelected = (statusBarSelection === ancestors[i] && ancestors[i].textContent === range.toString()) || (!statusBarSelection && ancestors[i].textContent === range.toString());
					if (fullNodeSelected) {
						if (this.isInlineElement(ancestors[i])) {
							parent = ancestors[i];
						}
						break;
					}
				}
					// Working around bug in Safari selectNodeContents
				if (!fullNodeSelected && UserAgent.isWebKit && statusBarSelection && this.isInlineElement(statusBarSelection) && statusBarSelection.textContent === range.toString()) {
					fullNodeSelected = true;
					parent = statusBarSelection;
				}
			}
			if (!selectionEmpty && !fullNodeSelected || (!selectionEmpty && fullNodeSelected && parent && Dom.isBlockElement(parent))) {
					// The selection is not empty, nor full element, or the selection is full block element
				if (className !== 'none') {
						// Add span element with class attribute
					var newElement = editor.document.createElement('span');
					Dom.addClass(newElement, className);
					editor.getDomNode().wrapWithInlineElement(newElement, range);
					range.detach();
				}
			} else {
				this.applyClassChange(parent, className);
			}
		},

		/**
		 * This function applies the class change to the node
		 *
		 * @param	object	node: the node on which to apply the class change
		 * @param	string	className: the class to add, 'none' to remove the last class added to the class attribute
		 * @param	boolean	noRemove: true not to remove a span element with no more attribute
		 *
		 * @return	void
		 */
		applyClassChange: function (node, className, noRemove) {
				// Add or remove class
			if (node && !Dom.isBlockElement(node)) {
				if (className === 'none' && node.className && /\S/.test(node.className)) {
					classNames = node.className.trim().split(' ');
					Dom.removeClass(node, classNames[classNames.length-1]);
				}
				if (className !== 'none') {
					Dom.addClass(node, className);
				}
					// Remove the span tag if it has no more attribute
				if (/^span$/i.test(node.nodeName) && !Dom.hasAllowedAttributes(node, this.allowedAttributes) && !noRemove) {
					this.editor.getDomNode().removeMarkup(node);
				}
			}
		},

		/**
		 * This function gets called when the plugin is generated
		 * Get the classes configuration and initiate the parsing of the style sheets
		 */
		onGenerate: function () {
			var self = this;
			// Monitor editor changing mode
			Event.on(this.editor, 'HTMLAreaEventModeChange', function (event, mode) { Event.stopEvent(event); self.onModeChange(mode); return false; });
			// Create CSS Parser object
			this.textStyles = new Parser({
				prefixLabelWithClassName: this.prefixLabelWithClassName,
				postfixLabelWithClassName: this.postfixLabelWithClassName,
				showTagFreeClasses: this.showTagFreeClasses,
				tags: this.tags,
				editor: this.editor
			});
			// Disable the dropdown while initialization completes
			var dropDown = this.getButton('TextStyle');
			if (dropDown) {
				dropDown.setDisabled(true);
			}
			// Monitor css parsing being completed
			Event.one(this.textStyles, 'HTMLAreaEventCssParsingComplete', function (event) { Event.stopEvent(event); self.onCssParsingComplete(); return false; }); 
			this.textStyles.parse();
		},

		/**
		 * This handler gets called when parsing of css classes is completed
		 */
		onCssParsingComplete: function () {
			if (this.textStyles.isReady()) {
				this.cssArray = this.textStyles.getClasses();
				if (this.getEditorMode() === 'wysiwyg' && this.editor.isEditable()) {
					this.updateToolbar('TextStyle');
				}
			}
		},

		/**
		 * This handler gets called when the toolbar is being updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			if (mode === 'wysiwyg' && this.editor.isEditable() && this.textStyles.isReady()) {
				this.updateToolbar(button.itemId);
			}
		},

		/**
		 * This handler gets called when the editor has changed its mode to "wysiwyg"
		 */
		onModeChange: function (mode) {
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				this.updateToolbar('TextStyle');
			}
		},

		/**
		* This function gets called when the drop-down list needs to be refreshed
		*/
		updateToolbar: function (dropDownId) {
			var editor = this.editor;
			if (this.getEditorMode() === "wysiwyg" && this.editor.isEditable()) {
				var tagName = false, classNames = Array(), fullNodeSelected = false;
				var statusBarSelection = editor.statusBar ? editor.statusBar.getSelection() : null;
				var range = editor.getSelection().createRange();
				var parent = editor.getSelection().getParentElement();
				var ancestors = editor.getSelection().getAllAncestors();
				if (parent && !Dom.isBlockElement(parent)) {
					tagName = parent.nodeName.toLowerCase();
					if (parent.className && /\S/.test(parent.className)) {
						classNames = parent.className.trim().split(" ");
					}
				}
				var selectionEmpty = editor.getSelection().isEmpty();
				if (!selectionEmpty) {
					for (var i = 0; i < ancestors.length; ++i) {
						fullNodeSelected = (statusBarSelection === ancestors[i]) && ancestors[i].textContent === range.toString();
						if (fullNodeSelected) {
							if (!Dom.isBlockElement(ancestors[i])) {
								tagName = ancestors[i].nodeName.toLowerCase();
								if (ancestors[i].className && /\S/.test(ancestors[i].className)) {
									classNames = ancestors[i].className.trim().split(" ");
								}
							}
							break;
						}
					}
						// Working around bug in Safari selectNodeContents
					if (!fullNodeSelected && UserAgent.isWebKit && statusBarSelection && this.isInlineElement(statusBarSelection) && statusBarSelection.textContent === range.toString()) {
						fullNodeSelected = true;
						tagName = statusBarSelection.nodeName.toLowerCase();
						if (statusBarSelection.className && /\S/.test(statusBarSelection.className)) {
							classNames = statusBarSelection.className.trim().split(" ");
						}
					}
				}
				var selectionInInlineElement = tagName && this.REInlineTags.test(tagName);
				var disabled = !editor.getSelection().endPointsInSameBlock() || (fullNodeSelected && !tagName) || (selectionEmpty && !selectionInInlineElement);
				if (!disabled && !tagName) {
					tagName = "span";
				}
				this.updateValue(dropDownId, tagName, classNames, selectionEmpty, fullNodeSelected, disabled);
			} else {
				var dropDown = this.getButton(dropDownId);
				if (dropDown) {
					dropDown.setDisabled(!dropDown.textMode);
				}
			}
		},

		/**
		 * This function reinitializes the options of the dropdown
		 */
		initializeDropDown: function (dropDown) {
			switch (dropDown.xtype) {
				case 'htmlareaselect':
					dropDown.removeAll();
					dropDown.setFirstOption(this.localize('No style'), 'none', this.localize('No style'));
					dropDown.setValue('none');
					break;
				case 'combo':
					var store = dropDown.getStore();
					store.removeAll(false);
					store.insert(0, new store.recordType({
						text: this.localize('No style'),
						value: 'none'
					}));
					dropDown.setValue('none');
			}
		},

		/**
		 * This function builds the options to be displayed in the dropDown box
		 */
		buildDropDownOptions: function (dropDown, nodeName) {
			this.initializeDropDown(dropDown);
			switch (dropDown.xtype) {
				case 'htmlareaselect':
					if (this.textStyles.isReady()) {
						var allowedClasses = {};
						if (this.REInlineTags.test(nodeName)) {
							if (typeof this.cssArray[nodeName] !== 'undefined') {
								allowedClasses = this.cssArray[nodeName];
							} else if (this.showTagFreeClasses && typeof this.cssArray['all'] !== 'undefined') {
								allowedClasses = this.cssArray['all'];
							}
						}
						for (var cssClass in allowedClasses) {
							if (typeof HTMLArea.classesSelectable[cssClass] === 'undefined' || HTMLArea.classesSelectable[cssClass]) {
								var style = (!(this.pageTSconfiguration && this.pageTSconfiguration.disableStyleOnOptionLabel) && HTMLArea.classesValues && HTMLArea.classesValues[cssClass] && !HTMLArea.classesNoShow[cssClass]) ? HTMLArea.classesValues[cssClass] : null;
								dropDown.addOption(allowedClasses[cssClass], cssClass, cssClass, style);
							}
						}
					}
					break;
				case 'combo':
					var store = dropDown.getStore();
					if (this.textStyles.isReady()) {
						var allowedClasses = {};
						if (this.REInlineTags.test(nodeName)) {
							if (typeof this.cssArray[nodeName] !== 'undefined') {
								allowedClasses = this.cssArray[nodeName];
							} else if (this.showTagFreeClasses && typeof this.cssArray['all'] !== 'undefined') {
								allowedClasses = this.cssArray['all'];
							}
						}
						for (var cssClass in allowedClasses) {
							if (typeof HTMLArea.classesSelectable[cssClass] === 'undefined' || HTMLArea.classesSelectable[cssClass]) {
								store.add(new store.recordType({
									text: allowedClasses[cssClass],
									value: cssClass,
									style: (!(this.pageTSconfiguration && this.pageTSconfiguration.disableStyleOnOptionLabel) && HTMLArea.classesValues && HTMLArea.classesValues[cssClass] && !HTMLArea.classesNoShow[cssClass]) ? HTMLArea.classesValues[cssClass] : null
								}));
							}
						}
					}
			}
		},

		/**
		 * This function sets the selected option of the dropDown box
		 */
		setSelectedOption: function (dropDown, classNames, noUnknown, defaultClass) {
			switch (dropDown.xtype) {
				case 'htmlareaselect':
					dropDown.setValue('none');
					if (classNames.length) {
						var index = dropDown.findValue(classNames[classNames.length-1]);
						if (index !== -1) {
							dropDown.setValueByIndex(index);
							if (!defaultClass) {
								var text = this.localize('Remove style');
								dropDown.setFirstOption(text, 'none', text);
							}
						}
						if (index === -1 && !noUnknown) {
							var text = this.localize('Unknown style');
							var value = classNames[classNames.length-1];
							if (typeof HTMLArea.classesSelectable[value] !== 'undefined' && !HTMLArea.classesSelectable[value] && typeof HTMLArea.classesLabels[value] !== 'undefined') {
								text = HTMLArea.classesLabels[value];
							}
							var style = (!(this.pageTSconfiguration && this.pageTSconfiguration.disableStyleOnOptionLabel) && HTMLArea.classesValues && HTMLArea.classesValues[value] && !HTMLArea.classesNoShow[value]) ? HTMLArea.classesValues[value] : null;
							dropDown.addOption(text, value, value, style);
							dropDown.setValue(value);
							if (!defaultClass) {
								text = this.localize('Remove style');
								dropDown.setFirstOption(text, 'none', text);
							}
						}
						// Remove already assigned classes from the dropDown box
						var selectedValue = dropDown.getValue();
						for (var i = 0, n = classNames.length; i < n; i++) {
							index = dropDown.findValue(classNames[i]);
							if (index !== -1) {
								if (dropDown.getOptionValue(index) !== selectedValue) {
									dropDown.removeAt(index);
								}
							}
						}
					}
					dropDown.setDisabled(!dropDown.getCount() || (dropDown.getCount() === 1 && dropDown.getValue() === 'none'));
					break;
				case 'combo':
					var store = dropDown.getStore();
					dropDown.setValue('none');
					if (classNames.length) {
						var index = store.findExact('value', classNames[classNames.length-1]);
						if (index !== -1) {
							dropDown.setValue(classNames[classNames.length-1]);
							if (!defaultClass) {
								store.getAt(0).set('text', this.localize('Remove style'));
							}
						}
						if (index === -1 && !noUnknown) {
							var text = this.localize('Unknown style');
							var value = classNames[classNames.length-1];
							if (typeof HTMLArea.classesSelectable[value] !== 'undefined' && !HTMLArea.classesSelectable[value] && typeof HTMLArea.classesLabels[value] !== 'undefined') {
								text = HTMLArea.classesLabels[value];
							}
							store.add(new store.recordType({
								text: text,
								value: value,
								style: (!(this.pageTSconfiguration && this.pageTSconfiguration.disableStyleOnOptionLabel) && HTMLArea.classesValues && HTMLArea.classesValues[value] && !HTMLArea.classesNoShow[value]) ? HTMLArea.classesValues[value] : null
							}));
							dropDown.setValue(value);
							if (!defaultClass) {
								store.getAt(0).set('text', this.localize('Remove style'));
							}
						}
						// Remove already assigned classes from the dropDown box
						var classNamesString = ',' + classNames.join(',') + ',';
						var selectedValue = dropDown.getValue(), optionValue;
						store.each(function (option) {
							optionValue = option.get('value');
							if (classNamesString.indexOf(',' + optionValue + ',') !== -1 && optionValue !== selectedValue) {
								store.removeAt(store.indexOf(option));
							}
							return true;
						});
					}
					dropDown.setDisabled(!store.getCount() || (store.getCount() == 1 && dropDown.getValue() == 'none'));
					break;
			}
		},

		/**
		 * This function updates the current value of the dropdown list
		 */
		updateValue: function (dropDownId, nodeName, classNames, selectionEmpty, fullNodeSelected, disabled) {
			var editor = this.editor;
			var dropDown = this.getButton(dropDownId);
			if (dropDown) {
				this.buildDropDownOptions(dropDown, nodeName);
				if (classNames.length && (selectionEmpty || fullNodeSelected)) {
					this.setSelectedOption(dropDown, classNames);
				}
				dropDown.setDisabled(!dropDown.getCount() || (dropDown.getCount() === 1 && dropDown.getValue() === 'none') || disabled);
			}
		}
	});

	return TextStyle;

});

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
 * TYPO3Link plugin for htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/TYPO3Link',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Dom, Util) {

	var TYPO3Link = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(TYPO3Link, Plugin);
	Util.apply(TYPO3Link.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {
			this.pageTSConfiguration = this.editorConfiguration.buttons.link;
			this.modulePath = this.pageTSConfiguration.pathLinkModule;
			this.classesAnchorUrl = this.pageTSConfiguration.classesAnchorUrl;

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.2',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			/*
			 * Registering the buttons
			 */
			var buttonList = this.buttonList, buttonId;
			for (var i = 0; i < buttonList.length; ++i) {
				var button = buttonList[i];
				buttonId = button[0];
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize(buttonId.toLowerCase()),
					iconCls		: 'htmlarea-action-' + button[4],
					action		: 'onButtonPress',
					hotKey		: (this.pageTSConfiguration ? this.pageTSConfiguration.hotKey : null),
					context		: button[1],
					selection	: button[2],
					dialog		: button[3]
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		},
		/*
		 * The list of buttons added by this plugin
		 */
		buttonList: [
			['CreateLink', 'a,img', false, true, 'link-edit'],
			['UnLink', 'a', false, false, 'unlink']
		],
		/*
		 * This function is invoked when the editor is being generated
		 */
		onGenerate: function () {
				// Download the definition of special anchor classes if not yet done
			if (this.classesAnchorUrl && typeof HTMLArea.classesAnchorSetup === 'undefined') {
				this.getJavascriptFile(this.classesAnchorUrl, function (options, success, response) {
					if (success) {
						try {
							if (typeof HTMLArea.classesAnchorSetup === 'undefined') {
								eval(response.responseText);
							}
						} catch(e) {
							this.appendToLog('ongenerate', 'Error evaluating contents of Javascript file: ' + this.classesAnchorUrl, 'error');
						}
					}
				});
			}
		},
		/*
		 * This function gets called when the button was pressed
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 * @param	object		target: the target element of the contextmenu event, when invoked from the context menu
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function(editor, id, target) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
				// Download the definition of special anchor classes if not yet done
			if (this.classesAnchorUrl && typeof HTMLArea.classesAnchorSetup === 'undefined') {
				this.getJavascriptFile(this.classesAnchorUrl, function (options, success, response) {
					if (success) {
						try {
							if (typeof HTMLArea.classesAnchorSetup === 'undefined') {
								eval(response.responseText);
							}
							this.onButtonPress(editor, id, target);
						} catch(e) {
							this.appendToLog('onButtonPress', 'Error evaluating contents of Javascript file: ' + this.classesAnchorUrl, 'error');
						}
					}
				});
			} else {
				if (buttonId === 'UnLink') {
					this.unLink(true);
					return false;
				}
				var additionalParameter;
				var node = this.editor.getSelection().getParentElement();
				var el = this.editor.getSelection().getFirstAncestorOfType('a');
				if (el != null) {
					node = el;
				}
				if (node != null && /^a$/i.test(node.nodeName)) {
					additionalParameter = '&curUrl[href]=' + encodeURIComponent(node.getAttribute('href'));
					if (node.target) additionalParameter += '&curUrl[target]=' + encodeURIComponent(node.target);
					if (node.className) additionalParameter += '&curUrl[class]=' + encodeURIComponent(node.className);
					if (node.title) additionalParameter += '&curUrl[title]=' + encodeURIComponent(node.title);
					if (this.pageTSConfiguration && this.pageTSConfiguration.additionalAttributes) {
						var additionalAttributes = this.pageTSConfiguration.additionalAttributes.split(',');
						for (var i = additionalAttributes.length; --i >= 0;) {
								// hasAttribute() not available in IE < 8
							if ((node.hasAttribute && node.hasAttribute(additionalAttributes[i])) || node.getAttribute(additionalAttributes[i]) != null) {
								additionalParameter += '&curUrl[' + additionalAttributes[i] + ']=' + encodeURIComponent(node.getAttribute(additionalAttributes[i]));
							}
						}
					}
				} else if (!this.editor.getSelection().isEmpty()) {
					var text = this.editor.getSelection().getHtml();
					if (text && text != null) {
						var offset = text.toLowerCase().indexOf('<a');
						if (offset != -1) {
							var ATagContent = text.substring(offset+2);
							offset = ATagContent.toUpperCase().indexOf('>');
							ATagContent = ATagContent.substring(0, offset);
							additionalParameter = '&curUrl[all]=' + encodeURIComponent(ATagContent);
						}
					}
				}
				this.openContainerWindow(
					buttonId,
					this.getButton(buttonId).tooltip,
					this.getWindowDimensions(
						{
							width:	top.TYPO3.configuration.RTEPopupWindow.width,
							height:	top.TYPO3.configuration.RTEPopupWindow.height
						},
						buttonId
					),
					this.makeUrlFromModulePath(this.modulePath, additionalParameter)
				);
			}
			return false;
		},
		/*
		 * Add a link to the selection.
		 * This function is called from the TYPO3 link popup.
		 *
		 * @param	string	theLink: the href attribute of the link to be created
		 * @param	string	cur_target: value for the target attribute
		 * @param	string	cur_class: value for the class attribute
		 * @param	string	cur_title: value for the title attribute
		 * @param	object	additionalValues: values for additional attributes (may be used by extension)
		 *
		 * @return void
		 */
		createLink: function(theLink,cur_target,cur_class,cur_title,additionalValues) {
			var range, anchorClass, imageNode = null, addIconAfterLink;
			this.restoreSelection();
			var node = this.editor.getSelection().getFirstAncestorOfType('a');
			if (!node) {
				node = this.editor.getSelection().getParentElement();
			}
			if (HTMLArea.classesAnchorSetup && cur_class) {
				for (var i = HTMLArea.classesAnchorSetup.length; --i >= 0;) {
					anchorClass = HTMLArea.classesAnchorSetup[i];
					if (anchorClass.name == cur_class && anchorClass.image) {
						imageNode = this.editor.document.createElement('img');
						imageNode.src = anchorClass.image;
						imageNode.alt = anchorClass.altText;
						addIconAfterLink = anchorClass.addIconAfterLink;
						break;
					}
				}
			}
			if (node != null && /^a$/i.test(node.nodeName)) {
					// Update existing link
				this.editor.getSelection().selectNode(node);
				range = this.editor.getSelection().createRange();
					// Clean images, keep links
				if (HTMLArea.classesAnchorSetup) {
					this.cleanAllLinks(node, range, true);
				}
					// Update link href
					// In IE, setting href may update the content of the element. We don't want this feature.
				if (UserAgent.isIE) {
					var content = node.innerHTML;
				}
				node.href = UserAgent.isGecko ? encodeURI(theLink) : theLink;
				if (UserAgent.isIE) {
					node.innerHTML = content;
				}
					// Update link attributes
				this.setLinkAttributes(node, range, cur_target, cur_class, cur_title, imageNode, addIconAfterLink, additionalValues);
			} else {
				// Create new link
				// Cleanup selected range
				range = this.editor.getSelection().createRange();
				// Clean existing anchors otherwise Mozilla may create nested anchors
				// Selection may be lost when cleaning links
				var bookMark = this.editor.getBookMark().get(range);
				this.cleanAllLinks(node, range);
				range = this.editor.getBookMark().moveTo(bookMark);
				this.editor.getSelection().selectRange(range);
				if (UserAgent.isGecko) {
					this.editor.getSelection().execCommand('CreateLink', false, encodeURI(theLink));
				} else {
					this.editor.getSelection().execCommand('CreateLink', false, theLink);
				}
				// Get the created link or parent
				node = this.editor.getSelection().getParentElement();
				// Re-establish the range of the selection
				range = this.editor.getSelection().createRange();
				if (node) {
						// Export trailing br that IE may include in the link
					if (UserAgent.isIE) {
						if (node.lastChild && /^br$/i.test(node.lastChild.nodeName)) {
							Dom.removeFromParent(node.lastChild);
							node.parentNode.insertBefore(this.editor.document.createElement('br'), node.nextSibling);
						}
					}
						// We may have created multiple links in as many blocks
					this.setLinkAttributes(node, range, cur_target, cur_class, cur_title, imageNode, addIconAfterLink, additionalValues);
				}
				// Set the selection on the last link created
				this.editor.getSelection().selectNodeContents(node);
			}
			this.close();
		},

		/**
		 * Unlink the selection.
		 * This function is called from the TYPO3 link popup and from unlink button pressed in toolbar or context menu.
		 *
		 * @param	string	buttonPressd: true if the unlink button was pressed
		 *
		 * @return void
		 */
		unLink: function (buttonPressed) {
				// If no dialogue window was opened, the selection should not be restored
			if (!buttonPressed) {
				this.restoreSelection();
			}
			var node = this.editor.getSelection().getParentElement();
			var el = this.editor.getSelection().getFirstAncestorOfType('a');
			if (el != null) {
				node = el;
			}
			if (node != null && /^a$/i.test(node.nodeName)) {
				this.editor.getSelection().selectNode(node);
			}
			if (HTMLArea.classesAnchorSetup) {
				var range = this.editor.getSelection().createRange();
				this.cleanAllLinks(node, range, false);
			} else {
				this.editor.getSelection().execCommand('Unlink', false, '');
			}
			if (this.dialog) {
				this.close();
			}
		},

		/**
		 * Set attributes of anchors intersecting a range in the given node
		 *
		 * @param object node: a node that may interesect the range
		 * @param object range: set attributes on all nodes intersecting this range
		 * @param string cur_target: value for the target attribute
		 * @param string cur_class: value for the class attribute
		 * @param string cur_title: value for the title attribute
		 * @param object imageNode: image to clone and append to the anchor
		 * @param boolean addIconAfterLink: add icon after rather than before the link
		 * @param object additionalValues: values for additional attributes (may be used by extension)
		 * @return void
		 */
		setLinkAttributes: function(node, range, cur_target, cur_class, cur_title, imageNode, addIconAfterLink, additionalValues) {
			if (/^a$/i.test(node.nodeName)) {
				var nodeInRange = false;
				this.editor.focus();
				nodeInRange = Dom.rangeIntersectsNode(range, node);
				if (nodeInRange) {
					if (imageNode != null) {
						if (addIconAfterLink) {
							node.appendChild(imageNode.cloneNode(false));
						} else {
							node.insertBefore(imageNode.cloneNode(false), node.firstChild);
						}
					}
					if (UserAgent.isGecko) {
						node.href = decodeURI(node.getAttributeNode('href').value);
					}
					if (cur_target.trim()) node.target = cur_target.trim();
						else node.removeAttribute('target');
					if (cur_class.trim()) {
						node.className = cur_class.trim();
					} else {
						if (!UserAgent.isOpera) {
							node.removeAttribute('class');
						} else {
							node.className = '';
						}
					}
					if (cur_title.trim()) {
						node.title = cur_title.trim();
					} else {
						node.removeAttribute('title');
						node.removeAttribute('rtekeep');
					}
					if (this.pageTSConfiguration && this.pageTSConfiguration.additionalAttributes && typeof(additionalValues) == 'object') {
						for (additionalAttribute in additionalValues) {
							if (additionalValues.hasOwnProperty(additionalAttribute)) {
								if (additionalValues[additionalAttribute].toString().trim()) {
									node.setAttribute(additionalAttribute, additionalValues[additionalAttribute]);
								} else {
									node.removeAttribute(additionalAttribute);
								}
							}
						}
					}
				}
			} else {
				for (var i = node.firstChild; i; i = i.nextSibling) {
					if (i.nodeType === Dom.ELEMENT_NODE || i.nodeType === Dom.DOCUMENT_FRAGMENT_NODE) {
						this.setLinkAttributes(i, range, cur_target, cur_class, cur_title, imageNode, addIconAfterLink, additionalValues);
					}
				}
			}
		},

		/**
		 * Clean up images in special anchor classes
		 */
		cleanClassesAnchorImages: function(node) {
			var nodeArray = [], splitArray1 = [], splitArray2 = [];
			for (var childNode = node.firstChild; childNode; childNode = childNode.nextSibling) {
				if (/^img$/i.test(childNode.nodeName)) {
					splitArray1 = childNode.src.split('/');
					for (var i = HTMLArea.classesAnchorSetup.length; --i >= 0;) {
						if (HTMLArea.classesAnchorSetup[i]['image']) {
							splitArray2 = HTMLArea.classesAnchorSetup[i]['image'].split('/');
							if (splitArray1[splitArray1.length-1] == splitArray2[splitArray2.length-1]) {
								nodeArray.push(childNode);
								break;
							}
						}
					}
				}
			}
			for (i = nodeArray.length; --i >= 0;) {
				node.removeChild(nodeArray[i]);
			}
		},

		/**
		 * Clean up all anchors intesecting with the range in the given node
		 */
		cleanAllLinks: function(node, range, keepLinks) {
			if (/^a$/i.test(node.nodeName)) {
				var intersection = false;
				this.editor.focus();
				intersection = Dom.rangeIntersectsNode(range, node);
				if (intersection) {
					this.cleanClassesAnchorImages(node);
					if (!keepLinks) {
						while (node.firstChild) {
							node.parentNode.insertBefore(node.firstChild, node);
						}
						node.parentNode.removeChild(node);
					}
				}
			} else {
				var child = node.firstChild,
					nextSibling;
				while (child) {
						// Save next sibling as child may be removed
					nextSibling = child.nextSibling;
					if (child.nodeType === Dom.ELEMENT_NODE || child.nodeType === Dom.DOCUMENT_FRAGMENT_NODE) {
						this.cleanAllLinks(child, range, keepLinks);
					}
					child = nextSibling;
				}
			}
		},

		/**
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			button.setInactive(true);
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				switch (button.itemId) {
					case 'CreateLink':
						button.setDisabled(selectionEmpty && !button.isInContext(mode, selectionEmpty, ancestors));
						if (!button.disabled) {
							var node = this.editor.getSelection().getParentElement();
							var el = this.editor.getSelection().getFirstAncestorOfType('a');
							if (el != null) {
								node = el;
							}
							if (node != null && /^a$/i.test(node.nodeName)) {
								button.setTooltip(this.localize('Modify link'));
								button.setInactive(false);
							} else {
								button.setTooltip(this.localize('Insert link'));
							}
						}
						break;
					case 'UnLink':
						var link = false;
							// Let's see if a link was double-clicked in Firefox
						if (UserAgent.isGecko && !selectionEmpty) {
							var range = this.editor.getSelection().createRange();
							if (range.startContainer.nodeType === Dom.ELEMENT_NODE && range.startContainer == range.endContainer && (range.endOffset - range.startOffset == 1)) {
								var node = range.startContainer.childNodes[range.startOffset];
								if (node && /^a$/i.test(node.nodeName) && node.textContent == range.toString()) {
									link = true;
								}
							}
						}
						button.setDisabled(!link && !button.isInContext(mode, selectionEmpty, ancestors));
						break;
				}
			}
		}
	});

	return TYPO3Link;

});

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
 * TextIndicator Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/TextIndicator',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Color',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Dom, Event, Color, Util) {

	var TextIndicator = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(TextIndicator, Plugin);
	Util.apply(TextIndicator.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '1.2',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the indicator
			 */
			var buttonId = 'TextIndicator';
			var textConfiguration = {
				id: buttonId,
				cls: 'indicator',
				text: 'A',
				tooltip: this.localize(buttonId.toLowerCase())
			};
			this.registerText(textConfiguration);
			return true;
		 },

		/**
		 * This handler gets called when the editor is generated
		 */
		onGenerate: function () {
			var self = this;
			// Ensure text indicator is updated AFTER style sheets are loaded
			var blockStylePlugin = this.getPluginInstance('BlockStyle');
			if (blockStylePlugin && blockStylePlugin.blockStyles) {
				// Monitor css parsing being completed
				Event.one(blockStylePlugin.blockStyles, 'HTMLAreaEventCssParsingComplete', function (event) { Event.stopEvent(event); self.onCssParsingComplete(); return false; }); 
			}
			var textStylePlugin = this.getPluginInstance('TextStyle');
			if (textStylePlugin && textStylePlugin.textStyles) {
				// Monitor css parsing being completed
				Event.one(textStylePlugin.textStyles, 'HTMLAreaEventCssParsingComplete', function (event) { Event.stopEvent(event); self.onCssParsingComplete(); return false; });
			}
		},

		/**
		 * This handler gets called when parsing of css classes is completed
		 */
		onCssParsingComplete: function () {
			var button = this.getButton('TextIndicator'),
				selection = this.editor.getSelection(),
				selectionEmpty = selection.isEmpty(),
				ancestors = selection.getAllAncestors(),
				endPointsInSameBlock = selection.endPointsInSameBlock();
			if (button) {
				this.onUpdateToolbar(button, this.getEditorMode(), selectionEmpty, ancestors, endPointsInSameBlock);
			}
		},

		/**
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			var editor = this.editor;
			if (mode === 'wysiwyg' && editor.isEditable()) {
				var doc = editor.document;
				var style = {
					fontWeight: 'normal',
					fontStyle: 'normal'
				};
				try {
					//  Note: IE always reports FFFFFF as background color
					style.backgroundColor = Color.colorToRgb(doc.queryCommandValue((UserAgent.isIE || UserAgent.isWebKit) ? 'BackColor' : 'HiliteColor'));
					style.color = Color.colorToRgb(doc.queryCommandValue('ForeColor'));
					style.fontFamily = doc.queryCommandValue('FontName');
				} catch (e) { }
				// queryCommandValue does not work in Gecko
				if (UserAgent.isGecko) {
					var computedStyle = editor.iframe.getIframeWindow().getComputedStyle(editor.getSelection().getParentElement(), null);
					if (computedStyle) {
						style.color = computedStyle.getPropertyValue('color');
						style.backgroundColor = computedStyle.getPropertyValue('background-color');
						style.fontFamily = computedStyle.getPropertyValue('font-family');
					}
				}
				try {
					style.fontWeight = doc.queryCommandState('Bold') ? 'bold' : 'normal';
				} catch(e) {
					style.fontWeight = 'normal';
				}
				try {
					style.fontStyle = doc.queryCommandState('Italic') ? 'italic' : 'normal';
				} catch(e) {
					style.fontStyle = 'normal';
				}
				Dom.setStyle(button.getEl(), style);
			}
		}
	});

	return TextIndicator;

});

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
 * Find and Replace Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/FindReplace',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, Util) {

	var FindReplace = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(FindReplace, Plugin);
	Util.apply(FindReplace.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.2',
				developer	: 'Cau Guanabara & Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca',
				copyrightOwner	: 'Cau Guanabara & Stanislas Rolland',
				sponsor		: 'Independent production & SJBR',
				sponsorUrl	: 'http://www.sjbr.ca',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the button
			 */
			var buttonId = 'FindReplace';
			var buttonConfiguration = {
				id		: buttonId,
				tooltip		: this.localize('Find and Replace'),
				iconCls		: 'htmlarea-action-find-replace',
				action		: 'onButtonPress',
				dialog		: true
			};
			this.registerButton(buttonConfiguration);

			// Compile regular expression to clean up marks
			this.marksCleaningRE = /(<span\s+[^>]*id="?htmlarea-frmark[^>]*"?>)([^<>]*)(<\/span>)/gi;
			return true;
		},

		/**
		 * This function gets called when the 'Find & Replace' button is pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id, target) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
				// Initialize search variables
			this.buffer = null;
			this.initVariables();
				// Disable the toolbar undo/redo buttons and snapshots while this window is opened
			var plugin = this.getPluginInstance('UndoRedo');
			if (plugin) {
				plugin.stop();
				var undo = this.getButton('Undo');
				if (undo) {
					undo.setDisabled(true);
				}
				var redo = this.getButton('Redo');
				if (redo) {
					redo.setDisabled(true);
				}
			}
				// Open dialogue window
			this.openDialogue(
				buttonId,
				'Find and Replace',
				this.getWindowDimensions(
					{
						width: 410,
						height:360
					},
					buttonId
				)
			);
			return false;
		},

		/**
		 * Open the dialogue window
		 *
		 * @param	string		buttonId: the button id
		 * @param	string		title: the window title
		 * @param	integer		dimensions: the opening width of the window
		 *
		 * @return	void
		 */
		openDialogue: function (buttonId, title, dimensions) {
			this.dialog = new Ext.Window({
				title: this.localize(title),
				cls: 'htmlarea-window',
				border: false,
				width: dimensions.width,
				height: 'auto',
				iconCls: this.getButton(buttonId).iconCls,
				listeners: {
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: [{
						xtype: 'fieldset',
						defaultType: 'textfield',
						labelWidth: 100,
						defaults: {
							labelSeparator: '',
							width: 250,
							listeners: {
								change: {
									fn: this.clearDoc,
									scope: this
								}
							}
						},
						listeners: {
							render: {
								fn: this.initPattern,
								scope: this
							}
						},
						items: [{
								itemId: 'pattern',
								fieldLabel: this.localize('Search for:')
							},{
								itemId: 'replacement',
								fieldLabel: this.localize('Replace with:')
							}
						]
					},{
						xtype: 'fieldset',
						defaultType: 'checkbox',
						title: this.localize('Options'),
						labelWidth: 150,
						items: [{
								itemId: 'words',
								fieldLabel: this.localize('Whole words only'),
								listeners: {
									check: {
										fn: this.clearDoc,
										scope: this
									}
								}
							},{
								itemId: 'matchCase',
								fieldLabel: this.localize('Case sensitive search'),
								listeners: {
									check: {
										fn: this.clearDoc,
										scope: this
									}
								}
							},{
								itemId: 'replaceAll',
								fieldLabel: this.localize('Substitute all occurrences'),
								listeners: {
									check: {
										fn: this.requestReplacement,
										scope: this
									}
								}
							}
						]
					},{
						xtype: 'fieldset',
						defaultType: 'button',
						title: this.localize('Actions'),
						defaults: {
							minWidth: 150,
							disabled: true,
							style: {
								marginBottom: '5px'
							}
						},
						items: [{
								text: this.localize('Clear'),
								itemId: 'clear',
								listeners: {
									click: {
										fn: this.clearMarks,
										scope: this
									}
								}
							},{
								text: this.localize('Highlight'),
								itemId: 'hiliteall',
								listeners: {
									click: {
										fn: this.hiliteAll,
										scope: this
									}
								}
							},{
								text: this.localize('Undo'),
								itemId: 'undo',
								listeners: {
									click: {
										fn: this.resetContents,
										scope: this
									}
								}
							}
						]
					}
				],
				buttons: [
					this.buildButtonConfig('Next', this.onNext),
					this.buildButtonConfig('Done', this.onCancel)
				]
			});
			this.show();
		},
		/*
		 * Handler invoked to initialize the pattern to search
		 *
		 * @param	object		fieldset: the fieldset component
		 *
		 * @return	void
		 */
		initPattern: function (fieldset) {
			var selection = this.editor.getSelection().getHtml();
			if (/\S/.test(selection)) {
				selection = selection.replace(/<[^>]*>/g, '');
				selection = selection.replace(/&nbsp;/g, '');
			}
			if (/\S/.test(selection)) {
				fieldset.getComponent('pattern').setValue(selection);
				fieldset.getComponent('replacement').focus();
			} else {
				fieldset.getComponent('pattern').focus();
			}
		},
		/*
		 * Handler invoked when the replace all checkbox is checked
		 */
		requestReplacement: function () {
			if (!this.dialog.find('itemId', 'replacement')[0].getValue() && this.dialog.find('itemId', 'replaceAll')[0].getValue()) {
				TYPO3.Dialog.InformationDialog({
					title: this.getButton('FindReplace').tooltip.title,
					msg: this.localize('Inform a replacement word'),
					fn: function () { this.dialog.find('itemId', 'replacement')[0].focus(); },
					scope: this
				});
			}
			this.clearDoc();
		},
		/*
		 * Handler invoked when the 'Next' button is pressed
		 */
		onNext: function () {
			if (!this.dialog.find('itemId', 'pattern')[0].getValue()) {
				TYPO3.Dialog.InformationDialog({
					title: this.getButton('FindReplace').tooltip.title,
					msg: this.localize('Enter the text you want to find'),
					fn: function () { this.dialog.find('itemId', 'pattern')[0].focus(); },
					scope: this
				});
				return false;
			}
			var fields = [
				'pattern',
				'replacement',
				'words',
				'matchCase',
				'replaceAll'
			];
			var params = {}, field;
			for (var i = fields.length; --i >= 0;) {
				field = fields[i];
				params[field] = this.dialog.find('itemId', field)[0].getValue();
			}
			this.search(params);
			return false;
		},
		/*
		 * Search the pattern and insert span tags
		 *
		 * @param	object		params: the parameters of the search corresponding to the values of fields:
		 *					pattern
		 *					replacement
		 *					words
		 *					matchCase
		 *					replaceAll
		 *
		 * @return	void
		 */
		search: function (params) {
			var html = this.editor.getInnerHTML();
			if (this.buffer == null) {
				this.buffer = html;
			}
			if (this.matches == 0) {
				var pattern = new RegExp(params.words ? '(?!<[^>]*)(\\b' + params.pattern + '\\b)(?![^<]*>)' : '(?!<[^>]*)(' + params.pattern + ')(?![^<]*>)', 'g' + (params.matchCase? '' : 'i'));
				this.editor.setHTML(html.replace(pattern, '<span id="htmlarea-frmark">' + "$1" + '</span>'));
				var spanElements = this.editor.document.body.getElementsByTagName('span');
				for (var i = 0, n = spanElements.length; i < n; i++) {
					var mark = spanElements[i];
					if (/^htmlarea-frmark/.test(mark.id)) {
						this.spans.push(mark);
					}
				}
			}
			this.spanWalker(params.pattern, params.replacement, params.replaceAll);
		},
		/*
		 * Walk the span tags
		 *
		 * @param	string		pattern: the pattern being searched for
		 * @param	string		replacement: the replacement string
		 * @param	bolean		replaceAll: true if all occurrences should be replaced
		 *
		 * @return	void
		 */
		spanWalker: function (pattern, replacement, replaceAll) {
			this.clearMarks();
			if (this.spans.length) {
				for (var i = 0, n = this.spans.length; i < n; i++) {
					var mark = this.spans[i];
					if (i >= this.matches && !/[0-9]$/.test(mark.id)) {
						this.matches++;
						this.disableActions('clear', false);
						mark.id = 'htmlarea-frmark_' + this.matches;
						mark.style.color = 'white';
						mark.style.backgroundColor = 'highlight';
						mark.style.fontWeight = 'bold';
						mark.scrollIntoView(false);
						var self = this;
						function replace(button) {
							if (button == 'yes') {
								mark.firstChild.replaceData(0, mark.firstChild.data.length, replacement);
								self.replaces++;
								self.disableActions('undo', false);
							}
							self.endWalk(pattern, i);
						}
						if (replaceAll) {
							replace('yes');
						} else {
							TYPO3.Dialog.QuestionDialog({
								title: this.getButton('FindReplace').tooltip.title,
								msg: this.localize('Substitute this occurrence?'),
								fn: replace,
								scope: this
							});
							break;
						}
					}
				}
			} else {
				this.endWalk(pattern, 0);
			}
		},
		/*
		 * End the replacement walk
		 *
		 * @param	string		pattern: the pattern being searched for
		 * @param	integer		index: the index reached in the walk
		 *
		 * @return 	void
		 */
		endWalk: function (pattern, index) {
			if (index >= this.spans.length - 1 || !this.spans.length) {
				var message = this.localize('Done') + ':<br /><br />';
				if (this.matches > 0) {
					if (this.matches == 1) {
						message += this.matches + ' ' + this.localize('found item');
					} else {
						message += this.matches + ' ' + this.localize('found items');
					}
					if (this.replaces > 0) {
						if (this.replaces == 1) {
							message += ',<br />' + this.replaces + ' ' + this.localize('replaced item');
						} else {
							message += ',<br />' + this.replaces + ' ' + this.localize('replaced items');
						}
					}
					this.hiliteAll();
				} else {
					message += '"' + pattern + '" ' + this.localize('not found');
					this.disableActions('hiliteall,clear', true);
				}
				TYPO3.Dialog.InformationDialog({
					title: this.getButton('FindReplace').tooltip.title,
					msg: message + '.',
					minWidth: 300
				});
			}
		},
		/*
		 * Remove all marks
		 */
		clearDoc: function () {
			this.editor.setHTML(this.editor.getInnerHTML().replace(this.marksCleaningRE, "$2"));
			this.initVariables();
			this.disableActions('hiliteall,clear', true);
		},
		/*
		 * De-highlight all marks
		 */
		clearMarks: function () {
			var spanElements = this.editor.document.body.getElementsByTagName('span');
			for (var i = spanElements.length; --i >= 0;) {
				var mark = spanElements[i];
				if (/^htmlarea-frmark/.test(mark.id)) {
					mark.style.backgroundColor = '';
					mark.style.color = '';
					mark.style.fontWeight = '';
				}
			}
			this.disableActions('hiliteall', false);
			this.disableActions('clear', true);
		},
		/*
		 * Highlight all marks
		 */
		hiliteAll: function () {
			var spanElements = this.editor.document.body.getElementsByTagName('span');
			for (var i = spanElements.length; --i >= 0;) {
				var mark = spanElements[i];
				if (/^htmlarea-frmark/.test(mark.id)) {
					mark.style.backgroundColor = 'highlight';
					mark.style.color = 'white';
					mark.style.fontWeight = 'bold';
				}
			}
			this.disableActions('clear', false);
			this.disableActions('hiliteall', true);
		},
		/*
		 * Undo the replace operation
		 */
		resetContents: function () {
			if (this.buffer != null) {
				var transp = this.editor.getInnerHTML();
				this.editor.setHTML(this.buffer);
				this.buffer = transp;
				this.disableActions('clear', true);
			}
		},
		/**
		 * Disable action buttons
		 *
		 * @param string actions: comma-separated list of buttonIds to set disabled/enabled
		 * @param boolean disabled: true to set disabled
		 */
		disableActions: function (actions, disabled) {
			var buttonIds = actions.split(/[,; ]+/), action;
			for (var i = buttonIds.length; --i >= 0;) {
				action = buttonIds[i];
				this.dialog.find('itemId', action)[0].setDisabled(disabled);
			}
		},
		/*
		 * Initialize find & replace variables
		 */
		initVariables: function () {
			this.matches = 0;
			this.replaces = 0;
			this.spans = new Array();
		},

		/**
		 * Clear the document before leaving on 'Done' button
		 */
		onCancel: function () {
			this.clearDoc();
			var plugin = this.getPluginInstance('UndoRedo');
			if (plugin) {
				plugin.start();
			}
			FindReplace.super.prototype.onCancel.call(this);
		},

		/**
		 * Clear the document before leaving on window close handle
		 */
		onClose: function () {
			this.clearDoc();
			var plugin = this.getPluginInstance('UndoRedo');
			if (plugin) {
				plugin.start();
			}
			FindReplace.super.prototype.onClose.call(this);
		}
	});

	return FindReplace;

});

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
 * Remove Format Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/RemoveFormat',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, Util) {

	var RemoveFormat = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(RemoveFormat, Plugin);
	Util.apply(RemoveFormat.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.4',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL',
				hasHelp		: true
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the button
			 */
			var buttonId = 'RemoveFormat';
			var buttonConfiguration = {
				id		: buttonId,
				tooltip		: this.localize(buttonId + 'Tooltip'),
				iconCls		: 'htmlarea-action-remove-format',
				action		: 'onButtonPress',
				dialog		: true
			};
			this.registerButton(buttonConfiguration);
			return true;
		},

		/**
		 * This function gets called when the button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id, target) {
			// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			// Open dialogue window
			this.openDialogue(
				buttonId,
				'Remove formatting',
				this.getWindowDimensions(
					{
						width: 260,
						height:260
					},
					buttonId
				)
			);
			return false;
		},
		/*
		 * Open the dialogue window
		 *
		 * @param	string		buttonId: the button id
		 * @param	string		title: the window title
		 * @param	object		dimensions: the opening dimensions of the window
		 *
		 * @return	void
		 */
		openDialogue: function (buttonId, title, dimensions) {
			this.dialog = new Ext.Window({
				title: this.getHelpTip('', title),
				cls: 'htmlarea-window',
				border: false,
				width: dimensions.width,
				height: 'auto',
				iconCls: this.getButton(buttonId).iconCls,
				listeners: {
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: [{
						xtype: 'fieldset',
						title: this.getHelpTip('area', 'Cleaning Area'),
						defaultType: 'radio',
						labelWidth: 140,
						defaults: {
							labelSeparator: ''
						},
						items: [{
								itemId: 'selection',
								fieldLabel: this.getHelpTip('selection', 'Selection'),
								name: 'htmlarea-removeFormat-area'
							},{
								itemId: 'allContent',
								fieldLabel: this.getHelpTip('all', 'All'),
								checked: true,
								name: 'htmlarea-removeFormat-area'
							}
						]
					},{
						xtype: 'fieldset',
						defaultType: 'checkbox',
						title: this.getHelpTip('options', 'Cleaning options'),
						labelWidth: 170,
						defaults: {
							labelSeparator: ''
						},
						items: [{
								itemId: 'formatting',
								fieldLabel: this.getHelpTip('htmlFormat', 'Formatting:')
							},{
								itemId: 'msWordFormatting',
								fieldLabel: this.getHelpTip('msWordFormat', 'MS Word Formatting:'),
								checked: true
							},{
								itemId: 'typographical',
								fieldLabel: this.getHelpTip('typographicalPunctuation', 'Typographical punctuation:')
							},{
								itemId: 'spaces',
								fieldLabel: this.getHelpTip('nonBreakingSpace', 'Spaces')
							},{
								itemId: 'images',
								fieldLabel: this.getHelpTip('images', 'Images:')
							},{
								itemId: 'allHtml',
								fieldLabel: this.getHelpTip('allHtml', 'All HTML:')
							}
						]
					}
				],
				buttons: [
					this.buildButtonConfig('OK', this.onOK),
					this.buildButtonConfig('Cancel', this.onCancel)
				]
			});
			this.show();
		},
		/*
		 * Handler when the OK button is pressed
		 */
		onOK: function () {
			var fields = [
				'selection',
				'allContent',
				'formatting',
				'msWordFormatting',
				'typographical',
				'spaces',
				'images',
				'allHtml'
			], field;
			var params = {};
			for (var i = fields.length; --i >= 0;) {
				field = fields[i];
				params[field] = this.dialog.find('itemId', field)[0].getValue();
			}
			if (params['allHtml'] || params['formatting'] || params['spaces'] || params['images'] || params['msWordFormatting'] || params['typographical']) {
				this.applyRequest(params);
				this.close();
			} else {
				TYPO3.Dialog.InformationDialog({
					title: this.getButton('RemoveFormat').tooltip.title,
					msg: this.localize('Select the type of formatting you wish to remove.')
				});
			}
			return false;
		},
		/*
		 * Perform the cleaning request
		 * @param	object		params: the values of the form fields
		 *
		 * @return	void
		 */
		applyRequest: function (params) {
			var editor = this.editor;
			this.restoreSelection();
			if (params['allContent']) {
				var html = editor.getInnerHTML();
			} else {
				var html = editor.getSelection().getHtml();
			}
			if (html) {
				if (params['allHtml']) {
					html = html.replace(/<[\!]*?[^<>]*?>/g, "");
				}
				if (params['formatting']) {
						// Remove font, b, strong, i, em, u, strike, span and other inline tags
					html = html.replace(/<\/?(abbr|acronym|b|big|cite|code|em|font|i|q|s|samp|small|span|strike|strong|sub|sup|tt|u|var)(>|[^>a-zA-Z][^>]*>)/gi, '');
						// Keep tags, strip attributes
					html = html.replace(/[ \t\n\r]+(style|class|align|cellpadding|cellspacing|frame|bgcolor)=\"[^>\"]*\"/gi, "");
				}
				if (params['spaces']) {
						// Replace non-breaking spaces by normal spaces
					html = html.replace(/&nbsp;/g, " ");
				}
				if (params['images']) {
						// remove any IMG tag
					html = html.replace(/<\/?(img|imagedata)(>|[^>a-zA-Z][^>]*>)/gi, "");
				}
				if (params['msWordFormatting']) {
						// Make one line
					html = html.replace(/[ \r\n\t]+/g, " ");
						// Clean up tags
					html = html.replace(/<(b|strong|i|em|p|li|ul) [^>]*>/gi, "<$1>");
						// Keep tags, strip attributes
					html = html.replace(/ (style|class|align)=\"[^>\"]*\"/gi, "");
						// Remove unwanted tags: div, link, meta, span, ?xml:, [a-z]+:
					html = html.replace(/<\/?(div|link|meta|span)(>|[^>a-zA-Z][^>]*>)/gi, "");
					html = html.replace(/<\?xml:[^>]*>/gi, "").replace(/<\/?[a-z]+:[^>]*>/g, "");
						// Remove images
					html = html.replace(/<\/?(img|imagedata)(>|[^>a-zA-Z][^>]*>)/gi, "");
						// Remove MS-specific tags
					html = html.replace(/<\/?(f|formulas|lock|path|shape|shapetype|stroke)(>|[^>a-zA-Z][^>]*>)/gi, "");
					// Remove unwanted tags and their contents: style, title
					html = html.replace(/<style[^>]*>.*?<\/style[^>]*>/gi, "").
						replace(/<title[^>]*>.*<\/title[^>]*>/gi, "");
					// Remove comments
					html = html.replace(/<!--[^>]*>/gi, "");
						// Remove xml tags
					html = html.replace(/<xml.[^>]*>/gi, "");
						// Remove inline elements resets
					html = html.replace(/<\/(b[^a-zA-Z]|big|i[^a-zA-Z]|s[^a-zA-Z]|small|strike|tt|u[^a-zA-Z])><\1>/gi, "");
						// Remove double tags
					var oldlen = html.length + 1;
					while(oldlen > html.length) {
						oldlen = html.length;
							// Remove double opening tags
						html = html.replace(/<([a-z][a-z]*)> *<\/\1>/gi, " ").replace(/<([a-z][a-z]*)> *<\/?([a-z][^>]*)> *<\/\1>/gi, "<$2>");
							// Remove double closing tags
						html = html.replace(/<([a-z][a-z]*)><\1>/gi, "<$1>").replace(/<\/([a-z][a-z]*)><\/\1>/gi, "<\/$1>");
							// Remove multiple spaces
						html = html.replace(/[\x20]+/gi, " ");
					}
				}
				if (params['typographical']) {
						// Remove typographical punctuation
						// Search pattern stored here
					var SrcCd;
						// Replace horizontal ellipsis with three periods
					SrcCd = String.fromCharCode(8230);
					html = html.replace(new RegExp(SrcCd, 'g'), '...');
						// Replace en-dash and  em-dash with hyphen
					SrcCd = String.fromCharCode(8211) + '|' + String.fromCharCode(8212);
					html = html.replace(new RegExp(SrcCd, 'g'), '-');
					html = html.replace(new RegExp(SrcCd, 'g'), "'");
						// Replace double low-9 / left double / right double quotation mark with double quote
					SrcCd = String.fromCharCode(8222) + '|' + String.fromCharCode(8220) + '|' + String.fromCharCode(8221);
					html = html.replace(new RegExp(SrcCd, 'g'), '"');
						// Replace left single / right single / single low-9 quotation mark with single quote
					SrcCd = String.fromCharCode(8216) + '|' + String.fromCharCode(8217) + '|' + String.fromCharCode(8218);
					html = html.replace(new RegExp(SrcCd, 'g'), "'");
						// Replace single left/right-pointing angle quotation mark with single quote
					SrcCd = String.fromCharCode(8249) + '|' + String.fromCharCode(8250);
					html = html.replace(new RegExp(SrcCd, 'g'), "'");
						// Replace left/right-pointing double angle quotation mark (left/right pointing guillemet) with double quote
					SrcCd = String.fromCharCode(171) + '|' + String.fromCharCode(187);
					html = html.replace(new RegExp(SrcCd, 'g'), '"');
						// Replace grave accent (spacing grave) and acute accent (spacing acute) with apostrophe (single quote)
					SrcCd = String.fromCharCode(96) + '|' + String.fromCharCode(180);
				}
				if (params['allContent']) {
					editor.setHTML(html);
				} else {
					editor.getSelection().insertHtml(html);
				}
			}
		}
	});

	return RemoveFormat;

});

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
 * Default Clean Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/DefaultClean',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (Plugin, UserAgent, Util, Dom, Event) {

	var DefaultClean = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(DefaultClean, Plugin);
	Util.apply(DefaultClean.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			this.pageTSConfiguration = this.editorConfiguration.buttons.cleanword;

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.2',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			/*
			 * Registering the (hidden) button
			 */
			var buttonId = 'CleanWord';
			var buttonConfiguration = {
				id		: buttonId,
				tooltip		: this.localize(buttonId + '-Tooltip'),
				action		: 'onButtonPress',
				hide		: true,
				hideInContextMenu: true
			};
			this.registerButton(buttonConfiguration);
		},

		/**
		 * This function gets called when the button was pressed.
		 *
		 * @param object editor: the editor instance
		 * @param string id: the button id or the key
		 * @return boolean false if action is completed
		 */
		onButtonPress: function (editor, id, target) {
			// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			this.clean();
			return false;
		},

		/**
		 * This function gets called when the editor is generated
		 */
		onGenerate: function () {
			var self = this;
			Event.on(UserAgent.isIE ? this.editor.document.body : this.editor.document.documentElement, 'paste', function (event) { return self.wordCleanHandler(event); });
		},

		/**
		 * This function cleans all nodes in the node tree below the input node
		 *
		 * @param	object	node: the root of the node tree to clean
		 *
		 * @return 	void
		 */
		clean: function () {
			function clearClass(node) {
				var newc = node.className.replace(/(^|\s)mso.*?(\s|$)/ig,' ');
				if (newc != node.className) {
					node.className = newc;
					if (!/\S/.test(node.className)) {
						if (!UserAgent.isOpera) {
							node.removeAttribute('class');
						} else {
							node.className = '';
						}
					}
				}
			}
			function clearStyle(node) {
				var style = node.getAttribute('style');
				if (style) {
					var declarations = style.split(/\s*;\s*/);
					for (var i = declarations.length; --i >= 0;) {
						if (/^mso|^tab-stops/i.test(declarations[i]) || /^margin\s*:\s*0..\s+0..\s+0../i.test(declarations[i])) {
							declarations.splice(i, 1);
						}
					}
					node.setAttribute('style', declarations.join('; '));
				}
			}
			function stripTag(el) {
				var txt = document.createTextNode(Dom.getInnerText(el));
				el.parentNode.insertBefore(txt,el);
				el.parentNode.removeChild(el);
			}
			function checkEmpty(el) {
				if (/^(span|b|strong|i|em|font)$/i.test(el.nodeName) && !el.firstChild) {
					el.parentNode.removeChild(el);
				}
			}
			function parseTree(root) {
				var tag = root.nodeName.toLowerCase(), next;
				switch (root.nodeType) {
					case Dom.ELEMENT_NODE:
						if (/^(meta|style|title|link)$/.test(tag)) {
							root.parentNode.removeChild(root);
							return false;
							break;
						}
					case Dom.TEXT_NODE:
					case Dom.DOCUMENT_NODE:
					case Dom.DOCUMENT_FRAGMENT_NODE:
						if (/:/.test(tag)) {
							stripTag(root);
							return false;
						} else {
							clearClass(root);
							clearStyle(root);
							for (var i = root.firstChild; i; i = next) {
								next = i.nextSibling;
								if (i.nodeType !== Dom.TEXT_NODE && parseTree(i)) {
									checkEmpty(i);
								}
							}
						}
						return true;
						break;
					default:
						root.parentNode.removeChild(root);
						return false;
						break;
				}
			}
			parseTree(this.editor.document.body);
			if (UserAgent.isWebKit) {
				this.editor.getDomNode().cleanAppleStyleSpans(this.editor.document.body);
			}
		},

		/**
		 * Handler for paste, dragdrop and drop events
		 */
		wordCleanHandler: function (event) {
			var self = this;
			window.setTimeout(function () {
				self.clean();
			}, 250);
			return true;
		}
	});

	return DefaultClean;

});

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
 * Table Operations Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/TableOperations',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Color',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ux/ColorPaletteField',
	'TYPO3/CMS/Rtehtmlarea/Plugins/BlockStyle',
	'TYPO3/CMS/Rtehtmlarea/Plugins/BlockElements',
	'TYPO3/CMS/Rtehtmlarea/Plugins/Language'],
	function (Plugin, UserAgent, Util, Dom, Event, Color, ColorPaletteField, BlockStyle, BlockElements, Language) {

	var TableOperations = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(TableOperations, Plugin);
	Util.apply(TableOperations.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {
			this.classesUrl = this.editorConfiguration.classesUrl;
			this.buttonsConfiguration = this.editorConfiguration.buttons;
			this.disableEnterParagraphs = this.buttonsConfiguration.table ? this.buttonsConfiguration.table.disableEnterParagraphs : false;
			this.floatLeft = "float-left";
			this.floatRight = "float-right";
			this.floatDefault = "not set";
			this.useHeaderClass = "thead";
			if (this.buttonsConfiguration.table && this.buttonsConfiguration.table.properties) {
				if (this.buttonsConfiguration.table.properties["float"]) {
					var floatConfiguration = this.buttonsConfiguration.table.properties["float"];
					this.floatLeft = (floatConfiguration.left && floatConfiguration.left.useClass) ? floatConfiguration.left.useClass : "float-left";
					this.floatRight = (floatConfiguration.right && floatConfiguration.right.useClass) ? floatConfiguration.right.useClass : "float-right";
					this.floatDefault = (floatConfiguration.defaultValue) ?  floatConfiguration.defaultValue : "not set";
				}
				if (this.buttonsConfiguration.table.properties.headers && this.buttonsConfiguration.table.properties.headers.both
						&& this.buttonsConfiguration.table.properties.headers.both.useHeaderClass) {
					this.useHeaderClass = this.buttonsConfiguration.table.properties.headers.both.useHeaderClass;
				}
				if (this.buttonsConfiguration.table.properties.tableClass) {
					this.defaultClass = this.buttonsConfiguration.table.properties.tableClass.defaultValue;
				}
			}
			if (this.buttonsConfiguration.blockstyle) {
				this.tags = this.editorConfiguration.buttons.blockstyle.tags;
			}
			this.tableParts = ["tfoot", "thead", "tbody"];
			this.convertAlignment = { "not set" : "none", "left" : "JustifyLeft", "center" : "JustifyCenter", "right" : "JustifyRight", "justify" : "JustifyFull" };
			/*
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '5.3',
				developer	: 'Mihai Bazon & Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Mihai Bazon & Stanislas Rolland',
				sponsor		: this.localize('Technische Universitat Ilmenau') + ' & Zapatec Inc.',
				sponsorUrl	: 'http://www.tu-ilmenau.de/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			/*
			 * Registering the buttons
			 */
			var hideToggleBorders = this.editorConfiguration.hideTableOperationsInToolbar && !(this.buttonsConfiguration.toggleborders && this.buttonsConfiguration.toggleborders.keepInToolbar);
			var buttonList = this.buttonList, button, buttonId;
			for (var i = 0, n = buttonList.length; i < n; ++i) {
				button = buttonList[i];
				buttonId = (button[0] === 'InsertTable') ? button[0] : ('TO-' + button[0]);
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize((buttonId === 'InsertTable') ? 'Insert Table' : buttonId),
					iconCls		: 'htmlarea-action-' + button[4],
					action		: 'onButtonPress',
					hotKey		: (this.buttonsConfiguration[button[2]] ? this.buttonsConfiguration[button[2]].hotKey : null),
					context		: button[1],
					hide		: ((buttonId == 'TO-toggle-borders') ? hideToggleBorders : ((button[0] === 'InsertTable') ? false : this.editorConfiguration.hideTableOperationsInToolbar)),
					dialog		: button[3]
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		 },
		/*
		 * The list of buttons added by this plugin
		 */
		buttonList: [
			['InsertTable',		null,				'table', true, 'table-insert'],
			['toggle-borders',	null, 				'toggleborders', false, 'table-show-borders'],
			['table-prop',		'table',			'tableproperties', true, 'table-edit-properties'],
			['table-restyle',	'table',			'tablerestyle', false, 'table-restyle'],
			['row-prop',		'tr',				'rowproperties', true, 'row-edit-properties'],
			['row-insert-above',	'tr',				'rowinsertabove', false, 'row-insert-above'],
			['row-insert-under',	'tr',				'rowinsertunder', false, 'row-insert-under'],
			['row-delete',		'tr',				'rowdelete', false, 'row-delete'],
			['row-split',		'td,th[rowSpan!=1]',		'rowsplit', false, 'row-split'],
			['col-prop',		'td,th',			'columnproperties', true, 'column-edit-properties'],
			['col-insert-before',	'td,th',			'columninsertbefore', false, 'column-insert-before'],
			['col-insert-after',	'td,th',			'columninsertafter', false, 'column-insert-after'],
			['col-delete',		'td,th',			'columndelete', false, 'column-delete'],
			['col-split',		'td,th[colSpan!=1]',		'columnsplit', false, 'column-split'],
			['cell-prop',		'td,th',			'cellproperties', true, 'cell-edit-properties'],
			['cell-insert-before',	'td,th',			'cellinsertbefore', false, 'cell-insert-before'],
			['cell-insert-after',	'td,th',			'cellinsertafter', false, 'cell-insert-after'],
			['cell-delete',		'td,th',			'celldelete', false, 'cell-delete'],
			['cell-merge',		UserAgent.isGecko? 'tr' : 'td,th',	'cellmerge', false, 'cell-merge'],
			['cell-split',		'td,th[colSpan!=1,rowSpan!=1]',	'cellsplit', false, 'cell-split']
		],
		/*
		 * Sets of default configuration values for dialogue form fields
		 */
		configDefaults: {
			combo: {
				editable: true,
				selectOnFocus: true,
				typeAhead: true,
				triggerAction: 'all',
				forceSelection: true,
				mode: 'local',
				valueField: 'value',
				displayField: 'text',
				helpIcon: true,
				tpl: '<tpl for="."><div ext:qtip="{value}" style="text-align:left;font-size:11px;" class="x-combo-list-item">{text}</div></tpl>'
			}
		},
		/*
		 * Get the integer value of a string or '' if the string is not a number
		 *
		 * @param	string		string: the input value
		 *
		 * @return	mixed		a number or ''
		 */
		getLength: function (string) {
			var length = parseInt(string);
			if (isNaN(length)) {
				length = '';
			}
			return length;
		},
		/*
		 * Open properties dialogue
		 *
		 * @param	string		type: 'cell', 'column', 'row' or 'table'
		 * @param	string		buttonId: the buttonId of the button that was pressed
		 *
		 * @return 	void
		 */
		openPropertiesDialogue: function (type, buttonId) {
				// Retrieve the element being edited and set configuration according to type
			switch (type) {
				case 'cell':
				case 'column':
					var element = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
					this.properties = (this.buttonsConfiguration.cellproperties && this.buttonsConfiguration.cellproperties.properties) ? this.buttonsConfiguration.cellproperties.properties : {};
					var title = (type == 'column') ? 'Column Properties' : 'Cell Properties';
					break;
				case 'row':
					var element = this.editor.getSelection().getFirstAncestorOfType('tr');
					this.properties = (this.buttonsConfiguration.rowproperties && this.buttonsConfiguration.rowproperties.properties) ? this.buttonsConfiguration.rowproperties.properties : {};
					var title = 'Row Properties';
					break;
				case 'table':
					var insert = (buttonId === 'InsertTable');
					var element = insert ? null : this.editor.getSelection().getFirstAncestorOfType('table');
					this.properties = (this.buttonsConfiguration.table && this.buttonsConfiguration.table.properties) ? this.buttonsConfiguration.table.properties : {};
					var title = insert ? 'Insert Table' : 'Table Properties';
					break;
			}
			var propertySet = element ? type + 'properties' : 'table';
			this.removedFieldsets = (this.buttonsConfiguration[propertySet] && this.buttonsConfiguration[propertySet].removeFieldsets) ? this.buttonsConfiguration[propertySet].removeFieldsets : '';
			this.removedProperties = this.properties.removed ? this.properties.removed : '';
				// Open the dialogue window
			this.openDialogue(
				title,
				{
					element: element,
					cell: type == 'cell',
					column: type == 'column',
					buttonId: buttonId
				},
				type == 'table' ? this.getWindowDimensions({ width: 600}, buttonId) : this.getWindowDimensions({ width: 600}, buttonId),
				this.buildTabItemsConfig(element, type, buttonId),
				type == 'table' ? this.tablePropertiesUpdate : this.rowCellPropertiesUpdate
			);
		},
		/*
		 * Build the dialogue tab items config
		 *
		 * @param	object		element: the element being edited, if any
		 * @param	string		type: 'cell', 'column', 'row' or 'table'
		 * @param	string		buttonId: the buttonId of the button that was pressed
		 *
		 * @return	object		the tab items configuration
		 */
		buildTabItemsConfig: function (element, type, buttonId) {
			var tabItems = [];
			var generalTabItems = [];
			switch (type) {
				case 'table':
					if (this.removedFieldsets.indexOf('description') === -1) {
						this.addConfigElement(this.buildDescriptionFieldsetConfig(element), generalTabItems);
					}
					if (typeof element !== 'object' || element === null || this.removedProperties.indexOf('headers') === -1) {
						this.addConfigElement(this.buildSizeAndHeadersFieldsetConfig(element), generalTabItems);
					}
					break;
				case 'column':
					if (this.removedFieldsets.indexOf('columntype') == -1) {
						this.addConfigElement(this.buildCellTypeFieldsetConfig(element, true), generalTabItems);
					}
					break;
				case 'cell':
					if (this.removedFieldsets.indexOf('celltype') == -1) {
						this.addConfigElement(this.buildCellTypeFieldsetConfig(element, false), generalTabItems);
					}
					break;
				case 'row':
					if (this.removedFieldsets.indexOf('rowgroup') == -1) {
						this.addConfigElement(this.buildRowGroupFieldsetConfig(element), generalTabItems);
					}
					break;
			}
			if (this.removedFieldsets.indexOf('style') == -1 && this.getPluginInstance('BlockStyle')) {
				this.addConfigElement(this.buildStylingFieldsetConfig(element, buttonId), generalTabItems);
			}
			if (generalTabItems.length > 0) {
				tabItems.push({
					title: this.localize('General'),
					items: generalTabItems
				});
			}
			var layoutTabItems = [];
			if (type === 'table' && this.removedFieldsets.indexOf('spacing') === -1) {
				this.addConfigElement(this.buildSpacingFieldsetConfig(element), layoutTabItems);
			}
			if (this.removedFieldsets.indexOf('layout') == -1) {
				this.addConfigElement(this.buildLayoutFieldsetConfig(element), layoutTabItems);
			}
			if (layoutTabItems.length > 0) {
				tabItems.push({
					title: this.localize('Layout'),
					items: layoutTabItems
				});
			}
			var languageTabItems = [];
			if (this.removedFieldsets.indexOf('language') === -1 && (this.removedProperties.indexOf('language') === -1 || this.removedProperties.indexOf('direction') === -1) && (this.getButton('Language') || this.getButton('LeftToRight') || this.getButton('RightToLeft'))) {
				this.addConfigElement(this.buildLanguageFieldsetConfig(element), languageTabItems);
			}
			if (languageTabItems.length > 0) {
				tabItems.push({
					title: this.localize('Language'),
					items: languageTabItems
				});
			}
			var alignmentAndBordersTabItems = [];
			if (this.removedFieldsets.indexOf('alignment') === -1) {
				this.addConfigElement(this.buildAlignmentFieldsetConfig(element), alignmentAndBordersTabItems);
			}
			if (this.removedFieldsets.indexOf('borders') === -1) {
				this.addConfigElement(this.buildBordersFieldsetConfig(element), alignmentAndBordersTabItems);
			}
			if (alignmentAndBordersTabItems.length > 0) {
				tabItems.push({
					title: this.localize('Alignment') + '/' + this.localize('Border'),
					items: alignmentAndBordersTabItems
				});
			}
			var colorTabItems = [];
			if (this.removedFieldsets.indexOf('color') === -1) {
				this.addConfigElement(this.buildColorsFieldsetConfig(element), colorTabItems);
			}
			if (colorTabItems.length > 0) {
				tabItems.push({
					title: this.localize('Background and colors'),
					items: colorTabItems
				});
			}
			return tabItems;
		},
		/*
		 * Open the dialogue window
		 *
		 * @param	string		title: the window title
		 * @param	object		arguments: some arguments for the handler
		 * @param	integer		dimensions: the opening width of the window
		 * @param	object		tabItems: the configuration of the tabbed panel
		 * @param	function	handler: handler when the OK button if clicked
		 *
		 * @return	void
		 */
		openDialogue: function (title, arguments, dimensions, tabItems, handler) {
			if (this.dialog) {
				this.dialog.close();
			}
			this.dialog = new Ext.Window({
				title: this.getHelpTip(arguments.buttonId, title),
				arguments: arguments,
				cls: 'htmlarea-window',
				border: false,
				width: dimensions.width,
				height: 'auto',
				iconCls: this.getButton(arguments.buttonId).iconCls,
				listeners: {
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: {
					xtype: 'tabpanel',
					activeTab: 0,
					defaults: {
						xtype: 'container',
						layout: 'form',
						defaults: {
							labelWidth: 150
						}
					},
					listeners: {
						tabchange: {
							fn: function (tabpanel, tab) {
								this.setTabPanelHeight(tabpanel, tab);
								this.syncHeight(tabpanel, tab);
							},
							scope: this
						}
					},
					items: tabItems
				},
				buttons: [
					this.buildButtonConfig('OK', handler),
					this.buildButtonConfig('Cancel', this.onCancel)
				]
			});
			this.show();
		},
		/*
		 * Insert the table or update the table properties and close the dialogue
		 */
		tablePropertiesUpdate: function () {
			this.restoreSelection()
			var params = {};
			var fieldTypes = ['combo', 'textfield', 'numberfield', 'checkbox', 'colorpalettefield'];
			this.dialog.findBy(function (item) {
				if (fieldTypes.indexOf(item.getXType()) !== -1) {
					params[item.getItemId()] = item.getValue();
					return true;
				}
				return false;
			});
			var errorFlag = false;
			if (this.properties.required) {
				if (this.properties.required.indexOf('captionOrSummary') != -1) {
					if (!/\S/.test(params.f_caption) && !/\S/.test(params.f_summary)) {
						TYPO3.Dialog.ErrorDialog({
							title: this.getButton(this.dialog.arguments.buttonId).tooltip,
							msg: this.localize('captionOrSummary' + '-required')
						});
						var field = this.dialog.find('itemId', 'f_caption')[0];
						var tab = field.findParentByType('container');
						tab.ownerCt.activate(tab);
						field.focus();
						return false;
					}
				} else {
					var required = {
						f_caption: 'caption',
						f_summary: 'summary'
					};
					for (var item in required) {
						if (!params[item] && this.properties.required.indexOf(required[item]) != -1) {
							TYPO3.Dialog.ErrorDialog({
								title: this.getButton(this.dialog.arguments.buttonId).tooltip,
								msg: this.localize(required[item] + '-required')
							});
							var field = this.dialog.find('itemId', item)[0];
							var tab = field.findParentByType('container');
							tab.ownerCt.activate(tab);
							field.focus();
							errorFlag = true;
							break;
						}
					}
					if (errorFlag) {
						return false;
					}
				}
			}
			var doc = this.editor.document;
			if (this.dialog.arguments.buttonId === 'InsertTable') {
				var required = {
					f_rows: 'You must enter a number of rows',
					f_cols: 'You must enter a number of columns'
				};
				for (var item in required) {
					if (!params[item]) {
						TYPO3.Dialog.ErrorDialog({
							title: this.getButton(this.dialog.arguments.buttonId).tooltip,
							msg: this.localize(required[item])
						});
						var field = this.dialog.find('itemId', item)[0];
						var tab = field.findParentByType('container');
						tab.ownerCt.activate(tab);
						field.focus();
						errorFlag = true;
						break;
					}
				}
				if (errorFlag) {
					return false;
				}
				var table = doc.createElement('table');
				var tbody = doc.createElement('tbody');
				table.appendChild(tbody);
				for (var i = params.f_rows; --i >= 0;) {
					var tr = doc.createElement('tr');
					tbody.appendChild(tr);
					for (var j = params.f_cols; --j >= 0;) {
						var td = doc.createElement('td');
						td.innerHTML = '<br />';
						tr.appendChild(td);
					}
				}
			} else {
				var table = this.dialog.arguments.element;
			}
			this.setHeaders(table, params);
			this.processStyle(table, params);
			table.removeAttribute('border');
			for (var item in params) {
				var val = params[item];
				switch (item) {
				    case "f_caption":
					if (/\S/.test(val)) {
						// contains non white-space characters
						var caption = table.getElementsByTagName("caption");
						if (caption) {
							caption = caption[0];
						}
						if (!caption) {
							var caption = doc.createElement("caption");
							table.insertBefore(caption, table.firstChild);
						}
						caption.innerHTML = val;
					} else {
						// delete the caption if found
						if (table.caption) table.deleteCaption();
					}
					break;
				    case "f_summary":
					table.summary = val;
					break;
				    case "f_width":
					table.style.width = ("" + val) + params.f_unit;
					break;
				    case "f_align":
					table.align = val;
					break;
				    case "f_spacing":
					table.cellSpacing = val;
					break;
				    case "f_padding":
					table.cellPadding = val;
					break;
				    case "f_frames":
					    if (val !== 'not set' && table.style.borderStyle !== 'none') {
						    table.frame = val;
					    } else {
						    table.removeAttribute('rules');
					    }
					break;
				    case "f_rules":
					    if (val !== 'not set') {
						    table.rules = val;
					    } else {
						    table.removeAttribute('rules');
					    }
					break;
				    case "f_st_float":
					switch (val) {
					    case "not set":
						Dom.removeClass(table, this.floatRight);
						Dom.removeClass(table, this.floatLeft);
						break;
					    case "right":
						Dom.removeClass(table, this.floatLeft);
						Dom.addClass(table, this.floatRight);
						break;
					    case "left":
						Dom.removeClass(table, this.floatRight);
						Dom.addClass(table, this.floatLeft);
						break;
					}
					break;
				    case "f_st_textAlign":
					if (this.getPluginInstance('BlockElements')) {
						this.getPluginInstance('BlockElements').toggleAlignmentClass(table, this.convertAlignment[val]);
						table.style.textAlign = "";
					}
					break;
				    case "f_class":
				    case "f_class_tbody":
				    case "f_class_thead":
				    case "f_class_tfoot":
					var tpart = table;
					if (item.length > 7) {
						tpart = table.getElementsByTagName(item.substring(8,13))[0];
					}
					if (tpart) {
						this.getPluginInstance('BlockStyle').applyClassChange(tpart, val);
					}
					break;
				    case "f_lang":
					this.getPluginInstance('Language').setLanguageAttributes(table, val);
					break;
				    case "f_dir":
					table.dir = (val != "not set") ? val : "";
					break;
				}
			}
			if (this.dialog.arguments.buttonId === "InsertTable") {
				this.editor.getSelection().insertNode(table);
				this.editor.getSelection().selectNodeContents(table.rows[0].cells[0], true);
				if (this.buttonsConfiguration.toggleborders && this.buttonsConfiguration.toggleborders.setOnTableCreation) {
					this.toggleBorders(true);
				}
			}
			this.close();
		},
		/*
		 * Update the row/column/cell properties
		 */
		rowCellPropertiesUpdate: function() {
			this.restoreSelection()
				// Collect values from each form field
			var params = {};
			var fieldTypes = ['combo', 'textfield', 'numberfield', 'checkbox', 'colorpalettefield'];
			this.dialog.findBy(function (item) {
				if (fieldTypes.indexOf(item.getXType()) !== -1) {
					params[item.getItemId()] = item.getValue();
					return true;
				}
				return false;
			});
			var cell = this.dialog.arguments.cell;
			var column = this.dialog.arguments.column;
			var section = (cell || column) ? this.dialog.arguments.element.parentNode.parentNode : this.dialog.arguments.element.parentNode;
			var table = section.parentNode;
			var elements = [];
			if (column) {
				elements = this.getColumnCells(this.dialog.arguments.element);
			} else {
				elements.push(this.dialog.arguments.element);
			}
			for (var i = elements.length; --i >= 0;) {
				var element = elements[i];
				this.processStyle(element, params);
				for (var item in params) {
					var val = params[item];
					switch (item) {
					    case "f_cell_type":
						if (val.substring(0,2) != element.nodeName.toLowerCase()) {
							element = this.remapCell(element, val.substring(0,2));
							this.editor.getSelection().selectNodeContents(element, true);
						}
						if (val.substring(2,10) != element.scope) {
							element.scope = val.substring(2,10);
						}
						break;
					    case "f_cell_abbr":
						if (!column) {
							element.abbr = (element.nodeName.toLowerCase() == 'td') ? '' : val;
						}
						break;
					    case "f_rowgroup":
						var nodeName = section.nodeName.toLowerCase();
						if (val != nodeName) {
							var newSection = table.getElementsByTagName(val)[0];
							if (!newSection) var newSection = table.insertBefore(this.editor.document.createElement(val), table.getElementsByTagName("tbody")[0]);
							if (nodeName == "thead" && val == "tbody") var newElement = newSection.insertBefore(element, newSection.firstChild);
								else var newElement = newSection.appendChild(element);
							if (!section.hasChildNodes()) table.removeChild(section);
						}
						if (params.f_convertCells) {
							if (val == "thead") {
								this.remapRowCells(element, "th");
							} else {
								this.remapRowCells(element, "td");
							}
						}
						break;
					    case "f_st_textAlign":
						if (this.getPluginInstance('BlockElements')) {
							this.getPluginInstance('BlockElements').toggleAlignmentClass(element, this.convertAlignment[val]);
							element.style.textAlign = "";
						}
						break;
					    case "f_class":
						this.getPluginInstance('BlockStyle').applyClassChange(element, val);
						break;
					    case "f_lang":
						this.getPluginInstance('Language').setLanguageAttributes(element, val);
						break;
					    case "f_dir":
						element.dir = (val != "not set") ? val : "";
						break;
					}
				}
			}
			this.reStyleTable(table);
			this.close();
		},

		/**
		 * This function gets called when the plugin is generated
		 */
		onGenerate: function () {
			// Set table borders if requested by configuration
			if (this.buttonsConfiguration.toggleborders && this.buttonsConfiguration.toggleborders.setOnRTEOpen) {
				this.toggleBorders(true);
			}
			// Register handler for the enter key for IE and Opera when buttons.table.disableEnterParagraphs is set in the editor configuration
			if ((UserAgent.isIE || UserAgent.isOpera) && this.disableEnterParagraphs) {
				var self = this;
				this.editor.iframe.keyMap.addBinding({
					key: Event.ENTER,
					shift: false,
					handler: function (event) { return self.onKey(event); }
				});
			}
		},

		/**
		 * This function gets called when the toolbar is being updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				switch (button.itemId) {
					case 'TO-toggle-borders':
						button.setInactive(!Dom.hasClass(this.editor.document.body, 'htmlarea-showtableborders'));
						break;
					case 'TO-cell-merge':
						if (UserAgent.isGecko) {
							var selection = this.editor.getSelection().get().selection;
							button.setDisabled(button.disabled || selection.rangeCount < 2);
						}
						break;
				}
			}
		},
		/*
		 * This function gets called when a Table Operations button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id, target) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;

			var mozbr = '<br />';
			var tableParts = ["tfoot", "thead", "tbody"];
			var tablePartsIndex = { tfoot : 0, thead : 1, tbody : 2 };

			// helper function that clears the content in a table row
			function clearRow(tr) {
				var tds = tr.getElementsByTagName("td");
				for (var i = tds.length; --i >= 0;) {
					var td = tds[i];
					td.rowSpan = 1;
					td.innerHTML = mozbr;
				}
				var tds = tr.getElementsByTagName("th");
				for (var i = tds.length; --i >= 0;) {
					var td = tds[i];
					td.rowSpan = 1;
					td.innerHTML = mozbr;
				}
			};

			function splitRow(td) {
				var n = parseInt("" + td.rowSpan);
				var colSpan = td.colSpan;
				var nodeName = td.nodeName.toLowerCase();
				td.rowSpan = 1;
				var tr = td.parentNode;
				var sectionRowIndex = tr.sectionRowIndex;
				var rows = tr.parentNode.rows;
				var index = td.cellIndex;
				while (--n > 0) {
					tr = rows[++sectionRowIndex];
						// Last row
					if (!tr) tr = td.parentNode.parentNode.appendChild(editor.document.createElement("tr"));
					var otd = editor.document.createElement(nodeName);
					otd.colSpan = colSpan;
					otd.innerHTML = mozbr;
					tr.insertBefore(otd, tr.cells[index]);
				}
			};

			function splitCol(td) {
				var nc = parseInt("" + td.colSpan);
				var nodeName = td.nodeName.toLowerCase();
				td.colSpan = 1;
				var tr = td.parentNode;
				var ref = td.nextSibling;
				while (--nc > 0) {
					var otd = editor.document.createElement(nodeName);
					otd.rowSpan = td.rowSpan;
					otd.innerHTML = mozbr;
					tr.insertBefore(otd, ref);
				}
			};

			function splitCell(td) {
				var nc = parseInt("" + td.colSpan);
				splitCol(td);
				var cells = td.parentNode.cells;
				var index = td.cellIndex;
				while (nc-- > 0) {
					splitRow(cells[index++]);
				}
			};

			function selectNextNode(el) {
				var node = el.nextSibling;
				while (node && node.nodeType != 1) {
					node = node.nextSibling;
				}
				if (!node) {
					node = el.previousSibling;
					while (node && node.nodeType != 1) {
						node = node.previousSibling;
					}
				}
				if (!node) node = el.parentNode;
				editor.getSelection().selectNodeContents(node);
			};

			function getSelectedCells(sel) {
				var cell, range, i = 0, cells = [];
				try {
					while (range = sel.getRangeAt(i++)) {
						cell = range.startContainer.childNodes[range.startOffset];
						while (!/^(td|th|body)$/.test(cell.nodeName.toLowerCase())) cell = cell.parentNode;
						if (/^(td|th)$/.test(cell.nodeName.toLowerCase())) cells.push(cell);
					}
				} catch(e) {
				/* finished walking through selection */
				}
				return cells;
			};

			function deleteEmptyTable(table) {
				var lastPart = true;
				for (var j = tableParts.length; --j >= 0;) {
					var tablePart = table.getElementsByTagName(tableParts[j])[0];
					if (tablePart) lastPart = false;
				}
				if (lastPart) {
					selectNextNode(table);
					table.parentNode.removeChild(table);
				}
			};

			function computeCellIndexes(table) {
				var matrix = [];
				var lookup = {};
				for (var m = tableParts.length; --m >= 0;) {
					var tablePart = table.getElementsByTagName(tableParts[m])[0];
					if (tablePart) {
						var rows = tablePart.rows;
						for (var i = 0, n = rows.length; i < n; i++) {
							var cells = rows[i].cells;
							for (var j=0; j< cells.length; j++) {
								var cell = cells[j];
								var rowIndex = cell.parentNode.rowIndex;
								var cellId = tableParts[m]+"-"+rowIndex+"-"+cell.cellIndex;
								var rowSpan = cell.rowSpan || 1;
								var colSpan = cell.colSpan || 1;
								var firstAvailCol;
								if (typeof matrix[rowIndex] === 'undefined') { matrix[rowIndex] = []; }
								// Find first available column in the first row
								for (var k=0; k<matrix[rowIndex].length+1; k++) {
									if (typeof matrix[rowIndex][k] === 'undefined') {
										firstAvailCol = k;
										break;
									}
								}
								lookup[cellId] = firstAvailCol;
								for (var k=rowIndex; k<rowIndex+rowSpan; k++) {
									if (typeof matrix[k] === 'undefined') { matrix[k] = []; }
									var matrixrow = matrix[k];
									for (var l=firstAvailCol; l<firstAvailCol+colSpan; l++) {
										matrixrow[l] = "x";
									}
								}
							}
						}
					}
				}
				return lookup;
			};

			function getActualCellIndex(cell, lookup) {
				return lookup[cell.parentNode.parentNode.nodeName.toLowerCase()+"-"+cell.parentNode.rowIndex+"-"+cell.cellIndex];
			};

			switch (buttonId) {
				// ROWS
			    case "TO-row-insert-above":
			    case "TO-row-insert-under":
				var tr = this.editor.getSelection().getFirstAncestorOfType("tr");
				if (!tr) break;
				var otr = tr.cloneNode(true);
				clearRow(otr);
				otr = tr.parentNode.insertBefore(otr, (/under/.test(buttonId) ? tr.nextSibling : tr));
				this.editor.getSelection().selectNodeContents(otr.firstChild, true);
				this.reStyleTable(tr.parentNode.parentNode);
				break;
			    case "TO-row-delete":
				var tr = this.editor.getSelection().getFirstAncestorOfType("tr");
				if (!tr) break;
				var part = tr.parentNode;
				var table = part.parentNode;
				if(part.rows.length == 1) {  // this the last row, delete the whole table part
					selectNextNode(part);
					table.removeChild(part);
					deleteEmptyTable(table);
				} else {
						// set the caret first to a position that doesn't disappear.
					selectNextNode(tr);
					part.removeChild(tr);
				}
				this.reStyleTable(table);
				break;
			    case "TO-row-split":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var sel = editor.getSelection().get().selection;
				if (UserAgent.isGecko && !sel.isCollapsed) {
					var cells = getSelectedCells(sel);
					for (i = 0; i < cells.length; ++i) {
						splitRow(cells[i]);
					}
				} else {
					splitRow(cell);
				}
				break;

				// COLUMNS
			    case "TO-col-insert-before":
			    case "TO-col-insert-after":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var index = cell.cellIndex;
				var table = cell.parentNode.parentNode.parentNode;
				for (var j = tableParts.length; --j >= 0;) {
					var tablePart = table.getElementsByTagName(tableParts[j])[0];
					if (tablePart) {
						var rows = tablePart.rows;
						for (var i = rows.length; --i >= 0;) {
							var tr = rows[i];
							var ref = tr.cells[index + (/after/.test(buttonId) ? 1 : 0)];
							if (!ref) {
								var otd = editor.document.createElement(tr.lastChild.nodeName.toLowerCase());
								otd.innerHTML = mozbr;
								tr.appendChild(otd);
							} else {
								var otd = editor.document.createElement(ref.nodeName.toLowerCase());
								otd.innerHTML = mozbr;
								tr.insertBefore(otd, ref);
							}
						}
					}
				}
				this.reStyleTable(table);
				break;
			    case "TO-col-split":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var sel = this.editor.getSelection().get().selection;
				if (UserAgent.isGecko && !sel.isCollapsed) {
					var cells = getSelectedCells(sel);
					for (i = 0; i < cells.length; ++i) {
						splitCol(cells[i]);
					}
				} else {
					splitCol(cell);
				}
				this.reStyleTable(table);
				break;
			    case "TO-col-delete":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var index = cell.cellIndex;
				var part = cell.parentNode.parentNode;
				var table = part.parentNode;
				var lastPart = true;
				for (var j = tableParts.length; --j >= 0;) {
					var tablePart = table.getElementsByTagName(tableParts[j])[0];
					if (tablePart) {
						var rows = tablePart.rows;
						var lastColumn = true;
						for (var i = rows.length; --i >= 0;) {
							if(rows[i].cells.length > 1) lastColumn = false;
						}
						if (lastColumn) {
								// this is the last column, delete the whole tablepart
								// set the caret first to a position that doesn't disappear
							selectNextNode(tablePart);
							table.removeChild(tablePart);
						} else {
								// set the caret first to a position that doesn't disappear
							if (part == tablePart) selectNextNode(cell);
							for (var i = rows.length; --i >= 0;) {
								if(rows[i].cells[index]) rows[i].removeChild(rows[i].cells[index]);
							}
							lastPart = false;
						}
					}
				}
				if (lastPart) {
						// the last table section was deleted: delete the whole table
						// set the caret first to a position that doesn't disappear
					selectNextNode(table);
					table.parentNode.removeChild(table);
				}
				this.reStyleTable(table);
				break;

				// CELLS
			    case "TO-cell-split":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var sel = this.editor.getSelection().get().selection;
				if (UserAgent.isGecko && !sel.isCollapsed) {
					var cells = getSelectedCells(sel);
					for (i = 0; i < cells.length; ++i) {
						splitCell(cells[i]);
					}
				} else {
					splitCell(cell);
				}
				this.reStyleTable(table);
				break;
			    case "TO-cell-insert-before":
			    case "TO-cell-insert-after":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var tr = cell.parentNode;
				var otd = editor.document.createElement(cell.nodeName.toLowerCase());
				otd.innerHTML = mozbr;
				tr.insertBefore(otd, (/after/.test(buttonId) ? cell.nextSibling : cell));
				this.reStyleTable(tr.parentNode.parentNode);
				break;
			    case "TO-cell-delete":
				var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
				if (!cell) break;
				var row = cell.parentNode;
				if(row.cells.length == 1) {  // this is the only cell in the row, delete the row
					var part = row.parentNode;
					var table = part.parentNode;
					if (part.rows.length == 1) {  // this the last row, delete the whole table part
						selectNextNode(part);
						table.removeChild(part);
						deleteEmptyTable(table);
					} else {
						selectNextNode(row);
						part.removeChild(row);
					}
				} else {
						// set the caret first to a position that doesn't disappear
					selectNextNode(cell);
					row.removeChild(cell);
				}
				this.reStyleTable(table);
				break;
			    case "TO-cell-merge":
				var sel = this.editor.getSelection().get().selection;
				var range, i = 0;
				var rows = new Array();
				for (var k = tableParts.length; --k >= 0;) rows[k] = [];
				var row = null;
				var cells = null;
				if (UserAgent.isGecko) {
					try {
						while (range = sel.getRangeAt(i++)) {
							var td = range.startContainer.childNodes[range.startOffset];
							if (td.parentNode != row) {
								(cells) && rows[tablePartsIndex[row.parentNode.nodeName.toLowerCase()]].push(cells);
								row = td.parentNode;
								cells = [];
							}
							cells.push(td);
						}
					} catch(e) {
						/* finished walking through selection */
					}
					try { rows[tablePartsIndex[row.parentNode.nodeName.toLowerCase()]].push(cells); } catch(e) { }
				} else {
					// Internet Explorer, WebKit and Opera
					var cell = this.editor.getSelection().getFirstAncestorOfType(['td', 'th']);
					if (!cell) {
						TYPO3.Dialog.InformationDialog({
							title: this.getButton('TO-cell-merge').tooltip,
							msg: this.localize('Please click into some cell')
						});
						break;
					}
					var tr = cell.parentNode;
					var no_cols = parseInt(prompt(this.localize("How many columns would you like to merge?"), 2));
					if (!no_cols) break;
					var no_rows = parseInt(prompt(this.localize("How many rows would you like to merge?"), 2));
					if (!no_rows) break;
					var lookup = computeCellIndexes(cell.parentNode.parentNode.parentNode);
					var first_index = getActualCellIndex(cell, lookup);
						// Collect cells on first row
					var td = cell, colspan = 0;
					cells = [];
					for (var i = no_cols; --i >= 0;) {
						if (!td) break;
						cells.push(td);
						var last_index = getActualCellIndex(td, lookup);
						td = td.nextSibling;
					}
					rows[tablePartsIndex[tr.parentNode.nodeName.toLowerCase()]].push(cells);
						// Collect cells on following rows
					var index, first_index_found, last_index_found;
					for (var j = 1; j < no_rows; ++j) {
						tr = tr.nextSibling;
						if (!tr) break;
						cells = [];
						first_index_found = false;
						for (var i = 0; i < tr.cells.length; ++i) {
							td = tr.cells[i];
							if (!td) break;
							index = getActualCellIndex(td, lookup);
							if (index > last_index) break;
							if (index == first_index) first_index_found = true;
							if (index >= first_index) cells.push(td);
						}
							// If not rectangle, we quit!
						if (!first_index_found) break;
						rows[tablePartsIndex[tr.parentNode.nodeName.toLowerCase()]].push(cells);
					}
				}
				for (var k = tableParts.length; --k >= 0;) {
					var cell, row;
					var cellHTML = "";
					var cellRowSpan = 0;
					var cellColSpan, maxCellColSpan = 0;
					if (rows[k] && rows[k][0]) {
						for (var i = 0; i < rows[k].length; ++i) {
							var cells = rows[k][i];
							var cellColSpan = 0;
							if (!cells) continue;
							cellRowSpan += cells[0].rowSpan ? cells[0].rowSpan : 1;
							for (var j = 0; j < cells.length; ++j) {
								cell = cells[j];
								row = cell.parentNode;
								cellHTML += cell.innerHTML;
								cellColSpan += cell.colSpan ? cell.colSpan : 1;
								if (i || j) {
									cell.parentNode.removeChild(cell);
									if(!row.cells.length) row.parentNode.removeChild(row);
								}
							}
							if (maxCellColSpan < cellColSpan) {
								maxCellColSpan = cellColSpan;
							}
						}
						var td = rows[k][0][0];
						td.innerHTML = cellHTML;
						td.rowSpan = cellRowSpan;
						td.colSpan = maxCellColSpan;
						editor.getSelection().selectNodeContents(td);
					}
				}
				this.reStyleTable(table);
				break;

				// CREATION AND PROPERTIES
			    case "InsertTable":
			    case "TO-table-prop":
				this.openPropertiesDialogue('table', buttonId);
				break;
			    case "TO-table-restyle":
				this.reStyleTable(this.editor.getSelection().getFirstAncestorOfType('table'));
				break;
			    case "TO-row-prop":
				this.openPropertiesDialogue('row', buttonId);
				break;
			    case "TO-col-prop":
				this.openPropertiesDialogue('column', buttonId);
				break;
			    case "TO-cell-prop":
				this.openPropertiesDialogue('cell', buttonId);
				break;
			    case "TO-toggle-borders":
				this.toggleBorders();
				break;
			    default:
				break;
			}
		},
		/*
		 * Returns an array of all cells in the column containing the given cell
		 *
		 * @param	object		cell: the cell serving as reference point for the column
		 *
		 * @return	array		the array of cells of the column
		 */
		getColumnCells : function (cell) {
			var cells = new Array();
			var index = cell.cellIndex;
			var table = cell.parentNode.parentNode.parentNode;
			for (var j = this.tableParts.length; --j >= 0;) {
				var tablePart = table.getElementsByTagName(this.tableParts[j])[0];
				if (tablePart) {
					var rows = tablePart.rows;
					for (var i = rows.length; --i >= 0;) {
						if(rows[i].cells.length > index) {
							cells.push(rows[i].cells[index]);
						}
					}
				}
			}
			return cells;
		},
		/*
		 * Toggles the display of borders on tables and table cells
		 *
		 * @param	boolean		forceBorders: if set, borders are displayed whatever the current state
		 *
		 * @return	void
		 */
		toggleBorders : function (forceBorders) {
			var body = this.editor.document.body;
			if (!Dom.hasClass(body, 'htmlarea-showtableborders')) {
				Dom.addClass(body,'htmlarea-showtableborders');
			} else if (!forceBorders) {
				Dom.removeClass(body,'htmlarea-showtableborders');
			}
		},
		/*
		 * Applies to rows/cells the alternating and counting classes of an alternating or counting style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 *
		 * @return	void
		 */
		reStyleTable: function (table) {
			if (table) {
				if (this.classesUrl && (typeof HTMLArea.classesAlternating === 'undefined' || typeof HTMLArea.classesCounting === 'undefined')) {
					this.getJavascriptFile(this.classesUrl, function (options, success, response) {
						if (success) {
							try {
								if (typeof HTMLArea.classesAlternating === 'undefined' || typeof HTMLArea.classesCounting === 'undefined') {
									eval(response.responseText);
								}
								this.reStyleTable(table);
							} catch(e) {
								this.appendToLog('reStyleTable', 'Error evaluating contents of Javascript file: ' + this.classesUrl, 'error');
							}
						}
					});
				} else {
					var classNames = table.className.trim().split(' ');
					for (var i = classNames.length; --i >= 0;) {
						var classConfiguration = HTMLArea.classesAlternating[classNames[i]];
						if (classConfiguration && classConfiguration.rows) {
							if (classConfiguration.rows.oddClass && classConfiguration.rows.evenClass) {
								this.alternateRows(table, classConfiguration);
							}
						}
						if (classConfiguration && classConfiguration.columns) {
							if (classConfiguration.columns.oddClass && classConfiguration.columns.evenClass) {
								this.alternateColumns(table, classConfiguration);
							}
						}
						classConfiguration = HTMLArea.classesCounting[classNames[i]];
						if (classConfiguration && classConfiguration.rows) {
							if (classConfiguration.rows.rowClass) {
								this.countRows(table, classConfiguration);
							}
						}
						if (classConfiguration && classConfiguration.columns) {
							if (classConfiguration.columns.columnClass) {
								this.countColumns(table, classConfiguration);
							}
						}
					}
				}
			}
		},
		/*
		 * Removes from rows/cells the alternating classes of an alternating style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 * @param	string		removeClass: the name of the class that identifies the alternating style scheme
		 *
		 * @return	void
		 */
		removeAlternatingClasses: function (table, removeClass) {
			if (table) {
				if (this.classesUrl && typeof HTMLArea.classesAlternating === 'undefined') {
					this.getJavascriptFile(this.classesUrl, function (options, success, response) {
						if (success) {
							try {
								if (typeof HTMLArea.classesAlternating === 'undefined') {
									eval(response.responseText);
								}
								this.removeAlternatingClasses(table, removeClass);
							} catch(e) {
								this.appendToLog('removeAlternatingClasses', 'Error evaluating contents of Javascript file: ' + this.classesUrl, 'error');
							}
						}
					});
				} else {
					var classConfiguration = HTMLArea.classesAlternating[removeClass];
					if (classConfiguration) {
						if (classConfiguration.rows && classConfiguration.rows.oddClass && classConfiguration.rows.evenClass) {
							this.alternateRows(table, classConfiguration, true);
						}
						if (classConfiguration.columns && classConfiguration.columns.oddClass && classConfiguration.columns.evenClass) {
							this.alternateColumns(table, classConfiguration, true);
						}
					}
				}
			}
		},
		/*
		 * Applies/removes the alternating classes of an alternating rows style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 * @param	object		classConfifuration: the alternating sub-array of the configuration of the class
		 * @param	boolean		remove: if true, the classes are removed
		 *
		 * @return	void
		 */
		alternateRows : function (table, classConfiguration, remove) {
			var oddClass = { tbody : classConfiguration.rows.oddClass, thead : classConfiguration.rows.oddHeaderClass };
			var evenClass = { tbody : classConfiguration.rows.evenClass, thead : classConfiguration.rows.evenHeaderClass };
			var startAt = parseInt(classConfiguration.rows.startAt);
			startAt = remove ? 1 : (startAt ? startAt : 1);
			var rows = table.rows, type, odd, even;
				// Loop through the rows
			for (var i = startAt-1, n = rows.length; i < n; i++) {
				var row = rows[i];
				type = (row.parentNode.nodeName.toLowerCase() == "thead") ? "thead" : "tbody";
				odd = oddClass[type];
				even = evenClass[type];
				if (remove) {
					Dom.removeClass(row, odd);
					Dom.removeClass(row, even);
					// Check if i is even, and apply classes for both possible results
				} else if (odd && even) {
					if ((i % 2) == 0) {
						if (Dom.hasClass(row, even)) {
							Dom.removeClass(row, even);
						}
						Dom.addClass(row, odd);
					} else {
						if (Dom.hasClass(row, odd)) {
							Dom.removeClass(row, odd);
						}
						Dom.addClass(row, even);
					}
				}
			}
		},
		/*
		 * Applies/removes the alternating classes of an alternating columns style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 * @param	object		classConfifuration: the alternating sub-array of the configuration of the class
		 * @param	boolean		remove: if true, the classes are removed
		 *
		 * @return	void
		 */
		alternateColumns : function (table, classConfiguration, remove) {
			var oddClass = { td : classConfiguration.columns.oddClass, th : classConfiguration.columns.oddHeaderClass };
			var evenClass = { td : classConfiguration.columns.evenClass, th : classConfiguration.columns.evenHeaderClass };
			var startAt = parseInt(classConfiguration.columns.startAt);
			startAt = remove ? 1 : (startAt ? startAt : 1);
			var rows = table.rows, type, odd, even;
				// Loop through the rows of the table
			for (var i = rows.length; --i >= 0;) {
					// Loop through the cells
				var cells = rows[i].cells;
				for (var j = startAt-1, n = cells.length; j < n; j++) {
					var cell = cells[j];
					type = cell.nodeName.toLowerCase();
					odd = oddClass[type];
					even = evenClass[type];
					if (remove) {
						if (odd) Dom.removeClass(cell, odd);
						if (even) Dom.removeClass(cell, even);
					} else if (odd && even) {
							// Check if j+startAt is even, and apply classes for both possible results
						if ((j % 2) == 0) {
							if (Dom.hasClass(cell, even)) {
								Dom.removeClass(cell, even);
							}
							Dom.addClass(cell, odd);
						} else{
							if (Dom.hasClass(cell, odd)) {
								Dom.removeClass(cell, odd);
							}
							Dom.addClass(cell, even);
						}
					}
				}
			}
		},
		/*
		 * Removes from rows/cells the counting classes of an counting style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 * @param	string		removeClass: the name of the class that identifies the counting style scheme
		 *
		 * @return	void
		 */
		removeCountingClasses: function (table, removeClass) {
			if (table) {
				if (this.classesUrl && typeof HTMLArea.classesCounting === 'undefined') {
					this.getJavascriptFile(this.classesUrl, function (options, success, response) {
						if (success) {
							try {
								if (typeof HTMLArea.classesCounting === 'undefined') {
									eval(response.responseText);
								}
								this.removeCountingClasses(table, removeClass);
							} catch(e) {
								this.appendToLog('removeCountingClasses', 'Error evaluating contents of Javascript file: ' + this.classesUrl, 'error');
							}
						}
					});
				} else {
					var classConfiguration = HTMLArea.classesCounting[removeClass];
					if (classConfiguration) {
						if (classConfiguration.rows && classConfiguration.rows.rowClass) {
							this.countRows(table, classConfiguration, true);
						}
						if (classConfiguration.columns && classConfiguration.columns.columnClass) {
							this.countColumns(table, classConfiguration, true);
						}
					}
				}
			}
		},
		/*
		 * Applies/removes the counting classes of an counting rows style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 * @param	object		classConfifuration: the counting sub-array of the configuration of the class
		 * @param	boolean		remove: if true, the classes are removed
		 *
		 * @return	void
		 */
		countRows : function (table, classConfiguration, remove) {
			var rowClass = { tbody : classConfiguration.rows.rowClass, thead : classConfiguration.rows.rowHeaderClass };
			var rowLastClass = { tbody : classConfiguration.rows.rowLastClass, thead : classConfiguration.rows.rowHeaderLastClass };
			var startAt = parseInt(classConfiguration.rows.startAt);
			startAt = remove ? 1 : (startAt ? startAt : 1);
			var rows = table.rows, type, baseClassName, rowClassName, lastRowClassName;
				// Loop through the rows
			for (var i = startAt-1, n = rows.length; i < n; i++) {
				var row = rows[i];
				type = (row.parentNode.nodeName.toLowerCase() == "thead") ? "thead" : "tbody";
				baseClassName = rowClass[type];
				rowClassName = baseClassName + (i+1);
				lastRowClassName = rowLastClass[type];
				if (remove) {
					if (baseClassName) {
						Dom.removeClass(row, rowClassName);
					}
					if (lastRowClassName && i == n-1) {
						Dom.removeClass(row, lastRowClassName);
					}
				} else {
					if (baseClassName) {
						if (Dom.hasClass(row, baseClassName, true)) {
							Dom.removeClass(row, baseClassName, true);
						}
						Dom.addClass(row, rowClassName);
					}
					if (lastRowClassName) {
						if (i == n-1) {
							Dom.addClass(row, lastRowClassName);
						} else if (Dom.hasClass(row, lastRowClassName)) {
							Dom.removeClass(row, lastRowClassName);
						}
					}
				}
			}
		},
		/*
		 * Applies/removes the counting classes of a counting columns style scheme
		 *
		 * @param	object		table: the table to be re-styled
		 * @param	object		classConfifuration: the counting sub-array of the configuration of the class
		 * @param	boolean		remove: if true, the classes are removed
		 *
		 * @return	void
		 */
		countColumns : function (table, classConfiguration, remove) {
			var columnClass = { td : classConfiguration.columns.columnClass, th : classConfiguration.columns.columnHeaderClass };
			var columnLastClass = { td : classConfiguration.columns.columnLastClass, th : classConfiguration.columns.columnHeaderLastClass };
			var startAt = parseInt(classConfiguration.columns.startAt);
			startAt = remove ? 1 : (startAt ? startAt : 1);
			var rows = table.rows, type, baseClassName, columnClassName, lastColumnClassName;
				// Loop through the rows of the table
			for (var i = rows.length; --i >= 0;) {
					// Loop through the cells
				var cells = rows[i].cells;
				for (var j = startAt-1, n = cells.length; j < n; j++) {
					var cell = cells[j];
					type = cell.nodeName.toLowerCase();
					baseClassName = columnClass[type];
					columnClassName = baseClassName + (j+1);
					lastColumnClassName = columnLastClass[type];
					if (remove) {
						if (baseClassName) {
							Dom.removeClass(cell, columnClassName);
						}
						if (lastColumnClassName && j == n-1) {
								Dom.removeClass(cell, lastColumnClassName);
						}
					} else {
						if (baseClassName) {
							if (Dom.hasClass(cell, baseClassName, true)) {
								Dom.removeClass(cell, baseClassName, true);
							}
							Dom.addClass(cell, columnClassName);
						}
						if (lastColumnClassName) {
							if (j == n-1) {
								Dom.addClass(cell, lastColumnClassName);
							} else if (Dom.hasClass(cell, lastColumnClassName)) {
								Dom.removeClass(cell, lastColumnClassName);
							}
						}
					}
				}
			}
		},
		/*
		 * This function sets the headers cells on the table (top, left, both or none)
		 *
		 * @param	object		table: the table being edited
		 * @param	object		params: the field values entered in the form
		 *
		 * @return	void
		 */
		setHeaders: function (table, params) {
			var headers = params.f_headers;
			var doc = this.editor.document;
			var tbody = table.tBodies[0];
			var thead = table.tHead;
			if (thead && !thead.rows.length && !tbody.rows.length) {
				 // Table is degenerate
				return table;
			}
			if (headers == "top") {
				if (!thead) {
					var thead = doc.createElement("thead");
					thead = table.insertBefore(thead, tbody);
				}
				if (!thead.rows.length) {
					var firstRow = thead.appendChild(tbody.rows[0]);
				} else {
					var firstRow = thead.rows[0];
				}
				Dom.removeClass(firstRow, this.useHeaderClass);
			} else {
				if (thead) {
					var rows = thead.rows;
					if (rows.length) {
						for (var i = rows.length; --i >= 0;) {
							this.remapRowCells(rows[i], "td");
							if (tbody.rows.length) {
								tbody.insertBefore(rows[i], tbody.rows[0]);
							} else {
								tbody.appendChild(rows[i]);
							}
						}
					}
					table.removeChild(thead);
				}
			}
			if (headers == "both") {
				var firstRow = tbody.rows[0];
				Dom.addClass(firstRow, this.useHeaderClass);
			} else if (headers != "top") {
				var firstRow = tbody.rows[0];
				Dom.removeClass(firstRow, this.useHeaderClass);
				this.remapRowCells(firstRow, "td");
			}
			if (headers == "top" || headers == "both") {
				this.remapRowCells(firstRow, "th");
			}
			if (headers == "left") {
				var firstRow = tbody.rows[0];
			}
			if (headers == "left" || headers == "both") {
				var rows = tbody.rows;
				for (var i = rows.length; --i >= 0;) {
					if (i || rows[i] == firstRow) {
						if (rows[i].cells[0].nodeName.toLowerCase() != "th") {
							var th = this.remapCell(rows[i].cells[0], "th");
							th.scope = "row";
						}
					}
				}
			} else {
				var rows = tbody.rows;
				for (var i = rows.length; --i >= 0;) {
					if (rows[i].cells[0].nodeName.toLowerCase() != "td") {
						rows[i].cells[0].scope = "";
						var td = this.remapCell(rows[i].cells[0], "td");
					}
				}
			}
			this.reStyleTable(table);
		},

		/**
		 * This function remaps the given cell to the specified node name
		 */
		remapCell: function(element, nodeName) {
			var newCell = Dom.convertNode(element, nodeName);
			var attributes = element.attributes, attributeName, attributeValue;
			for (var i = attributes.length; --i >= 0;) {
				attributeName = attributes.item(i).nodeName;
				if (nodeName != 'td' || (attributeName != 'scope' && attributeName != 'abbr')) {
					attributeValue = element.getAttribute(attributeName);
					if (attributeValue) {
						newCell.setAttribute(attributeName, attributeValue);
					}
				}
			}
			if (this.tags && this.tags[nodeName] && this.tags[nodeName].allowedClasses) {
				if (newCell.className && /\S/.test(newCell.className)) {
					var allowedClasses = this.tags[nodeName].allowedClasses;
					var classNames = newCell.className.trim().split(" ");
					for (var i = classNames.length; --i >= 0;) {
						if (!allowedClasses.test(classNames[i])) {
							Dom.removeClass(newCell, classNames[i]);
						}
					}
				}
			}
			return newCell;
		},

		remapRowCells: function (row, toType) {
			var cells = row.cells;
			if (toType === "th") {
				for (var i = cells.length; --i >= 0;) {
					if (cells[i].nodeName.toLowerCase() != "th") {
						var th = this.remapCell(cells[i], "th");
						th.scope = "col";
					}
				}
			} else {
				for (var i = cells.length; --i >= 0;) {
					if (cells[i].nodeName.toLowerCase() != "td") {
						var td = this.remapCell(cells[i], "td");
						td.scope = "";
					}
				}
			}
		},

		/**
		 * This function applies the style properties found in params to the given element
		 *
		 * @param	object		element: the element
		 * @param	object		params: the properties
		 *
		 * @return	void
		 */
		processStyle: function (element, params) {
			var style = element.style;
			style.cssFloat = '';
			style.textAlign = "";
			for (var i in params) {
				if (params.hasOwnProperty(i)) {
					var val = params[i];
					switch (i) {
					    case "f_st_backgroundColor":
						if (/\S/.test(val)) {
							style.backgroundColor = ((val.charAt(0) === '#') ? '' : '#') + val;
						} else {
							style.backgroundColor = '';
						}
						break;
					    case "f_st_color":
						if (/\S/.test(val)) {
							style.color = ((val.charAt(0) === '#') ? '' : '#') + val;
						} else {
							style.color = '';
						}
						break;
					    case "f_st_backgroundImage":
						if (/\S/.test(val)) {
							style.backgroundImage = "url(" + val + ")";
						} else {
							style.backgroundImage = "";
						}
						break;
					    case "f_st_borderWidth":
						if (/\S/.test(val)) {
							style.borderWidth = val + "px";
						} else {
							style.borderWidth = "";
						}
						if (params.f_st_borderStyle == "none") style.borderWidth = "0px";
						if (params.f_st_borderStyle == "not set") style.borderWidth = "";
						break;
					    case "f_st_borderStyle":
						style.borderStyle = (val != "not set") ? val : "";
						break;
					    case "f_st_borderColor":
						if (/\S/.test(val)) {
							style.borderColor = ((val.charAt(0) === '#') ? '' : '#') + val;
						} else {
							style.borderColor = '';
						}
						if (params.f_st_borderStyle === 'none') {
							style.borderColor = '';
						}
						break;
					    case "f_st_borderCollapse":
						style.borderCollapse = (val !== 'not set') ? val : '';
						if (params.f_st_borderStyle === 'none') {
							style.borderCollapse = '';
						}
						break;
					    case "f_st_width":
						if (/\S/.test(val)) {
							style.width = val + params.f_st_widthUnit;
						} else {
							style.width = "";
						}
						break;
					    case "f_st_height":
						if (/\S/.test(val)) {
							style.height = val + params.f_st_heightUnit;
						} else {
							style.height = "";
						}
						break;
					    case "f_st_textAlign":
						style.textAlign = (val != "not set") ? val : "";
						break;
					    case "f_st_vertAlign":
						style.verticalAlign = (val != "not set") ? val : "";
						break;
					}
				}
			}
		},
		/*
		 * This function builds the configuration object for the table Description fieldset
		 *
		 * @param	object		table: the table being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildDescriptionFieldsetConfig: function (table) {
			if (typeof table === 'object' && table !== null) {
				var caption = table.getElementsByTagName('caption')[0];
			}
			return {
				xtype: 'fieldset',
				title: this.localize('Description'),
				defaultType: 'textfield',
				defaults: {
					labelSeparator: '',
					helpIcon: true
				},
				items: [{
					fieldLabel: this.getHelpTip('caption', 'Caption:'),
					itemId: 'f_caption',
					value: typeof caption !== 'undefined' ? caption.innerHTML : '',
					width: 300,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Description of the nature of the table')
					},{
					fieldLabel: this.getHelpTip('summary', 'Summary:'),
					itemId: 'f_summary',
					value: typeof table === 'object' && table !== null ? table.summary : '',
					width: 300,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Summary of the table purpose and structure')
				}]
			};
		},
		/*
		 * This function builds the configuration object for the table Size and Headers fieldset
		 *
		 * @param	object		table: the table being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildSizeAndHeadersFieldsetConfig: function (table) {
			var itemsConfig = [];
			if (typeof table !== 'object' || table === null) {
				itemsConfig.push({
					fieldLabel: this.getHelpTip('numberOfRows', 'Number of rows'),
					labelSeparator: ':',
					itemId: 'f_rows',
					value: (this.properties.numberOfRows && this.properties.numberOfRows.defaultValue) ? this.properties.numberOfRows.defaultValue : '2',
					width: 30,
					minValue: 1,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Number of rows')
				});
				itemsConfig.push({
					fieldLabel: this.getHelpTip('numberOfColumns', 'Number of columns'),
					labelSeparator: ':',
					itemId: 'f_cols',
					value: (this.properties.numberOfColumns && this.properties.numberOfColumns.defaultValue) ? this.properties.numberOfColumns.defaultValue : '4',
					width: 30,
					minValue: 1,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Number of columns')
				});
			}
			if (this.removedProperties.indexOf('headers') == -1) {
					// Create combo store
				var store = new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('No header cells'), 'none'],
						[this.localize('Header cells on top'), 'top'],
						[this.localize('Header cells on left'), 'left'],
						[this.localize('Header cells on top and left'), 'both']
					]
				});
				this.removeOptions(store, 'headers');
				if (typeof table !== 'object' || table === null) {
					var selected = (this.properties.headers && this.properties.headers.defaultValue) ? this.properties.headers.defaultValue : 'top';
				} else {
					var selected = 'none';
					var thead = table.getElementsByTagName('thead');
					var tbody = table.getElementsByTagName('tbody');
					if (thead.length && thead[0].rows.length) {
						selected = 'top';
					} else if (tbody.length && tbody[0].rows.length) {
						if (Dom.hasClass(tbody[0].rows[0], this.useHeaderClass)) {
							selected = 'both';
						} else if (tbody[0].rows[0].cells.length && tbody[0].rows[0].cells[0].nodeName.toLowerCase() == 'th') {
							selected = 'left';
						}
					}
				}
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('tableHeaders', 'Headers:'),
					labelSeparator: '',
					itemId: 'f_headers',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Table headers'),
					store: store,
					width: (this.properties['headers'] && this.properties['headers'].width) ? this.properties['headers'].width : 200,
					value: selected
				}, this.configDefaults['combo']));
			}
			return {
				xtype: 'fieldset',
				title: this.localize(typeof table !== 'object' || table === null ? 'Size and Headers' : 'Headers'),
				defaultType: 'numberfield',
				defaults: {
					helpIcon: true
				},
				items: itemsConfig
			};
		},
		/*
		 * This function builds the configuration object for the Style fieldset
		 *
		 * @param	object		element: the element being edited, if any
		 * @param	string		buttonId: the id of the button that was pressed
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildStylingFieldsetConfig: function (element, buttonId) {
			var itemsConfig = [];
			var nodeName = element ? element.nodeName.toLowerCase() : 'table';
			var table = (nodeName == 'table');
			var select = this.buildStylingFieldConfig('f_class', (table ? 'Table class:' : 'Class:'), (table ? 'Table class selector' : 'Class selector'));
			this.setStyleOptions(select, element, nodeName, (buttonId === 'InsertTable') ? this.defaultClass : null);
			itemsConfig.push(select);
			if (element && table) {
				var tbody = element.getElementsByTagName('tbody')[0];
				if (tbody) {
					var tbodyStyleSelect = this.buildStylingFieldConfig('f_class_tbody', 'Table body class:', 'Table body class selector');
					this.setStyleOptions(tbodyStyleSelect, tbody, 'tbody');
					itemsConfig.push(tbodyStyleSelect);
				}
				var thead = element.getElementsByTagName('thead')[0];
				if (thead) {
					var theadStyleSelect = this.buildStylingFieldConfig('f_class_thead', 'Table header class:', 'Table header class selector');
					this.setStyleOptions(theadStyleSelect, thead, 'thead');
					itemsConfig.push(theadStyleSelect);
				}
				var tfoot = element.getElementsByTagName('tfoot')[0];
				if (tfoot) {
					var tfootStyleSelect = this.buildStylingFieldConfig('f_class_tfoot', 'Table footer class:', 'Table footer class selector');
					this.setStyleOptions(tfootStyleSelect, tfoot, 'tfoot');
					itemsConfig.push(tfootStyleSelect);
				}
			}
			return {
				xtype: 'fieldset',
				defaults: {
					labelSeparator: ''
				},
				title: table ? this.getHelpTip('tableStyle', 'CSS Style') : this.localize('CSS Style'),
				items: itemsConfig
			};
		},
		/*
		 * This function builds a style selection field
		 *
		 * @param	string		fieldName: the name of the field
		 * @param	string		fieldLabel: the label for the field
		 * @param	string		fieldTitle: the title for the field tooltip
		 *
		 * @return	object		the style selection field object
		 */
		buildStylingFieldConfig: function(fieldName, fieldLabel, fieldTitle) {
			return new Ext.form.ComboBox(Util.apply({
				xtype: 'combo',
				itemId: fieldName,
				fieldLabel: this.getHelpTip(fieldTitle, fieldLabel),
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize(fieldTitle),
				width: (this.properties['style'] && this.properties['style'].width) ? this.properties['style'].width : 300,
				store: new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}, { name: 'style'} ],
					data: [[this.localize('No block style'), 'none']]
				})
				}, {
				tpl: '<tpl for="."><div ext:qtip="{value}" style="{style}text-align:left;font-size:11px;" class="x-combo-list-item">{text}</div></tpl>'
				}, this.configDefaults['combo']
			));
		},
		/*
		 * This function populates the style store and sets the selected option
		 *
		 * @param	object:		dropDown: the combobox object
		 * @param	object		element: the element being edited, if any
		 * @param	string		nodeName: the type of element ('table' on table insertion)
		 * @param	string		defaultClass: default class, if any is configured
		 *
		 * @return	object		the fieldset configuration object
		 */
		setStyleOptions: function (dropDown, element, nodeName, defaultClass) {
			var blockStyle = this.getPluginInstance('BlockStyle');
			if (dropDown && blockStyle) {
				if (defaultClass) {
					var classNames = new Array();
					classNames.push(defaultClass);
				} else {
					var classNames = Dom.getClassNames(element);
				}
				blockStyle.buildDropDownOptions(dropDown, nodeName);
				blockStyle.setSelectedOption(dropDown, classNames, false, defaultClass);
			}
		},
		/*
		 * This function builds the configuration object for the Language fieldset
		 *
		 * @param	object		element: the element being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildLanguageFieldsetConfig: function (element) {
			var itemsConfig = [];
			var languageObject = this.getPluginInstance('Language');
			if (this.removedProperties.indexOf('language') == -1 && this.getButton('Language')) {
				var selectedLanguage = typeof element === 'object' && element !== null ? languageObject.getLanguageAttribute(element) : 'none';
				function initLanguageStore (store) {
					if (selectedLanguage !== 'none') {
						store.removeAt(0);
						store.insert(0, new store.recordType({
							text: languageObject.localize('Remove language mark'),
							value: 'none'
						}));
					}
				}
				var languageStore = new Ext.data.JsonStore({
					autoDestroy:  true,
					autoLoad: true,
					root: 'options',
					fields: [ { name: 'text'}, { name: 'value'} ],
					url: this.getDropDownConfiguration('Language').dataUrl,
					listeners: {
						load: initLanguageStore
					}
				});
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('languageCombo', 'Language', 'Language'),
					itemId: 'f_lang',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Language'),
					store: languageStore,
					width: (this.properties['language'] && this.properties['language'].width) ? this.properties['language'].width : 200,
					value: selectedLanguage
				}, this.configDefaults['combo']));
			}
			if (this.removedProperties.indexOf('direction') == -1 && (this.getButton('LeftToRight') || this.getButton('RightToLeft'))) {
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('directionCombo', 'Text direction', 'Language'),
					itemId: 'f_dir',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Text direction'),
					store: new Ext.data.ArrayStore({
						autoDestroy:  true,
						fields: [ { name: 'text'}, { name: 'value'}],
						data: [
							[this.localize('Not set'), 'not set'],
							[this.localize('RightToLeft'), 'rtl'],
							[this.localize('LeftToRight'), 'ltr']
						]
					}),
					width: (this.properties['direction'] && this.properties['dirrection'].width) ? this.properties['direction'].width : 200,
					value: typeof element === 'object' && element !== null && element.dir ? element.dir : 'not set'
				}, this.configDefaults['combo']));
			}
			return {
				xtype: 'fieldset',
				title: this.localize('Language'),
				items: itemsConfig
			};
		},
		/*
		 * This function builds the configuration object for the spacing fieldset
		 *
		 * @param	object		table: the table being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildSpacingFieldsetConfig: function (table) {
			return {
				xtype: 'fieldset',
				title: this.localize('Spacing and padding'),
				defaultType: 'numberfield',
				defaults: {
					labelSeparator: '',
					helpIcon: true
				},
				items: [{
					fieldLabel: this.getHelpTip('cellSpacing', 'Cell spacing:'),
					itemId: 'f_spacing',
					value: typeof table === 'object' && table !== null ? table.cellSpacing : '',
					width: 30,
					minValue: 0,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Space between adjacent cells')
					},{
					fieldLabel: this.getHelpTip('cellPadding', 'Cell padding:'),
					itemId: 'f_padding',
					value: typeof table === 'object' && table !== null ? table.cellPadding : '',
					width: 30,
					minValue: 0,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Space between content and border in cell')
				}]
			};
		},

		/**
		 * This function builds the configuration object for the Layout fieldset
		 *
		 * @param object table: the element being edited, if any
		 * @return object the fieldset configuration object
		 */
		buildLayoutFieldsetConfig: function(element) {
			var itemsConfig = [];
			var nodeName = element ? element.nodeName.toLowerCase() : 'table';
			switch(nodeName) {
				case 'table' :
					var widthTitle = 'Table width';
					var heightTitle = 'Table height';
					break;
				case 'tr' :
					var widthTitle = 'Row width';
					var heightTitle = 'Row height';
					break;
				case 'td' :
				case 'th' :
					var widthTitle = 'Cell width';
					var heightTitle = 'Cell height';
			}
			if (this.removedProperties.indexOf('width') === -1) {
				var widthUnitStore = new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('percent'), '%'],
						[this.localize('pixels'), 'px'],
						[this.localize('em'), 'em']
					]
				});
				this.removeOptions(widthUnitStore, 'widthUnit');
				itemsConfig.push({
					fieldLabel: this.getHelpTip(widthTitle, 'Width:'),
					labelSeparator: '',
					itemId: 'f_st_width',
					value: element ? this.getLength(element.style.width) : ((this.properties.width && this.properties.width.defaultValue) ? this.properties.width.defaultValue : ''),
					width: 30,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize(widthTitle)
				});
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('Width unit', 'Width unit'),
					itemId: 'f_st_widthUnit',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Width unit'),
					store: widthUnitStore,
					width: (this.properties['widthUnit'] && this.properties['widthUnit'].width) ? this.properties['widthUnit'].width : 70,
					value: element ? (/%/.test(element.style.width) ? '%' : (/px/.test(element.style.width) ? 'px' : 'em')) : ((this.properties.widthUnit && this.properties.widthUnit.defaultValue) ? this.properties.widthUnit.defaultValue : '%')
				}, this.configDefaults['combo']));
			}
			if (this.removedProperties.indexOf('height') === -1) {
				var heightUnitStore = new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('percent'), '%'],
						[this.localize('pixels'), 'px'],
						[this.localize('em'), 'em']
					]
				});
				this.removeOptions(heightUnitStore, 'heightUnit');
				itemsConfig.push({
					fieldLabel: this.getHelpTip(heightTitle, 'Height:'),
					labelSeparator: '',
					itemId: 'f_st_height',
					value: element ? this.getLength(element.style.height) : ((this.properties.height && this.properties.height.defaultValue) ? this.properties.height.defaultValue : ''),
					width: 30,
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize(heightTitle)
				});
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('Height unit', 'Height unit'),
					itemId: 'f_st_heightUnit',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Height unit'),
					store: heightUnitStore,
					width: (this.properties['heightUnit'] && this.properties['heightUnit'].width) ? this.properties['heightUnit'].width : 70,
					value: element ? (/%/.test(element.style.height) ? '%' : (/px/.test(element.style.height) ? 'px' : 'em')) : ((this.properties.heightUnit && this.properties.heightUnit.defaultValue) ? this.properties.heightUnit.defaultValue : '%')
				}, this.configDefaults['combo']));
			}
			if (nodeName == 'table' && this.removedProperties.indexOf('float') === -1) {
				var floatStore = new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('Not set'), 'not set'],
						[this.localize('Left'), 'left'],
						[this.localize('Right'), 'right']
					]
				});
				this.removeOptions(floatStore, 'float');
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('tableFloat', 'Float:'),
					labelSeparator: '',
					itemId: 'f_st_float',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Specifies where the table should float'),
					store: floatStore,
					width: (this.properties['float'] && this.properties['float'].width) ? this.properties['float'].width : 120,
					value: element ? (Dom.hasClass(element, this.floatLeft) ? 'left' : (Dom.hasClass(element, this.floatRight) ? 'right' : 'not set')) : this.floatDefault
				}, this.configDefaults['combo']));
			}
			return {
				xtype: 'fieldset',
				title: this.localize('Layout'),
				defaultType: 'numberfield',
				defaults: {
					helpIcon: true
				},
				items: itemsConfig
			};
		},

		/**
		 * This function builds the configuration object for the Layout fieldset
		 *
		 * @param object element: the element being edited, if any
		 * @return object the fieldset configuration object
		 */
		buildAlignmentFieldsetConfig: function (element) {
			var itemsConfig = [];
			// Text alignment
			var selectedTextAlign = 'not set';
			var blockElements = this.getPluginInstance('BlockElements');
			if (element && blockElements) {
				for (var value in this.convertAlignment) {
					if (Dom.hasClass(element, blockElements.useClass[this.convertAlignment[value]])) {
						selectedTextAlign = value;
						break;
					}
				}
			} else {
				selectedTextAlign = (element && element.style.textAlign) ? element.style.textAlign : 'not set';
			}
			itemsConfig.push(Util.apply({
				xtype: 'combo',
				fieldLabel: this.getHelpTip('textAlignment', 'Text alignment:'),
				itemId: 'f_st_textAlign',
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Horizontal alignment of text within cell'),
				store: new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('Not set'), 'not set'],
						[this.localize('Left'), 'left'],
						[this.localize('Center'), 'center'],
						[this.localize('Right'), 'right'],
						[this.localize('Justify'), 'justify']
					]
				}),
				width: (this.properties['textAlign'] && this.properties['textAlign'].width) ? this.properties['textAlign'].width : 100,
				value: selectedTextAlign
			}, this.configDefaults['combo']));
				// Vertical alignment
			itemsConfig.push(Util.apply({
				xtype: 'combo',
				fieldLabel: this.getHelpTip('verticalAlignment', 'Vertical alignment:'),
				itemId: 'f_st_vertAlign',
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Vertical alignment of content within cell'),
				store: new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('Not set'), 'not set'],
						[this.localize('Top'), 'top'],
						[this.localize('Middle'), 'middle'],
						[this.localize('Bottom'), 'bottom'],
						[this.localize('Baseline'), 'baseline']
					]
				}),
				width: (this.properties['verticalAlign'] && this.properties['verticalAlign'].width) ? this.properties['verticalAlign'].width : 100,
				value: (element && element.style.verticalAlign) ? element.style.verticalAlign : 'not set'
			}, this.configDefaults['combo']));
			return {
				xtype: 'fieldset',
				title: this.localize('Alignment'),
				defaults: {
					labelSeparator: ''
				},
				items: itemsConfig
			};
		},
		/*
		 * This function builds the configuration object for the Borders fieldset
		 *
		 * @param	object		element: the element being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildBordersFieldsetConfig: function (element) {
			var itemsConfig = [];
			var nodeName = element ? element.nodeName.toLowerCase() : 'table';
				// Border style
			var borderStyleStore = new Ext.data.ArrayStore({
				autoDestroy:  true,
				fields: [ { name: 'text'}, { name: 'value'}],
				data: [
					[this.localize('Not set'), 'not set'],
					[this.localize('No border'), 'none'],
					[this.localize('Dotted'), 'dotted'],
					[this.localize('Dashed'), 'dashed'],
					[this.localize('Solid'), 'solid'],
					[this.localize('Double'), 'double'],
					[this.localize('Groove'), 'groove'],
					[this.localize('Ridge'), 'ridge'],
					[this.localize('Inset'), 'inset'],
					[this.localize('Outset'), 'outset']
				]
			});
			this.removeOptions(borderStyleStore, 'borderStyle');
				// Gecko reports "solid solid solid solid" for "border-style: solid".
				// That is, "top right bottom left" -- we only consider the first value.
			var selectedBorderStyle = element && element.style.borderStyle ? element.style.borderStyle : ((this.properties.borderWidth) ? ((this.properties.borderStyle && this.properties.borderStyle.defaultValue) ? this.properties.borderStyle.defaultValue : 'solid') : 'not set');
			itemsConfig.push(Util.apply({
				xtype: 'combo',
				fieldLabel: this.getHelpTip('borderStyle', 'Border style:'),
				itemId: 'f_st_borderStyle',
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Border style'),
				store: borderStyleStore,
				width: (this.properties.borderStyle && this.properties.borderStyle.width) ? this.properties.borderStyle.width : 150,
				value: selectedBorderStyle,
				listeners: {
					change: {
						fn: this.setBorderFieldsDisabled
					}
				}
			}, this.configDefaults['combo']));
				// Border width
			itemsConfig.push({
				fieldLabel: this.getHelpTip('borderWidth', 'Border width:'),
				itemId: 'f_st_borderWidth',
				value: element ? this.getLength(element.style.borderWidth) : ((this.properties.borderWidth && this.properties.borderWidth.defaultValue) ? this.properties.borderWidth.defaultValue : ''),
				width: 30,
				minValue: 0,
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Border width'),
				disabled: (selectedBorderStyle === 'none')
			});
				// Border color
			itemsConfig.push({
				xtype: 'colorpalettefield',
				fieldLabel: this.getHelpTip('borderColor', 'Color:'),
				itemId: 'f_st_borderColor',
				colors: this.editorConfiguration.disableColorPicker ? [] : null,
				colorsConfiguration: this.editorConfiguration.colors,
				value: Color.colorToHex(element && element.style.borderColor ? element.style.borderColor : ((this.properties.borderColor && this.properties.borderColor.defaultValue) ? this.properties.borderColor.defaultValue : '')).substr(1, 6),
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Border color'),
				disabled: (selectedBorderStyle === 'none')
			});
			if (nodeName === 'table') {
					// Collapsed borders
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('collapsedBorders', 'Collapsed borders'),
					labelSeparator: ':',
					itemId: 'f_st_borderCollapse',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Collapsed borders'),
					store: new Ext.data.ArrayStore({
						autoDestroy:  true,
						fields: [ { name: 'text'}, { name: 'value'}],
						data: [
							[this.localize('Not set'), 'not set'],
							[this.localize('Collapsed borders'), 'collapse'],
							[this.localize('Detached borders'), 'separate']
						]
					}),
					width: (this.properties.borderCollapse && this.properties.borderCollapse.width) ? this.properties.borderCollapse.width : 150,
					value: element && element.style.borderCollapse ? element.style.borderCollapse : 'not set',
					disabled: (selectedBorderStyle === 'none')
				}, this.configDefaults['combo']));
					// Frame
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('frames', 'Frames:'),
					itemId: 'f_frames',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Specifies which sides should have a border'),
					store: new Ext.data.ArrayStore({
						autoDestroy:  true,
						fields: [ { name: 'text'}, { name: 'value'}],
						data: [
							[this.localize('Not set'), 'not set'],
							[this.localize('No sides'), 'void'],
							[this.localize('The top side only'), 'above'],
							[this.localize('The bottom side only'), 'below'],
							[this.localize('The top and bottom sides only'), 'hsides'],
							[this.localize('The right and left sides only'), 'vsides'],
							[this.localize('The left-hand side only'), 'lhs'],
							[this.localize('The right-hand side only'), 'rhs'],
							[this.localize('All four sides'), 'box']
						]
					}),
					width: (this.properties.frame && this.properties.frame.width) ? this.properties.frame.width : 250,
					value: (element && element.frame) ? element.frame : 'not set',
					disabled: (selectedBorderStyle === 'none')
				}, this.configDefaults['combo']));
					// Rules
				itemsConfig.push(Util.apply({
					xtype: 'combo',
					fieldLabel: this.getHelpTip('rules', 'Rules:'),
					itemId: 'f_rules',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Specifies where rules should be displayed'),
					store: new Ext.data.ArrayStore({
						autoDestroy:  true,
						fields: [ { name: 'text'}, { name: 'value'}],
						data: [
							[this.localize('Not set'), 'not set'],
							[this.localize('No rules'), 'none'],
							[this.localize('Rules will appear between rows only'), 'rows'],
							[this.localize('Rules will appear between columns only'), 'cols'],
							[this.localize('Rules will appear between all rows and columns'), 'all']
						]
					}),
					width: (this.properties.rules && this.properties.rules.width) ? this.properties.rules.width : 360,
					value: (element && element.rules) ? element.rules : 'not set'
				}, this.configDefaults['combo']));
			}
			return {
				xtype: 'fieldset',
				title: this.localize('Frame and borders'),
				defaultType: 'numberfield',
				defaults: {
					labelSeparator: '',
					helpIcon: true
				},
				items: itemsConfig
			};
		},
		/*
		 * onChange handler: enable/disable other fields of the same fieldset
		 */
		setBorderFieldsDisabled: function (field, value) {
			field.ownerCt.findBy(function (item) {
				var itemId = item.getItemId();
				if (itemId == 'f_st_borderStyle' || itemId == 'f_rules') {
					return false;
				} else if (value === 'none') {
					switch (item.getXType()) {
						case 'numberfield':
							item.setValue(0);
							break;
						case 'colorpalettefield':
							item.setValue('');
							break;
						default:
							item.setValue('not set');
							break;
					}
					item.setDisabled(true);
				} else {
					item.setDisabled(false);
				}
				return true;
			});
		},
		/*
		 * This function builds the configuration object for the Colors fieldset
		 *
		 * @param	object		element: the element being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildColorsFieldsetConfig: function (element) {
			var itemsConfig = [];
				// Text color
			itemsConfig.push({
				xtype: 'colorpalettefield',
				fieldLabel: this.getHelpTip('textColor', 'FG Color:'),
				itemId: 'f_st_color',
				colors: this.editorConfiguration.disableColorPicker ? [] : null,
				colorsConfiguration: this.editorConfiguration.colors,
				value: Color.colorToHex(element && element.style.color ? element.style.color : ((this.properties.color && this.properties.color.defaultValue) ? this.properties.color.defaultValue : '')).substr(1, 6)
			});
				// Background color
			itemsConfig.push({
				xtype: 'colorpalettefield',
				fieldLabel: this.getHelpTip('backgroundColor', 'Background:'),
				itemId: 'f_st_backgroundColor',
				colors: this.editorConfiguration.disableColorPicker ? [] : null,
				colorsConfiguration: this.editorConfiguration.colors,
				value: Color.colorToHex(element && element.style.backgroundColor ? element.style.backgroundColor : ((this.properties.backgroundColor && this.properties.backgroundColor.defaultValue) ? this.properties.backgroundColor.defaultValue : '')).substr(1, 6)
			});
				// Background image
			itemsConfig.push({
				fieldLabel: this.getHelpTip('backgroundImage', 'Image URL:'),
				itemId: 'f_st_backgroundImage',
				value: element && element.style.backgroundImage.match(/url\(\s*(.*?)\s*\)/) ? RegExp.$1 : '',
				width: (this.properties.backgroundImage && this.properties.backgroundImage.width) ? this.properties.backgroundImage.width : 300,
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('URL of the background image'),
				helpIcon: true
			});
			return {
				xtype: 'fieldset',
				title: this.localize('Background and colors'),
				defaultType: 'textfield',
				defaults: {
					labelSeparator: ''
				},
				items: itemsConfig
			};
		},
		/*
		 * This function builds the configuration object for the Cell Type fieldset
		 *
		 * @param	object		element: the element being edited, if any
		 * @param	boolean		column: true if the element is a column, false if the element is a cell
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildCellTypeFieldsetConfig: function (element, column) {
			var itemsConfig = [];
			if (column) {
				var data = [
					[this.localize('Data cells'), 'td'],
					[this.localize('Headers for rows'), 'throw'],
					[this.localize('Headers for row groups'), 'throwgroup']
				];
			} else {
				var data = [
					[this.localize('Normal'), 'td'],
					[this.localize('Header for column'), 'thcol'],
					[this.localize('Header for row'), 'throw'],
					[this.localize('Header for row group'), 'throwgroup']
				];
			}
				// onChange handler: reset the CSS class dropdown and show/hide abbr field when the cell type changes
				// @param	object		cellTypeField: the combo object
				// @param	object		record: the selected record
				// @return	void
			var self = this;
			function cellTypeChange(cellTypeField, record) {
				var value = record.get('value');
				var styleCombo = self.dialog.find('itemId', 'f_class')[0];
				if (styleCombo) {
					self.setStyleOptions(styleCombo, element, value.substring(0,2));
				}
					// abbr field present only for single cell, not for column
				var abbrField = self.dialog.find('itemId', 'f_cell_abbr')[0];
				if (abbrField) {
					abbrField.setVisible(value != 'td');
					abbrField.label.setVisible(value != 'td');
				}
			}
			var selected = element.nodeName.toLowerCase() + element.scope.toLowerCase();
			itemsConfig.push(Util.apply({
				xtype: 'combo',
				fieldLabel: column ? this.getHelpTip('columnCellsType', 'Type of cells of the column') : this.getHelpTip('cellType', 'Type of cell'),
				itemId: 'f_cell_type',
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize(column ? 'Specifies the type of cells' : 'Specifies the type of cell'),
				store: new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: data
				}),
				width: (this.properties.cellType && this.properties.cellType.width) ? this.properties.cellType.width : 250,
				value: (column && selected == 'thcol') ? 'td' : selected,
				listeners: {
					select: {
						fn: cellTypeChange,
						scope: this
					}
				}
			}, this.configDefaults['combo']));
			if (!column) {
				itemsConfig.push({
					xtype: 'textfield',
					fieldLabel: this.getHelpTip('cellAbbreviation', 'Abbreviation'),
					labelSeparator: ':',
					itemId: 'f_cell_abbr',
					helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Header abbreviation'),
					width: 300,
					value: element.abbr,
					hideMode: 'visibility',
					hidden: (selected == 'td'),
					hideLabel: (selected == 'td')
				});
			}
			return {
				xtype: 'fieldset',
				title: this.localize(column ? 'Type of cells' : 'Cell Type and Scope'),
				defaults: {
					labelSeparator: '',
					helpIcon: true
				},
				items: itemsConfig
			};
		},
		/*
		 * This function builds the configuration object for the Row Group fieldset
		 *
		 * @param	object		element: the row being edited, if any
		 *
		 * @return	object		the fieldset configuration object
		 */
		buildRowGroupFieldsetConfig: function (element) {
			var itemsConfig = [];
			var current = element.parentNode.nodeName.toLowerCase();
				// onChange handler: show/hide cell conversion checkbox with appropriate label
				// @param	object		field: the combo object
				// @param	object		record: the selected record
				// @return	void
			function displayCheckbox(field, record, index) {
				var checkBox = field.ownerCt.getComponent('f_convertCells');
				var value = record.get('value');
				if (current !== value && (current === 'thead' || value === 'thead')) {
					checkBox.label.dom.innerHTML = (value === 'thead') ? this.localize('Make cells header cells') : this.localize('Make cells data cells');
					checkBox.show();
					checkBox.label.show();
					checkBox.setValue(true);
				} else {
					checkBox.setValue(false);
					checkBox.hide();
					checkBox.label.hide();
				}
			}
			itemsConfig.push(Util.apply({
				xtype: 'combo',
				fieldLabel: this.getHelpTip('rowGroup', 'Row group:'),
				itemId: 'f_rowgroup',
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Table section'),
				store: new Ext.data.ArrayStore({
					autoDestroy:  true,
					fields: [ { name: 'text'}, { name: 'value'}],
					data: [
						[this.localize('Table body'), 'tbody'],
						[this.localize('Table header'), 'thead'],
						[this.localize('Table footer'), 'tfoot']
					]
				}),
				width: (this.properties.rowGroup && this.properties.rowGroup.width) ? this.properties.rowGroup.width : 150,
				value: current,
				labelSeparator: '',
				listeners: {
					select: {
						fn: displayCheckbox,
						scope: this
					}
				}
			}, this.configDefaults['combo']));
				// Cell conversion checkbox
			itemsConfig.push({
				xtype: 'checkbox',
				fieldLabel: this.localize('Make cells header cells'),
				labelSeparator: ':',
				itemId: 'f_convertCells',
				helpTitle: typeof TYPO3.ContextHelp !== 'undefined' ? '' : this.localize('Make cells header cells'),
				value: false,
				hideMode: 'visibility',
				hidden: true,
				hideLabel: true
			});
			return {
				xtype: 'fieldset',
				title: this.localize('Row group'),
				defaults: {
					helpIcon: true
				},
				items: itemsConfig
			};
		},
		/*
		 * This function removes some items from a data store for the specified property
		 *
		 */
		removeOptions: function (store, property) {
			if (this.properties[property] && this.properties[property].removeItems) {
				var items = this.properties[property].removeItems.split(',');
				var index = -1;
				for (var i = items.length; --i >= 0;) {
					var item = items[i];
					index = store.findExact('value', item.trim());
					if (index !== -1) {
						store.removeAt(index);
					}
				}
			}
		},

		/**
		 * This function gets called by the editor key map when a key was pressed.
		 * It will process the enter key for IE and Opera when buttons.table.disableEnterParagraphs is set in the editor configuration
		 *
		 * @param object event: the jQuery event object (keydown)
		 * @return boolean false, if the event was taken care of
		 */
		onKey: function (event) {
			var range = this.editor.getSelection().createRange();
			var parentElement = this.editor.getSelection().getParentElement();
			while (parentElement && !Dom.isBlockElement(parentElement)) {
				parentElement = parentElement.parentNode;
			}
			if (/^(td|th)$/i.test(parentElement.nodeName)) {
				var brNode = this.editor.document.createElement('br');
				this.editor.getSelection().insertNode(brNode);
				if (brNode.nextSibling) {
					this.editor.getSelection().selectNodeContents(brNode.nextSibling, true);
				} else {
					this.editor.getSelection().selectNodeContents(brNode, false);
				}
				Event.stopEvent(event);
				return false;
			}
			return true;
		}
	});

	return TableOperations;

});

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
 * About Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/AboutEditor',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, Util) {

	var AboutEditor = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(AboutEditor, Plugin);
	Util.apply(AboutEditor.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function(editor) {

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.1',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			/**
			 * Registering the button
			 */
			var buttonId = 'About';
			var buttonConfiguration = {
				id		: buttonId,
				tooltip		: this.localize(buttonId.toLowerCase()),
				action		: 'onButtonPress',
				textMode	: true,
				dialog		: true,
				iconCls		: 'htmlarea-action-editor-show-about'
			};
			this.registerButton(buttonConfiguration);
			return true;
		 },
		/*
		 * Supported browsers
		 */
		browsers: [
			 'Firefox 1.5+',
			 'Google Chrome 1.0+',
			 'Internet Explorer 9.0+',
			 'Opera 9.62+',
			 'Safari 3.0.4+',
			 'SeaMonkey 1.0+'
		],
		/*
		 * This function gets called when the button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			this.openDialogue(
				buttonId,
				'About HTMLArea',
				this.getWindowDimensions({width:450, height:350}, buttonId),
				this.buildTabItems()
			);
			return false;
		},
		/*
		 * Open the dialogue window
		 *
		 * @param	string		buttonId: the button id
		 * @param	string		title: the window title
		 * @param	integer		dimensions: the opening width of the window
		 * @param	object		tabItems: the configuration of the tabbed panel
		 *
		 * @return	void
		 */
		openDialogue: function (buttonId, title, dimensions, tabItems) {
			this.dialog = new Ext.Window({
				title: this.localize(title),
				cls: 'htmlarea-window',
				border: false,
				width: dimensions.width,
				height: 'auto',
				iconCls: this.getButton(buttonId).iconCls,
				listeners: {
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: {
					xtype: 'tabpanel',
					activeTab: 0,
					listeners: {
						activate: {
							fn: this.resetFocus,
							scope: this
						},
						tabchange: {
							fn: this.syncHeight,
							scope: this
						}
					},
					items: tabItems
				},
				buttons: [
					this.buildButtonConfig('Close', this.onCancel)
				]
			});
			this.show();
		},
		/*
		 * Build the configuration of the the tab items
		 *
		 * @return	array	the configuration array of tab items
		 */
		buildTabItems: function () {
			var tabItems = [];
				// About tab
			tabItems.push({
				xtype: 'panel',
				cls: 'about',
				title: this.localize('About'),
				html: '<h1 id="version">htmlArea RTE ' +  RTEarea[0].version + '</h1>'
					+ '<p>' + this.localize('free_editor').replace('<', '&lt;').replace('>', '&gt;') + '</p>'
					+ '<p><br />' + this.localize('Browser support') + ': ' + this.browsers.join(', ') + '.</p>'
					+ '<p><br />' + this.localize('product_documentation') + '&nbsp;<a href="http://docs.typo3.org/typo3cms/extensions/rtehtmlarea/" target="_blank">typo3.org</a></p>'
					+ '<p style="text-align: center;">'
						+ '<br />'
						+ '&copy; 2002-2004 <a href="http://interactivetools.com" target="_blank">interactivetools.com, inc.</a><br />'
						+ '&copy; 2003-2004 <a href="http://dynarch.com" target="_blank">dynarch.com LLC.</a><br />'
						+ '&copy; 2004-2015 <a href="http://www.sjbr.ca" target="_blank">Stanislas Rolland</a><br />'
						+ this.localize('All rights reserved.')
					+ '</p>'
			});
				// Plugins tab
			if (!this.store) {
				this.store = new Ext.data.ArrayStore({
					fields: [{ name: 'name'}, { name: 'developer'},  { name: 'sponsor'}],
					sortInfo: {
						field: 'name',
						direction: 'ASC'
					},
					data: this.getPluginsInfo()
				});
			}
			tabItems.push({
				xtype: 'panel',
				cls: 'about-plugins',
				height: 200,
				title: this.localize('Plugins'),
				autoScroll: true,
				items: {
					xtype: 'listview',
					store: this.store,
					reserveScrollOffset: true,
					columns: [{
						header: this.localize('Name'),
						dataIndex: 'name',
						width: .33
					    },{
						header: this.localize('Developer'),
						dataIndex: 'developer',
						width: .33
					    },{
						header: this.localize('Sponsored by'),
						dataIndex: 'sponsor'
					}]
				}
			});
			return tabItems;
		},
		/*
		 * Format an array of information on each configured plugin
		 *
		 * @return	array		array of data objects
		 */
		getPluginsInfo: function () {
			var pluginsInfo = [];
			for (var pluginId in this.editor.plugins) {
				var plugin = this.editor.plugins[pluginId];
				pluginsInfo.push([
					plugin.name + ' ' + plugin.version,
					'<a href="' + plugin.developerUrl + '" target="_blank">' + plugin.developer + '</a>',
					'<a href="' + plugin.sponsorUrl + '" target="_blank">' + plugin.sponsor + '</a>'
				]);
			}
			return pluginsInfo;
		}
	});

	return AboutEditor;

});

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
 * Context Menu Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/ContextMenu',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (Plugin, UserAgent, Util, Dom, Event) {

	var ContextMenu = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(ContextMenu, Plugin);
	Util.apply(ContextMenu.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function(editor) {
			this.pageTSConfiguration = this.editorConfiguration.contextMenu;
			if (!this.pageTSConfiguration) {
				this.pageTSConfiguration = {};
			}
			if (this.pageTSConfiguration.showButtons) {
				this.showButtons = this.pageTSConfiguration.showButtons;
			}
			if (this.pageTSConfiguration.hideButtons) {
				this.hideButtons = this.pageTSConfiguration.hideButtons;
			}
			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '3.2',
				developer	: 'Mihai Bazon & Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'dynarch.com & Stanislas Rolland',
				sponsor		: 'American Bible Society & SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			return true;
		},

		/**
		 * This function gets called when the editor gets generated
		 */
		onGenerate: function() {
			var self = this;
			// Build the context menu
			this.menu = new Ext.menu.Menu(Util.applyIf({
				cls: 'htmlarea-context-menu',
				defaultType: 'menuitem',
				listeners: {
					itemClick: {
						fn: this.onItemClick,
						scope: this
					},
					show: {
						fn: this.onShow,
						scope: this
					},
					hide: {
						fn: this.onHide,
						scope: this
					}
				},
				items: this.buildItemsConfig()
			}, this.pageTSConfiguration));
			// Monitor contextmenu clicks on the iframe
			Event.on(this.editor.document.documentElement, 'contextmenu', function (event) { return self.show(event, event.target); });
			// Monitor editor being unloaded
			Event.one(this.editor.iframe.getIframeWindow(), 'unload', function (event) { self.onBeforeDestroy(event); return  true; });
		},

		/**
		 * Create the menu items config
		 */
		buildItemsConfig: function () {
			var itemsConfig = [];
			// Walk through the editor toolbar configuration nested arrays: [ toolbar [ row [ group ] ] ]
			var firstInGroup = true, convertedItemId;
			var i, j ,k, n, m, p, row, group, itemId;
			for (i = 0, n = this.editor.config.toolbar.length; i < n; i++) {
				row = this.editor.config.toolbar[i];
				// Add the groups
				firstInGroup = true;
				for (j = 0, m = row.length; j < m; j++) {
					group = row[j];
					if (!firstInGroup) {
						// If a visible item was added to the line
						itemsConfig.push({
								xtype: 'menuseparator',
								cls: 'separator'
						});
					}
					firstInGroup = true;
					// Add each item
					for (k = 0, p = group.length; k < p; k++) {
						itemId = group[k];
						convertedItemId = this.editorConfiguration.convertButtonId[itemId];
						if ((!this.showButtons || this.showButtons.indexOf(convertedItemId) !== -1)
							&& (!this.hideButtons || this.hideButtons.indexOf(convertedItemId) === -1)) {
							var button = this.getButton(itemId);
							// xtype is set through applied button configuration
							if (button && button.xtype === 'htmlareabutton' && !button.hideInContextMenu) {
								var itemId = button.getItemId();
								itemsConfig.push({
									itemId: itemId,
									cls: 'button',
									overCls: 'hover',
									text: (button.contextMenuTitle ? button.contextMenuTitle : button.tooltip),
									iconCls: button.iconCls,
									helpText: (button.helpText ? button.helpText : this.localize(itemId + '-tooltip')),
									hidden: true
								});
								firstInGroup = false;
							}
						}
					}
				}
			}
			// If a visible item was added
			if (!firstInGroup) {
				itemsConfig.push({
						xtype: 'menuseparator',
						cls: 'separator'
				});
			}
			 // Add special target delete item
			itemId = 'DeleteTarget';
			itemsConfig.push({
				itemId: itemId,
				cls: 'button',
				overCls: 'hover',
				iconCls: 'htmlarea-action-delete-item',
				helpText: this.localize('Remove this node from the document')
			});
			return itemsConfig;
		},

		/**
		 * Handler when the menu gets shown
		 */
		onShow: function () {
			var self = this;
			Event.one(this.editor.document.documentElement, 'mousedown.contextmeu', function (event) { Event.stopEvent(event); self.menu.hide(); return false; });
		},

		/**
		 * Handler when the menu gets hidden
		 */
		onHide: function () {
			var self = this;
			Event.off(this.editor.document.documentElement, 'mousedown.contextmeu');
		},

		/**
		 * Handler to show the context menu
		 */
		show: function (event, target) {
			Event.stopEvent(event);
			// Need to wait a while for the toolbar state to be updated
			var self = this;
			window.setTimeout(function () {
				self.showMenu(target);
			}, 150);
			return false;
		},

		/**
		 * Show the context menu
		 */
		showMenu: function (target) {
			this.showContextItems(target);
			this.ranges = this.editor.getSelection().getRanges();
			// Show the context menu
			var targetPosition = Dom.getPosition(target);
			var iframePosition = Dom.getPosition(this.editor.iframe.getEl());
			this.menu.showAt([targetPosition.x + iframePosition.x, targetPosition.y + iframePosition.y]);
		},

		/**
		 * Show items depending on context
		 */
		showContextItems: function (target) {
			var lastIsSeparator = false, lastIsButton = false, xtype, lastVisible;
			this.menu.cascade(function (menuItem) {
				xtype = menuItem.getXType();
				if (xtype === 'menuseparator') {
					menuItem.setVisible(lastIsButton);
					lastIsButton = false;
				} else if (xtype === 'menuitem') {
					var button = this.getButton(menuItem.getItemId());
					if (button) {
						var text = button.contextMenuTitle ? button.contextMenuTitle : button.tooltip;
						if (menuItem.text != text) {
							menuItem.setText(text);
						}
						menuItem.helpText = button.helpText ? button.helpText : menuItem.helpText;
						menuItem.setVisible(!button.disabled);
						lastIsButton = lastIsButton || !button.disabled;
					} else {
						// Special target delete item
						this.deleteTarget = target;
						if (/^(html|body)$/i.test(target.nodeName)) {
							this.deleteTarget = null;
						} else if (/^(table|thead|tbody|tr|td|th|tfoot)$/i.test(target.nodeName)) {
							this.deleteTarget = Dom.getFirstAncestorOfType(target, 'table');
						} else if (/^(ul|ol|dl|li|dd|dt)$/i.test(target.nodeName)) {
							this.deleteTarget = Dom.getFirstAncestorOfType(target, ['ul', 'ol', 'dl']);
						}
						if (this.deleteTarget) {
							menuItem.setVisible(true);
							menuItem.setText(this.localize('Remove the') + ' &lt;' + this.deleteTarget.nodeName.toLowerCase() + '&gt; ');
							lastIsButton = true;
						} else {
							menuItem.setVisible(false);
						}
					}
				}
				if (!menuItem.hidden) {
					lastVisible = menuItem;
				}
			}, this);
				// Hide the last item if it is a separator
			if (!lastIsButton) {
				lastVisible.setVisible(false);
			}
		},

		/**
		 * Handler invoked when a menu item is clicked on
		 */
		onItemClick: function (item, event) {
			this.editor.getSelection().setRanges(this.ranges);
			var button = this.getButton(item.getItemId());
			if (button) {
				/**
				 * @event HTMLAreaEventContextMenu
				 * Fires when the button is triggered from the context menu
				 */
				Event.trigger(button, 'HTMLAreaEventContextMenu', [button]);
			} else if (item.getItemId() === 'DeleteTarget') {
					// Do not leave a non-ie table cell empty
				var parent = this.deleteTarget.parentNode;
				parent.normalize();
				if (!UserAgent.isIE && /^(td|th)$/i.test(parent.nodeName) && parent.childNodes.length == 1) {
						// Do not leave a non-ie table cell empty
					parent.appendChild(this.editor.document.createElement('br'));
				}
					// Try to find a reasonable replacement selection
				var nextSibling = this.deleteTarget.nextSibling;
				var previousSibling = this.deleteTarget.previousSibling;
				if (nextSibling) {
					this.editor.getSelection().selectNode(nextSibling, true);
				} else if (previousSibling) {
					this.editor.getSelection().selectNode(previousSibling, false);
				}
				Dom.removeFromParent(this.deleteTarget);
				this.editor.updateToolbar();
			}
		},

		/**
		 * Handler invoked when the editor is about to be destroyed
		 */
		onBeforeDestroy: function (event) {
			this.menu.items.each(function (menuItem) {
				Ext.QuickTips.unregister(menuItem);
			});
			this.menu.removeAll(true);
			this.menu.destroy();
		}
	});

	return ContextMenu;

});

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
 * Undo Redo Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/UndoRedo',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Util) {

	var UndoRedo = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(UndoRedo, Plugin);
	Util.apply(UndoRedo.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {
			this.pageTSconfiguration = this.editorConfiguration.buttons.undo;
			this.customUndo = true;
			this.undoQueue = new Array();
			this.undoPosition = -1;
			// Maximum size of the undo queue
			this.undoSteps = 25;
			// The time interval at which undo samples are taken: 1/2 sec.
			this.undoTimeout = 500;

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.2',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			/**
			 * Registering the buttons
			 */
			var buttonList = this.buttonList, buttonId;
			for (var i = 0; i < buttonList.length; ++i) {
				var button = buttonList[i];
				buttonId = button[0];
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize(buttonId.toLowerCase()),
					iconCls		: 'htmlarea-action-' + button[3],
					action		: 'onButtonPress',
					hotKey		: ((this.editorConfiguration.buttons[buttonId.toLowerCase()] && this.editorConfiguration.buttons[buttonId.toLowerCase()].hotKey) ? this.editorConfiguration.buttons[buttonId.toLowerCase()].hotKey : button[2]),
					noAutoUpdate	: true
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		},

		/**
		 * The list of buttons added by this plugin
		 */
		buttonList: [
			['Undo', null, 'z', 'undo'],
			['Redo', null, 'y', 'redo']
		],

		/**
		 * This function gets called when the editor is generated
		 */
		onGenerate: function () {
			// Start undo snapshots
			this.start();
		},

		/**
		 * Start the undo/redo snapshot task
		 */
		start: function () {
			if (this.customUndo) {
				this.stop();
				var self = this;
				this.task = window.setInterval(function () {
					self.takeSnapshot();
				}, this.undoTimeout);
			}
		},

		/**
		 * Stop the undo/redo snapshot task
		 */
		stop: function () {
			if (this.customUndo && this.task) {
				window.clearInterval(this.task);
			}
		},

		/**
		 * Take a snapshot of the current contents for undo
		 */
		takeSnapshot: function () {
			var currentTime = (new Date()).getTime();
			var newSnapshot = false;
			if (this.undoPosition >= this.undoSteps) {
				// Remove the first element
				this.undoQueue.shift();
				--this.undoPosition;
			}
			// New undo slot should be used if this is first takeSnapshot call or if undoTimeout is elapsed
			if (this.undoPosition < 0 || this.undoQueue[this.undoPosition].time < currentTime - this.undoTimeout) {
				++this.undoPosition;
				newSnapshot = true;
			}
			// Get the html text
			var text = this.editor.getInnerHTML();

			if (newSnapshot) {
				// If previous slot contains the same text, a new one should not be used
				if (this.undoPosition == 0 || this.undoQueue[this.undoPosition - 1].text != text) {
					this.undoQueue[this.undoPosition] = this.buildSnapshot();
					this.undoQueue[this.undoPosition].time = currentTime;
					this.undoQueue.length = this.undoPosition + 1;
					this.updateButtonsState();
				} else {
					--this.undoPosition;
				}
			} else {
				if (this.undoQueue[this.undoPosition].text != text){
					var snapshot = this.buildSnapshot();
					this.undoQueue[this.undoPosition].text = snapshot.text;
					this.undoQueue[this.undoPosition].bookmark = snapshot.bookmark;
					this.undoQueue[this.undoPosition].bookmarkedText = snapshot.bookmarkedText;
					this.undoQueue.length = this.undoPosition + 1;
				}
			}
		},
		/*
		 * Build the snapshot entry
		 *
		 * @return	object	a snapshot entry with three components:
		 *				- text (the content of the RTE without any bookmark),
		 *				- bookmark (the bookmark),
		 *				- bookmarkedText (the content of the RTE including the bookmark)
		 */
		buildSnapshot: function () {
			var bookmark = null, bookmarkedText = null;
				// Insert a bookmark
			if (this.getEditorMode() === 'wysiwyg' && this.editor.isEditable()) {
				if (!(UserAgent.isOpera && navigator.userAgent.toLowerCase().indexOf('presto/2.1') !== -1)) {
						// Catch error in FF when the selection contains no usable range
					try {
						var range = this.editor.getSelection().createRange();
						bookmark = this.editor.getBookMark().get(range, true);
					} catch (e) {
						bookmark = null;
					}
				}
			}
			return {
				text: this.editor.getInnerHTML(),
				bookmark: bookmark,
				bookmarkedText: bookmarkedText
			};
		},
		/*
		 * Execute the undo request
		 */
		undo: function () {
			if (this.undoPosition > 0) {
					// Make sure we would not loose any changes
				this.takeSnapshot();
				this.setContent(--this.undoPosition);
				this.updateButtonsState();
			}
		},
		/*
		 * Execute the redo request
		 */
		redo: function () {
			if (this.undoPosition < this.undoQueue.length - 1) {
					// Make sure we would not loose any changes
				this.takeSnapshot();
					// Previous call could make undo queue shorter
				if (this.undoPosition < this.undoQueue.length - 1) {
					this.setContent(++this.undoPosition);
					this.updateButtonsState();
				}
			}
		},
		/*
		 * Set content using undo queue position
		 */
		setContent: function (undoPosition) {
			var bookmark = this.undoQueue[undoPosition].bookmark;
			if (bookmark) {
				this.editor.setHTML(this.undoQueue[undoPosition].text);
				this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
				this.editor.scrollToCaret();
			} else {
				this.editor.setHTML(this.undoQueue[undoPosition].text);
			}
		},
		/*
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			if (mode == 'wysiwyg' && this.editor.isEditable()) {
				if (this.customUndo) {
					switch (button.itemId) {
						case 'Undo':
							button.setDisabled(this.undoPosition == 0);
							break;
						case 'Redo':
							button.setDisabled(this.undoPosition >= this.undoQueue.length-1);
							break;
					}
				} else {
					try {
						button.setDisabled(!this.editor.document.queryCommandEnabled(button.itemId));
					} catch (e) {
						button.setDisabled(true);
					}
				}
			} else {
				button.setDisabled(!button.textMode);
			}
		},
		/*
		 * Update the state of the undo/redo buttons
		 */
		updateButtonsState: function () {
			var mode = this.getEditorMode(),
				selectionEmpty = true,
				ancestors = null;
			if (mode === 'wysiwyg') {
				selectionEmpty = this.editor.getSelection().isEmpty();
				ancestors = this.editor.getSelection().getAllAncestors();
			}
			var button = this.getButton('Undo');
			if (button) {
				this.onUpdateToolbar(button, mode, selectionEmpty, ancestors)
			}
			var button = this.getButton('Redo');
			if (button) {
				this.onUpdateToolbar(button, mode, selectionEmpty, ancestors)
			}
		},

		/**
		 * This function gets called when the button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id) {
			// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			if (this.getButton(buttonId) && !this.getButton(buttonId).disabled) {
				if (this.customUndo) {
					this[buttonId.toLowerCase()]();
				} else {
					this.editor.getSelection().execCommand(buttonId, false, null);
				}
			}
			return false;
		}
	});

	return UndoRedo;

});

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
 * Copy Paste for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/CopyPaste',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Dom, Event, Util) {

	var CopyPaste = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(CopyPaste, Plugin);
	Util.apply(CopyPaste.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {

			/**
			 * Setting up some properties from PageTSConfig
			 */
			this.buttonsConfiguration = this.editorConfiguration.buttons;

			/**
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '2.4',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: this.localize('Technische Universitat Ilmenau'),
				sponsorUrl	: 'http://www.tu-ilmenau.de/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);

			/**
			 * Registering the buttons
			 */
			for (var buttonId in this.buttonList) {
				var button = this.buttonList[buttonId];
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize(buttonId.toLowerCase()),
					iconCls		: 'htmlarea-action-' + button[2],
					action		: 'onButtonPress',
					context		: button[0],
					selection	: button[3],
					hotKey		: button[1]
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		},

		/**
		 * The list of buttons added by this plugin
		 */
		buttonList: {
			Copy	: [null, 'c', 'copy', true],
			Cut	: [null, 'x', 'cut', true],
			Paste	: [null, 'v', 'paste', false]
		},

		/**
		 * This function gets called when the editor is generated
		 */
		onGenerate: function () {
			var self = this;
			Event.on(UserAgent.isIE ? this.editor.document.body : this.editor.document.documentElement, 'cut', function (event) { return self.cutHandler(event); });
			for (var buttonId in this.buttonList) {
				var button = this.buttonList[buttonId];
				// Remove button from toolbar, if command is not supported
				// Starting with Safari 5 and Chrome 6, cut and copy commands are not supported anymore by WebKit
				// Starting with Firefox 29, cut, copy and paste commands are not supported anymore by Firefox
				if (UserAgent.isGecko || !this.editor.document.queryCommandSupported(buttonId)) {
					this.editor.toolbar.remove(buttonId);
				}
				// Add hot key handling if the button is not enabled in the toolbar
				if (!this.getButton(buttonId)) {
					var self = this;
					this.editor.iframe.hotKeyMap.addBinding({
						key: button[1],
						ctrl: true,
						shift: false,
						alt: false,
						handler: function (event) { return self.onHotKey(event); }
					});
					// Ensure the hot key can be translated
					this.editorConfiguration.hotKeyList[button[1]] = {
						id	: button[1],
						cmd	: buttonId
					};
				}
			}
		},

		/**
		 * This function gets called when a button or a hotkey was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			this.editor.focus();
			if (!this.applyToTable(buttonId)) {
					// If we are not handling table cells
				switch (buttonId) {
					case 'Copy':
						if (buttonId == id) {
								// If we are handling a button, not a hotkey
							this.applyBrowserCommand(buttonId);
						}
						break;
					case 'Cut' :
						if (buttonId == id) {
								// If we are handling a button, not a hotkey
							this.applyBrowserCommand(buttonId);
						}
							// Opera will not trigger the onCut event
						if (UserAgent.isOpera) {
							this.cutHandler();
						}
						break;
					case 'Paste':
						if (buttonId == id) {
							// If we are handling a button, not a hotkey
							this.applyBrowserCommand(buttonId);
						}
						// In FF3, the paste operation will indeed trigger the onPaste event not in FF2; nor in Opera
						if (UserAgent.isOpera || UserAgent.isGecko2) {
							var cleaner = this.getButton('CleanWord');
							if (cleaner) {
								window.setTimeout(function () {
									Event.trigger(cleaner.el, 'click');
								}, 250);
							}
						}
						break;
					default:
						break;
				}
					// Stop the event if a button was handled
				return (buttonId != id);
			} else {
					// The table case was handled, let the event be stopped.
					// No cleaning required as the pasted cells are copied from the editor.
					// However paste by Opera cannot be stopped.
					// Revert Opera's operation as it produces invalid html anyways
				if (UserAgent.isOpera) {
					this.editor.inhibitKeyboardInput = true;
					var bookmark = this.editor.getBookMark().get(this.editor.getSelection().createRange());
					var html = this.editor.getInnerHTML();
					var self = this;
					window.setTimeout(function () {
						self.revertPaste(html, bookmark);	
					}, 200);
				}
				return false;
			}
		},
		/*
		 * This funcion reverts the paste operation (performed by Opera)
		 */
		revertPaste: function (html, bookmark) {
			this.editor.setHTML(html);
			this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
			this.editor.inhibitKeyboardInput = false;
		},
		/*
		 * This function applies the browser command when a button is pressed
		 * In the case of hot key, the browser does it automatically
		 */
		applyBrowserCommand: function (buttonId) {
			this.editor.getSelection().execCommand(buttonId, false, null);
		},

		/**
		 * Handler for hotkeys configured through the hotKeyMap while button not enabled in toolbar (see onGenerate above)
		 */
		onHotKey: function (event) {
			var key = Event.getKey(event);
			var hotKey = String.fromCharCode(key).toLowerCase();
			// Stop the event if it was handled here
			if (!this.onButtonPress(this, hotKey)) {
				Event.stopEvent(event);
				return false;
			}
			return true;
		},

		/**
		 * This function removes any link left over by the cut operation
		 */
		cutHandler: function (event) {
			var self = this;
			window.setTimeout(function () {
				self.removeEmptyLink();	
			}, 50);
			return true;
		},

		/**
		 * This function unlinks any empty link left over by the cut operation
		 */
		removeEmptyLink: function() {
			var range = this.editor.getSelection().createRange();
			var parent = this.editor.getSelection().getParentElement();
			if (parent.firstChild && /^(a)$/i.test(parent.firstChild.nodeName)) {
				parent = parent.firstChild;
			}
			if (/^(a)$/i.test(parent.nodeName)) {
				parent.normalize();
				if (!parent.innerHTML || (parent.childNodes.length == 1 && /^(br)$/i.test(parent.firstChild.nodeName))) {
					var container = parent.parentNode;
					this.editor.getDomNode().removeMarkup(parent);
						// Opera does not render empty list items
					if (UserAgent.isOpera && /^(li)$/i.test(container.nodeName) && !container.firstChild) {
						container.innerHTML = '<br />';
						this.editor.getSelection().selectNodeContents(container, true);
					}
				}
			}
			if (UserAgent.isWebKit || UserAgent.isOpera) {
				// Remove Apple's span and font tags
				this.editor.getDomNode().cleanAppleStyleSpans(this.editor.document.body);
			}
			if (UserAgent.isWebKit) {
				// Reset Safari selection in order to prevent insertion of span and/or font tags on next text input
				var bookmark = this.editor.getBookMark().get(this.editor.getSelection().createRange());
				this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(bookmark));
			}
			this.editor.updateToolbar();
		},
		/*
		 * This function gets called when a copy/cut/paste operation is to be performed
		 * This feature allows to paste a region of table cells
		 */
		applyToTable: function (buttonId) {
			var range = this.editor.getSelection().createRange();
			var parent = this.editor.getSelection().getParentElement();
			var endBlocks = this.editor.getSelection().getEndBlocks();
			switch (buttonId) {
				case 'Copy':
				case 'Cut' :
					HTMLArea.copiedCells = null;
					if ((/^(tr)$/i.test(parent.nodeName) && !UserAgent.isIE) || (/^(td|th)$/i.test(endBlocks.start.nodeName) && /^(td|th)$/i.test(endBlocks.end.nodeName) && !UserAgent.isGecko && endBlocks.start != endBlocks.end)) {
						HTMLArea.copiedCells = this.collectCells(buttonId, endBlocks);
					}
					break;
				case 'Paste':
					if (/^(tr|td|th)$/i.test(parent.nodeName) && HTMLArea.copiedCells) {
						return this.pasteCells(endBlocks);
					}
					break;
				default:
					break;
			}
			return false;
		},
		/*
		 * This function handles pasting of a collection of table cells
		 */
		pasteCells: function (endBlocks) {
			var cell = null;
			if (UserAgent.isGecko) {
				var range = this.editor.getSelection().createRange();
				cell = range.startContainer.childNodes[range.startOffset];
				while (cell && !Dom.isBlockElement(cell)) {
					cell = cell.parentNode;
				}
			}
			if (!cell && /^(td|th)$/i.test(endBlocks.start.nodeName)) {
				cell = endBlocks.start;
			}
			if (!cell) {
					// Let the browser do it
				return false;
			}
			var tableParts = ['thead', 'tbody', 'tfoot'];
			var tablePartsIndex = { thead : 0, tbody : 1, tfoot : 2 };
			var tablePart = cell.parentNode.parentNode;
			var tablePartIndex = tablePartsIndex[tablePart.nodeName.toLowerCase()]
			var rows = HTMLArea.copiedCells[tablePartIndex];
			if (rows && rows[0]) {
				for (var i = 0, rowIndex = cell.parentNode.sectionRowIndex-1; i < rows.length && ++rowIndex < tablePart.rows.length; ++i) {
					var cells = rows[i];
					if (!cells) break;
					var row = tablePart.rows[rowIndex];
					for (var j = 0, cellIndex = cell.cellIndex-1; j < cells.length && ++cellIndex < row.cells.length; ++j) {
						row.cells[cellIndex].innerHTML = cells[j];
					}
				}
			}
			var table = tablePart.parentNode;
			for (var k = tablePartIndex +1; k < 3; ++k) {
				tablePart = table.getElementsByTagName(tableParts[k])[0];
				if (tablePart) {
					var rows = HTMLArea.copiedCells[k];
					for (var i = 0; i < rows.length && i < tablePart.rows.length; ++i) {
						var cells = rows[i];
						if (!cells) break;
						var row = tablePart.rows[i];
						for (var j = 0, cellIndex = cell.cellIndex-1; j < cells.length && ++cellIndex < row.cells.length; ++j) {
							row.cells[cellIndex].innerHTML = cells[j];
						}
					}
				}
			}
			return true;
		},
		/*
		 * This function collects the selected table cells for copy/cut operations
		 */
		collectCells: function (operation, endBlocks) {
			var tableParts = ['thead', 'tbody', 'tfoot'];
			var tablePartsIndex = { thead : 0, tbody : 1, tfoot : 2 };
			var selection = this.editor.getSelection().get().selection;
			var range, i = 0, cell, cells = null;
			var rows = new Array();
			for (var k = tableParts.length; --k >= 0;) {
				rows[k] = [];
			}
			var row = null;
			var cutRows = [];
			if (UserAgent.isGecko) {
				if (selection.rangeCount == 1) { // Collect the cells in the selected row
					cells = [];
					for (var i = 0, n = endBlocks.start.cells.length; i < n; ++i) {
						cell = endBlocks.start.cells[i];
						cells.push(cell.innerHTML);
						if (operation === 'Cut') {
							cell.innerHTML = '<br />';
						}
						if (operation === 'Cut') {
							cutRows.push(endBlocks.start);
						}
					}
					rows[tablePartsIndex[endBlocks.start.parentNode.nodeName.toLowerCase()]].push(cells);
				} else {
					try { // Collect the cells in some region of the table
						var firstCellOfRow = false;
						var lastCellOfRow = false;
						while (range = selection.getRangeAt(i++)) {
							cell = range.startContainer.childNodes[range.startOffset];
							if (cell.parentNode != row) {
								(cells) && rows[tablePartsIndex[row.parentNode.nodeName.toLowerCase()]].push(cells);
								if (operation === 'Cut' && firstCellOfRow && lastCellOfRow) cutRows.push(row);
								row = cell.parentNode;
								cells = [];
								firstCellOfRow = false;
								lastCellOfRow = false;
							}
							cells.push(cell.innerHTML);
							if (operation === 'Cut') {
								cell.innerHTML = '<br />';
							}
							if (!cell.previousSibling) firstCellOfRow = true;
							if (!cell.nextSibling) lastCellOfRow = true;
						}
					} catch(e) {
						/* finished walking through selection */
					}
					try { rows[tablePartsIndex[row.parentNode.nodeName.toLowerCase()]].push(cells); } catch(e) { }
					if (row && operation === 'Cut' && firstCellOfRow && lastCellOfRow) {
						cutRows.push(row);
					}
				}
			} else { // Internet Explorer, Safari and Opera
				var firstRow = endBlocks.start.parentNode;
				var lastRow = endBlocks.end.parentNode;
				cells = [];
				var firstCellOfRow = false;
				var lastCellOfRow = false;
				if (firstRow == lastRow) { // Collect the selected cells on the row
					cell = endBlocks.start;
					while (cell) {
						cells.push(cell.innerHTML);
						if (operation === 'Cut') {
							cell.innerHTML = '';
						}
						if (!cell.previousSibling) firstCellOfRow = true;
						if (!cell.nextSibling) lastCellOfRow = true;
						if (cell == endBlocks.end) break;
						cell = cell.nextSibling;
					}
					rows[tablePartsIndex[firstRow.parentNode.nodeName.toLowerCase()]].push(cells);
					if (operation === 'Cut' && firstCellOfRow && lastCellOfRow) cutRows.push(firstRow);
				} else { // Collect all cells on selected rows
					row = firstRow;
					while (row) {
						cells = [];
						for (var i = 0, n = row.cells.length; i < n; ++i) {
							cells.push(row.cells[i].innerHTML);
							if (operation === 'Cut') {
								row.cells[i].innerHTML = '';
							}
						}
						rows[tablePartsIndex[row.parentNode.nodeName.toLowerCase()]].push(cells);
						if (operation === 'Cut') cutRows.push(row);
						if (row == lastRow) break;
						row = row.nextSibling;
					}
				}
			}
			for (var i = 0, n = cutRows.length; i < n; ++i) {
				if (i == n-1) {
					var tablePart = cutRows[i].parentNode;
					var next = cutRows[i].nextSibling;
					cutRows[i].parentNode.removeChild(cutRows[i]);
					if (next) {
						this.editor.getSelection().selectNodeContents(next.cells[0], true);
					} else if (tablePart.parentNode.rows.length) {
						this.editor.getSelection().selectNodeContents(tablePart.parentNode.rows[0].cells[0], true);
					}
				} else {
					cutRows[i].parentNode.removeChild(cutRows[i]);
				}
			}
			return rows;
		},
		/*
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
			if (mode === 'wysiwyg' && this.editor.isEditable() && button.itemId === 'Paste') {
				try {
					button.setDisabled(!this.editor.document.queryCommandEnabled(button.itemId));
				} catch(e) {
					button.setDisabled(true);
				}
			}
		}
	});

	return CopyPaste;

});

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
 * TYPO3 Color Plugin for TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/Plugins/TYPO3Color',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Plugin/Plugin',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Color',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Extjs/ColorPalette',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util'],
	function (Plugin, UserAgent, Dom, Color, ColorPalette, Util) {

	var TYPO3Color = function (editor, pluginName) {
		this.constructor.super.call(this, editor, pluginName);
	};
	Util.inherit(TYPO3Color, Plugin);
	Util.apply(TYPO3Color.prototype, {

		/**
		 * This function gets called by the class constructor
		 */
		configurePlugin: function (editor) {
			this.buttonsConfiguration = this.editorConfiguration.buttons;
			this.colorsConfiguration = this.editorConfiguration.colors;
			this.disableColorPicker = this.editorConfiguration.disableColorPicker;
				// Coloring will use the style attribute
			if (this.getPluginInstance('TextStyle')) {
				this.getPluginInstance('TextStyle').addAllowedAttribute('style');
				this.allowedAttributes = this.getPluginInstance('TextStyle').allowedAttributes;
			}
			if (this.getPluginInstance('InlineElements')) {
				this.getPluginInstance('InlineElements').addAllowedAttribute('style');
				if (!this.allowedAllowedAttributes) {
					this.allowedAttributes = this.getPluginInstance('InlineElements').allowedAttributes;
				}
			}
			if (this.getPluginInstance('BlockElements')) {
				this.getPluginInstance('BlockElements').addAllowedAttribute('style');
			}
			if (!this.allowedAttributes) {
				this.allowedAttributes = new Array('id', 'title', 'lang', 'xml:lang', 'dir', 'class', 'style');
			}
			/*
			 * Registering plugin "About" information
			 */
			var pluginInformation = {
				version		: '4.3',
				developer	: 'Stanislas Rolland',
				developerUrl	: 'http://www.sjbr.ca/',
				copyrightOwner	: 'Stanislas Rolland',
				sponsor		: 'SJBR',
				sponsorUrl	: 'http://www.sjbr.ca/',
				license		: 'GPL'
			};
			this.registerPluginInformation(pluginInformation);
			/*
			 * Registering the buttons
			 */
			var buttonList = this.buttonList, buttonId;
			for (var i = 0; i < buttonList.length; ++i) {
				var button = buttonList[i];
				buttonId = button[0];
				var buttonConfiguration = {
					id		: buttonId,
					tooltip		: this.localize(buttonId),
					iconCls		: 'htmlarea-action-' + button[2],
					action		: 'onButtonPress',
					hotKey		: (this.buttonsConfiguration[button[1]] ? this.buttonsConfiguration[button[1]].hotKey : null),
					dialog		: true
				};
				this.registerButton(buttonConfiguration);
			}
			return true;
		 },
		/*
		 * The list of buttons added by this plugin
		 */
		buttonList: [
			['ForeColor', 'textcolor', 'color-foreground'],
			['HiliteColor', 'bgcolor', 'color-background']
		],
		/*
		 * Conversion object: button name to corresponding style property name
		 */
		styleProperty: {
			ForeColor	: 'color',
			HiliteColor	: 'backgroundColor'
		},
		colors: [
			'000000', '222222', '444444', '666666', '999999', 'BBBBBB', 'DDDDDD', 'FFFFFF',
			'660000', '663300', '996633', '003300', '003399', '000066', '330066', '660066',
			'990000', '993300', 'CC9900', '006600', '0033FF', '000099', '660099', '990066',
			'CC0000', 'CC3300', 'FFCC00', '009900', '0066FF', '0000CC', '663399', 'CC0099',
			'FF0000', 'FF3300', 'FFFF00', '00CC00', '0099FF', '0000FF', '9900CC', 'FF0099',
			'CC3333', 'FF6600', 'FFFF33', '00FF00', '00CCFF', '3366FF', '9933FF', 'FF00FF',
			'FF6666', 'FF6633', 'FFFF66', '66FF66', '00FFFF', '3399FF', '9966FF', 'FF66FF',
			'FF9999', 'FF9966', 'FFFF99', '99FF99', '99FFFF', '66CCFF', '9999FF', 'FF99FF',
			'FFCCCC', 'FFCC99', 'FFFFCC', 'CCFFCC', 'CCFFFF', '99CCFF', 'CCCCFF', 'FFCCFF'
		],
		/*
		 * This function gets called when the button was pressed.
		 *
		 * @param	object		editor: the editor instance
		 * @param	string		id: the button id or the key
		 * @param	object		target: the target element of the contextmenu event, when invoked from the context menu
		 *
		 * @return	boolean		false if action is completed
		 */
		onButtonPress: function (editor, id, target) {
				// Could be a button or its hotkey
			var buttonId = this.translateHotKey(id);
			buttonId = buttonId ? buttonId : id;
			var element = this.editor.getSelection().getParentElement();
			this.openDialogue(
				buttonId + '_title',
				{
					element: element,
					buttonId: buttonId
				},
				this.getWindowDimensions(
					{
						width: 350,
						height: 350
					},
					buttonId
				),
				this.buildItemsConfig(element, buttonId),
				this.setColor
			);
		},
		/*
		 * Build the window items config
		 */
		buildItemsConfig: function (element, buttonId) {
			var itemsConfig = [];
			var paletteItems = [];
				// Standard colors palette (boxed)
			if (!this.disableColorPicker) {
				paletteItems.push({
					xtype: 'container',
					items: {
						xtype: 'colorpalette',
						itemId: 'color-palette',
						colors: this.colors,
						cls: 'color-palette',
						value: (element && element.style[this.styleProperty[buttonId]]) ? Color.colorToHex(element.style[this.styleProperty[buttonId]]).substr(1, 6) : '',
						allowReselect: true,
						listeners: {
							select: {
								fn: this.onSelect,
								scope: this
							}
						}
					}
				});
			}
				// Custom colors palette (boxed)
			if (this.colorsConfiguration) {
				paletteItems.push({
					xtype: 'container',
					items: {
						xtype: 'colorpalette',
						itemId: 'custom-colors',
						cls: 'htmlarea-custom-colors',
						colors: this.colorsConfiguration,
						value: (element && element.style[this.styleProperty[buttonId]]) ? Color.colorToHex(element.style[this.styleProperty[buttonId]]).substr(1, 6) : '',
						tpl: new Ext.XTemplate(
							'<tpl for="."><a href="#" class="color-{1}" hidefocus="on"><em><span style="background:#{1}" unselectable="on">&#160;</span></em><span unselectable="on">{0}<span></a></tpl>'
						),
						allowReselect: true,
						listeners: {
							select: {
								fn: this.onSelect,
								scope: this
							}
						}
					}
				});
			}
			itemsConfig.push({
				xtype: 'container',
				layout: 'hbox',
				items: paletteItems
			});
			itemsConfig.push({
				xtype: 'displayfield',
				itemId: 'show-color',
				cls: 'show-color',
				width: 60,
				height: 22,
				helpTitle: this.localize(buttonId)
			});
			itemsConfig.push({
				itemId: 'color',
				cls: 'color',
				width: 60,
				minValue: 0,
				value: (element && element.style[this.styleProperty[buttonId]]) ? Color.colorToHex(element.style[this.styleProperty[buttonId]]).substr(1, 6) : '',
				enableKeyEvents: true,
				fieldLabel: this.localize(buttonId),
				helpTitle: this.localize(buttonId),
				listeners: {
					change: {
						fn: this.onChange,
						scope: this
					},
					afterrender: {
						fn: this.onAfterRender,
						scope: this
					}
				}
			});
			return {
				xtype: 'fieldset',
				title: this.localize('color_title'),
				defaultType: 'textfield',
				labelWidth: 175,
				defaults: {
					helpIcon: false
				},
				items: itemsConfig
			};
		},
		/*
		 * On select handler: set the value of the color field, display the new color and update the other palette
		 */
		onSelect: function (palette, color) {
			this.dialog.find('itemId', 'color')[0].setValue(color);
			this.showColor(color);
			if (palette.getItemId() == 'color-palette') {
				var customPalette = this.dialog.find('itemId', 'custom-colors')[0];
				if (customPalette) {
					customPalette.deSelect();
				}
			} else {
				var standardPalette = this.dialog.find('itemId', 'color-palette')[0];
				if (standardPalette) {
					standardPalette.deSelect();
				}
			}
		},
		/*
		 * Display the selected color
		 */
		showColor: function (color) {
			if (color) {
				var newColor = color;
				if (newColor.indexOf('#') == 0) {
					newColor = newColor.substr(1);
				}
				this.dialog.find('itemId', 'show-color')[0].el.setStyle('backgroundColor', Color.colorToHex(parseInt(newColor, 16)));
			}
		},
		/*
		 * On change handler: display the new color and select it in the palettes, if it exists
		 */
		onChange: function (field, value) {
			if (value) {
				var color = value.toUpperCase();
				this.showColor(color);
				var standardPalette = this.dialog.find('itemId', 'color-palette')[0];
				if (standardPalette) {
					standardPalette.select(color);
				}
				var customPalette = this.dialog.find('itemId', 'custom-colors')[0];
				if (customPalette) {
					customPalette.select(color);
				}
			}
		},
		/*
		 * On after render handler: display the color
		 */
		onAfterRender: function (field) {
			var value = field.getValue();
			if (typeof value === 'string' && value.length > 0) {
				this.showColor(value);
			}
		},
		/*
		 * Open the dialogue window
		 *
		 * @param	string		title: the window title
		 * @param	object		arguments: some arguments for the handler
		 * @param	integer		dimensions: the opening width of the window
		 * @param	object		tabItems: the configuration of the tabbed panel
		 * @param	function	handler: handler when the OK button if clicked
		 *
		 * @return	void
		 */
		openDialogue: function (title, arguments, dimensions, items, handler) {
			if (this.dialog) {
				this.dialog.close();
			}
			this.dialog = new Ext.Window({
				title: this.localize(title),
				arguments: arguments,
				cls: 'htmlarea-window',
				border: false,
				width: dimensions.width,
				height: dimensions.height,
				autoScroll: true,
				iconCls: this.getButton(arguments.buttonId).iconCls,
				listeners: {
					close: {
						fn: this.onClose,
						scope: this
					}
				},
				items: {
					xtype: 'container',
					layout: 'form',
					style: {
						width: '95%'
					},
					defaults: {
						labelWidth: 150
					},
					items: items
				},
				buttons: [
					this.buildButtonConfig('OK', handler),
					this.buildButtonConfig('Cancel', this.onCancel)
				]
			});
			this.show();
		},
		/*
		 * Set the color and close the dialogue
		 */
		setColor: function(button, event) {
			this.restoreSelection();
			var buttonId = this.dialog.arguments.buttonId;
			var color = this.dialog.find('itemId', 'color')[0].getValue();
			if (color) {
				if (color.indexOf('#') == 0) {
					color = color.substr(1);
				}
				color = Color.colorToHex(parseInt(color, 16));
			}
			var 	element,
				fullNodeSelected = false;
			var range = this.editor.getSelection().createRange();
			var parent = this.editor.getSelection().getParentElement();
			var selectionEmpty = this.editor.getSelection().isEmpty();
			var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null;
			if (!selectionEmpty) {
				var fullySelectedNode = this.editor.getSelection().getFullySelectedNode();
				if (fullySelectedNode) {
					fullNodeSelected = true;
					parent = fullySelectedNode;
				}
			}
			if (selectionEmpty || fullNodeSelected) {
				element = parent;
					// Set the color in the style attribute
				element.style[this.styleProperty[buttonId]] = color;
					// Remove the span tag if it has no more attribute
				if (/^span$/i.test(element.nodeName) && !Dom.hasAllowedAttributes(element, this.allowedAttributes)) {
					this.editor.getDomNode().removeMarkup(element);
				}
			} else if (statusBarSelection) {
				var element = statusBarSelection;
					// Set the color in the style attribute
				element.style[this.styleProperty[buttonId]] = color;
					// Remove the span tag if it has no more attribute
				if (/^span$/i.test(element.nodeName) && !Dom.hasAllowedAttributes(element, this.allowedAttributes)) {
					this.editor.getDomNode().removeMarkup(element);
				}
			} else if (color && this.editor.getSelection().endPointsInSameBlock()) {
				var element = this.editor.document.createElement('span');
					// Set the color in the style attribute
				element.style[this.styleProperty[buttonId]] = color;
				this.editor.getDomNode().wrapWithInlineElement(element, range);
			}
			this.close();
			event.stopEvent();
		},

		/**
		 * This function gets called when the toolbar is updated
		 */
		onUpdateToolbar: function (button, mode, selectionEmpty, ancestors, endPointsInSameBlock) {
			if (mode === 'wysiwyg' && this.editor.isEditable()) {
				var statusBarSelection = this.editor.statusBar ? this.editor.statusBar.getSelection() : null,
					parentElement = statusBarSelection ? statusBarSelection : this.editor.getSelection().getParentElement(),
					disabled = !endPointsInSameBlock || (selectionEmpty && /^body$/i.test(parentElement.nodeName));
				button.setInactive(!parentElement.style[this.styleProperty[button.itemId]]);
				button.setDisabled(disabled);
			}
		}
	});

	return TYPO3Color;

});

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
 * The editor toolbar
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Toolbar',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Toolbar/Button',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Toolbar/ToolbarText',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Toolbar/Select'],
	function (Util, Dom, Event, Button, ToolbarText, Select) {

	/**
	 * Editor toolbar constructor
	 */
	var Toolbar = function (config) {
		Util.apply(this, config);
	};

	Toolbar.prototype = {

		/**
		 * Render the toolbar (called by framework rendering)
		 *
		 * @param object container: the container into which to insert the toolbar (that is the framework)
		 * @return void
		 */
		render: function (container) {
			this.el = document.createElement('div');
			Dom.addClass(this.el, 'btn-toolbar');
			this.el.setAttribute('role', 'toolbar');
			if (this.id) {
				this.el.setAttribute('id', this.id);
			}
			if (this.cls) {
				Dom.addClass(this.el, this.cls);
			}
			this.el = container.appendChild(this.el);
			this.addItems();
			this.rendered = true;
		},

		/**
		 * Get the element to which the toolbar is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * editorId should be set in config
		 */
		editorId: null,

		/**
		 * Get a reference to the editor
		 */
		getEditor: function() {
			return RTEarea[this.editorId].editor;
		},

		/**
		 * The toolbar items
		 */
		items: {},

		/**
		 * Create the toolbar items based on editor toolbar configuration
		 */
		addItems: function () {
			var editor = this.getEditor();
			// Walk through the editor toolbar configuration nested arrays: [ toolbar [ row [ group ] ] ]
			var firstOnRow = true;
			var firstInGroup = true;
			var i, j, k, n, m, p, row, group, item;
			for (i = 0, n = editor.config.toolbar.length; i < n; i++) {
				row = editor.config.toolbar[i];
				if (!firstOnRow) {
					// If a visible item was added to the previous line
					this.addSpacer(this.el, 'space-clear-left');
				}
				firstOnRow = true;
				// Add the groups
				for (j = 0, m = row.length; j < m; j++) {
					group = row[j];
					var groupContainer = this.addGroup();
					firstInGroup = true;
					// Add each item
					for (k = 0, p = group.length; k < p; k++) {
						item = group[k];
						if (item == 'space') {
							this.addSpacer(groupContainer);
						} else {
							// Get the item's config as registered by some plugin
							var itemConfig = editor.config.buttonsConfig[item];
							if (typeof itemConfig === 'object' && itemConfig !== null) {
								itemConfig.id = this.editorId + '-' + itemConfig.id;
								itemConfig.toolbar = this;
								switch (itemConfig.xtype) {
									case 'htmlareabutton':
										this.add(new Button(itemConfig), groupContainer);
										break;
									case 'htmlareaselect':
										this.add(new Select(itemConfig), groupContainer);
										break;
									case 'htmlareatoolbartext':
										this.add(new ToolbarText(itemConfig), groupContainer);
										break;
									default:
										this.add(itemConfig, groupContainer);
								}
								firstInGroup = firstInGroup && itemConfig.hidden;
								firstOnRow = firstOnRow && firstInGroup;
							}
						}
					}
				}
			}
		},

		/**
		 * Add an item to the toolbar
		 *
		 * @param object item: the item to be added (not yet rendered)
		 * @param object container: the element into which to insert the item
		 * @return void
		 */
		add: function (item, container) {
			if (item.itemId) {
				this.items[item.itemId] = item;
			}
			item.render(container);
		},

		/**
		 * Add a group to the toolbar
		 *
		 * @param string cls: a class to be added on the group other than 'btn-group' (default)
		 * @return void
		 */
		addGroup: function (cls) {
			var group = document.createElement('div');
			if (typeof cls === 'string') {
				Dom.addClass(group, cls);
			} else {
				Dom.addClass(group, 'btn-group');
			}
			group.setAttribute('role', 'group');
			group = this.el.appendChild(group);
			return group;
		},

		/**
		 * Add a spacer to the toolbar
		 *
		 * @param object container: the element into which to insert the item
		 * @param string cls: a class to be added on the spacer rather than 'space' (default)
		 * @return void
		 */
		addSpacer: function (container, cls) {
			var spacer = document.createElement('div');
			if (typeof cls === 'string') {
				Dom.addClass(spacer, cls);
			} else {
				Dom.addClass(spacer, 'space');
			}
			container.appendChild(spacer);
		},

		/**
		 * Remove a button from the toolbar
		 *
		 * @param string buttonId: the itemId of the item to remove
		 * @return void
		 */
		remove: function (buttonId) {
			var item = this.items[buttonId];
			if (item) {
				if (item.getEl()) {
					Dom.removeFromParent(item.getEl().dom);
				}
				this.items[item.itemId] = null;
			}
		},

		/**
		 * Retrieve a toolbar item by itemId
		 */
		getButton: function (buttonId) {
			return this.items[buttonId];
		},

		/**
		 * Get the current height of the toolbar
		 */
		getHeight: function () {
			return Dom.getSize(this.el).height;
		},

		/**
		 * Update the toolbar after some delay
		 */
		updateLater: function (delay) {
			if (this.updateToolbarLater) {
				window.clearTimeout(this.updateToolbarLater);
			}
			if (delay) {
				var self = this;
				this.updateToolbarLater = window.setTimeout(function () {
					self.update();
				}, delay);
			} else {
				this.update();
			}
		},

		/**
		 * Update the state of the toolbar
		 */
		update: function() {
			var editor = this.getEditor(),
				mode = editor.getMode(),
				selection = editor.getSelection(),
				selectionEmpty = true,
				ancestors = null,
				endPointsInSameBlock = true;
			if (editor.getMode() === 'wysiwyg') {
				selectionEmpty = selection.isEmpty();
				ancestors = selection.getAllAncestors();
				endPointsInSameBlock = selection.endPointsInSameBlock();
			}
			this.framework.getStatusBar().onUpdateToolbar(mode, selectionEmpty, ancestors, endPointsInSameBlock);
			/**
			 * @event HTMLAreaEventToolbarUpdate
			 * Fires when the toolbar is updated
			 */
			Event.trigger(this, 'HTMLAreaEventToolbarUpdate', [mode, selectionEmpty, ancestors, endPointsInSameBlock]);
		},

		/**
		 * Cleanup (called by framework onBeforeDestroy)
		 */
		onBeforeDestroy: function () {
			Event.off(this);
			for (var itemId in this.items) {
				if (typeof this.items[itemId].destroy === 'function') {
					try {
						this.items[itemId].destroy();
					} catch (e) {}
				}
				if (typeof this.items[itemId].onBeforeDestroy === 'function' && this.items[itemId].xtype !== 'htmlareacombo') {
					this.items[itemId].onBeforeDestroy();
				}
			}
			var node;
			while (node = this.el.firstChild) {
				this.el.removeChild(node);
			}
			this.el = null;
		}
	};

	return Toolbar;

});

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
 * The editor iframe
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Iframe',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/Walker',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/TYPO3',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/KeyMap'],
	function (UserAgent, Walker, Typo3, Util, Dom, Event, KeyMap) {

	/**
	 * Editor iframe constructor
	 */
	var Iframe = function (config) {
		Util.apply(this, config);
	};

	Iframe.prototype = {

		/**
		 * Render the iframe (called by framework rendering)
		 *
		 * @param object container: the container into which to insert the iframe (that is the framework)
		 * @return void
		 */
		render: function (container) {
			this.config = this.getEditor().config;
			this.createIframe(container);
			if (!this.config.showStatusBar) {
				Dom.addClass(this.getEl(), 'noStatusBar');
			}
			this.initStyleChangeEventListener();
			if (UserAgent.isOpera) {
				var self = this;
				Event.one(this.getEl(), 'load', function (event) { self.initializeIframe(); return true; })
			} else {
				this.initializeIframe();
			}
		},

		/**
		 * Get the element to which the iframe is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * The editor iframe may become hidden with style.display = "none" on some parent div
		 * This breaks the editor in Firefox: the designMode attribute needs to be reset after the style.display of the container div is reset to "block"
		 * In all browsers, it breaks the evaluation of the framework dimensions
		 */
		initStyleChangeEventListener: function () {
			if (this.isNested) {
				if (typeof MutationObserver === 'function') {
					var self = this;
					this.mutationObserver = new MutationObserver( function (mutations) { self.onNestedShowMutation(mutations); });
					var options = {
						attributes: true,
						attributeFilter: ['class', 'style']
					};
					for (var i = this.nestedParentElements.sorted.length; --i >= 0;) {
						var nestedElement = document.getElementById(this.nestedParentElements.sorted[i]);
						this.mutationObserver.observe(nestedElement, options);
						this.mutationObserver.observe(nestedElement.parentNode, options);
					}
				} else {
					this.initMutationEventsListeners();
				}
			}
		},

		/**
		 * When Mutation Observer is not available, listen to DOMAttrModified events
		 */
		initMutationEventsListeners: function () {
			var self = this;
			var options = {
				delay: 50
			};
			for (var i = this.nestedParentElements.sorted.length; --i >= 0;) {
				var nestedElement = document.getElementById(this.nestedParentElements.sorted[i]);
				Event.on(
					nestedElement,
					'DOMAttrModified',
					function (event) { return self.onNestedShow(event); },
					options
				);
				Event.on(
					nestedElement.parentNode,
					'DOMAttrModified',
					function (event) { return self.onNestedShow(event); },
					options
				);
			}
		},

		/**
		 * editorId should be set in config
		 */
		editorId: null,

		/**
		 * Get a reference to the editor
		 */
		getEditor: function () {
			return RTEarea[this.editorId].editor;
		},

		/**
		 * Get a reference to the toolbar
		 */
		getToolbar: function () {
			return this.framework.toolbar;
		},

		/**
		 * Get a reference to the statusBar
		 */
		getStatusBar: function () {
			return this.framework.statusBar;
		},

		/**
		 * Get a reference to a button
		 */
		getButton: function (buttonId) {
			return this.getToolbar().getButton(buttonId);
		},

		/**
		 * Flag set to true when the iframe becomes usable for editing
		 */
		ready: false,

		/**
		 * Create the iframe element at rendering time
		 *
		 * @param object container: the container into which to insert the iframe (that is the framework)
		 * @return void
		 */
		createIframe: function (container) {
			if (this.autoEl && this.autoEl.tag) {
				this.el = document.createElement(this.autoEl.tag);
				if (this.autoEl.id) {
					this.el.setAttribute('id', this.autoEl.id);
				}
				if (this.autoEl.cls) {
					this.el.setAttribute('class', this.autoEl.cls);
				}
				if (this.autoEl.src) {
					this.el.setAttribute('src', this.autoEl.src);
				}
				this.el = container.appendChild(this.el);
			}
		},

		/**
		 * Get the content window of the iframe
		 */
		getIframeWindow: function () {
			return this.el.contentWindow ? this.el.contentWindow : this.el.contentDocument;
		},

		/**
		 * Proceed to build the iframe document head and ensure style sheets are available after the iframe document becomes available
		 */
		initializeIframe: function () {
			var self = this;
			var iframe = this.getEl();
			// All browsers
			if (!iframe || (!iframe.contentWindow && !iframe.contentDocument)) {
				window.setTimeout(function () {
					self.initializeIframe();
				}, 50);
			// All except WebKit
			} else if (iframe.contentWindow && !UserAgent.isWebKit && (!iframe.contentWindow.document || !iframe.contentWindow.document.documentElement)) {
				window.setTimeout(function () {
					self.initializeIframe();
				}, 50);
			// WebKit
			} else if (UserAgent.isWebKit && (!iframe.contentDocument.documentElement || !iframe.contentDocument.body)) {
				window.setTimeout(function () {
					self.initializeIframe();
				}, 50);
			} else {
				this.document = iframe.contentWindow ? iframe.contentWindow.document : iframe.contentDocument;
				this.getEditor().document = this.document;
				this.createHead();
				// Style the document body
				Dom.addClass(this.document.body, 'htmlarea-content-body');
				// Start listening to things happening in the iframe
				// For some unknown reason, this is too early for Opera
				if (!UserAgent.isOpera) {
					this.startListening();
				}
				// Hide the iframe
				this.hide();
				// Set iframe ready
				this.ready = true;
				/**
				 * @event HTMLAreaEventIframeReady
				 * Fires when the iframe style sheets become accessible
				 */
				Event.trigger(this, 'HTMLAreaEventIframeReady');
			}
		},

		/**
		 * Show the iframe
		 */
		show: function () {
			this.getEl().style.display = '';
			Event.trigger(this, 'HTMLAreaEventIframeShow');
		},

		/**
		 * Hide the iframe
		 */
		hide: function () {
			this.getEl().style.display = 'none';
		},

		/**
		 * Build the iframe document head
		 */
		createHead: function () {
			var head = this.document.getElementsByTagName('head')[0];
			if (!head) {
				head = this.document.createElement('head');
				this.document.documentElement.appendChild(head);
			}
			if (this.config.baseURL) {
				var base = this.document.getElementsByTagName('base')[0];
				if (!base) {
					base = this.document.createElement('base');
					base.href = this.config.baseURL;
					head.appendChild(base);
				}
				this.getEditor().appendToLog('HTMLArea.Iframe', 'createHead', 'Iframe baseURL set to: ' + base.href, 'info');
			}
			var link0 = this.document.getElementsByTagName('link')[0];
			if (!link0) {
				link0 = this.document.createElement('link');
				link0.rel = 'stylesheet';
				link0.type = 'text/css';
					// Firefox 3.0.1 does not apply the base URL while Firefox 3.6.8 does so. Do not know in what version this was fixed.
					// Therefore, for versions before 3.6.8, we prepend the url with the base, if the url is not absolute
				link0.href = ((UserAgent.isGecko && navigator.productSub < 2010072200 && !/^http(s?):\/{2}/.test(this.config.editedContentStyle)) ? this.config.baseURL : '') + this.config.editedContentStyle;
				head.appendChild(link0);
				this.getEditor().appendToLog('HTMLArea.Iframe', 'createHead', 'Skin CSS set to: ' + link0.href, 'info');
			}
			var pageStyle;
			for (var i = 0, n = this.config.pageStyle.length; i < n; i++) {
				pageStyle = this.config.pageStyle[i];
				var link = this.document.createElement('link');
				link.rel = 'stylesheet';
				link.type = 'text/css';
				link.href = ((UserAgent.isGecko && navigator.productSub < 2010072200 && !/^https?:\/{2}/.test(pageStyle)) ? this.config.baseURL : '') + pageStyle;
				head.appendChild(link);
				this.getEditor().appendToLog('HTMLArea.Iframe', 'createHead', 'Content CSS set to: ' + link.href, 'info');
			}
		},

		/**
		 * Focus on the iframe
		 */
		focus: function () {
			try {
				if (UserAgent.isWebKit) {
					this.getEl().focus();
				}
				this.getEl().contentWindow.focus();
			} catch(e) { }
		},

		/**
		 * Flag indicating whether the framework is inside a tab or inline element that may be hidden
		 * Should be set in config
		 */
		isNested: false,

		/**
		 * All nested tabs and inline levels in the sorting order they were applied
		 * Should be set in config
		 */
		nestedParentElements: {},

		/**
		 * Set designMode
		 *
		 * @param	boolean		on: if true set designMode to on, otherwise set to off
		 *
		 * @rturn	void
		 */
		setDesignMode: function (on) {
			if (on) {
				if (!UserAgent.isIE) {
					if (UserAgent.isGecko) {
							// In Firefox, we can't set designMode when we are in a hidden TYPO3 tab or inline element
						if (!this.isNested || Typo3.allElementsAreDisplayed(this.nestedParentElements.sorted)) {
							this.document.designMode = 'on';
							this.setOptions();
						}
					} else {
						this.document.designMode = 'on';
						this.setOptions();
					}
				}
				if (UserAgent.isIE || UserAgent.isWebKit) {
					this.document.body.contentEditable = true;
				}
			} else {
				if (!UserAgent.isIE) {
					this.document.designMode = 'off';
				}
				if (UserAgent.isIE || UserAgent.isWebKit) {
					this.document.body.contentEditable = false;
				}
			}
		},

		/**
		 * Set editing mode options (if we can... raises exception in Firefox 3)
		 *
		 * @return	void
		 */
		setOptions: function () {
			if (!UserAgent.isIE) {
				try {
					if (this.document.queryCommandEnabled('insertBrOnReturn')) {
						this.document.execCommand('insertBrOnReturn', false, this.config.disableEnterParagraphs);
					}
					if (this.document.queryCommandEnabled('styleWithCSS')) {
						this.document.execCommand('styleWithCSS', false, this.config.useCSS);
					} else if (UserAgent.isGecko && this.document.queryCommandEnabled('useCSS')) {
						this.document.execCommand('useCSS', false, !this.config.useCSS);
					}
					if (UserAgent.isGecko) {
						if (this.document.queryCommandEnabled('enableObjectResizing')) {
							this.document.execCommand('enableObjectResizing', false, !this.config.disableObjectResizing);
						}
						if (this.document.queryCommandEnabled('enableInlineTableEditing')) {
							this.document.execCommand('enableInlineTableEditing', false, (this.config.buttons.table && this.config.buttons.table.enableHandles) ? true : false);
						}
					}
				} catch(e) {}
			}
		},

		/**
		 * Mutations handler invoked when an hidden TYPO3 hidden nested tab or inline element is shown
		 */
		onNestedShowMutation: function (mutations) {
			for (var i = mutations.length; --i >= 0;) {
				var targetId = mutations[i].target.id;
				if (this.nestedParentElements.sorted.indexOf(targetId) !== -1 || this.nestedParentElements.sorted.indexOf(targetId.replace('_div', '_fields')) !== -1) {
					this.onNestedShowAction();
				}
			}
		},

		/**
		 * Handler invoked when an hidden TYPO3 hidden nested tab or inline element is shown
		 */
		onNestedShow: function (event) {
			Event.stopEvent(event);
			var target = event.target;
			var delay = event.data.delay;
			var self = this;
			window.setTimeout(function () {
				var styleEvent = true;
				// In older versions of Gecko attrName is not set and refering to it causes a non-catchable crash
				if ((UserAgent.isGecko && navigator.productSub > 2007112700) || UserAgent.isOpera || UserAgent.isIE) {
					styleEvent = (event.originalEvent.attrName === 'style') || (event.originalEvent.attrName === 'className') || (event.originalEvent.attrName === 'class');
				}
				if (styleEvent && (self.nestedParentElements.sorted.indexOf(target.id) != -1 || self.nestedParentElements.sorted.indexOf(target.id.replace('_div', '_fields')) != -1)) {
					self.onNestedShowAction();
				}
			}, delay);
			return false;
		},

		/**
		 * Take action when nested tab or inline element is shown
		 */
		onNestedShowAction: function () {
			// Check if all container nested elements are displayed
			if (Typo3.allElementsAreDisplayed(this.nestedParentElements.sorted)) {
				if (this.getEditor().getMode() === 'wysiwyg') {
					if (UserAgent.isGecko) {
						this.setDesignMode(true);
					}
					Event.trigger(this, 'HTMLAreaEventIframeShow');
				} else {
					Event.trigger(this.framework.getTextAreaContainer(), 'HTMLAreaEventTextAreaContainerShow');
				}
				this.getToolbar().update();
			}
		},

		/**
		 * Instance of DOM walker
		 */
		htmlRenderer: null,

		/**
		 * Getter for the instance of DOM walker
		 */
		getHtmlRenderer: function () {
			if (!this.htmlRenderer) {
				this.htmlRenderer = new Walker({
					keepComments: !this.config.htmlRemoveComments,
					removeTags: this.config.htmlRemoveTags,
					removeTagsAndContents: this.config.htmlRemoveTagsAndContents,
					baseUrl: this.config.baseURL
				});
			}
			return this.htmlRenderer;
		},

		/**
		 * Get the HTML content of the iframe
		 */
		getHTML: function () {
			return this.getHtmlRenderer().render(this.document.body, false);
		},

		/**
		 * Start listening to things happening in the iframe
		 */
		startListening: function () {
			var self = this;
			// Create keyMap so that plugins may bind key handlers
			this.keyMap = new KeyMap(this.document.documentElement, (UserAgent.isIE || UserAgent.isWebKit) ? 'keydown' : 'keypress');
			// Special keys map
			this.keyMap.addBinding(
				{
					key: [Event.DOWN, Event.UP, Event.LEFT, Event.RIGHT],
					alt: false,
					handler: function (event) { return self.onArrow(event); }
				}
			);
			this.keyMap.addBinding(
				{
					key: Event.TAB,
					ctrl: false,
					alt: false,
					handler: function (event) { return self.onTab(event); }
				}
			);
			this.keyMap.addBinding(
				{
					key: Event.SPACE,
					ctrl: true,
					shift: false,
					alt: false,
					handler: function (event) { return self.onCtrlSpace(event); }
				}
			);
			if (UserAgent.isGecko || UserAgent.isIE || UserAgent.isWebKit) {
				this.keyMap.addBinding(
				{
					key: [Event.BACKSPACE, Event.DELETE],
					alt: false,
					handler: function (event) { return self.onBackSpace(event); }
				});
			}
			if (!UserAgent.isIE && !this.config.disableEnterParagraphs) {
				this.keyMap.addBinding(
				{
					key: Event.ENTER,
					shift: false,
					handler: function (event) { return self.onEnter(event); }
				});
			}
			if (UserAgent.isWebKit) {
				this.keyMap.addBinding(
				{
					key: Event.ENTER,
					alt: false,
					handler: function (event) { return self.onWebKitEnter(event); }
				});
			}
			// Hot key map (on keydown for all browsers)
			var hotKeys = [];
			for (var key in this.config.hotKeyList) {
				if (key.length === 1) {
					hotKeys.push(key);
				}
			}
			// Make hot key map available, even if empty, so that plugins may add bindings
			this.hotKeyMap = new KeyMap(this.document.documentElement, 'keydown');
			if (hotKeys.length > 0) {
				this.hotKeyMap.addBinding({
					key: hotKeys,
					ctrl: true,
					shift: false,
					alt: false,
					handler: function (event) { return self.onHotKey(event); }
				});
			}
			Event.on(
				this.document.documentElement,
				(UserAgent.isIE || UserAgent.isWebKit) ? 'keydown' : 'keypress',
				function (event) { return self.onAnyKey(event); }
			);
			Event.on(
				this.document.documentElement,
				'mouseup',
				function (event) { return self.onMouse(event); }
			);
			Event.on(
				this.document.documentElement,
				'click',
				function (event) { return self.onMouse(event); }
			);
			if (UserAgent.isGecko) {
				Event.on(
					this.document.documentElement,
					'paste',
					function (event) { return self.onPaste(event); }
				);
			}
			Event.on(
				this.document.documentElement,
				'drop',
				function (event) { return self.onDrop(event); }
			);
			if (UserAgent.isWebKit) {
				Event.on(
					this.document.body,
					'dragend',
					function (event) { return self.onDrop(event); }
				);
			}
		},

		/**
		 * Handler for other key events
		 */
		onAnyKey: function (event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			/**
			 * @event HTMLAreaEventWordCountChange
			 * Fires when the word count may have changed
			 */
			Event.trigger(this, 'HTMLAreaEventWordCountChange', [100]);
			if (!event.altKey && !(event.ctrlKey || event.metaKey)) {
				var key = Event.getKey(event);
				// Detect URL in non-IE browsers
				if (!UserAgent.isIE && (key !== Event.ENTER || (event.shiftKey && !UserAgent.isWebKit))) {
					this.getEditor().getSelection().detectURL(event);
				}
				// Handle option+SPACE for Mac users
				if (UserAgent.isMac && key === Event.NON_BREAKING_SPACE) {
					return this.onOptionSpace(key, event);
				}
			}
			return true;
		},

		/**
		 * On any key input event, check if input is currently inhibited
		 */
		inhibitKeyboardInput: function (event) {
			// Inhibit key events while server-based cleaning is being processed
			if (this.getEditor().inhibitKeyboardInput) {
				Event.stopEvent(event);
				return true;
			} else {
				return false;
			}
		},

		/**
		 * Handler for mouse events
		 */
		onMouse: function (event) {
			// In WebKit, select the image when it is clicked
			if (UserAgent.isWebKit && /^(img)$/i.test(event.target.nodeName) && event.type === 'click') {
				this.getEditor().getSelection().selectNode(event.target);
			}
			this.getToolbar().updateLater(100);
			return true;
		},

		/**
		 * Handler for paste operations in Gecko
		 */
		onPaste: function (event) {
			// Make src and href urls absolute
			if (UserAgent.isGecko) {
				var self = this;
				window.setTimeout(function () {
					Dom.makeUrlsAbsolute(self.getEditor().document.body, self.config.baseURL, self.getHtmlRenderer());
				}, 50);
			}
			return true;
		},

		/**
		 * Handler for drag and drop operations
		 */
		onDrop: function (event) {
			var self = this;
			// Clean up span elements added by WebKit
			if (UserAgent.isWebKit) {
				window.setTimeout(function () {
					self.getEditor().getDomNode().cleanAppleStyleSpans(self.getEditor().document.body);
				}, 50);
			}
			// Make src url absolute in Firefox
			if (UserAgent.isGecko) {
				window.setTimeout(function () {
					Dom.makeUrlsAbsolute(event.target, self.config.baseURL, self.getHtmlRenderer());
				}, 50);
			}
			this.getToolbar().updateLater(100);
			return true;
		},

		/**
		 * Handler for UP, DOWN, LEFT and RIGHT arrow keys
		 */
		onArrow: function (event) {
			this.getToolbar().updateLater(100);
			return true;
		},

		/**
		 * Handler for TAB and SHIFT-TAB keys
		 *
		 * If available, BlockElements plugin will handle the TAB key
		 */
		onTab: function (event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			var keyName = (event.shiftKey ? 'SHIFT-' : '') + 'TAB';
			if (this.config.hotKeyList[keyName] && this.config.hotKeyList[keyName].cmd) {
				var button = this.getButton(this.config.hotKeyList[keyName].cmd);
				if (button) {
					Event.stopEvent(event);
					/**
					 * @event HTMLAreaEventHotkey
					 * Fires when the button hotkey is pressed
					 */
					Event.trigger(button, 'HTMLAreaEventHotkey', [keyName, event]);
					return false;
				}
			}
			return true;
		},

		/**
		 * Handler for BACKSPACE and DELETE keys
		 */
		onBackSpace: function (event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			if ((!UserAgent.isIE && !event.shiftKey) || UserAgent.isIE) {
				if (this.getEditor().getSelection().handleBackSpace()) {
					Event.stopEvent(event);
					return false;
				}
			}
			// Update the toolbar state after some time
			this.getToolbar().updateLater(200);
			return true;
		},

		/**
		 * Handler for ENTER key in non-IE browsers
		 */
		onEnter: function (event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			this.getEditor().getSelection().detectURL(event);
			if (this.getEditor().getSelection().checkInsertParagraph()) {
				Event.stopEvent(event);
				// Update the toolbar state after some time
				this.getToolbar().updateLater(200);
				return false;
			}
			// Update the toolbar state after some time
			this.getToolbar().updateLater(200);
			return true;
		},

		/**
		 * Handler for ENTER key in WebKit browsers
		 */
		onWebKitEnter: function (event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			if (event.shiftKey || this.config.disableEnterParagraphs) {
				var editor = this.getEditor();
				editor.getSelection().detectURL(event);
				if (UserAgent.isSafari) {
					var brNode = editor.document.createElement('br');
					editor.getSelection().insertNode(brNode);
					brNode.parentNode.normalize();
					// Selection issue when an URL was detected
					if (editor._unlinkOnUndo) {
						brNode = brNode.parentNode.parentNode.insertBefore(brNode, brNode.parentNode.nextSibling);
					}
					if (!brNode.nextSibling || !/\S+/i.test(brNode.nextSibling.textContent)) {
						var secondBrNode = editor.document.createElement('br');
						secondBrNode = brNode.parentNode.appendChild(secondBrNode);
					}
					editor.getSelection().selectNode(brNode, false);
					Event.stopEvent(event);
					// Update the toolbar state after some time
					this.getToolbar().updateLater(200);
					return false;
				}
			}
			// Update the toolbar state after some time
			this.getToolbar().updateLater(200);
			return true;
		},

		/**
		 * Handler for CTRL-SPACE keys
		 */
		onCtrlSpace: function (event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			this.getEditor().getSelection().insertHtml('&nbsp;');
			Event.stopEvent(event);
			return false;
		},

		/**
		 * Handler for OPTION-SPACE keys on Mac
		 */
		onOptionSpace: function (key, event) {
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			this.getEditor().getSelection().insertHtml('&nbsp;');
			Event.stopEvent(event);
			return false;
		},

		/**
		 * Handler for configured hotkeys
		 */
		onHotKey: function (event) {
			var key = Event.getKey(event);
			if (this.inhibitKeyboardInput(event)) {
				return false;
			}
			var hotKey = String.fromCharCode(key).toLowerCase();
			/**
			 * @event HTMLAreaEventHotkey
			 * Fires when the button hotkey is pressed
			 */
			Event.trigger(this.getButton(this.config.hotKeyList[hotKey].cmd), 'HTMLAreaEventHotkey', [hotKey, event]);
			return false;
		},

		/**
		 * Cleanup (called by framework)
		 */
		onBeforeDestroy: function () {
			// Remove listeners on nested elements
			if (this.isNested) {
				if (this.mutationObserver) {
					this.mutationObserver.disconnect();
				} else {
					for (var i = this.nestedParentElements.sorted.length; --i >= 0;) {
						var nestedElement = document.getElementById(this.nestedParentElements.sorted[i]);
						Event.off(nestedElement);
						Event.off(nestedElement.parentNode);
					}
				}
			}
			Event.off(this);
			Event.off(this.getEl());
			Event.off(this.document.body);
			Event.off(this.document.documentElement);
			// Cleaning references to DOM in order to avoid IE memory leaks
			this.document = null;
			this.el = null;
		}
	};

	return Iframe;

});

/**
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
 * The container of the textarea within the editor framework
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/TextAreaContainer',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (Util, Dom, Event) {

	/**
	 * Status bar constructor
	 */
	var TextAreaContainer = function (config) {
		Util.apply(this, config);
	};

	TextAreaContainer.prototype = {

		/**
		 * Render the textarea container (called by framework rendering)
		 *
		 * @param object container: the container into which to insert the status bar (that is the framework)
		 * @return void
		 */
		render: function (container) {
			this.el = document.createElement('div');
			if (this.id) {
				this.el.setAttribute('id', this.id);
			}
			if (this.cls) {
				this.el.setAttribute('class', this.cls);
			}
			this.el = container.appendChild(this.el);
			this.swallow(this.textArea);
			this.rendered = true;
		},

		/**
		 * Get the element to which the textarea container is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * editorId should be set in config
		 */
		editorId: null,

		/**
		 * Get a reference to the editor
		 */
		getEditor: function() {
			return RTEarea[this.editorId].editor;
		},

		/**
		 * Let the textarea container swallow the textarea
		 */
		swallow: function (textarea) {
			this.originalParent = textarea.parentNode;
			this.getEl().appendChild(textarea);
		},

		/**
		 * Show the texarea container
		 */
		show: function () {
			this.getEl().style.display = '';
			Event.trigger(this, 'HTMLAreaEventTextAreaContainerShow');
		},

		/**
		 * Hide the texarea container
		 */
		hide: function () {
			this.getEl().style.display = 'none';
		},

		/**
		 * Throw back the texarea (called by framework)
		 */
		onBeforeDestroy: function() {
			this.originalParent.appendChild(this.textArea);
			Event.off(this);
			this.el = null;
		}
	};

	return TextAreaContainer;

});

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
 * The optional status bar at the bottom of the editor framework
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/StatusBar',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (UserAgent, Util, Dom, Event) {

	/**
	 * Status bar constructor
	 */
	var StatusBar = function (config) {
		Util.apply(this, config);
	};

	StatusBar.prototype = {

		/**
		 * Render the status bar (called by framework rendering)
		 *
		 * @param object container: the container into which to insert the status bar (that is the framework)
		 * @return void
		 */
		render: function (container) {
			this.el = document.createElement('div');
			if (this.id) {
				this.el.setAttribute('id', this.id);
			}
			if (this.cls) {
				this.el.setAttribute('class', this.cls);
			}
			this.el = container.appendChild(this.el);
			this.addComponents();
			this.initEventListeners();
			if (!this.getEditor().config.showStatusBar) {
				this.hide();
			}
			this.rendered = true;
		},

		/**
		 * Initialize listeners (after rendering)
		 */
		initEventListeners: function () {
			var self = this;
			// Monitor editor changing mode
			Event.on(this.getEditor(), 'HTMLAreaEventModeChange', function (event, mode) { Event.stopEvent(event); self.onModeChange(mode); return false; });
			// Monitor word count change
			Event.on(this.framework.iframe, 'HTMLAreaEventWordCountChange', function (event, delay) { Event.stopEvent(event); self.onWordCountChange(delay); return false; });
		},

		/**
		 * Get the element to which the status bar is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * Get the current height of the status bar
		 */
		getHeight: function () {
			return Dom.getSize(this.el).height;
		},

		/**
		 * editorId should be set in config
		 */
		editorId: null,

		/**
		 * Get a reference to the editor
		 */
		getEditor: function() {
			return RTEarea[this.editorId].editor;
		},

		/**
		 * Create span elements to display when the status bar tree or a message when the editor is in text mode
		 */
		addComponents: function () {
			// Word count
			var wordCount = document.createElement('span');
			wordCount.id = this.editorId + '-statusBarWordCount';
			wordCount.style.display = 'block';
			wordCount.innerHTML = '&nbsp;';
			Dom.addClass(wordCount, 'statusBarWordCount');
			this.statusBarWordCount = this.getEl().appendChild(wordCount);
			// Element tree
			var tree = document.createElement('span');
			tree.id = this.editorId + '-statusBarTree';
			tree.style.display = 'block';
			tree.innerHTML = HTMLArea.localize('Path') + ': ';
			Dom.addClass(tree, 'statusBarTree');
			this.statusBarTree = this.getEl().appendChild(tree);
			// Text mode
			var textMode = document.createElement('span');
			textMode.id = this.editorId + '-statusBarTextMode';
			textMode.style.display = 'none';
			textMode.innerHTML = HTMLArea.localize('TEXT_MODE');
			Dom.addClass(textMode, 'statusBarTextMode');
			this.statusBarTextMode = this.getEl().appendChild(textMode);
		},

		/**
		 * Show the status bar
		 */
		show: function () {
			this.getEl().style.display = '';
		},

		/**
		 * Hide the status bar
		 */
		hide: function () {
			this.getEl().style.display = 'none';
		},

		/**
		 * Clear the status bar tree
		 */
		clear: function () {
			var node;
			while (node = this.statusBarTree.firstChild) {
				if (/^(a)$/i.test(node.nodeName)) {
					Event.off(node);
				}
				Dom.removeFromParent(node);
			}
			this.setSelection(null);
		},

		/**
		 * Flag indicating that the status bar should not be updated on this toolbar update
		 */
		noUpdate: false,

		/**
		 * Update the status bar when the toolbar was updated
		 *
		 * @return void
		 */
		onUpdateToolbar: function (mode, selectionEmpty, ancestors, endPointsInSameBlock) {
			if (mode === 'wysiwyg' && !this.noUpdate && this.getEditor().config.showStatusBar) {
				var self = this;
				var text,
					language,
					languageObject = this.getEditor().getPlugin('Language'),
					classes = new Array(),
					classText;
				this.clear();
				var path = document.createElement('span');
				path.innerHTML = HTMLArea.localize('Path') + ': ';
				path = this.statusBarTree.appendChild(path);
				var index, n, j, m;
				for (index = 0, n = ancestors.length; index < n; index++) {
					var ancestor = ancestors[index];
					if (!ancestor) {
						continue;
					}
					text = ancestor.nodeName.toLowerCase();
					// Do not show any id generated by ExtJS
					if (ancestor.id && text !== 'body' && ancestor.id.substr(0, 7) !== 'ext-gen') {
						text += '#' + ancestor.id;
					}
					if (languageObject && languageObject.getLanguageAttribute) {
						language = languageObject.getLanguageAttribute(ancestor);
						if (language != 'none') {
							text += '[' + language + ']';
						}
					}
					if (ancestor.className) {
						classText = '';
						classes = ancestor.className.trim().split(' ');
						for (j = 0, m = classes.length; j < m; ++j) {
							if (!HTMLArea.reservedClassNames.test(classes[j])) {
								classText += '.' + classes[j];
							}
						}
						text += classText;
					}
					var element = document.createElement('a');
					element.href = '#';
					if (ancestor.style.cssText) {
						element.setAttribute('title', HTMLArea.localize('statusBarStyle') + ':\x0D ' + ancestor.style.cssText.split(';').join('\x0D'));
					}
					element.innerHTML = text;
					element = path.parentNode.insertBefore(element, path.nextSibling);
					element.ancestor = ancestor;
					Event.on(element, 'click', function (event) { return self.onClick(event); });
					Event.on(element, 'mousedown', function (event) { return self.onClick(event); });
					if (!UserAgent.isOpera) {
						Event.on(element, 'contextmenu', function (event) { return self.onContextMenu(event); });
					}
					if (index) {
						var separator = document.createElement('span');
						separator.innerHTML = String.fromCharCode(0xbb);
						element.parentNode.insertBefore(separator, element.nextSibling);
					}
				}
			}
			this.updateWordCount();
			this.noUpdate = false;
		},

		/**
		 * Handler when the word count may have changed
		 *
		 * @param integer delay: the delay before updating the word count
		 * @return void
		 */
		onWordCountChange: function (delay) {
			if (this.updateWordCountLater) {
				window.clearTimeout(this.updateWordCountLater);
			}
			if (delay) {
				var self = this;
				this.updateWordCountLater = window.setTimeout(function () {
					self.updateWordCount();
				}, delay);
			} else {
				this.updateWordCount();
			}
		},

		/**
		 * Update the word count
		 */
		updateWordCount: function() {
			var wordCount = 0;
			if (this.getEditor().getMode() == 'wysiwyg') {
				// Get the html content
				var text = this.getEditor().getHTML();
				if (typeof text === 'string' && text.length > 0) {
					// Replace html tags with spaces
					text = text.replace(HTMLArea.RE_htmlTag, ' ');
					// Replace html space entities
					text = text.replace(/&nbsp;|&#160;/gi, ' ');
					// Remove numbers and punctuation
					text = text.replace(HTMLArea.RE_numberOrPunctuation, '');
					// Get the number of word
					wordCount = text.split(/\S\s+/g).length - 1;
				}
			}
			// Update the word count of the status bar
			this.statusBarWordCount.innerHTML = wordCount ? ( wordCount + ' ' + HTMLArea.localize((wordCount == 1) ? 'word' : 'words')) : '&nbsp;';
		},

		/**
		 * Adapt status bar to current editor mode
		 *
		 * @param string mode: the mode to which the editor got switched to
		 * @return void
		 */
		onModeChange: function (mode) {
			switch (mode) {
				case 'wysiwyg':
					this.statusBarTextMode.style.display = 'none';
					this.statusBarTree.style.display = 'block';
					break;
				case 'textmode':
				default:
					this.statusBarTree.style.display = 'none';
					this.statusBarTextMode.style.display = 'block';
					break;
			}
		},

		/**
		 * Reference to the element last selected on the status bar
		 */
		selected: null,

		/**
		 * Get the status bar selection
		 */
		getSelection: function() {
			return this.selected;
		},

		/**
		 * Set the status bar selection
		 *
		 * @param	object	element: set the status bar selection to the given element
		 */
		setSelection: function (element) {
			this.selected = element ? element : null;
		},

		/**
		 * Select the element that was clicked in the status bar and set the status bar selection
		 */
		selectElement: function (element) {
			var editor = this.getEditor();
			element.blur();
			if (!UserAgent.isIEBeforeIE9) {
				if (/^(img|table)$/i.test(element.ancestor.nodeName)) {
					editor.getSelection().selectNode(element.ancestor);
				} else {
					editor.getSelection().selectNodeContents(element.ancestor);
				}
			} else {
				if (/^(img|table)$/i.test(element.ancestor.nodeName)) {
					var range = editor.document.body.createControlRange();
					range.addElement(element.ancestor);
					range.select();
				} else {
					editor.getSelection().selectNode(element.ancestor);
				}
			}
			this.setSelection(element.ancestor);
			this.noUpdate = true;
			editor.toolbar.update();
		},

		/**
		 * Click handler
		 */
		onClick: function (event) {
			this.selectElement(event.target);
			Event.stopEvent(event);
			return false;
		},

		/**
		 * ContextMenu handler
		 */
		onContextMenu: function (event) {
			this.selectElement(event.target);
			return this.getEditor().getPlugin('ContextMenu') ? this.getEditor().getPlugin('ContextMenu').show(event, event.target.ancestor) : false;
		},

		/**
		 * Cleanup (called by framework)
		 */
		onBeforeDestroy: function() {
			this.clear();
			var node;
			while (node = this.el.firstChild) {
				this.el.removeChild(node);
			}
			this.statusBarTree = null;
			this.statusBarWordCount = null;
			this.el = null;
		}
	};

	return StatusBar;

});

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
 * Framework is the visual component of the Editor and contains the tool bar, the iframe, the textarea and the status bar
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Framework',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Resizable',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/TYPO3',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event'],
	function (UserAgent, Util, Resizable, Dom, Typo3, Event) {

	/**
	 * Framework constructor
	 */
	var Framework = function (config) {
		Util.apply(this, config);
		// Set some references
		for (var i = 0, n = this.items.length; i < n; i++) {
			var item = this.items[i];
			item.framework = this;
			this[item.itemId] = item;
		}
		// Monitor iframe becoming ready
		var self = this;
		Event.one(this.iframe, 'HTMLAreaEventIframeReady', function (event) { Event.stopEvent(event); self.onIframeReady(); return false; });
		// Let the framefork render itself, but it will fail to do so if inside a hidden tab or inline element
		if (!this.isNested || Typo3.allElementsAreDisplayed(this.nestedParentElements.sorted)) {
			this.render(this.textArea.parentNode, this.textArea.id);
		} else {
			// Clone the array of nested tabs and inline levels instead of using a reference as HTMLArea.util.TYPO3.accessParentElements will modify the array
			var parentElements = [].concat(this.nestedParentElements.sorted);
			// Walk through all nested tabs and inline levels to get correct sizes
			Typo3.accessParentElements(parentElements, 'args[0].render(args[0].textArea.parentNode, args[0].textArea.id)', [this]);
		}
	};

	Framework.prototype = {

		/**
		 * Render the framework
		 *
		 * @param object container: the container into which to insert the framework
		 * @param string position: the id of the child element of the container before which the framework should be inserted
		 * @return void
		 */
		render: function (container, position) {
			this.el = document.createElement('div');
			if (this.id) {
				this.el.setAttribute('id', this.id);
			}
			if (this.cls) {
				this.el.setAttribute('class', this.cls);
			}
			var position = document.getElementById(position);
			this.el = container.insertBefore(this.el, position);
			for (var i = 0, n = this.items.length; i < n; i++) {
				var item = this.items[i];
				item.render(this.el);
			}
			this.rendered = true;
		},

		/**
		 * Get the element to which the framework is rendered
		 */
		getEl: function () {
			return this.el;
		},

		/**
		 * Initiate events monitoring
		 */
		initEventListeners: function () {
			var self = this;
			// Make the framework resizable, if configured by the user
			this.makeResizable();
			// Monitor textArea container becoming shown or hidden as it may change the height of the status bar
			Event.on(this.textAreaContainer, 'HTMLAreaEventTextAreaContainerShow', function(event) { Event.stopEvent(event); self.resizable ? self.onTextAreaShow() : self.onWindowResize(); return false; });
			// Monitor iframe becoming shown or hidden as it may change the height of the status bar
			Event.on(this.iframe, 'HTMLAreaEventIframeShow', function(event) { Event.stopEvent(event); self.resizable ? self.onIframeShow() : self.onWindowResize(); return false; });
			// Monitor window resizing
			Event.on(window, 'resize', function (event) {
				// Avoid resizing while the framework is already being resized by jQuery UI Resizable
				if (self.isResizing) {
					Event.stopEvent(event);
				} else {
					self.onWindowResize();
				}
			});
			// If the textarea is inside a form, on reset, re-initialize the HTMLArea content and update the toolbar
			var form = this.textArea.form;
			if (form) {
				if (typeof form.onreset === 'function') {
					if (typeof form.htmlAreaPreviousOnReset === 'undefined') {
						form.htmlAreaPreviousOnReset = [];
					}
					form.htmlAreaPreviousOnReset.push(form.onreset);
				}
				Event.on(form, 'reset', function (event) { return self.onReset(event); });
			}
		},

		/**
		 * editorId should be set in config
		 */
		editorId: null,

		/**
		 * Get a reference to the editor
		 */
		getEditor: function() {
			return RTEarea[this.editorId].editor;
		},

		/**
		 * Flag indicating whether the framework is inside a tab or inline element that may be hidden
		 * Should be set in config
		 */
		isNested: false,

		/**
		 * All nested tabs and inline levels in the sorting order they were applied
		 * Should be set in config
		 */
		nestedParentElements: {},

		/**
		 * Flag set to true when the framework is ready
		 */
		ready: false,

		/**
		 * All nested tabs and inline levels in the sorting order they were applied
		 * Should be set in config
		 */
		nestedParentElements: {},

		/**
		 * Whether the framework should be made resizable
		 * May be set in config
		 */
		resizable: false,

		/**
		 * Maximum height to which the framework may resized (in pixels)
		 * May be set in config
		 */
		maxHeight: 2000,

		/**
		 * When true, the framework is being resized by jQuery UI Resizable
		 */
		isResizing: false,

		/**
		 * Initial textArea dimensions
		 * Should be set in config
		 */
		textAreaInitialSize: {
			width: 0,
			contextWidth: 0,
			height: 0
		},

		/**
		 * Get the toolbar
		 */
		getToolbar: function () {
			return this.toolbar;
		},

		/**
		 * Get the iframe
		 */
		getIframe: function () {
			return this.iframe;
		},

		/**
		 * Get the textarea container
		 */
		getTextAreaContainer: function () {
			return this.textAreaContainer;
		},

		/**
		 * Get the status bar
		 */
		getStatusBar: function () {
			return this.statusBar;
		},

		/**
		 * Make the framework resizable, if configured
		 */
		makeResizable: function () {
			if (this.resizable) {
				var self = this;
				// Mutation observer will not work in WebKit on manual resize: https://code.google.com/p/chromium/issues/detail?id=293948
				// The same is true in Opera 26
				if (Util.testCssPropertySupport(this.getEl(), 'resize', 'both') && typeof MutationObserver === 'function' && !UserAgent.isWebKit && !UserAgent.isOpera) {
					this.getEl().style['resize'] = 'both';
					this.getEl().style['maxHeight'] = this.maxHeight;
					// WebKit adds scollbars
					this.getEl().style['overflow'] = UserAgent.isWebKit ? 'hidden' : 'auto';
					// For WebKit, we need to reset the resize property set by default on textareas and iframes
					if (UserAgent.isWebKit) {
						this.textArea.style['resize'] = 'none';
						this.iframe.getEl().style['resize'] = 'none';
					}
					this.mutationObserver = new MutationObserver(function (mutations) { self.onSizeMutation(mutations); });
					var options = {
						attributes: true,
						attributeFilter: ['style']
					};
					this.mutationObserver.observe(this.getEl(), options);
				} else {
					this.resizer = Resizable.makeResizable(this.getEl(), {
						delay: 150,
						minHeight: 200,
						minWidth: 300,
						alsoResize: '#' + this.editorId + '-iframe',
						maxHeight: this.maxHeight,
						start: function (event, ui) {
							Event.stopEvent(event);
							self.isResizing = true;
							return false;
						},
						resize: function (event, ui) {
							Event.stopEvent(event);
							self.doHtmlAreaResize(ui.size);
							return false;
						},
						stop: function (event, ui) {
							Event.stopEvent(event);
							self.isResizing = false;
							self.doHtmlAreaResize(ui.size);
							return false;
						}
					});
				}
			}
		},

		/**
		 * Mutations handler invoked when the framework is resized by css
		 */
		onSizeMutation: function (mutations) {
			for (var i = mutations.length; --i >= 0;) {
				this.onFrameworkResize();
			}
		},

		/**
		 * Resize the framework when the handle is used
		 */
		doHtmlAreaResize: function (size) {
			Dom.setSize(this.getEl(), size);
			this.onFrameworkResize();
		},

		/**
		 * Handle the window resize event
		 * Buffer the event for IE
		 */
		onWindowResize: function () {
			var self = this;
			if (this.windowResizeTimeoutId) {
				window.clearTimeout(this.windowResizeTimeoutId);
     			}
     			this.windowResizeTimeoutId = window.setTimeout(function () { self.doWindowResize(); }, 10);
		},

		/**
		 * Size the iframe according to initial textarea size as set by Page and User TSConfig
		 */
		doWindowResize: function () {
			if (!this.isNested || Typo3.allElementsAreDisplayed(this.nestedParentElements.sorted)) {
				this.resizeFramework();
			} else {
				// Clone the array of nested tabs and inline levels instead of using a reference as HTMLArea.util.TYPO3.accessParentElements will modify the array
				var parentElements = [].concat(this.nestedParentElements.sorted);
				// Walk through all nested tabs and inline levels to get correct sizes
				Typo3.accessParentElements(parentElements, 'args[0].resizeFramework()', [this]);
			}
		},

		/**
		 * Resize the framework to its initial size
		 */
		resizeFramework: function () {
			var frameworkHeight = this.fullScreen ? Typo3.getWindowSize().height - 25 : parseInt(this.textAreaInitialSize.height) + this.toolbar.getHeight() - this.statusBar.getHeight();
			if (this.textAreaInitialSize.width.indexOf('%') === -1) {
				// Width is specified in pixels
				// Initial framework sizing
				var frameworkWidth = parseInt(this.textAreaInitialSize.width);
			} else {
				// Width is specified in %
				// Framework sizing on actual window resize
				var frameworkWidth = parseInt(((Typo3.getWindowSize().width - this.textAreaInitialSize.wizardsWidth - (this.fullScreen ? 10 : Util.getScrollBarWidth()) - Dom.getPosition(this.getEl()).x - 15) * parseInt(this.textAreaInitialSize.width))/100);
			}
			Dom.setSize(this.getEl(), { width: frameworkWidth, height: frameworkHeight});
			this.onFrameworkResize();
		},

		/**
		 * Resize the framework components
		 */
		onFrameworkResize: function () {
			Dom.setSize(this.iframe.getEl(), { width: this.getInnerWidth(), height: this.getInnerHeight()});
			Dom.setSize(this.textArea, { width: this.getInnerWidth(), height: this.getInnerHeight()});
			this.toolbar.update();
		},

		/**
		 * Adjust the height to the changing size of the statusbar when the textarea is shown
		 */
		onTextAreaShow: function () {
			Dom.setSize(this.iframe.getEl(), { height: this.getInnerHeight()});
			Dom.setSize(this.textArea, { width: this.getInnerWidth(), height: this.getInnerHeight()});
		},

		/**
		 * Adjust the height to the changing size of the statusbar when the iframe is shown
		 */
		onIframeShow: function () {
			if (this.getInnerHeight() <= 0) {
				this.onWindowResize();
			} else {
				Dom.setSize(this.iframe.getEl(), { height: this.getInnerHeight()});
				Dom.setSize(this.textArea, { height: this.getInnerHeight()});
			}
		},

		/**
		 * Calculate the height available for the editing iframe
		 */
		getInnerHeight: function () {
			return Dom.getSize(this.getEl()).height - this.toolbar.getHeight() - this.statusBar.getHeight() - 5;
		},

		/**
		 * Calculate the width available for the editing iframe
		 */
		getInnerWidth: function () {
			return Dom.getSize(this.getEl()).width - 2;
		},

		/**
		 * Fire the editor when all components of the framework are rendered and ready
		 */
		onIframeReady: function () {
			this.ready = this.rendered && this.toolbar.rendered && this.statusBar.rendered && this.textAreaContainer.rendered;
			if (this.ready) {
				this.initEventListeners();
				this.textAreaContainer.show();
				// Set the initial size of the framework
				this.onWindowResize();
				/**
				 * @event HTMLAreaEventFrameworkReady
				 * Fires when the iframe is ready and all components are rendered
				 */
				Event.trigger(this, 'HTMLAreaEventFrameworkReady');
			} else {
				var self = this;
				window.setTimeout(function () {
					self.onIframeReady();	
				}, 50);
			}
		},

		/**
		 * Handler invoked if we are inside a form and the form is reset
		 * On reset, re-initialize the HTMLArea content and update the toolbar
		 */
		onReset: function (event) {
			this.getEditor().setHTML(this.textArea.value);
			this.toolbar.update();
			// Invoke previous reset handlers, if any
			var htmlAreaPreviousOnReset = event.target.htmlAreaPreviousOnReset;
			if (typeof htmlAreaPreviousOnReset !== 'undefined') {
				for (var i = 0, n = htmlAreaPreviousOnReset.length; i < n; i++) {
					htmlAreaPreviousOnReset[i]();
				}
			}
			return true;
		},

		/**
		 * Cleanup on framework destruction
		 */
		onBeforeDestroy: function () {
			Event.off(window);
			// Cleaning references to DOM in order to avoid IE memory leaks
			var form = this.textArea.form;
			if (form) {
				Event.off(form);
				form.htmlAreaPreviousOnReset = null;
			}
			if (this.mutationObserver) {
				this.mutationObserver.disconnect();
			}
			if (this.resizer) {
				Resizable.destroy(this.resizer);
			}
			for (var i = 0, n = this.items.length; i < n; i++) {
				if (typeof this.items[i].onBeforeDestroy === 'function') {
					this.items[i].onBeforeDestroy();
				}
			}
			this.el = null;
		}
	};

	return Framework;

});

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
 * Editor extends Ext.util.Observable
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Editor',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Ajax/Ajax',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/DOM',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Event/Event',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/Selection',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/BookMark',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/DOM/Node',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/TYPO3',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Framework',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Toolbar',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Iframe',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/TextAreaContainer',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/StatusBar'],
	function (UserAgent, Util, Ajax, Dom, Event, Selection, BookMark, Node, Typo3, Framework, Toolbar, Iframe, TextAreaContainer, StatusBar) {

	/**
	 * Editor constructor method
	 *
	 * @param object config: editor configuration object
	 */
	var Editor = function (config) {
		// Save the config
		this.config = config;
		// Establish references to this editor
		this.editorId = this.config.editorId;
		RTEarea[this.editorId].editor = this;
		// Get textarea size and wizard context
		this.textArea = document.getElementById(this.config.id);
		var computedStyle = window.getComputedStyle ? window.getComputedStyle(this.textArea) : null;
		this.textAreaInitialSize = {
			width: this.config.RTEWidthOverride ? this.config.RTEWidthOverride : (this.textArea.style.width ? this.textArea.style.width : (computedStyle ? computedStyle.width : 0)),
			height: this.config.fullScreen ? Typo3.getWindowSize().height - 25 : (this.textArea.style.height ? this.textArea.style.height : (computedStyle ? computedStyle.height : 0)),
			wizardsWidth: 0
		};
		// TYPO3 Inline elements and tabs
		this.nestedParentElements = {
			all: this.config.tceformsNested,
			sorted: Typo3.simplifyNested(this.config.tceformsNested)
		};
		this.isNested = this.nestedParentElements.sorted.length > 0;
		// If in BE, get width of wizards
		if (document.getElementById('typo3-docheader') && !this.config.fullScreen) {
			this.wizards = this.textArea.parentNode.parentNode.nextSibling;
			if (this.wizards && this.wizards.nodeType === Dom.ELEMENT_NODE) {
				if (!this.isNested || Typo3.allElementsAreDisplayed(this.nestedParentElements.sorted)) {
					this.textAreaInitialSize.wizardsWidth = this.wizards.offsetWidth;
				} else {
					// Clone the array of nested tabs and inline levels instead of using a reference as HTMLArea.util.TYPO3.accessParentElements will modify the array
					var parentElements = [].concat(this.nestedParentElements.sorted);
					// Walk through all nested tabs and inline levels to get correct size
					this.textAreaInitialSize.wizardsWidth = Typo3.accessParentElements(parentElements, 'args[0].offsetWidth', [this.wizards]);
				}
				// Hide the wizards so that they do not move around while the editor framework is being sized
				this.wizards.style.display = 'none';
			}
		}

		// Create Ajax object
		this.ajax = new Ajax({
			editor: this
		});

		// Plugins register
		this.plugins = {};
		// Register the plugins included in the configuration
		for (var plugin in this.config.plugin) {
			if (this.config.plugin[plugin]) {
				this.registerPlugin(plugin);
			}
		}

		// Initiate loading of the CSS classes configuration
		this.getClassesConfiguration();

		// Initialize keyboard input inhibit flag
		this.inhibitKeyboardInput = false;

		/**
		 * Flag set to true when the editor initialization has completed
		 */
		this.ready = false;

		/**
		 * The current mode of the editor: 'wysiwyg' or 'textmode'
		 */
		this.mode = 'textmode';

		/**
		 * The Selection object
		 */
		this.selection = null;

		/**
		 * The BookMark object
		 */
		this.bookMark = null;

		/**
		 * The DomNode object
		 */
		this.domNode = null;
	};

	/**
	 * Determine whether the editor document is currently contentEditable
	 *
	 * @return	boolean		true, if the document is contentEditable
	 */
	Editor.prototype.isEditable = function () {
		return UserAgent.isIE ? this.document.body.contentEditable : (this.document.designMode === 'on');
	};

	/**
	 * The selection object
	 */
	Editor.prototype.getSelection = function () {
		if (!this.selection) {
			this.selection = new Selection({
				editor: this
			});
		}
		return this.selection;
	};

	/**
	 * The bookmark object
	 */
	Editor.prototype.getBookMark = function () {
		if (!this.bookMark) {
			this.bookMark = new BookMark({
				editor: this
			});
		}
		return this.bookMark;
	};

	/**
	 * The DOM node object
	 */
	Editor.prototype.getDomNode = function () {
		if (!this.domNode) {
			this.domNode = new Node({
				editor: this
			});
		}
		return this.domNode;
	};

	/**
	 * Generate the editor framework
	 */
	Editor.prototype.generate = function () {
		if (this.allPluginsRegistered()) {
			this.createFramework();
		} else {
			var self = this;
			window.setTimeout(function () {
				self.generate();
			}, 50);
		}
	};

	/**
	 * Create the htmlArea framework
	 */
	Editor.prototype.createFramework = function () {
		// Create the editor framework
		this.htmlArea = new Framework({
			id: this.editorId + '-htmlArea',
			cls: 'htmlarea',
			editorId: this.editorId,
			textArea: this.textArea,
			textAreaInitialSize: this.textAreaInitialSize,
			fullScreen: this.config.fullScreen,
			resizable: this.config.resizable,
			maxHeight: this.config.maxHeight,
			isNested: this.isNested,
			nestedParentElements: this.nestedParentElements,
			items: [new Toolbar({
					// The toolbar
					id: this.editorId + '-toolbar',
					itemId: 'toolbar',
					editorId: this.editorId
				}),
				new Iframe({
					// The iframe
					id: this.editorId + '-iframe',
					itemId: 'iframe',
					width: (this.textAreaInitialSize.width.indexOf('%') === -1) ? parseInt(this.textAreaInitialSize.width) : 300,
					height: parseInt(this.textAreaInitialSize.height),
					autoEl: {
						id: this.editorId + '-iframe',
						tag: 'iframe',
						cls: 'editorIframe',
						src: UserAgent.isGecko ? 'javascript:void(0);' : (UserAgent.isWebKit ? 'javascript: \'' + Util.htmlEncode(this.config.documentType + this.config.blankDocument) + '\'' : HTMLArea.editorUrl + 'Resources/Public/Html/blank.html')
					},
					isNested: this.isNested,
					nestedParentElements: this.nestedParentElements,
					editorId: this.editorId
				}),
				new TextAreaContainer({
					// The container for the textarea
					id: this.editorId + '-textAreaContainer',
					itemId: 'textAreaContainer',
					width: (this.textAreaInitialSize.width.indexOf('%') === -1) ? parseInt(this.textAreaInitialSize.width) : 300,
					textArea: this.textArea
				}),
				new StatusBar({
					// The status bar
					id: this.editorId + '-statusBar',
					itemId: 'statusBar',
					cls: 'statusBar',
					editorId: this.editorId
				})
			]
		});
		// Set some references
		this.toolbar = this.htmlArea.getToolbar();
		this.iframe = this.htmlArea.getIframe();
		this.textAreaContainer = this.htmlArea.getTextAreaContainer();
		this.statusBar = this.htmlArea.getStatusBar();
		// Get triggered when the framework becomes ready
		var self = this;
		Event.one(this.htmlArea, 'HTMLAreaEventFrameworkReady', function (event) { Event.stopEvent(event); self.onFrameworkReady(); return false; });
	};

	/**
	 * Initialize the editor
	 */
	Editor.prototype.onFrameworkReady = function () {
		// Initialize editor mode
		this.setMode('wysiwyg');
		// Create the selection object
		this.getSelection();
		// Create the bookmark object
		this.getBookMark();
		// Create the DOM node object
		this.getDomNode();
		// Initiate events listening
		this.initEventsListening();
		// Generate plugins
		this.generatePlugins();
		// Make the editor visible
		this.show();
		this.toolbar.update();
		// Make the wizards visible again
		if (this.wizards && this.wizards.nodeType === Dom.ELEMENT_NODE) {
			this.wizards.style.display = '';
		}
		// Focus on the first editor that is not hidden
		for (var editorId in RTEarea) {
			var RTE = RTEarea[editorId];
			if (typeof RTE.editor !== 'object' || RTE.editor === null || (RTE.editor.isNested && !Typo3.allElementsAreDisplayed(RTE.editor.nestedParentElements.sorted))) {
				continue;
			} else {
				RTE.editor.focus();
				break;
			}
		}
		this.ready = true;
		/**
		 * @event EditorReady
		 * Fires when initialization of the editor is complete
		 */
		Event.trigger(this, 'HtmlAreaEventEditorReady');
		this.appendToLog('HTMLArea.Editor', 'onFrameworkReady', 'Editor ready.', 'info');
	};

	/**
	 * Get the CSS classes configuration
	 *
	 * @return void
	 */
	Editor.prototype.getClassesConfiguration = function () {
		this.classesConfigurationLoaded = false;
		if (this.config.classesUrl && typeof HTMLArea.classesLabels === 'undefined') {
			this.ajax.getJavascriptFile(this.config.classesUrl, function (options, success, response) {
				if (success) {
					try {
						if (typeof HTMLArea.classesLabels === 'undefined') {
							eval(response.responseText);
						}
					} catch(e) {
						this.appendToLog('HTMLArea.Editor', 'getClassesConfiguration', 'Error evaluating contents of Javascript file: ' + this.config.classesUrl, 'error');
					}
					this.classesConfigurationLoaded = true;
				}
			}, this);
		} else {
			// There is no classes configuration to be loaded
			this.classesConfigurationLoaded = true;
		}
	};

	/**
	 * Gets the status of the loading process of the CSS classes configuration
	 *
	 * @return boolean true if the classes configuration is loaded
	 */
	Editor.prototype.classesConfigurationIsLoaded = function() {
		return this.classesConfigurationLoaded;
	};

	/**
	 * Set editor mode
	 *
	 * @param string mode: 'textmode' or 'wysiwyg'
	 * @return void
	 */
	Editor.prototype.setMode = function (mode) {
		switch (mode) {
			case 'textmode':
				this.textArea.value = this.getHTML();
				this.iframe.setDesignMode(false);
				this.iframe.hide();
				this.textAreaContainer.show();
				this.mode = mode;
				break;
			case 'wysiwyg':
				try {
					this.document.body.innerHTML = this.getHTML();
				} catch(e) {
					this.appendToLog('HTMLArea.Editor', 'setMode', 'The HTML document is not well-formed.', 'warn');
					TYPO3.Dialog.ErrorDialog({
						title: 'htmlArea RTE',
						msg: HTMLArea.localize('HTML-document-not-well-formed')
					});
					break;
				}
				this.textAreaContainer.hide();
				this.iframe.show();
				this.iframe.setDesignMode(true);
				this.mode = mode;
				break;
		}
		/**
		 * @event HTMLAreaEventModeChange
		 * Fires when the editor changes mode
		 */
		Event.trigger(this, 'HTMLAreaEventModeChange', [this.mode]);
		this.focus();
		for (var pluginId in this.plugins) {
			this.getPlugin(pluginId).onMode(this.mode);
		}
	};

	/**
	 * Get current editor mode
	 */
	Editor.prototype.getMode = function () {
		return this.mode;
	};

	/**
	 * Retrieve the HTML
	 * In the case of the wysiwyg mode, the html content is rendered from the DOM tree
	 *
	 * @return string the textual html content from the current editing mode
	 */
	Editor.prototype.getHTML = function () {
		switch (this.mode) {
			case 'wysiwyg':
				return this.iframe.getHTML();
			case 'textmode':
				// Collapse repeated spaces non-editable in wysiwyg
				// Replace leading and trailing spaces non-editable in wysiwyg
				return this.textArea.value.
					replace(/[\x20]+/g, '\x20').
					replace(/^\x20/g, '&nbsp;').
					replace(/\x20$/g, '&nbsp;');
			default:
				return '';
		}
	};

	/**
	 * Retrieve raw HTML
	 *
	 * @return string the textual html content from the current editing mode
	 */
	Editor.prototype.getInnerHTML = function () {
		switch (this.mode) {
			case 'wysiwyg':
				return this.document.body.innerHTML;
			case 'textmode':
				return this.textArea.value;
			default:
				return '';
		}
	};

	/**
	 * Replace the html content
	 *
	 * @param string html: the textual html
	 * @return void
	 */
	Editor.prototype.setHTML = function (html) {
		switch (this.mode) {
			case 'wysiwyg':
				this.document.body.innerHTML = html;
				break;
			case 'textmode':
				this.textArea.value = html;
				break;
		}
	};

	/**
	 * Require and instantiate the specified plugin and register it with the editor
	 *
	 * @param string plugin: the name of the plugin
	 * @return void
	 */
	Editor.prototype.registerPlugin = function (pluginName) {
		var self = this;
		require(['TYPO3/CMS/Rtehtmlarea/Plugins/' + pluginName], function (Plugin) {
			var pluginInstance = new Plugin(self, pluginName);
			if (pluginInstance) {
				var pluginInformation = pluginInstance.getPluginInformation();
				pluginInformation.instance = pluginInstance;
				self.plugins[pluginName] = pluginInformation;
			} else {
				self.appendToLog('HTMLArea.Editor', 'registerPlugin', 'Could not register plugin ' + pluginName + '.', 'warn');
			}
		});
	};

	/**
	 * Determine if all configured plugins are registered
	 *
	 * @return true if all configured plugins are registered
	 */
	Editor.prototype.allPluginsRegistered = function () {
		for (var plugin in this.config.plugin) {
			if (this.config.plugin[plugin]) {
				if (!this.plugins[plugin]) {
					return false;
				}
			}
		}
		return true;
	};

	/**
	 * Generate registered plugins
	 */
	Editor.prototype.generatePlugins = function () {
		for (var pluginId in this.plugins) {
			var plugin = this.getPlugin(pluginId);
			plugin.onGenerate();
		}
	};

	/**
	 * Get the instance of the specified plugin, if it exists
	 *
	 * @param string pluginName: the name of the plugin
	 * @return object the plugin instance or null
	 */
	Editor.prototype.getPlugin = function(pluginName) {
		return (this.plugins[pluginName] ? this.plugins[pluginName].instance : null);
	};

	/**
	 * Unregister the instance of the specified plugin
	 *
	 * @param string pluginName: the name of the plugin
	 * @return void
	 */
	Editor.prototype.unRegisterPlugin = function(pluginName) {
		delete this.plugins[pluginName].instance;
		delete this.plugins[pluginName];
	};

	/**
	 * Update the editor toolbar
	 */
	Editor.prototype.updateToolbar = function (noStatus) {
		this.toolbar.update(noStatus);
	};

	/**
	 * Focus on the editor
	 */
	Editor.prototype.focus = function () {
		switch (this.getMode()) {
			case 'wysiwyg':
				this.iframe.focus();
				break;
			case 'textmode':
				this.textArea.focus();
				break;
		}
	};

	/**
	 * Scroll the editor window to the current caret position
	 */
	Editor.prototype.scrollToCaret = function () {
		if (!UserAgent.isIE) {
			var contentWindow = this.iframe.getEl().contentWindow;
			if (contentWindow) {
				var windowHeight = contentWindow.innerHeight,
					element = this.getSelection().getParentElement(),
					elementOffset = element.offsetTop,
					elementHeight = Dom.getSize(element).height,
					bodyScrollTop = contentWindow.document.body.scrollTop;
				// If the current selection is out of view
				if (elementOffset > windowHeight + bodyScrollTop || elementOffset < bodyScrollTop) {
					// Scroll the iframe contentWindow
					contentWindow.scrollTo(0, elementOffset - windowHeight + elementHeight);
				}
			}
		}
	};

	/**
	 * Add listeners
	 */
	Editor.prototype.initEventsListening = function () {
		if (UserAgent.isOpera) {
			this.iframe.startListening();
		}
		// Add unload handler
		var self = this;
		Event.one(this.iframe.getIframeWindow(), 'unload', function (event) { return self.onUnload(event); });
	};

	/**
	 * Make the editor framework visible
	 */
	Editor.prototype.show = function () {
		document.getElementById('pleasewait' + this.editorId).style.display = 'none';
		document.getElementById('editorWrap' + this.editorId).style.visibility = 'visible';
	};

	/**
	 * Append an entry at the end of the troubleshooting log
	 *
	 * @param string functionName: the name of the editor function writing to the log
	 * @param string text: the text of the message
	 * @param string type: the type of message
	 * @return void
	 */
	Editor.prototype.appendToLog = function (objectName, functionName, text, type) {
		HTMLArea.appendToLog(this.editorId, objectName, functionName, text, type);
	};

	/**
	 * Iframe unload handler: Update the textarea for submission and cleanup
	 */
	Editor.prototype.onUnload = function (event) {
		// Save the HTML content into the original textarea for submit, back/forward, etc.
		if (this.ready) {
			this.textArea.value = this.getHTML();
		}
		// Cleanup
		for (var pluginId in this.plugins) {
			this.unRegisterPlugin(pluginId);
		}
		Event.off(this.textarea);
		this.htmlArea.onBeforeDestroy();
		RTEarea[this.editorId].editor = null;
		return true;
	};

	return Editor;

});

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
 * Initialization script of TYPO3 htmlArea RTE
 */
define('TYPO3/CMS/Rtehtmlarea/HTMLArea/HTMLArea',
	['TYPO3/CMS/Rtehtmlarea/HTMLArea/UserAgent/UserAgent',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Util/Util',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Configuration/Config',
	'TYPO3/CMS/Rtehtmlarea/HTMLArea/Editor/Editor'],
	function (UserAgent, Util, Config, Editor) {

	var HtmlArea = {

		/***************************************************
		 * COMPILED REGULAR EXPRESSIONS                    *
		 ***************************************************/
		RE_htmlTag		: /<.[^<>]*?>/g,
		RE_tagName		: /(<\/|<)\s*([^ \t\n>]+)/ig,
		RE_head			: /<head>((.|\n)*?)<\/head>/i,
		RE_body			: /<body>((.|\n)*?)<\/body>/i,
		reservedClassNames	: /htmlarea/,
		RE_email		: /([0-9a-z]+([a-z0-9_-]*[0-9a-z])*){1}(\.[0-9a-z]+([a-z0-9_-]*[0-9a-z])*)*@([0-9a-z]+([a-z0-9_-]*[0-9a-z])*\.)+[a-z]{2,9}/i,
		RE_url			: /(([^:/?#]+):\/\/)?(([a-z0-9_]+:[a-z0-9_]+@)?[a-z0-9_-]{2,}(\.[a-z0-9_-]{2,})+\.[a-z]{2,5}(:[0-9]+)?(\/\S+)*\/?)/i,
		RE_numberOrPunctuation	: /[0-9.(),;:!¡?¿%#$'"_+=\\\/-]*/g,

		/***************************************************
		 * INITIALIZATION                                  *
		 ***************************************************/
		init: function () {
			if (!HTMLArea.isReady) {
				// Apply global configuration settings
				Util.apply(HtmlArea, RTEarea[0]);
				if (!HtmlArea.editorSkin) {
					HtmlArea.editorSkin = HtmlArea.editorUrl + 'Resources/Public/Css/Skin/';
				}
				if (!HtmlArea.editorCSS) {
					HtmlArea.editorCSS = HtmlArea.editorUrl + 'Resources/Public/Css/Skin/htmlarea.css';
				}
				if (typeof HtmlArea.editedContentCSS !== 'string' || HtmlArea.editedContentCSS === '') {
					HtmlArea.editedContentCSS = HtmlArea.editorSkin + 'htmlarea-edited-content.css';
				}
				HTMLArea.isReady = true;
				HtmlArea.appendToLog('', 'HTMLArea', 'init', 'Editor url set to: ' + HtmlArea.editorUrl, 'info');
				HtmlArea.appendToLog('', 'HTMLArea', 'init', 'Editor skin CSS set to: ' + HtmlArea.editorCSS, 'info');
				HtmlArea.appendToLog('', 'HTMLArea', 'init', 'Editor content skin CSS set to: ' + HtmlArea.editedContentCSS, 'info');

				Util.apply(HTMLArea, HtmlArea);
			}
		},

		/**
		 * Create an editor when HTMLArea is loaded and when Ext is ready
		 *
		 * @param	string		editorId: the id of the editor
		 * @return 	boolean		false if successful
		 */
		initEditor: function (editorId) {
			if (document.getElementById('pleasewait' + editorId)) {
				if (UserAgent.isSupported()) {
					document.getElementById('pleasewait' + editorId).style.display = 'block';
					document.getElementById('editorWrap' + editorId).style.visibility = 'hidden';
					if (!HTMLArea.isReady) {
						var self = this;
						window.setTimeout(function () {
							return self.initEditor(editorId);
						}, 150);
					} else {
						// Create an editor for the textarea
						var editor = new Editor(Util.apply(new Config(editorId), RTEarea[editorId]));
						editor.generate();
						return false;
					}
				} else {
					document.getElementById('pleasewait' + editorId).style.display = 'none';
					document.getElementById('editorWrap' + editorId).style.visibility = 'visible';
				}
			}
			return true;
		},

		/***************************************************
		 * LOCALIZATION                                    *
		 ***************************************************/
		localize: function (label, plural) {
			var i = plural || 0;
			var localized = HTMLArea.I18N.dialogs[label] || HTMLArea.I18N.tooltips[label] || HTMLArea.I18N.msg[label] || '';
			if (typeof localized === 'object' && localized !== null && typeof localized[i] !== 'undefined') {
				localized = localized[i]['target'];
			}
			return localized;
		},

		/***************************************************
		 * LOGGING                                         *
		 ***************************************************/
		/**
		 * Write message to JavaScript console
		 *
		 * @param	string		editorId: the id of the editor issuing the message
		 * @param	string		objectName: the name of the object issuing the message
		 * @param	string		functionName: the name of the function issuing the message
		 * @param	string		text: the text of the message
		 * @param	string		type: the type of message: 'log', 'info', 'warn' or 'error'
		 * @return	void
		 */
		appendToLog: function (editorId, objectName, functionName, text, type) {
			var str = 'RTE[' + editorId + '][' + objectName + '::' + functionName + ']: ' + text;
			if (typeof type === 'undefined') {
				var type = 'info';
			}
			if (typeof console === 'object' && console !== null) {
				// If console is TYPO3.Backend.DebugConsole, write only error messages
				if (typeof console.addTab === 'function') {
					if (type === 'error') {
						console[type](str);
					}
				// IE may not have any console
				} else if (typeof console[type] !== 'undefined') {
					console[type](str);
				}
			}
		}
	};

	return Util.apply(HTMLArea, HtmlArea);

});

// Avoid re-initialization on AJax call when HTMLArea object was already initialized
}

HTMLArea.I18N = new Object();
HTMLArea.I18N = {"tooltips":{"bold":[{"source":"Bold","target":"Bold"}],"italic":[{"source":"Italic","target":"Italic"}],"underline":[{"source":"Underline","target":"Underline"}],"strikethrough":[{"source":"Strikethrough","target":"Strikethrough"}],"subscript":[{"source":"Subscript","target":"Subscript"}],"superscript":[{"source":"Superscript","target":"Superscript"}],"justifyleft":[{"source":"Justify Left","target":"Justify Left"}],"justifycenter":[{"source":"Justify Center","target":"Justify Center"}],"justifyright":[{"source":"Justify Right","target":"Justify Right"}],"justifyfull":[{"source":"Justify Full","target":"Justify Full"}],"insertorderedlist":[{"source":"Ordered List","target":"Ordered List"}],"insertunorderedlist":[{"source":"Bulleted List","target":"Bulleted List"}],"outdent":[{"source":"Decrease Indent","target":"Decrease Indent"}],"indent":[{"source":"Increase Indent","target":"Increase Indent"}],"forecolor":[{"source":"Font Color","target":"Font Color"}],"hilitecolor":[{"source":"Background Color","target":"Background Color"}],"inserthorizontalrule":[{"source":"Horizontal Rule","target":"Horizontal Rule"}],"createlink":[{"source":"Insert Web Link","target":"Insert Web Link"}],"unlink":[{"source":"Remove link","target":"Remove link"}],"insertimage":[{"source":"Insert\/Modify Image","target":"Insert\/Modify Image"}],"inserttable":[{"source":"Insert Table","target":"Insert Table"}],"htmlmode":[{"source":"Toggle HTML Source","target":"Toggle HTML Source"}],"popupeditor":[{"source":"Enlarge the editor","target":"Enlarge the editor"}],"about":[{"source":"About this editor","target":"About this editor"}],"showhelp":[{"source":"Help using editor","target":"Help using editor"}],"textindicator":[{"source":"Current style","target":"Current style"}],"undo":[{"source":"Undo the last action","target":"Undo the last action"}],"redo":[{"source":"Redo the last action","target":"Redo the last action"}],"cut":[{"source":"Cut selection","target":"Cut selection"}],"copy":[{"source":"Copy selection","target":"Copy selection"}],"paste":[{"source":"Paste from clipboard","target":"Paste from clipboard"}],"lefttoright":[{"source":"Direction left to right","target":"Direction left to right"}],"righttoleft":[{"source":"Direction right to left","target":"Direction right to left"}],"removeformat":[{"source":"Remove formatting","target":"Remove formatting"}],"print":[{"source":"Print document","target":"Print document"}],"killword":[{"source":"Clear MSOffice tags","target":"Clear MSOffice tags"}],"fontname":[{"source":"Font","target":"Font"}],"fontsize":[{"source":"Font size","target":"Font size"}],"formatblock":[{"source":"Type of paragragh","target":"Type of paragragh"}]},"msg":{"Path":[{"source":"Path","target":"Path"}],"TEXT_MODE":[{"source":"You are in TEXT MODE.  Use the [<>] button to switch back to WYSIWYG.","target":"You are in TEXT MODE.  Use the [<>] button to switch back to WYSIWYG."}],"ActiveX-required":[{"source":"Loading the editor in Internet Explorer requires the execution of ActiveX controls to be enabled.","target":"Loading the editor in Internet Explorer requires the execution of ActiveX controls to be enabled."}],"HTML-document-not-well-formed":[{"source":"The HTML document is not well-formed.","target":"The HTML document is not well-formed."}],"Moz-Clipboard":[{"source":"Unprivileged scripts cannot access Cut\/Copy\/Paste programatically for security reasons. Click YES to see a technical note at mozilla.org which shows you how to allow a script to access the clipboard.","target":"Unprivileged scripts cannot access Cut\/Copy\/Paste programatically for security reasons. Click YES to see a technical note at mozilla.org which shows you how to allow a script to access the clipboard."}],"Moz-Extension":[{"source":"For security reasons, unprivileged applications cannot access the clipboard. Click YES to install a component that will enable applications from this site to access the clipboard and perform copy, cut and paste operations.","target":"For security reasons, unprivileged applications cannot access the clipboard. Click YES to install a component that will enable applications from this site to access the clipboard and perform copy, cut and paste operations."}],"Moz-Extension-Success":[{"source":"The installation was successful. You need to exit and restart your browser for the change to take effect.","target":"The installation was successful. You need to exit and restart your browser for the change to take effect."}],"Moz-Extension-Failure":[{"source":"Sorry, Firefox Add-on AllowClipboard Helper could not be installed.","target":"Sorry, Firefox Add-on AllowClipboard Helper could not be installed."}],"Moz-Extension-Install-Not-Enabled":[{"source":"The installation cannot be performed. Please change your browser preferences in order to allow installation of sofware from this site.","target":"The installation cannot be performed. Please change your browser preferences in order to allow installation of sofware from this site."}],"Allow-Clipboard-Helper-Extension":[{"source":"For security reasons, unprivileged applications cannot access the clipboard. Click YES to install a component that will enable you to specify the sites or pages that will be allowed to access the clipboard and perform copy, cut and paste operations.","target":"For security reasons, unprivileged applications cannot access the clipboard. Click YES to install a component that will enable you to specify the sites or pages that will be allowed to access the clipboard and perform copy, cut and paste operations."}],"Mozilla-Org-Install-Not-Enabled":[{"source":"The installation cannot be performed. Please change your browser preferences in order to allow installation of sofware from https:\/\/addons.mozilla.org.","target":"The installation cannot be performed. Please change your browser preferences in order to allow installation of sofware from https:\/\/addons.mozilla.org."}],"Allow-Clipboard-Helper-Extension-Success":[{"source":"The installation was successful. You need to exit and restart your browser for the change to take effect. Afterwards, use the AllowClipboard Helper from the tools menu to allow specific sites to use the clipboard.","target":"The installation was successful. You need to exit and restart your browser for the change to take effect. Afterwards, use the AllowClipboard Helper from the tools menu to allow specific sites to use the clipboard."}]},"dialogs":{"OK":[{"source":"OK","target":"OK"}],"Cancel":[{"source":"Cancel","target":"Cancel"}],"Delete":[{"source":"Delete","target":"Delete"}],"Close":[{"source":"Close","target":"Close"}],"Not set":[{"source":"Not set","target":"Not set"}],"General":[{"source":"General","target":"General"}],"Alignment:":[{"source":"Text alignment:","target":"Text alignment:"}],"Alignment not set":[{"source":"Not set","target":"Not set"}],"Left":[{"source":"Left","target":"Left"}],"Center":[{"source":"Center","target":"Center"}],"Right":[{"source":"Right","target":"Right"}],"Texttop":[{"source":"Texttop","target":"Texttop"}],"Absmiddle":[{"source":"Absmiddle","target":"Absmiddle"}],"Baseline":[{"source":"Baseline","target":"Baseline"}],"Absbottom":[{"source":"Absbottom","target":"Absbottom"}],"Bottom":[{"source":"Bottom","target":"Bottom"}],"Middle":[{"source":"Middle","target":"Middle"}],"Top":[{"source":"Top","target":"Top"}],"Justify":[{"source":"Justify","target":"Justify"}],"Float:":[{"source":"Float:","target":"Float:"}],"Non-floating":[{"source":"Non-floating","target":"Non-floating"}],"Layout":[{"source":"Layout","target":"Layout"}],"Spacing and padding":[{"source":"Spacing and padding","target":"Spacing and padding"}],"Horizontal:":[{"source":"Horizontal:","target":"Horizontal:"}],"Horizontal padding":[{"source":"Horizontal padding","target":"Horizontal padding"}],"Vertical:":[{"source":"Vertical:","target":"Vertical:"}],"Vertical padding":[{"source":"Vertical padding","target":"Vertical padding"}],"Border":[{"source":"Border","target":"Border"}],"Border thickness:":[{"source":"Border thickness:","target":"Border thickness:"}],"Leave empty for no border":[{"source":"Leave empty for no border","target":"Leave empty for no border"}],"Insert\/Modify Link":[{"source":"Insert\/Modify Link","target":"Insert\/Modify Link"}],"Insert link":[{"source":"Insert link","target":"Insert link"}],"Modify link":[{"source":"Modify link","target":"Modify link"}],"URL:":[{"source":"URL:","target":"URL:"}],"link_href_tooltip":[{"source":"Enter the link URL here","target":"Enter the link URL here"}],"link_url_required":[{"source":"Please enter the URL where this link points to","target":"Please enter the URL where this link points to"}],"Title (tooltip):":[{"source":"Title:","target":"Title:"}],"link_title_tooltip":[{"source":"Enter the link tooltip here","target":"Enter the link tooltip here"}],"Target:":[{"source":"Target:","target":"Target:"}],"link_target_tooltip":[{"source":"Select the name of the target frame","target":"Select the name of the target frame"}],"target_none":[{"source":"None (use implicit)","target":"None (use implicit)"}],"target_blank":[{"source":"New window (_blank)","target":"New window (_blank)"}],"target_self":[{"source":"Same frame (_self)","target":"Same frame (_self)"}],"target_top":[{"source":"Top frame (_top)","target":"Top frame (_top)"}],"target_other":[{"source":"Other frame","target":"Other frame"}],"Insert Custom Element":[{"source":"Insert Custom Element","target":"Insert Custom Element"}],"Insert Table":[{"source":"Insert Table","target":"Insert Table"}],"Dimension":[{"source":"Dimension","target":"Dimension"}],"Rows:":[{"source":"Rows:","target":"Rows:"}],"Number of rows":[{"source":"Number of rows","target":"Number of rows"}],"You must enter a number of rows":[{"source":"You must enter a number of rows","target":"You must enter a number of rows"}],"Cols:":[{"source":"Cols:","target":"Cols:"}],"Number of columns":[{"source":"Number of columns","target":"Number of columns"}],"You must enter a number of columns":[{"source":"You must enter a number of columns","target":"You must enter a number of columns"}],"Width:":[{"source":"Width:","target":"Width:"}],"Width of the table":[{"source":"Width of the table","target":"Width of the table"}],"Percent":[{"source":"Percent","target":"Percent"}],"Pixels":[{"source":"Pixels","target":"Pixels"}],"Em":[{"source":"Em","target":"Em"}],"Width unit":[{"source":"Width unit","target":"Width unit"}],"Text alignment":[{"source":"Text alignment","target":"Text alignment"}],"Where the table should float":[{"source":"Specifies where the table should float","target":"Specifies where the table should float"}],"Cell spacing:":[{"source":"Cell spacing:","target":"Cell spacing:"}],"Space between adjacent cells":[{"source":"Space between adjacent cells","target":"Space between adjacent cells"}],"Cell padding:":[{"source":"Cell padding:","target":"Cell padding:"}],"Space between content and border in cell":[{"source":"Space between content and border in cell","target":"Space between content and border in cell"}],"Insert Image":[{"source":"Insert\/Modify Image","target":"Insert\/Modify Image"}],"Insert image":[{"source":"Insert image","target":"Insert image"}],"Modify image":[{"source":"Modify image","target":"Modify image"}],"Image URL:":[{"source":"Image URL:","target":"Image URL:"}],"Enter the image URL here":[{"source":"Enter the image URL here","target":"Enter the image URL here"}],"Preview":[{"source":"Preview","target":"Preview"}],"Preview the image in a new window":[{"source":"Preview the image in a new window","target":"Preview the image in a new window"}],"Alternate text:":[{"source":"Alternate text:","target":"Alternate text:"}],"For browsers that dont support images":[{"source":"For browsers that don't support images","target":"For browsers that don't support images"}],"Where the image should float":[{"source":"Specifies where the image should float","target":"Specifies where the image should float"}],"Image alignment:":[{"source":"Image alignment:","target":"Image alignment:"}],"Positioning of this image":[{"source":"Positioning of this image relative to text","target":"Positioning of this image relative to text"}],"Image Preview":[{"source":"Image Preview","target":"Image Preview"}],"image_url_first":[{"source":"You have to enter the image URL first","target":"You have to enter the image URL first"}],"image_url_required":[{"source":"You must enter the image URL","target":"You must enter the image URL"}],"Select Color":[{"source":"Select Color","target":"Select Color"}],"Insert\/Modify Acronym":[{"source":"Insert\/Modify Acronym or Abbreviation","target":"Insert\/Modify Acronym or Abbreviation"}],"About HTMLArea":[{"source":"About htmlArea RTE","target":"About htmlArea RTE"}],"About":[{"source":"About","target":"About"}],"free_editor":[{"source":"A free and open-source editor for <textarea> fields, featuring integration with TYPO3.","target":"A free and open-source editor for <textarea> fields, featuring integration with TYPO3."}],"Browser support":[{"source":"Browser support","target":"Browser support"}],"Mozilla_or_IE":[{"source":"For Firefox 1.5+, SeaMonkey 1.0+, Safari 3.0.4+, Google Chrome 1.0+ and Opera 9.62+ on any platform, and for Internet Explorer 9.0+ on Windows.","target":"For Firefox 1.5+, SeaMonkey 1.0+, Safari 3.0.4+, Google Chrome 1.0+ and Opera 9.62+ on any platform, and for Internet Explorer 9.0+ on Windows."}],"product_documentation":[{"source":"For more information, please visit:","target":"For more information, please visit:"}],"All rights reserved.":[{"source":"All Rights Reserved.","target":"All Rights Reserved."}],"License":[{"source":"License","target":"License"}],"htmlArea License (based on BSD license)":[{"source":"htmlArea RTE License, based on BSD License","target":"htmlArea RTE License, based on BSD License"}],"Plugins":[{"source":"Plugins","target":"Plugins"}],"Name":[{"source":"Name","target":"Name"}],"Developer":[{"source":"Developer","target":"Developer"}],"Sponsored by":[{"source":"Sponsored by","target":"Sponsored by"}],"The following plugins have been loaded.":[{"source":"The following plugins have been loaded.","target":"The following plugins have been loaded."}],"No plugins have been loaded.":[{"source":"No plugins have been loaded.","target":"No plugins have been loaded."}],"User agent reports:":[{"source":"User agent reports:","target":"User agent reports:"}],"style":[{"source":"Paragraph:","target":"Paragraph:"}],"Block style label":[{"source":"Block style:","target":"Block style:"}],"text_style":[{"source":"Text style:","target":"Text style:"}],"LeftToRight":[{"source":"Left to right","target":"Left to right"}],"RightToLeft":[{"source":"Right to left","target":"Right to left"}],"Language":[{"source":"Language","target":"Language"}],"Text direction":[{"source":"Text direction","target":"Text direction"}],"Language:":[{"source":"Language:","target":"Language:"}],"Text direction:":[{"source":"Text direction:","target":"Text direction:"}],"No language mark":[{"source":"No language","target":"No language"}],"Remove language mark":[{"source":"Remove language","target":"Remove language"}],"statusBarStyle":[{"source":"Style","target":"Style"}],"statusBarReady":[{"source":"Ready","target":"Ready"}],"word":[{"source":"word","target":"word"}],"words":[{"source":"words","target":"words"}]}};

HTMLArea.I18N["EditorMode"] = new Object();
HTMLArea.I18N["EditorMode"] = {"TextMode-Tooltip":[{"source":"Toggle text mode","target":"Toggle text mode"}],"HTMLMode-Tooltip":[{"source":"Toggle HTML mode","target":"Toggle HTML mode"}]};

HTMLArea.I18N["DefaultInline"] = new Object();
HTMLArea.I18N["DefaultInline"] = {"Bold-Tooltip":[{"source":"Bold","target":"Bold"}],"Italic-Tooltip":[{"source":"Italic","target":"Italic"}],"StrikeThrough-Tooltip":[{"source":"Strike-through","target":"Strike-through"}],"Subscript-Tooltip":[{"source":"Subscript","target":"Subscript"}],"Superscript-Tooltip":[{"source":"Superscript","target":"Superscript"}],"Underline-Tooltip":[{"source":"Underline","target":"Underline"}]};

HTMLArea.I18N["BlockElements"] = new Object();
HTMLArea.I18N["BlockElements"] = {"Indent-Tooltip":[{"source":"Increase indent","target":"Increase indent"}],"Indent-helpText":[{"source":"Increases text indentation","target":"Increases text indentation"}],"Outdent-Tooltip":[{"source":"Reduce indent","target":"Reduce indent"}],"Outdent-helpText":[{"source":"Reduces text indentation","target":"Reduces text indentation"}],"Blockquote-Tooltip":[{"source":"Large quotation","target":"Large quotation"}],"Blockquote-helpText":[{"source":"Makes a large quotation block","target":"Makes a large quotation block"}],"FormatBlock-Tooltip":[{"source":"Type of block","target":"Type of block"}],"InsertParagraphBefore-Tooltip":[{"source":"Insert a paragraph before the current block","target":"Insert a paragraph before the current block"}],"InsertParagraphBefore-contextMenuTitle":[{"source":"Insert paragraph before","target":"Insert paragraph before"}],"InsertParagraphBefore-helpText":[{"source":"Inserts a paragraph before the current block","target":"Inserts a paragraph before the current block"}],"InsertParagraphAfter-Tooltip":[{"source":"Insert a paragraph after the current block","target":"Insert a paragraph after the current block"}],"InsertParagraphAfter-contextMenuTitle":[{"source":"Insert paragraph after","target":"Insert paragraph after"}],"InsertParagraphAfter-helpText":[{"source":"Inserts a paragraph after the current block","target":"Inserts a paragraph after the current block"}],"JustifyLeft-Tooltip":[{"source":"Justify left","target":"Justify left"}],"JustifyLeft-helpText":[{"source":"Aligns the text to the left","target":"Aligns the text to the left"}],"JustifyCenter-Tooltip":[{"source":"Center","target":"Center"}],"JustifyCenter-helpText":[{"source":"Centers the text","target":"Centers the text"}],"JustifyRight-Tooltip":[{"source":"Justify right","target":"Justify right"}],"JustifyRight-helpText":[{"source":"Aligns the text to the right","target":"Aligns the text to the right"}],"JustifyFull-Tooltip":[{"source":"Justify left and right","target":"Justify left and right"}],"JustifyFull-helpText":[{"source":"Aligns the text both to the left and the right","target":"Aligns the text both to the left and the right"}],"Left-Tooltip":[{"source":"Left","target":"Left"}],"InsertOrderedList-Tooltip":[{"source":"Ordered List","target":"Ordered List"}],"InsertOrderedList-helpText":[{"source":"Makes an ordered list from the current selection","target":"Makes an ordered list from the current selection"}],"InsertUnorderedList-Tooltip":[{"source":"Bulleted List","target":"Bulleted List"}],"InsertUnorderedList-helpText":[{"source":"Makes a bulleted list from the current selection","target":"Makes a bulleted list from the current selection"}],"InsertHorizontalRule-Tooltip":[{"source":"Horizontal Rule","target":"Horizontal Rule"}],"InsertHorizontalRule-helpText":[{"source":"Inserts an horizontal rule","target":"Inserts an horizontal rule"}],"No block":[{"source":"No block format","target":"No block format"}],"Remove block":[{"source":"Remove block format","target":"Remove block format"}],"Technische Universitat Ilmenau":[{"source":"Technische Universit\u00e4t Ilmenau","target":"Technische Universit\u00e4t Ilmenau"}]};

HTMLArea.I18N["BlockStyle"] = new Object();
HTMLArea.I18N["BlockStyle"] = {"No style":[{"source":"No block style","target":"No block style"}],"Remove style":[{"source":"Remove block style","target":"Remove block style"}],"Unknown style":[{"source":"Unknown block style","target":"Unknown block style"}],"Element style":[{"source":"Block element style","target":"Block element style"}],"BlockStyle-Tooltip":[{"source":"Apply style to the containing block","target":"Apply style to the containing block"}],"frame-frame1":[{"source":"Frame with grey background","target":"Frame with grey background"}],"frame-frame2":[{"source":"Frame with yellow background","target":"Frame with yellow background"}],"important":[{"source":"Important","target":"Important"}],"name-of-person":[{"source":"Name of person","target":"Name of person"}],"detail":[{"source":"Detail","target":"Detail"}],"component-items":[{"source":"Component items","target":"Component items"}],"action-items":[{"source":"Action items","target":"Action items"}],"Technische Universitat Ilmenau":[{"source":"Technische Universit\u00e4t Ilmenau","target":"Technische Universit\u00e4t Ilmenau"}]};

HTMLArea.I18N["CharacterMap"] = new Object();
HTMLArea.I18N["CharacterMap"] = {"CharacterMapTooltip":[{"source":"Insert special character","target":"Insert special character"}],"InsertCharacter-Tooltip":[{"source":"Insert special character","target":"Insert special character"}],"Insert special character":[{"source":"Insert special character","target":"Insert special character"}],"InsertSoftHyphen-Tooltip":[{"source":"Insert soft hyphen","target":"Insert soft hyphen"}],"general":[{"source":"General","target":"General"}],"mathematical":[{"source":"Mathematical","target":"Mathematical"}],"graphical":[{"source":"Shapes and arrows","target":"Shapes and arrows"}],"HTML value:":[{"source":"HTML value:","target":"HTML value:"}],"Close":[{"source":"Close","target":"Close"}],"nbsp":[{"source":"Non-breaking space","target":"Non-breaking space"}],"Agrave":[{"source":"Capital a with grave accent","target":"Capital a with grave accent"}],"agrave":[{"source":"Small a with grave accent","target":"Small a with grave accent"}],"Aacute":[{"source":"Capital a with acute accent","target":"Capital a with acute accent"}],"aacute":[{"source":"Small a with acute accent","target":"Small a with acute accent"}],"Acirc":[{"source":"Capital a with circumflex accent","target":"Capital a with circumflex accent"}],"acirc":[{"source":"Small a with circumflex accent","target":"Small a with circumflex accent"}],"Atilde":[{"source":"Capital a with tilde","target":"Capital a with tilde"}],"atilde":[{"source":"Small a with tilde","target":"Small a with tilde"}],"Auml":[{"source":"Capital a with umlaut\/diaeresis","target":"Capital a with umlaut\/diaeresis"}],"auml":[{"source":"Small a with umlaut\/diaeresis","target":"Small a with umlaut\/diaeresis"}],"Aring":[{"source":"Capital a with ring","target":"Capital a with ring"}],"aring":[{"source":"Small a with ring","target":"Small a with ring"}],"AElig":[{"source":"Capital ligature ae","target":"Capital ligature ae"}],"aelig":[{"source":"Small ligature ae","target":"Small ligature ae"}],"ordf":[{"source":"Feminine ordinal indicator","target":"Feminine ordinal indicator"}],"Ccedil":[{"source":"Capital c with cedilla","target":"Capital c with cedilla"}],"ccedil":[{"source":"Small c with cedilla","target":"Small c with cedilla"}],"ETH":[{"source":"Capital eth, Icelandic","target":"Capital eth, Icelandic"}],"eth":[{"source":"Small eth, Icelandic","target":"Small eth, Icelandic"}],"Egrave":[{"source":"Capital e with grave accent","target":"Capital e with grave accent"}],"egrave":[{"source":"Small e with grave accent","target":"Small e with grave accent"}],"Eacute":[{"source":"Capital e with acute accent","target":"Capital e with acute accent"}],"eacute":[{"source":"Small e with acute accent","target":"Small e with acute accent"}],"Ecirc":[{"source":"Capital e with circumflex accent","target":"Capital e with circumflex accent"}],"ecirc":[{"source":"Small e with circumflex accent","target":"Small e with circumflex accent"}],"Euml":[{"source":"Capital e with umlaut\/diaeresis","target":"Capital e with umlaut\/diaeresis"}],"euml":[{"source":"Small e with umlaut\/diaeresis","target":"Small e with umlaut\/diaeresis"}],"Igrave":[{"source":"Capital i with grave accent","target":"Capital i with grave accent"}],"igrave":[{"source":"Small i with grave accent","target":"Small i with grave accent"}],"Iacute":[{"source":"Capital i with acute accent","target":"Capital i with acute accent"}],"iacute":[{"source":"Small i with acute accent","target":"Small i with acute accent"}],"Icirc":[{"source":"Capital i with circumflex accent","target":"Capital i with circumflex accent"}],"icirc":[{"source":"Small i with circumflex accent","target":"Small i with circumflex accent"}],"Iuml":[{"source":"Capital i with umlaut\/diaeresis","target":"Capital i with umlaut\/diaeresis"}],"iuml":[{"source":"Small i with umlaut\/diaeresis","target":"Small i with umlaut\/diaeresis"}],"Ntilde":[{"source":"Capital n with tilde","target":"Capital n with tilde"}],"ntilde":[{"source":"Small n with tilde","target":"Small n with tilde"}],"Ograve":[{"source":"Capital o with grave accent","target":"Capital o with grave accent"}],"ograve":[{"source":"Small o with grave accent","target":"Small o with grave accent"}],"Oacute":[{"source":"Capital o with acute accent","target":"Capital o with acute accent"}],"oacute":[{"source":"Small o with acute accent","target":"Small o with acute accent"}],"Ocirc":[{"source":"Capital o with circumflex accent","target":"Capital o with circumflex accent"}],"ocirc":[{"source":"Small o with circumflex accent","target":"Small o with circumflex accent"}],"Otilde":[{"source":"Capital o with tilde","target":"Capital o with tilde"}],"otilde":[{"source":"Small o with tilde","target":"Small o with tilde"}],"Ouml":[{"source":"Capital o with umlaut\/diaeresis","target":"Capital o with umlaut\/diaeresis"}],"ouml":[{"source":"Small o with umlaut\/diaeresis","target":"Small o with umlaut\/diaeresis"}],"Oslash":[{"source":"Capital o with slash","target":"Capital o with slash"}],"oslash":[{"source":"Small o with slash","target":"Small o with slash"}],"OElig":[{"source":"Capital ligature OE","target":"Capital ligature OE"}],"oelig":[{"source":"Small ligature OE","target":"Small ligature OE"}],"ordm":[{"source":"Masculine ordinal indicator","target":"Masculine ordinal indicator"}],"Scaron":[{"source":"Capital s with caron","target":"Capital s with caron"}],"scaron":[{"source":"Small s with caron","target":"Small s with caron"}],"szlig":[{"source":"Small sharp s, German","target":"Small sharp s, German"}],"THORN":[{"source":"Capital THORN, Icelandic","target":"Capital THORN, Icelandic"}],"thorn":[{"source":"Small thorn, Icelandic","target":"Small thorn, Icelandic"}],"Ugrave":[{"source":"Capital u with grave accent","target":"Capital u with grave accent"}],"ugrave":[{"source":"Small u with grave accent","target":"Small u with grave accent"}],"Uacute":[{"source":"Capital u with acute accent","target":"Capital u with acute accent"}],"uacute":[{"source":"Small u with acute accent","target":"Small u with acute accent"}],"Ucirc":[{"source":"Capital u with circumflex accent","target":"Capital u with circumflex accent"}],"ucirc":[{"source":"Small u with circumflex accent","target":"Small u with circumflex accent"}],"Uuml":[{"source":"Capital u with umlaut\/diaeresis","target":"Capital u with umlaut\/diaeresis"}],"uuml":[{"source":"Small u with umlaut\/diaeresis","target":"Small u with umlaut\/diaeresis"}],"Yacute":[{"source":"Capital y with acute accent","target":"Capital y with acute accent"}],"yacute":[{"source":"Small y with acute accent","target":"Small y with acute accent"}],"Yuml":[{"source":"Capital y with umlaut\/diaeresis","target":"Capital y with umlaut\/diaeresis"}],"yuml":[{"source":"Small y with umlaut\/diaeresis","target":"Small y with umlaut\/diaeresis"}],"acute":[{"source":"Spacing acute","target":"Spacing acute"}],"circ":[{"source":"Modifier letter circumflex accent","target":"Modifier letter circumflex accent"}],"tilde":[{"source":"Small tilde","target":"Small tilde"}],"uml":[{"source":"Spacing diaeresis","target":"Spacing diaeresis"}],"cedil":[{"source":"Spacing cedilla","target":"Spacing cedilla"}],"shy":[{"source":"Soft hyphen","target":"Soft hyphen"}],"ndash":[{"source":"En dash","target":"En dash"}],"mdash":[{"source":"Em dash","target":"Em dash"}],"lsquo":[{"source":"Left single quotation mark","target":"Left single quotation mark"}],"rsquo":[{"source":"Right single quotation mark","target":"Right single quotation mark"}],"sbquo":[{"source":"Single low-9 quotation mark","target":"Single low-9 quotation mark"}],"ldquo":[{"source":"Left double quotation mark","target":"Left double quotation mark"}],"rdquo":[{"source":"Right double quotation mark","target":"Right double quotation mark"}],"bdquo":[{"source":"Double low-9 quotation mark","target":"Double low-9 quotation mark"}],"lsaquo":[{"source":"Single left angle quotation","target":"Single left angle quotation"}],"rsaquo":[{"source":"Single right angle quotation","target":"Single right angle quotation"}],"laquo":[{"source":"Left angle quotation mark","target":"Left angle quotation mark"}],"raquo":[{"source":"Right angle quotation mark","target":"Right angle quotation mark"}],"quot":[{"source":"Quotation mark","target":"Quotation mark"}],"hellip":[{"source":"Horizontal ellipsis","target":"Horizontal ellipsis"}],"iquest":[{"source":"Inverted question mark","target":"Inverted question mark"}],"iexcl":[{"source":"Inverted exclamation mark","target":"Inverted exclamation mark"}],"bull":[{"source":"Bullet","target":"Bullet"}],"dagger":[{"source":"Dagger","target":"Dagger"}],"Dagger":[{"source":"Double dagger","target":"Double dagger"}],"brvbar":[{"source":"Broken vertical bar","target":"Broken vertical bar"}],"para":[{"source":"Paragraph","target":"Paragraph"}],"sect":[{"source":"Section","target":"Section"}],"loz":[{"source":"Lozenge","target":"Lozenge"}],"#064":[{"source":"At","target":"At"}],"copy":[{"source":"Copyright","target":"Copyright"}],"reg":[{"source":"Registered trademark","target":"Registered trademark"}],"trade":[{"source":"Trademark","target":"Trademark"}],"curren":[{"source":"Currency","target":"Currency"}],"cent":[{"source":"Cent","target":"Cent"}],"euro":[{"source":"Euro","target":"Euro"}],"pound":[{"source":"Pound","target":"Pound"}],"yen":[{"source":"Yen","target":"Yen"}],"emsp":[{"source":"Em space","target":"Em space"}],"ensp":[{"source":"En space","target":"En space"}],"thinsp":[{"source":"Thin space","target":"Thin space"}],"zwj":[{"source":"Zero width joiner","target":"Zero width joiner"}],"zwnj":[{"source":"Zero width non-joiner","target":"Zero width non-joiner"}],"minus":[{"source":"Minus sign","target":"Minus sign"}],"plusmn":[{"source":"Plus-or-minus sign","target":"Plus-or-minus sign"}],"times":[{"source":"Multiplication","target":"Multiplication"}],"divide":[{"source":"Division","target":"Division"}],"radic":[{"source":"Square root","target":"Square root"}],"sdot":[{"source":"Dot operator","target":"Dot operator"}],"otimes":[{"source":"Vector product","target":"Vector product"}],"lowast":[{"source":"Asterisk operator","target":"Asterisk operator"}],"ge":[{"source":"Greater than or equal to","target":"Greater than or equal to"}],"le":[{"source":"Less than or equal to","target":"Less than or equal to"}],"ne":[{"source":"Not equal to","target":"Not equal to"}],"asymp":[{"source":"Almost equal to, asymptotic to","target":"Almost equal to, asymptotic to"}],"sim":[{"source":"Varies with, similar to","target":"Varies with, similar to"}],"prop":[{"source":"Proportional to","target":"Proportional to"}],"deg":[{"source":"Degree","target":"Degree"}],"prime":[{"source":"Prime, minutes, feet","target":"Prime, minutes, feet"}],"Prime":[{"source":"Double prime, seconds, inches","target":"Double prime, seconds, inches"}],"micro":[{"source":"Micro","target":"Micro"}],"ang":[{"source":"Angle","target":"Angle"}],"perp":[{"source":"Orthogonal to, perpendicular to","target":"Orthogonal to, perpendicular to"}],"permil":[{"source":"Per mille","target":"Per mille"}],"frasl":[{"source":"Fraction slash","target":"Fraction slash"}],"frac14":[{"source":"Fraction 1\/4","target":"Fraction 1\/4"}],"frac12":[{"source":"Fraction 1\/2","target":"Fraction 1\/2"}],"frac34":[{"source":"Fraction 3\/4","target":"Fraction 3\/4"}],"sup1":[{"source":"Superscript 1","target":"Superscript 1"}],"sup2":[{"source":"Superscript 2","target":"Superscript 2"}],"sup3":[{"source":"Superscript 3","target":"Superscript 3"}],"not":[{"source":"Negation","target":"Negation"}],"and":[{"source":"Logical and","target":"Logical and"}],"or":[{"source":"Logical or","target":"Logical or"}],"there4":[{"source":"Therefore","target":"Therefore"}],"cong":[{"source":"Congruent to","target":"Congruent to"}],"isin":[{"source":"Is element of","target":"Is element of"}],"ni":[{"source":"Contains as member","target":"Contains as member"}],"notin":[{"source":"Is not an element of","target":"Is not an element of"}],"sub":[{"source":"Proper subset of","target":"Proper subset of"}],"sube":[{"source":"Subset of or equal to","target":"Subset of or equal to"}],"nsub":[{"source":"Not subset of","target":"Not subset of"}],"sup":[{"source":"Proper superset of","target":"Proper superset of"}],"supe":[{"source":"Superset of or equal to","target":"Superset of or equal to"}],"cap":[{"source":"Intersection","target":"Intersection"}],"cup":[{"source":"Union","target":"Union"}],"oplus":[{"source":"Direct sum","target":"Direct sum"}],"nabla":[{"source":"Gradient","target":"Gradient"}],"empty":[{"source":"Empty set","target":"Empty set"}],"equiv":[{"source":"Equivalent","target":"Equivalent"}],"sum":[{"source":"Sum","target":"Sum"}],"prod":[{"source":"Product","target":"Product"}],"weierp":[{"source":"Power set (Weierstrass p)","target":"Power set (Weierstrass p)"}],"exist":[{"source":"There exists","target":"There exists"}],"forall":[{"source":"For all","target":"For all"}],"infin":[{"source":"Infinity","target":"Infinity"}],"alefsym":[{"source":"Alef (first transfinite cardinal)","target":"Alef (first transfinite cardinal)"}],"real":[{"source":"Real part of complex number","target":"Real part of complex number"}],"image":[{"source":"Imaginary part of complex number","target":"Imaginary part of complex number"}],"fnof":[{"source":"Function","target":"Function"}],"int":[{"source":"Integral","target":"Integral"}],"part":[{"source":"Partial differential","target":"Partial differential"}],"Alpha":[{"source":"Greek capital letter alpha","target":"Greek capital letter alpha"}],"alpha":[{"source":"Greek small letter alpha","target":"Greek small letter alpha"}],"Beta":[{"source":"Greek capital letter beta","target":"Greek capital letter beta"}],"beta":[{"source":"Greek small letter beta","target":"Greek small letter beta"}],"Gamma":[{"source":"Greek capital letter gamma","target":"Greek capital letter gamma"}],"gamma":[{"source":"Greek small letter gamma","target":"Greek small letter gamma"}],"Delta":[{"source":"Greek capital letter delta","target":"Greek capital letter delta"}],"delta":[{"source":"Greek small letter delta","target":"Greek small letter delta"}],"Epsilon":[{"source":"Greek capital letter epsilon","target":"Greek capital letter epsilon"}],"epsilon":[{"source":"Greek small letter epsilon","target":"Greek small letter epsilon"}],"Zeta":[{"source":"Greek capital letter zeta","target":"Greek capital letter zeta"}],"zeta":[{"source":"Greek small letter zeta","target":"Greek small letter zeta"}],"Eta":[{"source":"Greek capital letter eta","target":"Greek capital letter eta"}],"eta":[{"source":"Greek small letter eta","target":"Greek small letter eta"}],"Theta":[{"source":"Greek capital letter theta","target":"Greek capital letter theta"}],"theta":[{"source":"Greek small letter theta","target":"Greek small letter theta"}],"thetasym":[{"source":"Greek small letter theta symbol","target":"Greek small letter theta symbol"}],"Iota":[{"source":"Greek capital letter iota","target":"Greek capital letter iota"}],"iota":[{"source":"Greek small letter iota","target":"Greek small letter iota"}],"Kappa":[{"source":"Greek capital letter kappa","target":"Greek capital letter kappa"}],"kappa":[{"source":"Greek small letter kappa","target":"Greek small letter kappa"}],"Lambda":[{"source":"Greek capital letter lambda","target":"Greek capital letter lambda"}],"lambda":[{"source":"Greek small letter lambda","target":"Greek small letter lambda"}],"Mu":[{"source":"Greek capital letter mu","target":"Greek capital letter mu"}],"mu":[{"source":"Greek small letter mu","target":"Greek small letter mu"}],"Nu":[{"source":"Greek capital letter nu","target":"Greek capital letter nu"}],"nu":[{"source":"Greek small letter nu","target":"Greek small letter nu"}],"Xi":[{"source":"Greek capital letter xi","target":"Greek capital letter xi"}],"xi":[{"source":"Greek small letter xi","target":"Greek small letter xi"}],"Omicron":[{"source":"Greek capital letter omicron","target":"Greek capital letter omicron"}],"omicron":[{"source":"Greek small letter omicron","target":"Greek small letter omicron"}],"Pi":[{"source":"Greek capital letter pi","target":"Greek capital letter pi"}],"pi":[{"source":"Greek small letter pi","target":"Greek small letter pi"}],"piv":[{"source":"Greek pi symbol","target":"Greek pi symbol"}],"Rho":[{"source":"Greek capital letter rho","target":"Greek capital letter rho"}],"rho":[{"source":"Greek small letter rho","target":"Greek small letter rho"}],"Sigma":[{"source":"Greek capital letter sigma","target":"Greek capital letter sigma"}],"sigma":[{"source":"Greek small letter sigma","target":"Greek small letter sigma"}],"sigmaf":[{"source":"Greek small letter final sigma","target":"Greek small letter final sigma"}],"Tau":[{"source":"Greek capital letter tau","target":"Greek capital letter tau"}],"tau":[{"source":"Greek small letter tau","target":"Greek small letter tau"}],"Upsilon":[{"source":"Greek capital letter upsilon","target":"Greek capital letter upsilon"}],"upsih":[{"source":"Greek upsilon with hook symbol","target":"Greek upsilon with hook symbol"}],"upsilon":[{"source":"Greek small letter upsilon","target":"Greek small letter upsilon"}],"Phi":[{"source":"Greek capital letter phi","target":"Greek capital letter phi"}],"phi":[{"source":"Greek small letter phi","target":"Greek small letter phi"}],"Chi":[{"source":"Greek capital letter chi","target":"Greek capital letter chi"}],"chi":[{"source":"Greek small letter chi","target":"Greek small letter chi"}],"Psi":[{"source":"Greek capital letter psi","target":"Greek capital letter psi"}],"psi":[{"source":"Greek small letter psi","target":"Greek small letter psi"}],"Omega":[{"source":"Greek capital letter omega","target":"Greek capital letter omega"}],"omega":[{"source":"Greek small letter omega","target":"Greek small letter omega"}],"crarr":[{"source":"Carriage return arrow","target":"Carriage return arrow"}],"uarr":[{"source":"Upwards arrow","target":"Upwards arrow"}],"darr":[{"source":"Downwards arrow","target":"Downwards arrow"}],"larr":[{"source":"Leftwards arrow","target":"Leftwards arrow"}],"rarr":[{"source":"Rightwards arrow","target":"Rightwards arrow"}],"harr":[{"source":"Left right arrow","target":"Left right arrow"}],"uArr":[{"source":"Upwards double arrow","target":"Upwards double arrow"}],"dArr":[{"source":"Downwards double arrow","target":"Downwards double arrow"}],"lArr":[{"source":"Leftwards double arrow","target":"Leftwards double arrow"}],"rArr":[{"source":"Rightwards double arrow","target":"Rightwards double arrow"}],"hArr":[{"source":"Left right double arrow","target":"Left right double arrow"}],"clubs":[{"source":"Club","target":"Club"}],"diams":[{"source":"Diamond","target":"Diamond"}],"hearts":[{"source":"Heart","target":"Heart"}],"spades":[{"source":"Spade","target":"Spade"}]};

HTMLArea.I18N["TextStyle"] = new Object();
HTMLArea.I18N["TextStyle"] = {"TextStyle-Tooltip":[{"source":"Apply style to the selected text","target":"Apply style to the selected text"}],"Technische Universitat Ilmenau":[{"source":"Technische Universit\u00e4t Ilmenau","target":"Technische Universit\u00e4t Ilmenau"}],"No style":[{"source":"No text style","target":"No text style"}],"Remove style":[{"source":"Remove text style","target":"Remove text style"}],"Unknown style":[{"source":"Unknown text style","target":"Unknown text style"}],"Element style":[{"source":"Inline element style","target":"Inline element style"}]};

HTMLArea.I18N["TYPO3Link"] = new Object();
HTMLArea.I18N["TYPO3Link"] = [];

HTMLArea.I18N["TextIndicator"] = new Object();
HTMLArea.I18N["TextIndicator"] = [];

HTMLArea.I18N["FindReplace"] = new Object();
HTMLArea.I18N["FindReplace"] = {"Substitute this occurrence?":[{"source":"Substitute this occurrence?","target":"Substitute this occurrence?"}],"Enter the text you want to find":[{"source":"Enter the text you want to find","target":"Enter the text you want to find"}],"Inform a replacement word":[{"source":"This will erase all occurrences.","target":"This will erase all occurrences."}],"found items":[{"source":"found items","target":"found items"}],"replaced items":[{"source":"replaced items","target":"replaced items"}],"found item":[{"source":"item found","target":"item found"}],"replaced item":[{"source":"item replaced","target":"item replaced"}],"not found":[{"source":"not found","target":"not found"}],"Find and Replace":[{"source":"Find And Replace","target":"Find And Replace"}],"Options":[{"source":"Options","target":"Options"}],"Whole words only":[{"source":"Whole words only","target":"Whole words only"}],"Case sensitive search":[{"source":"Case sensitive search","target":"Case sensitive search"}],"Substitute all occurrences":[{"source":"Substitute all occurrences","target":"Substitute all occurrences"}],"Search for:":[{"source":"Search for:","target":"Search for:"}],"Replace with:":[{"source":"Replace with:","target":"Replace with:"}],"Actions":[{"source":"Actions","target":"Actions"}],"Clear":[{"source":"Clear","target":"Clear"}],"Highlight":[{"source":"Highlight","target":"Highlight"}],"Undo":[{"source":"Undo","target":"Undo"}],"Next":[{"source":"Next","target":"Next"}],"Done":[{"source":"Done","target":"Done"}]};

HTMLArea.I18N["RemoveFormat"] = new Object();
HTMLArea.I18N["RemoveFormat"] = {"RemoveFormatTooltip":[{"source":"Remove format","target":"Remove format"}],"Cleaning Area":[{"source":"Cleaning Area","target":"Cleaning Area"}],"Selection":[{"source":"Selected text","target":"Selected text"}],"All":[{"source":"All","target":"All"}],"Remove formatting":[{"source":"Remove format","target":"Remove format"}],"Cleaning options":[{"source":"Type(s) of format to remove","target":"Type(s) of format to remove"}],"Formatting:":[{"source":"HTML Format:","target":"HTML Format:"}],"MS Word Formatting:":[{"source":"MS Word Format:","target":"MS Word Format:"}],"Typographical punctuation:":[{"source":"Typographical punctuation:","target":"Typographical punctuation:"}],"Spaces":[{"source":"Non-breaking spaces:","target":"Non-breaking spaces:"}],"Images:":[{"source":"Images:","target":"Images:"}],"All HTML:":[{"source":"All HTML tags:","target":"All HTML tags:"}],"Select the type of formatting you wish to remove.":[{"source":"Select the type(s) of format to remove.","target":"Select the type(s) of format to remove."}],"OK":[{"source":"OK","target":"OK"}],"Cancel":[{"source":"Cancel","target":"Cancel"}]};

HTMLArea.I18N["DefaultClean"] = new Object();
HTMLArea.I18N["DefaultClean"] = {"CleanWord-Tooltip":[{"source":"Clean up HTML content","target":"Clean up HTML content"}]};

HTMLArea.I18N["TableOperations"] = new Object();
HTMLArea.I18N["TableOperations"] = {"Not set":[{"source":"Not set","target":"Not set"}],"None":[{"source":"None","target":"None"}],"Size and Headers":[{"source":"Size and Headers","target":"Size and Headers"}],"Headers":[{"source":"Headers","target":"Headers"}],"CSS Style":[{"source":"Style","target":"Style"}],"Class:":[{"source":"Classes:","target":"Classes:"}],"Class selector":[{"source":"Classes","target":"Classes"}],"Table class:":[{"source":"Table:","target":"Table:"}],"Table class selector":[{"source":"Classes of the table","target":"Classes of the table"}],"Table body class:":[{"source":"Body:","target":"Body:"}],"Table body class selector":[{"source":"Classes of the table body","target":"Classes of the table body"}],"Table header class:":[{"source":"Header:","target":"Header:"}],"Table header class selector":[{"source":"Classes of the table header","target":"Classes of the table header"}],"Table footer class:":[{"source":"Footer:","target":"Footer:"}],"Table footer class selector":[{"source":"Classes of the table footer","target":"Classes of the table footer"}],"Default":[{"source":"Default","target":"Default"}],"Undefined":[{"source":"Undefined","target":"Undefined"}],"Alignment":[{"source":"Alignment","target":"Alignment"}],"All four sides":[{"source":"All four sides","target":"All four sides"}],"Background and colors":[{"source":"Background and colors","target":"Background and colors"}],"Background:":[{"source":"Background:","target":"Background:"}],"Baseline":[{"source":"Baseline","target":"Baseline"}],"Border style":[{"source":"Border style","target":"Border style"}],"Border style:":[{"source":"Border style:","target":"Border style:"}],"No border":[{"source":"None","target":"None"}],"Dotted":[{"source":"Dotted","target":"Dotted"}],"Dashed":[{"source":"Dashed","target":"Dashed"}],"Solid":[{"source":"Solid","target":"Solid"}],"Double":[{"source":"Double","target":"Double"}],"Groove":[{"source":"Groove","target":"Groove"}],"Ridge":[{"source":"Ridge","target":"Ridge"}],"Inset":[{"source":"Inset","target":"Inset"}],"Outset":[{"source":"Outset","target":"Outset"}],"Borders":[{"source":"Borders","target":"Borders"}],"Bottom":[{"source":"Bottom","target":"Bottom"}],"Border width":[{"source":"Border width in pixels","target":"Border width in pixels"}],"Border width:":[{"source":"Border width:","target":"Border width:"}],"Border color":[{"source":"Border color","target":"Border color"}],"Caption:":[{"source":"Caption:","target":"Caption:"}],"Description of the nature of the table":[{"source":"Description of the nature of the table","target":"Description of the nature of the table"}],"Row group":[{"source":"Row group","target":"Row group"}],"Row group:":[{"source":"Row group:","target":"Row group:"}],"Table section":[{"source":"Table section to which the row belongs","target":"Table section to which the row belongs"}],"Table body":[{"source":"Table body","target":"Table body"}],"Table header":[{"source":"Table header","target":"Table header"}],"Table footer":[{"source":"Table footer","target":"Table footer"}],"Cell Properties":[{"source":"Cell Properties","target":"Cell Properties"}],"Cell Type and Scope":[{"source":"Cell Type and Scope","target":"Cell Type and Scope"}],"Type of cell":[{"source":"Type of cell:","target":"Type of cell:"}],"Normal":[{"source":"Data cell","target":"Data cell"}],"Header":[{"source":"Header cell","target":"Header cell"}],"Specifies the type of cell":[{"source":"Specifies the type of cell","target":"Specifies the type of cell"}],"Scope":[{"source":"Scope:","target":"Scope:"}],"scope_row":[{"source":"Row","target":"Row"}],"scope_column":[{"source":"Column","target":"Column"}],"scope_rowgroup":[{"source":"Group of rows","target":"Group of rows"}],"Scope of header cell":[{"source":"Scope of the header","target":"Scope of the header"}],"Abbreviation":[{"source":"Abbreviation","target":"Abbreviation"}],"Header abbreviation":[{"source":"Header abbreviation","target":"Header abbreviation"}],"Center":[{"source":"Center","target":"Center"}],"Character":[{"source":"Character","target":"Character"}],"Align on this character":[{"source":"Align text relative to this character","target":"Align text relative to this character"}],"Collapsed borders":[{"source":"Collapsed borders","target":"Collapsed borders"}],"Detached borders":[{"source":"Detached borders","target":"Detached borders"}],"Color:":[{"source":"Color:","target":"Color:"}],"Description":[{"source":"Description","target":"Description"}],"FG Color:":[{"source":"Text:","target":"Text:"}],"Float:":[{"source":"Float:","target":"Float:"}],"Specifies where the table should float":[{"source":"Specifies where the table should float","target":"Specifies where the table should float"}],"Non-floating":[{"source":"Non-floating","target":"Non-floating"}],"Frames:":[{"source":"Frames:","target":"Frames:"}],"Specifies which sides should have a border":[{"source":"Specifies which sides should have a border","target":"Specifies which sides should have a border"}],"Height:":[{"source":"Height:","target":"Height:"}],"Height unit":[{"source":"Height unit","target":"Height unit"}],"Table height":[{"source":"Table height","target":"Table height"}],"Row height":[{"source":"Row height","target":"Row height"}],"Cell height":[{"source":"Cell height","target":"Cell height"}],"How many columns would you like to merge?":[{"source":"How many columns would you like to merge?","target":"How many columns would you like to merge?"}],"How many rows would you like to merge?":[{"source":"How many rows would you like to merge?","target":"How many rows would you like to merge?"}],"Image URL:":[{"source":"Image URL:","target":"Image URL:"}],"URL of the background image":[{"source":"URL of the background image","target":"URL of the background image"}],"Justify":[{"source":"Justify","target":"Justify"}],"Layout":[{"source":"Layout","target":"Layout"}],"Left":[{"source":"Left","target":"Left"}],"Margin":[{"source":"Margin","target":"Margin"}],"Middle":[{"source":"Middle","target":"Middle"}],"No rules":[{"source":"No rules","target":"No rules"}],"No sides":[{"source":"No sides","target":"No sides"}],"Cell padding:":[{"source":"Cell padding:","target":"Cell padding:"}],"Space between content and border in cell":[{"source":"Space between content and border in cell","target":"Space between content and border in cell"}],"Please click into some cell":[{"source":"Please click into some cell","target":"Please click into some cell"}],"Right":[{"source":"Right","target":"Right"}],"Row Properties":[{"source":"Row Properties","target":"Row Properties"}],"Rules will appear between all rows and columns":[{"source":"Rules will appear between all rows and columns","target":"Rules will appear between all rows and columns"}],"Rules will appear between columns only":[{"source":"Rules will appear between columns only","target":"Rules will appear between columns only"}],"Rules will appear between rows only":[{"source":"Rules will appear between rows only","target":"Rules will appear between rows only"}],"Rules:":[{"source":"Rules:","target":"Rules:"}],"Specifies where rules should be displayed":[{"source":"Specifies where rules should be displayed","target":"Specifies where rules should be displayed"}],"Spacing and padding":[{"source":"Spacing and padding","target":"Spacing and padding"}],"Frame and borders":[{"source":"Frame and borders","target":"Frame and borders"}],"Cell spacing:":[{"source":"Cell spacing:","target":"Cell spacing:"}],"Space between adjacent cells":[{"source":"Space between adjacent cells","target":"Space between adjacent cells"}],"Summary:":[{"source":"Summary:","target":"Summary:"}],"Summary of the table purpose and structure":[{"source":"Summary of the table's purpose and structure","target":"Summary of the table's purpose and structure"}],"captionOrSummary-required":[{"source":"Please enter at least one of caption or summary","target":"Please enter at least one of caption or summary"}],"caption-required":[{"source":"Please enter a caption","target":"Please enter a caption"}],"summary-required":[{"source":"Please enter a summary","target":"Please enter a summary"}],"TO-cell-delete":[{"source":"Delete cell","target":"Delete cell"}],"TO-cell-insert-after":[{"source":"Insert cell after","target":"Insert cell after"}],"TO-cell-insert-before":[{"source":"Insert cell before","target":"Insert cell before"}],"TO-cell-merge":[{"source":"Merge cells","target":"Merge cells"}],"TO-cell-prop":[{"source":"Cell properties","target":"Cell properties"}],"TO-cell-split":[{"source":"Split cell","target":"Split cell"}],"TO-col-prop":[{"source":"Column properties","target":"Column properties"}],"TO-col-delete":[{"source":"Delete column","target":"Delete column"}],"TO-col-insert-after":[{"source":"Insert column after","target":"Insert column after"}],"TO-col-insert-before":[{"source":"Insert column before","target":"Insert column before"}],"TO-col-split":[{"source":"Split column","target":"Split column"}],"TO-row-delete":[{"source":"Delete row","target":"Delete row"}],"TO-row-insert-above":[{"source":"Insert row before","target":"Insert row before"}],"TO-row-insert-under":[{"source":"Insert row after","target":"Insert row after"}],"TO-row-prop":[{"source":"Row properties","target":"Row properties"}],"TO-row-split":[{"source":"Split row","target":"Split row"}],"TO-table-prop":[{"source":"Table properties","target":"Table properties"}],"TO-table-restyle":[{"source":"Re-apply table styles","target":"Re-apply table styles"}],"TO-toggle-borders":[{"source":"Toggle borders","target":"Toggle borders"}],"Table Properties":[{"source":"Table Properties","target":"Table Properties"}],"Text alignment:":[{"source":"Text alignment:","target":"Text alignment:"}],"Horizontal alignment of text within cell":[{"source":"Horizontal alignment of text within cell","target":"Horizontal alignment of text within cell"}],"The bottom side only":[{"source":"The bottom side only","target":"The bottom side only"}],"The left-hand side only":[{"source":"The left-hand side only","target":"The left-hand side only"}],"The right and left sides only":[{"source":"The right and left sides only","target":"The right and left sides only"}],"The right-hand side only":[{"source":"The right-hand side only","target":"The right-hand side only"}],"The top and bottom sides only":[{"source":"The top and bottom sides only","target":"The top and bottom sides only"}],"The top side only":[{"source":"The top side only","target":"The top side only"}],"Top":[{"source":"Top","target":"Top"}],"Unset color":[{"source":"Unset color","target":"Unset color"}],"Vertical alignment:":[{"source":"Vertical alignment:","target":"Vertical alignment:"}],"Vertical alignment of content within cell":[{"source":"Vertical alignment of content within cell","target":"Vertical alignment of content within cell"}],"Width:":[{"source":"Width:","target":"Width:"}],"Width unit":[{"source":"Width unit","target":"Width unit"}],"Table width":[{"source":"Table width","target":"Table width"}],"Row width":[{"source":"Row width","target":"Row width"}],"Cell width":[{"source":"Cell width","target":"Cell width"}],"not-del-last-cell":[{"source":"HTMLArea cowardly refuses to delete the last cell in row.","target":"HTMLArea cowardly refuses to delete the last cell in row."}],"not-del-last-col":[{"source":"HTMLArea cowardly refuses to delete the last column in table.","target":"HTMLArea cowardly refuses to delete the last column in table."}],"not-del-last-row":[{"source":"HTMLArea cowardly refuses to delete the last row in table.","target":"HTMLArea cowardly refuses to delete the last row in table."}],"percent":[{"source":"percent","target":"percent"}],"pixels":[{"source":"pixels","target":"pixels"}],"em":[{"source":"em","target":"em"}],"Headers:":[{"source":"Header cells","target":"Header cells"}],"Table headers":[{"source":"Table headers","target":"Table headers"}],"No header cells":[{"source":"No header cells","target":"No header cells"}],"Header cells on top":[{"source":"Header cells on top","target":"Header cells on top"}],"Header cells on left":[{"source":"Header cells on left","target":"Header cells on left"}],"Header cells on top and left":[{"source":"Header cells on top and left","target":"Header cells on top and left"}],"Make cells header cells":[{"source":"Make all row cells header cells","target":"Make all row cells header cells"}],"Make cells data cells":[{"source":"Make all row cells data cells","target":"Make all row cells data cells"}],"Header for column":[{"source":"Header cell for column","target":"Header cell for column"}],"Header for row":[{"source":"Header cell for row","target":"Header cell for row"}],"Header for row group":[{"source":"Header cell for row group","target":"Header cell for row group"}],"Column Properties":[{"source":"Column Cells Properties","target":"Column Cells Properties"}],"Type of cells":[{"source":"Type of cells","target":"Type of cells"}],"Type of cells of the column":[{"source":"Type of cells of the column:","target":"Type of cells of the column:"}],"Specifies the type of cells":[{"source":"Specifies the type of cells of the column","target":"Specifies the type of cells of the column"}],"Data cells":[{"source":"Data cells","target":"Data cells"}],"Headers for rows":[{"source":"Headers for rows","target":"Headers for rows"}],"Headers for row groups":[{"source":"Headers for row groups","target":"Headers for row groups"}],"Technische Universitat Ilmenau":[{"source":"Technische Universit\u00e4t Ilmenau","target":"Technische Universit\u00e4t Ilmenau"}]};

HTMLArea.I18N["AboutEditor"] = new Object();
HTMLArea.I18N["AboutEditor"] = [];

HTMLArea.I18N["ContextMenu"] = new Object();
HTMLArea.I18N["ContextMenu"] = {"Remove the":[{"source":"Remove the","target":"Remove the"}],"Remove this node from the document":[{"source":"Removes this node from the document","target":"Removes this node from the document"}],"TO-toggle-borders-tooltip":[{"source":"Toggle borders","target":"Toggle borders"}],"TO-cell-prop-tooltip":[{"source":"Shows the Table Cell Properties dialogue","target":"Shows the Table Cell Properties dialogue"}],"TO-cell-insert-before-tooltip":[{"source":"Inserts a new cell before the current one","target":"Inserts a new cell before the current one"}],"TO-cell-insert-after-tooltip":[{"source":"Inserts a new cell after the current one","target":"Inserts a new cell after the current one"}],"TO-cell-delete-tooltip":[{"source":"Deletes the current cell","target":"Deletes the current cell"}],"TO-cell-split-tooltip":[{"source":"Splits the current cell","target":"Splits the current cell"}],"TO-cell-merge-tooltip":[{"source":"Merges the selected cells","target":"Merges the selected cells"}],"TO-row-prop-tooltip":[{"source":"Shows the Table Row Properties dialogue","target":"Shows the Table Row Properties dialogue"}],"TO-row-insert-above-tooltip":[{"source":"Inserts a new row before the current one","target":"Inserts a new row before the current one"}],"TO-row-insert-under-tooltip":[{"source":"Inserts a new row after the current one","target":"Inserts a new row after the current one"}],"TO-row-delete-tooltip":[{"source":"Deletes the current row","target":"Deletes the current row"}],"TO-row-split-tooltip":[{"source":"Splits the current row","target":"Splits the current row"}],"TO-table-prop-tooltip":[{"source":"Shows the Table Properties dialogue","target":"Shows the Table Properties dialogue"}],"TO-table-restyle-tooltip":[{"source":"Re-applies the odd-even styles on the table","target":"Re-applies the odd-even styles on the table"}],"TO-col-prop-tooltip":[{"source":"Shows the Column Cells Properties dialogue","target":"Shows the Column Cells Properties dialogue"}],"TO-col-insert-before-tooltip":[{"source":"Inserts a new column before the current one","target":"Inserts a new column before the current one"}],"TO-col-insert-after-tooltip":[{"source":"Inserts a new column after the current one","target":"Inserts a new column after the current one"}],"TO-col-delete-tooltip":[{"source":"Deletes the current column","target":"Deletes the current column"}],"TO-col-split-tooltip":[{"source":"Splits the current column","target":"Splits the current column"}],"Element":[{"source":"Element","target":"Element"}],"Please confirm remove":[{"source":"Please confirm that you want to remove this element:","target":"Please confirm that you want to remove this element:"}],"How did you get here? (Please report!)":[{"source":"How did you get here? (Please report!)","target":"How did you get here? (Please report!)"}],"Show the image properties dialog":[{"source":"Show the image properties dialog","target":"Show the image properties dialog"}],"Modify URL":[{"source":"Modify URL","target":"Modify URL"}],"Current URL is":[{"source":"Current URL is","target":"Current URL is"}],"Opens this link in a new window":[{"source":"Opens this link in a new window","target":"Opens this link in a new window"}],"Please confirm unlink":[{"source":"Please confirm that you want to unlink this element.","target":"Please confirm that you want to unlink this element."}],"Link points to:":[{"source":"Link points to:","target":"Link points to:"}],"Unlink the current element":[{"source":"Unlink the current element","target":"Unlink the current element"}],"Cut":[{"source":"Cut","target":"Cut"}],"Copy":[{"source":"Copy","target":"Copy"}],"Paste":[{"source":"Paste","target":"Paste"}],"Image Properties":[{"source":"_Image Properties","target":"_Image Properties"}],"Modify Link":[{"source":"_Modify Link","target":"_Modify Link"}],"Check Link":[{"source":"Chec_k Link","target":"Chec_k Link"}],"Remove Link":[{"source":"_Remove Link","target":"_Remove Link"}],"TO-toggle-borders-title":[{"source":"Toggle borders","target":"Toggle borders"}],"TO-cell-prop-title":[{"source":"C_ell Properties","target":"C_ell Properties"}],"TO-cell-insert-before-title":[{"source":"Insert cell before","target":"Insert cell before"}],"TO-cell-insert-after-title":[{"source":"Insert cell after","target":"Insert cell after"}],"TO-cell-delete-title":[{"source":"Delete Cell","target":"Delete Cell"}],"TO-cell-split-title":[{"source":"Split Cell","target":"Split Cell"}],"TO-cell-merge-title":[{"source":"Merge Cells","target":"Merge Cells"}],"TO-row-prop-title":[{"source":"Ro_w Properties","target":"Ro_w Properties"}],"TO-row-insert-above-title":[{"source":"I_nsert Row Before","target":"I_nsert Row Before"}],"TO-row-insert-under-title":[{"source":"In_sert Row After","target":"In_sert Row After"}],"TO-row-delete-title":[{"source":"_Delete Row","target":"_Delete Row"}],"TO-row-split-title":[{"source":"Split Row","target":"Split Row"}],"TO-table-prop-title":[{"source":"_Table Properties","target":"_Table Properties"}],"TO-table-restyle-title":[{"source":"Re-apply table styles","target":"Re-apply table styles"}],"TO-col-prop-title":[{"source":"Column Cells Properties","target":"Column Cells Properties"}],"TO-col-insert-before-title":[{"source":"Insert _Column Before","target":"Insert _Column Before"}],"TO-col-insert-after-title":[{"source":"Insert C_olumn After","target":"Insert C_olumn After"}],"TO-col-delete-title":[{"source":"De_lete Column","target":"De_lete Column"}],"TO-col-split-title":[{"source":"Split Column","target":"Split Column"}],"Create a link":[{"source":"Create a link","target":"Create a link"}],"Insert paragraph before":[{"source":"Insert paragraph before","target":"Insert paragraph before"}],"Insert a paragraph before the current node":[{"source":"Insert a paragraph before the current node","target":"Insert a paragraph before the current node"}],"Insert paragraph after":[{"source":"Insert paragraph after","target":"Insert paragraph after"}],"Insert a paragraph after the current node":[{"source":"Insert a paragraph after the current node","target":"Insert a paragraph after the current node"}],"JustifyLeft-title":[{"source":"Justify Left","target":"Justify Left"}],"JustifyCenter-title":[{"source":"Justify Center","target":"Justify Center"}],"JustifyRight-title":[{"source":"Justify Right","target":"Justify Right"}],"JustifyFull-title":[{"source":"Justify Full","target":"Justify Full"}],"JustifyLeft-tooltip":[{"source":"Aligns text to the left","target":"Aligns text to the left"}],"JustifyCenter-tooltip":[{"source":"Centers the text","target":"Centers the text"}],"JustifyRight-tooltip":[{"source":"Aligns text to the right","target":"Aligns text to the right"}],"JustifyFull-tooltip":[{"source":"Aligns text both to the left and the right","target":"Aligns text both to the left and the right"}],"Make link":[{"source":"Make lin_k","target":"Make lin_k"}]};

HTMLArea.I18N["UndoRedo"] = new Object();
HTMLArea.I18N["UndoRedo"] = [];

HTMLArea.I18N["CopyPaste"] = new Object();
HTMLArea.I18N["CopyPaste"] = {"Allow-Clipboard-Helper-Add-On-Title":[{"source":"Firefox Add-on AllowClipboard Helper","target":"Firefox Add-on AllowClipboard Helper"}],"Firefox-Security-Prefs-Question-Title":[{"source":"Firefox Clipboard Access Security Settings","target":"Firefox Clipboard Access Security Settings"}],"Technische Universitat Ilmenau":[{"source":"Technische Universit\u00e4t Ilmenau","target":"Technische Universit\u00e4t Ilmenau"}]};

HTMLArea.I18N["TYPO3Color"] = new Object();
HTMLArea.I18N["TYPO3Color"] = {"ForeColor":[{"source":"Text Color","target":"Text Color"}],"HiliteColor":[{"source":"Background Color","target":"Background Color"}],"ForeColor_title":[{"source":"Set the text color","target":"Set the text color"}],"HiliteColor_title":[{"source":"Set the background color","target":"Set the background color"}],"color_title":[{"source":"Choose a color","target":"Choose a color"}],"no_color":[{"source":"No color","target":"No color"}]};


/**
*
*  MD5 (Message-Digest Algorithm)
*  http://www.webtoolkit.info/
*
**/

function MD5(string) {

	function RotateLeft(lValue, iShiftBits) {
		return (lValue<<iShiftBits) | (lValue>>>(32-iShiftBits));
	}

	function AddUnsigned(lX,lY) {
		var lX4,lY4,lX8,lY8,lResult;
		lX8 = (lX & 0x80000000);
		lY8 = (lY & 0x80000000);
		lX4 = (lX & 0x40000000);
		lY4 = (lY & 0x40000000);
		lResult = (lX & 0x3FFFFFFF)+(lY & 0x3FFFFFFF);
		if (lX4 & lY4) {
			return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
		}
		if (lX4 | lY4) {
			if (lResult & 0x40000000) {
				return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
			} else {
				return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
			}
		} else {
			return (lResult ^ lX8 ^ lY8);
		}
 	}

 	function F(x,y,z) { return (x & y) | ((~x) & z); }
 	function G(x,y,z) { return (x & z) | (y & (~z)); }
 	function H(x,y,z) { return (x ^ y ^ z); }
	function I(x,y,z) { return (y ^ (x | (~z))); }

	function FF(a,b,c,d,x,s,ac) {
		a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac));
		return AddUnsigned(RotateLeft(a, s), b);
	};

	function GG(a,b,c,d,x,s,ac) {
		a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac));
		return AddUnsigned(RotateLeft(a, s), b);
	};

	function HH(a,b,c,d,x,s,ac) {
		a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac));
		return AddUnsigned(RotateLeft(a, s), b);
	};

	function II(a,b,c,d,x,s,ac) {
		a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac));
		return AddUnsigned(RotateLeft(a, s), b);
	};

	function ConvertToWordArray(string) {
		var lWordCount;
		var lMessageLength = string.length;
		var lNumberOfWords_temp1=lMessageLength + 8;
		var lNumberOfWords_temp2=(lNumberOfWords_temp1-(lNumberOfWords_temp1 % 64))/64;
		var lNumberOfWords = (lNumberOfWords_temp2+1)*16;
		var lWordArray=Array(lNumberOfWords-1);
		var lBytePosition = 0;
		var lByteCount = 0;
		while ( lByteCount < lMessageLength ) {
			lWordCount = (lByteCount-(lByteCount % 4))/4;
			lBytePosition = (lByteCount % 4)*8;
			lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount)<<lBytePosition));
			lByteCount++;
		}
		lWordCount = (lByteCount-(lByteCount % 4))/4;
		lBytePosition = (lByteCount % 4)*8;
		lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80<<lBytePosition);
		lWordArray[lNumberOfWords-2] = lMessageLength<<3;
		lWordArray[lNumberOfWords-1] = lMessageLength>>>29;
		return lWordArray;
	};

	function WordToHex(lValue) {
		var WordToHexValue="",WordToHexValue_temp="",lByte,lCount;
		for (lCount = 0;lCount<=3;lCount++) {
			lByte = (lValue>>>(lCount*8)) & 255;
			WordToHexValue_temp = "0" + lByte.toString(16);
			WordToHexValue = WordToHexValue + WordToHexValue_temp.substr(WordToHexValue_temp.length-2,2);
		}
		return WordToHexValue;
	};

	function Utf8Encode(string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	};

	var x=Array();
	var k,AA,BB,CC,DD,a,b,c,d;
	var S11=7, S12=12, S13=17, S14=22;
	var S21=5, S22=9 , S23=14, S24=20;
	var S31=4, S32=11, S33=16, S34=23;
	var S41=6, S42=10, S43=15, S44=21;

	string = Utf8Encode(string);

	x = ConvertToWordArray(string);

	a = 0x67452301; b = 0xEFCDAB89; c = 0x98BADCFE; d = 0x10325476;

	for (k=0;k<x.length;k+=16) {
		AA=a; BB=b; CC=c; DD=d;
		a=FF(a,b,c,d,x[k+0], S11,0xD76AA478);
		d=FF(d,a,b,c,x[k+1], S12,0xE8C7B756);
		c=FF(c,d,a,b,x[k+2], S13,0x242070DB);
		b=FF(b,c,d,a,x[k+3], S14,0xC1BDCEEE);
		a=FF(a,b,c,d,x[k+4], S11,0xF57C0FAF);
		d=FF(d,a,b,c,x[k+5], S12,0x4787C62A);
		c=FF(c,d,a,b,x[k+6], S13,0xA8304613);
		b=FF(b,c,d,a,x[k+7], S14,0xFD469501);
		a=FF(a,b,c,d,x[k+8], S11,0x698098D8);
		d=FF(d,a,b,c,x[k+9], S12,0x8B44F7AF);
		c=FF(c,d,a,b,x[k+10],S13,0xFFFF5BB1);
		b=FF(b,c,d,a,x[k+11],S14,0x895CD7BE);
		a=FF(a,b,c,d,x[k+12],S11,0x6B901122);
		d=FF(d,a,b,c,x[k+13],S12,0xFD987193);
		c=FF(c,d,a,b,x[k+14],S13,0xA679438E);
		b=FF(b,c,d,a,x[k+15],S14,0x49B40821);
		a=GG(a,b,c,d,x[k+1], S21,0xF61E2562);
		d=GG(d,a,b,c,x[k+6], S22,0xC040B340);
		c=GG(c,d,a,b,x[k+11],S23,0x265E5A51);
		b=GG(b,c,d,a,x[k+0], S24,0xE9B6C7AA);
		a=GG(a,b,c,d,x[k+5], S21,0xD62F105D);
		d=GG(d,a,b,c,x[k+10],S22,0x2441453);
		c=GG(c,d,a,b,x[k+15],S23,0xD8A1E681);
		b=GG(b,c,d,a,x[k+4], S24,0xE7D3FBC8);
		a=GG(a,b,c,d,x[k+9], S21,0x21E1CDE6);
		d=GG(d,a,b,c,x[k+14],S22,0xC33707D6);
		c=GG(c,d,a,b,x[k+3], S23,0xF4D50D87);
		b=GG(b,c,d,a,x[k+8], S24,0x455A14ED);
		a=GG(a,b,c,d,x[k+13],S21,0xA9E3E905);
		d=GG(d,a,b,c,x[k+2], S22,0xFCEFA3F8);
		c=GG(c,d,a,b,x[k+7], S23,0x676F02D9);
		b=GG(b,c,d,a,x[k+12],S24,0x8D2A4C8A);
		a=HH(a,b,c,d,x[k+5], S31,0xFFFA3942);
		d=HH(d,a,b,c,x[k+8], S32,0x8771F681);
		c=HH(c,d,a,b,x[k+11],S33,0x6D9D6122);
		b=HH(b,c,d,a,x[k+14],S34,0xFDE5380C);
		a=HH(a,b,c,d,x[k+1], S31,0xA4BEEA44);
		d=HH(d,a,b,c,x[k+4], S32,0x4BDECFA9);
		c=HH(c,d,a,b,x[k+7], S33,0xF6BB4B60);
		b=HH(b,c,d,a,x[k+10],S34,0xBEBFBC70);
		a=HH(a,b,c,d,x[k+13],S31,0x289B7EC6);
		d=HH(d,a,b,c,x[k+0], S32,0xEAA127FA);
		c=HH(c,d,a,b,x[k+3], S33,0xD4EF3085);
		b=HH(b,c,d,a,x[k+6], S34,0x4881D05);
		a=HH(a,b,c,d,x[k+9], S31,0xD9D4D039);
		d=HH(d,a,b,c,x[k+12],S32,0xE6DB99E5);
		c=HH(c,d,a,b,x[k+15],S33,0x1FA27CF8);
		b=HH(b,c,d,a,x[k+2], S34,0xC4AC5665);
		a=II(a,b,c,d,x[k+0], S41,0xF4292244);
		d=II(d,a,b,c,x[k+7], S42,0x432AFF97);
		c=II(c,d,a,b,x[k+14],S43,0xAB9423A7);
		b=II(b,c,d,a,x[k+5], S44,0xFC93A039);
		a=II(a,b,c,d,x[k+12],S41,0x655B59C3);
		d=II(d,a,b,c,x[k+3], S42,0x8F0CCC92);
		c=II(c,d,a,b,x[k+10],S43,0xFFEFF47D);
		b=II(b,c,d,a,x[k+1], S44,0x85845DD1);
		a=II(a,b,c,d,x[k+8], S41,0x6FA87E4F);
		d=II(d,a,b,c,x[k+15],S42,0xFE2CE6E0);
		c=II(c,d,a,b,x[k+6], S43,0xA3014314);
		b=II(b,c,d,a,x[k+13],S44,0x4E0811A1);
		a=II(a,b,c,d,x[k+4], S41,0xF7537E82);
		d=II(d,a,b,c,x[k+11],S42,0xBD3AF235);
		c=II(c,d,a,b,x[k+2], S43,0x2AD7D2BB);
		b=II(b,c,d,a,x[k+9], S44,0xEB86D391);
		a=AddUnsigned(a,AA);
		b=AddUnsigned(b,BB);
		c=AddUnsigned(c,CC);
		d=AddUnsigned(d,DD);
	}

	var temp = WordToHex(a)+WordToHex(b)+WordToHex(c)+WordToHex(d);

	return temp.toLowerCase();
}
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
 * Evaluation of TYPO3 form field content
 */

function evalFunc() {
	this.input = evalFunc_input;
	this.output = evalFunc_output;
	this.parseInt = evalFunc_parseInt;
	this.getNumChars = evalFunc_getNumChars;
	this.parseDouble = evalFunc_parseDouble;
	this.noSpace = evalFunc_noSpace;
	this.getSecs = evalFunc_getSecs;
	this.getYear = evalFunc_getYear;
	this.getTimeSecs = evalFunc_getTimeSecs;
	this.getTime = evalFunc_getTime;
	this.getDate = evalFunc_getDate;
	this.getTimestamp = evalFunc_getTimestamp;
	this.caseSwitch = evalFunc_caseSwitch;
	this.evalObjValue = evalFunc_evalObjValue;
	this.outputObjValue = evalFunc_outputObjValue;
	this.split = evalFunc_splitStr;
	this.pol = evalFunc_pol;
	this.convertClientTimestampToUTC = evalFunc_convertClientTimestampToUTC;

	this.ltrim = evalFunc_ltrim;
	this.btrim = evalFunc_btrim;
	var today = new Date();
 	this.lastYear = this.getYear(today);
 	this.lastDate = this.getDate(today);
 	this.lastTime = 0;
	this.refDate = today;
	this.isInString = '';
	this.USmode = 0;
}
function evalFunc_pol(foreign, value) {
	return eval (((foreign=="-")?'-':'')+value);
}
function evalFunc_evalObjValue(FObj,value) {
	var evallist = FObj.evallist;
	this.isInString = (FObj.is_in) ? ''+FObj.is_in : '';
	var index=1;
	var theEvalType = (FObj.evallist) ? this.split(evallist, ",", index) : false;
	var newValue=value;
	while (theEvalType) {
		if (typeof TBE_EDITOR == 'object' && TBE_EDITOR.customEvalFunctions[theEvalType] && typeof TBE_EDITOR.customEvalFunctions[theEvalType] == 'function') {
			newValue = TBE_EDITOR.customEvalFunctions[theEvalType](newValue);
		} else {
			newValue = evalFunc.input(theEvalType, newValue);
		}
		index++;
		theEvalType = this.split(evallist, ",", index);
	}
	return newValue;
}
function evalFunc_outputObjValue(FObj,value) {
	var evallist = FObj.evallist;
	var index=1;
	var theEvalType = this.split(evallist, ",", index);
	var newValue=value;
	while (theEvalType) {
		if (theEvalType != 'required') {
			newValue = evalFunc.output(theEvalType, value, FObj);
		}
		index++;
		theEvalType = this.split(evallist, ",", index);
	}
	return newValue;
}
function evalFunc_caseSwitch(type,inVal) {
	var theVal = ''+inVal;
	var newString = '';
	switch (type) {
		case "alpha":
		case "num":
		case "alphanum":
		case "alphanum_x":
			for (var a=0;a<theVal.length;a++) {
				var theChar = theVal.substr(a,1);
				var special = (theChar == '_' || theChar == '-');
				var alpha = (theChar >= 'a' && theChar <= 'z') || (theChar >= 'A' && theChar <= 'Z');
				var num = (theChar>='0' && theChar<='9');
				switch(type) {
					case "alphanum":	special=0;		break;
					case "alpha":	num=0; special=0;		break;
					case "num":	alpha=0; special=0;		break;
				}
				if (alpha || num || theChar==' ' || special) {
					newString+=theChar;
				}
			}
		break;
		case "is_in":
			if (this.isInString) {
				for (var a=0;a<theVal.length;a++) {
					var theChar = theVal.substr(a,1);
					if (this.isInString.indexOf(theChar)!=-1) {
						newString+=theChar;
					}
				}
			} else {newString = theVal;}
		break;
		case "nospace":
			newString = this.noSpace(theVal);
		break;
		case "upper":
			newString = theVal.toUpperCase();
		break;
		case "lower":
			newString = theVal.toLowerCase();
		break;
		default:
			return inVal;
	}
	return newString;
}
function evalFunc_parseInt(value) {
	var theVal = ''+value;
	if (!value) {
		return 0;
	}
	for (var a = 0; a < theVal.length; a++) {
		if (theVal.substr(a,1)!='0') {
			return parseInt(theVal.substr(a,theVal.length)) || 0;
		}
	}
	return 0;
}
function evalFunc_getNumChars(value) {
	var theVal = ''+value;
	if (!value) {
		return 0;
	}
	var outVal="";
	for (var a = 0; a < theVal.length; a++) {
		if (theVal.substr(a,1)==parseInt(theVal.substr(a,1))) {
			outVal+=theVal.substr(a,1);
		}
	}
	return outVal;
}
function evalFunc_parseDouble(value) {
	var theVal = "" + value;
	theVal = theVal.replace(/[^0-9,\.-]/g, "");
	var negative = theVal.substring(0, 1) === '-';
	theVal = theVal.replace(/-/g, "");
	theVal = theVal.replace(/,/g, ".");
	if (theVal.indexOf(".") == -1) {
		theVal += ".0";
	}
	var parts = theVal.split(".");
	var dec = parts.pop();
	theVal = Number(parts.join("") + "." + dec);
	if (negative) {
	    theVal *= -1;
	}
	theVal = theVal.toFixed(2);

	return theVal;
}
function evalFunc_noSpace(value) {
	var theVal = ''+value;
	var newString="";
	for (var a=0;a<theVal.length;a++) {
		var theChar = theVal.substr(a,1);
		if (theChar!=' ') {
			newString+=theChar;
		}
	}
	return newString;
}
function evalFunc_ltrim(value) {
	var theVal = ''+value;
	if (!value) {
		return '';
	}
	for (var a = 0; a < theVal.length; a++) {
		if (theVal.substr(a,1)!=' ') {
			return theVal.substr(a,theVal.length);
		}
	}
	return '';
}
function evalFunc_btrim(value) {
	var theVal = ''+value;
	if (!value) {
		return '';
	}
	for (var a = theVal.length; a > 0; a--) {
		if (theVal.substr(a-1,1)!=' ') {
			return theVal.substr(0,a);
		}
	}
	return '';
}
function evalFunc_splitSingle(value) {
	var theVal = ''+value;
	this.values = new Array();
	this.pointer = 3;
	this.values[1]=theVal.substr(0,2);
	this.values[2]=theVal.substr(2,2);
	this.values[3]=theVal.substr(4,10);
}
function evalFunc_split(value) {
	this.values = new Array();
	this.valPol = new Array();
	this.pointer = 0;
	var numberMode = 0;
	var theVal = "";
	value+=" ";
	for (var a=0;a<value.length;a++) {
		var theChar = value.substr(a,1);
		if (theChar<"0" || theChar>"9") {
			if (numberMode) {
				this.pointer++;
				this.values[this.pointer]=theVal;
				theVal = "";
				numberMode=0;
			}
			if (theChar=="+" || theChar=="-") {
				this.valPol[this.pointer+1] = theChar;
			}
		} else {
			theVal+=theChar;
			numberMode=1;
		}
	}
}
function evalFunc_input(type,inVal) {
	if (type=="md5") {
		return MD5(inVal);
	}
	if (type=="trim") {
		return this.ltrim(this.btrim(inVal));
	}
	if (type=="int") {
		return this.parseInt(inVal);
	}
	if (type=="double2") {
		return this.parseDouble(inVal);
	}

	var today = new Date();
	var add=0;
	var value = this.ltrim(inVal);
	var values = new evalFunc_split(value);
	var theCmd = value.substr(0,1);
	value = this.caseSwitch(type,value);
	if (value=="") {
		return "";
		return 0;	// Why would I ever return a zero??? (20/12/01)
	}
	switch (type) {
		case "datetime":
			switch (theCmd) {
				case "d":
				case "t":
				case "n":
					this.lastTime = this.convertClientTimestampToUTC(this.getTimestamp(today), 0);
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				case "+":
				case "-":
					if (this.lastTime == 0) {
						this.lastTime = this.convertClientTimestampToUTC(this.getTimestamp(today), 0);
					}
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				default:
					var index = value.indexOf(' ');
					if (index!=-1) {
						var dateVal = this.input("date",value.substr(index,value.length));
							// set refDate so that evalFunc_input on time will work with correct DST information
						this.refDate = new Date(dateVal*1000);
						this.lastTime = dateVal + this.input("time",value.substr(0,index));
					} else	{
							// only date, no time
						this.lastTime = this.input("date", value);
					}
			}
			this.lastTime+=add*24*60*60;
			return this.lastTime;
		break;
		case "year":
			switch (theCmd) {
				case "d":
				case "t":
				case "n":
					this.lastYear = this.getYear(today);
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				case "+":
				case "-":
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				default:
					if (values.valPol[2]) {
						add = this.pol(values.valPol[2],this.parseInt(values.values[2]));
					}
					var year = (values.values[1])?this.parseInt(values.values[1]):this.getYear(today);
					if ((year >= 0 && year < 38) || (year >= 70 && year<100) || (year >= 1902 && year < 2038)) {
						if (year<100) {
							year = (year<38) ? year+=2000 : year+=1900;
						}
					} else {
						year = this.getYear(today);
					}
					this.lastYear = year;
			}
			this.lastYear+=add;
			return this.lastYear;
		break;
		case "date":
			switch (theCmd) {
				case "d":
				case "t":
				case "n":
					this.lastDate = this.getTimestamp(today);
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				case "+":
				case "-":
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				default:
					var index = 4;
					if (values.valPol[index]) {
						add = this.pol(values.valPol[index],this.parseInt(values.values[index]));
					}
					if (values.values[1] && values.values[1].length>2) {
						if (values.valPol[2]) {
							add = this.pol(values.valPol[2],this.parseInt(values.values[2]));
						}
						var temp = values.values[1];
						values = new evalFunc_splitSingle(temp);
					}

					var year = (values.values[3])?this.parseInt(values.values[3]):this.getYear(today);
					if ((year >= 0 && year < 38) || (year >= 70 && year < 100) || (year >= 1902 && year<2038)) {
						if (year<100) {
							year = (year<38) ? year+=2000 : year+=1900;
						}
					} else {
						year = this.getYear(today);
					}
					var month = (values.values[this.USmode?1:2])?this.parseInt(values.values[this.USmode?1:2]):today.getUTCMonth()+1;
					var day = (values.values[this.USmode?2:1])?this.parseInt(values.values[this.USmode?2:1]):today.getUTCDate();

					var theTime = new Date(parseInt(year), parseInt(month)-1, parseInt(day));

						// Substract timezone offset from client
					this.lastDate = this.convertClientTimestampToUTC(this.getTimestamp(theTime), 0);
			}
			this.lastDate+=add*24*60*60;
			return this.lastDate;
		break;
		case "time":
		case "timesec":
			switch (theCmd) {
				case "d":
				case "t":
				case "n":
					this.lastTime = this.getTimeSecs(today);
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				case "+":
				case "-":
					if (this.lastTime == 0) {
						this.lastTime = this.getTimeSecs(today);
					}
					if (values.valPol[1]) {
						add = this.pol(values.valPol[1],this.parseInt(values.values[1]));
					}
				break;
				default:
					var index = (type=="timesec")?4:3;
					if (values.valPol[index]) {
						add = this.pol(values.valPol[index],this.parseInt(values.values[index]));
					}
					if (values.values[1] && values.values[1].length>2) {
						if (values.valPol[2]) {
							add = this.pol(values.valPol[2],this.parseInt(values.values[2]));
						}
						var temp = values.values[1];
						values = new evalFunc_splitSingle(temp);
					}
					var sec = (values.values[3])?this.parseInt(values.values[3]):today.getUTCSeconds();
					if (sec > 59)	{sec=59;}
					var min = (values.values[2])?this.parseInt(values.values[2]):today.getUTCMinutes();
					if (min > 59)	{min=59;}
					var hour = (values.values[1])?this.parseInt(values.values[1]):today.getUTCHours();
					if (hour >= 24)	{hour=0;}

					var theTime = new Date(this.getYear(this.refDate), this.refDate.getUTCMonth(), this.refDate.getUTCDate(), hour, min, ((type=="timesec")?sec:0));

						// Substract timezone offset from client
					this.lastTime = this.convertClientTimestampToUTC(this.getTimestamp(theTime), 1);
			}
			this.lastTime+=add*60;
			if (this.lastTime<0) {this.lastTime+=24*60*60;}
			return this.lastTime;
		break;
		default:
			return value;
	}
}
function evalFunc_output(type,value,FObj) {
	var theString = "";
	switch (type) {
		case "date":
			if (!parseInt(value))	{return '';}
			var theTime = new Date(parseInt(value) * 1000);
			if (this.USmode) {
				theString = (theTime.getUTCMonth()+1)+'-'+theTime.getUTCDate()+'-'+this.getYear(theTime);
			} else {
				theString = theTime.getUTCDate()+'-'+(theTime.getUTCMonth()+1)+'-'+this.getYear(theTime);
			}
		break;
		case "datetime":
			if (!parseInt(value))	{return '';}
			theString = this.output("time",value)+' '+this.output("date",value);
		break;
		case "time":
		case "timesec":
			if (!parseInt(value))	{return '';}
			var theTime = new Date(parseInt(value) * 1000);
			var h = theTime.getUTCHours();
			var m = theTime.getUTCMinutes();
			var s = theTime.getUTCSeconds();
			theString = h+':'+((m<10)?'0':'')+m + ((type=="timesec")?':'+((s<10)?'0':'')+s:'');
		break;
		case "password":
			theString = (value)	? TS.passwordDummy : "";
		break;
		case "int":
			theString = (FObj.checkbox && value==FObj.checkboxValue)?'':value;
		break;
		default:
			theString = value;
	}
	return theString;
}
function evalFunc_getSecs(timeObj) {
	return timeObj.getUTCSeconds();
}
// Seconds since midnight:
function evalFunc_getTime(timeObj) {
	return timeObj.getUTCHours() * 60 * 60 + timeObj.getUTCMinutes() * 60 + this.getSecs(timeObj);
}
function evalFunc_getYear(timeObj) {
	return timeObj.getUTCFullYear();
}
// Seconds since midnight with client timezone offset:
function evalFunc_getTimeSecs(timeObj) {
	return timeObj.getHours()*60*60+timeObj.getMinutes()*60+timeObj.getSeconds();
}
function evalFunc_getDate(timeObj) {
	var theTime = new Date(this.getYear(timeObj), timeObj.getUTCMonth(), timeObj.getUTCDate());
	return this.getTimestamp(theTime);
}
function evalFunc_dummy (evallist,is_in,checkbox,checkboxValue) {
	this.evallist = evallist;
	this.is_in = is_in;
	this.checkboxValue = checkboxValue;
	this.checkbox = checkbox;
}
function evalFunc_splitStr(theStr1, delim, index) {
	var theStr = ''+theStr1;
	var lengthOfDelim = delim.length;
	sPos = -lengthOfDelim;
	if (index<1) {index=1;}
	for (a=1; a<index; a++) {
		sPos = theStr.indexOf(delim, sPos+lengthOfDelim);
		if (sPos==-1)	{return null;}
	}
	ePos = theStr.indexOf(delim, sPos+lengthOfDelim);
	if(ePos == -1)	{ePos = theStr.length;}
	return (theStr.substring(sPos+lengthOfDelim,ePos));
}
function evalFunc_getTimestamp(timeObj) {
	return Date.parse(timeObj)/1000;
}

// Substract timezone offset from client to a timestamp to get UTC-timestamp to be send to server
function evalFunc_convertClientTimestampToUTC(timestamp, timeonly) {
	var timeObj = new Date(timestamp*1000);
	timeObj.setTime((timestamp - timeObj.getTimezoneOffset()*60)*1000);
	if (timeonly) {
			// only seconds since midnight
		return this.getTime(timeObj);
	} else	{
			// seconds since the "unix-epoch"
		return this.getTimestamp(timeObj);
	}
}

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
 * Contains JavaScript for TYPO3 Core Form generator - AKA "TCEforms"
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @coauthor	Oliver Hader <oh@inpublica.de>
 */


var TBE_EDITOR = {
	/* Example:
		elements: {
			'data-parentPid-table-uid': {
				'field': {
					'range':		[0, 100],
					'rangeImg':		'',
					'required':		true,
					'requiredImg':	''
				}
			}
		},
	*/

	elements: {},
	nested: {'field':{}, 'level':{}},
	ignoreElements: [],
	recentUpdatedElements: {},
	actionChecks: { submit:	[] },

	formname: '',
	formnameUENC: '',
	isChanged: 0,

	backPath: '',
	prependFormFieldNames: 'data',
	prependFormFieldNamesUENC: 'data',
	prependFormFieldNamesCnt: 0,

	isPalettedoc: null,
	doSaveFieldName: 0,

	labels: {},
	images: {
		req: new Image(),
		cm: new Image(),
		sel: new Image(),
		clear: new Image()
	},

	clearBeforeSettingFormValueFromBrowseWin: [],

	// Handling of data structures:
	addElements: function(elements) {
		TBE_EDITOR.recentUpdatedElements = elements;
		TBE_EDITOR.elements = $H(TBE_EDITOR.elements).merge(elements).toObject();
	},
	addNested: function(elements) {
		// Merge data structures:
		if (elements) {
			$H(elements).each(function(element) {
				var levelMax, i, currentLevel, subLevel;
				var nested = element.value;
				if (nested.level && nested.level.length) {
						// If the first level is of type 'inline', it could be created by a AJAX request to IRRE.
						// So, try to get the upper levels this dynamic level is nested in:
					if (typeof inline!='undefined' && nested.level[0][0]=='inline') {
						nested.level = inline.findContinuedNestedLevel(nested.level, nested.level[0][1]);
					}
					levelMax = nested.level.length-1;
					for (i=0; i<=levelMax; i++) {
						currentLevel = TBE_EDITOR.getNestedLevelIdent(nested.level[i]);
						if (typeof TBE_EDITOR.nested.level[currentLevel] == 'undefined') {
							TBE_EDITOR.nested.level[currentLevel] = { 'clean': true, 'item': {}, 'sub': {} };
						}
							// Add next sub level to the current level:
						if (i<levelMax) {
							subLevel = TBE_EDITOR.getNestedLevelIdent(nested.level[i+1]);
							TBE_EDITOR.nested.level[currentLevel].sub[subLevel] = true;
							// Add the current item to the last level in nesting:
						} else {
							TBE_EDITOR.nested.level[currentLevel].item[element.key] = nested.parts;
						}
					}
				}
			});
				// Merge the nested fields:
			TBE_EDITOR.nested.field = $H(TBE_EDITOR.nested.field).merge(elements).toObject();
		}
	},
	removeElement: function(record) {
		if (TBE_EDITOR.elements && TBE_EDITOR.elements[record]) {
				// Inform envolved levels the this record is removed and the missing requirements are resolved:
			$H(TBE_EDITOR.elements[record]).each(
				function(pair) {
					TBE_EDITOR.notifyNested(record+'['+pair.key+']', true);
				}
			);
			delete(TBE_EDITOR.elements[record]);
		}
	},
	removeElementArray: function(removeStack) {
		if (removeStack && removeStack.length) {
			TBE_EDITOR.ignoreElements = removeStack;
			for (var i=removeStack.length; i>=0; i--) {
				TBE_EDITOR.removeElement(removeStack[i]);
			}
			TBE_EDITOR.ignoreElements = [];
		}
	},
	getElement: function(record, field, type) {
		var result = null;
		var element;

		if (TBE_EDITOR.elements && TBE_EDITOR.elements[record] && TBE_EDITOR.elements[record][field]) {
			element = TBE_EDITOR.elements[record][field];
			if (type) {
				if (element[type]) result = element;
			} else {
				result = element;
			}
		}

		return result;
	},
	checkElements: function(type, recentUpdated, record, field) {
		var result = 1;
		var elementName, elementData, elementRecord, elementField;
		var source = (recentUpdated ? TBE_EDITOR.recentUpdatedElements : TBE_EDITOR.elements);

		if (TBE_EDITOR.ignoreElements.length && TBE_EDITOR.ignoreElements.indexOf(record)!=-1) {
			return result;
		}

		if (type) {
			if (record && field) {
				elementName = record+'['+field+']';
				elementData = TBE_EDITOR.getElement(record, field, type);
				if (elementData) {
					if (!TBE_EDITOR.checkElementByType(type, elementName, elementData, recentUpdated)) {
						result = 0;
					}
				}

			} else {
				var elementFieldList, elRecIndex, elRecCnt, elFldIndex, elFldCnt;
				var elementRecordList = $H(source).keys();
				for (elRecIndex=0, elRecCnt=elementRecordList.length; elRecIndex<elRecCnt; elRecIndex++) {
					elementRecord = elementRecordList[elRecIndex];
					elementFieldList = $H(source[elementRecord]).keys();
					for (elFldIndex=0, elFldCnt=elementFieldList.length; elFldIndex<elFldCnt; elFldIndex++) {
						elementField = elementFieldList[elFldIndex];
						elementData = TBE_EDITOR.getElement(elementRecord, elementField, type);
						if (elementData) {
							elementName = elementRecord+'['+elementField+']';
							if (!TBE_EDITOR.checkElementByType(type, elementName, elementData, recentUpdated)) {
								result = 0;
							}
						}
					}
				}
			}
		}

		return result;
	},
	checkElementByType: function(type, elementName, elementData, autoNotify) {
		var form, result = 1;

		if (type) {
			if (type == 'required') {
				form = document[TBE_EDITOR.formname][elementName];
				if (form) {
						// Check if we are within a deleted inline element
					var testNode = $(form.parentNode);
					while(testNode) {
						if (testNode.hasClassName && testNode.hasClassName('inlineIsDeletedRecord')) {
							return result;
						}
						testNode = $(testNode.parentNode);
					}

					var value = form.value;
					if (!value || elementData.additional && elementData.additional.isPositiveNumber && (isNaN(value) || Number(value) <= 0)) {
						result = 0;
						if (autoNotify) {
							TBE_EDITOR.setImage('req_'+elementData.requiredImg, TBE_EDITOR.images.req);
							TBE_EDITOR.notifyNested(elementName, false);
						}
					}
				}
			} else if (type == 'range' && elementData.range) {
				var numberOfElements = 0;
				form = document[TBE_EDITOR.formname][elementName+'_list'];
				if (!form) {
						// special treatment for IRRE fields:
					var tempObj = document[TBE_EDITOR.formname][elementName];
					if (tempObj && (Element.hasClassName(tempObj, 'inlineRecord') || Element.hasClassName(tempObj, 'treeRecord'))) {
						form = tempObj.value ? tempObj.value.split(',') : [];
						numberOfElements = form.length;
					}

				} else {
						// special treatment for file uploads
					var tempObj = document[TBE_EDITOR.formname][elementName.replace(/^data/, 'data_files') + '[]'];
					numberOfElements = form.length;

					if (tempObj && tempObj.type == 'file' && tempObj.value) {
						numberOfElements++; // Add new uploaded file to the number of elements
					}
				}

				if (!TBE_EDITOR.checkRange(numberOfElements, elementData.range[0], elementData.range[1])) {
					result = 0;
					if (autoNotify) {
						TBE_EDITOR.setImage('req_'+elementData.rangeImg, TBE_EDITOR.images.req);
						TBE_EDITOR.notifyNested(elementName, false);
					}
				}
			}
		}

		return result;
	},
	// Notify tabs and inline levels with nested requiredFields/requiredElements:
	notifyNested: function(elementName, resolved) {
		if (TBE_EDITOR.nested.field[elementName]) {
			var i, nested, element, fieldLevels, fieldLevelIdent, nestedLevelType, nestedLevelName;
			fieldLevels = TBE_EDITOR.nested.field[elementName].level;
			TBE_EDITOR.nestedCache = {};

			for (i=fieldLevels.length-1; i>=0; i--) {
				nestedLevelType = fieldLevels[i][0];
				nestedLevelName = fieldLevels[i][1];
				fieldLevelIdent = TBE_EDITOR.getNestedLevelIdent(fieldLevels[i]);
					// Construct the CSS id strings of the image/icon tags showing the notification:
				if (nestedLevelType == 'tab') {
					element = nestedLevelName+'-REQ';
				} else if (nestedLevelType == 'inline') {
					element = nestedLevelName+'_req';
				} else {
					continue;
				}
					// Set the icons:
				if (resolved) {
					if (TBE_EDITOR.checkNested(fieldLevelIdent)) {
						TBE_EDITOR.setImage(element, TBE_EDITOR.images.clear);
					} else {
						break;
					}
				} else {
					if (TBE_EDITOR.nested.level && TBE_EDITOR.nested.level[fieldLevelIdent]) {
						TBE_EDITOR.nested.level[fieldLevelIdent].clean = false;
					}
					TBE_EDITOR.setImage(element, TBE_EDITOR.images.req);
				}
			}
		}
	},
	// Check all the input fields on a given level of nesting - if only on is unfilled, the whole level is marked as required:
	checkNested: function(nestedLevelIdent) {
		var nestedLevel, isClean;
		if (nestedLevelIdent && TBE_EDITOR.nested.level && TBE_EDITOR.nested.level[nestedLevelIdent]) {
			nestedLevel = TBE_EDITOR.nested.level[nestedLevelIdent];
			if (!nestedLevel.clean) {
				if (typeof nestedLevel.item == 'object') {
					$H(nestedLevel.item).each(
						function(pair) {
							if (isClean || typeof isClean == 'undefined') {
								isClean = (
									TBE_EDITOR.checkElements('required', false, pair.value[0], pair.value[1]) &&
									TBE_EDITOR.checkElements('range', false, pair.value[0], pair.value[1])
								);
							}
						}
					);
					if (typeof isClean != 'undefined' && !isClean) {
						return false;
					}
				}
				if (typeof nestedLevel.sub == 'object') {
					$H(nestedLevel.sub).each(
						function(pair) {
							if (isClean || typeof isClean == 'undefined') {
								isClean = TBE_EDITOR.checkNested(pair.key);
							}
						}
					);
					if (typeof isClean != 'undefined' && !isClean) {
						return false;
					}
				}
					// Store the result, that this level (the fields on this and the sub levels) are clean:
				nestedLevel.clean = true;
			}
		}
		return true;
	},
	getNestedLevelIdent: function(level) {
		return level.join('::');
	},
	addActionChecks: function(type, checks) {
		TBE_EDITOR.actionChecks[type].push(checks);
	},

	fieldChanged_fName: function(fName,el) {
		var idx=2+TBE_EDITOR.prependFormFieldNamesCnt;
		var table = TBE_EDITOR.split(fName, "[", idx);
		var uid = TBE_EDITOR.split(fName, "[", idx+1);
		var field = TBE_EDITOR.split(fName, "[", idx+2);

		table = table.substr(0,table.length-1);
		uid = uid.substr(0,uid.length-1);
		field = field.substr(0,field.length-1);
		TBE_EDITOR.fieldChanged(table,uid,field,el);
	},
	fieldChanged: function(table,uid,field,el) {
		var theField = TBE_EDITOR.prependFormFieldNames+'['+table+']['+uid+']['+field+']';
		var theRecord = TBE_EDITOR.prependFormFieldNames+'['+table+']['+uid+']';
		TBE_EDITOR.isChanged = 1;

		// modify the "field has changed" info by adding a class to the container element (based on palette or main field)
		var $formField = TYPO3.jQuery('[name="' + el + '"]');
		var $paletteField = $formField.closest('.t3js-formengine-palette-field');
		$paletteField.addClass('has-change');

		// Set required flag:
		var imgReqObjName = "req_"+table+"_"+uid+"_"+field;
		if (TBE_EDITOR.getElement(theRecord,field,'required') && document[TBE_EDITOR.formname][theField]) {
			if (TBE_EDITOR.checkElements('required', false, theRecord, field)) {
				TBE_EDITOR.setImage(imgReqObjName,TBE_EDITOR.images.clear);
				TBE_EDITOR.notifyNested(theField, true);
			} else {
				TBE_EDITOR.setImage(imgReqObjName,TBE_EDITOR.images.req);
				TBE_EDITOR.notifyNested(theField, false);
			}
		}
		if (TBE_EDITOR.getElement(theRecord,field,'range') && document[TBE_EDITOR.formname][theField]) {
			if (TBE_EDITOR.checkElements('range', false, theRecord, field)) {
				TBE_EDITOR.setImage(imgReqObjName,TBE_EDITOR.images.clear);
				TBE_EDITOR.notifyNested(theField, true);
			} else {
				TBE_EDITOR.setImage(imgReqObjName,TBE_EDITOR.images.req);
				TBE_EDITOR.notifyNested(theField, false);
			}
		}

		if (TBE_EDITOR.isPalettedoc) { TBE_EDITOR.setOriginalFormFieldValue(theField) };
	},
	setOriginalFormFieldValue: function(theField) {
		if (TBE_EDITOR.isPalettedoc && (TBE_EDITOR.isPalettedoc).document[TBE_EDITOR.formname] && (TBE_EDITOR.isPalettedoc).document[TBE_EDITOR.formname][theField]) {
			(TBE_EDITOR.isPalettedoc).document[TBE_EDITOR.formname][theField].value = document[TBE_EDITOR.formname][theField].value;
		}
	},
	isFormChanged: function(noAlert) {
		if (TBE_EDITOR.isChanged && !noAlert && confirm(TBE_EDITOR.labels.fieldsChanged)) {
			return 0;
		}
		return TBE_EDITOR.isChanged;
	},
	checkAndDoSubmit: function(sendAlert) {
		if (TBE_EDITOR.checkSubmit(sendAlert)) { TBE_EDITOR.submitForm(); }
	},
	/**
	 * Checks if the form can be submitted according to any possible restrains like required values, item numbers etc.
	 * Returns true if the form can be submitted, otherwise false (and might issue an alert message, if "sendAlert" is 1)
	 * If "sendAlert" is false, no error message will be shown upon false return value (if "1" then it will).
	 * If "sendAlert" is "-1" then the function will ALWAYS return true regardless of constraints (except if login has expired) - this is used in the case where a form field change requests a form update and where it is accepted that constraints are not observed (form layout might change so other fields are shown...)
	 */
	checkSubmit: function(sendAlert) {
		var funcIndex, funcMax, funcRes;
		var OK=1;

		// $this->additionalJS_submit:
		if (TBE_EDITOR.actionChecks && TBE_EDITOR.actionChecks.submit) {
			for (funcIndex=0, funcMax=TBE_EDITOR.actionChecks.submit.length; funcIndex<funcMax; funcIndex++) {
				try {
					eval(TBE_EDITOR.actionChecks.submit[funcIndex]);
				} catch(error) {}
			}
		}

		if(!OK) {
			if (!confirm(unescape("SYSTEM ERROR: One or more Rich Text Editors on the page could not be contacted. This IS an error, although it should not be regular.\nYou can save the form now by pressing OK, but you will loose the Rich Text Editor content if you do.\n\nPlease report the error to your administrator if it persists."))) {
				return false;
			} else {
				OK = 1;
			}
		}
		// $reqLinesCheck
		if (!TBE_EDITOR.checkElements('required', false)) { OK = 0; }
		// $reqRangeCheck
		if (!TBE_EDITOR.checkElements('range', false)) { OK = 0; }

		if (OK || sendAlert==-1) {
			return true;
		} else {
			if(sendAlert) alert(TBE_EDITOR.labels.fieldsMissing);
			return false;
		}
	},
	checkRange: function(numberOfElements, lower, upper) {
			// for backwards compatibility, check if we're dealing with an element as first parameter
		if(typeof numberOfElements == 'object') {
			numberOfElements = numberOfElements.length;
		}

		if (numberOfElements >= lower && numberOfElements <= upper) {
			return true;
		} else {
			return false;
		}
	},
	initRequired: function() {
		// $reqLinesCheck
		TBE_EDITOR.checkElements('required', true);

		// $reqRangeCheck
		TBE_EDITOR.checkElements('range', true);
	},
	setImage: function(name,image) {
		var object;
		if (document[name]) {
			object = document[name];
		} else if (document.getElementById(name)) {
			object = document.getElementById(name);
		}
		if (object) {
			if (typeof image == 'object') {
				document[name].src = image.src;
			} else {
				document[name].src = eval(image+'.src');
			}
		}
	},
	submitForm: function() {
		if (TBE_EDITOR.doSaveFieldName) {
			document[TBE_EDITOR.formname][TBE_EDITOR.doSaveFieldName].value=1;
		}
		// Set a short timeout to allow other JS processes to complete, in particular those from
		// EXT:backend/Resources/Public/JavaScript/FormEngine.js (reference: http://forge.typo3.org/issues/58755).
		// TODO: This should be solved in a better way when this script is refactored.
		window.setTimeout('document[TBE_EDITOR.formname].submit()', 10);
	},
	split: function(theStr1, delim, index) {
		var theStr = ""+theStr1;
		var lengthOfDelim = delim.length;
		sPos = -lengthOfDelim;
		if (index<1) {index=1;}
		for (var a=1; a<index; a++) {
			sPos = theStr.indexOf(delim, sPos+lengthOfDelim);
			if (sPos==-1) { return null; }
		}
		ePos = theStr.indexOf(delim, sPos+lengthOfDelim);
		if(ePos == -1) { ePos = theStr.length; }
		return (theStr.substring(sPos+lengthOfDelim,ePos));
	},
	curSelected: function(theField) {
		var fObjSel = document[TBE_EDITOR.formname][theField];
		var retVal="";
		if (fObjSel) {
			if (fObjSel.type=='select-multiple' || fObjSel.type=='select-one') {
				var l=fObjSel.length;
				for (a=0;a<l;a++) {
					if (fObjSel.options[a].selected==1) {
						retVal+=fObjSel.options[a].value+",";
					}
				}
			}
		}
		return retVal;
	},
	rawurlencode: function(str,maxlen) {
		var output = str;
		if (maxlen)	output = output.substr(0,200);
		output = encodeURIComponent(output);
		return output;
	},
	str_replace: function(match,replace,string) {
		var input = ''+string;
		var matchStr = ''+match;
		if (!matchStr) { return string; }
		var output = '';
		var pointer=0;
		var pos = input.indexOf(matchStr);
		while (pos!=-1) {
			output+=''+input.substr(pointer, pos-pointer)+replace;
			pointer=pos+matchStr.length;
			pos = input.indexOf(match,pos+1);
		}
		output+=''+input.substr(pointer);
		return output;
	},
	toggle_display_states: function(id, state_1, state_2) {
		var node = document.getElementById(id);
		if (node) {
			switch (node.style.display) {
				case state_1:
					node.style.display = state_2;
					break;
				case state_2:
					node.style.display = state_1;
					break;
			}
		}
		return false;
	},

	/**
	 * Determines backend path to be used for e.g. ajax.php
	 * @return string
	 * @deprecated since TYPO3 CMS 7, will be removed with TYPO3 CMS 8
	 */
	getBackendPath: function() {
		if (typeof console != 'undefined') {
			console.log('TS.getBackendPath() is deprecated since TYPO3 CMS 7, and will be removed in TYPO3 CMS 8.');
		}
		if (TYPO3) {
			if (TYPO3.configuration && TYPO3.configuration.PATH_typo3) {
				backendPath = TYPO3.configuration.PATH_typo3;
			} else if (TYPO3.settings && TYPO3.settings.PATH_typo3) {
				backendPath = TYPO3.settings.PATH_typo3;
			}
		}
		return backendPath;
	}
};

function typoSetup	() {
	this.passwordDummy = '********';
	this.decimalSign = '.';
}
var TS = new typoSetup();
var evalFunc = new evalFunc();

// backwards compatibility for extensions
var TBE_EDITOR_setHiddenContent = TBE_EDITOR.setHiddenContent;
var TBE_EDITOR_isChanged = TBE_EDITOR.isChanged;
var TBE_EDITOR_fieldChanged_fName = TBE_EDITOR.fieldChanged_fName;
var TBE_EDITOR_fieldChanged = TBE_EDITOR.fieldChanged;
var TBE_EDITOR_setOriginalFormFieldValue = TBE_EDITOR.setOriginalFormFieldValue;
var TBE_EDITOR_isFormChanged = TBE_EDITOR.isFormChanged;
var TBE_EDITOR_checkAndDoSubmit = TBE_EDITOR.checkAndDoSubmit;
var TBE_EDITOR_checkSubmit = TBE_EDITOR.checkSubmit;
var TBE_EDITOR_checkRange = TBE_EDITOR.checkRange;
var TBE_EDITOR_initRequired = TBE_EDITOR.initRequired;
var TBE_EDITOR_setImage = TBE_EDITOR.setImage;
var TBE_EDITOR_submitForm = TBE_EDITOR.submitForm;
var TBE_EDITOR_split = TBE_EDITOR.split;
var TBE_EDITOR_curSelected = TBE_EDITOR.curSelected;
var TBE_EDITOR_rawurlencode = TBE_EDITOR.rawurlencode;
var TBE_EDITOR_str_replace = TBE_EDITOR.str_replace;


var typo3form = {
	fieldSetNull: function(fieldName, isNull) {
		if (document[TBE_EDITOR.formname][fieldName]) {
			var formFieldItemWrapper = Element.up(document[TBE_EDITOR.formname][fieldName], '.t3js-formengine-field-item');

			if (isNull) {
				formFieldItemWrapper.addClassName('disabled');
			} else {
				formFieldItemWrapper.removeClassName('disabled');
			}
		}
	},
	fieldTogglePlaceholder: function(fieldName, showPlaceholder) {
		if (!document[TBE_EDITOR.formname][fieldName]) {
			return;
		}

		var formFieldItemWrapper = Element.up(document[TBE_EDITOR.formname][fieldName], '.t3js-formengine-field-item');
		var placeholder = formFieldItemWrapper.select('.t3js-formengine-placeholder-placeholder')[0];
		var formField = formFieldItemWrapper.select('.t3js-formengine-placeholder-formfield')[0];
		if (showPlaceholder) {
			placeholder.show();
			formField.hide();
		} else {
			placeholder.hide();
			formField.show();
		}
	},
	fieldSet: function(theField, evallist, is_in, checkbox, checkboxValue) {
		var i;

		if (document[TBE_EDITOR.formname][theField]) {
			var theFObj = new evalFunc_dummy (evallist,is_in, checkbox, checkboxValue);
			var theValue = document[TBE_EDITOR.formname][theField].value;
			if (checkbox && theValue==checkboxValue) {
				document[TBE_EDITOR.formname][theField+"_hr"].value="";
				if (document[TBE_EDITOR.formname][theField+"_cb"])	document[TBE_EDITOR.formname][theField+"_cb"].checked = "";
			} else {
				document[TBE_EDITOR.formname][theField+"_hr"].value = evalFunc.outputObjValue(theFObj, theValue);
				if (document[TBE_EDITOR.formname][theField+"_cb"])	document[TBE_EDITOR.formname][theField+"_cb"].checked = "on";
			}
		}
	},
	fieldGet: function(theField, evallist, is_in, checkbox, checkboxValue, checkbox_off, checkSetValue) {
		if (document[TBE_EDITOR.formname][theField]) {
			var theFObj = new evalFunc_dummy (evallist,is_in, checkbox, checkboxValue);
			if (checkbox_off) {
				if (document[TBE_EDITOR.formname][theField+"_cb"].checked) {
					var split = evallist.split(',');
					for (var i = 0; split.length > i; i++) {
						var el = split[i].replace(/ /g, '');
						if (el == 'datetime' || el == 'date') {
							var now = new Date();
							checkSetValue = Date.parse(now)/1000 - now.getTimezoneOffset()*60;
							break;
						} else if (el == 'time' || el == 'timesec') {
							checkSetValue = evalFunc_getTimeSecs(new Date());
							break;
						}
					}
					document[TBE_EDITOR.formname][theField].value=checkSetValue;
				} else {
					document[TBE_EDITOR.formname][theField].value=checkboxValue;
				}
			}else{
				document[TBE_EDITOR.formname][theField].value = evalFunc.evalObjValue(theFObj, document[TBE_EDITOR.formname][theField+"_hr"].value);
			}
			typo3form.fieldSet(theField, evallist, is_in, checkbox, checkboxValue);
		}
	}
};

// backwards compatibility for extensions
var typo3FormFieldSet = typo3form.fieldSet;
var typo3FormFieldGet = typo3form.fieldGet;

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

Ext.ns('TYPO3.Components');

TYPO3.Components.TcaValueSlider = Ext.extend(Ext.slider.SingleSlider, {
	itemName: null,
	getField: null,
	changeCallback: null,
	valueItems: null,
	itemElement: null,
	elementType: null,

	initComponent: function() {
		var items, step, n;
		var step = this.increment || 1;
		if (step < 1) {
			this.type = 'float';
			this.increment = 1;
			this.floatValue = 1 / step;
			this.maxValue *= this.floatValue;
		}

		Ext.apply(this, {
			minValue: this.minValue || 0,
			maxValue: this.maxValue || 10000,
			keyIncrement: step,
			increment: step,
			type: this.type,
			plugins: new Ext.slider.Tip({
				getText: function(thumb) {
					return thumb.slider.renderValue(thumb.value);
				}
			}),
			listeners: {
				beforerender: function(slider) {
					var items = Ext.query(this.elementType);
					items.each(function(item) {
						var n = item.getAttribute('name');
						if (n == this.itemName) {
							this.itemElement = item;
						}
					}, this);

					if (this.elementType == 'select') {
						this.minValue = 0;
						this.maxValue = this.itemElement.options.length - 1;
						step = 1;
					}
				},
				changecomplete: function(slider, newValue, thumb) {
					if (slider.itemName) {
						if (slider.elementType == 'input') {
							slider.itemElement.value = slider.renderValue(thumb.value);
						}
						if (slider.elementType == 'select') {
							slider.itemElement.options[thumb.value].selected = '1';
						}
					}
					if (slider.getField) {
						eval(slider.getField);
					}
					if (slider.changeCallback) {
						eval(slider.changeCallback);
					}
				},
				scope: this
			}
		});
		TYPO3.Components.TcaValueSlider.superclass.initComponent.call(this);
	},

	/**
	* Render value for tooltip
	*
	* @param {string} value
	* @return string
	*/
	renderValue: function(value) {
		switch (this.type) {
			case 'array':
				return this.itemElement.options[value].text;
			break;
			case 'time':
				return this.renderValueFromTime(value);
			break;
			case 'float':
				return this.renderValueFromFloat(value);
			break;
			case 'int':
			default:
				return value;
		}
	},

	/**
	* Render value for tooltip as float
	*
	* @param {string} value
	* @return string
	*/
	renderValueFromFloat: function(value) {
		var v = value / this.floatValue;
		return v;
	},

	/**
	* Render value for tooltip as time
	*
	* @param {string} value
	* @return string
	*/
	renderValueFromTime: function(value) {
		var hours = Math.floor(value / 3600);
		var rest = value - (hours * 3600);
		var minutes = Math.round(rest / 60);
		minutes = minutes < 10 ? '0' + minutes : minutes;
		return hours + ':' + minutes;
	}

});

Ext.reg('TYPO3.Components.TcaValueSlider', TYPO3.Components.TcaValueSlider);
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

Ext.onReady(function() {
	Ext.QuickTips.init();
});

	// Fix for slider TCA control in IE9
Ext.override(Ext.dd.DragTracker, {
	onMouseMove:function (e, target) {
		var isIE9 = Ext.isIE && (/msie 9/.test(navigator.userAgent.toLowerCase())) && document.documentMode != 6;
		if (this.active && Ext.isIE && !isIE9 && !e.browserEvent.button) {
			e.preventDefault();
			this.onMouseUp(e);
			return;
		}
		e.preventDefault();
		var xy = e.getXY(), s = this.startXY;
		this.lastXY = xy;
		if (!this.active) {
			if (Math.abs(s[0] - xy[0]) > this.tolerance || Math.abs(s[1] - xy[1]) > this.tolerance) {
				this.triggerStart(e);
			} else {
				return;
			}
		}
		this.fireEvent('mousemove', this, e);
		this.onDrag(e);
		this.fireEvent('drag', this, e);
	}
});
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
 * Class for JS handling of suggest fields in TCEforms.
 *
 * @author  Andreas Wolf <andreas.wolf@ikt-werk.de>
 * @author  Benni Mack <benni@typo3.org>
 */
if (!TCEForms) {
	var TCEForms = {};
}

TCEForms.Suggest = Class.create({
	objectId: '',
	suggestField: '',
	suggestResultList: '',
	minimumCharacters: 2,
	defaultValue: '',
	fieldType: '',

	/**
	 * Wrapper for script.aculo.us' Autocompleter functionality: Assigns a new autocompletion object to
	 * the input field of a given Suggest selector.
	 *
	 * @param  string  objectId  The ID of the object to assign the completer to
	 * @param  string  table     The table of the record which is currently edited
	 * @param  string  field     The field which is currently edited
	 * @param  integer uid       The uid of the record which is currently edited
	 * @param  integer pid       The pid of the record which is currently edited
	 * @param  integer minimumCharacters the minimum characters that is need to trigger the initial search
	 * @param  string  fieldType The TCA type of the field (e.g. group, select, ...)
	 * @param string newRecordRow JSON encoded new content element. Only set when new record is inside flexform
	 */
	initialize: function(objectId, table, field, uid, pid, minimumCharacters, fieldType, newRecordRow) {
		this.objectId = objectId;
		this.suggestField = objectId + 'Suggest';
		this.suggestResultList = objectId + 'SuggestChoices';
		this.fieldType = fieldType;

		new Ajax.Autocompleter(this.suggestField, this.suggestResultList, TYPO3.settings.ajaxUrls['t3lib_TCEforms_suggest::searchRecord'], {
				paramName: 'value',
				minChars: (minimumCharacters ? minimumCharacters : this.minimumCharacters),
				updateElement: this.addElementToList.bind(this),
				parameters: 'table=' + table + '&field=' + field + '&uid=' + uid + '&pid=' + pid + '&newRecordRow=' + newRecordRow,
				indicator: objectId + 'SuggestIndicator'
			}
		);

		$(this.suggestField).observe('focus', this.checkDefaultValue.bind(this));
		$(this.suggestField).observe('keydown', this.checkDefaultValue.bind(this));
	},

	/**
	 * check for default value of the input field and set it to empty once somebody wants to type something in
	 */
	checkDefaultValue: function() {
		if ($(this.suggestField).value == this.defaultValue) {
			$(this.suggestField).value = '';
		}
	},

	/**
	 * Adds an element to the list of items in a group selector.
	 *
	 * @param  object  item  The item to add to the list (usually an li element)
	 * @return void
	 */
	addElementToList: function(item) {
		if (item.className.indexOf('noresults') == -1) {
			var arr = item.id.split('-');
			var ins_table = arr[0];
			var ins_uid = arr[1];
			var ins_uid_string = (this.fieldType == 'select') ? ins_uid : (ins_table + '_' + ins_uid);
			var rec_table = arr[2];
			var rec_uid = arr[3];
			var rec_field = arr[4];

			var formEl = this.objectId;

			var suggestLabelNode = Element.select(item, '.suggest-label')[0];
			var label = suggestLabelNode.textContent ? suggestLabelNode.textContent : suggestLabelNode.innerText;
			var suggestLabelTitleNode = Element.select(suggestLabelNode, '[title]')[0];
			var title = suggestLabelTitleNode ? suggestLabelTitleNode.readAttribute('title') : '';

			setFormValueFromBrowseWin(formEl, ins_uid_string, label, title);
			TBE_EDITOR.fieldChanged(rec_table, rec_uid, rec_field, formEl);

			$(this.suggestField).value = this.defaultValue;
		}
	}
});

/*
 * This code has been copied from Project_CMS
 * Copyright (c) 2005 by Phillip Berndt (www.pberndt.com)
 *
 * Extended Textarea for IE and Firefox browsers
 * Features:
 *  - Possibility to place tabs in <textarea> elements using a simply <TAB> key
 *  - Auto-indenting of new lines
 *
 * License: GNU General Public License
 */

function checkBrowser() {
	browserName = navigator.appName;
	browserVer = parseInt(navigator.appVersion);

	ok = false;
	if (browserName == "Microsoft Internet Explorer" && browserVer >= 4) {
		ok = true;
	} else if (browserName == "Netscape" && browserVer >= 3) {
		ok = true;
	}

	return ok;
}

	// Automatically change all textarea elements
function changeTextareaElements() {
	if (!checkBrowser()) {
			// Stop unless we're using IE or Netscape (includes Mozilla family)
		return false;
	}

	document.textAreas = document.getElementsByTagName("textarea");

	for (i = 0; i < document.textAreas.length; i++) {
			// Only change if the class parameter contains "enable-tab"
		if (document.textAreas[i].className && document.textAreas[i].className.search(/(^| )enable-tab( |$)/) != -1) {
			document.textAreas[i].textAreaID = i;
			makeAdvancedTextArea(document.textAreas[i]);
		}
	}
}

	// Wait until the document is completely loaded.
	// Set a timeout instead of using the onLoad() event because it could be used by something else already.
window.setTimeout("changeTextareaElements();", 200);

	// Turn textarea elements into "better" ones. Actually this is just adding some lines of JavaScript...
function makeAdvancedTextArea(textArea) {
	if (textArea.tagName.toLowerCase() != "textarea") {
		return false;
	}

		// On attempt to leave the element:
		// Do not leave if this.dontLeave is true
	textArea.onblur = function(e) {
		if (!this.dontLeave) {
			return;
		}
		this.dontLeave = null;
		window.setTimeout("document.textAreas[" + this.textAreaID + "].restoreFocus()", 1);
		return false;
	}

		// Set the focus back to the element and move the cursor to the correct position.
	textArea.restoreFocus = function() {
		this.focus();

		if (this.caretPos) {
			this.caretPos.collapse(false);
			this.caretPos.select();
		}
	}

		// Determine the current cursor position
	textArea.getCursorPos = function() {
		if (this.selectionStart) {
			currPos = this.selectionStart;
		} else if (this.caretPos) {	// This is very tricky in IE :-(
			oldText = this.caretPos.text;
			finder = "--getcurrpos" + Math.round(Math.random() * 10000) + "--";
			this.caretPos.text += finder;
			currPos = this.value.indexOf(finder);

			this.caretPos.moveStart('character', -finder.length);
			this.caretPos.text = "";

			this.caretPos.scrollIntoView(true);
		} else {
			return;
		}

		return currPos;
	}

		// On tab, insert a tabulator. Otherwise, check if a slash (/) was pressed.
	textArea.onkeydown = function(e) {
		if (this.selectionStart == null &! this.createTextRange) {
			return;
		}
		if (!e) {
			e = window.event;
		}

			// Tabulator
		if (e.keyCode == 9) {
			this.dontLeave = true;
			this.textInsert(String.fromCharCode(9));
		}

			// Newline
		if (e.keyCode == 13) {
				// Get the cursor position
			currPos = this.getCursorPos();

				// Search the last line
			lastLine = "";
			for (i = currPos - 1; i >= 0; i--) {
				if(this.value.substring(i, i + 1) == '\n') {
					break;
				}
			}
			lastLine = this.value.substring(i + 1, currPos);

				// Search for whitespaces in the current line
			whiteSpace = "";
			for (i = 0; i < lastLine.length; i++) {
				if (lastLine.substring(i, i + 1) == '\t') {
					whiteSpace += "\t";
				} else if (lastLine.substring(i, i + 1) == ' ') {
					whiteSpace += " ";
				} else {
					break;
				}
			}

				// Another ugly IE hack
			if (navigator.appVersion.match(/MSIE/)) {
				whiteSpace = "\\n" + whiteSpace;
			}

				// Insert whitespaces
			window.setTimeout("document.textAreas["+this.textAreaID+"].textInsert(\""+whiteSpace+"\");", 1);
		}
	}

		// Save the current cursor position in IE
	textArea.onkeyup = textArea.onclick = textArea.onselect = function(e) {
		if (this.createTextRange) {
			this.caretPos = document.selection.createRange().duplicate();
		}
	}

		// Insert text at the current cursor position
	textArea.textInsert = function(insertText) {
		if (this.selectionStart != null) {
			var savedScrollTop = this.scrollTop;
			var begin = this.selectionStart;
			var end = this.selectionEnd;
			if (end > begin + 1) {
				this.value = this.value.substr(0, begin) + insertText + this.value.substr(end);
			} else {
				this.value = this.value.substr(0, begin) + insertText + this.value.substr(begin);
			}

			this.selectionStart = begin + insertText.length;
			this.selectionEnd = begin + insertText.length;
			this.scrollTop = savedScrollTop;
		} else if (this.caretPos) {
			this.caretPos.text = insertText;
			this.caretPos.scrollIntoView(true);
		} else {
			text.value += insertText;
		}

		this.focus();
	}
}
/*!
 * Bootstrap v3.3.2 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 *
 * modified by bmack to wrap it as jQuery module for the backend, will be dropped for twbs 4.0
 * please do not reference outside of the TYPO3 Core (not in your own extensions)
 * as this is preliminary as long as twbs does not support AMD modules
 * this file will be deleted once twbs 4 is included
 */
// IIFE for faster access to jQuery and save $use

;(function(factory) {
	if (typeof define === 'function' && define.amd) {
		// register bootstrap as requirejs module
		define("bootstrap", ["jquery"], function($) {
			factory($);
		});
	} else {
		factory(TYPO3.jQuery || jQuery);
	}
})(function(jQuery) {
	if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.2",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.2",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")&&(c.prop("checked")&&this.$element.hasClass("active")?a=!1:b.find(".active").removeClass("active")),a&&c.prop("checked",!this.$element.hasClass("active")).trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active"));a&&this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=this.sliding=this.interval=this.$active=this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.2",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&"show"==b&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a(this.options.trigger).filter('[href="#'+b.id+'"], [data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.2",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0,trigger:'[data-toggle="collapse"]'},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":a.extend({},e.data(),{trigger:this});c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){b&&3===b.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=c(d),f={relatedTarget:this};e.hasClass("open")&&(e.trigger(b=a.Event("hide.bs.dropdown",f)),b.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger("hidden.bs.dropdown",f)))}))}function c(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.2",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=c(e),g=f.hasClass("open");if(b(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click",b);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger("shown.bs.dropdown",h)}return!1}},g.prototype.keydown=function(b){if(/(38|40|27|32)/.test(b.which)&&!/input|textarea/i.test(b.target.tagName)){var d=a(this);if(b.preventDefault(),b.stopPropagation(),!d.is(".disabled, :disabled")){var e=c(d),g=e.hasClass("open");if(!g&&27!=b.which||g&&27==b.which)return 27==b.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.divider):visible a",i=e.find('[role="menu"]'+h+', [role="listbox"]'+h);if(i.length){var j=i.index(b.target);38==b.which&&j>0&&j--,40==b.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",b).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="menu"]',g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="listbox"]',g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$backdrop=this.isShown=null,this.scrollbarWidth=0,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.2",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.options.backdrop&&d.adjustBackdrop(),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in").attr("aria-hidden",!1),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$element.find(".modal-dialog").one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").attr("aria-hidden",!0).off("click.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a('<div class="modal-backdrop '+e+'" />').prependTo(this.$element).on("click.dismiss.bs.modal",a.proxy(function(a){a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus.call(this.$element[0]):this.hide.call(this))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.options.backdrop&&this.adjustBackdrop(),this.adjustDialog()},c.prototype.adjustBackdrop=function(){this.$backdrop.css("height",0).css("height",this.$element[0].scrollHeight)},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){this.bodyIsOverflowing=document.body.scrollHeight>document.documentElement.clientHeight,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right","")},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||"destroy"!=b)&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=this.options=this.enabled=this.timeout=this.hoverState=this.$element=null,this.init("tooltip",a,b)};c.VERSION="3.3.2",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(this.options.viewport.selector||this.options.viewport);for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c&&c.$tip&&c.$tip.is(":visible")?void(c.hoverState="in"):(c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide()},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.options.container?a(this.options.container):this.$element.parent(),p=this.getPosition(o);h="bottom"==h&&k.bottom+m>p.bottom?"top":"top"==h&&k.top-m<p.top?"bottom":"right"==h&&k.right+l>p.width?"left":"left"==h&&k.left-l<p.left?"right":h,f.removeClass(n).addClass(h)}var q=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(q,h);var r=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",r).emulateTransitionEnd(c.TRANSITION_DURATION):r()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top=b.top+g,b.left=b.left+h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=this.tip(),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.width&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){return this.$tip=this.$tip||a(this.options.template)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type)})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||"destroy"!=b)&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.2",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")},c.prototype.tip=function(){return this.$tip||(this.$tip=a(this.options.template)),this.$tip};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){var e=a.proxy(this.process,this);this.$body=a("body"),this.$scrollElement=a(a(c).is("body")?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",e),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.2",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b="offset",c=0;a.isWindow(this.$scrollElement[0])||(b="position",c=this.$scrollElement.scrollTop()),this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight();var d=this;this.$body.find(this.selector).map(function(){var d=a(this),e=d.data("target")||d.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[b]().top+c,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){d.offsets.push(this[0]),d.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(!e[a+1]||b<=e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.2",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu")&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()
	}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=this.unpin=this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.2",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=a("body").height();"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);
});