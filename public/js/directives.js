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