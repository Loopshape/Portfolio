<?php

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['linkData-PostProc']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->encodeSpURL';
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['checkAlternativeIdMethods-PostProc']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->decodeSpURL';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearPageCacheEval']['tx_realurl'] = 'EXT:realurl/class.tx_realurl.php:&tx_realurl->clearPageCacheMgm';

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_urldecodecache'] = 'tx_realurl_urldecodecache';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']['tx_realurl_urlencodecache'] = 'tx_realurl_urlencodecache';

$TYPO3_CONF_VARS['FE']['addRootLineFields'].= ',tx_realurl_pathsegment';

$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
    'init' => array(
        'enableCHashCache' => 1,
        'enableUrlDecodeCache' => 1,
        'enableUrlEncodeHash' => 1,
        // 'postVarSet_failureMode' => 'redirect_goodUpperDir',
    ),
    'rewrite' => array(
    ),
    'preVars' => array(
        array(
            'GETvar' => 'print',
            'valueMap' => array(
                'print' => 1,
            ),
            'noMatch' => 'bypass',
        ),
        array(
            'GETvar' => 'L',
            'valueMap' => array(
                'de' => '0',
                'en' => '1',
            ),
            'valueDefault' => 'de',
            'noMatch' => 'bypass',
        ),
        array(
            'GETvar' => 'no_cache',
            'valueMap' => array(
                'nc' => 1
            ),
            'noMatch' => 'bypass',
        ),
    ),
    'pagePath' => array(
        'type' => 'user',
        'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
        'spaceCharacter' => '-',
        'languageGetVar' => 'L',
        'expireDays' => 3
    ),
    'fileName' => array (
        'defaultToHTMLsuffixOnPrev' => 0,
        'index' => array(
            'page.html' => array(
                'keyValues' => array (
                    'type' => 1,
                ),
            ),
        ),
    ),
    'fixedPostVarSets' => array(
    ),
    'postVarSets' => array(
        '_DEFAULT' => array(
            /* tt_news */
            'period' => array (
                array (
                    'condPrevValue' => -1,
                    'GETvar' => 'tx_ttnews[pS]',
                ),
                array (
                    'GETvar' => 'tx_ttnews[pL]',
                ),

                array (
                    'GETvar' => 'tx_ttnews[arc]',
                    'valueMap' => array(
                        'non-archived' => -1,
                    ),
                ),
            ),
            'browse' => array (
                array (
                    'GETvar' => 'tx_ttnews[pointer]',
                ),
            ),
            'kategorie' => array (
                array (
                    'GETvar' => 'tx_ttnews[cat]',
                    'lookUpTable' => array (
                        'table' => 'tt_news_cat',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'addWhereClause'=> 'AND NOT deleted',
                        'useUniqueCache'=> 1,
                        'useUniqueCache_conf' => array (
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        ),
                    ),
                ),
            ),
            'artikel' => array(
                array (
                    'GETvar' => 'tx_ttnews[backPid]',
                ),
                array (
                    'GETvar' => 'tx_ttnews[tt_news]',
                    'lookUpTable' => array (
                        'table' => 'tt_news',
                        'id_field' => 'uid',
                        'alias_field' => 'title',
                        'maxLength' => 12,
                        'addWhereClause'=> 'AND NOT deleted',
                        'useUniqueCache'=> 1,
                        'useUniqueCache_conf' => array (
                            'strtolower' => 1,
                            'spaceCharacter' => '-',
                        ),
                    ),
                ),
            ),
        ),
    ),
);