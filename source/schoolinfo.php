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
$uid=$_SGLOBAL['supe_uid'];
$sql="select * from `".UC_MEMBER."schoolinfo` where uid=".$uid;
	$re=$_SGLOBAL['db']->query($sql);
	while($arrayj= $_SGLOBAL['db']->fetch_array($re)){
		$schoNamej=$arrayj['schoName'];
		$collNamej=$arrayj['collName'];
		$majoNamej=$arrayj['majoName'];
		$clasNamej=$arrayj['clasName'];
		$collRolej=$arrayj['collRole'];
		$majoRolej=$arrayj['majoRole'];
		$schoRolej=$arrayj['schoRole'];
		$clasRolej=$arrayj['clasRole'];
	}
	$type = $_GET['type'];
	$schoName = trim(urldecode($_GET['schoName']));
	$collName = trim(urldecode($_GET['collName']));
	$majoName = trim(urldecode($_GET['majoName']));
	$schoNames[]= "所有学校";	
	$collNames[]='所有学院';	
	$majoNames[]='所有专业';
	$clasNames[]='所有班级';	
	$mschoName= "所有学校";
	$mcollName='所有学院';	
	$mmajoName='所有专业';
	$mclasName='所有班级';
	$mschoName = $schoName;
	//大学
	if($schoRolej != 0)
	{	
		$sql="select * from `".UC_TPRE."info_school` ";
		$re=$_SGLOBAL['db']->query($sql);
		
		while($array= $_SGLOBAL['db']->fetch_array($re)){
		$schoNames[]= trim($array['schoName']);	  
		}
		$mschoName = $schoName;
	}else{
		$schoNames[]=$schoNamej;
	}
	//学院
	if($type >= 1)
	{
		if($collRolej != 0)
		{
			if($schoName != '所有学校' )
			{		  
			  $sql="select * from `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID where a.schoName='$schoName'";
			  $re=$_SGLOBAL['db']->query($sql);
		
			  while($array= $_SGLOBAL['db']->fetch_array($re)){
				  $collNames[]=trim($array['collName']);
			  }
			}
		}else{
			$collNames[] = $collNamej;
		}
	}
	if($type == 1)
	{
		$majoNames=array();
	    $clasNames=array();
		$majoNames[]='所有专业';
	    $clasNames[]='所有班级';
		
	}

	if($type >= 2){
		if($majoRolej != 0)
		{	
			$mcollName=$collName;
			if($collName != '所有学院')
			{	
			$sql="select * from  `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID inner join `".UC_TPRE."info_major` c on c.schoID=b.schoID and c.collID=b.collID  where schoName='$mschoName' and b.collName='$mcollName'";	  
			  $re=$_SGLOBAL['db']->query($sql);	
			  while($array= $_SGLOBAL['db']->fetch_array($re)){
				  $majoNames[]=trim($array['majoName']);
			  }
			}
		}else{
			$majoNames[] = $majoNamej;
		}
	}
	if($type == 2)
	{
	    $clasNames=array();
	    $clasNames[]='所有班级';
		
	}
	if($type >= 3){		
		if($clasRolej != 0)
		{
			$mmajoName=$majoName;
			if($majoName != '所有专业')
			{	
			$sql="select * from  `".UC_TPRE."info_school` a inner join `".UC_TPRE."info_college` b on a.schoID=b.schoID inner join `".UC_TPRE."info_major` c on c.schoID=b.schoID and c.collID=b.collID inner join `".UC_TPRE."info_class` d on d.schoID=c.schoID and d.collID=c.collID  and d.majoID=c.majoID  where a.schoName='$mschoName' and b.collName='$mcollName' and c.majoName='$mmajoName'";  
			  $re=$_SGLOBAL['db']->query($sql);	
			  while($array= $_SGLOBAL['db']->fetch_array($re)){
				  $clasNames[]=trim($array['clasName']);
			  }
			}
		}else{
			$clasNames[] = $clasNamej;
		}
	}


?>
<select name="scho" id="schoid" onchange="study365ajax('/source/schoolinfo.php','type=1&schoName='+getselectvalue('schoid')+'&collName='+getselectvalue('collegeid')+'&majoName='+getselectvalue('majoid'),'schoolinfo')">
      <?php for($i=0;$i<count($schoNames);$i++) { ?>
    <option value="<?php echo trim($schoNames[$i]); ?>" <?php if( trim($schoNames[$i])==trim($mschoName)) echo "selected"; ?> ><?php echo trim($schoNames[$i]); ?></option>		
    <?php } ?>
</select>
<select name="coll" id="collegeid" onchange="study365ajax('/source/schoolinfo.php','type=2&schoName='+getselectvalue('schoid')+'&collName='+getselectvalue('collegeid')+'&majoName='+getselectvalue('majoid'),'schoolinfo')">
      <?php for($i=0;$i<count($collNames);$i++) { ?>
    <option value="<?php echo trim($collNames[$i]); ?>" <?php if(trim($collNames[$i])==trim($mcollName)) echo "selected"; ?> ><?php echo trim($collNames[$i]); ?></option>		
    <?php } ?>
</select>

 <select name="majo" id="majoid" onchange="study365ajax('/source/schoolinfo.php','type=3&schoName='+getselectvalue('schoid')+'&collName='+getselectvalue('collegeid')+'&majoName='+getselectvalue('majoid'),'schoolinfo')">
      <?php for($i=0;$i<count($majoNames);$i++) { ?>
    <option value="<?php echo trim($majoNames[$i]); ?>" <?php if(trim($majoNames[$i])==trim($mmajoName)) echo "selected"; ?> ><?php echo trim($majoNames[$i]); ?></option>		
    <?php } ?>
</select>

<select name="class" id="clasid" >
     <?php for($i=0;$i<count($clasNames);$i++) { ?>
    <option value="<?php echo trim($clasNames[$i]); ?>" <?php if(trim($clasNames[$i])==trim($mclasNames)) echo "selected"; ?> ><?php echo trim($clasNames[$i]); ?></option>		
    <?php } ?>
</select>


