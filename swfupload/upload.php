<?php

	header("Content-Type: text/html;charset=utf-8");
	@require_once("../common/data/xxx_common.php");
	@require_once(XXXROOT."/source/function_common.php");
	@require_once(XXXROOT."/source/function_cp.php");

	//check userlogin satus
	$strcookie = xxxgetcookie("auth",true);
	if($strcookie == '')
	{
		echo "ERROR:请登陆后再执行操作";
		exit(-1);
	}
	$values = explode("\t",$strcookie);
	if(count($values) != 2)
	{
		echo "ERROR:请登陆后再执行操作";
		exit(-1);
	}
	$_SGLOBAL['supe_uid'] = $uid = $values[1];
	if( (!is_numeric($uid)) || $uid <=0)
	{
		echo "ERROR:请登陆后再执行操作";
		exit(-1);
	}
	if(!function_exists(getfilepath))
	{
		echo "ERROR:系统内部错误";
		exit(-1);
	}
	$srcpath = xxxgetfilepath("jpg",true,"../");
	


	// Check the upload
	if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
		echo "ERROR:请选择正确的图片文件";
		exit(0);
	}
	
	if( copy($_FILES["Filedata"]["tmp_name"],"../".$_SC['attachdir'].'./'.$srcpath) == false)
	{
		echo "ERROR:系统内部错误";
		exit(-1);		
	}
	

	// Get the image and create a thumbnail
	$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
	if (!$img) {
		$img = imagecreatefrompng($_FILES["Filedata"]["tmp_name"]);
	}
	if (!$img) {
		echo "ERROR:could not create image handle ". $_FILES["Filedata"]["tmp_name"];
		exit(0);
	}

	$width = imageSX($img);
	$height = imageSY($img);

	if (!$width || !$height) {
		echo "ERROR:Invalid width or height";
		exit(0);
	}

	// Build the thumbnail
	$target_height = 100;
	$target_width = round($target_height*$width/$height);
	
	$target_ratio = $target_width / $target_height;

	$img_ratio = $width / $height;

	if ($target_ratio > $img_ratio) {
		$new_height = $target_height;
		$new_width = $img_ratio * $target_height;
	} else {
		$new_height = $target_width / $img_ratio;
		$new_width = $target_width;
	}

	if ($new_height > $target_height) {
		$new_height = $target_height;
	}
	if ($new_width > $target_width) {
		$new_height = $target_width;
	}

	$new_img = ImageCreateTrueColor($target_width, $target_height);
	if (!@imagefilledrectangle($new_img, 0, 0, $target_width-1, $target_height-1, 0)) {	// Fill the image black
		echo "ERROR:Could not fill new image";
		exit(0);
	}

	if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
		echo "ERROR:Could not resize image";
		exit(0);
	}
	imagejpeg($new_img,"../".$_SC['attachdir'].'./'.$srcpath.".thumb.jpg",80);
	
	echo "FILEID:".$_SC['attachdir'].'./'.$srcpath.".thumb.jpg";
	exit(0);


	

	//echo "FILEID:" . $file_id;	// Return the file id to the script
	
?>
<?php
//获取上传路径
function xxxgetfilepath($fileext, $mkdir=false,$fixpath='') {
	global $_SGLOBAL, $_SC;

	$filepath = "{$_SGLOBAL['supe_uid']}_{$_SGLOBAL['timestamp']}".random(4).".$fileext";
	$name1 = gmdate('Ym');
	$name2 = gmdate('j');

	if($mkdir) {
		$newfilename = $fixpath.$_SC['attachdir'].'./'.$name1;
		//echo $newfilename."kkkk";
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				return $filepath;
			}
		}
		$newfilename .= '/'.$name2;
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				return $name1.'/'.$filepath;
			}
		}
	}
	return $name1.'/'.$name2.'/'.$filepath;
}
?>