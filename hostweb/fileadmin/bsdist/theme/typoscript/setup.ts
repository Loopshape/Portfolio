/* --------------------
 * Configuration
 */
config {
    #htmlTag_setParams = lang="en" dir="ltr"
    pageTitleFirst = 1

    # production
    #concatenateCss = 1
    #concatenateJs = 1

    # other options instead of 'ascii', 1 = js encrypted
    #spamProtectEmailAddresses = 1
    #spamProtectEmailAddresses_atSubst = (at)
    #spamProtectEmailAddresses_lastDotSubst = .

    # multi lang handling
    #sys_language_softMergeIfNotBlank = tx_news_domain_model_news:categories, tt_content:image, sys_file_reference,sys_file
}


/* --------------------
 * Page
*/
page {
    #bodyTag = <body class="fixed">

    10 = FLUIDTEMPLATE
    10 {
        /*
        # In bootstrap_core defined
        layoutRootPath = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/Layouts/
        partialRootPath = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/Partials/
        */
        file.cObject = CASE
        file.cObject {
            /*
            # In bootstrap_core defined
            key.data = levelfield:-1, backend_layout_next_level, slide
            key.override.field = backend_layout
            default = TEXT
            default.value = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/tmpl_default.html
            */
            # home template
            2 = TEXT
            2.value       = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/tmpl_home.html
            # empty template
            3 = TEXT
            3.value       = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/tmpl_empty.html
        }

        # Variables in templates
        variables {
            # In bootstrap_core defined
            #content < styles.content.get
            # content sidebar
            content_sidebar < styles.content.get
            content_sidebar.select.where = colPos=1
            /*
            # Optional: FLUID layout based on page field 'layout'
            containerWrapClass = CASE
            containerWrapClass {
                key.data = levelfield:-1, layout, slide
                # default template
                default = TEXT
                default.value = default
                1 = TEXT
                1.value = blog
            }
            */
        }
    }

    meta {
        author   =
        # development setting
        robots   = noindex,nofollow
        # more
        #apple-mobile-web-app-capable = no
    }

    includeCSS {
        # In bootstrap_core set
        #bootstrap = {$plugin.tx_bootstrapcore.theme.bootstrapCssFile}
        bootstrap.forceOnTop = 1
        # Instead of css_styled_content CSS
        #bootstrap_core = {$plugin.tx_bootstrapcore.theme.contentCssFile}
        # Default is prettyPhoto
        #lightbox = {$plugin.tx_bootstrapcore.theme.lightboxCssFile}

        # Webfont
        /*
        webfont = //fonts.googleapis.com/css?family=Open+Sans:400,600
        webfont.excludeFromConcatenation = 1
        webfont.external = 1
        webfont.forceOnTop = 1
        */

        # Site & theme specific
        custom = {$plugin.tx_bootstrapcore.theme.baseDir}/css/custom.min.css
    }

    #headerData.10 = COA
    /*
    headerData.10 {
        # Favicon
        10 = TEXT
        10.value (
            <link rel="shortcut icon" href="fileadmin/favicons/favicon.ico" />
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="fileadmin/favicons/apple-touch-icon-144x144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="fileadmin/favicons/apple-touch-icon-114x114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="fileadmin/favicons/apple-touch-icon-72x72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="fileadmin/favicons/apple-touch-icon-precomposed.png">
        )

        # Inline scripts
        20 = TEXT
        20.insertData = 1
        20.value (

            <!--[if lt IE 9]>
            <script src="{$plugin.tx_bootstrapcore.theme.libDir}/html5shiv/dist/html5shiv.min.js"></script>
            <![endif]-->
        )
    }
    */

    includeJSlibs {
        # In bootstrap_core set
        #jquery = {$plugin.tx_bootstrapcore.theme.jQueryJsFile}
    }
    includeJSFooterlibs {
        # In bootstrap_core set
        #bootstrap = {$plugin.tx_bootstrapcore.theme.bootstrapJsFile}
        #lightbox = {$plugin.tx_bootstrapcore.theme.lightboxJsFile}

        # Site & theme specific
        custom = {$plugin.tx_bootstrapcore.theme.baseDir}/js/custom.js
    }

    #bodyTagCObject = CASE
    /*
    bodyTagCObject {
        stdWrap.wrap = <body class="|">
        key.field = layout
        #key.data = levelfield:-1, layout, slide
        # default body tag
        default = TEXT
        default.value =
        1 = TEXT
        1.value = layout1
    }
    */

}



/* --------------------
 * tt_content customizations
 */
