<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/network', '1382166263', 'template/default/network');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="overflow: hidden;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中国矿业大学室内外位置服务系统 - 北京思行伟业数码科技有限公司</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta http-equiv="x-ua-compatible" content="ie=emulateie7"/>
<meta name="author" content="netease"/>
<meta name="version" content="1.0"/>
<meta name="description" content="中国矿业大学室内外位置服务系统 - 北京思行伟业数码科技有限公司"/>
<link href="template/<?=$_SCONFIG['template']?>/css/network.css" type="text/css" rel="stylesheet"/>
<script language="javascript" type="text/javascript" src="template/<?=$_SCONFIG['template']?>/js/jquery-1.9.0.js"></script>
</head>
<body>
<div id="back">
  <div class="m-logbg" style="opacity: 1;">
<img id="bg" src="http://imgcdn.ph.126.net/RU5gZ3MMTxA3Xqz7OlqvRQ==/3129438791169103886.jpg" style="width: 2162px; height: auto; margin-left: 0px; margin-top: -338.8918749999999px; visibility: visible; opacity: 1;">
</div>
<div id="hmain">

  <div class="m-stwrap1" id="mindex">

    <div class="f-cb" id="logoT">
        <div class="logo">
            <h1 class="f1">LOFTER</h1>
            <!-- <h2 class="f2">快速<span class="f3">、</span>漂亮<span class="f3">、</span>有趣的记录方式</h2> -->
        </div>
    </div>
    <div class="m-userlnks f-cb" style="position: absolute; left: 50%; margin-left: -310px; opacity: 1; visibility: visible; " id="mlogin">
      <a href="#" id="alogin" class="login ztag">登录</a>
      <a href="#" id="areg" class="reg ztag">注册</a>
      <a href="do.php?ac=lostpasswd" class="review ztag" target="_blank">找回密码<b>&gt;</b></a>
    </div>
    <div class="m-login ztag" id="loginbox" style=" height:390px; opacity: 0; overflow: hidden; z-index:100">
      <div class="arr" ><span></span></div>
      <div class="cont ztag" style="">
      <div style="position: absolute; left:50%; margin-left:-166px">
        <div id="loginformid" class="contl" style="opacity: 0; height:0">
      <form name="loginform" action="do.php?ac=<?=$_SCONFIG['login_action']?>&<?=$url_plus?>&ref" method="post" class="ztag">
      <ul class="w-user w-user-1">
        <li class="w0">
          <div class="inpt ztag">                                     
            <label id="llusername" class="ztag">用户名</label>
            <input id="lusername"  name="username"  class="txt" type="text" autocomplete="off" tabindex="1" >
          </div>
        </li>
        <li class="w0">
          <div  class="inpt">
            <label id="llpassword"  class="ztag">密码</label>
            <input type="password" name="password" id="lpassword" class="txt ztag" tabindex="2" >
          </div>
        </li>
        <li class="w0 w2">
          
          <input name="loginsubmit" id="loginsubmit" tabindex="3" type="submit" class="btn ztag" value="登录">
        </li>
        <li class="w0 w3 f-cb">
          <span class="chkbox ztag" style="font-size:12px;">
              <span class="c ztag j-ok">
              <input type="checkbox" id="cookietime" name="cookietime" value="315360000" <?=$cookiecheck?> style="margin-bottom: -2px;">
              </span>
              <a class="ztag" tabindex="3" href="#">记住密码</a>
          </span>
        </li>
      </ul>
      <input type="hidden" name="refer" value="<?=$refer?>" />
      <input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
      </form>
  </div>
<div id="regformid" style="opacity: 0; height:0">
  <form id="registerform" name="registerform" action="do.php?ac=<?=$_SCONFIG['register_action']?>&<?=$url_plus?>&ref" method="post" class="ztag">
    <ul class="w-user w-user-1">
        <li class="w0">
            <div class="inpt j-tfocus">
                <label id="lremail" class="ztag">常用邮箱</label>
                <input id="remail" class="txt" type="text" name="email" />
            </div>
        </li>
        <li class="w0">
            <div class="inpt">
                <label id="lrusername" class="ztag">用户名</label>
                <input type="text" id="rusername" name="rusername" class="txt" />
            </div>
        </li>
        <li class="w0">
            <div class="inpt"><label id="lrpassword" class="ztag">设置密码</label><input id="rpassword" type="password" name="password" class="txt ztag" ></div>
            <div class="warn" style="display:none;">
                <div class="warnc"><span class="icn">&nbsp;</span><span class="ztag">请输入6-16个字符的密码</span></div>
            </div>
        </li>
        <li class="w0">
            <div class="inpt"><label id="lrpassword2" class="ztag">重复密码</label><input type="password"  id="rpassword2" name="password2" class="txt ztag"></div>
            <div class="warn" style="display:none;">
                <div class="warnc"><span class="icn">&nbsp;</span><span class="ztag">请输入6-16个字符的密码</span></div>
            </div>
        </li>
        <li class="w0 w4 ztag">
            <div class="inpt">
                <label id="lrseccode" class="ztag">验证码</label><input type="text" id="rseccode" name="seccode" class="txt ztag" >
                <a href="javascript:void(0)" hidefocus="true" class="validt">
                <img class="ztag" width="85" height="38" src="http://www.lofter.com/cap/captcha.jpgx?h=38&amp;w=85">
                </a>
            </div>
            <div class="warn" style="display:none;">
                <div class="warnc"><span class="icn">&nbsp;</span><span class="ztag">验证码错误</span></div>
            </div>
        </li>
        <li class="w0 w2">
        <input type="hidden" name="refer" value="space.php?do=home" />
        <button type="submit" id="registersubmit" name="registersubmit" class="btn ztag" onClick="<?php if($register_rule) { ?>if(!checkClause()){return false;}<?php } ?>ajaxpost('registerform', 'register');"/><span>注册新用户</span></button>
        </li>
    </ul>
  </form>
