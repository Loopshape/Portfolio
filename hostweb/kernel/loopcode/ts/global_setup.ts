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

page.headerData = COA
page.headerData.8 = TEXT
page.headerData.8.value {
<base href="http://loop.arcturus.uberspace.de/hostweb/"></base>
}

page.includeCSS {
  file1 = http://loop.arcturus.uberspace.de/hostweb/fileadmin/themes/loopshape/assets/styles/style.css
  file2 = http://loop.arcturus.uberspace.de/hostweb/fileadmin/themes/loopshape/assets/styles/index.css
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