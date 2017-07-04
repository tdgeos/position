<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_doing.php 13245 2009-08-25 02:01:40Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$topid = empty($_GET['topid'])?0:intval($_GET['topid']);
$uid = empty($_GET['uid'])?0:intval($_GET['uid']);
$id = empty($_GET['id'])?0:intval($_GET['id']);
if(empty($_POST['refer'])) $_POST['refer'] = "space.php?do=doing&view=me";

$fp = fopen("upload.txt", "r");
while (!feof($fp)) {
  $current_line = fgets($fp);
}

$ar=explode(',',$current_line);
fclose($fp);
$imgfile=array();
for($i=0;$i<=count($ar);$i++){
		if($i==0){
			$imgfile['name']=$ar[0];	
		}else if($i==1){
			$imgfile['type']=$ar[1];
		}else if($i==2){
			$imgfile['tmp_name']=$ar[2];
		}else if($i==3){
			$imgfile['error']=$ar[3];
		}else if($i==4){
			$imgfile['size']=$ar[4];
		}
}//print_r($imgfile);
$file=$imgfile['tmp_name'];

/*
//保存图片
function my_pic_save($FILE) {
	global $_SGLOBAL, $_SCONFIG, $space, $_SC;
	
	//允许上传类型
	$allowpictype = array('jpg');

	//检查
	$FILE['size'] = intval($FILE['size']);
	//echo $FILE['size']."<br>",$FILE['tmp_name']."<br>",$FILE['error'];die;
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('请上传图片');
	}

	//判断后缀
	$fileext = fileext($FILE['name']);
	if(!in_array($fileext, $allowpictype)) {
		return cplang('only_allows_upload_file_types');
	}

	//获取目录
	if(!$filepath = getfilepath($fileext, true)) {
		return cplang('unable_to_create_upload_directory_server');
	}

	//检查空间大小
	if(empty($space)) {
		$space = getspace($_SGLOBAL['supe_uid']);
	}
	
	//用户组
	if(!checkperm('allowupload')) {
		ckspacelog();
		return cplang('inadequate_capacity_space');
	}
	
	//新用户见习
	if(!cknewuser(1)) {
		return cplang('inadequate_capacity_space');
	}

	$maxattachsize = checkperm('maxattachsize');//单位MB
	if($maxattachsize) {//0为不限制
		if($space['attachsize'] + $FILE['size'] > $maxattachsize + $space['addsize']) {
			return cplang('inadequate_capacity_space');
		}
	}

	//本地上传
	$new_name = $_SC['attachdir'].$filepath;
	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('mobile_picture_temporary_failure');
	}

	$return = array('filepath'=>$new_name);



	return $return;
	}*/
