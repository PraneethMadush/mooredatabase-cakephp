<?php
	$this->set('pageId', 'index');
	$this->set('title_for_layout', 'Home');
?>
<div data-role="content">
	<div data-role="collapsible-set">
		<div data-role="collapsible">
			<h3>Welcome</h3>
			<p>Welcome to Steve Moore's mobile-optimized site in the Amazon cloud. I live and work in the Minneapolis area.</p>
			<ul>
				<li>Skilled web / database developer</li>
				<li>Experienced data architect / database administrator</li>
				<li>Strong analysis &amp; design background</li>
				<li>Linux / Open Source Enthusiast</li>
				<li>MCSD and MCITP, with 7 certifications in SQL Server development / administration</li>
			</ul>
			<?php echo $this->Html->image('Powered-by-Amazon-Web-Services.jpg', array('alt' => 'AWS Logo','class' => 'logo')); ?>
		</div>
		<div data-role="collapsible">
			<h3>What's New</h3>
			<ul>
				<li>Completed Statistics and R programming courses offered by Coursera</li>
				<li>Migrated mobile site to CakePHP and Nginx</li>
				<li>Implemented caching with memcached</li>
				<li>Upgraded mobile site front end to jQuery Mobile 1.4.0</li>
				<li>Upgraded RDS instance to MySQL 5.6.14</li>
			</ul>
			<?php echo $this->Html->image('mcitp.png', array('alt' => 'MCITP Logo','class' => 'logo')); ?>
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
				Tel: <a href="tel:+16127894275">(612) 789-4275</a><br />
				E-mail: <a href="mailto:stephenmoore56@msn.com?subject=Message%20from%20a%20visitor%20to%20your%20mobile%20site" class="content_a" rel="author">stephenmoore56@msn.com</a>
			</address>
		</div>
	</div>
</div>