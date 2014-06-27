<?php
	$this->set('pageId', 'settings');
	$this->set('title_for_layout', 'Settings');
	// get user agent string
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
?>
<div data-role="content">
	<div data-role="collapsible-set" data-collapsed="false">
		<div data-role="collapsible">
			<h3>Client</h3>
			<div id="clientInfo" class="ui-grid-a">
				<div class="ui-block-a"><strong>User Agent</strong></div>
				<div class="ui-block-b"><?php echo $userAgent; ?></div>
				<div class="ui-block-a"><strong>Server Name</strong></div>
				<div class="ui-block-b"><?php echo $_SERVER['SERVER_NAME']; ?></div>
			</div>			
		</div>
		<div data-role="collapsible">
			<h3>HTML5 Support - Forms</h3>
			<div id="html5InfoForm">
				<div id="input.autofocus" class="featureMethod">Input attribute: autofocus</div>
				<div id="input.autocomplete" class="featureMethod">Input attribute: autocomplete</div>
				<div id="input.formnovalidate" class="featureMethod">Input attribute: formnovalidate</div>
				<div id="input.pattern" class="featureMethod">Input attribute: pattern</div>
				<div id="input.list" class="featureMethod">Input attribute: datalist</div>
				<div id="input.placeholder" class="featureMethod">Input attribute: placeholder</div>
				<div id="input.required" class="featureMethod">Input attribute: required</div>
				<div id="color" class="featureMethod">Input type: color</div>
				<div id="date" class="featureMethod">Input type: date</div>
				<div id="datetime" class="featureMethod">Input type: datetime</div>
				<div id="datetimelocal" class="featureMethod">Input type: dtlocal</div>
				<div id="email" class="featureMethod">Input type: email</div>
				<div id="meter" class="featureMethod">Input type: meter</div>				
				<div id="month" class="featureMethod">Input type: month</div>
				<div id="number" class="featureMethod">Input type: number</div>
				<div id="output" class="featureMethod">Input type: output</div>
				<div id="progressbar" class="featureMethod">Input type: progressbar</div>
				<div id="range" class="featureMethod">Input type: range</div>
				<div id="search" class="featureMethod">Input type: search</div>
				<div id="tel" class="featureMethod">Input type: tel</div>
				<div id="time" class="featureMethod">Input type: time</div>
				<div id="url" class="featureMethod">Input type: url</div>
				<div id="week" class="featureMethod">Input type: week</div>
			</div>
		</div>
		<div data-role="collapsible">
			<h3>HTML5 Support - Other</h3>
			<div id="html5InfoOther">
				<div id="applicationcache" class="featureMethod">App Cache</div>
				<div id="canvas" class="featureMethod">Canvas</div>
				<div id="canvastext" class="featureMethod">Canvas Text</div>
				<div id="postmessage" class="featureMethod">CW Messaging</div>
				<div id="draganddrop" class="featureMethod">Drag-and-Drop</div>
				<div id="geolocation" class="featureMethod">Geolocation API</div>
				<div id="hashchange" class="featureMethod">hashchange</div>
				<div id="history" class="featureMethod">History Mgmt</div>
				<div id="audio" class="featureMethod">HTML5 Audio</div>
				<div id="video" class="featureMethod">HTML5 Video</div>
				<div id="indexeddb" class="featureMethod">Indexed DB</div>
				<div id="inlinesvg" class="featureMethod">Inline SVG</div>
				<div id="localstorage" class="featureMethod">Local Storage</div>
				<div id="sessionstorage" class="featureMethod">Session Storage</div>
				<div id="smil" class="featureMethod">SMIL</div>
				<div id="svg" class="featureMethod">SVG</div>
				<div id="svgclippaths" class="featureMethod">SVG Clip Paths</div>
				<div id="touch" class="featureMethod">Touch Events</div>
				<div id="webgl" class="featureMethod">WebGL</div>
				<div id="websockets" class="featureMethod">Web Sockets</div>
				<div id="websqldatabase" class="featureMethod">Web SQL Db</div>
				<div id="webworkers" class="featureMethod">Web Workers</div>
			</div>							
		</div>
	</div>
</div>