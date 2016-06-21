(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Leader', Leader);

    Leader.$inject = ['$http'];

    function Leader(   $http) {
        return  {
            all : function() {
                return $http.get('/leader/all');
            },
            create : function(data) {
                return $http.post('/leader', data)
            },
            search : function(query) {
                return $http.post('/leader/search', query); 
            },
            updateLocations : function(data) {
                return $http.post('/leader/locations', data);
            },
            assignToLocation : function(data) {
                return $http.post('/leader/assign', data);
            },
            unassignFromLocation : function(data) {
                return $http.post('/leader/unassign', data)
            }
        }
    }
})();