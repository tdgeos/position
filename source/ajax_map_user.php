<?php
	
	header("Content-Type: text/html;charset=utf-8");
	require_once("../common/data/xxx_common.php");
	$strcookie = xxxgetcookie("auth",true);
	if($strcookie == '')
	{
		exit(-1);
	}
	$values = explode("\t",$strcookie);
	if(count($values) != 2)
	{
		exit(-1);
	}
	$uid = $values[1];
	if( (!is_numeric($uid)) || $uid <=0)
	{
		exit(-1);
	}
	
	$sql = "SELECT * FROM `".UC_TPRE."uchome_friend` WHERE `uid`='$uid'";	
	$longitude_min=@$_GET['lngmin'];
	$longitude_max=@$_GET['lngmax'];
	$latitude_min=@$_GET['latmin'];
	$latitude_max=@$_GET['latmax'];
	$zoom = @$_GET['zoom'];
	
	$longitude_min = is_numeric($longitude_min)?$longitude_min:0;
	$longitude_max = is_numeric($longitude_max)?$longitude_max:0;
	$latitude_min = is_numeric($latitude_min)?$latitude_min:0;
	$latitude_max = is_numeric($latitude_max)?$latitude_max:0;
	$zoom = is_numeric($zoom)?$zoom:3;
	
	//uchome_friend
	$sql = "SELECT * FROM `".UC_TPRE."uchome_friend` WHERE `uid`='$uid'";
	//echo $sql;
	$query = @$_SGLOBAL['db']->query($sql);
	$frienduids = array();
	while($row = @$_SGLOBAL['db']->fetch_array($query))
	{
		if($row['fuid'] > 0)
		{
			$frienduids[] = $row['fuid'];
		}		
	}
  $dateflag=gmdate('Ymd',gmmktime()+8*3600);
  $sql = "CREATE TABLE IF NOT EXISTS `".UC_TPRE."info_member_location_".$dateflag."` (
	`uid` int(11) NOT NULL,
	`longitude` double NOT NULL DEFAULT '0',
	`latitude` double NOT NULL DEFAULT '0',
	`building` int(11) NOT NULL DEFAULT '0',
	`floor` int(11) NOT NULL DEFAULT '0',
	`last` int(11) NOT NULL DEFAULT '0',
	`updatetime` int(11) NOT NULL DEFAULT '0'
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
  $query = @$_SGLOBAL['db']->query($sql);
	//闄勮繎鐢ㄦ埛鍒楄〃寮€濮?
	//鏍规嵁鍖哄煙鑼冨洿绛涢€夊嚭鍏蜂綋鐨勭粡绾害鍧愭爣
	$sql1="select a.`uid`,a.`longitude`,a.`latitude`,b.`username`,c.`sex`,c.`nickname`,c.`signature` from `".UC_TPRE."info_member_location_$dateflag` a inner join `".UC_TPRE."ucenter_members` b on a.`uid`=b.`uid` left join `".UC_TPRE."info_member_profile` c on b.`uid`=c.`uid` where a.`longitude` >= $longitude_min and a.`longitude` <= $longitude_max and a.`latitude` >= $latitude_min and a.`latitude` <=$latitude_max and a.last=1";
	//echo $sql1;
	$re1=$_SGLOBAL['db']->query($sql1);
	$count=0;
	$ucount = 0;
	$users = array();
	while($array1= $_SGLOBAL['db']->fetch_array($re1)){
		$users[$ucount]['id'] = $dateflag.$array1['uid'];
		$users[$ucount]['uid'] = $array1['uid'];		
		$users[$ucount]['username'] = $array1['username'];	
		$users[$ucount]['sex'] = $array1['sex'];
		$users[$ucount]['signature'] = ($array1['signature']=='null' || $array1['signature']=='')?"杩欎釜浜哄緢鎳掞紒浠€涔堥兘娌℃湁鐣欎笅":$array1['signature'];	
		$users[$ucount]['nickname'] = $array1['nickname'];
		$users[$ucount]['gravatar'] = UC_API."/avatar.php?uid=".$array1['uid']."&size=middle";
		$users[$ucount]['longitude'] = $array1['longitude'];
		$users[$ucount]['latitude'] = $array1['latitude'];
		if($array1['uid'] == $uid)
		{
			$relation = 2;
		}else if( in_array($array1['uid'],$frienduids) )
		{
			$relation = 1;
		}else{
			$relation = 0;
		}
		$users[$ucount]['relation'] = $relation;
		$ucount++;
	}
	$packages['count'] = count($users);
	$packages['msg'] = $users;
	echo json_encode($packages);

?>