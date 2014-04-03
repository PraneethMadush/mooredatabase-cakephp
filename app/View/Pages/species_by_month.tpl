{extends file="layout_main.tpl"}
{block name=content}
<div id="chartSpeciesByMonth_container">
	<ul data-role="listview" data-divider-theme="{$pageTheme}">
		<li data-role="list-divider">Species By Month</li>
	</ul>
	<figure>				
		<div id="chartSpeciesByMonth">
			<img src="images/loaderb32.gif" class="loader" alt="Loading" />		
		</div>
	</figure>
	<ul data-role="listview" data-divider-theme="{$pageTheme}">
		<li data-role="list-divider">Month Lists</li>
	</ul>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="{$dataCountTheme}">
	{foreach $species_set as $month}
		<li>
			<a href="species_by_month_list.html?month={$month->monthNumber}">
				{$month->monthName}
				<span class="ui-li-count">{$month->speciesCount} Species</span>
			</a>
		</li>
	{/foreach}
	</ul>
</div>
{/block}