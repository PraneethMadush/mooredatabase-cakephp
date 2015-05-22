<?php
	$this->set('pageId', 'speciesByOrder');
	$this->set('title_for_layout', 'Orders');
?>
<div id="chartSpeciesByOrder_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species By Order</li>
	</ul>
	<figure>				
		<div id="chartdivOrders" class="chartdiv" style="height: 500px;">
		</div>
	</figure>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="a">
		<li data-role="list-divider">Orders</li>
	<?php foreach($results as $order): ?>
		<li>
			<a href="species_by_order_list/<?php echo $order['id']; ?>">
				<p><strong><?php echo $order['order_name']; ?></strong></p>
				<p><?php echo $order['order_notes']; ?></p>
				<p><?php echo $order['order_species_count_all']; ?> species in N. America</p>
				<span class="ui-li-count"><?php echo $order['speciesCount']; ?> Species</span>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>