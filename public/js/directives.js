// Directive for mimicking ng-src for background image styling.
app.directive('backImg', function(){

    return function(scope, element, attrs){

        attrs.$observe('backImg', function(value) {

            element.css({

                'background-image': 'url(' + value +')',
                'background-size' : 'cover'
                
            });
        });
    };
});


app.directive('rankTube', ['Member', function(Member) {

	return {

		restrict : 'E',

		scope : {

			member : '=member',
			loaded : '=loaded'

		},

		template : '<div class="rank-container">' +
					'<div class="rank-tube-outer">' +
						'<div class="rank-tube-inner" ng-class="{ \'new-width\' : member.rank.abbreviation === \'N\', \'junior-varsity-width\' : member.rank.abbreviation === \'JV\', \'varsity-width\' : member.rank.abbreviation === \'V\', \'advanced-width\' : member.rank.abbreviation === \'A\' }">' +
							'<span class="rank-abbreviation-indicator">{{ member.rank.abbreviation }}</span>' +
						'</div>' +
						'<span class="rank-loading-indicator" ng-hide="loaded">Fetching Rank...</span>' +
					'</div>' +
					'<div class="rank-labels">' +
						'<span ng-class="{ \'active\' : member.rank.abbreviation === \'N\' }">New</span>' +
						'<span ng-class="{ \'active\' : member.rank.abbreviation === \'JV\' }">Junior Varsity</span>' +
						'<span ng-class="{ \'active\' : member.rank.abbreviation === \'V\' }">Varsity</span>' +
						'<span ng-class="{ \'active\' : member.rank.abbreviation === \'A\' }">Advanced</span>' +
					'</div>' +
				'</div>',

		link : function($scope, element, attrs) {


		}

	}

}]);

app.directive('alerter', ['$window', '$timeout', 'AlertService', function($window, $timeout, AlertService) {

	return {

		restrict : 'E',

		template : '<div class="alert-container slide-up" ng-show="show">' +
		'<div ng-class="{\'success-alert\' : alertType === \'success\', \'info-alert\' : alertType === \'info\', \'error-alert\' : alertType === \'error\'}">' +
			'{{ message }}' +
		'</div>' +
        '<i class="fa fa-close" ng-click="show = false"></i>' +
        '</div>',

        scope : false,

		link : function($scope, element, attrs) {

			$scope.message = '';
			$scope.show = false;
			$scope.alertType = 'success';

			$scope.$on('successAlert', function() {

				$scope.alertType = 'success';	
				display();

			});

			$scope.$on('infoAlert', function() {

				$scope.alertType = 'info';
				display();

			});

			$scope.$on('errorAlert', function() {

				$scope.alertType = 'error';
				display();

			});

			function display() {

				$scope.message = AlertService.message;
				$scope.show = true;

				$timeout(function() {

					$scope.show = false;

				}, 4000)

			}

		}


	}

}]);

app.directive('statusTag', ['Member', function(Member) {

	return {

		restrict : 'E',

		template : '<span ng-show="loaded" class="StatusTag" ng-bind="statusTagText" ng-class="{ \'StatusTag--good\' : good === true, \'StatusTag--bad\' : good !== true, \'StatusTag--block\' : block }"></span>',

		scope : {

			member : '=member',
			loaded : '=loaded',
			block : '=block'

		},

		link : function($scope, element, attrs) {

			$scope.statusTagText = "";

			$scope.good = true;

			function fetchStatus() {

				Member.getStatus($scope.member.id).success(function(response) {

					$scope.statusTagText = response.data.name;

					if (response.data.name === 'Good') {

						$scope.good = true;

					} else {

						$scope.good = false;

					}

				}).error(function(response) {

					console.log("there was an error");

				});

			}

			$scope.$watch(function(scope) {

				return scope.member;

			}, function() {

				if ($scope.loaded) {

					fetchStatus();

				}

			}); 			

		}

	}

}]);

app.directive('heatMap', ['Checkin', function(Checkin) {

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
				CurrentDate.setMonth(CurrentDate.getMonth() - x);


				var cal = new CalHeatMap();
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

}]);

app.directive('adminCheckinBarChart', ['Checkin', function(Checkin) {

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

}]);