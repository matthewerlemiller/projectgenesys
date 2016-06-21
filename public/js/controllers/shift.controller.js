(function() {
    'use strict';

    angular
    .module('genesys')
    .controller('ShiftController', ShiftController);

    ShiftController.$inject = ['$scope','Checkin'];

    function ShiftController(   $scope,  Checkin) {
        $scope.totals = {};

        function init() {
            fetchTotals();
        }

        function fetchTotals() {
            Checkin.totalsByLocation(LOCATION_ID).success(function(response) {
                $scope.totals.day = response.data.day;
                $scope.totals.week = response.data.week;
                $scope.totals.month = response.data.month;
                $scope.totals.all = response.data.all;
            }); 
        }

        init();
    };
})();