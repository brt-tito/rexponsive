<?php
$addonname = "rexponsive";

$REX['ADDON']['rxid'][$addonname] = "1249";
$REX['ADDON']['page'][$addonname] = $addonname;
$REX['ADDON']['name'][$addonname] = "REXponsive";
$REX['ADDON']['version'][$addonname] = "0.1";
$REX['ADDON']['perm'][$addonname] = "rexponsive[]"; // permission

// add permissions to user administration
$REX['PERM'][] = $REX['ADDON']['perm'][$addonname];
$REX['ADDON']['author'][$addonname] = "Christian Kolloch";
$REX['ADDON']['supportpage'][$addonname] = 'redaxo.org, rexponsive.de';



if (!isset($REX['REXPONSIVE']['COLUMNS']))
	$REX['REXPONSIVE']['COLUMNS'] = 12;

if (!isset($REX['REXPONSIVE']['SELECT-COLUMNS']))
	$REX['REXPONSIVE']['SELECT-COLUMNS'] = 0;

# includes
include_once($REX['INCLUDE_PATH'] . '/addons/'.$addonname.'/classes/class.rexponsive.inc.php');


// sub pages
$REX['ADDON'][$addonname]['SUBPAGES'] = array();
$REX['ADDON'][$addonname]['SUBPAGES'][] = array('' , "REXponsive");


if ($REX['REDAXO'] && $REX['USER']) {
    $I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/' . $addonname . '/lang/');
}

?>