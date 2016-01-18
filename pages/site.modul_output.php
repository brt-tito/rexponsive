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

# Restlicher HTML OUTPUT
# Alles was Ihr im Modul ausgeben möchtet
# entweder als ARRAY ($output[] = "foo") oder String-Kette ($out .= "foo")

# Beispiel als ARRAY
$output = array();
$output[] = "<p>Hier steht der Content!!!</p>";

/*
# Beispiel als String-Kette
$output = "";
$output .= "<p>Hier steht der Content!!!</p>";
*/

$rp = new rexponsive();
$rp->setCurrentSlice("REX_SLICE_ID");
$rp->setSelectRexValueArray($select_array);

$rp->getInfoFreeColumnsBefore(); # wird nur im Backend angezeigt
$rp->getREXponsiveWrapperStart();

# Hier wird der HTML-OUTPUT ausgegeben !!!
$rp->getREXponsiveContentOutput($output);

$rp->getREXponsiveWrapperEnd();
$rp->getInfoFreeColumnsNext(); # wird nur im Backend angezeigt
?>';