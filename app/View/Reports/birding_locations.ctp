<?php
	$this->set('pageId', 'birdingLocations');
	$this->set('title_for_layout', 'Locations');
?>
<div data-role="content">
	<ul data-role="listview" data-count-theme="a">
	<?php
		foreach($location_set as $location) {
			echo "<li>";
			echo '<a href="/reports/location_detail/'.$location['location']['id'].'">';
			echo '<p><strong>'.$location['location']['location_name'].'</strong></p>';
			echo '<p>'.$location['location']['county_name'].' County, '.$location['location']['state_code'].'</p>';
			echo '<p>Coordinates: '.$location['location']['latitude'].' '.$location['location']['longitude'].'</p>';
			echo '<span class="ui-li-count">'.$location[0]['species_count'].' Species</span>';
			echo '</a></li>';
		}
	?>
	</ul>
</div>