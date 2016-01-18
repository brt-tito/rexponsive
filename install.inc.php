<?php
$addonname = 'rexponsive';
$I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/'.$addonname.'/lang/');

$msg = '';

if ($REX['VERSION'] != '4' || $REX['SUBVERSION'] < '5') {
	$msg = $I18N->msg('rexponsive_install_redaxo_version_problem', '4.5');

} elseif (version_compare(PHP_VERSION, '5.3.0', '<')) {
	$msg = $I18N->msg('rexponsive_install_checkphpversion', PHP_VERSION);

} elseif (OOAddon::isAvailable('seo42') != 1 || OOAddon::getVersion('seo42') < '4.2') {
	$msg = $I18N->msg('rexponsive_install_seo42_version_problem', '4.2');

} elseif (OOAddon::isAvailable('be_utilities') != 1 || OOAddon::getVersion('be_utilities') < '1.5') {
	$msg = $I18N->msg('rexponsive_install_be_utilities_version_problem', '1.5');

} elseif (OOAddon::isAvailable('mform') != 1 || OOAddon::getVersion('mform') < '2.2.1') {
	$msg = $I18N->msg('rexponsive_install_mform_version_problem', '2.2.1');

} else {

    include_once rex_path::addon($addonname, 'classes/class.rexponsive.inc.php');
}


if ($msg != '') {
    $REX['ADDON']['installmsg'][$addonname] = $msg;

} else {
    // INSTALL ADDON
    $sql = rex_sql::factory();

    if ($sql->hasError()) {
        $msg = 'MySQL-Error: ' . $sql->getErrno() . '<br />';
        $msg .= $sql->getError();

        $REX['ADDON']['install'][$addonname] = 0;
        $REX['ADDON']['installmsg'][$addonname] = $msg;
    } else {
        $REX['ADDON']['install'][$addonname] = 1;
    }
}

?>