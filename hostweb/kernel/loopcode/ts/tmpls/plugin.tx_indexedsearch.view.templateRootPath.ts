<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>indexed_search template</title>
</head>

<body>

<h1>Indexed Search: Tableless template</h1>


<h2>TEMPLATE_SEARCH_FORM</h2>
<p><em>Template for displaying the search form.</em></p>

<!-- ###SEARCH_FORM### begin -->
<div class="tx-indexedsearch-searchbox searchbox-tmpl-css">
<form action="###ACTION_URL###" method="post" id="tx_indexedsearch">
    <div>
        <input type="hidden" name="tx_indexedsearch[_sections]" value="0" />
        <input type="hidden" name="tx_indexedsearch[_freeIndexUid]" id="tx_indexedsearch_freeIndexUid" value="_" />
        <input type="hidden" name="tx_indexedsearch[pointer]" id="tx_indexedsearch_pointer" value="0" />
        <!-- ###HIDDEN_FIELDS### begin -->
        <input type="hidden" name="###HIDDEN_FIELDNAME###" value="###HIDDEN_VALUE###" />
        <!-- ###HIDDEN_FIELDS### end -->
    </div>

    <fieldset>
        <legend>###FORM_LEGEND###</legend>

        <div class="tx-indexedsearch-form">
            <label for="tx-indexedsearch-searchbox-sword">###FORM_SEARCHFOR###</label>
            <input type="search" name="tx_indexedsearch[sword]" value="###SWORD_VALUE###" id="tx-indexedsearch-searchbox-sword" class="tx-indexedsearch-searchbox-sword sword" ###PLACEHOLDER#
