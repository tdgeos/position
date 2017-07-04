<?php
define('XXXINC', str_replace("\\", '/', dirname(__FILE__) ) );
define('XXXROOT', str_replace("\\", '/', substr(XXXINC,0,-12) ) );
require_once(XXXROOT."/config.php");
require_once(XXXROOT."/common.php");


function xxxgetcookie($var,$authcode=false)
{
	global $_SGLOBAL, $_SC, $_SERVER;
	$rs = $_COOKIE[$_SC['cookiepre'].$var];
	//print_r($_COOKIE);
	if($authcode == true)
	{
		$rs = authcode($rs,'DECODE');
	}
	return $rs;
}
function ssetcookie($var, $value, $life=0) {
	global $_SGLOBAL, $_SC, $_SERVER;
	setcookie($_SC['cookiepre'].$var, $value, $life?($_SGLOBAL['timestamp']+$life):0, $_SC['cookiepath'], $_SC['cookiedomain'], $_SERVER['SERVER_PORT']==443?1:0);
}

?>