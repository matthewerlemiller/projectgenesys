var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');

gulp.task('sass', function () {
    return gulp.src([             
            'css/style.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./maps'))
        .pipe(concat('style.css'))
        .pipe(gulp.dest('production/css'))
});

gulp.task('js', function() {
    return gulp.src([
            'js/jquery.js',
            'js/vendor/bootstrap.min.js',
            'js/vendor/angular-file-upload-html5-shim.min.js',
            'js/vendor/angular-file-upload.min.js',
            'bower_components/angular-touch/angular-touch.js',
            'bower_components/angular-off-click/offClick.js',
            'bower_components/ng-file-upload/angular-file-upload-shim.js',
            'bower_components/ng-file-upload/angular-file-upload-all.js',
            'bower_components/angular-animate/angular-animate.js',
            'bower_components/cal-heatmap/cal-heatmap.js',
            'js/config.js',
            'js/filters.js',
            'js/services/*.js',
            'js/directives.js',
            'js/factories.js',
            'js/controllers/*.js',
            'js/main.js',
            'js/pages/dashboard.js',
            'js/plugins.js',
            'modals/**/*.js'
        ])
        .pipe(concat('app.js'))
        .pipe(gulp.dest('production/js'))
        .pipe(uglify())
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest('production/js'));

});

gulp.task('minify-css', ['sass'], function() {
  return gulp.src([
        'bower_components/cal-heatmap/cal-heatmap.css',
        'css/reset.css',
        'production/css/style.css'
    ])
    .pipe(concat('app.css'))
    .pipe(gulp.dest('production/css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest('production/css'));
});

gulp.task('watch', function() {
    gulp.watch(['css/*.scss', 'css/pages/*.scss'], ['sass', 'minify-css']);
    gulp.watch(['js/*.js', 'js/**/*.js', 'modals/**/*'], ['js']);
});

gulp.task('default', ['sass', 'minify-css', 'js', 'watch']);
