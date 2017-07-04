<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/showmessage|template/default/header|template/default/footer', '1383480289', 'template/default/showmessage');?><?php $_TPL['nosidebar']=1; ?>
﻿<?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="author" content="netease"/>
<meta name="version" content="1.0"/>
<meta http-equiv="content-type" content="text/html; charset=<?=$_SC['charset']?>" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title><?php if($_SN[$space['uid']]) { ?><?=$_SN[$space['uid']]?> - <?php } ?>中国矿业大学室内外位置服务系统</title>
<script language="javascript" type="text/javascript" src="source/script_cookie.js"></script>
<script language="javascript" type="text/javascript" src="source/script_common.js"></script>
<script language="javascript" type="text/javascript" src="source/script_menu.js"></script>
<script language="javascript" type="text/javascript" src="source/script_ajax.js"></script>
<script language="javascript" type="text/javascript" src="source/script_face.js"></script>
<script language="javascript" type="text/javascript" src="source/script_manage.js"></script>
<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<style type="text/css">
@import url(template/default/style.css);
@import url(css/pt_lib_macro.css);
<?php if($_TPL['css']) { ?>
@import url(template/default/<?=$_TPL['css']?>.css);
<?php } ?>
<?php if($_SCONFIG['template'] != 'default') { ?>
@import url(template/<?=$_SCONFIG['template']?>/style.css);
<?php } ?>
<?php if(!empty($_SGLOBAL['space_css'])) { ?>
<?=$_SGLOBAL['space_css']?>
<?php } ?>
</style>
<link rel="shortcut icon" href="image/favicon.png" />
<link rel="edituri" type="application/rsd+xml" title="rsd" href="xmlrpc.php?rsd=<?=$space['uid']?>" />   
   <script type="text/javascript">
   (function(window,document){
        if(top!=window) top.location=location.href;
        document.uniqueID!=document.uniqueID&&!!location.hash&&(location.hash=location.hash);
        window.focus();
    })(this,document);

window.isInDashboard = true;
</script>

</head>
<body class="page-lofter">

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="header">
<?php if($_SGLOBAL['ad']['header']) { ?><div id="ad_header"><?php adshow('header'); ?></div><?php } ?>
<div id="lofterheadbar" class="g-hd">
    <h1 class="m-logo"><a>中国矿业大学室内外位置服务系统</a></h1>
    <div class="m-nav" id="topbar">
        <ul class="nav1 tbtag">
            <li class=""><a href="space.php?do=home">首页</a></li>
<li class=""><a href="space.php?do=map">地图</a></li>
            <li class=""><a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>&do=blog&view=both">公告</a></li>
                <li class=""><a href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>">消息<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>(新)<?php } ?></a></li>
            <li>
            	<a href="#" class="tbtag" onclick="abb2.className='a-w-sel a-w-sel-4 tbtag a-w-sel-do';abb1.style.marginTop=0" >更多<span class="more tbtag">&nbsp;&nbsp;&nbsp;</span></a>
                    <!--onclick是更多的鼠标点击响应事件-->
            	<div id="abb2" class="a-w-sel a-w-sel-4 tbtag" onmousemove="abb2.className='a-w-sel a-w-sel-4 tbtag a-w-sel-do';abb1.style.marginTop=0" >
                    <!--定义id abb2 挡鼠标在此区域 时候触发abb2的class显示内容-->
            	<div class="w-sel w-sel-4" id="abb1" style="margin-top: -240px; ">
                	<div class="selc">
                    	<div class="selcc tbtag">
                            <div class="seli"><a class="nx-1" href="cp.php?ac=profile">帐号设置</a></div>
                            <div class="seli"><a class="nx-2" href="cp.php?ac=friend&op=search">寻找好友</a></div>
                            <div class="seli"><a class="nx-3" href="cp.php?ac=common&op=logout&uhash=<?=$_SGLOBAL['uhash']?>">退出</a></div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        </ul>
    </div>
</div>
</div>

<div id="wrap" onmouseover="abb2.className='a-w-sel a-w-sel-4 tbtag ';abb1.style.marginTop=-240" >
<!--当鼠标进入此区域时abb2的事件将abb1移除显示区域-->
<?php if(empty($_TPL['nosidebar'])) { ?>
<div id="main">
<div id="mainarea">
<?php if($_SGLOBAL['ad']['contenttop']) { ?><div id="ad_contenttop"><?php adshow('contenttop'); ?></div><?php } ?>
<?php } ?>

<?php } ?>


<div class="showmessage">
<div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<caption>
<h2>信息提示</h2>
</caption>
<p><?=$message?></p>
<p class="op">
<?php if($url_forward) { ?>
<a href="<?=$url_forward?>">页面跳转中...</a>
<?php } else { ?>
<a href="javascript:history.go(-1);">返回上一页</a> | 
<a href="index.php">返回首页</a>
<?php } ?>
</p>
</div></div></div></div>
</div>
<?php if(empty($_SGLOBAL['inajax'])) { ?>
<?php if(empty($_TPL['nosidebar'])) { ?>
<?php if($_SGLOBAL['ad']['contentbottom']) { ?><br style="line-height:0;clear:both;"/><div id="ad_contentbottom"><?php adshow('contentbottom'); ?></div><?php } ?>
</div>

<!--/mainarea-->

</div>
<!--/main-->
<?php } ?>

<div id="footer">

<p class="r_option">
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>
</p>

<?php if($_SGLOBAL['ad']['footer']) { ?>
<p style="padding:5px 0 10px 0;"><?php adshow('footer'); ?></p>
<?php } ?>

<?php if($_SCONFIG['close']) { ?>
<span style="color:blue;font-weight:bold;">
提醒：当前站点处于关闭状态
</span>
<?php } ?>
<span class="txt">
中国矿业大学室内外位置服务系统
</span>
<span class="txt">
中国矿业大学 &copy; 2013 北京思行伟业数码科技有限公司
</span>
<?php if($_SCONFIG['debuginfo']) { ?>
<span><?php echo debuginfo(); ?></span>		<?php } ?>
</div>
</div>
<!--/wrap-->

<?php if($_SGLOBAL['supe_uid']) { ?>
<?php if(!isset($_SCOOKIE['checkpm'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=pm&op=checknewpm&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php if(!isset($_SCOOKIE['synfriend'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=friend&op=syn&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php } ?>
<?php if(!isset($_SCOOKIE['sendmail'])) { ?>
<script language="javascript"  type="text/javascript" src="do.php?ac=sendmail&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>

<?php if($_SGLOBAL['ad']['couplet']) { ?>
<script language="javascript" type="text/javascript" src="source/script_couplet.js"></script>
<div id="uch_couplet" style="z-index: 10; position: absolute; display:none">
<div id="couplet_left" style="position: absolute; left: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<div id="couplet_rigth" style="position: absolute; right: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<script type="text/javascript">
lsfloatdiv('uch_couplet', 0, 0, '', 0).floatIt();
</script>
</div>
<?php } ?>
<?php if($_SCOOKIE['reward_log']) { ?>
<script type="text/javascript">
showreward();
</script>
<?php } ?>
</body>
</html>
<?php } ?>
<?php ob_out();?>