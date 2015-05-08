<?php

// get environment variables
// config ? development : production
require_once "./hostweb/config/development.php";
//require_once "/config/production.php";

// main routine
class Render extends Main {
	
	function __construct() {
		
		global $config, $setCurrentView;
		
		$settings = new Config;
		$this -> config = $settings -> setParams();
		
		// get dynamic website parameters
		if(isset($_GET['page'])) {
			$this -> setCurrentView = $_GET['page'];
		} else {
			$this -> setCurrentView = 'start';			
		}
		
		$this -> getBaseUrl();
	}
	
	// global ROOT directory	
	function getBaseUrl() {
		$this -> setBaseUrl = $this -> config['page']['baseurl'];
		return;
	}
	
	function buildPage() {
		// render static html
		$this -> context();
	}
	
	function context() {
		
		include "site/meta.php";
		include "site/body.php";
		
	}
	
}

// render page
$data = new Render;
echo $data -> buildPage();

