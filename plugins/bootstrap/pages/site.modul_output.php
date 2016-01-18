<?php
/*
site.demo.php
*/

$strModulOutputDemo = '';

$strModulOutputDemo =
'<?php
# REX Value: 20
# --> ist somit blockiert!!!
$select_array   = rex_var::toArray("REX_VALUE[20]");

$output = array();
$output[] = "<p>Slice - REX_SLICE_ID</p>";
$output[] = "<p>COLUMNS: ".$select_array[1]."</p>";
$output[] = "<hr/>";

# REXponsive Bootstrap
$rp = new rex_bootstrap();
$rp->setCurrentSlice("REX_SLICE_ID");
$rp->setSelectRexValueArray($select_array);
$rp->setRexBootstrapSection(true, $id = "", $class = array("section"));
$rp->setRexBootstrapContainer(true, $id = "", $class = array("container"));
$rp->setRexBootstrapRow(true, $id = "", $class = array("row"));

# Backend Info
$rp->getInfoFreeColumnsBefore(); # nur Backend

$rp->getREXponsiveBoostrapStart();
$rp->setRexBootstrapColumnOutput($output);
$rp->getREXponsiveBoostrapEnd();

# Backend Info
$rp->getInfoFreeColumnsNext(); # nur Backend
?>';