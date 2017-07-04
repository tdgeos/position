// JavaScript Document

function xxxdocomment_form(doid,cid,topid,uid) {
	var showid = 'docomment_form_'+doid+'_0';
	var divid = 'docomment_' + doid;
	ajaxget('cp.php?ac=shuoshuo&op=docomment&doid='+doid+'&topid='+topid+'&uid='+uid, showid);
	if($(divid)) {
		$(divid).style.display = '';
	}
}
function xxxdocomment_form_close(doid, id) {
	var showid = 'docomment_form_'+doid+'_'+id;
	$(showid).innerHTML = '';
}

//do评论
function xxxdocomment_get(id, result) {
	if(result) {
		var ids = explode('_', id);
		var doid = ids[1];
		var showid = 'docomment_'+doid;
		var opid = 'do_a_op_'+doid;

		$(showid).style.display = '';
		$(showid).className = 'sub_doing';
		ajaxget('cp.php?ac=shuoshuo&op=getcomment&doid='+doid, showid);

		if($(opid)) {
			$(opid).innerHTML = '收起';
			$(opid).onclick = function() {
				docomment_colse(doid);
			}
		}
		//提示获得积分
		//showreward();
	}
}