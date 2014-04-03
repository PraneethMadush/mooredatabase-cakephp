<?php
	$this->set('pageId', 'flickrphoto');
	$this->set('title_for_layout', 'Photo');
	// get some parameters from URL
	$link = $this->params['url']['link'];
	$photoTitle = $this->params['url']['title']
?>
<div data-role="content" id="myphoto">
	<a href="/pages/flickrsets">
		<img src="<?php echo $link ?>_b.jpg" alt="<?php echo $photoTitle ?>" />
	</a>
	<div style="width:100%;text-align:center">
		<p><?php echo $photoTitle ?></p>
	</div>
</div>