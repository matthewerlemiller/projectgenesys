app.controller('LocationAssignmentModalController', ['$scope', '$uibModalInstance', 'Leader', 'Location', 'leader', 
	function(                                         $scope,   $uibModalInstance,   Leader,   Location,   leader) {

		$scope.leader = leader;
		$scope.locations = [];

		function init() {

			$scope.leader.locationIdCollection = extractIds($scope.leader.locations);
			getLocations();

		}

		function getLocations() {

			Location.all().success(function(response) {

				$scope.locations = response.data;
				assignIsCheckedPropertyToLocations();

			});

		}

		$scope.save = function() {
			var data = {
				locations : $scope.leader.locationIdCollection,
				leaderId : $scope.leader.id
			}

			Leader.updateLocations(data).success(function(response) {
				$uibModalInstance.close(response.data);
			});
		}

		$scope.cancel = function() {
			$uibModalInstance.dismiss('cancel');
		}

		$scope.changeLocationAssignment = function($locationIndex) {
		    var locationId = $scope.locations[$locationIndex].id;
		    
		    if ($scope.locations[$locationIndex].isChecked) {
		        if ($scope.leader.locationIdCollection.indexOf(locationId) === -1) {
		            $scope.leader.locationIdCollection.push(locationId);
		        }
		    } else {
		       if ($scope.leader.locationIdCollection.indexOf(locationId) !== -1) {
		           $scope.leader.locationIdCollection.splice($scope.leader.locationIdCollection.indexOf(locationId), 1);
		       } 
		    }
		}

		/**
		 * Checks if leader is currently assigned to
		 * specified location
		 *
		 * @param int locationId
		 */
		function leaderIsAssignedToLocation(locationId) {
			var isAssigned = false;

			for(var i = 0; i < $scope.leader.locations.length; i++) {
				if ($scope.leader.locations[i].id == locationId) {
					isAssigned = true;
					break;
				} 
				isAssigned = false;
			}
			return isAssigned;
		}

		/**
		 * Assigns viewmodel-specific value of "isChecked"
		 * to produce correct UI behavior with multiple choice
		 * checkbox
		 */
		function assignIsCheckedPropertyToLocations() {
			for(var i = 0; i < $scope.locations.length; i++) {
			    if(leaderIsAssignedToLocation($scope.locations[i].id)) {
			        $scope.locations[i].isChecked = true;
			    } else {
			        $scope.locations[i].isChecked = false;
			    }
			}
		}

		function extractIds(arrayOfObjects) {
		    var newArray = arrayOfObjects.map(function(obj){
		        return obj.id;
		    });
		    return newArray;
		}

		init();

}]);