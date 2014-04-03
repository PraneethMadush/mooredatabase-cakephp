{extends file="layout_main.tpl"}
{block name=content}
<div data-role="content">
	<ul data-role="listview" data-divider-theme="{$pageTheme}">
		<li data-role="list-divider">{$bird->common_name|escape}</li>
	</ul>
	<br />
	<div id="speciesInfo" class="ui-grid-a">
		<div class="ui-block-a"><strong>Scientific Name:</strong></div>
		<div class="ui-block-b"><span class="scientific_name">{$bird->scientific_name|escape}</span></div>
		<div class="ui-block-a"><strong>Order:</strong></div>
		<div class="ui-block-b">{$bird->order_name|escape}</div>
		<div class="ui-block-a"><strong>Family:</strong></div>
		<div class="ui-block-b">{$bird->family|escape}</div>
		{if $bird->subfamily}
		<div class="ui-block-a"><strong>Subfamily:</strong></div>
		<div class="ui-block-b">{$bird->subfamily|escape}</div>
		{/if}
		<div class="ui-block-a"><strong>Last Seen:</strong></div>
		<div class="ui-block-b">{$bird->last_seen}</div>		
		<div class="ui-block-a"><strong>Earliest / Latest:</strong></div>
		<div class="ui-block-b">{$bird->earliestSighting} / {$bird->latestSighting}</div>				
		<div class="ui-block-a"><strong>Sightings:</strong></div>
		<div class="ui-block-b">{$bird->sightings}</div>			
	</div><!-- /grid-a -->
	<br />
	<div id="chartSpeciesByMonth_container">
		<ul data-role="listview" data-divider-theme="{$pageTheme}">
			<li data-role="list-divider">Sightings By Month</li>
		</ul>
		<figure>				
			<div id="chartSpeciesByMonth">
				<img src="images/loaderb32.gif" class="loader" alt="Loading" />		
			</div>
		</figure>
		<form>
			<input id="speciesId" type="hidden" value={$bird->id} />
		</form>
	</div>
</div>
{/block}