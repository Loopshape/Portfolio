	<body id="page">
	
		<!--
		<img id="fmWallpaper" src="./hostweb/assets/img/area/background.jpg" width="auto" height="100%" alt="" />
		<img id="pageColors" src="./hostweb/assets/img/render/website_roller.jpg" width="100%" height="100%" alt="" />
		-->
		
		<div class="inner">
			
			<!-- <img class="fillArea" src="./hostweb/assets/img/area/background.jpg" width="100%" height="100%" alt="" /> -->
	
			<section id="main">
	
				<?php include "./hostweb/templates/partials/header.php"; ?>
	
				<?php include "./hostweb/templates/partials/output.php"; ?>
				
				<div class="cf"></div>
				<br />
				<br />
				
				<div id="bufferSpace"></div>
				
				<section id="disqusArea">
					<div id="disqus_thread"></div>
					<script type="text/javascript">
					    var disqus_shortname = 'loopshapeportfolio';
					    (function() {
					        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					    })();
					</script>
					<noscript><a href="https://disqus.com/?ref_noscript" rel="nofollow"></a></noscript>
					<style rel="stylesheet">
						html body#page #disqusArea {
							margin-bottom: 0px !important; 
						}
					</style>
				</section>
				
				<div class="cf"></div>
	
			</section>
			
			<?php include "./hostweb/templates/partials/footer.php"; ?>
	
		</div>
		
		<script type="text/javascript">
		    var disqus_shortname = 'loopshapeportfolio';
		    (function () {
		        var s = document.createElement('script'); s.async = true;
		        s.type = 'text/javascript';
		        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
		        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		    }());
		</script>
		
		<?php include "./hostweb/templates/partials/scripts.php"; ?>
		
		<a href="#" class="scrollToTop"></a>
		
		<a class="areaFull" href="./." title="Mausklick: Request senden"><img src="./hostweb/assets/img/items/ajax-loader.gif" alt="" id="ajaxLoader" /></a>
		
	</body>

</html>