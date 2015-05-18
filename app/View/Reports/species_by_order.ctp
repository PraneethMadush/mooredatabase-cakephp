<?php
	$this->set('pageId', 'speciesByOrder');
	$this->set('title_for_layout', 'Orders');
?>
<div id="chartSpeciesByOrder_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species By Order</li>
	</ul>
	<figure>				
		<div id="chartdivOrders" class="chartdiv" style="height: 500px;" ng-controller="SpeciesByOrderChartController">
		</div>
	</figure>
</div>
<div data-role="content" ng-controller="SpeciesByOrderController">	
	<ul data-role="listview" data-count-theme="a">
		<li data-role="list-divider">Orders</li>
		<li data-ng-repeat="order in orders">
			<a href="species_by_order_list/{{order.id}}">
				<p><strong>{{order.order_name}}</strong></p>
				<p>{{order.order_notes}}</p>
				<p>{{order.order_species_count_all}} species in N. America</p>
				<span class="ui-li-count">{{order.species_count}} Species</span>
			</a>
		</li>
	</ul>
</div>