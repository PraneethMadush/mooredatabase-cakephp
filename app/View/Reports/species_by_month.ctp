<?php
	$this->set('pageId', 'speciesByMonth');
	$this->set('title_for_layout', 'Months');
?>
<div id="chartSpeciesByMonth_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species and Trips By Month</li>
	</ul>
	<figure>				
		<div id="chartdivMonths" class="chartdiv" style="height: 300px;">
		</div>
	</figure>
</div>
<div id="speciesByMonthContent" data-role="content">
	<script id="speciesByMonthTemplate" type="x-tmpl-mustache">
		<ul id="speciesByMonthListView" data-role="listview" data-count-theme="a">
			<li data-role="list-divider">Month Lists</li>
				{{#species}}
					<li>
						<a href="species_by_month_list/{{monthNumber}}">
							{{monthName}}
							<span class="ui-li-count">{{speciesCount}} Species / {{tripCount}} Trips</span>
						</a>
					</li>
				{{/species}}
		</ul>	
	</script>	
</div>