/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: script_upload.js 13226 2009-08-24 02:39:06Z zhengqingpeng $
*/

var attachexts = new Array();
var attachwh = new Array();

var insertType = 1;
var thumbwidth = parseInt(60);
var thumbheight = parseInt(60);
var extensions = 'jpg,jpeg,gif,png';
var forms;
var nowUid = 0;
var albumid = 0;
var uploadStat = 0;
var picid = 0;
var aid = 0;
var topicid = 0;
var mainForm;
var successState = false;
var ieVersion = userAgent.substr(userAgent.indexOf('msie') + 5, 3);

function delAttach(id) {
	$('attachbody').removeChild($('attach_' + id).parentNode.parentNode.parentNode);
	if($('attachbody').innerHTML == '') {
		addAttach();
	}
	$('localimgpreview_' + id + '_menu') ? document.body.removeChild($('localimgpreview_' + id + '_menu')) : null;
}

function addAttach() {
	newnode = $('attachbodyhidden').rows[0].cloneNode(true);
	var id = aid;
	var tags;
	tags = newnode.getElementsByTagName('form');
	for(i in tags) {
		if(tags[i].id == 'upload') {
			tags[i].id = 'upload_' + id;
		}
	}
	tags = newnode.getElementsByTagName('input');
	for(i in tags) {
		if(tags[i].name == 'attach') {
			tags[i].id = 'attach_' + id;
			tags[i].name = 'attach';
			tags[i].onchange = function() {insertAttach(id)};
			tags[i].unselectable = 'on';
		}
		if(tags[i].id == 'albumid') {
			tags[i].id = 'albumid_' + id;
		}
		if(tags[i].id == 'topicid') {
			tags[i].id = 'topicid_' + id;
		}
	}
	tags = newnode.getElementsByTagName('span');
	for(i in tags) {
		if(tags[i].id == 'localfile') {
			tags[i].id = 'localfile_' + id;
		}
	}
	aid++;

	$('attachbody').appendChild(newnode);
}

addAttach();

