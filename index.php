<?php
/*
 * Example index.php
 *
 * Use your own Router!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Sogut\Core\Router;
use Sogut\Core\Config;

require_once "./vendor/autoload.php";

Config::setConfigFile('resources' . DIRECTORY_SEPARATOR . 'config.ini');

$router = new Router();
$router->setNamespace("Sogut\Controller\page\pub");
$router->route();