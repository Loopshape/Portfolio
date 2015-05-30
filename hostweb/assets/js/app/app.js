/*
* BackboneJS+Underscore Script programmed by: Arjuna Noorsanto
* in Q2/2015 Loopshape Web Development
*
* http://loop.arcturus.uberspace.de
*
*/
// module dependencies
require(['jquery','underscore','backbone','hoverintent'], function($,_,Backbone,hoverIntent) {
	'use strict';

	// Backbone definitions for App
	var App = Backbone.View.extend({

		ajax : function() {
			alert('AJAX function was called...');
			return;
		},
		
		workstuff : function() {
		    
		    var TweenMax = require(['tweenmax']);
		    
		    $('p').hoverIntent(
		        function() {
		            TweenLite.to($(this), 2, {
        		        scale : '+=1.2'
        		    });
		        },
		        function() {
		            TweenLite.to($(this), 2, {
        		        scale : '+=0.8'
        		    });
		        }
		    );
		    
		    return;
		},

		render : function() {

			var item = this.page;
			var itemSpeed = 500;
			
			this.setElement(item);
			
			// here comes the APP logic
			console.log('Start rendering:');
			
			this.workstuff();

			return;
		},

		events : {
			'click a[rel=ajax]' : 'ajax'
		},

		initialize : function() {
			this.windowWidth = $(window).width();
			_.bindAll(this, 'ajax');
			this.render();
		}
		
	});

	var app = new App();

});
