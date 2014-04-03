<?php
	$this->set('pageId', 'youtube');
	$this->set('title_for_layout', 'YouTube');
	// get some parameters from URL
	$id = $this->params['url']['id'];
	$videoTitle = $this->params['url']['title']	
?>
<div data-role="content">
	<div id="myplayer" style="text-align:center">
		<iframe src="http://www.youtube.com/embed/<?php echo $id ?>?wmode=transparent&amp;HD=0&amp;rel=0&amp;showinfo=0&amp;controls=1&amp;autoplay=1" style="border:0;"></iframe>
		<p><?php echo $videoTitle ?></p>
	</div>
</div>