app.filter('yesno', function() {
	return function(input) {
		return input ? 'yes' : 'no'
	}
});

app.filter('humanReadable', function humanReadable($filter){
  return function(text){
    var  tempdate = new Date(text.replace(/-/g,"/"));
    return $filter('date')(tempdate, "EEE MMM d, y | h:mm a");
  }
});