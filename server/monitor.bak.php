<?php
//header("Content-Type: text/html;charset=utf-8");
//$string = '{"MessageType":0,"Allowed":true,"reason":"��","FenceType":0,"Info":""}';
//$str = json_decode($string);
//print_r($str);

define('XXXROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once(XXXROOT.'../config.php');
require_once(XXXROOT.'../common.php');
$time = gmmktime();
$dateflag=gmdate('Ymd',$time+8*3600); 
$time = $time - 5*60;
$dateflag = "20131127";
$sql = "SELECT * FROM  `".UC_TPRE."info_member_location_".$dateflag."` WHERE `last` = '1' AND `updatetime` >'".$time."'";
$sql = "SELECT * FROM  `".UC_TPRE."info_member_location_".$dateflag."` WHERE `last` = '1'";
$query = @$_SGLOBAL['db']->query($sql);
while( $row = $_SGLOBAL['db']->fetch_array($query) )
{
	print_r($row);
	$rs = getfunce($row);
	print_r($rs);
	if($rs != false)
	{
		$sql = "select * from `".UC_TPRE."info_fence"."` where `uid`='".$row['uid']."'";
		$query = $_SGLOBAL['db']->query($sql);
		if( $_SGLOBAL['db']->num_rows($query) == 0)
		{
		  $setarr = array();
		  $setarr['uid'] = $row['uid'];
		  $setarr['dateline'] = $_SGLOBAL['timestamp'];
		  $setarr['photo'] = $rs->Allowed;
		  sinserttable(UC_TPRE.'info_fence',$setarr);
		  print_r($setarr);
		}else{
		  $setarr = array();
		  $setarr['dateline'] = $_SGLOBAL['timestamp'];
		  $setarr['photo'] = $rs->Allowed;
		  $wherearr = array();
		  $wherearr['uid'] = $row['uid'];
		  supdatetable(UC_TPRE.'info_fence',$setarr,$wherearr);
		  print_r($setarr);
			
		}
	}
}
?>

<?php
function getfunce($obj)
{
	
	$service_port = 9091;
	$address = '61.149.192.130';

	$socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if($socket == false)
	{
		echo "open error";
		return false;
	}

	$result = @socket_connect($socket, $address, $service_port);
	if($result === false) {
		echo "conect error";
		return false;
	}

	$msg = '{"StudengID":'.$obj['uid'].',"X":'.$obj['longitude'].',"Y":'.$obj['latitude'].',"Floor":'.$obj['floor'].',"BuildingID":'.$obj['building'].'}';
	//echo $msg;
	$out = "";
	$str = '';
	socket_write($socket, $msg, strlen($msg));
	while ($out = socket_read($socket, 8192)) {
		$out = '{"MessageType":0,"Allowed":true,"reason":"无","FenceType":0,"Info":""}';
		if(is_json($out))
		{
			$str = json_decode($out);
			break;
		}
		if(strtolower($out) == "end")
		{
			$str = false;
			break;
		}
	}
	@socket_close($socket);
	//print_r($str);
	return $str;
}
function is_json($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}
?>