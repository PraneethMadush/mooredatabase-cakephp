<?php
	$this->set('pageId', 'phpinfo');
	$this->set('title_for_layout', 'PHP');
?>
<div data-role="content">
	<?php phpinfo(); ?>
</div>