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

$rp = new rexponsive();
$rp->setSelectRexValueArray($select_array);
$rp->getRexponsiveSelectBox("Spaltenanzahl:", 20.1); # label, rex_value_array

# weitere SelectBoxes
# via mform und REXponsive
/*
$rp->getRexponsiveSelectBox("Medium:", 20.2);
$rp->getRexponsiveSelectBox("Small:", 20.3);
$rp->getRexponsiveSelectBox("Extra Small:", 20.4);
*/
?>
';