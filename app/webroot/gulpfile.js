(function () {
    "use strict";
    let gulp = require('gulp');
    let jshint = require('gulp-jshint');
    let jscs = require('gulp-jscs');
    let jsFiles = [
        "js/src/*.js"
        ];

    /* style check */
    gulp.task('style', function () {
        return gulp.src(jsFiles)
            .pipe(jshint())
            .pipe(jshint.reporter('jshint-stylish', {
                verbose: true
            }))
            .pipe(jscs());
    });

})();
