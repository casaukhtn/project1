var myApp = angular.module('myApp', ['ngRoute']);
myApp.config(function($routeProvider){
	$routeProvider
	.when('/', {
		templateUrl: 'public/find.html'
	})
	.when('/login', {
		templateUrl: 'public/login.html'
	})
	.when('/register', {
		templateUrl: 'public/register.html'
	})
	.when('/details', {
		templateUrl: 'public/details.html'
	})
	.when('/search', {
		templateUrl: 'public/findResult.html'
	});
});

myApp.controller('Abc', function($scope){
	$.get('index.php?c=find&a=getlisttypeservice', function(data) {
		json = $.parseJSON(data);
		$scope.dsloaidv = json.data;
	});

	$scope.loadaccount = function () {
		var username = $.cookie("username");
		var token = $.cookie("token");
		if (username && token) {
			$scope.account = {username:username, token: token};
		}
	};
	$scope.loadaccount();

	// show popup login, register 
	$scope.hidepopup = function(arr) {
		for (var i = 0; i < arr.length; i++) {
			p = arr[i];
			$(p).modal('hide');
		}
	};


	$scope.listtypeservice = [];
	$scope.getlisttypeservice = function () {
		$.get('index.php?c=find&a=getlisttypeservice', function(data) {
			json = $.parseJSON(data);
			var data = json.data;
			for (var i = 0; i < data.length; i++) {
				var obj = data[i];
				data[obj.name] = [obj.name, obj.id_service_type];
			}
			$scope.listtypeservice = data;
		});
	}

	$scope.getlisttypeservice();

	adata = $scope.listtypeservice;
	$scope.login = function(){
		var username = $('#username').val();
		var password = $('#password').val();

		$.post('index.php?c=login&a=checkaccount', {ln: ['username', 'password'], lv: [username, password]}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			if (json.result == 1) {
				addAccountToCookie(username, json.data.token_id)
				$scope.username = username;
				window.location = "";
			} else {
				alert("Username or Password incorrect");
			}
		});
	};

	$scope.logout = function() {
		$.get('index.php?c=login&a=logout', function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			if (json.result == 1) {
				removeAllCookie();
				window.location = "";
			}
		});
	}

	$scope.register = function() {
		var username = $('#register_username').val();
		var password = $('#register_password').val();

		$.post('index.php?c=login&a=register', {ln: ['username', 'password'], lv: [username, password]}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			if (json.result == 1) {
				alert("Đăng kí tài khoản thành công");
				$scope.username = username;
				window.location = "";
			} else {
				alert("Đăng kí tài khoản thất bại");
			}
		});
	}

	$scope.search = function(){
		var listtypeservice = $scope.listtypeservice;
		var _name_type_service = $('#chosen').val();
		if (listtypeservice[_name_type_service]) {
			var _id_type_service = listtypeservice[_name_type_service][1];
			$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: [_id_type_service]}, function(data, textStatus, xhr) {
				json = $.parseJSON(data);
				$scope.services = json.data;
			});

			window.location.hash = "#/search";
		}
	};

	$scope.service_food = function(){
		// lấy danh sách các dịch vụ theo loại dịch vụ
		$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: ['1']}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			$scope.services = json.data;
		});
		window.location.hash = "#/search";
	};

	$scope.service_coffee = function(){
		// lấy danh sách các dịch vụ theo loại dịch vụ
		$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: ['2']}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			$scope.services = json.data;
		});
		window.location.hash = "#/search";
	};

	$scope.service_nightlife = function(){
		// lấy danh sách các dịch vụ theo loại dịch vụ
		$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: ['2']}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			$scope.services = json.data;
		});
		window.location.hash = "#/search";
	};

	$scope.service_fun = function(){
		// lấy danh sách các dịch vụ theo loại dịch vụ
		$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: ['2']}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			$scope.services = json.data;
		});
		window.location.hash = "#/search";
	};

	$scope.service_shopping = function(){
		// lấy danh sách các dịch vụ theo loại dịch vụ
		$.post('index.php?c=find&a=getlistdatabytype', {ln: ['id_service_type'], lv: ['2']}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			$scope.services = json.data;
		});
		window.location.hash = "#/search";
	};

	var service_id;
	$scope.details = function(e){
		//service_id = $('#service_id').val();
        service_id = $(e.currentTarget).attr("abc");
		// lấy tất cả comment của dịch vụ
		$.get('index.php?c=comment&a=getallcomment&ln=service_code&lv=' + service_id.toString(), function(data) {
			json = $.parseJSON(data);
			$scope.comments = json.data;
		});
		window.location.hash = "#/details";
	};

	$scope.comment = function(){
		var comment = $('#comment').val();
		console.log(service_id);
		$.post('index.php?c=comment&a=addcomment', {ln: ['service_code', 'content'], lv: [service_id, comment]}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
		});
		$.get('index.php?c=comment&a=getallcomment&ln=service_code&lv=' + service_id.toString(), function(data) {
			json = $.parseJSON(data);
			console.log(json.data);
			$scope.comments = json.data;
		});
		window.location.hash = "#/details";
	};
});
