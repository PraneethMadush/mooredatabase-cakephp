#!/bin/bash
cat lib/jquery.cookie.js lib/modernizr-2.6.2.min.js src/mooredatabase_mobile.js src/pageinit.js | uglifyjs -nc -o mooredatabase.min.js
cat src/mooredatabase_amcharts.js | uglifyjs -nc -o mooredatabase_amcharts.min.js
cat src/mooredatabase_googlemaps.js | uglifyjs -nc -o mooredatabase_googlemaps.min.js