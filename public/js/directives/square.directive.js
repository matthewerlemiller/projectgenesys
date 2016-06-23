(function(){
    angular
    .module('genesys')
    .directive('square', Square);

    var scopeApplyContainer;

    Square.$inject = ['$window', '$timeout'];

    function Square(   $window,   $timeout) {
        return {
            restrict: 'A',
            link: function (scope, element, attributes) {
                var breakWidth = attributes.squareBreak;

                scope.getWidth = function () {
                    return $(element).width();
                };

                scope.$watch(scope.getWidth, function (width) {
                    if ($window.innerWidth < parseInt(breakWidth, 10)) {
                        $(element).height('auto');
                    } else {
                        $(element).height(width);
                    }
                },true);

                angular.element($window).bind('resize', function () {
                    $timeout.cancel(scopeApplyContainer);
                    scopeApplyContainer = $timeout(function(){scope.$apply();}, 5, false);
                });
            }
        };
    }
})();