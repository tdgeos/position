// JavaScript Document
// JavaScript Document
var xmlhttp_study365ajax;

function study365ajax(php,value,id)
{
	
	xmlhttp_study365ajax=creatajax();

xmlhttp_study365ajax.onreadystatechange=function()
  {
  if (xmlhttp_study365ajax.readyState==4 && xmlhttp_study365ajax.status==200)
    {
		//test2();
		document.getElementById(id).innerHTML=xmlhttp_study365ajax.responseText;
		//alert("ok");
    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp_study365ajax.open("GET",php+"?"+value,true);
xmlhttp_study365ajax.send();
}

function creatajax(){ 
var ajax=null; 
if (window.XMLHttpRequest){ 
//对于Mozilla、Netscape、Safari等浏览器，创建XMLHttpRequest对象 
ajax = new XMLHttpRequest(); 
if (ajax.overrideMimeType){ 
//如果服务器响应的header不是text/xml，可以调用其它方法修改该header 
ajax.overrideMimeType('text/xml'); 
} 
} else if (window.ActiveXObject){ 
// 对于Internet Explorer浏览器，创建XMLHttpRequest 
try{ 
ajax = new ActiveXObject("Msxml2.XMLHTTP"); 
} catch (e){ 
try{ 
ajax = new ActiveXObject("Microsoft.XMLHTTP"); 
} catch (e){} 
} 
} 
return ajax; 
}