<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_feed.php 12432 2009-06-25 07:31:34Z xupeng $
*/

header("Content-type:text/html;charset=utf-8");
if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$uid=$_SGLOBAL['supe_uid'];//获取当前用户id
$minlongitude=117.1238628;
$maxlongitude=117.156628;
$minlatitude=34.2057989;
$maxlatitude=34.2261433;
	
if($_GET['em'] == 'user') {//em=user
	//附近用户列表开始
	//根据区域范围筛选出具体的经纬度坐标
	$sql2="select * from `".UC_INFO_PIC."location` a inner join `".UC_TPRE."uchome_pic` b on a.picid=b.picid where longitude between $minlongitude and $maxlongitude Union  select * from `".UC_INFO_PIC."location` a inner join `".UC_TPRE."uchome_pic` b on a.picid=b.picid where latitude between $minlatitude and $maxlatitude";
	$re1=$_SGLOBAL['db']->query($sql2);
	$count=0;
	while($array2= $_SGLOBAL['db']->fetch_array($re1)){
		$array[]=$array2;
		foreach($array as $value){
			
			$sq="SELECT * FROM ".tname('feed')." WHERE uid=".$value['uid'];
			$qu=$_SGLOBAL['db']->query($sq);
			while($qu=$_SGLOBAL['db']->fetch_array($qu)){
				$array[$count]['title_template']=$quy['title_template'];
				$array[$count]['title_data']=$quy['title_data'];
			}	
				
			$sql="select * from `".UC_MEMBER."profile` where uid=".$value['uid']." limit 0,1";
			$quy=$_SGLOBAL['db']->query($sql);
			while($quy=$_SGLOBAL['db']->fetch_array($quy)){
				$array[$count]['nickname']=$quy['nickname'];
				$array[$count]['signature']=$quy['signature'];
				$array[$count]['sex']=$quy['sex'];
				if(!in_array($quy['uid'],$ree)){
					$array[$count]['isfriend']=0;
				}else{
					$array[$count]['isfriend']=1;
				}
			}
		}
		$count++;
	}
	
	//附近用户列表结束	
}elseif($_GET['em'] == 'album') {//em=album
		
	//附近图片列表开始
	$sql="select * from `".UC_INFO_PIC."location` where longitude between $minlongitude and $maxlongitude Union  select * from `".UC_INFO_PIC."location` where latitude between $minlatitude and $maxlatitude";
	$count1=0;
	$quy=$_SGLOBAL['db']->query($sql);
	while($quy=$_SGLOBAL['db']->fetch_array($quy)){
		$arrayr[$count1]=$quy;
		$sqq="select * from `".UC_TPRE."uchome_pic` where picid=".$quy['picid'];
		$ee=$_SGLOBAL['db']->query($sqq);
		while($ree=$_SGLOBAL['db']->fetch_array($ee)){
			$arrayr[$count1]['filepath']=$ree['filepath'];
			$arrayr[$count1]['count']=count($ree['filepath']);
			$arrayr[$count1]['picid']=$ree['picid'];
			$arrayr[$count1]['uid']=$uid;	

		}
		$count1++;
	}	
		
	
}
//附近图片列表结束
//print_r($arrayr);
include_once template('space_topic_list');
	

?>