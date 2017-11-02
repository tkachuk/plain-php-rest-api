<?php
use App\Request;
use App\Application;

require __DIR__.'/../autoload.php';

$router = require __DIR__.'/../routes.php';

$request = new Request();

$app = new Application();

$app->handle($request, $router);

die;
