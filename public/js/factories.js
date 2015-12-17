
app.factory('Member', function($http) {
	return {
		search : function(query) {
			return $http.post('/member/search', query);
		},
		get : function(memberId) {
			return $http.get('/member/get/' + memberId);
		},
		getStatus : function(memberId) {
			return $http.get('/member/status/' + memberId);
		},
		update : function(data) {
			return $http.put('/member/update/', data);
		},
		create : function(data) {
			return $http.post('/member', data);
		}
	}
});

app.factory('Leader', function($http) {
	return  {
		all : function() {
			return $http.get('/leader/all');
		},
		create : function(data) {
			return $http.post('/leader', data)
		},
		search : function(query) {
			return $http.post('/leader/search', query);	
		},
		updateLocations : function(data) {
			return $http.post('/leader/locations', data);
		},
		assignToLocation : function(data) {
			return $http.post('/leader/assign', data);
		},
		unassignFromLocation : function(data) {
			return $http.post('/leader/unassign', data)
		}
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

app.factory('Shift', ['$http', function($http) {
	return {
		get : function() {
			return $http.get('/shift/get');
		}
	}
}]);

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


app.factory('Image', ['$http', '$upload', function($http, $upload) {
	return {
		upload : function(file) {
			return $upload.upload({
				url : '/member/image',
				file : file
			});
		}
	}
}]);

app.factory('Kickout', ['$http', function($http) {
	return {
		store : function(data) {
			return $http.post('/member/kickout', data);
		}
	}
}]);

app.factory('School', ['$http', function($http) {
	return {
		getAll : function() {
			return $http.get('/school');
		}
	}
}]);


app.factory('Checkin', ['$http', function($http) {
	return {
		store : function(data) {
			return $http.post('/checkin/', data);
		},
		getTodayByLocation : function(locationId) {
			return $http.get('/checkin/today/' + locationId);
		},
		getForMember : function(memberId, interval) {
			return $http.get('/checkin/member/' + memberId + '?interval=' + interval);
		},
		chartDataByLocation : function(locationId) {
			return $http.get('/checkin/chart/' + locationId);
		},
		heatmapDataByLocation : function(locationId) {
			return $http.get('/checkin/heatmap/' + locationId);
		},
		totalsByLocation : function(locationId) {
			return $http.get('/checkin/totals/' + locationId);
		}
	}
}]);

app.factory('Location', ['$http', function($http) {
	return {
		all : function() {
			return $http.get('/location');
		},
		leaders : function() {
			return $http.get('/location/leaders');
		}
	}
}]);

