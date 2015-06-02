
# --- include lib ----
#
includeLibs.tx_directmail_pi1 = EXT:direct_mail/pi1/class.tx_directmail_pi1.php


# --- newletter page config -----------------------
#
config {
    # absolute url
    absRefPrefix = {$plugin.tx_directmail_pi1.siteUrl}
    # don't protect email addresse
    spamProtectEmailAddresses = 0

    # no indexing
    index_enable = 0
    index_externals = 0
}

page.config {
    # don't output default header part
    disableAllHeaderCode = 1
}

# Change available variables (remove alot from website definition)
page.10 {

    file.cObject {
            # newsletter
            5 = TEXT
            5.value       = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/tmpl_newsletter.html

            # empty
            6 = TEXT
            6.value       = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/backend_layout/tmpl_empty.html
    }

    variables {
        #content_part2 >

        # default or custom header image
        customHeaderImage = CASE
        customHeaderImage {
            #key.data = levelfield:-1, layout
            key.field = layout
            # default
            default = TEXT
            default.value = 0
            # News page
            1 = TEXT
            1.value = 1
        }
    }
}

# --- change content output -----------------------
#
# show text with image as table
tt_content.image.20 {
    # remove <div> around images
    imageStdWrap.dataWrap >
    imageStdWrapNoWidth.wrap >
    imageColumnStdWrap.dataWrap >
    rendering {
        dl {
            oneImageStdWrap.dataWrap >
            imgTagStdWrap.wrap >
            imageLastRowStdWrap.dataWrap >
            imageRowStdWrap.dataWrap >
        }
    }

    # change output for choosable image position layouts
    layout {
        # above-center
        default.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td class="hide" valign="top" align="center" style="text-align: center;">###IMAGES###</td></tr><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td></tr></table>
        # above-right
        1.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td class="hide" valign="top" align="right" style="text-align: right;">###IMAGES###</td></tr><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td></tr></table>
        # above-left
        2.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td class="hide" valign="top" align="left" style="text-align: left;">###IMAGES###</td></tr><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td></tr></table>
        # below-center
        8.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td></tr><tr><td class="hide" valign="top" align="center" style="text-align: center;">###IMAGES###</td></tr></table>
        # below-right
        9.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td></tr><tr><td class="hide" valign="top" align="right" style="text-align: right;">###IMAGES###</td></tr></table>
        # below-left
        10.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td></tr><tr><td class="hide" valign="top" align="left" style="text-align: left;">###IMAGES###</td></tr></table>
        # intext-right
        17.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top" style="padding: 0 0 10px 0" >###TEXT###</td><td class="hide" valign="top" style="padding: 0 0 10px 10px">###IMAGES###</td></tr></table>
        17.value.insertData = 1
        17.override >
        # intext-left
        18.value = <table border="0" cellpadding="0" cellspacing="0"><tr><td class="hide" valign="top" style="padding: 0 0 10px 0" >###IMAGES###</td><td valign="top" style="padding: 0 0 10px 10px">###TEXT###</td></tr></table>
        18.value.insertData = 1
        18.override >
        # intext-right-nowrap
        25.value < .17.value
        # intext-left-nowrap
        26.value < .18.value
    }
}

# RTE parser modification
lib.parseFunc_RTE.nonTypoTagStdWrap.encapsLines {
    addAttributes.P.class =
    addAttributes.P.class.setOnly =
    addAttributes.P.style = margin-top:0; margin-bottom:12px;
}


