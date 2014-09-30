<?php
$this -> set('pageId', 'twoSpeciesByMonth');
$this -> set('title_for_layout', 'Ducks and Warblers');
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
		This graph illustrates the different migration patterns for ducks (family Anatidae of order Anseriformes) and
		warblers (family Parulidae of order Passeriformes):
		<ul>
			<li>
				Ducks arrive early to Minnesota and depart late; the diversity
				of ducks peaks in April and November.
			</li>
			<li>
				Warblers arrive later and depart earlier; the diversity of warblers
				peaks in May and September.
			</li>
		</ul>
	</p>
</div>