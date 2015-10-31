app.controller('ShiftController', ['$scope','Location', function($scope, Location) {

	$scope.totals = {};

	function init() {

		fetchTotals();

	}

	function fetchTotals() {

		Location.totals().success(function(response) {

			$scope.totals.day = response.data.day;
			$scope.totals.week = response.data.week;
			$scope.totals.month = response.data.month;
			$scope.totals.all = response.data.all;

		});	

	}

	init();

}]);