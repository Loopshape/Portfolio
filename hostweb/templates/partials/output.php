<?php

class Template extends Render {

	function show() {

		if ($this -> setCurrentView) {

			switch($this -> setCurrentView) {

				case 'paypal_api_payment' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content" style="width:100%;"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/tutorials/paypal_api_payment.php";
					// html
					echo '</div></section>';
					//echo '</div></section><aside id="sidebar"><div class="inner">';
					// side content
					//include "./hostweb/templates/content/contact.php";
					// html
					//echo '</div></aside><div class="cf"></div></div>';
					include "./hostweb/templates/content/markup/back2home.php";
					break;

				case 'requirejs_usage' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content" style="width:100%;"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/tutorials/requirejs_usage.php";
					// html
					echo '</div></section>';
					//echo '</div></section><aside id="sidebar"><div class="inner">';
					// side content
					//include "./hostweb/templates/content/contact.php";
					// html
					//echo '</div></aside><div class="cf"></div></div>';
					include "./hostweb/templates/content/markup/back2home.php";
					break;

				case 'programming' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/programming.php";
					// html
					echo '</div></section><aside id="sidebar"><div class="inner">';
					// side content
					include "./hostweb/templates/content/contact.php";
					// html
					echo '</div></aside><div class="cf"></div></div>';
					echo '<style rel="stylesheet">
						img.portrait {
							display:block!important;
						}
					</style>';
					break;

				case 'templating' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content" style="width:100%;"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/templating.php";
					// html
					echo '</div></section><div class="cf"></div></div>';
					break;

				case 'picture_edit' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/picture_edit.php";
					// html
					echo '</div></section>';
					// html
					echo '<aside id="sidebar"><div class="inner">';
					// side content
					include "./hostweb/templates/content/markup/pinterest_embed.php";
					// html
					echo '</div></aside><div class="cf"></div></div>';
					break;

				case 'conception' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/conception.php";
					// html
					echo '</div></section><div class="cf"></div></div>';
					break;

				case 'frameworks' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/frameworks.php";
					// html
					echo '</div></section><div class="cf"></div></div>';
					break;

				case 'opensource' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content" style="width:100%;"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service/opensource.php";
					// html
					echo '</div></section><div class="cf"></div></div>';
					break;

				case 'impressum' :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="content"><div class="inner">';
					// main content
					include "./hostweb/templates/content/maintainer.php";
					// html
					echo '</div></section><aside id="sidebar"><div class="inner">';
					// side content
					include "./hostweb/templates/content/copyrights.php";
					// html
					echo '</div></aside><div class="cf"></div></div>';
					break;

				default :
					// html
					echo '<div id="contentWrapper">';
					include "./hostweb/templates/content/markup/layout/mathgrid.php";
					echo '<section id="teaser"><div class="inner">';
					// teaser content
					include "./hostweb/templates/content/teaser/welcome.php";
					// html
					echo '</div></section>';
					echo '<section id="content"><div class="inner">';
					// main content
					include "./hostweb/templates/content/service.php";
					// html
					echo '</div></section>';
					echo '<aside id="sidebar"><div class="inner">';
					// side content
					include "./hostweb/templates/content/service/tutorials/tutorial_corner.php";
					include "./hostweb/templates/content/contact.php";
					// html
					echo '</div></aside>';
					echo '</div>';
					// socialmedias
					include "./hostweb/templates/content/markup/socialmedias.php";
					break;
			}

		}

	}

}

$output = new Template;
$output -> show();
