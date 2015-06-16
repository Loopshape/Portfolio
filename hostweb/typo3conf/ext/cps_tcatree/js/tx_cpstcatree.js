/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Nicole Cordes <cordes@cps-it.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * @author	Nicole Cordes
 * @author	Rupert Germann
 * modified for the tt_news category menu by Rupert Germann <rupi@gmx.li>
 *
 */

var tceFormsItemTree = {
	thisScript:'ajax.php',
	ajaxID:'tceFormsItemTree::expandCollapse',
	frameSetModule:null,
	activateDragDrop:true,
	highlightClass:'active',

	load:function(params, isExpand, obj, tceFormsTable, tceFormsField, recID) {
		// fallback if AJAX is not possible (e.g. IE < 6)
		if (typeof Ajax.getTransport() != 'object') {
			window.location.href = this.thisScript + '?ajaxID=' + this.ajaxID + '&PM=' + params;
			return;
		}

		if (!isExpand) {
			var ul = obj.parentNode.getElementsByTagName('ul')[0];
			obj.parentNode.removeChild(ul); // no remove() directly because of IE 5.5
			var pm = Selector.findChildElements(obj.parentNode, ['.pm'])[0]; // Getting pm object by CSS selector (because document.getElementsByClassName() doesn't seem to work on Konqueror)
			if (pm) {
				pm.onclick = null;
				Element.cleanWhitespace(pm);
				pm.firstChild.src = pm.firstChild.src.replace('minus', 'plus');
			}
		} else {
			obj.style.cursor = 'wait';
		}

		new Ajax.Request(this.thisScript, {
			//method: 'get',
			parameters:'ajaxID=' + this.ajaxID + '&PM=' + params + '&tceFormsTable=' + tceFormsTable + '&tceFormsField=' + tceFormsField + '&recID=' + recID,
			onComplete:function(xhr) {
				if (xhr.readyState == 4) {
					// the parent node needs to be overwritten, not the object
					$(obj.parentNode).replace(xhr.responseText);
					this.registerDragDropHandlers();
					//this.reSelectActiveItem();
					//filter($('_livesearch').value);
				}
			}.bind(this),
			onT3Error:function(xhr) {
				// if this is not a valid ajax response, the whole page gets refreshed
				this.refresh();
			}.bind(this)
		});
	},

	// does the complete page refresh (previously known as "_refresh_nav()")
	refresh:function() {
		var r = new Date();
		// randNum is useful so pagetree does not get cached in browser cache when refreshing
		var search = window.location.search.replace(/&randNum=\d+/, '');
		window.location.search = search + '&randNum=' + r.getTime();
	},

	// attaches the events to the elements needed for the drag and drop (for the titles and the icons)
	registerDragDropHandlers:function() {
		if (!this.activateDragDrop) return;
		this._registerDragDropHandlers('dragTitle');
		this._registerDragDropHandlers('dragIcon');
	},

	_registerDragDropHandlers:function(className) {
		var elements = Selector.findChildElements($('tree'), ['.' + className]); // using Selector because document.getElementsByClassName() doesn't seem to work on Konqueror
		for (var i = 0; i < elements.length; i++) {
			Event.observe(elements[i], 'mousedown', function(event) {
				DragDrop.dragElement(event);
			}, true);
			Event.observe(elements[i], 'dragstart', function(event) {
				DragDrop.dragElement(event);
			}, false);
			Event.observe(elements[i], 'mouseup', function(event) {
				DragDrop.dropElement(event);
			}, false);
		}
	}
};



