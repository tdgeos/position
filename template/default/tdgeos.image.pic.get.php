<?php
$session = $_POST['session'] = xxxdecode(@$_POST['session'],$cfg_encode_key,$cfg_encode);
$startnum = $_POST['startnum'] = xxxdecode(@$_POST['startnum'],$cfg_encode_key,$cfg_encode);
$endnum = $_POST['endnum'] = xxxdecode(@$_POST['endnum'],$cfg_encode_key,$cfg_encode);

if( !(preg_match($GLOBALS['cfg_preg_normal'],$appkey) && preg_match($GLOBALS['cfg_preg_normal'],$secretkey) ) )
{
	echo xxxjson(30002, 0,'Invalid appkey or secretkey');
	exit(-1);
}
if( ! preg_match($GLOBALS['cfg_preg_normal'],$session) )
{
	echo xxxjson(30004, 0,'The session is timeout, please login again');
	exit(-1);
}
if( startwith($session,'01') )
{
	$devflag = 'mobi';
	$strsession = '01';
}elseif( startwith($session,'02') )
{
	$devflag = 'pc';	
	$strsession = '02';
}else{
	echo xxxjson(30012, 0,'unknow devices');
	exit(-1);	
}

$startnum = is_int($startnum) ? $startnum:0;
$endnum = is_int($endnum) ? $endnum:0;
if( $startnum < 0 || $endnum < 0 || ($endnum < $startnum) )
{
	$startnum = 0;
	$endnum = 9;
}
$step = $endnum - $startnum + 1;

$query = $_SGLOBAL['db']->query('SELECT uid FROM '.$GLOBALS['cfg_dbprefix'].'info_login_status where `'.$devflag."session` = '$session'");
if( !($row = $_SGLOBAL['db']->fetch_array($query)) )
{
	echo xxxjson(30004, 0,'The session is timeout, please login again');
	exit(-1);
}
$uid = $_SGLOBAL['supe_uid'] = $row['uid'];
include_once(UXXXROOT.'/source/function_cp.php');
include_once(UXXXROOT.'/uc_client/client.php');

//鑾峰彇鐩稿唽
$album = array();
if($pic['albumid']) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('album')." WHERE albumid='$pic[albumid]'");
	if(!$album = $_SGLOBAL['db']->fetch_array($query)) {
		updatetable('pic', array('albumid'=>0), array('albumid'=>$pic['albumid']));//鐩稿唽涓㈠け?	
		echo xxxjson(30004, 0,'Album not exists');
		exit(-1);
	}
}

$query = $_SGLOBAL['db']->query("SELECT `picid`,`albumid`,`uid`,`username`,`dateline`,`title`,`filepath` FROM ".tname('pic')." WHERE picid='$picid'  LIMIT 0,1");
$pic = $_SGLOBAL['db']->fetch_array($query);
$pic['url'] = $GLOBALS['cfg_url_uchome'].$_SC['attachurl'].$pic['filepath'];


	$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
	$csql = $cid?"cid='$cid' AND":'';
	$siteurl = getsiteurl();
	$list = array();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('comment')." WHERE $csql id='$pic[picid]' AND idtype='picid' AND topid='0' AND delstatus=0"),0);
	if($count) {
		$count = 0;
		$query = $_SGLOBAL['db']->query("SELECT `cid`,`topid`,`authorid`,`author`,`dateline`,`message` FROM ".tname('comment')." WHERE $csql id='$pic[picid]' AND idtype='picid' and topid=0 AND delstatus=0 ORDER BY dateline LIMIT $startnum,$step");	 
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['authorid'], $value['author']);
			$list[$count] = $value;
			$pcount = $count;
			$count++;
			$querytmp = $_SGLOBAL['db']->query("SELECT `cid`,`topid`,`authorid`,`author`,`dateline`,`message` FROM ".tname('comment')." WHERE $csql id='$pic[picid]' AND idtype='picid' AND delstatus=0 and topid=".$list[$pcount]['topid']." ORDER BY dateline");
			while ($valuetmp = $_SGLOBAL['db']->fetch_array($querytmp)) {
			  realname_set($value['authorid'], $value['author']);
			$list[$count] = $valuetmp;
			$count++;
			}
		}
	}
	$pic['comment'] = $list;
	echo xxxjson(200, 1,$pic);
	exit(-1);
?>