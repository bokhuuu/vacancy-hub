<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './helpers.php';
require basePath('Router.php');
require basename('Database.php');

$router = new Router();

$routes = require basePath('routes.php');

$uri = str_replace('/vacancy-hub', '', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
