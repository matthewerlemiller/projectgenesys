module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            dist : {
                src : [
                    'js/jquery.js',
                    'js/vendor/angular-file-upload-html5-shim.min.js',
                    'js/vendor/angular-file-upload.min.js',
                    'bower_components/angular-touch/angular-touch.js',
                    'bower_components/angular-off-click/offClick.js',
                    'bower_components/ng-file-upload/angular-file-upload-shim.js',
                    'bower_components/ng-file-upload/angular-file-upload-all.js',
                    'bower_components/angular-animate/angular-animate.js',
                    'js/config.js',
                    'js/filters.js',
                    'js/services/*.js',
                    'js/directives.js',
                    'js/factories.js',
                    'js/controllers/*.js',
                    'js/main.js',
                    'js/pages/dashboard.js',
                    'js/plugins.js',
                ],
                dest: 'js/production/app.js'
            }
        },

        uglify: {
            build: {
                src: 'js/production/app.js',
                dest: 'js/production/app.min.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style:'compressed'
                },
                files: {
                    'css/style.css' : 'css/style.scss'
                }
            }
        },
        cssmin : {
            combine : {
                files : {
                    'css/production/app.css' : ['css/style.css', 'css/reset.css']
                }
            }
        },
        watch: {
            
            scripts: {
                files: ['js/*.js', 'js/**/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false
                }
            },
            css : {
                files : ['css/*.scss', 'css/pages/*.scss'],
                tasks : ['sass', 'cssmin'],
                options : {
                    spawn : false
                }
            }
        }


    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'cssmin', 'watch']);

};