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

	$sql="select * from `".UC_TPRE."info_school` ";
	$re=$_SGLOBAL['db']->query($sql);
   $c1=0;
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$msg->schoName->$c1 = $array['schoName'];	
		$sql="select * from `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID where a.schoName='".$array['schoName']."'";
		echo $sql;
		  $re2=$_SGLOBAL['db']->query($sql);
		  $c2=0;
		  while($array2= $_SGLOBAL['db']->fetch_array($re2)){
			  $msg->schoName->$c1->collname->$c2=$array2['collName'];
			  $sql="select * from  `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID inner join `".UC_TPRE."info_major` c on c.schoID=b.schoID and c.collID=b.collID  where schoName='".$array['schoName']."' and b.collName='".$array2['collName']."'";	  
		  $re3=$_SGLOBAL['db']->query($sql);
		  $c3=0;	
		  while($array3= $_SGLOBAL['db']->fetch_array($re3)){
			  $msg->schoName[$c1]->collname[$c2]->majoName[$c3]=$array3['majoName'];
			  		$sql="select * from  `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID inner join `".UC_TPRE."info_major` c on c.schoID=b.schoID and c.collID=b.collID inner join `".UC_TPRE."info_class` d on d.schoID=c.schoID and d.collID=c.collID  and d.majoID=c.majoID  where a.schoName='".$array['schoName']."' and b.collName='".$array2['collName']."' and c.majoName='".$array3['majoName']."'";  
		  $re4=$_SGLOBAL['db']->query($sql);	
		  $c4=0;
		  while($array4= $_SGLOBAL['db']->fetch_array($re4)){
			  $msg->schoName[$c1]->collname[$c2]->majoName[$c3]->clasName[$c4]==$array4['clasName'];
			  $c4++;
		  }

		  $c3++;
		  }
		  $c2++;
		} 
		  $c1++; 
	}
	
	exit(-1);

	  


	if($type == 1)
	{
		$majoNames[]=array();
	    $clasNames[]=array();
		$majoNames[]='鎵€鏈変笓涓?;
	    $clasNames[]='鎵€鏈夌彮绾?;
		
	}

	if($type >= 2){
		$mcollName=$collName;
		if($collName != '鎵€鏈夊闄?)
		{	
		$sql="select * from  `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID inner join `".UC_TPRE."info_major` c on c.schoID=b.schoID and c.collID=b.collID  where schoName='$mschoName' and b.collName='$mcollName'";	  
		  $re=$_SGLOBAL['db']->query($sql);	
		  while($array= $_SGLOBAL['db']->fetch_array($re)){
			  $majoNames[]=$array['majoName'];
		  }
		}
	}
	if($type == 2)
	{
	    $clasNames[]=array();
	    $clasNames[]='鎵€鏈夌彮绾?;
		
	}
		if($type >= 3){
		$mmajoName=$majoName;
		if($majoName != '鎵€鏈変笓涓?)
		{	
		$sql="select * from  `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID inner join `".UC_TPRE."info_major` c on c.schoID=b.schoID and c.collID=b.collID inner join `".UC_TPRE."info_class` d on d.schoID=c.schoID and d.collID=c.collID  and d.majoID=c.majoID  where a.schoName='$mschoName' and b.collName='$mcollName' and c.majoName='$mmajoName'";  
		  $re=$_SGLOBAL['db']->query($sql);	
		  while($array= $_SGLOBAL['db']->fetch_array($re)){
			  $clasNames[]=$array['clasName'];
		  }
		}
	}


?>
<select name="scho" id="schoid" onselect="study365ajax('/source/schoolinfo.php','type=1&schoName='+document.getElementById('schoid').value+'&collName='+document.getElementById('collegeid').value+'&majoName='+document.getElementById('majoid').value,'schoolinfo')">
      <?php for($i=0;$i<count($schoNames);$i++) { ?>
    <option value="<?php echo $schoNames[$i]; ?>" <?php if($schoNames[$i]==$mschoName) echo "selected"; ?> ><?php echo $schoNames[$i]; ?></option>		
    <?php } ?>
</select>
<select name="coll" id="collegeid" onselect="study365ajax('/source/schoolinfo.php','type=2&schoName='+document.getElementById('schoid').value+'&collName='+document.getElementById('collegeid').value+'&majoName='+document.getElementById('majoid').value,'schoolinfo')">
      <?php for($i=0;$i<count($collNames);$i++) { ?>
    <option value="<?php echo $collNames[$i]; ?>" <?php if($collNames[$i]==$mcollName) echo "selected"; ?> ><?php echo $collNames[$i]; ?></option>		
    <?php } ?>
</select>

 <select name="majo" id="majoid" onselect="study365ajax('/source/schoolinfo.php.php','type=3&schoName='+document.getElementById('schoid').value+'&collName='+document.getElementById('collegeid').value+'&majoName='+document.getElementById('majoid').value,'schoolinfo')">
      <?php for($i=0;$i<count($majoNames);$i++) { ?>
    <option value="<?php echo $majoNames[$i]; ?>" <?php if($majoNames[$i]==$mmajoName) echo "selected"; ?> ><?php echo $majoNames[$i]; ?></option>		
    <?php } ?>
</select>

<select name="class" id="clasid" >
 <option value="鎵€鏈夌彮绾?>鎵€鏈夌彮绾?/option>
     <?php for($i=0;$i<count($clasNames);$i++) { ?>
    <option value="<?php echo $clasNames[$i]; ?>" <?php if($clasNames[$i]==$mclasNames) echo "selected"; ?> ><?php echo $clasNames[$i]; ?></option>		
    <?php } ?>
</select>


