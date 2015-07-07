app.controller('SearchController', function($scope, Member, SharedService) {

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
		// $scope.query = "";

	}

	$scope.checkIn = function(id, index) {

		if ($scope.results[index].CheckedIn !== true) {

			Member.checkIn(id).success(function(response) {

				console.log(response.message);

				$scope.results[index].CheckedIn = true;

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

	$scope.blurSearch = function() {

		// $("#member-search-input").blur();

	}

	$scope.$on('showCheckedIn', function() {

		$scope.showResults = false;

	});


});