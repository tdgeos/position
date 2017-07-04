<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_feed.php 12432 2009-06-25 07:31:34Z xupeng $
*/
header("Content-type:text/html;charset=utf-8");

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$minlongitude=117.1238628;
$maxlongitude=117.156628;
$minlatitude=34.2057989;
$maxlatitude=34.2261433;
//根据区域范围筛选经纬度
$sql="select * from tdgeos_info_member_location_20131005 where longitude between $minlongitude and $maxlongitude Union All select * from tdgeos_info_member_location_20131005 where latitude between $minlatitude and $maxlatitude and last=1";
$re=$_SGLOBAL['db']->query($sql);
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$v[]=$array;
	}
//print_r($v);
//根据区域范围筛选的纬度uid来筛选用户
foreach($v as $val){
	$sql="select * from tdgeos_common_member where uid='".$val['uid']."'";
	$re=$_SGLOBAL['db']->query($sql);
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$username[]=$array;
	}
}
//根据区域范围筛选出具体的经纬度坐标和图片
$sql2="select * from tdgeos_info_pic_location a inner join tdgeos_uchome_pic b on a.picid=b.picid where longitude between $minlongitude and $maxlongitude Union All select * from tdgeos_info_pic_location a inner join tdgeos_uchome_pic b on a.picid=b.picid where latitude between $minlatitude and $maxlatitude";
$re1=$_SGLOBAL['db']->query($sql2);
	while($array2= $_SGLOBAL['db']->fetch_array($re1)){
		$ree[]=$array2;
	}
//根据范围查询出来的uid过滤用户昵称，个性签名


	include_once template('space_map');
?>