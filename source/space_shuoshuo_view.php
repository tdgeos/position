<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_doing.php 13245 2009-08-25 02:01:40Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//分页
$perpage = 20;
$perpage = mob_perpage($perpage);

$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page=1;
$start = ($page-1)*$perpage;

//检查开始数
ckstart($start, $perpage);

$dolist = array();
$count = 0;

$filters = array('all','friend','me','uid','doid');
$filter = @$_GET['view'];
$filter = in_array($filter,$filters)?$filter:'all';
$dolist = array();
$count = 0;
if($filter == 'all')
{
	$theurl = "space.php?do=mood&view=all";
	$wheresql = "";
	$sql = "SELECT COUNT(*) FROM ".tname('doing').$wheresql;
	$allcount = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	$sql = "SELECT doid,uid,username,dateline,message,replynum,picnum FROM  ".tname('doing')." 
			ORDER BY  `dateline` DESC 
			LIMIT $start,$perpage";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$dolist[$count] = $value;
		$dolist[$count]['picpath'] = array();
		if( $value['picnum'] > 0)
		{
			$sqltmp = "SELECT `filepath` FROM  `".tname('pic')."` WHERE `doid`='".$value['doid']."' ORDER BY  `dateline` ASC";
			$querytmp = $_SGLOBAL['db']->query($sqltmp);
			while ($valuetmp = $_SGLOBAL['db']->fetch_array($querytmp)) {
				$dolist[$count]['picpath'][] = $_SC['attachdir'].$valuetmp['filepath'];
			}
			
		}
		$dolist[$count]['comment'] = array();
		if( $value['replynum'] > 0)
		{
			$sqltmp1 = "SELECT `cid`,`topid`,`uid`,`dateline`,`message`,`authorid`,`author` FROM  `".tname('comment')."` WHERE `id`='".$value['doid']."' AND `idtype`='doid' AND `topid`='0' AND `delstatus`='0' ORDER BY  `dateline` ASC";
			$querytmp1 = $_SGLOBAL['db']->query($sqltmp1);
			while ($valuetmp1 = $_SGLOBAL['db']->fetch_array($querytmp1)) {
				$valuetmp1['username'] = $_SUSER[$valuetmp1['uid']];
				$dolist[$count]['comment'][] = $valuetmp1;
				$sqltmp2 = "SELECT `cid`,`topid`,`uid`,`dateline`,`message`,`authorid`,`author` FROM  `".tname('comment')."` WHERE `topid`='".$valuetmp1['cid']."' AND `delstatus`='0' ORDER BY  `dateline` ASC";
			$querytmp2 = $_SGLOBAL['db']->query($sqltmp2);
			while ($valuetmp2 = $_SGLOBAL['db']->fetch_array($querytmp2)) {
				$valuetmp2['username'] = $_SUSER[$valuetmp2['uid']];
				$dolist[$count]['comment'][] = $valuetmp2;
			}
			}
			
		}
		$count++;
	}
}
//print_r($dolist);
$multi = multi($allcount, $perpage, $page, $theurl);

$_TPL['css'] = 'shuoshuo';
include_once template("space_shuoshuo");
?>