<?php
	$this->set('pageId', 'speciesByMonth');
	$this->set('title_for_layout', 'Months');
?>
<div id="chartSpeciesByMonth_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Species By Month</li>
	</ul>
	<figure>				
		<div id="chartSpeciesByMonth">
			<?php echo $this->Html->image('loaderb32.gif', array('alt' => 'loading','class' => 'loader')); ?>		
		</div>
	</figure>
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Month Lists</li>
	</ul>
</div>
<div data-role="content">	
	<ul data-role="listview" data-count-theme="a">
	<?php
		foreach($month_set as $month) {
			echo '<li><a href="species_by_month_list/'.$month[0]['monthNumber'].'">';
			echo $month[0]['monthName'];
			echo '<span class="ui-li-count">'.$month[0]['speciesCount'].' Species</span>';
			echo '</a></li>';
		}
	?>
	</ul>
</div>