app.factory('AlertService', ['$rootScope', function($rootScope) {

	var AlertService = {};

	AlertService.message = '';

	AlertService.broadcast = function(message, type) {

		this.message = message;

		if (type == 'success') {

			this.broadcastSuccessAlert();

		} else if (type == 'error') {

			this.broadcastErrorAlert();

		} else if (type == 'info') {

			this.broadcastInfoAlert();

		} else {

			this.broadcastInfoAlert();

		}

	}

	AlertService.broadcastSuccessAlert = function() {

		$rootScope.$broadcast('successAlert');

	}

	AlertService.broadcastErrorAlert = function() {

		$rootScope.$broadcast('errorAlert');

	}

	AlertService.broadcastInfoAlert = function() {

		$rootScope.$broadcast('infoAlert');

	}

	return AlertService;

}]);