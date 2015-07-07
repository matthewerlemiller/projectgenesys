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