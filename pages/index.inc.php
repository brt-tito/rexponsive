<?php


# ADDON IDENTIFIER
$strAddonName = 'rexponsive';
$strAddonPath = $REX['INCLUDE_PATH'].'/addons/'.$strAddonName.'/';

# GET PARAMS
$strPage      = rex_request('page', 'string', $strAddonName);
$strFunc      = rex_request('func', 'string');
$id           = rex_request('id', 'int');
$subpage      = rex_request('subpage', 'string', '');
$plugin       = str_replace('plugin.', '', $subpage);


# REX BACKEND LAYOUT TOP
include_once( $REX['INCLUDE_PATH'].'/layout/top.php' );


# TITLE & SUBPAGE NAVIGATION
rex_title('REXponsive <span class="addonversion" style="font-size:10px;color:silver">'.$REX['ADDON']['version'][$strAddonName].$REX['ADDON'][$strAddonName]['rc'].'</span>', $REX['ADDON']['pages'][$strAddonName]);



if ($subpage != '') {
	// plugin headline
	#echo '<h2 class="main plugin">' . rex_plugin_factory::getPluginTitle($strAddonName, $plugin) . '</h2>';

	// include plugin page
	require_once( $strAddonPath . '/plugins/' . $plugin . '/pages/index.inc.php');
} else {
	// show plugin list
	# rex_plugin_factory::printPluginList($strAddonName, "REXponsive Plugins", "Es sind keine PlugIns verfügbar oder installiert");
	require_once( $strAddonPath . '/pages/site.modul_output.php');
	require_once( $strAddonPath . '/pages/site.modul_input.php');
	require_once( $strAddonPath . '/pages/site.information.php');
}


# REX BACKEND LAYOUT BOTTOM
include_once( $REX['INCLUDE_PATH'].'/layout/bottom.php' );
?>
