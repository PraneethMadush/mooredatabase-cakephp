{extends file="layout_main.tpl"}
{block name=content}
<div data-role="content">
	<ul data-role="listview" data-theme="c" data-divider-theme="{$pageTheme}">
		<li data-role="list-divider">
			{count($sighting_set)} species recorded
		</li>
	</ul>
	<br />
	<ul data-role="listview" data-filter="true" data-theme="c" data-divider-theme="{$pageTheme}">
	{$current_order=""}
	{foreach $sighting_set as $bird}
		{* print order row *}
		{if $bird->order_name != $current_order}
			{$current_order=trim($bird->order_name)}
			<li data-role="list-divider">
				{$bird->order_name|escape}
				<p></p>
				<p>{$bird->order_notes|escape}</p>
				<span class="ui-li-count">{$bird->order_species_count} species</span>
			</li>
		{/if}			
		{include file="bird_dialog.tpl"}
	{/foreach}
	</ul>		
</div>
{/block}