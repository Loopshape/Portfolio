/*
 * REQUIRE.JS configuration file
 * by Arjuna Noorsanto • E-Mail: awebgo.net@gmail.com
 */
requirejs.config({
	
	baseUrl : 'http://loop.arcturus.uberspace.de/',

	pragmasOnSave : {
		excludeRequireCss : true
	},

	map : {
		'*' : {
			'css' : './hostweb/assets/js/app/bower_components/require-css/css'
		}
	},

	paths : {

		angular : './hostweb/assets/js/app/bower_components/angular/angular.min',

		backbone : './hostweb/assets/js/app/bower_components/backbone/backbone',
		underscore : './hostweb/assets/js/app/bower_components/underscore/underscore-min',

		jquery : './hostweb/assets/js/app/bower_components/jquery2/jquery.min',
		jqmigrate : './hostweb/assets/js/app/bower_components/jquery2/jquery-migrate.min.js',
		
		//timeline : './hostweb/assets/js/app/bower_components/greensock/src/minified/TimelineMax.min',
		tweenmax : './hostweb/assets/js/app/bower_components/greensock/src/minified/TweenMax.min',
		
		responsivemeasure : './hostweb/assets/js/app/bower_components/Responsive-Measure/jquery.rm',
		
		tooltipsy : './hostweb/assets/js/app/bower_components/tooltipsy-master/tooltipsy.min',
		angularscroll : './hostweb/assets/js/app/bower_components/angular-scroll/angular-scroll.min',
		multicolselect : './hostweb/assets/js/app/bower_components/Multi-Column-Select/Multi-Column-Select/Multi-Column-Select.min',
		cssmulticol : './hostweb/assets/js/app/bower_components/css3_multicol/css3-multi-column',
		
		jquerysnippet : './hostweb/assets/js/app/bower_components/jquery.snippet.2.0.0/jquery.snippet.min',
		jssnippet : './hostweb/assets/js/app/bower_components/jquery.snippet.2.0.0/language/sh_javascript.min',

		main : './hostweb/assets/js/app/main'

	},

	shim : {

		angular : {
			exports : 'angular'
		},

		jquery : {
			deps : ['angular'],
			exports : '$'
		},
		
		jqmigrate : {
			deps : ['angular', 'jquery']
		},

		backbone : {
			deps : ['angular', 'jquery'],
			exports : 'Backbone'
		},

		underscore : {
			deps : ['angular', 'jquery'],
			exports : '_'
		},

        /*
		timeline : {
			deps : ['angular', 'jquery'],
			exports : 'TimelineMax'
		},
        */
        
		tweenmax : {
			deps : ['angular', 'jquery'],
			exports : 'TweenMax'
		},

		tooltipsy : {
			deps : ['angular', 'jquery'],
			exports : 'tooltipsy'
		},

		angularscroll : {
			deps : ['angular', 'jquery'],
			exports : 'AngularScroll'
		},
		
		responsivemeasure : {
			deps : ['angular', 'jquery'],
			exports : 'responsiveMeasure'
		},
		
		multicolselect : {
			deps : ['angular', 'jquery'],
			exports : 'MultiColumnSelect'
		},
		
		cssmulticol : {
			deps : ['angular', 'jquery'],
			exports : 'CssMultiColumns'
		},
		
		jquerysnippet : {
			deps : ['angular', 'jquery'],
			exports : 'snippet'
		}, 
		
		jssnippet : {
			deps : ['jquerysnippet']
		},

		main : {
			exports : 'Main'
		}

	},
	
	waitSeconds: 240

});
require(['main']);
