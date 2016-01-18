<?php
$strTemplateDemoCode = '';
$strTemplateDemoCode =
'<!DOCTYPE html>
<html lang="<?php echo seo42::getLangCode(); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <base href="<?php echo seo42::getBaseUrl(); ?>" />
    <title><?php echo seo42::getTitle(); ?></title>
    <meta name="description" content="<?php echo seo42::getDescription(); ?>" />
    <meta name="keywords" content="<?php echo seo42::getKeywords(); ?>" />
    <meta name="robots" content="<?php echo seo42::getRobotRules();?>" />
    <link rel="stylesheet" href="<?php echo seo42::getCSSFile($REX["SERVER"]."files/addons/rexponsive/plugins/bootstrap/css/bootstrap.min.css"); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo seo42::getCSSFile($REX["SERVER"]."files/addons/rexponsive/plugins/bootstrap/css/bootstrap-theme.min.css"); ?>" type="text/css" media="screen" />
    <link rel="canonical" href="<?php echo seo42::getCanonicalUrl(); ?>" />
    <?php echo seo42::getLangTags(); ?>

    <style type="text/css">
	body { padding-top: 100px; }
	</style>

</head>
<body>

<?php
	$rp = new rex_bootstrap();
	$rp->getREXponsiveBoostrapNavbar("Projekt Name", array("navbar","navbar-inverse","navbar-fixed-top"));
?>

REX_ARTICLE[]
<footer></footer>

<script type="text/javascript" src="<?php echo seo42::getJSFile("jquery-1.11.3.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo seo42::getJSFile($REX["SERVER"]."files/addons/rexponsive/plugins/bootstrap/js/bootstrap.min.js"); ?>"></script>
</body>
</html>';

$strTemplateDemoScripts = '';
$strTemplateDemoScripts =
'<!-- Im Header -->
<link rel="stylesheet" href="<?php echo seo42::getCSSFile($REX[\'SERVER\']."files/addons/rexponsive/plugins/bootstrap/css/bootstrap.min.css"); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo seo42::getCSSFile($REX[\'SERVER\']."files/addons/rexponsive/plugins/bootstrap/css/bootstrap-theme.min.css"); ?>" type="text/css" media="screen" />

<!-- wenn mgl im Footer vor dem </body> -->
<script type="text/javascript" src="<?php echo seo42::getJSFile($REX[\'SERVER\']."files/addons/rexponsive/plugins/bootstrap/js/bootstrap.min.js"); ?>"></script>
';


$strTemplateJSCode = '';
$strTemplateJSCode =
'<script type="text/javascript" src="<?php echo seo42::getJSFile("jquery-1.11.3.min.js"); ?>"></script>';

$strTemplateNavbarCode = '';
$strTemplateNavbarCode =
'<?php
	$rp = new rex_bootstrap();
	$rp->getREXponsiveBoostrapNavbar("Projekt Name", array("navbar","navbar-inverse","navbar-fixed-top"));
?>';

?>




<div class="rex-addon-output">
  <h2 class="rex-hl2">REXponsive::Bootstrap Demo Template</h2>
  <div class="rex-addon-content">
    <div class= "addon-template">
	   <h3>jQuery einfügen</h3>
	   <p>Die aktuelle jQuery Version solltet Ihr bereits im CMS hinterlegt und in einem Template definiert haben.</p>
	   <p><?php echo rex_highlight_string($strTemplateJSCode); ?></p>

	   <h3>Die relevanten Scripte:</h3>
	   <p><?php echo rex_highlight_string($strTemplateDemoScripts); ?></p>

	   <h3>INFO:</h3>
	   <p>Alle notwendigen Dateien für das Bootstrap - Framework werden bei der Installation vom Addon/Plugin/Files - Verzeichnis<br/>
		   das ./files/addons/rexponsive/plugins/-Verzeichnis im Frontend kopiert und müssen somit im Template anschließend hinzugefügt werden.</p>


	   <h3>Demo Template für das REXponsive - Bootstrap PlugIn</h3>
	   <p><?php echo rex_highlight_string($strTemplateDemoCode); ?></p>

	</div>
  </div>
</div>

<div class="rex-addon-output">
	<h2 class="rex-hl2">REXponsive::Bootstrap - Navbar</h2>

  <div class="rex-addon-content">
	  <p>Hier wird die Standard Botstrap Navbar erzeugt und ausgegeben.</p>
	  <p><b>$rp->getREXponsiveBoostrapNavbar(1,2)</b><br/>
		  1: String (Text) oder File (Image)<br/>
		  2: CSS Classes</p>
    <div><?php echo rex_highlight_string($strTemplateNavbarCode); ?></div>
  </div>



  <h2 class="rex-hl2">REXponsive::Bootstrap - Modul Eingabe</h2>

  <div class="rex-addon-content">
    <div><?php echo rex_highlight_string($strModulInputDemo); ?></div>
  </div>

  <h2 class="rex-hl2">REXponsive::Bootstrap - Modul Ausgabe</h2>
   <div class="rex-addon-content">
	   <div class= "addon-template">

		   <div><?php echo rex_highlight_string($strModulOutputDemo); ?></div>

		   <h3>setRexBootstrapSection(1,2,3)</h3>
		   <p>1: erzeuge ein section - Tag: <b>true/false</b><br/>
			  2: section-ID: string<br/>
			  3: CSS Classes als Array: <b>$class = array("section", "my-section-class", "foo-class")</b>
		   </p>

		   <h3>setRexBootstrapContainer(1,2,3)</h3>
		   <p>1: erzeuge ein Container - Tag: <b>true/false</b><br/>
			  2: container-ID: string<br/>
			  3: CSS Classes als Array: <b>$class = array("container", "my-container-class", "foo-class")</b>
		   </p>

		   <h3>setRexBootstrapRow(1,2,3)</h3>
		   <p>1: erzeuge ein Row - Tag: <b>true/false</b><br/>
			  2: row-ID: string<br/>
			  3: CSS Classes als Array: <b>$class = array("row", "my-row-class", "foo-class")</b>
		   </p>

		</div>
  </div>
</div>
