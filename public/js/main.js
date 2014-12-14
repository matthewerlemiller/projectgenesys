
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

$search.on('input', function() {

	$('.result').remove();
	var searchQuery = $search.val().trim();
	var results = returnResults($search.val());
	var addedHTML = [];

	// console.log(results);

	if (results != []) { 

		for (var i = 0; i<results.length; i++) {
			var resultHTML = "<a href = '#' class='result'><img class='photo' src='" + results[i].photoURL()	 + "'/></a>";
			addedHTML.push(resultHTML);
			$resultsWrapper.append(resultHTML);
		}

	} else {

		$('.result').remove();

	}

});







