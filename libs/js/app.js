var inputUsername = document.getElementById('username');
var inputPassword = document.getElementById('password');

var formLogin = document.getElementById('form-login');

if (formLogin.attachEvent) {
	formLogin.attachEvent('submit', onFormSubmit);
} else {
	formLogin.attachEvent('submit', onFormSubmit);
}

function onFormSubmit(e) {
	if (e.preventDefault) e.preventDefault();
	var username = inputUsername.value;
	var password = inputPassword.value;

	//truy van csdl kiem tra co hop le khong
}