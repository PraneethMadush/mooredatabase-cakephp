(function () {
    'use strict';
    module.exports = () => {
        let config = {
            // All the JS we want to check
            alljs: [
                "./app/webroot/js/src/*.js",
                "./*.js"
            ]
        };
        return config;
    };
})();