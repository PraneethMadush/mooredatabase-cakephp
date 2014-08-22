<?php
$this -> set('pageId', 'twoSpeciesByMonth');
$this -> set('title_for_layout', 'Months - Two Orders');
?>
<div id="chartTwoSpeciesByMonth_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">
			Species By Month
		</li>
	</ul>
	<figure>
		<div id="chartdivMonths" class="chartdiv" style="height: 300px;"></div>
	</figure>
</div>
<div data-role="content">
	<p>
		This graph illustrates the different migration patterns for order Anseriformes (ducks, geese and swans) and
		Passeriformes (perching birds or "song birds"):
		<ul>
			<li>
				Anseriformes arrive early to Minnesota and depart late; the diversity
				of Anseriformes peaks in April and November.
			</li>
			<li>
				Passeriformes arrive later and depart earlier; the diversity of Passeriformes
				peaks in May and September.
			</li>
		</ul>
	</p>
</div>