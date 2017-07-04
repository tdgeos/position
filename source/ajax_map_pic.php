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
	$clickid = @$_GET['clickid'];
	
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

//读取图片
	$sql = "select a.uid,a.picid,b.username,a.filepath,d.longitude,d.latitude from `".UC_TPRE."uchome_pic` a inner join `".UC_TPRE."ucenter_members` b on a.uid=b.uid inner join `".UC_TPRE."uchome_album` c on a.albumid=c.albumid inner join `".UC_TPRE."info_pic_location` d on a.picid=d.picid where d.`longitude` >= $longitude_min and d.`longitude` <= $longitude_max and d.`latitude` >= $latitude_min and d.`latitude` <=$latitude_max";
	//echo $sql;
	$re1=$_SGLOBAL['db']->query($sql);
	$count=0;
	$ucount = 0;
	$users = array();
	while($array1= $_SGLOBAL['db']->fetch_array($re1)){
		$pics[$ucount]['id'] = $dateflag.$array1['picid'];
		$pics[$ucount]['picid'] = $array1['picid'];
		$pics[$ucount]['uid'] = $array1['uid'];		
		$pics[$ucount]['username'] = $array1['username'];
		$pics[$ucount]['url'] = $_SC['attachdir'].$array1['filepath'];	
		$pics[$ucount]['longitude'] = $array1['longitude'];
		$pics[$ucount]['latitude'] = $array1['latitude'];
		$pics[$ucount]['selectid'] = $pics[$ucount]['id'] == $clickid ? 1:0;
		$ucount++;
	}
	$packages['count'] = $ucount;
	$packages['msg'] = $pics;
	echo json_encode($packages);

?>