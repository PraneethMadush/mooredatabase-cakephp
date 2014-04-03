<?php
	$this->set('pageId', 'flickrsets');
	$this->set('title_for_layout', 'Flickr');
?>
<div data-role="content">
	<div class="ui-grid-c" id="photolist">
	</div><!-- grid -->
</div>
<?php
	echo $this->Html->script('http://api.flickr.com/services/feeds/photos_public.gne?tags=mooredatabasemobilesite&amp;format=json')."\n";
?>
