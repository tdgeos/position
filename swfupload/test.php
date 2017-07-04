<html>
<head>
	<title>wzxaini9</title>

	<meta http-equiv="content-type" content="text/html;charset=utf-8">

	<meta http-equiv="x-ua-compatible" content="ie=emulateie7">

	<meta name="author" content="netease">

	<meta name="version" content="1.0">

	<meta name="keywords" content="">

	<meta name="description" content="">

<link href="http://l.bst.126.net/s/pt_lib_macro.css" type="text/css" rel="stylesheet">

<link href="http://l.bst.126.net/s/pt_page_newpublish_blogmanagenew.css" type="text/css" rel="stylesheet">
</head>
    <body>
        <div class="publishcommon  js-postPhoto" style="display: block; ">
            <div class="m-mlist">
                
                    <div class="isay">
                        <div class="isayt"><span class="isayc"></span></div>
                        <div class="isaym">
                            <div style="height: auto; min-height: 100px; visibility: visible; overflow: visible; ">
                                
                                    <div class="publishMain ztag">
                                                        <div id="divFileProgressContainer" style="height: 25px; display:none"></div>
                                                        <div id="thumbnails"></div>
                                                    <form>
                                                        <div style="width: 180px; height: 18px; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
                                                            <span id="spanButtonPlaceholder"></span>
                                                        </div>
                                                    </form>
                                    </div>
                                         <div class="publishArea" hidefocus="true">
                                         		<textarea id="message" name="message" onkeyup="textCounter(this, 'maxlimit', 200)" onkeydown="ctrlEnter(event, 'add');" style="width:380px; height: 30px;"></textarea>
                                              <button class="w-bbtn w-bbtn-0 bindbtn ztag" hidefocus="true">发　布</button>
                                         </div>
                            </div>
                        </div>
            			<div class="isayb"></div>
                    </div>
            </div>
        </div>
        	<div id="publishBarArea" class="publishBarArea" style="margin-bottom:20px;">
    <form method="post" id="doingform" action="cp.php?ac=doing&view=$_GET[view]" class="post_doing" enctype="multipart/form-data">
<div class="r_option">还可输入 <strong id="maxlimit">200</strong> 个字符</div>
<a href="#" id="doingface" onclick="showFace(this.id, 'message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<input type="file"  name="img" onchange="checkExt(this)" accept="image/*"/>

<script > 
var checkExt=function(file) {
    if(!(/(?:jpg|gif|png)$/i.test(file.value))) {
        alert("只允许上传jpg、png和gif的图片");
        if(window.ActiveXObject) {//for IE
            file.select();//select the file ,and clear selection
            document.selection.clear();
        } else if(window.opera) {//for opera
            file.type="text";file.type="file";
        } else file.value="";//for FF,Chrome,Safari
    }
};
</script>

<!--{if checkperm('seccode')}-->
	<!--{if $_SCONFIG['questionmode']}-->
	回答提问：<!--{eval question();}--> 
	<!--{else}-->
	输入验证码：<script>seccode();</script> 
	<!--{/if}-->
	<input type="text" id="seccode" name="seccode" value="" size="10" class="txt">
<!--{/if}-->
<br>
<textarea id="message" name="message" onkeyup="textCounter(this, 'maxlimit', 200)" onkeydown="ctrlEnter(event, 'add');" style="width:530px; height: 22px;"></textarea>
<input type="hidden" name="addsubmit" value="true" />
<button type="submit" id="add" name="add" class="w-bbtn w-bbtn-0 bindbtn ztag">发布</button>
<input type="hidden" name="refer" value="$theurl" />
<input type="hidden" name="topicid" value="$topicid" />
<input type="hidden" name="formhash" value="<!--{eval echo formhash();}-->" />
</form>
	</div>
    </body>
</html>
