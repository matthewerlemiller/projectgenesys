app.filter('yesno', function() {

	return function(input) {

		return input ? 'yes' : 'no'

	}

});