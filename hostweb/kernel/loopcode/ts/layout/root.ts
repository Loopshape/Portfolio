# define template parts

temp.htmlHeader = COA
temp.htmlHeader {

    10 = TEXT
    10.value = <header id="header"><h1 class="h2">LOOPSHAPE • Interactive MediaCrawler</h1></header>

}

temp.htmlNavi = HMENU
temp.htmlNavi.menu {
    entryLevel = 0

    1 = TMENU
    1 {
        wrap = <ul class="submenu">|</ul>

        NO = 1
        NO {
            wrapItemAndSub = <li class="subitem">|</li>
        }

        ACT = 1
        ACTIFSUB = 1
        ACT < .NO
        ACT.ATagParams = class=menuitemact
        ACTIFSUB < .NO
        ACTIFSUB.ATagParams = class=menuitemactifsub
    }

    2 < .1
    3 < .2
    4 < .3
}

temp.htmlContent < styles.content.get

temp.htmlSidebar >

temp.htmlFooter = COA
temp.htmlFooter {

    10 = TEXT
    10.value = <footer id="footer"><p>Powered by TYPO3 • Done by Loopshape in 2015</p></footer>

}

lib.widget.indexedSearch = CONTENT
lib.widget.indexedSearch {
  table = tt_content
  select {
    pidInList = 2
    where = uid=1
  }
}