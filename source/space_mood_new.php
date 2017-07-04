<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_doing.php 13245 2009-08-25 02:01:40Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$id = empty($_GET['id'])?0:intval($_GET['id']);
$view = empty($_GET['doid'])?0:intval($_GET['doid']);
if(empty($_POST['refer'])) $_POST['refer'] = "space.php?do=mood&view=all";

$pics=@$_POST['pics'];
$message=@$_POST['message'];
$refer=@$_POST['refer'];

	
//判断否操作太快
$waittime = interval_check('post');
if($waittime > 0) {
	showmessage('operating_too_fast', '', 1, array($waittime));
}
$images = array();
$count = 0;
if($pics)
{
 // $filepaths = explode(";",$pics);
  for($i=0;$i<count($pics);$i++)
  {
	  $pos1 = strposs($pics[$i],'/',3,false);
	  $pos2 = strposs($pics[$i],'.',2,false);
	  if($pos2 >= $pos1 && $pos1 != -1)
	  {
		  $images[$count] = substr($pics[$i],$pos1+1,$pos2-$pos1-1);
		  $count++;
	  }
  }
}
if($message ||  $count != 0)
{
	$insetarr = array();
	$insetarr['uid'] = $uid;
	$insetarr['message'] = $message;
	$insetarr['dateline'] = $dateline;
	$insetarr['username'] = $username;
	$insetarr['picnum'] = $count;
	$insetarr['ip'] = $ip;
	$doid = inserttable('doing', $insetarr,1);

	
	if( $count > 0)
	{
	  $albumid = "-".$uid;
	  $sql = "SELECT `uid` FROM `".UC_TPRE."uchome_album` where `albumid` = '".$albumid."'";
	  $query = $_SGLOBAL['db']->query($sql);
	  if( $_SGLOBAL['db']->num_rows($query) == 0)
	  {
		//创建相册
		$setarr = array();
		$setarr['albumid'] = $albumid;
		$setarr['albumname'] = "我的相册";
		$setarr['uid'] = $_SGLOBAL['supe_uid'];
		$setarr['username'] = $_SGLOBAL['supe_username'];
		$setarr['dateline'] = $setarr['updatetime'] = $_SGLOBAL['timestamp'];
		$albumid = inserttable('album', $setarr, 1);		
	  }
	  for($i=0;$i<$count;$i++)
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
}


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