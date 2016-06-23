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
            },
            getByLocationId : function(locationId) {
                return $http.get('/location/kickouts', { params : {locationId : locationId }});
            }
        }
    }
})();