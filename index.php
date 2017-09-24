<?php
/*
 * Example index.php
 *
 * Use your own Router!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Sogut\Core\Application;
use Sogut\Core\Router;
use Sogut\Database\MySQLConnection;
use Sogut\Core\Config;

require_once "./vendor/autoload.php";

Config::setConfigFile('resources' . DIRECTORY_SEPARATOR . 'config.ini');
//$connection = new MySQLConnection();
$router = new Router();
$router->setNamespace("Sogut\Controller\page\pub");
$app = new Application( /*$connection, */$router );