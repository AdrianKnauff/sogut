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

require_once "./vendor/autoload.php";

$connection = new MySQLConnection();
$router = new Router();
$app = new Application( $connection, $router );