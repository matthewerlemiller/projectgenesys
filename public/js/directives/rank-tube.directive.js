(function() {
    'use strict';

    angular
    .module('genesys')
    .directive('rankTube', RankTube);

    RankTube.$inject = ['Member'];

    function RankTube(   Member) {
        return {
            restrict : 'E',
            scope : {
                member : '=member',
                loaded : '=loaded'
            },
            template : '<div class="rank-container">' +
                        '<div class="rank-tube-outer">' +
                            '<div class="rank-tube-inner" ng-class="{ \'new-width\' : member.rank.abbreviation === \'N\', \'junior-varsity-width\' : member.rank.abbreviation === \'JV\', \'varsity-width\' : member.rank.abbreviation === \'V\', \'advanced-width\' : member.rank.abbreviation === \'A\' }">' +
                                '<span class="rank-abbreviation-indicator">{{ member.rank.abbreviation }}</span>' +
                            '</div>' +
                            '<span class="rank-loading-indicator" ng-hide="loaded">Fetching Rank...</span>' +
                        '</div>' +
                        '<div class="rank-labels">' +
                            '<span ng-class="{ \'active\' : member.rank.abbreviation === \'N\' }">New</span>' +
                            '<span ng-class="{ \'active\' : member.rank.abbreviation === \'JV\' }">Junior Varsity</span>' +
                            '<span ng-class="{ \'active\' : member.rank.abbreviation === \'V\' }">Varsity</span>' +
                            '<span ng-class="{ \'active\' : member.rank.abbreviation === \'A\' }">Advanced</span>' +
                        '</div>' +
                    '</div>',

            link : function($scope, element, attrs) {}
        } 
    }
})();