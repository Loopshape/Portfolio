<!--
	REQUIRE.JS Loader for "Infinity Red" Template 
	Combined by: Arjuna Noorsanto • E-Mail: awebgo.net@gmail.com
-->
<!-- loading RequireJS main file -->
<script src="./hostweb/assets/js/app/r.js"></script>
<!-- define BaseURL and load RequireJS-config -->
<script>
	var baseUrl = "http://<?php echo $_SERVER['HTTP_HOST'] . '/' . $pageParams[0] . (!empty($pageParams[0]) ? '/' : '') ?>";
	require(['./hostweb/assets/js/app/config']);
</script>
