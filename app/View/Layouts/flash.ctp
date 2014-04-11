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
<?php if (Configure::read('debug') == 0): ?>
<meta http-equiv="Refresh" content="<?php echo $pause; ?>;url=<?php echo $url; ?>"/>
<?php endif; ?>
<?php echo $this->element('meta'); ?>
<?php echo $this->element('stylesheets'); ?>
<?php echo $this->element('scripts'); ?>
</head>
<body class="ui-body-a">
	<div id="<?php echo $pageId; ?>" data-role="page" data-theme="a" data-content-theme="a">
		<div id="container">
			<?php echo $this->element('header'); ?>
			<div id="content">
				<p><a href="<?php echo $url; ?>"><?php echo $message; ?></a></p>
			</div>
		</div>
		<?php echo $this->element('panelMenu'); ?>
	</div>
</body>
</html>