(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('SharedService', SharedService);

    SharedService.$inject = ['$rootScope'];

    function SharedService(   $rootScope) {
        var sharedService = {};

        sharedService.broadcastShowCheckedIn = function() {
            $rootScope.$broadcast('showCheckedIn');
        }

        return sharedService;
    }
})();