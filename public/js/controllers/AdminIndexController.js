(function() {
    angular
    .module('genesys')
    .controller('AdminIndexController', AdminIndexController);

    AdminIndexController.$inject = ['$scope', 'Checkin'];

    function AdminIndexController(   $scope,   Checkin) {

        function init() {
            getAllCheckIns();
        }

        function getAllCheckIns() {
            Checkin.getTodayByLocation().then(function(response) {
                $scope.checkins = response.data.data;

                console.debug('response', response);
            });
        }

        init();
    }
})();