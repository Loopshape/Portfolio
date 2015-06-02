<?php

class ux_tx_indexedsearch extends tx_indexedsearch {
	function makeSearchForm($optValues) {
		// Leerer Rumpf -> Hier wird erstmal nix gemacht..
		// Todo: Konfiguration die das Formular bei einer Suche Suche ausschaltet

		if( ! $this->conf['customTemplate'] ) {
			return;
		} 
//debug($this);
		$conf = $this->conf['customTemplate.']['searchForm.'];
		
		$is = t3lib_div::_gp('tx_indexedsearch');
//debug($is);
		
		if( $conf['allwaysOn'] || ! $is || $is['sword'] == '' ) {
			$content = $this->cObj->cObjGetSingle( $conf['form'], $conf['form.'], 'indexsearch form' );
		} elseif( $conf['hiddenform'] ) {
			$content = $this->cObj->cObjGetSingle( $conf['hiddenform'], $conf['hiddenform.'], 'hidden indexsearch form' );
		}
		return $content;
	}
	
    function printRules()   {
		// s.o.
        //return $out;
    }
}

?>