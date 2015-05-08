<?php

class Config extends Main {
	
	function setParams() {
		
		// working directory
		$config['page']['baseurl'] = '';
		
		// meta data
		$config['page']['title'] = 'Web Development • Arjuna Noorsanto • Mediengestalter Digital in Hamburg/Germany';
		//$config['page']['slogan'] = 'Die Website für Ihren Erfolg liegt mir am Herzen';
		$config['page']['slogan'] = 'LOOPSHAPE • Das Webentwicklungs-Themenportal';
		
		// page titles
		$config['page']['headerMessage']['start'] = 'POWERFUL<br />HTML&nbsp;+&nbsp;CSS&nbsp;+&nbsp;JS<br />FROM&nbsp;THE&nbsp;MIND<br /><i class="fa fa-cogs"></i>';
		$config['page']['headerMessage']['impressum'] = 'IMPRESSUM';
		
		// page titles::services
		$config['page']['headerMessage']['programming'] = 'FOR&nbsp;THE&nbsp;LOVE<br />OF&nbsp;GOOD&nbsp;CODE<br /><i class="fa fa-heart"></i>';
		$config['page']['headerMessage']['templating'] = 'FROM THE IDEA<br />TO THE VIEW';
		$config['page']['headerMessage']['picture_edit'] = 'VISUAL EDITING<br />FOR SUCCESS';
		$config['page']['headerMessage']['conception'] = 'CREATE<br />A WORKFLOW<br />FOR THE WEB';
		$config['page']['headerMessage']['frameworks'] = 'USE THE<br />WISDOM<br />OF OTHERS';
		$config['page']['headerMessage']['opensource'] = 'WORK WITH<br />THE BEST<br />APPLICATIONS';
		
		// tutorial::titles
		$config['page']['headerMessage']['paypal_api_payment'] = 'PAYPAL-API<br />PAYMENT';
		$config['page']['headerMessage']['requirejs_usage'] = 'REQUIRE.JS<br />SCRIPT USAGE';
		
		return $config;
	}
	
}

