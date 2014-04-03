{extends file="layout_main.tpl"}
{block name=content}
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="{$pageTheme}">
			<li data-role="list-divider">Recent Posts</li>
		</ul>
		<br />
		<p></p>
		<div id="postlist">
			{* blog articles inserted here *}
		</div>	
	</div>
{/block}