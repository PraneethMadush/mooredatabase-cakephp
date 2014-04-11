<?php
	$this->set('pageId', 'speciesByMonthList');
?>
<div data-role="content">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider"><?php echo count($sighting_set); ?> species recorded</li>
	</ul>
	<br />
	<ul data-role="listview" data-autodividers="true" data-divider-theme="a" data-filter="true" data-theme="c">
		<?php echo $this->element('sightings'); ?>		
	</ul>
</div>