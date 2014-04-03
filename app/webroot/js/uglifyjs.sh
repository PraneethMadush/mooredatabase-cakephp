#!/bin/bash
cat jquery.cookie.js modernizr-2.6.2.min.js mooredatabase_mobile.js pageinit.js | uglifyjs -nc -o mooredatabase.min.js
cat mooredatabase_canvas_demo.js | uglifyjs -nc -o mooredatabase_canvas_demo.min.js