//验证码
function seccode() {
	document.writeln('<img id="img_seccode" src="'+imgseccode()+'" align="absmiddle" onclick="updateseccode(this)">');
}
function imgseccode() {
	return 'do.php?ac=seccode&rand='+Math.random();
}
function updateseccode(obj) {
	obj.src='do.php?ac=seccode&rand='+Math.random();
}