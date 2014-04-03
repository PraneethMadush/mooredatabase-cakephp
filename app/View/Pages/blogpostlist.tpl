{extends file="layout_main.tpl"}
{block name=content}
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="{$pageTheme}">
			<li data-role="list-divider">{$category}</li>
		</ul>
		<br />
		<p></p>
		<div id="postlist">
			{* blog articles inserted here *}
		</div>
	</div>
	<script>
		// note:  there is a Smarty variable embedded in the script
		// below for the slug, therefore this snippet cannot be in the
		// JS file
		$(document).on("pageshow", "#blogpostlist", function() {
			$.getJSON('http://wordpress.moore-database.com/?json=get_category_posts&slug={$slug}&callback=?',function(data) {
				mooredatabase.listWordpressPostsForCategory(data);
			});
		});	
	</script>
{/block}