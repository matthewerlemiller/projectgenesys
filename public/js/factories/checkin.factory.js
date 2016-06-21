(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Checkin', Checkin);

    Checkin.$inject = ['$http'];

    function Checkin(   $http) {
        return {
            store : function(data) {
                return $http.post('/checkin/', data);
            },
            getTodayByLocation : function(locationId) {
                if (!locationId) locationId = '';

                return $http.get('/checkin/today/' + locationId);
            },
            getForMember : function(memberId, interval) {
                return $http.get('/checkin/member/' + memberId + '?interval=' + interval);
            },
            chartDataByLocation : function(locationId) {
                return $http.get('/checkin/chart/' + locationId);
            },
            heatmapDataByLocation : function(locationId) {
                return $http.get('/checkin/heatmap/' + locationId);
            },
            totalsByLocation : function(locationId) {
                return $http.get('/checkin/totals/' + locationId);
            }
        }
    }
})();