if(submitcheck('addsubmit')) {

	$add_doing = 1;
	//提交文字
	if(empty($_POST['spacenote'])) {
		if(!checkperm('allowdoing')) {
			ckspacelog();
			showmessage('no_privilege');
		}
		
		//实名认证
		ckrealname('doing');
		
		//视频认证
		ckvideophoto('doing');
		
		//新用户见习
		cknewuser();
	
		//验证码
		if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
			showmessage('incorrect_code');
		}
	
		//判断否操作太快
		$waittime = interval_check('post');
		if($waittime > 0) {
			showmessage('operating_too_fast', '', 1, array($waittime));
		}
	} else {
		if(!checkperm('allowdoing')) {
			$add_doing = 0;
		}

		//实名
		if(!ckrealname('doing', 1)) {
			$add_doing = 0;
		}
		//视频
		if(!ckvideophoto('doing', array(), 1)) {
			$add_doing = 0;
		}
		//新用户
		if(!cknewuser(1)) {
			$add_doing = 0;
		}
		$waittime = interval_check('post');
		if($waittime > 0) {
			$add_doing = 0;
		}
	}
	
	//获取记录
	$mood = 0;
	preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
	$mood = empty($ms[1])?0:intval($ms[1]);
	//$file=$_FILES['img']["name"];
	$message = getstr($_POST['message'], 200, 1, 1, 1);
	
	//心情图片
	$message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
		/*$_info=my_pic_save($imgfile);
		if(!empty($_info)){
			if(!is_array($_info)){
				showmessage($_info);
			}
			$file=$_info['filepath'];
			if(!empty($_FILES)){*/
			
			$filesize='1M';
			$new_file = 'attachement/'.time().'.jpg';
			move_uploaded_file($file,$new_file);
			//echo $file;die;
			if($file==''){
			
			}else{
			$message=$message."<br><img src=\"/\\$file\" class=\"face\" width=160px; height=120px;>";
			}
			//}
		//}
	//}

	 file_put_contents("upload.txt","");
	if(strlen($message) < 1) {
		showmessage('should_write_that');
	}
	if($add_doing) {
		$setarr = array(
			'uid' => $_SGLOBAL['supe_uid'],
			'username' => $_SGLOBAL['supe_username'],
			'dateline' => $_SGLOBAL['timestamp'],
			'message' => $message,
			'ip' => getonlineip()
		);
		//入库
		$newdoid = inserttable('doing', $setarr, 1);
	}
	
	//更新空间note
	$setarr = array('note'=>$message);
	$credit = $experience = 0;
	if(!empty($_POST['spacenote'])) {
		$reward = getreward('updatemood', 0);
		$setarr['spacenote'] = $message;
	} else {
		$reward = getreward('doing', 0);
	}
	updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
	
	if($reward['credit']) {
		$credit = $reward['credit'];
	}
	if($reward['experience']) {
		$experience = $reward['experience'];
	}
	$setarr = array(
		'mood' => "mood='$mood'",
		'updatetime' => "updatetime='$_SGLOBAL[timestamp]'",
		'credit' => "credit=credit+$credit",
		'experience' => "experience=experience+$experience",
		'lastpost' => "lastpost='$_SGLOBAL[timestamp]'"
	);
	if($add_doing) {
		if(empty($space['doingnum'])) {//第一次
			$doingnum = getcount('doing', array('uid'=>$space['uid']));
			$setarr['doingnum'] = "doingnum='$doingnum'";
		} else {
			$setarr['doingnum'] = "doingnum=doingnum+1";
		}
	}
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET ".implode(',', $setarr)." WHERE uid='$_SGLOBAL[supe_uid]'");
	
	//事件feed
	if($add_doing && ckprivacy('doing', 1)) {
		$feedarr = array(
			'appid' => UC_APPID,
			'icon' => 'doing',
			'uid' => $_SGLOBAL['supe_uid'],
			'username' => $_SGLOBAL['supe_username'],
			'dateline' => $_SGLOBAL['timestamp'],
			'title_template' => cplang('feed_doing_title'),
			'title_data' => saddslashes(serialize(sstripslashes(array('message'=>$message)))),
			'body_template' => '',
			'body_data' => '',
			'id' => $newdoid,
			'idtype' => 'doid'
		);
		$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//喜好hash
		$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//合并hash
		inserttable('feed', $feedarr);
	}

	//统计
	updatestat('doing');
	
	showmessage('do_success', $_POST['refer'], 0);

} elseif (submitcheck('commentsubmit')) {
	
	if(!checkperm('allowdoing')) {
		ckspacelog();
		showmessage('no_privilege');
	}
	
	//实名认证
	ckrealname('doing');
	
	//新用户见习
	cknewuser();
	
	//判断是否操作太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast', '', 1, array($waittime));
	}
	
	$message = getstr($_POST['message'], 200, 1, 1, 1);
	//替换表情
	$message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
	$message = preg_replace("/\<br.*?\>/is", ' ', $message);
	if(strlen($message) < 1) {
		showmessage('should_write_that');
	}
