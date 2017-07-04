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
//学院

	$sql="select a.collName from `".UC_TPRE."info_college` a inner join `".UC_TPRE."info_school` b on a.schoID=b.schoID where b.schoName = '$shcoName' ";
	//echo $sql;
	$re=$_SGLOBAL['db']->query($sql);
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$coll[]=$array;
	}


?>
<select name="coll" id="collegeid" onchange="study365ajax('/source/ajaxmajo.php','schoName='+document.getElementById('schoid').value+'&collName='+document.getElementById('collegeid').value,'ajaxmajo')">
<option selected="selected">请选择学院</option>
      <?php for($i=0;$i<count($coll);$i++) { ?>
    <option value="<?php echo $coll[$i]['collName']; ?>" ><?php echo $coll[$i]['collName']; ?></option>		
    <?php } ?>
<!--{/loop}-->
</select>
