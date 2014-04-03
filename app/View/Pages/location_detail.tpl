{extends file="layout_main.tpl"}
{block name=content}
	<div data-role="content">
		<h3>{$location->location_name|escape}, {$location->county_name} County, {$location->state_code}</h3>
		<p>{$location->notes|escape}</p>
		<p>Coordinates: {$location->latitude} {$location->longitude}</p>
		<br />
		<ul data-role="listview" data-divider-theme="{$pageTheme}">
			<li data-role="list-divider">Map</li>
		</ul>
		<br />	
		<figure>				
			<div id="map_canvas" class="map_canvas">
				Google Map of Location
			</div>
		</figure>
		<br />
		<ul data-role="listview" data-divider-theme="{$pageTheme}">
			<li data-role="list-divider">{count($sighting_set)} species recorded</li>
		</ul>
		<br />
		<ul data-role="listview" data-autodividers="true" data-divider-theme="{$pageTheme}" data-filter="true" data-theme="c">
		{foreach $sighting_set as $bird}
			{include file="bird_dialog.tpl"}
		{/foreach}
		</ul>			
	</div>
	<script>
		// load map; Smarty variables are embedded in function call
		$(document).on("pageshow", "#locationDetail", function() {
			mooredatabase.initialize_map({$location->latitude},{$location->longitude},12,"map_canvas",google.maps.MapTypeId.TERRAIN);
		});
	</script>
{/block}