app.controller('MemberPageController', ['$scope', 'Member', 'Session', 'Lesson', 'Leader', 'Shift', 'Kickout', 'AlertService', 'School', function($scope, Member, Session, Lesson, Leader, Shift, Kickout, AlertService, School) {

	$scope.details = true;
	$scope.lessons = false;
	$scope.kickout = false;
	$scope.edit = false;

	$scope.member = {};
	$scope.loaded = false;

	$scope.sessions = [];
	$scope.lessonsArray = [];
	$scope.leaders = [];
	$scope.shifts = [];
	$scope.schools = [];
	$scope.showLeaderResults = false;

	$scope.leaderId = null;
	$scope.memberId = null;
	$scope.lessonId = null;
	$scope.sessionNotes = null;

	$scope.changePage = function(pageName) {

		$scope.details = false;
		$scope.lessons = false;
		$scope.kickout = false;
		$scope.edit = false;

		if (pageName == 'details') {

			$scope.details = true;

		} else if (pageName == 'lessons') {

			$scope.lessons = true;

		} else if (pageName == 'kickout') {

			$scope.kickout = true;

		} else if (pageName == 'edit') {

			$scope.edit = true;

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

			AlertService.broadcast('Sorry, there was a problem fetching data. This page may be rendered incorrectly.', 'error');
			
		});

	}

	$scope.updateMember = function() {

		Member.update($scope.member).success(function(response) {

			AlertService.broadcast(response.message, 'success');

			$scope.member = response.data;

		}).error(function(response) {

			AlertService.broadcast("Sorry, something went wrong", 'error');

		});

	}

	$scope.init = function() {

		getLessons();
		getLeaders();
		getSchools();
		getShifts();

	}

	$scope.getSessions = function(memberId) {

		Session.get(memberId).success(function(response) {

			$scope.sessions = response.data;

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

	function getLeaders() {

		Leader.all().success(function(response) {

			$scope.leaders = response.data;

		}).error(function(response) {

			console.log("there was an error");

		});

	}

	
	function getLessons() {

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

	function getSchools() {

		School.getAll().success(function(response) {

			$scope.schools = response.data;

		}).error(function(response) {

			AlertService.broadcast('There was an error, edit functionality may have problems');

		});

	}


	$scope.clear = function() {

		$scope.showResults = false;
		$scope.leaderQueryResults = [];

	}

	$scope.createKickout = function() {

		var data = $scope.kickoutForm;
		data.memberId = MEMBER_ID;

		Kickout.store(data).success(function(response) {

			AlertService.broadcast(response.message, 'success');

		}).error(function(response) {

			AlertService.broadcast(response.message, 'error');

		});

	}

	$scope.init();

	$scope.fetchData();

}]);