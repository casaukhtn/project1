function removeAllCookie() {
	var cookies = $.cookie();
	for(var cookie in cookies) {
	   $.removeCookie(cookie);
	}
}

function addAccountToCookie(username, token_id) {
	$.cookie("username", username);
	$.cookie("token", token_id);
}
