'use strict';

var gulp = require('gulp'),
    Promise = require('es6-promise').Promise,
    sass = require('gulp-sass'),
    livereload = require('gulp-livereload'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat');

gulp.task('sass', function () {
    return gulp.src('public_html/style/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('public_html/style/css'))
});

gulp.task('styles', ['sass'], function () {
    var stream = gulp.src('public_html/style/css/style.css')
        .pipe(concat('style.css'))
        .pipe(autoprefixer('last 2 version'))
        .pipe(gulp.dest('public_html/style/css'))
        .pipe(livereload());
});

gulp.task('watch', ['styles'], function () {
    livereload.listen();
    gulp.watch(['public_html/style/scss/**/*.scss', 'public_html/style/css/**/*.css'], ['styles']);
    gulp.watch(['app/**/*.*', 'public_html/**/*.*', 'uploads/**/*.*']).on('change', function (file) {
        livereload.changed(file.path);
    });
});

gulp.task('default', ['watch']);