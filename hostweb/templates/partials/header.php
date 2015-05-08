<?php

class PageHeader extends Render {
	
	function defParams() {
		return array(
		
			$this -> config['page']['slogan'],
			$this -> config['page']['headerMessage'][$this -> setCurrentView]
		
		);
	}
	
}

$headerData = new PageHeader;
$headerParams = $headerData -> defParams();

?>

<header id="header">
	<!-- <img class="spanArea" src="./hostweb/assets/img/hamburg_fernsehturm.jpg" alt="" /> -->

	<div class="blackBoxTrans1"></div>
	<div class="blackBoxTrans2"></div>
	<div class="blackBoxTrans3"></div>
	<div class="blackBoxTrans4"></div>
	<div class="blackBoxTrans5"></div>

	<div class="inner">
		<div class="fmLogo">
			<a class="internal hastip" title="<?php echo $headerParams[0]; ?>" href="./../">
				<!-- <img class="hover" src="./hostweb/assets/img/loopshape_logo_hover.png" alt="" /> -->
				<img class="normal" src="./hostweb/assets/img/loopshape_logo.png" alt="" />
			</a>
			<div id="navBarMain">
				<ul>
					<!--
					<li>
						<a class="itemZoom internal hastip" title="Startseite" href="./../">
							<i class="fa fa-home"></i>
						</a>
					</li>
					-->
					<li>
						<a class="itemZoom internal hastip" title="Websites konzipieren und realisieren" href="./../?page=programming">
							<i class="fa fa-gear"></i>
						</a>
					</li>
					<li>
						<a class="itemZoom internal hastip" title="Ein Frontend-Template als Layoutvorgabe für eine Website definieren" href="./../?page=templating">
							<i class="fa fa-wrench"></i>
						</a>
					</li>
					<li style="float:right;">
						<a class="itemZoom internal hastip" title="Ökonomisch handeln durch Einsatz von 'OpenSource Anwendungen'" href="./../?page=opensource">
							<i class="fa fa-heartbeat"></i>
						</a>
					</li>
					<li>
						<a class="itemZoom internal hastip" title="Eine produktive Idee zu einem erfolgreichen Konzept formen" href="./../?page=conception">
							<i class="fa fa-pencil"></i>
						</a>
					</li>
					<li>
						<a class="itemZoom internal hastip" title="Ein Web-Content-Management-System und/oder ein Framework für einen optimierten Website-Workflow nutzen" href="./../?page=frameworks">
							<i class="fa fa-codepen"></i>
						</a>
					</li>
					<li>
						<a class="itemZoom internal hastip" title="Grafiken f&uuml;r's Seitenlayout bearbeiten" href="./../?page=picture_edit">
							<i class="fa fa-picture-o"></i>
						</a>
					</li>
					<!-- <div class="cf"></div> -->
					<li style="float:right;">
						<a class="itemZoom hastip" href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#97;&#119;&#101;&#98;&#103;&#111;&#46;&#110;&#101;&#116;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;?subject=Kontaktanfrage%20über%20das%20Loopshape-Portal&body=Bitte%20schildern%20Sie%20Ihr%20Anliegen..." title="Webmaster kontaktieren"><i class="fa fa-envelope"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="cf"></div>
		<div class="fmHeader">
			<strong> <h2 class="colorWhite fontThin"><?php echo $headerParams[1]; ?></h2> </strong>
		</div>
	</div>
</header>