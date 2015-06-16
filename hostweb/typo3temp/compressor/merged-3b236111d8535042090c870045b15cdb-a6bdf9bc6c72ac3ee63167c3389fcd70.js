
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
 * Javascript compatibility file for a breaking change to the
 * flashmessage javascript object
 * @deprecated since TYPO3 CMS 7, this file will be removed in TYPO3 CMS 9
 */

// map old Severity object to the new one
var Severity = {
	notice: -2,
	// @deprecated since TYPO3 CMS 7, will be removed in TYPO3 CMS 9, use info instead of information
	information: -1,
	info: -1,
	ok: 0,
	warning: 1,
	error: 2
};
if (!TYPO3.Severity) {
	TYPO3.Severity = Severity;
}
if (!top.TYPO3.Severity) {
	top.TYPO3.Severity = Severity;
}

// map old Flashmessage API to the new one
if (!TYPO3.Flashmessage) {
	TYPO3.Flashmessage = {};
	TYPO3.Flashmessage.display = function(severity, title, message, duration) {
		if (console !== undefined) {
			console.log('TYPO3.Flashmessage.display is deprecated and will be removed with CMS 9, please use top.TYPO3.Notification.*');
		}
		// never use showMessage, this only allowed at this place for
		// compatibility to the old flashMessage api! showMessage is declared as private!
		top.TYPO3.Notification.showMessage(title, message, severity, duration);
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

Ext.namespace('TYPO3');

TYPO3.BackendLiveSearch = Ext.extend(Ext.form.ComboBox, {
	autoSelect: false,
	ctCls: 'live-search-results',
	dataProvider: null,
	searchResultsPid : 0,
	displayField: 'title',
	emptyText: null,
	enableKeyEvents: true,
	helpTitle: null,
	hideTrigger: true,
	itemSelector: 'div.search-item-title',
	listAlign : 'tr-br',
	listClass: 'live-search-list',
	listEmptyText: null,
	listWidth: 400,
	listHovered: false,
	loadingText: null,
	minChars: 1,
	resizable: false,
	title: null,
	triggerClass : 'x-form-clear-trigger',
	triggerConfig: '<span class="t3-icon fa fa-remove"></span>',
	onTriggerClick: function() {
		// Empty the form field, give it focus, and collapse the results
		this.reset(this);
		this.focus();
		this.collapse();
	},
	tpl: new Ext.XTemplate(
		'<table border="0" cellspacing="0">',
			'<tpl for=".">',
				'<tr class="search-item">',
					'<td class="search-item-type">{recordTitle}</td>',
					'<td class="search-item-content" width="95%">',
						'<div class="search-item-title">{iconHTML} {title}</div>',
					'</td>',
				'</tr>',
			'</tpl>',
		'</table>'
	),

	dataReader : new Ext.data.JsonReader({
		idProperty : 'type',
		root : 'searchItems',
		fields : [
			{name: 'recordTitle'},
			{name: 'pageId'},
			{name: 'id'},
			{name: 'iconHTML'},
			{name: 'title'},
			{name: 'editLink'}
		]
	}),
	listeners: {
		select : {
			scope: this,
			fn: function (combo, record, index) {
				jump(record.data.editLink, 'web_list', 'web', record.data.pageId);
			}
		},
		focus : {
			fn: function() {
				if (this.getValue() == this.emptyText) {
					this.reset(this);
				}
			}
		},
		specialkey : function (field, e) {
			if (e.getKey() == e.RETURN || e.getKey() == e.ENTER) {
				if (this.dataReader.jsonData.pageJump != '') {
					jump(this.dataReader.jsonData.pageJump, 'web_list', 'web');
				} else {
					TYPO3.ModuleMenu.App.showModule('web_list', this.getSearchResultsUrl(this.getValue()));
				}
			}
		},
		keyup : function() {
			if ((this.getValue() == this.emptyText) || (this.getValue() == '')) {
				this.setHideTrigger(true);
			} else {
				this.setHideTrigger(false);
			}
		}
	},

	/**
	 * Initializes the component.
	 */
	initComponent: function() {
		this.store = new Ext.data.DirectStore({
			directFn: this.dataProvider.find,
			reader: this.dataReader
		});
		TYPO3.BackendLiveSearch.superclass.initComponent.apply(this, arguments);
	},

	restrictHeight : function(){
		this.innerList.dom.style.height = '';
		this.innerList.dom.style.width = '';
		this.list.beginUpdate();
		this.list.setHeight('auto');
		this.list.endUpdate();
	},

	initList : function () {
		TYPO3.BackendLiveSearch.superclass.initList.apply(this, arguments);
		var cls = 'x-combo-list';

			// Track whether the hovering over the results list or not, to aid in detecting iframe clicks.
		this.mon(this.list, 'mouseover', function() {this.listHovered = true;}, this);
		this.mon(this.list, 'mouseout', function() {this.listHovered = false; }, this);

		/**
		 * Create bottom Toolbar to the result layer
		 */
		this.footer = this.list.createChild({cls:cls+'-ft'});
		this.pageTb = new Ext.Toolbar({
			renderTo:this.footer,
			items: [{
				xtype: 'tbfill',
				autoWidth : true
			},{
				xtype: 'button',
				text: TYPO3.LLL.liveSearch.showAllResults,
				shadow: false,
				listeners : {
					scope : this,
					click : function () {
							// go to db_list.php and search for given search value
							// @todo the current selected page ID from the page tree is required
						TYPO3.ModuleMenu.App.showModule('web_list', this.getSearchResultsUrl(this.getValue()));
						this.collapse();
					}
				}
			}]
		});
	},

	initQuery : function(){
		TYPO3.BackendLiveSearch.superclass.initQuery.apply(this, arguments);
		this.removeHelp();
	},
	initHelp : function () {
		if(!this.helpList){
			var cls = 'search-list-help';

			this.helpList = new Ext.Layer({
				parentEl: this.getListParent(),
				shadow: false,
				cls: [cls, this.listClass].join(' '),
				constrain:false
			});

				// Track whether the hovering over the help list or not, to aid in detecting iframe clicks.
			this.mon(this.helpList, 'mouseover', function() {this.listHovered = true;}, this);
			this.mon(this.helpList, 'mouseout', function() {this.listHovered = false; }, this);

			this.helpList.swallowEvent('mousewheel');

			this.innerHelpList = this.helpList.createChild({cls:cls+'-inner'});
			this.mon(this.innerHelpList, 'mouseover', this.onViewOver, this);
			this.mon(this.innerHelpList, 'mousemove', this.onViewMove, this);

			if(!this.helpTpl){
				this.helpTpl = '<tpl for="."><div class="'+cls+'-item">{' + this.displayField + '}</div></tpl>';
			 }

			/**
			* The {@link Ext.DataView DataView} used to display the ComboBox's options.
			* @type Ext.DataView
			*/
			this.helpView = new Ext.DataView({
				applyTo: this.innerHelpList,
				tpl: this.helpTpl,
				singleSelect: true,
				selectedClass: this.selectedClass,
				itemSelector: this.itemSelector || '.' + cls + '-item',
				emptyText: this.listEmptyText
			});

			this.helpList.createChild({
				cls: cls + '-content',
				// @todo Can we grab this content via ExtDirect?
				html: '<strong>' + this.helpTitle + '</strong><p>' + TYPO3.LLL.liveSearch.helpDescription + '<br /> ' + TYPO3.LLL.liveSearch.helpDescriptionPages + '</p>'
			});

			this.helpList.alignTo(this.wrap, this.listAlign);
			this.helpList.show();
		}
	},

	removeHelp : function() {
		if (this.helpList) {
			this.helpList.destroy();
			delete this.helpList;
		}
	},

	onFocus : function() {
		TYPO3.BackendLiveSearch.superclass.onFocus.apply(this, arguments);

		// If search is blank, show the help on focus. Otherwise, show last results
		if (this.getValue() == '') {
			this.initHelp();
		} else {
			this.expand();
		}
	},

	/**
	 * Fired when search results are clicked. We do not want the search result
	 * appear so we always set doFocus = false
	 */
	onViewClick : function(doFocus){
		doFocus = false;
		TYPO3.BackendLiveSearch.superclass.onViewClick.apply(this, arguments);
	},

	postBlur : function() {
		TYPO3.BackendLiveSearch.superclass.postBlur.apply(this, arguments);
		this.removeHelp();
	},

	getTriggerWidth : function() {
		// Trigger is inset, so width used in calculations is 0
		return 0;
	},

	reset : function() {
	    this.originalValue = this.emptyText;
		this.setHideTrigger(true);
		TYPO3.BackendLiveSearch.superclass.reset.apply(this, arguments);
	},

	getSearchResultsUrl : function(searchTerm) {
		return 'id=' + this.searchResultsPid + '&search_levels=4&search_field=' + searchTerm;
	},

	handleBlur : function(e) {

		if (!this.listHovered) {
			this.hasFocus = false;
			if (this.getValue() == '') {
				this.reset();
			}
			this.postBlur();
		}

	}
});

var TYPO3LiveSearch;

Ext.onReady(function() {
	TYPO3LiveSearch = new TYPO3.BackendLiveSearch({
		dataProvider: TYPO3.LiveSearchActions.ExtDirect,
		title: TYPO3.LLL.liveSearch.title,
		helpTitle: TYPO3.LLL.liveSearch.helpTitle,
		emptyText: TYPO3.LLL.liveSearch.emptyText,
		loadingText: TYPO3.LLL.liveSearch.loadingText,
		listEmptyText: TYPO3.LLL.liveSearch.listEmptyText
	});

	TYPO3LiveSearch.applyToMarkup(Ext.get('live-search-box'));

		// Add a blur event listener outside the ExtJS widget to handle clicks in iframes also.
	Ext.get('live-search-box').on('blur', TYPO3LiveSearch.handleBlur, TYPO3LiveSearch);
});

TYPO3.LLL = {"core":{"waitTitle":"Logging in...","refresh_login_failed":"Login failed","refresh_login_failed_message":"Password not correct.","refresh_login_title":"Refresh Login to TYPO3 (User: loopshape)","login_expired":"Your TYPO3 login has expired. You need to login again if you want to continue. Otherwise you can close the current browser window.","refresh_login_username":"Username","refresh_login_password":"Password","refresh_login_emptyPassword":"Empty password is not allowed!","refresh_login_button":"Login","refresh_logout_button":"Logout","please_wait":"Please wait ...","loadingIndicator":"Loading ...","be_locked":"The TYPO3 backend is currently locked for maintenance. Leave this browser window open and the backend will automatically become available again once maintenance is complete.","refresh_login_countdown_singular":"{0} second","refresh_login_countdown":"{0} seconds","login_about_to_expire":"Your TYPO3 login is about to expire. Please confirm that you want to stay logged in.","login_about_to_expire_title":"TYPO3 login expiration notice","refresh_login_refresh_button":"Stay logged in!","refresh_direct_logout_button":"No, log out.","tabs_closeAll":"Close All Tabs","tabs_closeOther":"Close Other Tabs","tabs_close":"Close Tab","tabs_openInBrowserWindow":"Open In Browser Window","csh_tooltip_loading":"Loading help..."},"fileUpload":{"windowTitle":"File Upload Progress","buttonSelectFiles":"Select Files","buttonCancelAll":"Cancel All Uploads","infoComponentMaxFileSize":"You can upload files with a maximum size of {0}.","infoComponentFileUploadLimit":"You can upload a total of {0}.","infoComponentFileTypeLimit":"You can upload the following file types {0}.","infoComponentOverrideFiles":"Overwrite existing files","processRunning":"Another process is already uploading","uploadWait":"Waiting to start upload of {0}","uploadStarting":"Starting upload of {0}","uploadProgress":"{0}% of {1} uploaded","uploadSuccess":"{0} was successfully uploaded!","errorQueueLimitExceeded":"Too many files selected","errorQueueFileSizeLimit":"{0} is too big","errorQueueZeroByteFile":"{0} is empty","errorQueueInvalidFiletype":"Filetype not allowed for {0}","errorUploadHttp":"Too many files selected","errorUploadMissingUrl":"Internal error: No Upload URL set","errorUploadIO":"Internal error: Problems while reading\/writing the file","errorUploadSecurityError":"Internal error: {0}","errorUploadLimit":"Upload limit exceeded","errorUploadFailed":"Upload failed","errorUploadFileIDNotFound":"Internal error: File ID not found","errorUploadFileValidation":"Internal error while validating the file","errorUploadFileCancelled":"Upload of {0} canceled","errorUploadStopped":"Upload of {0} stopped","allErrorMessageTitle":"All uploads failed","allErrorMessageText":"All of your uploads failed.<br \/><br \/>If this problem persists, please try another browser, contact your administrator or disable this \"Flash Uploader\" in your User Settings.<br \/><br \/>Detailed problem description:<br \/>","allError401":"The server returned the status code 401, which is related to a .htaccess file used for password protection on your server. Unfortunately this can not be handled by your browser's Flash plugin.","allError2038":"An input\/output error occurred (Error #2038). This i.e. happens with servers using a self-signed SSL certificate, which is a limitation of your browser's Flash plugin."},"liveSearch":{"title":"Short result list","helpTitle":"How to use advanced search tags","emptyText":"Enter search term","loadingText":"Searching...","listEmptyText":"No results found.","showAllResults":"Show All","helpDescription":"Search in certain tables:","helpDescriptionPages":"#page:Home will search for all pages with the title \"Home\"","helpDescriptionContent":""},"viewPort":{"tooltipModuleMenuSplit":"Drag to resize the Modules Menu","tooltipNavigationContainerSplitDrag":"Drag to resize or double click to collapse the page tree area","tooltipNavigationContainerSplitClick":"Click to toggle the page tree area","tooltipDebugPanelSplitDrag":"Drag to resize or click to collapse the Debug Panel."}};
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
 * Class to render the module menu and handle the BE navigation
 *
 * @author	Steffen Kamper
 */


Ext.ns('TYPO3', 'ModuleMenu');

TYPO3.ModuleMenu = {};

TYPO3.ModuleMenu.App = {
	loadedModule: null,
	loadedNavigationComponentId: '',
	availableNavigationComponents: {},

	initialize: function() {
		var me = this;

		// load the start module
		if (top.startInModule && top.startInModule[0] && TYPO3.jQuery('#' + top.startInModule[0]).length > 0) {
			me.showModule(top.startInModule[0], top.startInModule[1]);
		} else {
			// fetch first module
			me.showModule(TYPO3.jQuery('.typo3-module-menu-item:first').attr('id'));
		}

		// check if there are collapsed items in the users' configuration
		require(['TYPO3/CMS/Backend/Storage'], function() {
			var collapsedMainMenuItems = me.getCollapsedMainMenuItems();
			TYPO3.jQuery.each(collapsedMainMenuItems, function(key, itm) {
				if (itm !== true) {
					return;
				}
				var $group = TYPO3.jQuery('#' + key);
				if ($group.length > 0) {
					var $groupContainer = $group.find('.typo3-module-menu-group-container');
					$group.addClass('collapsed').removeClass('expanded');
					$groupContainer.hide().promise().done(function() {
						TYPO3.Backend.doLayout();
					});
				}
			});
			me.initializeEvents();
		});
	},

	initializeEvents: function() {
		var me = this;
		TYPO3.jQuery(document).on('click', '.typo3-module-menu-group .typo3-module-menu-group-header', function() {
			var $group = TYPO3.jQuery(this).parent('.typo3-module-menu-group');
			var $groupContainer = $group.find('.typo3-module-menu-group-container');
			if ($group.hasClass('expanded')) {
				me.addCollapsedMainMenuItem($group.attr('id'));
				$group.addClass('collapsed').removeClass('expanded');
				$groupContainer.slideUp().promise().done(function() {
					TYPO3.Backend.doLayout();
				});
			} else {
				me.removeCollapseMainMenuItem($group.attr('id'));
				$group.addClass('expanded').removeClass('collapsed');
				$groupContainer.slideDown().promise().done(function() {
					TYPO3.Backend.doLayout();
				});
			}
		});
		// register clicking on sub modules
		TYPO3.jQuery(document).on('click', '.typo3-module-menu-item,.t3-menuitem-submodule', function(evt) {
			evt.preventDefault();
			me.showModule(TYPO3.jQuery(this).attr('id'));
		});
	},

	/* fetch the data for a submodule */
	getRecordFromName: function(name) {
		var $subModuleElement = TYPO3.jQuery('#' + name);
		return {
			name: name,
			navigationComponentId: $subModuleElement.data('navigationcomponentid'),
			navigationFrameScript: $subModuleElement.data('navigationframescript'),
			navigationFrameScriptParam: $subModuleElement.data('navigationframescriptparameters'),
			link: $subModuleElement.find('a').attr('href')
		};
	},

	showModule: function(mod, params) {
		params = params || '';
		params = this.includeId(mod, params);
		var record = this.getRecordFromName(mod);
		this.loadModuleComponents(record, params);
	},

	loadModuleComponents: function(record, params) {
		var mod = record.name;
		if (record.navigationComponentId) {
			this.loadNavigationComponent(record.navigationComponentId);
			TYPO3.Backend.NavigationDummy.hide();
			TYPO3.Backend.NavigationIframe.getEl().parent().setStyle('overflow', 'auto');
		} else if (record.navigationFrameScript) {
			TYPO3.Backend.NavigationDummy.hide();
			TYPO3.Backend.NavigationContainer.show();
			this.loadNavigationComponent('typo3-navigationIframe');
			this.openInNavFrame(record.navigationFrameScript, record.navigationFrameScriptParam);
			TYPO3.Backend.NavigationIframe.getEl().parent().setStyle('overflow', 'hidden');
		} else {
			TYPO3.Backend.NavigationContainer.hide();
			TYPO3.Backend.NavigationDummy.show();
		}

		this.highlightModuleMenuItem(mod);
		this.openInContentFrame(record.link, params);

		// compatibility
		top.currentSubScript = record.link;
		top.currentModuleLoaded = mod;

		TYPO3.Backend.doLayout();
	},

	includeId: function(mod, params) {
			//get id
		var section = mod.split('_')[0];
		if (top.fsMod.recentIds[section]) {
			params = 'id=' + top.fsMod.recentIds[section] + '&' + params;
		}

		return params;
	},

	loadNavigationComponent: function(navigationComponentId) {
		if (navigationComponentId === this.loadedNavigationComponentId) {
			if (TYPO3.Backend.NavigationContainer.hidden) {
				TYPO3.Backend.NavigationContainer.show();
			}

			return;
		}

		if (this.loadedNavigationComponentId !== '') {
			Ext.getCmp(this.loadedNavigationComponentId).hide();
		}

		var component = Ext.getCmp(navigationComponentId);
		if (typeof component !== 'object') {
			if (typeof this.availableNavigationComponents[navigationComponentId] !== 'function') {
				throw 'The navigation component "' + navigationComponentId + '" is not available ' +
					'or has no valid callback function';
			}

			component = this.availableNavigationComponents[navigationComponentId]();
			TYPO3.Backend.NavigationContainer.add(component);
		}

		component.show()

			// backwards compatibility
		top.nav = component;

		TYPO3.Backend.NavigationContainer.show();
		this.loadedNavigationComponentId = navigationComponentId;
	},

	registerNavigationComponent: function(componentId, initCallback) {
		this.availableNavigationComponents[componentId] = initCallback;
	},

	openInNavFrame: function(url, params) {
		var navUrl = url + (params ? (url.indexOf('?') !== -1 ? '&' : '?') + params : '');
		var currentUrl = this.relativeUrl(TYPO3.Backend.NavigationIframe.getUrl());
		if (currentUrl !== navUrl) {
			TYPO3.Backend.NavigationIframe.setUrl(navUrl);
		}
	},

	openInContentFrame: function(url, params) {
		if (top.nextLoadModuleUrl) {
			TYPO3.Backend.ContentContainer.setUrl(top.nextLoadModuleUrl);
			top.nextLoadModuleUrl = '';
		} else {
			var urlToLoad = url + (params ? (url.indexOf('?') !== -1 ? '&' : '?') + params : '')
			TYPO3.Backend.ContentContainer.setUrl(urlToLoad);
		}
	},

	highlightModuleMenuItem: function(module, mainModule) {
		TYPO3.jQuery('.typo3-module-menu-item.active').removeClass('active');
		TYPO3.jQuery('#' + module).addClass('active');
	},

	relativeUrl: function(url) {
		return url.replace(TYPO3.configuration.siteUrl + 'typo3/', '');
	},

		// refresh the HTML by fetching the menu again
	refreshMenu: function() {
		TYPO3.jQuery.ajax(TYPO3.settings.ajaxUrls['ModuleMenu::reload']).done(function(result) {
			TYPO3.jQuery('#typo3-menu').replaceWith(result.menu);
			if (top.currentModuleLoaded) {
				TYPO3.ModuleMenu.App.highlightModuleMenuItem(top.currentModuleLoaded);
			}
			TYPO3.Backend.doLayout();
		});
	},

	reloadFrames: function() {
		TYPO3.Backend.NavigationIframe.refresh();
		TYPO3.Backend.ContentContainer.refresh();
	},

	/**
	 * fetches all module menu elements in the local storage that should be collapsed
	 * @returns {*}
	 */
	getCollapsedMainMenuItems: function() {
		if (TYPO3.Storage.Persistent.isset('modulemenu')) {
			return JSON.parse(TYPO3.Storage.Persistent.get('modulemenu'));
		} else {
			return {};
		}
	},

	/**
	 * adds a module menu item to the local storage
	 * @param item
	 */
	addCollapsedMainMenuItem: function(item) {
		var existingItems = this.getCollapsedMainMenuItems();
		existingItems[item] = true;
		TYPO3.Storage.Persistent.set('modulemenu', JSON.stringify(existingItems));
	},

	/**
	 * removes a module menu item from the local storage
	 * @param item
	 */
	removeCollapseMainMenuItem: function(item) {
		var existingItems = this.getCollapsedMainMenuItems();
		delete existingItems[item];
		TYPO3.Storage.Persistent.set('modulemenu', JSON.stringify(existingItems));
	}

};



Ext.onReady(function() {
	TYPO3.ModuleMenu.App.initialize();

		// keep backward compatibility
	top.list = TYPO3.Backend.ContentContainer;
	top.list_frame = top.list.getIframe();
	top.nav_frame = TYPO3.Backend.NavigationContainer.PageTree;

	top.TYPO3ModuleMenu = TYPO3.ModuleMenu.App;
	top.content = {
		nav_frame: TYPO3.Backend.NavigationContainer.PageTree,
		list_frame: TYPO3.Backend.ContentContainer.getIframe(),
		location: TYPO3.Backend.ContentContainer.getIframe().location,
		document: TYPO3.Backend.ContentContainer.getIframe()
	}
});


/*******************************************************************************
*
* Backwards compatibility handling down here
*
******************************************************************************/

/**
* Highlight module:
*/
var currentlyHighLightedId = '';
var currentlyHighLighted_restoreValue = '';
var currentlyHighLightedMain = '';
function highlightModuleMenuItem(trId, mainModule) {
	TYPO3.ModuleMenu.App.highlightModule(trId, mainModule);
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

/*!
 * Ext JS Library 3.2.1
 * Copyright(c) 2006-2010 Ext JS, Inc.
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
/**
 * @class Ext.ux.TabCloseMenu
 * @extends Object 
 * Plugin (ptype = 'tabclosemenu') for adding a close context menu to tabs. Note that the menu respects
 * the closable configuration on the tab. As such, commands like remove others and remove all will not
 * remove items that are not closable.
 * 
 * @constructor
 * @param {Object} config The configuration options
 * @ptype tabclosemenu
 */
Ext.ux.TabCloseMenu = Ext.extend(Object, {
    /**
     * @cfg {String} closeTabText
     * The text for closing the current tab. Defaults to <tt>'Close Tab'</tt>.
     */
    closeTabText: 'Close Tab',

    /**
     * @cfg {String} closeOtherTabsText
     * The text for closing all tabs except the current one. Defaults to <tt>'Close Other Tabs'</tt>.
     */
    closeOtherTabsText: 'Close Other Tabs',
    
    /**
     * @cfg {Boolean} showCloseAll
     * Indicates whether to show the 'Close All' option. Defaults to <tt>true</tt>. 
     */
    showCloseAll: true,

    /**
     * @cfg {String} closeAllTabsText
     * <p>The text for closing all tabs. Defaults to <tt>'Close All Tabs'</tt>.
     */
    closeAllTabsText: 'Close All Tabs',
    
    /**
	 * @cfg {Array} custom menu entries
	 */
	customMenuEntries: [],

    
    constructor : function(config){
        Ext.apply(this, config || {});
    },

    //public
    init : function(tabs){
        this.tabs = tabs;
        tabs.on({
            scope: this,
            contextmenu: this.onContextMenu,
            destroy: this.destroy
        });
    },
    
    destroy : function(){
        Ext.destroy(this.menu);
        delete this.menu;
        delete this.tabs;
        delete this.active;    
    },

    // private
    onContextMenu : function(tabs, item, e){
        this.active = item;
        var m = this.createMenu(),
            disableAll = true,
            disableOthers = true,
            closeAll = m.getComponent('closeall');
        
        m.getComponent('close').setDisabled(!item.closable);
        tabs.items.each(function(){
            if(this.closable){
                disableAll = false;
                if(this != item){
                    disableOthers = false;
                    return false;
                }
            }
			return true;
        });
        m.getComponent('closeothers').setDisabled(disableOthers);
        if(closeAll){
            closeAll.setDisabled(disableAll);
        }
        
        e.stopEvent();
        m.showAt(e.getPoint());
    },
    
    createMenu : function(){
        if(!this.menu){
            var items = [{
                itemId: 'close',
                text: this.closeTabText,
                scope: this,
                handler: this.onClose
            }];
            if(this.showCloseAll){
                items.push('-');
            }
            items.push({
                itemId: 'closeothers',
                text: this.closeOtherTabsText,
                scope: this,
                handler: this.onCloseOthers
            });
            if(this.showCloseAll){
                items.push({
                    itemId: 'closeall',
                    text: this.closeAllTabsText,
                    scope: this,
                    handler: this.onCloseAll
                });
            }
            if (this.customMenuEntries.length) {
            	this.customMenuEntries.each(function(item) {
            		items.push(item);
            	});
            }
            
            this.menu = new Ext.menu.Menu({
                items: items
            });
        }
        return this.menu;
    },
    
    onClose : function(){
        this.tabs.remove(this.active);
    },
    
    onCloseOthers : function(){
        this.doClose(true);
    },
    
    onCloseAll : function(){
        this.doClose(false);
    },
    
    doClose : function(excludeActive){
        var items = [];
        this.tabs.items.each(function(item){
            if(item.closable){
                if(!excludeActive || item != this.active){
                    items.push(item);
                }    
            }
        }, this);
        Ext.each(items, function(item){
            this.tabs.remove(item);
        }, this);
    }
});

Ext.preg('tabclosemenu', Ext.ux.TabCloseMenu);

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
 * common storage and global object, could later hold more information about the current user etc.
 */
var TYPO3 = TYPO3 || {};
TYPO3 = Ext.apply(TYPO3, {
	// store instances that only should be running once
	_instances: {},
	getInstance: function(className) {
		return TYPO3._instances[className] || false;
	},
	addInstance: function(className, instance) {
		TYPO3._instances[className] = instance;
		return instance;
	},

	helpers: {
		// creates an array by splitting a string into parts, taking a delimiter
		split: function(str, delim) {
			var res = [];
			while (str.indexOf(delim) > 0) {
				res.push(str.substr(0, str.indexOf(delim)));
				str = str.substr(str.indexOf(delim) + delim.length);
			}
			return res;
		}
	}
});

/**
 * general backend javascript functions
 */

Ext.ns('TYPO3.configuration');

/**
 * jump the backend to a module
 */
function jump(url, modName, mainModName, pageId) {
	if (isNaN(pageId)) {
		pageId = -2;
	}
		// clear information about which entry in nav. tree that might have been highlighted.
	top.fsMod.navFrameHighlightedID = [];
	top.fsMod.recentIds['web'] = pageId;

	if (top.TYPO3.Backend.NavigationContainer.PageTree) {
		top.TYPO3.Backend.NavigationContainer.PageTree.refreshTree();
	}

	top.nextLoadModuleUrl = url;
	top.TYPO3.ModuleMenu.App.showModule(modName);

}

/**
 * shortcut manager to delegate the action of creating shortcuts to the new
 * backend.php shortcut menu or the old shortcut frame depending on what is available
 */
var ShortcutManager = {

	/**
	 * central entry point to create a shortcut, delegates the call to correct endpoint
	 * kept for backwards compatibility, use top.TYPO3.ShortcutMenu.createShortcut directly
	 * in the future
	 */
	createShortcut: function(confirmQuestion, backPath, moduleName, url) {
		if (console) {
			console.debug('ShortcutManager.createShortcut is deprecated since TYPO3 CMS 7, use TYPO3.ShortcutMenu directly.');
		}
		if (TYPO3.ShortcutMenu !== undefined) {
			TYPO3.ShortcutMenu.createShortcut(moduleName, url, confirmQuestion);
		}
	}
}


/**
 * Function similar to PHPs  rawurlencode();
 */
function rawurlencode(str) {
	var output = escape(str);
	output = str_replace("*","%2A", output);
	output = str_replace("+","%2B", output);
	output = str_replace("/","%2F", output);
	output = str_replace("@","%40", output);
	return output;
}

/**
 * Function to similar to PHPs  rawurlencode() which removes TYPO3_SITE_URL;
 */
function rawurlencodeAndRemoveSiteUrl(str)	{	//
	var siteUrl = TYPO3.configuration.siteUrl;
	return rawurlencode(str_replace(siteUrl, "", str));
}

/**
 * String-replace function
 */
function str_replace(match,replace,string)	{	//
	var input = ""+string;
	var matchStr = ""+match;
	if (!matchStr)	{return string;}
	var output = "";
	var pointer=0;
	var pos = input.indexOf(matchStr);
	while (pos !== -1) {
		output+=""+input.substr(pointer, pos-pointer)+replace;
		pointer=pos+matchStr.length;
		pos = input.indexOf(match,pos+1);
	}
	output+=""+input.substr(pointer);
	return output;
}



/**
 * Launcing information window for records/files (fileref as "table" argument)
 */
function launchView(table, uid, bP) {
	var thePreviewWindow = "";
	thePreviewWindow = window.open(TYPO3.settings.ShowItem.moduleUrl + '&table=' + encodeURIComponent(table) + "&uid=" + encodeURIComponent(uid),
			"ShowItem" + TS.uniqueID,
			"width=650,height=600,status=0,menubar=0,resizable=0,location=0,directories=0,scrollbars=1,toolbar=0");
	if (thePreviewWindow && thePreviewWindow.focus) {
		thePreviewWindow.focus();
	}
}

/**
 * Opens plain window with url
 */
function openUrlInWindow(url,windowName)	{	//
	regularWindow = window.open(
		url,
		windowName,
		"status=1,menubar=1,resizable=1,location=1,directories=0,scrollbars=1,toolbar=1");
	regularWindow.focus();
	return false;
}

/**
 * Loads a page id for editing in the page edit module:
 */
function loadEditId(id,addGetVars)	{	//
	top.fsMod.recentIds.web = id;
	top.fsMod.navFrameHighlightedID.web = "pages" + id + "_0";		// For highlighting

	if (top.content && top.content.nav_frame && top.content.nav_frame.refresh_nav) {
		top.content.nav_frame.refresh_nav();
	}
	if (TYPO3.configuration.pageModule) {
		top.goToModule(TYPO3.configuration.pageModule, 0, addGetVars?addGetVars:"");
	}
}

/**
 * Returns incoming URL (to a module) unless nextLoadModuleUrl is set. If that is the case nextLoadModuleUrl is returned (and cleared)
 * Used by the shortcut frame to set a "intermediate URL"
 */
var nextLoadModuleUrl="";
function getModuleUrl(inUrl)	{	//
	var nMU;
	if (top.nextLoadModuleUrl) {
		nMU=top.nextLoadModuleUrl;
		top.nextLoadModuleUrl="";
		return nMU;
	} else {
		return inUrl;
	}
}

/**
 * Print properties of an object
 */
function debugObj(obj,name)	{	//
	var acc;
	for (var i in obj) {
		if (obj[i]) {
			acc+=i+":  "+obj[i]+"\n";
		}
	}
	alert("Object: "+name+"\n\n"+acc);
}



	// Used by Frameset Modules
var currentSubScript = "";
var currentSubNavScript = "";

	// Used for tab-panels:
var DTM_currentTabs = [];

	// status of WS FE preview
var WorkspaceFrontendPreviewEnabled = TYPO3.configuration.workspaceFrontendPreviewEnabled;

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

Ext.ns('TYPO3');

	// override splitregion to fit the splitbars in our design
Ext.override(Ext.layout.BorderLayout.SplitRegion, {
	render : function(ct, p) {
		Ext.layout.BorderLayout.SplitRegion.superclass.render.call(this, ct, p);

		var ps = this.position;

		this.splitEl = ct.createChild({
			cls: "x-layout-split x-layout-split-" + ps, html: " ",
			id: this.panel.id + '-xsplit'
		});

		if (this.enableChildSplit) {
			this.splitChildEl = this.splitEl.createChild({
				cls: 'x-layout-mini-wrapper'
			});

		}
		if (this.collapseMode == 'mini') {
			this.miniSplitEl = this.splitEl.createChild({
				cls: "x-layout-mini x-layout-mini-" + ps, html: " "
			});
			this.miniSplitEl.addClassOnOver('x-layout-mini-over');
			this.miniSplitEl.on('click', this.onCollapseClick, this, {stopEvent:true});
			this.miniSplitEl.dom.title = this.collapsible ? this.collapsibleSplitClickTip : this.splitTip;
		}

		var s = this.splitSettings[ps];

		if (this.enableChildSplit) {
			this.split = new Ext.SplitBar(this.splitChildEl.dom, p.el, s.orientation);
		} else {
			this.split = new Ext.SplitBar(this.splitEl.dom, p.el, s.orientation);
		}
		this.split.tickSize = this.tickSize;
		this.split.placement = s.placement;
		this.split.getMaximumSize = this[s.maxFn].createDelegate(this);
		this.split.minSize = this.minSize || this[s.minProp];
		this.split.on("beforeapply", this.onSplitMove, this);
		this.split.useShim = this.useShim === true;
		this.maxSize = this.maxSize || this[s.maxProp];

		if (p.hidden) {
			this.splitEl.hide();
		}

		if (this.useSplitTips) {
			this.splitEl.dom.title = this.collapsible ? this.collapsibleSplitTip : this.splitTip;
		}
		if (this.collapsible) {
			this.splitEl.on("dblclick", this.onCollapseClick, this);
		}
	}
});
/**
 * Extends the viewport with some functionality for TYPO3.
 *
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Viewport = Ext.extend(Ext.Viewport, {
	/**
	 * Contains the navigation widgets in a simple array and identified by an unique idea
	 *
	 * @see registerNavigationWidget()
	 * @var object
	 */
	navigationWidgetContainer: {},

	/**
	 * Contains the meta informations of the navigation widgets
	 *
	 * @see registerNavigationWidget()
	 * @var object
	 */
	navigationWidgetMetaData: {},

	/**
	 * The topbar area
	 *
	 * @var Ext.Panel
	 */
	Topbar: null,

	/**
	 * The content area
	 *
	 * @var Ext.Panel
	 */
	ContentContainer: null,

	/**
	 * The navigation frame area
	 *
	 * @var Ext.Panel
	 */
	NavigationContainer: null,

	/**
	 * Dummy panel, shown when no NavigationContainer is in use
	 *
	 * @var Ext.Panel
	 */
	NavigationDummy: null,

	/**
	 * The iframe navigation component
	 *
	 * @var TYPO3.iframePanel
	 */
	NavigationIframe: null,

	/**
	 * The module menu area
	 *
	 * @var Ext.Panel
	 */
	ModuleMenuContainer: null,

	/**
	 * The debug console
	 *
	 * @var Ext.TabPanel
	 */
	DebugConsole: null,

	/**
	 * Initializes the ExtJS viewport with the given configuration.
	 *
	 * @return void
	 */
	initComponent: function() {
		// adjust the module menu and the height of the topbar
		this.initialConfig.items[0].height = TYPO3.configuration.topBarHeight;

		var moduleMenu = this.initialConfig.items[1];
		moduleMenu.width = TYPO3.configuration.moduleMenuWidth;

		// call parent constructor
		TYPO3.Viewport.superclass.initComponent.apply(this, arguments);

		this.ContentContainer = Ext.getCmp('typo3-contentContainer');
		this.NavigationContainer = Ext.getCmp('typo3-navigationContainer');
		this.NavigationDummy = Ext.getCmp('typo3-navigationDummy');
		this.NavigationIframe = Ext.getCmp('typo3-navigationIframe');
		this.Topbar = Ext.getCmp('typo3-topbar');
		this.ModuleMenuContainer = Ext.getCmp('typo3-module-menu');
	}
});

Ext.reg('typo3Viewport', TYPO3.Viewport);

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
 * iFrame panel
 *
 * @author	Steffen Kamper
 */

Ext.ns('TYPO3');

TYPO3.iframePanel = Ext.extend(Ext.Panel, {
	name: 'iframe',
	iframe: null,
	src: Ext.isIE && Ext.isSecure ? Ext.SSL_SECURE_URL : 'about:blank',
	showLoadingIndicator: true,

		// component build
	initComponent: function() {
		this.bodyCfg = {
			tag: 'iframe',
			frameborder: '0',
			src: this.src,
			name: this.name,
			style: 'float:left;' // this is needed to prevent offset of 2.5 pixel, see #15771
		}
		TYPO3.iframePanel.superclass.initComponent.apply(this, arguments);

		// apply the addListener patch for 'message:tagging'
		this.addListener = this.on;

	},

	onRender : function() {
		TYPO3.iframePanel.superclass.onRender.apply(this, arguments);
		this.iframe = window.frames[this.name];
		this.body.dom['onload'] = this.loadHandler.createDelegate(this);
	},

	loadHandler: function() {
		this.src = this.body.dom.src;
		this.finishLoader();
	},

	getIframe: function() {
		return this.iframe;
	},
	getUrl: function() {
		return this.body.dom.src;
	},

	setUrl: function(source) {
		this.body.dom.src = source;
		this.startLoader();
	},

	resetUrl: function() {
		this.setUrl(this.src);
	},

	getIdFromUrl: function() {
		var url = Ext.urlDecode(this.getUrl().split('?')[1]);
		return url.id;
	},

	refresh: function() {
		if (!this.isVisible()) {
            return;
        }
		this.startLoader();
		this.body.dom.src = this.body.dom.src;
	},

	/**
	 * wrapper function for nprogress
	 */
	startLoader: function() {
		if (this.showLoadingIndicator) {
			require(['nprogress'], function(NProgress) {
				NProgress.configure({parent: '#typo3-contentContainer', showSpinner: false});
				NProgress.start();
			});
		}
	},

	finishLoader: function() {
		if (this.showLoadingIndicator) {
			require(['nprogress'], function(NProgress) {
				NProgress.done();
			});
		}
	}
});
Ext.reg('iframePanel', TYPO3.iframePanel);

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

Ext.ns('TYPO3');

TYPO3.backendContentIframePanel = Ext.extend(TYPO3.iframePanel ,{
	setUrl: function(source) {
		var card;
		var wrapper;
		wrapper = Ext.getCmp('typo3-contentContainerWrapper');
		this.url = source;
		if(wrapper) {
			card = Ext.getCmp('typo3-card-' + TYPO3.ModuleMenu.App.loadedModule);
			if((card != undefined) && (source.search('extjspaneldummy.html') > -1)) {
				wrapper.getLayout().setActiveItem('typo3-card-' + TYPO3.ModuleMenu.App.loadedModule);
				if (typeof wrapper.getComponent(('typo3-card-' + TYPO3.ModuleMenu.App.loadedModule)).setUrl === 'function') {
					wrapper.getComponent(('typo3-card-' + TYPO3.ModuleMenu.App.loadedModule)).setUrl(source);
				}
			} else {
				wrapper.getLayout().setActiveItem(this.id);
				this.body.dom.src = source;
				this.startLoader();
			}
		}
	},

	getUrl: function () {
		var wrapper;
		var card;
		wrapper = Ext.getCmp('typo3-contentContainerWrapper');

		if(wrapper) {
			card = wrapper.getLayout().activeItem;
			if(card.id == this.id) {
				return this.body.dom.src;
			} else if(typeof card.getUrl == 'function') {
				return card.getUrl();
			} else {
				return this.url;
			}
		}
	}
});
Ext.reg('backendContentIframePanel', TYPO3.backendContentIframePanel);
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

Ext.ns('TYPO3');

/**
 * The Cards Configuration for the BE Module Cards
 *
 * New items need to be appended here
 * cards id needs to be prepended with typo3-card- the rest of the id is the
 * be module name as passed it is normally in TYPO3
 * Cards shouldn't be simple iframes for performance reasons
 *
 * @author Kay Strobach    <typo3@kay-strobach.de>
 */

TYPO3.Viewport.ContentCards = {
		// Add a card to either the config or if already rendered to the wrapper
	addContentCard: function(name,config) {
		config.id = 'typo3-card-' + name;
		if (Ext.ready) {
			Ext.getCmp('typo3-contentContainerWrapper').add(config);
		} else {
			this.cards.push(config);
		}
	},
	cards: [
			// add the old card to be compatible
		{
			id: 'typo3-contentContainer',
			border: false,
			xtype: 'backendContentIframePanel',
			name: 'content'
		}
	]
};

/**
 * The backend viewport configuration
 *
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Viewport.configuration = {
	layout: 'border',
	id: 'typo3-viewport',
	renderTo: Ext.getBody(),
	border: false,
	items: [
		{
			layout: 'absolute',
			region: 'north',
			id: 'typo3-topbar',
			height: 42,
			contentEl: 'typo3-top-container',
			border: false
		},
		{
			layout: 'fit',
			region: 'west',
			id: 'typo3-module-menu',
			contentEl: 'typo3-menu',
			collapsible: false,
			collapseMode: null,
			floatable: true,
			minWidth: 50,
			maxWidth: 400,
			hideCollapseTool: true,
			split: true,
			useSplitTips: true,
			splitTip: top.TYPO3.LLL.viewPort.tooltipModuleMenuSplit,
			enableChildSplit: true,
			border: false,
			autoScroll: true,
			listeners: {
				resize: function(cmp, adjWidth, adjHeight, rawWidth, rawHeight) {
					var containerWidth = adjWidth,
						moduleMenuWidth = document.getElementById('typo3-menu').clientWidth,
						moduleMenuMinWidth = 100,
						moduleMenuSnappedWidth = 46,
						moduleMenuSnappingClass = 'typo3-module-menu-snapped',
						forceSnapMode = (containerWidth <= moduleMenuMinWidth);
					if (forceSnapMode){
						cmp.addClass(moduleMenuSnappingClass);
						snappedWidth =  moduleMenuSnappedWidth + containerWidth - moduleMenuWidth;
						cmp.setWidth(snappedWidth);
						if(snappedWidth !== containerWidth && TYPO3.Backend){
							TYPO3.Backend.syncSize();
						}
					} else{
						this.removeClass(moduleMenuSnappingClass);
					}
				}
			}
		},
		{
			region: 'center',
			layout: 'border',
			border: false,
			items: [
				{
					region: 'west',
					layout: 'fit',
					id: 'typo3-navigationContainer',
					width: 300,
					minWidth: 20,
					floatable: true,
					animCollapse: false,
					split: true,
					enableChildSplit: true,
					collapsible: true,
					collapseMode: 'mini',
					useSplitTips: true,
					collapsibleSplitTip: top.TYPO3.LLL.viewPort.tooltipNavigationContainerSplitDrag,
					collapsibleSplitClickTip: top.TYPO3.LLL.viewPort.tooltipNavigationContainerSplitClick,
					hideCollapseTool: true,
					hidden: true,
					border: false,
					name: 'navigation',
					autoScroll: true,
					items: [
						{
							id: 'typo3-navigationIframe',
							border: false,
							hidden: true,
							xtype: 'iframePanel',
							name: 'navigation'
						}
					]
				},
				{
					region: 'center',
					layout: 'border',
					items: [
						{
							id: 'typo3-navigationDummy',
							region: 'west',
							layout: 'fit',
							border: false,
							hidden: true,
							floatable: true,
							xtime: 'iframePanel',
							width: 5
						},
						{
							id: 'typo3-contentContainerWrapper',
							border: false,
							layout: 'fit',
							name: 'content',
							region: 'center',
							xtype: 'panel',
							layout: 'card',
							activeItem: 0,
							items: TYPO3.Viewport.ContentCards.cards
						}
					]
				}
			]
		}
	]
};

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
Ext.namespace('TYPO3');

/**
 * @class TYPO3.Utility
 *
 * Generic utility methods that are not provided by ExtJs
 *
 * @namespace TYPO3
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Utility = {
	/**
	 * Checks if a given number is really a number
	 *
	 * Taken from:
	 * http://dl.dropbox.com/u/35146/js/tests/isNumber.html
	 *
	 * @param {String} number
	 * @return {Boolean}
	 */
	isNumber: function(number) {
		return !isNaN(parseFloat(number)) && isFinite(number);
	},

	/**
	 * Gets a parameter from a given url
	 *
	 * @param {string} url
	 * @param {string} parameter
	 * @return {string}
	 */
	getParameterFromUrl: function(url, parameter) {
	  var parts = url.split('?'),
		  value = '';

	  if (parts.length >= 2) {
		  var urlBase = parts.shift();
		  var queryString = parts.join('?');

		  var prefix = encodeURIComponent(parameter) + '=';
		  var parameters = queryString.split(/[&;]/g);
		  for (var i = parameters.length; i-- > 0;) {
			  if (parameters[i].lastIndexOf(prefix, 0) !== -1) {
				  value = parameters[i].split('=')[1];
				  break;
			  }
		  }
	  }

	  return value;
	}
};

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.TreeEditor
 *
 * Custom Tree Editor implementation to enable different source fields for the
 * editable label.
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.tree.TreeEditor
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.TreeEditor = Ext.extend(Ext.tree.TreeEditor, {
	/**
	 * Don't send any save events if the value wasn't changed
	 *
	 * @type {Boolean}
	 */
	ignoreNoChange: false,

	/**
	 * Edit delay
	 *
	 * @type {int}
	 */
	editDelay: 250,

	/**
	 * Indicates if an underlying shadow should be shown
	 *
	 * @type {Boolean}
	 */
	shadow: false,

	/**
	 * Listeners
	 *
	 * Handles the synchronization between the edited label and the shown label.
	 */
	listeners: {
		beforecomplete: function(node) {
			this.updatedValue = this.getValue();
			if (this.updatedValue === '') {
				this.cancelEdit();
				return false;
			}
			this.setValue(this.editNode.attributes.prefix + Ext.util.Format.htmlEncode(this.updatedValue) + this.editNode.attributes.suffix);
		},

		complete: {
			fn: function(node, newValue, oldValue) {
				if (newValue === oldValue) {
					this.fireEvent('canceledit', this);
					return false;
				}

				this.editNode.getOwnerTree().commandProvider.saveTitle(node, this.updatedValue, oldValue, this);
			}
		},

		startEdit: {
			fn: function(element, value) {
				this.field.selectText();
			}
		},

		canceledit: function() {
			var tree = this.editNode.getOwnerTree();
			if (tree.currentSelectedNode) {
				tree.currentSelectedNode.select();
			}
		}
	},

	/**
	 * Updates the edit node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {String} editableText
	 * @param {String} updatedNode
	 * @return {void}
	 */
	updateNodeText: function(node, editableText, updatedNode) {
		this.editNode.setText(this.editNode.attributes.prefix + updatedNode + this.editNode.attributes.suffix);
		this.editNode.attributes.editableText = editableText;
	},

	/**
	 * Overridden method to set another editable text than the node text attribute
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {Boolean}
	 */
	triggerEdit: function(node) {
		this.completeEdit();
		if (node.attributes.editable !== false) {
			this.editNode = node;
			if (this.tree.autoScroll) {
				Ext.fly(node.ui.getEl()).scrollIntoView(this.tree.body);
			}

			var value = node.text || '';
			if (!Ext.isGecko && Ext.isEmpty(node.text)) {
				node.setText(' ');
			}

				// TYPO3 MODIFICATION to use another attribute
			value = node.attributes.editableText;

			this.autoEditTimer = this.startEdit.defer(this.editDelay, this, [node.ui.textNode, value]);
			return false;
		}
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.TreeEditor', TYPO3.Components.PageTree.TreeEditor);

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.Tree
 *
 * Generic Tree Panel
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.tree.TreePanel
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.Tree = Ext.extend(Ext.tree.TreePanel, {
	/**
	 * Border
	 *
	 * @type {Boolean}
	 */
	border: false,

	/**
	 * Indicates if the root node is visible
	 *
	 * @type {Boolean}
	 */
	rootVisible: false,

	/**
	 * Tree Editor Instance (Inline Edit)
	 *
	 * @type {TYPO3.Components.PageTree.TreeEditor}
	 */
	treeEditor: null,

	/**
	 * Currently Selected Node
	 *
	 * @type {Ext.tree.TreeNode}
	 */
	currentSelectedNode: null,

	/**
	 * Enable the drag and drop feature
	 *
	 * @cfg {Boolean}
	 */
	enableDD: true,

	/**
	 * Drag and Drop Group
	 *
	 * @cfg {String}
	 */
	ddGroup: '',

	/**
	 * Indicates if the label should be editable
	 *
	 * @cfg {Boolean}
	 */
	labelEdit: true,

	/**
	 * User Interface Provider
	 *
	 * @cfg {Ext.tree.TreeNodeUI}
	 */
	uiProvider: null,

	/**
	 * Data Provider
	 *
	 * @cfg {Object}
	 */
	treeDataProvider: null,

	/**
	 * Command Provider
	 *
	 * @cfg {Object}
	 */
	commandProvider : null,

	/**
	 * Context menu provider
	 *
	 * @cfg {Object}
	 */
	contextMenuProvider: null,

	/**
	 * Id of the deletion drop zone if any
	 *
	 * @cfg {String}
	 */
	deletionDropZoneId: '',

	/**
	 * Main applicaton
	 *
	 * @cfg {TYPO3.Components.PageTree.App}
	 */
	app: null,

	/**
	 * Root Node Configuration
	 *
	 * @type {Object}
	 */
	rootNodeConfig: {
		id: 'root',
		expanded: true,
		nodeData: {
			id: 'root'
		}
	},

	/**
	 * Indicator if the control key is pressed
	 *
	 * @type {Boolean}
	 */
	isControlPressed: false,

	/**
	 * Context Node
	 *
	 * @type {Ext.tree.TreeNode}
	 */
	t3ContextNode: null,

	/**
	 * Context Information
	 *
	 * @type {Object}
	 */
	t3ContextInfo: {
		inCopyMode: false,
		inCutMode: false
	},

	/**
	 * Registered clicks for the double click feature
	 *
	 * @type {int}
	 */
	clicksRegistered: 0,

	/**
	 * Indicator if the control key was pressed
	 *
	 * @type {Boolean}
	 */
	controlKeyPressed: false,

	/**
	 * Listeners
	 *
	 * Event handlers that handle click events and synchronizes the label edit,
	 * double click and single click events in a useful way.
	 */
	listeners: {
			// single click handler that only triggers after a delay to let the double click event
			// a possibility to be executed (needed for label edit)
		click: {
			fn: function(node, event) {
				if (this.clicksRegistered === 2) {
					this.clicksRegistered = 0;
					event.stopEvent();
					return false;
				}

				this.clicksRegistered = 0;
				if (this.commandProvider.singleClick) {
					this.commandProvider.singleClick(node, this);
				}
			},
			delay: 400
		},

			// prevent the expanding / collapsing on double click
		beforedblclick: {
			fn: function() {
				return false;
			}
		},

			// prevents label edit on a selected node
		beforeclick: {
			fn: function(node, event) {
				if (!this.clicksRegistered && this.getSelectionModel().isSelected(node)) {
					node.fireEvent('click', node, event);
					++this.clicksRegistered;
					return false;
				}
				++this.clicksRegistered;
			}
		}
	},

	/**
	 * Initializes the component
	 *
	 * @return {void}
	 */
	initComponent: function() {
		if (!this.uiProvider) {
			this.uiProvider = TYPO3.Components.PageTree.PageTreeNodeUI;
		}
		Ext.dd.DragDropMgr.useCache = false;
		this.root = new Ext.tree.AsyncTreeNode(this.rootNodeConfig);
		this.addTreeLoader();

		if (this.labelEdit) {
			this.enableInlineEditor();
		}

		if (this.enableDD) {
			this.dragConfig = {ddGroup: this.ddGroup};
			this.enableDragAndDrop();
		}

		if (this.contextMenuProvider) {
			this.enableContextMenu();
		}

		TYPO3.Components.PageTree.Tree.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Refreshes the tree
	 *
	 * @param {Function} callback
	 * @param {Object} scope
	 * return {void}
	 */
	refreshTree: function(callback, scope) {
			// remove readable rootline elements while refreshing
		if (!this.inRefreshingMode) {
			var rootlineElements = Ext.select('.x-tree-node-readableRootline');
			if (rootlineElements) {
				rootlineElements.each(function(element) {
					element.remove();
				});
			}
		}

		this.refreshNode(this.root, callback, scope);
	},

	/**
	 * Refreshes a given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {Function} callback
	 * @param {Object} scope
	 * return {void}
	 */
	refreshNode: function(node, callback, scope) {
		if (this.inRefreshingMode) {
			return;
		}

		scope = scope || node;
		this.inRefreshingMode = true;
		var loadCallback = function(node) {
			node.ownerTree.inRefreshingMode = false;
			if (node.ownerTree.restoreState) {
				node.ownerTree.restoreState(node.getPath());
			}
		};

		if (callback) {
			loadCallback = callback.createSequence(loadCallback);
		}

		this.getLoader().load(node, loadCallback, scope);
	},

	/**
	 * Adds a tree loader implementation that uses the directFn feature
	 *
	 * return {void}
	 */
	addTreeLoader: function() {
		this.loader = new Ext.tree.TreeLoader({
			directFn: this.treeDataProvider.getNextTreeLevel,
			paramOrder: 'nodeId,attributes',
			nodeParameter: 'nodeId',
			baseAttrs: {
				uiProvider: this.uiProvider
			},

				// an id can never be zero in ExtJS, but this is needed
				// for the root line feature or it will never be working!
			createNode: function(attr) {
				if (attr.id == 0) {
					attr.id = 'siteRootNode';
				}

				return Ext.tree.TreeLoader.prototype.createNode.call(this, attr);
			},

			listeners: {
				beforeload: function(treeLoader, node) {
					treeLoader.baseParams.nodeId = node.id;
					treeLoader.baseParams.attributes = node.attributes.nodeData;
				}
			}
		});
	},

	/**
	 * Enables the context menu feature
	 *
	 * return {void}
	 */
	enableContextMenu: function() {
		this.contextMenu = new TYPO3.Components.PageTree.ContextMenu();

		this.on('contextmenu', function(node, event) {
			this.openContextMenu(node, event);
		});
	},

	/**
	 * Open a context menu for the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {Ext.EventObject} event
	 * return {void}
	 */
	openContextMenu: function(node, event) {
		var attributes = Ext.apply(node.attributes.nodeData, {
			t3ContextInfo: node.ownerTree.t3ContextInfo
		});

		this.contextMenuProvider.getActionsForNodeArray(
			attributes,
			function(configuration) {
				this.contextMenu.removeAll();
				this.contextMenu.fill(node, this, configuration);
				if (this.contextMenu.items.length) {
					this.contextMenu.showAt(event.getXY());

				}
			},
			this
		);
	},

	/**
	 * Initialize the inline editor for the given tree.
	 *
	 * @return {void}
	 */
	enableInlineEditor: function() {
		this.treeEditor = new TYPO3.Components.PageTree.TreeEditor(this);
	},

	/**
	 * Triggers the editing of the node if the tree editor is available
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	triggerEdit: function(node) {
		if (this.treeEditor) {
			this.treeEditor.triggerEdit(node);
		}
	},

	/**
	 * Enables the drag and drop feature
	 *
	 * return {void}
	 */
	enableDragAndDrop: function() {
			// init proxy element
		this.on('startdrag', this.initDd, this);
		this.on('enddrag', this.stopDd, this);
		this.on('nodedragover', this.nodeDragOver, this);

			// node is moved
		this.on('movenode', this.moveNode, this);

			// new node is created/copied
		this.on('beforenodedrop', this.beforeDropNode, this);
		this.on('nodedrop', this.dropNode, this);

			// listens on the ctrl key to toggle the copy mode
		(new Ext.KeyMap(document, {
			key: Ext.EventObject.CONTROL,
			scope: this,
			buffer: 250,
			fn: function() {
				if (!this.controlKeyPressed && this.dragZone.dragging && this.copyHint) {
					if (this.shouldCopyNode) {
						this.copyHint.show();
					} else {
						this.copyHint.hide();
					}

					this.shouldCopyNode = !this.shouldCopyNode;
					this.dragZone.proxy.el.toggleClass('typo3-pagetree-copy');
				}
				this.controlKeyPressed = true;
			}
		}, 'keydown'));

		(new Ext.KeyMap(document, {
			key: Ext.EventObject.CONTROL,
			scope: this,
			fn: function() {
				this.controlKeyPressed = false;
			}
		}, 'keyup'));

			// listens on the escape key to stop the dragging
		(new Ext.KeyMap(document, {
			key: Ext.EventObject.ESC,
			scope: this,
			buffer: 250,
			fn: function(event) {
				if (this.dragZone.dragging) {
					Ext.dd.DragDropMgr.stopDrag(event);
					this.dragZone.onInvalidDrop(event);
				}
			}
		}, 'keydown'));
	},

	/**
	 * Disables the deletion drop zone if configured
	 *
	 * @return {void}
	 */
	stopDd: function() {
		if (this.deletionDropZoneId) {
			Ext.getCmp(this.deletionDropZoneId).hide();
			this.app.doLayout();
		}
	},

	/**
	 * Enables the deletion drop zone if configured. Also it creates the
	 * shown dd proxy element.
	 *
	 * @param {TYPO3.Components.PageTree.Tree} treePanel
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	initDd: function(treePanel, node) {
		var nodeHasChildNodes = (node.hasChildNodes() || node.isExpandable());
		if (this.deletionDropZoneId &&
			(!nodeHasChildNodes ||
			(nodeHasChildNodes && TYPO3.Components.PageTree.Configuration.canDeleteRecursivly)
		)) {
			Ext.getCmp(this.deletionDropZoneId).show();
			this.app.doLayout();
		}
		this.initDDProxyElement();
	},

	/**
	 * Adds the copy hint to the proxy element
	 *
	 * @return {void}
	 */
	initDDProxyElement: function() {
		this.shouldCopyNode = false;
		this.copyHint = new Ext.Element(document.createElement('div')).addClass(this.id + '-copy');
		this.copyHint.dom.appendChild(document.createTextNode(TYPO3.Components.PageTree.LLL.copyHint));
		this.copyHint.setVisibilityMode(Ext.Element.DISPLAY);
		this.dragZone.proxy.el.shadow = false;
		this.dragZone.proxy.ghost.dom.appendChild(this.copyHint.dom);
	},

	/**
	 * Cancels the drop possibility for the position above and below a mount page
	 *
	 * @param {Object} event
	 * @return {void}
	 */
	nodeDragOver: function(event) {
		var isMountPage = (event.target.attributes.realId == 0 || event.target.attributes.nodeData.isMountPoint);
		return !((event.point === 'above' || event.point === 'below') && isMountPage);
	},

	/**
	 * Creates a Fake Node
	 *
	 * This must be done to prevent the calling of the moveNode event.
	 *
	 * @param {object} dragElement
	 */
	beforeDropNode: function(dragElement) {
		if (dragElement.data && dragElement.data.item && dragElement.data.item.shouldCreateNewNode) {
			this.t3ContextInfo.serverNodeType = dragElement.data.item.nodeType;
			dragElement.dropNode = new Ext.tree.TreeNode({
				text: TYPO3.Components.PageTree.LLL.fakeNodeHint,
				leaf: true,
				isInsertedNode: true
			});

				// fix incorrect cancel value
			dragElement.cancel = false;

		} else if (this.shouldCopyNode) {
			dragElement.dropNode.ui.onOut();
			var attributes = dragElement.dropNode.attributes;
			attributes.isCopiedNode = true;
			attributes.id = 'fakeNode';
			dragElement.dropNode = new Ext.tree.TreeNode(attributes);
		}

		return true;
	},

	/**
	 * Differentiate between the copy and insert event
	 *
	 * @param {Ext.tree.TreeDropZone} dragElement
	 * return {void}
	 */
	dropNode: function(dragElement) {
		this.controlKeyPressed = false;
		if (dragElement.dropNode.attributes.isInsertedNode) {
			dragElement.dropNode.attributes.isInsertedNode = false;
			this.insertNode(dragElement.dropNode);
		} else if (dragElement.dropNode.attributes.isCopiedNode) {
			dragElement.dropNode.attributes.isCopiedNode = false;
			this.copyNode(dragElement.dropNode)
		}
	},

	/**
	 * Moves a node
	 *
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Ext.tree.TreeNode} movedNode
	 * @param {Ext.tree.TreeNode} oldParent
	 * @param {Ext.tree.TreeNode} newParent
	 * @param {int} position
	 * return {void}
	 */
	moveNode: function(tree, movedNode, oldParent, newParent, position) {
		this.controlKeyPressed = false;
		tree.t3ContextNode = movedNode;

		if (position === 0) {
			this.commandProvider.moveNodeToFirstChildOfDestination(newParent, tree);
		} else {
			var previousSiblingNode = newParent.childNodes[position - 1];
			this.commandProvider.moveNodeAfterDestination(previousSiblingNode, tree);
		}
	},

	/**
	 * Inserts a node
	 *
	 * @param {Ext.tree.TreeNode} movedNode
	 * return {void}
	 */
	insertNode: function(movedNode) {
		this.t3ContextNode = movedNode.parentNode;

		movedNode.disable();
		if (movedNode.previousSibling) {
			this.commandProvider.insertNodeAfterDestination(movedNode, this);
		} else {
			this.commandProvider.insertNodeToFirstChildOfDestination(movedNode, this);
		}
	},

	/**
	 * Copies a node
	 *
	 * @param {Ext.tree.TreeNode} movedNode
	 * return {void}
	 */
	copyNode: function(movedNode) {
		this.t3ContextNode = movedNode;

		movedNode.disable();

			// This is hard stuff to do. So increase the timeout for the AJAX request
		Ext.Ajax.timeout = 3600000;

		if (movedNode.previousSibling) {
			this.commandProvider.copyNodeAfterDestination(movedNode, this);
		} else {
			this.commandProvider.copyNodeToFirstChildOfDestination(movedNode, this);
		}
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.Tree', TYPO3.Components.PageTree.Tree);

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.FilteringTree
 *
 * Filtering Tree
 *
 * @namespace TYPO3.Components.PageTree
 * @extends TYPO3.Components.PageTree.Tree
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.FilteringTree = Ext.extend(TYPO3.Components.PageTree.Tree, {
	/**
	 * Search word
	 *
	 * @type {String}
	 */
	searchWord: '',

	/**
	 * Tree loader implementation for the filtering tree
	 *
	 * @return {void}
	 */
	addTreeLoader: function() {
		this.loader = new Ext.tree.TreeLoader({
			directFn: this.treeDataProvider.getFilteredTree,
			paramOrder: 'nodeId,attributes,searchWord',
			nodeParameter: 'nodeId',
			baseAttrs: {
				uiProvider: this.uiProvider
			},

			listeners: {
				beforeload: function(treeLoader, node) {
					if (!node.ownerTree.searchWord || node.ownerTree.searchWord === '') {
						return false;
					}

					treeLoader.baseParams.nodeId = node.id;
					treeLoader.baseParams.searchWord = node.ownerTree.searchWord;
					treeLoader.baseParams.attributes = node.attributes.nodeData;
				}
			}
		});
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.FilteringTree', TYPO3.Components.PageTree.FilteringTree);

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.DeletionDropZone
 *
 * Tree Node User Interface that can handle sprite icons and more
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.tree.TreeNodeUI
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.PageTreeNodeUI = Ext.extend(Ext.tree.TreeNodeUI, {
	/**
	 * Adds the sprite icon and adds an event to open the context menu on a single click at the icon node
	 *
	 * @param {Ext.tree.TreeNode} n
	 * @param {Object} a
	 * @param {Ext.tree.TreeNode} targetNode
	 * @param {Boolean} bulkRender
	 * @return {void}
	 */
	renderElements : function(n, a, targetNode, bulkRender) {
		// add some indent caching, this helps performance when rendering a large tree
        this.indentMarkup = n.parentNode ? n.parentNode.ui.getChildIndent() : '';

        var cb = Ext.isBoolean(a.checked),
            nel,
            href = this.getHref(a.href),
			nodeStyles = '',
			rootline = '';

			// TYPO3 modification to show the readable rootline above the user mounts
		if (a.readableRootline !== '') {
			rootline = '<li class="x-tree-node-readableRootline">' + a.readableRootline + '</li>';
		}

		if (a.nodeData.backgroundColor) {
			nodeStyles = 'style="background-color: ' + a.nodeData.backgroundColor + '"';
		}

		var buf = [rootline,'<li class="x-tree-node" ' + nodeStyles + '><div ext:tree-node-id="',n.id,'" class="x-tree-node-el x-tree-node-leaf x-unselectable ', a.cls,'" unselectable="on">',
            '<span class="x-tree-node-indent">',this.indentMarkup,"</span>",
            '<img alt="" src="', this.emptyIcon, '" class="x-tree-ec-icon x-tree-elbow" />',
//            '<img alt="" src="', a.icon || this.emptyIcon, '" class="x-tree-node-icon',(a.icon ? " x-tree-node-inline-icon" : ""),(a.iconCls ? " "+a.iconCls : ""),'" unselectable="on" />',
			a.spriteIconCode, // TYPO3: add sprite icon code
            cb ? ('<input class="x-tree-node-cb" type="checkbox" ' + (a.checked ? 'checked="checked" />' : '/>')) : '',
            '<a hidefocus="on" class="x-tree-node-anchor" href="',href,'" tabIndex="1" ',
             a.hrefTarget ? ' target="'+a.hrefTarget+'"' : "", '><span unselectable="on">',n.text,"</span></a></div>",
            '<ul class="x-tree-node-ct" style="display:none;"></ul>',
            "</li>"].join('');

        if(bulkRender !== true && n.nextSibling && (nel = n.nextSibling.ui.getEl())){
            this.wrap = Ext.DomHelper.insertHtml("beforeBegin", nel, buf);
        }else{
            this.wrap = Ext.DomHelper.insertHtml("beforeEnd", targetNode, buf);
        }

        this.elNode = this.wrap.childNodes[0];
        this.ctNode = this.wrap.childNodes[1];
        var cs = this.elNode.childNodes;
        this.indentNode = cs[0];
        this.ecNode = cs[1];
//        this.iconNode = cs[2];
		this.iconNode = (cs[2].firstChild.tagName === 'SPAN' ? cs[2].firstChild : cs[2]); // TYPO3: get possible overlay icon
        var index = 3; // TYPO3: index 4?
        if(cb){
            this.checkbox = cs[3];
            // fix for IE6
            this.checkbox.defaultChecked = this.checkbox.checked;
            index++;
        }
        this.anchor = cs[index];
        this.textNode = cs[index].firstChild;

			// TYPO3: call the context menu on a single click (Beware of drag&drop!)
		if (!TYPO3.Components.PageTree.Configuration.disableIconLinkToContextmenu
			|| TYPO3.Components.PageTree.Configuration.disableIconLinkToContextmenu === '0'
		) {
			Ext.fly(this.iconNode).on('click', function(event) {
				this.getOwnerTree().fireEvent('contextmenu', this, event);
				event.stopEvent();
			}, n);
		}
	},

	/**
	 * Adds a quick tip to the sprite icon
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {Object} tip
	 * @param {String} title
	 * @return {void}
	 */
	onTipChange : function(node, tip, title) {
		TYPO3.Components.PageTree.PageTreeNodeUI.superclass.onTipChange.apply(this, arguments);

	if(this.rendered){
		var hasTitle = Ext.isDefined(title);
		if(this.iconNode.setAttributeNS){
			this.iconNode.setAttributeNS("ext", "qtip", tip);
		if(hasTitle){
			this.iconNode.setAttributeNS("ext", "qtitle", title);
		}
		}else{
			this.iconNode.setAttribute("ext:qtip", tip);
		if(hasTitle){
			this.iconNode.setAttribute("ext:qtitle", title);
		}
	}
	}
	},

	/**
	 * Returns the drag and drop handles
	 *
	 * @return {Object}
	 */
	getDDHandles: function() {
		var ddHandles = [this.iconNode, this.textNode, this.elNode];
		var handlesIndex = ddHandles.length;

		var textNode = Ext.get(this.textNode);
		for (var i = 0; i < textNode.dom.childNodes.length; ++i) {
			if (textNode.dom.childNodes[i].nodeName === 'SPAN') {
				ddHandles[handlesIndex++] = textNode.dom.childNodes[i];
			}
		}

		return ddHandles;
	},

	/**
	 * Only set the onOver class if we are not in dragging mode
	 *
	 * @return {void}
	 */
	onOver: function() {
		if (!this.node.ownerTree.dontSetOverClass) {
			TYPO3.Components.PageTree.PageTreeNodeUI.superclass.onOver.apply(this, arguments);
		}
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.PageTreeNodeUI', TYPO3.Components.PageTree.PageTreeNodeUI);
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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.DeletionDropZone
 *
 * Deletion Drop Zone
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.Panel
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.DeletionDropZone = Ext.extend(Ext.Panel, {
	/**
	 * Border
	 *
	 * @type {Boolean}
	 */
	border: true,

	/**
	 * Hide the drop zone initially
	 *
	 * @type {Boolean}
	 */
	hidden: true,

	/**
	 * Command Provider
	 *
	 * @cfg {Object}
	 */
	commandProvider: null,

	/**
	 * Drag and Drop Group
	 *
	 * @cfg {String}
	 */
	ddGroup: '',

	/**
	 * Main Application
	 *
	 * @cfg {TYPO3.Components.PageTree.App}
	 */
	app: null,

	/**
	 * Removed node had a previous sibling
	 *
	 * @type {Boolean}
	 */
	isPreviousSibling: false,

	/**
	 * Removed node
	 *
	 * @type {Ext.tree.TreeNode}
	 */
	previousNode: null,

	/**
	 * Click Handler for the recovery text
	 *
	 * @type {Function}
	 */
	textClickHandler: null,

	/**
	 * Amount of drops (used to prevent early hiding of the box)
	 *
	 * @type {int}
	 */
	amountOfDrops: 0,

	/**
	 * Listeners
	 *
	 * The "afterrender" event creates the drop zone
	 */
	listeners: {
		afterrender: {
			fn: function() {
				this.createDropZone();

				this.getEl().on('mouseout', function(e) {
					if (!e.within(this.getEl(), true)) {
						this.removeClass(this.id + '-activateProxyOver');
						if (!this.app.activeTree.shouldCopyNode) {
							this.app.activeTree.copyHint.show();
						}
					}
				}, this);
			}
		},

		beforehide: {
			fn: function() {
				if (this.textClickHandler) {
					return false;
				}
			}
		}
	},

	/**
	 * Initializes the component
	 *
	 * @return {void}
	 */
	initComponent: function() {
		this.html = '<p><span id="' + this.id + '-icon" class="' +
			TYPO3.Components.PageTree.Sprites.TrashCan +
			'">&nbsp;</span><span id="' + this.id + '-text">' +
			TYPO3.Components.PageTree.LLL.dropToRemove + '</span></p>';

		TYPO3.Components.PageTree.DeletionDropZone.superclass.initComponent.apply(this, arguments);
	},


	/**
	 * Creates the drop zone and it's functionality
	 *
	 * @return {void}
	 */
	createDropZone: function() {
		(new Ext.dd.DropZone(this.getEl(), {
			ddGroup: this.ddGroup,

			notifyOver: function(ddProxy, e) {
				ddProxy.setDragElPos(e.xy[0], e.xy[1] - 60);
				return this.id + '-proxyOver';
			}.createDelegate(this),

			notifyEnter: function() {
				this.addClass(this.id + '-activateProxyOver');
				if (!this.app.activeTree.shouldCopyNode) {
					this.app.activeTree.copyHint.hide();
				}

				return this.id + '-proxyOver';
			}.createDelegate(this),

			notifyDrop: function(ddProxy, e, n) {
				var node = n.node;
				if (!node) {
					return;
				}

				var tree = node.ownerTree;
				var nodeHasChildNodes = (node.hasChildNodes() || node.isExpandable());

				var callback = null;
				if (!top.TYPO3.configuration.inWorkspace && !nodeHasChildNodes) {
					callback = this.setRecoverState.createDelegate(this);
				}

				if (nodeHasChildNodes) {
					node.ownerTree.commandProvider.confirmDelete(node, tree, callback, true);
				} else {
					node.ownerTree.commandProvider.deleteNode(node, tree, callback);
				}
			}.createDelegate(this)
		}));
	},

	/**
	 * Sets the drop zone into the recovery state
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Boolean} succeeded
	 * @return {void}
	 */
	setRecoverState: function(node, tree, succeeded) {
		if (!succeeded) {
			this.toOriginState();
			return;
		}

		this.show();
		this.setHeight(50);
		this.updateIcon(TYPO3.Components.PageTree.Sprites.TrashCanRestore);
		this.updateText(
			node.text + '<br />' +
			'<span class="' + this.id + '-restore">' +
				'<span class="' + this.id + '-restoreText">' +
				TYPO3.Components.PageTree.LLL.dropZoneElementRemoved +
				'</span>' +
			'</span>',
			false
		);
		this.app.doLayout();

		++this.amountOfDrops;
		(function() {
			if (!--this.amountOfDrops) {
				this.toOriginState();
			}
		}).defer(10000, this);

		this.textClickHandler = this.restoreNode.createDelegate(this, [node, tree]);
		Ext.get(this.id + '-text').on('click', this.textClickHandler);

		this.isPreviousSibling = false;
		this.previousNode = node.parentNode;
		if (node.previousSibling) {
			this.previousNode = node.previousSibling;
			this.isPreviousSibling = true;
		}
	},

	/**
	 * Updates the drop zone text label
	 *
	 * @param {String} text
	 * @param {Boolean} animate
	 * @return {void}
	 */
	updateText: function(text, animate) {
		animate = animate || false;

		var elementText = Ext.get(this.id + '-text');
		if (animate) {
			elementText.animate({opacity: {to: 0}}, 1, function(elementText) {
				elementText.update(text);
				elementText.setStyle('opacity', 1);
			});
		} else {
			elementText.update(text);
		}
	},

	/**
	 * Updates the drop zone icon with another sprite icon
	 *
	 * @param {String} classes
	 * @return {void}
	 */
	updateIcon: function(classes) {
		Ext.get(this.id + '-icon').set({
			'class': classes
		});
	},

	/**
	 * Resets the drop zone to the initial state
	 *
	 * @param {Boolean} hide
	 * @return {void}
	 */
	toOriginState: function(hide) {
		if (hide !== false) {
			hide = true;
		}

		Ext.get(this.id + '-text').un('click', this.textClickHandler);
		this.previousNode = this.textClickHandler = null;
		this.isPreviousSibling = false;

		if (hide && !this.app.activeTree.dragZone.dragging) {
			this.hide();
		}

		this.setHeight(35);
		this.updateText(TYPO3.Components.PageTree.LLL.dropToRemove, false);
		this.updateIcon(TYPO3.Components.PageTree.Sprites.TrashCan);
		this.app.doLayout();
	},

	/**
	 * Restores the last removed node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	restoreNode: function(node, tree) {
		if (this.isPreviousSibling) {
			this.commandProvider.restoreNodeAfterDestination(node, tree, this.previousNode);
		} else {
			this.commandProvider.restoreNodeToFirstChildOfDestination(node, tree, this.previousNode);
		}
		this.setHeight(35);
		this.updateText(TYPO3.Components.PageTree.LLL.dropZoneElementRestored);
		this.app.doLayout();

		(function() {
			if (this.textClickHandler) {
				this.toOriginState();
			}
		}).defer(3000, this);
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.DeletionDropZone', TYPO3.Components.PageTree.DeletionDropZone);

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.TopPanel
 *
 * Top Panel
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.Panel
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.TopPanel = Ext.extend(Ext.Panel, {
	/**
	 * Component Id
	 *
	 * @type {String}
	 */
	id: 'typo3-pagetree-topPanel',

	/**
	 * Border
	 *
	 * @type {Boolean}
	 */
	border: false,

	/**
	 * Toolbar Object
	 *
	 * @type {Ext.Toolbar}
	 */
	tbar: new Ext.Toolbar(),

	/**
	 * Currently Clicked Toolbar Button
	 *
	 * @type {Ext.Button}
	 */
	currentlyClickedButton: null,

	/**
	 * Currently Shown Panel
	 *
	 * @type {Ext.Component}
	 */
	currentlyShownPanel: null,

	/**
	 * Filtering Indicator Item
	 *
	 * @type {Ext.Panel}
	 */
	filteringIndicator: null,

	/**
	 * Drag and Drop Group
	 *
	 * @cfg {String}
	 */
	ddGroup: '',

	/**
	 * Data Provider
	 *
	 * @cfg {Object}
	 */
	dataProvider: null,

	/**
	 * Filtering Tree
	 *
	 * @cfg {TYPO3.Components.PageTree.FilteringTree}
	 */
	filteringTree: null,

	/**
	 * Page Tree
	 *
	 * @cfg {TYPO3.Components.PageTree.Tree}
	 */
	tree: null,

	/**
	 * Application Panel
	 *
	 * @cfg {TYPO3.Components.PageTree.App}
	 */
	app: null,

	/**
	 * Initializes the component
	 *
	 * @return {void}
	 */
	initComponent: function() {
		this.currentlyShownPanel = new Ext.Panel({
			id: this.id + '-defaultPanel',
			cls: this.id + '-item'
		});
		this.items = [this.currentlyShownPanel];

		TYPO3.Components.PageTree.TopPanel.superclass.initComponent.apply(this, arguments);

		this.addDragDropNodeInsertionFeature();

		if (!TYPO3.Components.PageTree.Configuration.hideFilter
			|| TYPO3.Components.PageTree.Configuration.hideFilter === '0'
		) {
			this.addFilterFeature();
		}

		this.getTopToolbar().addItem({xtype: 'tbfill'});
		this.addRefreshTreeFeature();
	},

	/**
	 * Returns a custom button template to fix some nasty webkit issues
	 * by removing some useless wrapping html code
	 *
	 * @return {void}
	 */
	getButtonTemplate: function() {
		return new Ext.Template(
			'<div id="{4}" class="x-btn {3}"><button type="{0}"">&nbsp;</button></div>'
		);
	},

	/**
	 * Adds a button to the components toolbar with a related component
	 *
	 * @param {Object} button
	 * @param {Object} connectedWidget
	 * @return {void}
	 */
	addButton: function(button, connectedWidget) {
		button.template = this.getButtonTemplate();
		if (!button.hasListener('click')) {
			button.on('click', this.topbarButtonCallback);
		}

		if (connectedWidget) {
			connectedWidget.hidden = true;
			button.connectedWidget = connectedWidget;
			this.add(connectedWidget);
		}

		this.getTopToolbar().addItem(button);
		this.doLayout();
	},

	/**
	 * Usual button callback method that triggers the assigned component of the
	 * clicked toolbar button
	 *
	 * @return {void}
	 */
	topbarButtonCallback: function() {
		var topPanel = this.ownerCt.ownerCt;

		topPanel.currentlyShownPanel.hide();
		if (topPanel.currentlyClickedButton) {
			topPanel.currentlyClickedButton.toggle(false);
		}

		if (topPanel.currentlyClickedButton === this) {
			topPanel.currentlyClickedButton = null;
			topPanel.currentlyShownPanel = topPanel.get(topPanel.id + '-defaultPanel');
		} else {
			this.toggle(true);
			topPanel.currentlyClickedButton = this;
			topPanel.currentlyShownPanel = this.connectedWidget;
		}

		topPanel.currentlyShownPanel.show();
	},

	/**
	 * Loads the filtering tree nodes with the given search word
	 *
	 * @param {Ext.form.TextField} textField
	 * @return {void}
	 */
	createFilterTree: function(textField) {
		var searchWord = textField.getValue();
		var isNumber = TYPO3.Utility.isNumber(searchWord);
		var hasMinLength = (searchWord.length > 2 || searchWord.length <= 0);
		if ((!hasMinLength && !isNumber) || searchWord === this.filteringTree.searchWord) {
			return;
		}

		this.filteringTree.searchWord = searchWord;
		if (this.filteringTree.searchWord === '') {
			this.app.activeTree = this.tree;

			textField.setHideTrigger(true);
			this.filteringTree.hide();
			this.tree.show().refreshTree(function() {
				textField.focus(false, 500);
			}, this);

			if (this.filteringIndicator) {
				this.app.removeIndicator(this.filteringIndicator);
				this.filteringIndicator = null;
			}
		} else {
			var selectedNode = this.app.getSelected();
			this.app.activeTree = this.filteringTree;

			if (!this.filteringIndicator) {
				this.filteringIndicator = this.app.addIndicator(
					this.createIndicatorItem(textField)
				);
			}

			textField.setHideTrigger(false);
			this.tree.hide();
			this.app.ownerCt.getEl().mask('', 'x-mask-loading-message');
			this.app.ownerCt.getEl().addClass('t3-mask-loading');
			this.filteringTree.show().refreshTree(function() {
				if (selectedNode) {
					this.app.select(selectedNode.attributes.nodeData.id, false);
				}
				textField.focus();
				this.app.ownerCt.getEl().unmask();
			}, this);
		}

		this.doLayout();
	},

	/**
	 * Adds an indicator item to the page tree application for the filtering feature
	 *
	 * @param {Ext.form.TextField} textField
	 * @return {void}
	 */
	createIndicatorItem: function(textField) {
		return {
			border: false,
			id: this.app.id + '-indicatorBar-filter',
			cls: this.app.id + '-indicatorBar-item',
			html: '<p>' +
					'<span id="' + this.app.id + '-indicatorBar-filter-info' + '" ' +
						'class="' + this.app.id + '-indicatorBar-item-leftIcon ' +
							TYPO3.Components.PageTree.Sprites.Info + '">&nbsp;' +
					'</span>' +
					'<span id="' + this.app.id + '-indicatorBar-filter-clear' + '" ' +
						'class="' + this.app.id + '-indicatorBar-item-rightIcon ' + '">X' +
					'</span>' +
					TYPO3.Components.PageTree.LLL.activeFilterMode +
				'</p>',
			filteringTree: this.filteringTree,

			listeners: {
				afterrender: {
					scope: this,
					fn: function() {
						var element = Ext.fly(this.app.id + '-indicatorBar-filter-clear');
						element.on('click', function() {
							textField.setValue('');
							this.createFilterTree(textField);
						}, this);
					}
				}
			}
		};
	},

	/**
	 * Adds the necessary functionality and components for the filtering feature
	 *
	 * @return {void}
	 */
	addFilterFeature: function() {
		var topPanelButton = new Ext.Button({
			id: this.id + '-button-filter',
			cls: this.id + '-button',
			iconCls: TYPO3.Components.PageTree.Sprites.Filter,
			tooltip: TYPO3.Components.PageTree.LLL.buttonFilter
		});

		var textField = new Ext.form.TriggerField({
			id: this.id + '-filter',
			enableKeyEvents: true,
			triggerClass: TYPO3.Components.PageTree.Sprites.InputClear,
			value: TYPO3.Components.PageTree.LLL.searchTermInfo,

			listeners: {
				blur: {
					scope: this,
					fn:function(textField) {
						if (textField.getValue() === '') {
							textField.setValue(TYPO3.Components.PageTree.LLL.searchTermInfo);
							textField.addClass(this.id + '-filter-defaultText');
						}
					}
				},

				focus: {
					scope: this,
					fn: function(textField) {
						if (textField.getValue() === TYPO3.Components.PageTree.LLL.searchTermInfo) {
							textField.setValue('');
							textField.removeClass(this.id + '-filter-defaultText');
						}
					}
				},

				keydown: {
					fn: this.createFilterTree,
					scope: this,
					buffer: 1000
				}
			}
		});

		textField.setHideTrigger(true);
		textField.onTriggerClick = function() {
			textField.setValue('');
			this.createFilterTree(textField);
		}.createDelegate(this);

		var topPanelWidget = new Ext.Panel({
			border: false,
			id: this.id + '-filterWrap',
			cls: this.id + '-item',
			items: [textField],

			listeners: {
				show: {
					scope: this,
					fn: function(panel) {
						panel.get(this.id + '-filter').focus();
					}
				}
			}
		});

		this.addButton(topPanelButton, topPanelWidget);
	},

	/**
	 * Creates the entries for the new node drag zone toolbar
	 *
	 * @return {void}
	 */
	createNewNodeToolbar: function() {
		this.dragZone = new Ext.dd.DragZone(this.getEl(), {
			ddGroup: this.ownerCt.ddGroup,
			topPanel: this.ownerCt,

			endDrag: function() {
				this.topPanel.app.activeTree.dontSetOverClass = false;
			},

			getDragData: function(event) {
				this.proxyElement = document.createElement('div');

				var node = Ext.getCmp(event.getTarget('.x-btn').id);
				node.shouldCreateNewNode = true;

				return {
					ddel: this.proxyElement,
					item: node
				}
			},

			onInitDrag: function() {
				this.topPanel.app.activeTree.dontSetOverClass = true;
				var clickedButton = this.dragData.item;
				var cls = clickedButton.initialConfig.iconCls;

				this.proxyElement.shadow = false;
				this.proxyElement.innerHTML = '<div class="x-dd-drag-ghost-pagetree">' +
					'<span class="x-dd-drag-ghost-pagetree-icon ' + cls + '">&nbsp;</span>' +
					'<span class="x-dd-drag-ghost-pagetree-text">'  + clickedButton.title + '</span>' +
				'</div>';

				this.proxy.update(this.proxyElement);
			}
		});

			// listens on the escape key to stop the dragging
		(new Ext.KeyMap(document, {
			key: Ext.EventObject.ESC,
			scope: this,
			buffer: 250,
			fn: function(event) {
				if (this.dragZone.dragging) {
					Ext.dd.DragDropMgr.stopDrag(event);
					this.dragZone.onInvalidDrop(event);
				}
			}
		}, 'keydown'));
	},

	/**
	 * Creates the necessary components for new node drag and drop feature
	 *
	 * @return {void}
	 */
	addDragDropNodeInsertionFeature: function() {
		var newNodeToolbar = new Ext.Toolbar({
			border: false,
			id: this.id + '-item-newNode',
			cls: this.id + '-item',

			listeners: {
				render: {
					fn: this.createNewNodeToolbar
				}
			}
		});

		this.dataProvider.getNodeTypes(function(response) {
			for (var i = 0; i < response.length; ++i) {
				response[i].template = this.getButtonTemplate();
				newNodeToolbar.addItem(response[i]);
			}
			newNodeToolbar.doLayout();
		}, this);

		var topPanelButton = new Ext.Button({
			id: this.id + '-button-newNode',
			cls: this.id + '-button',
			iconCls: TYPO3.Components.PageTree.Sprites.NewNode,
			tooltip: TYPO3.Components.PageTree.LLL.buttonNewNode
		});

		this.addButton(topPanelButton, newNodeToolbar);
	},

	/**
	 * Adds a button to the toolbar for the refreshing feature
	 *
	 * @return {void}
	 */
	addRefreshTreeFeature: function() {
		var topPanelButton = new Ext.Button({
			id: this.id + '-button-refresh',
			cls: this.id + '-button',
			iconCls: TYPO3.Components.PageTree.Sprites.Refresh,
			tooltip: TYPO3.Components.PageTree.LLL.buttonRefresh,

			listeners: {
				click: {
					scope: this,
					fn: function() {
						this.app.activeTree.refreshTree();
					}
				}
			}
		});

		this.addButton(topPanelButton);
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.TopPanel', TYPO3.Components.PageTree.TopPanel);

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.ContextMenu
 *
 * Context menu implementation
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.menu.Menu
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.ContextMenu = Ext.extend(Ext.menu.Menu, {
	/**
	 * Context menu node
	 *
	 * @cfg {Ext.tree.TreeNode}
	 */
	node: null,

	/**
	 * Page Tree
	 *
	 * @cfg {TYPO3.Components.PageTree.Tree}
	 */
	pageTree: null,

	/**
	 * Component Id
	 *
	 * @type {String}
	 */
	id: 'typo3-pagetree-contextmenu',

	/**
	 * Parent clicks should be ignored
	 *
	 * @type {Boolean}
	 */
	ignoreParentClicks: true,

	/**
	 * Listeners
	 *
	 * The itemclick event triggers the configured single click action
	 */
	listeners: {
		itemclick: {
			fn: function (item) {
				if (this.pageTree.commandProvider[item.callbackAction]) {
					if (item.parentMenu.pageTree.stateHash) {
						fsMod.recentIds['web'] = item.parentMenu.node.attributes.nodeData.id;
						item.parentMenu.pageTree.stateHash['lastSelectedNode'] = item.parentMenu.node.id;
					}

					this.pageTree.commandProvider[item.callbackAction](
						item.parentMenu.node,
						item.parentMenu.pageTree,
						item
					);
				}
			}
		}
	},

	/**
	 * Fills the menu with the actions
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} pageTree
	 * @param {Object} contextMenuConfiguration
	 * @return {void}
	 */
	fill: function(node, pageTree, contextMenuConfiguration) {
		this.node = node;
		this.pageTree = pageTree;

		var components = this.preProcessContextMenuConfiguration(contextMenuConfiguration);
		if (components.length) {
			for (var component in components) {
				if (components[component] === '-') {
					this.addSeparator();
				} else if (typeof components[component] === 'object') {
					this.addItem(components[component]);
				}
			}
		}
	},

	/**
	 * Parses the context menu actions array recursively and generates the
	 * components for the context menu including separators/dividers and sub menus
	 *
	 * @param {Object} contextMenuConfiguration
	 * @param {int} level
	 * @return {Object}
	 */
	preProcessContextMenuConfiguration: function(contextMenuConfiguration, level) {
		level = level || 0;
		if (level > 5) {
			return [];
		}

		var components = [];
		var index = 0;

		var modulesInsideGroup = false;
		var subMenus = 0;
		for (var singleAction in contextMenuConfiguration) {
			if (contextMenuConfiguration[singleAction]['type'] === 'submenu') {
				var subMenuComponents = this.preProcessContextMenuConfiguration(
					contextMenuConfiguration[singleAction]['childActions'],
					level + 1
				);

				if (subMenuComponents.length) {
					var subMenu = new TYPO3.Components.PageTree.ContextMenu({
						id: this.id + '-sub' + ++subMenus,
						items: subMenuComponents,
						node: this.node,
						pageTree: this.pageTree
					});

					components[index++] = {
						text: contextMenuConfiguration[singleAction]['label'],
						cls: 'contextMenu-subMenu',
						menu: subMenu,
						icon: contextMenuConfiguration[singleAction]['icon'],
						iconCls: contextMenuConfiguration[singleAction]['class']
					};
				}
			} else if (contextMenuConfiguration[singleAction]['type'] === 'divider') {
				if (modulesInsideGroup) {
					components[index++] = '-';
					modulesInsideGroup = false;
				}
			} else {
				modulesInsideGroup = true;

				if (typeof contextMenuConfiguration[singleAction] === 'object') {
					var component = {
						'text': contextMenuConfiguration[singleAction]['label'],
						'icon': contextMenuConfiguration[singleAction]['icon'],
						'iconCls': contextMenuConfiguration[singleAction]['class'],
						'callbackAction': contextMenuConfiguration[singleAction]['callbackAction'],
						'customAttributes': contextMenuConfiguration[singleAction]['customAttributes']
					};
					component.itemTpl = Ext.menu.Item.prototype.itemTpl = new Ext.XTemplate(
						'<a id="{id}" class="{cls}" hidefocus="true" unselectable="on" href="{href}">',
							'<span class="{hrefTarget}">',
								'<span class="x-menu-item-icon" unselectable="on"><span class="{iconCls}"></span></span>',
							'</span>',
							'<span class="x-menu-item-text">{text}</span>',
						'</a>'
					);

					components[index++] = component;
				}
			}
		}

			// remove divider if it's the last item of the context menu
		if (components[components.length - 1] === '-') {
			components[components.length - 1] = '';
		}

		return components;
	}
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.ContextMenu', TYPO3.Components.PageTree.ContextMenu);

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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.Actions
 *
 * Actions dedicated for the page tree
 *
 * @namespace TYPO3.Components.PageTree
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.Actions = {

	/**
	 * Evaluates a response from an ext direct call and shows a flash message
	 * if it was an exceptional result
	 *
	 * @param {Object} response
	 * @return {Boolean}
	 */
	evaluateResponse: function(response) {
		if (response.success === false) {
			top.TYPO3.Notification.error('Exception', response.message);
			return false;
		}

		return true;
	},

	/**
	 * Releases the cut and copy mode from the context menu
	 *
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	releaseCutAndCopyModes: function(tree) {
		tree.t3ContextInfo.inCutMode = false;
		tree.t3ContextInfo.inCopyMode = false;

		if (tree.t3ContextNode) {
			tree.t3ContextNode.attributes.nodeData.t3InCutMode = false;
			tree.t3ContextNode.attributes.nodeData.t3InCopyMode = false;
			tree.t3ContextNode = null;
		}
	},

	/**
	 * Updates an existing node with the given alternative. The new tree node
	 * is returned afterwards.
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {Boolean} isExpanded
	 * @param {Object} updatedNode
	 * @param {Function} callback
	 * @return {Ext.tree.TreeNode}
	 */
	updateNode: function(node, isExpanded, updatedNode, callback) {
		if (!updatedNode) {
			return null;
		}

		updatedNode.uiProvider = node.ownerTree.uiProvider;
		var newTreeNode = new Ext.tree.TreeNode(updatedNode);

		var refreshCallback = this.restoreNodeStateAfterRefresh;
		if (callback) {
			refreshCallback = refreshCallback.createSequence(callback);
		}

		node.parentNode.replaceChild(newTreeNode, node);
		newTreeNode.ownerTree.refreshNode(newTreeNode, refreshCallback);

		return newTreeNode;
	},

	/**
	 * Restores the node state
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {Boolean} isExpanded
	 * @return {void}
	 */
	restoreNodeStateAfterRefresh: function(node, isExpanded) {
		node.parentNode.expand(false, false);
		if (isExpanded) {
			node.expand(false, false);
		} else {
			node.collapse(false, false);
		}
	},

	/**
	 * Shows deletion confirmation window
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Function} callback
	 * @param {Boolean} recursiveDelete
	 * @return {void}
	 */
	confirmDelete: function(node, tree, callback, recursiveDelete) {
		callback = callback || null;

		var title = TYPO3.Components.PageTree.LLL.deleteDialogTitle,
			message = TYPO3.Components.PageTree.LLL.deleteDialogMessage;
		if (recursiveDelete) {
			message = TYPO3.Components.PageTree.LLL.recursiveDeleteDialogMessage;
		}

		Ext.Msg.show({
			title: title,
			msg: message,
			buttons: Ext.Msg.YESNO,
			fn: function (answer) {
				if (answer === 'yes') {
					TYPO3.Components.PageTree.Actions.deleteNode(node, tree, callback);
					return true;
				}
				return false;
			},
			animEl: 'elId'
		});
	},

	/**
	 * Deletes a node directly
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Function} callback
	 * @return {void}
	 */
	deleteNode: function(node, tree, callback) {
		TYPO3.Components.PageTree.Commands.deleteNode(
			node.attributes.nodeData,
			function(response) {
				var succeeded = this.evaluateResponse(response);
				if (Ext.isFunction(callback)) {
					callback(node, tree, succeeded);
				}

				if (succeeded) {
						// the node may not be removed in workspace mode
					if (top.TYPO3.configuration.inWorkspace && response.id) {
						this.updateNode(node, node.isExpanded(), response);
					} else {
						node.remove();
					}
				}
			},
			this
		);
	},

	/**
	 * Removes a node either directly or first shows deletion popup
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	removeNode: function(node, tree) {
		if (TYPO3.Components.PageTree.Configuration.displayDeleteConfirmation) {
			this.confirmDelete(node);
		} else {
			this.deleteNode(node, tree);
		}
	},

	/**
	 * Restores a given node and moves it to the given destination inside the tree. Use this
	 * method if you want to add it as the first child of the destination.
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Ext.tree.TreeNode} destination
	 * @return {void}
	 */
	restoreNodeToFirstChildOfDestination: function(node, tree, destination) {
		TYPO3.Components.PageTree.Commands.restoreNode(
			node.attributes.nodeData,
			destination.attributes.nodeData.id,
			function(updatedNode) {
				if (this.evaluateResponse(updatedNode)) {
					var newTreeNode = new Ext.tree.TreeNode(
						Ext.apply(node.attributes, updatedNode)
					);
					destination.insertBefore(newTreeNode, destination.firstChild);
				}
			},
			this
		);
	},

	/**
	 * Restores a given node and moves it to the given destination inside the tree. Use this
	 * method if you want to add the node after the destination node.
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Ext.tree.TreeNode} destination
	 * @return {void}
	 */
	restoreNodeAfterDestination: function(node, tree, destination) {
		TYPO3.Components.PageTree.Commands.restoreNode(
			node.attributes.nodeData,
			-destination.attributes.nodeData.id,
			function(updatedNode) {
				if (this.evaluateResponse(updatedNode)) {
					var newTreeNode = new Ext.tree.TreeNode(
						Ext.apply(node.attributes, updatedNode)
					);
					destination.parentNode.insertBefore(newTreeNode, destination.nextSibling);
				}
			},
			this
		);
	},

	/**
	 * Collapses a whole tree branch
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	collapseBranch: function(node) {
		node.collapse(true);
	},

	/**
	 * Expands a whole tree branch
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	expandBranch: function(node) {
		node.expand(true);
	},

	/**
	 * Opens a popup windows for previewing the given node/page
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	viewPage: function(node) {
		var frontendWindow = window.open('', 'newTYPO3frontendWindow');
		TYPO3.Components.PageTree.Commands.getViewLink(
			node.attributes.nodeData,
			function(result) {
				frontendWindow.location = result;
				frontendWindow.focus();
			}
		);
	},

	/**
	 * Creates a temporary tree mount point
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	mountAsTreeRoot: function(node, tree) {
		TYPO3.Components.PageTree.Commands.setTemporaryMountPoint(
			node.attributes.nodeData,
			function(response) {
				if (TYPO3.Components.PageTree.Configuration.temporaryMountPoint) {
					TYPO3.Backend.NavigationContainer.PageTree.removeIndicator(
						TYPO3.Backend.NavigationContainer.PageTree.temporaryMountPointInfoIndicator
					);
				}

				TYPO3.Components.PageTree.Configuration.temporaryMountPoint = response;
				TYPO3.Backend.NavigationContainer.PageTree.addTemporaryMountPointIndicator();

				var selectedNode = TYPO3.Backend.NavigationContainer.PageTree.getSelected();
				tree.stateId = 'Pagetree' + TYPO3.Components.PageTree.Configuration.temporaryMountPoint;
				tree.refreshTree(function() {
					var nodeIsSelected = false;
					if (selectedNode) {
						nodeIsSelected = TYPO3.Backend.NavigationContainer.PageTree.select(
							selectedNode.attributes.nodeData.id
						);
					}

					var node = (nodeIsSelected ? TYPO3.Backend.NavigationContainer.PageTree.getSelected() : null);
					if (node) {
						this.singleClick(node, tree);
					} else {
						this.singleClick(tree.getRootNode().firstChild, tree);
					}
				}, this);
			},
			this
		);
	},

	/**
	 * Opens the edit page properties dialog
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	editPageProperties: function(node) {
		node.select();
		var returnUrl = TYPO3.Backend.ContentContainer.src;
		if (returnUrl.indexOf('returnUrl') !== -1) {
			returnUrl = TYPO3.Utility.getParameterFromUrl(returnUrl, 'returnUrl');
		} else {
			returnUrl = encodeURIComponent(returnUrl);
		}

		TYPO3.Backend.ContentContainer.setUrl(
			TYPO3.settings.FormEngine.moduleUrl + '&edit[pages][' + node.attributes.nodeData.id + ']=edit&returnUrl=' + returnUrl
		);
	},

	/**
	 * Opens the new page wizard
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	newPageWizard: function(node) {
		node.select();
		TYPO3.Backend.ContentContainer.setUrl(
			TYPO3.settings.NewRecord.moduleUrl + '&id=' + node.attributes.nodeData.id + '&pagesOnly=1'
		);
	},

	/**
	 * Opens the info popup
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	openInfoPopUp: function(node) {
		launchView('pages', node.attributes.nodeData.id);
	},

	/**
	 * Opens the history popup
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	openHistoryPopUp: function(node) {
		node.select();
		TYPO3.Backend.ContentContainer.setUrl(
			TYPO3.settings.RecordHistory.moduleUrl + '&element=pages:' + node.attributes.nodeData.id
		);
	},

	/**
	 * Opens the export .t3d file dialog
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	exportT3d: function(node) {
		node.select();
		TYPO3.Backend.ContentContainer.setUrl(
			TYPO3.settings.ImportExport.moduleUrl +
			'&tx_impexp[action]=export&' +
			'id=0&tx_impexp[pagetree][id]=' + node.attributes.nodeData.id +
			'&tx_impexp[pagetree][levels]=0' +
			'&tx_impexp[pagetree][tables][]=_ALL'
		);
	},

	/**
	 * Opens the import .t3d file dialog
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	importT3d: function(node) {
		node.select();
		TYPO3.Backend.ContentContainer.setUrl(
			TYPO3.settings.ImportExport.moduleUrl +
			'&id=' + node.attributes.nodeData.id +
			'&table=pages&tx_impexp[action]=import'
		);
	},

	/**
	 * Enables the cut mode of a node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	enableCutMode: function(node, tree) {
		this.disableCopyMode(node, tree);
		node.attributes.nodeData.t3InCutMode = true;
		tree.t3ContextInfo.inCutMode = true;
		tree.t3ContextNode = node;
	},

	/**
	 * Disables the cut mode of a node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	disableCutMode: function(node, tree) {
		this.releaseCutAndCopyModes(tree);
		node.attributes.nodeData.t3InCutMode = false;
	},

	/**
	 * Enables the copy mode of a node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	enableCopyMode: function(node, tree) {
		this.disableCutMode(node, tree);
		node.attributes.nodeData.t3InCopyMode = true;
		tree.t3ContextInfo.inCopyMode = true;
		tree.t3ContextNode = node;
	},

	/**
	 * Disables the copy mode of a node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	disableCopyMode: function(node, tree) {
		this.releaseCutAndCopyModes(tree);
		node.attributes.nodeData.t3InCopyMode = false;
	},

	/**
	 * Pastes the cut/copy context node into the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	pasteIntoNode: function(node, tree) {
		if (!tree.t3ContextNode) {
			return;
		}

		if (tree.t3ContextInfo.inCopyMode) {
				 // This is hard stuff to do. So increase the timeout for the AJAX request
			Ext.Ajax.timeout = 3600000;

			var newNode = tree.t3ContextNode = new Ext.tree.TreeNode(tree.t3ContextNode.attributes);
			newNode.id = 'fakeNode';
			node.insertBefore(newNode, node.childNodes[0]);
			node.attributes.nodeData.t3InCopyMode = false;
			this.copyNodeToFirstChildOfDestination(newNode, tree);

		} else if (tree.t3ContextInfo.inCutMode) {
			if (node.getPath().indexOf(tree.t3ContextNode.id) !== -1) {
				return;
			}

			node.appendChild(tree.t3ContextNode);
			node.attributes.nodeData.t3InCutMode = false;
			this.moveNodeToFirstChildOfDestination(node, tree);
		}
	},

	/**
	 * Pastes a cut/copy context node after the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	pasteAfterNode: function(node, tree) {
		if (!tree.t3ContextNode) {
			return;
		}

		if (tree.t3ContextInfo.inCopyMode) {
				// This is hard stuff to do. So increase the timeout for the AJAX request
			Ext.Ajax.timeout = 3600000;

			var newNode = tree.t3ContextNode = new Ext.tree.TreeNode(tree.t3ContextNode.attributes);
			newNode.id = 'fakeNode';
			node.parentNode.insertBefore(newNode, node.nextSibling);
			node.attributes.nodeData.t3InCopyMode = false;
			this.copyNodeAfterDestination(newNode, tree);

		} else if (tree.t3ContextInfo.inCutMode) {
			if (node.getPath().indexOf(tree.t3ContextNode.id) !== -1) {
				return;
			}

			node.parentNode.insertBefore(tree.t3ContextNode, node.nextSibling);
			node.attributes.nodeData.t3InCutMode = false;
			this.moveNodeAfterDestination(node, tree);
		}
	},

	/**
	 * Moves the current tree context node after the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	moveNodeAfterDestination: function(node, tree) {
		TYPO3.Components.PageTree.Commands.moveNodeAfterDestination(
			tree.t3ContextNode.attributes.nodeData,
			node.attributes.nodeData.id,
			function(response) {
				if (this.evaluateResponse(response) && tree.t3ContextNode) {
					this.updateNode(tree.t3ContextNode, tree.t3ContextNode.isExpanded(), response);
				}
				this.releaseCutAndCopyModes(tree);
			},
			this
		);
	},

	/**
	 * Moves the current tree context node as the first child of the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	moveNodeToFirstChildOfDestination: function(node, tree) {
		TYPO3.Components.PageTree.Commands.moveNodeToFirstChildOfDestination(
			tree.t3ContextNode.attributes.nodeData,
			node.attributes.nodeData.id,
			function(response) {
				if (this.evaluateResponse(response) && tree.t3ContextNode) {
					this.updateNode(tree.t3ContextNode, tree.t3ContextNode.isExpanded(), response);
				}
				this.releaseCutAndCopyModes(tree);
			},
			this
		);
	},

	/**
	 * Inserts a new node after the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	insertNodeAfterDestination: function(node, tree) {
		TYPO3.Components.PageTree.Commands.insertNodeAfterDestination(
			tree.t3ContextNode.attributes.nodeData,
			node.previousSibling.attributes.nodeData.id,
			tree.t3ContextInfo.serverNodeType,
			function(response) {
				if (this.evaluateResponse(response)) {
					this.updateNode(node, node.isExpanded(), response, function(node) {
						tree.triggerEdit(node);
					});
				}
				this.releaseCutAndCopyModes(tree);
			},
			this
		);
	},

	/**
	 * Inserts a new node as the first child of the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	insertNodeToFirstChildOfDestination: function(node, tree) {
		TYPO3.Components.PageTree.Commands.insertNodeToFirstChildOfDestination(
			tree.t3ContextNode.attributes.nodeData,
			tree.t3ContextInfo.serverNodeType,
			function(response) {
				if (this.evaluateResponse(response)) {
					this.updateNode(node, true, response, function(node) {
						tree.triggerEdit(node);
					});
				}
				this.releaseCutAndCopyModes(tree);
			},
			this
		);
	},

	/**
	 * Copies the current tree context node after the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	copyNodeAfterDestination: function(node, tree) {
		TYPO3.Components.PageTree.Commands.copyNodeAfterDestination(
			tree.t3ContextNode.attributes.nodeData,
			node.previousSibling.attributes.nodeData.id,
			function(response) {
				if (this.evaluateResponse(response)) {
					this.updateNode(node, true, response, function(node) {
						tree.triggerEdit(node);
					});
				}
				this.releaseCutAndCopyModes(tree);
			},
			this
		);
	},

	/**
	 * Copies the current tree context node as the first child of the given node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	copyNodeToFirstChildOfDestination: function(node, tree) {
		TYPO3.Components.PageTree.Commands.copyNodeToFirstChildOfDestination(
			tree.t3ContextNode.attributes.nodeData,
			node.parentNode.attributes.nodeData.id,
			function(response) {
				if (this.evaluateResponse(response)) {
					this.updateNode(node, true, response, function(node) {
						tree.triggerEdit(node);
					});
				}
				this.releaseCutAndCopyModes(tree);
			},
			this
		);
	},

	/**
	 * Visibilizes a page
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	enablePage: function(node) {
		TYPO3.Components.PageTree.Commands.visiblyNode(
			node.attributes.nodeData,
			function(response) {
				if (this.evaluateResponse(response)) {
					this.updateNode(node, node.isExpanded(), response);
				}
			},
			this
		);
	},

	/**
	 * Disables a page
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @return {void}
	 */
	disablePage: function(node) {
		TYPO3.Components.PageTree.Commands.disableNode(
			node.attributes.nodeData,
			function(response) {
				if (this.evaluateResponse(response)) {
					this.updateNode(node, node.isExpanded(), response);
				}
			},
			this
		);
	},

	/**
	 * Reloads the content frame with the current module and node id
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @return {void}
	 */
	singleClick: function(node, tree) {
		tree.currentSelectedNode = node;

		var separator = '?';
		if (currentSubScript.indexOf('?') !== -1) {
			separator = '&';
		}

		node.select();
		if (tree.stateHash) {
			tree.stateHash.lastSelectedNode = node.id;
		} else {
			TYPO3.Components.PageTree.Commands.addRootlineOfNodeToStateHash(
				TYPO3.Backend.NavigationContainer.PageTree.mainTree.stateId,
				node.attributes.nodeData.id, function(stateHash) {
					TYPO3.Backend.NavigationContainer.PageTree.mainTree.stateHash = stateHash;
					TYPO3.Backend.NavigationContainer.PageTree.mainTree.refreshTree();
				}
			);
		}

		fsMod.recentIds['web'] = node.attributes.nodeData.id;

		TYPO3.Backend.ContentContainer.setUrl(
			currentSubScript + separator + 'id=' + node.attributes.nodeData.id
		);
	},

	/**
	 * Opens a configured url inside the content frame
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {TYPO3.Components.PageTree.Tree} tree
	 * @param {Object} contextItem
	 * @return {void}
	 */
	openCustomUrlInContentFrame: function(node, tree, contextItem) {
		if (!contextItem.customAttributes || !contextItem.customAttributes.contentUrl) {
			return;
		}

		node.select();
		TYPO3.Backend.ContentContainer.setUrl(
			contextItem.customAttributes.contentUrl.replace('###ID###', node.attributes.nodeData.id)
		);
	},

	/**
	 * Updates the title of a node
	 *
	 * @param {Ext.tree.TreeNode} node
	 * @param {String} newText
	 * @param {String} oldText
	 * @param {TYPO3.Components.PageTree.TreeEditor} treeEditor
	 * @return {void}
	 */
	saveTitle: function(node, newText, oldText, treeEditor) {
		if (newText === oldText || newText == '') {
			treeEditor.updateNodeText(
				node,
				node.editNode.attributes.nodeData.editableText,
				Ext.util.Format.htmlEncode(oldText)
			);
			return;
		}

		TYPO3.Components.PageTree.Commands.updateLabel(
			node.editNode.attributes.nodeData,
			newText,
			function(response) {
				if (this.evaluateResponse(response)) {
					treeEditor.updateNodeText(node, response.editableText, response.updatedText);
				} else {
					treeEditor.updateNodeText(
						node,
						node.editNode.attributes.nodeData.editableText,
						Ext.util.Format.htmlEncode(oldText)
					);
				}
				this.singleClick(node.editNode, node.editNode.ownerTree);
			},
			this
		);
	}
};

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
Ext.ns('Ext.ux.state');

// dummy constructor
Ext.ux.state.TreePanel = function() {};

/**
 * State Provider for a tree panel
 */
Ext.override(Ext.ux.state.TreePanel, {
	/**
	 * Initializes the plugin
	 * @param {Ext.tree.TreePanel} tree
	 * @private
	 */
	init:function(tree) {
		tree.lastSelectedNode = null;
		tree.isRestoringState = false;
		tree.stateHash = {};

		// install event handlers on TreePanel
		tree.on({
			// add path of expanded node to stateHash
			beforeexpandnode:function(node) {
				if (this.isRestoringState) {
					return;
				}

				var saveID = (node.id === 'root' ? node.id : node.id.substr(1));
				this.stateHash[saveID] = 1;
			},

			// delete path and all subpaths of collapsed node from stateHash
			beforecollapsenode:function(node) {
				if (this.isRestoringState) {
					return;
				}

				var deleteID = (node.id === 'root' ? node.id : node.id.substr(1));
				delete this.stateHash[deleteID];
			},

			beforeclick: function(node) {
				if (this.isRestoringState) {
					return;
				}
				this.stateHash['lastSelectedNode'] = node.id;
			}
		});

			// update state on node expand or collapse
		tree.stateEvents = tree.stateEvents || [];
		tree.stateEvents.push('expandnode', 'collapsenode', 'click');

		// add state related props to the tree
		Ext.apply(tree, {
			// keeps expanded nodes paths keyed by node.ids
			stateHash:{},

			restoreState: function() {
				this.isRestoringState = true;
					// get last selected node
				for (var pageID in this.stateHash) {
					var pageNode = this.getNodeById((pageID !== 'root' ? 'p' : '') + pageID);
					if (pageNode) {
						pageNode.on({
							expand: {
								single:true,
								scope:this,
								fn: this.restoreState
							}
						});
						if (pageNode.expanded === false && pageNode.rendered == true) {
							pageNode.expand();
						}
					}
				}

				if (this.stateHash['lastSelectedNode']) {
					var node = this.getNodeById(this.stateHash['lastSelectedNode']);
					if (node) {
						var contentId = TYPO3.Backend.ContentContainer.getIdFromUrl() ||
							String(fsMod.recentIds['web']) || '-1';

						var hasContentFrameValidPageId = (contentId !== '-1' && contentId !== '0');
						var isCurrentSelectedNode = (
							String(node.attributes.nodeData.id) === contentId ||
							contentId.indexOf('pages' + String(node.attributes.nodeData.id)) !== -1
						);

						if (isCurrentSelectedNode) {
							this.selectPath(node.getPath());
						}

						var isSingleClickPossible = (this.app.isVisible() && this.commandProvider && this.commandProvider.singleClick);
						if (!hasContentFrameValidPageId && !isCurrentSelectedNode && isSingleClickPossible) {
							this.selectPath(node.getPath());
							this.commandProvider.singleClick(node, this);
						}
					}
				}

				this.isRestoringState = false;
			},

			// apply state on tree initialization
			applyState:function(state) {
				if(state) {
					Ext.apply(this, state);

					// it is too early to expand paths here
					// so do it once on root load
					this.root.on({
						load: {
							single:true,
							scope:this,
							fn: this.restoreState
						}
					});
				}
			},

			// returns stateHash for save by state manager
			getState:function() {
				return {stateHash:this.stateHash};
			}
		});
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
Ext.namespace('TYPO3.Components.PageTree');

/**
 * @class TYPO3.Components.PageTree.App
 *
 * Page tree main application that controls setups the components
 *
 * @namespace TYPO3.Components.PageTree
 * @extends Ext.Panel
 * @author Stefan Galinski <stefan.galinski@gmail.com>
 */
TYPO3.Components.PageTree.App = Ext.extend(Ext.Panel, {
	/**
	 * Panel id
	 *
	 * @type {String}
	 */
	id: 'typo3-pagetree',

	/**
	 * Border
	 *
	 * @type {Boolean}
	 */
	border: false,

	/**
	 * Layout Type
	 *
	 * @type {String}
	 */
	layout:'fit',

	/**
	 * Active tree
	 *
	 * @type {TYPO3.Components.PageTree.Tree}
	 */
	activeTree: null,

	/**
	 * Main pagetree
	 *
	 * @type {TYPO3.Components.PageTree.Tree}
	 */
	mainTree: null,

	/**
	 * Initializes the application
	 *
	 * Set's the necessary language labels, configuration options and sprite icons by an
	 * external call and initializes the needed components.
	 *
	 * @return {void}
	 */
	initComponent: function() {
		TYPO3.Components.PageTree.DataProvider.loadResources(function(response) {
			TYPO3.Components.PageTree.LLL = response['LLL'];
			TYPO3.Components.PageTree.Configuration = response['Configuration'];
			TYPO3.Components.PageTree.Sprites = response['Sprites'];

			this.mainTree = this.activeTree = new TYPO3.Components.PageTree.Tree({
				id: this.id + '-tree',
				deletionDropZoneId: this.id + '-deletionDropZone',
				ddGroup: this.id,
				stateful: true,
				stateId: 'Pagetree' + TYPO3.Components.PageTree.Configuration.temporaryMountPoint,
				stateEvents: [],
				autoScroll: true,
				autoHeight: false,
				plugins: new Ext.ux.state.TreePanel(),
				commandProvider: TYPO3.Components.PageTree.Actions,
				contextMenuProvider: TYPO3.Components.PageTree.ContextMenuDataProvider,
				treeDataProvider: TYPO3.Components.PageTree.DataProvider,
				app: this,
				listeners: {
					resize: {
						fn: function() {
							var treeContainer = Ext.getCmp(this.id + '-treeContainer');
							Ext.getCmp(this.id + '-filteringTree').setSize(treeContainer.getSize());
							treeContainer.doLayout();
						},
						scope: this,
						buffer: 250
					}
				}
			});

			var filteringTree = new TYPO3.Components.PageTree.FilteringTree({
				id: this.id + '-filteringTree',
				deletionDropZoneId: this.id + '-deletionDropZone',
				ddGroup: this.id,
				autoScroll: true,
				autoHeight: false,
				commandProvider: TYPO3.Components.PageTree.Actions,
				contextMenuProvider: TYPO3.Components.PageTree.ContextMenuDataProvider,
				treeDataProvider: TYPO3.Components.PageTree.DataProvider,
				app: this
			}).hide();

			var topPanel = new TYPO3.Components.PageTree.TopPanel({
				dataProvider: TYPO3.Components.PageTree.DataProvider,
				filteringTree: filteringTree,
				ddGroup: this.id,
				tree: this.mainTree,
				app: this
			});

			var deletionDropZone = new TYPO3.Components.PageTree.DeletionDropZone({
				id: this.id + '-deletionDropZone',
				commandProvider: TYPO3.Components.PageTree.Actions,
				ddGroup: this.id,
				app: this,
				region: 'south',
				height: 35
			});

			var topPanelItems = new Ext.Panel({
				id: this.id + '-topPanelItems',
				border: false,
				region: 'north',
				height: 49,
				items: [
					topPanel, {
						border: false,
						id: this.id + '-indicatorBar'
					}
				]
			});

			this.add({
				layout: 'border',
				items: [
					topPanelItems,
					{
						border: false,
						id: this.id + '-treeContainer',
						region: 'center',
						layout: 'fit',
						items: [this.mainTree, filteringTree]
					},
					deletionDropZone
				]
			});

			if (TYPO3.Components.PageTree.Configuration.temporaryMountPoint) {
				topPanelItems.on('afterrender', function() {
					this.addTemporaryMountPointIndicator();
				}, this);
			}

			if (TYPO3.Components.PageTree.Configuration.indicator !== '') {
				this.addIndicatorItems();
			}
			this.doLayout();

			this.ownerCt.on('resize', function() {
				this.doLayout();
			});
		}, this);

		TYPO3.Components.PageTree.App.superclass.initComponent.apply(this, arguments);
	},

	/**
	 * Adds the default indicator items
	 *
	 * @return {void}
	 */
	addIndicatorItems: function() {
		this.addIndicator({
			border: false,
			id: this.id + '-indicatorBar-indicatorTitle',
			cls: this.id + '-indicatorBar-item',
			html: TYPO3.Components.PageTree.Configuration.indicator
		});
	},

	/**
	 * Adds the temporary mount point indicator item
	 *
	 * @return {void}
	 */
	addTemporaryMountPointIndicator: function() {
		this.temporaryMountPointInfoIndicator = this.addIndicator({
			border: false,
			id: this.id + '-indicatorBar-temporaryMountPoint',
			cls: this.id + '-indicatorBar-item',

			listeners: {
				afterrender: {
					fn: function() {
						var element = Ext.fly(this.id + '-indicatorBar-temporaryMountPoint-clear');
						element.on('click', function() {
							TYPO3.BackendUserSettings.ExtDirect.unsetKey(
								'pageTree_temporaryMountPoint',
								function() {
									TYPO3.Components.PageTree.Configuration.temporaryMountPoint = null;
									this.removeIndicator(this.temporaryMountPointInfoIndicator);
									this.getTree().refreshTree();
									this.getTree().stateId = 'Pagetree';
								},
								this
							);
						}, this);
					},
					scope: this
				}
			},

			html: '<p>' +
					'<span id="' + this.id + '-indicatorBar-temporaryMountPoint-info' + '" ' +
						'class="' + this.id + '-indicatorBar-item-leftIcon ' +
							TYPO3.Components.PageTree.Sprites.Info + '">&nbsp;' +
					'</span>' +
					'<span id="' + this.id + '-indicatorBar-temporaryMountPoint-clear' + '" ' +
						'class="' + this.id + '-indicatorBar-item-rightIcon ' + '">X' +
					'</span>' +
					TYPO3.Components.PageTree.LLL.temporaryMountPointIndicatorInfo + '<br />' +
						TYPO3.Components.PageTree.Configuration.temporaryMountPoint +
				'</p>'
		});
	},

	/**
	 * Adds an indicator item
	 *
	 * @param {Object} component
	 * @return {void}
	 */
	addIndicator: function(component) {
		if (component.listeners && component.listeners.afterrender) {
			component.listeners.afterrender.fn = component.listeners.afterrender.fn.createSequence(
				this.afterTopPanelItemAdded, this
			);
		} else {
			if (component.listeners) {
				component.listeners = {}
			}

			component.listeners.afterrender = {
				scope: this,
				fn: this.afterTopPanelItemAdded
			}
		}

		var indicator = Ext.getCmp(this.id + '-indicatorBar').add(component);
		this.doLayout();

		return indicator;
	},

	/**
	 * Recalculates the top panel items height after an indicator was added
	 *
	 * @param {Ext.Component} component
	 * @return {void}
	 */
	afterTopPanelItemAdded: function(component) {
		var topPanelItems = Ext.getCmp(this.id + '-topPanelItems');
		topPanelItems.setHeight(topPanelItems.getHeight() + component.getHeight() + 3);
		this.doLayout();
	},

	/**
	 * Removes an indicator item from the indicator bar
	 *
	 * @param {Ext.Component} component
	 * @return {void}
	 */
	removeIndicator: function(component) {
		var topPanelItems = Ext.getCmp(this.id + '-topPanelItems');
		topPanelItems.setHeight(topPanelItems.getHeight() - component.getHeight() - 3);
		Ext.getCmp(this.id + '-indicatorBar').remove(component);
		this.doLayout();
	},

	/**
	 * Compatibility method that calls refreshTree()
	 *
	 * @return {void}
	 */
	refresh: function() {
		this.refreshTree();
	},

	/**
	 * Another compatibility method that calls refreshTree()
	 *
	 * @return {void}
	 */
	refresh_nav: function() {
		this.refreshTree();
	},

	/**
	 * Refreshes the tree and selects the node defined by fsMod.recentIds['web']
	 *
	 * @return {void}
	 */
	refreshTree: function() {
		if (!isNaN(fsMod.recentIds['web']) && fsMod.recentIds['web'] !== '') {
			this.select(fsMod.recentIds['web'], true);
		}

		TYPO3.Components.PageTree.DataProvider.getIndicators(function(response) {
			var indicators = Ext.getCmp(this.id + '-indicatorBar-indicatorTitle');
			if (indicators) {
				this.removeIndicator(indicators);
			}

			if (response._COUNT > 0) {
				TYPO3.Components.PageTree.Configuration.indicator = response.html;
				this.addIndicatorItems();
			}
		}, this);

		this.activeTree.refreshTree();
	},

	/**
	 * Returns the current active tree
	 *
	 * @return {TYPO3.Components.PageTree.Tree}
	 */
	getTree: function() {
		return this.activeTree;
	},

	/**
	 * Selects a node defined by the page id. If the second parameter is set, we
	 * store the new location into the state hash.
	 *
	 * @param {int} pageId
	 * @return {Boolean}
	 */
	select: function(pageId) {
		TYPO3.Components.PageTree.Commands.addRootlineOfNodeToStateHash(
			TYPO3.Backend.NavigationContainer.PageTree.mainTree.stateId,
			pageId, function(stateHash) {
				TYPO3.Backend.NavigationContainer.PageTree.mainTree.stateHash = stateHash;
				TYPO3.Backend.NavigationContainer.PageTree.mainTree.refreshTree();
			}
		);

		return true;
	},

	/**
	 * Returns the currently selected node
	 *
	 * @return {Ext.tree.TreeNode}
	 */
	getSelected: function() {
		var node = this.getTree().getSelectionModel().getSelectedNode();
		return node ? node : null;
	}
});

/**
 * Callback method for the module menu
 *
 * @return {TYPO3.Components.PageTree.App}
 */
TYPO3.ModuleMenu.App.registerNavigationComponent('typo3-pagetree', function() {
	TYPO3.Backend.NavigationContainer.PageTree = new TYPO3.Components.PageTree.App();

		// compatibility code
    top.nav = TYPO3.Backend.NavigationContainer.PageTree;
    top.nav_frame = TYPO3.Backend.NavigationContainer.PageTree;
    top.content.nav_frame = TYPO3.Backend.NavigationContainer.PageTree;

	return TYPO3.Backend.NavigationContainer.PageTree;
});

// XTYPE Registration
Ext.reg('TYPO3.Components.PageTree.App', TYPO3.Components.PageTree.App);

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

Ext.ns('TYPO3.state');

/**
 * Creates new ExtDirectProvider
 * @constructor
 * @param {Object} config Configuration object
 * @author Jozef Sakalos
 * @author Steffen Kamper
 */

TYPO3.state.ExtDirectProvider = function(config) {

	this.addEvents(
		/**
		 * @event readsuccess
		 * Fires after state has been successfully received from server and restored
		 * @param {HttpProvider} this
		 */
			'readsuccess',
		/**
		 * @event readfailure
		 * Fires in the case of an error when attempting to read state from server
		 * @param {HttpProvider} this
		 */
			'readfailure',
		/**
		 * @event savesuccess
		 * Fires after the state has been successfully saved to server
		 * @param {HttpProvider} this
		 */
			'savesuccess',
		/**
		 * @event savefailure
		 * Fires in the case of an error when attempting to save state to the server
		 * @param {HttpProvider} this
		 */
			'savefailure'
			);

		// call parent
	TYPO3.state.ExtDirectProvider.superclass.constructor.call(this);

	Ext.apply(this, config, {
		// defaults
		delay: 750, // buffer changes for 750 ms
		dirty: false,
		started: false,
		autoStart: true,
		autoRead: true,
		key: 'States.General',
		logFailure: false,
		logSuccess: false,
		queue: [],
		saveBaseParams: {},
		readBaseParams: {},
		paramNames:{
			key: 'key',
			name: 'name',
			value: 'value',
			data: 'data'
		}
	});

	if (this.autoRead) {
		this.readState();
	}

	this.dt = new Ext.util.DelayedTask(this.submitState, this);
	if (this.autoStart) {
		this.start();
	}
};


Ext.extend(TYPO3.state.ExtDirectProvider, Ext.state.Provider, {

		// localizable texts
	saveSuccessText: 'Save Success',
	saveFailureText: 'Save Failure',
	readSuccessText: 'Read Success',
	readFailureText: 'Read Failure',
	dataErrorText: 'Data Error',



	/**
	 * Initializes state from the passed state object or array.
	 * Use this with loading page using initial state in TYPO3.settings
	 *
	 * @param {Array/Object} state State to initialize state manager with
	 */
	initState: function(state) {
		if (Ext.isArray(state)) {
			Ext.each(state, function(item) {
				this.state[item.name] = item[this.paramNames.value];
			}, this);
		} else if (Ext.isObject(state)) {
			Ext.iterate(state, function(key, value){
				this.state[key] = value;
			}, this);
		} else {
			this.state = {};
		}
	},

	/**
	 * Sets the passed state variable name to the passed value and queues the change
	 * @param {String} name Name of the state variable
	 * @param {Mixed} value Value of the state variable
	 */
	set: function(name, value) {
		if (!name) {
			return;
		}
		this.queueChange(name, value);
	},


	/**
	 * Starts submitting state changes to server
	 */
	start: function() {
		this.dt.delay(this.delay);
		this.started = true;
	},


	/**
	 * Stops submitting state changes
	 */
	stop: function() {
		this.dt.cancel();
		this.started = false;
	},


	/**
	 * private, queues the state change if state has changed
	 */
	queueChange: function(name, value) {
		var o = {};
		var i;
		var found = false;

		var lastValue = this.state[name];
		for (i = 0; i < this.queue.length; i++) {
			if (this.queue[i].name === name) {
				lastValue = this.queue[i].value;
			}
		}
		var changed = undefined === lastValue || lastValue !== value;

		if (changed) {
			o[this.paramNames.name] = name;
			o[this.paramNames.value] = value;
			for (i = 0; i < this.queue.length; i++) {
				if (this.queue[i].name === o.name) {
					this.queue[i] = o;
					found = true;
				}
			}
			if (false === found) {
				this.queue.push(o);
			}
			this.dirty = true;
		}
		if (this.started) {
			this.start();
		}
		return changed;
	},


	/**
	 * private, submits state to server by asynchronous Ajax request
	 */
	submitState: function() {
		if (!this.dirty) {
			this.dt.delay(this.delay);
			return;
		}
		this.dt.cancel();

		var o = {
			scope: this,
			success: this.onSaveSuccess,
			failure: this.onSaveFailure,
			queue: this.queue, //this.clone(this.queue),
			params: {}
		};

		var params = Ext.apply({}, this.saveBaseParams);
		params[this.paramNames.key] = this.key;
		params[this.paramNames.data] = Ext.encode(o.queue);

		Ext.apply(o.params, params);

		// be optimistic
		this.dirty = false;

	   TYPO3.ExtDirectStateProvider.ExtDirect.setState(o, function(response, options) {
		   if (response.success) {
				this.onSaveSuccess(response, options);
		   } else {
				this.onSaveFailure(response, options);
		   }
	   }, this);
	},


	/**
	 * Clears the state variable
	 * @param {String} name Name of the variable to clear
	 */
	clear: function(name) {
		this.set(name, undefined);
	},


	/**
	 * private, save success callback
	 */
	onSaveSuccess: function(response, options) {
		var o = response;
		if (!o.success) {
			if (this.logFailure) {
				this.log(this.saveFailureText, o, response);
			}
			this.dirty = true;
		} else {
			Ext.each(response.params.queue, function(item) {
				if (!item) {
					return;
				}
				var name = item[this.paramNames.name];
				var value = item[this.paramNames.value];

				if (value === undefined || value === null) {
					TYPO3.state.ExtDirectProvider.superclass.clear.call(this, name);
				} else {
						// parent sets value and fires event
					TYPO3.state.ExtDirectProvider.superclass.set.call(this, name, value);
				}
			}, this);
			if (!this.dirty) {
				this.queue = [];
			}else {
				var i, j, found;
				for (i = 0; i < response.params.queue.length; i++) {
					found = false;
					for (j = 0; j < this.queue.length; j++) {
						if (response.params.queue[i].name === this.queue[j].name) {
							found = true;
							break;
						}
					}
					if (found && response.params.queue[i].value === this.queue[j].value) {
						this.queue.remove(this.queue[j]);
					}
				}
			}
			if (this.logSuccess) {
				this.log(this.saveSuccessText, o, response);
			}
			this.fireEvent('savesuccess', this);
		}
	},


	/**
	 * private, save failure callback
	 */
	onSaveFailure: function(response, options) {
		if (true === this.logFailure) {
			this.log(this.saveFailureText, response);
		}
		this.dirty = true;
		this.fireEvent('savefailure', this);
	},


	/**
	 * private, read state callback
	 */
	onReadFailure: function(response, options) {
		if (this.logFailure) {
			this.log(this.readFailureText, response);
		}
		this.fireEvent('readfailure', this);

	},


	/**
	 * private, read success callback
	 */
	onReadSuccess: function(response, options) {
		var o = response, data;
		if (!o.success) {
			if (this.logFailure) {
				this.log(this.readFailureText, o, response);
			}
		} else {
			data = o[this.paramNames.data];
			Ext.iterate(data, function(key, value) {
				this.state[key] = value;
			}, this);
			this.queue = [];
			this.dirty = false;
			if (this.logSuccess) {
				this.log(this.readSuccessText, data, response);
			}
			this.fireEvent('readsuccess', this);
		}
	},


	/**
	 * Reads saved state from server by sending asynchronous Ajax request and processing the response
	 */
	readState: function() {
		var o = {
			scope: this,
			params:{}
		};

		var params = Ext.apply({}, this.readBaseParams);
		params[this.paramNames.key] = this.key;

		Ext.apply(o.params, params);
		TYPO3.ExtDirectStateProvider.ExtDirect.getState(o, function(response, options) {
		   if (response.success) {
				this.onReadSuccess(response, options);
		   } else {
				this.onReadFailure(response, options);
		   }
	   }, this);
	},


	/**
	 * private, logs errors or successes
	 */
	log: function() {
		if (console) {
			console.log.apply(console, arguments);
		}
	},

	logState: function() {
	   if (console) {
			console.log(this.state);
		}
	}

});

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