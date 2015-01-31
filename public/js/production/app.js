var app = angular.module('genesys', ['angularFileUpload']);

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

app.factory('Member', function($http) {

	return {

		search : function(query) {

			return $http.post('/member/search', query);
			
		},

		checkIn : function(id) {

			return $http.get('/checkin/' + id);

		},

		getCheckedIn : function() {

			return $http.get('/checkedin');

		}
	}
});

app.factory('SharedService', function($rootScope) {

	var sharedService = {};

	sharedService.broadcastShowCheckedIn = function() {

		$rootScope.$broadcast('showCheckedIn');

	}

	return sharedService;

});

app.controller('SearchController', function($scope, Member, SharedService) {

	$scope.query = "";

	$scope.results = [];

	$scope.showResults = false;

	$scope.searchForMember = function() {

		if ($scope.query.length >= 2) {

			var data = { query : $scope.query };

			Member.search(data).success(function(response) {

				if ($scope.query.length >= 2) {

					$scope.results = response.data;
					$scope.showResults = true;

				}
				

			}).error(function() {

				console.log("There was a problem searching for this member");

			});

		} else {

			$scope.clear();

		}
	}

	$scope.clear = function() {

		$scope.showResults = false;
		$scope.results = [];
		// $scope.query = "";

	}

	$scope.checkIn = function(id, index) {

		Member.checkIn(id).success(function(response) {

			console.log(response.message);

			$scope.results[index].CheckedIn = true;

			setTimeout(function() {

				SharedService.broadcastShowCheckedIn();

				$scope.results = [];
				$scope.query = '';

			}, 1000)
			
		}).error(function(response){

			console.log(response.message);

		})

	}

	$scope.$on('showCheckedIn', function() {

		$scope.showResults = false;

	});


});

app.controller('DisplayCheckedInMembers', function($scope, Member, SharedService) {

	$scope.Checklogs = [];

	$scope.getCheckedIn = function() {

		Member.getCheckedIn().success(function(response) {

			$scope.Checklogs = response.data;
			
		}).error(function() {

		});

	}

	$scope.getCheckedIn();
	
	$scope.$on('showCheckedIn', function() {

		$scope.getCheckedIn();

	});



});


















//   This whole part is the live results search functionality

var $search = $('.search');
var $result = $('.result');
var $resultsWrapper = $('.results-wrapper');

var memberList = [];

function Member(fName,lName,idnum) {
	this.fName = fName;
	this.lName = lName;
	this.idnum = idnum;
	this.fullName = this.fName + " " + this.lName;
	this.photoURL = function() {
		return	"img/" + this.idnum + ".jpg";
	}
}

function createNewMember(fName,lName) {
	memberList[memberList.length] = new Member(fName, lName, memberList.length);
}

//returns true if query is present in search term; false if not. Also works on numbers using coercion to string

function searchString(query,searchTerm) {

	//checks if property is a number, and coerces it to string if it is.
	if(!(isNaN(searchTerm))) {
		var searchTerm = searchTerm + "";
	}

	//converts query and searchterm to lowercase
	var searchTerm = searchTerm.toLowerCase();
	var query = query.toLowerCase();

	if (query != "") {

		if((searchTerm.indexOf(query)) != -1) {
			return true;
		}

		else {
			return false;
		}
	}

	else {
		return false
	}

}

createNewMember("Alexander","Carr");
createNewMember("Brian","Clauzel");
createNewMember("Wesley","Baertsch");

function returnResults(query) {
	
	var results = [];

	
	for (var i = 0; i<memberList.length; i++) {
		var currentMember = memberList[i];
		
		if (searchString(query,currentMember.fullName)) {
			results.push(memberList[i]);	
		}

		else if (searchString(query,currentMember.idnum)) {
			results.push(memberList[i]);
		}
	}

	return results;
}


//this could be more effiecient but I'm just not sure how to do it yet. currently it is removing all results from the DOM, then adding the matches. It should just remove results that are no longer matches, and only add new matches.

// $search.on('input', function() {

// 	$('.result').remove();
// 	var searchQuery = $search.val().trim();
// 	var results = returnResults($search.val());
// 	var addedHTML = [];

// 	// console.log(results);

// 	if (results != []) { 

// 		for (var i = 0; i<results.length; i++) {
// 			var resultHTML = "<a href = '#' class='result'><img class='photo' src='" + results[i].photoURL()	 + "'/></a>";
// 			addedHTML.push(resultHTML);
// 			$resultsWrapper.append(resultHTML);
// 		}

// 	} else {

// 		$('.result').remove();

// 	}

// });