## />&nbsp;
        </div>

        <!-- ###ADDITONAL_KEYWORD### begin -->
        <input type="hidden" name="tx_indexedsearch[sword_prev]" value="###SWORD_PREV_VALUE###" />
        <input type="checkbox" name="tx_indexedsearch[sword_prev_include]" id="tx_indexedsearch_sword_prev_include" value="1" ###SWORD_PREV_INCLUDE_CHECKED### /> <label for="tx_indexedsearch_sword_prev_include">###ADD_TO_CURRENT_SEARCH###.</label>
        <!-- ###ADDITONAL_KEYWORD### end -->

        <!-- ###SEARCH_FORM_EXTENDED### begin -->

        <!-- ###SELECT_SEARCH_FOR### begin -->
        <div class="tx-indexedsearch-search-for">
            <label for="tx-indexedsearch-selectbox-type">###FORM_MATCH###</label>

            <!-- ###SELECT_SEARCH_TYPE### begin -->
            <select name="tx_indexedsearch[type]" id="tx-indexedsearch-selectbox-type" class="tx-indexedsearch-selectbox-type type">###SELECTBOX_TYPE_VALUES###</select>&nbsp;
            <!-- ###SELECT_SEARCH_TYPE### end -->

            <!-- ###SELECT_SEARCH_DEFOP### begin -->
            <select name="tx_indexedsearch[defOp]" id="tx-indexedsearch-selectbox-defop" class="tx-indexedsearch-selectbox-defop defop">###SELECTBOX_DEFOP_VALUES###</select>
            <!-- ###SELECT_SEARCH_DEFOP### end -->
        </div>
        <!-- ###SELECT_SEARCH_FOR### end -->

        <!-- ###SELECT_SEARCH_IN### begin -->
        <div class="tx-indexedsearch-search-in">
            <label for="tx-indexedsearch-selectbox-media">###FORM_SEARCHIN###</label>

            <!-- ###SELECT_SEARCH_MEDIA### begin -->
            <select name="tx_indexedsearch[media]" id="tx-indexedsearch-selectbox-media" class="tx-indexedsearch-selectbox-media media">###SELECTBOX_MEDIA_VALUES###</select>&nbsp;
            <!-- ###SELECT_SEARCH_MEDIA### end -->

            <!-- ###SELECT_SEARCH_LANG### begin -->
            <select name="tx_indexedsearch[lang]" id="tx-indexedsearch-selectbox-lang" class="tx-indexedsearch-selectbox-lang lang">###SELECTBOX_LANG_VALUES###</select>
            <!-- ###SELECT_SEARCH_LANG### end -->
        </div>
        <!-- ###SELECT_SEARCH_IN### end -->

        <!-- ###SELECT_SECTION### begin -->
        <div class="tx-indexedsearch-search-select-section">
            <label for="tx-indexedsearch-selectbox-sections">###FORM_FROMSECTION###</label>
            <select name="tx_indexedsearch[sections]" id="tx-indexedsearch-selectbox-sections" class="tx-indexedsearch-selectbox-sections sections">###SELECTBOX_SECTIONS_VALUES###</select>
        </div>
        <!-- ###SELECT_SECTION### end -->

        <!-- ###SELECT_FREEINDEXUID### begin -->
        <div class="tx-indexedsearch-search-freeindexuid">
            <label for="tx-indexedsearch-selectbox-freeIndexUid">###FORM_FREEINDEXUID###</label>
            <select name="tx_indexedsearch[freeIndexUid]" id="tx-indexedsearch-selectbox-freeIndexUid" class="tx-indexedsearch-selectbox-freeIndexUid freeIndexUid">###SELECTBOX_FREEINDEXUIDS_VALUES###</select>
        </div>
        <!-- ###SELECT_FREEINDEXUID### end -->

        <!-- ###SELECT_ORDER### begin -->
        <div class="tx-indexedsearch-search-select-order">
            <label for="tx-indexedsearch-selectbox-order">###FORM_ORDERBY###</label>
            <select name="tx_indexedsearch[order]" id="tx-indexedsearch-selectbox-order" class="tx-indexedsearch-selectbox-order order">###SELECTBOX_ORDER_VALUES###</select>&nbsp;
            <select name="tx_indexedsearch[desc]" id="tx-indexedsearch-selectbox-desc" class="tx-indexedsearch-selectbox-desc desc">###SELECTBOX_DESC_VALUES###</select>
        </div>
        <!-- ###SELECT_ORDER### end -->

        <!-- ###SELECT_RESULTS### begin -->
        <div class="tx-indexedsearch-search-select-results">
            <label for="tx-indexedsearch-selectbox-results">###FORM_ATATIME###</label>
            <select name="tx_indexedsearch[results]" id="tx-indexedsearch-selectbox-results" class="tx-indexedsearch-selectbox-results results">###SELECTBOX_RESULTS_VALUES###</select>
        </div>
        <!-- ###SELECT_RESULTS### end -->

        <!-- ###SELECT_GROUP### begin -->
        <div class="tx-indexedsearch-search-select-group">
            <label for="tx-indexedsearch-selectbox-group">###FORM_STYLE###</label>
            <select name="tx_indexedsearch[group]" id="tx-indexedsearch-selectbox-group" class="tx-indexedsearch-selectbox-group group">###SELECTBOX_GROUP_VALUES###</select>

            <!-- ###SELECT_EXTRESUME### begin -->
            <input type="hidden" name="tx_indexedsearch[extResume]" value="0" />
            <input type="checkbox" value="1" name="tx_indexedsearch[extResume]" id="tx_indexedsearch_extResume" ###EXT_RESUME_CHECKED### /> <label for="tx_indexedsearch_extResume">###FORM_EXTRESUME###</label>
            <!-- ###SELECT_EXTRESUME### end -->
        </div>
        <!-- ###SELECT_GROUP### end -->

        <!-- ###SEARCH_FORM_EXTENDED### end -->
        <div class="tx-indexedsearch-search-submit">
            <input type="submit" name="tx_indexedsearch[submit_button]" value="###FORM_SUBMIT###" id="tx-indexedsearch-searchbox-button-submit" class="tx-indexedsearch-searchbox-button submit" />
        </div>
    </fieldset>
    <p>###LINKTOOTHERMODE###</p>
</form>
</div>
<!-- ###SEARCH_FORM### end -->
<br /><br />




