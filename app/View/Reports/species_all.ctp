<?php
	$this->set('pageId', 'speciesAll');
	$this->set('title_for_layout', 'All Species');
?>
<div data-role="content" ng-controller="AllSpeciesController">
	<ul data-role="listview" data-theme="c" data-divider-theme="a">
		<li data-role="list-divider">
			{{birds.length}} species recorded
		</li>
	</ul>
	<br />
	<ul data-role="listview" data-filter="true" data-theme="c" data-divider-theme="a">
		<li ng-repeat="bird in birds" data-icon="info">
			<a href="/reports/species_dialog/{{bird.id}}">{{bird.common_name}}</a>
		</li>
	</ul>		
</div>