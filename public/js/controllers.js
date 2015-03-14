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



app.controller('MemberPageController', ['$scope', function($scope) {

	$scope.details = true;
	$scope.lessons = false;
	$scope.kickout = false;

	

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

		console.log("page changed");

	}

}]);


app.controller('LessonLogController', ['$scope', 'Session','Lesson', 'Leader', function($scope, Session, Lesson, Leader) {

	$scope.sessions = [];
	$scope.lessonsArray = [];
	// $scope.leaderQueryResults = [];
	// $scope.leaderQuery = '';
	$scope.leaders = [];
	$scope.showLeaderResults = false;

	$scope.leaderId = null;
	$scope.memberId = null;
	$scope.lessonId = null;
	$scope.sessionNotes = null;

	$scope.init = function() {

		$scope.getLessons();
		$scope.getLeaders();

	}

	$scope.getSessions = function(memberId) {

		Session.get(memberId).success(function(response) {

			$scope.sessions = response.data;

			console.log(response.data);

		}).error(function(response) {

			console.log(response.message);

		});

	}

	$scope.saveSession = function() {

		var data = {

			memberId : $scope.memberId,
			lessonId : $scope.lessonId,
			leaderId : $scope.leaderId,
			notes : $scope.sessionNotes

		}

		Session.store(data).success(function(response) {

			$scope.sessions.unshift(response.data);

			
			$scope.lessonId = null;
			$scope.leaderId = null;
			$scope.sessionNotes = '';

		}).error(function(response) {

			console.log("Something went wrong");

		});

	}

	$scope.getLeaders = function() {

		Leader.all().success(function(response) {

			$scope.leaders = response.data;

		}).error(function(response) {

			console.log("there was an error");

		});

	}

	
	$scope.getLessons = function() {

		Lesson.get().success(function(response) {

			$scope.lessonsArray = response.data;

		}).error(function(response) {

			console.log("There was en error getting the lessons");

		});

	}


	$scope.clear = function() {

		$scope.showResults = false;
		$scope.leaderQueryResults = [];

	}

	$scope.init();

}]);