<?php
use App\Router;

$router = new Router();

$router->add('/users', 'UserController@getUsers');
$router->add('/users/(\d+)', 'UserController@getUser');

return $router;
