<?php
	
	header("Content-Type: text/html;charset=utf-8");
	require_once("../common/data/xxx_common.php");
	/*
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
	*/
	$uid = 51;
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
	
	$longitude_min = 117.120734;
	$latitude_min = 34.204136;
	$longitude_max = 117.205031;
	$latitude_max = 34.245446;
	$zoom = 15;
	$longitude_step[15] = 0.01;
	$latitude_step[15] = 0.01;
	
	
	$longitude_min = is_numeric($longitude_min)?$longitude_min:0;
	$longitude_max = is_numeric($longitude_max)?$longitude_max:0;
	$latitude_min = is_numeric($latitude_min)?$latitude_min:0;
	$latitude_max = is_numeric($latitude_max)?$latitude_max:0;
	$zoom = is_numeric($zoom)?$zoom:3;
	
	$numx = ceil(($longitude_max-$longitude_min) / $longitude_step[$zoom]);
	$numx_start = (floor($longitude_min  / $longitude_step[$zoom]) + 0.5) * $longitude_step[$zoom] ;
	//
	$numy = ceil(($latitude_max-$latitude_min) / $latitude_step[$zoom]);
	$numy_start = (floor($latitude_min  / $latitude_step[$zoom]) + 0.5) * $latitude_step[$zoom] ;
	$lcount = 0;
	for($i=0;$i<$numx;$i++)
	{
		for($j=0;$j<$numy;$j++)
		{
			$tmp[$lcount]['latitude'] = $numy_start + $latitude_step[$zoom]*$j;
			$tmp[$lcount]['longitude'] = $numx_start + $longitude_step[$zoom]*$i;	
			$tmp[$lcount]['count'] = 0;		
			$lcount++;
		}
	}
	//print_r($pics);
	//echo $numx_start;
	//echo $numy_start;
	//$numx_start = 1;
	
	
	
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
	$sql = "select a.uid,a.picid,b.username,a.filepath,d.longitude,d.latitude from `".UC_TPRE."uchome_pic` a inner join `".UC_TPRE."ucenter_members` b on a.uid=b.uid inner join `".UC_TPRE."uchome_album` c on a.albumid=c.albumid inner join `".UC_TPRE."info_pic_location` d on a.picid=d.picid where d.`longitude` >= $longitude_min and d.`longitude` <= $longitude_max and d.`latitude` >= $latitude_min and d.`latitude` <=$latitude_max";
	//echo $sql;
	$re1=$_SGLOBAL['db']->query($sql);
	$count=0;
	
	$users = array();
	while($array1= $_SGLOBAL['db']->fetch_array($re1)){
		$pic['id'] = $dateflag.$array1['picid'];
		$pic['picid'] = $array1['picid'];
		$pic['uid'] = $array1['uid'];		
		$pic['username'] = $array1['username'];
		$pic['url'] = $_SC['attachdir'].$array1['filepath'];	
		$pic['longitude'] = $array1['longitude'];
		$pic['latitude'] = $array1['latitude'];
		//print_r($pic);
		
		$numx_tmp = (floor($pic['longitude']  / $longitude_step[$zoom]) + 0.5) * $longitude_step[$zoom] ;
		$numx_tmp =  round(($numx_tmp - $numx_start) / $longitude_step[$zoom]);
		$numy_tmp = (floor($pic['latitude']  / $latitude_step[$zoom]) + 0.5) * $latitude_step[$zoom] ;
		$numy_tmp =  round(($numy_tmp - $numy_start) / $latitude_step[$zoom]);
			//echo $numx_tmp;
			//echo $numy_tmp;
		$ccount = $numy_tmp * $numx +$numx_tmp;
		$tmp[$ccount]['pic'][$tmp[$ccount]['count']] = $pic;
		$tmp[$ccount]['count']++;
	}
	$ucount = 0;
	for($i=0;$i<$lcount;$i++)
	{
		if($tmp[$i]['count'] > 0)
		{
			$pics[$ucount] = $tmp[$i];
			$ucount++;
		}
	}
	$packages['count'] = $ucount;
	$packages['msg'] = $pics;
	echo json_encode($packages);

?>