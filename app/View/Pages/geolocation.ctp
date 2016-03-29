<?php
	$this->set('pageId', 'geolocationDemo');
	$this->set('title_for_layout', 'Geolocation');
?>
<div data-role="content">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Your Location</li>
	</ul>
	<br />
	<div id="map_canvas" class="map_canvas"></div>
	<br />	
	<div id="current">Initializing...</div>
</div>