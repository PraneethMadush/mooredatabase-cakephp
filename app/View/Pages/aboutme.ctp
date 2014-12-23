<?php
	$this->set('pageId', 'aboutme');
	$this->set('title_for_layout', 'About Me');
?>
<div data-role="content">
	<div data-role="collapsible-set">
		<div data-role="collapsible" data-collapsed="false">
			<h3>Photo</h3>
			<?php echo $this->Html->image('profile.jpg', array('alt' => 'Photo of Steve Moore', 'class' => 'logo', 'style' => "width:192px;height:320px;")); ?>
		</div>
		<div data-role="collapsible">
			<h3>Interests</h3>
			<ul>
				<li>Birdwatching</li>
				<li>Camping</li>
				<li>Music</li>
				<li>Reading</li>
			</ul>
		</div>
	</div>
</div>