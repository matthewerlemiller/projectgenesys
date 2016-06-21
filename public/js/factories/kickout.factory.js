(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Kickout', Kickout);

    Kickout.$inject = ['$http'];

    function Kickout(   $http) {
        return {
            store : function(data) {
                return $http.post('/member/kickout', data);
            }
        }
    }
})();