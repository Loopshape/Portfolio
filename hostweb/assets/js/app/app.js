/*
* BackboneJS+Underscore Script programmed by: Arjuna Noorsanto
* in Q2/2015 Loopshape Web Development
*
* http://loop.arcturus.uberspace.de
*
*/
// module dependencies
require([], function() {
	'use strict';
	
	// load Facebook SDK
	var FB = require(['fb']);

	// Backbone definitions for App
	var App = Backbone.View.extend({

		ajax : function() {
			alert('AJAX function was called...');
			return;
		},

		render : function() {

			var item = this.page;
			this.setElement(item);
			
			// here comes the APP logic
			console.log('Start rendering:');
			
			// start Facebook SDK
			this.facebook();

			return;
		},

		events : {
			'click a[rel=ajax]' : 'ajax'
		},

		initialize : function() {
			this.windowWidth = $(window).width();
			_.bindAll(this, 'ajax');
			this.render();
		},
		
	    // setup Facebook SDK
		facebook : function() {
            define(['facebook'], function(){
              FB.init({
                appId      : '849734395080698',
                version    : 'v2.3'
              });
              FB.getLoginStatus(function(response) {
                console.log(response);
              });
            });
            return;
		}
		
	});

	var app = new App();

});
