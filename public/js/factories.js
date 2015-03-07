
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

		get : function(userId) {

			return $http.get('/session/' + memberId);

		}

	}

});

app.factory('SharedService', function($rootScope) {

	var sharedService = {};

	sharedService.broadcastShowCheckedIn = function() {

		$rootScope.$broadcast('showCheckedIn');

	}

	return sharedService;

});