<?php
	$this->set('pageId', 'topTwenty');
	$this->set('title_for_layout', 'Top Twenty Species');
?>
<div id="topTwentyContent" data-role="content">
	<script id="topTwentyTemplate"  type="x-tmpl-mustache">
		<ul id="topTwentyListView" data-role="listview" data-count-theme="a">
			{{#species}}
				<li data-icon="info">
					<a href="/reports/species_dialog/{{id}}">
						{{common_name}}
						<span class="ui-li-count">{{sightings}} Sightings</span>
					</a>
				</li>
			{{/species}}
		</ul>		
	</script>
</div>