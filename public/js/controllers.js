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



app.controller('MemberPageController', ['$scope', 'Member', 'Session', 'Lesson', 'Leader', 'Shift', function($scope, Member, Session, Lesson, Leader, Shift) {

	$scope.details = true;
	$scope.lessons = false;
	$scope.kickout = false;

	$scope.member = {};
	$scope.loaded = false;

	$scope.sessions = [];
	$scope.lessonsArray = [];
	$scope.leaders = [];
	$scope.shifts = [];
	$scope.showLeaderResults = false;

	$scope.leaderId = null;
	$scope.memberId = null;
	$scope.lessonId = null;
	$scope.sessionNotes = null;

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

	$scope.fetchData = function() {

		if (MEMBER_ID === null) return false;

		Member.get(MEMBER_ID).success(function(response) {

			$scope.member = response.data;
			$scope.loaded = true;

		}).error(function(response) {

			
			
		});

	}

	$scope.init = function() {

		$scope.getLessons();
		$scope.getLeaders();
		getShifts();

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

	function getShifts() {

		Shift.get().success(function(response) {

			$scope.shifts = response.data;

		}).error(function(response) {

			console.log(response.message);

		});

	}


	$scope.clear = function() {

		$scope.showResults = false;
		$scope.leaderQueryResults = [];

	}

	$scope.init();

	$scope.fetchData();

}]);


// app.controller('LessonLogController', ['$scope', 'Session','Lesson', 'Leader', function($scope, Session, Lesson, Leader) {

// 	$scope.sessions = [];
// 	$scope.lessonsArray = [];
// 	// $scope.leaderQueryResults = [];
// 	// $scope.leaderQuery = '';
// 	$scope.leaders = [];
// 	$scope.showLeaderResults = false;

// 	$scope.leaderId = null;
// 	$scope.memberId = null;
// 	$scope.lessonId = null;
// 	$scope.sessionNotes = null;

// 	$scope.init = function() {

// 		$scope.getLessons();
// 		$scope.getLeaders();

// 	}

// 	$scope.getSessions = function(memberId) {

// 		Session.get(memberId).success(function(response) {

// 			$scope.sessions = response.data;

// 			console.log(response.data);

// 		}).error(function(response) {

// 			console.log(response.message);

// 		});

// 	}

// 	$scope.saveSession = function() {

// 		var data = {

// 			memberId : $scope.memberId,
// 			lessonId : $scope.lessonId,
// 			leaderId : $scope.leaderId,
// 			notes : $scope.sessionNotes

// 		}

// 		Session.store(data).success(function(response) {

// 			$scope.sessions.unshift(response.data);

			
// 			$scope.lessonId = null;
// 			$scope.leaderId = null;
// 			$scope.sessionNotes = '';

// 		}).error(function(response) {

// 			console.log("Something went wrong");

// 		});

// 	}

// 	$scope.getLeaders = function() {

// 		Leader.all().success(function(response) {

// 			$scope.leaders = response.data;

// 		}).error(function(response) {

// 			console.log("there was an error");

// 		});

// 	}

	
// 	$scope.getLessons = function() {

// 		Lesson.get().success(function(response) {

// 			$scope.lessonsArray = response.data;

// 		}).error(function(response) {

// 			console.log("There was en error getting the lessons");

// 		});

// 	}


// 	$scope.clear = function() {

// 		$scope.showResults = false;
// 		$scope.leaderQueryResults = [];

// 	}

// 	$scope.init();

// }]);




app.controller('CreateMemberController', ['$scope', 'Image', function($scope, Image) {

	$scope.image = null;

	$scope.spinner = false;

	$scope.plus = true;

	$scope.$watch('files', function() {

		$scope.onFileSelect($scope.files);

	});

	$scope.onFileSelect = function(files) {

		var file;

		if (files && files.length) {

			file = files[0];

			$scope.spinner = true;
			$scope.plus = false;

			Image.upload(file).success(function(response) {

				$scope.spinner = false;
				$scope.image = response.data;

			}).error(function(response) {

				$scope.spinner = false;
				$scope.plus = true;

				console.log("There was an error");

			});


		}

	}


}]);







