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
 * @package       app.Config
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 0.2.9
 */
/**
 * Here, we are connecting '/' (base path) and some other permalinks to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', ['controller' => 'pages', 'action' => 'display', 'home']);
Router::connect('/aboutme', ['controller' => 'pages', 'action' => 'display', 'aboutme']);
Router::connect('/architecture', ['controller' => 'pages', 'action' => 'display', 'architecture']);
Router::connect('/education', ['controller' => 'pages', 'action' => 'display', 'education']);
Router::connect('/geolocation', ['controller' => 'pages', 'action' => 'display', 'geolocation']);
Router::connect('/home', ['controller' => 'pages', 'action' => 'display', 'home']);
Router::connect('/tools', ['controller' => 'pages', 'action' => 'display', 'tools']);
Router::connect('/training', ['controller' => 'pages', 'action' => 'display', 'training']);
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', ['controller' => 'pages', 'action' => 'display']);

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
