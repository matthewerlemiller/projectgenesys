app.controller('DashboardController',['$scope', 'Member', 'SharedService', 'Checkin', 
	function(                          $scope,   Member,   SharedService,   Checkin) {

	$scope.checkInLogs = [];

	$scope.getCheckedIn = function() {

		Checkin.getTodayByLocation(LOCATION_ID).success(function(response) {

			$scope.checkInLogs = response.data;
			
		}).error(function() {

		});

	}

	$scope.getCheckedIn();
	
	$scope.$on('showCheckedIn', function() {

		$scope.getCheckedIn();

	});



}]);