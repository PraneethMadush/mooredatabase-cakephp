<?php
	$this->set('pageId', 'speciesByOrder');
	$this->set('title_for_layout', 'Orders');
?>
<div id="chartSpeciesByOrder_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species By Order</li>
	</ul>
	<figure>				
		<div id="chartSpeciesByOrder">
			<img src="/img/loaderb32.gif" class="loader" alt="Loading" />
		</div>
	</figure>
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Orders</li>
	</ul>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="a">
	<?php
		foreach($order_set as $order) {
			echo '<li><a href="species_by_order_list?id='.$order['aou_order']['id'].'">';
			echo '<p><strong>'.$order['aou_order']['order_name'].'</strong></p>';
			echo '<p>'.$order['aou_order']['order_notes'].'</p>';
			echo '<p>'.$order[0]['order_species_count_all'].' species in N. America</p>';
			echo '<span class="ui-li-count">'.$order[0]['speciesCount'].' Species</span></a></li>';
		}
	?>
	</ul>
</div>