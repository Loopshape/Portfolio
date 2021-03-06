/*
* JQUERY2 Javascript: Loopshape mainfile programmed by: Arjuna Noorsanto
* in Q2/2015 Loopshape Web Development
*
* http://loop.arcturus.uberspace.de
*
* Implemented Plugins: Require.JS
*/

// status message main script is running
console.log('Starting MAINSCRIPT');

// on this area, all Plugins must be listed as a sequence and be called so
requirejs(['angular', 'jquery', 'underscore', 'backbone', 'tooltipsy', 'angularscroll', 'responsivemeasure', 'jquerysnippet', 'jssnippet', 'jscookie', 'hoverintent', 'fancybox'], function(angular, $, _, Backbone, tooltipsy, AngularScroll, responsiveMeasure, snippet, jssnippet, Cookies, hoverIntent, fancybox) {
    'use strict';

    // Angular.JS Setup
    var app = angular.module('loopcode', []);
    app.controller('bridge', function($scope) {
        $scope.baseUrl = baseUrl;
        $scope.userName = "Arjuna Noorsanto";
        $scope.userEmail = "awebgo.net@gmail.com";
        $scope.userPasswd = "1337secure";
    });

    // MainJS config vars
    var pageSpeed = 500;

    $('header#header').hoverIntent(function(e) {
        var pageY = e.pageY;
        if (pageY < 60 && $(this).hasClass('hover') && $(this).offset().top >= -380)
            return;
        if (!$(this).hasClass('hover') && $(this).offset().top < -1)
            $(this).addClass('hover').animate({
                'top' : '+=380'
            }, pageSpeed * 2, function() {
                $(this).removeClass('busy');
            });
    }, function(e) {
        var pageY = e.pageY;
        if (pageY < 60 && $(this).hasClass('hover'))
            return;
        if ($(this).hasClass('hover') && $(this).offset().top > -380)
            $(this).animate({
                'top' : '-=380'
            }, pageSpeed * 2).removeClass('hover');
    });

    // Typography settings
    function responsiveMeasures() {
        $('#contentWrapper').responsiveMeasure({
            // Responsive Measures
            idealLineLength : 80,
            minimumFontSize : 12,
            maximumFontSize : 16,
            ratio : 0.75
        });
        return;
    }

    // Mixpanel Script embed
    /*
    (function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
    for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
    mixpanel.init("0730131673ecbc8c8c43080e05d23095");
    */
    // Mixpanel send vars
    //mixpanel.track("Loopshape > Pagevisit");

    // Layout customizations
    var $wrapper = $('#contentWrapper');
    var $wrapperHeight = $wrapper.innerHeight();
    var $content = $('section#content');
    var $contentHeight = $content.innerHeight();
    var $sidebar = $('aside#sidebar');
    var $sidebarHeight = $sidebar.innerHeight();

    var $header = $('header#header');
    var $headerHeight = $header.innerHeight();
    var $disqus = $('#disqusArea');
    var $disqusHeight = $disqus.innerHeight();

    var $contextHeight = 0;

    function checkHeights() {

        $disqusHeight = $disqus.innerHeight();

        if ($('section#content').length) {
            $contextHeight = 0;
            $content.children().each(function() {
                $contextHeight += $(this).innerHeight();
            });
            $contentHeight = $contextHeight - $headerHeight - $disqusHeight;
        }

        if ($('aside#sidebar').length) {
            $contextHeight = 0;
            $sidebar.children().each(function() {
                $contextHeight += $(this).innerHeight();
            });
            $sidebarHeight = $contextHeight - $headerHeight - $disqusHeight;
        }

        return;
    }

    function resizeHeights() {

        checkHeights();

        if ($contentHeight < $sidebarHeight)
            $wrapper.css({
                'min-height' : $sidebarHeight
            });
        $content.css({
            'min-height' : $sidebarHeight
        });
        if ($sidebarHeight < $contentHeight)
            $wrapper.css({
                'min-height' : $contentHeight
            });
        $sidebar.css({
            'min-height' : $contentHeight
        });

        return;
    }

    // Server connectivity test
    function ajaxCheck() {
        $.ajax({
            url : baseUrl,
            type : "HEAD",
            timeout : 2500,
            statusCode : {
                200 : function(response) {
                    console.log('Connection: 200 Ok!');
                },
                400 : function(response) {
                    console.log('Connection: 400 not working!');
                    throw "No Connection available";
                },
                0 : function(response) {
                    console.log('Connection: 0 no server available');
                    throw "No Server available";
                }
            }
        });
    }

    // additional Standard-Setup
    try {

        setInterval(function() {
            ajaxCheck();
        }, 60000);

        $('.areaFull,#ajaxLoader').css({
            'position' : 'fixed',
            'z-index' : '100000'
        }).fadeIn(pageSpeed / 4);

        $('a.internal,a.external').on('click', function(e) {
            e.preventDefault();
            var isExternal = $(this).hasClass('external');
            if (!isExternal)
                $('#main').animate({
                    'opacity' : '-=1'
                }, pageSpeed);
            var $href = $(this).prop('href');
            setTimeout(function() {
                if (!isExternal) {
                    window.open($href, '_self');
                } else {
                    window.open($href, '_blank');
                }
            }, 100);
        });

        // prepare Vars for DOC-Ready
        var itemSpeed = 500;

        // Document Ready
        $(function() {

            // HTML-DOM AREA

            $(window).scrollTop(0);

            // LINK IMAGES
            $('*.linkImages a').fancybox();

            // some Typography settings
            $(document).on('responsiveMeasureUpdated', function(e, data) {
                $('.giga').css('fontSize', data.fontRatios[24] + 'px');
                $('h1').css('fontSize', data.fontRatios[20] + 'px');
                $('h2').css('fontSize', data.fontRatios[18] + 'px');
                $('h3').css('fontSize', data.fontRatios[16] + 'px');
                $('h4').css('fontSize', data.fontRatios[14] + 'px');
                $('h5').css('fontSize', data.fontRatios[12] + 'px');
                $('h6').css('fontSize', data.fontRatios[11] + 'px');
                $('p').css('fontSize', data.fontRatios[10] + 'px');
                $('.sm').css('fontSize', data.fontRatios[8] + 'px');
            });

            $('#main').animate({
                'opacity' : '+=1'
            }, pageSpeed, function() {
                $('#ajaxLoader').fadeOut(pageSpeed / 4, function() {
                    // load another script into the scope
                    require(['./hostweb/assets/js/app/app']);
                });
            });

            $('.hastip').tooltipsy({
                offset : [8, -20],
                css : {
                    'position' : 'fixed',
                    'top' : '50px',
                    'right' : '33px',
                    'font-size' : '0.76em',
                    'font-weight' : 'bold',
                    'letter-spacing' : '0.05em',
                    'padding' : '8px 7px',
                    'max-width' : '320px',
                    'margin-top' : '-30px',
                    'color' : 'rgba(255,255,255,0.8)',
                    'background-color' : 'rgba(39,118,33,1)',
                    'border' : '5px solid rgba(9,99,13,1)',
                    'text-shadow' : '0 0 3px #000',
                    '-webkit-border-radius' : '8px',
                    'border-radius' : '8px'
                }
            });

            //$("body").snippet("javascript");

            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });

            $('.scrollToTop').click(function() {
                $('html, body').animate({
                    scrollTop : 0
                }, 800);
                return false;
            });

            $('.areaFull').fadeOut(pageSpeed / 2).css({
                'z-index' : '-1'
            });

            $(window).resize(function() {
                responsiveMeasures();
                resizeHeights();
            });

            $('#contentWrapper').ready(function() {
                responsiveMeasures();
                setTimeout(function() {
                    resizeHeights();
                }, pageSpeed / 2);
            });

            $('.featured-images img').each(function() {
                var $imgSrc = $(this).attr('src');
                var $imgTitle = $(this).attr('alt');
                //var $imgData = $(this).clone();
                $(this).parent().prepend('<a href="' + $imgSrc + '" alt="" title="' + $imgTitle + '" class="clickImage fancy-image img hastip"></a>');
                $('.featured-images a').fancybox();
            });

            // MANAGE LOOPSHAPECOOKIE

            if (!Cookies.set('loopshape_client')) {
                var $htmldata = '<html><body><style rel="stylesheet">body{position:relative;color:#333;background-color:#d3d3d3;font-family:sans-serif;} .wrapper{background-color:#bbb;font-weight:bold;padding:15px;text-align:center;} .wrapper>*{color:#444;} a{color:#444;} a:hover{color:#000;}</style><div id="cookieBanner"><p><strong>Sie befinden sich nun auf der Domain: loop.arcturus.uberspace.de</strong><br /></p><div class="wrapper"><h3>Cookie Datenschutz / Cookie agreement</h3><p>Auf dieser Website werden Cookies zur Optimierung des Benutzerinterfaces gesetzt. Durch die Verwendung dieser Website stimmen Sie den Nutzungsbedingungen von Loopshape zu.<br /><br /></p><a id="cookieYes" href="#" title="">Einverstanden!</a></div></div></body></html>';
                $('body').html($htmldata);
                var $url = window.location.href;
                $('#cookieYes').on('click', function(e) {
                    e.preventDefault();
                    Cookies.set('loopshape_client', true, {
                        path : '/',
                        expires : 7
                    });
                    setTimeout(function() {
                        window.open($url, '_top');
                    }, 250);
                    return false;
                });
            }

        });

    } catch(err) {

        // catch error and restart with a page reload
        console.log(err + '\n');
        console.log('...restarting HTTP-Request!');
        setTimeout(function() {
            window.open('.', '_self');
        }, 100);

    }

});