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