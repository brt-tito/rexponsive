<?php
# ADDON IDENTIFIER
$strAddonName = 'rexponsive';
$strAddonPath = $REX['INCLUDE_PATH'].'/addons/'.$strAddonName.'/';

$strPluginName = 'bootstrap';
$strPluginPath = $strAddonPath.'plugins/'.$strPluginName;

# GET PARAMS
$strPage      = rex_request('page', 'string', $strAddonName);
$strFunc      = rex_request('func', 'string');
$id           = rex_request('id', 'int');
$subpage      = rex_request('subpage', 'string', '');
$plugin       = str_replace('plugin.', '', $subpage);


require_once( $strPluginPath . '/pages/site.modul_output.php');
require_once( $strPluginPath . '/pages/site.modul_input.php');
require_once( $strPluginPath . '/pages/site.information.php');


?>