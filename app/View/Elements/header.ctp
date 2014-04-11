<header data-role="header" data-position="fixed" data-id="fixedHeader">
	<h1 class="ui-title"><?php echo $title_for_layout ?></h1>
	<a href="#menuPanel" class="ui-btn ui-btn-left ui-icon-bars ui-btn-icon-notext ui-corner-all">No text</a>
	<?php if ($pageId != 'index'): ?>
		<a href="/" class="ui-btn ui-btn-right ui-icon-home ui-btn-icon-notext ui-corner-all">No text</a>
	<?php endif; ?>
</header>