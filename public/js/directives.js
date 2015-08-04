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
						'<div class="rank-tube-inner" ng-class="{ \'new-width\' : member.rank.Abbreviation === \'N\', \'junior-varsity-width\' : member.rank.Abbreviation === \'JV\', \'varsity-width\' : member.rank.Abbreviation === \'V\', \'advanced-width\' : member.rank.Abbreviation === \'A\' }">' +
							'<span class="rank-abbreviation-indicator">{{ member.rank.Abbreviation }}</span>' +
						'</div>' +
						'<span class="rank-loading-indicator" ng-hide="loaded">Fetching Rank...</span>' +
					'</div>' +
					'<div class="rank-labels">' +
						'<span ng-class="{ \'active\' : member.rank.Abbreviation === \'N\' }">New</span>' +
						'<span ng-class="{ \'active\' : member.rank.Abbreviation === \'JV\' }">Junior Varsity</span>' +
						'<span ng-class="{ \'active\' : member.rank.Abbreviation === \'V\' }">Varsity</span>' +
						'<span ng-class="{ \'active\' : member.rank.Abbreviation === \'A\' }">Advanced</span>' +
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

		template : '<span ng-show="loaded" class="status-tag" ng-bind="statusTagText" ng-class="{ \'good\' : good === true, \'bad\' : good !== true }"></span>',

		scope : {

			member : '=member',
			loaded : '=loaded'

		},

		link : function($scope, element, attrs) {

			$scope.statusTagText = "";

			$scope.good = true;

			function fetchStatus() {

				Member.getStatus($scope.member.Id).success(function(response) {

					$scope.statusTagText = response.data.Name;

					if (response.data.Name === 'Good') {

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