tt_content {
    /*
    div {
        override.cObject {
            default.value = <hr>
            1.value = <hr class="style2">
            2.value = <hr class="style3">
        }
    }
    media {
        # for use with fitvids
        20.mimeConf.swfobject.layout = <div class="embed-container">###SWFOBJECT###</div>
    }
    */

    /* --------------------
     * Image max size (based on backend_layout)
     */
    image.20 {
        maxW >
        maxW.cObject = CASE
        maxW.cObject {
            key.data = levelfield:-1, backend_layout_next_level, slide
            key.override.data = TSFE:page|backend_layout

            # default template, home, fullwidth
            default = TEXT
            default.value = {$styles.content.imgtext.maxW}

            # template with sidebar, based on colPos
            1 = CASE
            1 {
                key.field = colPos
                # col-md-8 (and fullwidth = 1140)
                default = TEXT
                default.value = 750
                # col-md-4 (and fullwidth = 1140)
                1 = TEXT
                1.value = 360
            }

        }
    }

    /*
    uploads.20 {
        linkProc {
            combinedLink = 0
            jumpurl >
        }
        renderObj {
            # preview image
            10 {
                file.width = 100
                stdWrap {
                    wrap = <div class="img" style="width: 140px">|</div>
                }
            }
            # icon
            # change to diff set of custom icons for downloads, default is typo3/gfx/fileicons/
            15.file.import = typo3conf/ext/bootstrap_core/Resources/Public/Icons/fileicons/
            15.file.import.wrap = |.png
            # start text-wrap
            18 = TEXT
            18.value = <div class="text">
            # file name/link
            25 < .20
            25 {
                wrap (
                 <p class="dl-link"><span class="glyphicon glyphicon-download"></span>
                 |</p>
                )
                wrap.override >
            }
            # title of download
            20 {
                # instead of name use title (works only if media object used and title given)
                data = file:current:title
                typolink >
             #   wrap = <h4 class="dl">|</h4>
                wrap = <span class="dl">|</span>
                wrap.override >
                # activate if file extension should be stripped from filename
                #replacement.20 < .replacement._20
                #replacement._20 >
            }
            # description
            30.wrap = <p class="dl-descr">|</p>
            30.wrap = <span class="dl-descr">|</span>

            # close text-wrap
            50 = TEXT
            50.value = </div>

            wrap {
                cObject {
                    10 {
                        oddEvenClass >
                        elementClass = dl-ext-{file:current:extension}
                    }
                    20 {
                        #value = <div class="dl-entry {register:elementClass}">|<div class="clearfix"></div></div>
                        value = <li class="dl-entry {register:elementClass}">|<div class="clearfix"></div></li>
                    }
                }
            }
        }
    }
    */

    /* --------------------
     * Use header fields in gridelements (remove if not used)
     */
    gridelements_pi1 {
        10 =< lib.stdheader
    }
}

/* --------------------
 * Layout blocks, libs
 */
lib {
	logo = COA
	logo.wrap = <div class="logo">|</div>
	logo {
		10 = TEXT
		10.value = <img src="{$plugin.tx_bootstrapcore.theme.baseDir}/img/logo.png" class="logo img-responsive" />
		10.typolink.parameter = 1
		#10.typolink.ATagParams = class="logo"
        /*
		20 = TEXT
		20.value = something goes in here
		20.wrap = <p class="claim">|</p>
		*/
	}

	#pageHeading = COA
	/*
	#pageHeading.wrap = <div class="page-header">|</div>
	pageHeading {
	  10 = TEXT
	  10.data = page:title
	  10.wrap = <h1>|</h1>

	  20 = TEXT
	  20.data = page:subtitle
	  20.wrap = <h4>|&nbsp;</h4>
	  20.required = 1
	  #20.noTrimWrap = | <small>|</small>|
	}
    */

    footerContent = COA
	footerContent.wrap = <div class="container"><div class="row">|</div></div>
	footerContent {
	    # left footer col
        10 < styles.content.get
        10 {
            # either-or
            # v1: from dedicated page
            select.pidInList = {$plugin.tx_bootstrapcore.website.footer.pageId}
            # v2: on each page slots, slide
            #slide = -1

            # colPos (same for v1 and v2)
            select.where = colPos={$plugin.tx_bootstrapcore.website.footer.leftColPos}
            stdWrap.wrap = <div class="col-md-4 col-sm-4">|</div>
        }
        # center footer col
        20 < .10
        20.select.where = colPos={$plugin.tx_bootstrapcore.website.footer.centerColPos}
        20.stdWrap.wrap = <div class="col-md-4 col-sm-4 text-center">|</div>
        # right footer col
        30 < .10
        30.select.where = colPos={$plugin.tx_bootstrapcore.website.footer.rightColPos}
        30.stdWrap.wrap = <div class="col-md-4 col-sm-4 text-right">|</div>
	}

	copyright = COA
	copyright {
		# copyright text
		10 = TEXT
		10.data = date:U
		10.strftime = %Y
		10.wrap =  &copy; Copyright&nbsp;|&nbsp;Firma AG

		# simple bottom nav
		20 = HMENU
		20.wrap = &nbsp; &#124; &nbsp;|
		20 {
			entryLevel = 0
			#excludeUidList = 11
			1 = TMENU
			1 {
				wrap = |
				expAll = 1
				NO = 1
				NO.allWrap >
				NO.wrapItemAndSub = | |*| &nbsp;-&nbsp;| |*| &nbsp;-&nbsp;|
			}
		}
	}

    # for dynamic content inherit slots, e.g. Partials/FooterSlide (from Ext:bootstrap_package)
    /*
    contentSlide = COA
    contentSlide {
        5 = LOAD_REGISTER
        5  {
            colPos.cObject = TEXT
            colPos.cObject {
                value.current = 1
                ifEmpty = 0
            }
        }
        20 < styles.content.get
        20.select.where = colPos={register:colPos}
        20.select.where.insertData = 1
        20.slide = -1
    }
    */
}


# Conditional stuff
/*
# On home
[globalVar = TSFE:id = 1]
  # change site/page title order
  config.pageTitleFirst = 0
[global]
*/


/* --------------------
 * More configurations
 */

# Navigations
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/nav/setup.ts">

# Multilang config and lang nav
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/lang/multilang.ts">
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/lang/langnav.ts">


# --- Additional extension setups (see constants.ts) ---
#
# - You have to install and configure the extensions first.
#
# indexed_search
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/indexed_search/setup.ts">
# felogin
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/felogin/setup.ts">

# bootstrap_grids
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/grids/setup.ts">
# iconfont
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/iconfont/setup.ts">

# formhandler
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/formhandler/setup.ts">
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/sr_freecap/setup.ts">
