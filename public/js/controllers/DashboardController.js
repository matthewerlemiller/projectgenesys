app.controller('DashboardController', function($scope, Member, SharedService) {

	$scope.checkInLogs = [];

	$scope.getCheckedIn = function() {

		Member.getCheckedIn().success(function(response) {

			$scope.checkInLogs = response.data;
			
		}).error(function() {

		});

	}

	$scope.getCheckedIn();
	
	$scope.$on('showCheckedIn', function() {

		$scope.getCheckedIn();

	});



});