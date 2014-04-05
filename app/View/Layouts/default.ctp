<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// debug kit
// if (!Configure::read('debug')):
// 	throw new NotFoundException();
// endif;
// App::uses('Debugger', 'Utility');

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php echo "MOORE+DATABASE - ".$title_for_layout; ?></title>
	<?php

		// meta tags		
		echo $this->Html->charset('utf-8')."\n";
		echo $this->Html->meta(array('name' => 'description', 'content' => "Web Developer / Software Engineer Stephen Moore's portfolio mobile website."))."\n";
		echo $this->Html->meta(array('name' => 'author', 'content' => 'Stephen Moore'))."\n";
		echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'))."\n";
		echo $this->Html->meta(array('name' => 'format-detection', 'content' => 'telephone=no'))."\n";
		echo $this->Html->meta(array('name' => 'apple-mobile-web-app-capable', 'content' => 'yes'))."\n";
		echo $this->Html->meta(array('name' => 'apple-mobile-web-app-status-bar-style', 'content' => 'black'))."\n";

		// CSS includes
		echo $this->Html->meta('icon',$this->Html->url('/favicon.ico'))."\n";
		echo $this->Html->css('css/themes/mooredatabase.min.css')."\n";		
		echo $this->Html->css('css/themes/jquery.mobile.icons.min')."\n";
		echo $this->Html->css('//code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css')."\n";
		echo $this->Html->css('css/main')."\n";
		echo $this->Html->css('/js/photoswipe/photoswipe')."\n";
		echo $this->Html->css('/js/jqplot/jquery.jqplot.min.css')."\n";

		// JS includes
		echo $this->Html->script('//code.jquery.com/jquery-1.9.1.min.js')."\n";
		echo $this->Html->script('//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js')."\n";
		echo $this->Html->script('mooredatabase.min')."\n";

		// JS includes that must follow the includes above
		echo $this->Html->script('mooredatabase_canvas_demo.min')."\n";		
		echo $this->Html->script('mooredatabase_jqplot.min')."\n";	
		echo $this->Html->script('//maps.google.com/maps/api/js?sensor=false')."\n";
		echo $this->Html->script('geo-min')."\n";
		echo $this->Html->script('/js/photoswipe/klass.min')."\n";
		echo $this->Html->script('/js/photoswipe/code.photoswipe-3.0.4.min')."\n";
		echo $this->Html->script('/js/jqplot/jquery.jqplot.min')."\n";
		echo $this->Html->script('/js/jqplot/plugins/jqplot.categoryAxisRenderer.min')."\n";
		echo $this->Html->script('/js/jqplot/plugins/jqplot.pieRenderer.min')."\n";
		echo $this->Html->script('/js/jqplot/plugins/jqplot.pointLabels.min')."\n";	
		echo $this->Html->script('mooredatabase_googlemaps.min')."\n";		

		echo $this->Html->script('pageinit')."\n";								
	
		// enable page-specific includes of meta tags, CSS and JS
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="ui-body-a">
	<div id="<?php echo $pageId; ?>" data-role="page" data-theme="a" data-content-theme="a">
		<div id="container">
			<?php echo $this->element('header'); ?>
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<?php echo $this->element('panelMenu'); ?>
	</div>
	<?php 
		echo $this->element('googleAnalytics'); 
	?>
</body>
</html>