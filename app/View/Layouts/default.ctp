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
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php echo "MOORE+DATABASE - ".$title_for_layout; ?></title>
<?php echo $this->element('meta', array(), array('cache' => true)); ?>
<?php echo $this->element('stylesheets', array(), array('cache' => true)); ?>
<?php echo $this->element('scripts', array(), array('cache' => true)); ?>
</head>
<body class="ui-body-a">
<div id="<?php echo $pageId; ?>" data-role="page" data-theme="a" data-content-theme="a">
	<div id="container">
        <?php echo $this->element('header')."\n"; ?>
		<div id="content">
			<?php echo $this->fetch('content')."\n"; ?>
			 <?php echo $this->element('banner',array(),array('cache' => true)); ?>
		</div>
	</div>
	<?php echo $this->element('panelMenu')."\n"; ?>
</div>
<?php echo $this->element('googleAnalytics', array(), array('cache' => true))."\n"; ?>
</body>
</html>