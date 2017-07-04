<?php
header("Content-type:text/html;charset=utf-8");
if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$uid=$_GET['uid'];
$sql="select * from `".UC_TPRE."uchome_pic` where uid=".$uid;

$re=$_SGLOBAL['db']->query($sql);

while($value = $_SGLOBAL['db']->fetch_array($re)){
	$result[]=$value;
}
//print_r($result);
include_once template('album_display');
?>