<h2>TEMPLATE_RULES</h2>
<p><em>Template for displaying the search rules.</em></p>

<!-- ###RULES### begin -->
    <div class="tx-indexedsearch-rules">
        <h2>###RULES_HEADER###</h2>
        <p>###RULES_TEXT###</p>
    </div>
<!-- ###RULES### end -->
<br /><br />




<h2>TEMPLATE_RESULT_SECTION_LINKS</h2>
<p><em>Template for the section links in section mode.</em></p>

<!-- ###RESULT_SECTION_LINKS### begin -->
    <div class="tx-indexedsearch-sec">
        <ol>
            ###LINKS###
        </ol>
    </div>
<!-- ###RESULT_SECTION_LINKS### end -->

<!-- ###RESULT_SECTION_LINKS_LINK### begin -->
            <li>###LINK###</li>
<!-- ###RESULT_SECTION_LINKS_LINK### end -->
<br /><br />




<h2>TEMPLATE_SECTION_HEADER</h2>
<p><em>Template for the section title in section mode.</em></p>
<!-- ###SECTION_HEADER### begin -->
    <div id="###ANCHOR_URL###" class="tx-indexedsearch-secHead secHead-tmpl-css">
        <h2 class="tx-indexedsearch-title title">###SECTION_TITLE### <span class="tx-indexedsearch-result-count result-count result-count-tmpl-css">###RESULT_COUNT### ###RESULT_NAME###</span></h2>
    </div>

<!-- ###SECTION_HEADER### end -->
<br /><br />




<h2>TEMPLATE_RESULT_OUTPUT</h2>
<p><em>Template for the search result list.</em></p>
<!-- ###RESULT_OUTPUT### begin -->
    <div class="tx-indexedsearch-res res res-tmpl-css">
        <!-- ###HEADER_ROW### begin -->
        <h3><span class="tx-indexedsearch-icon icon">###ICON###</span> <span class="tx-indexedsearch-result-number result-number">###RESULT_NUMBER###</span> <span class="tx-indexedsearch-title###CSSSUFFIX### title">###TITLE###</span> <span class="tx-indexedsearch-percent percent percent-tmpl-css">###RATING###</span></h3>
        <!-- ###HEADER_ROW### end -->

        <!-- ###ROW_LONG### begin -->
        <p class="tx-indexedsearch-descr descr">###DESCRIPTION###</p>
        <dl class="tx-indexedsearch-info info info-tmpl-css">
            <dt class="tx-indexedsearch-text-item-size item-size">###TEXT_ITEM_SIZE###&nbsp;</dt>
            <dd class="tx-indexedsearch-text-item-size item-size">###SIZE###,&nbsp;</dd>

            <dt class="tx-indexedsearch-text-item-crdate item-crdate">###TEXT_ITEM_CRDATE###&nbsp;</dt>
            <dd class="tx-indexedsearch-text-item-crdate item-crdate">###CREATED###,&nbsp;</dd>

            <dt class="tx-indexedsearch-text-item-mtime item-mtime">###TEXT_ITEM_MTIME###&nbsp;</dt>
            <dd class="tx-indexedsearch-text-item-mtime item-mtime">###MODIFIED###</dd>

            <dt class="tx-indexedsearch-text-item-path item-path">###TEXT_ITEM_PATH###&nbsp;</dt>
            <dd class="tx-indexedsearch-text-item-path item-path">###PATH###</dd>
        </dl>
        <!-- ###ROW_LONG### end -->

        <!-- ###ROW_SHORT### begin -->
        <p class="tx-indexedsearch-descr descr">###DESCRIPTION###</p>
        <!-- ###ROW_SHORT### end -->

        <!-- ###ROW_SUB### begin -->
        <p class="tx-indexedsearch-list list">###TEXT_ROW_SUB###</p>
        <!-- ###ROW_SUB### end -->
    </div>
<!-- ###RESULT_OUTPUT### end -->
<br /><br />


</body>
</html>
