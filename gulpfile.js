(function() {
    "use strict";
    let gulp = require('gulp');
    let args = require('yargs').argv;
    let config = require('./gulp.config')();

    // lazy loading plugins
    //now we can use $. and name of plugin without gulp-
    let $ = require('gulp-load-plugins')({
        lazy: true
    });

    gulp.task('style', function() {
        log('Analyzing code and code style...');
        return gulp
            .src(config.alljs)
            .pipe($.if(args.verbose, $.print()))
            .pipe($.jshint())
            .pipe($.jshint.reporter('jshint-stylish', {
                verbose: true
            }))
            .pipe($.jscs());
    });

    // compile and minify SASS to CSS with compass
    gulp.task('compass', function() {
        log('Compiling and minifying SASS to CSS...');
        return gulp
            .src('./public/sass/*.scss')
            .pipe($.if(args.verbose, $.print()))
            .pipe($.compass({
                config_file: './app/webroot/css/config.rb',
                css: './app/webroot/css/css',
                sass: './app/webroot/css/sass'
            }))
            .pipe(gulp.dest('./app/webroot/css/css/'));
    });

    // logging utility
    function log(msg) {
        if (typeof(msg) === 'object') {
            for (let item in msg) {
                if (msg.hasOwnProperty(item)) {
                    $.util.log($.util.colors.blue(msg[item]));
                }
            }
        } else {
            $.util.log($.util.colors.blue(msg));
        }
    }

})();