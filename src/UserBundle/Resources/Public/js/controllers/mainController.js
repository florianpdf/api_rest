// MAIN CONTROLLER
function mainController($scope, $http, userService) {
	$scope.title = "Users List";
	
	function load(){
		userService.get().then(function(res){
			$scope.users = res.data.users;
			console.log($scope.users);
		});
	}

	$scope.add = function(){
		debugger
		var data = {};
		data.name = $scope.name;
		userService.create(data).then(function(res){
			load();
		});
		$scope.description = "";
	};

	$scope.update = function(user) {
		userService.update(user.id, user).then(function (res) {
			load();
		});
	};

	$scope.delete = function(user){
		userService.delete(user.id).then(function(res){
			load();
		});
	};
	load();
}
