{extends file="layout_main.tpl"}
{block name=content}
<div id="chartSpeciesByOrder_container">
	<ul data-role="listview" data-divider-theme="{$pageTheme}">
		<li data-role="list-divider">Species By Order</li>
	</ul>
	<figure>				
		<div id="chartSpeciesByOrder">
			<img src="images/loaderb32.gif" class="loader" alt="Loading" />
		</div>
	</figure>
	<ul data-role="listview" data-divider-theme="{$pageTheme}">
		<li data-role="list-divider">Orders</li>
	</ul>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="{$dataCountTheme}">
	{foreach $order_set as $order}
		<li>
			<a href="species_by_order_list.html?order={$order->order_name|escape}">
				<p><strong>{$order->order_name|escape}</strong></p>
				<p>{$order->order_notes|escape}</p>
				<p>{$order->order_species_count_all} species in N. America</p>
				<span class="ui-li-count">{$order->speciesCount} Species</span>
			</a>
		</li>
	{/foreach}
	</ul>
</div>
{/block}