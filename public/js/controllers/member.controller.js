(function() {
    'use strict';

    angular
    .module('genesys')
    .controller('MemberPageController', MemberPageController);

    MemberPageController.$inject = ['$scope', 'Member', 'Session', 'Lesson', 'Leader', 'Shift', 'Kickout', 'AlertService', 'School', 'Image', 'Location', 'Checkin'];

    function MemberPageController(   $scope,   Member,   Session,   Lesson,   Leader,   Shift,   Kickout,   AlertService,   School,   Image,   Location,   Checkin) {
        $scope.details = true;
        $scope.lessons = false;
        $scope.kickout = false;
        $scope.edit = false;

        $scope.member = {};
        $scope.checkins = [];
        $scope.checkinInterval = 0;
        $scope.loaded = false;

        $scope.sessions = [];
        $scope.lessonsArray = [];
        $scope.leaders = [];
        $scope.shifts = [];
        $scope.schools = [];
        $scope.showLeaderResults = false;

        $scope.leaderId = null;
        $scope.memberId = null;
        $scope.lessonId = null;
        $scope.sessionNotes = null;

        $scope.photoHasBeenChanged = false;
        $scope.photoHasBeenSaved = true;

        $scope.changePage = function(pageName) {
            $scope.details = false;
            $scope.lessons = false;
            $scope.kickout = false;
            $scope.edit = false;
            $scope.photoHasBeenChanged;

            if (pageName == 'details') {
                $scope.details = true;
            } else if (pageName == 'lessons') {
                $scope.lessons = true;
            } else if (pageName == 'kickout') {
                $scope.kickout = true;
            } else if (pageName == 'edit') {
                $scope.edit = true;
            } else {
                $scope.details = true;
            }
        }

        $scope.fetchData = function() {
            if (MEMBER_ID === null) return false;

            Member.get(MEMBER_ID).success(function(response) {
                if (response.data.birthDate) {
                    response.data.birthDate = new Date(response.data.birthDate);
                }
                $scope.member = response.data;
                $scope.loaded = true;
            }).error(function(response) {
                AlertService.broadcast('Sorry, there was a problem fetching data. This page may be rendered incorrectly.', 'error');
            });
        }

        $scope.updateMember = function() {
            Member.update($scope.member).success(function(response) {
                AlertService.broadcast(response.message, 'success');
                if (response.data.birthDate) {
                    response.data.birthDate = new Date(response.data.birthDate);
                }

                $scope.member = response.data;
                $scope.changePage('details');
                $scope.photoHasBeenSaved = true;
                document.body.scrollTop = document.documentElement.scrollTop = 0;
            }).error(function(response) {
                AlertService.broadcast("Sorry, something went wrong", 'error');
            });
        }

        $scope.init = function() {
            getLessons();
            getLeaders();
            getSchools();
            getShifts();
            getCheckins();
        }

        $scope.getSessions = function(memberId) {
            Session.get(memberId).success(function(response) {
                $scope.sessions = response.data;
            }).error(function(response) {
                console.log(response.message);
            });
        }

        $scope.saveSession = function() {
            var data = {
                memberId : $scope.memberId,
                lessonId : $scope.lessonId,
                leaderId : $scope.leaderId,
                notes : $scope.sessionNotes
            }

            Session.store(data).success(function(response) {
                $scope.sessions.unshift(response.data);            
                $scope.lessonId = null;
                $scope.leaderId = null;
                $scope.sessionNotes = '';
            }).error(function(response) {
                console.log("Something went wrong");
            });
        }

        function getLeaders() {
            Location.leaders().success(function(response) {
                $scope.leaders = response.data;
            }).error(function(response) {
                console.log("there was an error");
            });
        }

        function getLessons() {
            Lesson.get().success(function(response) {
                $scope.lessonsArray = response.data;
            }).error(function(response) {
                console.log("There was en error getting the lessons");
            });
        }

        function getShifts() {
            Shift.get().success(function(response) {
                $scope.shifts = response.data;
            }).error(function(response) {
                console.log(response.message);
            });
        }

        function getSchools() {
            School.getAll().success(function(response) {
                $scope.schools = response.data;
            }).error(function(response) {
                AlertService.broadcast('There was an error, edit functionality may have problems');
            });
        }

        function getCheckins() {
            Checkin.getForMember(MEMBER_ID, $scope.checkinInterval).success(function(response) {
                $scope.checkins.push.apply($scope.checkins, response.data);
                console.debug('$scope.checkins', $scope.checkins);
                $scope.interval++;
            });
        }

        $scope.clear = function() {
            $scope.showResults = false;
            $scope.leaderQueryResults = [];
        }

        $scope.createKickout = function() {
            var data = $scope.kickoutForm;
            data.memberId = MEMBER_ID;
            data.locationId = LOCATION_ID;

            if (!validateKickoutData(data)) {
                AlertService.broadcast('Please check all of the fields', 'error');
                return false;
            }

            Kickout.store(data).success(function(response) {
                AlertService.broadcast(response.message, 'success');
                $scope.fetchData();
                $scope.changePage('details');
            }).error(function(response) {
                AlertService.broadcast('There was an error, please fill in all fields', 'error');
            });
        }

        $scope.$watch('files', function() {
            $scope.onFileSelect($scope.files);
        });

        function validateKickoutData(data) {
            if (!data.shiftId || !data.leaderId || !data.comments) {
                return false;
            }

            return true;
        }

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
                    $scope.photoHasBeenChanged = true;
                    $scope.photoHasBeenSaved = false;
                }).error(function(response) {
                    $scope.spinner = false;
                    $scope.plus = true;
                    console.log("There was an error");
                });
            }
        }

        $scope.init();
        $scope.fetchData();
    };
})();

