var myApp = angular.module('myApp', ['ngRoute']);
myApp.config(function($routeProvider){
	$routeProvider
	.when('/', {
		templateUrl: 'public/find.html'
	})
	.when('/login', {
		templateUrl: 'public/login.html'
	})
	.when('/find_login', {
		templateUrl: 'public/find_login.html'
	})
	.when('/register', {
		templateUrl: 'public/register.html'
	})
	.when('/search', {
		templateUrl: 'public/findResult.html'
	});
});

myApp.controller('Abc', function($scope){
	$scope.login = function(){
		var username = $('#username').val();
		var password = $('#password').val();

		$.post('index.php?c=login&a=checkaccount', {ln: ['username', 'password'], lv: [username, password]}, function(data, textStatus, xhr) {
			json = $.parseJSON(data);
			if (json.result == 1) {
				alert("Đăng nhập thành công");
				$scope.username = username;
				window.location.hash = "#/find_login";
			} else {
				alert("Username or Password incorrect");
				window.location.hash = "#/login";
			}
		});
	};

	$scope.search = function(){
		window.location.hash = "#/search";
	};
	});