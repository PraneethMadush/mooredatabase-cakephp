{extends file="layout_main.tpl"}
{block name=ajax_page_scripts}
<script>
	jQuery.mooredatabase.googlemaps.initialize_map(45.009689,-93.247082,11,"myHome", google.maps.MapTypeId.ROADMAP);	
</script>
{/block}
{block name=content}
<section data-role="content">
	<figure>				
		<div id="myHome" style="width: 320px; height: 320px;">
			Google Map of Location
		</div>
	</figure>
</section>
{/block}