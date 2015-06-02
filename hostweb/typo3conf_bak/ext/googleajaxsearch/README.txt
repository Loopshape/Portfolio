Introduction
This plugin uses the google AJAX search API to create a searchform in your page. 

The main extension for searching within a typo3 website - indexed_search is very slow once there are a large number of pages in the site.
On Dmitri Dulepov's blog (http://dmitry-dulepov.com/article/eight-performance-tips-for-your-typo3-web-site.html), he suggests using google search or installing an external search aplication like mnoGoSearch or lucene.

It is configurable to limit search results within a site or sites and to page title keywords.  Key features include
- ability to display search results within the graphic design of my site.
- multiple search forms in one page with the possibility to share a DOM component to display results
- flexform configuration to simplify using the plugin for end users
- ability to limit search results within a site or to title keywords as well as search criteria.
- ability to set a default search criteria when the plugin is first loaded
- search as you type



Installation
1. Install the extension using the extension manager
2. Include the static template Google API Search in a relevant template record.
3. Obtain a google AJAX API key  from http://code.google.com/apis/ajaxsearch/signup.html
4. Use the constant editor to set constants as required for your site. In particular it is a good idea to set the API key here so that it is shared across all content elements although this can be done in the flexform of the content element itself.


Advanced

Filters
As well as text filtering by words typed into the search box, search results can be filtered by 
- domain name
- words in the title of the page
- url fragments

See the configuration section or the flexform (which overrides) for details.
The typoscript configuration provides additionalXXX configuration for each of these filters which is not overridden by the flexform but continues to operate in parallel with the main restrictions.


Multiple Searches in a page
Out of the box, it is possible to insert multiple search plugins in a page.
It is also possible to share a section of the web page for results between multiple search plugins 
1. Create a HTML content element in the page that will contain the search results. Ensure that the tag has a unique ID set.
eg <div id="sharedresults"></div>
2. In the template configuration or the flexform configuration under Browser DOM, set the results ID to match ie sharedresults.


Configuration

plugin.tx_googleajaxsearch {
	# API Key
	apiKey =
	# Sites To Search (space seperated domains)
	siteRestriction =
	# Additional Sites To Search (space seperated domains) - TS Config Only
	additionalSiteRestriction =
	# Title Word Restrictions (space seperated keywords)
	titleWordRestriction =
	# Additional Title Word Restrictions (space seperated keywords, quote phrases) - TS Config Only
	additionalTitleWordRestriction =
	# URL Restrictions (space seperated keywords)
	urlRestriction =
	# Additional URL Restrictions (space seperated keywords) - TS Config Only
	additionalUrlRestriction =
	# Default Search Text (space seperated keywords)
	defaultSearch =
	# Link Target
	linkTarget = internal
	# Results DOM Id
	resultsDOMId = 
}




Related Extensions  (As at 7/5/2010)

Before creating this extension I went looking in the extension repository http://typo3.org/extensions for google search plugins.
Google has recently updated their API and are no longer giving keys for the old API so some of the extensions are no longer useful.

I built a new extension for this function because I needed additional features to what was available. In particular
- ability to display search results within the graphic design of my site.
- multiple search forms in one page with the possibility to share a DOM component to display results
- flexform configuration to simplify using the plugin for end users
- ability to limit search results within a site or to title keywords as well as search criteria.
- ability to set a default search criteria when the plugin is first loaded
- search as you type

Compatible with the new Google AJAX API
Ajax Tabbed Google Search    ( ajax_google_search )
2010 Shafiq Issani <email@shafiq.in>

Google custom search for Typo3    ( googlecse )
2010 Toni Milovan <tmilovan@fwd.hr>

Simple Google Search    ( so_gsearch )
2004 Onno Schuit (o.schuit@solin.nl)
This extension adds a very simple Google search to your site. Type in your search string, select search mode (web or images) and hit the submit button. The results are shown in Google itself.

Obsolete extensions no longer compatible with google API

[LTG] Google Search API    ( ltg_googlesearch )
2005 R. van Twisk (ries@livetravelguides.com)

Google API Search    ( google_api_search )
2003 Tim Kleigrewe (x27@e27.com)