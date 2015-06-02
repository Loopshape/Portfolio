/* --------------------
 * Activate indexed_search
*/
config {
  # Indexed Search
  index_enable = 1
  # index files
  index_externals = 1
  # don't index metatags
  index_metatags = 0
}


/* --------------------
 * Configuration of indexed_search
*/
plugin.tx_indexedsearch {
  # html template for form, results, rules...
  templateFile = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/indexed_search/indexed_search.html

  # search config
  search {
    # root page to search from
    rootPidList = {$plugin.tx_bootstrapcore.indexed_search.rootPidList}
    # number of page links shown
    page_links = 10
  }

  # date format, used in result list
  dateFormat {
    created = %d.%m.%Y
    modified = %d.%m.%Y
  }

  # hide in advanced form
  blind {
    # match select: distinct work, part of word, beginning, sounds-like
    type = 1
    # op select: all words or any words (and/or)
    #defOp = 0

    # result types: internal pages, external pages, pdf, doc, ppt, xls
    media = 1
    # in language: all, specific
    #lang = 0

    # from section: whole site, all level 1, page x, page y
    sections = 1

    # Note: if 'order' OR 'desc' is 1, none is shown. (maybe only bug in 6.1.0)
    # order
    order = 1
    # order direction: highest/lowest first
    #desc = 0

    # select-field with num of results to show
    # results = 0

    # style: flat list, section hierarchy (and subelement checkbox extended resume)
    group = 1
  }

  show {
    # hide box with search rules infos
    rules = 0
    # show the result number for each result (1,2,3...)
    resultNumber = 1
    # show link to advanced search
    advancedSearchLink = 1
  }

  # wrap for rule info box
  # note: can't be shown below results, hard-coded in code
  rules_stdWrap.wrap = <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>|</div>

  # wrap for current search term show again below search form
  #whatis_stdWrap.wrap = <div class="well well-sm">|</div>
  whatis_stdWrap.wrap = <div class="alert alert-info">|</div>

  # remove css
  _CSS_DEFAULT_STYLE >
}




/* --------------------
 * Lang and multilang
*/
# lang
plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang = 0
/*
# or just like this?
#plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang < config.sys_language_uid

[globalVar = GP:L=1]
    plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang = 1
[global]
[globalVar = GP:L=2]
    plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang = 2
[global]
*/