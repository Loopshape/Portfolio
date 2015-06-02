# --- newsletter layout/style -----------------------
#
# slots definition & customizations
# 
# css styles
lib.pageCss = TEXT
lib.pageCss.wrap = <style type="text/css">|</style>
lib.pageCss.value (
.ExternalClass {width:100%;}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
body { -webkit-text-size-adjust: none; -ms-text-size-adjust:none;}
body {margin:0; padding:0;}
table {border-spacing:0;}
table td {font-size: 13px; line-height:1.5; border-collapse: collapse; mso-line-height-rule: exactly;}
figure { margin: 0px; }s
                       p {margin:0; padding:0; margin-bottom:0;}
h1, h2, h3, h4, h5, h6 {color: #333; line-height:100%;}
h1 {font-size: 22px; color: #666666;}
h2 { font-size: 16px; }
body, #body_style { width: 100% !important; min-height:1000px; color:#333; font-family:Arial,Helvetica,sans-serif; font-size:13px; line-height:1.4;}
a         {color:#0a77b0; text-decoration:none; border-bottom: 1px dotted #0a77b0; }
a:link    {color:#0a77b0; text-decoration:none;}
a:visited {color:#0a77b0; text-decoration:none;}
a:focus   {color:#0a77b0 !important;}
a:hover   {color:#0a77b0 !important;}
h2 a {color:#0a77b0 !important;}
#footer a {color:#fff !important; border-bottom: 0px;  border-bottom: none; }
#footer a:hover {color:#fff !important; text-decoration:underline;}
a[href^="tel"], a[href^="sms"] {text-decoration:none; color:#333333; pointer-events:none; cursor:default;}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:default; color:#cc3333 !important; pointer-events:auto; cursor:default;}

/* Target mobile devices. */
/* @media only screen and (max-device-width: 639px) { */
@media only screen and (max-width: 639px) {
    body[yahoo] .hide {display:none !important;}
    body[yahoo] .table {width:320px !important;}
    body[yahoo] .innertable {width:320px !important;}
    body[yahoo] .heroimage {width:320px !important; height:100px !important;}
    body[yahoo] .footer-left  {width:320px !important;}
    body[yahoo] .footer-right {width:320px !important; clear: left;}
    body[yahoo] .footer-right img {float:left !important; margin:0 1em 0 0 !important;}
}

p { margin-top:0; margin-bottom:0; line-height: 1.5; mso-line-height-rule: exactly;}
img {display:block; border:none; outline:none; text-decoration:none;}
table {border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; mso-line-height-rule: exactly; }
br { line-height: 5px; }
span.subscript { font-size: 75%; }


)


lib.field_link2webview = COA
lib.field_link2webview {
    10 = TEXT
    10.data = LLL:fileadmin/bsdist/theme/tmpl/direct_mail/locallang_newsletter.xml:newsletterLink2WebPart1
    10.noTrimWrap = || |

    20 = TEXT
    20.data = LLL:fileadmin/bsdist/theme/tmpl/direct_mail/locallang_newsletter.xml:newsletterLink2WebPart2
    20.typolink.parameter.data = TSFE:id
    20.typolink.ATagParams = style="text-decoration:none;" target="_blank"
}

# used to hide link2webview
lib.none = TEXT
lib.none.value =

# Header Images
#
# set an image for header right - must be 280px width (height can be variable)
lib.field_headerimg = COA
lib.field_headerimg.wrap = <table bgcolor="#ffffff" width="100%" cellpadding="0" cellspacing="0" border="0"><tr>|</tr></table>
lib.field_headerimg {
    10 = TEXT
    10.wrap = <td width="320" valign="top">|</td>
    10.value = <img src="{$plugin.tx_directmail_pi1.siteUrl}fileadmin/bsdist/theme/tmpl/direct_mail/img/header-p1.jpg" width="320" height="90" border="0" alt="" />

    20 = TEXT
    20.wrap = <td width="280" valign="top" class="hide">|</td>
    20.value = <img src="{$plugin.tx_directmail_pi1.siteUrl}fileadmin/bsdist/theme/tmpl/direct_mail/img/header-p2.jpg" width="280" height="90" border="0" alt="" />
}


# Header images from page
#
lib.field_headerimgCustom = COA
lib.field_headerimgCustom.wrap = <table bgcolor="#ffffff" width="100%" cellpadding="0" cellspacing="0" border="0"><tr>|</td></tr></table>
lib.field_headerimgCustom {
    10 = IMAGE
    10.wrap = <td width="320" valign="top" class="test">|</td>
    10 {
        file {
            import.data = levelmedia:-1
            treatIdAsReference = 1
            import.listNum = 0
            width = 320
        }
    }

    20 < .10
    20.wrap = <td width="280" valign="top" class="hide">|</td>
    20 {
        file {
            import.data = levelmedia:-1
            treatIdAsReference = 1
            import.listNum = 1
            width = 280
        }
    }
}


# Date output
# NICHT HIER - auf der effektiven Seite damit es bleibt solange die Seite vorhanden ist!
#lib.field_date = TEXT
#lib.field_date.value = März 2012


lib.field_footerlinks = COA
lib.field_footerlinks {
    10 = TEXT
    10.value = Website
    10.lang.de = Website
    10.typolink.parameter = 1
    10.typolink.ATagParams = target="_blank"
    10.wrap = |&nbsp;&#124;&nbsp;

    20 = TEXT
    20.value = Contact
    20.lang.de = Kontakt
    20.typolink.parameter = 20
    20.typolink.ATagParams = target="_blank"
    20.wrap = |&nbsp;&#124;&nbsp;
}


# Unsubscribe link
lib.field_unsubscribe >
lib.field_unsubscribe = TEXT
lib.field_unsubscribe {
    value = Abmelden
    #lang.en = Unsubscribe
    typolink.parameter = 32
}



