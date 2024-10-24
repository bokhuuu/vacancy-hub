<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './helpers.php';

$uri = str_replace('/vacancy-hub', '', $_SERVER['REQUEST_URI']);

require basePath('router.php');
