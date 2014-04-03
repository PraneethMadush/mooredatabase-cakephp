{extends file="layout_main.tpl"}
{block name=content}
<div data-role="content">
	<ul data-role="listview" data-count-theme="{$dataCountTheme}">
	{foreach $location_set as $location}
		<li>
			<a href="location_detail.html?location={$location->id}">
				<p><strong>{$location->location_name|escape}</strong></p>
				<p>{$location->county_name} County, {$location->state_code}</p>
				<p>Coordinates: {$location->latitude} {$location->longitude}</p>
				<span class="ui-li-count">{$location->species_count} Species</span>
			</a>
		</li>
	{/foreach}
	</ul>
</div>
{/block}