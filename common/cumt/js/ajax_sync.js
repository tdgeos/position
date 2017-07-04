// JavaScript Document
// JavaScript Document
var xmlhttp_study365ajax_sync;

function study365ajax_sync(php,value)
{	
  xmlhttp_study365ajax_sync=creatajax_sync();
 // xmlhttp_study365ajax_sync.onreadystatechange=function()
 // {
//	if (xmlhttp_study365ajax_sync.readyState==4 && xmlhttp_study365ajax_sync.status==200)
//	{
//		return xmlhttp_study365ajax_sync.responseText;
	   //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
//	}
//  }
  xmlhttp_study365ajax_sync.open("GET","source/ajax_"+php+".php?"+value,false);
  xmlhttp_study365ajax_sync.send();
  return xmlhttp_study365ajax_sync.responseText;
}

function creatajax_sync(){ 
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