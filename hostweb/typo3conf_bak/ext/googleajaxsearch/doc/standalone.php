<?php 
	$apiKey='';
	$resultsDOMId="content";
	$searchFormDOMId="searchform";
	$brandingDOMId="branding";
	$siteRestriction="";
	$titleWordRestriction='';
	$linkTarget="blank";  // blank,top,parent 
	//$siteRestriction="austcom.org.au thebegavalley.org.au eurobodalla.org.au";
	//$titleWordRestriction='Bega cooking';
	// manipulate constants
	// site restriction
	if (strlen(trim($siteRestriction))>0) {
	$sr=explode(' ',$siteRestriction);
	$siteRestriction=implode(' OR ',$sr);
	} else {
	$siteRestriction='';	
	}
	// title word restrictions
	if (strlen(trim($titleWordRestriction))>0) {
	$tr=explode(' ',$titleWordRestriction);
	$titleWordRestriction=' intitle:'.implode(' intitle:',$tr);
	} else {
	$titleWordRestriction='';
	}
	// link target
	$linkTarget=trim($linkTarget);
	if (strlen($linkTarget)>0 && ($linkTarget=="self" || $linkTarget=="blank" ||$linkTarget=="top" ||$linkTarget=="parent")) {
		$linkTargetAddition=
		"a.setAttribute('target','_"
		.strtolower($linkTarget)
		."')\n";	
	} else {
		$linkTargetAddition='';	
	}
?>

<script src="http://www.google.com/jsapi?key=<?php echo $apiKey ?>"></script>
<script type="text/javascript">
google.load('search', '1');
var webSearch;
function searchComplete() {
	document.getElementById('<?php echo $resultsDOMId ?>').innerHTML = '';
	// Check that we got results
	if (webSearch.results && webSearch.results.length > 0) {
		for (var i = 0; i < webSearch.results.length; i++) {
			// Create HTML elements for search results
			var c = document.createElement('p');
			var p = document.createElement('p');
			var a = document.createElement('a');
			<?php echo $linkTargetAddition; ?>
			a.href = webSearch.results[i].url;
			a.innerHTML = webSearch.results[i].title;
			c.innerHTML = webSearch.results[i].content;
			// Append search results to the HTML nodes
			p.appendChild(a);
			p.appendChild(c);
			document.getElementById('<?php echo $resultsDOMId ?>').appendChild(p);
		}
	}
}

function doSearch(form) {
	if (form.input.value) {
		//document.getElementById("<?php echo $resultsDOMId ?>").innerHTML='';
		webSearch.execute(form.input.value);
	}
	return false;
}

function onLoad() {
	webSearch = new google.search.WebSearch();
	webSearch.setResultSetSize(google.search.Search.LARGE_RESULTSET);
	webSearch.setSearchCompleteCallback(this, searchComplete, null);
	google.search.Search.getBranding('<?php echo $brandingDOMId ?>');
	// Search restrictions to a site
	<?php
	if (strlen($siteRestriction)>0) {
	echo 'webSearch.setSiteRestriction("'.$siteRestriction.'");'."\n";
	}
	if (strlen($titleWordRestriction)>0) {
	echo 'webSearch.setQueryAddition("'.$titleWordRestriction.'");'."\n";
	}
	?>
	// Execute search query
	sf = new google.search.SearchForm(true, document.getElementById("<?php echo $searchFormDOMId ?>"));
	sf.setOnSubmitCallback(webSearch, doSearch);
}

// Set a callback to call your code when the page loads
google.setOnLoadCallback(onLoad);
</script>


<div id="<?php echo $brandingDOMId ?>"  style="float: left;"></div><br />
<div id="<?php echo $searchFormDOMId ?>"></div>
<div id="<?php echo $resultsDOMId ?>"></div>

<?php
/*
 .setRestriction(type, opt_value)
	

This method is used to specify or clear a restriction on the set of results returned by this searcher. In order to establish a restriction, both type and opt_value must be supplied and valid. In order to clear a restriction, supply a valid value for type and either specify null for the value of opt_value, or do not supply this. This API currently supports the following restriction types:

    * GSearchgoogle.search.Search.RESTRICT_SAFESEARCH - When this is specified as the value of type, the web search results will be restricted to images based on the safesearch value. Valid optional values for this type are as follows:
          o GSearchgoogle.search.Search.SAFESEARCH_STRICT - apply strict filtering for both explicit text and explicit images (the default behavior)
          o GSearchgoogle.search.Search.SAFESEARCH_MODERATE - apply filtering for explicit images
          o GSearchgoogle.search.Search.SAFESEARCH_OFF - do not apply safe search filtering
      The following code snippet demonstrates how to turn safe search filtering off.

      var searcher = new google.search.WebSearch();
      searcher.setRestriction(google.search.Search.RESTRICT_SAFESEARCH,
                              google.search.Search.SAFESEARCH_OFF);

    * GSearchgoogle.search.Search.RESTRICT_EXTENDED_ARGS New Args! - When this is specified, the value is an object containing name value pairs where the name may be one of lr, gl, or filter and the value for each is the value associated with the cgi argument as documented below.

      For example, the following code seqence restricts a web searcher to German and turns off the duplicate content filter

      searcher = new google.search.WebSearch()
      searcher.setRestriction(google.search.Search.RESTRICT_EXTENDED_ARGS,
                              { "lr" : "lang_de", "filter" : "0"});

-----------------------

cx?  	 This optional argument supplies the unique id for the Custom Search Engine that should be used for this request (e.g., cx=000455696194071821846:reviews).
cref? 	This optional argument supplies the url of a linked Custom Search Engine specification that should be used to satisfy this request (e.g., cref=http%3A%2F%2Fwww.google.com%2Fcse%2Fsamples%2Fvegetarian.xml).
safe? 	This optional argument supplies the search safety level which may be one of:

    * safe=active - enables the highest level of safe search filtering
    * safe=moderate - enables moderate safe search filtering (default)
    * safe=off - disables safe search filtering

lr? 	This optional argument allows the caller to restrict the search to documents written in a particular language (e.g., lr=lang_ja). This list contains the permissible set of values.
filter? New! 	This optional argument controls turning on or off the duplicate content filter:

    * filter=0 - Turns off the duplicate content filter
    * filter=1 - Turns on the duplicate content filter (default)

gl? New! 	This optional argument allows the caller to tailor the results to a specific country. The value should be a valid country code (e.g. uk, de, etc.). If this argument is not present, then the system will use a value based on the domain used to load the API (e.g. http://www.google.com/jsapi). If the API loader was not used, a value of "us" is assumed. 

*/


?>

