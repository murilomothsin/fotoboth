<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
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
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'welcomes', 'action' => 'index'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
	Router::connect('/admin/albums', array('controller' => 'albums', 'action' => 'index', 'admin' => true));
	//Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
	//Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
	
	Router::connect('/home', array('controller' => 'welcomes', 'action' => 'index'));
	Router::connect('/loja', array('controller' => 'welcomes', 'action' => 'loja'));
	Router::connect('/book', array('controller' => 'welcomes', 'action' => 'book'));
	Router::connect('/eventos', array('controller' => 'welcomes', 'action' => 'eventos'));
	Router::connect('/externas', array('controller' => 'welcomes', 'action' => 'externas'));
	Router::connect('/videos', array('controller' => 'welcomes', 'action' => 'videos'));
	Router::connect('/contato', array('controller' => 'welcomes', 'action' => 'contato'));

	Router::connect('/:url', array('controller' => 'welcomes', 'action' => 'pages'));
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
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