function insertAttach(id) {
	var localimgpreview = '';
	var path = $('attach_' + id).value;
	var ext = getExt(path);
	var re = new RegExp("(^|\\s|,)" + ext + "($|\\s|,)", "ig");
	var localfile = $('attach_' + id).value.substr($('attach_' + id).value.replace(/\\/g, '/').lastIndexOf('/') + 1);

	if(path == '') {
		return;
	}
	if(extensions != '' && (re.exec(extensions) == null || ext == '')) {
		alert('瀵逛笉璧凤紝涓嶆敮鎸佷笂浼犳绫绘墿灞曞悕鐨勬枃浠?);
		return;
	}
	attachexts[id] = inArray(ext, ['gif', 'jpg', 'jpeg', 'png']) ? 2 : 1;

	var inhtml = '<div class="borderbox"><table cellspacing="0" cellpadding="0" border="0"><tr>';
	if(is_ie || userAgent.indexOf('firefox') >= 1) {
		var picPath = getPath($('attach_' + id));
		var imgCache = new Image();
		imgCache.src = picPath;
		inhtml += '<td><img src="' + picPath +'" width="60" height="80">&nbsp;</td>';
	}
	if(is_ie && typeof no_insert=='undefined' || insertType==0) {
		localfile += '&nbsp;<a href="javascript:;" title="鐐瑰嚮杩欓噷鎻掑叆鍐呭涓綋鍓嶅厜鏍囩殑浣嶇疆" onclick="insertAttachimgTag(' + id + ');return false;">[鎻掑叆]</a>';
	}
	localfile += '&nbsp;<span id="showmsg' + id + '"><a href="javascript:;" onclick="delAttach(' + id + ')">[鍒犻櫎]</a></span>';
	inhtml += '<td>' + localfile +'<br/>';
	inhtml += '鍥剧墖鎻忚堪:<br/><textarea name="pic_title" cols="40" rows="2"></textarea>';
	inhtml += '</td></tr></table></div>';
	
	$('localfile_' + id).innerHTML = inhtml;
	$('attach_' + id).style.display = 'none';

	addAttach();
}

function getPath(obj){
	if (obj) {
		if (is_ie) {
			obj.select();
			// IE涓嬪彇寰楀浘鐗囩殑鏈湴璺緞
			return document.selection.createRange().text;
			
		} else if(is_moz) {
				if (obj.files) {
					// Firefox涓嬪彇寰楃殑鏄浘鐗囩殑鏁版嵁
					return obj.files.item(0).getAsDataURL();
				}
				return obj.value;
		}
		return obj.value;
	}
}
function inArray(needle, haystack) {
	if(typeof needle == 'string') {
		for(var i in haystack) {
			if(haystack[i] == needle) {
					return true;
			}
		}
	}
	return false;
}

function insertAttachimgTag(id) {
	if(insertType == 0) {
		insertImage(id);
	} else if(is_ie) {
		var picPath = getPath($('attach_' + id));
		var imgCache = new Image();
		imgCache.src = picPath;
		edit_insert('<img id="_uchome_localimg_' + id + '" src="' + picPath + '">');
		//edit_insert('<img id="_uchome_localimg_' + id + '" src="' + $('attach_' + id).value + '">');
	} else {
		alert('瀵逛笉璧凤紝璇峰湪IE娴忚鍣ㄤ笅闈娇鐢ㄦ湰鍔熻兘');
	}
}

function uploadSubmit(obj) {
	obj.disabled = true;
	mainForm = obj.form;
	forms = $('attachbody').getElementsByTagName("FORM");
	albumid = $('uploadalbum').value;
	upload();
}

//涓婁紶椤甸潰
function start_upload() {
	$('btnupload').disabled = true;
	mainForm = $('albumresultform');
	forms = $('attachbody').getElementsByTagName("FORM");
	upload();
}

function upload() {
	if(typeof(forms[nowUid]) == 'undefined') return false;
	var nid = forms[nowUid].id.split('_');
	nid = nid[1];
	if(nowUid>0) {
		var upobj = $('showmsg'+aid);
		if(uploadStat==1) {
			upobj.innerHTML = '涓婁紶鎴愬姛';
			successState = true;
			var InputNode;
			//涓ょ鐢熸垚鏂瑰紡锛岃В鍐虫祻瑙堝櫒涔嬮棿鐨勫吋瀹规€ч棶棰?
			try {
				//IE妯″紡涓嬬殑鍒涘缓鏂瑰紡,瑙ｅ喅甯歌setAttribute璁剧疆灞炴€у甫鏉ョ殑涓€浜涙湭鐭ョ殑閿欒
				var InputNode = document.createElement("<input type=\"hidden\" id=\"picid_" + picid + "\" value=\""+ aid +"\" name=\"picids["+picid+"]\">");
			} catch(e) {
				//闈濱E妯″紡鍒欓』瑕佺敤涓嬪垪鐨勫父瑙剆etAttribute璁剧疆灞炴€э紝鍚﹀垯鐢熸垚鐨勭粨鏋滀笉鑳芥甯稿垵濮嬪寲
				var InputNode = document.createElement("input");
				InputNode.setAttribute("name", "picids["+picid+"]");
				InputNode.setAttribute("type", "hidden");
				InputNode.setAttribute("id", "picid_" + picid);
				InputNode.setAttribute("value", aid);
			}
			mainForm.appendChild(InputNode);

		} else {
			upobj.style.color = "#f00";
			upobj.innerHTML = '涓婁紶澶辫触 '+uploadStat;
		}
	}
	if($('showmsg'+nid) != null) {
		$('showmsg'+nid).innerHTML = '涓婁紶涓紝璇风瓑寰?<a href="javascript:;" onclick="forms[nowUid].submit();">閲嶈瘯</a>)';
		$('albumid_'+nid).value = albumid;
		if($('topicid_'+nid)) $('topicid_'+nid).value = topicid;
		forms[nowUid].submit();
	} else if(nowUid+1 == forms.length) {
		if(typeof (no_insert) != 'undefined') {
			var albumidcheck = parseInt(parent.albumid);
			$('opalbumid').value = isNaN(albumidcheck)? 0 : albumid;
			$('optopicid').value = topicid;
			if(!successState) return false;
		}
		mainForm.submit();
	}
	aid = nid;
	nowUid++;
	uploadStat = 0;
}
