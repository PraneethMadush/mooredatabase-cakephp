{include file="doctype.tpl"}  
<head>
	{include file="metadata.tpl"}
	<title>MOORE+DATABASE {if $title} - {$title}{/if}</title>
	{include file="stylesheets.tpl"}    
	{include file="scripts.tpl"}
	{block name=ajax_page_scripts}{/block}
</head>
<body class="ui-body-{$pageTheme}">
	<div id="{$pageId}" data-role="page" data-theme="{$pageTheme}" data-content-theme="{$pageTheme}">
		{include file="header.tpl"}
		{block name=content}{/block}
		{include file="panelMenu.tpl"}
		{include file="googleAnalytics.tpl"}
	</div>
</body>
</html>