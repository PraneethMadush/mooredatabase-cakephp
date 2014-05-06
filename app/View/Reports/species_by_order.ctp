<?php
	$this->set('pageId', 'speciesByOrder');
	$this->set('title_for_layout', 'Orders');
?>
<div id="chartSpeciesByOrder_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species By Order</li>
	</ul>
	<figure>				
		<div id="chartdiv" style="height: 300px;">
			<?php echo $this->Html->image('loaderb32.gif', array('alt' => 'loading','class' => 'loader')); ?>
		</div>
	</figure>
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Orders</li>
	</ul>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="a">
	<?php foreach($order_set as $order): ?>
		<li>
			<a href="species_by_order_list/<?php echo $order['aou_order']['id']; ?>">
				<p><strong><?php echo $order['aou_order']['order_name']; ?></strong></p>
				<p><?php echo $order['aou_order']['order_notes']; ?></p>
				<p><?php $order[0]['order_species_count_all']; ?> species in N. America</p>
				<span class="ui-li-count"><?php echo $order[0]['speciesCount']; ?> Species</span>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>