<h3><strong>Require.JS Scripte einbinden</strong></h3>
<p>
	<strong> 01.) Die Datei "r.js" in das HTML-Template einbinden.
	<br />
	<br />
	02.) In einer Konfigurationsdatei die Pfade und Ladeabhängigkeiten definieren. Diese Datei dann per 
	</p>
	<code><pre>require(['./RELATIVER_PFAD/CONFIGURATION.FILE']);</pre></code>
	<p>in den Scope laden.
	<br />
	<br />
</p>
<p>&nbsp;</p>
<p><strong>
	Die Pfade sind das ausschlaggebende Merkmal aller Plugins! Diese müssen explizit an die jeweilige Website-Struktur angepasst werden.
</strong></p>
<p>&nbsp;</p>
<p><strong>Dieses Beispiel der "config.js" zeigt die Pfade dieser Website:</strong></p>
<code>
	<pre>
<span class="fontHighlight">// Require.JS Konfiguration setzen</span>
requirejs.config({
	
	<span class="fontHighlight">// Basispfad für JS angeben</span>
	baseUrl : '<span class="fontHighlight">PFAD_ZU_DER_JS_BIBLIOTHEK</span>',

	<span class="fontHighlight">// Plugin-Pfade relativ zu dem Basispfad der Bibliothek eintragen!</span>
	paths : {
		
		backbone : './hostweb/assets/js/app/bower_components/backbone/backbone',
		underscore : './hostweb/assets/js/app/bower_components/underscore/underscore-min',

		jquery : './hostweb/assets/js/app/bower_components/jquery2/jquery.min',
		tooltipsy : './hostweb/assets/js/app/bower_components/tooltipsy-master/tooltipsy.min',
		
		timeline : './hostweb/assets/js/app/bower_components/greensock/src/minified/TimelineMax.min',
		tweenmax : './hostweb/assets/js/app/bower_components/greensock/src/minified/TweenMax.min',
		
		main : './hostweb/assets/js/app/main' <span class="fontHighlight"><---- Haupt-JS-Datei bereits in der Config angegeben!</span>

	},

	<span class="fontHighlight">// Hier werden die Pluginabhängigkeiten und die Lade-Order definiert!</span>
	shim : {

		jquery : {
			exports : '$' <span class="fontHighlight"><---- Setze das $-Zeichen als jQuery Umgebungsvariable</span> 
		},
		
		backbone : {
			deps : ['jquery'], <span class="fontHighlight"><---- Warte bis das Plugin in den Klammern geladen wurde</span>
			exports : 'Backbone'
		},
		
		underscore : {
			deps : ['jquery'], <span class="fontHighlight"><---- Warte bis das Plugin in den Klammern geladen wurde</span>
			exports : '_'
		},

		tooltipsy : {
			deps : ['jquery'], <span class="fontHighlight"><---- Warte bis das Plugin in den Klammern geladen wurde</span>
			exports : 'Tooltipsy'
		},
		
		timeline : {
			exports : 'TimelineMax' <span class="fontHighlight"><---- Lade Plugin in den Scope</span>
		},
		
		tweenmax : {
			exports : 'TweenMax' <span class="fontHighlight"><---- Lade Plugin in den Scope</span>
		},

		main : {
			exports : 'Main' <span class="fontHighlight"><---- Lade das Hauptscript in den Scope mit der Umgebungsvariable 'Main'</span>
		}

	}

});

<span class="fontHighlight">// Die Haupt-JS-Datei in den Scope laden und ausführen...</span>
require(['main']); 
		</pre>
</code>
<div class="cf"></div>
<p>
	&nbsp;
</p>
<p>
	03.) Anschließend wird die Haupt-Javascript-Datei aufgerufen, in dem alle möglichen Plugins nach belieben verwendet werden:
	<br />
	<br />
</p>
<code>
	<pre>
<span class="fontHighlight">// status message main script is running</span>
console.log('Starting MAINSCRIPT');

<span class="fontHighlight">// on this area, all Plugins must be listed as a sequence and be called so</span>
requirejs(['jquery', 'backbone', 'underscore', 'tooltipsy'], function($, Backbone, _, Tooltipsy) {

	$(function() {
		
		<span class="fontHighlight">// status message for jQuery2 ready</span>
		console.log('jQuery2 initialized');

		<span class="fontHighlight">// load another script into the scope</span>
		require(['./hostweb/assets/js/app/app']);
		
	});

});
		</pre>
</code>
<p>
	&nbsp;
</p>
Weiterführende Informationen gibt es auf der Hauptseite von Require.JS:
<br />
<a href="http://requirejs.org/docs/api.html" class="hastip" title="Öffne Link" target="_blank">http://requirejs.org/docs/api.html</a>

</strong></p>