# --- plugin configuration --------------------------------------
#
plugin.tx_directmail_pi1 {

    siteUrl = {$plugin.tx_directmail_pi1.siteUrl}
    flowedFormat = {$plugin.tx_directmail_pi1.flowedFormat}

    # plain text template
    10.template.file = fileadmin/bsdist/theme/tmpl/direct_mail/direct_mail_plaintext.html

    header.defaultType = 1
    header.date = D-m-Y
    header.datePrefix = HEADER_DATE_PREFIX### |
    header.linkPrefix = | ###HEADER_LINK_PREFIX### |

    header.1.preLineLen = 76
    header.1.postLineLen = 76
    header.1.preBlanks=1
    #header.1.stdWrap.case = upper
    header.1.stdWrap.case >

    header.2 < .header.1
    header.2.preLineChar=*
    header.2.postLineChar=*

    header.3.preBlanks=2
    header.3.postBlanks=1
    #header.3.stdWrap.case = upper
    header.3.stdWrap.case >

    header.4 < .header.1
    header.4.preLineChar= =
    header.4.postLineChar= =
    header.4.preLineBlanks= 1
    header.4.postLineBlanks= 1

    header.5.removeSplitChar = {$plugin.tx_directmail_pi1.removeSplitChar}
    header.5.preBlanks=1
    header.5.autonumber=1
    header.5.prefix = |: >> |

    defaultOutput (
     |
     [###UNRENDERED_CONTENT### ###CType### ]
     |
    )
    #defaultOutput >

    uploads.header = |###UPLOADS_HEADER###|

    images.header = |###IMAGES_HEADER###|
    images.linkPrefix = | ###IMAGE_LINK_PREFIX### |
    images.captionHeader = |###CAPTION_HEADER###|

    bulletlist.0.bullet = |* |
    bulletlist.1.bullet = |# |
    bulletlist.2.bullet = | - |
    bulletlist.3.bullet = |> |
    bulletlist.3.secondRow = |. |
    bulletlist.3.blanks = 1

    menu =< tt_content.menu.20
    shortcut =< tt_content.shortcut.20
    shortcut.0.conf.tt_content =< plugin.tx_directmail_pi1
    shortcut.0.tables = tt_content

    bodytext.doubleLF = {$plugin.tx_directmail_pi1.doubleLF}

    bodytext.stdWrap.parseFunc.tags {
        link < lib.parseFunc_RTE.tags.link

        typolist = USER
        typolist.userFunc = tx_directmail_pi1->typolist
        typolist.siteUrl = {$plugin.tx_directmail_pi1.siteUrl}
        typolist.bulletlist =< plugin.tx_directmail_pi1.bulletlist

        typohead = USER
        typohead.userFunc = tx_directmail_pi1->typohead
        typohead.siteUrl = {$plugin.tx_directmail_pi1.siteUrl}
        typohead.header =< plugin.tx_directmail_pi1.header

        typocode = USER
        typocode.userFunc = tx_directmail_pi1->typocode
        typocode.siteUrl = {$plugin.tx_directmail_pi1.siteUrl}
    }
}


# --- Special config for extensions --------------------------------
#
# plaintext view for tt_news
#
[globalVar = GP:type = 99]
  # plaintext template
  tx_directmail_pi1.10.template.file = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/direct_mail/direct_mail_plaintext.html
[end]




# --- gridelements configuration --------------------------------------
#
tt_content.gridelements_pi1.20.10.setup {

    # Newsletter Intro Grid
    11 < lib.gridelements.defaultGridSetup
    11 {
        wrap (
        <table style="margin-bottom:0.5em;" width="560" cellpadding="0" cellspacing="0" border="0" align="center" class="innertable"><tr><td>
            <table bgcolor="#ffffff" width="100%" cellpadding="10" cellspacing="0" border="0"><tr><td>
                <h1 style="color:#032e63; margin-bottom:.5em;font-size:26px; line-height:1.11538461538462; font-weight:normal; margin-top:0;">{field:flexform_title}</h1>
                |
            </td></tr></table>
        </td></tr></table>
        )
        wrap.insertData = 1

        columns {
            101 < .default
            101.wrap = |
        }
    }

    # Newsletter Main Article Grid
    12 < lib.gridelements.defaultGridSetup
    12 {
        wrap.stdWrap.cObject = COA
        wrap.stdWrap.cObject.wrap = <table width="560" cellpadding="0" cellspacing="0" border="0" align="center" class="innertable"><tr valign="top">|</tr></table>
        wrap.stdWrap.cObject {
            10 = TEXT
            10.value (
            <td>
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr valign="top">
                    <td style="padding-left: 10px; padding-right: 10px">
                    |
                    </td>
                </tr>
            )

            20 = TEXT
            20.insertData = 1
            20.value (
                <tr>
                    <td style="padding-left: 10px; padding-right: 10px">
                        <p style="margin-bottom:12px;">{field:flexform_greetings}</p>
                        <table cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px">
                        <tr valign="top">
                            <td style="padding-right:40px; font-weight:bold; white-space: nowrap;">{field:flexform_name1}</td>
                            <td style="font-weight:bold; white-space: nowrap;">{field:flexform_name2}</td>
                        </tr>
                        <tr valign="top">
                            <td style="padding-right: 10px;">{field:flexform_jobtitle1}<br/></td>
                            <td>{field:flexform_jobtitle2}<br/></td>
                        </tr>
                        </table>
                    </td>
                </tr>
                </table>
            </td>
            )

            30 = IMAGE
            30.file.import.dataWrap = uploads/pics/{field:flexform_image}
            30.file.maxW = 200
            30.stdWrap.wrap = <td class="hide">|</td>
        }

        columns {
            101 < .default
            101.wrap = |
        }
    }

}


# --- language folders --------------------------------
#
/*
[PIDinRootline = 73]
  # add Language param to metanavbottom
  lib.metanavbottom.1.addParams=&L=1

  lib.parseFunc_RTE.tags.link.typolink.additionalParams=&L=1
  lib.parseFunc.tags.link.typolink.additionalParams=&L=1

  #plugin.tx_directmail_pi1.bodytext.stdWrap.parseFunc.tags.link.typolink.additionalParams=&L=1

  #tt_content.text.20.parseFunc.tags.link.typolink.additionalParams=&L=1
[global]
*/


# --- tx_news --------------------------------
#
# Insert Records for news
/*
# from http://forge.typo3.org/issues/51023
tt_content.shortcut.20.0.tables := addToList(tx_news_domain_model_news)
tt_content.shortcut.20.0.conf.tx_news_domain_model_news = USER
tt_content.shortcut.20.0.conf.tx_news_domain_model_news {
  userFunc = tx_extbase_core_bootstrap->run
  #vendorName =
  extensionName = News
  pluginName = Pi1
  switchableControllerActions {
    News {
      1 = detail
    }
  }

  view < plugin.tx_news.view

  persistence < plugin.tx_news.persistence
  persistence {
    storagePid = 15
  }

  settings < plugin.tx_news.settings
  settings {
    singleNews.field = uid
    useStdWrap = singleNews

    # added by pma
    #detailPid = 14
    overrideFlexformSettingsIfEmpty := addToList(detailPid)

    templateLayout = Newsletter
    overrideFlexformSettingsIfEmpty := addToList(templateLayout)
  }
}

# Increase crop
plugin.tx_news {
    settings {
        cropMaxCharacters = 200
    }
}
*/