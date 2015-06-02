/*
 * Definition of custom subcategories
 */
# customsubcategory=domain=Domain(s) of website
# customsubcategory=layout=Layout settings
# customsubcategory=language=Language settings
# customsubcategory=extension=Extension settings
# customsubcategory=video=Video settings


/* ----------------------------------------
 * Site & theme default typo3 constants
 */
content {
    # default header type h2 instead of h1
    defaultHeaderType = 2

    # remove tt_address (if not used for direct_mail)
    # direct mail does not require tt_address (in 4.0.0), but creates the table columns anyway
    #shortcut.tables := removeFromList(tt_address)
}
styles.content {
    imgtext {
        maxW = 1140
        # 50% col, margin between 30px
        maxWInText = 555
        maxWInText = 750
        textMargin = 20
        colSpace = 30
        rowSpace = 30

        linkWrap {
            width = 1200
            newWindow = 1
            lightboxEnabled = 1
            lightboxCssClass = prettyPhoto
            lightboxRelAttribute = prettyPhoto[{field:uid}]
        }
        borderThick = 1
        borderSpace = 10
    }

    uploads {
        filesizeBytesLabels = " | Kb| Mb| Gb"
    }

    media {
        defaultVideoWidth = 370
        defaultVideoHeight = 208

        defaultAudioWidth = 370
        defaultAudioHeight = 30
    }
}


/* ----------------------------------------
 * Site & theme constants for bsdist and bootstrap_core
 */
plugin.tx_bootstrapcore {
    theme {
        #libDir = fileadmin/bsdist/lib
        bootstrapCssFile = {$plugin.tx_bootstrapcore.theme.libDir}/bootstrap/dist/css/bootstrap.min.css
        bootstrapJsFile = {$plugin.tx_bootstrapcore.theme.libDir}/bootstrap/dist/js/bootstrap.min.js
        jQueryJsFile = {$plugin.tx_bootstrapcore.theme.libDir}/jquery/dist/jquery.min.js

        lightboxCssFile = {$plugin.tx_bootstrapcore.theme.libDir}/jquery-prettyPhoto/css/prettyPhoto.min.css
        lightboxJsFile = {$plugin.tx_bootstrapcore.theme.libDir}/jquery-prettyPhoto/js/jquery.prettyPhoto.js
    }

    website {
        # cat=tx_bootstrapcore.website/domain/010; type=string; label=Website domain: The domain without the protocol, e.g. www.example.com. Only used for direct_mail and news rss feed.
        domain =

        # change lang locale
        #lang.locale = de_DE.UTF-8
        #lang.localeShort = de

        metaNav {
            # cat=tx_bootstrapcore.website/layout/010; type=string; label=Meta navigation page id
            pageId = 7
        }
        footer {
            # cat=tx_bootstrapcore.website/layout/010; type=string; label=Page id with footer content (for static footer content)
            pageId = 6
            # cat=tx_bootstrapcore.website/layout/011; type=string; label=Left footer colPos
            leftColPos = 10
            # cat=tx_bootstrapcore.website/layout/012; type=string; label=Center footer colPos
            centerColPos = 11
            # cat=tx_bootstrapcore.website/layout/013; type=string; label=Right footer colPos
            rightColPos = 12
        }
    }
}


# --- Additional extension constants (see setup.ts) ---
#
# indexed_search
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/indexed_search/constants.ts">
# felogin
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/felogin/constants.ts">
# sr_freecap (for formhandler)
#<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/bsdist/theme/typoscript/ext/sr_freecap/constants.ts">