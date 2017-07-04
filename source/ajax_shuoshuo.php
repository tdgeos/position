<?php
	
	header("Content-Type: text/html;charset=utf-8");
	require_once("../common/data/xxx_common.php");
	$strcookie = xxxgetcookie("auth",true);
	if($strcookie == '')
	{
		echo "ERROR:-1";
		exit(-1);
	}
	$values = explode("\t",$strcookie);
	if(count($values) != 2)
	{
		echo "ERROR:-1";
		exit(-1);
	}
	$uid = $values[1];
	if( (!is_numeric($uid)) || $uid <=0)
	{
		echo "ERROR:-1";
		exit(-1);
	}
	$sql = "SELECT `username` FROM `".UC_TPRE."ucenter_members` WHERE `uid`='$uid'";
	$query = @$_SGLOBAL['db']->query($sql);
	if( $_SGLOBAL['db']->num_rows($query) != 1)
	{
		echo "ERROR:-1";
		exit(-1);
	}
	$row = @$_SGLOBAL['db']->fetch_array($query);
	$username = $row['username'];	
	$dateline = $_SGLOBAL['timestamp'];
	$message = @$_GET['message'];
	$pics = @$_GET['pics'];

	$images = array();
	$count = 0;
	if($pics != '')
	{
	  $filepaths = explode(";",$pics);
	  for($i=0;$i<count($filepaths);$i++)
	  {
		  $pos1 = strposs($filepaths[$i],'/',3,false);
		  $pos2 = strposs($filepaths[$i],'.',2,false);
		  if($pos2 >= $pos1 && $pos1 != -1)
		  {
			  $images[$count] = substr($filepaths[$i],$pos1+1,$pos2-$pos1-1);
			  $count++;
		  }
	  }
	}
	if($message == '' &&  $count == 0)
	{
		echo '';
		exit(0);
	}

	$insetarr = array();
	$insetarr['uid'] = $uid;
	$insetarr['message'] = $message;
	$insetarr['dateline'] = $dateline;
	$insetarr['username'] = $username;
	$doid = inserttable('doing', $insetarr,1);

	
	if( $count > 0)
	{
	  $albumid = "-".$uid;
	  $sql = "SELECT `uid` FROM `".UC_TPRE."uchome_album` where `albumid` = '".$albumid."'";
	  $query = $_SGLOBAL['db']->query($sql);
	  if( $_SGLOBAL['db']->num_rows($query) == 0)
	  {
		//鍒涘缓鐩稿唽
		$setarr = array();
		$setarr['albumid'] = $albumid;
		$setarr['albumname'] = "鎴戠殑鐩稿唽";
		$setarr['uid'] = $_SGLOBAL['supe_uid'];
		$setarr['username'] = $_SGLOBAL['supe_username'];
		$setarr['dateline'] = $setarr['updatetime'] = $_SGLOBAL['timestamp'];
		$albumid = inserttable('album', $setarr, 1);		
	  }
	  for($i=0;$i<count($images);$i++)
	  {
		  $insetarr = array();
		  $insetarr['uid'] = $uid;
		  $insetarr['doid'] = $doid;
		  $insetarr['albumid'] = $albumid;
		  $insetarr['filepath']=$images[$i];
		  $insetarr['dateline'] = $dateline;
		  $insetarr['username'] = $username;
		  inserttable('pic', $insetarr,1);	  
	  }
	}
	exit(0);
?>
<?php
function strposs($str,$needle,$num=0,$left=true)
{
	$pos = -1;
	$count = strlen($str);
	if($count == 0)
	{
		return -1;
	}
	if(!is_int($num) || $num <= 0)
	{
		$num = 1;
	}
	if($num > $count)
	{
		return -1;
	}
	if($left == false)
	{
		$tnum = 0;
		for($i=0;$i<$count;$i++)
		{
			if($str[$count-1-$i] == $needle)
			{
				$tnum ++;
				if($tnum == $num)
				{
					return $count-1-$i;
				}
			}
			
		}
		
	}
	return  $pos;
}
?>