<?php
	$this->set('pageId', 'birdingLocations');
	$this->set('title_for_layout', 'Locations');
?>
<div data-role="content">
	<ul data-role="listview" data-count-theme="a">
	<?php foreach($location_set as $location): ?>
		<li>
			<a href="/reports/location_detail/<?php echo $location['location']['id']; ?>">
				<p><strong><?php echo $location['location']['location_name']; ?></strong></p>
				<p><?php echo $location['location']['county_name'].' County, '.$location['location']['state_code']; ?></p>
				<p>Coordinates: <?php echo $location['location']['latitude'].' '.$location['location']['longitude']; ?></p>
				<span class="ui-li-count"><?php echo $location[0]['species_count'].' Species'; ?></span>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>