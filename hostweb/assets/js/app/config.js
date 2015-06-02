/*
 * REQUIRE.JS configuration file
 * by Arjuna Noorsanto • E-Mail: awebgo.net@gmail.com
 */
requirejs.config(
{

    baseUrl : '.',

    pragmasOnSave :
    {
        excludeRequireCss : true
    },

    map :
    {
        '*' :
        {
            'css' : './hostweb/assets/js/app/bower_components/require-css/css'
        }
    },

    paths :
    {

        angular : './hostweb/assets/js/app/bower_components/angular/angular',

        backbone : './hostweb/assets/js/app/bower_components/backbone/backbone',
        underscore : './hostweb/assets/js/app/bower_components/underscore/underscore-min',

        jquery : './hostweb/assets/js/app/bower_components/jquery2/jquery.min',
        jqmigrate : './hostweb/assets/js/app/bower_components/jquery2/jquery-migrate.min.js',

        responsivemeasure : './hostweb/assets/js/app/bower_components/Responsive-Measure/jquery.rm',
        tooltipsy : './hostweb/assets/js/app/bower_components/tooltipsy-master/tooltipsy.min',
        angularscroll : './hostweb/assets/js/app/bower_components/angular-scroll/angular-scroll.min',
        multicolselect : './hostweb/assets/js/app/bower_components/Multi-Column-Select/Multi-Column-Select/Multi-Column-Select.min',
        cssmulticol : './hostweb/assets/js/app/bower_components/css3_multicol/css3-multi-column',
        jquerysnippet : './hostweb/assets/js/app/bower_components/jquery.snippet.2.0.0/jquery.snippet.min',
        jssnippet : './hostweb/assets/js/app/bower_components/jquery.snippet.2.0.0/language/sh_javascript.min',
        jscookie : './hostweb/assets/js/app/bower_components/js-cookie/src/js.cookie',
        hoverintent : './hostweb/assets/js/app/bower_components/jquery-hoverIntent/jquery.hoverIntent',
        fancybox : './hostweb/assets/js/app/bower_components/fancybox/source/jquery.fancybox.pack',
        planetarium : './hostweb/assets/js/app/bower_components/planetarium/jquery.planetarium.min',

        main : './hostweb/assets/js/app/main'

    },

    shim :
    {

        angular :
        {
            exports : 'angular'
        },

        jquery :
        {
            deps : ['angular'],
            exports : '$'
        },

        backbone :
        {
            exports : 'Backbone'
        },

        underscore :
        {
            exports : '_'
        },

        tooltipsy :
        {
            deps : ['jquery'],
            exports : 'tooltipsy'
        },

        angularscroll :
        {
            deps : ['angular', 'jquery'],
            exports : 'AngularScroll'
        },

        responsivemeasure :
        {
            deps : ['jquery'],
            exports : 'responsiveMeasure'
        },

        multicolselect :
        {
            exports : 'MultiColumnSelect'
        },

        cssmulticol :
        {
            exports : 'CssMultiColumns'
        },

        jquerysnippet :
        {
            deps : ['jquery'],
            exports : 'snippet'
        },

        jssnippet :
        {
            deps : ['jquery', 'jquerysnippet']
        },

        jscookie :
        {
            deps : ['jquery'],
            exports : 'Cookie'
        },

        hoverintent :
        {
            deps : ['jquery'],
            exports : 'hoverIntent'
        },

        fancybox :
        {
            deps : ['jquery'],
            exports : 'fancybox'
        },
        
        planetarium : {
            deps : ['jquery'],
            exports : 'planetarium'
        },

        main :
        {
            exports : 'Main'
        }

    },

    waitSeconds : 240

});
require(['main']);