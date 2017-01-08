(function() {
    "use strict";
    let gulp = require('gulp');
    let args = require('yargs').argv;
    let del = require('del');
    let config = require('./gulp.config')();
    let runSequence = require('run-sequence');

    // lazy loading plugins
    //now we can use $. and name of plugin without gulp-
    let $ = require('gulp-load-plugins')({
        lazy: true
    });

    gulp.task('js', function() {
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

    // build CSS
    gulp.task('css', function(cb) {
        runSequence('clean-css', 'compass', 'clean-sass-cache', cb);
    });

    // compile and minify SASS to CSS with compass
    gulp.task('compass', function() {
        log('Compiling and minifying SASS to CSS...');
        return gulp
            .src(config.sassfiles)
            .pipe($.if(args.verbose, $.print()))
            .pipe($.plumber())
            .pipe($.compass({
                config_file: config.configrb,
                css: config.cssdir,
                sass: config.sassdir
            }))
            .pipe(gulp.dest(config.cssdir));
    });

    // remove existing CSS files
    gulp.task('clean-css', function() {
        var files = config.cssfiles;
        return clean(files);
    });

    // remove SASS cache directory
    gulp.task('clean-sass-cache', function() {
        var files = config.sasscache;
        return clean(files);
    });

    // watcher task for CSS
    gulp.task('compass-watch', function() {
        gulp.watch(config.sassfiles, ['compass']);
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

    // for clearing directories
    function clean(path) {
        log('Cleaning: ' + $.util.colors.red(path));
        return del(path);
    }

})();