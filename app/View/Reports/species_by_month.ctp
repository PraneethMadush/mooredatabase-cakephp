<?php
	$this->set('pageId', 'speciesByMonth');
	$this->set('title_for_layout', 'Months');
?>
<div id="chartSpeciesByMonth_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species and Trips By Month</li>
	</ul>
	<figure>				
		<div id="chartdiv" style="height: 300px; background-color: #505050; text-shadow: none;">
		</div>
	</figure>
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Month Lists</li>
	</ul>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="a">
	<?php foreach($month_set as $month): ?>
		<li>
			<a href="species_by_month_list/<?php echo $month[0]['monthNumber']; ?>">
				<?php echo $month[0]['monthName']; ?>
				<span class="ui-li-count"><?php echo $month[0]['speciesCount']; ?> Species / <?php echo $month[0]['tripCount']; ?> Trips</span>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>