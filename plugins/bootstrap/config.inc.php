<?php

$addonname  = "rexponsive";
$pluginname = "bootstrap";
$filepaths  = $REX['SERVER'] . 'files/addons/'.$addonname.'/plugins/'.$pluginname.'/bootstrap-3.3.5-dist/';



if (empty($REX['REXPONSIVE']['BOOTSTRAP']['filepaths']['js']) or !is_array($REX['REXPONSIVE']['BOOTSTRAP']['filepaths']['js'])) {
    $REX['REXPONSIVE']['BOOTSTRAP']['filepaths']['js'] = array();
}

$REX['REXPONSIVE']['BOOTSTRAP']['filepaths']['js'][] = $filepaths;

if ($REX['REDAXO']) {

	# register plugin
	rex_plugin_factory::registerPlugin('rexponsive', 'bootstrap', 'REXponsive - Bootstrap', '', '3.3.5', 'Christian Kolloch', 'forum.redaxo.de, rexponsive.de', true);

}

// includes
include($REX['INCLUDE_PATH'] . '/addons/rexponsive/plugins/bootstrap/classes/class.rex_bootstrap.inc.php');
