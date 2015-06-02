
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

Ext.ns('TYPO3.Components', 'TYPO3.Components.Tree');

/**
 * TYPO3window - General TYPO3 tree component
 */

TYPO3.Components.Tree = {};
TYPO3.Components.Tree.StandardTreeItemData = [];

TYPO3.Components.Tree.StandardTree = function(config) {
	var conf = Ext.apply({
		header: false,
		width: 280,
		rootVisible: false,
		useArrows: false,
		lines: true,
		autoScroll: true,
		containerScroll: true,
		exclusiveSelectedKey: null,
		stateful: true,
		filterOptionStartsWith: true,
		countSelectedNodes: 0,
		loader: new Ext.tree.TreeLoader({
			preloadChildren: true,
			clearOnLoad: false
		}),
		root: new Ext.tree.AsyncTreeNode({
			text: TYPO3.l10n.localize('tcatree'),
			id: 'root',
			expanded: true,
			children: TYPO3.Components.Tree.StandardTreeItemData[config.id]
		}),
		collapseFirst: false,
		listeners: {
			'checkchange': function(checkedNode, checked) {
				if (Ext.isFunction(this.checkChangeHandler)) {
					this.checkChangeHandler.call(this, checkedNode, checked);
				}
			},
			scope: this
		}
	}, config);
	TYPO3.Components.Tree.StandardTree.superclass.constructor.call(this, conf);
};


Ext.extend(TYPO3.Components.Tree.StandardTree, Ext.tree.TreePanel, {

	initComponent: function() {
		Ext.apply(this, {
			tbar: this.initialConfig.showHeader ? TYPO3.Components.Tree.Toolbar([], this) : null
		});
		TYPO3.Components.Tree.StandardTree.superclass.initComponent.call(this);
	},
	filterTree: function(filterText) {
		var text = filterText.getValue();
		Ext.each(this.hiddenNodes, function(node) {
			node.ui.show();
			node.ui.removeClass('bgColor6');
		});
		if (!text) {
			this.filter.clear();
			return;
		}
		this.expandAll();
		var regText = (this.filterOptionStartsWith ? '^' : '') + Ext.escapeRe(text);
		var re = new RegExp(regText, 'i');

			// hide empty nodes that weren't filtered
		this.hiddenNodes = [];
		var me = this;
		this.root.cascade(function(node) {
			if (node.ui.ctNode.offsetHeight < 3) {
				if (!re.test(node.text)) {
					node.ui.hide();
					me.hiddenNodes.push(node);
				} else {
					node.ui.addClass('bgColor6');
				}
			}
		}, this);
	}
});

TYPO3.Components.Tree.Toolbar = function(items, scope) {
	items = items || [];
	items.push([
		' ',
		{
			iconCls: 't3-icon t3-icon-actions t3-icon-actions-system t3-icon-system-tree-search-open',
			menu: {
				items: [
					{
						text: TYPO3.l10n.localize('tcatree.filter.startsWith'),
						checked: true,
						group: 'searchStartsWith',
						handler: function(item) {
							scope.filterOptionStartsWith = true;
							scope.filterTree(scope.getTopToolbar().getComponent('filterText'));
						},
						scope: scope
					},
					{
						text: TYPO3.l10n.localize('tcatree.filter.contains'),
						checked: false,
						group: 'searchStartsWith',
						handler: function(item) {
							scope.filterOptionStartsWith = false;
							scope.filterTree(scope.getTopToolbar().getComponent('filterText'));
						},
						scope: scope
					}
				]
			}
		},
		new Ext.form.TextField({
			width: 150,
			emptyText: TYPO3.l10n.localize('tcatree.findItem'),
			enableKeyEvents: true,
			itemId: 'filterText',
			listeners:{
				render: function(f) {
					this.filter = new Ext.tree.TreeFilter(this, {
						clearBlank: true,
						autoClear: true
					});
				},
				keydown: {
					fn: scope.filterTree,
					buffer: 350,
					scope: scope
				},
				scope: scope
			}
		}),
		'->',
		{
			iconCls: 't3-icon t3-icon-apps t3-icon-apps-tcatree t3-icon-tcatree-select-recursive',
			tooltip: TYPO3.lang['tcatree.enableRecursiveSelection'],
			enableToggle: true,
			disable: scope.tcaSelectRecursive,
			toggleHandler: function(btn, state) {
				this.tcaSelectRecursive = state;
			},
			scope: scope
		},
		{
			iconCls: 'icon-expand-all',
			tooltip: TYPO3.l10n.localize('tcatree.expandAll'),
			handler: function() {
					this.root.expand(true);
			},
			scope: scope
		}, {
			iconCls: 'icon-collapse-all',
			tooltip: TYPO3.l10n.localize('tcatree.collapseAll'),
			handler: function() {
				this.root.collapse(true);
			},
			scope: scope
		}
	]);
	return items;
};

TYPO3.Components.Tree.EmptySelectionModel = new Ext.tree.DefaultSelectionModel({
	select: Ext.emptyFn
})

TYPO3.Components.Tree.TcaCheckChangeHandler = function(checkedNode, checked) {
	var exclusiveKeys = this.tcaExclusiveKeys.split(','),
		uid = '' + checkedNode.attributes.uid;

	this.suspendEvents();

	if (this.tcaExclusiveKeys.length) {
		if (checked === true && exclusiveKeys.indexOf(uid) > -1) {
				// this key is exclusive, so uncheck all others
			this.root.cascade(function(node) {
				if (node !== checkedNode && node.attributes.checked) {
					node.attributes.checked = false;
					node.ui.toggleCheck(false);
				}
			});
			this.exclusiveSelectedKey = uid;
		} else if (checked === true && exclusiveKeys.indexOf(uid) === -1 && !Ext.isEmpty(this.exclusiveSelectedKey)) {
				// this key is exclusive, so uncheck all others
			this.root.cascade(function(node) {
				if (exclusiveKeys.indexOf('' + node.attributes.uid) > -1) {
					node.attributes.checked = false;
					node.ui.toggleCheck(false);
				}
			});
			this.exclusiveSelectedKey = null;
		}
	}

	if (checked === true && this.countSelectedNodes >= this.tcaMaxItems) {
		checkedNode.attributes.checked = false;
		checkedNode.getUI().toggleCheck(false);
		this.resumeEvents();
		return false;
	}
	if (checked) {
		checkedNode.getUI().addClass('complete');
	} else {
		checkedNode.getUI().removeClass('complete');
	}
		// if recursive selection is asked, hand over selection
	if(this.tcaSelectRecursive) {
		checkedNode.cascade(function(node) {
			node.attributes.checked = checkedNode.attributes.checked;
			node.ui.toggleCheck(checkedNode.attributes.checked);
		})
	}
	var selected = [];
	this.root.cascade(function(node) {
		if (node.ui.isChecked()) {
			selected.push(node.attributes.uid);
		}
	});
	this.countSelectedNodes = selected.length;
	Ext.fly('treeinput' + this.id).dom.value = selected.join(',');
	eval(this.onChange);

	this.resumeEvents();
};

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

