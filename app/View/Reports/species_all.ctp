<?php
	$this->set('pageId', 'speciesAll');
	$this->set('title_for_layout', 'All Species');
?>
<div data-role="content">
	<ul data-role="listview" data-theme="c" data-divider-theme="a">
		<li data-role="list-divider">
		<?php echo count($sighting_set).' species recorded'; ?>
		</li>
	</ul>
	<br />
	<ul data-role="listview" data-filter="true" data-theme="c" data-divider-theme="a">
	<?php
		$current_order = "";
		foreach($sighting_set as $key => $bird) {
			// print order row
			if ($bird['aou_order']['order_name'] != $current_order) {
				$current_order = trim($bird['aou_order']['order_name']);
				echo '<li data-role="list-divider">'.$bird['aou_order']['order_name'].
				     '<p></p><p>'.$bird['aou_order']['order_notes'].'</p><span class="ui-li-count">'.
				     $bird[0]['order_species_count'].' species</span></li>';
			}			
			echo '<li data-icon="info"><a href="/reports/species_dialog?id='.$bird['aou_list']['id'].'">'.$bird['aou_list']['common_name'].'</a></li>';
		}
	?>
	</ul>		
</div>