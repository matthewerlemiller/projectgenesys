(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Location', Location);

    Location.$inject = ['$http'];

    function Location(   $http) {
        return {
            all : function() {
                return $http.get('/location');
            },
            leaders : function() {
                return $http.get('/location/leaders');
            },
            updateGoal : function(data) {
                return $http.post('/location/goal', data);
            },
            updateDirector : function(data) {
                return $http.post('/location/director', data);
            }
        }    
    }
})();