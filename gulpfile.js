var gulp = require('gulp');
var cleanCss = require('gulp-clean-css');
var uglify = require ('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var watch = require('gulp-watch');

gulp.task('brand_css', function(){
   return gulp.src('dev/brand-controle/css/*.css')
           .pipe(cleanCss())
           .pipe(rename('style.min.css'))
           .pipe(gulp.dest('public/css/brand-controle'));
});

gulp.task('brand_js', function () {
    return gulp.src('dev/brand-controle/js/*.js')
            .pipe(uglify())
            .pipe(concat('all.js'))
            .pipe(rename('script.min.js'))
            .pipe(gulp.dest('public/js/brand-controle'));

});

//SHOULDER
gulp.task('shoulder_js', function () {
    return gulp.src('dev/shoulder/js/*.js')
            .pipe(uglify())
            .pipe(concat('all.js'))
            .pipe(rename('shoulder.min.js'))
            .pipe(gulp.dest('public/js/shoulder'));

});

gulp.task('default', ['brand_css', 'brand_js', 'shoulder_js']);

gulp.task('watch', function(){
    gulp.watch('dev/brand-controle/css/*.css', ['brand_css']);
    gulp.watch('dev/brand-controle/js/*.js', ['brand_js']);
    gulp.watch('dev/shoulder/js/*.js', ['shoulder_js']);
});