/*	
	$updo = array();
	if($topid) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE cid='$topid'");
		$updo = $_SGLOBAL['db']->fetch_array($query);
	}
	if(empty($updo) && $doid) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." WHERE doid='$doid'");
		$updo = $_SGLOBAL['db']->fetch_array($query);
	}
	if(empty($updo)) {
		showmessage('docomment_error');
	} else {
		//黑名单
		if(isblacklist($updo['uid'])) {
			showmessage('is_blacklist');
		}
	}
*/	
	$updo['id'] = intval($updo['id']);
	$updo['grade'] = intval($updo['grade']);
	
	$setarr = array(
	    'topid' => $topid,
		'uid' => $_SGLOBAL['supe_uid'],
		'id' => $doid,
		'idtype' => 'doid',
		'authorid' => $uid,
		'author' => $_SUSER[$uid],
		'ip' => getonlineip(),
		'dateline' => $_SGLOBAL['timestamp'],
		'message' => $message
	);
	
	/*//最多层级
	if($updo['grade'] >= 3) {
		$setarr['upid'] = $updo['upid'];//更母一个级别
	}
*/
	$newid = inserttable('comment', $setarr, 1);
	
	//更新回复数
	$_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum+1 WHERE doid='".$doid."'");
	
	//通知
	if($updo['uid'] != $_SGLOBAL['supe_uid']) {
		$note = cplang('note_doing_reply', array("space.php?do=doing&doid=$updo[doid]&highlight=$newid"));
		notification_add($updo['uid'], 'doing', $note);
		//奖励积分
		//getreward('comment',1, 0, 'doing'.$updo['doid']);
	}
	
	//统计
	//updatestat('docomment');
		
	showmessage('do_success', $_POST['refer'], 0);

}

//删除
if($_GET['op'] == 'delete') {
	
	if(submitcheck('deletesubmit')) {
		if($cid) {
			$sql = "UPDATE  `".tname('comment')."` SET  `delstatus` =  '1' WHERE  `cid` =".$cid." OR `topid` =".$cid."";
			//$allowmanage = checkperm('managedoing');
			$query = $_SGLOBAL['db']->query($sql);
			$_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum-1 WHERE doid='".$doid."'");
			
		} else {
			$sql = "UPDATE  `".tname('doing')."` SET  `delstatus` =  '1' WHERE  `doid` =".$doid;
			$query = $_SGLOBAL['db']->query($sql);
			$sql = "UPDATE  `".tname('comment')."` SET  `delstatus` =  '1' WHERE  `cid` =".$cid." OR `topid` =".$cid."";
			$query = $_SGLOBAL['db']->query($sql);
			$_SGLOBAL['db']->query("UPDATE ".tname('doing')." SET replynum=replynum-1 WHERE doid='".$doid."'");
			
			//include_once(S_ROOT.'./source/function_delete.php');
			//deletedoings(array($doid));
		}
		
		showmessage('do_success', $_POST['refer'], 0);
	}
	
} elseif ($_GET['op'] == 'getcomment') {
	if(empty($_GET['close'])) {
		$list = array();
			$sqltmp1 = "SELECT `cid`,`topid`,`uid`,`dateline`,`message`,`authorid`,`author` FROM  `".tname('comment')."` WHERE `id`='".$doid."' AND `idtype`='doid' AND `topid`='0' AND `delstatus`='0' ORDER BY  `dateline` ASC";
			$querytmp1 = $_SGLOBAL['db']->query($sqltmp1);
			while ($valuetmp1 = $_SGLOBAL['db']->fetch_array($querytmp1)) {
				$valuetmp1['username'] = $_SUSER[$valuetmp1['uid']];
				$list[] = $valuetmp1;
				$sqltmp2 = "SELECT `cid`,`topid`,`uid`,`dateline`,`message`,`authorid`,`author` FROM  `".tname('comment')."` WHERE `topid`='".$valuetmp1['cid']."' AND `delstatus`='0' ORDER BY  `dateline` ASC";
			$querytmp2 = $_SGLOBAL['db']->query($sqltmp2);
			while ($valuetmp2 = $_SGLOBAL['db']->fetch_array($querytmp2)) {
				$valuetmp2['username'] = $_SUSER[$valuetmp2['uid']];
				$list[] = $valuetmp2;
			}		
		}
	}
}
include template('cp_shuoshuo');



?>