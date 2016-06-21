(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Shift', Shift);

    Shift.$inject = ['$http'];

    function Shift(   $http) {
        return {
            get : function() {
                return $http.get('/shift/get');
            }
        }
    }
})();