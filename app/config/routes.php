<?php

use app\controllers\ClientController;
use app\controllers\HabitationController;
use app\controllers\AdminController;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$Client_Controller = new ClientController();
$router->get('/', [$Client_Controller, 'mainPage']);
$router->get('/home', [$Client_Controller, 'home']);

$router->post('/connect', [$Client_Controller, 'login']);
$router->post('/inscription', [$Client_Controller, 'register']);

$Habitation_Controller = new HabitationController();
$router->get('/details', [$Habitation_Controller, 'details']);
$router->get('/delete', [$Habitation_Controller, 'delete']);
$router->get('/update', [$Habitation_Controller, 'update']);

$router->post('/reserver', [$Habitation_Controller, 'doReservation']);
$router->post('/update', [$Habitation_Controller, 'doUpdate']);


$Admin_Controller = new AdminController();
$router->get('/admin', [$Admin_Controller, 'loginPage']);
$router->get('/homeAdmin', [$Admin_Controller, 'home']);

$router->post('/admin', [$Admin_Controller, 'login']);
