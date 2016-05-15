(function() {
    angular
    .module('genesys')
    .controller('MasterController', MasterController);

    MasterController.$inject = ['$scope'];

    function MasterController(   $scope) {
        $scope.navOpen = false;

        $scope.test = function() {
            console.log('off click!!!');
        }

        $scope.toggleOpen = function() {

            $scope.navOpen = !$scope.navOpen;
        }

        $scope.navClose = function() {
            console.log("nav should be closing");
            $scope.navOpen = false;
        }

        $scope.$watch('navOpen', function() {
            console.debug('navOpen', $scope.navOpen);
        });
    }
})();