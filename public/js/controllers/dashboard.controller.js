(function() {
	'use strict';

	angular
	.module('genesys')
	.controller('DashboardController', DashboardController);

	DashboardController.$inject = ['$scope', 'Member', 'SharedService', 'Checkin', 'AlertService'];

	function DashboardController(   $scope,   Member,   SharedService,   Checkin,   AlertService) {
		$scope.checkInLogs = [];

		$scope.getCheckedIn = function() {
			Checkin.getTodayByLocation(LOCATION_ID).success(function(response) {
				$scope.checkInLogs = response.data;		
			}).error(function() {
				AlertService.broadcast('Sorry, something went wrong', 'error');
			});
		}

		$scope.getCheckedIn();
		
		$scope.$on('showCheckedIn', function() {
			$scope.getCheckedIn();
		});
	};
})();
