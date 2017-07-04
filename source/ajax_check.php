<?php
	
	header("Content-Type: text/html;charset=utf-8");
	
	require_once("../common.php");
	require_once(S_ROOT."./data/preg.php");
		
	$key=strtolower(@$_GET['key']);
	$value=strtolower(@$_GET['value']);
	$value1=strtolower(@$_GET['value1']);
	$value2=strtolower(@$_GET['value2']);
	if($key == null )
	{
		exit(-1);
	}
	$query = $_SGLOBAL['db']->query("SELECT * FROM `".UC_TPRE."info_length`");
	while( $row = $_SGLOBAL['db']->fetch_array($query) )
	{
		$LENGTH[$row['name']]['min'] = $row['min'];
		$LENGTH[$row['name']]['max'] = $row['max'];
	}
	//print_r($LENGTH);
	//exit(-1);
	if($key == "email")
	{
		if( strlen($value) == 0 )
		{
			echo "邮箱不能为空";
			exit(-1);			
		}
		if( ! preg_match($cfg_preg_email,$value) )
		{
			echo "邮箱格式不正确";
			exit(-1);
		}
		$sql = "SELECT `email` FROM `".UC_TPRE."ucenter_members` where `email` = '$value'";
		$query = $_SGLOBAL['db']->query($sql);
		if( $_SGLOBAL['db']->num_rows($query) > 0)
		{
			echo "邮箱已被占用";
			exit(-1);
		}
		$sql = "SELECT `email` FROM `".UC_TPRE."uchome_spacefield` where `email` = '$value'";
		$query = $_SGLOBAL['db']->query($sql);
		if( $_SGLOBAL['db']->num_rows($query) > 0)
		{
			echo "邮箱已被占用";
			exit(-1);
		}
		$sql = "SELECT `email` FROM `".UC_TPRE."info_member_account` where `email` = '$value'";
		$query = $_SGLOBAL['db']->query($sql);
		if( $_SGLOBAL['db']->num_rows($query) > 0)
		{
			echo "邮箱已被占用";
			exit(-1);
		}
	}else if($key == "username")
	{
		if( strlen($value) < $LENGTH['username']['min'] || strlen($value) > $LENGTH['username']['max'])
		{
			echo "用户名长度：".$LENGTH['username']['min']."-".$LENGTH['username']['max'];
			exit(-1);			
		}
		if( ! preg_match($cfg_preg_normal,$value) )
		{
			echo "只能使用字母或数字";
			exit(-1);
		}
		$sql = "SELECT * FROM `".UC_TPRE."ucenter_members` where `username` = '$value'";
		$query = $_SGLOBAL['db']->query($sql);
		if( $_SGLOBAL['db']->num_rows($query) > 0)
		{
			echo "用户名已被占用";
			exit(-1);
		}
	}else if($key == "username")
	{
		
		echo "用户名太短";
		exit(-1);
	}else{
		exit(-1);
	}
	echo "true";
	exit(-1);
	
	//uchome_friend
	$uid = 1;
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
	//附近用户列表开始
	//根据区域范围筛选出具体的经纬度坐标
	$sql1="select a.`uid`,a.`longitude`,a.`latitude`,b.`username`,c.`sex`,c.`nickname`,c.`signature` from `".UC_TPRE."info_member_location_$dateflag` a inner join `".UC_TPRE."ucenter_members` b on a.`uid`=b.`uid` left join `".UC_TPRE."info_member_profile` c on b.`uid`=c.`uid` where a.`longitude` >= $longitude_min and a.`longitude` <= $longitude_max and a.`latitude` >= $latitude_min and a.`latitude` <=$latitude_max";
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
		$users[$ucount]['signature'] = ($array1['signature']=='null' || $array1['signature']=='')?"这个人很懒！什么都没有留下":$array1['signature'];	
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