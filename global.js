/*
 *	Okay kids. This is our include file for javascript. We're gonna have lotsa cookies so we've stol-I MEAN BUILT some functions to help us.
 */

//got these from the w3school site because apparently they forgot to give JavaScript any functionality.
function setCookie(cname, cvalue) {	
	setCookie(cname, cvalue, 9999);
}
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	var expires = "expires=31 Dec 9999 12:00:00 UTC";
	document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}
function setup(){
	var minty="linear-gradient(#b0f0d8 50%, #60b080)";
	var snowy="linear-gradient(#d0f0ff 50%, #7898d0)";
	var windy="linear-gradient(#ffe0c0 50%, #c09070)";
	var sunny="linear-gradient(#ffffa8 50%, #909058)";
	var ruby="linear-gradient(#CC0000  50%, #1A0000)";
	var hellish="linear-gradient(#ff0000 90%, #800000)";
	switch(getCookie("theme")){
		case "minty": style = minty; break;
		case "snowy": style = snowy; break;
		case "windy": style = windy; break;
		case "sunny": style = sunny; break;
		case "ruby": style = ruby; break;
		case "hellish": style = hellish; break;
		default: style = minty; setCookie("theme","minty");
	}
	document.getElementsByTagName("HTML")[0].style.background = style;
}
