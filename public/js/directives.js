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

app.directive('heatMap', ['Location', function(Location) {

	return {

		restrict : 'E',

		template : '<div id="cal-heatmap"></div>',

		link : function($scope, element, attrs) {

			$scope.heatmapData = {};

			function init() {

				fetchHeatmapData();	

			}


			function fetchHeatmapData() {

				Location.heatmap().success(function(response) {

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