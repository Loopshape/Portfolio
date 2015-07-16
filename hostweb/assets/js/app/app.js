/*
* BackboneJS+Underscore Script programmed by: Arjuna Noorsanto
* in Q2/2015 Loopshape Web Development
*
* http://loop.arcturus.uberspace.de
*
*/
// module dependencies
require(['jquery', 'underscore', 'backbone'], function($, _, Backbone) {
    'use strict';

    // Backbone definitions for App
    var App = Backbone.View.extend({

        ajax : function() {
            alert('AJAX function was called...');
            return;
        },

        render : function() {

            var item = this.page;
            var itemSpeed = 500;

            this.setElement(item);

            // here comes the APP logic
            console.log('Start rendering:');

            // GSAP MOVES

            var $page = $('#page');

            function moveBox(e) {

                var x = e.pageX,
                    y = e.pageY;

                TweenLite.to($page, 3, {
                    opacity : '-=0.01'
                });

                return true;
            }


            $(document).on('click', moveBox);

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

    //https://prerender.io token definition
    //app.use(require('prerender-node').set('prerenderToken',
    // '0dZL98XiFVk9TUP09PvU'));

});