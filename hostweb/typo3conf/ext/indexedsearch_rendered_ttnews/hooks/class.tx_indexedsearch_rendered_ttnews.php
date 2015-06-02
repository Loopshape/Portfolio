<?php

// Special adjustments for rgnewsce because it's class is just loaded if this is TYPO3-frontend.
if (t3lib_extMgm::isLoaded('rgnewsce')) {
    require_once(t3lib_extMgm::extPath('rgnewsce').'class.tx_rgnewsce_fe.php');
    require_once(t3lib_extMgm::extPath('css_styled_content').'pi1/class.tx_cssstyledcontent_pi1.php');
}

class tx_indexedsearch_rendered_ttnews {

	/**
	 * @param array $fieldList
	 * @param array $r
	 * @param tx_ttnews $tt_news_original
	 * @return array
	 */
	public function indexSingleNewsRecord(array $fieldList, array $r, tx_ttnews $tt_news_original) {

		$tt_news = clone $tt_news_original;

		// Add ###NEWS_CONTENT### to the list of markers that need to be rendered
		$tt_news->renderMarkers = array('###NEWS_CONTENT###');

		// Load tt_news in single-view
		$tt_news->config['code'] = 'SINGLE';

		// Disable caching, as this is not a normal page-rendering process
		$tt_news->allowCaching = false;

		// Disable custom image-marker rendering, used f.e. by perfectlightbox ...
		unset($tt_news->conf['imageMarkerFunc']);

		// Disable all extensions for image-generation. This prevents any image-generation and works around a bug with FAL :)
		$imageExtensions = $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'];
		$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] = "";

        $k = false;
        // The extension newsreadedcount is known to use an instance of fe_user and it would count the news-read value up every time the article is indexed ...
        if (t3lib_extMgm::isLoaded('newsreadedcount')
            && false !== ($k =
                array_search('EXT:newsreadedcount/pi1/class.tx_newsreadedcount_pi1.php:tx_newsreadedcount_pi1',
                    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraItemMarkerHook']))
        ) {
            unset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraItemMarkerHook'][$k]);
        }

		// Render markers for single-view
		$markerArray = $tt_news->getItemMarkerArray(
			$r,
			$tt_news->conf['displaySingle.']);

        // Add the settings back, so we don't leave a gap here.
        if (t3lib_extMgm::isLoaded('newsreadedcount') && $k !== false) {
            $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraItemMarkerHook'][$k] = 'EXT:newsreadedcount/pi1/class.tx_newsreadedcount_pi1.php:tx_newsreadedcount_pi1';
        }

		// Restore value for allowed image file-extensions
		$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] = $imageExtensions;

		// Replace the row's body-text by it's rendered value
		$r['bodytext'] = $markerArray['###NEWS_CONTENT###'];

		return $r;
	}
}
