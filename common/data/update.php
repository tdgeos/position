<?php
	
	header("Content-Type: text/html;charset=utf-8");
	
	require_once("../../common.php");
	require_once(S_ROOT."./data/preg.php");
	$query = $_SGLOBAL['db']->query("SELECT * FROM `".UC_TPRE."info_length`");
	while( $row = $_SGLOBAL['db']->fetch_array($query) )
	{
		$LENGTH[$row['name']]['min'] = $row['min'];
		$LENGTH[$row['name']]['max'] = $row['max'];
	}
	

	$file = "length.js";
	$fp = fopen($file, "wb");
	foreach ( $LENGTH as $key1=>$value1)
	{
		foreach ($value1 as $key2=>$value2)
		{
			fwrite($fp,"length_".$key1."_".$key2."=".$value2.";\r\n");
		}
	}
	fclose($fp);
	//print_r($LENGTH);
	exit(-1);
?>