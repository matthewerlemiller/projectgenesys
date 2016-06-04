(function() {
    'use strict';

    angular
    .module('genesys')
    .controller('DirectorEditModalController', DirectorEditModalController);

    DirectorEditModalController.$inject = ['$scope', 'Location', 'location', 'AlertService', '$uibModalInstance'];

    function DirectorEditModalController(   $scope,   Location,   location,   AlertService,   $uibModalInstance) {
        $scope.location = angular.copy(location);
        $scope.email = $scope.location.director;

        $scope.save = function() {
            var data = {
               locationId : location.id,
               director : $scope.email 
            }

            Location.updateDirector(data).success(function(response) {
                $uibModalInstance.close(response.data);
            }).error(function() {
                AlertService.broadcast('Sorry, something went wrong on our end. Try again, or email "austenpayan@gmail.com"');
            });
        }

        $scope.cancel = function() {
            $uibModalInstance.dismiss('cancel');
        }
    }
})();