/*<![CDATA[*/

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
 *  Inline-Relational-Record Editing
 */

var inline = {
	classVisible: 'panel-visible',
	classCollapsed: 'panel-collapsed',
	structureSeparator: '-',
	flexFormSeparator: '---',
	flexFormSubstitute: ':',
	prependFormFieldNames: 'data',
	noTitleString: '[No title]',
	lockedAjaxMethod: {},
	sourcesLoaded: {},
	data: {},
	isLoading: false,

	addToDataArray: function (object) {
		TYPO3.jQuery.each(object, function (key, value) {
			if (!inline.data[key]) {
				inline.data[key] = {};
			}
			TYPO3.jQuery.extend(inline.data[key], value);
		});
	},
	setPrependFormFieldNames: function (value) {
		this.prependFormFieldNames = value;
	},
	setNoTitleString: function (value) {
		this.noTitleString = value;
	},
	toggleEvent: function (event) {
		var $triggerElement = TYPO3.jQuery(event.target);
		if ($triggerElement.parents('.t3js-formengine-irre-control').length == 1) {
			return;
		}

		var $recordHeader = TYPO3.jQuery(this);
		inline.expandCollapseRecord(
			$recordHeader.attr('id').replace('_header', ''),
			$recordHeader.attr('data-expandSingle'),
			$recordHeader.attr('data-returnURL')
		);
	},
	expandCollapseRecord: function (objectId, expandSingle, returnURL) {
		var currentUid = this.parseObjectId('none', objectId, 1);
		var objectPrefix = this.parseObjectId('full', objectId, 0, 1);
		var escapedObjectId = this.escapeObjectId(objectId);

		var $currentObject = TYPO3.jQuery('#' + escapedObjectId + '_div');
		// if content is not loaded yet, get it now from server
		if (inline.isLoading) {
			return false;
		} else if (TYPO3.jQuery('#' + escapedObjectId + '_fields').length > 0 && TYPO3.jQuery('#' + escapedObjectId + '_fields').html().substr(0, 16) == '<!--notloaded-->') {
			inline.isLoading = true;
			var headerIdentifier = '#' + escapedObjectId + '_header';
			// add loading-indicator
			require(['nprogress'], function(NProgress) {
				inline.progress = NProgress;
				inline.progress.configure({parent: headerIdentifier, showSpinner: false});
				inline.progress.start();
			});
			return this.getRecordDetails(objectId, returnURL);
		}

		var isCollapsed = $currentObject.hasClass(this.classCollapsed);
		var collapse = [];
		var expand = [];

		// if only a single record should be visibly for that set of records
		// and the record clicked itself is no visible, collapse all others
		if (expandSingle && $currentObject.hasClass(this.classCollapsed)) {
			collapse = this.collapseAllRecords(objectId, objectPrefix, currentUid);
		}

		inline.toggleElement(objectId);

		if (this.isNewRecord(objectId)) {
			this.updateExpandedCollapsedStateLocally(objectId, isCollapsed);
		} else if (isCollapsed) {
			expand.push(currentUid);
		} else if (!isCollapsed) {
			collapse.push(currentUid);
		}

		this.setExpandedCollapsedState(objectId, expand.join(','), collapse.join(','));

		return false;
	},

	toggleElement: function (objectId) {
		var escapedObjectId = this.escapeObjectId(objectId);
		var $jQueryObject = TYPO3.jQuery('#' + escapedObjectId + '_div');

		if ($jQueryObject.hasClass(this.classCollapsed)) {
			$jQueryObject.removeClass(this.classCollapsed).addClass(this.classVisible);
			$jQueryObject.find('#' + escapedObjectId + '_header .t3-icon-irre-collapsed').removeClass('t3-icon-irre-collapsed').addClass('t3-icon-irre-expanded');
		} else {
			$jQueryObject.removeClass(this.classVisible).addClass(this.classCollapsed);
			$jQueryObject.find('#' + escapedObjectId + '_header .t3-icon-irre-expanded').addClass('t3-icon-irre-collapsed').removeClass('t3-icon-irre-expanded');
		}
	},
	collapseAllRecords: function (objectId, objectPrefix, callingUid) {
		// get the form field, where all records are stored
		var objectName = this.prependFormFieldNames + this.parseObjectId('parts', objectId, 3, 2, true);
		var formObj = document.getElementsByName(objectName);
		var collapse = [];

		if (formObj.length) {
			// the uid of the calling object (last part in objectId)
			var recObjectId = '', escapedRecordObjectId;

			var records = formObj[0].value.split(',');
			for (var i = 0; i < records.length; i++) {
				recObjectId = objectPrefix + this.structureSeparator + records[i];
				escapedRecordObjectId = this.escapeObjectId(recObjectId);

				var $recordEntry = TYPO3.jQuery('#' + escapedRecordObjectId);
				if (records[i] != callingUid && $recordEntry.hasClass(this.classVisible)) {
					TYPO3.jQuery('#' + escapedRecordObjectId + '_div').removeClass(this.classVisible).addClass(this.classCollapsed);
					if (this.isNewRecord(recObjectId)) {
						this.updateExpandedCollapsedStateLocally(recObjectId, 0);
					} else {
						collapse.push(records[i]);
					}
				}
			}
		}

		return collapse;
	},

	updateExpandedCollapsedStateLocally: function (objectId, value) {
		var ucName = 'uc[inlineView]' + this.parseObjectId('parts', objectId, 3, 2, true);
		var ucFormObj = document.getElementsByName(ucName);
		if (ucFormObj.length) {
			ucFormObj[0].value = value;
		}
	},

	getRecordDetails: function (objectId, returnURL) {
		var context = this.getContext(this.parseObjectId('full', objectId, 0, 1));
		inline.makeAjaxCall('getRecordDetails', [inline.getNumberOfRTE(), objectId, returnURL], true, context);
		return false;
	},

	createNewRecord: function (objectId, recordUid) {
		if (this.isBelowMax(objectId)) {
			var context = this.getContext(objectId);
			if (recordUid) {
				objectId += this.structureSeparator + recordUid;
			}
			this.makeAjaxCall('createNewRecord', [this.getNumberOfRTE(), objectId], true, context);
		} else {
			var message = TBE_EDITOR.labels.maxItemsAllowed.replace('{0}', this.data.config[objectId].max);
			var matches = objectId.match(/^(data-\d+-.*?-\d+-.*?)-(.*?)$/);
			var title = '';
			if (matches) {
				title = TYPO3.jQuery('#' + matches[1] + '_records').data('title');
			}
			top.TYPO3.Notification.error(title, message, 5);
		}
		return false;
	},

	synchronizeLocalizeRecords: function (objectId, type) {
		var context = this.getContext(objectId);
		var parameters = [this.getNumberOfRTE(), objectId, type];
		this.makeAjaxCall('synchronizeLocalizeRecords', parameters, true, context);
	},

	setExpandedCollapsedState: function (objectId, expand, collapse) {
		var context = this.getContext(objectId);
		this.makeAjaxCall('setExpandedCollapsedState', [objectId, expand, collapse], false, context);
	},

	makeAjaxCall: function (method, params, lock, context) {
		var url = '', urlParams = '', options = {};
		if (method && params && params.length && this.lockAjaxMethod(method, lock)) {
			url = TYPO3.settings.ajaxUrls['t3lib_TCEforms_inline::' + method];
			urlParams = '';
			for (var i = 0, max = params.length; i < max; i++) {
				urlParams += '&ajax[' + i + ']=' + encodeURIComponent(params[i]);
			}
			if (context) {
				urlParams += '&ajax[context]=' + encodeURIComponent(Object.toJSON(context));
			}
			options = {
				type: 'POST',
				data: urlParams,
				success: function (data, message, jqXHR) {
					inline.isLoading = false;
					inline.processAjaxResponse(method, jqXHR);
					if (inline.progress) {
						inline.progress.done();
					}
				},
				error: function (jqXHR, statusText, errorThrown) {
					inline.isLoading = false;
					inline.showAjaxFailure(method, jqXHR);
					if (inline.progress) {
						inline.progress.done();
					}
				}
			};

			TYPO3.jQuery.ajax(url, options);
		}
	},

	lockAjaxMethod: function (method, lock) {
		if (!lock || !inline.lockedAjaxMethod[method]) {
			inline.lockedAjaxMethod[method] = true;
			return true;
		} else {
			return false;
		}
	},

	unlockAjaxMethod: function (method) {
		inline.lockedAjaxMethod[method] = false;
	},

	processAjaxResponse: function (method, xhr, json) {
		var addTag = null, restart = false, processedCount = 0, element = null, errorCatch = [], sourcesWaiting = [];
		if (!json && xhr) {
			json = xhr.responseJSON;
		}
		// If there are elements the should be added to the <HEAD> tag (e.g. for RTEhtmlarea):
		if (json.headData) {
			var head = inline.getDomHeadTag();
			var headTags = inline.getDomHeadChildren(head);
			TYPO3.jQuery.each(json.headData, function (index, addTag) {
				if (restart) {
					return;
				}
				if (!addTag || (!addTag.innerHTML && inline.searchInDomTags(headTags, addTag))) {
					return;
				}

				if (addTag.name == 'SCRIPT' && addTag.innerHTML && processedCount) {
					restart = true;
					return false;
				} else {
					if (addTag.name == 'SCRIPT' && addTag.innerHTML) {
						try {
							eval(addTag.innerHTML);
						} catch (e) {
							errorCatch.push(e);
						}
					} else {
						element = inline.createNewDomElement(addTag);
						// Set onload handler for external JS scripts:
						if (addTag.name == 'SCRIPT' && element.src) {
							element.onload = inline.sourceLoadedHandler(element);
							sourcesWaiting.push(element.src);
						}
						head.appendChild(element);
						processedCount++;
					}
					delete(json.headData[index]);
				}
			});
		}
		if (restart || processedCount) {
			window.setTimeout(function () {
				inline.reprocessAjaxResponse(method, json, sourcesWaiting);
			}, 40);
		} else {
			if (method) {
				inline.unlockAjaxMethod(method);
			}
			if (json.scriptCall && json.scriptCall.length > 0) {
				TYPO3.jQuery.each(json.scriptCall, function (index, value) {
					eval(value);
				});
			}
			TYPO3.FormEngine.reinitialize();
		}
	},

	// Check if dynamically added scripts are loaded and restart inline.processAjaxResponse():
	reprocessAjaxResponse: function (method, json, sourcesWaiting) {
		var sourcesLoaded = true;
		if (sourcesWaiting && sourcesWaiting.length) {
			TYPO3.jQuery.each(sourcesWaiting, function (index, source) {
				if (!inline.sourcesLoaded[source]) {
					sourcesLoaded = false;
					return false;
				}
			});
		}
		if (sourcesLoaded) {
			TYPO3.jQuery.each(sourcesWaiting, function (index, source) {
				delete(inline.sourcesLoaded[source]);
			});
			window.setTimeout(function () {
				inline.processAjaxResponse(method, null, json);
			}, 80);
		} else {
			window.setTimeout(function () {
				inline.reprocessAjaxResponse(method, json, sourcesWaiting);
			}, 40);
		}
	},

	sourceLoadedHandler: function (element) {
		if (element && element.src) {
			inline.sourcesLoaded[element.src] = true;
		}
	},

	showAjaxFailure: function (method, xhr) {
		inline.unlockAjaxMethod(method);
		alert('Error: ' + xhr.status + "\n" + xhr.statusText);
	},

	// foreign_selector: used by selector box (type='select')
	importNewRecord: function (objectId) {
		var $selector = TYPO3.jQuery('#' + this.escapeObjectId(objectId) + '_selector');
		var selectedIndex = $selector.prop('selectedIndex');
		if (selectedIndex != -1) {
			var context = this.getContext(objectId);
			var selectedValue = $selector.val();
			if (!this.data.unique || !this.data.unique[objectId]) {
				$selector.find('option').eq(selectedIndex).prop('selected', false);
			}
			this.makeAjaxCall('createNewRecord', [this.getNumberOfRTE(), objectId, selectedValue], true, context);
		}
		return false;
	},

	// foreign_selector: used by element browser (type='group/db')
	importElement: function (objectId, table, uid, type) {
		var context = this.getContext(objectId);
		inline.makeAjaxCall('createNewRecord', [inline.getNumberOfRTE(), objectId, uid], true, context);
	},

	importElementMultiple: function (objectId, table, uidArray, type) {
		TYPO3.jQuery.each(uidArray, function (index, uid) {
			inline.delayedImportElement(objectId, table, uid, type);
		});
	},
	delayedImportElement: function (objectId, table, uid, type) {
		if (inline.lockedAjaxMethod['createNewRecord'] == true) {
			window.setTimeout("inline.delayedImportElement('" + objectId + "','" + table + "'," + uid + ", null );",
				300);
		} else {
			inline.importElement(objectId, table, uid, type);
		}
	},
	// Check uniqueness for element browser:
	checkUniqueElement: function (objectId, table, uid, type) {
		if (this.checkUniqueUsed(objectId, uid, table)) {
			return {passed: false, message: 'There is already a relation to the selected element!'};
		} else {
			return {passed: true};
		}
	},

	// Checks if a record was used and should be unique:
	checkUniqueUsed: function (objectId, uid, table) {
		if (!this.data.unique || !this.data.unique[objectId]) {
			return false;
		}

		var unique = this.data.unique[objectId];
		var values = this.getValuesFromHashMap(unique.used);

		// for select: only the uid is stored
		if (unique['type'] == 'select') {
			if (values.indexOf(uid) != -1) {
				return true;
			}

			// for group/db: table and uid is stored in a assoc array
		} else if (unique.type == 'groupdb') {
			for (var i = values.length - 1; i >= 0; i--) {
				// if the pair table:uid is already used:
				if (values[i].table == table && values[i].uid == uid) {
					return true;
				}
			}
		}

		return false;
	},

	setUniqueElement: function (objectId, table, uid, type, elName) {
		var recordUid = this.parseFormElementName('none', elName, 1, 1);
		// alert(objectId+'/'+table+'/'+uid+'/'+recordUid);
		this.setUnique(objectId, recordUid, uid);
	},

	getKeysFromHashMap: function (unique) {
		return TYPO3.jQuery.map(unique, function(value, key) {
			return key;
		});
	},

	getValuesFromHashMap: function (hashMap) {
		return TYPO3.jQuery.map(hashMap, function(value, key) {
			return value;
		});
	},

	// Remove all select items already used
	// from a newly retrieved/expanded record
	removeUsed: function (objectId, recordUid) {
		if (!this.data.unique || !this.data.unique[objectId]) {
			return;
		}

		var unique = this.data.unique[objectId];
		if (unique.type != 'select') {
			return;
		}

		var formName = this.prependFormFieldNames + this.parseObjectId('parts', objectId, 3, 1, true);
		var formObj = document.getElementsByName(formName);
		var recordObj = document.getElementsByName(this.prependFormFieldNames + '[' + unique.table + '][' + recordUid + '][' + unique.field + ']');
		var values = this.getValuesFromHashMap(unique.used);
		if (recordObj.length) {
			if (recordObj[0].hasOwnProperty('options')) {
				var selectedValue = recordObj[0].options[recordObj[0].selectedIndex].value;
				for (var i = 0; i < values.length; i++) {
					if (values[i] != selectedValue) {
						var $recordObject = TYPO3.jQuery(recordObj[0]);
						this.removeSelectOption($recordObject, values[i]);
					}
				}
			}
		}
	},
	// this function is applied to a newly inserted record by AJAX
	// it removes the used select items, that should be unique
	setUnique: function (objectId, recordUid, selectedValue) {
		if (!this.data.unique || !this.data.unique[objectId]) {
			return;
		}
		var $selector = TYPO3.jQuery('#' + this.escapeObjectId(objectId) + '_selector');

		var unique = this.data.unique[objectId];
		if (unique.type == 'select') {
			if (!(unique.selector && unique.max == -1)) {
				var formName = this.prependFormFieldNames + this.parseObjectId('parts', objectId, 3, 1, true);
				var formObj = document.getElementsByName(formName);
				var recordObj = document.getElementsByName(this.prependFormFieldNames + '[' + unique.table + '][' + recordUid + '][' + unique.field + ']');
				var values = this.getValuesFromHashMap(unique.used);
				if ($selector.length) {
					// remove all items from the new select-item which are already used in other children
					if (recordObj.length) {
						var $recordObject = TYPO3.jQuery(recordObj[0]);
						for (var i = 0; i < values.length; i++) {
							this.removeSelectOption($recordObject, values[i]);
						}
						// set the selected item automatically to the first of the remaining items if no selector is used
						if (!unique.selector) {
							selectedValue = recordObj[0].options[0].value;
							recordObj[0].options[0].selected = true;
							this.updateUnique(recordObj[0], objectId, formName, recordUid);
							this.handleChangedField(recordObj[0], objectId + '[' + recordUid + ']');
						}
					}
					for (var i = 0; i < values.length; i++) {
						this.removeSelectOption($selector, values[i]);
					}
					if (typeof this.data.unique[objectId].used.length != 'undefined') {
						this.data.unique[objectId].used = {};
					}
					this.data.unique[objectId].used[recordUid] = selectedValue;
				}
				// remove the newly used item from each select-field of the child records
				if (formObj.length && selectedValue) {
					var records = formObj[0].value.split(',');
					for (var i = 0; i < records.length; i++) {
						recordObj = document.getElementsByName(this.prependFormFieldNames + '[' + unique.table + '][' + records[i] + '][' + unique.field + ']');
						if (recordObj.length && records[i] != recordUid) {
							var $recordObject = TYPO3.jQuery(recordObj[0]);
							this.removeSelectOption($recordObject, selectedValue);
						}
					}
				}
			}
		} else if (unique.type == 'groupdb') {
			// add the new record to the used items:
			this.data.unique[objectId].used[recordUid] = {'table': unique.elTable, 'uid': selectedValue};
		}

		// remove used items from a selector-box
		if (unique.selector == 'select' && selectedValue) {
			this.removeSelectOption($selector, selectedValue);
			this.data.unique[objectId]['used'][recordUid] = selectedValue;
		}
	},

	domAddNewRecord: function (method, insertObjectId, objectPrefix, htmlData) {
		var $insertObject = TYPO3.jQuery('#' + this.escapeObjectId(insertObjectId));
		if (this.isBelowMax(objectPrefix)) {
			if (method == 'bottom') {
				$insertObject.append(htmlData);
			} else if (method == 'after') {
				$insertObject.after(htmlData);
			}
		} else {
			var message = TBE_EDITOR.labels.maxItemsAllowed.replace('{0}', this.data.config[objectPrefix].max);
			var title = $insertObject.data('title');
			top.TYPO3.Notification.error(title, message);
		}
	},

	domAddRecordDetails: function (objectId, objectPrefix, expandSingle, htmlData) {
		var hiddenValue, formObj, valueObj;
		var escapeObjectId = this.escapeObjectId(objectId);
		var $objectDiv = TYPO3.jQuery('#' + escapeObjectId + '_fields');
		if ($objectDiv.length == 0 || $objectDiv.html().substr(0, 16) != '<!--notloaded-->') {
			return;
		}

		var elName = this.parseObjectId('full', objectId, 2, 0, true);

		var $formObj = TYPO3.jQuery('[name="' + elName + '[hidden]_0"]');
		var $valueObj = TYPO3.jQuery('[name="' + elName + '[hidden]"]');

		// It might be the case that a child record
		// cannot be hidden at all (no hidden field)
		if ($formObj.length && $valueObj.length) {
			hiddenValue = $formObj[0].checked;
			$formObj[0].remove();
			$valueObj[0].remove();
		}

		// Update DOM
		$objectDiv.html(htmlData);

		formObj = document.getElementsByName(elName + '[hidden]_0');
		valueObj = document.getElementsByName(elName + '[hidden]');

		// Set the hidden value again
		if (formObj.length && valueObj.length) {
			valueObj[0].value = hiddenValue ? 1 : 0;
			formObj[0].checked = hiddenValue;
		}

		// now that the content is loaded, set the expandState
		this.expandCollapseRecord(objectId, expandSingle);
	},

	// Get script and link elements from head tag:
	getDomHeadChildren: function (head) {
		var headTags = [];
		TYPO3.jQuery('head script, head link').each(function () {
			headTags.push(this);
		});
		return headTags;
	},

	getDomHeadTag: function () {
		if (document && document.head) {
			return document.head;
		} else {
			var $head = TYPO3.jQuery('head');
			if ($head.length) {
				return $head.get(0);
			}
		}
		return false;
	},

	// Search whether elements exist in a given haystack:
	searchInDomTags: function (haystack, needle) {
		var result = false;
		TYPO3.jQuery.each(haystack, function (index, element) {
			if (element.nodeName.toUpperCase() == needle.name) {
				var attributesCount = Object.keys(needle.attributes).length;
				var attributesFound = 0;
				if (element.getAttribute) {
					for (var attribute in needle.attributes) {
						if (needle.attributes.hasOwnProperty(attribute) && element.getAttribute(attribute.key) === attribute.value) {
							attributesFound++;
						}
					}
				}
				if (attributesFound === attributesCount) {
					result = true;
					return true;
				}
			}
		});
		return result;
	},

	// Create a new DOM element:
	createNewDomElement: function (addTag) {
		var element = document.createElement(addTag.name);
		if (addTag.attributes) {
			TYPO3.jQuery.map(addTag.attributes, function (value, key) {
				element[key] = value;
			});
		}
		return element;
	},

	changeSorting: function (objectId, direction) {
		var objectName = this.prependFormFieldNames + this.parseObjectId('parts', objectId, 3, 2, true);
		var objectPrefix = this.parseObjectId('full', objectId, 0, 1);
		var formObj = document.getElementsByName(objectName);

		if (!formObj.length) {
			return false;
		}

		// the uid of the calling object (last part in objectId)
		var callingUid = this.parseObjectId('none', objectId, 1);
		var records = formObj[0].value.split(',');
		var current = records.indexOf(callingUid);
		var changed = false;

		// move up
		if (direction > 0 && current > 0) {
			records[current] = records[current - 1];
			records[current - 1] = callingUid;
			changed = true;

			// move down
		} else if (direction < 0 && current < records.length - 1) {
			records[current] = records[current + 1];
			records[current + 1] = callingUid;
			changed = true;
		}

		if (changed) {
			formObj[0].value = records.join(',');
			var cAdj = direction > 0 ? 1 : 0; // adjustment
			var objectIdPrefix = '#' + this.escapeObjectId(objectPrefix) + this.structureSeparator;
			TYPO3.jQuery(objectIdPrefix + records[current - cAdj] + '_div').insertBefore(
				TYPO3.jQuery(objectIdPrefix + records[current + 1 - cAdj] + '_div')
			);
			this.redrawSortingButtons(objectPrefix, records);
		}

		return false;
	},

	dragAndDropSorting: function (element) {
		var objectId = element.getAttribute('id').replace(/_records$/, '');
		var objectName = inline.prependFormFieldNames + inline.parseObjectId('parts', objectId, 3, 0, true);
		var formObj = document.getElementsByName(objectName);
		var $element = TYPO3.jQuery(element);

		if (!formObj.length) {
			return;
		}

		var checked = [];
		var order = [];
		$element.find('.sortableHandle').each(function (i, e) {
			order.push(TYPO3.jQuery(e).data('id').toString());
		});
		var records = formObj[0].value.split(',');

		// check if ordered uid is really part of the records
		// virtually deleted items might still be there but ordering shouldn't saved at all on them
		for (var i = 0; i < order.length; i++) {
			if (records.indexOf(order[i]) != -1) {
				checked.push(order[i]);
			}
		}

		formObj[0].value = checked.join(',');

		if (inline.data.config && inline.data.config[objectId]) {
			var table = inline.data.config[objectId].table;
			inline.redrawSortingButtons(objectId + inline.structureSeparator + table, checked);
		}
	},

	createDragAndDropSorting: function (objectId) {
		require(['jquery', 'jquery-ui/sortable'], function ($) {
			var $sortingContainer = $('#' + inline.escapeObjectId(objectId));

			if ($sortingContainer.hasClass('ui-sortable')) {
				$sortingContainer.sortable('enable');
				return;
			}

			$sortingContainer.sortable(
				{
					containment: 'parent',
					handle: '.sortableHandle',
					zIndex: '4000',
					axis: 'y',
					tolerance: 'pointer',
					stop: function () {
						inline.dragAndDropSorting($sortingContainer[0]);
					}
				}
			);
		});
	},

	destroyDragAndDropSorting: function (objectId) {
		require(['jquery', 'jquery-ui/sortable'], function ($) {
			var $sortingContainer = $('#' + inline.escapeObjectId(objectId));
			if (!$sortingContainer.hasClass('ui-sortable')) {
				return;
			}
			$sortingContainer.sortable('disable');
		});
	},

	redrawSortingButtons: function (objectPrefix, records) {
		var i, $headerObj, sortUp, sortDown;

		// if no records were passed, fetch them from form field
		if (typeof records == 'undefined') {
			records = [];
			var objectName = this.prependFormFieldNames + this.parseObjectId('parts', objectPrefix, 3, 1, true);
			var formObj = document.getElementsByName(objectName);
			if (formObj.length) {
				records = formObj[0].value.split(',');
			}
		}

		for (i = 0; i < records.length; i++) {
			if (!records[i].length) {
				continue;
			}

			$headerObj = TYPO3.jQuery('#' + this.escapeObjectId(objectPrefix) + this.structureSeparator + records[i] + '_header');
			sortUp = $headerObj.find('.sortingUp');
			sortDown = $headerObj.find('.sortingDown');

			if (sortUp) {
				sortUp.css('visibility', (i == 0 ? 'hidden' : 'visible'));
			}
			if (sortDown) {
				sortDown.css('visibility', (i == records.length - 1 ? 'hidden' : 'visible'));
			}
		}
	},

	memorizeAddRecord: function (objectPrefix, newUid, afterUid, selectedValue) {
		if (this.isBelowMax(objectPrefix)) {
			var objectName = this.prependFormFieldNames + this.parseObjectId('parts', objectPrefix, 3, 1, true);
			var formObj = document.getElementsByName(objectName);

			if (formObj.length) {
				var records = [];
				if (formObj[0].value.length) {
					records = formObj[0].value.split(',');
				}

				if (afterUid) {
					var newRecords = [];
					for (var i = 0; i < records.length; i++) {
						if (records[i].length) {
							newRecords.push(records[i]);
						}
						if (afterUid == records[i]) {
							newRecords.push(newUid);
						}
					}
					records = newRecords;
				} else {
					records.push(newUid);
				}
				formObj[0].value = records.join(',');
			}

			this.redrawSortingButtons(objectPrefix, records);

			if (this.data.unique && this.data.unique[objectPrefix]) {
				var unique = this.data.unique[objectPrefix];
				this.setUnique(objectPrefix, newUid, selectedValue);
			}
		}

		// if we reached the maximum off possible records after this action, hide the new buttons
		if (!this.isBelowMax(objectPrefix)) {
			var objectParent = this.parseObjectId('full', objectPrefix, 0, 1);
			var md5 = this.getObjectMD5(objectParent);
			this.hideElementsWithClassName('.inlineNewButton' + (md5 ? '.' + md5 : ''), objectParent);
			this.hideElementsWithClassName('.inlineForeignSelector' + (md5 ? '.' + md5 : ''), 't3-form-field-item');
		}

		if (TBE_EDITOR) {
			TBE_EDITOR.fieldChanged_fName(objectName, formObj);
		}
	},

	memorizeRemoveRecord: function (objectName, removeUid) {
		var formObj = document.getElementsByName(objectName);
		if (formObj.length) {
			var parts = [];
			if (formObj[0].value.length) {
				parts = formObj[0].value.split(',');
				parts = parts.without(removeUid);
				formObj[0].value = parts.join(',');
				if (TBE_EDITOR) {
					TBE_EDITOR.fieldChanged_fName(objectName, formObj);
				}
				return parts.length;
			}
		}
		return false;
	},

	updateUnique: function (srcElement, objectPrefix, formName, recordUid) {
		if (!this.data.unique || !this.data.unique[objectPrefix]) {
			return;
		}

		var unique = this.data.unique[objectPrefix];
		var oldValue = unique.used[recordUid];

		if (unique.selector == 'select') {
			var selector = $(objectPrefix + '_selector');
			this.removeSelectOption(selector, srcElement.value);
			if (typeof oldValue != 'undefined') {
				this.readdSelectOption(selector, oldValue, unique);
			}
		}

		if (unique.selector && unique.max == -1) {
			return;
		}

		var formObj = document.getElementsByName(formName);
		if (!unique || !formObj.length) {
			return;
		}

		var records = formObj[0].value.split(',');
		var recordObj;
		for (var i = 0; i < records.length; i++) {
			recordObj = document.getElementsByName(this.prependFormFieldNames + '[' + unique.table + '][' + records[i] + '][' + unique.field + ']');
			if (recordObj.length && recordObj[0] != srcElement) {
				var $recordObject = TYPO3.jQuery(recordObj[0]);
				this.removeSelectOption($recordObject, srcElement.value);
				if (typeof oldValue != 'undefined') {
					this.readdSelectOption($recordObject, oldValue, unique);
				}
			}
		}
		this.data.unique[objectPrefix].used[recordUid] = srcElement.value;
	},

	revertUnique: function (objectPrefix, elName, recordUid) {
		if (!this.data.unique || !this.data.unique[objectPrefix]) {
			return;
		}

		var unique = this.data.unique[objectPrefix];
		var fieldObj = elName ? document.getElementsByName(elName + '[' + unique.field + ']') : null;

		if (unique.type == 'select') {
			if (!fieldObj || !fieldObj.length) {
				return;
			}

			delete(this.data.unique[objectPrefix].used[recordUid]);

			if (unique.selector == 'select') {
				if (!isNaN(fieldObj[0].value)) {
					var $selector = TYPO3.jQuery('#' + this.escapeObjectId(objectPrefix) + '_selector');
					this.readdSelectOption($selector, fieldObj[0].value, unique);
				}
			}

			if (unique.selector && unique.max == -1) {
				return;
			}

			var formName = this.prependFormFieldNames + this.parseObjectId('parts', objectPrefix, 3, 1, true);
			var formObj = document.getElementsByName(formName);
			if (!formObj.length) {
				return;
			}

			var records = formObj[0].value.split(',');
			var recordObj;
			// walk through all inline records on that level and get the select field
			for (var i = 0; i < records.length; i++) {
				recordObj = document.getElementsByName(this.prependFormFieldNames + '[' + unique.table + '][' + records[i] + '][' + unique.field + ']');
				if (recordObj.length) {
					var $recordObject = TYPO3.jQuery(recordObj[0]);
					this.readdSelectOption($recordObject, fieldObj[0].value, unique);
				}
			}
		} else if (unique.type == 'groupdb') {
			// alert(objectPrefix+'/'+recordUid);
			delete(this.data.unique[objectPrefix].used[recordUid])
		}
	},

	enableDisableRecord: function (objectId) {
		var elName = this.parseObjectId('full', objectId, 2, 0, true) + '[hidden]';
		var formObj = document.getElementsByName(elName + '_0');
		var valueObj = document.getElementsByName(elName);
		var escapedObjectId = this.escapeObjectId(objectId);
		var $icon = TYPO3.jQuery('#' + escapedObjectId + '_disabled');

		var $container = TYPO3.jQuery('#' + escapedObjectId + '_div');

		// It might be the case that there's no hidden field
		if (formObj.length && valueObj.length) {
			formObj[0].click();
			valueObj[0].value = formObj[0].checked ? 1 : 0;
			TBE_EDITOR.fieldChanged_fName(elName, elName);
		}

		if ($icon.length) {
			if ($icon.hasClass('fa-toggle-on')) {
				$icon.removeClass('fa-toggle-on');
				$icon.addClass('fa-toggle-off');
				$container.addClass('t3-form-field-container-inline-hidden');
			} else {
				$icon.removeClass('fa-toggle-off');
				$icon.addClass('fa-toggle-on');
				$container.removeClass('t3-form-field-container-inline-hidden');
			}
		}

		return false;
	},

	deleteRecord: function (objectId, options) {
		var i, j, inlineRecords, records, childObjectId, childTable;
		var objectPrefix = this.parseObjectId('full', objectId, 0, 1);
		var elName = this.parseObjectId('full', objectId, 2, 0, true);
		var shortName = this.parseObjectId('parts', objectId, 2, 0, true);
		var recordUid = this.parseObjectId('none', objectId, 1);
		var beforeDeleteIsBelowMax = this.isBelowMax(objectPrefix);

		// revert the unique settings if available
		this.revertUnique(objectPrefix, elName, recordUid);

		// Remove from TBE_EDITOR (required fields, required range, etc.):
		if (TBE_EDITOR && TBE_EDITOR.removeElement) {
			var removeStack = [];
			// Iterate over all child records:
			inlineRecords = TYPO3.jQuery('.inlineRecord', '#' + objectId + '_div');
			// Remove nested child records from TBE_EDITOR required/range checks:
			for (i = inlineRecords.length - 1; i >= 0; i--) {
				if (inlineRecords.get(i).value.length) {
					records = inlineRecords.get(i).value.split(',');
					childObjectId = this.data.map[inlineRecords.get(i).name];
					childTable = this.data.config[childObjectId].table;
					for (j = records.length - 1; j >= 0; j--) {
						removeStack.push(this.prependFormFieldNames + '[' + childTable + '][' + records[j] + ']');
					}
				}
			}
			removeStack.push(this.prependFormFieldNames + shortName);
			TBE_EDITOR.removeElementArray(removeStack);
		}

		// Mark this container as deleted
		TYPO3.jQuery('#' + this.escapeObjectId(objectId) + '_div').addClass('inlineIsDeletedRecord');

		// If the record is new and was never saved before, just remove it from DOM:
		if (this.isNewRecord(objectId) || options && options.forceDirectRemoval) {
			this.fadeAndRemove(objectId + '_div');
			// If the record already exists in storage, mark it to be deleted on clicking the save button:
		} else {
			document.getElementsByName('cmd' + shortName + '[delete]')[0].disabled = false;
			TYPO3.jQuery('#' + objectId + '_div').fadeOut();
		}

		var recordCount = this.memorizeRemoveRecord(
			this.prependFormFieldNames + this.parseObjectId('parts', objectId, 3, 2, true),
			recordUid
		);

		if (recordCount <= 1) {
			this.destroyDragAndDropSorting(this.parseObjectId('full', objectId, 0, 2) + '_records');
		}
		this.redrawSortingButtons(objectPrefix);

		// if the NEW-button was hidden and now we can add again new children, show the button
		if (!beforeDeleteIsBelowMax && this.isBelowMax(objectPrefix)) {
			var objectParent = this.parseObjectId('full', objectPrefix, 0, 1);
			var md5 = this.getObjectMD5(objectParent);
			this.showElementsWithClassName('.inlineNewButton' + (md5 ? '.' + md5 : ''), objectParent);
			this.showElementsWithClassName('.inlineForeignSelector' + (md5 ? '.'+md5 : ''), 't3-form-field-item');
		}
		return false;
	},

	parsePath: function (path) {
		var backSlash = path.lastIndexOf('\\');
		var normalSlash = path.lastIndexOf('/');

		if (backSlash > 0) {
			path = path.substring(0, backSlash + 1);
		} else if (normalSlash > 0) {
			path = path.substring(0, normalSlash + 1);
		} else {
			path = '';
		}

		return path;
	},

	parseFormElementName: function (wrap, formElementName, rightCount, skipRight) {
		var idParts = this.splitFormElementName(formElementName);

		if (!wrap) {
			wrap = 'full';
		}
		if (!skipRight) {
			skipRight = 0;
		}

		var elParts = [];
		for (var i = 0; i < skipRight; i++) {
			idParts.pop();
		}

		if (rightCount > 0) {
			for (var i = 0; i < rightCount; i++) {
				elParts.unshift(idParts.pop());
			}
		} else {
			for (var i = 0; i < -rightCount; i++) {
				idParts.shift();
			}
			elParts = idParts;
		}

		return this.constructFormElementName(wrap, elParts);
	},

	splitFormElementName: function (formElementName) {
		// remove left and right side "data[...|...]" -> '...|...'
		formElementName = formElementName.substr(0, formElementName.lastIndexOf(']')).substr(formElementName.indexOf('[') + 1);
		return formElementName.split('][');
	},

	splitObjectId: function (objectId) {
		objectId = objectId.substr(objectId.indexOf(this.structureSeparator) + 1);
		objectId = objectId.split(this.flexFormSeparator).join(this.flexFormSubstitute);
		return objectId.split(this.structureSeparator);
	},

	constructFormElementName: function (wrap, parts) {
		var elReturn;

		if (wrap == 'full') {
			elReturn = this.prependFormFieldNames + '[' + parts.join('][') + ']';
			elReturn = elReturn.split(this.flexFormSubstitute).join('][');
		} else if (wrap == 'parts') {
			elReturn = '[' + parts.join('][') + ']';
			elReturn = elReturn.split(this.flexFormSubstitute).join('][');
		} else if (wrap == 'none') {
			elReturn = parts.length > 1 ? parts : parts.join('');
		}

		return elReturn;
	},

	constructObjectId: function (wrap, parts) {
		var elReturn;

		if (wrap == 'full') {
			elReturn = this.prependFormFieldNames + this.structureSeparator + parts.join(this.structureSeparator);
			elReturn = elReturn.split(this.flexFormSubstitute).join(this.flexFormSeparator);
		} else if (wrap == 'parts') {
			elReturn = this.structureSeparator + parts.join(this.structureSeparator);
			elReturn = elReturn.split(this.flexFormSubstitute).join(this.flexFormSeparator);
		} else if (wrap == 'none') {
			elReturn = parts.length > 1 ? parts : parts.join('');
		}

		return elReturn;
	},

	parseObjectId: function (wrap, objectId, rightCount, skipRight, returnAsFormElementName) {
		var idParts = this.splitObjectId(objectId);

		if (!wrap) {
			wrap = 'full';
		}
		if (!skipRight) {
			skipRight = 0;
		}

		var elParts = [];
		for (var i = 0; i < skipRight; i++) {
			idParts.pop();
		}

		if (rightCount > 0) {
			for (var i = 0; i < rightCount; i++) {
				elParts.unshift(idParts.pop());
			}
		} else {
			for (var i = 0; i < -rightCount; i++) {
				idParts.shift();
			}
			elParts = idParts;
		}

		var elReturn;
		if (returnAsFormElementName) {
			elReturn = this.constructFormElementName(wrap, elParts);
		} else {
			elReturn = this.constructObjectId(wrap, elParts);
		}

		return elReturn;
	},

	handleChangedField: function (formField, objectId) {
		var formObj;
		if (typeof formField == 'object') {
			formObj = formField;
		} else {
			formObj = document.getElementsByName(formField);
			if (formObj.length) {
				formObj = formObj[0];
			}
		}

		if (formObj != undefined) {
			var value;
			if (formObj.nodeName == 'SELECT') {
				value = formObj.options[formObj.selectedIndex].text;
			} else {
				value = formObj.value;
			}
			TYPO3.jQuery('#' + this.escapeObjectId(objectId) + '_label').html(value.length ? value : this.noTitleString);
		}
		return true;
	},

	arrayAssocCount: function (object) {
		var count = 0;
		if (typeof object.length != 'undefined') {
			count = object.length;
		} else {
			for (var i in object) {
				count++;
			}
		}
		return count;
	},

	isBelowMax: function (objectPrefix) {
		var isBelowMax = true;
		var objectName = this.prependFormFieldNames + this.parseObjectId('parts', objectPrefix, 3, 1, true);
		var formObj = document.getElementsByName(objectName);

		if (this.data.config && this.data.config[objectPrefix] && formObj.length) {
			var recordCount = formObj[0].value ? formObj[0].value.split(',').length : 0;
			if (recordCount >= this.data.config[objectPrefix].max) {
				isBelowMax = false;
			}
		}
		if (isBelowMax && this.data.unique && this.data.unique[objectPrefix]) {
			var unique = this.data.unique[objectPrefix];
			if (this.arrayAssocCount(unique.used) >= unique.max && unique.max >= 0) {
				isBelowMax = false;
			}
		}
		return isBelowMax;
	},

	getOptionsHash: function ($selectObj) {
		var optionsHash = {};
		$selectObj.find('option').each(function(i, option) {
			optionsHash[option.value] = i;
		});
		return optionsHash;
	},

	removeSelectOption: function ($selectObj, value) {
		var optionsHash = this.getOptionsHash($selectObj);
		if (optionsHash[value] != undefined) {
			$selectObj.find('option').eq(optionsHash[value]).remove();
		}
	},

	readdSelectOption: function ($selectObj, value, unique) {
		var index = null;
		var optionsHash = this.getOptionsHash($selectObj);
		var possibleValues = this.getKeysFromHashMap(unique.possible);

		for (var possibleValue in unique.possible) {
			if (possibleValue == value) {
				break;
			}
			if (optionsHash[possibleValue] != undefined) {
				index = optionsHash[possibleValue];
			}
		}

		if (index == null) {
			index = 0;
		} else if (index < $selectObj.find('option').length) {
			index++;
		}
		// recreate the <option> tag
		var readdOption = document.createElement('option');
		readdOption.text = unique.possible[value];
		readdOption.value = value;
		// add the <option> at the right position
		// I didn't find a possibility to add an option to a predefined position
		// with help of an index in jQuery. So we realized it the "old" style
		var selectObj = $selectObj.get(0);
		selectObj.add(readdOption, document.all ? index : selectObj.options[index]);
	},

	hideElementsWithClassName: function (selector, parentElement) {
		TYPO3.jQuery('#' + parentElement).find(selector).fadeOut();
	},

	showElementsWithClassName: function (selector, parentElement) {
		TYPO3.jQuery('#' + parentElement).find(selector).fadeIn();
	},

	fadeOutFadeIn: function (objectId) {
		objectId = this.escapeObjectId(objectId);
		TYPO3.jQuery('#' + objectId).fadeTo(500, 0.5, 'linear', function() {
			TYPO3.jQuery('#' + objectId).fadeTo(500, 1, 'linear');
		});
	},

	isNewRecord: function (objectId) {
		var $selector = TYPO3.jQuery('#' + this.escapeObjectId(objectId) + '_div');
		return $selector.length && $selector.hasClass('inlineIsNewRecord')
			? true
			: false;
	},

	// Find and fix nested of inline and tab levels if a new element was created dynamically (it doesn't know about its nesting):
	findContinuedNestedLevel: function (nested, objectId) {
		if (this.data.nested && this.data.nested[objectId]) {
			// Remove the first element from the new nested stack, it's just a hint:
			nested.shift();
			nested = this.data.nested[objectId].concat(nested);
			return nested;
		} else {
			return nested;
		}
	},

	getNumberOfRTE: function () {
		var number = 0;
		if (typeof RTEarea != 'undefined' && RTEarea.length > 0) {
			number = RTEarea.length - 1;
		}
		return number;
	},

	getObjectMD5: function (objectPrefix) {
		var md5 = false;
		if (this.data.config && this.data.config[objectPrefix] && this.data.config[objectPrefix].md5) {
			md5 = this.data.config[objectPrefix].md5;
		}
		return md5
	},

	fadeAndRemove: function (element) {
		TYPO3.jQuery('#' + this.escapeObjectId(element)).fadeOut(500, function() {
			TYPO3.jQuery(this).remove();
		});
	},

	getContext: function (objectId) {
		var result = null;

		if (objectId !== '' && typeof this.data.config[objectId] !== 'undefined' && typeof this.data.config[objectId].context !== 'undefined') {
			result = this.data.config[objectId].context;
		}

		return result;
	},

	/**
	 * Escapes object identifiers to be used in jQuery.
	 *
	 * @param string objectId
	 * @return string
	 */
	escapeObjectId: function (objectId) {
		var escapedObjectId;
		escapedObjectId = objectId.replace(/:/g, '\\:');
		escapedObjectId = escapedObjectId.replace(/\./g, '\\.');
		return escapedObjectId;
	},

	/**
	 * Escapes object identifiers to be used as jQuery selector.
	 *
	 * @param string objectId
	 * @return string
	 */
	escapeSelectorObjectId: function (objectId) {
		var escapedSelectorObjectId;
		var escapedObjectId = this.escapeObjectId(objectId);
		escapedSelectorObjectId = escapedObjectId.replace(/\\:/g, '\\\\\\:');
		escapedSelectorObjectId = escapedSelectorObjectId.replace(/\\\./g, '\\\\\\.');
		return escapedSelectorObjectId;
	}
};

Object.extend(Array.prototype, {
	diff: function (current) {
		var diff = [];
		if (this.length == current.length) {
			for (var i = 0; i < this.length; i++) {
				if (this[i] !== current[i]) {
					diff.push(i);
				}
			}
		}
		return diff;
	}
});

/*]]>*/
(function ($) {
	$(function () {
		$(document).delegate('[data-toggle="formengine-inline"]', 'click', inline.toggleEvent);
	});
})(TYPO3.jQuery);

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