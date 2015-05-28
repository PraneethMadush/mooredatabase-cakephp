<?php
	$this->set('pageId', 'speciesAll');
	$this->set('title_for_layout', 'All Species');
?>
<div id="speciesAllContent" data-role="content">
	<script id="speciesAllTemplate" type="x-tmpl-mustache">
		<ul id="speciesAllCountListView" data-role="listview" data-theme="c" data-divider-theme="a">
			<li data-role="list-divider">
				{{count}} species recorded
			</li>
		</ul>
		<br />
		<ul id="speciesAllListView" data-role="listview" data-filter="true" data-theme="c" data-divider-theme="a">
			{{#species}}
			<li data-role="list-divider" style="display: {{displayGroupHeader}}">
				{{order_name}}<p></p>
				<p>{{order_notes}}</p>
				<span class="ui-li-count">{{order_species_count}} species</span>
			</li>
			<li data-icon="info"><a href="/reports/species_dialog/{{id}}">{{common_name}}</a></li>
			{{/species}}
		</ul>		
	</script>
</div>