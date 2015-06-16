# Default PAGE object:
page = PAGE

# declare environment

config.baseURL = http://loop.arcturus.uberspace.de/hostweb/

#deactivate simulateStaticDocuments
config.simulateStaticDocuments = 0

#prefix local anchors with baseurl
config.prefixLocalAnchors = all

#enable realurl
config.tx_realurl_enable = 1

# define HTML header

page {

#   includeCSS {
#       file1 = fileadmin/themes/loopshape/assets/styles/style.css
#       file2 = fileadmin/themes/loopshape/assets/styles/index.css
#   }

    headerData {
        10 = TEXT
        10.value (
<link href='//fonts.googleapis.com/css?family=Lora|Oswald:700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!--[if gte IE 9]>
<style type="text/css">
.gradient {
filter: none;
}
</style>
<![endif]-->
        )
    }

    footerData {
        10 = TEXT
        10.value (
<script src="/hostweb/assets/js/app/bower_components/jquery2/jquery.min.js"></script>
<script src="/hostweb/assets/js/app/bower_components/masonry/dist/masonry.pkgd.min.js"></script>
<script src="/hostweb/assets/js/app/cms.js"></script>
        )
    }
}

# define HTML body

page.bodyTag = <body id="indexcms">

# search conditions

config.index_enable = 1
config.index_externals = 1
config.index_metatags = 0
config.sys_language_uid = 0
config.language = de

# include external setup
<INCLUDE_TYPOSCRIPT: source="FILE:./layout/global.ts">