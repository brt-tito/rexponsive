<?php
/*
site.demo.php
*/

$strModulInputDemo = '';

$strModulInputDemo =
'<?php
# REX Value: 20
# --> ist somit blockiert!!!
$select_array   = rex_var::toArray("REX_VALUE[20]");

# REXponsive Bootstrap
$rp = new rex_bootstrap();
$rp->setSelectRexValueArray($select_array);
$rp->getRexponsiveSelectBox("Spaltenanzahl:", 20.1); # label, rex_value
$rp->getRexponsiveSelectBox("Einzug von Links (offset):", 20.2); # label, rex_value
?>
';