(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('School', School);

    School.$inject = ['$http'];

    function School(   $http) {
        return {
            getAll : function() {
                return $http.get('/school');
            }
        }
    }
})();