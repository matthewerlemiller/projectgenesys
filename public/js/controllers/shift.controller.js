(function() {
    'use strict';

    angular
    .module('genesys')
    .controller('ShiftController', ShiftController);

    ShiftController.$inject = ['$scope', 'Checkin', 'Kickout', 'AlertService'];

    function ShiftController(   $scope,   Checkin,   Kickout,   AlertService) {
        $scope.kickouts = [];

        function init() {
            fetchKickouts();
        }

        function fetchKickouts() {
            Kickout.getByLocationId(LOCATION_ID).success(function(response) {
                $scope.kickouts = response.data;
                console.log(response);
            }).error(function() {
                AlertService.broadcast('There was a problem fetching Kickouts', 'error');
            });
        }

        init();
    };
})();