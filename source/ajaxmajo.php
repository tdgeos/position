<?php
	
	header("Content-Type: text/html;charset=utf-8");
	require_once("../common.php");
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_blog.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
	$shcoName = $_GET['schoName'];
	$collName = $_GET['collName'];
//瀛﹂櫌

	$sql="select c.majoName from `".UC_TPRE."info_college` a inner join `".UC_TPRE."info_school` b on a.schoID=b.schoID inner join  `".UC_TPRE."info_major` c on c.collID=a.collID and c.schoID=a.schoID  where b.schoName = '$shcoName' and a.collName='$collName'";
	//echo $sql;
	$re=$_SGLOBAL['db']->query($sql);
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$coll[]=$array;
	}


?>
 <select name="college" id="majoid" onchange="study365ajax('/source/ajaxclas.php','schoName='+document.getElementById('schoid').value+'&collName='+document.getElementById('collegeid').value+'&majoName='+document.getElementById('majoid').value,'ajaxclas')">
 <option selected="selected">璇烽€夋嫨鐝骇</option>
      <?php for($i=0;$i<count($coll);$i++) { ?>
    <option value="<?php echo $coll[$i]['majoName']; ?>" ><?php echo $coll[$i]['majoName']; ?></option>		
    <?php } ?>
<!--{/loop}-->
</select>
