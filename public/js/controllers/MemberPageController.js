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