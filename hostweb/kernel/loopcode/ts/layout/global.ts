# enable cache

config.no_cache = 0
config.cache = 1

# include external template configs

<INCLUDE_TYPOSCRIPT: source="FILE:../tmpls/plugin.tx_indexedsearch.view.templateRootPath.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:./lib.ts">

# setup lesswithphp

#$plugin.tx_less_pi1.enable = 1
#$plugin.tx_less_pi1.debug = 1

#plugin.tx_less_pi1 {
#    # define single less-files and css destination file
#    lessFiles {
#        1 {
#            less = fileadmin/themes/loopshape/assets/styles/index.less
#        }
#    }
#
#    # point to the directory of less-Files
#    #lessDir = fileadmin/themes/loopshape/assets/styles/cmsless/
#
#   # Search recursive for less-Files in "lessDir"
#    recursivityLevel = 99
#
#    # Show debug informations
#    debug = {$plugin.tx_less_pi1.debug}
#
#    # enable less compiler
#    # if website is in production set this to 0,
#    # otherwise less compile the css on every pageload
#    enable = {$plugin.tx_less_pi1.enable}
#}

# define layout

page.10 = COA
page.10 {

    10 = COA
    10 {

        10 = TEXT
        10.value = <!--TYPO3SEARCH_begin-->

        20 = COA
        20 < lib.htmlContent

        30 = TEXT
        30.value = <!--TYPO3SEARCH_end-->

    }

}

# less output

#[globalString = IENV:HTTP_HOST={$HOST_DEV}]
#   page.9366 < plugin.tx_less_pi1
#[global]