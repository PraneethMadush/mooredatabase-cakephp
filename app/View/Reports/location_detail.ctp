<?php
	$this->set('pageId', 'locationDetail');
	$this->set('title_for_layout', 'Location');
?>
<div data-role="content">
	<h3><?php echo $location['location']['location_name'].', '.$location['location']['county_name'].' County, '.$location['location']['state_code'].'</h3>'; ?>
	<p><?php echo $location['location']['notes']; ?></p>
	<p>Coordinates:&nbsp;&nbsp;<?php echo $location['location']['latitude'].' '.$location['location']['longitude'].'</p>'; ?>
	<br />
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Map</li>
	</ul>
	<br />	
	<figure>				
		<div id="map_canvas" class="map_canvas">
		</div>
	</figure>
	<br />
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider"><?php //echo count($sighting_set).' species recorded</li>'; ?>
	</ul>
	<br />
	<ul data-role="listview" data-autodividers="true" data-divider-theme="a" data-filter="true" data-theme="c">
		<?php echo $this->element('sightings'); ?>
	</ul>			
</div>
<script>
	// load map
	$(document).on("pageshow", "#locationDetail", function() {
		mooredatabase.initialize_map(<?php echo $location['location']['latitude'].','.$location['location']['longitude']; ?>,12,"map_canvas",google.maps.MapTypeId.TERRAIN);
	});
</script>