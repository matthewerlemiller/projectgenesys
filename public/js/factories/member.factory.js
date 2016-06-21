(function() {
    angular
    .module('genesys')
    .factory('Member', Member);

    Member.$inject = ['$http'];
    
    function Member(   $http) {
        return {
            search : function(query) {
                return $http.post('/member/search', query);
            },
            get : function(memberId) {
                return $http.get('/member/get/' + memberId);
            },
            getStatus : function(memberId) {
                return $http.get('/member/status/' + memberId);
            },
            update : function(data) {
                return $http.put('/member/update/', data);
            },
            create : function(data) {
                return $http.post('/member', data);
            }
        }
    };
})();