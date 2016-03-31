(function () {
    'use strict';
    module.exports = () => {
        let config = {
            // All the JS we want to check
            alljs: [
                "./app/webroot/js/src/*.js",
                "./*.js"
            ],
            sassdir:   './app/webroot/css/sass',
            sassfiles: './app/webroot/css/sass/*.scss',
            cssdir:   './app/webroot/css/css',
            cssfiles: './app/webroot/css/css/*.css',
            configrb: './config.rb'
        };
        return config;
    };
})();