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
	$scope.listtypeservice = [];
	$scope.getlisttypeservice = function () {
		$.get('index.php?c=find&a=getlisttypeservice', function(data) {
			json = $.parseJSON(data);
			$scope.listtypeservice = json.data;
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
		window.location.hash = "#/search";
	};
});
