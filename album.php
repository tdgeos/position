<?php
include_once('./common.php');
include_once(S_ROOT.'./data/data_magic.php');

//是否关闭站点
checkclose();
//需要登录
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
	}
	showmessage('to_login', 'index.php');
}

$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}

if(checkperm('banvisit')) {
	ckspacelog();
	showmessage('you_do_not_have_permission_to_visit');
}

$isfounder = ckfounder($_SGLOBAL['supe_uid']);


//处理
include_once(S_ROOT."./source/album.php");
?>