(function() {
    'use strict';

    angular
    .module('genesys')
    .directive('backImg', BackImg);

    BackImg.$inject = [];

    function BackImg() {
        return function(scope, element, attrs){
            attrs.$observe('backImg', function(value) {
                element.css({
                    'background-image': 'url(' + value +')',
                    'background-size' : 'cover'
                });
            });
        };  
    }
})();