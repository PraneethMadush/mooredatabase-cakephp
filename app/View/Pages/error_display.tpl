{extends file="layout_main.tpl"}
{block name=content}
<div data-role="content">
	<h3>Error {$error}</h3>
	<p>{$excuse}</p>
	<p>{$message}</p>
</div>
{/block}