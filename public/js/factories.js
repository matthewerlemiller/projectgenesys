
app.factory('Member', function($http) {

	return {

		search : function(query) {

			return $http.post('/member/search', query);
			
		},

		checkIn : function(id) {

			return $http.get('/checkin/' + id);

		},

		getCheckedIn : function() {

			return $http.get('/checkedin');

		}
	}
});

app.factory('Leader', function($http) {

	return  {

		search : function(query) {

			return $http.post('/leader/search', query);
			
		},

	}

});

app.factory('Session', function($http) {

	return {

		get : function(memberId) {

			return $http.get('/session/' + memberId);

		},

		store : function(data) {

			return $http.post('/session', data);

		}

	}

});

app.factory('Lesson', ['$http', function($http) {

	return {

		get : function() {

			return $http.get('/lesson');

		}

	}

}]);

app.factory('SharedService', function($rootScope) {

	var sharedService = {};

	sharedService.broadcastShowCheckedIn = function() {

		$rootScope.$broadcast('showCheckedIn');

	}

	return sharedService;

});