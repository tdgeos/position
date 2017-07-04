<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_blog.php 13208 2009-08-20 06:31:35Z liguode $
*/
	header("Content-type:text/html;charset=utf-8");
	include_once('./common.php');
	if(!defined('IN_UCHOME')) {
		exit('Access Denied');
	}
	//需要登录
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
	}
	showmessage('to_login', 'index.php');
}
	$uid=$_SGLOBAL['supe_uid'];//获取当前用户id
	$minhot = $_SCONFIG['feedhotmin']<1?3:$_SCONFIG['feedhotmin'];
	
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page=1;
	$id = empty($_GET['id'])?0:intval($_GET['id']);
	$classid = empty($_GET['classid'])?0:intval($_GET['classid']);
	
	
	$sql="select * from `".UC_TPRE."info_member_schoolinfo` where uid=".$uid;
	$re=$_SGLOBAL['db']->query($sql);
	while($array= $_SGLOBAL['db']->fetch_array($re)){
		$schoName=$array['schoName'];
		$collName=$array['collName'];
		$majoName=$array['majoName'];
		$clasName=$array['clasName'];
		$collRole=$array['collRole'];
		$majoRole=$array['majoRole'];
		$schoRole=$array['schoRole'];
		$clasRole=$array['clasRole'];
	}
	//设定每一页显示的记录数     
	  $pagesize=3; 
	//表态分类
	@include_once(S_ROOT.'./data/data_click.php');
	$clicks = empty($_SGLOBAL['click']['blogid'])?array():$_SGLOBAL['click']['blogid'];

	//班级
	if($_GET['view'] == 'click') {  	
		
			if(!empty($schoName)&&!empty($collName)&&!empty($majoName)&&!empty($clasName)){
				$sql="select * from `".UC_TPRE."info_notice` where schoName='$schoName' and collName='$collName' and majoName='$majoName' and clasName='$clasName' and uid=$uid ";
				$ree=$_SGLOBAL['db']->query($sql);
				  while($value = $_SGLOBAL['db']->fetch_array($ree)){
					  $e[]=$value;
				  }
				  $count=count($e);
				  $pages=intval($count/$pagesize);  
				  if   ($numrows%$pagesize)     
				  $pages++;     
				  //判断页数设置与否，如无则定义为首页     
				  if   (!isset($page))     
				  $page=1;     
				  //判断转到页数     
				  if   (isset($ys))     
				  if   ($ys>$pages)     
				  $page=$pages;     
				  else     
				  $page=$ys;     
				  //计算记录偏移量     
				  $offset=$pagesize*($page-1); 
				
				  $sql=$sql."order   by   id   desc   limit   $offset,$pagesize";
				  $re=$_SGLOBAL['db']->query($sql);
				  $count=0;
				  while($value = $_SGLOBAL['db']->fetch_array($re)){
						$array[$count]=$value;
						$array[$count]['year']=substr(date('Y-m-d',$value["pubdate"]),0,4);
						$array[$count]['month']=substr(date('Y-m-d',$value["pubdate"]),5,2);
						$array[$count]['daty']=substr(date('Y-m-d',$value["pubdate"]),8);
						 $count++;
				  }
				 
				  
				  $first=1;     
				  $prev=$page-1;     
				  $next=$page+1;     
				  $last=$pages; 
				  $me="space.php?uid=$uid&do=blog&view=click";

			}
		  		 
	} else {
		
		    //大学
		    if($_GET['view'] == 'we') {
				if($schoName!=''){
					$sql="select * from `".UC_TPRE."info_notice` where schoName='$schoName'and collName='所有学院' and majoName='所有专业' and clasName='所有班级'";		
					$ree=$_SGLOBAL['db']->query($sql);
					while($value = $_SGLOBAL['db']->fetch_array($ree)){
						$e[]=$value;
					}
					$count=count($e);
					$pages=intval($count/$pagesize);  
				 
					 if   ($numrows%$pagesize)     
					$pages++;     
					//判断页数设置与否，如无则定义为首页     
					if   (!isset($page))     
					$page=1;     
					//判断转到页数     
					if   (isset($ys))     
					if   ($ys>$pages)     
					$page=$pages;     
					else     
					$page=$ys;     
					//计算记录偏移量     
					$offset=$pagesize*($page-1); 
					
					$sql=$sql ." order   by   id   desc   limit   $offset,$pagesize";
					$re=$_SGLOBAL['db']->query($sql);
					  $count=0;
					while($value = $_SGLOBAL['db']->fetch_array($re)){
						$array[$count]=$value;
						$array[$count]['year']=substr(date('Y-m-d',$value["pubdate"]),0,4);
						$array[$count]['month']=substr(date('Y-m-d',$value["pubdate"]),5,2);
						$array[$count]['daty']=substr(date('Y-m-d',$value["pubdate"]),8);
						$count++;
				   }
				   $first=1;     
				   $prev=$page-1;     
				   $next=$page+1;     
				   $last=$pages; 
				   $me="space.php?uid=$uid&do=blog&view=we";
	
				}
				
	} else {
		if(empty($space['feedfriend']) || $classid) $_GET['view'] = 'me';
		// 学院
		if($_GET['view'] == 'me') {
			if($schoName!=''&&$collName!=''){
				$sql="select * from `".UC_TPRE."info_notice` where schoName='$schoName'and collName='$collName' and majoName='$majoName' and clasName='所有班级'";
				$ree=$_SGLOBAL['db']->query($sql);
				while($value = $_SGLOBAL['db']->fetch_array($ree)){
					$e[]=$value;
				}
				$count=count($e);
				$pages=intval($count/$pagesize);   
				if($numrows%$pagesize)     
				   $pages++;     
				   //判断页数设置与否，如无则定义为首页     
				   if   (!isset($page))     
				   $page=1;     
				   //判断转到页数     
				   if   (isset($ys))     
				   if   ($ys>$pages)     
				   $page=$pages;     
				   else     
				   $page=$ys;     
				   //计算记录偏移量     
				   $offset=$pagesize*($page-1); 
				
				   $sql=$sql . " order   by   id   desc   limit   $offset,$pagesize";
				   $re=$_SGLOBAL['db']->query($sql);
				 while($value = $_SGLOBAL['db']->fetch_array($re)){
						$array[$count]=$value;
						$array[$count]['year']=substr(date('Y-m-d',$value["pubdate"]),0,4);
						$array[$count]['month']=substr(date('Y-m-d',$value["pubdate"]),5,2);
						$array[$count]['daty']=substr(date('Y-m-d',$value["pubdate"]),8);
						$count++;
				  }
				
				  
				  $first=1;     
				  $prev=$page-1;     
				  $next=$page+1;     
				  $last=$pages; 		
				  $me="space.php?uid=$uid&do=blog&view=me";			
			}
	    

	} else {
		//学院
		if($_GET['view'] == 'all') {
			if($schoName!=''&&$collName!=''){   //如果过滤的条件不为空执行下面程序
				 $sqlq="select * from `".UC_TPRE."info_notice` where schoName='$schoName'and collName='$collName' and majoName='所有专业' and clasName='所有班级'";
				 $ree=$_SGLOBAL['db']->query($sqlq);
				 while($value = $_SGLOBAL['db']->fetch_array($ree)){
					$e[]=$value;
				 }
				 $count=count($e);
				 $pages=intval($count/$pagesize);  
			   
				 if($numrows%$pagesize)     
				 $pages++;     
				 //判断页数设置与否，如无则定义为首页     
				 if   (!isset($page))     
				 $page=1;     
				 //判断转到页数     
				 if(isset($ys))     
				 if($ys>$pages)     
				 $page=$pages;     
				 else     
				 $page=$ys;     
				 //计算记录偏移量     
				 $offset=$pagesize*($page-1); 
				 $sql= $sqlq." order   by   id   desc   limit   $offset,$pagesize";
				 $re=$_SGLOBAL['db']->query($sql);
				 $count=0;
				 while($value = $_SGLOBAL['db']->fetch_array($re)){
					$array[$count]=$value;
					$array[$count]['year']=substr(date('Y-m-d',$value["pubdate"]),0,4);
						$array[$count]['month']=substr(date('Y-m-d',$value["pubdate"]),5,2);
						$array[$count]['daty']=substr(date('Y-m-d',$value["pubdate"]),8);
					$count++;
				 }
				 $first=1;     
				 $prev=$page-1;     
				 $next=$page+1;     
				 $last=$pages; 
				 $me="space.php?uid=$uid&do=blog&view=all";
			}
		
 
	}else{
		if($_GET['view'] == 'both') {
			if($schoName!=''){
				$sqlq="select * from `".UC_TPRE."info_notice` where  schoName='$schoName'";//uid=$uid and 
				
				$ree=$_SGLOBAL['db']->query($sqlq);
				while($value = $_SGLOBAL['db']->fetch_array($ree)){
					$e[]=$value;
				}
				$count=count($e);
				$pages=intval($count/$pagesize);  		   
				if($numrows%$pagesize)     
				$pages++;     
				//判断页数设置与否，如无则定义为首页     
				if   (!isset($page))     
				$page=1;     
				//判断转到页数     
				if(isset($ys))     
					if($ys>$pages)     
					$page=$pages;     
					else     
					$page=$ys;     
				//计算记录偏移量     
					$offset=$pagesize*($page-1); 
					$sql=$sqlq." limit   $offset,$pagesize";
					$re=$_SGLOBAL['db']->query($sql);
					  $count=0;
					while($value = $_SGLOBAL['db']->fetch_array($re)){
						$array[$count]=$value;
						$array[$count]['year']=substr(date('Y-m-d',$value["pubdate"]),0,4);
						$array[$count]['month']=substr(date('Y-m-d',$value["pubdate"]),5,2);
						$array[$count]['daty']=substr(date('Y-m-d',$value["pubdate"]),8);
						$count++;
					}
					
					$first=1;     
					$prev=$page-1;     
					$next=$page+1;     
					$last=$pages; 
					$me="space.php?uid=$uid&do=blog&view=both";
					}
					}
				}
			}
			}
			
			

	}
	include_once template("space_blog_list");


?>