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
<div data-role="content">	
	<ul data-role="listview" data-count-theme="a">
		<li data-role="list-divider">Month Lists</li>
	<?php foreach($results as $month): ?>
		<li>
			<a href="species_by_month_list/<?php echo $month['monthNumber']; ?>">
				<?php echo $month['monthName']; ?>
				<span class="ui-li-count"><?php echo $month['speciesCount']; ?> Species / <?php echo $month['tripCount']; ?> Trips</span>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>