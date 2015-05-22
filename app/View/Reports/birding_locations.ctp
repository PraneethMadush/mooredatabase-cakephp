<?php
	$this->set('pageId', 'birdingLocations');
	$this->set('title_for_layout', 'Locations');
?>
<div id="chartSpeciesByCounty_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species and Trips By County</li>
	</ul>
	<figure>				
		<div id="chartdivCounties" class="chartdiv" style="height: 400px;">
		</div>
	</figure>
</div>
<div data-role="content">
	<ul data-role="listview" data-count-theme="a">
		<li data-role="list-divider">Location Lists</li>
	<?php foreach($results as $location): ?>
		<li>
			<a href="/reports/location_detail/<?php echo $location['id']; ?>">
				<p><strong><?php echo $location['location_name']; ?></strong></p>
				<p><?php echo $location['county_name'].' County, '.$location['state_code']; ?></p>
				<p>Coordinates: <?php echo $location['latitude'].' '.$location['longitude']; ?></p>
				<span class="ui-li-count"><?php echo $location['species_count'].' Species'; ?></span>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>