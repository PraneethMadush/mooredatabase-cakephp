<?php
	$this->set('pageId', 'index');
	$this->set('title_for_layout', 'Home');
?>
<div data-role="content">
	<div data-role="collapsible-set">
		<div data-role="collapsible" data-collapsed="false">
			<h3>Welcome</h3>
			<p>Welcome to Steve Moore's mobile-optimized site in the Amazon cloud. I live and work in the Minneapolis area.</p>
			<ul>
				<li>Skilled full-stack web / database developer</li>
				<li>Experienced data architect / database administrator</li>
				<li>Strong analysis &amp; reporting background</li>
				<li>MCSD and MCITP, with 7 certifications in SQL Server development / administration</li>
				<li>Birding Enthusiast</li>
			</ul>
			<?php echo $this->Html->image('mcitp.png', array('alt' => 'MCITP Logo','class' => 'logo')); ?>
		</div>
		<div data-role="collapsible">
			<h3>What's New</h3>
			<ul>
				<li>Continuing work on data science specialization at Coursera / Johns Hopkins</li>
				<li>Statistics, Python, Excel and R programming courses at Coursera, Udacity, Pluralsight.com and Lynda.com</li>
				<li>Migrated mobile site to CakePHP, Nginx and Ubuntu Server 14.04 LTS</li>
				<li>Implemented caching with memcached</li>
				<li>Upgraded charting components to amCharts JavaScript Charts</li>
				<li>Implemented a JSON API. Converting front end to AngularJS.</li>
				<li>Upgraded RDS instance to MySQL 5.6. Move query logic to stored procedures.</li>
			</ul>
			<?php echo $this->Html->image('cakephp_logo_125_trans.png', array('alt' => 'CakePHP Logo','class' => 'logo75',)); ?>			
		</div>
		<div data-role="collapsible">
			<h3>Project Experience</h3>
			<p>Twenty years experience developing software for use in</p>
			<ul>
				<li>Education</li>
				<li>Data Center Operations</li>
				<li>Financial Services</li>
				<li>Manufacturing</li>
				<li>Retail</li>
				<li>Automotive Parts Recycling</li>
				<li>Litigation Support</li>
				<li>Class Action Claims Administration</li>
				<li>Travel</li>
			</ul>
		</div>
		<div data-role="collapsible">
			<h3>Contact Me</h3>
			<address>
				Stephen Moore<br />
				E-mail: <a href="mailto:stephenmoore56@msn.com?subject=Message%20from%20a%20visitor%20to%20your%20mobile%20site" class="content_a" rel="author">stephenmoore56@msn.com</a>
			</address>
		</div>
	</div>
</div>
<div id="chartSpeciesByYear_container">
	<ul data-role="listview" data-divider-theme="a">
		<li data-role="list-divider">Bird Species and Birding Trips By Year</li>
	</ul>
	<figure>				
		<div id="chartdivYears" class="chartdiv" style="height: 300px;">
		</div>
	</figure>
</div>