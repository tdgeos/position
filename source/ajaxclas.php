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
	$majoName = $_GET['majoName'];


$sql="SELECT d.clasName
FROM `".UC_TPRE."info_college` a
INNER JOIN `".UC_TPRE."info_school` b ON a.schoID = b.schoID
INNER JOIN `".UC_TPRE."info_major` c ON c.collID = a.collID
AND c.schoID = a.schoID
INNER JOIN `".UC_TPRE."info_class` d ON d.schoID = a.schoID
AND d.collID = a.collID
AND d.majoID = c.majoID
WHERE b.schoName =  '$shcoName'
AND a.collName =  '$collName'
AND c.majoName =  '$majoName'";

	$re=$_SGLOBAL['db']->query($sql);
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$coll[]=$array;
	}


?>
     <select name="classid" id="classid">
     <option selected="selected">请选择系所</option>
      <?php for($i=0;$i<count($coll);$i++) { ?>
    <option value="<?php echo $coll[$i]['clasName']; ?>" ><?php echo $coll[$i]['clasName']; ?></option>		
     <?php } ?>
</select>
