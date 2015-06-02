<?php

require_once(PATH_tslib."class.tslib_pibase.php");

class tx_calendar_inject_tt_news extends tslib_pibase {
	function getObjectsInRange($content, $conf) {


		$from = mktime(0,0,0, $content['fromMonth'], $content['fromDay'], $content['fromYear']);
		$to =   mktime(0,0,0, $content['toMonth'], $content['toDay'], $content['toYear']);

		$selectConf = array();
		$selectConf['pidInList'] = $conf['pidInList'];
		$selectConf['orderBy'] = 'datetime';
		$selectConf['where'] = " datetime > $from AND datetime < $to ";

                $query = $this->cObj->getQuery('tt_news', $selectConf);
                $res = mysql_query($query);
		$allNews = array();
                while ($row = mysql_fetch_assoc($res)) {
			$row['calendar_object_type'] = 'tt_news';
			$day = date('d', $row['datetime']);
			$month = date('m', $row['datetime']);
			$year = date('Y', $row['datetime']);
			if (!is_array($allNews[$year][$month][$day]))
				$allNews[$year][$month][$day] = array();
			$allNews[$year][$month][$day][] = $row;
		}

		return $allNews;
		
	}
}


?>
