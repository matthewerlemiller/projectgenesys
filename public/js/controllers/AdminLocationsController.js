(function() {
    angular
    .module('genesys')
    .controller('AdminLocationsController', AdminLocationsController);

    AdminLocationsController.$inject = ['$scope', 'Location', '$uibModal', 'AlertService'];

    function AdminLocationsController(   $scope,   Location,   $uibModal,   AlertService) {

        $scope.locations = [];

        function init() {
            getLocations();
        }

        function getLocations() {
            Location.all().success(function(response) {
                $scope.locations = response.data;
                console.debug('$scope.locations', response);
            });
        }

        $scope.openLocationAssignmentModal = function(location) {
            var modalInstance = $uibModal.open({
                templateUrl : '../../modals/templates/goalAssignmentModal.html',
                controller : 'GoalAssignmentModalController',
                resolve : {
                    location : function() {
                        return location;
                    }
                }
            });

            modalInstance.result.then(function(goal) { 
                $scope.locations[$scope.locations.indexOf(location)].goal = goal;
                AlertService.broadcast('Goal updated!', 'success');
            });
        }

        init();

    }
})();