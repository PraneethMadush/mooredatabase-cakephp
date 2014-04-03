<?php
	$this->set('pageId', 'reports');
	$this->set('title_for_layout', 'Reports');
?>
hello you're in reports
<?php
	foreach($locations as $location) {
		echo $location['location']['location_name']."<br />";
	}
?>