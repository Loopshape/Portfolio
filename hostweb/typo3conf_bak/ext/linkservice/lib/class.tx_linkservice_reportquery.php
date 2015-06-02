<?php

class tx_linkservice_reportquery {
    static public function getPageLog($pid) {
        return self::_getLog("SELECT log.*, pages.title
                              FROM tx_linkservice_log AS log
                              LEFT JOIN pages ON log.pid = pages.uid
                              WHERE log.pid = ".intval($pid)."
                              ORDER BY pid, table_name, field_name, record_uid");
    }

    static public function getSubtreeLog($pid) {
        return self::_getLog("SELECT log.*, pages.title
                              FROM tx_linkservice_log AS log 
                              LEFT JOIN pages ON log.pid = pages.uid 
                              WHERE log.pid IN (".self::getTree($pid).")
                              ORDER BY pid, table_name, field_name, record_uid");
    }

    /**
     * Get the pagetree from current page and down.
     *
     * @param int $uid - The uid of current page.
     * @return string - uids of pages in comma separated list.
     */
    static protected function getTree($uid) {
        $pT = t3lib_div::makeInstance('t3lib_pageTree');
        $pT->init();
        $pT->getTree($uid, 99, '');
        $ids = $pT->ids;
        return implode(',',$ids);
    }

    static protected function _getLog($sql) {
        global $TYPO3_DB, $LANG;

        $LANG->includeLLFile('EXT:linkservice/lib/locallang_report.xlf');

        $rs = $TYPO3_DB->sql_query($sql);
        $logs = array();

        while ($r = $TYPO3_DB->sql_fetch_assoc($rs)) {
            if ($r['http_status'] >= 400 && $r['http_status'] <= 499) {
                $message = $LANG->getLL('msg_http_unavailable');
                $type_color = '#eee';
            }
            else if ($r['http_status'] >= 500) {
                $message = $LANG->getLL('msg_http_error');
                $type_color = '#ff0909';
            }
            else if ($r['http_status'] == 301) {
                $message = $LANG->getLL('msg_http_permanently_moved');
                $type_color = '#a2ff8c';
            }
            else if ($r['http_status'] == 302 || $r['http_status'] == 303 || $r['http_status'] == 307) {
                $message = $LANG->getLL('msg_http_temporarily_moved');
                $type_color = '#fffe91';
            }
            else {
                $message = $LANG->getLL('msg_http_other');
                $type_color = '';
            }

            $message = str_replace('###HTTP_STATUS###', $r['http_status'], $message);
            $message = str_replace('###EXCEPTION###', $r['exception_message'], $message);
            $message = str_replace('###LOCATION###', $r['location'], $message);

            $logs[$r['pid']] ['title'] = $r['title'];
            $logs[$r['pid']] ['tables'] [$r['table_name']] [$r['record_uid']] [$r['field_name']] [] = array(
                'link' => $r['link'],
                'checktime' => strftime("%Y-%m-%d&nbsp;%H:%M", $r['checktime']),
                'message' => $message,
                'type_color' => $type_color,
            );
        }

        return $logs;
    }
}