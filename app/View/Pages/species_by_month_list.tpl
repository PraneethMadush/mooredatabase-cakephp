{extends file="layout_main.tpl"}
{block name=content}
<div data-role="content">
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
{/block}