<div data-role="panel" id="menuPanel" data-position="left" data-display="reveal" data-theme="a">
	<div data-role="header">
		<h1>Menu</h1>
	</div>
	<div data-role="content" class="ui-content" style="padding-bottom:0;padding-top:0;">
		<div data-role="collapsible-set" data-inset="false" style="padding-bottom:0;padding-top:0;">
			<div data-role="collapsible">
				<h2>Experience</h2>
				<ul data-role="listview">
					<li><a href="/pages/education">Education</a></li>
					<li><a href="/pages/training">Training</a></li>
					<li><a href="/pages/tools">Tools</a></li>
					<li><a href="/pages/architecture">Mobile Architecture</a></li>
					<li><a href="/pages/aboutme">About Me</a></li>
				</ul>
			</div>
			<div data-role="collapsible">
				<h2>Birding Database</h2>
				<ul data-role="listview">
					<li><a href="/reports/species_by_order">Species By Order</a></li>	
					<li><a href="/reports/species_by_month">Species By Month</a></li>
					<li><a href="/reports/top_twenty">Top Twenty Species</a></li>
					<li><a href="/reports/birding_locations">Birding Locations</a></li>
					<li><a href="/reports/species_all">All Species</a></li>
					<li><a href="/reports/two_species_by_month">Ducks and Warblers</a></li>
				</ul>
			</div>
			<div data-role="collapsible">
				<h2>Miscellaneous</h2>
				<ul data-role="listview">
					<li><a href="/pages/settings">Settings</a></li>
					<li><a href="/pages/geolocation">Geolocation</a></li>					
				</ul>
			</div>
			<div data-role="collapsible">
				<h2>Links</h2>
				<ul data-role="listview">
					<li data-icon="gear"><a href="http://www.moore-database.com/">Desktop Site</a></li>
					<li data-icon="cloud"><a href="http://node.moore-database.com/">Node Site</a></li>
				</ul>
			</div>							
		</div>
	</div>
	<div style="text-align:center;">
		<a href="#" data-rel="close" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-delete ui-corner-all">
			Close
		</a>
		<?php if ($pageId != 'index'): ?>
			<a href="/" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-home ui-corner-all">Home</a>
		<?php endif; ?>		
	</div>
</div><!-- /default panel -->