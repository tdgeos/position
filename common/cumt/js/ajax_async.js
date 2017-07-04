// JavaScript Document
// JavaScript Document
var xmlhttp_study365ajax_async;

function study365ajax_async(php,value,id)
{
	
	xmlhttp_study365ajax_async=creatajax_async();

xmlhttp_study365ajax_async.onreadystatechange=function()
  {
  if (xmlhttp_study365ajax_async.readyState==4 && xmlhttp_study365ajax_async.status==200)
    {
		//test2();
		document.getElementById(id).innerHTML=xmlhttp_study365ajax_async.responseText;
		//alert("ok");
    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp_study365ajax_async.open("GET","source/ajax_"+php+".php?"+value,true);
xmlhttp_study365ajax_async.send();
}

function creatajax_async(){ 
var ajax_async=null; 
if (window.XMLHttpRequest){ 
//对于Mozilla、Netscape、Safari等浏览器，创建XMLHttpRequest对象 
ajax_async = new XMLHttpRequest(); 
if (ajax_async.overrideMimeType){ 
//如果服务器响应的header不是text/xml，可以调用其它方法修改该header 
ajax_async.overrideMimeType('text/xml'); 
} 
} else if (window.ActiveXObject){ 
// 对于Internet Explorer浏览器，创建XMLHttpRequest 
try{ 
ajax_async = new ActiveXObject("Msxml2.XMLHTTP"); 
} catch (e){ 
try{ 
ajax_async = new ActiveXObject("Microsoft.XMLHTTP"); 
} catch (e){} 
} 
} 
return ajax_async; 
}