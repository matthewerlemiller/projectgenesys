(function() {
    angular
    .module('genesys')
    .controller('GoalAssignmentModalController', GoalAssignmentModalController);

    GoalAssignmentModalController.$inject = ['$scope', 'location', 'Location', 'AlertService', '$uibModalInstance'];

    function GoalAssignmentModalController(   $scope,   location,   Location,   AlertService,   $uibModalInstance) {
        $scope.location = angular.copy(location);
        $scope.goal = $scope.location.goal;

        $scope.save = function() {
            var data = {
                locationId : location.id,
                goal : $scope.goal
            }

            Location.updateGoal(data).success(function(response) {
                $uibModalInstance.close(response.data);
            }).error(function() {
                AlertService.broadcast('Sorry, there was a problem on our end. Contact admin.', 'error');
            });
        }

        $scope.cancel = function() {
            $uibModalInstance.dismiss('cancel');
        }
    }
})();