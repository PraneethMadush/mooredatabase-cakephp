<?php
	$this->set('pageId', 'speciesByOrderList');
?>
<div data-role="content">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider"><?php echo $count; ?> species recorded</li>
	</ul>
	<br />
	<ul data-role="listview" data-autodividers="true" data-divider-theme="a" data-filter="true" data-theme="c">
		<?php
			foreach($sighting_set as $bird) {
				echo '<li data-icon="info"><a href="/reports/species_dialog?id='.$bird['aou_list']['id'].'">'.$bird['aou_list']['common_name'].'</a></li>';
			}
		?>
	</ul>
</div>