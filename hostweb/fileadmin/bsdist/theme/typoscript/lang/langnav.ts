/* ---------------------------------------------------------------
 * Language switch menu
 */
lib.langnav = COA
lib.langnav.wrap = <div class="langnav">|</div>
lib.langnav {
    20 = HMENU
    20 {
        special = language
        special.value = 0,1
        special.normalWhenNoLanguage = 0
        wrap = |

        1 = TMENU
        1 {
            wrap = |
            NO = 1
            NO.linkWrap = <span>|</span>
            # Manual link creation
            NO.doNotLinkIt = 1
            NO.stdWrap.override = EN || DE
            NO.stdWrap.typolink {
                parameter.data = page:uid
                additionalParams = &L=0 || &L=1
                addQueryString = 1
                addQueryString.exclude = L,id,cHash,no_cache
                addQueryString.method = GET
                useCacheHash = 1
                no_cache = 0
            }

            ACT < .NO
            ACT.linkWrap = <span class="active">|</span>

            # NO + Translation not available
            USERDEF1 < .NO
            # ACT + Translation not available
            USERDEF2 < .NO
        }
    }
}