/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: script_manage.js 11845 2009-03-26 08:00:50Z liguode $
*/

function validate_ajax(obj) {
    var subject = $('subject');
    if (subject) {
    	var slen = strlen(subject.value);
        if (slen < 1 || slen > 80) {
            alert("标题长度(1~80字符)不符合要求");
            subject.focus();
            return false;
        }
    }
	obj.form.submit();
}

function validate(obj) {
    var subject = $('subject');
	
    if (subject) {
    	var slen = strlen(subject.value);
        if (slen < 1 || slen > 80) {
            alert("标题长度(1~80字符)不符合要求");
            subject.focus();
            return false;
        }
    }
	validate_ajax(obj);
}

function edit_album_show(id) {
	var obj = $('uchome-edit-'+id);
	if(id == 'album') {
		$('uchome-edit-pic').style.display = 'none';
	}
	if(id == 'pic') {
		$('uchome-edit-album').style.display = 'none';
	}
	if(obj.style.display == '') {
		obj.style.display = 'none';
	} else {
		obj.style.display = '';
	}
}
