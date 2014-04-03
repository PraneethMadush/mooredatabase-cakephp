<?php
	$this->set('pageId', 'tools');
	$this->set('title_for_layout', 'Tools');
?>
<div data-role="content">
	<div data-role="collapsible-set">
		<div data-role="collapsible">
			<h3>Web</h3>
            <ul>
            	<li>Amazon EC2 / RDS / S3 / Data Pipeline / Redshift</li>
				<li>Eclipse / Aptana Studio</li>
				<li>Sublime Text</li>
				<li>Git / GitHub</li>
				<li>Subversion / TortoiseSVN / CommitMonitor</li>
				<li>HTML5, CSS3</li>
				<li>Compass / SASS</li>
				<li>SimpLESS / LESS</li>
				<li>Javascript, jQuery, jQuery Mobile, AJAX</li>
				<li>Bootstrap</li>
				<li>AngularJS</li>
				<li>Node.js / Heroku</li>
				<li>Apache, Nginx</li>
				<li>PHP / Zend Framework / Zend Studio</li>
				<li>Smarty 3 templates</li>
				<li>Ubuntu Linux 10.x/11.x/12.x</li>
				<li>Nagios</li>
				<li>Ruby / Ruby on Rails 3</li>
				<li>XML / XSLT</li>
				<li>Adobe CS4 (Dreamweaver, Photoshop, Bridge)</li>
				<li>Google Maps Javascript API</li>
				<li>Google Chart Tools API</li>
				<li>Google Gears API</li>
				<li>Google Web Fonts</li>
				<li>Raphael Javascript Library</li>
				<li>jqPlot Plotting Plugin</li>
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