<?php
header("Content-Type: text/html;charset=utf-8");
require_once("common.php");
$uid=$_SGLOBAL['supe_uid'];
$school=isset($_POST['scho'])?$_POST['scho']:'';
$college=isset($_POST['coll'])?$_POST['coll']:'';
$major=isset($_POST['majo'])?$_POST['majo']:'';
$class=isset($_POST['class'])?$_POST['class']:'';
$title=isset($_POST['subject'])?$_POST['subject']:'';
$content=isset($_POST['message'])?$_POST['message']:'';
$status = true;
$sql="select * from `".UC_MEMBER."schoolinfo` where uid=".$uid;
$query1 = $_SGLOBAL['db']->query($sql);
while($ree=$_SGLOBAL['db']->fetch_array($query1)){
	$ye=$ree;
}
$schoRole=$ye['schoRole'];
$collRole=$ye['collRole'];
$majoRole=$ye['majoRole'];
$clasRole=$ye['clasRole'];
function xtname($tabname){
	return UC_TPRE.$tabname;
}
if($school=="所有学校"){
	echo "<script>alert('学校必选!');location.href='cp.php?ac=notice';</script>";die;
	}

if( (!empty($school)) && (!empty($college)) && (!empty($major)) && (!empty($class)) )
{
	
	$type = 0;
	$sql = "SELECT * FROM `".xtname('info_school')."` a inner join `".xtname('info_college')."` b on b.schoID=a.schoID inner join `".xtname('info_major')."` c on c.schoID=b.schoID and c.collID=b.collID inner join `".xtname('info_class')."` d on d.schoID=c.schoID and d.collID=c.collID and c.majoID=d.majoID where a.schoName='$school' and b.collName='$college' and c.majoName='$major' and d.clasName='$class'";
}else if((!empty($school)) && (!empty($college)) && (!empty($major)))
{
	$type = 1;
	$sql = "SELECT * FROM `".xtname('info_school')."` a inner join `".xtname('info_college')."` b on b.schoID=a.schoID inner join `".xtname('info_major')."` c on c.schoID=b.schoID and c.collID=b.collID where a.schoName='$school' and b.collName='$college' and c.majoName='$major' ";	
}else if( (!empty($school)) && (!empty($college)) )
{
	$type = 2;
	$sql = "SELECT * FROM `".xtname('info_school')."` a inner join `".xtname('info_college')."` b on b.schoID=a.schoID  where a.schoName='$school' and b.collName='$college'  ";	
}else if( (!empty($school)) )
{
	$type = 3;
	$sql = "SELECT * FROM `".xtname('info_school')."` where schoName='$school' ";	
}else{
		$type = 4;
	$status = true;
}
if($status != true)
{
	$query = $_SGLOBAL['db']->query($sql);
	if( $_SGLOBAL['db']->num_rows($query) == 1)
	{
		$status = true;
	}
}
if($status != true)
{
	exit(-1);	
}
$time = time();
if( (!empty($school)) && (!empty($college)) && (!empty($major)) && (!empty($class)) )
{
$sql = "INSERT INTO `".xtname('info_notice')."` (`uid`, `type`, `title`, `content`, `pubdate`, `schoName`, `collName`, `majoName`, `clasName`, `sex`, `delstatus`) VALUES ( '$uid', '$type', '$title', '$content', '$time', '$school', '$college', '$major', '$class', '$sex', '0')";
}else if((!empty($school)) && (!empty($college)) && (!empty($major)))
{
	$sql = "INSERT INTO `".xtname('info_notice')."` (`uid`, `type`, `title`, `content`, `pubdate`, `schoName`, `collName`, `majoName`, `clasName`, `sex`, `delstatus`) VALUES ( '$uid', '$type', '$title', '$content', '$time', '$school', '$college', '$major', '$class', '$sex', '0')";
}else if( (!empty($school)) && (!empty($college)) )
{
	$sql = "INSERT INTO `".xtname('info_notice')."` (`uid`, `type`, `title`, `content`, `pubdate`, `schoName`, `collName`, `majoName`, `clasName`, `sex`, `delstatus`) VALUES ( '$uid', '$type', '$title', '$content', '$time', '$school', '$college', '$major', '$class', '$sex', '0')";
}else if( (!empty($school)) )
{
	$sql = "INSERT INTO `".xtname('info_notice')."` (`uid`, `type`, `title`, `content`, `pubdate`, `schoName`, `collName`, `majoName`, `clasName`, `sex`, `delstatus`) VALUES ( '$uid', '$type', '$title', '$content', '$time', '$school', '$college', '$major', '$class', '$sex', '0')";
}
if($schoRole>0 || $collRole>0 || $majoRole>0 || $clasRole){
	$query = $_SGLOBAL['db']->query($sql);
	if($_SGLOBAL['db']->affected_rows() < 1)
	{
	  //echo xxxjson(30001, 0,"system error");
	  exit(-1);	
		
	}
	$id=$_SGLOBAL['db']->insert_id();
	showmessage('do_success',"space.php?uid=$uid&do=blog&view=both");
}else{
	showmessage('你没有此权限！',"cp.php?ac=notice");
}


?>