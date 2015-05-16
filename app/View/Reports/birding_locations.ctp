<?php
	$this->set('pageId', 'birdingLocations');
	$this->set('title_for_layout', 'Locations');
?>
<div id="chartSpeciesByCounty_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species and Trips By County</li>
	</ul>
	<figure>				
		<div id="chartdivCounties" class="chartdiv" style="height: 400px;" ng-controller="BirdingLocationsController">
		</div>
	</figure>
</div>
<div data-role="content" ng-controller="BirdingLocationsController">
	<ul data-role="listview" data-count-theme="a">
		<li data-role="list-divider">Location Lists</li>
		<li data-ng-repeat="location in locations">
			<a href="/reports/location_detail/{{location.id}}">
				<p><strong>{{location.location_name}}</strong></p>
				<p>{{location.county_name}} County, {{location.state_code}}</p>
				<p>Coordinates: {{location.latitude}} {{location.longitude}}</p>
				<span class="ui-li-count">{{location.species_count}} Species</span>
			</a>
		</li>
	</ul>
</div>