<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_doing.php 12998 2009-08-05 03:29:54Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$uid=@$_SGLOBAL['supe_uid'];//获取当前用户id'
$username = @$_SGLOBAL['supe_username'];	
if($uid <= 0 || $username == '')
{
	//用户未登录
	include_once(S_ROOT.'./source/space_mood_login.php');
}


$dateline = $_SGLOBAL['timestamp'];
$ip = getonlineip();
//发表状态
if(submitcheck('addsubmit')) {
	include_once(S_ROOT.'./source/space_mood_new.php');
	 $_SERVER['HTTP_REFERER'];//php来路地址
echo "<script type=\"text/javascript\">window.location='".$_SERVER['HTTP_REFERER']."'</script>";
}else if(submitcheck('addsubmit')) {
}
include_once(S_ROOT.'./source/space_mood_view.php');

?>