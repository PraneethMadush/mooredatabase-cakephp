<?php
	$this->set('pageId', 'tools');
	$this->set('title_for_layout', 'Tools');
?>
<div data-role="content">
	<div data-role="collapsible-set">
		<div data-role="collapsible">
			<h3>Web</h3>
            <ul>
            	<li>Amazon EC2 / RDS / S3 / Elasticache</li>
				<li>Eclipse / Aptana Studio / Zend Studio</li>
				<li>Sublime Text / PHPStorm</li>
				<li>Git / GitHub / Sourcetree</li>
				<li>Subversion / TortoiseSVN / CommitMonitor</li>
				<li>HTML5, CSS3</li>
				<li>Compass / SASS</li>
				<li>Javascript, jQuery, jQuery Mobile, AJAX</li>
				<li>Coffeescript</li>
				<li>Gulp, Uglifyjs</li>
				<li>Bootstrap</li>
				<li>AngularJS</li>
				<li>Node.js / Express.js / Heroku</li>
				<li>Apache / Nginx</li>
				<li>PHP / PHPUnit</li>
				<li>Laravel / Zend Framework / CakePHP</li>
				<li>Smarty Templates</li>
				<li>Ubuntu Linux</li>
				<li>Nagios</li>
				<li>Ruby / Ruby on Rails 3</li>
				<li>XML / XSLT</li>
				<li>Google Maps Javascript API</li>
				<li>Google Chart Tools API</li>
				<li>Google Gears API</li>
				<li>Google Web Fonts</li>
				<li>amCharts JavaScript Charts</li>
				<li>Plotly.js</li>
				<li>Flickr API</li>
            </ul>
		</div>
		<div data-role="collapsible">
			<h3>Database &amp; Analytics</h3>
			<ul>
				<li>SQL Server 6.5 / 7.0 / 2000 / 2005 / 2008 R2</li>
				<li>Sybase Adaptive Server Enterprise 10 / 11.9 / 12.5</li>
				<li>Oracle</li>
				<li>MySQL / MySQL Workbench / phpMyAdmin</li>
				<li>MongoDB</li>
				<li>Redis</li>
				<li>Excel</li>
				<li>R / R Studio</li>
				<li>Python</li>
				<li>Octave</li>
			</ul>
			<?php echo $this->Html->image('mcitp.png', array('alt' => 'MCITP Logo','class' => 'logo')); ?>
		</div>
		<div data-role="collapsible">
			<h3>Microsoft</h3>
            <ul>
	            <li>C#, ASP.NET</li>
	            <li>Visual Basic</li>
			</ul>
			<?php echo $this->Html->image('mcsd.png', array('alt' => 'MCSD Logo','class' => 'logo')); ?>
		</div>	
	</div>
</div>