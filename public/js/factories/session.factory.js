(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Session', Session);

    Session.$inject = ['$http'];

    function Session(   $http) {
        return {
            get : function(memberId) {
                return $http.get('/session/' + memberId);
            },
            store : function(data) {
                return $http.post('/session', data);
            }
        }  
    }
})();