<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) and some other permalinks to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
Router::connect('/aboutme', array('controller' => 'pages', 'action' => 'display', 'aboutme'));
Router::connect('/architecture', array('controller' => 'pages', 'action' => 'display', 'architecture'));
Router::connect('/canvas', array('controller' => 'pages', 'action' => 'display', 'canvas'));
Router::connect('/education', array('controller' => 'pages', 'action' => 'display', 'education'));
Router::connect('/geolocation', array('controller' => 'pages', 'action' => 'display', 'geolocation'));
Router::connect('/home', array('controller' => 'pages', 'action' => 'display', 'home'));
Router::connect('/settings', array('controller' => 'pages', 'action' => 'display', 'settings'));
Router::connect('/tools', array('controller' => 'pages', 'action' => 'display', 'tools'));
Router::connect('/training', array('controller' => 'pages', 'action' => 'display', 'training'));
Router::connect('/youtube', array('controller' => 'pages', 'action' => 'display', 'youtube'));
// we need a redirect here or the click on photo to return to set feature won't work
Router::redirect('/flickr', array('controller' => 'pages', 'action' => 'display', 'flickrsets'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
