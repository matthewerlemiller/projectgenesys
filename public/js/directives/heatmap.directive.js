(function() {
    'use strict';

    angular
    .module('genesys')
    .directive('heatMap', HeatMap);

    HeatMap.$inject = ['Checkin'];

    function HeatMap(   Checkin) {
        return {
            restrict : 'E',
            template : '<div id="cal-heatmap"></div>',
            link : function($scope, element, attrs) {
                $scope.heatmapData = {};
                function init() {
                    fetchHeatmapData(); 
                }

                function fetchHeatmapData() {
                    Checkin.heatmapDataByLocation(LOCATION_ID).success(function(response) {
                        $scope.heatmapData = response.data;
                        initHeatmap();
                    });
                }

                function initHeatmap() {
                    var x = 9; 
                    var CurrentDate = new Date();
                    var cal = new CalHeatMap();

                    CurrentDate.setMonth(CurrentDate.getMonth() - x);

                    cal.init({
                        itemSelector : element[0],
                        domain: "month",
                        range: 10,
                        displayLegend: false,
                        start : CurrentDate,
                        itemName: ["check-in", "check-ins"],
                        data : $scope.heatmapData
                    });
                }

                init();
            }
        }
    }
})();