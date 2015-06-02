
config {
    disableAllHeaderCode = 1
    xhtml_cleaning = none
    admPanel = 0
    metaCharset = utf-8
    additionalHeaders = Content-Type:text/xml;charset=utf-8
    disablePrefixComment = 1

    absRefPrefix = http://{$plugin.tx_bootstrapcore.website.domain}/
}

# --- v1: for use WITH plugin ---
#
page >
page = PAGE
page.10 < styles.content.get
# set format
plugin.tx_news.settings.format = xml
# delete content wrap
tt_content.stdWrap >


# --- v2: without plugin, pure page definition
#
/*
[globalVar = TSFE:type = 100]
pageNewsRSS = PAGE
pageNewsRSS {
    typeNum = 100
    10 < tt_content.list.20.news_pi1
    10 {
        switchableControllerActions {
            News {
                1 = list
            }
        }
        settings < plugin.tx_news.settings
        settings {
            detailPid = 28
            startingpoint = 26
            limit = 15
            format = xml

            list.rss {
                # for adding link-rel in header
                # if 0 or empty, header links are not added
                pid = 27

                channel {
                    title = RSS News
                    description =
                    language = de-DE
                    copyright =
                    generator = typo3
                    #category =
                    link = http://{$plugin.tx_bootstrapcore.website.domain}
                }
            }
        }
    }
}
*/
[global]