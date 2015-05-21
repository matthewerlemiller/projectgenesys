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

			// $scope.abbreviation = $scope.member.rank.abbreviation;

			function parseRank() {



			}

		}

	}

}]);