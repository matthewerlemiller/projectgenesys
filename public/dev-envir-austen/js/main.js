'use strict';

var search = {
	init : function() {
		var _ = this;

		_.send();
	},

	send : function() {

		$("#search-form").submit(function(e) {
			e.preventDefault();

			var query = $("#query-field").val();

			$.ajax({
				type : 'POST',
				data : {'query' : query},
				url : 'member/search',
				dataType: 'JSON'
			}).done(function( response ) {

				var results = [];

				for(var i = 0; i < response.length; i++) {
					var name = response[i].NameFirst;
					var id = response[i].id;
					var html = "<li class='search-result'><a href='member/" + id + "'>" + name + "</a></li>"

					results.push(html)
				}

				$(".search-results-list").html(results);

			

			});

			// TODO: Check for errors
		})

	}
}


$(document).ready(function(){


	search.init();

});