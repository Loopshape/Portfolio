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
requirejs(['angular', 'jquery', 'backbone', 'underscore', 'tooltipsy', 'angularscroll', 'responsivemeasure', 'jquerysnippet', 'jssnippet'], function(angular, $, Backbone, _, tooltipsy, AngularScroll, responsiveMeasure, snippet, jssnippet) {
	'use strict';
	
	// Angular.JS Setup
	var app = angular.module('loopcode', []);
	app.controller('bridge', function($scope) {
	    
	    $scope.baseUrl = baseUrl;
	    
	    $scope.userEmail = "user@domain.tld";
	    $scope.userPasswd = "1337secure";
	    
	});
	
	function responsiveMeasures() {
		$('#contentWrapper').responsiveMeasure({
		    // Responsive Measures
		    idealLineLength: 80,
		    minimumFontSize: 12,
		    maximumFontSize: 16,
		    ratio: 0.75
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
		
		if($('section#content').length) {
			$contextHeight = 0;
			$content.children().each(function() {
				$contextHeight += $(this).innerHeight();
			});
			$contentHeight = $contextHeight - $headerHeight - $disqusHeight;
		}
		
		if($('aside#sidebar').length) {
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
		
		if($contentHeight < $sidebarHeight)
			$wrapper.css({
				'min-height' : $sidebarHeight
			});
			$content.css({
				'min-height' : $sidebarHeight 
			});
		if($sidebarHeight < $contentHeight)
			$wrapper.css({
				'min-height' : $contentHeight
			});	
			$sidebar.css({
				'min-height' : $contentHeight
			});
		
		return;
	}
	
	function ajaxCheck() {
		$.ajax({url: baseUrl,
			type: "HEAD",
			timeout: 2500,
			statusCode: {
			    200: function (response) {
			        console.log('Connection: 200 Ok!');
			    },
			    400: function (response) {
			        console.log('Connection: 400 not working!');
			        throw "No Connection available";
			    },
			    0: function (response) {
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
			'position':'fixed',
			'z-index':'100000'
		}).fadeIn(500);

		$('a.internal,a.external').on('click', function(e) {
			e.preventDefault();
			$('#main').animate({
				'opacity' : '-=1'
			}, 2000);
			var $href = $(this).prop('href');
			setTimeout(function() {
				window.open($href, '_self');
			}, 100);
		});
		
		// GREENSOCK AREA
		
		

		// Document Ready
		$(function() {
			
			$(window).scrollTop(0);
			
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
			}, 2000, function() {
				$('#ajaxLoader').fadeOut(500, function() {
					// load another script into the scope
					require(['./hostweb/assets/js/app/app']);
				});
			});

			$('.hastip').tooltipsy({
				offset : [8, -20],
				css : {
					'position' : 'fixed',
					'top':'50px',
					'right':'33px',
					'font-size' : '0.76em',
					'font-weight' : 'bold',
					'letter-spacing' : '0.05em',
					'padding' : '8px 7px',
					'max-width' : '320px',
					'margin-top' : '-30px',
					'color' : 'rgba(255,255,255,0.8)',
					'background-color' : 'rgba(39,118,33,1)',
					'border' : '5px solid rgba(9,99,13,1)',
					'-moz-box-shadow' : '0 0 30px rgba(0,12,32,1)',
					'-webkit-box-shadow' : '0 0 30px rgba(0,12,32,1)',
					'box-shadow' : '0 0 30px rgba(0,12,32,1)',
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
			
			$('.areaFull')
				.fadeOut(1000)
				.css({
					'z-index':'-1'
				});
				
			$(window).resize(function() {
				responsiveMeasures();
				resizeHeights();
			});
			
			$('#contentWrapper').ready(function() {
				responsiveMeasures();
				setTimeout(function() {
					resizeHeights();
				}, 1000);
			});

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