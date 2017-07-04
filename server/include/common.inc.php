<?php
/**
 * @version        $Id: common.inc.php 3 17:44 2010-11-23 tianya $
 * @package        DedeCMS.Libraries
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */

// 报错级别设定,一般在开发环境中用E_ALL,这样能够看到所有错误提示
// 系统正常运行后,直接设定为E_ALL || ~E_NOTICE,取消错误显示
// error_reporting(E_ALL);
error_reporting(E_ALL || ~E_NOTICE);
define('XXXINC', str_replace("\\", '/', dirname(__FILE__) ) );
define('XXXROOT', str_replace("\\", '/', substr(XXXINC,0,-8) ) );
define('XXXDATA', XXXROOT.'/data');

define('DEBUG_LEVEL', FALSE);

//是否启用mb_substr替换cn_substr来提高效率
$cfg_is_mb = $cfg_is_iconv = FALSE;
if(function_exists('mb_substr')) $cfg_is_mb = TRUE;
if(function_exists('iconv_substr')) $cfg_is_iconv = TRUE;

//Session保存路径
$sessSavePath = XXXDATA."/sessions/";
if(is_writeable($sessSavePath) && is_readable($sessSavePath))
{
    session_save_path($sessSavePath);
}

//系统配置参数
require_once(XXXDATA."/config.cache.inc.php");

//数据库配置文件
require_once(XXXDATA.'/common.inc.php');


//全局常用函数
require_once(XXXINC.'/common.func.php');


//Session跨域设置
if(!empty($cfg_domain_cookie))
{
    @session_set_cookie_params(0,'/',$cfg_domain_cookie);
}

//php5.1版本以上时区设置
//由于这个函数对于是php5.1以下版本并无意义，因此实际上的时间调用，应该用MyDate函数调用
if(PHP_VERSION > '5.1')
{
    $time51 = $cfg_cli_time * -1;
    @date_default_timezone_set('Etc/GMT'.$time51);
}

//引入数据库类
if ($GLOBALS['cfg_mysql_type'] == 'mysqli' && function_exists("mysqli_init"))
{
    require_once(XXXINC.'/dedesqli.class.php');
} else {
    require_once(XXXINC.'/dedesql.class.php');
}

?>
