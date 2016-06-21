(function() {
    'use strict';

    angular
    .module('genesys')
    .directive('statusTag', StatusTag);

    StatusTag.$inject = ['Member'];

    function StatusTag(   Member) {
        return {
            restrict : 'E',
            template : '<span ng-show="loaded" class="StatusTag" ng-bind="statusTagText" ng-class="{ \'StatusTag--good\' : good === true, \'StatusTag--bad\' : good !== true, \'StatusTag--block\' : block }"></span>',
            scope : {
                member : '=member',
                loaded : '=loaded',
                block : '=block'
            },
            link : function($scope, element, attrs) {
                $scope.statusTagText = "";
                $scope.good = true;

                function fetchStatus() {
                    Member.getStatus($scope.member.id).success(function(response) {
                        $scope.statusTagText = response.data.name;
                        if (response.data.name === 'Good') {
                            $scope.good = true;
                        } else {
                            $scope.good = false;
                        }
                    }).error(function(response) {
                        console.log("there was an error");
                    });
                }

                $scope.$watch(function(scope) {
                    return scope.member;
                }, function() {
                    if ($scope.loaded) {
                        fetchStatus();
                    }
                });             
            }
        }
    }
})();