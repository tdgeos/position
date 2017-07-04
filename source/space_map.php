<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_feed.php 12432 2009-06-25 07:31:34Z xupeng $
*/
//需要登录
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
	}
	showmessage('to_login', 'index.php');
}

header("Content-type:text/html;charset=utf-8");
if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}


$types = array("user","pic");
$type = @$_GET['type'];

if(!in_array($type,$types))
{
	$type = "user";
}
	
//附近图片列表结束
include_once template("space_map_$type");
	

?>