app.controller('AdminLeadersController', ['$scope', 'Location', 'Leader', '$uibModal', 'AlertService', 
	function(                              $scope,   Location,   Leader,   $uibModal,   AlertService) {

		$scope.leaders = [];
		$scope.newLeader = {
			locationIdCollection : []
		};
		$scope.locations = [];

		function init() {
			getLeaders();
			getLocations();
		}

		function getLeaders() {
			Leader.all().success(function(response) {
				$scope.leaders = response.data;
			});
		}

		function getLocations() {
			Location.all().success(function(response) {
				$scope.locations = response.data;
			});
		}

		$scope.createLeader = function() {
			var data = $scope.newLeader;

			if (!data.firstName || !data.lastName) return false;

			Leader.create(data).success(function(response) {
				AlertService.broadcast('Leader created!', 'success');
				$scope.leaders.push(response.data);
				$scope.clearLeader();
			}).error(function(response) {
				AlertService.broadcast('Something went wront, it was not your fault', 'error');
			})
		}

		$scope.clearLeader = function() {
			$scope.newLeader = {
				locationIdCollection : []
			}
			clearLocationChecks();
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

		$scope.changeLocationAssignment = function($locationIndex) {
		    var locationId = $scope.locations[$locationIndex].id;
		    
		    if ($scope.locations[$locationIndex].isChecked) {
		        if ($scope.newLeader.locationIdCollection.indexOf(locationId) === -1) {
		            $scope.newLeader.locationIdCollection.push(locationId);
		        }
		    } else {
		       if ($scope.leader.locationIdCollection.indexOf(locationId) !== -1) {
		           $scope.leader.locationIdCollection.splice($scope.leader.locationIdCollection.indexOf(locationId), 1);
		       } 
		    }
		}

		function clearLocationChecks() {
			for(var i = 0; i < $scope.locations.length; i++) {
				$scope.locations[i].isChecked = false;
			}
		}

		function extractIds(arrayOfObjects) {
		    var newArray = arrayOfObjects.map(function(obj){
		        return obj.id;
		    });
		    return newArray;
		}

		init();
	}
]);