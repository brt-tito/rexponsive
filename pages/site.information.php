<?php


?>



<div class="rex-addon-output">
  <h2 class="rex-hl2">REXponsive - Infos</h2>
  <div class="rex-addon-content">
    <div class= "addon-template">
	   <h3>REXponsive - infos zum AddOn:</h3>
	   <p>Das AddOn "REXponsive" dient lediglich als Basis für die PlugIns und zum testen für Euch,<br/>wie sich das Öffen/Schließen der HTML-Tags in den Blöcken (Slices) via Modul realisieren lässt.</p>
	   <p><hr/></p>

      <h3>Benötigte AddOns & Credits</h3>
      <ul>
	      <li><p>MForm - MForm Version 2.2.1 - Redaxo4.5.x (Danke an Joachim Dörr)<br/><a href="https://github.com/joachimdoerr/mform">Download</a></li>
	      <li><p>SEO42 (Danke an RexDude)<br/><a href="index.php?page=install&subpage=add&addonkey=seo42">Download via Redaxo Installer</a></p></li>
	      <li><p>Backend Utilities (Danke an RexDude)<br/><a href="index.php?page=install&subpage=add&addonkey=be_utilities">Download via Redaxo Installer</a></p></li>
      </ul>
    </div>
  </div>
</div>

<div class="rex-addon-output">
  <h2 class="rex-hl2">REXponsive Test - Modul Eingabe</h2>

  <div class="rex-addon-content">
    <div><?php echo rex_highlight_string($strModulInputDemo); ?></div>
  </div>

  <h2 class="rex-hl2">REXponsive Test - Modul Ausgabe</h2>
   <div class="rex-addon-content">
    <div><?php echo rex_highlight_string($strModulOutputDemo); ?></div>
  </div>
</div>
