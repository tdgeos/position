<?php
define('XXXROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
require_once(XXXROOT.'../config.php');
require_once('include/common.inc.php');
$dateflag=gmdate('Ymd',time()+8*3600); 
//echo "SELECT * FROM `tdgeos_info_member_location_".$dateflag."` where `last`='1'";
$dsql->Execute("me","SELECT * FROM `tdgeos_info_member_location_".$dateflag."` where `last`='1'");
//$row = $dsql->GetArray("me");
//while($row = $dsql->GetArray("me"))
while($row = $dsql->GetArray("me"))
{
    //print_r($row);
   	$rs = getfunce($row);
	//echo time();
	//print_r($rs);
	if($rs != false)
	{
		$sql = "select * from `".UC_TPRE."info_fence"."` where `uid`='".$row['uid']."'";
		$srs = $dsql->GetOne($sql);
		//print_r($srs);
		$ftime = time();
		$uid = $row['uid'];
		$cFenceID = $rs->FenceID;
		$Allowed = $rs->Allowed;
		$reason = $rs->reason;
		$Info = trim($rs->Info);
		$Infotime = $srs['Infotime'];
		$dateline = $ftime;
		if( $srs == '')
		{
			$Infotime = $ftime;
			
			if( ($Info != '' || $Allowed == 0) && $cFenceID != -1)
			{
				$message = $Allowed ? "true":"false";
				$message .=  ";".$Info;
				$sql = "INSERT INTO `".UC_TPRE."ucenter_pms` ( `msgfromid`, `msgtoid`, `folder`, `new`, `push`, `subject`, `dateline`, `message`) VALUES( 0, $uid, 'inbox', 1, 0, 'funce', $dateline, '$message')";
				echo $sql;
				$dsql->ExecuteNoneQuery($sql);
			}
			
			$sql = "INSERT INTO `".UC_TPRE."info_fence"."` (`uid`,`cFenceID`, `Allowed`,`reason`,`Info`,`Infotime`, `dateline`) VALUES ('$uid', '$cFenceID','$Allowed','$reason','$Info','$Infotime','$dateline')";
			//echo $sql;
			$dsql->ExecuteNoneQuery($sql);
		}else{
			$lFenceID = $srs['cFenceID'];
			if($lFenceID != $cFenceID && $cFenceID != -1)
			{
				$Infotime = $ftime;
				$message = $Allowed ? "true":"false";
				$message .=  ";".$Info;
				$sql = "INSERT INTO `".UC_TPRE."ucenter_pms` ( `msgfromid`, `msgtoid`, `folder`, `new`, `push`, `subject`, `dateline`, `message`) VALUES( 0, $uid, 'inbox', 1, 0, 'funce', $dateline, '$message')";
				echo $sql;
				$dsql->ExecuteNoneQuery($sql);
			}
			$sql = "UPDATE  `".UC_TPRE."info_fence` SET  `lFenceID` =  '$lFenceID',`cFenceID` =  '$cFenceID',`Allowed` =  '$Allowed',`reason` =  '$reason',
`Info` =  '$Info',`Infotime` =  '$Infotime',`dateline` =  '$dateline' WHERE  `uid` ='$uid'";
            //echo $sql;
			$dsql->ExecuteNoneQuery($sql);			
		}
	}

}
?>

<?php
function getfunce($obj)
{
	$msg = '{"StudengID":'.$obj['uid'].',"X":'.$obj['longitude'].',"Y":'.$obj['latitude'].',"Floor":'.$obj['floor'].',"BuildingID":'.$obj['building'].'}';
	$fp = fsockopen("61.149.192.130", 9091, $errno, $errstr, 2);
	//$out = '{"MessageType":0,"Allowed":true,"reason":"无","FenceType":0,"Info":""}';
	//$str = json_decode($out);
	//return $str;
	if (!$fp) {
		echo "Connection failed: $errno $errstr";;
    	return false;
	} else {
    fwrite($fp, $msg);
    while (!feof($fp)) {
        $out = fgets($fp, 512);
		$squit = false;
		$out = trim($out);
		$len = strlen($out);
		if($len > 3)
		{
			$end = substr($out,$len-3);
			if(strtolower($end) == 'end')
			{
				$out = substr($out,0,$len-3);
				$squit = true;
			}		
		}
		if(is_json($out))
		{
			$str = json_decode($out);
			break;
		}
		if($squit == true)
		{
			echo "will quit";
			$str = false;
			break;
		}
		break;
    }
	}

    @fclose($fp);
	@socket_close($socket);
	return $str;	
}
function is_json($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}
?>
<?php
//添加数据
function inserttable($tablename, $insertsqlarr, $returnid=0, $replace = false, $silent=0) {
	global $_SGLOBAL;

	$insertkeysql = $insertvaluesql = $comma = '';
	foreach ($insertsqlarr as $insert_key => $insert_value) {
		$insertkeysql .= $comma.'`'.$insert_key.'`';
		$insertvaluesql .= $comma.'\''.$insert_value.'\'';
		$comma = ', ';
	}
	$method = $replace?'REPLACE':'INSERT';
	$_SGLOBAL['db']->query($method.' INTO '.tname($tablename).' ('.$insertkeysql.') VALUES ('.$insertvaluesql.')', $silent?'SILENT':'');
	if($returnid && !$replace) {
		return $_SGLOBAL['db']->insert_id();
	}
}

//更新数据
function updatetable($tablename, $setsqlarr, $wheresqlarr, $silent=0) {
	global $dsql;

	$setsql = $comma = '';
	foreach ($setsqlarr as $set_key => $set_value) {//fix
		$setsql .= $comma.'`'.$set_key.'`'.'=\''.$set_value.'\'';
		$comma = ', ';
	}
	$where = $comma = '';
	if(empty($wheresqlarr)) {
		$where = '1';
	} elseif(is_array($wheresqlarr)) {
		foreach ($wheresqlarr as $key => $value) {
			$where .= $comma.'`'.$key.'`'.'=\''.$value.'\'';
			$comma = ' AND ';
		}
	} else {
		$where = $wheresqlarr;
	}
	$_SGLOBAL['db']->query('UPDATE '.tname($tablename).' SET '.$setsql.' WHERE '.$where, $silent?'SILENT':'');
}


?>