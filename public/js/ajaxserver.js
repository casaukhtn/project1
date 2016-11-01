
// Kiểm tra tài khoản
$.get('index.php?c=login&a=checkaccount&ln=username,password&lv=admin,123456', function(data) {
	json = $.parseJSON(data);
	console.log(json);
});

// đăng kí tài khoản
$.post('index.php?c=login&a=register', {ln: ['username', 'password'], lv: ['minhnhi','123456']}, function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});

// logout tài khoản
$.get('index.php?c=login&a=login', function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});

// 

// Lấy danh sách các loại dịch vụ
$.get('index.php?c=find&a=getlisttypeservice', function(data) {
	json = $.parseJSON(data);
	console.log(json);
});

// lấy danh sách các dịch vụ theo loại dịch vụ
$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: ['1']}, function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});

