
plugin.tx_news {
    view {
        # Additional template paths
        templateRootPaths.110 = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/news/Templates/
        # Additional partial paths
        partialRootPaths.110 = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/news/Partials/

        # Different template for pagination
        widget.Tx_News_ViewHelpers_Widget_PaginateViewHelper.templateRootPath = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/news/Templates/
    }

    settings {
        # remove default css (if used with predef news templates)
        cssFile >

        #defaultDetailPid = 0
        #cropMaxCharacters = 150

        # don't use/show dummy image
        displayDummyIfNoMedia = 1

        # list view
        list {
            media {
                image {
                    maxWidth = 100
                    maxHeight = 100
                }
                #dummyImage = typo3conf/ext/news/Resources/Public/Images/dummy-preview-image.png
            }
            paginate {
                itemsPerPage = 10
                insertAbove = 0
                insertBelow = 1
                # add next/prev links in header (for screen reader?)
                #prevNextHeaderTags = 1
            }
        }

        # detail view
        detail {
            media {
                image {
                    lightbox = prettyPhoto[newsimgs]
                    #maxWidth = 282
                    #maxHeight =
                }
                video {
                    #width = 282
                    #height = 300
                }
            }
            # don't use/show fb & twitter sharing plugins
            showSocialShareButtons = 0
        }

        # deactivate analytics for sharing
        analytics {
            social {
                facebookLike = 0
                facebookShare = 0
                twitter = 0
            }
        }
    }

    _LOCAL_LANG {
        default {
            related-links = Links
            related-files = Files
            #dateFormat = %m/%d/%Y
            #more-link = Read more
            #back-link = Back

            #list_nonewsfound = No news available.

            #paginate_overall = Page %s of %s.
            #paginate_next = Next
            #paginate_previous = Previous

            #categories = Categories
            #tags = Tags

            # --- Additional labels ---
            #search = Search
        }
        de {
            related-links = Links
            related-files = Dateien
            #dateFormat = %d.%m.%Y
            #more-link = mehr
            #back-link = zurück

            #list_nonewsfound = Keine Artikel vorhanden.

            #paginate_overall = Seite %s von %s.
            #paginate_next = Nächste
            #paginate_previous = Vorherige

            #categories = Kategorien
            #tags = Tags

            # --- Additional labels ---
            #search = Suchen
        }
    }
}
