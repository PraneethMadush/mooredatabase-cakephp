<?php

// JS includes
echo $this->Html->script('//code.jquery.com/jquery-2.1.1.min.js')."\n";
echo $this->Html->script('//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js')."\n";
echo $this->Html->script('mooredatabase.min')."\n";
echo $this->Html->script('//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-rc.2/angular.min.js')."\n";

// JS includes that must follow the includes above
echo $this->Html->script('//maps.google.com/maps/api/js?sensor=false')."\n";
echo $this->Html->script('geo-min')."\n";
echo $this->Html->script('mooredatabase_googlemaps.min')."\n";		
echo $this->Html->script('amcharts/amcharts')."\n";	
echo $this->Html->script('amcharts/themes/dark')."\n";
echo $this->Html->script('amcharts/serial')."\n";	
echo $this->Html->script('mooredatabase_amcharts.min')."\n";
echo $this->Html->script('angular/app')."\n";
echo $this->Html->script('angular/controllers')."\n";

// load page init last so that we can assume all CSS and JS is loaded
echo $this->Html->script('pageinit')."\n";		

?>