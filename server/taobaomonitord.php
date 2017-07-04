<?php
require_once('include/common.inc.php');
$rn =new TaobaoNotify();
$rn->setConfig('app_key',$GLOBALS['cfg_app_appKey']);
$rn->setConfig('secret',$GLOBALS['cfg_app_secretKey']);
$rn->setConfig('user_id',$GLOBALS['cfg_app_userid']);
$rn->setConfig('tradepath',$GLOBALS['cfg_shell_path']);
$rn->setConfig('writable_dir',XXXROOT."/log");
$rn->run();
?>