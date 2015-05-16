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
<div data-role="content" ng-controller="SpeciesByMonthController">	
	<ul data-role="listview" data-count-theme="a">
		<li data-role="list-divider">Month Lists</li>
		<li data-ng-repeat="month in months">
			<a href="species_by_month_list/{{month.monthNumber}}">
				{{month.monthName}}
				<span class="ui-li-count">{{month.speciesCount}} Species / {{month.tripCount}} Trips</span>
			</a>
		</li>
	</ul>
</div>