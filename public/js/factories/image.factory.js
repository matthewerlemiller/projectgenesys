(function() {
    'use strict';

    angular
    .module('genesys')
    .factory('Image', Image);

    Image.$inject = ['$http', '$upload'];

    function Image(   $http,   $upload) {
        return {
            upload : function(file) {
                return $upload.upload({
                    url : '/member/image',
                    file : file
                });
            }
        }
    }
})();