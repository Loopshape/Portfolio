# ------------------------------------
# Indexed Search
# ------------------------------------

page.config.index_enable = 1
page.config.index_externals = 1

plugin.tx_indexedsearch {
    #_CSS_DEFAULT_STYLE >
    #templateFile =fileadmin/layout/html/indexed_search.tmpl

    # Setting default values
    _DEFAULT_PI_VARS {
        extResume = 1

        # default-mäßig ein Teilwort suchen (1)
        type = 1
        lang < config.sys_language_uid

        # show extended search initially
        ext = 0

        # grouping: flat/sections
        group = flat

        results = 10
    }

    # wrappings
    rules_stdWrap {
    }

    sectionlinks_stdWrap {
    }

    path_stdWrap {
    }

    # config
    search {
    rootPidList = 1
    page_links = 2
    detect_sys_domain_records = 13
    #defaultFreeIndexUidList = 0,1,2
    }

    # show
    show {

        # rules
        rules = 0

        # hash creation
        parsetimes=1

        # second level in section dropdown
        L2sections=1

        # first level in section dropdown
        L1sections=1

        # show "not in menu" or "hide from menu" but not hidden pages in section
        LxALLtypes=0

        # empty formfield after search
        clearSearchBox = 0

        # add searchterm to history
        clearSearchBox.enableSubSearchCheckBox=1

        forbiddenRecords = 0
        alwaysShowPageLinks = 1
        advancedSearchLink = 1
        resultNumber = 1
        mediaList = 1
    }

    # show fields for parameters
    blind {

        # type (word, subpart of word, ..)
        type=0

        # default option (and, or)
        defOp=0

        # sections of website
        sections=0

        # search in mediatypes
        media=0

        # sort
        order=0

        # view (section hierarchye / list)
        group=0

        # language selection
        lang=0

        # select sorting
        desc=0

        # results per page
        results=20

        # extended preview
        extResume = 0

        #freeIndexUid = 0
    }
}

# ------------------------------------
# Include template Typoscripts
# ------------------------------------

<INCLUDE_TYPOSCRIPT: source="FILE:./root.ts">

# setup html parts from TS-config

lib.htmlHeader >

lib.htmlNavi >

lib.htmlContent < styles.content.get

lib.htmlSidebar >

lib.htmlFooter >