</div>
           
      </div>
      </div>
     </div>
  </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
 $("#alogin").click(function(){
 if($("#loginbox").css("opacity") == 0 )
 {
$("#loginbox").css("opacity","1");
$("#loginformid").css({"opacity":"1","height":"auto"});
$("#regformid").css({"opacity":"0","height":"0"});
$("#loginbox .arr span").css("margin-left","-410px");

 }else{
 if($("#loginformid").css("opacity") == 0)
 {
 $("#loginbox").css("opacity","1");
 $("#loginformid").css({"opacity":"1","height":"auto"});
 $("#regformid").css({"opacity":"0","height":"0"});
 $("#loginbox .arr span").css("margin-left","-410px");
 }else{	
 $("#loginbox").css("opacity","0");
 $("#loginformid").css({"opacity":"0","height":"0"});
 $("#regformid").css({"opacity":"0","height":"0"});
 $("#loginbox .arr span").css("margin-left","-410px");
 }
 }
});

 $("#areg").click(function(){
 if($("#loginbox").css("opacity") == 0 )
 {
 	$("#loginbox").css("opacity","1");
$("#loginformid").css({"opacity":"0","height":"0"});
$("#regformid").css({"opacity":"1","height":"auto"});
$("#loginbox .arr span").css("margin-left","0");

 }else{
 if($("#regformid").css("opacity") == 0)
 {
 $("#loginbox").css("opacity","1");
 $("#loginformid").css({"opacity":"0","height":"0"});
 $("#regformid").css({"opacity":"1","height":"auto"});
 $("#loginbox .arr span").css("margin-left","0");

 }else{	
 $("#loginbox").css("opacity","0");
 $("#loginformid").css({"opacity":"0","height":"0"});
 $("#regformid").css({"opacity":"0","height":"0"});
 $("#loginbox .arr span").css("margin-left","0");
 }
 }
});
}); 

</script>
<script type="text/javascript">
$(document).ready(function(){
$("input").blur(function(){
var obj = $(this);
var id = obj.attr("id");
var value = obj.val();
var arr = [ "rusername", "rpassword","rpassword2","remail","rseccode"]; 
var arrv = [ "用户名", "设置密码","重复密码","常用邮箱","验证码"]; 
var index = $.inArray(id, arr);
if(index < 0 )
{
return '';
}		
var lid = 'l' + id;
if(value != '')
{
$('#'+lid).html('');
}else{
$('#'+lid).html(arrv[index]);
}
});
}); 
$(document).ready(function(){
$("input").focus(function(){
  	var obj = $(this);
var id = obj.attr("id");
var value = obj.val();
var arr = [ "rusername", "rpassword","rpassword","rpassword2","remail","rseccode"]; 
var index = $.inArray(id, arr);
if(index < 0 )
{
return '';
}	
var lid = 'l' + id;	

$('#'+lid).html('');

});
});
function updateseccode() {
var img = 'do.php?ac=seccode&rand='+Math.random();
if($('img_seccode')) {
$('img_seccode').src = img;
}
}
</script>
<script type="text/javascript">
$(document).ready(function(){
$("input").blur(function(){
var obj = $(this);
var id = obj.attr("id");
var value = obj.val();
var arr = [ "lusername", "lpassword" ]; 
var arrv = [ "用户名", "密码" ]; 
var index = $.inArray(id, arr);
if(index < 0 )
{
return '';
}		
var lid = 'l' + id;
if(value != '')
{
$('#'+lid).html('');
}else{
$('#'+lid).html(arrv[index]);
}
});
$("input").blur(function(){
var obj = $(this);
var id = obj.attr("id");
var value = obj.val();
var arr = [ "lusername", "lpassword" ]; 
var arrv = [ "用户名", "密码" ]; 
var index = $.inArray(id, arr);
if(index < 0 )
{
return '';
}		
var lid = 'l' + id;
if(value != '')
{
$('#'+lid).html('');
}else{
$('#'+lid).html(arrv[index]);
}
});
}); 
$(document).ready(function(){
$("input").focus(function(){
  	var obj = $(this);
var id = obj.attr("id");
var value = obj.val();
var arr = [ "lusername", "lpassword" ]; 
var index = $.inArray(id, arr);
if(index < 0 )
{
return '';
}	
var lid = 'l' + id;	

$('#'+lid).html('');

});
});
//$("#bg").css("height",$(window).height());

</script>
</body>
</html><?php ob_out();?>