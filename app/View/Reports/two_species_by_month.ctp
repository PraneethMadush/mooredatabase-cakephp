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
<div id="chartTempsByMonth_container">
    <ul data-role="listview" data-divider-theme="a">
        <li data-role="list-divider">
            Temperatures By Month, Minneapolis, MN
        </li>
    </ul>
    <figure>
        <div id="chartdivTemps" class="chartdiv" style="height: 300px;"></div>
    </figure>
</div>
<div data-role="content">
    <p>
    These graphs illustrate the different migration patterns for ducks (family Anatidae of order Anseriformes) and
    warblers (family Parulidae of order Passeriformes) and how they correlate with temperature:
    <ul>
        <li>
            Ducks arrive early to Minnesota and depart late; the diversity
            of ducks peaks in April and November.  Spring and fall duck migrations are triggered
            by ice-out and ice-in, respectively.
        </li>
        <li>
            Warblers arrive later and depart earlier than ducks; the diversity of warblers
            peaks in May and September.  Spring and fall warbler migrations are triggered largely by the
            availability of insects for food, which is in turn a function of temperature.
        </li>
    </ul>
    </p>
</div>