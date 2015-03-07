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

		})

	}

	$scope.$on('showCheckedIn', function() {

		$scope.showResults = false;

	});


});

app.controller('DisplayCheckedInMembers', function($scope, Member, SharedService) {

	$scope.Checklogs = [];

	$scope.getCheckedIn = function() {

		Member.getCheckedIn().success(function(response) {

			$scope.Checklogs = response.data;
			
		}).error(function() {

		});

	}

	$scope.getCheckedIn();
	
	$scope.$on('showCheckedIn', function() {

		$scope.getCheckedIn();

	});



});



app.controller('MemberPageController', ['$scope', 'Session', function($scope, Session) {

	$scope.details = true;
	$scope.lessons = false;
	$scope.kickout = false;

	$scope.sessions = [];

	$scope.changePage = function(pageName) {

		$scope.details = false;
		$scope.lessons = false;
		$scope.kickout = false;

		if (pageName == 'details') {

			$scope.details = true;

		} else if (pageName == 'lessons') {

			$scope.lessons = true;

		} else if (pageName == 'kickout') {

			$scope.kickout = true;

		} else {

			$scope.details = true;

		}

	}

	$scope.getSessions = function(memberId) {

		Session.get(memberId).success(function(response) {

			$scope.sessions = response.data;

		}).error(function(response) {

			console.log(response.message);

		});

	}


}]);