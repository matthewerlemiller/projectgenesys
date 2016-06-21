(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Lesson', Lesson);

    Lesson.$inject = ['$http'];

    function Lesson(   $http) {
        return {
            get : function() {
                return $http.get('/lesson');
            }
        }  
    }
})();