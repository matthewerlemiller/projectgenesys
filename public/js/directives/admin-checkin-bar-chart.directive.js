(function() {
    angular
    .module('genesys')
    .directive('adminCheckinBarChart', AdminCheckinBarChart);

    AdminCheckinBarChart.$inject = ['Checkin'];

    function AdminCheckinBarChart(   Checkin) {
        return {
            restrict : 'E',
            scope : {
                locationId : '='
            },
            template : '<div></div>',

            link : function($scope, element, attrs) {

                function initChart() {
                    var n = 2; // number of layers
                    var m = 15; // number of samples per layer
                    var stack = d3.layout.stack();
                    var layers = stack(d3.range(n).map(function() { return bumpLayer(m, .1); }));
                    var yGroupMax = d3.max(layers, function(layer) { return d3.max(layer, function(d) { return d.y; }); });
                    var yStackMax = d3.max(layers, function(layer) { return d3.max(layer, function(d) { return d.y0 + d.y; }); });

                    var margin = {top: 0, right: 15, bottom: 0, left: 15};
                    // var width = 960 - margin.left - margin.right;
                    var width = 684 - margin.left - margin.right;
                    var height = 200 - margin.top - margin.bottom;

                    var x = d3.scale.ordinal().domain(d3.range(m)).rangeRoundBands([0, width], .08);

                    var y = d3.scale.linear().domain([0, yStackMax]).range([height, 0]);

                    var color = d3.scale.linear().domain([0, n - 1]).range(["#aad", "#556"]);

                    var xAxis = d3.svg.axis().scale(x).tickSize(0).tickPadding(6).orient("bottom");

                    var svg = d3.select(element[0]).append("svg")
                        .attr("width", width + margin.left + margin.right)
                        .attr("height", height + margin.top + margin.bottom)
                      .append("g")
                        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                    var layer = svg.selectAll(".layer")
                        .data(layers)
                      .enter().append("g")
                        .attr("class", "layer")
                        .style("fill", function(d, i) { return color(i); });

                    var rect = layer.selectAll("rect")
                        .data(function(d) { return d; })
                      .enter().append("rect")
                        .attr("x", function(d) { return x(d.x); })
                        .attr("y", height)
                        .attr("width", x.rangeBand())
                        .attr("height", 0);

                    rect.transition()
                        .delay(function(d, i) { return i * 10; })
                        .attr("y", function(d) { return y(d.y0 + d.y); })
                        .attr("height", function(d) { return y(d.y0) - y(d.y0 + d.y); });

                    svg.append("g")
                        .attr("class", "x axis")
                        .attr("transform", "translate(0," + height + ")")
                        .call(xAxis);
                }
            }
        }
    }
})();