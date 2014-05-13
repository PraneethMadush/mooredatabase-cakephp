<?php
	$this->set('pageId', 'architecture');
	$this->set('title_for_layout', 'Architecture');
?>
<div data-role="content">
	<div data-role="collapsible-set">
	    <div data-role="collapsible" data-collapsed="false">
			<h3>Front End</h3>
			<ul>
				<li>jQuery Mobile</li>
				<li>HTML5 / CSS3</li>
				<li>SASS / Compass</li>
				<li>jQuery / AJAX / CoffeeScript</li>
				<li>amCharts</li>
				<li>Modernizr</li>
				<li>Flickr and YouTube API's</li>
				<li>Photoswipe jQuery plugin</li>				
				<li>Google Maps API</li>
			</ul>
			<?php echo $this->Html->image('jquery-mobile-logo.png', array('alt' => 'jQuery Mobile Logo','class' => 'logo', 'style' => "height:100px;")); ?>
	    </div>
	    <div data-role="collapsible">
			<h3>Back End</h3>
			<ul>	
				<li>Amazon EC2 (Ubuntu Server 14.04 LTS)</li>
				<li>Amazon RDS (MySQL 5.6)</li>
				<li>Nginx / PHP-FPM</li>
				<li>CakePHP 2.4.6 / PHP 5.5</li>
				<li>Memcached / APC</li>
			</ul>
			<?php echo $this->Html->image('Powered-by-Amazon-Web-Services.jpg', array('alt' => 'AWS Logo','class' => 'logo')); ?>
	    </div>
	    <div data-role="collapsible">
			<h3>Development</h3>
			<ul>
				<li>Aptana Studio</li>
				<li>Sublime Text</li>
				<li>Ubuntu Linux</li>
				<li>Mac OS X</li>
				<li>Virtual Box</li>
				<li>git / GitHub</li>
				<li>Testing on iPad, iPod Touch and Android</li>
			</ul>
			<?php echo $this->Html->image('ubuntu-logo.png', array('alt' => 'Ubuntu Logo','class' => 'logo', 'style' => "height:100px;")); ?>
	    </div> 	    
	</div>	
</div>