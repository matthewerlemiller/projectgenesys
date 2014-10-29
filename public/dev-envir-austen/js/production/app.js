'use strict';

var search = {
	init : function() {
		var _ = this;

		_.send();
	},

	send : function() {

		$("#search-form").submit(function(e) {
			e.preventDefault();
			// Clean up input.
			$(this).serialize();

			var query = $("#query-field").val();

			$.ajax({
				type : 'POST',
				data : {'query' : query},
				url : 'member/search',
				dataType: 'JSON'
			}).done(function( response ) {

				var results = [];

				for(var i = 0; i < response.length; i++) {
					var member = response[i];
					var firstName = member.NameFirst;
					var lastName = member.NameLast;
					var id = member.id;
					var html = "<li class='search-result'><a href='member/" + id + "'>" + firstName + " " + lastName +"</a> <a href='checkin/" + id + "'>Check In</a></li>"

					results.push(html)
				}

				$(".search-results-list").html(results);

				if (!response.length) {
					$(".search-status-message").removeClass('success').addClass('failure').html('<p> No results found :(</p>')
				} else {
					$(".search-status-message").removeClass('failure').addClass('success').html('<p>' + response.length + ' results found</p>')	
				}
				

			}).fail(function( response ) {

				$(".search-status-message").removeClass('success').addClass('failure').html('<p> There was an error connecting to the database, try another time?</p>')

			});

			
		});

	}
}


$(document).ready(function(){


	search.init();

});