app.controller('AdminLeadersController', ['$scope', 'Location', 'Leader', '$uibModal', 'AlertService', 
	function(                              $scope,   Location,   Leader,   $uibModal,   AlertService) {

		$scope.leaders = [];

		function init() {

			getLeaders();

		}

		function getLeaders() {

			Leader.all().success(function(response) {

				$scope.leaders = response.data;

			});

		}

		$scope.unassignFromLocation = function(leader, locationId) {

			var data = {

				locationId : locationId,
				leaderId : leader.id

			}

			Leader.unassignFromLocation(data).success(function(response) {

				$scope.leaders[$scope.leaders.indexOf(leader)] = response.data;
				AlertService.broadcast('Location unassigned', 'success');

			});

		}

		$scope.openLocationAssignmentModal = function(leader) {

			var modalInstance = $uibModal.open({

				templateUrl : '../../modals/templates/locationAssignmentModal.html',
				controller : 'LocationAssignmentModalController',
				resolve : {

					leader : function() {

						return leader;

					}

				}

			});

			modalInstance.result.then(function(locations) {	

				$scope.leaders[$scope.leaders.indexOf(leader)].locations = locations;
				AlertService.broadcast('Locations Updated!', 'success');

			});

		}

		init();

	}

]);