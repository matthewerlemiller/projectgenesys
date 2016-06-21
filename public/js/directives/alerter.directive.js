(function() {
    'use strict';

    angular
    .module('genesys')
    .directive('alerter', Alerter);

    Alerter.$inject = ['$window', '$timeout', 'AlertService'];

    function Alerter(   $window,   $timeout,   AlertService) {
        return {
            restrict : 'E',
            template : '<div class="alert-container slide-up" ng-show="show">' +
            '<div ng-class="{\'success-alert\' : alertType === \'success\', \'info-alert\' : alertType === \'info\', \'error-alert\' : alertType === \'error\'}">' +
                '{{ message }}' +
            '</div>' +
            '<i class="fa fa-close" ng-click="show = false"></i>' +
            '</div>',
            scope : false,
            link : function($scope, element, attrs) {
                $scope.message = '';
                $scope.show = false;
                $scope.alertType = 'success';

                $scope.$on('successAlert', function() {
                    $scope.alertType = 'success';   
                    display();
                });

                $scope.$on('infoAlert', function() {
                    $scope.alertType = 'info';
                    display();
                });

                $scope.$on('errorAlert', function() {
                    $scope.alertType = 'error';
                    display();
                });

                function display() {
                    $scope.message = AlertService.message;
                    $scope.show = true;

                    $timeout(function() {
                        $scope.show = false;
                    }, 4000);
                }
            }
        }       
    }
})();