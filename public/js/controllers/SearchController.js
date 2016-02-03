app.controller('SearchController',['$scope', 'Member', 'SharedService', 'Checkin',
	function(                       $scope,   Member,   SharedService,   Checkin) {

	$scope.query = "";

	$scope.results = [];

	$scope.showResults = false;

	$scope.searchForMember = function() {
		if ($scope.query.length >= 2) {
			var data = { query : $scope.query };
			Member.search(data).success(function(response) {
				if ($scope.query.length >= 2) {
					$scope.results = response.data;
					$scope.showResults = true;
				}		
			}).error(function() {
				console.log("There was a problem searching for this member");
			});
		} else {
			$scope.clear();
		}
	}

	$scope.clear = function() {
		$scope.showResults = false;
		$scope.results = [];
	}

	$scope.checkIn = function(id, index) {

		if ($scope.results[index].checkedIn !== true) {

			var data = {
				memberId : id,
				locationId : LOCATION_ID
			};

			Checkin.store(data).success(function(response) {

				$scope.results[index].checkedIn = true;

				setTimeout(function() {

					SharedService.broadcastShowCheckedIn();

					$scope.results = [];
					$scope.query = '';

				}, 1000)
				
			}).error(function(response){

				console.log(response.message);

			});

		}

	}

	
	$scope.$on('showCheckedIn', function() {

		$scope.showResults = false;

	});


}]);