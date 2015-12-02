<?php
	$this->set('pageId', 'speciesAll');
	$this->set('title_for_layout', 'All Species');
?>
<div data-role="content">
	<ul data-role="listview" data-theme="c" data-divider-theme="a">
		<li data-role="list-divider">
		<?php echo count($results).' species recorded'; ?>
		</li>
	</ul>
	<br />
	<ul data-role="listview" data-filter="true" data-theme="c" data-divider-theme="a">
	<?php
		$current_order = "";
		foreach($results as $bird) {
			// print order row
			if ($bird['order_name'] != $current_order) {
				$current_order = trim($bird['order_name']);
				echo '<li data-role="list-divider">'.$bird['order_name'].
				     '<p></p><p>'.$bird['order_notes'].'</p><span class="ui-li-count">'.
				     $bird['order_species_count'].' species</span></li>';
			}	
            // print species row		
			echo '<li data-icon="info"><a href="/reports/species_dialog/'.$bird['id'].'">'.$bird['common_name'].'</a></li>';
		}
	?>
	</ul>		
</div>