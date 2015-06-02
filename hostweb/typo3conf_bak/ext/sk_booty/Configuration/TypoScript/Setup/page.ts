config.simulateStaticDocuments = 0
config.tx_realurl_enable = 1
config.baseURL = {$sk_booty.baseRefURL}
page = PAGE

page.meta.viewport = {$sk_booty.viewportContent}

config
{
    linkVars = L(0-2)
    uniqueLinkVars = 1
    defaultGetVars.L = 0
    language = de
    locale_all = de_DE
    htmlTag_langKey = de
    sys_language_uid = 0
}

obj.logo = IMAGE
obj.logo {
    file = {$sk_booty.logoPath}
}

obj.googleTrackingID = TEXT
obj.googleTrackingID.value = {$sk_booty.googleTrackingID}


obj.googleTrackingCode = TEXT
obj.googleTrackingCode.value  ( 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '{$sk_booty.googleTrackingID}', 'auto');
  ga('send', 'pageview');

</script>
)


obj.languagemenu = HMENU
obj.languagemenu {
    wrap = <li role="presentation">|</li>
    special = language
    special.value = 0,1,2
    1 = TMENU
    1 {
        NO {
            stdWrap.override = Deutsch || Français || Italiano
        }
    }
}

[globalVar = GP:L = 1]

    config {
        sys_language_uid = 1
        language = fr
        local_all = fr_CH
        htmlTag_langKey = fr
    }

[global]

[globalVar = GP:L = 2]

    config {
        sys_language_uid = 2
        language = it
        local_all = it_CH
        htmlTag_langKey = it
    }

[global]

page {
	config {
		metaCharset = utf-8
		additionalHeaders = Content-Type:text/html;charset=utf-8
	}
	
	includeCSS.bootstrap = EXT:sk_booty/Resources/Public/Bootstrap/css/bootstrap.min.css
    includeCSS.datepicker = EXT:sk_booty/Resources/Public/Css/datepicker3.css
    includeCSS.theme = {$sk_booty.themeCssPath}
    includeCSS.awesomeFont = {$sk_booty.awesomeFontCssURL}

    includeJS.bootstrap = EXT:sk_booty/Resources/Public/Bootstrap/js/bootstrap.min.js
    includeJS.webFont = {$sk_booty.webFontJavaScriptURL}
    includeJS.theme = {$sk_booty.themeJavaScriptPath}
    includeJS.datepicker = EXT:sk_booty/Resources/Public/JavaScript/bootstrap.datepicker.js

	
	10 = FLUIDTEMPLATE
	10 {
		file = {$sk_booty.templatePath}
		layoutRootPath =  {$sk_booty.layoutPath}
		partiaRootPath = {$sk_booty.partialsPath}

		variables {
			LLLSKbooty = TEXT
            LLLSKbooty.value = LLL:EXT:sk_booty/Resources/Private/Language/locallang.xlf
			content < styles.content.get
		}
	}
}
