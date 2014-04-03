{extends file="layout_main.tpl"}
{block name=content}
<div data-role="content">
	<h3>{$bird->common_name|escape}</h3>
	<p>
		<strong>Scientific Name:</strong>&nbsp;&nbsp;<span class="scientific_name">{$bird->scientific_name|escape}</span><br />
		<strong>Order:</strong>&nbsp;&nbsp;{$bird->order_name|escape} {if $bird->order_notes}({$bird->order_notes|escape}){/if}<br />
		<strong>Family:</strong>&nbsp;&nbsp;{$bird->family|escape}<br />
		{if $bird->subfamily}
		<strong>Subfamily:</strong>&nbsp;&nbsp;{$bird->subfamily|escape}<br />
		{/if}
		<strong>Last Seen:</strong>&nbsp;&nbsp;{$bird->last_seen}<br />
		<strong>Sightings:</strong>&nbsp;&nbsp;{$bird->sightings}<br />
	</p>
</div>
{/block}