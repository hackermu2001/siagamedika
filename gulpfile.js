const gulp = require('gulp');
const cssmin = require('gulp-cssmin');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

// Tugas untuk minifikasi CSS
gulp.task('minify-css', () => {
    return gulp.src('assets/css/*.css')  // Mengubah path CSS
        .pipe(concat('style.min.css'))
        .pipe(cssmin())
        .pipe(gulp.dest('assets/css'));
});

// Tugas untuk minifikasi JavaScript
gulp.task('minify-js', () => {
    return gulp.src('assets/js/*.js')  // Mengubah path JavaScript
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

// Tugas default
gulp.task('default', gulp.series('minify-css', 'minify-js'));
