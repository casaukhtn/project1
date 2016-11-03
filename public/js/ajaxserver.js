
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
$.get('index.php?c=login&a=logout', function(data, textStatus, xhr) {
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

// lấy tất cả comment của dịch vụ
$.get('index.php?c=comment&a=getallcomment&ln=service_code&lv=1', function(data) {
	json = $.parseJSON(data);
	console.log(json);
});

// kiểm tra quyền thao tác với 1 một comment 
// 1: ...
// 0: không có quyền
$.get('index.php?c=comment&a=checkaccess&ln=id_comment&lv=1', function(data) {
	json = $.parseJSON(data);
	console.log(json);
});

// thêm 1 comment mới --> chức năng chỉ thành công khi đã đăng nhập
// 1 nếu thêm thành công
// 0 nếu thêm thất bại
// -1 nếu chưa đăng nhập
$.post('index.php?c=comment&a=addcomment', {ln: ['service_code', 'content'], lv: ['1', 'very good']}, function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});


// xoa 1 comment mới --> chức năng chỉ thành công khi đã đăng nhập
// 1 nếu thêm thành công
// 0 nếu thêm thất bại
// -1 nếu chưa đăng nhập
$.post('index.php?c=comment&a=delcomment', {ln: 'id_comment', lv: '1'}, function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});

// rating cá nhân cho một điểm
$.post('index.php?c=rating&a=set_rating', {ln: ['service_code', 'score'], lv: ['1', '3']}, function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});

// lấy rating cho 1 địa điểm
$.get('index.php?c=rating&a=get_rating_medium&ln=service_code&lv=1', function(data, textStatus, xhr) {
	json = $.parseJSON(data);
	console.log(json);
});