/* ---------------------------------------------------------------
 * Navbar dropdown
 */

# mobile nav button
lib.mobileNavBtn = TEXT
lib.mobileNavBtn {
    wrap = <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainnavbar">|</button></div>
    # glyphicon from bootstrap
    value = <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
    # fontawesome
    #value = <span class="fa fa-bars"></span>
}

# navbar
lib.navbar = COA
lib.navbar.wrap = <nav class="navbar navbar-default" role="navigation">|</nav>
lib.navbar {
    # mobile trigger
    10 < lib.mobileNavBtn

    # navigation
    20 = HMENU
    20.wrap = <div class="collapse navbar-collapse" id="mainnavbar"><ul class="nav navbar-nav">|</ul></div>
    20 {
        entryLevel = 0
        #excludeUidList = 11,12
        1 = TMENU
        1 {
            wrap = |
            expAll = 1

            NO = 1
            NO.allWrap >
            NO.wrapItemAndSub = <li>|</li>
            ACT = 1
            ACT < .NO
            ACT.wrapItemAndSub = <li class="active">|</li>
            CUR = 1
            CUR < .NO
            #CUR.ATagParams =  id="current"
            CUR.wrapItemAndSub = <li class="active current">|</li>

            # Dropdown menu
            IFSUB = 1
            IFSUB < .NO
            IFSUB.wrapItemAndSub = <li class="dropdown">|</li>
            IFSUB.ATagParams = class="dropdown-toggle" role="button" data-toggle="dropdown" data-target="#"
            #IFSUB.ATagParams = class="dropdown-toggle disabled" role="button" data-toggle="dropdown" data-target="#"
            IFSUB.ATagBeforeWrap = 1
            IFSUB.stdWrap.wrap = |<b class="caret"></b>

            ACTIFSUB = 1
            ACTIFSUB < .IFSUB
            ACTIFSUB.wrapItemAndSub = <li class="dropdown active">|</li>

            CURIFSUB = 1
            CURIFSUB < .ACTIFSUB
            CURIFSUB.wrapItemAndSub = <li class="dropdown active current">|</li>
        }


        2 = TMENU
        2 {
            wrap = <ul class="dropdown-menu" role="menu">|</ul>
            expAll = 1

            NO = 1
            NO.allWrap >
            NO.wrapItemAndSub = <li>|</li>
            CUR = 1
            CUR < .NO
            CUR.wrapItemAndSub = <li class="active current">|</li>
            ACT = 1
            ACT < .NO
            ACT.wrapItemAndSub = <li class="active">|</li>

            IFUSB < .1.IFSUB
            CURIFSUB < .1.CURIFSUB
            ACTIFSUB < .1.ACTIFSUB

            SPC = 1
            SPC.doNotLinkIt = 1
            SPC.doNotShowLink = 1
            SPC.allWrap = <li class="divider"></li>
        }

        3 < .2
        # no submenus anymore
        3.IFSUB >
        3.CURIFSUB >
        3.ACTIFSUB >
    }
}


/* ---------------------------------------------------------------
 * Breadcrump
 */
lib.breadcrumb = COA
lib.breadcrumb {
  20 = HMENU
  20 {
    special = rootline
    special.range = 0|-1
    #wrap = <ul class="subnav">|</ul>
    wrap = &gt; |

    1 = TMENU
    1 {
      wrap = |
      expAll = 1

      NO = 1
      NO.linkWrap = &nbsp;| /
      CUR = 1
      CUR < .NO
      CUR.linkWrap = &nbsp;<strong>|</strong>
    }
  }
}


/* ---------------------------------------------------------------
 * Subnav
 */
lib.subnav = COA
lib.subnav {
    wrap = <ul class="nav nav-list" id="sidebar-nav">|</ul>

    10 = TEXT
    10.wrap = <li class="list-group-item">|</li>
    #10.wrap {
    #    override = <li class="list-group-item current">|</li>
    #    override.if {
    #        value.data = field:uid
    #        equals.data = leveluid:1
    #    }
    #}
    10.data = leveltitle:1
    #10.data =  levelfield:1,nav_title // leveltitle:1
    10.typolink.parameter.data = leveluid:1

    20 = HMENU
    20.wrap = |
    20 {
        entryLevel = 1
        1 = TMENU
        1 {
            wrap = |
            expAll = 0

            NO = 1
            NO.allWrap >
            NO.wrapItemAndSub = <li class="list-group-item">|</li>
            CUR = 1
            CUR < .NO
            CUR.wrapItemAndSub = <li class="list-group-item active current">|</li>
            ACT = 1
            ACT < .CUR
            ACT.wrapItemAndSub = <li class="list-group-item active">|</li>

            # Dropdown menu
            IFSUB = 1
            IFSUB < .NO
            IFSUB.wrapItemAndSub = <li class="list-group-item">|</li>
            IFSUB.ATagBeforeWrap = 1
            IFSUB.stdWrap.wrap = |

            CURIFSUB = 1
            CURIFSUB < .IFSUB
            CURIFSUB.wrapItemAndSub = <li class="list-group-item active current">|</li>

            ACTIFSUB = 1
            ACTIFSUB < .IFSUB
            ACTIFSUB.wrapItemAndSub = <li class="list-group-item active">|</li>
        }


        2 = TMENU
        2 {
            wrap = <ul class="list-group">|</ul>
            expAll = 0

            NO = 1
            NO.allWrap >
            NO.wrapItemAndSub = <li class="list-group-item">|</li>
            ACT = 1
            ACT < .NO
            ACT.wrapItemAndSub = <li class="list-group-item active">|</li>
            CUR = 1
            CUR < .ACT
            CUR.wrapItemAndSub = <li class="list-group-item active current">|</li>

            IFUSB < .1.IFSUB
            ACTIFSUB < .1.ACTIFSUB
            CURIFSUB < .1.CURIFSUB

            SPC = 1
            SPC.doNotLinkIt = 1
            SPC.doNotShowLink = 1
            SPC.allWrap = <li class="divider"></li>
        }

        3 < .2
        # no submenus anymore
        3.IFSUB >
        3.ACTIFSUB >
    }
}


/* ---------------------------------------------------------------
 * Meta Nav
 */
lib.metanav = COA
lib.metanav {
    20 = HMENU
    20.special = directory
    20.special.value = {$plugin.tx_bootstrapcore.website.metaNav.pageId}
    20.wrap = |
    20 {
        entryLevel = 0
        #excludeUidList = 33
        1 = TMENU
        1 {
            wrap = |
            expAll = 1
            NO = 1
            NO.allWrap >
            NO.wrapItemAndSub = |&nbsp;-&nbsp; |*| |&nbsp;-&nbsp; |*| |
        }
    }
}
