<?php
	session_start();
	$_SESSION["file_info"] = array();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片上传测试——室内外定位系统</title>
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
		var swfu;
		window.onload = function () {
			swfu = new SWFUpload({
				button_action:SWFUpload.BUTTON_ACTION.SELECT_FILE,
				// Backend Settings
				upload_url: "upload.php",
				post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

				// File Upload Settings
				file_size_limit : "10 MB",	// 2MB
				file_types : "*.jpg;*.png",
				file_types_description : "图片文件",
				file_upload_limit : 5,

				// Event Handler Settings - these functions as defined in Handlers.js
				//  The handlers are not part of SWFUpload but are part of my website and control how
				//  my website reacts to the SWFUpload events.
				swfupload_preload_handler : preLoad,
				swfupload_load_failed_handler : loadFailed,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "images/SmallSpyGlassWithTransperancy_17x18.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 180,
				button_height: 18,
				button_text : '<span class="button">请选择图片 <span class="buttonSmall">(2 MB Max)</span></span>',
				button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
				button_text_top_padding: 0,
				button_text_left_padding: 18,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,
				
				// Flash Settings
				flash_url : "./swfupload/swfupload.swf",
				flash9_url : "./swfupload/swfupload_FP9.swf",

				custom_settings : {
					upload_target : "divFileProgressContainer"
				},
				
				// Debug Settings
				debug: true
			});
		};
	</script>
</head>
<body>

<div id="content">
	<h2>this is a Demo</h2>
	<p>图片上传测试</p>

	<form>
		<div style="width: 180px; height: 18px; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
			<span id="spanButtonPlaceholder"></span>
		</div>
	</form>
	<div id="divFileProgressContainer" style="height: 75px;"></div>
	<div id="thumbnails"></div>
</div>
</body>
</html>
