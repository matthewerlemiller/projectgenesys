app.controller('CreateMemberController', ['$scope', 'Image', 'Member', 'AlertService', function($scope, Image, Member, AlertService) {

	$scope.image = null;

	$scope.spinner = false;

	$scope.plus = true;

	$scope.member = {};

	$scope.created = false;

	$scope.createdMember = {};

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
				$scope.member.image = response.data;

			}).error(function(response) {

				$scope.spinner = false;
				$scope.plus = true;

				console.log("There was an error");

			});


		}

	}

	$scope.saveMember = function() {

		Member.create($scope.member).success(function(response) {

			// AlertService.broadcast('Member was saved!', 'success');

			$scope.created = true;
			$scope.createdMember = response.data;

			document.body.scrollTop = document.documentElement.scrollTop = 0;

		}).error(function() {

			AlertService.broadcast('There was an error, please try again', 'error');

		});

		return false;

	}

	$scope.checkInNewMember = function() {

		Member.checkIn($scope.createdMember.id).success(function() {

			// AlertService.broadcast( $scope.createdMember.firstName + 'was checked In!', 'success');
			document.location.href="/";

		}).error(function() {

			AlertService.broadcast('Sorry, there was an error =[', 'error');

		});

	}

	$scope.redirectToDashboard = function() {

		document.location.href="/";

	}


}]);