(function() {
    'use strict';

    angular
    .module('genesys')
    .controller('CreateMemberController', CreateMemberController);

    CreateMemberController.$inject = ['$scope', 'Image', 'Member', 'AlertService', 'Checkin']

    function CreateMemberController(   $scope,   Image,   Member,   AlertService,   Checkin) {
        $scope.image = null;
        $scope.spinner = false;
        $scope.plus = true;
        $scope.member = {};
        $scope.created = false;
        $scope.createdMember = {};

        $scope.$watch('files', function() {
            $scope.onFileSelect($scope.files);
        });

        $scope.onFileSelect = function(files) {
            var file;

            if (files && files.length) {
                file = files[0];
                $scope.spinner = true;
                $scope.plus = false;

                Image.upload(file).success(function(response) {
                    $scope.spinner = false;
                    $scope.image = response.data;
                    $scope.member.image = response.data;
                }).error(function(response) {
                    $scope.spinner = false;
                    $scope.plus = true;
                });
            }
        }

        $scope.saveMember = function() {
            Member.create($scope.member).success(function(response) {
                $scope.created = true;
                $scope.createdMember = response.data;
                document.body.scrollTop = document.documentElement.scrollTop = 0;
            }).error(function() {
                AlertService.broadcast('There was an error, please try again', 'error');
            });
            return false;
        }

        $scope.checkInNewMember = function() {
            var data = {
                memberId : $scope.createdMember.id,
                locationId : LOCATION_ID
            }
            Checkin.store(data).success(function(response) {
                document.location.href="/";
            }).error(function(response) {
                AlertService.broadcast(response.message, 'error');
            });
        }

        $scope.redirectToDashboard = function() {
            document.location.href="/";
        }
    };
})();
