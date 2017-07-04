<?php
	
	header("Content-Type: text/html;charset=utf-8");
	
	require_once("../../common.php");
	$file =S_ROOT."./common/data/guser.php";
	$fp = fopen($file, "wb");
	fwrite($fp,"<?php\r\n");
	fwrite($fp,"\$_SUSER = array();\r\n");
	//$_SC = array($_SUSER = array(););
	//$_SC['dbhost']  		= 'localhost'; //服务器地址
	$query = $_SGLOBAL['db']->query("SELECT `uid`,`username` FROM `".UC_TPRE."ucenter_members`");
	while( $row = $_SGLOBAL['db']->fetch_array($query) )
	{
		fwrite($fp,"\$_SUSER[".$row["uid"]."] = \"".$row["username"]."\";\r\n");
		
	}
	fwrite($fp,"?>\r\n");
	fclose($fp);
	//print_r($LENGTH);
	exit(-1);
?>